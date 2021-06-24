@extends('base')
@section('title')
My Order
@endsection
@section('content')

<div class="container">

        <div class="row px-4 m-4" >
        <div class="mx-auto">
            <img src="{{asset('/storage/av_logo.png')}}" style="object-fit: contain;" width="100" alt="">
        </div>
        <h1>Order</h1>
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
        <div class="col">Speaker Location: {{$speakerLocation}}</div>
        @else
        <div class="col">External Speakers: No</div>
        @endif
        <div class="col">Mounting: {{$mounting}}</div>
        <div class="col">Control System: {{$controlSystem}}</div>
        <div class="col"> Voltage: {{$voltage}}</div>
        @if($poNumber)
        <div class="col">PO#: {{$poNumber}}</div>
        @endif
        @if($notes)
        <div class="col">Notes: {{$notes}}</div>
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

    <hr>

    <div class="row">
        <div class="col-md-6">
        <h3>Contact Info:</h3>
            <div class="col">Name: {{ Auth::user()->user_nicename }}</div>
            <div class="col">Company: {{ Auth::user()->ememberUser->company_name }}</div>
            <div class="col">Email: {{ Auth::user()->user_email }}</div>
            <div class="col">Phone # : {{ Auth::user()->ememberUser->phone }}</div>
            <div class="col">Address: {{ Auth::user()->ememberUser->address_street }}</div>
            <div class="col">City: {{ Auth::user()->ememberUser->address_city }}</div>
            <div class="col">State: {{Auth::user()->ememberUser->address_state}}</div>
            <div class="col">Zip code: {{ Auth::user()->ememberUser->address_zipcode }}</div>
            <div class="col">Country: {{ Auth::user()->ememberUser->country }}</div><br>
        </div>
        <div class="col-md-6">
        <h3>Shipping Info:</h3>
            <div class="col">Name: {{$name}}</div>
            <div class="col">Email: {{$email}}</div>
            <div class="col">Phone # : {{$phone}}</div>
            <div class="col">Address: {{$address}}</div>
            <div class="col">City: {{$city}}</div>
            <div class="col">State: {{$state}}</div>
            <div class="col">Zip code: {{$zip}}</div>
            <div class="col">Country: {{$country}}</div>
            <div class="col">Type of Address: {{$addressType}}</div>
            <div class="col">Lift Gate: {{$liftgate}}</div>
        </div>
    </div>
    <hr>

    <div class="card bg-light mb-3 col-12 mx-auto px-0" >
        <div class="card-header">Important information</div>
        <div class="card-body">
            <!-- <h5 class="card-title">Important information</h5> -->
            @if($externalSpeakers == "true")
                <p>Thank you for your DECORATV EXTRA order.</p>
                <p>Prices are in USD and include Control System & Freight within Continental USA. Freight prepaid only applies for orders shipped complete in one shipment. Partial shipments or parts do NOT include freight.</p>
                @else
                <p>Thank you for your DECORATV BASIC order.</p>
                <p>DECORATV BASIC prices are in USD and include Control System & Freight within Continental USA. Freight prepaid only applies for orders shipped complete in one shipment. Partial shipments or parts do NOT include freight.</p>
                @endif
                <p class="card-title text-danger">Important</p>
            <ul>
                <li>Some 3D TVs have dynamic contrast control function that adjusts the brightness according to the room's ambient light.  The DECORATV system will not allow this function to work.</li>
                <li>DECORATV is a CUSTOM PRODUCT. It CANNOT BE CANCELLED. It CANNOT BE RETURNED.</li>
                <li>All orders require 50% deposit before production and 50% before shipping.</li>
                <li>The estimated ship date is APPROXIMATELY 15 business days after the confirmation and payment are received. This may be subject to change.</li>
            </ul>
            <p>To enter this order in production, please review it and REPLY to this email with the word “CONFIRMED”.</p>
            <p>Someone from our staff will contact you within 24 hours.</p>
            <p>If you have any questions, please contact Michael Shaffer at <a href="callto:19545365055">+1 954-536-5055</a> or email him at <a href="mailto:mike@avisp.co">mike@avisp.co</a></p>
        </div>
    </div>
</div>
@endsection