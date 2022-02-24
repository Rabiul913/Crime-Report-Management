@extends('layouts.app')
@section('title')
Permissions
@endsection
@section('content')

<section class="section">
                    <div class="card">
                        <div class="card-header">
                        <h3 class="mt-0 header-title"><a href="{{route('permissions.create')}}" class="btn btn-primary">Create New</a></h3>
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
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permissions as $permission )
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $permission->name }}</td>
                                  
                                        <td>
                                            <form class="my-2" action="{{ route('permissions.destroy',$permission->id) }}" method="POST">
                                            
                                                  <a class="btn btn-success" href="{{ route('permissions.show',$permission->id) }}">Show</a>
                                            
                                              
                                                  <a class="btn btn-primary" href="{{route('permissions.edit',$permission->id)}}">Edit</a>
                                            
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