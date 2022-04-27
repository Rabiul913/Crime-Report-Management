<?php

namespace App\Http\Controllers;

use App\Models\Investigation;
use App\Models\User;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Auth;

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
        $request->validate([
            'complaint_id'=> 'required',
            'user_id'=> 'required',
            'detail'=> 'required',
            'date'=> 'required',
            'step'=> 'required',
            'status'=> 'required',
        ]);

        $input = $request->all();   

        Investigation::create($input);
     
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Investigation  $investigation
     * @return \Illuminate\Http\Response
     */
    public function edit(Investigation $investigation)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Investigation  $investigation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Investigation $investigation)
    {
        //
    }
}
