<?php

namespace App\Http\Controllers\Kurban;

use App\Http\Controllers\Controller;
use App\Models\Kamera;
use Illuminate\Http\Request;
use Pion\Laravel\ChunkUpload\Exceptions\UploadFailedException;
use Storage;

use App\Video;


class KameraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('kamera.index');
    }
    public function buyukbas()
    {
        //
        return view('buyukbas.kamera');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /**
     * Handles the file upload
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @throws UploadMissingFileException
     * @throws \Pion\Laravel\ChunkUpload\Exceptions\UploadFailedException
     */
    public function buyukbasSave(Request $request)
    {
       request()->validate([
         'file'  => 'required|mimes:mp4,docx,pdf,txt|max:2000048',
       ]);

        if ($files = $request->file('file')) {

            //store file into document folder
            $file = $request->file->storeAs('public/documents','BB-'.$request->tittle.'.mp4');

            //store your file into database
            $document = new Video();
            $document->title = 'BB-'.$request->tittle;
            $document->video = $file;
            $document->no=$request->tittle;
            $document->tur='BüyükBaş';
            $document->save();

            return Response()->json([
                "success" => true,
                "file" => $file,
                "result"=>'sıkıştı'
            ]);

        }

        return Response()->json([
                "success" => false,
                "file" => '',

          ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kamera  $kamera
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kamera  $kamera
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kamera  $kamera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kamera  $kamera
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
