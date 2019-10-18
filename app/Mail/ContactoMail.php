<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Producto;
class ContactoMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $data )
    {
        $this->data = $data;
        if( isset( $data[ "producto_id" ] ) )
            $this->data[ "producto" ] = Producto::find( $data[ "producto_id" ] );
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $title = isset( $this->data[ "producto_id" ] ) ? "Consulta de producto" : "Formulario de Contacto";
        return $this->replyTo( $this->data[ "email" ], $this->data[ "nombre" ] )->subject( $title )->view('page.form.contacto')->with( $this->data );
    }
}
