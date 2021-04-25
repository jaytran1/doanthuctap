@include('admin.layout.header')

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Loại hình bất động sản
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
                        <th>Mã loại</th>
                        <th>Tên loại hình</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($loaibds as $lbds)
                    <tr class="odd gradeX" align="center">
                        <td>{{$lbds->loaiid}}</td>
                        <td>{{$lbds->tenloai}}</td>

                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/loaibds/xoa/{{$lbds->loaiid}}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/loaibds/sua/{{$lbds->loaiid}}">Edit</a></!--td
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