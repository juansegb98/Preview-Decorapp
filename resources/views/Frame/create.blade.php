@extends('base')

@section('title')
Create Frame
@endsection

@section('content')
<div class="container">
    <div class="row">
         <div class="col">         
            <h1>Create Frame</h1>
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
            <form action="{{ url('frames') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-8 col-lg-6">
                        <div class="form-group">
                                <div class="col justify-content-md-center bg-white rounded border p-2 ">
                                    <label for="frame_group">Group:</label>
                                    <input type="text" class="form-control col-md-4 " id="frame_group" name="group" placeholder="Type a group" value="{{ old('group')}}">
                                    <label for="frame_pn">P/N:</label>
                                    <input type="text" class="form-control col-md-4 " id="frame_pn" name="pn" placeholder="Type a pn" value="{{ old('pn')}}">
                                    <label for="frame_description">Description:</label>
                                    <input type="text" class="form-control col-md-4 " id="frame_description" name="description" placeholder="Type a description" value="{{ old('description')}}"><br>
                                    
                                    <label for="image">Upload image:</label>
                                    <input type="file" class="form-control-file  " id="image" name="image"><br>
                                    <label for="preview_image">Upload preview image:</label>
                                    <input type="file" class="form-control-file  " id="preview_image" name="preview_image">
                                    
                                </div>
                        </div>
                    </div>
                    
                </div>
                <button class="btn btn-primary" type="submit">Create</button>
            </form>
        </div>
    </div>

</div>
@endsection