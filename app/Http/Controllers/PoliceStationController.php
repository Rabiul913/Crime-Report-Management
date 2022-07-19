<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Police_station;
use App\Models\District;

class PoliceStationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $police_stations=Police_station::latest()->get();


        // foreach($police_stations as $police_station){
        //     $dis=$police_station->District->name;

        //     dd($dis);
        // }


        
        
        return view('pages.police_stations.index',compact('police_stations'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $districts=District::latest()->get();
        return view('pages.police_stations.create',compact('districts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'district_id'=> 'required',
            'station_name'=> 'required',
            'address'=> 'required',
            'mobile'=> 'required',
            'email'=> 'required',
            'status'=> 'required',           
        ]);

        $input = $request->all();   

        Police_station::create($input);
     
         return redirect()->route('police_stations.index')
                        ->with('success','Police Station created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Police_station $police_station)
    {
        return view('pages.police_stations.view',compact('police_station'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Police_station $police_station)
    {
        $districts=District::latest()->get();
        return view('pages.police_stations.edit',compact('police_station','districts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Police_station $police_station)
    {
        request()->validate([
            'district_id'=> 'required',
            'station_name'=> 'required',
            'address'=> 'required',
            'mobile'=> 'required',
            'email'=> 'required',
            'status'=> 'required',    
        ]);
    
        $police_station->update($request->all());
    
        return redirect()->route('police_stations.index')
                        ->with('success','Police Station updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Police_station::find($id)->delete();

        return redirect()->route('police_stations.index')
            ->with('success', 'Police Station deleted successfully.');
    }
}
