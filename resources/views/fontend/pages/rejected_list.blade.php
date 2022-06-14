@extends('layouts.fontend.app')
@section('content')

<section style="min-height:500px">
    <div class="container">
        <div class="table-responsive" style="background-color: #ffffff;border-radius: 3px; margin: 2% 0 2% 0;">
            <h3 style="padding: 10px;"><strong>Complaint Rejected List</strong></h3>
            <table class="table table-dark table-hover" >
               <thead>
                <tr>                    
                    <th>Title</th>
                    <th>Victim Name</th>
                    <th>Address</th>
                    <!-- <th>Action</th> -->
                </tr>
               </thead>               
               <tbody>
                   <tr>
                       <td>Complaint for Land grabbing</td>
                       <td>Riyed Hossain</td>
                       <th>East shewrapara, mirpur, Dhaka-1512</th>
                       <!-- <th></th> -->
                   </tr>
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