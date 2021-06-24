<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <!-- Scripts -->
        <!-- <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/main.js') }}"></script> -->

        <!-- Fonts -->
        <!-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->

        <!-- Styles -->
        <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <script type="text/javascript" > 
        var BASE_URL = "{{ url('/') }}";
        </script> -->
    </head>
    <body>
    <style type="text/css">


</style>
<div class="container">
    <div class="row px-4 m-4" >
        <div class="mx-auto">
            <img src="{{asset('/storage/av_logo.png')}}" style="object-fit: contain;" width="100" alt="">
        </div>
        <h1>Quote</h1>
    </div>

    
    
    
    <h3>Design</h3>
                <div class="design-container" style="display: block;">
                    
                    <div class="frame"><img src="{{asset('storage/frames/GroupC_L822831_Classic_Biltmore_Black_-_Flat.png')}}" id="frame-display" width="150" height="100" style="float: left;" alt=""></div>
                    
                    <div class="liner"><img src="{{asset('storage/liners/GroupBC_VWD07N_Natural.png')}}" category="" id="painted-liner" width="150" height="100" style="float: left;" alt=""></div>
                    
                    
                    <div class="art"><img src="{{asset('storage/Frame_UX/decoraArt.jpg')}}" id="art-display" width="150" height="100" style="float: left;" alt=""></div>

                </div>
    
    <hr>

    <h3>Product: </h3>
    <div class="row col-md-12">
        <div class="col">TV Diagonal: 45"</div>
        
        <div class="col">External Speakers: Yes</div>
        
    </div>

    <hr>

    <h3>Frame:</h3>
    <div class="row col-md-12">
        <div class="col-md-4">Group: A</div>
        <div class="col-md-4">P/N: BDFH593409</div>
        <div class="col-md-4">Description: Talalala marnana </div>        
    </div>

    <hr>

    <h3>Liner:</h3>
    <div class="row col-md-12">
        <div class="col-md-4">Group: B</div>
        <div class="col-md-4">P/N: DHBSA212312</div>
        <div class="col-md-4">Description: Pirumra n </div>        
    </div>

    <hr>

    <h3>Art:</h3>
    <div class="row col-md-12 mb-5">
    
        <div class="col-md-4">Gallery: Your own art</div>
        <div class="col-md-4">P/N: N/A</div>
    </div>
    <hr>

    <div class="card bg-light mb-3 col-12 mx-auto px-0" >
        <div class="card-header"></div>
        <div class="card-body">
            <!-- <h5 class="card-title">Important information</h5> -->
            <p class="">Thank you for your DECORATV EXTRA inquiry. This is a preliminary quote.  Whenever you are ready to place the order, please enter the information in the designer tool and select <a href="url:('/')" class="alert-link">ORDER</a>.</p>
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

    </body>

