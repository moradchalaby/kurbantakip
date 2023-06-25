@extends('layout')


@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <style>
        .my-input-class {
            padding: 3px 6px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .my-confirm-class {
            padding: 3px 6px;
            font-size: 12px;
            color: white;
            text-align: center;
            vertical-align: middle;
            border-radius: 4px;
            background-color: #337ab7;
            text-decoration: none;
        }

        .my-cancel-class {
            padding: 3px 6px;
            font-size: 12px;
            color: white;
            text-align: center;
            vertical-align: middle;
            border-radius: 4px;
            background-color: #a94442;
            text-decoration: none;
        }

        .error {
            border: solid 1px;
            border-color: #a94442;
        }

        .destroy-button {
            padding: 5px 10px 5px 10px;
            border: 1px blue solid;
            background-color: lightgray;
        }

        .transparent-input {
            background-color: rgba(0, 0, 0, 0) !important;
            border: none !important;
            width: 100%
        }

    </style>


    <section class="content">
        <div class="container-fluid">
@include('kucukbas/info')

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                            <!-- /.card -->

                            <div class="card">
                                <div class="card-header">

                                    <h3 class="card-title float-left"> DataTable with default features </h3>

                                    <div class="btn-group float-right">

                                        <a class="btn btn-info  " onClick="refreshTable()" href="#" role="button">
                                            <i class="fas fa-sync"></i>
                                        </a>
                                        <a href="#" class="btn btn-info " data-card-widget="maximize"><i
                                                class="fas fa-expand"></i>
                                        </a>

                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body ">

                                    <table id="example1" class="w-100 table table-bordered table-striped">

                                        <thead>
                                            <tr>
                                                <th><span id='search'>MKBZ NO</span> <br>MKBZ NO</th>
                                                <th>HİSSE NO</th>
                                                <th><span id='search'>SIRA NO</span><br>SIRA NO</th>
                                                <th><span id='search'>KESİM NO</span><br>KESİM NO</th>
                                                <th><span id='search'>ADI SOYADI</span><br>ADI SOYADI</th>
                                                <th><span id='search'>CEP TELEFONU</span><br>CEP TELEFONU</th>
                                                <th><span id='search'>REFERANS</span><br>REFERANS</th>
                                                <th><span id='search'>GELECEKVEKALET</span><br>GELECEKVEKALET</th>

                                                <th>ARAMA</th>
                                                <th>VİDEO</th>


                                            </tr>

                                        </thead>



                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->

        </div>
        <!--/. container-fluid -->
    </section>



@endsection
@section('css')@endsection
@section('js')

    <script>
        function refreshTable() {
            $('#example1').DataTable().draw();
        }
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            String.prototype.turkishToLower = function() {
                var string = this;
                var letters = {
                    "İ": "i",
                    "I": "ı",
                    "Ş": "ş",
                    "Ğ": "ğ",
                    "Ü": "ü",
                    "Ö": "ö",
                    "Ç": "ç"
                };
                string = string.replace(/(([İIŞĞÜÇÖ]))/g, function(letter) {
                    return letters[letter];
                });
                return string.toLowerCase();
            }
            String.prototype.turkishToUpper = function() {
                var string = this;
                var letters = {
                    "i": "İ",
                    "ş": "Ş",
                    "ğ": "Ğ",
                    "ü": "Ü",
                    "ö": "Ö",
                    "ç": "Ç",
                    "ı": "I"
                };
                string = string.replace(/(([iışğüçö]))/g, function(letter) {
                    return letters[letter];
                });
                return string.toUpperCase();
            }
            var tablem;
            $(document).ready(function() { // Setup - add a text input to each footer cell

                tablem = $('#example1').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "responsive": false,
                    "lengthChange": true,


                    "autoWidth": true,
                    "pageLength": 7,


                    "scrollX": true,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
                    "ajax": "{{ url('kucukbas/arama') }}",

                    "columns": [{
                            data: 'id',
                            name: 'id',

                        },
                        {
                            data: 'hisse_no',
                            name: 'hisse_no'
                        },
                        {
                            data: 'sira_no',
                            name: 'sira_no'
                        },
                        {
                            data: 'kesilme_no',
                            name: 'kesilme_no'
                        },

                        {
                            data: 'adi_soyadi',
                            name: 'adi_soyadi',

                        },
                        {
                            data: 'tel_no',
                            name: 'tel_no'
                        },
                        {
                            data: 'referans',
                            name: 'referans'
                        },
                        {
                            data: 'vekalet_durum',
                            name: 'vekalet_durum'
                        },
                        {
                            data: 'arama_islem',
                            name: 'arama_islem'
                        },
                        {
                            data: 'video_islem',
                            name: 'video_islem'
                        },



                    ],

                    order: [
                        [0, 'asc']
                    ],

                    initComplete: function() {
                        // Apply the search
                        this.api().columns().every(function() {
                            var that = this;

                            $('input', this.header()).on('keyup change clear',
                                function() {
                                    if (that.search() !== this.value
                                        .turkishToUpper()) {
                                        that
                                            .search(this.value.turkishToUpper())
                                            .draw();
                                    }
                                });
                        });
                    }

                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                tablem = $('#example1').DataTable();

                tablem.MakeCellsEditable({
                    "onUpdate": myCallbackFunction,
                    "inputCss": 'transparent-input',
                    "columns": [3, 8, 9],
                    "allowNulls": {
                        "columns": [3],
                        "errorClass": 'error'
                    },

                    "inputTypes": [{
                            "column": 3,
                            "type": "text",
                            "options": null
                        },
                        {
                            "column": 8,
                            "type": "list",
                            "options": [{

                                    "value": 'SEÇİNİZ',
                                    "display": "SEÇİNİZ"
                                }, {

                                    "value": "ARANMADI",
                                    "display": "ARANMADI"
                                },
                                {
                                    "value": "ARANDI",
                                    "display": "ARANDI"
                                },
                                {
                                    "value": "ULAŞILAMADI",
                                    "display": "ULAŞILAMADI"
                                },
                                {
                                    "value": "NUMARA YANLIŞ",
                                    "display": "NUMARA YANLIŞ"
                                },
                                {
                                    "value": "REFERANS ARANDI",
                                    "display": "REFERANS ARANDI"
                                }
                            ]
                        },
                        {
                            "column": 9,
                            "type": "list",
                            "options": [{

                                    "value": 'SEÇİNİZ',
                                    "display": "SEÇİNİZ"
                                }, {

                                    "value": "GÖNDERİLMEDİ",
                                    "display": "GÖNDERİLMEDİ"
                                },
                                {
                                    "value": "KENDİSİNE GÖNDERİLDİ",
                                    "display": "KENDİSİNE GÖNDERİLDİ"
                                },
                                {
                                    "value": "REFERANSA GÖNDERİLDİ1",
                                    "display": "REFERANSA GÖNDERİLDİ"
                                },
                                {
                                    "value": "WHATSAPP YOK",
                                    "display": "WHATSAPP YOK"
                                }
                            ]
                        }

                        // Nothing specified for column 3 so it will default to text

                    ]
                });

            });


            function myCallbackFunction(updatedCell, updatedRow, oldValue) {

                var formData = {
                    id: updatedRow.data()['id'],
                    arama_islem: updatedRow.data()['arama_islem'],
                    video_islem: updatedRow.data()['video_islem'],

                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: "{{ url('kucukbas/aramadrm') }}",
                    data: formData,

                    success: (data) => {

                        toastr.success(updatedRow.data()['id'] + ' - ' + updatedRow.data()[
                                'adi_soyadi'] + '<br>' + updatedCell.data() + '<br>' +
                            ' İşlem başarılı');

                    },
                    error: function(data) {
                        console.log(data);
                        toastr.error(updatedRow.data()['id'] + ' - ' + updatedRow.data()[
                                'adi_soyadi'] +
                            ' İşlem başarısız');
                    }
                });
                $('#example1').DataTable().draw();
            }
            $('#example1 thead tr #search').each(function() {
                var title = $(this).text();
                $(this).html('<input type="text" class = "w-100" placeholder = "ARA -' + title +
                    '" / > ');
            });

        });

</script>@endsection
