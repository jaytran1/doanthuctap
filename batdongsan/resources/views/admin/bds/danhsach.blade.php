@include('admin.layout.header')

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Bất động sản
                            <small>List</small>
                        </h1>
                    </div>


                    @if(count($errors)<1)
                    <div class="alert alert-success">
                        <a><b>Hệ thống đang hoạt động</b></a><br>
                        {{session('thongbao')}}
                    </div>
                    @endif
            
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>idLoai</th>
                        <th>idKhach</th>
                        <th>Diện tích</th>
                        <th>Đơn giá</th>
                        <th>Chiều dài</th>
                        <th>Chiều rộng</th>
                        <th>Tình trạng</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bds as $b)
                    <tr class="odd gradeX" align="center">
                        <td>{{$b->bdsid}}</td>
                        <td>{{$b->loaiid}}</td>
                        <td>{{$b->khid}}</td>
                        <td>{{$b->dientich}}</td>
                        <td>{{$b->dongia}}</td>
                        <td>{{$b->chieudai}}</td>
                        <td>{{$b->chieurong}}</td>
                        <td>
                            @if ($b->tinhtrang==1)
                            {{'Chuyển nhượng'}}
                            @else
                            {{'Tạm hoãn'}}
                            @endif
                        </td>
                        
                        <td class="center"><i class="fa fa-camera fa-fw"></i><a href="admin/bds/hinh/{{$b->bdsid}}"> Photo</a></td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/bds/xoa/{{$b->bdsid}}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/bds/sua/{{$b->bdsid}}">Edit</a></td>

                    </tr>
                    @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
</body>

</html>
