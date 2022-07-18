
@extends('layouts.app')
@section('title')
Roles Details
@endsection
@section('content')

<section class="section">
     <div class="card">
      <div class="card-header">
        <h3 class="mt-0 header-title"><a href="{{route('roles.index')}}" class="btn btn-primary">Back</a></h3>
        </div>
       <div class="card-body">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Name:</strong>
                  {{ $role->name }}
              </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Permissions:</strong>
                  @if(!empty($rolePermissions))
                      @foreach($rolePermissions as $v)

                      <span class="badge bg-success">{{ $v->name }}</span>
                      
                      @endforeach
                  @endif
              </div>
          </div>
      </div>
       </div>
       </div>              
</section>
@endsection



