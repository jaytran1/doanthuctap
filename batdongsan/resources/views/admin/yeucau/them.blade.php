@include('admin.layout.header')

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"> Yêu cầu khách hàng
                            <small>Add</small>
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
                       <form action="admin/yeucau/them" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />

                            <div class="form-group">
                            <label>Loại bất động sản</label>
                            <select class="form-control" name="loaiid">
                                @foreach($lbds as $l)
                                    <option value="{{$l->loaiid}}">{{$l->tenloai}}</option>
                                @endforeach
                            </select>
                            </div>
                            <div class="form-group">
                            <label>Khách hàng</label>
                            <select class="form-control" name="khid">
                                @foreach($khach as $k)
                                    <option value="{{$k->khid}}">{{$k->hoten}}</option>
                                @endforeach
                            </select>
                            </div>

                            <div class="form-group">
                                <label>Vị trí</label>
                                <input class="form-control" name="vitri" placeholder="Nhập địa điểm" />
                            </div>

                            <div class="form-group">
                                <label>Mô tả</label>
                                <input class="form-control" name="mota" placeholder="Có thể bỏ trống" />
                            </div>

                            <div class="form-inline">
                                <label>Giá từ:</label>
                                <input class="form-control" name="giat" placeholder="từ.." />

                                <label>đến:</label>
                                <input class="form-control" name="giaf" placeholder="đến.." />
                            </div>
                            <br>
                            <div class="form-inline">
                                <label>Chiều dài từ:</label>
                                <input class="form-control" name="dait" placeholder="dài từ" />

                                <label>đến:</label>
                                <input class="form-control" name="daif" placeholder="dài đến" />
                            </div>
                            <br>
                            <div class="form-inline">
                                <label>Chiều rộng từ:</label>
                                <input class="form-control" name="rongt" placeholder="rộng từ" />

                                <label>đến:</label>
                                <input class="form-control" name="rongf" placeholder="rộng đến" />
                            </div>
                            <br>
                            


                            <button type="submit" class="btn btn-default">Thêm</button>
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
