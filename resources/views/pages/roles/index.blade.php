@extends('layouts.app')
@section('title')
Roles
@endsection
@section('content')

<section class="section">
                    <div class="card">
                        <div class="card-header">
                        <h3 class="mt-0 header-title"><a href="{{route('roles.create')}}" class="btn btn-primary">Create New</a></h3>
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
                                    @foreach ($roles as $role )
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $role->name }}</td>
                                      
                                
                                        <td>
                                            <form class="my-2" action="{{ route('roles.destroy',$role->id) }}" method="POST">
                                            
                                                  <a class="btn btn-success" href="{{ route('roles.show',$role->id) }}"><i class="bi bi-display"></i></a>
                                            
                                              
                                                  <a class="btn btn-primary" href="{{route('roles.edit',$role->id)}}"><i class="bi bi-pen"></i></a>
                                            
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


