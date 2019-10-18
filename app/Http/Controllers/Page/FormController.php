<?php

namespace App\Http\Controllers\Page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactoMail;
use App\Mail\CotizacionMail;
use App\Empresa;

class FormController extends Controller
{
    public function contacto( Request $request ) {
        $dataRequest = $request->all();
        unset( $dataRequest[ "_token" ] );
        $email = Empresa::first()->form[ "contacto" ];
        Mail::to( $email )->send( new ContactoMail( $dataRequest ) );
        
        if (count(Mail::failures()) > 0)
            return back()->withErrors(['mssg' => "Ha ocurrido un error al enviar el formulario"]);
        else
            return back()->withSuccess(['mssg' => "Formulario enviado correctamente"]);
    }
    
    public function cotizacion( Request $request ) {
        $dataRequest = $request->all();
        unset( $dataRequest[ "_token" ] );
        $email = Empresa::first()->form[ "cotizacion" ];
        $file = $request->file('file');

        Mail::to( $email )->send( new CotizacionMail( $dataRequest , $file ) );
        
        if (count(Mail::failures()) > 0)
            return back()->withErrors(['mssg' => "Ha ocurrido un error al enviar el formulario"]);
        else
            return back()->withSuccess(['mssg' => "Formulario enviado correctamente"]);
    }
}
