<?php
    require("connectSQL.php");
     if (isset($_POST['btnLuu'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $ngaysinh = $_POST['ngaysinh'];
        $quequan = $_POST['quequan'];

        $sql = "insert into sinh_vien values('$id','$name','$ngaysinh','$quequan')";
        thucthi($sql);
        header("location: index.php");
        // die();
    }
?>


<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Thêm mới sinh viên</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">

        

        <!-- jQuery library -->
        <script src="js/bootstrap.min.js"></script>    
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/popper.min.js"></script>
    </head>

 

    <body>
        <form method="post">
            <div class="container">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h2 class="text-center">THÔNG TIN SINH VIÊN</h2>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="usr">Mã sinh viên:</label>
                            <input required="true" type="text" class="form-control" name="id" >
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Họ và tên:</label>
                            <input required="true" type="text" class="form-control" name="name" >
                        </div>

                        <div class="form-group">
                            <label for="birthday">Ngày sinh:</label>
                            <input type="date" class="form-control" id="birthday" name="ngaysinh" >
                        </div>
                        
                        <div class="form-group">
                            <label for="confirmation_pwd">Địa chỉ:</label>
                            <input required="true" type="text" class="form-control" name="quequan" >
                        </div>
                        
                        <button class="btn btn-success" name="btnLuu">Lưu</button>
                        
                    </div>
                </div>
            </div>
        </form>    
    </body>
</html>