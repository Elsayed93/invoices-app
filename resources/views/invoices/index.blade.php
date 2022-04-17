@extends('layouts.master')

@section('page-title', 'الفواتير')

@section('css')
    <!--  Owl-carousel css-->
    <link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />
    <!-- Maps css -->
    <link href="{{ URL::asset('assets/plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet">

    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection


@section('content')
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الفواتير</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">
                    / قائمة الفواتير
                </span>
            </div>
        </div>
    </div>

    @if (session()->has('success'))
        @include('partials._success')
    @elseif(session()->has('error'))
        @include('partials._failed')
    @endif

    @if ($errors->any())
        @include('partials._errors')
    @endif


    <!-- row opened -->
    <div class="row row-sm">

        <!--div-->
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">الفواتير</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <a class="btn ripple btn-primary" href="{{ route('invoices.create') }}">إضافة فاتورة</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table key-buttons text-md-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">رقم الفاتورة</th>
                                    <th class="border-bottom-0">تاريخ الفاتورة</th>
                                    <th class="border-bottom-0">تاريخ الإستحقاق</th>
                                    <th class="border-bottom-0">المنتج</th>
                                    <th class="border-bottom-0">القسم</th>
                                    <th class="border-bottom-0">تاريخ الإستحقاق</th>
                                    <th class="border-bottom-0">الخصم</th>
                                    <th class="border-bottom-0">نسبة الضريبة</th>
                                    <th class="border-bottom-0">قيمة الضريبة</th>
                                    <th class="border-bottom-0">الإجمالي</th>
                                    <th class="border-bottom-0">الحالة</th>
                                    <th class="border-bottom-0">ملاحظات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="border-bottom-0">#</td>
                                    <td class="border-bottom-0">رقم الفاتورة</td>
                                    <td class="border-bottom-0">تاريخ الفاتورة</td>
                                    <td class="border-bottom-0">تاريخ الإستحقاق</td>
                                    <td class="border-bottom-0">المنتج</td>
                                    <td class="border-bottom-0">القسم</td>
                                    <td class="border-bottom-0">تاريخ الإستحقاق</td>
                                    <td class="border-bottom-0">الخصم</td>
                                    <td class="border-bottom-0">نسبة الضريبة</td>
                                    <td class="border-bottom-0">قيمة الضريبة</td>
                                    <td class="border-bottom-0">الإجمالي</td>
                                    <td class="border-bottom-0">الحالة</td>
                                    <td class="border-bottom-0">ملاحظات</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->

    </div>
    <!-- /row -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Chart.bundle js -->
    <script src="{{ URL::asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <!-- Moment js -->
    <script src="{{ URL::asset('assets/plugins/raphael/raphael.min.js') }}"></script>
    <!--Internal  Flot js-->
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.categories.js') }}"></script>
    <script src="{{ URL::asset('assets/js/dashboard.sampledata.js') }}"></script>
    <script src="{{ URL::asset('assets/js/chart.flot.sampledata.js') }}"></script>
    <!--Internal Apexchart js-->
    <script src="{{ URL::asset('assets/js/apexcharts.js') }}"></script>
    <!-- Internal Map -->
    <script src="{{ URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <script src="{{ URL::asset('assets/js/modal-popup.js') }}"></script>
    <!--Internal  index js -->
    <script src="{{ URL::asset('assets/js/index.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jquery.vmap.sampledata.js') }}"></script>



    <!-- Internal Data tables -->
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
@endsection
