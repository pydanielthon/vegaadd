<?php

namespace App\Http\Controllers;
use App\Models\Billings;
use App\Models\Hours;
use App\Models\Workers;
use App\Models\Contrahents;
use App\Models\Category;

use Illuminate\Http\Request;

class BillingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $billings = Billings::all()->sortBy('id');
        return view('billings.list',
    ['billings' => $billings
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $workers = Workers::all();
        $contrahents = Contrahents::all();
        $category = Category::all();
        return view('billings.create',
         [
             'workers' => $workers,
             'contrahents' => $contrahents,
             'category'=> $category


         ]
        );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $billings = new Billings();
        $billings->contrahents_id = $request['contrahentID'];
        $billings->workers_id = $request['workerID'];
        $billings->price = $request['price'];
        $billings->date = $request['date'];
        $billings->category_id = $request->get('categoryID');
        $billings->notes = $request['notes'];

        $billings->save();

        $request->validate([
        ]);



        return view('home')->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Billings $billings)
    {
        return view('billings.show',compact('billings'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Billings $billings)
    {
        return view('billings.edit',compact('billings'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Billings $billings)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $billings->update($request->all());

        return redirect()->route('billings.list')->with('success','Post updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Billings $billings)
    {
        $billings->delete();

        return view('billings.list')
                        ->with('success','post deleted successfully');

    }
}