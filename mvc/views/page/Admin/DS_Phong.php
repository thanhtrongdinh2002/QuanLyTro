<?php
if (isset($data["data"])) {
    while ($row = mysqli_fetch_array($data["data"])) {
?>
        <div><?php echo $row["STT"] ?></div>
        <div><?php echo $row["TinhTrang"] ?></div>
<?php
    }
}
?>
<div><a href="./Nhap_Phong">Thêm phòng</a></div>