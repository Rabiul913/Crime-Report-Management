@extends('layouts.app')
@section('title')
Incestigations
@endsection
@section('content')

<section class="section">
                    <div class="card">
                        <div class="card-header">
                        <h3 class="mt-0 header-title"><a href="{{route('investigations.create')}}" class="btn btn-primary">Create New</a></h3>
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
                                        <th>Investigation Officer Name</th>
                                        <th>Complaint ID</th>
                                        <th>Complaint Title</th>
                                        <th>Detail</th>
                                        <th>Date</th>
                                        <th>Step</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($investigations as $investigation )
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        @foreach($investigation->User as $user)
                                                      @if($user->id == $investigation->user_id)
                                                          @php 
                                                              $invest_name=$user->name; 
                                                          @endphp
                                                      @endif
                                        @endforeach
                                        <td>{{ $invest_name }}</td>                                        
                                        <td>{{ $investigation->complaint_id }}</td>
                                        @foreach($investigation->Complaint as $complaint)
                                                      @if($complaint->id == $investigation->complaint_id)
                                                          @php 
                                                              $co_name=$complaint->co_title; 
                                                          @endphp
                                                      @endif
                                        @endforeach
                                        <td>{{ $co_name }}</td>
                                       
                                        <td>{{ strip_tags($investigation->detail) }}</td>
                                        <td>{{ $investigation->date }}</td>
                                        <td>{{ $investigation->step }}</td>
                                        <td>                                           
                                            @if($investigation->status == 0)
                                            <span class="badge bg-danger">Disable</span>
                                            @elseif($investigation->status == 1)
                                            <span class="badge bg-success">Enable</span>
                                            @endif
                                        </td>
                                        <td>
                                            <form class="my-2" action="{{ route('investigations.destroy',$investigation->id) }}" method="POST">
                                            
                                                  <a class="btn btn-success" href="{{ route('investigations.show',$investigation->id) }}"><i class="bi bi-display"></i></a>
                                            
                                              
                                                  <a class="btn btn-primary" href="{{route('investigations.edit',$investigation->id)}}"><i class="bi bi-pen"></i></a>
                                            
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