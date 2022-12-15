<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php

if (isset($_GET['status'])) {
    $status = $_GET['status'];

    switch ($status) {
        case 'success': ?>
            <script>
                Swal.fire(
                    'Operación Realizada',
                    '',
                    'success'
                )
            </script>
        <?php break;

        case 'error_email': ?>
            <script>
                Swal.fire(
                    'Error',
                    'Correo electrónico no registrado',
                    'error'
                )
            </script>
        <?php break;

        case 'error_password': ?>
            <script>
                Swal.fire(
                    'Error',
                    'Contraseña Incorrecta',
                    'error'
                )
            </script>
        <?php break;

        case 'file_error': ?>
            <script>
                Swal.fire(
                    'Error',
                    'Formato de imágen no válido',
                    'warning'
                )
            </script>
        <?php break;

        default: ?>
            <script>
                Swal.fire(
                    'Error',
                    'Ha ocurrido un error al realizar la operación',
                    'error'
                )
            </script>
<?php break;
    }
}
?>