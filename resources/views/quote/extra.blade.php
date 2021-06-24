@extends('base')
@section('title')
My Quote
@endsection
@section('headings')
<link rel="stylesheet" href="{{ asset('css/miniDesign.css') }}">
<script src="{{ asset('js/quotePage.js') }}"></script>
@endsection
@section('content')

<div class="container">
    <div class="row px-4 m-4" >
        <div class="col">
            <img class="mt-3" src="{{asset('/storage/decoratv_logo.png')}}" style="object-fit: contain;" alt="">
        </div>
        <div class="mx-auto">
            <img src="{{asset('/storage/av_logo.png')}}" style="object-fit: contain;" width="100" alt="">
        </div>
        <h1>Quote</h1>
    </div>

    
    <div class="table-responsive-sm">
        <table class="table align-middle">
            <thead class="thead-light">
                <tr>
                    <th scope="col" style="text-align: center;" class="">Design</th>
                    <th scope="col" class="">MSRP</th>
                    <th scope="col" class="">Royalty Fee</th>
                    <th scope="col" class=""><span style="font-size: 1.3em;">Total</span></th>
                </tr>
            </thead>
            <tbody>
                <tr >
                    <td scope="row">
                            <div class="design-container">
                                @if ($frame)
                                <div class="frame"><img src="{{asset('storage/frames/'.$frame->frame_src)}}" width="100%" height="100%" alt=""></div>
                                @endif
                                @if($liner)
                                <div class="liner"><img src="{{asset('storage/liners/'.$liner->liner_src)}}" width="100%" height="100%" alt=""></div>
                                @endif
                                @if ($art == "custom")
                                <div class="art"><img src="{{asset('storage/temporaryArts/'.$userImagePath)}}" width="100%" height="100%" alt=""></div>
                                @elseif($art)
                                <div class="art"><img src="{{asset('storage/arts/'.$art->art_src)}}" width="100%" height="100%" alt=""></div>
                                @endif
                            </div>
                        </td>
                    @switch($tvSize)
                        @case(45)
                            @if($frame->frame_group == "A")
                            <td class="align-middle"><span id="frame-price">$4,928.00</span></td>
                            @elseif($frame->frame_group == "B")
                            <td class="align-middle"><span id="frame-price">$5,860.00</span></td>
                            @elseif($frame->frame_group == "C")
                            <td class="align-middle"><span id="frame-price">$7,042.00</span></td>
                            @elseif($frame->frame_group == "D")
                            <td class="align-middle"><span id="frame-price">$$9,389.00</span></td>
                            @elseif($frame->frame_group == "E")
                            <td class="align-middle"><span id="frame-price">$12,519.00</span></td>
                            @endif
        
                            @break
        
                        @case(50)
                            @if($frame->frame_group == "A")
                            <td class="align-middle"><span id="frame-price">$5,470.00</span></td>
                            @elseif($frame->frame_group == "B")
                            <td class="align-middle"><span id="frame-price">$6,510.00</span></td>
                            @elseif($frame->frame_group == "C")
                            <td class="align-middle"><span id="frame-price">$7,822.00</span></td>
                            @elseif($frame->frame_group == "D")
                            <td class="align-middle"><span id="frame-price">$10,429.00</span></td>
                            @elseif($frame->frame_group == "E")
                            <td class="align-middle"><span id="frame-price">$13,905.00</span></td>
                            @endif
        
                            @break
        
                        @case(55)
                            @if($frame->frame_group == "A")
                            <td class="align-middle"><span id="frame-price">$6,085.00</span></td>
                            @elseif($frame->frame_group == "B")
                            <td class="align-middle"><span id="frame-price">$7,230.00</span></td>
                            @elseif($frame->frame_group == "C")
                            <td class="align-middle"><span id="frame-price">$8,684.00</span></td>
                            @elseif($frame->frame_group == "D")
                            <td class="align-middle"><span id="frame-price">$11,579.00</span></td>
                            @elseif($frame->frame_group == "E")
                            <td class="align-middle"><span id="frame-price">$15,439.00</span></td>
                            @endif
        
                            @break
        
                        @case(60)
                            @if($frame->frame_group == "A")
                            <td class="align-middle"><span id="frame-price">$6,688.00</span></td>
                            @elseif($frame->frame_group == "B")
                            <td class="align-middle"><span id="frame-price">$7,964.00</span></td>
                            @elseif($frame->frame_group == "C")
                            <td class="align-middle"><span id="frame-price">$9,559.00</span></td>
                            @elseif($frame->frame_group == "D")
                            <td class="align-middle"><span id="frame-price">$12,745.00</span></td>
                            @elseif($frame->frame_group == "E")
                            <td class="align-middle"><span id="frame-price">$16,994.00</span></td>
                            @endif
        
                            @break
        
                        @case(65)
                            @if($frame->frame_group == "A")
                            <td class="align-middle"><span id="frame-price">$7,360.00</span></td>
                            @elseif($frame->frame_group == "B")
                            <td class="align-middle"><span id="frame-price">$8,755.00</span></td>
                            @elseif($frame->frame_group == "C")
                            <td class="align-middle"><span id="frame-price">$10,515.00</span></td>
                            @elseif($frame->frame_group == "D")
                            <td class="align-middle"><span id="frame-price">$14,020.00</span></td>
                            @elseif($frame->frame_group == "E")
                            <td class="align-middle"><span id="frame-price">$18,694.00</span></td>
                            @endif
        
                            @break
        
                        @case(75)
                            @if($frame->frame_group == "A")
                            <td class="align-middle"><span id="frame-price">$8,094.00</span></td>
                            @elseif($frame->frame_group == "B")
                            <td class="align-middle"><span id="frame-price">$9,629.00</span></td>
                            @elseif($frame->frame_group == "C")
                            <td class="align-middle"><span id="frame-price">$11,565.00</span></td>
                            @elseif($frame->frame_group == "D")
                            <td class="align-middle"><span id="frame-price">$15,420.00</span></td>
                            @elseif($frame->frame_group == "E")
                            <td class="align-middle"><span id="frame-price">$20,560.00</span></td>
                            @endif
        
                            @break
        
                        @case(85)
                            @if($frame->frame_group == "A")
                            <td class="align-middle"><span id="frame-price">$8,898.00</span></td>
                            @elseif($frame->frame_group == "B")
                            <td class="align-middle"><span id="frame-price">$10,585.00</span></td>
                            @elseif($frame->frame_group == "C")
                            <td class="align-middle"><span id="frame-price">$12,712.00</span></td>
                            @elseif($frame->frame_group == "D")
                            <td class="align-middle"><span id="frame-price">$16,949.00</span></td>
                            @elseif($frame->frame_group == "E")
                            <td class="align-middle"><span id="frame-price">$22,599.00</span></td>
                            @endif
        
                            @break
        
                        @case(95)
                            @if($frame->frame_group == "A")
                            <td class="align-middle"><span id="frame-price">$9,795.00</span></td>
                            @elseif($frame->frame_group == "B")
                            <td class="align-middle"><span id="frame-price">$11,649.00</span></td>
                            @elseif($frame->frame_group == "C")
                            <td class="align-middle"><span id="frame-price">$13,987.00</span></td>
                            @elseif($frame->frame_group == "D")
                            <td class="align-middle"><span id="frame-price">$18,649.00</span></td>
                            @elseif($frame->frame_group == "E")
                            <td class="align-middle"><span id="frame-price">$24,865.00</span></td>
                            @endif
        
                            @break
        
                        @case(103)
                            @if($frame->frame_group == "A")
                            <td class="align-middle"><span id="frame-price">$10,763.00</span></td>
                            @elseif($frame->frame_group == "B")
                            <td class="align-middle"><span id="frame-price">$12,819.00</span></td>
                            @elseif($frame->frame_group == "C")
                            <td class="align-middle"><span id="frame-price">$15,382.00</span></td>
                            @elseif($frame->frame_group == "D")
                            <td class="align-middle"><span id="frame-price">$20,509.00</span></td>
                            @elseif($frame->frame_group == "E")
                            <td class="align-middle"><span id="frame-price">$27,345.00</span></td>
                            @endif
        
                            @break
                        @default
                            <td class="align-middle">$10,763.00</td>
                    @endswitch
                    <td class="align-middle"><span id="royaltyFee">{{$royaltyFee}}</span></td>
                    <td class="align-middle"><span id="total" style="font-size:x-large;" ></span></td>
                </tr>
            </tbody>
        </table>
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
    <div class="row col-md-12 mb-5">
    @if($art == "custom")
        <div class="col-md-4">Gallery: Your own art</div>
        <div class="col-md-4">P/N: N/A</div>
    @else
        <div class="col-md-4">Gallery: {{$art->art_gallery}}</div>
        <div class="col-md-4">P/N: {{$art->art_pn}}</div>
        <div class="col-md-4">Description: {{$art->art_description}}</div>
    @endif
    </div>

    <div class="card bg-light mb-3 col-md-10 mx-auto px-0" >
        <div class="card-header">Important information</div>
        <div class="card-body">
            <!-- <h5 class="card-title">Important information</h5> -->
            <p class=" card-text text-danger">This is a DECORATV EXTRA preliminary quote.</p>
            <p class="card-text">Prices are in USD and include Control System & Freight within Continental USA.</p>
            <p class="card-text">Freight prepaid only applies for orders shipped complete in one shipment. Partial shipments or parts do NOT include freight.</p>
        </div>
    </div>

    <form action="{{url('/order_page')}}" id="objDesign" method="POST" class="hidden-input">
        <div class="form-control">
            <input type="text" id="objDesignFrame" name="objDesignFrame" value="{{$frame->frame_id}}">
            <input type="text" id="objDesignLiner" name="objDesignLiner" value="{{$liner->liner_id}}">
            @if ($art == "custom")
            <input type="text" id="objDesignArt" name="objDesignArt" value="custom">
            <input type="text" name="userImagePath" id="imageName" value="{{$userImagePath}}">
            @else
            <input type="text" id="objDesignArt" name="objDesignArt" value="{{$art->art_id}}">
            @endif        
        </div>    
        <div class="form-group">
            <input type="text" class="form-control" id="design-id" style="visibility: hidden;" form="objDesign">
            <input type="text" name="tvSize" id="tvSize" value="{{$tvSize}}">
        </div>
        <!-- speakers -->
        <div class="form-group">
            <input type="text" name="externalSpeakers" id="externalSpeakers" value="{{$externalSpeakers}}">
        </div>
    </form>

    <div class="row mb-4">

        <div class="mx-auto">
            <button class="btn controller-button mx-auto" data-toggle="modal" data-target="#email-modal">Send this Quote to me</button>
            <button class="btn btn-dark mx-3" type="submit" form="objDesign">Order</button>
        </div>
        
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="email-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm"  role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Email</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <div class="form-group">
        <label for="email">Send quote to: </label>
        <input type="email" id="email-input" class="form-control" name="email" value="{{$userEmail}}">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn controller-button" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-dark" onclick="sendMail()">Send</button>
      </div>
    </div>
  </div>
</div>


@endsection