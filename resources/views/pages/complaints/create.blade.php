@extends('layouts.app')
@section('title')
Create Complaint
@endsection
@section('content')

<section id="basic-vertical-layouts">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"><a href="{{ route('complaints.index') }}" class="btn btn-primary">Back</a></h4>
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
                                        <form class="form form-vertical" action="{{ route('complaints.store') }}" method="post">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row ps-3">
                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label>Complainer Name:</label>
                                                            <div class="position-relative">
                                                            <select class="form-control" name="user_id" id="user_id" readonly="readonly">
                                                                <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                                                            </select>
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-person"></i>
                                                            </div>
                                                         
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label>Complaint Type:</label>
                                                            <div class="position-relative">
                                                            <select class="form-control"  name="co_type_id" id="co_type_id" required>
                                                                <option value="">Choose type...</option>
                                                                @foreach ($types as $type)
                                                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-type"></i>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label>Complaint Title::</label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control" placeholder="title" value="{{ old('co_title') }}" name="co_title" id="co_title" required>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-card-heading"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                             
                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label>Against Name:</label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control" placeholder="co aginst name" value="{{ old('co_against_name') }}" name="co_against_name" id="co_title" required>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-card-heading"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label>Complaint Detail:</label>
                                                            <div class="position-relative">
                                                                <textarea class="form-control" name="detail">{{ old('detail') }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                            

                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label>District:</label>
                                                                <div class="position-relative">
                                                                <select class="form-control" name="district_id" id="per_district_id" required>
                                                                    <option value="">Choose district...</option>
                                                                    @foreach ($districts as $district)
                                                                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-signpost"></i>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left" id="section_ps">
                                                            <label>Police Station</label>
                                                            <div class="position-relative">
                                                            <select class="form-control" name="police_station_id" id="police_station_id">
                                                                <option value="">Choose police station...</option>
                                                                {{-- <option value="Tajgaon">Tajgaon</option>
                                                                <option value="Banani">Banani</option> --}}
                                                            </select>
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-house"></i>
                                                            </div>
                                                            
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="name">Against Address</label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control" placeholder="Against address" value="{{ old('co_against_address') }}" name="co_against_address" id="co_against_address" required>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-map"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="name">Date:</label>
                                                            <div class="position-relative">
                                                                <input type="datetime-local" class="form-control" value="{{ old('co_date') }}" name="co_date" id="co_date" required>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-calendar-date"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{-- <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="name">Email</label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control" placeholder="Email" value="{{ old('email') }}" name="email" id="email" required>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-envelope-fill"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                           
                                                
                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <!-- <label for="status">Status</label> -->
                                                            <div class="position-relative">
                                                                <input type="hidden" class="form-control" name="status" id="status" value=1>
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