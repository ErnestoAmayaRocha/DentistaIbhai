<?php

include('config.php');

if ($_POST) {

    echo $fracc = isset($_POST['fracc']) ? $_POST['fracc'] : "";
    echo $fk_fracc = isset($_POST['fk_fraccionamiento']) ? $_POST['fk_fraccionamiento'] : "";
    echo $guardia = isset($_POST['guardia']) ? $_POST['guardia'] : "";
    echo $horario = isset($_POST['horario']) ? $_POST['horario'] : "";
    echo $incidentes = isset($_POST['incidentes']) ? $_POST['incidentes'] : "";
    echo $rondin = isset($_POST['rondin']) ? $_POST['rondin'] : 0;
    echo $clave_guardia = isset($_POST['clave_guardia']) ? $_POST['clave_guardia'] : "";

    if ($fracc == '' || $fk_fracc  == '' || $guardia == '' || $horario == '' || $incidentes == '' || $clave_guardia == '') { ?>
        <script>
            // window.location.href = "../registro.php?status=incompleto";
        </script>
    <?php }

    try {
        $reporte = $db->prepare("INSERT INTO reportes (fraccionamiento, guardia, clave_guardia, horario, incidente, rondin, fk_fraccionamiento) VALUES (:fracc, :guardia, :clave_guardia, :horario, :incidente, :rondin, :fk_fraccionamiento) ");
        $reporte->bindParam(':fracc', $fracc);
        $reporte->bindParam(':guardia', $guardia);
        $reporte->bindParam(':clave_guardia', $clave_guardia);
        $reporte->bindParam(':horario', $horario);
        $reporte->bindParam(':incidente', $incidentes);
        $reporte->bindParam(':rondin', $rondin);
        $reporte->bindParam(':fk_fraccionamiento', $fk_fracc);
        $reporte->execute();

    ?>
        <script>
            window.location.href = "../index.php?status=success";
        </script>
    <?php

    } catch (\Throwable $th) {
    ?>
        <script>
            window.location.href = "../registro.php?status=error"
        </script>
    <?php
    }
} else { ?>
    <script>
        window.location.href = "../index.php"
    </script>
<?php
}
