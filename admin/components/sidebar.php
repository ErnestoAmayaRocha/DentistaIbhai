<link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">

<nav id="sidebar" class="sidebar js-sidebar">

    <?php

    if ($_SESSION['rol'] === 'admin') { ?>
        <div class="sidebar-content js-simplebar">
            <a class="sidebar-brand" href="index.php">
                <img src="../assets/img/logo2.png" width="80%" alt="logo">
            </a>

            <ul class="sidebar-nav">
                <li class="sidebar-header">
                    Informacion general
                </li>

                <!--   <li class="sidebar-item">
                <a class="sidebar-link" href="bitacora.php">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Bitácora digital</span>
                </a>
            </li> -->
                <li class="sidebar-item">
                    <a class="sidebar-link" href="Ortodoncia.php">
                        <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Ortodoncia</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="doctores.php">
                        <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Doctores</span>
                    </a>
                </li>

                <li class="sidebar-header">
                    Operaciones
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="noticias.php">
                        <i class="align-middle" data-feather="tablet"></i> <span class="align-middle">Noticias</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="calendario.php">
                        <i class="align-middle" data-feather="tablet"></i> <span class="align-middle">Calendario</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="odontograma.php">
                        <i class="align-middle" data-feather="tablet"></i> <span class="align-middle">Odontograma</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="examenes-clinicos.php">
                        <i class="align-middle" data-feather="tablet"></i> <span class="align-middle">Examenes Clínicos</span>
                    </a>
                </li>
                <!-- <li class="sidebar-item">
                <a data-bs-target="#multi" data-bs-toggle="collapse" class="sidebar-link" aria-expanded="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-right-down align-middle">
                        <polyline points="10 15 15 20 20 15"></polyline>
                        <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                    </svg> <span class="align-middle">Multi Level</span>
                </a>
                <ul id="multi" class="sidebar-dropdown list-unstyled collapse show" data-bs-parent="#sidebar" style="">
                    <li class="sidebar-item">
                        <a data-bs-target="#multi-2" data-bs-toggle="collapse" class="sidebar-link collapsed" aria-expanded="false">Two Levels</a>
                        <ul id="multi-2" class="sidebar-dropdown list-unstyled collapse">
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="#">Item 1</a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="#">Item 2</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a data-bs-target="#multi-3" data-bs-toggle="collapse" class="sidebar-link collapsed" aria-expanded="false">Three Levels</a>
                        <ul id="multi-3" class="sidebar-dropdown list-unstyled collapse">
                            <li class="sidebar-item">
                                <a data-bs-target="#multi-3-1" data-bs-toggle="collapse" class="sidebar-link collapsed" aria-expanded="false">Item 1</a>
                                <ul id="multi-3-1" class="sidebar-dropdown list-unstyled collapse">
                                    <li class="sidebar-item">
                                        <a class="sidebar-link" href="#">Item 1</a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a class="sidebar-link" href="#">Item 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="#">Item 2</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li> -->
            </ul>

        </div>
    <?php
    } elseif ($_SESSION['rol'] === 'caja') { ?>
        <div class="sidebar-content js-simplebar">
            <a class="sidebar-brand" href="index.php">
                <img src="../assets/img/logo2.png" width="80%" alt="logo">
            </a>
            <ul class="sidebar-nav">
                <li class="sidebar-header">
                    Usuario en caja
                    <hr>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="calendario.php">
                        <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Agenda</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="doctores.php">
                        <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Doctores</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="pacientes.php">
                        <i class="align-middle" data-feather="tablet"></i> <span class="align-middle">Pacientes</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="#">
                        <i class="align-middle" data-feather="tablet"></i> <span class="align-middle">Caja</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="#">
                        <i class="align-middle" data-feather="tablet"></i> <span class="align-middle">Mensaje</span>
                    </a>
                </li>
            </ul>

        </div>
    <?php
    }
    ?>
</nav>