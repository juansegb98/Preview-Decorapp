@extends('base')

@section('title')
Edit Liner
@endsection

@section('content')
<div class="container">
    <div class="row">
         <div class="col">         
            <h1>Edit Liner {{$liner->liner_id}}</h1>
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
            <form action="{{ url('liners/'.$liner->liner_id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                                <div class="col bg-white rounded border p-2 " >
                                    <label for="liner_group">Group:</label>
                                    <input type="text" class="form-control col-md-4 " id="liner_group" name="group" placeholder="Type a group" value="{{ $liner->liner_group}}">
                                    <label for="liner_pn">P/N:</label>
                                    <input type="text" class="form-control col-md-4" id="liner_pn" name="pn" placeholder="Type a pn" value="{{ $liner->liner_pn}}">
                                    <label for="liner_description">Description:</label>
                                    <input type="text" class="form-control col-md-4" id="liner_description" name="description" placeholder="Type a description" value="{{ $liner->liner_description}}"><br>
                                    <label type="text" for="src">Image File Name:</label>
                                    <input type="text" class="form-control col-md-10 col-lg-8" id="liner_src" name="src" value="{{ $liner->liner_src}}" readonly>
                                    <label for="new_image">Change image</label>
                                    <input type="file" class="form-control-file" id="new_image" name="new_image"><br>
                                    <label type="text" for="src">Preview File Name:</label>
                                    <input type="text" class="form-control col-md-10 col-lg-8" id="liner_src_preview" name="src" value="{{ $liner->liner_src_preview}}" readonly>
                                    <label for="new_preview_image">Change preview image</label>
                                    <input type="file" class="form-control-file" id="new_preview_image" name="new_preview_image">
                                </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <label for="image">Liner Image:</label>
                            <img width="300px" height="100%" src="{{ asset('storage/liners/'. $liner->liner_src) }}" alt="">
                        </div>
                        <div class="row my-2">
                            <label for="image">Preview Image:</label>
                            <img width="100px" height="100%" src="{{ asset('storage/liners/'. $liner->liner_src_preview) }}" alt="">
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Update</button>
            </form>
        </div>
    </div>

</div>
@endsection