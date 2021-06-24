@extends('base')
@section('title')
Thank you!
@endsection
@section('content')
<div class="container bg-light">
    <a href="/" class="btn btn-light"> < Home</a>
    <div class="border rounded bg-white">
        <div class="row px-4 m-4" >
            <div class="col">
                <img class="mt-3" src="{{asset('/storage/decoratv_logo.png')}}" style="object-fit: contain;" alt="">
            </div>
            <div class="mx-auto">
                <img src="{{asset('/storage/av_logo.png')}}" style="object-fit: contain;" width="100" alt="">
            </div>
        </div>
        <div class="row p-3">
            <div class="col-12">
                <div class="card text-success border-success mb-3 mx-auto col-md-6 px-0">
                    <div class="card-header bg-success text-white">Congratulations!</div>
                    <div class="card-body text-success">
                        <h5 class="card-title">Order placed successfully</h5>
                        <p class="card-text">Please make sure to follow the instructions that were sent to your email to continue with the process.</p>
                    </div>
                </div>
                <div class="col-12">
                    <p class="mx-auto" style="text-align:center">If you have any questions, please contact Michael Shaffer at <a href="callto:19545365055">+1 954-536-5055</a> or email him at <a href="mailto:mike@avisp.co">mike@avisp.co</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection