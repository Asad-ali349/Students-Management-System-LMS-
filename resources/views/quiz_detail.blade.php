<!DOCTYPE html>
<html lang="en">
	@include('includes.head')
	<link href="{{asset('public/assets/css/users/user-profile.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('public/assets/css/components/cards/card.css')}}" rel="stylesheet" type="text/css" />
	<!-- <link href="{{asset('public/assetsss/plugins/dropzone/dist/dropzone.css')}}" rel="stylesheet" type="text/css"> -->
	<link rel="stylesheet" type="text/css" href="{{asset('public/plugins/table/datatable/datatables.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/plugins/table/datatable/custom_dt_html5.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/plugins/table/datatable/dt-global_style.css')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{asset('public/plugins/font-icons/fontawesome/css/regular.css')}}">
	<link rel="stylesheet" href="{{asset('public/plugins/font-icons/fontawesome/css/fontawesome.css')}}">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
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
		@include('includes.topbar')
		<!--  BEGIN MAIN CONTAINER  -->
		<div class="main-container" id="container">
			@include('includes.navbar')
			<!--  BEGIN CONTENT PART content -->
			<div id="content" class="main-content">
				<div class="layout-px-spacing">
					<div class="row ">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 layout-top-spacing">
							<div class="user-profile layout-spacing">
								<div class="widget-content widget-content-area">
									<div class="d-flex justify-content-between">
										<h4 class="" style="margin:5px;border-bottom: 2px solid #057485; ">Quiz Detail </h4>
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
                                    <div class="row p-3">
                                        <div class="col-md-12">
                                            <span><strong style="color:black">Quiz Name: </strong> {{$quiz->name}}</span>
                                        </div>
                                        <div class="col-md-12">
                                            <span><strong style="color:black">Course Name: </strong> {{$quiz->course_detail->name}}</span>
                                        </div>
                                        <div class="col-md-12">
                                            <span><strong style="color:black">Created At: </strong>
												@php
													$d=strtotime($quiz->created_at);
													$date= date("d M Y",$d)
												@endphp
												{{$date}}
											</span>
                                        </div>
										@if($quiz_response->obtain_marks!='' || $quiz_response->obtain_marks!=NULL)
										<div class="col-md-12">
                                            <span><strong style="color:black">Obtain Marks: </strong>
												{{$quiz_response->obtain_marks}}
											</span>
                                        </div>
										@endif
										<div class="col-md-12">
                                            <span><strong style="color:black">Total Marks: </strong>
												{{$quiz->total_marks}}
											</span>
                                        </div>  
										         
                                        <div class="col-md-12">
                                            <span><strong style="color:black">Description: </strong>{{$quiz->description}} </span>
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
											<h2>Quiz Docs</h2>
										</div>
									</div>
								</div>
								<table id="html5-extension" class="table table-hover non-hover" style="width:100%">
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
										@foreach($quiz->quiz_docs as $docs)
										<tr>
											<td>{{$count}}</td>
											<td><a target="blank" href="{{asset('storage/app/'.$docs->document)}}">{{$docs->document}}</a></td>
											
										</tr>
										@php
											$count++;
										@endphp
										@endforeach
									</tbody>
								</table>
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
								<table id="html6-extension" class="table table-hover non-hover" style="width:100%">
									<thead>
										<tr>
											<th>#</th>
											<th>File Name</th>
											<th class="dt-no-sorting">Action</th>
										</tr>
									</thead>
									<tbody>
										@php
											$count=1;
										@endphp
										@foreach($quiz_response->response_docs as $response_docs)
										<tr>
											<td>{{$count}}</td>
											<td><a target="blank" href="{{asset('storage/app/'.$response_docs->document)}}">{{$response_docs->document}}</a></td>
											<td>
												<a onclick="delete_doc({{$response_docs->id}})"><i class="far fa-times-circle" style="color: red; font-size: 18px;margin-right: 10px" aria-hidden="true"></i></a>
											</td>
										</tr>
										@php
											$count++;
										@endphp
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 layout-top-spacing mb-5">
						<div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h2>Add Quiz Response </h2>
                                        </div>                                                                        
                                    </div>
                                </div>
                                <!-- <div class="widget-content widget-content-area"> -->
                                    <form action="{{url('/quiz_response')}}" method="POST" >
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-12">
                                                <div class="dropzone mt-4" id="myDropzone" name="docs" ></div>
                                            </div>
                                        </div>
                                        <center><button type="submit" name="submit" id="submit-all" class="btn btn-success mt-3" >Submit Response</button></center>
                                    </form>
                                <!-- </div> -->
                            </div>   
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
		<script src="{{asset('public/plugins/font-icons/feather/feather.min.js')}}"></script>
		<script >
			feather.replace();
			
			
		</script>
		<script src="{{asset('public/plugins/highlight/highlight.pack.js')}}"></script>
		<script src="{{asset('public/assets/js/custom.js')}}"></script>
		<script src="{{asset('public/assets/js/scrollspyNav.js')}}"></script>
		<!-- <script src="{{asset('public/assetsss/plugins/dropzone/dist/dropzone.js')}}"></script> -->
		<script src="{{asset('public/plugins/table/datatable/datatables.js')}}"></script>
		<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
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
		
	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
		
			// 
        Dropzone.options.myDropzone= {
        url: "{{url('/quiz_response')}}",
        autoProcessQueue: false,
        uploadMultiple: true,
        parallelUploads: 50,
        maxFiles: 50,
        maxFilesize: 50,
        addRemoveLinks: true,
        success: function(file, response){
            Swal.fire({
            position: 'top-end',
            icon: response['type'],
            title: response['msg'],
            showConfirmButton: false,
            timer: 1500,
            width:420
            })

            setTimeout(()=> {
                location.reload();
            }, 1000)

        },
        init: function() {
            dzClosure = this; // Makes sure that 'this' is understood inside the functions below.

            // for Dropzone to process the queue (instead of default form behavior):
            document.getElementById("submit-all").addEventListener("click", function(e) {
                // Make sure that the form isn't actually being sent.
                e.preventDefault();
                e.stopPropagation();
                dzClosure.processQueue();
				
            });
			
            //send all the form data along with the files:
            this.on("sendingmultiple", function(data, xhr, formData) {

                formData.append("_token", "{{ csrf_token() }}");
                formData.append("quiz_id", '{{$quiz->id}}');
                formData.append("total_marks", '{{$quiz->total_marks}}');
                formData.append("end_time", '{{$quiz->total_time}}');
                formData.append("current_datetime", get_current_time());
            });
        }
    }


	function get_current_time(){
		var currentdate = new Date(); 
		var current_datetime = currentdate.getMonth()+1 + "/"
				+ (currentdate.getDate())  + "/" 
				+ currentdate.getFullYear() + " "  
				+ currentdate.getHours() + ":"  
				+ (currentdate.getMinutes()) + ":" 
				+ currentdate.getSeconds();
		console.log(current_datetime)
		return current_datetime;
	}
    </script> 
	<script>
		function delete_doc(id){
			
			
			
			// console.log(datetime)
			

			$.get('delete_response_doc/'+id).then((result)=>{
				Swal.fire({
					position: 'top-end',
					icon: result.type,
					title: result.msg,
					showConfirmButton: false,
					timer: 1500,
					width:420
				})
				setTimeout(()=> {
					location.reload();
				}, 1000)
			})
		}
	</script>
		
	</body>
</html>