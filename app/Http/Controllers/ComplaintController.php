<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\District;
use App\Models\Complaint;
use App\Models\Complaint_type;
use Illuminate\Http\Request;
use Auth;
use DB;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $complaints=Complaint::latest()->get();
      
        return view('pages.complaints.index',compact('complaints'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function running_list()
    {
        $user_id=Auth::user()->id;
        // $user = User::find($user_id);
        $complaints=DB::table('complaints')->where('status','enable')->where('user_id',$user_id)->get();
        // dd();
      
        return view('pages.complaints.index',compact('complaints'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function rejected_list()
    {
        $user_id=Auth::user()->id;
        // $user = User::find($user_id);
        $complaints=DB::table('complaints')->where('status','disable')->where('user_id',$user_id)->get();
        // dd();
      
        return view('pages.complaints.index',compact('complaints'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }



    public function getPolicestations(Request $request) 
    {     
        // if($request->ajax()){
        //     return $request->district_id;
        // }

        $id = $request->district_id;
        $policestations = DB::table("police_stations")->where("district_id",$id)->pluck("station_name","id");
            //    dd($policestations);
        return $policestations;
        
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id=Auth::user()->id;
        // dd($user_id);
        $user = User::find($user_id);

        // dd($user);
        $districts=District::latest()->get();
        $types=Complaint_type::latest()->get();
        return view('pages.complaints.create', compact('user','districts','types'));

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
            'user_id'=> 'required',
            'co_title'=> 'required',
            'co_against_name'=> 'required',
            'district_id'=> 'required',
            'police_station_id'=> 'required',
            'co_against_address'=> 'required',
            'co_type_id'=> 'required',
            'detail'=> 'required',
            'co_date'=> 'required',
            'status'=> 'required',
        ]);

        $input = $request->all();   

        Complaint::create($input);
     
         return redirect()->route('complaints.index')
                        ->with('success','Complaint created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function show(Complaint $complaint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function edit(Complaint $complaint)
    {
        // $user_id=Auth::user()->id;
        // dd($user_id);
        $user = User::find(Auth::user()->id);

        // dd($user);
        $districts=District::latest()->get();
        $types=Complaint_type::latest()->get();
        return view('pages.complaints.edit', compact('user','districts','types','complaint'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Complaint $complaint)
    {
        $request->validate([
            'user_id'=> 'required',
            'co_title'=> 'required',
            'co_against_name'=> 'required',
            'district_id'=> 'required',
            'co_against_address'=> 'required',
            'co_type_id'=> 'required',
            'detail'=> 'required',
            'co_date'=> 'required',
            'status'=> 'required',
        ]);

        $complaint->update($request->all());

        return redirect()->route('complaints.index')
                        ->with('success','Complaint updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function destroy(Complaint $complaint)
    {
        
        $complaint->delete();
    
        return redirect()->route('complaints.index')
                        ->with('success','Complaint deleted successfully');
    }
}
