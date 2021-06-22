<?php

namespace App\Http\Controllers;
use App\Models\Hours;
use App\Models\Workers;
use App\Models\Contrahents;

use Illuminate\Http\Request;

class HoursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hours = Hours::all()->sortBy('id');
        return view('hours.list',
    ['hours' => $hours
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

        return view('hours.create',
         [
             'workers' => $workers,
             'contrahents' => $contrahents


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
        $hours = new Hours();
        $hours->contrahents_id = $request['contrahentID'];
        $hours->workers_id = $request['workerID'];
        $hours->work_day = $request['work_day'];
        $hours->hours = $request['hours'];
        $hours->workers_price_hour = Workers::find($hours->workers_id)->price_hour;
        $hours->contrahents_salary_cash = Contrahents::find($hours->contrahents_id)->salary_cash;
        $hours->contrahents_salary_invoice = Contrahents::find($hours->contrahents_id)->salary_invoice;

        // $hours->contrahents_salary_cash = $request['contrahents_salary_cash'];
        // $hours->workers_price_hour = $request['workers_price_hour'];
        // $hours->contrahents_salary_invoice = $request['contrahents_salary_invoice'];

        $hours->status_of_billings = true;
        $hours->save();
        $request->validate([
            'data' => 'required',
            'hours' => 'required',
        ]);


        // Hours::create($request->all());

        return view('home')->with('success','Post created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Hours $hours)
    {
        return view('hours.show',compact('hours'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Hours $hours)
    {
        return view('hours.edit',compact('hours'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hours $hours)
    {
        $request->validate([
            'data' => 'required',
            'hours' => 'required',
        ]);

        $hours->update($request->all());

        return redirect()->route('hours.list')->with('success','Post updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hours $hours)
    {
        $hours->delete();

        return view('hours.list')
                        ->with('success','post deleted successfully');

    }
}