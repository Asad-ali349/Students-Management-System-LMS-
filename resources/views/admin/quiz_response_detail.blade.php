
<!DOCTYPE html>
<html lang="en">
@include('admin.includes.head')
<link href="{{asset('public/assets/css/users/user-profile.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('public/assets/css/components/cards/card.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/assetsss/plugins/dropzone/dist/dropzone.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('public/plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/plugins/table/datatable/custom_dt_html5.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/plugins/table/datatable/dt-global_style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('public/plugins/font-icons/fontawesome/css/regular.css')}}">
   <link rel="stylesheet" href="{{asset('public/plugins/font-icons/fontawesome/css/fontawesome.css')}}">
    <body>   
      <!-- BEGIN LOADER -->
      <div id="load_screen">
         <div class="loader">
            <div class="loader-content">
               <div class="spinner-grow align-self-center"></div>
            </div>
         </div>
      </div>
      <!--  END LOADER -->
      @include('admin.includes.topbar')
      <!--  BEGIN MAIN CONTAINER  -->
      <div class="main-container" id="container">
      @include('admin.includes.navbar')
         <!--  BEGIN CONTENT PART content -->
         <div id="content" class="main-content">
            <div class="layout-px-spacing">
            @if(session('success_msg'))
                    <div class="alert alert-success mt-2 " role="alert" id="alert">           
                        <strong>Success! </strong>{{session('success_msg')}}
                    </div> 
                @endif
                @if(session('error_msg'))
                    <div class="alert alert-danger mt-2 " role="alert" id="alert">           
                        <strong>Error! </strong>{{session('error_msg')}}
                    </div> 
                @endif
                <div class="row mb-4">
                
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 layout-top-spacing">

                        <div class="user-profile layout-spacing">
                            <div class="widget-content widget-content-area">
                                <div class="d-flex justify-content-between">
                                    <h4 class="" style="margin:5px;border-bottom: 2px solid #057485; ">Response info</h4>
                                    <div style="padding:1%">
											@if($quiz_response->status=='0')
												<span class="shadow-none badge badge-primary ">Assigned                 
                                            @elseif($quiz_response->status=='1')
												<span class="shadow-none badge badge-success ">Submitted
                                            @elseif($quiz_response->status=='2')
												<span class="shadow-none badge badge-warning ">Marked
                                            @else
                                            {{'Missed'}}
                                            @endif
											
										</div>
                                </div>
                                
                                <div class="user-info-list">
                                    <div class="">
                                        <ul class="list-unstyled" style="padding:5%">
                                            
                                            <li class="mt-2">
                                                <strong style="color:black">Student name:</strong> {{$quiz_response->student_detail->name}}
                                            </li>
                                            <li class="mt-2">
                                                <strong style="color:black">Student Email:</strong> {{$quiz_response->student_detail->email}}</a>
                                            </li>
                                            <li class="mt-2">
                                                <strong style="color:black">Student Contact:</strong> {{$quiz_response->student_detail->phone}}
                                            </li>
                                            <li class="mt-2">
                                                <strong style="color:black">Total Marks:</strong> {{$quiz_response->total_marks}}
                                            </li>
                                            <form action="{{url('admin/update_marks')}}" method="post">
                                                @csrf
                                            <li class="mt-2">
                                                <input type="text" value="{{$quiz_response->id}}" name="response_id" style="display:none">
                                                <strong style="color:black">Obtain Marks:</strong><input type="text" class="form-control" style="width:60%" placeholder="Enter Obtain Marks" name="obt_marks" value="{{$quiz_response->obtain_marks}}">
                                            </li>
                                            <center><button type="submit" class="btn btn-success mt-3">Assign Marks</button></center>
                                            </form>
                                        </ul>
                                    </div>                                    
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-12 col-12 mb-4 mt-2" >
                        <div class="widget-content widget-content-area br-6 ">
                            <div class="widget-header ml-4 mt-2">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h2>Quiz Response Docs</h2>
                                    </div>
                                </div>
                            </div>
                            <table id="html7-extension" class="table table-hover non-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>File Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $count=1;
                                    @endphp
                                    @foreach($quiz_response->response_docs as $response_docs)
                                    <tr>
                                        <td>{{$count}}</td>
                                        <td><a target="blank" href="{{asset('storage/app/'.$response_docs->document)}}" download="{{$quiz_response->student_detail->name}}">{{$response_docs->document}}</a></td>
                                        
                                    </tr>
                                    @php
                                        $count++;
                                    @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
               
            </div>
            @include('admin.includes.footer')
         </div>
         <!--  END CONTENT PART  -->
      </div>
      <!-- END MAIN CONTAINER -->
      <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
      <script src="{{asset('public/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
      <script src="{{asset('public/bootstrap/js/popper.min.js')}}"></script>
      <script src="{{asset('public/bootstrap/js/bootstrap.min.js')}}"></script>
      <script src="{{asset('public/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
      <script src="{{asset('public/assets/js/app.js')}}"></script>
      <script>
         $(document).ready(function() {
             App.init();
         });
      </script>
      <script src="{{asset('public/assets/js/custom.js')}}"></script>
      <!-- END GLOBAL MANDATORY SCRIPTS -->
      <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
      <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
      <script src="{{asset('public/plugins/font-icons/feather/feather.min.js')}}"></script>
      <script >
         feather.replace();
         
         
      </script>
      <script src="{{asset('public/plugins/highlight/highlight.pack.js')}}"></script>
      <script src="{{asset('public/assets/js/custom.js')}}"></script>
      <script src="{{asset('public/assets/js/scrollspyNav.js')}}"></script>

      <script src="{{asset('public/assetsss/plugins/dropzone/dist/dropzone.js')}}"></script>

      <script src="{{asset('public/plugins/table/datatable/datatables.js')}}"></script>
      <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
      <script src="{{asset('public/plugins/table/datatable/button-ext/dataTables.buttons.min.js')}}"></script>
      <script src="{{asset('public/plugins/table/datatable/button-ext/jszip.min.js')}}"></script>    
      <script src="{{asset('public/plugins/table/datatable/button-ext/buttons.html5.min.js')}}"></script>
      <script src="{{asset('public/plugins/table/datatable/button-ext/buttons.print.min.js')}}"></script>
      <script>
         $('#html7-extension').DataTable( {
             "dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
         "<'table-responsive'tr>" +
         "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
             buttons: {
                 buttons: [
                     { extend: 'copy', className: 'btn btn-sm' },
                     { extend: 'csv', className: 'btn btn-sm' },
                     { extend: 'excel', className: 'btn btn-sm' },
                     { extend: 'print', className: 'btn btn-sm' }
                 ]
             },
             "oLanguage": {
                 "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                 "sInfo": "Showing page _PAGE_ of _PAGES_",
                 "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                 "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
             },
             "stripeClasses": [],
             "lengthMenu": [7, 10, 20, 50],
             "pageLength": 20
         } );
      </script>
    
        <script>
         $('#html5-extension').DataTable( {
             "dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
         "<'table-responsive'tr>" +
         "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
             buttons: {
                 buttons: [
                     { extend: 'copy', className: 'btn btn-sm' },
                     { extend: 'csv', className: 'btn btn-sm' },
                     { extend: 'excel', className: 'btn btn-sm' },
                     { extend: 'print', className: 'btn btn-sm' }
                 ]
             },
             "oLanguage": {
                 "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                 "sInfo": "Showing page _PAGE_ of _PAGES_",
                 "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                 "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
             },
             "stripeClasses": [],
             "lengthMenu": [7, 10, 20, 50],
             "pageLength": 20
         } );
      </script>
      <script >
       
       $(document).ready(function() {
           $('.select2').select2();
       });
       
       setTimeout(()=> {
           $('#alert').hide('slow')
       }, 5000)
      
   </script>
   </body>
</html>