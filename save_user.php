<?php
    include("db.php");
    if(isset($_POST['save_user'])) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $query = "insert into usuarios(name, phone, email) values ('$name','$phone','$email')";
        $result  = mysqli_query($conn,$query);
        $_SESSION['message'] = 'Cliente guardado';
        $_SESSION['message_type']= 'success';
        header("Location: index.php");
    }
?>