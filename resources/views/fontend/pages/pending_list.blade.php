@extends('layouts.fontend.app')
@section('content')

<section style="min-height:500px">
    <div class="container">
        <div class="table-responsive" style="background-color: #ffffff;border-radius: 3px; margin: 2% 0 2% 0;">
            <h3 style="padding: 10px;"><strong>Complaint Pending List</strong></h3>

            @if ($message = Session::get('success'))
                        <br>
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
            @endif
            <table class="table table-dark table-hover" >
               <thead>
                <tr>                    
                    <th>Title</th>
                    <th>Victim Name</th>
                    <th>Address</th>
                    <th>Status</th>
                </tr>
               </thead>               
               <tbody>
                @foreach ($complaints as $complaint)
                   <tr>
                       <td>{{ $complaint->co_title }}</td>
                       <td>{{ $complaint->co_against_name }}</td>
                       <td>{{ $complaint->co_against_address }}</td>
                       <td>
                                            @if ($complaint->status == 1)
                                            <span class="badge bg-success">Running</span>
                                            @elseif($complaint->status == 0)
                                            <span class="badge bg-info">Pending</span>
                                            @else
                                            <span class="badge bg-danger">Rejected</span>
                                            @endif
                                           
                                        </td>
                   </tr>
                @endforeach
                <!-- @foreach ($complaints as $complaint)
                    <tr>
                        <td>{{ $complaint->co_title }}</td>
                        <td>{{ $complaint->co_against_name }}</td>
                        <td>{{ $complaint->co_against_address }}</td>
                        <td><a class="btn btn-primary" href="">View Detail</a></td>
                    </tr>
                @endforeach -->
               </tbody>
            </table>
        </div>
    </div>
</section>
@endsection