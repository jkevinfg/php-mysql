<?php
    include('db.php');
    if(isset($_GET)){
        $id = $_GET['id'];
        $query = "delete from usuarios where id=$id";
        $result = mysqli_query($conn, $query);
        if(!$result) {
            echo 'error';
        }else {
            $_SESSION['message']='Cliente eliminado';
            $_SESSION['message_type'] = 'danger';
            Header('Location:index.php');
        }
    }
?>