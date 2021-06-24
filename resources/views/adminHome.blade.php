@extends('base')
@section('title')
Admin Section
@endsection
@section('headings')
<script src="{{ asset('js/adminPage.js') }}"></script>
@endsection
@section('content')
<div class="container">
<a href="/" class="btn btn-light"> < Design Section</a>

<div class="row mt-3 mx-auto align-content-center">
    <!-- Arts Section -->
    <div class="col-xl-4 col-md-8 mx-auto mt-3">
        <div class="row btn btn-dark mx-auto mb-3 px-xl-2 w-100" onclick="tableMaker('arts')">Arts</div>
        <div id="table-arts" class="w-100 px-xl-2">
        </div>
    </div>
    <!-- Frames Section -->
    <div class="col-xl-4 col-md-8 mx-auto mt-3">
        <div class="row btn btn-dark mx-auto mb-3 px-xl-2 w-100" onclick="tableMaker('frames')" >Frames</div>
        <div id="table-frames" class="w-100 px-xl-2"></div>
    
    </div>
    <!-- Liners Section -->
    <div class="col-xl col-md-8 mx-auto  mt-3">
    <div class="row btn btn-dark mx-auto mb-3 px-xl-2 w-100" onclick="tableMaker('liners')" >Liners</div>
        <div id="table-liners" class="w-100 px-xl-2"></div>
    </div>
</div>

    @if(!empty(Session::get('message')))

<div class="col-4">
    <div class="alert alert-success">
        <ul>
                <li>{{Session::get('message')}}</li>
        </ul>
    </div>
</div>
        @endif

        @if(!empty(Session::get('messageD')))

<div class="col-4">
    <div class="alert alert-danger">
        <ul>
                <li>{{Session::get('messageD')}}</li>
        </ul>
    </div>
</div>
        @endif


    <!-- CONFIRM DELETE MODAL -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <div class="alert alert-danger" role="alert" id="feedback-message">
                    Are you sure you want to delete this item?
                </div>
                <form id="deleteConfirmation" method="POST">
                @csrf
                @method('delete')             
                <!-- <button class="btn btn-primary" type="submit">Delete</button> -->
                </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    <button type="submit" form="deleteConfirmation" id="deleteConfirmationButton" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
