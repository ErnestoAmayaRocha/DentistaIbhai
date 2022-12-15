<?php

include('./db/session-validate.php');

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

    <title>Adminisración | DMSP</title>

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

                    <h1 class="h1 mb-3 fw-bolder">Agregar Fraccionamiento</h1>

                    <div class="row">

                        <div class="card">
                            <div class="card flex-fill">
                                <div class="card-header row d-flex pt-4 border border-bottom border-1">
                                    <div class="col-md-6">
                                        <h5 class="card-title mb-0">Registra la Información de un fraccionamiento </h5>
                                    </div>
                                    <div class="col-md-6 row d-flex justify-content-end">
                                        <a class="btn btn-secondary col-md-3" href="bitacora.php">Regresar</a>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="container">
                                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                                            <div class="row d-flex justify-content-center">
                                                <div class="border-bottom border-1 border-primary my-3">
                                                    <h4 class="fw-bolder">Información del Fraccionamiento</h4>
                                                </div>
                                                <div class="form-group col-md-6 my-3">
                                                    <label for="fracc_nombre" class="form-label fw-bold">Nombre *</label>
                                                    <input type="text" class="form-control" name="fracc_nombre" placeholder="Nombre del Fraccionamiento" required />
                                                </div>
                                                <div class="form-group col-md-6 my-3">
                                                    <label for="fracc_direccion" class="form-label fw-bold">Dirección *</label>
                                                    <input type="text" class="form-control" name="fracc_direccion" placeholder="Dirección del Fraccionamiento" required />
                                                </div>
                                                <div class="form-group col-md-6 my-3">
                                                    <label for="fracc_correo" class="form-label fw-bold">Correo *</label>
                                                    <input type="email" class="form-control" name="fracc_correo" placeholder="Ej. correo@ejemplo.com" required />
                                                </div>
                                                <div class="form-group col-md-6 my-3">
                                                    <label for="fracc_telefono" class="form-label fw-bold">Teléfono</label>
                                                    <input type="tel" class="form-control" name="fracc_telefono" placeholder="Ej. 000-000-000" maxlength="12" required />
                                                </div>
                                                <div class="form-group col-md-6 my-3">
                                                    <label for="fracc_celular" class="form-label fw-bold">Celular</label>
                                                    <input type="tel" class="form-control" name="fracc_celular" placeholder="Ej. 000-000-000" maxlength="12" />
                                                </div>
                                                <div class="form-group col-md-6 my-3">
                                                    <label for="fracc_url" class="form-label fw-bold">URL Sitio del fraccionamiento *</label>
                                                    <input type="text" class="form-control" name="fracc_url" placeholder="Ej. fraccionamiento.com" />
                                                </div>

                                                <div class="border-bottom border-1 border-primary my-3">
                                                    <h4 class="fw-bolder">Mesa Directiva</h4>
                                                </div>

                                                <div class="form-group col-md-6 my-3">
                                                    <label for="presidente_nombre" class="form-label fw-bold">Presidente</label>
                                                    <input type="text" class="form-control" name="presidente_nombre" placeholder="Nombre del Presidente" required />
                                                </div>
                                                <div class="form-group col-md-6 my-3">
                                                    <label for="presidente_telefono" class="form-label fw-bold">Teléfono</label>
                                                    <input type="tel" class="form-control" name="presidente_telefono" placeholder="Ej. 000-000-000" maxlength="12" />
                                                </div>
                                                <div class="form-group col-md-6 my-3">
                                                    <label for="secretario_nombre" class="form-label fw-bold">Secretario</label>
                                                    <input type="text" class="form-control" name="secretario_nombre" placeholder="Nombre del Secretario" required />
                                                </div>
                                                <div class="form-group col-md-6 my-3">
                                                    <label for="secretario_telefono" class="form-label fw-bold">Teléfono</label>
                                                    <input type="tel" class="form-control" name="secretario_telefono" placeholder="Ej. 000-000-000" maxlength="12" />
                                                </div>
                                                <div class="form-group col-md-6 my-3">
                                                    <label for="tesorero_nombre" class="form-label fw-bold">Tesorero</label>
                                                    <input type="text" class="form-control" name="tesorero_nombre" placeholder="Nombre del Tesorero" required />
                                                </div>
                                                <div class="form-group col-md-6 my-3">
                                                    <label for="tesorero_telefono" class="form-label fw-bold">Teléfono</label>
                                                    <input type="tel" class="form-control" name="tesorero_telefono" placeholder="Ej. 000-000-000" maxlength="12" />
                                                </div>
                                                <div class="form-group col-md-6 my-3">
                                                    <label for="admin_nombre" class="form-label fw-bold">Administrador</label>
                                                    <input type="text" class="form-control" name="admin_nombre" placeholder="Nombre del Administrador" required />
                                                </div>
                                                <div class="form-group col-md-6 my-3">
                                                    <label for="admin_telefono" class="form-label fw-bold">Teléfono</label>
                                                    <input type="tel" class="form-control" name="admin_telefono" placeholder="Ej. 000-000-000" maxlength="12" />
                                                </div>

                                                <div class="border-bottom border-1 border-primary my-3">
                                                    <h4 class="fw-bolder">Guardias</h4>
                                                </div>

                                                <div class="form-group col-md-6 my-3">
                                                    <label for="guardias" class="form-label fw-bold">Numero de Guardias</label>
                                                    <input type="number" id="num_guardias" class="form-control" name="num_guardias" oninput="addForms()" maxlength="2" required />
                                                </div>

                                                <div id="guardias-form" class="row d-flex"></div>

                                                <div class="col-md-6 pt-3">
                                                    <button class="btn btn-primary form-control my-3">Guardar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </main>

        </div>

    </div>

    <script src="./assets/js/app.js"></script>

    <script>
        const addForms = () => {
            let num_guardias = document.getElementById('num_guardias').value;
            let guardiasForm = document.getElementById('guardias-form');
            guardiasForm.innerHTML = "";
            let n = 1;

            for (let i = 0; i < num_guardias; i++) {
                guardiasForm.innerHTML += `

                <div class="border-bottom border-1 border-primary my-3">
                    <h5 class="fw-bolder">Información Guardia ${n++} </h5>
                </div>
                <div class="form-group col-md-6 my-3">
                    <label for="" class="form-label fw-bold">Nombre</label>
                    <input type="text" class="form-control" name="nombre_guardia[]" placeholder="Nombre del guardia" required />
                </div>
                <div class="form-group col-md-6 my-3">
                    <label for="" class="form-label fw-bold">Dirección del guardia</label>
                    <input type="text" class="form-control" name="direccion_guardia[]" placeholder="Dirección" required />
                </div>
                <div class="form-group col-md-6 my-3">
                    <label for="" class="form-label fw-bold">Teléfono del guardia</label>
                    <input type="tel" class="form-control" name="telefono_guardia[]" placeholder="Ej. 000-000-000" maxlength="12" required />
                </div>
                <div class="form-group col-md-6 my-3">
                    <label for="" class="form-label fw-bold">Antecedentes</label>
                    <input type="text" class="form-control" name="antecedentes_guardia[]" placeholder="Antencedentes" required />
                </div>`
            }
        }
    </script>

    <?php

    include('../db/config.php');

    if ($_POST) {

        $fracc_nombre = isset($_POST['fracc_nombre']) ? $_POST['fracc_nombre'] : "";
        $fracc_direccion = isset($_POST['fracc_direccion']) ? $_POST['fracc_direccion'] : ""; // check
        $fracc_correo = isset($_POST['fracc_correo']) ? $_POST['fracc_correo'] : ""; // check
        $fracc_telefono = isset($_POST['fracc_telefono']) ? $_POST['fracc_telefono'] : "";
        $fracc_celular = isset($_POST['fracc_celular']) ? $_POST['fracc_celular'] : "";
        $fracc_url = isset($_POST['fracc_url']) ? $_POST['fracc_url'] : "";
        $num_guardias = isset($_POST['num_guardias']) ? $_POST['num_guardias'] : 0;

        $presidente_nombre = isset($_POST['presidente_nombre']) ? $_POST['presidente_nombre'] : "";
        $presidente_telefono = isset($_POST['presidente_telefono']) ? $_POST['presidente_telefono'] : "";

        $secretario_nombre = isset($_POST['secretario_nombre']) ? $_POST['secretario_nombre'] : "";
        $secretario_telefono = isset($_POST['secretario_telefono']) ? $_POST['secretario_telefono'] : "";

        $tesorero_nombre = isset($_POST['tesorero_nombre']) ? $_POST['tesorero_nombre'] : "";
        $tesorero_telefono = isset($_POST['tesorero_telefono']) ? $_POST['tesorero_telefono'] : "";

        $admin_nombre = isset($_POST['admin_nombre']) ? $_POST['admin_nombre'] : "";
        $admin_telefono = isset($_POST['admin_telefono']) ? $_POST['admin_telefono'] : "";

        if ($fracc_nombre == '' || $fracc_direccion = '' || $fracc_correo = '' || $fracc_telefono == '' || $presidente_nombre = '' || $presidente_telefono = '' || $secretario_nombre = '' || $secretario_telefono = '' || $tesorero_nombre = '' || $tesorero_telefono = '' || $admin_nombre = '' || $admin_telefono = '') { ?>
            <script>
                alert('Completa los campos requeridos');
            </script>
            <?php
        } else {

            try {

                $fraccionamiento = $db->prepare('INSERT INTO fraccionamiento (nombre, direccion, correo, telefono, celular, url_sitio, num_guardias) VALUES (:nombre, :direccion, :correo, :telefono, :celular, :url_sitio, :num_guardias)');
                $fraccionamiento->bindParam(':nombre', $fracc_nombre);
                $fraccionamiento->bindParam(':direccion', $fracc_direccion);
                $fraccionamiento->bindParam(':correo', $fracc_correo);
                $fraccionamiento->bindParam(':telefono', $fracc_telefono);
                $fraccionamiento->bindParam(':celular', $fracc_celular);
                $fraccionamiento->bindParam(':url_sitio', $fracc_url);
                $fraccionamiento->bindParam(':num_guardias', $num_guardias);
                print_r($fraccionamiento->execute());

                $fk_fraccionamiento = $db->lastInsertId();

                if ($fk_fraccionamiento) {

                    $queryPresi = $db->prepare("INSERT INTO mesa_directiva (nombre, puesto, telefono, fk_fraccionamiento) VALUES (:presidente_nombre, 'Presidente' , :presidente_tel, :fk_fraccionamiento)");
                    $queryPresi->bindParam(':presidente_nombre', $presidente_nombre);
                    $queryPresi->bindParam(':presidente_tel', $presidente_telefono);
                    $queryPresi->bindParam(':fk_fraccionamiento', $fk_fraccionamiento);
                    $queryPresi->execute();

                    $querySecre = $db->prepare("INSERT INTO mesa_directiva (nombre, puesto, telefono, fk_fraccionamiento) VALUES (:presidente_nombre, 'Secretario' , :presidente_tel, :fk_fraccionamiento)");
                    $querySecre->bindParam(':presidente_nombre', $secretario_nombre);
                    $querySecre->bindParam(':presidente_tel', $secretario_telefono);
                    $querySecre->bindParam(':fk_fraccionamiento', $fk_fraccionamiento);
                    $querySecre->execute();

                    $queryTesorero = $db->prepare("INSERT INTO mesa_directiva (nombre, puesto, telefono, fk_fraccionamiento) VALUES (:presidente_nombre, 'Tesorero' , :presidente_tel, :fk_fraccionamiento)");
                    $queryTesorero->bindParam(':presidente_nombre', $tesorero_nombre);
                    $queryTesorero->bindParam(':presidente_tel', $tesorero_telefono);
                    $queryTesorero->bindParam(':fk_fraccionamiento', $fk_fraccionamiento);
                    $queryTesorero->execute();

                    $queryAdmin = $db->prepare("INSERT INTO mesa_directiva (nombre, puesto, telefono, fk_fraccionamiento) VALUES (:presidente_nombre, 'Administrador' , :presidente_tel, :fk_fraccionamiento)");
                    $queryAdmin->bindParam(':presidente_nombre', $admin_nombre);
                    $queryAdmin->bindParam(':presidente_tel', $admin_telefono);
                    $queryAdmin->bindParam(':fk_fraccionamiento', $fk_fraccionamiento);
                    $queryAdmin->execute();

                    for ($i = 0; $i < $num_guardias; $i++) {

                        $nombre_guardia = isset($_POST['nombre_guardia'][$i]) ? $_POST['nombre_guardia'][$i] : "";
                        $direccion_guardia = isset($_POST['direccion_guardia'][$i]) ? $_POST['direccion_guardia'][$i] : "";
                        $telefono_guardia = isset($_POST['telefono_guardia'][$i]) ? $_POST['telefono_guardia'][$i] : "";
                        $antecedentes = isset($_POST['antecedentes_guardia'][$i]) ? $_POST['antecedentes_guardia'][$i] : "";

                        $saveGuardias = $db->prepare("INSERT INTO guardias (nombre, direccion, telefono, antecedentes, fk_fraccionamiento) VALUES (:nombre, :direccion, :telefono, :antecedentes, :fk_fraccionamiento)");
                        $saveGuardias->bindParam(':nombre', $nombre_guardia);
                        $saveGuardias->bindParam(':direccion', $direccion_guardia);
                        $saveGuardias->bindParam(':telefono', $telefono_guardia);
                        $saveGuardias->bindParam(':antecedentes', $antecedentes);
                        $saveGuardias->bindParam(':fk_fraccionamiento', $fk_fraccionamiento);
                        $saveGuardias->execute();
                    }
                }
            } catch (\Throwable $th) {
                echo $th;
            ?>
                <script>
                    window.location.href = "bitacora.php?status=error";
                </script>
            <?php
            }
            ?>
            <script>
                window.location.href = "bitacora.php?status=success"
            </script>
    <?php
        }
    }

    ?>

</body>

</html>