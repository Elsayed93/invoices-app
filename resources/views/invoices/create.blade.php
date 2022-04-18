@extends('layouts.master')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">
@endsection

@section('page-title', 'إضافة فاتورة')

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الفواتير</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    اضافة فاتورة</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    {{-- {{dd}} --}}
    @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if ($errors->any())
        @include('partials._errors')
    @endif
    <!-- row -->
    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('invoices.store') }}" method="post" enctype="multipart/form-data"
                        autocomplete="off">
                        @csrf

                        {{-- 1 --}}
                        <div class="row">
                            {{-- invoice_number --}}
                            <div class="col">
                                <label  class="control-label">رقم الفاتورة</label>
                                <input type="text" class="form-control" name="invoice_number"
                                    title="يرجي ادخال رقم الفاتورة" required>
                            </div>

                            {{-- invoice_Date --}}
                            <div class="col">
                                <label>تاريخ الفاتورة</label>
                                <input class="form-control fc-datepicker" name="invoice_date" placeholder="YYYY-MM-DD"
                                    type="text" value="{{ date('Y-m-d') }}" required>
                            </div>

                            {{-- due_date --}}
                            <div class="col">
                                <label>تاريخ الاستحقاق</label>
                                <input class="form-control fc-datepicker" name="due_date" placeholder="YYYY-MM-DD"
                                    type="text" required>
                            </div>

                        </div>

                        {{-- 2 --}}
                        <div class="row">
                            <div class="col">
                                {{-- sections --}}
                                <label  class="control-label">القسم</label>
                                <select name="section_id" class="form-control SlectBox">

                                    {{-- products --}}
                                    <option value="" selected disabled>حدد المنتج</option>
                                    @foreach ($sections as $section)
                                        <option value="{{ $section->id }}"> {{ $section->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col">
                                <label  class="control-label">المنتج</label>
                                <select id="product" name="product_id" class="form-control">

                                </select>
                            </div>

                            <div class="col">
                                <label class="control-label">مبلغ التحصيل</label>
                                <input type="number" class="form-control" name="amount_collection"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                            </div>
                        </div>


                        {{-- 3 --}}
                        <div class="row">

                            <div class="col">
                                <label  class="control-label">مبلغ العمولة</label>

                                <input type="number" class="form-control form-control-lg" id="amount_commision"
                                    name="amount_commision" title="يرجي ادخال مبلغ العمولة "
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                    required step=".01">
                            </div>

                            <div class="col">
                                <label  class="control-label">الخصم</label>
                                <input type="number" class="form-control form-control-lg" id="discount" name="discount"
                                    title="يرجي ادخال مبلغ الخصم "
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                    value=0 required step=".01">
                            </div>

                            <div class="col">
                                <label  class="control-label">نسبة ضريبة القيمة المضافة</label>
                                <select name="vat_rate" id="vat_rate" class="form-control" onchange="myFunction()">
                                    <!--placeholder-->
                                    <option value="" selected disabled>حدد نسبة الضريبة</option>
                                    <option value="5%">5%</option>
                                    <option value="10%">10%</option>
                                </select>
                            </div>

                        </div>

                        {{-- 4 --}}
                        <div class="row">
                            <div class="col">
                                <label  class="control-label">قيمة ضريبة القيمة المضافة</label>
                                <input type="number" step=".01" class="form-control" id="vat_value" name="vat_value"
                                    readonly>
                            </div>

                            <div class="col">
                                <label  class="control-label">الاجمالي شامل الضريبة</label>
                                <input type="number" step=".01" class="form-control" id="total" name="total" readonly>
                            </div>
                        </div>

                        {{-- 5 --}}
                        <div class="row">
                            <div class="col">
                                <label for="exampleTextarea">ملاحظات</label>
                                <textarea class="form-control" id="exampleTextarea" name="note" rows="3"></textarea>
                            </div>
                        </div><br>

                        <p class="text-danger">* صيغة المرفق pdf, jpeg ,.jpg , png </p>
                        <h5 class="card-title">المرفقات</h5>

                        <div class="col-sm-12 col-md-12">
                            <input type="file" name="invoice_attachment" class="dropify"
                                accept=".pdf,.jpg, .png, image/jpeg, image/png" data-height="70" />
                        </div><br>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>

    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>

    <script>
        let date = $('.fc-datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        }).val();
    </script>

    {{-- get section products --}}
    <script>
        $(document).ready(function() {
            $('select[name="section_id"]').on('change', function() {
                let SectionId = $(this).val();
                let url = "{{ route('section.products', ':id') }}";
                url = url.replace(':id', SectionId);

                if (SectionId) {
                    $.ajax({
                        url: url,
                        // section.products
                        type: "GET",
                        dataType: "json",

                        success: function(data) {
                            console.log('products', data);
                            $('select[name="product_id"]').empty();

                            if (data.data.length == 0) {
                                $('select[name="product_id"]').append(
                                    '<option value="">ﻻ يوجد منتجات في هذا القسم</option>'
                                );
                            } else {
                                $.each(data.data, function(key, value) {
                                    $('select[name="product_id"]').append(
                                        '<option value="' +
                                        value.id + '">' + value.name + '</option>');
                                });
                            }

                        },
                    });

                } else {
                    console.log('AJAX load did not work');
                }
            });

        });
    </script>

    <script>
        $('#amount_commision').on('keyup', function() {
            const myTimeout = setTimeout(myFunction, 500);
        });

        // 
        $('#discount').on('keyup', function() {
            const myTimeout = setTimeout(myFunction, 500);
        });
    </script>

    <script>
        function myFunction() {

            let amount_commision = parseFloat(document.getElementById("amount_commision").value);
            if (isNaN(amount_commision)) {
                amount_commision = 0;
            }
            console.log('amount_commision', amount_commision);
            let discount = parseFloat(document.getElementById("discount").value);
            console.log('discount', discount);
            if (isNaN(discount)) {
                discount = 0;
            }
            let vat_rate = parseFloat(document.getElementById("vat_rate").value);
            if (isNaN(vat_rate)) {
                vat_rate = 0;
            }
            console.log('vat_rate', vat_rate);
            let vat_value = parseFloat(document.getElementById("vat_value").value);
            console.log('vat_value', vat_value);

            let amount_commision2 = amount_commision - discount;


            if (typeof amount_commision === 'undefined' || !amount_commision) {

                alert('يرجي ادخال مبلغ العمولة ');

            } else {
                let intResults = amount_commision2 * vat_rate / 100;

                let intResults2 = parseFloat(intResults + amount_commision2);

                sumq = parseFloat(intResults).toFixed(2);

                sumt = parseFloat(intResults2).toFixed(2);

                document.getElementById("vat_value").value = sumq;

                document.getElementById("total").value = sumt;

            }

        }
    </script>


@endsection
