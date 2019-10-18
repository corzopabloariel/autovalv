<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Producto;
use App\Familia;
class ProductoController extends Controller
{
    public $model;
    public function __construct() {
        $this->model = new Producto;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request )
    {
        $dataRequest = $request->all();
        $producto = $this->model::where( 'elim',0 )->orderBy( 'familia_id' )->orderBy('order')->paginate( 15 );
        $data = [
            "view"      => "auth.parts.producto",
            "title"     => "Productos",
            "familias"  => Familia::where( 'elim' , 0 )->orderBy( 'order' )->pluck( 'title' , 'id' ),
            "elementos"  => $producto
        ];
        if( isset( $dataRequest[ "buscar" ] ) ) {
            $buscar = $dataRequest[ "buscar" ];
            $data[ "buscar" ] = $buscar;
            $data[ "elementos" ] = $this->model::where( "title" , "LIKE" , "%{$buscar}%" )->where( 'elim' , 0 )->
                where( 'elim' , 0 )->orWhere( "metadata" , "LIKE" , "%{$buscar}%" )->where( 'elim' , 0 )->
                orWhereHas('familia', function ($query) use ($buscar) {
                    $query->where('title', 'LIKE', "%{$buscar}%");
                })->where( 'elim' , 0 )->
                orderBy( 'order' )->paginate( 15 );
        }
        return view('auth.distribuidor',compact('data'));
    }

    public function show() {}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $data = null)
    {
        //try {
            $OBJ = (new AdmController)->object( $request , $data );
            //dd($OBJ);
            if(is_null($data)) {
                $this->model::create($OBJ);
                echo 1;
            } else {
                $data->fill($OBJ);
                $data->save();
                echo 1;
            }
        /*} catch (\Throwable $th) {
            echo 0;
        }*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->model::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = self::edit($id);
        return self::store($request,$data);
    }

    public function file( $id ) 
    {
        $data = self::edit( $id );
        //dd($data);
        try {
            if( !empty( $data->file ) ) {
                $filename = public_path() . "/{$data->file[ 'i' ]}";
                if ( file_exists( $filename ) )
                    unlink( $filename );
            }
            $data->fill( [ "file" => null ] );
            $data->save();
            return 1;
        } catch (\Throwable $th) {
            return 0;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            (new AdmController)->delete( self::edit( $request->all()[ "id" ] ) , $this->model->getFillable() );
            return 1;
        } catch (\Throwable $th) {
            return 0;
        }
    }
}
