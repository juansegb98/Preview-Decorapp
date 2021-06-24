@extends('base')

@section('title')
Edit Frame
@endsection

@section('content')
<div class="container">
    <div class="row">
         <div class="col">         
            <h1>Edit Frame {{$frame->frame_id}}</h1>
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
            <form action="{{ url('/frames/'.$frame->frame_id) }}" method="POST" enctype="multipart/form-data">
            <!-- <form action="{{ route('frames.update',[$frame->frame_id]) }}" method="POST" enctype="multipart/form-data"> -->
                @csrf
                @method('put')
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                                <div class="col  bg-white rounded border p-2 ">
                                    <label for="name">Group:</label>
                                    <input type="text" class="form-control col-md-4" id="frame_name" name="group" value="{{ $frame->frame_group}}"><br>
                                    <label for="pn">P/N:</label>
                                    <input type="text" class="form-control col-md-4" id="frame_pn" name="pn" value="{{ $frame->frame_pn}}">
                                    <label for="frame_description">Description</label>
                                    <input type="text" class="form-control col-md-6" id="frame_description" name="description" value="{{ $frame->frame_description}}"><br>
                                    <label type="text" for="src">Image File Name:</label>
                                    <input type="text" class="form-control col-md-10 col-lg-8" id="frame_src" name="src" value="{{ $frame->frame_src}}" readonly>
                                    <label for="new_image">Change image</label>
                                    <input type="file" class="form-control-file" id="new_image" name="new_image"><br>
                                    <label type="text" for="src">Preview File Name:</label>
                                    <input type="text" class="form-control col-md-10 col-lg-8" id="frame_src_preview" name="src" value="{{ $frame->frame_src_preview}}" readonly>
                                    <label for="new_preview_image">Change preview image</label>
                                    <input type="file" class="form-control-file" id="new_preview_image" name="new_preview_image">
                                </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <label for="image">Frame Image:</label>
                            <img width="300px" height="100%" src="{{ asset('storage/frames/'. $frame->frame_src) }}" alt="">
                        </div>
                        <div class="row my-2">
                            <label for="image">Preview Image:</label>
                            <img width="100px" height="100%" src="{{ asset('storage/frames/'. $frame->frame_src_preview) }}" alt="">
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Update</button>
            </form>
        </div>
    </div>

</div>
@endsection