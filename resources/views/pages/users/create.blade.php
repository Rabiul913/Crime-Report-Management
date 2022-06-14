@extends('layouts.app')
@section('title')
Create Users
@endsection
@section('content')

<section id="basic-vertical-layouts">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"><a href="{{ route('users.index') }}" class="btn btn-primary">Back</a></h4>
                                </div>

                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                        <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-vertical" action="{{ route('users.store') }}" method="post">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row ps-3">
                                                <h5>Personal Information</h5>
                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="name">Full Name</label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control" placeholder="Full Name"  name="name" id="name">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-person"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">

                                                        <div class="form-group has-icon-left">
                                                            <label for="email">Email</label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control" placeholder="Email" name="email" id="email">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-envelope"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="mobile-id-icon">Mobile</label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control" placeholder="Mobile" name="mobile" id="mobile-id-icon">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-phone"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label>Nationality</label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control" name="nationality" placeholder="Nationality">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-flag"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                     <div class="row border-top border-bottom py-3">
                                                         <!-- starting present address -->
                                                        <div class="col-lg-6 col-md-12">
                                                            <h6>Present Address</h6>
                                                                            <div class="col-12">
                                                                                <div class="form-group has-icon-left">
                                                                                    <label>District</label>
                                                                                    <div class="position-relative">
                                                                                        <select class="form-control" name="pre_district" id="pre_district">
                                                                                            <option value="">Choose your district...</option>
                                                                                            @foreach($districts as $district)
                                                                                            <option value="{{$district->id}}">{{$district->name}}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-12">
                                                                                <div class="form-group has-icon-left" id="section_ps">
                                                                                    <label>Police Station</label>
                                                                                    <div class="position-relative">
                                                                                        <select class="form-control" name="ps_name" id="ps_name">
                                                                                            <option value="">Choose police station...</option>
                                                                                            
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        
                                                                            <div class="col-12">
                                                                                <div class="form-group has-icon-left">
                                                                                    <label>Postal Code</label>
                                                                                    <div class="position-relative">

                                                                                        <input type="number" class="form-control" name='pre_postal_code'>
                                                                                        <div class="form-control-icon">
                                                                                            <i class="bi bi-code"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <div class="form-group has-icon-left">
                                                                                    <label>Address:</label>
                                                                                    <div class="position-relative">
                                                                                        <input type="text" class="form-control" name="pre_address" placeholder="Care of">
                                                                                        <div class="form-control-icon">
                                                                                            <i class="bi bi-map"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                        </div>
                                                       <!-- closing present address -->

                                                         <!-- starting permanent address -->
                                                         <div class="col-lg-6 col-md-12">
                                                            <h6>Permannent Address</h6>
                                                                            <div class="col-12">
                                                                                <div class="form-group has-icon-left">
                                                                                    <label>District</label>
                                                                                   
                                                                                    <div class="position-relative">
                                                                                        <select class="form-control" name="per_district" id="per_district">
                                                                                            <option value="">Choose your district...</option>
                                                                                            @foreach($districts as $district)
                                                                                            <option value="{{$district->id}}">{{$district->name}}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                        <!-- <input type="text" class="form-control" placeholder="District" name="district">
                                                                                        <div class="form-control-icon">
                                                                                            <i class="bi bi-info-circle"></i>
                                                                                        </div> -->
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <div class="form-group has-icon-left" id="section_per_ps">
                                                                                    <label>Police Station</label>
                                                                                    <div class="position-relative">
                                                                                    <select class="form-control" name="per_ps_name" id="per_ps_name">
                                                                                        <option value="">Choose police station...</option>
                                                                                       
                                                                                    </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        
                                                                            <div class="col-12">
                                                                                <div class="form-group has-icon-left">
                                                                                    <label for="mobile-id-icon">Postal Code</label>
                                                                                    <div class="position-relative">
                                                                                        <input type="number" class="form-control" name='per_postal_code'>
                                                                                        <div class="form-control-icon">
                                                                                            <i class="bi bi-code"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <div class="form-group has-icon-left">
                                                                                    <label >Address:</label>
                                                                                    <div class="position-relative">
                                                                                        <input type="text" class="form-control" name="per_address" placeholder="Care of" name="address">
                                                                                        <div class="form-control-icon">
                                                                                            <i class="bi bi-map"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                        </div>
                                                       <!-- closing permanent address -->
                                                     </div>

                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <!-- <label for="status">Status</label> -->
                                                            <div class="position-relative">
                                                                <input type="hidden" class="form-control" placeholder="status" value="1" name="status" id="status">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-card"></i> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                                                                            </div>
                                                        @if ($role_name!="User")
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="status">Roles</label> 
                                                                <div class="position-relative">
                                                                    <select name="roles[]" id="roles[]" class="form-control" multiple="multiple">
                                                                        @foreach ($roles as $key => $role)
                                                                            <option value="{{ $key }}"> {{ $role }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @if ($errors->has('roles')) <p class="help-block">{{ $errors->first('roles') }}</p> @endif

                                                                </div>
                                                            </div>
                                                        </div>
                                                        @else
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="status">Roles</label> 
                                                                <div class="position-relative">
                                                                    <select name="roles[]" id="roles[]" class="form-control" multiple="multiple">
                                                                        @foreach ($roles as $key => $role)
                                                                            <option @if($role == "User") selected="true" @endif value="{{ $key }}"> {{ $role }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @if ($errors->has('roles')) <p class="help-block">{{ $errors->first('roles') }}</p> @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endif
                                        

                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="password-id-icon">Password</label>
                                                            <div class="position-relative">
                                                                <input class="form-control"  id="password" type="password" value="" name="password">
                                                                {{-- <input type="password" class="form-control" placeholder="Password" name="password"> --}}
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-lock"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label>Retype Password</label>
                                                            <div class="position-relative">
                                                                <input class="form-control"  type="password" value="" name="confirm-password">
                                                                {{-- <input type="password" class="form-control" placeholder="Retype Password" name="confirm-password"> --}}
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-lock"></i>
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