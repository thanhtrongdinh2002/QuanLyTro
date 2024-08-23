<?php
class AdminModel extends DB
{
    public function Check_Infor($sdt)
    {
        $sql = "SELECT * FROM chutro WHERE `SDT` = '$sdt'";
        $query = mysqli_query($this->conn, $sql);
        return $query;
    }
    public function Add_Infor($idchutro, $hoten, $cccd, $diachi, $gioitinh, $namsinh, $sdt)
    {
        $sql = "insert into `chutro` (IDChuTro, HoTenCT, GioiTinh, SDT, CCCD, DiaChi, NamSinh) values ('$idchutro', '$hoten', '$gioitinh', '$sdt', '$cccd', '$diachi', '$namsinh')";
        $query = mysqli_query($this->conn, $sql);
        return $query;
    }
    public function ConnectID($idchutro, $iduser)
    {
        $sql = "UPDATE user SET IDChuTro = '$idchutro' WHERE IDUser = '$iduser'";
        $query = mysqli_query($this->conn, $sql);
        return $query;
    }


    public function editTaikhoan($uid)
    {
        $sql = "SELECT * FROM taikhoan WHERE `uid` = $uid";
        $query = mysqli_query($this->conn, $sql);
        return $query;
    }
    public function check_editTaikhoan($username, $pass, $uid)
    {
        $sql = "UPDATE `taikhoan` SET username = '$username', pass = '$pass' WHERE uid = $uid ";
        $query = mysqli_query($this->conn, $sql);
        return $query;
    }
    public function DeleteTaikhoan($uid)
    {
        $sql = "DELETE FROM taikhoan WHERE `uid` = $uid";
        $query = mysqli_query($this->conn, $sql);
        return $query;
    }
    public function list_khachhang()
    {
        $sql = "SELECT * FROM khachhang";
        $query = mysqli_query($this->conn, $sql);
        return $query;
    }
    public function them_khachhang($hoten, $sdt, $diachi, $ngaytao)
    { // Lấy ngày hiện tại
        $sql = "INSERT INTO khachhang (hoten, sdt, diachi, ngaytao) 
                VALUES ('$hoten', '$sdt', '$diachi', '$ngaytao')";

        $query = mysqli_query($this->conn, $sql);
        return $query;
    }
    public function editKhachhang($iduser)
    {
        $sql = "SELECT * FROM khachhang WHERE `iduser` = $iduser";
        $query = mysqli_query($this->conn, $sql);
        return $query;
    }
    public function check_editKhachhang($hoten, $sdt, $diachi, $iduser)
    {
        $sql = "UPDATE `khachhang` SET hoten = '$hoten', sdt = '$sdt', diachi = '$diachi' WHERE iduser = $iduser ";
        $query = mysqli_query($this->conn, $sql);
        return $query;
    }
    public function DeleteKhachhang($iduser)
    {
        $sql = "DELETE FROM khachhang WHERE `iduser` = $iduser";
        $query = mysqli_query($this->conn, $sql);
        return $query;
    }
    public function list_sanpham()
    {
        $sql = "SELECT * FROM product";
        $query = mysqli_query($this->conn, $sql);
        return $query;
    }
    public function DeleteProduct($idsp)
    {
        $sql = "DELETE FROM product WHERE `idsp` = $idsp";
        $query = mysqli_query($this->conn, $sql);
        return $query;
    }
    public function capnhat_sp($idsp)
    {
        $sql = "SELECT * FROM product WHERE `idsp` = $idsp";
        $query = mysqli_query($this->conn, $sql);
        return $query;
    }
    public function check_capnhat($tensp, $mota, $gia, $size, $mausac, $xuatxu, $idsp, $target_file)
    {
        $sql = "UPDATE `product` SET tensp = '$tensp', mota = '$mota',gia = '$gia', size = '$size' , mausac = '$mausac', xuatxu = '$xuatxu', hinhanh = '$target_file' WHERE idsp = $idsp ";
        $query = mysqli_query($this->conn, $sql);
        return $query;
    }
    public function check_hinhanh($tensp, $thanhphan, $gia, $idsp)
    {
        $sql = "UPDATE `product` SET tensp = '$tensp', thanhphan = '$thanhphan',gia = '$gia' WHERE idsp = $idsp ";
        $query = mysqli_query($this->conn, $sql);
        return $query;
    }
    public function loai_sp()
    {
        $sql = "SELECT * FROM productpro_type";
        $query = mysqli_query($this->conn, $sql);
        return $query;
    }
    public function them_sp($tensp, $gia, $target_file, $mota, $mausac, $size, $xuatxu, $id_loai)
    {
        $sql = "insert into product(tensp ,gia,hinhanh,mota, mausac, size, xuatxu,id_loai) 
        values('$tensp','$gia','$target_file' , '$mota' , '$mausac', '$size', '$xuatxu' ,'$id_loai')";
        $query = mysqli_query($this->conn, $sql);
        return $query;
    }
    public function them_danhmuc($danhmuc)
    {
        $sql = "insert into productpro_type(tenloai) values ('$danhmuc')";
        $query = mysqli_query($this->conn, $sql);
        return $query;
    }
    public function editDanhmuc($id_loai)
    {
        $sql = "SELECT * FROM productpro_type WHERE `id_loai` = $id_loai";
        $query = mysqli_query($this->conn, $sql);
        return $query;
    }
    public function check_editDanhmuc($tenloai, $id_loai)
    {
        $sql = "UPDATE `productpro_type` SET tenloai = '$tenloai' WHERE id_loai = $id_loai ";
        $query = mysqli_query($this->conn, $sql);
        return $query;
    }
    public function Deletecategory($id_loai)
    {
        $sql = "SELECT COUNT(*) AS count FROM product WHERE id_loai = $id_loai";
        $result = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $count = $row['count'];

        if ($count > 0) {
            echo "Danh mục này đang có sản phẩm, không thể xóa.";
        } else {
            // Xóa danh mục
            $sql = "DELETE FROM productpro_type WHERE id_loai = $id_loai";
            mysqli_query($this->conn, $sql);
            echo "Danh mục đã được xóa thành công.";
        }
    }
    public function capnhatcategory($id_loai)
    {
        $sql = "SELECT * FROM productpro_type WHERE `id_loai` = $id_loai";
        $query = mysqli_query($this->conn, $sql);
        return $query;
    }
    public function list_donhang()
    {
        $sql = "SELECT * FROM giaodich";
        $query = mysqli_query($this->conn, $sql);
        return $query;
    }
    public function admin_search($search)
    {
        $sql = "SELECT * FROM product WHERE tensp LIKE '%$search%'";
        $query = mysqli_query($this->conn, $sql);
        return $query;
    }
}
