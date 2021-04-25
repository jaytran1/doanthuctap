@include('admin.layout.header')

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"> Khách hàng
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
                       <form action="admin/khach/them" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="form-group">
							<label>Admin quản trị</label>
							<select class="form-control" name="idadmin">
								@foreach($user as $u)
									<option value="{{$u->id}}">{{$u->name}}</option>
								@endforeach
							</select>
							</div>
                            <div class="form-group">
                                <label>Họ tên khách hàng</label>
                                <input class="form-control" name="hoten" placeholder="Nhập tên người dùng" />
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input class="form-control" name="diachi" placeholder="Nhập địa chỉ" />
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ thường trú</label>
                                <input class="form-control" name="diachitt" placeholder="Nhập địa chỉ thường trú" />
                            </div>
                            <div class="form-group">
                                <label>CMND</label>
                                <input class="form-control" name="cmnd" placeholder="Nhập chứng minh thư" />
                            </div>
                            <div class="form-group">
                                <label>Ngày sinh</label>
                                <input type="date" name="ngaysinh" />
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input class="form-control" name="sodienthoai" placeholder="Nhập số điện thoại" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" placeholder="Nhập email" />
                            </div>
                            <div class="form-group">
                                <label>Giới tính</label>
                                <label class="radio-inline">
                                    <input name="gioitinh" value="0" checked="" type="radio">Nam
                                </label>
                                <label class="radio-inline">
                                    <input name="gioitinh" value="1" type="radio">Nữ
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Type khách hàng</label>
                                <label class="radio-inline">
                                    <input name="loaikh" value="0" checked="" type="radio">Standard
                                </label>
                                <label class="radio-inline">
                                    <input name="loaikh" value="1" type="radio">Vip
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <label class="radio-inline">
                                    <input name="trangthai" value="1" checked="" type="radio">Active
                                </label>
                                <label class="radio-inline">
                                    <input name="trangthai" value="0" type="radio">None
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <input class="form-control" name="mota" placeholder="Có thể bỏ trống" />
                            </div>
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
