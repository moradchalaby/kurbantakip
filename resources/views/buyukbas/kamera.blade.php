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
                                <h3 class="card-title">TÜM LİSTE</Label></h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body ">
                                <div class="container mt-4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h4>BüüyükBaş Kurban videosu gönder</h4>
                                        </div>
                                    </div>
                                    <hr />
                                    <form method="POST" enctype="multipart/form-data" id="laravel-ajax-file-upload" action="javascript:void(0)">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="number" name="tittle" placeholder="KURBAN NO" id="tittle">
                                                    <span class="text-danger">{{ $errors->first('file') }}</span>
                                                </div>

                                                <div class="form-group">
                                                    <input type="file" name="file" placeholder="Choose File" id="file">
                                                    <span class="text-danger">{{ $errors->first('file') }}</span>
                                                </div>
                                                <div class="form-group">
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
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
@section('css')
@endsection
@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>

<script>
    $(document).ready(function(e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#laravel-ajax-file-upload').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var start = new Date;

            $.ajax({
                xhr: function() {
                    var xhr = new window.XMLHttpRequest();
                    var percentage = '0';
                    $('.progress .progress-bar').removeClass("bg-success").addClass("bg-danger");



                    xhr.upload.addEventListener("progress", function(evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = evt.loaded / evt.total;
                            percentComplete = parseInt(percentComplete * 100);
                            var percentage = percentComplete;
                            $('.progress .progress-bar').css("width", percentage + '%', function() {
                                return $(this).attr("aria-valuenow", percentage) + "%";
                            })




                            console.log(percentComplete);

                            if (percentComplete === 100) {
                                var timem = (new Date - start) / 1000 + " Seconds";

                                alert('Dosya Başarılı bir Şekilde Gönderildi ' + timem);

                            }

                        }
                    }, false);

                    return xhr;
                },

                type: 'POST'
                , url: "{{ route('kamera.buyukbas.save')}}"
                , data: formData
                , cache: false
                , contentType: false
                , processData: false
                , success: (data) => {



                    $('.progress .progress-bar').removeClass("bg-danger").addClass("bg-success");



                    this.reset();
                    var percentage = '0';

                    $('.progress .progress-bar').css("width", percentage + '%', function() {
                        return $(this).attr("aria-valuenow", percentage) + "%";
                    })

                    console.log(data);


                }
                , error: function(data) {
                    console.log(data);
                }
            , });
        });
    });

</script>
@endsection
