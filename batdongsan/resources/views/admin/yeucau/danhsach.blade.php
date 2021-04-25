@include('admin.layout.header')

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Danh sách yêu cầu khách hàng
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
                        <th>ycid</th>
                        <th>Loại BDS</th>
                        <th>KH</th>
                        <th>Vị trí</th>
                        <th>Giá trị</th>
                        <th>Chiều dài (m)</th>
                        <th>Chiều rộng (m)</th>
                        
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($yeucau as $yc)
                    <tr class="odd gradeX" align="center">
                        <td>{{$yc->ycid}}</td>
                        <td>{{$yc->loaiid}}</td>
                        <td>{{$yc->khid}}</td>
                        <td>{{$yc->vitri}}</td>
                        <td>{{$yc->giat}} - {{$yc->giaf}}</td>
                        <td>{{$yc->dait}} - {{$yc->daif}}</td>
                        <td>{{$yc->rongt}} - {{$yc->rongf}}</td>
                        

                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/yeucau/xoa/{{$yc->ycid}}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/yeucau/sua/{{$yc->ycid}}">Edit</a></td>
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
