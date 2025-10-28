<?php

namespace App\Http\Controllers;

use App\Models\Config;
use Illuminate\Http\Request;

/**
 * Class ConfigController
 * @package App\Http\Controllers
 */
class ConfigController extends Controller
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
        $configs = Config::paginate();

        return view('config.index', compact('configs'))
            ->with('i', (request()->input('page', 1) - 1) * $configs->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view_data["post"] = Config::where('key', 'show_post')->first();
        $view_data["votes"] = Config::where('key', 'show_votes')->first();
        return view('config.create', compact('view_data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        //request()->validate(Config::$rules);
        $post = isset($request->post)?'Y':'N';
        $vot = isset($request->vot) ? 'Y' : 'N';
        //dd(  $post ,$vot );
         Config::where('key','show_post')->update(['value'=>$post]);
         Config::where('key','show_votes')->update(['value'=>$vot]);


         $view_data["post"] = Config::where('key', 'show_post')->first();
         $view_data["votes"] = Config::where('key', 'show_votes')->first();

        return redirect()->route('configs.create')
            ->with('success', 'Configuración Guardada.')->with('view_data',$view_data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $config = Config::find($id);

        return view('config.show', compact('config'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $config = Config::find($id);

        return view('config.edit', compact('config'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Config $config
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Config $config)
    {
        request()->validate(Config::$rules);

        $config->update($request->all());

        return redirect()->route('configs.index')
            ->with('success', 'Config updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $config = Config::find($id)->delete();

        return redirect()->route('configs.index')
            ->with('success', 'Config deleted successfully');
    }
}
