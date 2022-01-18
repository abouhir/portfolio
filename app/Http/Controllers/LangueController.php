<?php

namespace App\Http\Controllers;

use App\Models\Langue;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LangueController extends Controller
{
    function __construct()
    {
        $this->middleware("auth");
    }
    
    public function index()
    {
        $user = User::find(Auth::id());
        $langues = $user->langues;
        return view("langues.index",compact("langues"));
    }

    
    public function create()
    {
        return view("langues.create");
        
    }

    
    public function store(Request $request)
    {
        $input= $this->validate($request , [
            "nom" => "required" , 
            "niveau" => "required"
        ]);

        
    }

   
    public function show(Langue $langue)
    {
        //
    }

    
    public function edit(Langue $langue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Langue  $langue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Langue $langue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Langue  $langue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Langue $langue)
    {
        //
    }
}
