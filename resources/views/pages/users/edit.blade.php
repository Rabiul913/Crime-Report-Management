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
                                        <form class="form form-vertical" action="{{ route('users.update',$user->id) }}" method="post">
                                            @method('put')
                                            @csrf
                                            <div class="form-body">
                                                <div class="row ps-3">
                                                <h5>Personal Information</h5>
                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="name">Full Name</label>
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control" placeholder="Full Name" value="{{ $user->name }}" name="name" id="name">
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
                                                                <input type="text" class="form-control" placeholder="Email" value={{ $user->email }} name="email" id="email">
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
                                                                <input type="text" class="form-control" placeholder="Mobile" value="{{ $user->mobile }}" name="mobile" id="mobile-id-icon">
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
                                                                <input type="text" class="form-control" name="nationality" value="{{ $user->nationality }}" placeholder="Nationality">
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
                                                                                        <select class="form-control" name="pre_district" id="">
                                                                                            <option value="">Choose your district...</option>
                                                                                            
                                                                                        @if(count($present_address)>1) 
                                                                                            
                                                                                            @foreach ($districts as $district)
                                                                                            <option @if($present_address[3]== $district->name) selected="true" @endif  value="{{ $district->name }}" >{{ $district->name }}</option>
                                                                                            @endforeach
                                                                                        @else
                                                                                            @foreach ($districts as $district)
                                                                                            <option value="{{ $district->name }}" >{{ $district->name }}</option>
                                                                                            @endforeach
                                                                                        @endif
                                                                                                                                                                                                                                                                                                          
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <div class="form-group has-icon-left">
                                                                                    <label>Police Station</label>
                                                                                    <div class="position-relative">
                                                                                        <select class="form-control" name="ps_name" id="">
                                                                                            <option value="">Choose police station...</option>
                                                                                        @if(count($present_address)>1) 
                                                                                            @foreach($policestations as $station)
                                                                                            <option @if($present_address[2]== $station->station_name) selected="true" @endif  value="{{$station->station_name}}">{{$station->station_name}}</option>
                                                                                            @endforeach
                                                                                        @else
                                                                                            @foreach($policestations as $station)
                                                                                            <option value="{{$station->station_name}}">{{$station->station_name}}</option>
                                                                                            @endforeach
                                                                                        @endif
                                                                                            <!-- <option @if(strpos($user->present_address, "Tajgaon") !== false) selected="true" @endif value="Tajgaon">Tajgaon</option>
                                                                                            <option @if(strpos($user->present_address, "Banani") !== false) selected="true" @endif value="Banani">Banani</option> -->
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        
                                                                            <div class="col-12">
                                                                                <div class="form-group has-icon-left">
                                                                                    <label>Postal Code</label>
                                                                                    <div class="position-relative">
                                                                                    @if(count($present_address)>1)
                                                                                        <input type="number" class="form-control" value="{{ $present_address[1] }}" name='pre_postal_code'>
                                                                                    @else
                                                                                        <input type="number" class="form-control" name='pre_postal_code'>
                                                                                    @endif
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
                                                                                    @if(count($present_address)>1)
                                                                                                                                       
                                                                                        <input type="text" class="form-control" name="pre_address" value="{{ $present_address[0] }}" placeholder="Present Address">
                                                                                    @else
                                                                                        <input type="text" class="form-control" name="pre_address" placeholder="Present Address">
                                                                                    @endif
                                                                                       
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
                                                                                        <select class="form-control" name="per_district" id="">
                                                                                            <option value="">Choose your district...</option>

                                                                                        @if(count($permanent_address)>1)
                                                                                            @foreach ($districts as $district)
                                                                                            <option @if($permanent_address[3]== $district->name) selected="true" @endif  value="{{ $district->name }}" >{{ $district->name }}</option>
                                                                                            @endforeach 
                                                                                        @else
                                                                                            @foreach ($districts as $district)
                                                                                            <option  value="{{ $district->name }}" >{{ $district->name }}</option>
                                                                                            @endforeach 
                                                                                        @endif
                                                                                        </select>
                                                                            
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <div class="form-group has-icon-left">
                                                                                    <label>Police Station</label>

                                                                                    <div class="position-relative">
                                                                                    <select class="form-control" name="per_ps_name" id="">
                                                                                        <option value="">Choose police station...</option>
                                                                                        @if(count($permanent_address)>1)
                                                                                            @foreach($policestations as $station)
                                                                                            <option @if($permanent_address[2]== $station->station_name) selected="true" @endif  value="{{$station->station_name}}">{{$station->station_name}}</option>
                                                                                            @endforeach
                                                                                        @else
                                                                                            @foreach($policestations as $station)
                                                                                            <option value="{{$station->station_name}}">{{$station->station_name}}</option>
                                                                                            @endforeach
                                                                                        @endif
                                                                                    </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        
                                                                            <div class="col-12">
                                                                                <div class="form-group has-icon-left">
                                                                                    <label for="mobile-id-icon">Postal Code</label>

                                                                                    <div class="position-relative">
                                                                                    @if(count($permanent_address)>1)
                                                                                    <input type="number" class="form-control" value="{{ $permanent_address[1] }}" name='per_postal_code'>                                                                                      
                                                                                   
                                                                                    @else
                                                                                    <input type="number" class="form-control" name='per_postal_code'>
                                                                                    @endif
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
                                                                                        <input type="text" class="form-control" value="{{ $permanent_address[0] }}" name="per_address" placeholder="Permanent Address" name="address">
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
                                                                    <option value="">Choose Role...</option>
                                                                        @foreach ($roles as $key => $role)
                                                                            <option @if($role_name == "$role") selected="true" @endif value="{{ $key }}"> {{ $role }}</option>
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