
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
   <style>
       #licenselink {
            display: inline-block;
            width: 220px;
            white-space: nowrap;
            overflow: hidden !important;
            text-overflow: ellipsis;
        }
   </style>
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
                <div class="row ">
                    <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">

                        <div class="user-profile layout-spacing">
                            <div class="widget-content widget-content-area">
                                <div class="d-flex justify-content-between">
                                <h4 class="" style="margin:5px;border-bottom: 2px solid #057485; ">Personal info</h4>
                                    <a href="{{Url('admin/edit_student/'.$student->id)}}" class="mt-2 mr-2 edit-profile"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a>
                                </div>
                                <div class="text-center user-info">
                                  
                                    <img src="{{asset('public/assets/img/sample.png')}}" style="width:100px;height:120px" alt="avatar">
                                    
                                </div>
                                <div class="user-info-list">

                                    <div class="">
                                        <ul class="contacts-block list-unstyled">
                                            <li class="contacts-block__item">
                                                <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                                    <path fill="currentColor" d="M12 3C14.21 3 16 4.79 16 7S14.21 11 12 11 8 9.21 8 7 9.79 3 12 3M16 13.54C16 14.6 15.72 17.07 13.81 19.83L13 15L13.94 13.12C13.32 13.05 12.67 13 12 13S10.68 13.05 10.06 13.12L11 15L10.19 19.83C8.28 17.07 8 14.6 8 13.54C5.61 14.24 4 15.5 4 17V21H20V17C20 15.5 18.4 14.24 16 13.54Z" />
                                                </svg>{{$student->name}}
                                            </li>
                                            <li class="contacts-block__item">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>{{$student->address}}
                                            </li>
                                            <li class="contacts-block__item">
                                                <a href="mailto:example@mail.com"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>{{$student->email}}</a>
                                            </li>
                                            <li class="contacts-block__item">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg> {{$student->phone}}
                                            </li>
                                        </ul>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">

                        <div class="row">
                            <div class="col-lg-12 col-12 layout-spacing">       
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h3>General Info</h3>
                                            </div>                                                                        
                                        </div>
                                    </div>
                                    <div class="ml-2 row">

                                        <div class="col-md-6">
                                            <span><strong style="color:black">Father Name</strong>: {{$student->father_name}} </span>
                                        </div>
                                        <div class="col-md-6">
                                            <span><strong style="color:black">Student Total Fee</strong>: {{$student->total_fee}}</span>
                                        </div>
                                        <div class="col-md-6">
                                            <span><strong style="color:black">Father Contact No</strong>: {{$student->father_phone}}</span>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <span><strong style="color:black">Student Class No</strong> : {{$student->class_no}}</span>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-12 layout-spacing">       
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h3>Course Info</h3>
                                            </div>                                                                        
                                        </div>
                                    </div>
                                    <div class="ml-2 row">
                                        <ul>
                                            @foreach($student->enrolled_courses as $course)
                                            <li>{{$course->course->name}}</li>
                                            @endforeach
                                           
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-5">
                    
                <div class="col-lg-12 col-12 mb-4" >
                        <div class="widget-content widget-content-area br-6 ">
                            <div class="widget-header ml-4 mt-2">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h2>Quiz Record</h2>
                                    </div>                                                                        
                                </div>
                            </div>
                            <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Quiz Name</th>
                                        <th class="dt-no-sorting">Course Name</th>
                                        <th class="dt-no-sorting">Total marks</th>
                                        <th class="dt-no-sorting">Obtain marks</th>
                                        <th class="dt-no-sorting">Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $count=1;
                                    @endphp
                                    @foreach($student->quiz_responses as $quiz)
                                    @if($quiz->status=='2')
                                    <tr>
                                        <td>{{$count}}</td>
                                        <td>{{$quiz->quiz_detail->name}}</td>
                                        <td>{{$quiz->quiz_detail->course_detail->name}}</td>
                                        <td>{{$quiz->total_marks}}</td>
                                        <td>{{$quiz->obtain_marks}}</td>            
                                        <td>
                                            <a href="{{Url('admin/quiz_response_detail/'.$quiz->id)}}"><i class="far fa-list-alt" style="color: green; font-size: 18px;margin-right: 10px" aria-hidden="true"></i></a>
                                        </td>
                                        
                                    </tr>
                                    @endif
                                    @php
                                        $count++;
                                    @endphp
                                    @endforeach
                                </tbody>
                            </table>
                            
                        </div>
                    </div> 
                    
                    <div class="col-lg-12 col-12 mb-3" >
                        <div class="widget-content widget-content-area br-6 ">
                            <div class="widget-header ml-4 mt-2">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h2>Fee Record</h2>
                                    </div>                                                                        
                                </div>
                            </div>
                            <table id="html6-extension" class="table table-hover non-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Month detail</th>
                                        <th class="dt-no-sorting">Total Ammount</th>
                                        <th class="dt-no-sorting">Paid Date</th>
                                        <th class="dt-no-sorting">Status</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $count2=1;
                                    @endphp
                                    @foreach($student->invoices as $invoice)
                                        @if($invoice->status=='1')
                                        <tr>
                                            <td>{{$count2}}</td>
                                            <td>
                                                @php
                                                    $d=$invoice->due_date;
                                                    $date= date("M Y",strtotime($d));
                                                @endphp
                                                {{$date}}
                                            </td>
                                            <td>{{$invoice->total_fee}}</td>
                                            <td>
                                                @php
                                                    $d=$invoice->paid_date;
                                                    $date= date("d M Y",strtotime($d));
                                                @endphp
                                            {{$date}}
                                            </td>
                                            <td>
                                                <span class="shadow-none badge badge-success ">paid   
                                            </td> 
                                            
                                        </tr>
                                        @endif
                                    @php
                                        $count2++;
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
         $('#html6-extension').DataTable( {
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
         Dropzone.autoDiscover = false;
   
         $(function() {
             var myDropzone = new Dropzone(".dropzone", {
                 url: "upload.php?id=1&is_company=0",
                 paramName: "file",
                 maxFilesize: 5,
                 maxFiles: 20,
             });
         });

         
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
   </body>
</html>