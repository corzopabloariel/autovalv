<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Familia;
class FamiliaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( $id = null )
    {
        if( empty( $id ) ) {
            $familia = Familia::where( 'elim',0 )->orderBy('order')->get();
            $data = [
                "view"      => "auth.parts.familia",
                "title"     => "Familias",
                "familia"   => $familia,
                "familia_id" => null
            ];
        } else {
            $familia = Familia::find( $id );
            $url = route( 'familias.index' );
            $breadcrumb = "<li class='breadcrumb-item'><a href='{$url}'>Familias</a></li>";
            $breadcrumb .= "<li class='breadcrumb-item active'>Subfamilias de {$familia->title}</li>";
            
            $data = [
                "view"      => "auth.parts.familia",
                "title"     => "Sub familias",
                "familia_id" => $id,
                "familia"   => $familia->familias,
                "breadcrumb" => $breadcrumb,
                "url"   => $url
            ];
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
                Familia::create($OBJ);
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
        return Familia::find($id);
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
        $model = new Familia;
        
        try {
            (new AdmController)->delete( self::edit( $request->all()[ "id" ] ) , $model->getFillable() );
            return 1;
        } catch (\Throwable $th) {
            return 0;
        }
    }
}
