<?php
if (isset($data["data"])) {
    while ($row = mysqli_fetch_array($data["data"])) {
?>
        <div><?php echo $row["TenTruong"] ?></div>
        <img src="../public/images/<?php echo $row["Icon"] ?>" alt="">
        <div><?php echo $row["DiaChi"] ?></div>
        <div><?php echo $row["KinhDo"] ?></div>
        <div><?php echo $row["ViDo"] ?></div>
<?php
    }
}
?>
<div><a href="./Nhap_TruongDH">Thêm Trường</a></div>