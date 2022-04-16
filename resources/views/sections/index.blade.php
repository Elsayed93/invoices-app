@extends('layouts.master')

@section('page-title', 'الأقسام')

@section('css')

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
                <h4 class="content-title mb-0 my-auto">الإعدادات</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">
                    / قائمة الأقسام
                </span>
            </div>
        </div>
    </div>


    <!-- row opened -->
    <div class="row row-sm">

        <!--div-->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">الأقسام</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <a class="btn ripple btn-primary" data-target="#modaldemo1" data-toggle="modal" href="">إضافة قسم</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">#</th>
                                    <th class="wd-15p border-bottom-0">الإسم</th>
                                    <th class="wd-15p border-bottom-0">الوصف</th>
                                    <th class="wd-25p border-bottom-0">الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sections as $index => $section)
                                    <tr>
                                        <td class="wd-15p border-bottom-0">{{ $index + 1 }}</td>
                                        <td class="wd-15p border-bottom-0">{{ $section->name }}</td>
                                        <td class="wd-15p border-bottom-0">{{ $section->description }}</td>
                                        <td class="wd-25p border-bottom-0">
                                            <a href="#" class="btn btn-primary btn-sm" data-target="#editmodal"
                                                data-toggle="modal">
                                                Edit
                                            </a>
                                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->
    </div>
    <!-- /row -->

    <!-- Basic modal -->
    <div class="modal" id="modaldemo1">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">إضافة قسم</h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route('sections.store') }}" method="post">
                    <div class="modal-body">
                        @csrf

                        <div class="form-group">
                            <label for="">إسم القسم</label>
                            <input type="text" name="name" id="" class="form-control"
                                placeholder="من فضلك قم بكتابة إسم القسم">
                        </div>


                        <div class="form-group">
                            <label for="">الوصف</label>
                            <textarea name="description" id="" cols="30" rows="10" class="form-control"
                                placeholder="قم بكتابة وصف القسم(إختياري)"></textarea>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button class="btn ripple btn-primary" type="submit">إضافة</button>
                        <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">إلغاء</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Basic modal -->


    <!-- Edit modal -->
    <div class="modal" id="editmodal">
        <div class="modal-dialog edit-modal-container" role="document">
          
        </div>
    </div>
    <!-- End Edit modal -->


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
    {{-- <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script> --}}
    {{-- <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script> --}}
    {{-- <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script> --}}
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    {{-- <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script> --}}
    {{-- <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script> --}}
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
@endsection
