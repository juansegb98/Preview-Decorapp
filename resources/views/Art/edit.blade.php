@extends('base')

@section('title')
Edit Art
@endsection

@section('content')
<div class="container">
    <div class="row">
         <div class="col">         
            <h1>Edit Art {{$art->art_id}}</h1>
         </div>
    </div>
    <div class="row">
        <div class="col p-0">
        <a class="btn btn-light" href="{{ url('/admin/home') }}">Back</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ url('arts/'.$art->art_id) }}" method="POST" id="update-form" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                                <div class="col  bg-white rounded border p-2 " >
                                    <label for="art_description">Art Description:</label>
                                    <input type="text" class="form-control col-md-6" id="art_description" name="description" value="{{ $art->art_description }}"><br>
                                    <label for="art_gallery">Gallery:</label>
                                    <input type="text" class="form-control col-md-6" id="art_gallery" name="gallery" value="{{ $art->art_gallery }}"><br>
                                    <label for="art_pn">P/N:</label>
                                    <input type="text" class="form-control col-md-6" id="art_pn" name="pn" value="{{ $art->art_pn }}"><br>
                                    <label type="text" for="art_src">File Name:</label><br>
                                    <input type="text" class="form-control col-md-10 col-lg-8" id="art_src" name="src" value="{{ $art->art_src}}" readonly><br>
                                    <label for="new_image">Change preview image</label>
                                    <input type="file" class="form-control-file " id="new_image" name="new_image">
                                </div>
                        </div>
                    </div>
                    <div class="col ">
                        <label for="image" class="my-auto">Preview:</label>
                        <img class="my-auto" width=300 src="{{ asset('storage/arts/'. $art->art_src) }}" alt="">
                    </div>
                </div>
                <button class="btn btn-primary" type="submit" form="update-form">Update</button>
            </form>
        </div>
    </div>

</div>
@endsection