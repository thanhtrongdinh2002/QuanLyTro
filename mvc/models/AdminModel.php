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
    public function DS_KhuTro($idchutro)
    {
        $sql = "SELECT * FROM khutro WHERE `IDChuTro` = '$idchutro'";
        $query = mysqli_query($this->conn, $sql);
        return $query;
    }
    public function Them_KhuTro($idkhutro, $tenkhutro, $diachi, $kinhdo, $vido, $idchutro, $tinh, $quan, $phuong)
    {
        $sql = "insert into `khutro` (IDKhuTro, TenKhuTro, DiaChi, KinhDo, ViDo, IDChuTro, SoPhong, TinhThanh, QuanHuyen, PhuongXa) values ('$idkhutro', '$tenkhutro', '$diachi', '$kinhdo', '$vido', '$idchutro', 0,'$tinh', '$quan', '$phuong')";
        $query = mysqli_query($this->conn, $sql);
        return $query;
    }
    public function DS_Phong()
    {
        $sql = "SELECT * FROM phong";
        $query = mysqli_query($this->conn, $sql);
        return $query;
    }
    public function Them_LoaiPhong($idloaiphong, $tenloaiphong, $songuoi, $dientich, $giathue)
    {
        $sql = "INSERT INTO `loaiphong`(`IDLoaiPhong`, `TenLoaiPhong`, `SoNguoi`, `DienTich`, `GiaThue`) VALUES ('$idloaiphong', '$tenloaiphong', '$songuoi', '$dientich','$giathue')";
        $query = mysqli_query($this->conn, $sql);
        return $query;
    }
    public function Them_Phong($idphong, $idloaiphong, $tinhtrang, $STT, $idkhutro)
    {
        $sql = "insert into `phong` (IDPhong, IDLoaiPhong, STT, TinhTrang, IDKhuTro) values ('$idphong', '$idloaiphong', '$STT', '$tinhtrang', '$idkhutro')";
        $query = mysqli_query($this->conn, $sql);
        return $query;
    }
    public function Check_ID($idlp)
    {
        $sql = "SELECT * FROM loaiphong WHERE `IDLoaiPhong` = '$idlp'";
        $query = mysqli_query($this->conn, $sql);
        return $query;
    }
    public function Them_TruongDH($idtruong, $tentruong, $kinhdo,  $vido, $diachi, $target_file, $tinh, $quan, $phuong)
    {
        $sql = "insert into `truongdh_cd` (IDTruong, TenTruong, KinhDo, ViDo, DiaChi, Icon, TinhThanh, QuanHuyen, PhuongXa) values ('$idtruong', '$tentruong', '$kinhdo', '$vido', '$diachi', '$target_file', '$tinh', '$quan', '$phuong')";
        $query = mysqli_query($this->conn, $sql);
        return $query;
    }
    public function DS_TruongDH()
    {
        $sql = "SELECT * FROM truongdh_cd";
        $query = mysqli_query($this->conn, $sql);
        return $query;
    }
    
    
}
