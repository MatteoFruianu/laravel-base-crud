<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classroom;
use Illuminate\Validation\Rule; //importare per permettere le modifiche


// Tabella predisposta da Laravel con tutti i metodi CRUD, creata automaticamente con il comando da terminale 'php artisan make:controller --resource ClassroomController'

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get data from DB
        $classrooms = Classroom::all();
        // dd($classrooms);
        return view('classrooms.index', compact('classrooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('classrooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $data = $request->all();

        // dd($data);

        // validazione
        $request->validate([
            'name' => 'required|unique:classrooms|max:10',
            'description' => 'required'
        ]);

        // salvare a db
        $classroom = new Classroom();
        // $classroom->name = $data['name'];
        // $classroom->description = $data['description']; -> al posto di elencare ad uno ad uno concateno il metodo fill
        $classroom->fill($data);

        $saved = $classroom->save();
        // dd($saved);
        if($saved == true) {
            return redirect()->route('classrooms.show', $classroom->id); //se tutto è andato a buon fine questo sereve a reindirizzare alla pagina appena creata
        }    

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Classroom $classroom) //questa tra parentesi è la versione contratta della logica contenuta tra le graffe ->
    {
        
        // $classroom = Classroom::find($id);
        
        return view('classrooms.show', compact('classroom'));
    }





    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $classroom = Classroom::find($id);
        return view('classrooms.edit', compact('classroom'));

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
        //DATI INVIATI DALLA FORM
        $data = $request->all();

        //ISTANZA SPECIFICA
        $classroom = Classroom::find($id); //per beccare l'elemento specifico targetizzato

       //VALIDAZIONE
        $request->validate([
            'name' => [
                'required',
                Rule::unique('classrooms')->ignore($id),
                'max:10'],
            'description' => 'required'
        ]);

        // aggiornare dati a db

        $updated = $classroom->update($data);

        if($updated) {
            return redirect()->route('classrooms.show', $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $classroom = Classroom::find($id);

        $ref = $classroom->name;

        $deleted = $classroom->delete();

        if($deleted) {
            return redirect()->route('classrooms.index')->with('deleted', $ref);
        }
    }
}
