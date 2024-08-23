<h1 class="name_form">ĐĂNG KÝ</h1>
<form class="form-login" action="./register" method="POST">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Username</label>
        <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <?php
    if (isset($data["not"])) {
        ?>
            <script>
                alert('<?php echo $data["not"]; ?>');
            </script>
        <?php
        }

    ?>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" name="pass" id="exampleInputPassword1">
    </div>
    <select name="role" required>
        <option value="0">Chủ trọ</option>
        <option value="1">Thuê trọ</option>
    </select>
    <button style="width:100%" type="submit" name="register" class="btn btn-primary">ĐĂNG KÝ</button>
    <a style="display: flex;
    justify-content: center;
    margin-top: 20px;" href="./login" class="btn btn-primary">ĐĂNG NHẬP</a>
</form>