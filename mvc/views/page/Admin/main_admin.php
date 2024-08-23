<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['Role'])) {
    if ($_SESSION['Role'] != "0") {
        header("location:../");
    }
} else {
    header("location:../");
}
?>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .container {
        max-width: 500px;
        margin: 20px auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    label,
    input,
    select {
        display: block;
        margin-bottom: 10px;
    }

    input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        padding: 8px 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
</style>

<?php
if (isset($data["not"])) {
?>
    <script>
        alert('<?php echo $data["not"]; ?>');
    </script>
<?php
}
?>
<div class="container">
    <h2>Thông Tin Người Dùng</h2>
    <form action="../admin/Add_Infor" method="post">
        <label for="hoten">Họ và tên:</label>
        <input type="text" id="hoten" name="hoten" required>

        <label for="sdt">Số điện thoại:</label>
        <input type="tel" id="sdt" name="sdt" pattern="0[0-9]{9,10}" required>

        <label for="hoten">Năm sinh:</label>
        <input type="date" id="namsinh" name="namsinh">

        <label for="cccd">Số CCCD:</label>
        <input type="text" id="cccd" name="cccd" pattern="[0-9]{12}" required>

        <label for="diachi">Địa chỉ:</label>
        <input type="text" id="diachi" name="diachi" required>

        <label for="gioitinh">Giới tính:</label>
        <select id="gioitinh" name="gioitinh" required>
            <option value="0">Nam</option>
            <option value="1">Nữ</option>
        </select>

        <input name="infor" type="submit" value="Submit">
    </form>
</div>