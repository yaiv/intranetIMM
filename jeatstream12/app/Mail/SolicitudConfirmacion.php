<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\SolicitudServicio; 

class SolicitudConfirmacion extends Mailable
{
    use Queueable, SerializesModels;

    public $solicitud; // Variable pública para usarla en la vista

    
    public function __construct(SolicitudServicio $solicitud)
    {
        $this->solicitud = $solicitud;
    }

    public function build()
    {
        
        return $this->subject('Confirmación de Solicitud #' . $this->solicitud->id)
                    ->view('emails.confirmacionServicio'); 
    }
}