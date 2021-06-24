@extends('base')
@section('title')
Frame Sample
@endsection
@section('content')
<style>

.selected {
    border: 2px solid #000000;
    opacity: 0.7;
}
.sticky{
  position: -webkit-sticky; /* Safari */
  position: fixed;
  bottom: 0;
  right: 0;
  border-top: 1px solid #c1c1c1;
  z-index: 1000;
  background-color: #e7e9eb;
}

</style>

<div class="container bg-light mt-3">
    <div class="row px-4 m-4" >
        <div class="col">
            <img class="mt-3" src="{{asset('/storage/decoratv_logo.png')}}" style="object-fit: contain;" alt="">
        </div>
        <div class="mx-auto">
            <img src="{{asset('/storage/av_logo.png')}}" style="object-fit: contain;" width="100" alt="">
        </div>
        <h1>Sample</h1>
    </div>
    <a href="/" class="btn btn-light"> < Home</a>
    <div class="row" >
        <div class="col">
            <h1 class="" >Please select the frames you want to check</h1>
            <p style="font-size:medium">4” frame samples are available at a fee which varies according to the quantity of frame samples requested and the frame’s group. The charge will be credited back if a purchase order is received within 60 days. The samples may take up to 15 business days to be available for shipping, because not all the frames are located on our premises.</p>
            <form action="{{url('checkout_frames_sample')}}" id="framesListForm" method="POST" class="">
                <input type="text" id="framesList" name="framesList" class="hidden-input" required>
                <input type="text" id="priceSampleFrames" name="priceSampleFrames" class="hidden-input" required>
            </form>
        </div>
        <div class="sticky col-12 p-2" style="text-align: center;">
            <span id="counter" class="" style="font-size: x-large;">Select frames</span>
            <button class="btn btn-outline-dark ml-auto col-md-2" type="submit" form="framesListForm" style="float: right;">Confirm</button>
        </div>
    </div>
    <div class="row pb-5 p-2 border rounded bg-white">
        <h4>Group A</h4>
        <div class="row">
        @foreach ($frameCollectionA as $frame)
            <div class="col-md-4 w-100">
                <img src="storage/frames/{{$frame->frame_src_preview}}" width="100%" frame_group="{{$frame->frame_group}}" alt="" id="{{$frame->frame_id}}" pn="{{$frame->frame_pn}}" class="selectable" onclick="frameSelected($(this))">
                <!-- <p>{{$frame->frame_description}}</p> -->
                <div class="row px-2 col-12 mx-auto">
                    {{$frame->frame_pn}}
                </div>
                <div class="row px-2 col-12 mx-auto">
                    {{$frame->frame_description}}
                </div>
            </div>
            <br>
        @endforeach
        </div>
        <hr noshade="noshade" size="1" width="100%" />
        <h4>Group B</h4>
        <div class="row">
        @foreach ($frameCollectionB as $frame)
            <div class="col-md-4 w-100">
                <img src="storage/frames/{{$frame->frame_src_preview}}" width="100%" frame_group="{{$frame->frame_group}}" alt="" id="{{$frame->frame_id}}" pn="{{$frame->frame_pn}}" class="selectable" onclick="frameSelected($(this))">
                <div class="row px-2 col-12 mx-auto">
                    {{$frame->frame_pn}}
                </div>
                <div class="row px-2 col-12 mx-auto">
                    {{$frame->frame_description}}
                </div>
            </div>
            <br>
        @endforeach
        </div>
        <hr noshade="noshade" size="1" width="100%" />
        <h4>Group C</h4>
        <div class="row">
        @foreach ($frameCollectionC as $frame)
            <div class="col-md-4 w-100">
                <img src="storage/frames/{{$frame->frame_src_preview}}" width="100%" frame_group="{{$frame->frame_group}}" alt="" id="{{$frame->frame_id}}" pn="{{$frame->frame_pn}}" class="selectable" onclick="frameSelected($(this))">
                <div class="row px-2 col-12 mx-auto">
                    {{$frame->frame_pn}}
                </div>
                <div class="row px-2 col-12 mx-auto">
                    {{$frame->frame_description}}
                </div>
            </div>
            <br>
        @endforeach
        </div>

        <hr noshade="noshade" size="1" width="100%" />
        <h4>Group D</h4>
        <div class="row">
        @foreach ($frameCollectionD as $frame)
            <div class="col-md-4 w-100">
                <img src="storage/frames/{{$frame->frame_src_preview}}" width="100%" frame_group="{{$frame->frame_group}}" alt="" id="{{$frame->frame_id}}" pn="{{$frame->frame_pn}}" class="selectable" onclick="frameSelected($(this))">
                <div class="row px-2 col-12 mx-auto">
                    {{$frame->frame_pn}}
                </div>
                <div class="row px-2 col-12 mx-auto">
                    {{$frame->frame_description}}
                </div>
            </div>
            <br>
        @endforeach
        </div>

        <hr noshade="noshade" size="1" width="100%" />
        <h4>Group E</h4>
        <div class="row">
        @foreach ($frameCollectionE as $frame)
            <div class="col-md-4 w-100">
                <img src="storage/frames/{{$frame->frame_src_preview}}" width="100%" frame_group="{{$frame->frame_group}}" alt="" id="{{$frame->frame_id}}" pn="{{$frame->frame_pn}}" class="selectable" onclick="frameSelected($(this))">
                <div class="row px-2 col-12 mx-auto">
                    {{$frame->frame_pn}}
                </div>
                <div class="row px-2 col-12 mx-auto">
                    {{$frame->frame_description}}
                </div>
            </div>
            <br>
        @endforeach
        </div>
    </div>
</div>

<script>
framesList = [];
var totalList = 0;

    // $('.selectable').click(function(){
    //     $(this).attr('class', 'selected')
    // })
    // $('.selected').click(function(){
    //     $(this).attr('class', 'selectable')
    // })

    function frameSelected(selectedItem) {
        if(selectedItem.attr('class') == "selectable"){
            selectedItem.attr('class', 'selected')
            // addItemToList(selectedItem.attr('id'))
            addItemToList(selectedItem)
        } else if(selectedItem.attr('class') == "selected"){
            selectedItem.attr('class', 'selectable')
            removeItemFromList(selectedItem)
        }
    }
    function addItemToList(item) {
        framesList.push(item.attr('id'));
        framesListController(item, true);
    }
    function removeItemFromList(item) {
        let pos = framesList.indexOf(item)
        framesList.splice(pos,1);        
        framesListController(item, false);
    }
    var price = 0
    function framesListController(item, type) {
        
        if (type){
            switch (item.attr('frame_group')){
                case "A":
                    price +=20;
                    break;
                case "B":
                    price += 40;
                    break;
                case "C":
                    price +=80;
                    break;
                case "D":
                    price +=120;
                    break;
                case "E":
                    price +=160;
                    break;
            }
        }else {
            switch (item.attr('frame_group')){
                case "A":
                    price -=20;
                    break;
                case "B":
                    price -= 40;
                    break;
                case "C":
                    price -=80;
                    break;
                case "D":
                    price -=120;
                    break;
                case "E":
                    price -=160;
                    break;
            }
        }
        itemsSelected = framesList.length
        if (itemsSelected == 0){
            $('#counter').html(itemsSelected+' items - $0')
            $('#framesList').val(framesList);
        }
        $('#counter').html(itemsSelected+' items - $'+price)
        $('#framesList').val(framesList);
        $('#priceSampleFrames').val(price)
        
    }
</script>


@endsection