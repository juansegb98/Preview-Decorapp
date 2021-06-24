<?php

namespace App\Mail;

use App\Art;
use App\Frame;
use App\Liner;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class QuoteMail extends Mailable
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

        $email = $this->data->email ;
        $royaltyFee = $this->data->royaltyFee ;
        $msrp = $this->data->msrp;
        $totalPrice = $this->data->totalPrice;
        $observations = $this->data->observations ;
        $tvSize = $this->data->tvSize ;
        $externalSpeakers = $this->data->externalSpeakers ;
        // return view('printPage', compact('art','frame','liner','userImagePath'));
        $this->subject('AVI Solutions Plus: Quote');
        return $this->view('mail.quote', compact('art','frame','liner', 'observations', 'tvSize', 'externalSpeakers', 'royaltyFee', 'userImagePath','msrp', 'totalPrice'));    
        // return $this->from('juanse@nyxent.com')->view('mail.quote', compact('art','frame','liner', 'observations', 'tvSize', 'externalSpeakers', 'royaltyFee', 'userImagePath','msrp','totalPrice'));    
    }
}
