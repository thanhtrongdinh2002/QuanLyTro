<link rel="stylesheet" href="../public/css/vnpay.css">
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Tạo mới đơn hàng</title>
        <!-- Bootstrap core CSS -->
        <link href="/vnpay_php/assets/bootstrap.min.css" rel="stylesheet"/>
        <!-- Custom styles for this template -->
        <link href="/vnpay_php/assets/jumbotron-narrow.css" rel="stylesheet">  
        <script src="/vnpay_php/assets/jquery-1.11.3.min.js"></script>
    </head>

    <body>
    <div class="container">
           <div class="header clearfix">

                <h3 class="text-muted">VNPAY DEMO</h3>
            </div>
            <?php
            if(isset($_POST["btn_thanhtoan"])){
                $thanhtien = $_POST["thanhtien"];
            }
            ?>
                <form action="../vnpay_php/vnpay_pay.php" method="POST" class="form-group">
                    <input type="hidden" name="thanhtien" value="<?php echo $thanhtien?>">
                    <button name="gd">Giao dịch thanh toán</button><br>
                </form>
            <p>
                &nbsp;
            </p>
            <footer class="footer">
                   <p>&copy; VNPAY <?php echo date('Y')?></p>
            </footer>
        </div> 
        <script>
             function pay() {
              window.location.href = "/vnpay_php/vnpay_pay.php";
            }
            
        </script>
    </body>
</html>
