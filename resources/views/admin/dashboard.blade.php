<!DOCTYPE html>
<html lang="en">
@include('admin.includes.head')
<link href="{{asset('public/assets/css/components/cards/card.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('public/plugins/apex/apexcharts.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('public/assets/css/dashboard/dash_2.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('public/plugins/fullcalendar/fullcalendar.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('public/plugins/fullcalendar/custom-fullcalendar.advance.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('public/plugins/flatpickr/flatpickr.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('public/plugins/flatpickr/custom-flatpickr.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('public/assets/css/forms/theme-checkbox-radio.css')}}" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL STYLE -->
<style>
    .widget { margin-bottom: 10px; }
    .widget-content-area { border-radius: 6px; }
    .daterangepicker.dropdown-menu {
        z-index: 1059;
    }
</style>
<body >
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div>
</div></div>
    <!--  END LOADER -->

    @include('admin.includes.topbar')

    

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container" style="background-color:#f1f2f3">

      
    @include('admin.includes.navbar')
        
        
        <!--  BEGIN CONTENT PART content -->
        <div id="content" class="main-content" >
            <div class="layout-px-spacing">

                <div class="row layout-top-spacing mb-4">
                
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 layout-spacing">
                        <a href="{{Url('employee/admin/non_approved_contract')}}"><div class="widget widget-one_hybrid widget-followers">
                            <div class="widget-heading">
                                <div class="w-title">
                                    <div class="w-icon">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                    </div>
                                    <div class="">
                                        <p class="w-value">{{$student_count}}</p>
                                        <h5 class="">Students</h5>
                                    </div>
                                </div>
                            </div>
                            
                        </div></a>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 layout-spacing">
                        <a href="{{Url('employee/admin/approved_contract')}}"><div class="widget widget-one_hybrid widget-followers">
                            <div class="widget-heading">
                                <div class="w-title">
                                    <div class="w-icon">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="green" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                                    </div>
                                    <div class="">
                                        <p class="w-value">{{$courses_count}}</p>
                                        <h5 class="">Courses</h5>
                                    </div>
                                </div>
                            </div>
                            
                        </div></a>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 layout-spacing">
                        <a href="{{Url('employee/admin/rejected_contract')}}"><div class="widget widget-one_hybrid widget-followers">
                            <div class="widget-heading">
                                <div class="w-title">
                                    <div class="w-icon">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="red" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                    </div>
                                    <div class="">
                                        <p class="w-value">{{$helping_material_count}}</p>
                                        <h5 class="">Helping material</h5>
                                    </div>
                                </div>
                            </div>
                            
                        </div></a>
                    </div>
                   
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-chart-one" style="padding:17px">
                            <div class="widget-heading">
                                <h5 class="">Monthly Revenue</h5>
                              
                            </div>

                            <div class="widget-content">
                                <div id="revenueMonthly"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-chart-one" style="padding:17px">
                            <div class="widget-heading">
                                <h5 class="">Yearly Revenue</h5>
                              
                            </div>

                            <div class="widget-content">
                                <div id="revenueyearly"></div>
                            </div>
                        </div>
                    </div>

                    
                    <!-- <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 layout-spacing">
                        <a href="{{Url('employee/admin/non_approved_ticket')}}"><div class="widget widget-one_hybrid widget-followers">
                            <div class="widget-heading">
                                <div class="w-title">
                                    <div class="w-icon">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="red" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                    </div>
                                    <div class="">
                                        <p class="w-value">52</p>
                                        <h5 class="">Assigned Q</h5>
                                    </div>
                                </div>
                            </div></a>
                            
                        </div>
                    
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 layout-spacing">
                        <a href="{{Url('employee/admin/non_approved_ticket')}}"><div class="widget widget-one_hybrid widget-followers">
                            <div class="widget-heading">
                                <div class="w-title">
                                    <div class="w-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="48px" height="48px"><path fill="#43a047" d="M14.043,24.129l2.828-2.828l7.797,7.797l-2.832,2.828L14.043,24.129z"/><path fill="#43a047" d="M18.934,29.012l12.039-12.039l2.984,2.984L21.918,32L18.934,29.012z"/><path fill="#8bc34a" d="M22.119,39.88l-0.47,3.984C22.418,43.955,23.207,44,23.997,44v-4C23.361,40,22.736,39.952,22.119,39.88z"/><path fill="#dcedc8" d="M18.627,8.944L17.282,5.16c-1.402,0.493-2.747,1.155-4.013,1.957l2.164,3.386C16.429,9.869,17.499,9.347,18.627,8.944z"/><path fill="#c5e1a5" d="M12.645,12.732L9.799,9.917c-1.044,1.053-1.982,2.229-2.771,3.495l3.41,2.129C11.072,14.525,11.805,13.578,12.645,12.732z"/><path fill="#aed581" d="M8.9,18.749l-3.797-1.315c-0.485,1.398-0.822,2.862-0.979,4.346l3.981,0.439C8.238,21.015,8.514,19.857,8.9,18.749z"/><path fill="#9ccc65" d="M8.106,25.79l-3.982,0.451c0.156,1.476,0.493,2.94,0.987,4.35l3.793-1.328C8.517,28.154,8.24,26.995,8.106,25.79z"/><path fill="#8bc34a" d="M10.449 32.479l-3.41 2.129c.789 1.266 1.727 2.434 2.78 3.495l2.834-2.826C11.816 34.435 11.084 33.491 10.449 32.479zM15.44 37.502l-2.15 3.394c1.254.798 2.603 1.451 4.013 1.957l1.347-3.789C17.515 38.661 16.44 38.137 15.44 37.502zM23.997 8V4c-.781 0-1.571.045-2.348.136l.466 3.985C22.733 8.048 23.359 8 23.997 8zM23.997 4v4C23.998 8 23.999 8 24 8c8.837 0 16 7.163 16 16s-7.163 16-16 16c-.001 0-.002 0-.003 0v4c11.028 0 20-8.972 20-20S35.025 4 23.997 4z"/></svg>
                                    </div>
                                    <div class="">
                                        <p class="w-value">12</p>
                                        <h5 class="">In Progress Tickets</h5>
                                    </div>
                                </div>
                            </div>
                            
                        </div></a>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 layout-spacing">
                        <a href="{{Url('employee/admin/non_approved_ticket')}}"><div class="widget widget-one_hybrid widget-followers">
                            <div class="widget-heading">
                                <div class="w-title">
                                    <div class="w-icon">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="#f6c324" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                                    </div>
                                    <div class="">
                                        <p class="w-value">85</p>
                                        <h5 class="">Completed Tickets</h5>
                                    </div>
                                </div>
                            </div></a>
                            
                        </div>
                    </div> -->
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
    <script src="{{asset('public/plugins/apex/apexcharts.min.js')}}"></script>
    <!-- <script src="{{asset('public/assets/js/dashboard/dash_1.js')}}"></script>
    <script src="{{asset('public/assets/js/dashboard/dash_2.js')}}"></script> -->
    

    <script src="{{asset('public/plugins/fullcalendar/moment.min.js')}}"></script>
    <script src="{{asset('public/plugins/flatpickr/flatpickr.js')}}"></script>
    <script src="{{asset('public/plugins/fullcalendar/fullcalendar.min.js')}}"></script>
    <script src="{{asset('public/plugins/fullcalendar/custom-fullcalendar.advance.js')}}"></script>
    <script>
        $( document ).ready(function() {
            $.get('cal_revenue').then((result)=> {
                var month_name=result.month_name;
                var month_sum=result.month_sum;
                console.log(month_sum)
                var year_name=result.year_name;
                var year_sum=result.year_sum;
                try{
                    var options1 = {
                        chart: {
                        fontFamily: 'Nunito, sans-serif',
                        height: 365,
                        type: 'area',
                        zoom: {
                            enabled: false
                        },
                        dropShadow: {
                            enabled: true,
                            opacity: 0.2,
                            blur: 10,
                            left: -7,
                            top: 22
                        },
                        toolbar: {
                            show: false
                        },
                        events: {
                            mounted: function(ctx, config) {
                            const highest1 = ctx.getHighestValueInSeries(0);
                            const highest2 = ctx.getHighestValueInSeries(1);
                    
                            ctx.addPointAnnotation({
                                x: new Date(ctx.w.globals.seriesX[0][ctx.w.globals.series[0].indexOf(highest1)]).getTime(),
                                y: highest1,
                                label: {
                                style: {
                                    cssClass: 'd-none'
                                }
                                },
                                customSVG: {
                                    SVG: '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="#2196f3" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg>',
                                    cssClass: undefined,
                                    offsetX: -8,
                                    offsetY: 5
                                }
                            })
                    
                            ctx.addPointAnnotation({
                                x: new Date(ctx.w.globals.seriesX[1][ctx.w.globals.series[1].indexOf(highest2)]).getTime(),
                                y: highest2,
                                label: {
                                style: {
                                    cssClass: 'd-none'
                                }
                                },
                                customSVG: {
                                    SVG: '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="#6d17cb" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg>',
                                    cssClass: undefined,
                                    offsetX: -8,
                                    offsetY: 5
                                }
                            })
                            },
                        }
                        },
                        colors: ['#2196f3', '#6d17cb'],
                        dataLabels: {
                            enabled: false
                        },
                        markers: {
                        discrete: [{
                        seriesIndex: 0,
                        dataPointIndex: 7,
                        fillColor: '#000',
                        strokeColor: '#000',
                        size: 5
                        }, {
                        seriesIndex: 2,
                        dataPointIndex: 11,
                        fillColor: '#000',
                        strokeColor: '#000',
                        size: 4
                        }]
                        },
                        subtitle: {
                        // text: '$10,840',
                        align: 'left',
                        margin: 0,
                        offsetX: 95,
                        offsetY: 0,
                        floating: false,
                        style: {
                            fontSize: '18px',
                            color:  '#4361ee'
                        }
                        },
                        title: {
                        // text: 'Total Profit',
                        align: 'left',
                        margin: 0,
                        offsetX: -10,
                        offsetY: 0,
                        floating: false,
                        style: {
                            fontSize: '18px',
                            color:  '#0e1726'
                        },
                        },
                        stroke: {
                            show: true,
                            curve: 'smooth',
                            width: 2,
                            lineCap: 'square'
                        },
                        series: [{
                            name: 'Income',
                            data: month_sum
                        }, 
                        
                        ],
                        labels: month_name,
                        xaxis: {
                        axisBorder: {
                            show: false
                        },
                        axisTicks: {
                            show: false
                        },
                        crosshairs: {
                            show: true
                        },
                        labels: {
                            offsetX: 0,
                            offsetY: 5,
                            style: {
                                fontSize: '12px',
                                fontFamily: 'Nunito, sans-serif',
                                cssClass: 'apexcharts-xaxis-title',
                            },
                        }
                        },
                        yaxis: {
                        labels: {
                            formatter: function(value, index) {
                            return (value / 1000) + 'K'
                            },
                            offsetX: -22,
                            offsetY: 0,
                            style: {
                                fontSize: '12px',
                                fontFamily: 'Nunito, sans-serif',
                                cssClass: 'apexcharts-yaxis-title',
                            },
                        }
                        },
                        grid: {
                        borderColor: '#e0e6ed',
                        strokeDashArray: 5,
                        xaxis: {
                            lines: {
                                show: true
                            }
                        },   
                        yaxis: {
                            lines: {
                                show: false,
                            }
                        },
                        padding: {
                            top: 0,
                            right: 0,
                            bottom: 0,
                            left: -10
                        }, 
                        }, 
                        legend: {
                        position: 'top',
                        horizontalAlign: 'right',
                        offsetY: -50,
                        fontSize: '16px',
                        fontFamily: 'Nunito, sans-serif',
                        markers: {
                            width: 10,
                            height: 10,
                            strokeWidth: 0,
                            strokeColor: '#fff',
                            fillColors: undefined,
                            radius: 12,
                            onClick: undefined,
                            offsetX: 0,
                            offsetY: 0
                        },    
                        itemMargin: {
                            horizontal: 0,
                            vertical: 20
                        }
                        },
                        tooltip: {
                        theme: 'dark',
                        marker: {
                            show: true,
                        },
                        x: {
                            show: false,
                        }
                        },
                        fill: {
                            type:"gradient",
                            gradient: {
                                type: "vertical",
                                shadeIntensity: 1,
                                inverseColors: !1,
                                opacityFrom: .28,
                                opacityTo: .05,
                                stops: [45, 100]
                            }
                        },
                        responsive: [{
                        breakpoint: 575,
                        options: {
                            legend: {
                                offsetY: -30,
                            },
                        },
                        }]
                    }




                    var options2 = {
                        chart: {
                        fontFamily: 'Nunito, sans-serif',
                        height: 365,
                        type: 'area',
                        zoom: {
                            enabled: false
                        },
                        dropShadow: {
                            enabled: true,
                            opacity: 0.2,
                            blur: 10,
                            left: -7,
                            top: 22
                        },
                        toolbar: {
                            show: false
                        },
                        events: {
                            mounted: function(ctx, config) {
                            const highest1 = ctx.getHighestValueInSeries(0);
                            const highest2 = ctx.getHighestValueInSeries(1);
                    
                            ctx.addPointAnnotation({
                                x: new Date(ctx.w.globals.seriesX[0][ctx.w.globals.series[0].indexOf(highest1)]).getTime(),
                                y: highest1,
                                label: {
                                style: {
                                    cssClass: 'd-none'
                                }
                                },
                                customSVG: {
                                    SVG: '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="#2196f3" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg>',
                                    cssClass: undefined,
                                    offsetX: -8,
                                    offsetY: 5
                                }
                            })
                    
                            ctx.addPointAnnotation({
                                x: new Date(ctx.w.globals.seriesX[1][ctx.w.globals.series[1].indexOf(highest2)]).getTime(),
                                y: highest2,
                                label: {
                                style: {
                                    cssClass: 'd-none'
                                }
                                },
                                customSVG: {
                                    SVG: '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="#6d17cb" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg>',
                                    cssClass: undefined,
                                    offsetX: -8,
                                    offsetY: 5
                                }
                            })
                            },
                        }
                        },
                        colors: ['#2196f3', '#6d17cb'],
                        dataLabels: {
                            enabled: false
                        },
                        markers: {
                        discrete: [{
                        seriesIndex: 0,
                        dataPointIndex: 7,
                        fillColor: '#000',
                        strokeColor: '#000',
                        size: 5
                        }, {
                        seriesIndex: 2,
                        dataPointIndex: 11,
                        fillColor: '#000',
                        strokeColor: '#000',
                        size: 4
                        }]
                        },
                        subtitle: {
                        // text: '$10,840',
                        align: 'left',
                        margin: 0,
                        offsetX: 95,
                        offsetY: 0,
                        floating: false,
                        style: {
                            fontSize: '18px',
                            color:  '#4361ee'
                        }
                        },
                        title: {
                        // text: 'Total Profit',
                        align: 'left',
                        margin: 0,
                        offsetX: -10,
                        offsetY: 0,
                        floating: false,
                        style: {
                            fontSize: '18px',
                            color:  '#0e1726'
                        },
                        },
                        stroke: {
                            show: true,
                            curve: 'smooth',
                            width: 2,
                            lineCap: 'square'
                        },
                        series: [{
                            name: 'Income',
                            data: year_sum
                        }, 
                        
                        ],
                        labels: year_name,
                        xaxis: {
                        axisBorder: {
                            show: false
                        },
                        axisTicks: {
                            show: false
                        },
                        crosshairs: {
                            show: true
                        },
                        labels: {
                            offsetX: 0,
                            offsetY: 5,
                            style: {
                                fontSize: '12px',
                                fontFamily: 'Nunito, sans-serif',
                                cssClass: 'apexcharts-xaxis-title',
                            },
                        }
                        },
                        yaxis: {
                        labels: {
                            formatter: function(value, index) {
                            return (value / 1000) + 'K'
                            },
                            offsetX: -22,
                            offsetY: 0,
                            style: {
                                fontSize: '12px',
                                fontFamily: 'Nunito, sans-serif',
                                cssClass: 'apexcharts-yaxis-title',
                            },
                        }
                        },
                        grid: {
                        borderColor: '#e0e6ed',
                        strokeDashArray: 5,
                        xaxis: {
                            lines: {
                                show: true
                            }
                        },   
                        yaxis: {
                            lines: {
                                show: false,
                            }
                        },
                        padding: {
                            top: 0,
                            right: 0,
                            bottom: 0,
                            left: -10
                        }, 
                        }, 
                        legend: {
                        position: 'top',
                        horizontalAlign: 'right',
                        offsetY: -50,
                        fontSize: '16px',
                        fontFamily: 'Nunito, sans-serif',
                        markers: {
                            width: 10,
                            height: 10,
                            strokeWidth: 0,
                            strokeColor: '#fff',
                            fillColors: undefined,
                            radius: 12,
                            onClick: undefined,
                            offsetX: 0,
                            offsetY: 0
                        },    
                        itemMargin: {
                            horizontal: 0,
                            vertical: 20
                        }
                        },
                        tooltip: {
                        theme: 'dark',
                        marker: {
                            show: true,
                        },
                        x: {
                            show: false,
                        }
                        },
                        fill: {
                            type:"gradient",
                            gradient: {
                                type: "vertical",
                                shadeIntensity: 1,
                                inverseColors: !1,
                                opacityFrom: .28,
                                opacityTo: .05,
                                stops: [45, 100]
                            }
                        },
                        responsive: [{
                        breakpoint: 575,
                        options: {
                            legend: {
                                offsetY: -30,
                            },
                        },
                        }]
                    }
                    
                
                    var chart1 = new ApexCharts(
                        document.querySelector("#revenueMonthly"),
                        options1
                    );
                    var chart2 = new ApexCharts(
                        document.querySelector("#revenueyearly"),
                        options2
                    );
                    
                    chart1.render();
                    chart2.render();
                } catch(e) {
                    console.log(e);
                }
            })
        });  
    </script>
</body>
</html> 