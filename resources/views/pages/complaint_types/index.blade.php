@extends('layouts.app')
@section('title')
Complaint Types
@endsection
@section('content')

<section class="section">
                    <div class="card">
                        <div class="card-header">
                        <h3 class="mt-0 header-title"><a href="{{route('complaint_types.create')}}" class="btn btn-primary">Create New</a></h3>
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
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($complaint_types as $complaint_type )
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $complaint_type->name }}</td>
                                      
                                        <td>
                                            @if ($complaint_type->status == 1)
                                            <span class="badge bg-success">Enable</span>
                                            @elseif($complaint_type->status == 0)
                                            <span class="badge bg-danger">Disable</span>
                                            @endif
                                           
                                        </td>
                                        <td>
                                            <form class="my-2" action="{{ route('complaint_types.destroy',$complaint_type->id) }}" method="POST">
                                            
                                                  <a class="btn btn-success" href="{{ route('complaint_types.show',$complaint_type->id) }}"><i class="bi bi-display"></i></a>                                              
                                                  <a class="btn btn-primary" href="{{route('complaint_types.edit',$complaint_type->id)}}"><i class="bi bi-pen"></i></a>
                                            
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