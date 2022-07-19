@extends('layouts.app')
@section('title')
Complaint Types Details
@endsection
@section('content')

<section class="section">
                    <div class="card">
                        <div class="card-body">  
                            <table class="table table-striped">  
                                <tbody>
                                    <tr>
                                        <th>Name </th>
                                        <th>:</th>
                                        <td>{{$complaint_type['name']}}</td>
                                    </tr>
                                    
                                    <tr>        
                                            <th>Status </th>
                                            <th>:</th>
                                            <td>{{$complaint_type['status']}}</td>
                                    </tr>                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
@endsection