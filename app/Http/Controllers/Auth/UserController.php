<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
class UserController extends Controller
{
    public $model;
    public function __construct() {
        $this->model = new User;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()["is_admin"]) {
            $data = [
                "view"      => "auth.parts.usuarios.index",
                "title"     => "Usuarios",
                "elementos"   => $this->model::where("id","!=",Auth::user()["id"])->get(),
                "buttons" => [
                    [ "i" => "fas fa-pencil-alt" , "b" => "btn-warning" , "t" => "Editar" ],
                    [ "i" => "fas fa-trash-alt" , "b" => "btn-danger" , "t" => "Eliminar" ]
                ],
            ];
            return view('auth.distribuidor',compact('data'));
        } else {
            dd( "NO posee autorización" );
        }
    }
    public function datos() {
        $data = [
            "usuario" => Auth::user(),
            "view"  => "auth.parts.usuarios.datos",
            "title" => "Mis datos"
        ];

        return view('auth.distribuidor',compact('data'));
    }

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
        return self::store($request,self::edit($id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->model::destroy($id);
        return 1;
    }
}
