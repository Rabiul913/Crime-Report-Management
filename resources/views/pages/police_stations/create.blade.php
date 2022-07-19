@extends('layouts.app')
@section('title')
Create Police Station
@endsection
@section('content')

<section id="basic-vertical-layouts">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"><a href="{{ route('police_stations.index') }}" class="btn btn-primary">Back</a></h4>
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
                                        <form class="form form-vertical" action="{{ route('police_stations.store') }}" method="post">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row ps-3">
                                                <div class="col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label>District</label>
                                                        <div class="position-relative">
                                                            <select class="form-control" name="district_id" id="">
                                                                <option value="">Choose your district...</option>
                                                                <option value="1">Dhaka</option>
                                                                <option value="2">Chittagong</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="station_name">Station Name</label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control" placeholder="Station ame" value="{{ old('station_name') }}" name="station_name" id="station_name">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-bell"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="station_name">Address</label>
                                                            <div class="position-relative">
                                                                <textarea name="address" id="" class="form-control" rows="3"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="station_name">Contact no.</label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control" placeholder="Mobile" value="{{ old('mobile') }}" name="mobile" id="mobile">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-phone"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="station_name">Email</label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control" placeholder="Email" value="{{ old('email') }}" name="email" id="email">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-envelope"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <!-- <label for="status">Status</label> -->
                                                            <div class="position-relative">
                                                                <input type="hidden" class="form-control" placeholder="status" value="1" name="status" id="status">
                                            
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