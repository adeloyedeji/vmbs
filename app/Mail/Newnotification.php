<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Newnotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public $name,$from,$email,$messages;
     
    public function __construct($name,$email,$messages,$from="")
    {
        //
        $this->name=$name;
        $this->email=$email;
        $this->messages=$messages;
     
        $this->from=$from;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if(\Auth::check()){
            
            $from=\Auth::user()->email;
        }
        else{
            
            $from="noreply@vmb.com";;
        }
        return $this->from($from)->view('emails.sendnotification')
                            ->with([
                            'name'=>$this->name,
                            'email'=>$this->email,
                            'messages'=>$this->messages 
                        ]);
    }
}
