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
                                    <h4 class="card-title"><a href="" class="btn btn-primary">Back</a></h4>
                                </div>
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
                                                                <input type="text" class="form-control" placeholder="Mobile" id="mobile-id-icon">
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
                                                                                        <select class="form-control" name="pre_district" id="">
                                                                                            <option value="">Choose your district...</option>
                                                                                            <option value="">Dhaka</option>
                                                                                            <option value="">Chittagong</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <div class="form-group has-icon-left">
                                                                                    <label>Police Station</label>
                                                                                    <div class="position-relative">
                                                                                        <select class="form-control" name="ps_id" id="">
                                                                                            <option value="">Choose police station...</option>
                                                                                            <option value="">Tajgaon</option>
                                                                                            <option value="">Banani</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        
                                                                            <div class="col-12">
                                                                                <div class="form-group has-icon-left">
                                                                                    <label for="mobile-id-icon">Postal Code</label>
                                                                                    <div class="position-relative">
                                                                                        <input type="number" class="form-control" name='postal_code'>
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
                                                                                        <input type="text" class="form-control" placeholder="Present Address">
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
                                                                                            <option value="">Dhaka</option>
                                                                                            <option value="">Chittagong</option>
                                                                                        </select>
                                                                                        <!-- <input type="text" class="form-control" placeholder="District" name="district">
                                                                                        <div class="form-control-icon">
                                                                                            <i class="bi bi-info-circle"></i>
                                                                                        </div> -->
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <div class="form-group has-icon-left">
                                                                                    <label>Police Station</label>
                                                                                    <div class="position-relative">
                                                                                    <select class="form-control" name="per_police_station" id="">
                                                                                        <option value="">Choose police station...</option>
                                                                                        <option value="">Tajgaon</option>
                                                                                        <option value="">Banani</option>
                                                                                    </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        
                                                                            <div class="col-12">
                                                                                <div class="form-group has-icon-left">
                                                                                    <label for="mobile-id-icon">Postal Code</label>
                                                                                    <div class="position-relative">
                                                                                        <input type="number" class="form-control" name='postal_code'>
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
                                                                                        <input type="text" class="form-control" placeholder="Permanent Address" name="address">
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
                                                                <input type="hidden" class="form-control" placeholder="status" name="status" id="status">
                                                                <div class="form-control-icon">
                                                                    <!-- <i class="bi bi-card"></i> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group has-icon-left">
                                                            <label for="password-id-icon">Password</label>
                                                            <div class="position-relative">
                                                                <input type="password" class="form-control" placeholder="Password" name="password">
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
                                                                <input type="password" class="form-control" placeholder="Retype Password" name="retype-password">
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