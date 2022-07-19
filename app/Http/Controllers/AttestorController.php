<?php

namespace App\Http\Controllers;
use App\Models\Attestor;
use Illuminate\Http\Request;

class AttestorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attestors=Attestor::latest()->get();
      
        return view('pages.attestors.index',compact('attestors'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.attestors.create');
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
            'father_name'=> 'required', 
            'mobile'=> 'required', 
            'address'=> 'required', 
           
        ]);

        $input = $request->all();   

        Attestor::create($input);
     
         return redirect()->route('attestors.index')
                        ->with('success','Attestors created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Attestor $attestor)
    {
        return view('pages.attestors.view',compact('attestor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Attestor $attestor)
    {
        return view('pages.attestors.edit',compact('attestor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attestor $attestor)
    {
        request()->validate([
            'name'=> 'required',
            'father_name'=> 'required', 
            'mobile'=> 'required', 
            'address'=> 'required',
            'status' => 'required',
        ]);
    
        $district->update($request->all());
    
        return redirect()->route('attestors.index')
                        ->with('success','Attestors updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attestor $attestor)
    {
        $attestor->delete();
        return redirect()->route('attestors.index')
                        ->with('success','Attestor deleted successfully');
    }
}
