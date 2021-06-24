@extends('base')
@section('title')
My Order
@endsection
@section('content')

<div class="container">
    <div class="row px-4 m-4" >
        <div class="mx-auto">
            <img src="{{url('/storage/av_logo.png')}}" style="object-fit: contain;" width="100" alt="">
        </div>
        <h1>Checkout</h1>
    </div>
    <div class="border rounded bg-white p-4 mb-4">
        <div class="row">
            @foreach($framesCollection as $frame)
            <div class="col-4">
                <img src="{{url('storage/frames/'.$frame->frame_src_preview)}}" width="150" height="100" alt="">
                <div class="row px-2 col-12 mx-auto">
                    {{$frame->frame_pn}}
                </div>
                <div class="row px-2 col-12 mx-auto">
                    {{$frame->frame_description}}
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12">
                <p class="ml-auto" style="font-size:xx-large" class>Total: ${{$priceSampleFrames}}</p>
            </div>
        </div>
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
                <div class="col">Type of Address: {{$addressType}}</div><br>
            </div>
        </div>
        <div class="card bg-light mb-3 col-12 mx-auto px-0" >
        <div class="card-header">Important information</div>
        <div class="card-body">
            <!-- <h5 class="card-title">Important information</h5> -->
            <ul>
                <li>Thank you for your order of 4” FRAME SAMPLES.</li>
                <li>Prices are in USD and include Freight within Continental USA.</li>
                <li>All orders require 100% payment before shipping.</li>
                <li>The charge will be credited back if a purchase order is received within 60 days.</li>
                <li>The samples may take up to 15 business days to be available for shipping, because not all the frames are located on our premises.</li>
                <li>Someone from our staff will contact you within 24 hours with the payment methods.</li>
                <li>If you have any questions, please contact Michael Shaffer at <a href="callto:19545365055">+1 954-536-5055</a> or email him at <a href="mailto:mike@avisp.co">mike@avisp.co</a></li>
            </ul>
        </div>
    </div>
    </div>
</div>

@endsection