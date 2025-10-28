<?php

namespace App\Http\Controllers;
use File;

use Illuminate\Http\Request;

class FileManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('ftp.filemanager');
    }

    public function index2() {

        try {

            $path = public_path('storage/media');
            $files = File::files($path);

            dd($files);
            return view('ftp.listfolders', compact('dirNames'));

        } catch ( Exception $ex ) {
            Log::error( $ex->getMessage() );
        }



    }

    public function getFiles( $directoryName ) {

        try {


            return view('backups/listfiles', compact('filesArr'));

        } catch (Exception $ex) {
            Log::error( $ex->getMessage() );
        }


    }

}
