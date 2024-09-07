<script src="https://esgoo.net/scripts/jquery.js"></script>
<style type="text/css">
    .css_select_div {
        text-align: center;
    }

    .css_select {
        display: inline-table;
        width: 25%;
        padding: 5px;
        margin: 5px 2%;
        border: solid 1px #686868;
        border-radius: 5px;
    }
</style>
<script>
    $(document).ready(function() {
        //Lấy tỉnh thành
        $.getJSON('https://esgoo.net/api-tinhthanh/1/0.htm', function(data_tinh) {
            if (data_tinh.error == 0) {
                $.each(data_tinh.data, function(key_tinh, val_tinh) {
                    $("#tinh").append('<option value="' + val_tinh.id + '">' + val_tinh.full_name + '</option>');
                });
                $("#tinh").change(function(e) {
                    var idtinh = $(this).val();
                    //Lấy quận huyện
                    $.getJSON('https://esgoo.net/api-tinhthanh/2/' + idtinh + '.htm', function(data_quan) {
                        if (data_quan.error == 0) {
                            $("#quan").html('<option value="0">Quận Huyện</option>');
                            $("#phuong").html('<option value="0">Phường Xã</option>');
                            $.each(data_quan.data, function(key_quan, val_quan) {
                                $("#quan").append('<option value="' + val_quan.id + '">' + val_quan.full_name + '</option>');
                            });
                            //Lấy phường xã  
                            $("#quan").change(function(e) {
                                var idquan = $(this).val();
                                $.getJSON('https://esgoo.net/api-tinhthanh/3/' + idquan + '.htm', function(data_phuong) {
                                    if (data_phuong.error == 0) {
                                        $("#phuong").html('<option value="0">Phường Xã</option>');
                                        $.each(data_phuong.data, function(key_phuong, val_phuong) {
                                            $("#phuong").append('<option value="' + val_phuong.id + '">' + val_phuong.full_name + '</option>');
                                        });
                                    }
                                });
                            });

                        }
                    });
                });

            }
        });
    });
</script>

<form action="./Them_KhuTro" method="POST">
    <div class="mb-3">
        <label for="TenKhuTro" class="form-label">Tên khu trọ</label>
        <input type="text" class="form-control" name="TenKhuTro" id="TenKhuTro" require>
    </div>
    <div class="mb-3">
        <label for="KinhDo" class="form-label">Kinh Độ</label>
        <input type="int" class="form-control" name="KinhDo" id="KinhDo" require>
    </div>
    <div class="mb-3">
        <label for="ViDo" class="form-label">Vĩ độ</label>
        <input type="int" class="form-control" name="ViDo" id="ViDo" require>
    </div>
    <div>
        <label for="DiaChi" class="form-label">Địa chỉ</label>
        <input type="text" class="form-control" name="DiaChi" id="DiaChi" require>
    </div>
    <div class="css_select_div">
        <select class="css_select" id="tinh" name="tinh" title="Chọn Tỉnh Thành">
            <option value="0">Tỉnh Thành</option>
        </select>
        <select class="css_select" id="quan" name="quan" title="Chọn Quận Huyện">
            <option value="0">Quận Huyện</option>
        </select>
        <select class="css_select" id="phuong" name="phuong" title="Chọn Phường Xã">
            <option value="0">Phường Xã</option>
        </select>
    </div>
    <button style="width:100%" type="submit" name="TT_KhuTro" class="btn btn-primary">Thêm</button>

</form>