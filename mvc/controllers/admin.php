<?php
class admin extends Controller
{
    public $show;
    public $show2;

    public function __construct()
    {
        $this->show = $this->model("AdminModel");
        $this->show2 = $this->model("LoginModel");
    }
    public function AdminShow()
    {
        //View
        $this->view("master1", [
            "Page" => "main_admin",
        ]);
    }

    public function Add_Infor()
    {
        if (isset($_POST["infor"])) {
            if (isset($_POST["sdt"])) {
                $sdt = $_POST["sdt"];
                $re = $this->show->Check_Infor($sdt);
                if (mysqli_num_rows($re) > 0) {
                    $not = "Số điện thoại đã tồn tại";
                } else {
                    $iduser = $_COOKIE["iduser"];
                    $idchutro = rand(0, 999999999);
                    setcookie('idchutro', $idchutro, time() + (86400 * 1), '/');
                    $hoten = $_POST["hoten"];
                    $cccd = $_POST["cccd"];
                    $diachi = $_POST["diachi"];
                    $gioitinh = $_POST["gioitinh"];
                    $namsinh = $_POST["namsinh"];
                    $this->show->Add_Infor($idchutro, $hoten, $cccd, $diachi, $gioitinh, $namsinh, $sdt);
                    $this->show->ConnectID($idchutro, $iduser);
                }
            }
        }
        if (isset($not)) {
            return $this->view("master1", [
                "Page" => "main_admin",
                "not" => $not,
            ]);
        } else {
            $result = $this->show2->getInfor($idchutro);
            return $this->view("master1", [
                "Page" => "TrangChu",
                "data" => $result
            ]);
        }
    }

    public function DS_KhuTro()
    {
        if (isset($_COOKIE["idchutro"])) {
            $idchutro = $_COOKIE["idchutro"];
            $result = $this->show->DS_KhuTro($idchutro);
            return $this->view("master1", [
                "Page" => "DS_KhuTro",
                "data" => $result
            ]);
        }
    }
    public function Nhap_KhuTro()
    {
        $this->view("master1", [
            "Page" => "Nhap_KhuTro",
        ]);
    }
    public function Them_KhuTro()
    {
        if (isset($_POST["TT_KhuTro"])) {
            $idkhutro = rand(0, 999999999);
            $tenkhutro = $_POST["TenKhuTro"];
            $diachi = $_POST["DiaChi"];
            $kinhdo = $_POST["KinhDo"];
            $vido = $_POST["ViDo"];
            $tinh = $_POST["tinh"];
            $quan = $_POST["quan"];
            $phuong = $_POST["phuong"];
            $idchutro = $_COOKIE["idchutro"];
            $this->show->Them_KhuTro($idkhutro, $tenkhutro, $diachi, $kinhdo, $vido, $idchutro, $tinh, $quan, $phuong);
            $result = $this->show->DS_KhuTro($idchutro);
            $this->view("master1", [
                "Page" => "DS_KhuTro",
                "data" => $result
            ]);
        }
    }
    public function DS_Phong()
    {
        $idchutro = $_COOKIE["idchutro"];
        $khuTroList = $this->show->DS_KhuTro($idchutro);

        $khuTroIds = array();

        foreach ($khuTroList as $khuTro) {
            $khuTroIds[] = $khuTro['IDKhuTro'];
        }
        foreach ($khuTroIds as $khuTroId) {
            $phongList = $this->show->DS_Phong($khuTroId);
        }
        return $this->view("master1", [
            "Page" => "DS_Phong",
            "data" => $phongList
        ]);
    }
    public function Nhap_Phong()
    {
        $idchutro = $_COOKIE["idchutro"];
        $result = $this->show->DS_KhuTro($idchutro);
        $this->view("master1", [
            "Page" => "Nhap_Phong",
            "data" => $result
        ]);
    }

    public function Them_Phong()
    {
        if (isset($_POST["TT_Phong"])) {
            $idlp = rand(0, 999999);
            $row = $this->show->Check_ID($idlp);
            if (mysqli_num_rows($row) > 0) {
                $idloaiphong = $idlp + rand(0, 999);
            } else {
                $idloaiphong = $idlp;
            }
            $tenloaiphong = $_POST["TenLoaiPhong"];
            $songuoi = $_POST["SoNguoi"];
            $dientich = $_POST["DienTich"];
            $giathue = $_POST["GiaThue"];
            $tinhtrang = $_POST["TinhTrang"];
            $STT = $_POST["STT"];
            $idkhutro = $_POST["IDKhuTro"];
            $idphong = rand(0, 999999);
            $this->show->Them_LoaiPhong($idloaiphong, $tenloaiphong, $songuoi, $dientich, $giathue);
            $this->show->Them_Phong($idphong, $idloaiphong, $tinhtrang, $STT, $idkhutro);
            $result = $this->show->DS_Phong();
            $this->view("master1", [
                "Page" => "DS_Phong",
                "data" => $result
            ]);
        }
    }

    public function Nhap_TruongDH()
    {
        return $this->view("master1", [
            "Page" => "Nhap_TruongDH",
        ]);
    }

    public function Them_TruongDH()
    {
        if (isset($_POST["TT_TruongDH"])) {
            $idtruong = rand(0, 999999999);
            $tentruong = $_POST["TenTruong"];
            $kinhdo = $_POST["KinhDo"];
            $vido = $_POST["ViDo"];
            $diachi = $_POST["DiaChi"];
            $tinh = $_POST["tinh"];
            $quan = $_POST["quan"];
            $phuong = $_POST["phuong"];

            $target_dir = "public/images/";
            $target_file = $target_dir . basename($_FILES["Icon"]["name"]);
            if (move_uploaded_file($_FILES["Icon"]["tmp_name"], $target_file)) {
                $target_file = basename($_FILES["Icon"]["name"]);
                $this->show->Them_TruongDH($idtruong, $tentruong, $kinhdo,  $vido, $diachi, $target_file, $tinh, $quan, $phuong);
                $result = $this->show->DS_TruongDH();
                return $this->view("master1", [
                    "Page" => "DS_TruongDH",
                    "data" => $result
                ]);
            } else {
                $not = "Sorry, there was an error uploading your file.";
            }
            header("Location:./AdminShow");
        }
    }
    public function DS_TruongDH()
    {
        $result = $this->show->DS_TruongDH();
        return $this->view("master1", [
            "Page" => "DS_TruongDH",
            "data" => $result
        ]);
    }
    public function KhoangCach()
    {
        $idchutro = $_COOKIE["idchutro"];
        $khutro = $this->show->DS_KhuTro($idchutro);
        $truongdh = $this->show->DS_TruongDH();
    }
    public function index()
    {
        return $this->view("master1", [
            "Page" => "index",
        ]);
    }
    
}
