<!DOCTYPE html>
<html lang="en">
@include('includes.head')

    <link rel="stylesheet" type="text/css" href="{{asset('public/plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/plugins/table/datatable/custom_dt_html5.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/plugins/table/datatable/dt-global_style.css')}}">
    <link rel="stylesheet" href="{{asset('public/plugins/font-icons/fontawesome/css/regular.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('public/plugins/font-icons/fontawesome/css/fontawesome.css')}}">
    <link href="{{asset('public/assets/css/components/cards/card.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/plugins/editors/quill/quill.snow.css')}}">
<body>
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div>
</div></div>
    <!--  END LOADER -->

    @include('includes.topbar')

    

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

      
    @include('includes.navbar')
        
        
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
                        <div class="col-lg-12 col-12 layout-spacing">
                            
                            <div class=" widget-content widget-content-area br-6">
                                <div class="widget-header ml-4 mt-2">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h2>Due Fee Record</h2>
                                        </div>                                                                        
                                    </div>
                                </div>
                                <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Student Name</th>
                                        <th>Father Name</th>
                                        <th>Email</th>
                                        <th class="dt-no-sorting">Fee Amount</th>
                                        <th class="dt-no-sorting">Fee Month</th>
                                        <th class="dt-no-sorting">Status</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $count=1;
                                    @endphp
                                    @foreach($invoices as $invoice)
                                    <tr>
                                        <td>{{$count}}</td>
                                        <td>{{$invoice->student_detail->name}}</td>
                                        <td>{{$invoice->student_detail->father_name}}</td>
                                        <td>{{$invoice->student_detail->email}}</td>
                                        <td>{{$invoice->total_fee}}</td>
                                        <td> 
                                            @php
                                                $d=$invoice->due_date;
                                                $date= date("d M Y",strtotime($d));
                                            @endphp
                                            {{$date}}
                                        </td>
                                        <td><span class="shadow-none badge badge-warning ">due</td>
                                        
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
            @include('includes.footer')

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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script >
       
        $(document).ready(function() {
            $('.select2').select2();
        });
        
        setTimeout(()=> {
            $('#alert').hide('slow')
        }, 5000)
       
    </script>
    <script src="{{asset('public/plugins/highlight/highlight.pack.js')}}"></script>
    <script src="{{asset('public/assets/js/custom.js')}}"></script>
    <script src="{{asset('public/assets/js/scrollspyNav.js')}}"></script>

    <script src="{{asset('public/plugins/table/datatable/datatables.js')}}"></script>
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="{{asset('public/plugins/table/datatable/button-ext/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('public/plugins/table/datatable/button-ext/jszip.min.js')}}"></script>    
    <script src="{{asset('public/plugins/table/datatable/button-ext/buttons.html5.min.js')}}"></script>
    <script src="{{asset('public/plugins/table/datatable/button-ext/buttons.print.min.js')}}"></script>

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
    <script src="{{asset('public/plugins/editors/quill/quill.js')}}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
        
    <script>
        ClassicEditor.create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
    </script>
    <script >
     
       
       setTimeout(()=> {
           $('#alert').hide('slow')
       }, 5000)
      
   </script>
</body>
</html>