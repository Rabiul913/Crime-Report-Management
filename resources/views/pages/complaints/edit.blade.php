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
                                        <form class="form form-vertical" action="{{ route('complaints.update',$complaint->id) }}" method="post">
                                            @method('put')
                                            @csrf
                                            <div class="form-body">
                                                <div class="row ps-3">
                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label>Investigate Officer Name: <span style="color:red;">*</span></label>
                                                            <div class="position-relative">
                                                            <select class="form-control" name="police_name" id="police_name">
                                                                <option value="0">----Select One----</option>
                                                                @foreach($investigator as $inves)
                                                                <option value="{{ $inves->name }}" >{{ $inves->name }}</option>
                                                                @endforeach

                                                            </select>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-person"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label>Complainer Name:</label>
                                                            <div class="position-relative">
                                                            <select class="form-control" name="user_id" id="user_id" readonly="readonly">
                                                                <option value="{{ $user->id }}" @if($user->id == $complaint->user_id) selected='true' @endif>{{ $user->name }}</option>
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
                                                            <select class="form-control"  name="co_type_id" id="co_type_id" required readonly="readonly">
                                                                <option value="">Choose type...</option>
                                                                @foreach ($types as $type)
                                                                <option value="{{ $type->id }}" @if($type->id == $complaint->co_type_id) selected='true' @endif>{{ $type->name }}</option>
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
                                                                <input type="text" class="form-control" placeholder="title" value="{{ $complaint->co_title }}" name="co_title" id="co_title" required readonly="readonly">
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
                                                                <input type="text" class="form-control" placeholder="co aginst name" value="{{ $complaint->co_against_name }}" name="co_against_name" id="co_title" readonly="readonly" required>
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
                                                                <textarea class="form-control" name="detail" readonly="readonly">{{ $complaint->detail }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                            

                                                        <div class="col-12">
                                                            <div class="form-group has-icon-left">
                                                                <label>District:</label>
                                                                <div class="position-relative">
                                                                <select class="form-control" name="district_id" id="per_district_id" required readonly="readonly">
                                                                    <option value="">Choose district...</option>
                                                                    @foreach ($districts as $district)
                                                                    <option value="{{ $district->id }}" @if($district->id == $complaint->district_id) selected='true' @endif>{{ $district->name }}</option>
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
                                                            <select class="form-control" name="police_station_id" id="police_station_id" readonly="readonly">
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
                                                                <input type="text" class="form-control" placeholder="Against address" value="{{ $complaint->co_against_address }}" name="co_against_address" id="co_against_address" required readonly="readonly">
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
                                                                <input type="datetime-local" class="form-control" value="{{ $complaint->co_date > 0 ? date("Y-m-d\TH:i", strtotime($complaint->co_date)) : '' }}" name="co_date" id="co_date" required readonly="readonly">
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
                                                           <label for="status">Status</label>
                                                            <div class="position-relative">
                                                   
                                                                <input type="radio"  @if($district->status == 1) checked='true' @endif value="1" name="status"> Enable
                                                                <input type="radio"  @if($district->status == 0) checked='true' @endif value="0" name="status"> Disable
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