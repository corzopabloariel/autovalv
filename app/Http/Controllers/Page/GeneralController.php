<?php

namespace App\Http\Controllers\Page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Empresa;
use App\Contenido;
use App\Documentacion;
use App\Slider;
use App\Producto;
use App\Familia;
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
        $data[ "contenido" ] = Contenido::where( "section" , $link )->where( "elim" , 0 )->first();
        $data[ "view" ] = "page.{$link}";

        switch( $link ) {
            case "productos":
                $data[ "productos" ] = Familia::where( "elim" , 0 )->orderBy( "order" )->get();
            break;
            case "documentacion":
                $data[ "documentacion" ] = Documentacion::where( "elim" , 0 )->orderBy( "order" )->get();
            break;
        }
        
        return view( 'layouts.main' ,compact( 'data' ) );
    }

    public function familia( $url , $id ) {
        $data = self::datos();
        $link = "familia";
        $data[ "familia" ] = Familia::find( $id );
        $data[ "productos" ] = $data[ "familia" ]->productos()->where( "elim", 0 )->orderBy("order")->paginate(15);
        $data[ "familias" ] = Familia::where( 'elim' , 0 )->orderBy( 'order' )->get();

        $data[ "title" ] = isset( $data[ "empresa" ][ "secciones" ][ $link ] ) ? $data[ "empresa" ][ "secciones" ][ $link ] : $data[ "empresa" ][ "secciones" ][ "home" ];
        $data[ "metadato" ] = isset( $data[ "empresa" ][ "metadatos" ][ $link ] ) ? $data[ "empresa" ][ "metadatos" ][ $link ] : $data[ "empresa" ][ "metadatos" ][ "home" ];
        $data[ "sliders" ] = Slider::where( "section" , $link )->where( "elim" , 0 )->get();
        $data[ "contenido" ] = Contenido::where( "section" , $link )->where( "elim" , 0 )->first();
        $data[ "view" ] = "page.{$link}";

        return view( 'layouts.main' ,compact( 'data' ) );
    }
    public function producto( $url , $url2 , $id ) {
        $data = self::datos();
        $link = "producto";
        $data[ "producto" ] = Producto::find( $id );
        $data[ "familia" ] = $data[ "producto" ]->familia;
        $data[ "productos" ] = $data[ "familia" ]->productos()->where( "elim", 0 )->orderBy("order")->paginate(15);
        $data[ "familias" ] = Familia::where( 'elim' , 0 )->orderBy( 'order' )->get();

        $data[ "title" ] = isset( $data[ "empresa" ][ "secciones" ][ $link ] ) ? $data[ "empresa" ][ "secciones" ][ $link ] : $data[ "empresa" ][ "secciones" ][ "home" ];
        $data[ "metadato" ] = isset( $data[ "empresa" ][ "metadatos" ][ $link ] ) ? $data[ "empresa" ][ "metadatos" ][ $link ] : $data[ "empresa" ][ "metadatos" ][ "home" ];
        $data[ "sliders" ] = Slider::where( "section" , $link )->where( "elim" , 0 )->get();
        $data[ "contenido" ] = Contenido::where( "section" , $link )->where( "elim" , 0 )->first();
        $data[ "view" ] = "page.{$link}";

        return view( 'layouts.main' ,compact( 'data' ) );
    }
}
