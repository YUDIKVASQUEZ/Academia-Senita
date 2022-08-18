<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeTeacherRequest;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tutor = Teacher::all();//Traemos toda la info de la tabla courses a trabes del modelo y el método all()
        return view('teachers.index', compact('tutor'));//Se adjunta grade a la vista para poderlo usar, usando compact
        // return $grade;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeTeacherRequest $request)
    {
        if($request->hasFile('photo')){
            $File = $request->file('photo');
        }

        //Se devuelve la petición hecha al servidor
        // return $request->all();
        $tutor = new Teacher();//Crear una instancia de la clase Teacher
        $tutor->name = $request->input('name');
        $tutor->lastname = $request->input('lastname');
        $tutor->university_degree = $request->input('university_degree');
        $tutor->age = $request->input('age');
        $tutor->contract_date = $request->input('contract_date');

        if($request->hasFile('photo')){
            $tutor->photo = $request->file('photo')->store('public/teachers');
        }
        if($request->hasFile('identify_document')){
            $tutor->identify_document = $request->file('identify_document')->store('public/identify_document');
        }
        $tutor->save();//Comando para registrar la info en la bd
        return view('teachers.add_teacher');
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
        $tutor = Teacher::find($id);
        return view('teachers.show', compact('tutor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tutor = Teacher::find($id);

        return view('teachers.edit', compact('tutor'));
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
        $tutor = Teacher::find($id);
        /*llenar la tabla cursos representado por la instancia
        con todo lo que vienen desde el request*/
        //$grade->fill($request->all());
        $tutor->fill($request->except('photo'));
        if($request->hasFile('photo')){
            $tutor->photo = $request->file('photo')->store('public/teachers');
        }
        if($request->hasFile('identify_document')){
            $tutor->identify_document = $request->file('identify_document')->store('public/identify_document');
        }
        $tutor->save();
        return view('teachers.edit_teacher');
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
        $tutor = Teacher::find($id);

        $urlImagenBD = $tutor->photo;
        //return $urlImagenBD;
        $nameImagen = str_replace('public/','\storage\\',$urlImagenBD);
        //return $nameImagen;
        $rutaCompleta= public_path().$nameImagen;
        // return $rutaCompleta;
        unlink($rutaCompleta);

        $urlDocument = $tutor->identify_document;
        $documentName = str_replace('public/','\storage\\',$urlDocument);
        $rutcomplete = public_path().$documentName;
        unlink($rutcomplete);
        $tutor->delete();
        return view('teachers.del_teacher');
        // return $grade;
    }
}
