<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vote;
use App\Models\Member;
use App\Models\Service;
use DB;


class ReportController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function donutChart($id)
    {

        $viewData['vote'] = Vote::find($id);
        $viewData['member_c'] = Member::count();
        $viewData['voting']=DB::select("SELECT COUNT(*) as total  FROM (select distinct id_member_vote FROM run_vote) AS total")[0];
        //dd($viewData['voting']->total);


        return view("report.donut",compact("viewData"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function voteList($id)
    {
        $periodo = Vote::find($id)->period;
        $sql = "SELECT m.id,m.ci,m.`name`,m.last_name,
                                s.name as s_name ,  p.`type`,p.id as post_id, s.only
                                FROM services s
                                INNER JOIN postulates p ON p.id_service=s.id
                                INNER JOIN members m ON m.id=p.id_member
                                INNER JOIN votes ON p.id_vote = votes.id
                                WHERE votes.`id`=$id
                                ORDER BY  s.order";

         $members  = DB::select($sql);

        return view('report.vote_list',compact("members","periodo"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logs()
    {
        $logs = DB::table('logs')->get();
        return view('report.logs',compact('logs'));
    }

    public function listVotes($id)
    {
        $viewData['vote'] = Vote::find($id);
        $viewData['services']= Service::pluck('name','id');
        return view('report.list_votes',compact('viewData'));
    }

    public function resultVotes($id)
    {
        $viewData['member_c'] = Member::count();
        $vote=Vote::where('active',1)->first();
        $id_vote = $vote->id;
        $list = DB::select("SELECT c.* ,m.name,m.last_name FROM (SELECT count(id_member) as count,id_member FROM run_vote
        WHERE id_service=$id
         AND id_vote = $id_vote
         GROUP BY id_member
         ORDER BY id_member) C
         INNER JOIN
         members m ON m.id=c.id_member
          order by count desc");

        return  view('report.inc.table_vote',compact('list','viewData'))->render();
    }


}
