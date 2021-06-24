<?php

namespace App\Mail;

use App\Frame;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection;

class SampleFramesOrderMail extends Mailable
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
        $priceSampleFrames = $this->data->priceSampleFrames;
        $framesList = $this->data->framesList;

        $framesId = explode(",",$framesList);

        $framesCollection = new Collection();

        foreach($framesId as $frameId) {
            $frame = Frame::find($frameId);
            $framesCollection->push($frame);
        }

        $name = $this->data->name;
        $email = $this->data->email;
        $phone =  $this->data->phone;
        $address = $this->data->address;
        $country = $this->data->country;
        $city = $this->data->city;
        $state = $this->data->state;
        $zip = $this->data->zip;
        $addressType = $this->data->addressType;
        $this->subject('AVI Solutions Plus: Sample Frame Order');
        return $this->view('mail.sampleOrder', compact('framesCollection', 'framesList', 'priceSampleFrames','name', 'email', 'phone', 'address', 'country', 'city','state', 'zip', 'addressType'));
    }
}
