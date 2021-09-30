
<?php
    require("connectSQL.php");
     if (isset($_GET['id'])) {
        $id = $_GET['id'];
    
        $sql = "select * from sinh_vien where id = '$id'";
        $data = hienthi($sql);

        foreach ($data as $row) {
            $name = $row["name"];
            $ngaysinh = $row["ngaysinh"];
            $quequan = $row["quequan"];
        }
        
        if (isset($_POST['btnLuu'])) {
            $name = $_POST['name'];
            $ngaysinh = $_POST['ngaysinh'];
            $quequan = $_POST['quequan'];

            $sql = "update sinh_vien set name = '$name', ngaysinh = '$ngaysinh', quequan = '$quequan' where id = '$id'";
            thucthi($sql);
            header("location: index.php");
            die();
        }
    }
?>


<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Untitled Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <script src="js/bootstrap.min.js"></script>    
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
</head>

 

<body>
    <form method="post">
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="text-center">SỬA THÔNG TIN SINH VIÊN</h2>
                </div>

                <div class="panel-body">
                    <div class="form-group">
                        <label for="usr">Mã sinh viên:</label>
                        <input required="true" type="text" class="form-control" name="id" disabled value="<?php echo $id?>">
                    </div>

                    <div class="form-group">
                        <label for="email">Họ và tên:</label>
                        <input required="true" type="text" class="form-control" name="name" value="<?php echo $name?>">
                    </div>

                    <div class="form-group">
                        <label for="birthday">Ngày sinh:</label>
                        <input type="date" class="form-control" id="birthday" name="ngaysinh" value="<?php echo $ngaysinh?>">
                    </div>

                    <div class="form-group">
                        <label for="confirmation_pwd">Quê quán:</label>
                        <input required="true" type="text" class="form-control" name="quequan" value="<?php echo $quequan?>">
                    </div>
                    
                    <button class="btn btn-success" name="btnLuu">Lưu</button>
                    
                </div>
            </div>
        </div>
    </form>    
</body>
</html>