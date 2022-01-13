<?php

namespace App\Http\Controllers;

use App\Models\Predavac;
use Illuminate\Http\Request;

use App\Models\User;
use App\Http\Resources\PredavacResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class PredavacResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $predavaci = Predavac::all();
        // return PredavacResource::collection($predavaci);
        return response()->json(['Prikaz svih predavaca:', PredavacResource::collection($predavaci)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'imeIPrezime'=>'required|string|max:50',
            'zvanje'=>'required|string|max:50',
            'fakultet'=>'required|string|max:50',
            'kurs_id'=>'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $predavac = Predavac::create([
            'imeIPrezime'=>$request->imeIPrezime,
            'zvanje'=>$request->zvanje,
            'fakultet'=>$request->fakultet,
            'kurs_id'=>$request->kurs_id,
            'user_id' => Auth::user()->id,
           
        ]);

        return response ()->json(['Predavac je uspesno kreiran',new PredavacResource($predavac)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Predavac  $predavac
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $predavac = Predavac::find($id);
        // return new PredavacResource($predavac);
         $predavac = Predavac::find($id);
        if(is_null($predavac)){
            return response()->json('Trazeni podaci o predavacu nisu nadjeni',404);
        }else{
            return response()->json(['Trazeni predavac je:',new PredavacResource($predavac)]);
        }

        // return response()->json(['Trazeni predavac je: ', new PredavacResource($predavac)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Predavac  $predavac
     * @return \Illuminate\Http\Response
     */
    public function edit(Predavac $predavac)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Predavac  $predavac
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Predavac $predavac)
    {
        $validator = Validator::make($request->all(),[
            'imeIPrezime'=>'required|string|max:50',
            'zvanje'=>'required|string|max:50',
            'fakultet'=>'required|string|max:50',
            'kurs_id'=>'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $predavac->imeIPrezime = $request->imeIPrezime;
        $predavac->zvanje = $request->zvanje;
        $predavac->fakultet = $request->fakultet;
        $predavac->kurs_id = $request->kurs_id;

        $predavac->save();

        return response ()->json(['Predavac je uspesno promenjen',new PredavacResource($predavac)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Predavac  $predavac
     * @return \Illuminate\Http\Response
     */
    public function destroy(Predavac $predavac)
    {
        $predavac->delete();

        return response()->json('Predavac je uspesno obrisan!!!');
    }
}
