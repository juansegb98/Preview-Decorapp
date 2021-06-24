@extends('base')

@section('title')
Create Art
@endsection

@section('content')
<div class="container">
    <div class="row">
         <div class="col">         
            <h1>Create Art</h1>
         </div>
    </div>
    <div class="row p-0">
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
            <form action="{{ url('arts') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-8 col-lg-6">
                        <div class="form-group">
                                <div class="col bg-white rounded border p-2 ">
                                    <label for="art_description">Art Description:</label>
                                    <input type="text" class="form-control col-md-8" id="art_description" name="art_description" placeholder="Type a description" value="{{ old('description') }}"><br>
                                    <label for="art_gallery">Gallery:</label>
                                    <input type="text" class="form-control col-md-8" id="art_gallery" name="art_gallery" placeholder="Type a gallery" value="{{ old('gallery') }}" ><br>
                                    <label for="art_pn">Pn:</label>
                                    <input type="text" class="form-control col-md-8" id="art_pn" name="art_pn" placeholder="Type a pn" value="{{ old('pn') }}" ><br>
                                    <label for="image">Upload image</label>
                                    <input type="file" class="form-control-file col-md-10 col-lg-8" id="image" name="image">
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