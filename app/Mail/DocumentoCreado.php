<?php

namespace Empresa\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DocumentoCreado extends Mailable
{
    use Queueable, SerializesModels;

    protected $documento;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($documento)
    {
        $this->documento = $documento;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->from('empresa@empresa.com', 'Empresa')
            ->subject('Documento nuevo');
        return $this->markdown('emails.documentos.creado');
    }
}
