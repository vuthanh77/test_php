<?php
    require("connectSQL.php");
    $sql="Select * From sinh_vien";
    $data=hienthi($sql);

    $search="";
    $load=isset($_POST['btnSearch']);
    if($load){
            $search=$_POST['name'];
            $sql='SELECT id,name,ngaysinh,quequan FROM sinh_vien WHERE name like "%'.$search.'%" or quequan like "%'.$search.'%"';
            $data=hienthi($sql);
    }
    else{
            $sql='SELECT id,name,ngaysinh,quequan FROM sinh_vien';
            $data=hienthi($sql);
        }

       
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sinh viên</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="js/jquery-3.4.1.min.js"></script>
</head>
<body>

    <div class="container">

        <form method="post" action="">   
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Nhập họ tên hoặc địa chỉ cần tìm kiếm" name="name" value="<?php echo $search ?>" >
                <div class="input-group-append">
                    <button class="btn btn-secondary" type="submit" name="btnSearch">
                        <i ><img src="/KiemTra_d21m09/search-btn.jpg" width=40px heigth=40px></i>
                    </button>
            </div>

        </form>  
          

        <table class="tabl table-bordered">
            <thead>
                <th>STT</th>
                <th>Mã sinh viên</th>
                <th>Họ và tên</th>
                <th>Ngày sinh</th>
                <th>Quê quán</th>
            </thead>
            <tbody>
                <?php
                    $i=1;
                    foreach($data as $row){
                        echo "<tr><td>".$i++."</td>
                        <td>".$row['id']."</td>
                        <td>".$row['name']."</td>
                        <td>".$row['ngaysinh']."</td>
                        <td>".$row['quequan']."</td>
                        ";

                        echo '<td><input class="btn btn-secondary" type="submit" name="btbSua"
                        value="Sửa" onclick=\'window.open("update.php?id='.$row['id'].'","_seft")\'></td>';
                        echo '<td><input class="btn btn-danger" type="submit" name="btbSua"
                        value="Xóa" onclick="deleteSV('.$row['id'].')"></td>';
                    }
                    
                ?>
            </tbody>
        </table>
        <div class="btn btn-success" type="submit" name="btnThemmoi" value="Thêm mới sinh viên" onclick="window.open('insert.php','_seft')"> Thêm </div>
    </div>
    
</body>

<script>
        function deleteSV(id){
            tl = confirm("Bạn có chắc chắn muốn xóa không?")
            if (!tl) {
                return
            }
            $.post('delete.php',{'id':id},
                  function(data){
                alert(data)
                location.reload()
            })
        }
    </script>
</html>