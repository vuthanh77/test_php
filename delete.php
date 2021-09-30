<?php
    require("connectSQL.php");
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $sql = "delete from sinh_vien where id = '$id'";
        thucthi($sql);
        echo "Xóa thành công!";
    }
?>