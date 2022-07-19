<section class="section">

    @extends('layouts.app')
    @section('title')
    Police Station Details
    @endsection
    @section('content')
    
    <section class="section">
    
    <div class="card">
                            <div class="card-body">  
                                <table class="table table-striped">  
                                    <tbody>
                                     
                                    
                                        <tr>         
                                               <th>District Name </th>
                                                <th>:</th>
                                                <td>{{$police_station['district_id']}}</td>
                                        </tr>     
                                  
                                        <tr>        
                                                <th>Station Name </th>
                                                <th>:</th>
                                                <td>{{$police_station['station_name']}}</td>
                                        </tr>
                                        <tr>        
                                                <th>Address</th>
                                                <th>:</th>
                                                <td>{{$police_station['address']}}</td>
                                        </tr>  
                                        <tr>        
                                                <th>Moile</th>
                                                <th>:</th>
                                                <td>{{$police_station['mobile']}}</td>
                                        </tr>  
                                        <tr>        
                                                <th>Email</th>
                                                <th>:</th>
                                                <td>{{$police_station['email']}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>            
    @endsection