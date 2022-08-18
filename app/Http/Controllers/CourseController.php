<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeCourseRequest;
use App\Models\Course;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grade = Course::all();//Traemos toda la info de la tabla courses a trabes del modelo y el método all()
        return view('courses.index', compact('grade'));//Se adjunta grade a la vista para poderlo usar, usando compact
        // return $grade;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeCourseRequest $request)
    {

        /*$validationData = $request->validate([
            'name'=>'required|max:20',
            'description'=> 'required|max:30',
            'duration'=>'required|size:3',
            'imagen'=>'required|image'
        ]);*/

        if($request->hasFile('imagen')){
            $File = $request->file('imagen');
        }

        //Se devuelve la petición hecha al servidor
        // return $request->all();
        $grade = new Course();//Crear una instancia de la clase Curso
        $grade->name = $request->input('name');
        $grade->description = $request->input('description');
        $grade->duration = $request->input('duration');
        if($request->hasFile('imagen')){
            $grade->imagen = $request->file('imagen')->store('public/courses');
        }
        $grade->save();//Comando para registrar la info en la bd
        return 'El curso se ha guardado exitosamente';
        // return $grade->description;
        // return $grade;
        // return $request->input('name');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $grade = course::find($id);
        return view('courses.show', compact('grade'));
        // return view('courses.about_us');
        /* Returning the view courses.show */
        //return view('courses.show');
    }

    public function showAbout($id)
    {
        // return view('courses.about_us');
        return view('about_us');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grade = course::find($id);

        return view('courses.edit', compact('grade'));
        //return "El id del curso que desea actualizar es ..." . $id;

       // return 'La información que usted quiere actulizar, se ceria asi en formato array: .....' . $grade;
        //return view('courses.edit');
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
        $grade = course::find($id);
        /*llenar la tabla cursos representado por la instancia
        con todo lo que vienen desde el request*/
        //$grade->fill($request->all());
        $grade->fill($request->except('imagen'));
        if($request->hasFile('imagen')){
            $grade->imagen = $request->file('imagen')->store('public/courses');
        }

        $grade->save();
        return 'La actualización fue exitosa';
        //return $request;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grade = course::find($id);

        $urlImagenBD = $grade->imagen;
        //return $urlImagenBD;
        $nameImagen = str_replace('public/','\storage\\',$urlImagenBD);
        //return $nameImagen;
        $rutaCompleta= public_path().$nameImagen;
        // return $rutaCompleta;
        unlink($rutaCompleta);
        $grade ->delete();
        return 'El Registro se ha Eliminado Correctamente';
        // return $grade;
    }
}
