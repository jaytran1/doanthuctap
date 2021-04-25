@include('admin.layout.header')

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"> Yêu cầu khách hàng
                            <small>Fix</small>
                        </h1>
                    </div>

                    @if(count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                        {{$err}}<br>
                        @endforeach
                    </div>
                    @endif

                    @if(count($errors)<1)
                    <div class="alert alert-success">
                        <a><b>Hệ thống đang hoạt động</b></a><br>
                        {{session('thongbao')}}
                    </div>
                    @endif

                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                       <form action="admin/yeucau/sua/{{$yeucau->ycid}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />

                            <div class="form-group">
                                <label>Loại bất động sản: {{$yeucau->lbds->tenloai}}</label>
                                <input type="hidden" class="form-control" name="loaiid" value="{{$yeucau->lbds->loaiid}}" />
                            </div>
                            <div class="form-group">
                                <label>Khách hàng sở hữu: {{$yeucau->khach->hoten}}</label>
                                <input type="hidden" class="form-control" name="khid" value="{{$yeucau->khach->khid}}" />
                            </div>

                            <div class="form-group">
                                <label>Vị trí</label>
                                <input class="form-control" name="vitri" placeholder="Nhập địa điểm" value="{{$yeucau->vitri}}" />
                            </div>

                            <div class="form-group">
                                <label>Mô tả</label>
                                <input class="form-control" name="mota" placeholder="Có thể bỏ trống" value="{{$yeucau->mota}}" />
                            </div>

                            <div class="form-inline">
                                <label>Giá từ:</label>
                                <input class="form-control" name="giat" placeholder="từ.." value="{{$yeucau->giat}}" />

                                <label>đến:</label>
                                <input class="form-control" name="giaf" placeholder="đến.." value="{{$yeucau->giaf}}" />
                            </div>
                            <br>
                            <div class="form-inline">
                                <label>Chiều dài từ:</label>
                                <input class="form-control" name="dait" placeholder="dài từ" value="{{$yeucau->dait}}" />

                                <label>đến:</label>
                                <input class="form-control" name="daif" placeholder="dài đến" value="{{$yeucau->daif}}" />
                            </div>
                            <br>
                            <div class="form-inline">
                                <label>Chiều rộng từ:</label>
                                <input class="form-control" name="rongt" placeholder="rộng từ" value="{{$yeucau->rongt}}" />

                                <label>đến:</label>
                                <input class="form-control" name="rongf" placeholder="rộng đến" value="{{$yeucau->rongf}}" />
                            </div>
                            <br>
                            


                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

</body>

</html>
