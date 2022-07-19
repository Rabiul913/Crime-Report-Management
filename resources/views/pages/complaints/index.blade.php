@extends('layouts.app')
@section('title')
Complaints
@endsection
@section('content')

<section class="section">
                    <div class="card">
                        <div class="card-header">
                        <h3 class="mt-0 header-title"><a href="{{route('complaints.create')}}" class="btn btn-primary">Create New</a></h3>
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
                                        <th>Complainer Name</th>
                                        <th>Complaint Type</th>
                                        <th>Complaint Title</th>
                                        <th>Against Name</th>
                                        <th>District</th>
                                        <th>Address</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($complaints as $complaint )
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        @foreach($complaint->User as $user)
                                                      @if($user->id == $complaint->user_id)
                                                          @php 
                                                              $com_name=$user->name; 
                                                          @endphp
                                                      @endif
                                        @endforeach
                                        <td>{{ $com_name }}</td>

                                        @foreach($complaint->Complaint_type as $co_type)
                                            @if($co_type->id == $complaint->co_type_id)
                                                @php 
                                                    $type=$co_type->name; 
                                                @endphp
                                            @endif
                                        @endforeach

                                        <td>{{ $type }}</td>
                                        <td>{{ $complaint->co_title }}</td>
                                        <td>{{ $complaint->co_against_name }}</td>
{{-- @dd($complaint->District); --}}
                                        @foreach($complaint->District as $district)
                                            @if($district->id == $complaint->district_id)
                                                @php 
                                                    $dis=$district->name; 
                                                @endphp
                                            @endif
                                        @endforeach
                                        <td>{{ $dis }}</td>
{{-- @dd($complaint->Police_station); --}}
                                        @foreach($complaint->Police_station as $ps)
                                            @if($ps->id == $complaint->police_station_id)
                                                @php 
                                                    $police=$ps->station_name; 
                                                @endphp
                                            @endif
                                        @endforeach

                                        <td>{{ $police .",". $complaint->co_against_address }}</td>

                                        <td>
                                        @if ($complaint->status == 1)
                                            <span class="badge bg-success">Running</span>
                                            @elseif($complaint->status == 0)
                                            <span class="badge bg-info">Pending</span>
                                            @else
                                            <span class="badge bg-danger">Rejected</span>
                                            @endif
                                           
                                        </td>
                                        <td>

                                            {{-- <form class="form form-vertical" action="{{ route('complaints.update',$complaint->id) }}" method="post">
                                                @method('put')
                                                @csrf
                                            <input type="hidden" value="1" name="status">
                                            <button type="submit" class="btn btn-danger">Accepted</button>
                                            </form> --}}

                                            <form class="my-2" action="{{ route('complaints.destroy',$complaint->id) }}" method="POST">
                                            
                                                  <a class="btn btn-success" href="{{ route('complaints.show',$complaint->id) }}"><i class="bi bi-display"></i></a>
                                            
                                              
                                                  <a class="btn btn-primary" href="{{route('complaints.edit',$complaint->id)}}"><i class="bi bi-pen"></i></a>
                                            
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