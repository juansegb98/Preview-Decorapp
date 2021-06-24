<?php

namespace App\Http\Controllers;

use App\Liner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class LinerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $linerCollection = Liner::all();
        return $linerCollection;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Liner.create');
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
            'description'=>'required|string|max:100',
            'image'=>'required|mimes:jpeg,png|max:2028',
            'preview_image'=>'required|mimes:jpeg,png|max:2028'
        ]);
        if($request->hasFile('image')) {
            if($request->file('image')->isValid()){
                $imageName = $request->image->getClientOriginalName();
                //$extension = $request->image->extension();                
                // $imageName = $validData['name'].".".$extension;
                $request->image->move(base_path('public/storage/liners'), $imageName);

                $liner = new Liner();
                $liner->liner_src = $imageName;
                $liner->liner_pn = $request['pn'];
                $liner->liner_group = $validData['group'];
                $liner->liner_description =$validData['description'];

                if($request->hasFile('preview_image')) {
                    if($request->file('preview_image')->isValid()){
                        $imagePName = $request->preview_image->getClientOriginalName();
                        $request->preview_image->move(base_path('public/storage/liners'), $imagePName);
                        $liner->liner_src_preview = $imagePName;
                    }
                }

                $liner->save();
                Session::flash('message','Liner Created');
                return redirect('admin/home');
            }
        }
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($group)
    {
        if($group == "B" or $group == "C" or $group == "D" or $group == "E") {
            $linerCollection = Liner::whereIn('liner_group', ['B','C'])->get();
            return $linerCollection;
        } else {
            $linerCollection = Liner::where('liner_group','=',$group)->get();
            return $linerCollection;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $liner = Liner::findOrFail($id);
        return view('Liner.edit',[
            'liner'=> $liner
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
            'description'=> 'required|string|max:100',
            'new_image'=>'mimes:jpeg,png|max:2028',
            'new_preview_image'=>'mimes:jpeg,png|max:2028'

        ]);
        $liner = Liner::findOrFail($id);
        if($request->hasFile('new_image')) {
            if($request->file('new_image')->isValid()){
                $imageName = $request->new_image->getClientOriginalName();
                $request->new_image->move(base_path('public/storage/liners'), $imageName);
                File::delete(base_path('public/storage/liners').'/'.$liner->liner_src);                
                $liner->liner_src = $imageName;
                
            }
        }
        if($request->hasFile('new_preview_image')) {
            if($request->file('new_preview_image')->isValid()){
                $imagePName = $request->new_preview_image->getClientOriginalName();
                $request->new_preview_image->move(base_path('public/storage/liners'), $imagePName);
                File::delete(base_path('public/storage/liners').'/'.$liner->liner_src_preview);                
                $liner->liner_src_preview = $imagePName;
                
            }
        }
        $liner->liner_pn = $request['pn'];
        $liner->liner_group = $request['group'];
        $liner->liner_description = $request['description'];
        $liner->save();
        Session::flash('message','Liner Updated');
        return redirect('admin/home');
        // abort(500, 'Could not upload image :(');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $liner = Liner::findOrFail($id);
        //$imagePath = \public_path('/storage/liners').'/'.$liner->liner_src;
        File::delete(base_path('public/storage/liners').'/'.$liner->liner_src);
        File::delete(base_path('public/storage/liners').'/'.$liner->liner_src_preview);
        $liner->delete();
        Session::flash('messageD','Liner Deleted');

        return redirect('admin/home');
    }
}
