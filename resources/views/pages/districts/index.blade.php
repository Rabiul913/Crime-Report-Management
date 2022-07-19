@extends('layouts.app')
@section('title')
Districts
@endsection
@section('content')

<section class="section">
                    <div class="card">
                        <div class="card-header">
                        <h3 class="mt-0 header-title"><a href="{{route('districts.create')}}" class="btn btn-primary">Create New</a></h3>
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
                                    @foreach ($districts as $district )
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $district->name }}</td>
                                      
                                        <td>
                                            @if ($district->status == 1)
                                            <span class="badge bg-success">Enable</span>
                                            @elseif($district->status == 0)
                                            <span class="badge bg-danger">Disable</span>
                                            @endif
                                           
                                        </td>
                                        <td>
                                            <form class="my-2" action="{{ route('districts.destroy',$district->id) }}" method="POST">
                                            
                                                  <a class="btn btn-success" href="{{ route('districts.show',$district->id) }}"><i class="bi bi-display"></i></a>

                                                  <a class="btn btn-primary" href="{{route('districts.edit',$district->id)}}"><i class="bi bi-pen"></i></a>
                                            
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