<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Files List|File Create|File Edit|File Delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:File Create', ['only' => ['create', 'store']]);
        $this->middleware('permission:File Edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:File Delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = File::where('user_id',Auth::user()->id)->where('file_type','video')->get();
        $voices = File::where('user_id',Auth::user()->id)->where('file_type', 'voice')->get();
        return view('files.index',compact('videos','voices'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('files.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['user_id'] = Auth::user()->id;
        if ($request->file_type == 'video') {
            $request->validate([
                'file_memo' => 'required',
                'file_type' => 'required|in:video,voice',
                'file' => 'file|mimes:mp4,wav',
            ]);
            $ext = $request->file->extension();
            $vidName = uniqid() . "." . $ext;
            $request->file->move(public_path("media/videos/"), $vidName);
            $input['file_type'] = 'video';
            $input['file_name'] = $vidName;
        }else{
            $request->validate([
                'file_memo' => 'required|string|max:50',
                'file_type' => 'required|in:video,voice',
                'file' => 'file|mimes:mp3,wav|max:10240',
            ]);
            $ext = $request->file->extension();
            $voiceName = uniqid() . "." . $ext;
            $request->file->move(public_path("media/voices/"), $voiceName);
            $input['file_type'] = 'video';
            $input['file_name'] = $voiceName;
        }
        File::create($input);
        return redirect(route('files.index'))->with(['success'=>'Your File Uploaded Successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $file = File::find($id);
        if($file->user_id == Auth::user()->id){
            return view('files.show',compact('file'));
        }else{
            abort(403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        //
    }
}
