<?php include("db.php") ?>
<?php include("includes/header.php")?>
    <div class="container p-4">
        <div class="row">
            <?php if(isset($_SESSION['message']))  { ?>
                <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                    <strong><?=$_SESSION['message']?> </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php  session_unset() } ?>
            <div class="col col-md-4 mt-2">
                <div class="card " >
                    <div class="card-body">
                        <h5 class="card-title">Agregar Cliente</h5>
                        <form action="save_user.php" method="POST">
                            <input name="name" class="mb-3 form-control" type="text" placeholder="nombre">
                            <input name="phone" class="mb-3 form-control" type="tel" placeholder="phone">
                            <input name="email" class="mb-3 form-control" type="email" placeholder="email">
                            <button  type="submit" class="btn btn-success" name="save_user">Guardar</button>
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
<?php include("includes/footer.php")?>


