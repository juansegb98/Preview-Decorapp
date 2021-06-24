<?php

namespace App\Mail;

use App\Art;
use App\Frame;
use App\Liner;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    private $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $userImagePath = null;
        if($this->data->objDesignArt == "custom"){
            
            $userImagePath = $this->data->userImagePath;
    
            $art = "custom";

        } else if ($this->data->objDesignArt) {
            $art = Art::find($this->data->objDesignArt);            
        } else {
            $art = null;
        }

        if($this->data->objDesignLiner){
            $liner = Liner::find($this->data->objDesignLiner);
        } else {
            $liner = null;
        }
        if($this->data->objDesignFrame){
            $frame = Frame::find($this->data->objDesignFrame);
        } else {
            $frame = null;
        }

        $tvSize = $this->data->tvSize;
        $externalSpeakers = $this->data->externalSpeakers;
        $royaltyFee = $this->data->royaltyFee ;
        $msrp = $this->data->msrp;
        $totalPrice = $this->data->totalPrice;
        
        $name = $this->data->name;
        $email = $this->data->email ;
        $phone = $this->data->phone;
        $address = $this->data->address;
        $country = $this->data->country;
        $city = $this->data->city;
        $state = $this->data->state;
        $zip = $this->data->zip;
        $addressType = $this->data->addressType;
        $liftgate = $this->data->liftgate;

        $mounting = $this->data->mounting;
        $speakerLocation = $this->data->speakerLocation;
        $voltage = $this->data->voltage;
        $grill = $this->data->grill;
        $controlSystem = $this->data->controlSystem;
        $speakerBrand = $this->data->speakerBrand;
        $speakerModel = $this->data->speakerModel;


        $notes = $this->data->notes;
        $poNumber = $this->data->poNumber;

        $this->subject('AVI Solutions Plus: Order');
        return $this->view('mail.order', compact('art','frame','liner', 'tvSize', 'externalSpeakers', 'royaltyFee', 'userImagePath','msrp', 'totalPrice', 'name', 'email', 'phone', 'address', 'country', 'city', 'state', 'zip', 'addressType', 'liftgate', 'mounting', 'speakerLocation','grill', 'controlSystem','speakerBrand', 'speakerModel', 'voltage', 'notes', 'poNumber'));
    }
}
