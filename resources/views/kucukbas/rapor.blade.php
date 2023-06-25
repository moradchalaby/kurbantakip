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
         @include('kucukbas/info')


            <section class="content">
                <div class="container-fluid">
                    <h4 class="mb-2 mt-4">Cards</h4>
                    <h5 class="mb-2">Abilities</h5>
                    <div class="row">
                        @foreach ($data['referans'] as $ref)

                            <div class="col-md-3">
                                <div class="card card-info collapsed-card">
                                    <div class="card-header">
                                        <h3 class="card-title">{{ $ref['adi_soyadi'] }}</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                    class="fas fa-plus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="maximize"><i
                                                    class="fas fa-expand"></i>
                                            </button>
                                        </div>
                                        <!-- /.card-tools -->
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body card-info ">

                                        <button
                                            onclick="new_popup('{{ $ref['tel_no']}}' );">{{ str_replace('\'', '', $ref['tel_no']) }}</button>
                                    </div>
                                    <div class="card-footer card-info  "><a
                                            href="{{ route('kucukbas.detail', $ref->id) }}"
                                            class="small-box-footer text-info">
                                            Listeye Git <i class="fas fa-arrow-circle-right text-info"></i>
                                        </a></div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        @endforeach


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
<script>
function new_popup(tel,msg){
    wpwin= window.open(
                 "https://api.whatsapp.com/send?phone="+tel+"&text="+msg, "_blank", "width=500, height=350");
setTimeout(() => wpwin.close(), 3000);
}
</script>
@endsection
@section('css')@endsection
@section('js')@endsection
