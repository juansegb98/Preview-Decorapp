@extends('base')
@section('title')
Thank You
@endsection
@section('content')
<div class="container">
    <h3>Thank you for registering.</h3>

    <p>Someone from our staff will contact you within 24 hours.</p>

    <p >If you have any inmediate questions, please contact Michael Shaffer at <a href="callto:19545365055">+1 954-536-5055</a> or email him at <a href="mailto:mike@avisp.co">mike@avisp.co</a></p>
    <img width="150" height="100" class="ml-2 mt-5" src="{{asset('/storage/av_logo_color.jpg')}}" alt="">
</div>

@endsection