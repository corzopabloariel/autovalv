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
    public function datos( $link = null ) {
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
            ],
            "familias" => Familia::where( 'elim' , 0 )->orderBy( 'order' )->get()
        ];
        if( !empty( $link ) ) {
            if( isset( $datos->metadata[ $link ] ) )
                $data[ "metadato" ] = $datos->metadata[ $link ];
        }
        return $data;
    }

    public function buscar( Request $request ) {
        $link = "search";
        $dataRequest = $request->all();
        if( !isset( $dataRequest[ "buscar" ] ) )
            return back();
        
        $buscar = htmlentities( $dataRequest[ "buscar" ] );
        $data = self::datos( "buscar" );
        $data[ "buscar" ] = $dataRequest[ "buscar" ];
        //dd($buscar);
        $data[ "title" ] = isset( $data[ "empresa" ][ "secciones" ][ $link ] ) ? $data[ "empresa" ][ "secciones" ][ $link ] : $data[ "empresa" ][ "secciones" ][ "home" ];
        $data[ "metadato" ] = isset( $data[ "empresa" ][ "metadatos" ][ $link ] ) ? $data[ "empresa" ][ "metadatos" ][ $link ] : $data[ "empresa" ][ "metadatos" ][ "home" ];
        $data[ "sliders" ] = Slider::where( "section" , $link )->where( "elim" , 0 )->get();
        $data[ "contenido" ] = Contenido::where( "section" , $link )->where( "elim" , 0 )->first();
        $data[ "view" ] = "page.{$link}";
        
        $data[ "elementos" ] = Producto::where( "title" , "LIKE" , "%{$buscar}%" )->where( 'elim' , 0 )->
            where( 'elim' , 0 )->orWhere( "metadata" , "LIKE" , "%{$buscar}%" )->where( 'elim' , 0 )->
            orWhereHas('familia', function ($query) use ($buscar) {
                $query->where('title', 'LIKE', "%{$buscar}%");
            })->where( 'elim' , 0 )->
            orderBy( 'order' )->paginate( 15 );

        return view( 'layouts.main' ,compact( 'data' ) );
    }

    public function index( $link = null ) {
        $data = self::datos( $link );
        if( empty( $link ) )
            $link = "home";
        
        $data[ "title" ] = isset( $data[ "empresa" ][ "secciones" ][ $link ] ) ? $data[ "empresa" ][ "secciones" ][ $link ] : $data[ "empresa" ][ "secciones" ][ "home" ];
        $data[ "metadato" ] = isset( $data[ "empresa" ][ "metadatos" ][ $link ] ) ? $data[ "empresa" ][ "metadatos" ][ $link ] : $data[ "empresa" ][ "metadatos" ][ "home" ];
        $data[ "sliders" ] = Slider::where( "section" , $link )->where( "elim" , 0 )->get();
        $data[ "contenido" ] = Contenido::where( "section" , $link )->where( "elim" , 0 )->first();
        $data[ "view" ] = "page.{$link}";

        switch( $link ) {
            case "home":
                $data[ "productos" ] = Producto::where( "destacado" , 1 )->where( "elim" , 0 )->orderBy( "order" )->take( 4 )->get();
            break;
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
        $data = self::datos( "productos" );
        $link = "familia";
        $data[ "familia" ] = Familia::find( $id );
        $data[ "productos" ] = $data[ "familia" ]->productos()->where( "elim", 0 )->orderBy("order")->paginate(15);

        $data[ "title" ] = isset( $data[ "empresa" ][ "secciones" ][ $link ] ) ? $data[ "empresa" ][ "secciones" ][ $link ] : $data[ "empresa" ][ "secciones" ][ "home" ];
        $data[ "metadato" ] = isset( $data[ "empresa" ][ "metadatos" ][ $link ] ) ? $data[ "empresa" ][ "metadatos" ][ $link ] : $data[ "empresa" ][ "metadatos" ][ "home" ];
        $data[ "sliders" ] = Slider::where( "section" , $link )->where( "elim" , 0 )->get();
        $data[ "contenido" ] = Contenido::where( "section" , $link )->where( "elim" , 0 )->first();
        $data[ "view" ] = "page.{$link}";

        return view( 'layouts.main' ,compact( 'data' ) );
    }
    public function producto( $url , $url2 , $id ) {
        $data = self::datos( "productos" );
        $link = "producto";
        $data[ "producto" ] = Producto::find( $id );
        $data[ "metadato" ][ "keywords" ] = $data[ "producto" ]->metadata;
        $data[ "familia" ] = $data[ "producto" ]->familia;
        $data[ "productos" ] = $data[ "familia" ]->productos()->where( "elim", 0 )->orderBy("order")->paginate(15);
        $data[ "relacionados" ] = $data[ "familia" ]->productos()->where( "elim" , 0 )->orderByRaw('RAND()')->take( 3 )->get();

        $data[ "title" ] = isset( $data[ "empresa" ][ "secciones" ][ $link ] ) ? $data[ "empresa" ][ "secciones" ][ $link ] : $data[ "empresa" ][ "secciones" ][ "home" ];
        $data[ "metadato" ] = isset( $data[ "empresa" ][ "metadatos" ][ $link ] ) ? $data[ "empresa" ][ "metadatos" ][ $link ] : $data[ "empresa" ][ "metadatos" ][ "home" ];
        $data[ "sliders" ] = Slider::where( "section" , $link )->where( "elim" , 0 )->get();
        $data[ "contenido" ] = Contenido::where( "section" , $link )->where( "elim" , 0 )->first();
        $data[ "view" ] = "page.{$link}";

        return view( 'layouts.main' ,compact( 'data' ) );
    }

    public function contacto( $url , $id ) {
        $link = "contacto";
        $data = self::datos( $link );
        if( empty( $link ) )
            $link = "home";
        
        $data[ "title" ] = isset( $data[ "empresa" ][ "secciones" ][ $link ] ) ? $data[ "empresa" ][ "secciones" ][ $link ] : $data[ "empresa" ][ "secciones" ][ "home" ];
        $data[ "metadato" ] = isset( $data[ "empresa" ][ "metadatos" ][ $link ] ) ? $data[ "empresa" ][ "metadatos" ][ $link ] : $data[ "empresa" ][ "metadatos" ][ "home" ];
        $data[ "sliders" ] = Slider::where( "section" , $link )->where( "elim" , 0 )->get();
        $data[ "producto" ] = Producto::find( $id );
        $data[ "contenido" ] = Contenido::where( "section" , $link )->where( "elim" , 0 )->first();
        $data[ "view" ] = "page.{$link}";
        return view( 'layouts.main' ,compact( 'data' ) );
    }
}
