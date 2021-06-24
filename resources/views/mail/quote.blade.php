@extends('base')
@section('title')
My Quote
@endsection
@section('content')
<style type="text/css">

/* 
.design-container{
    float: none !important;
    margin: 0 auto 0 auto;
    position: relative;
    width: 200px;
    border: 1px solid black;
    height: 120px;
}

.frame{

 background-size: 100% 100% !important;
 border: 1px solid #232323;
 height: 100%;
 width: 100%;

}



.liner{

 position: absolute;
 left: 5%;
 top: 7%;
 height: 85%;
 width: 90.2%;
 background-size: 100% 100% !important;
}



.art{
 height: 79%;
 position: absolute;
 left: 7%;
 top: 10%;
 width: 85.8%;

}
#elements img {
    width: 150px;
    height: 130px;
    object-fit: contain;
} */

</style>
<div class="container">
    <div class="row px-4 m-4" >
        <div class="mx-auto">
            <img src="{{asset('/storage/av_logo.png')}}" style="object-fit: contain;" width="100" alt="">
        </div>
        <h1>Quote</h1>
    </div>

    
    
    
    <h3>Design</h3>
    
    <div class="row col-md-12">
        <div class="design-container">
            @if ($frame)
            <div class="frame col-4"><img src="{{asset('storage/frames/'.$frame->frame_src)}}" width="150" height="100" style="margin: 5px;" alt=""></div>
            @endif
            @if($liner)
            <div class="liner col-4"><img src="{{asset('storage/liners/'.$liner->liner_src)}}" width="150" height="100" style="margin: 5px;" alt=""></div>
            @endif
            @if ($art == "custom")
            <div class="art col-4"><img src="{{asset('storage/temporaryArts/'.$userImagePath)}}" width="150" height="100" style="margin: 5px;" alt=""></div>
            @elseif($art)
            <div class="art col-4"><img src="{{asset('storage/arts/'.$art->art_src)}}" width="150" height="100" style="margin: 5px;" alt=""></div>
            @endif
        </div>
    </div>
    
    
    
    
    

    <hr>

    <h3>Product: </h3>
    <div class="row col-md-12">
        <div class="col">TV Diagonal: {{$tvSize}}"</div>
        @if($externalSpeakers == "true")
        <div class="col">External Speakers: Yes</div>
        @else
        <div class="col">External Speakers: No</div>
        @endif
    </div>

    <hr>

    <h3>Frame:</h3>
    <div class="row col-md-12">
        <div class="col-md-4">Group: {{$frame->frame_group}}</div>
        <div class="col-md-4">P/N: {{$frame->frame_pn}}</div>
        <div class="col-md-4">Description: {{$frame->frame_description}}</div>        
    </div>

    <hr>

    <h3>Liner:</h3>
    <div class="row col-md-12">
        <div class="col-md-4">Group: {{$frame->frame_group}}</div>
        <div class="col-md-4">P/N: {{$liner->liner_pn}}</div>
        <div class="col-md-4">Description: {{$liner->liner_description}}</div>        
    </div>

    <hr>

    <h3>Art:</h3>
    <div class="row col-md-12">
    @if($art == "custom")
        <div class="col-md-4">Gallery: Your own art</div>
        <div class="col-md-4">P/N: N/A</div>
    @else
        <div class="col-md-4">Gallery: {{$art->art_gallery}}</div>
        <div class="col-md-4">P/N: {{$art->art_pn}}</div>
        <div class="col-md-4">Description: {{$art->art_description}}</div>
    @endif
    </div>
    <hr>

    <h3>Price</h3>
    <div class="row col-md-12 mb-5">
        <div class="col-md-4">MSRP: {{$msrp}}</div>
        <div class="col-md-4">Royalty Fee: {{$royaltyFee}}</div>
        <div class="col-md-4" style="font-size: large;">Total: {{$totalPrice}}</div>
    </div>

    <div class="card bg-light mb-3 col-12 mx-auto px-0" >
        <div class="card-header"></div>
        <div class="card-body">
            <!-- <h5 class="card-title">Important information</h5> -->
            @if($externalSpeakers == "true")
            <p class="">Thank you for your DECORATV EXTRA inquiry. This is a preliminary quote.  Whenever you are ready to place the order, please enter the information in the designer tool and select <a href="url:('/')" class="alert-link">ORDER</a>.</p>
            @else
            <p class="">Thank you for your DECORATV BASIC inquiry. This is a preliminary quote.  Whenever you are ready to place the order, please enter the information in the designer tool and select <a href="url:('/')" class="alert-link">ORDER</a>.</p>
            @endif
            <p class="">Prices are in USD and include Control System & Freight within Continental USA.</p>
            <p>Freight prepaid only applies for orders shipped complete in one shipment.</p>
            <p>Partial shipments or parts do NOT include freight.</p>

            <p class="card-title text-danger">Important</p>
            <ul>
                <li>Some 3D TVs have dynamic contrast control function that adjusts the brightness according to the room's ambient light.  The DECORATV system will not allow this function to work.</li>
                <li>DECORATV is a CUSTOM PRODUCT. It CANNOT BE CANCELLED. It CANNOT BE RETURNED.</li>
                <li>All orders require 50% deposit before production and 50% before shipping.</li>
                <li>The estimated ship date is APPROXIMATELY 15 business days after the confirmation and payment are received. This may be subject to change.</li>
            </ul>
            <p class="card-text">If you have any questions, please call Michael at <a href="tel:+19545365055" > +1 954 536 5055</a> or email him at<a href="mailto:mike@avisp.co" > mike@avisp.co</a></p>
        </div>
    </div>

</div>
@endsection