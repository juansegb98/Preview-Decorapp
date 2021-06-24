@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
                @if(session('message'))

                <div class="mt-4">
                    <div class="alert alert-success">
                        <ul>
                                <li>{{session('message')}}</li>
                        </ul>
                    </div>
                </div>
                @endif
        </div>
    </div>
</div>
@endsection
