@extends('layouts.app')
@section('title')
Edit Users
@endsection
@section('content')

<section id="basic-vertical-layouts">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"><a href="" class="btn btn-primary">Back</a></h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-vertical" action="{{ route('users.store') }}" method="post">
                                            @method('put')
                                            @csrf
                                            <div class="form-body">
                                                <div class="row ps-3">
                                                <h5>Personal Information</h5>
                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="name">Name</label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control" placeholder="Full Name" value=""  name="name" id="name">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-person"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                           
                                                
                                        

                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="status">Status</label>
                                                            <div class="position-relative">
                                                            <select class="form-control" name="status" id="">
                                                                                        <option value="">Choose police station...</option>
                                                                                        <option value=0>Enable</option>
                                                                                        <option value=1>Disable</option>
                                                            </select>
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