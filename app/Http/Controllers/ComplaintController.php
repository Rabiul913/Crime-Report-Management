<?php

namespace App\Http\Controllers;



use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\District;
use App\Models\Complaint;
use App\Models\Complaint_type;
use App\Models\Police_station;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

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

    public function pending_list()
    {
        
        $user_id=Auth::user()->id;
        // $user = User::find($user_id);
        $complaints=DB::table('complaints')->where('status',0)->where('user_id',$user_id)->get();
        // dd($complaints);
      
        return view('fontend.pages.pending_list',compact('complaints'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function running_list()
    {
        $user_id=Auth::user()->id;
        // $user = User::find($user_id);
        $complaints=DB::table('complaints')->where('status',1)->where('user_id',$user_id)->get();
        // dd($complaints);
      
        return view('fontend.pages.running_list',compact('complaints'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function rejected_list()
    {
        $user_id=Auth::user()->id;


        // $user = User::find($user_id);
        $complaints=DB::table('complaints')->where('status',0)->where('user_id',$user_id)->get();
        // dd();

        return view('fontend.pages.rejected_list',compact('complaints'))
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
    public function create(Request $request)
    {
        // $ip = $request->ip();
        $ip='103.83.235.135';
        // $ip = '162.159.24.227'; /* Static IP address */
        $currentUserInfo = Location::get($ip);

        // dd($currentUserInfo);
        // $user_id=Auth::user()->id;
        // dd($user_id);
        $user = User::find(Auth::user()->id);

        // dd($user);
        $districts=District::latest()->where('name',$currentUserInfo->cityName)->get();
        $district=$districts[0];
        // dd($district->id);
        $policestations=Police_station::latest()->where('district_id',$district->id)->get();
        // dd($policestations);
        $types=Complaint_type::latest()->get();

        $role = Role::join("model_has_roles","model_has_roles.role_id","=","roles.id")
        ->where("model_has_roles.model_id",Auth::user()->id)
        ->get();

            $role_name = null;
            
            foreach($role as $item)
            {
                $role_name =$item->name;
            }
    
        if($role_name=="User"){
            return view('fontend.pages.create_complaint',compact('user','district','types','policestations'));
        }else{
            return view('pages.complaints.create', compact('user','districts','types'));
        }

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
        $role = Role::join("model_has_roles","model_has_roles.role_id","=","roles.id")
        ->where("model_has_roles.model_id",Auth::user()->id)
        ->get();

            $role_name = null;
            
            foreach($role as $item)
            {
                $role_name =$item->name;
            }

            if ($file = $request->file('file')) {
                $destinationPath = 'file/complaint';
                $complaintfile = date('YmdHis') . "." . $file->getClientOriginalExtension();
                $file->move($destinationPath, $complaintfile);
                $input['file'] = "$complaintfile";
            }
    
        if($role_name=="User"){
            return redirect('pending-list')
            ->with('success','Complaint submited successfully.');
        }else{
            return redirect()->route('complaints.index')
            ->with('success','Complaint created successfully.');
        } 
    }

    



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function show(Complaint $Complaint)
    {
        return view('pages.complaints.view',compact('Complaint'));
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
        $investigator= DB::table("users")->join("model_has_roles","users.id","=","model_has_roles.model_id")
        ->join("roles","roles.id","=","model_has_roles.role_id")
        ->where("roles.name","Police Investigation Officer")
        ->select("users.name")
        ->get();
        
        // dd($investigator);
        $districts=District::latest()->get();
        $types=Complaint_type::latest()->get();
        return view('pages.complaints.edit', compact('user','districts','types','complaint','investigator'));
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
