<?php

namespace App\Http\Controllers;
use App\Models\Workers;
use App\Models\Hours;

use Illuminate\Http\Request;
use Illuminate\View\View;

class WorkersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workers = Workers::all()->sortBy('id');
        return view('workers.list',
    ['workers' => $workers
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('workers.create');

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
            'surname' => 'required',
        ]);


        Workers::create($request->all());

        return view('home')->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $workerID, Request $request): View
    {
        $worker = Workers::find($workerID);

        $work = Hours::with('workers.hours')->find($workerID);
 $test = $work->workers->hours;
 $hours_array=[];
 $dates_array = [];
 foreach($test as $t){
     if($t->status_of_billings == false)

     {
        array_push($hours_array, intval($t->hours));

        array_push($dates_array, ($t->work_day));

     }

 }
 $unpaid_hours = array_sum($hours_array);

 if(!empty($dates_array)){
    $hours_unpaid_from = min($dates_array);
    $hours_unpaid_to = max($dates_array);
    return view('workers.show', [
        'worker' => $worker,
        'unpaid_hours' =>$unpaid_hours,
        'hours_unpaid_from' =>$hours_unpaid_from,
        'hours_unpaid_to' => $hours_unpaid_to
    ]);
 }



        return view('workers.show', [
            'worker' => $worker,
            'unpaid_hours' =>$unpaid_hours,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function edit(int $workerID)
    {

        $worker = Workers::find($workerID);

		return view('workers.edit', compact('worker', 'workerID'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(int $workerID, Request $request, Workers $workers)
    {
        $worker = Workers::find($workerID);
$worker->name = $request->input('name');
$worker->surname = $request->input('surname');
$worker->price_hour = $request->input('price_hour');
$worker->address = $request->input('address');
$worker->notes = $request->input('notes');

        $worker->  save();

        return redirect()->route('home')->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $workerID, Workers $workers)
    {
        $workers->destroy($workerID);

        return view('home')
                        ->with('success','post deleted successfully');
    }
}
