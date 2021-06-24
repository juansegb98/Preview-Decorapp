@extends('base')
@section('title')
Print Design
@endsection
@section('content')
<style type="text/css">

@media print
{
title {display:none;}
}

.design-container{
    float: none !important;
    margin: 0;
    position: relative;
    width: 100%;
    border: 1px solid black;
    height: 40em;
}

.frame{

 background-size: 100% 100% !important;
 border: 1px solid #232323;
 height: 100%;
 width: 100%;

}


/* Liner  */

.liner{

 position: absolute;
 left: 5%;
 top: 7%;
 height: 85%;
 width: 90.2%;
 background-size: 100% 100% !important;
}


/* art */

.art{
 height: 79%;
 position: absolute;
 left: 7%;
 top: 10%;
 width: 85.8%;
}

#elements img {
    object-fit: contain;
}

footer {
    visibility: hidden;
}

footer div.col {
    position: absolute;
    bottom: 3%;
}

@page {
    size: auto;   /* auto is the initial value */
    margin: 0;  /* this affects the margin in the printer settings */
}
@media print
{
footer {visibility:visible;}
}
</style>
<div class="container">
    <div class="row">
        <div class="col offset-5 mt-4">
            <img src="storage/av_logo.png" width="100" height="79" class="" alt="">
        </div>
    </div>
    <h1>My design</h1>

    <div class="design-container">
        @if ($frame)
        <div class="frame"><img src="storage/frames/{{$frame->frame_src}}" width="100%" height="100%" alt=""></div>
        @endif
        @if($liner)
        <div class="liner"><img src="storage/liners/{{$liner->liner_src}}" width="100%" height="100%" alt=""></div>
        @endif
        @if ($art)
        <div class="art"><img src="storage/arts/{{$art->art_src}}" width="100%" height="100%" alt=""></div>
        @endif
        @if ($userImagePath)
        <div class="art"><img src="storage/temporaryArts/{{$userImagePath}}" width="100%" height="100%" alt=""></div>
        @endif
    </div>

    <div class="row my-4" id="elements">
        @if ($frame)
        <div class="col-4" >
            <img src="{{asset('storage/frames/'.$frame->frame_src)}}" width="100%" class="mb-3" height="100%" alt=""> <br>
        </div>
        @endif
        @if($liner)
        <div class="col-4" >
            <img src="{{asset('storage/liners/'.$liner->liner_src)}}" width="100%" class="mb-3" height="100%" alt=""> <br>
        </div>
        @endif
        @if ($art)
        <div class="col-4" >
            <img src="{{asset('storage/arts/'.$art->art_src)}}" width="100%" class="mb-3" height="100%" alt=""> <br>            
        </div>
        @endif
        @if ($userImagePath)
        <div class="col-4" >
            <img src="{{asset('storage/temporaryArts/'.$userImagePath)}}" width="100%" class="mb-3" height="100%" alt="">            
        </div>
        @endif
    </div>
    <div class="row mb-4">
    @if ($frame)
        <div class="col-4" style="height: fit-content;">
            <h4>Group: {{$frame->frame_group}}</h4>
            <h4>P/N: {{$frame->frame_pn}}</h4>
            <h4>Description: {{$frame->frame_description}}</h4>
        </div>
        @endif
        @if($liner)
        <div class="col-4" style="height: fit-content;">
            <h4>Group: {{$liner->liner_group}}</h4>
            <h4>P/N: {{$liner->liner_pn}}</h4>
            <h4>Description: {{$liner->liner_description}}</h4>
        </div>
        @endif
        @if ($art)
        <div class="col-4" style="height: fit-content;">
            <h4>Gallery: {{$art->art_gallery}}</h4>
            <h4>P/N: {{$art->art_pn}}</h4>
            <h4>Description: {{$art->art_description}}</h4>
        </div>
        @endif
        @if ($userImagePath)
        <div class="col-4" style="height: fit-content;">
            <h4>Gallery: Your own art</h4>
            <h4>P/N: N/A</h4>
            
        </div>
        @endif
    </div>

    <div class="row mt-4">
        <div class="col mt-3">
            <p style="text-align: center; font-size:large">
            Thank you for your inquiry. <br>
                This PRINT is only to provide a visual effect of the final product. <br>
                If you would like to receive pricing, please register. <br>
                If you have any questions, please contact Michael Shaffer at <a href="callto:+19545365055">+1 954-536-5055<a> or email him at <a href="mailto:mike@avisp.co">mike@avisp.co</a>
            </p>
        </div>
    </div>
    <footer>
        <div class="row mt-4 pt-4">
            <div class="col">www.avisp.co</div>
            <div class="col offset-9">Page 1 of 1</div>
        </div>
    </footer>
</div>

<script>
    window.onload = function () {
        window.print();
    }
</script>

@endsection