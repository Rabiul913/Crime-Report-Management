
@extends('layouts.app')
@section('title')
Permission Details
@endsection
@section('content')

<section class="section">
     <div class="card">
      <div class="card-header">
        <h3 class="mt-0 header-title"><a href="{{route('permissions.index')}}" class="btn btn-primary">Back</a></h3>
        </div>
       <div class="card-body">
        <div class="row">
          <div class="col-lg-6" style="left: 20%; padding:20px">
            <div class="content-form"  >
          <div class="row" >
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>Permission Name:</strong>
                      <span class="badge bg-primary">{{ $permission->name }}</span>
                    
                  </div>
              </div>
              
          </div>
        </div>
       </div>
       </div>              
</section>
@endsection




