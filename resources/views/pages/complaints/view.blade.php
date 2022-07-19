@extends('layouts.app')
@section('title')
Compaints Details
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
                                        <td>{{$Complaint['user_id']}}</td>
                                    </tr>
                                    
                                    <tr>        
                                            <th>user ID </th>
                                            <th>:</th>
                                            <td>{{$Complaint['co_title']}}</td>
                                    </tr>  

                                     <tr>        
                                            <th>Detail </th>
                                            <th>:</th>
                                            <td>{{$Complaint['co_against_name']}}</td>
                                    </tr>        

                                      <tr>        
                                            <th>Date </th>
                                            <th>:</th>
                                            <td>{{$Complaint['district_id']}}</td>
                                    </tr>
                                    <tr>        
                                            <th>Police Station </th>
                                            <th>:</th>
                                            <td>{{$Complaint['police_station_id']}}</td>
                                    </tr>  

                                     <tr>        
                                            <th>Address </th>
                                            <th>:</th>
                                            <td>{{$Complaint['co_against_address']}}</td>
                                    </tr>      

                                    <tr>        
                                            <th>Type </th>
                                            <th>:</th>
                                            <td>{{$Complaint['co_type_id']}}</td>
                                    </tr> 

                                    <tr>        
                                            <th>Details </th>
                                            <th>:</th>
                                            <td>{{$Complaint['detail']}}</td>
                                    </tr>     
                                    
                                    <tr>        
                                            <th>Date </th>
                                            <th>:</th>
                                            <td>{{$Complaint['co_date']}}</td>
                                    </tr>                
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
@endsection