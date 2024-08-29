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
            $idchutro = $_COOKIE["idchutro"];
            $this->show->Them_KhuTro($idkhutro, $tenkhutro, $diachi, $kinhdo, $vido, $idchutro);
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
            var_dump($row);
            var_dump($idloaiphong);
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
}























//     public function check_capnhat()
//     {
//         if (isset($_POST["update"])) {
//             $idsp = $_POST["idsp"];
//             $tensp = $_POST["tensp"];
//             $mota = $_POST["mota"];
//             $gia = $_POST["gia"];
//             $size = $_POST["size"];
//             $mausac = $_POST["mausac"];
//             $xuatxu = $_POST["xuatxu"];

//             $target_file = "public/images/" . basename($_FILES["hinhanh"]["name"]);
//             $uploadOk = 1;
//             $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

//             // Check if image file is a actual image or fake image
//             // $check = getimagesize($_FILES["hinhanh"]["tmp_name"]);
//             // if ($check !== false) {
//             //     $uploadOk = 1;
//             // } else {
//             //     $uploadOk = 0;
//             // }
//             // Check if file already exists
//             if (file_exists($target_file)) {
//                 $uploadOk = 0;
//             }

//             // Allow certain file formats
//             if (
//                 $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
//                 && $imageFileType != "gif"
//             ) {
//                 $uploadOk = 0;
//             }

//             // Check if $uploadOk is set to 0 by an error
//             if ($uploadOk == 0) {
//                 $not = "Sorry, your file was not uploaded.";
//                 // if everything is ok, try to upload file
//             } else {
//                 move_uploaded_file($_FILES["hinhanh"]["tmp_name"], $target_file);
//             }
//             if ($target_file != "") {
//                 $target_file = basename($_FILES["hinhanh"]["name"]);
//                 $this->show3->check_capnhat($tensp, $mota, $gia, $size, $mausac, $xuatxu, $idsp, $target_file);
//             } else {
//                 $this->show3->check_hinhanh($tensp, $mota, $gia, $size, $mausac, $xuatxu, $idsp);
//             }

//             header("Location:./list_sanppham");
//         }
//     }
//     public function nhap_sp()
//     {
//         $re = $this->show3->loai_sp();
//         $this->view("master3", [
//             "Page" => "them_sp",
//             "data" => $re,
//         ]);
//     }

//     public function them_sp()
//     {
//         if (isset($_POST["themsp"])) {
//             $tensp = $_POST["tensp"];
//             $gia = $_POST["gia"];
//             $mota = $_POST["mota"];
//             $mausac = $_POST["mausac"];
//             $size = $_POST["size"];
//             $xuatxu = $_POST["xuatxu"];
//             $id_loai = $_POST["id_loai"];

//             $target_dir = "public/images/";
//             $target_file = $target_dir . basename($_FILES["hinhanh"]["name"]);
//             if (move_uploaded_file($_FILES["hinhanh"]["tmp_name"], $target_file)) {
//                 $target_file = basename($_FILES["hinhanh"]["name"]);
//                 $this->show3->them_sp($tensp, $gia, $target_file, $mota, $mausac, $size, $xuatxu, $id_loai);
//             } else {
//                 $not = "Sorry, there was an error uploading your file.";
//             }
//             header("Location:./AdminShow");
//         }
//     }

//     public function list_danhmuc()
//     {
//         $re = $this->show3->loai_sp();
//         $this->view("master3", [
//             "Page" => "list_danhmuc",
//             "data" => $re,
//         ]);
//     }
//     public function nhap_danhmuc()
//     {
//         $this->view("master3", [
//             "Page" => "them_danhmuc",
//         ]);
//     }
//     public function them_danhmuc()
//     {
//         if (isset($_POST["them_danhmuc"])) {
//             $danhmuc = $_POST["danhmuc"];
//             $this->show3->them_danhmuc($danhmuc);
//             header("Location:./list_danhmuc");
//         }
//     }
//     public function editDanhmuc()
//     {
//         if (isset($_GET["id_loai"])) {
//             $id_loai = $_GET["id_loai"];
//         }
//         $re = $this->show3->editDanhmuc($id_loai);
//         $this->view("master3", [
//             "Page" => "edit-danhmuc",
//             "data" => $re,
//         ]);
//     }
//     public function check_editDanhmuc()
//     {
//         if (isset($_POST["update"])) {
//             $id_loai = $_POST["id_loai"];
//             $tenloai = $_POST["tenloai"];
//             $this->show3->check_editDanhmuc($tenloai, $id_loai);
//             header("Location:./list_danhmuc");
//         }
//     }
//     public function Deletecategory()
//     {
//         if (isset($_GET["id_loai"])) {
//             $id_loai = $_GET["id_loai"];
//         }
//         $this->show3->Deletecategory($id_loai);
//         header("Location:./list_danhmuc");
//     }
//     public function capnhatcategory()
//     {
//         if (isset($_GET["id_loai"])) {
//             $id_loai = $_GET["id_loai"];
//         }
//         $re = $this->show3->capnhatcategory($id_loai);
//         $this->view("master3", [
//             "Page" => "edit-danhmuc",
//             "data" => $re,
//         ]);
//     }
//     public function list_donhang()
//     {
//         $re = $this->show3->list_donhang();
//         $this->view("master3", [
//             "Page" => "list_donhang",
//             "data" => $re,
//         ]);
//     }
//     public function search()
//     {
//         if (isset($_POST["search"])) {
//             $search = $_POST["search"];
//             $re = $this->show3->admin_search($search);
//             if ($re = '') {
//                 $not = "Không tìm thâý sản phẩm phù hợp";
//                 $this->view("master3", [
//                     "Page" => "search",
//                     "not" => $not,
//                 ]);
//             } else {
//                 $not = "tìm thâý sản phẩm phù hợp";
//                 $this->view("master3", [
//                     "Page" => "search",
//                     "not" => $not,
//                 ]);
//             }
//         }
//     }
// }
