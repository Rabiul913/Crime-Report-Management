@extends('layouts.app')
@section('title')
Create Permissions
@endsection
@section('content')

<section id="basic-vertical-layouts">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"><a href="{{ route('permissions.index') }}" class="btn btn-primary">Back</a></h4>
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
                                        <form class="form form-vertical" action="{{ route('permissions.store') }}" method="post">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row ps-3">
                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="name">Permission Name</label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control" placeholder="Name" value="{{ old('name') }}" name="name" id="name">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-bell"></i>
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