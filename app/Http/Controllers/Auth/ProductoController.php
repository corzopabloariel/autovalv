<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Producto;
use App\Familia;
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producto = Producto::where( 'elim',0 )->orderBy('order')->paginate( 15 );
        $data = [
            "view"      => "auth.parts.producto",
            "title"     => "Productos",
            "familias"  => Familia::where( 'elim' , 0 )->orderBy( 'order' )->pluck( 'title' , 'id' ),
            "elementos"  => $producto
        ];
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
            dd($OBJ);
            if(is_null($data)) {
                Producto::create($OBJ);
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
        return Producto::find($id);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $model = new Producto;
        
        try {
            (new AdmController)->delete( self::edit( $request->all()[ "id" ] ) , $model->getFillable() );
            return 1;
        } catch (\Throwable $th) {
            return 0;
        }
    }
}
