
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
                <div class="row mb-4">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 layout-top-spacing">

                        <div class="user-profile layout-spacing">
                            <div class="widget-content widget-content-area">
                                <div class="d-flex justify-content-between">
                                    <h4 class="" style="margin:5px;border-bottom: 2px solid #057485; ">Profile info</h4>
                                    <a href="{{Url('admin/edit_profile')}}" class="mt-2 mr-2 edit-profile"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a>
                                </div>
                                <div class="text-center user-info">
                                    
                                    <img src="{{asset('public/assets/img/sample.png')}}" style="width:150px;height:150px" alt="avatar">
                                   
                                </div>
                                <div class="user-info-list">
                                    <div class="">
                                        <ul class="contacts-block list-unstyled">
                                            <li class="contacts-block__item">
                                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>{{$admin->name}}
                                            </li>
                                            <li class="contacts-block__item">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>{{$admin->street.", ".$admin->city.", ".$admin->state.", ".$admin->zip.", ".$admin->country}}
                                            </li>
                                            <li class="contacts-block__item">
                                                <a href="mailto:example@mail.com"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>{{$admin->email}}</a>
                                            </li>
                                            <li class="contacts-block__item">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg> {{$admin->phone}}
                                            </li>
                                            
                                        </ul>
                                    </div>                                    
                                </div>
                            </div>
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
   </body>
</html>