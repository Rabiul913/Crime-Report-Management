@extends('layouts.app')
@section('title')
Police Staions
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
                                        <th>Name</th>
                                        <th>District</th>
                                        <th>Address</th>
                                        <th>Mobile</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($police_stations as $police_station )
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $police_station->station_name }}</td>
                                        <td>{{ $police_station->mobile }}</td>
                                        <td>{{ $police_station->address }}</td>
                                        <td>{{ $police_station->email }}</td>
                                      
                                
                                        <td>
                                            <form class="my-2" action="{{ route('police_stations.destroy',$police_station->id) }}" method="POST">
                                            
                                                  <a class="btn btn-success" href="{{ route('police_stations.show',$police_station->id) }}"><i class="bi bi-display"></i></a>
                                            
                                              
                                                  <a class="btn btn-primary" href="{{route('police_stations.edit',$police_station->id)}}"><i class="bi bi-pen"></i></a>
                                            
                                                  @csrf
                                                  @method('DELETE')
                                            
                                                  <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                           
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