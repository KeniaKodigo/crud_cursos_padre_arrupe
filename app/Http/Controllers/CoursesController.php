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
        //select from table INNER JOIN table ON table.campo = table.campo where id = ?
        $curso = Courses::join('instructor','courses.id_instructor', '=', 'instructor.id')->select('courses.*', 'instructor.name as instructor')->find($id);
        //$curso = Courses::find($id);
        //select * from instructores
        $instructor = Instructores::all();
        return view("paginas.editar", array("curso" => $curso, "instructor" => $instructor));
    }

    //metodo para actualizar los datos de un curso por su id

    public function update(Request $request, $id){
        //select * from courses where id = ?
        $curso = Courses::find($id);
        $curso->title = $request->post('titulo');
        $curso->description = $request->post('descripcion');
        $curso->price = $request->post('precio');
        $curso->id_instructor = $request->post('instructores');
        //UPDATE table set campo = valor WHERE id = ?
        $curso->update();
        //redireccionamos a la ruta de la lista de los cursos
        return redirect()->route('cursos');
    }

    //metodo para eliminar un curso
    public function destroy($id){
        //delete from table where id = ?
        $cursos = Courses::where('id', '=', $id)->delete();

        return redirect()->route('cursos');
    }
}
