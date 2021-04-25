@include('admin.layout.header')

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"> Bất động sản
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
                       <form action="admin/bds/sua/{{$bds->bdsid}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            
                            <div class="form-group">
                                <label>Loại bất động sản: {{$bds->lbds->tenloai}}</label>
                                <input type="hidden" class="form-control" name="loaiid" value="{{$bds->lbds->loaiid}}" />
                            </div>
                            <div class="form-group">
                                <label>Khách hàng sở hữu: {{$bds->khach->hoten}}</label>
                                <input type="hidden" class="form-control" name="khid" value="{{$bds->khach->khid}}" />
                            </div>
                            <div class="form-group">
                                <label>Tình trạng</label>
                                @if($bds->tinhtrang=1)
                                <label class="radio-inline">
                                    <input name="tinhtrang" value="1" checked="" type="radio">Chuyển nhượng
                                </label>
                                <label class="radio-inline">
                                    <input name="tinhtrang" value="0" type="radio">Tạm hoãn
                                </label>
                                @else
                                <label class="radio-inline">
                                    <input name="tinhtrang" value="1" type="radio">Chuyển nhượng
                                </label>
                                <label class="radio-inline">
                                    <input name="tinhtrang" value="0" checked="" type="radio">Tạm hoãn
                                </label>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Diện tích</label>
                                <input class="form-control" name="dientich" value="{{$bds->dientich}}" placeholder="Nhập diện tích" />
                            </div>
                            <div class="form-group">
                                <label>Đơn giá</label>
                                <input class="form-control" name="dongia" value="{{$bds->dongia}}" placeholder="Nhập đơn giá" />
                            </div>
                            <div class="form-group">
                                <label>Chiều dài</label>
                                <input class="form-control" name="chieudai" value="{{$bds->chieudai}}" placeholder="Nhập chiều dài" />
                            </div>
                            <div class="form-group">
                                <label>Chiều rộng</label>
                                <input class="form-control" name="chieurong" value="{{$bds->chieurong}}" placeholder="Nhập chiều rộng" />
                            </div>
                            <div class="form-group">
                                <label>Tiền hoa hồng</label>
                                <input class="form-control" name="huehong" value="{{$bds->huehong}}" placeholder="Nhập tiền hoa hồng" />
                            </div>
                            <div class="form-group">
                                <label>Tên đường</label>
                                <input class="form-control" name="tenduong" value="{{$bds->tenduong}}" placeholder="Nhập tên đường" />
                            </div>
                            <div class="form-group">
                                <label>Số nhà</label>
                                <input class="form-control" name="sonha" value="{{$bds->sonha}}" placeholder="Nhập số nhà" />
                            </div>
                            <div class="form-group">
                                <label>Phường</label>
                                <input class="form-control" name="phuong" value="{{$bds->phuong}}" placeholder="Nhập tên phường" />
                            </div>
                            <div class="form-group">
                                <label>Quận</label>
                                <input class="form-control" name="quan" value="{{$bds->quan}}" placeholder="Nhập tên quận/huyện" />
                            </div>
                            <div class="form-group">
                                <label>Thành phố</label>
                                <input class="form-control" name="thanhpho" value="{{$bds->thanhpho}}" placeholder="Nhập tên thành phố" />
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <p>
                                <img width="400px" src="file/hinhanh/{{$bds->hinhanh}}">
                                </p>
                                <input type="file" name="hinhanh" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label>Mã quyền sử dụng đất</label>
                                <input class="form-control" name="masoqsdd" value="{{$bds->masoqsdd}}" placeholder="Có thể bỏ trống" />
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <input class="form-control" name="mota" value="{{$bds->mota}}" placeholder="Có thể bỏ trống" />
                            </div>
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
