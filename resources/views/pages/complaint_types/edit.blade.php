@extends('layouts.app')
@section('title')
Edit Complaint Type
@endsection
@section('content')

<section id="basic-vertical-layouts">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"><a href="{{ route('complaint_types.index') }}" class="btn btn-primary">Back</a></h4>
                                </div>

                                @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <strong>Opps!</strong> Something went wrong, please check below errors.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif 

                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-vertical" action="{{ route('complaint_types.update',$complaint_type->id) }}" method="post">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row ps-3">
                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="name">Name</label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control" placeholder="Name" value="{{ $complaint_type->name }}" name="name" id="name">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-bookmarks-fill"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                           
                                                
                                        

                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <!-- <label for="status">Status</label> -->
                                                            <div class="position-relative">
                                                                <input type="radio"  @if($complaint_type->status == 1) checked='true' @endif value="1" name="status"> Enable
                                                                <input type="radio"  @if($complaint_type->status == 0) checked='true' @endif value="0" name="status"> Disable
                                                                <div class="form-control-icon">
                                                                    <!-- <i class="bi bi-card"></i> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
@endsection