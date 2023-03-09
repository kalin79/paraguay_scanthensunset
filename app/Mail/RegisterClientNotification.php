<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterClientNotification extends Mailable
{
    use Queueable, SerializesModels;


    public $usuario_descuento;
    public $file;
    public function __construct($data,$file)
    {
        $this->usuario_descuento = $data;
        $this->file = $file;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $subject = 'Revisa tu código de descuento' ;

        $email = $this->subject( $subject )->view('mail.registro-cliente', ['cliente'=>$this->usuario_descuento] );
           // ->bcc('leslie@workaholics.pe');
        /*if($this->file){
            $email->attach($this->file);
        }*/
        return  $email;
    }
}
