<?php

namespace App\Http\Controllers;

use App\Art;
use App\Frame;
use App\Liner;
use App\Mail\OrderMail;
use App\Mail\QuoteMail;
use Illuminate\Http\Request;
use App\Mail\SampleFramesOrderMail;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Collection;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function adminHome()
    {
        return view('adminHome');
    }
    
    public function printPage(Request $request)
    {
        $response = null;
        $userImagePath = $request->userImagePath;
        if($request->objDesignArt == "custom"){
            $art = null;
            Session::put('art_id','custom');
            Session::put('userImagePath',$request->userImagePath);
        }
        else if($request->objDesignArt){
            $art = Art::find($request->objDesignArt);     
            Session::put('art_src',$art->art_src);
            Session::put('art_id',$art->art_id);
            Session::put('userImagePath', null);       
        } else {
            $art = null;
        }
        if($request->objDesignLiner){
            $liner = Liner::find($request->objDesignLiner);
            Session::put('liner_src',$liner->liner_src);
            Session::put('liner_id',$liner->liner_id);
            Session::put('liner_category', $liner->liner_group);
        } else {
            $liner = null;
        }
        if($request->objDesignFrame){
            $frame = Frame::find($request->objDesignFrame);
            Session::put('frame_src',$frame->frame_src);
            Session::put('frame_id',$frame->frame_id);
        } else {
            $frame = null;
        }
        return view('printPage', compact('art','frame','liner','userImagePath'));

    }

    public function quotePage(Request $request)
    {
        $userImagePath = null;
        $email = null;
        if($request->objDesignArt == "custom"){
    
            $userImagePath = $request->userImagePath;
            
            $art = "custom";
            Session::put('art_id','custom');
            Session::put('userImagePath',$request->userImagePath);

        } else if ($request->objDesignArt) {
            $art = Art::find($request->objDesignArt); 
            Session::put('art_src',$art->art_src);
            Session::put('art_id',$art->art_id);
            Session::put('userImagePath', null);
           
        } else {
            $art = null;
        }
        if($request->objDesignLiner){
            $liner = Liner::find($request->objDesignLiner);
            Session::put('liner_src',$liner->liner_src);
            Session::put('liner_id',$liner->liner_id);
            Session::put('liner_category', $liner->liner_group);

        } else {
            $liner = null;
        }
        if($request->objDesignFrame){
            $frame = Frame::find($request->objDesignFrame);
            Session::put('frame_src',$frame->frame_src);
            Session::put('frame_id',$frame->frame_id);
        } else {
            
            $frame = null;
        }

        if ($art == "custom"){
            $royaltyFee = "600";
        } else {
            $posR = strpos($art->art_pn,"R");
            $royaltyFee = substr($art->art_pn, $posR+1);
        }

        $tvSize = $request->tvSize;
        $externalSpeakers = $request->externalSpeakers;
        $userEmail = $request->userEmail;
        if ($externalSpeakers == "true") {
            return view('quote.extra', compact('userEmail', 'art','frame','liner', 'tvSize', 'externalSpeakers', 'royaltyFee', 'userImagePath', 'email'));    
        } else {
            return view('quote.basic', compact('userEmail', 'art','frame','liner', 'tvSize', 'externalSpeakers', 'royaltyFee', 'userImagePath','email'));
        }

    }

    public function orderPage(Request $request) {

        $userImagePath = null;
        if($request->objDesignArt == "custom"){
            
            $userImagePath = $request->userImagePath;
    
            $art = "custom";

            Session::put('art_id','custom');
            Session::put('userImagePath',$request->userImagePath);

        } else if ($request->objDesignArt) {
            $art = Art::find($request->objDesignArt); 
            
            Session::put('art_src',$art->art_src);
            Session::put('art_id',$art->art_id);
            Session::put('userImagePath', null);
        } else {
            $art = null;
        }

        if($request->objDesignLiner){
            $liner = Liner::find($request->objDesignLiner);

            Session::put('liner_src',$liner->liner_src);
            Session::put('liner_id',$liner->liner_id);
            Session::put('liner_category', $liner->liner_group);
        } else {
            $liner = null;
        }
        if($request->objDesignFrame){
            $frame = Frame::find($request->objDesignFrame);

            Session::put('frame_src',$frame->frame_src);
            Session::put('frame_id',$frame->frame_id);
        } else {
            $frame = null;
        }

        if ($art == "custom"){
            $royaltyFee = "600";
        } else {
            $posR = strpos($art->art_pn,"R");
            $royaltyFee = substr($art->art_pn, $posR+1);
        }

        $tvSize = $request->tvSize;
        $externalSpeakers = $request->externalSpeakers;

        return view('order', compact('art','frame','liner', 'tvSize', 'externalSpeakers', 'royaltyFee', 'userImagePath'));
    }

    public function saveCustomImage (Request $request) {

        

        $validData = $request->validate([
            'userImage'=>'required|mimes:jpeg,png|max:5070'
        ]);

        $imageName = time().'.'.$request->userImage->getClientOriginalExtension();

        $request->userImage->move(base_path('/public/storage/temporaryArts'), $imageName);
        
        Session::put('art_id','custom');
        Session::put('userImagePath',$imageName);
        Session::flash('message','Custom Art Created');
        return $imageName;

    }

    public function resetDesign(){
        Session::forget('art_id');
        Session::forget('userImagePath');
        Session::forget('art_src');
        Session::forget('frame_id');
        Session::forget('frame_src');
        Session::forget('liner_id');
        Session::forget('liner_src');
    }

    public function sendQuoteMail(Request $request) {
        
        Mail::to($request->get('email'))->send(new QuoteMail($request));
        Mail::to('mike@avisp.co')->send(new QuoteMail($request));
        return 'enviado';
    }

    
    public function sendOrderMail(Request $request){
        Mail::to($request->get('email'))->send(new OrderMail($request));
        Mail::to('mike@avisp.co')->send(new OrderMail($request));
        return redirect('postOrder');
    }

    public function saveDesign( Request $request){
        if (isset($request->objDesignArt) && isset($request->objDesignFrame) && isset($request->objDesignLiner)){
            if($request->objDesignArt !== "custom"){
                $art = Art::find($request->objDesignArt);
                Session::put('art_src',$art->art_src);
                Session::put('art_id',$art->art_id);
                Session::put('userImagePath', null);
            } else {
                Session::put('art_id','custom');
                Session::put('userImagePath',$request->userImagePath);
            }
    
            $frame = Frame::find($request->objDesignFrame);
            Session::put('frame_src',$frame->frame_src);
            Session::put('frame_id',$frame->frame_id);
    
            $liner = Liner::find($request->objDesignLiner);
            Session::put('liner_src',$liner->liner_src);
            Session::put('liner_id',$liner->liner_id);
            Session::put('liner_category', $liner->liner_group);
        } 
        $registerOrigine = "app";
        return view('auth.register', compact('registerOrigine'));

    }

    public function showRegisterPage(Request $request){
        return view('auth.register');
    }

    public function frameSample(){
        $frameCollectionA = Frame::where('frame_group', '=', 'A')->orderBy('frame_src')->get();
        $frameCollectionB = Frame::where('frame_group', '=', 'B')->orderBy('frame_src')->get();
        $frameCollectionC = Frame::where('frame_group', '=', 'C')->orderBy('frame_src')->get();
        $frameCollectionD = Frame::where('frame_group', '=', 'D')->orderBy('frame_src')->get();
        $frameCollectionE = Frame::where('frame_group', '=', 'E')->orderBy('frame_src')->get();
        return view('frameSample',compact('frameCollectionA', 'frameCollectionB', 'frameCollectionC','frameCollectionD', 'frameCollectionE'));
    }

    public function checkoutSample( Request $request) {

        $framesId = explode(",",$request->framesList);

        $framesCollection = new Collection();

        foreach($framesId as $frameId) {
            $frame = Frame::find($frameId);
            $framesCollection->push($frame);
        }

        $priceSampleFrames = $request->priceSampleFrames;
        $framesList = $request->framesList;

        return view('checkoutSample', compact('framesCollection','framesList','priceSampleFrames'));
    }
    public function sendSampleMail(Request $request) {
        Mail::to($request->get('email'))->send(new SampleFramesOrderMail($request));
        Mail::to('mike@avisp.co')->send(new SampleFramesOrderMail($request));
        return redirect('postOrder');
    }
}
