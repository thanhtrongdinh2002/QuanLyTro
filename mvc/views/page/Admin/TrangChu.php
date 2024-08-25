<?php
if (isset($data["data"])) {
    while ($row = mysqli_fetch_array($data["data"])) {
?>
        <div><?php echo $row["HoTenCT"] ?></div>
        <div><?php echo $row["SDT"] ?></div>
        <div><?php echo $row["CCCD"] ?></div>
        <div><?php echo $row["DiaChi"] ?></div>
<?php
    }
}
?>
