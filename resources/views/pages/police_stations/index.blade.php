@extends('layouts.app')
@section('title')
Police Stations
@endsection
@section('content')

<section class="section">
                    <div class="card">
                        <div class="card-header">
                        <h3 class="mt-0 header-title"><a href="{{route('police_stations.create')}}" class="btn btn-primary">Create New</a></h3>
                        </div>

                        @if ($message = Session::get('success'))
                        <br>
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <div class="card-body">
                        
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>District Name</th>
                                        <th>Station Name</th>
                                        <th>Address</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($police_stations as $police_station)
                                    <tr>
                                        <td>{{ ++$i }}</td>

                                        @foreach($police_station->District as $district)
                                                      @if($district->id == $police_station->district_id)
                                                          @php 
                                                              $dist=$district->name; 
                                                          @endphp
                                                      @endif
                                        @endforeach


                                        <td>{{ $dist }}</td>
                                        <td>{{ $police_station->station_name }}</td>
                                        <td>{{ $police_station->address }}</td>
                                        <td>{{ $police_station->mobile }}</td>
                                        <td>{{ $police_station->email }}</td>
                                      
                                        <td>
                                            @if ($police_station->status == 1)
                                            <span class="badge bg-success">Enable</span>
                                            @elseif($police_station->status == 0)
                                            <span class="badge bg-danger">Disable</span>
                                            @endif
                                           
                                        </td>
                                        <td>
                                            <form class="my-2" action="{{ route('police_stations.destroy',$police_station->id) }}" method="POST">
                                            
                                                  <a class="btn btn-success" href="{{ route('police_stations.show',$police_station->id) }}">Show</a>
                                            
                                              
                                                  <a class="btn btn-primary" href="{{route('police_stations.edit',$police_station->id)}}">Edit</a>
                                            
                                                  @csrf
                                                  @method('DELETE')
                                            
                                                  <button type="submit" class="btn btn-danger">Delete</button>
                                           
                                              </form>

                                            
                                        </td>
                                    </tr>
                                    @endforeach
                                                                      
                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>
@endsection