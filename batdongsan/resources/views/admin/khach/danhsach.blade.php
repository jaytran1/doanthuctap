@include('admin.layout.header')

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Khách hàng
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
                        <th>idAdmin</th>
                        <th>ID</th>
                        <th>Họ tên</th>
                        <th>Địa chỉ tạm trú</th>
                        <th>Sdt</th>
                        <th>Giới tính</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($khach as $k)
                    <tr class="odd gradeX" align="center">
                        <td>{{$k->id}} - {{$k->user->name}}</td>
                        <td>{{$k->khid}}</td>
                        <td>{{$k->hoten}}</td>
                        <td>{{$k->diachitt}}</td>
                        <td>{{$k->sodienthoai}}</td>
                        <td>
                            @if ($k->gioitinh==0)
                            {{'Nam'}}
                            @else
                            {{'Nữ'}}
                            @endif
                        </td>
                        <td>{{$k->email}}</td>
                        <td>
                            @if ($k->loaikh==1)
                            {{'Vip'}}
                            @else
                            {{'Standard'}}
                            @endif
                        </td>
                        
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/khach/xoa/{{$k->id}}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/khach/sua/{{$k->id}}">Edit</a></td>
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
