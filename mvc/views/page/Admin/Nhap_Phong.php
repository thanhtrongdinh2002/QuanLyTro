<form action="./Them_Phong" method="POST">
    <div class="mb-3">
        <label for="IDKhuTro" class="form-label">Chọn khu trọ</label>
        <select class="form-control" name="IDKhuTro" id="IDKhuTro" required>
            <?php
            if (isset($data["data"])) {
                while ($row = mysqli_fetch_array($data["data"])) {
                    echo '<option value="' . $row["IDKhuTro"] . '">' . $row["TenKhuTro"] . '</option>';
                }
            }
            ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="STT" class="form-label">Số thứ tự phòng</label>
        <input type="int" class="form-control" name="STT" id="STT" require>
    </div>
    <div class="mb-3">
        <label for="TenLoaiPhong" class="form-label">Tên phòng</label>
        <input type="text" class="form-control" name="TenLoaiPhong" id="TenLoaiPhong" require>
    </div>
    <div class="mb-3">
        <label for="SoNguoi" class="form-label">Số người</label>
        <input type="int" class="form-control" name="SoNguoi" id="SoNguoi" require>
    </div>
    <div class="mb-3">
        <label for="DienTich" class="form-label">Diện tích</label>
        <input type="int" class="form-control" name="DienTich" id="DienTich" require>
    </div>
    <div class="mb-3">
        <label for="GiaThue" class="form-label">Giá thuê</label>
        <input type="int" class="form-control" name="GiaThue" id="GiaThue" require>
    </div>

    <label for="TinhTrang">Tình trạng:</label>
    <select id="TinhTrang" name="TinhTrang" required>
        <option value="0">Đã có người ở</option>
        <option value="1">Đã có người đặt thuê</option>
        <option value="2">Đang trống</option>
    </select>

    <button style="width:100%" type="submit" name="TT_Phong" class="btn btn-primary">Thêm</button>

</form>