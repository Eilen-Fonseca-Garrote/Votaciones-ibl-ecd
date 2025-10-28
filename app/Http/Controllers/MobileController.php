<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Service;
use App\Models\Vote;
use App\Models\Config;
use DB;

class MobileController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('mobile.index');
    }

     /**
     * DPortal to acces member
     *
     * @return \Illuminate\Http\Response
     */
    public function portal(Request $request)
    {


        $filter =$request->name;
        $members = Member::where('ci', 'like', $filter . '%')->get();
        //dd($members,$filter);
        if($members->count()>0){
            return view('mobile.portal')->with('members',$members);
        }
        return redirect()->back()->with('success', 'No se encontró el Miembro');   ;
    }

     /**
     * DPortal to acces member
     *
     * @return \Illuminate\Http\Response
     */
    public function init($id)
    {

        $filter =$id;
        $member_log = Member::where('id', $id)->first();
        $view_data["post"] = Config::where('key', 'show_post')->first();
        $view_data["votes"] = Config::where('key', 'show_votes')->first();
        session(['idMember' => $member_log->id]);

        if(!session()->has('idMember')){
            return redirect()->route('main')
                                ->with('success', 'Usted no se ha autenticado');
          }
       // dd($members);
        return view('mobile.init')
                    ->with('member_log',$member_log)
                    ->with('view_data',$view_data);
    }

    //**Aplications */
    public function applications($order){

        $vote=Vote::where('active',1)->select('id','period')->first();
        $web_view['service'] = Service::where('order', $order)->first();
        if( !$web_view['service']){
            return redirect()->route('applications',[1])->with('success', "End");;
        }
        $web_view['order'] = $order;
        $id_member = session('idMember');

        session(['vote' => $vote->period]);


        $web_view['post'] = DB::table('postulates')->where('id_member', $id_member)
                                                    ->where('id_service', $web_view['service']->id)
                                                    ->where('id_vote', $vote->id)
                                                    ->first();

        return view('mobile.app')->with('web_view',$web_view);

    }

    public function appStore(Request $request)
    {
        $member = session('idMember');
        $vote=Vote::where('active',1)->select('id')->first();
        $post = DB::table('postulates')->where('id_member', $member)
                                        ->where('id_service', $request->service_id)
                                        ->where('id_vote', $vote->id)
                                        ->first();

        if(!$post){
            if($request->type !='None'){
                DB::table('postulates')->insert(
                    [
                        'id_member'=>  $member,
                        'id_service'=> $request->service_id,
                        'id_vote'=> $vote->id,
                        'type'=> $request->type,

                    ]
                );
            }


        } else {
            if ($request->type != 'None') {
                DB::table('postulates')->where('id', $post->id)->update(['type' => $request->type]);
            } else {
                DB::table('postulates')->where('id', $post->id)->delete();
            }

        }
        $msg =$request->type !='None' ?"Ok":"None";
        return redirect()->route('applications',[$request->order+1])
        ->with('success', $msg);
    }
    /***
     * Active Votes
     */
    public function voteActive($id)
    {
        Vote::where('active',1)->update(['active' => 0]);
        $vote = Vote::where('id', $id)->update(['active' => 1]);
        return redirect()->back();
    }

    /*
    * Vote views
    */
    public function voting($order)
    {

        $vote_obj=Vote::where('active',1)->select('id','period')->first();
        $vote = $vote_obj->id;

        $web_view['service'] = Service::where('order', $order)->first();
        if( !$web_view['service']){
            return redirect()->route('finish.vote',[$vote]);
            //return redirect()->route('voting.order',[1]);
        }


        session(['vote' => $vote_obj->period]);
        $member = session('idMember');
        $web_view['order'] = $order;
        $web_view['post_select'] = null;
        $service_id = $web_view['service']->id;
        $web_view['post'] = DB::select("
            SELECT m.id,m.`name`,m.last_name FROM services s
            INNER JOIN postulates p ON p.id_service=s.id
            INNER JOIN members m ON m.id=p.id_member
            WHERE s.`order`=$order AND (p.`type`='Leader' OR p.`type`='Member')
            AND p.id_vote= $vote
        ");
        $web_view['list'] =DB::select("SELECT id_member from run_vote
                                         WHERE  id_service= $service_id  and id_vote= $vote AND  id_member_vote=$member");
      // dd($web_view['list'] , $web_view['list'],$member,$vote, $service_id );
        return view('mobile.votes')->with('web_view',$web_view);
    }

    /**
     * Store voting
     */
    public function votingStore(Request $request)
    {
       //dd( $request->all());
       $id_member = session('idMember');
       $vote=Vote::where('active',1)->select('id')->first()->id;

       if(isset($request->id)){
        $exist= DB::table('run_vote')
                    ->where('id_member_vote', $id_member)
                    ->where('id_service', $request->service_id)
                    ->where('id_vote', $vote)
                    ->get();
        if ($exist->count() > 0){
            DB::table('run_vote')
                    ->where('id_member_vote', $id_member)
                    ->where('id_service', $request->service_id)
                    ->where('id_vote', $vote)
                    ->delete();
        }
        DB::table('run_vote')->insert([
                            'id_member' =>$request->id,
                            'id_member_vote'=>  $id_member,
                            'id_service'=> $request->service_id,
                            'id_vote'=>$vote
                        ]);
       }
       else if(isset($request->idMember)){
            $exist= DB::table('run_vote')
                    ->where('id_member_vote', $id_member) #miembro que voto
                    ->where('id_service', $request->service_id)
                    ->where('id_vote', $vote)
                    ->get();
            if ($exist->count() > 0){
            DB::table('run_vote')
                    ->where('id_member_vote', $id_member)
                    ->where('id_service', $request->service_id)
                    ->where('id_vote', $vote)
                    ->delete();
            }
         foreach ($request->idMember as $key => $value) {
            DB::table('run_vote')->insert([
                'id_member' =>$value,
                'id_member_vote'=>  $id_member,
                'id_service'=> $request->service_id,
                'id_vote'=>$vote
            ]);
         }

       }


       // dd($request->all(), $id_member ,$vote);

       return redirect()->route('voting.order',[$request->order+1])
       ->with('success', 'Member deleted successfully');


    }

    //salir
    public function salir()
    {
        session()->forget('idMember');
        return redirect()->route('main')
        ->with('success', 'Usted ha salido del SISTEMA');
    }

    public function finishVote($idVote)
    {

        return view('mobile.finish')->with('idVote', $idVote);
    }
    public function finishStore($idVote)
    {

        session()->forget('idMember');

            return redirect()->route('main')
                                ->with('success', 'Usted ha terminado su votacion');
    }
}
