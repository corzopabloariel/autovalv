<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Empresa;
use App\Contenido;
class EmpresaController extends Controller
{
    public $model;
    public $data;
    public function __construct() {
        $this->model = new Empresa;
        $this->data = $this->model::first();
    }

    public function datos()
    {
        $data = [
            "title" => "Empresa :: Datos generales",
            "view" => "auth.parts.empresa",
            "seccion" => "empresa",
            "elementos" => $this->data
        ];
        return view('auth.distribuidor',compact('data'));
    }

    public function form(Request $request)
    {
        $dataRequest = $request->all();
        if(empty($dataRequest)) {
            $data = [
                "title"     => "Empresa :: Email de formularios",
                "view"      => "auth.parts.empresaForm",
                "seccion"   => "form",
                "elementos" => $this->data
            ];
            return view('auth.distribuidor',compact('data'));
        }
        try {
            unset( $dataRequest[ "_token" ] );
            $this->data->fill( [ "form" => $dataRequest ] );
            $this->data->save();
            return 1;
        } catch (\Throwable $th) {
            return 0;
        }
    }
    
    public function update(Request $request)
    {
        //try {
            $OBJ = (new AdmController)->object( $request , $this->data );
            //dd($OBJ);
            if( is_null( $this->data ) ) {
                Empresa::create( $OBJ );
                echo 1;
            } else {
                $this->data->fill( $OBJ );
                $this->data->save();
                echo 1;
            }
        /*} catch (\Throwable $th) {
            echo 0;
        }*/
    }
    /**
     * Redes sociales
     */
    public function redes() {
        $datos = $this->data["social_networks"];
        $data = [
            "title"     => "Empresa :: Redes sociales",
            "view"      => "auth.parts.empresaRedes",
            "elementos" => $datos
        ];
        return view('auth.distribuidor',compact('data'));
    }
    public function redesStore(Request $request, $id = null) {
        try {
            $redes = $this->data->social_networks;
            if( is_null( $id ) )
                $id = time();
            if( empty( $redes ) )
                $redes = [];
            else {
                if( !isset( $redes[ $id ] ) )
                    $redes[ $id ] = [];
            }
            $OBJ = (new AdmController)->object( $request );
            //dd( $OBJ );
            $redes[ $id ] = $OBJ;
    
            $this->data->fill([ "social_networks" => $redes ] );
            $this->data->save();
            return 1;
        } catch (\Throwable $th) {
            return 0;
        }
    }
    public function redesDestroy( Request $request )
    {
        try {
            $redes = $this->data->social_networks;
            unset( $redes[ $request->all()[ "id" ] ] );
    
            $this->data->fill( [ "social_networks" => $redes ] );
            $this->data->save();
            return 1;
        } catch (\Throwable $th) {
            return 0;
        }
    }
    public function redesEdit($id)
    {
        return $this->data->social_networks[ $id ];
    }
    public function redesUpdate(Request $request, $id) {
        return self::redesStore($request,$id);
    }
    public function terminos(Request $request) {
        $contenido = Contenido::where("section","terminos")->first();
        if(empty($contenido))
            $contenido = Contenido::create(["section" => "terminos", "data" => [ "titulo" => null, "texto" => null ]]);
        $data = [
            "title"     => "Contenido: TÉRMINOS Y CONDICIONES",
            "view"      => "auth.parts.contenido",
            "section"   => "terminos",
            "elementos" => $contenido
        ];
        return view('auth.distribuidor',compact('data'));
    }
}
