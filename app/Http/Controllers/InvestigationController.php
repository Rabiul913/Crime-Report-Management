<?php

namespace App\Http\Controllers;

use App\Models\Investigation;
use App\Models\Attestor;
use App\Models\User;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InvestigationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $investigations=Investigation::latest()->get();
    //   dd($investigations);
        return view('pages.investigations.index',compact('investigations'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $user_id=Auth::user()->id;
        // dd($user_id);
        $user = User::find(Auth::user()->id);

        // dd($user);
        $complaints=Complaint::latest()->get();

        return view('pages.investigations.create',compact('user','complaints'));
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
            'complaint_id'=> 'required',
            'user_id'=> 'required',
            'detail'=> 'required',
            'date'=> 'required',
            'step'=> 'required',
            'status'=> 'required',
        ]);

        $investigation = new Investigation;
        $investigation->complaint_id=$request->complaint_id;
        $investigation->user_id=$request->user_id;
        $investigation->detail=$request->detail;
        $investigation->date=$request->date;
        $investigation->step=$request->step;
        $investigation->status=$request->status;
        $investigation->save();
      
            // $group->group_id = 2;
            // $group->save();
        // $investigation = $request->all();   

        // Investigation::create($investigation);

        for ($a = 0; $a < count($request->name); $a++)
        {
            $attestor = new Attestor;
            $attestor->complaint_id=$request->complaint_id;
            $attestor->name=$request->name[$a];
            $attestor->father_name=$request->father_name[$a];
            $attestor->address=$request->address[$a];
            $attestor->mobile=$request->mobile[$a];
            $attestor->status=$request->status;
            $attestor->save();
            // Attestor::create($attestor);
        }
     
         return redirect()->route('investigations.index')
                        ->with('success','Investigation created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Investigation  $investigation
     * @return \Illuminate\Http\Response
     */
    public function show(Investigation $investigation)
    {
        return view('pages.investigations.view',compact('investigation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Investigation  $investigation
     * @return \Illuminate\Http\Response
     */
    public function edit(Investigation $investigation)
    {
        $attestors=DB::table('attestors')
        ->where('complaint_id', '=', $investigation->complaint_id)
        ->get();
        $user = User::find(Auth::user()->id);
        $complaints=Complaint::latest()->get();
        // dd($attestors);

        return view('pages.investigations.edit',compact('investigation','attestors','user','complaints'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Investigation  $investigation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Investigation $investigation)
    {
        // dd($investigation->id);



        $request->validate([
            'complaint_id'=> 'required',
            'user_id'=> 'required',
            'detail'=> 'required',
            'date'=> 'required',
            'step'=> 'required',
            'status'=> 'required',
        ]);

        $investigation = Investigation::find($investigation->id);


        // dd($investigation);
        $investigation->complaint_id=$request->complaint_id;
        $investigation->user_id=$request->user_id;
        $investigation->detail=$request->detail;
        $investigation->date=$request->date;
        $investigation->step=$request->step;
        $investigation->status=$request->status;
        $investigation->push();
       

        for ($a = 0; $a < count($request->name); $a++)
        {
        if($a>0){
            if($request->attestor_id){
                $attestor = Attestor::find($request->attestor_id[$a]);
                // dd($request->complaint_id);
                $attestor->complaint_id=$request->complaint_id;
                $attestor->name=$request->name[$a];
                $attestor->father_name=$request->father_name[$a];
                $attestor->address=$request->address[$a];
                $attestor->mobile=$request->mobile[$a];
                $attestor->status=$request->status;
                $attestor->push();
            }else{
                $attestor = new Attestor;
                $attestor->complaint_id=$request->complaint_id;
                $attestor->name=$request->name[$a];
                $attestor->father_name=$request->father_name[$a];
                $attestor->address=$request->address[$a];
                $attestor->mobile=$request->mobile[$a];
                $attestor->status=$request->status;
                $attestor->save();
            }
        }
                       
        }
     
         return redirect()->route('investigations.index')
                        ->with('success','Investigation Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Investigation  $investigation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Investigation $investigation)
    {
        $attestors=  DB::table("attestors")->where('complaint_id',$investigation->complaint_id)->get();
        // dd($attestors);
        if($attestors){
            for ($a = 0; $a < count($attestors); $a++)
            {
                
                DB::table("attestors")->delete($attestors[$a]->id);
            }
        }     

        $investigation->delete();
    
        return redirect()->route('investigations.index')
                        ->with('success','Investigation deleted successfully');
    }
}
