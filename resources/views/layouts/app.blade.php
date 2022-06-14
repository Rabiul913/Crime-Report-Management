<link rel="stylesheet" href="{{asset('assets/css/feather.css')}}">
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Crime Report Management System</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/simple-datatables/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <script src="{{asset('assets/vendors/jquery/jquery.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- <script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>  -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.svg')}}" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
              @include("layouts.pages.sidebar_header")
              @include("layouts.pages.sidebar_menu")
              <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main" class='layout-navbar'>
        @include("layouts.pages.main_header")
        @include("layouts.pages.main_content")
        @include("layouts.pages.footer") 
        </div>
    </div>
    <script src="{{asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendors/simple-datatables/simple-datatables.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
   

    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
    <script>
        CKEDITOR.replace( 'detail' );
    </script>
    <script>
        $("body").ready(function(){
        setTimeout(function(){
        $("div.alert").remove();
        }, 5000 ); // 5 secs

    });
    </script>

<script type="text/javascript">
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

      $(document).ready(function ()
      {
         
            $("#pre_district").change(function() {
              var pre_district = $(this).val();
            //   console.log(pre_district);
              alert(pre_district);
                 if (pre_district) {
                    
                    $('#section_ps').show();
                    $('#section_ps').attr('required', '');
  
                          $.ajax({
                          
                             url:"/getpolicestations",
                             type:"GET",
                             data:{"pre_district":pre_district},
                             success:function(res){
                                console.log(res);
                                $('select[id="ps_name"]').empty();
                                $.each(res, function(key,value){
                                  
                                      $('select[name="ps_name"]').append('<option value="'+ key +'">'+ value +'</option>');
                                });
                             }
                          });
                       }
                    else {
                       $('#section_ps').hide();
                       $('#section_ps').removeAttr('required');
                    }
                    });
                    $("#pre_district").trigger("change");


                    $("#per_district").change(function() {
              var per_district = $(this).val();
            //   console.log(per_district);
            //   alert(per_district);
                 if (per_district) {
                    
                    $('#section_per_ps').show();
                    $('#section_per_ps').attr('required', '');
  
                          $.ajax({
                          
                             url:"/getpolicestations",
                             type:"GET",
                             data:{"per_district":per_district},
                             success:function(res){
                                        console.log(res);
                                $('select[id="per_ps_name"]').empty();
                                $.each(res, function(key,value){
                                   
                                      $('select[name="per_ps_name"]').append('<option value="'+ key +'">'+ value +'</option>');
                                });
                             }
                          });
                       }
                    else {
                       $('#section_per_ps').hide();
                       $('#section_per_ps').removeAttr('required');
                    }
                    });
                    $("#per_district").trigger("change");



                         //for complaints create

        $("#per_district_id").change(function() {
              var per_district_id = $(this).val();
            //    console.log(per_district_id);
            //   alert(per_district_id);
                 if (per_district_id) {
                    
                    $('#section_ps').show();
                    $('#section_ps').attr('required', '');
  
                          $.ajax({
                            
                             url:"/getcomplaintpolicestations",
                             type:"GET",
                             data:{"district_id":per_district_id},
                             success:function(res){
                                        console.log(res);
                                $('select[id="police_station_id"]').empty();
                                $.each(res, function(key,value){
                                      $('select[name="police_station_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                                });
                             }
                          });
                       }
                    else {
                       $('#section_ps').hide();
                       $('#section_ps').removeAttr('required');
                    }
             });
                    $("#per_district_id").trigger("change");
  
      });


      
  

      
    
  </script>
<script>
   var attestors = 0;
   function addAttestor() {
       attestors++;

       var html = "<tr>";
           html += "<td>" + attestors + "</td>";
           html += "<td><input type='text' name='name[]'></td>";
           html += "<td><input type='text' name='father_name[]'></td>";
           html += "<td><input type='text' name='address[]'></td>";
           html += "<td><input type='text' name='mobile[]'></td>";
           html += "<td><button type='button' onclick='deleteRow(this);' class='btn btn-danger'>Delete</button></td>"
       html += "</tr>";

       var row = document.getElementById("tbody").insertRow();
       row.innerHTML = html;
   }

function deleteRow(button) {
   button.parentElement.parentElement.remove();
   // first parentElement will be td and second will be tr.
}
</script>
</body>
</html>