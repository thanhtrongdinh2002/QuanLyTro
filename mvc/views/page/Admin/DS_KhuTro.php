<?php
if (isset($data["data"])) {
    while ($row = mysqli_fetch_array($data["data"])) {
?>
        <div><?php echo $row["TenKhuTro"] ?></div>
        <div><?php echo $row["DiaChi"] ?></div>
        <div><?php echo $row["SoPhong"] ?></div>
        <div><?php echo $row["KinhDo"] ?></div>
        <div><?php echo $row["ViDo"] ?></div>
<?php
    }
}
?>
<div><a href="./Nhap_KhuTro">Thêm khu trọ</a></div>