<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use App\Models\Instructores;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    //llamar todos los cursos de la bd y retornalos a una vista
    public function index(){
        //select * from table => all()
        $cursos = Courses::all(); //[]

        return view('paginas.cursos', array("cursos" => $cursos));
    }

    //metodo para retornar la vista de formulario y lista de instructores
    public function obtenerForm(){
        $instructor = Instructores::all();
        return view("paginas.registrar", array("instructor" => $instructor));
    }

    //metodo para registrar un curso
    public function store(Request $request){
        //insert into table (campos) values (valores) => save()
        $curso = new Courses();
        $curso->title = $request->post('titulo');
        $curso->description = $request->post('descripcion');
        $curso->price = $request->post('precio');
        $curso->id_instructor = $request->post('instructores');
        $curso->save();
        //redireccionamos a la ruta de la lista de los cursos
        return redirect()->route('cursos');
    }

    //metodo para obtener la informacion de un curso en especifico
    public function editar($id){
        //select * from table where id = ?
        $curso = Courses::find($id);
        return view("paginas.editar", array("curso" => $curso));
    }
}
