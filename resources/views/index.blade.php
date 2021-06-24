<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DecoraTV</title>
    <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('js/index.js')}}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link href="{{ asset('css/design.css') }}" rel="stylesheet">
    <script type="text/javascript" > 
    var BASE_URL = "{{ url('/') }}";
    </script>
</head>
<body>
@csrf
    <div class="container-fluid mx-0 px-0 shadow-lg " style="border-bottom: 1px solid #808080;">
        @if (session('status'))
        <div class="row mx-auto" id="alert-status">
            <div class="mx-auto mt-3 alert alert-success offset-md-6" style="position:fixed; z-index:10000; left:50%">
                <p class="msg"> {{ session('status') }}</p>
            </div>
        </div>
        @endif
        <div class="row px-0 mx-0" >
            <!-- DESGIN CONTROLLER -->
            
            <div class="vertical-right  bg-white py-3 col-md-4 col-lg-3 px-0">
                
                <div class="row col-12">
                    <div class="col">
                        <a href="{{url('https://avisp.co')}}"><img width="100px" class="ml-2" src="{{asset('/storage/av_logo_color.jpg')}}" alt=""></a>
                    </div>
                    <div class="col">
                        <h2 align="center" style="color: #37367e; font-style: italic;">Customize your design.</h1>
                    </div>
                </div>
                <!-- Reset Button -->
                <div class="row selection-button my-4 py-2 mx-0 custom-shadow btn-outline-dark"   id="reset-button" onclick="resetButtonDidTouch();" >

                    <div class="col my-auto " style="text-align: center;">
                        <span class="menu-font">Reset</span>
                    </div>
                    <div class="col my-auto ">
                            <img src="{{asset('storage/reset_logo1.png')}}" width="30" align="right" alt="">
                    </div>
                </div>
                <!-- End Reset Button -->

                <!-- Frame Button -->
                <div class="row selection-button my-4 py-2 mx-0 custom-shadow btn-outline-dark"   id="frame-button" onclick="sendRequest('frame');" >

                    <div class="col-5 vertical-right">
                        <img src="{{asset('storage/Frame_UX/frame_icon.png')}}" width="100%" class="ml-1" alt="">
                    </div>
                    <div class="col my-auto">
                        <span class="menu-font">Frames</span>
                    </div>
                    <div class="col my-auto ">
                            <img src="{{asset('storage/triangle.png')}}" width="20" align="right" alt="">
                    </div>
                </div>
                <!-- End Frame Button -->

                <!-- Liner Button -->
                <div class="row selection-button my-4 py-2 mx-0 custom-shadow btn-outline-dark"   id="liner-button" onclick="sendRequest('liner');" >
                    <div class="col-5 vertical-right">
                        <img src="{{asset('storage/Frame_UX/liner_icon.png')}}" class="ml-1" width="100%" alt="">
                    </div>
                    <div class="col my-auto">
                        <span class="menu-font">Liner</span>
                    </div>
                    <div class="col my-auto ">
                            <img src="{{asset('storage/triangle.png')}}" width="20" align="right" alt="">
                    </div>
                </div>
                <!-- End Liner Button -->

                <!-- Art Button -->
                <div class="row selection-button my-4 py-2 mx-0 custom-shadow btn-outline-dark"   id="art-button" onclick="sendRequest('art');" >
                    <div class="col-5 vertical-right">
                        <img src="{{asset('storage/Frame_UX/art_icon.png')}}" class="ml-1" style="background-color: white;" width="100%" alt="">
                    </div>
                    <div class="col my-auto">
                        <span class="menu-font">Art</span> 
                        </div>
                        <div class="col my-auto ">
                            <img src="{{asset('storage/triangle.png')}}" width="20" align="right" alt="">
                    </div>
                </div>
                <!-- End Art Button -->

                <hr noshade="noshade" size="1" width="90%" />

                <!-- Checkout Section -->

                
                <div class="row w-100 m-0" >

                    <div class="col-sm-8  col-md-6 mx-auto my-2">
                        <button class="col-12 ml-1 custom-button  btn-light custom-shadow" onclick="finishDesign('quote')" style="outline:none;">
                                Quote
                        </button>
                    </div>
                    <div class="col-sm-8 col-md-6 mx-auto my-2">
                        <button class="row ml-1 w-100 custom-button-black custom-shadow" onclick="finishDesign('order')">
                            <div class="col-4 white-vertical-right my-auto mx-auto px-0 media">
                                <img src="{{asset('storage/Frame_UX/checkout_icon.png')}}" height="35" alt="" class="mx-auto">
                            </div>
                            <div class="col my-auto">
                                Order
                            </div>
                        </button>
                    </div>
                </div>
                <br>
                <div class="row w-100 m-0">
                    <form action="{{url('/print_page')}}" method="POST" id="printForm" class="hidden-input">
                        @if(Session::get('frame_id'))
                        <input type="text" id="printObjDesignFrame" name="objDesignFrame" value="{{Session::get('frame_id')}}">
                        @else
                        <input type="text" id="printObjDesignFrame" name="objDesignFrame">
                        @endif
                        @if(Session::get('liner_id'))
                        <input type="text" id="printObjDesignLiner" name="objDesignLiner" value="{{Session::get('liner_id')}}">
                        @else
                        <input type="text" id="printObjDesignLiner" name="objDesignLiner">
                        @endif
                        @if(Session::get('art_id'))
                        <input type="text" id="printObjDesignArt" name="objDesignArt" value="{{Session::get('art_id')}}">
                        @else
                        <input type="text" id="printObjDesignArt" name="objDesignArt">
                        @endif
                        @if(Session::get('userImagePath'))
                        <input type="text" id="printUserImagePath" name="userImagePath" value="{{Session::get('userImagePath')}}">
                        @else
                        <input type="text" id="printUserImagePath" name="userImagePath">
                        @endif
                    </form>

                    <div class="col-sm-8  col-md-6 mx-auto my-2">
                        <button class="col-12 ml-1 custom-button  btn-light custom-shadow" type="submit" form="printForm" style="outline:none;" formTarget="_blank">
                                Print
                        </button>
                    </div>

                    <div class="col-sm-8  col-md-6 mx-auto my-2">
                        <button href="" class="col-12 ml-1 custom-button  btn-light custom-shadow p-0 m-0" onclick="finishDesign('sample')" style="outline:none;" >
                                Request Frame Sample
                        </button>
                    </div>
                    
                    
                </div>

                <!-- End Checkout Section -->
                
            </div>
            
            <!-- END DESIGN CONTROLLER -->

            <!-- PLAY DESIGN -->
            <div class="col-sm-12 col-md mx-0 px-0 w-100" id="background-space">
                <div class="container design-container mt-4 col mx-auto" id="design-container">
                    <div class="shadow-image">
                        <img src="{{asset('storage/Frame_UX/frame_shadow.png')}}" id="shadow-background-image" width="100%" height="100%" alt="">
                    </div>
                    <div class="frame"> 
                        @if(Session::get('frame_src'))
                        <img src="{{asset('storage/frames/'.Session::get('frame_src'))}}" id="frame-display" width="100%" height="100%" alt="">
                        @else
                        <img src="{{asset('storage/frames/GroupC_L822831_Classic_Biltmore_Black_-_Flat.png')}}" id="frame-display" width="100%" height="100%" alt="">
                        @endif
                    </div>
                    <div class="liner">
                        @if(Session::get('liner_src') && Session::get('liner_category'))
                        <img src="{{asset('storage/liners/'.Session::get('liner_src'))}}" category="{{Session::get('liner_category')}}" id="painted-liner" style="width: 100%; height:100%" alt="">
                        @else
                        <img src="{{asset('storage/liners/GroupBC_VWD07N_Natural.png')}}" category="" id="painted-liner" style="width: 100%; height:100%" alt="">
                        @endif
                    </div>
                    <div class="art">
                        @if (Session::get('art_id')=="custom")
                        <img src="{{asset('storage/temporaryArts/'.Session::get('userImagePath'))}}" id="art-display" width="100%" height="100%" alt="">
                        @elseif(Session::get('art_src'))
                        <img src="{{asset('storage/arts/'.Session::get('art_src'))}}" id="art-display" width="100%" height="100%" alt="">
                        @else
                        <img src="{{asset('storage/Frame_UX/decoraArt.jpg')}}" id="art-display" width="100%" height="100%" alt="">
                        @endif
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-4 col-md-3 ml-auto mr-4"><img id="decoratv_logo" src="{{asset('storage/decoratv_logo_tr.png')}}" width="150px" alt=""></div>
                </div>
            </div>
            <!-- END PLAY DESIGN -->
        </div>

        <!-- LOGIN MODAL -->
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="login-title" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="login-title">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <!-- Login Section -->
                    <div id="login-section">
                        <form action="#" >
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                
                                <div class="col-md-8 offset-md-4">
                                    
                                    <div class=" btn btn-outline-success w-50" onclick="loginButtonDidTouch()">
                                        Login
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- End Login Section -->
                </div>
                <div class="modal-footer">
                    <div class="col">
                        @if (Route::has('password.request'))
                        <a class="btn btn-outline-dark" href="{{ route('password.request') }}" target="_blank">
                        {{ __('Forgot Your Password?') }}
                        </a>
                        @endif
                    </div>
                    <div class="col">
                        <button class="btn btn-outline-dark" type="submit" form="printForm" formAction="{{ url('registerPage') }}" formTarget="_self">
                            Don't have an account?
                        </button>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <!-- END LOGIN MODAL -->

        <!-- CUSTOM MODAL FOR COLLECTION -->
        <div class="overlay offset-md-4 offset-lg-3"  id="overlay" >
            <div class="pop-up col-md-7 col-lg-5 mt-3">
                <h4 id="collection-title"></h4>
                
                <div id="collection-categories" class="row justify-content-md-center">            
                    
                </div>
                <hr noshade="noshade" size="1" width="100%" />
                
                <div id="objectResult" class="mb-3 row col-md-12 pb-4" >
                    
                    <!-- Results from showItem()  -->
                </div>
            </div>
        </div>
        <!-- END MODAL COLLECTION -->

        <!-- FEEDBACK MODAL -->
        <div class="modal fade" id="feedback-modal" tabindex="-1" role="dialog" aria-labelledby="feedback-title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="feedback-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning" role="alert" id="feedback-message">
                    ...
                </div>
            </div>
            <div class="row justify-content-md-center mb-1">
                <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>
        <!-- END FEEDBACK MODAL -->

        <!-- CHECKOUT MODAL -->
        <div id="checkout-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="checkout-title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="checkout-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                    <form id="objDesign" action="/quote_page" method="POST" class="needs-validation" novalidate>
                        <div class="form-control hidden-input">
                            @if(Session::get('frame_id'))
                            <input type="text" id="objDesignFrame" name="objDesignFrame" value="{{Session::get('frame_id')}}">
                            @else
                            <input type="text" id="objDesignFrame" name="objDesignFrame">
                            @endif
                            @if(Session::get('liner_id'))
                            <input type="text" id="objDesignLiner" name="objDesignLiner" value="{{Session::get('liner_id')}}">
                            @else
                            <input type="text" id="objDesignLiner" name="objDesignLiner">
                            @endif
                            @if(Session::get('art_id'))
                            <input type="text" id="objDesignArt" name="objDesignArt" value="{{Session::get('art_id')}}">
                            @else
                            <input type="text" id="objDesignArt" name="objDesignArt">
                            @endif
                            @if(Session::get('userImagePath'))
                            <input type="text" id="objDesignImagePath" name="userImagePath" value="{{Session::get('userImagePath')}}">
                            @else
                            <input type="text" id="objDesignImagePath" name="userImagePath">
                            @endif
                            <input type="email" id="userEmail" name="userEmail">
                        </div>    
                        <div class="form-group">
                        <input type="text" class="form-control" id="design-id" style="visibility: hidden;" form="objDesign">
                        <h3> Select the TV Diagonal or Next Size Available </h3>
                            <select class="custom-select custom-select-lg mb-3" name="tvSize" required>
                                <option selected value="">Select your size</option>
                                <option value="45">45"</option>
                                <option value="50">50"</option>
                                <option value="55">55"</option>
                                <option value="60">60"</option>
                                <option value="65">65"</option>
                                <option value="70">70"</option>
                                <option value="75">75"</option>
                                <option value="85">85"</option>
                                <option value="95">95"</option>
                                <option value="103">103"</option>
                            </select>
                            <div class="invalid-feedback">TV size is required</div>
                        
                        </div>
                        <!-- speakers -->
                        <div class="form-group">
                            <!-- <h3>External Speakers</h3> -->
                            <h5>Is there a Sound Bar or External Speakers other than the speakers that are included with the TV?</h5>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="customControlValidation2" name="externalSpeakers" value="true" required>
                                <label class="custom-control-label" for="customControlValidation2">Yes (when SoundBar or External Speakers need to be accommodated)</label>
                            </div>
                            <div class="custom-control custom-radio mb-3">
                                <input type="radio" class="custom-control-input" id="customControlValidation3" name="externalSpeakers" value="false" required>
                                <label class="custom-control-label" for="customControlValidation3">No (when the TV has built-in speakers)</label>
                                <div class="invalid-feedback">Please select YES or NO</div>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Cancel</button>
                    <button type="submit" form="objDesign" id="checkoutButton" formaction="{{url('/quote_page')}}" class="btn btn-dark" >Continue</button>
                </div>
            </div>
        </div>
        </div>
        <!-- END CHECKOUT MODAL -->

        <!-- SAMPLE MODAL -->
        <div id="sample-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="sample-modal-title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="sample-modal-title">Frame Sample</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                    <p>4” frame samples are available at a fee which varies according to the quantity of frame samples requested and the frame’s group.</p>
                    <p> The charge will be credited back if a purchase order is received within 60 days.</p>
                    <p>The samples may take up to 15 business days to be available for shipping, because not all the frames are located on our premises.</p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Cancel</button>
                    <form action="{{url('/frame_sample')}}">
                    <button type="submit" class="btn btn-dark" >Continue</button>
                    </form>
                </div>
            </div>
        </div>
        </div>
        <!-- END SAMPLE MODAL -->
<!-- <a href="/admin/home" class="btn btn-light">Admin section > </a> -->

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <div class="bg-white h-100" style="height: 100%;">

    </div>
</body>

</html>