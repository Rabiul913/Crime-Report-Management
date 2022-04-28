@extends('layouts.app')
@section('title')
Create Investigation
@endsection
@section('content')

<section id="basic-vertical-layouts">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"><a href="{{ route('investigations.index') }}" class="btn btn-primary">Back</a></h4>
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
                                        <form class="form form-vertical" action="{{ route('investigations.store') }}" method="post">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row ps-3">
                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label>Investigation Officer:</label>
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
                                                            <label>Complaint Title</label>
                                                            <div class="position-relative">
                                                            <select class="form-control"  name="complaint_id" id="complaint_id" required>
                                                                <option value="">Choose type...</option>
                                                                @foreach ($complaints as $complaint)
                                                                <option value="{{ $complaint->id }}">{{ $complaint->co_title }}</option>
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
                                                            <label>Investigation Detail:</label>
                                                            <div class="position-relative">
                                                                <textarea class="form-control" name="detail">{{ old('detail') }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                            




                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="name">Date:</label>
                                                            <div class="position-relative">
                                                                <input type="datetime-local" class="form-control" value="{{ old('date') }}" name="date" id="date" required>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-calendar-date"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="name">Step:</label>
                                                            <div class="position-relative">
                                                                <input type="radio" value="1" name="step"> After Complaint
                                                                <input type="radio" value="2" name="step"> Before FIR
                                                                <input type="radio" value="2" name="step"> Before Chargesheet
                                                                <div class="form-control-icon">
                                                                    {{-- <i class="bi bi-layers"></i> --}}
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
                                                    
                                                    <div class="col-12">
                                                        <div class="table-responsive">
                                                            <div class="table-wrapper">
                                                                <div class="table-title">
                                                                    <div class="row">
                                                                        <div class="col-sm-8"><h4>Attestors <b>Details</b></h4></div>
                                                                        <div class="col-sm-4">
                                                                            <button type="button" class="btn btn-info add-new" onclick="addAttestor();"><i class="fa fa-plus"></i> Add New</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <table class="table table-bordered">
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Name</th>
                                                                        <th>Father's Name</th>
                                                                        <th>Address</th>
                                                                        <th>Phone</th>
                                                                    </tr>
                                                                    <tbody id="tbody"></tbody>
                                                                </table>
                                                             
                                                                {{-- <button type="button" >Add Item</button> --}}
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