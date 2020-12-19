<?php

namespace App\Http\Controllers\Dashboard\Widget;

use App\Group;
use App\Image;
use Illuminate\Http\Request;
use App\Http\Requests\SaveImage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $images = Image::paginate(15);
        return view('dashboard.widgets.image.index',compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::pluck('id','name');
        $image = new Image();
        return view('dashboard.widgets.image.create',compact('groups','image'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveImage $request)
    {
        
        $filename = time() .'.'. $request->url->extension();

        $request->url->move(public_path('images'),$filename);

        $data = $request->validated();
        $data['url'] = $filename;

        Image::create($data);

        return back()->with('status','Elemento creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        $groups = Group::pluck('id','name');
        return view('dashboard.widgets.image.edit',compact('groups','image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(SaveImage $request, Image $image)
    {

        $filename = time() .'.'. $request->url->extension();

        $request->url->move(public_path('images'),$filename);

        $data = $request->validated();
        $data['url'] = $filename;

        $this->deleteImage($image->url);

        $image->update($data);
        return back()->with('status','Actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        $this->deleteImage($image->url);
        $image->delete();
        return back()->with('status','Eliminado con éxito');
    }

    private function deleteImage($url){
        if(File::exists(public_path('images').'/'.$url)){
            File::delete(public_path('images').'/'.$url);
        }
    }
}
