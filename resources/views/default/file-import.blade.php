
@extends('layout')


@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Veri Yükle</h1>
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
                                    <h3 class="card-title">Veri Yükle</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body ">

                                        <h2 class="mb-4">
                                            Excel dosyasının ilk satırını silerek yükleyin
                                        </h2>
                                        <form action="{{ route('file-import') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                                                <div class="custom-file text-left">
                                                    <input type="file" name="file" class="custom-file-input" id="customFile">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary">Import data</button>
                                            {{--<a class="btn btn-success" href="{{ route('file-export') }}">Export data</a>--}}
                                        </form>

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
