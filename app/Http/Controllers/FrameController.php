<?php

namespace App\Http\Controllers;

use App\Frame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class FrameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $frameCollection = Frame::all();
        return $frameCollection;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Frame.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validData = $request->validate([
            'pn'=>'required|min:3|max:150',
            'group'=>'required|string|max:11',
            'description'=> 'required|string|max:100',
            'image'=>'required|mimes:jpeg,png|max:20280',
            'preview_image'=>'required|mimes:jpeg,png|max:20280'
        ]);
        if($request->hasFile('image')) {
            if($request->file('image')->isValid()){
                $imageName = $request->image->getClientOriginalName();
                //$extension = $request->image->extension();                
                // $imageName = $validData['name'].".".$extension;
                $request->image->move(base_path('public/storage/frames'), $imageName);

                $frame = new Frame();
                $frame->frame_src = $imageName;
                $frame->frame_pn = $request['pn'];
                $frame->frame_group = $validData['group'];
                $frame->frame_description = $validData['description'];

                if($request->hasFile('preview_image')) {
                    if($request->file('preview_image')->isValid()){
                        // $imagePName = time().'_preview.'.$request->image->getClientOriginalName();
                        $imagePName = $request->preview_image->getClientOriginalName();
                        $request->preview_image->move(base_path('public/storage/frames'), $imagePName);
                        $frame->frame_src_preview = $imagePName;
                    }
                }

                $frame->save();
                Session::flash('message','Frame Created');
                return redirect('admin/home');
            }
        }
        abort(500, 'Could not upload image :(');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($group)
    {
        if($group == "All"){
            $frameCollection = Frame::orderBy('frame_pn')->get();
        }else{
            $frameCollection = Frame::where('frame_group','=',$group)->orderBy('frame_pn')->get();
        }
        return $frameCollection;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $frame = Frame::findOrFail($id);
        return view('Frame.edit',[
            'frame'=> $frame
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validData = $request->validate([
            'pn'=>'required|min:3|max:150',
            'group'=>'required|string|max:11',
            'new_image'=>'mimes:jpeg,png|max:20280',
            'new_preview_image'=>'mimes:jpeg,png|max:20280'

        ]);
        $frame = Frame::findOrFail($id);
        if($request->hasFile('new_image')) {
            if($request->file('new_image')->isValid()){
                $imageName = $request->new_image->getClientOriginalName();
                $request->new_image->move(base_path('public/storage/frames'), $imageName);
                File::delete(base_path('public/storage/frames').'/'.$frame->frame_src);                
                $frame->frame_src = $imageName;
                
            }
        }
        if($request->hasFile('new_preview_image')) {
            if($request->file('new_preview_image')->isValid()){
                $imagePName = $request->new_preview_image->getClientOriginalName();
                $request->new_preview_image->move(base_path('public/storage/frames'), $imagePName);
                File::delete(base_path('public/storage/frames').'/'.$frame->frame_src_preview);                
                $frame->frame_src_preview = $imagePName;
                
            }
        }
        $frame->frame_pn = $request['pn'];
        $frame->frame_group = $request['group'];
        $frame->frame_description = $request['description'];
        $frame->save();
        Session::flash('message','Frame Updated');
        return redirect('admin/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $frame = Frame::findOrFail($id);
        //$imagePath = \public_path('/storage/frames').'/'.$frame->frame_src;
        File::delete(base_path('public/storage/frames').'/'.$frame->frame_src);
        File::delete(base_path('public/storage/frames').'/'.$frame->frame_src_preview);
        $frame->delete();
        Session::flash('messageD','Frame Deleted');

        return redirect('admin/home');
    }
}
