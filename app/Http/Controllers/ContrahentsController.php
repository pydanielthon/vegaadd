<?php

namespace App\Http\Controllers;
use App\Models\Contrahents;

use Illuminate\Http\Request;

class ContrahentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contrahents = Contrahents::all()->sortBy('id');
        return view('contrahents.list',
    ['contrahents' => $contrahents
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contrahents.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);


        Contrahents::create($request->all());

        return view('home')->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contrahents $contrahents)
    {
        return view('contrahents.show',compact('contrahents'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Contrahents $contrahents)
    {
        return view('contrahents.edit',compact('contrahents'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contrahents $contrahents)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $contrahents->update($request->all());

        return redirect()->route('contrahents.list')->with('success','Post updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contrahents $contrahents)
    {
        $contrahents->delete();

        return view('contrahents.list')
                        ->with('success','post deleted successfully');

    }
}