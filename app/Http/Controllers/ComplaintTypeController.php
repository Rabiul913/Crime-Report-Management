<?php

namespace App\Http\Controllers;

use App\Models\Complaint_type;
use Illuminate\Http\Request;

class ComplaintTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $complaint_types=Complaint_type::latest()->get();
      
        return view('pages.complaint_types.index',compact('complaint_types'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.complaint_types.create');
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
            'name'=> 'required',
            'status'=> 'required', 
           
        ]);

        $input = $request->all();   

        Complaint_type::create($input);
     
         return redirect()->route('complaint_types.index')
                        ->with('success','Complaint_type created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Complaint_type  $complaint_type
     * @return \Illuminate\Http\Response
     */
    public function show(Complaint_type $complaint_type)
    {
        return view('pages.complaint_types.view',compact('complaint_type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Complaint_type  $complaint_type
     * @return \Illuminate\Http\Response
     */
    public function edit(Complaint_type $complaint_type)
    {
        return view('pages.complaint_types.edit',compact('complaint_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Complaint_type  $complaint_type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Complaint_type $complaint_type)
    {
        request()->validate([
            'name' => 'required',
            'status' => 'required',
        ]);
    
        $complaint_type->update($request->all());
    
        return redirect()->route('complaint_types.index')
                        ->with('success','Complaint Type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Complaint_type  $complaint_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Complaint_type $complaint_type)
    {
        //
    }
}
