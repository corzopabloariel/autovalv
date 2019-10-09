<?php

namespace App\Http\Controllers\Page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Empresa;
use App\Contenido;
use App\Slider;
class GeneralController extends Controller
{
    public function datos() {
        $datos = Empresa::first();
        $whatsapp = $telefono = [];
        
        for($i = 0 ; $i < count($datos["phone"]) ; $i++) {
            if($datos[ "phone" ][ $i ][ "tipo" ] != "wha") continue;
            $whatsapp = $datos[ "phone" ][ $i ];
            break;
        }
        for($i = 0 ; $i < count($datos["phone"]) ; $i++) {
            if($datos[ "phone" ][ $i ][ "tipo" ] != "tel") continue;
            $telefono = $datos[ "phone" ][ $i ];
            break;
        }
        $data = [
            "empresa" => $datos,
            "whatsapp" => $whatsapp,
            "telefono" => $telefono,
            "terminos" => Contenido::where( "section" , "terminos" )->where( "elim" , 0 )->first(),
            "metadato" => [
                "description" => "",
                "keywords" => ""
            ]
        ];
        return $data;
    }

    public function index( $link = null ) {
        $data = self::datos();
        if( empty( $link ) )
            $link = "home";
        
        $data[ "title" ] = isset( $data[ "empresa" ][ "secciones" ][ $link ] ) ? $data[ "empresa" ][ "secciones" ][ $link ] : $data[ "empresa" ][ "secciones" ][ "home" ];
        $data[ "metadato" ] = isset( $data[ "empresa" ][ "metadatos" ][ $link ] ) ? $data[ "empresa" ][ "metadatos" ][ $link ] : $data[ "empresa" ][ "metadatos" ][ "home" ];
        $data[ "sliders" ] = Slider::where( "section" , $link )->where( "elim" , 0 )->get();
        $data[ "contenido" ] = Contenido::where( "section" , $link )->where( "elim" , 0 )->get();
        $data[ "view" ] = "page.{$link}";
        
        return view( 'layouts.main' ,compact( 'data' ) );
    }
}
