<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Image;

/**
 * Class MemberController
 * @package App\Http\Controllers
 */
class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('picture');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::orderBy('name','asc')->get();
        return view('member.index', compact('members'));

       /* return view('member.index', compact('members'))
            ->with('i', (request()->input('page', 1) - 1) * $members->perPage());*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $member = new Member();
        return view('member.create', compact('member'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       request()->validate(Member::$rules);
        if($request->file){
            $image = $request->file('file');
            $input['photo'] = time().'.'.$image->getClientOriginalExtension();
            $input['photo_min'] = time().'-min.'.$image->getClientOriginalExtension();

            $destinationPath = public_path('/img/thumbnail');

            $imgFile = Image::make($image->getRealPath());

            $imgFile->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['photo']);


            $destinationPath = public_path('/img/uploads');
            $image->move($destinationPath, $input['photo']);
        }



        $input['name'] = $request->name;
        $input['ci'] = $request->ci;
        $input['last_name'] = $request->last_name;
        $input['address'] = $request->address;
        $input['genre'] = $request->genre;
        $input['member_from'] = $request->member_from;

        $input['christening_date'] = $request->christening_date;
        $input['observations'] = $request->observations;
        $input['qualific'] = isset($request->qualific)?1:0;

        $member = Member::create( $input);

        return redirect()->route('members.index')
            ->with('success', 'Member created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = Member::find($id);

        return view('member.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = Member::find($id);
       // dd($member);

        return view('member.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Member $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        //dd($request->all());
        request()->validate(Member::$rules);
        if($request->file){
            $image = $request->file('file');
            $input['photo'] = time().'.'.$image->getClientOriginalExtension();
            $input['photo_min'] = time().'-min.'.$image->getClientOriginalExtension();

            $destinationPath = public_path('/img/thumbnail');

            $imgFile = Image::make($image->getRealPath());

            $imgFile->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['photo_min']);


            $destinationPath = public_path('/img/uploads');
            $image->move($destinationPath, $input['photo']);
        }
        $input['name'] = $request->name;
        $input['ci'] = $request->ci;
        $input['last_name'] = $request->last_name;
        $input['address'] = $request->address;
        $input['genre'] = $request->genre;
        $input['member_from'] = $request->member_from; //'','observations','qualific'
        $input['christening_date'] = $request->christening_date;
        $input['observations'] = $request->observations;
        $input['qualific'] = isset($request->qualific)?1:0;
        $member->update($input);

        return redirect()->route('members.index')
            ->with('success', 'Member updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $member = Member::find($id)->delete();

        return redirect()->route('members.index')
            ->with('success', 'Member deleted successfully');
    }

    /**
     * Return image
     */
    public function picture(Request $request) {
       // dd($request->all());
        $id = $request->id;
        $member = Member::where('id', $id)->select('id', 'name', 'last_name', 'photo_min')->first();

        return view("mobile.inc.modal",compact('member'))->render();
    }
}
