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





    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
          @include('buyukbas/info')

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                            <!-- /.card -->

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">{{ $data['referans']->adi_soyadi }}</h3>
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

                                                <th><span id='search'>GELECEKVEKALET</span><br>GELECEKVEKALET</th>
                                                <th><span id='search'>ARAMA</span><br>ARAMA</th>
                                                <th><span id='search'>VİDEO</span><br>VİDEO</th>
                                            </tr>

                                        </thead>


                                        <tbody>
                                            @foreach ($data['buyukbas'] as $bbas)
                                                <tr>
                                                    <td>{{ $bbas['id'] }}</td>
                                                    <td>{{ $bbas['hisse_no'] }}</td>
                                                    <td>{{ $bbas['sira_no'] }}</td>
                                                    <td>{{ $bbas['kesim_no'] }}</td>
                                                    <td>{{ $bbas['adi_soyadi'] }}</td>
                                                    <td>{{ $bbas['tel_no'] }}</td>

                                                    <td>@php  echo $bbas['vekalet_durum']==0?'Gelecek':'Vekalet'  @endphp</td>
                                                    <td>{{ $bbas['arama_islem'] }}</td>
                                                    <td>{{ $bbas['video_islem'] }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>

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
    <!-- /.content -->
@endsection
@section('css')@endsection
@section('js')
<script>
    function refreshTable() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var data = {
            refresh: true,

        }
        $.ajax({
            type: "GET",
            data: data,
            url: "{{ route('buyukbas.reload') }}",
            success: function(msg) {
                // console.log(msg);
                if (msg) {
                    toastr.success(' İşlem başarılı');
                } else {
                    toastr.error("İşlem başarısız");
                }
            }
        });
    }
    /*  $(function() {
        $(" #example1").DataTable({ "responsive" : true, "lengthChange" : false, "autoWidth" : false, "buttons" :
    ["copy", "csv" , "excel" , "pdf" , "print" , "colvis" ] }).buttons().container().appendTo('#example1_wrapper
    .col-md-6:eq(0)'); }); */
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
    $(document).ready(function() { // Setup - add a text input to each footer cell
        $('#example1 thead tr #search').each(function() {
            var title = $(this).text();
            $(this).html('<input type="text" class = "w-100" placeholder = "ARA -' + title +
                '" / > ');
        });


        var table = $('#example1').DataTable({
            "responsive": false,
            "lengthChange": true,


            "autoWidth": true,
            "pageLength": 10,


            "scrollX": true,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],

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

    });
</script> @endsection
