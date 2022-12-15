<?php

require('./db/config.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Direccion Municipal de Seguridad Pública</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/logo_municipio_blanco.png" rel="icon">
    <link href="assets/img/logo_municipio_blanco.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

    <!-- ======= Navbar ======= -->
    <?php include './components/navbar.php' ?>

    <main id="main" class="my-5">

        <div class="container p-5">
            <div class="row d-flex justify-content-center ">
                <div class="col-md-8 card shadow shadow-lg mt-5" data-aos="zoom-out" data-aos-delay="100">
                    <div class="card-header text-center pt-3">
                        <h2>Registrar Visita</h2>
                    </div>
                    <div class="card-body py-3 px-3">
                        <form action="./db/insertar-reporte.php" method="POST">
                            <div class="form-group my-3">
                                <label class="form-label  my-2" for="fracc">Fraccionamiento</label>
                                <select class="form-control " name="fracc" id="fracc" required>
                                    <option value="" selected disabled>Selecciona una fraccionamiento...</option>
                                    <option value="Fracc">Fraccionamiento prueba</option>
                                </select>
                            </div>

                            <input type="hidden" name="fk_fraccionamiento" value="1">

                            <div class="form-group my-3">
                                <label class="form-label  my-2" for="guardia">Guardia encargado de turno</label>
                                <select class="form-control " name="guardia" id="guardia" required>
                                    <option value="" selected disabled>Selecciona una opcion...</option>
                                    <option value="Guardia">Nombre Guardia</option>
                                </select>
                            </div>
                            <div class="form-group my-3">
                                <label class="form-label  my-2">Horario</label>
                                <input class="form-control" type="text" placeholder="Horario" name="horario" required />
                            </div>
                            <div class="form-group my-3">
                                <label class="form-label  my-2" for="incidentes">Incidentes que reportar</label>
                                <input class="form-control" name="incidentes" type="text" placeholder="Incidentes que reportar" required />
                            </div>
                            <div class="form-group my-3">
                                <label class="form-label  my-2" for="rondin">¿Desea que se elabore rondín?</label>
                                <select name="rondin" id="rondin" class="form-control" required>
                                    <option value="">Selecciona una opción...</option>
                                    <option value="1">Si</option>
                                    <option value="0">No</option>
                                </select>
                            </div>

                            <div class="form-group my-3">
                                <label class="form-label  my-2" for="clave_guardia">Clave de validación (Guardia)</label>
                                <input class="form-control" type="text" name="clave_guardia" id="clave_guardia" placeholder="Ingrese clave de guardia" required />
                            </div>

                            <button id="btn-submit" class="btn btn-primary form-control my-3" type="submit">Aceptar</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <footer id="footer" class="footer-top">
        <div class="container py-4 border-top border-2 border-primary">
            <div class="text-center">
                &copy; Copyright <strong><span>Dirección Municipal de Seguridad Pública</span></strong>. Derechos reservados
                <?php echo date("Y") ?>
            </div>
        </div>
    </footer>

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>