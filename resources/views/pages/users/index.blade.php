@extends('layouts.app')
@section('title')
Users
@endsection
@section('content')

<section class="section">
                    <div class="card">
                        <div class="card-header">
                        <h3 class="mt-0 header-title"><a href="{{route('users.create')}}" class="btn btn-primary">Create New</a></h3>
                        </div>
                        <div class="card-body">
                        
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Roles</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if(!empty($user->getRoleNames()))
                                                    @foreach($user->getRoleNames() as $val)
                                                        <span class="badge bg-dark">{{ $val }}</span>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                <form class="my-2" action="{{ route('users.destroy',$user->id) }}" method="POST">
                                            
                                                    <a class="btn btn-success" href="{{ route('users.show',$user->id) }}">Show</a>
                                              
                                                
                                                    <a class="btn btn-primary" href="{{route('users.edit',$user->id)}}">Edit</a>
                                              
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