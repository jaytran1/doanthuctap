<div class="section_w470">
            <div class="latest_properties">
                <h2>Thông tin bất động sản mới nhất</h2>
                <table class="table" border="1" style="background-color: #2f606b">
                <thead>
                @foreach($bds->take(5) as $b)
                <tr>
                    <td><a href="#"><img src="file/hinhanh/{{$b->hinhanh}}" width="200px" /><span>Detail</span></a></td>
                    <td>{{$b->mota}}</td>
                </tr>
                @endforeach
                </thead>
                </table>

            <div class="cleaner"></div>    
            </div>
        </div>