<?php
include("db.php");

$name = '';
$phone = '';
$email = '';

if  (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM usuarios WHERE id=$id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $name  = $row['name'];
        $phone = $row['phone'];
        $email = $row['email'];
    }
}

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $name= $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $query = "UPDATE usuarios set name = '$name', phone = '$phone', email = '$email' WHERE id=$id";
    mysqli_query($conn, $query);
    $_SESSION['message'] = 'Informacion actualizada';
    $_SESSION['message_type'] = 'warning';
    header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>

    <div class="container p-4">
        <div class="row">
            <div class="col col-md-4 mt-2">
                <div class="card " >
                    <div class="card-body">
                        <h5 class="card-title">Agregar Cliente</h5>
                        <form action="edit_user.php?id=<?php echo $_GET['id']; ?>" method="POST">
                            <div class="form-group">
                                <input name="name" type="text" class="mb-3 form-control" value="<?php echo $name; ?>" placeholder="Actualizar Nombre">
                            </div>
                            <div class="form-group">
                                <input name="phone" type="tel" class="mb-3 form-control" value="<?php echo $phone; ?>" placeholder="Actualizar Celular">
                            </div>
                            <div class="form-group">
                                <input name="email" type="email" class="mb-3 form-control" value="<?php echo $email; ?>" placeholder="Actualizar email">
                            </div>
                            <button class="btn-success" name="update">
                                Actualizar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col col-md-8 mt-2">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Celular</th>
                        <th scope="col">Email</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $query = 'select * from usuarios';
                    $users= mysqli_query( $conn , $query);
                    while ( $row = mysqli_fetch_array($users)) { ?>
                        <tr>
                            <td> <?php echo $row['id'] ?> </td>
                            <td> <?php echo $row['name'] ?> </td>
                            <td> <?php echo $row['phone'] ?> </td>
                            <td> <?php echo $row['email'] ?> </td>
                            <td>
                                <a class="btn btn-warning" href="edit_user.php?id=<?php echo $row['id']?>">Editar</a>
                                <a class="btn btn-danger" href="delete_user.php?id=<?php echo $row['id']?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>

            </div>
        </div>

    </div>
<?php include('includes/footer.php'); ?>