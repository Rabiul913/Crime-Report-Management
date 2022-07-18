@extends('layouts.app')
@section('title')
Attestors Details
@endsection
@section('content')

<section class="section">
                    <div class="card">
                        <div class="card-body">  
                            <table class="table table-striped">  
                                <tbody>
                                    <tr>
                                        <th>Name </th>
                                        <th>:</th>
                                        <td>{{$attestor['name']}}</td>
                                    </tr>
                                    
                                    <tr>        
                                            <th>Father Name </th>
                                            <th>:</th>
                                            <td>{{$attestor['father_name']}}</td>
                                    </tr>  

                                     <tr>        
                                            <th>Mobile </th>
                                            <th>:</th>
                                            <td>{{$attestor['mobile']}}</td>
                                    </tr>        

                                      <tr>        
                                            <th>Address </th>
                                            <th>:</th>
                                            <td>{{$attestor['address']}}</td>
                                    </tr>
                                              
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
@endsection