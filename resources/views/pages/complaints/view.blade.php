@extends('layouts.app')
@section('title')
Complaints
@endsection
@section('content')

<section class="section">
                    <div class="card">
                        <div class="card-header">
                        <h3 class="mt-0 header-title"><a href="{{route('complaints.create')}}" class="btn btn-primary">Create New</a></h3>
                        </div>

                        @if ($message = Session::get('success'))
                        <br>
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <div class="card-body">
                                        <th>SL.</th>
                                        <th>Complainer Name</th>
                                        <th>Complaint Type</th>
                                        <th>Complaint Title</th>
                                        <th>Against Name</th>
                                        <th>District</th>
                                        <th>Address</th>   
                        </div>
                    </div>

                </section>
@endsection