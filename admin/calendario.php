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

    <!-- calendar -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/locales-all.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>

    <!--  -->
    <link rel="canonical" href="https://demo-basic.adminkit.io/" />

    <title>Administración | IBHAI </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="./assets/css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: "es",

                customButtons: {
                    myCustomButton: {
                        text: 'Agregar Cita',
                        click: function() {
                            window.location.assign("eventoslista.php")
                        }
                    },


                },
                headerToolbar: {
                    left: 'prev,next today myCustomButton',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: 'https://utdgrupoti.com/IBHAI/admin/eventos.php',

               


                eventClick: function(info) {



                    // change the border color just for fun

                    $('#tituloEvento').html(info.event.title);
                    $('#txtTitulo').val(info.event.title);
                    //mostrar info del evento en input
                    $('#txtDescripcion').val(info.event.extendedProps.descripcion);
                    $('#txtID').val(info.event.id);
                    const Fecha = info.event.extendedProps.fecha.substring(0, 10);

                    const Hora = info.event.extendedProps.fecha.substring(11, 19); 
                    

                    $('#txtFecha').val(Fecha);
                    $('#txtHora').val(Hora);
                    $('#txtColor').val(info.event.textColor);
                    $('#ModalEventos').modal('show');

                },













            });
            calendar.render();
        });
    </script>
    <div class="wrapper">
        <?php include './components/sidebar.php' ?>

        <div class="main">

            <?php include './components/navbar.php' ?>

            <main class="content">
                <div class="container-fluid p-0">

                    <h1 class="h1 mb-3 fw-bolder">Calendario de citas</h1>

                    <div class="row">

                        <div class="card">
                            <div class="card flex-fill">
                                <div class="card-header row d-flex pt-4 border border-bottom border-1">
                                    <div class="col-md-6">
                                        <h5 class="card-title mb-0">Citas</h5>
                                    </div>
                                    <!-- Button trigger modal -->



                                    <div id='calendar'></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="./assets/js/app.js"></script>
    <?php include('../components/swal.php') ?>






    <!-- Modal add edit delete -->
    <div class="modal fade" id="ModalEventos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tituloEvento"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="descripcionEvento">

                    </div>
                    <div class="container">
                       
                              
                             
                               
                                
                               
                           
                       
                        <form>
  <div class="form-group">
    <label for="exampleInputEmail1">Fecha:</label>
    <input type="text" class="form-control" id="txtFecha" name="txtFecha" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
   <div class="form-group">
    <label for="exampleInputEmail2">Titulo:</label>
    <input type="text" class="form-control" id="txtTitulo" name="txtTitulo" name="txtFecha" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Hora:</label>
    <input type="text" class="form-control" id="txtHora" name="txtHora">
  </div>
   <div class="form-group">
    <label for="exampleInputPassword1">Descripcion:</label>
    <textarea rows="3" class="form-control" id="txtDescripcion" >
  </div>
  
  <div class="form-group">
    <label for="exampleInputPassword1">color:</label>
    <textarea rows="3" class="form-control" id="txtDescripcion" >
  </div>
 
  
</form>
                    </div>





                </div>
                <div class="modal-footer">
                    <button type="button" id="btnAgregar" class="btn btn-success">Guardar cita</button>
                    <button type="button" class="btn btn-warning">Modificar cita</button>
                    <button type="button" class="btn btn-danger">Borrar cita</button>


                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>


                </div>
            </div>
        </div>
    </div>
    <script>

var NuevoEvento;

        $('#btnAgregar').click(function() {
         RecolectarDatosGui(); 
         EnviarInformacion('agregar',NuevoEvento)

           

        });
        function RecolectarDatosGui(){
            var nuevoEvento = {
                id:$('#txtID').val(),
                title: $('#txtTitulo').val(),
                paciente:$('#txtPaciente').val(),
                doctor:$('#txtDoctor').val(), 
                descripcion: $('#txtDescripcion').val(),
                start: $('#txtFecha').val() + " " + $('#txtHora').val(),
                textColor: $('#txtColor').val()
              

            };

        }


        function EnviarInformacion(accion,objEvento){
            $.ajax({
                type: "POST",
                url:'eventos.php?accion='+accion,
                data:objEvento,
                success: function(msg){
                if (msg){
                   
                    $("#ModalEventos").modal('toggle');
                }
                    
                },
                error: function(){
                    alert("hay un error");
                }
            })
        }
    </script>

</body>

</html>