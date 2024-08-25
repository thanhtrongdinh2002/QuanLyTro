<?php
if (session_status() === PHP_SESSION_NONE)
    session_start();

class Home extends Controller
{
    public $show2;

    public function __construct()
    {
        $this->show2 = $this->model("LoginModel");
    }

    public function About()
    {
        $this->view("master2", [
            "Page" => "About",

        ]);
    }
    public function ShowRegister()
    {
        //View
        $this->view("master2", [
            "Page" => "register",

        ]);
    }
    public function ShowLogin()
    {
        //View
        $this->view("master2", [
            "Page" => "login",

        ]);
    }


    public function login()
    {
        if (isset($_POST["login"])) {
            $username = $_POST["username"];
            $pass = $_POST["pass"];
            if ($username == "" or $pass == "") {
                $not = "Tài khoản hoặc mật khẩu không được để trống";
            } else {
                $re = $this->show2->HandleLogin($username, $pass);
                if (mysqli_num_rows($re) > 0) {
                    $row = mysqli_fetch_array($re);
                    if (!isset($_COOKIE['iduser'])) {
                        $iduser = $row['IDUser'];
                        setcookie('iduser', $iduser, time() + (86400 * 1), "/");
                    } else {
                        $iduser = $_COOKIE["iduser"];
                    }
                    $_SESSION["Role"] = $row['Role'];
                    if ($row["Role"] == 0) {
                        $re = $this->show2->getID($iduser);
                        if (mysqli_num_rows($re) > 0) {
                            $row = mysqli_fetch_array($re);
                            if (isset($row["IDChuTro"])) {
                                $idchutro = $row["IDChuTro"];
                                setcookie('idchutro', $idchutro, time() + (86400 * 1), '/');
                                $result = $this->show2->getInfor($idchutro);
                                return $this->view("master1", [
                                    "Page" => "TrangChu",
                                    "data" => $result
                                ]);
                            } else {
                                return $this->view("master1", [
                                    "Page" => "main_admin",
                                ]);
                            }
                        }
                    } elseif ($row["Role"] == 1) {
                        header("Location:../");
                    }
                } else {
                    $not = "Tài khoản hoặc mật khẩu không chính xác";
                }
            }
        }
        if (isset($not)) {
            return $this->view("master2", [
                "Page" => "login",
                "not" => $not,
            ]);
        } else {
            return $this->view("master2", [
                "Page" => "login",
            ]);
        }
    }
    public function register()
    {
        if (isset($_POST["register"])) {
            $username = $_POST["username"];
            $pass = $_POST["pass"];
            if ($username == "" or $pass == "") {
                $not = "Tài khoản hoặc mật khẩu không được để trống";
                return $this->view("master2", [
                    "Page" => "register",
                    "not" => $not,
                ]);
            } else {
                $re = $this->show2->HandleLogin($username, $pass);
                if (mysqli_fetch_row($re) > 0) {
                    $not = "Tài khoản đã tồn tại";
                    return $this->view("master2", [
                        "Page" => "register",
                        "not" => $not,
                    ]);
                } else {

                    $iduser = rand(0, 999999999);
                    $role = $_POST["role"];
                    $this->show2->HandleRegister($iduser, $username, $pass, $role);
                    return $this->view("master2", [
                        "Page" => "login"
                    ]);
                }
            }
        }
    }
    public function loguot()
    {
        setcookie("iduser", "", time() - (86400 * 30), "/");
        setcookie("idchutro", "", time() - (86400 * 30), "/");
        header("Location:../");
    }
    // public function check_verify_otp()
    // {
    //     $username = $_SESSION["username"];
    //     $pass = $_SESSION["pass"];
    //     return $this->view("master2", [
    //         "Page" => "check_verify_otp",
    //         "data" => $username,
    //         "pass" => $pass
    //     ]);
    // }
    // public function register_otp()
    // {
    //     $username = $_SESSION["username"];
    //     $pass = $_SESSION["pass"];
    //     if (!isset($_SESSION)) {
    //         session_start();
    //     }
    //     // Kiểm tra xem người dùng đã gửi biểu mẫu chưa
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         // Lấy số OTP từ người dùng nhập vào
    //         $userOTP = $_POST['otp'];

    //         // Lấy số OTP đã lưu trong session
    //         $storedOTP = $_SESSION['otp'];

    //         // Kiểm tra xem số OTP nhập vào có khớp với số OTP đã lưu không
    //         if ($userOTP == $storedOTP) {
    //             // Số OTP khớp, xử lý logic tiếp theo tại đây
    //             $this->show2->HandleRegister($username, $pass);
    //             unset($_SESSION['otp']);
    //             header("Location:../");
    //         } else {
    //             return $this->view("master2", [
    //                 "Page" => "check_verify_otp",
    //                 "data" => $username,
    //                 "pass" => $pass,
    //                 "mess" => 'Số OTP không hợp lệ!',
    //             ]);
    //         }
    //     }
    // }

}
