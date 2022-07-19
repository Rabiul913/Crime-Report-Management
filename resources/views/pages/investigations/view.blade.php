@extends('layouts.app')
@section('title')
Investigations Details
@endsection
@section('content')

<section class="section">
                    <div class="card">
                        <div class="card-body">  
                            <table class="table table-striped">  
                                <tbody>
                                    <tr>
                                        <th>Complaint ID </th>
                                        <th>:</th>
                                        <td>{{$investigation['complaint_id']}}</td>
                                    </tr>
                                    
                                    <tr>        
                                            <th>user ID </th>
                                            <th>:</th>
                                            <td>{{$investigation['user_id']}}</td>
                                    </tr>  

                                     <tr>        
                                            <th>Detail </th>
                                            <th>:</th>
                                            <td>{{$investigation['detail']}}</td>
                                    </tr>        

                                      <tr>        
                                            <th>Date </th>
                                            <th>:</th>
                                            <td>{{$investigation['date']}}</td>
                                    </tr>
                                    <tr>        
                                            <th>Step </th>
                                            <th>:</th>
                                            <td>{{$investigation['step']}}</td>
                                    </tr>  

                                     <tr>        
                                            <th>Status </th>
                                            <th>:</th>
                                            <td>{{$investigation['status']}}</td>
                                    </tr>                          
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
@endsection