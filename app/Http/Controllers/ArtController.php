<?php

namespace App\Http\Controllers;

use App\Art;
use App\Autor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;


class ArtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artCollection = Art::all();
    
        return $artCollection;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Art.create');
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
            'art_description'=>'required|max:300',
            'art_pn'=>'required|min:3|max:150',
            'art_gallery'=>'required|min:3|max:300',
            'image'=>'required|mimes:jpeg,png|max:3042'
        ]);
        if($request->hasFile('image')) {
            if($request->file('image')->isValid()){

                $imageName = $request->image->getClientOriginalName();
                //$extension = $request->image->extension();                
                // $imageName = $validData['name'].".".$extension;
                $request->image->move(base_path('public/storage/arts'), $imageName);

                $art = new Art();
                $art->art_description = $validData['art_description'];
                $art->art_src = $imageName;
                $art->art_pn = $request['art_pn'];
                $art->art_gallery = $request['art_gallery'];
                $art->save();
                Session::flash('message','Art Created');
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
    public function show($galleryName)
    {
        if($galleryName == "artCollections"){
            $artCollection = Art::orderBy('art_src')->get();
            $galleryName = null;
        } else {
            $autorCorrected = str_replace("_"," ",$galleryName);
            $artCollection = Art::where('art_gallery','=',$autorCorrected)->get();
            $galleryName = Autor::where('autor_name','=', $autorCorrected)->first();
        }

        $response = ['artCollection' => $artCollection, 'galleryName' => $galleryName];
        return $response;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $art = Art::findOrFail($id);
        return view('Art.edit',[
            'art'=> $art,
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
            'description'=>'required|max:300',
            'pn'=>'required|min:3|max:150',
            'gallery'=>'required|min:3|max:300',
            'new_image'=>'mimes:jpeg,png|max:2028'
        ]);
        $art = Art::findOrFail($id);
        if($request->hasFile('new_image')) {
            if($request->file('new_image')->isValid()){
                $imageName = $request->new_image->getClientOriginalName();
                //$extension = $request->image->extension();                
                // $imageName = $validData['name'].".".$extension;
                $request->new_image->move(base_path('public/storage/arts'), $imageName);
                File::delete(base_path('public/storage/arts').'/'.$art->art_src);                
                $art->art_src = $imageName;
                
            }
        }
        $art->art_description = $request['description'];
        $art->art_pn = $request['pn'];
        $art->art_gallery = $request['gallery'];
        $art->save();
        Session::flash('message','Art Updated');
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
        $art = Art::findOrFail($id);
        //$imagePath = \public_path('/storage/arts').'/'.$art->art_src;
        File::delete(base_path('public/storage/arts').'/'.$art->art_src);
        $art->delete();
        Session::flash('messageD','Art Deleted');

        return redirect('admin/home');
    }
}
