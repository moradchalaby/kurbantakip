
<script>

     var intervalMiliseconds = 5000;
   var pool = function () {


    setInterval(pool, intervalMiliseconds);


</script>
    <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"> <span class="iconify" data-icon="mdi:cow"
                                data-inline="false"></span></span>

                        <div class="info-box-content">
                            <span class="info-box-text">KESİLEN</span>
                            <span class="info-box-number" id="kesilen">

                                <small>%</small>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"> <span class="iconify" data-icon="mdi:cow"
                                data-inline="false"></span></span>

                        <div class="info-box-content">
                            <span class="info-box-text">KALAN</span>
                            <span id="kalan" class="info-box-number"></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><span class="iconify"
                                data-icon="akar-icons:phone" data-inline="false"></span></span>

                        <div class="info-box-content">
                            <span class="info-box-text">ARANAN</span>
                            <span id="aranan" class="info-box-number"></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"> <span class="iconify"
                                data-icon="ri:video-chat-fill" data-inline="false"></span></span>

                        <div class="info-box-content">
                            <span class="info-box-text">VİDEO</span>
                            <span id="gonderilen" class="info-box-number"></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>


