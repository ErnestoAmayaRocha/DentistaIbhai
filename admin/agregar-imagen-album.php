<?php

include('./db/session-validate.php');
include '../db/config.php';

$id_album = isset($_GET['id']) ? $_GET['id'] : '';

if ($id_album == '') {
    header('Location: Ortodoncia.php');
}

$album = $db->prepare("SELECT *, pacientes.nombre AS nameP, album.nombre AS nameAl FROM album INNER JOIN pacientes ON album.fk_paciente = pacientes.id WHERE id_album = :id");
$album->bindParam(':id', $id_album);
$album->execute();
$album = $album->fetchAll(PDO::FETCH_ASSOC);

$images = $db->prepare("SELECT * FROM album_imagen WHERE fk_album = :id");
$images->bindParam(':id', $id_album);
$images->execute();
$images = $images->fetchAll(PDO::FETCH_ASSOC);

$i = 0;

?>


<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="../assets/img/logo_DMSP.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/" />

    <title>IBHAI</title>

    <link href="./assets/css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <?php include './components/sidebar.php' ?>

        <div class="main">

            <?php include './components/navbar.php' ?>

            <main class="content">
                <div class="container-fluid p-0">

                    <h1 class="h1 mb-3 fw-bolder">Editar álbum <?php echo $album[0]['nameAl'] ?></h1>

                    <div class="row">

                        <div class="card">
                            <div class="card flex-fill">
                                <div class="card-header row d-flex pt-4 border border-bottom border-1">
                                    <div class="col-md-6">
                                        <h5 class="card-title mb-0">Álbum de <?php echo $album[0]['nameP'] ?></h5>
                                    </div>
                                    <div class="col-md-6 row d-flex justify-content-end">
                                        <a class="btn btn-secondary col-md-3 mx-2" href="Ortodoncia.php">Regresar</a>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="container">
                                        <form action="./db/album-agregar-foto.php" method="POST" enctype="multipart/form-data">
                                            <div class="row d-flex justify-content-center border-2 border-bottom">
                                                <div class="col-md-6">
                                                    <div class="input-group mb-3">
                                                        <input type="file" id="archivo" name="archivo" class="form-control" required>
                                                        <button class="btn btn-primary" type="submit" id="button-addon2">Añadir Imagen</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" id="fk" class="form-control" value="<?php echo $id_album ?>" name="fk" required>
                                            <input type="hidden" id="path" class="form-control" value="<?php echo $album[0]['path_name'] ?>" name="path" required>
                                        </form>

                                        <div class="row d-flex justify-content-around py-5 text-center">

                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Imagen</th>
                                                        <th scope="col">Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php

                                                    foreach ($images as $img) {
                                                        $i++;
                                                    ?>
                                                        <tr>
                                                            <th scope="row"><?php echo $i ?></th>
                                                            <td> <img src="<?php echo $img['path'] ?>" class="img-fluid" width="300"></td>
                                                            <td> <button class="btn btn-sm btn-danger" onclick="deleteImg(<?php echo $img['id_imagen'] ?>)">Eliminar</button> </td>
                                                        </tr>

                                                    <?php } ?>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </main>

        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="./assets/js/app.js"></script>
    <?php include '../components/swal.php' ?>


    <script>
        const deleteImg = (id) => {
            $.get("db/album-eliminar-foto.php", {
                id
            }, function(data) {
                Swal.fire(
                    '',
                    '',
                    data
                )
                setTimeout(function() {
                    window.location.reload();
                }, 2000);

            });
        }
    </script>


</body>

</html>