<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

/**
 * Class VoteController
 * @package App\Http\Controllers
 */
class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $votes = Vote::paginate();

        return view('vote.index', compact('votes'))
            ->with('i', (request()->input('page', 1) - 1) * $votes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vote = new Vote();
        return view('vote.create', compact('vote'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Vote::$rules);

        $vote = Vote::create($request->all());

        return redirect()->route('votes.index')
            ->with('success', 'Vote created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vote = Vote::find($id);

        return view('vote.show', compact('vote'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vote = Vote::find($id);

        return view('vote.edit', compact('vote'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Vote $vote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vote $vote)
    {
        request()->validate(Vote::$rules);

        $vote->update($request->all());

        return redirect()->route('votes.index')
            ->with('success', 'Vote updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $vote = Vote::find($id)->delete();

        return redirect()->route('votes.index')
            ->with('success', 'Vote deleted successfully');
    }

    public function destroyPostulation($id)
    {

      $user = Auth::user();
      $post = DB::table('postulates')->find($id);//->delete();
      $member = Member::find($post->id_member);
      $msg = " Se ha eliminado el miembro ". $member->name." ".$member->last_name."(Id:".$member->id.") por usuario con Id: ".$user->id." Nombre: ".$user->name." del servicio ID:".$post->id_service;
      $log = DB::table('logs')->insert([
                                            'action'=>"DELETE",
                                            'description'=> $msg,
                                            'created_at'=>date("Y-m-d H:i:s"),
                                            'updated_at'=>date("Y-m-d H:i:s")
                                        ]);
       DB::table('postulates')->where('id',$id)->delete();

        return redirect()->back()
            ->with('success', 'Ha eiliminado la postulación');

    }

    public function convertMember($id)
    {
        $user = Auth::user();
        $post = DB::table('postulates')->find($id);//->delete();
        $member = Member::find($post->id_member);
        DB::table('postulates')->where('id',$id)->update(['type'=>'Member']);
        $msg = "Se ha cambiado  a Miembro la postulacion del miembro ". $member->name." ".$member->last_name."(Id:".$member->id.") por usuario con Id: ".$user->id." Nombre: ".$user->name." del servicio ID:".$post->id_service;
        $log = DB::table('logs')->insert([
            'action'=>"UPDATE",
            'description'=> $msg,
            'created_at'=>date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s")
        ]);

        return redirect()->back()
            ->with('success', 'Ha actualizado a miembro la postulación');
    }
    public function voteActive($id) {

        Vote::where('id','<>',$id)->update([
            'active'=> 0
        ]);
        Vote::where('id','=',$id)->update([
            'active'=> 1
        ]);;
        return redirect()->back()
            ->with('success', 'Se ha activado la votacion');
    }
}
