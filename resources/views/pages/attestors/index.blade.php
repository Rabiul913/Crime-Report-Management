@extends('layouts.app')
@section('title')
Attestors
@endsection
@section('content')

<section class="section">
                    <div class="card">
                        <div class="card-header">
                        <h3 class="mt-0 header-title"><a href="{{route('attestors.create')}}" class="btn btn-primary">Create New</a></h3>
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
                                        <th>Complaint Title</th>
                                        <th>Name</th>
                                        <th>Father Name</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($attestors as $attestor )
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        @foreach($attestor->Complaint as $complaint)
                                        @if($complaint->id == $attestor->complaint_id)
                                            @php 
                                                $title=$complaint->co_title; 
                                            @endphp
                                        @endif
                                        @endforeach
                                        <td>{{ $title }}</td>
                                        <td>{{ $attestor->name }}</td>
                                        <td>{{ $attestor->father_name }}</td>
                                        <td>{{ $attestor->address }}</td>
                                        <td>{{ $attestor->mobile }}</td>
                                        <td>
                                            @if ($attestor->status == 1)
                                            <span class="badge bg-success">Enable</span>
                                            @elseif($attestor->status == 0)
                                            <span class="badge bg-danger">Disable</span>
                                            @endif
                                           
                                        </td>
                                        <td>
                                            <form class="my-2" action="{{ route('attestors.destroy',$attestor->id) }}" method="POST">
                                            
                                                  <a class="btn btn-success" href="{{ route('attestors.show',$attestor->id) }}"><i class="bi bi-display"></i></a>                                              
                                                  <a class="btn btn-primary" href="{{route('attestors.edit',$attestor->id)}}"><i class="bi bi-pen"></i></a>
                                            
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