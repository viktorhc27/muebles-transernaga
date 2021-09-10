<?php
require_once "../../../models/Conexion.php";
require_once "../../../models/Employees.php";
require_once "../../../models/Productos.php";
//pruebas
session_start();
if (isset($_SESSION['user'])) {

?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Panel de Control</title>
        <!-- modelo -->
        <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>



        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!-- <script rel="text/javascript" src="../../../resources/js/prueba.js"></script> -->
        <!-- <script rel="text/javascript" src="../../../resources/js/agregar/agregar_funcionarios.js"></script> -->
        <link rel="icon" href="https://muebleslagos.cl/wp-content/uploads/2018/02/cropped-logo-Horizontal-32x32.png" sizes="32x32">
        <!-- Select2 -->
        <link rel="stylesheet" href="../plantilla/plugins/select2/css/select2.min.css">
        <link rel="stylesheet" href="../plantilla/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../plantilla/plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="../plantilla/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="../plantilla/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../plantilla/dist/css/adminlte.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="../plantilla/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="../plantilla/plugins/daterangepicker/daterangepicker.css">
        <!-- summernote -->
        <link rel="stylesheet" href="../plantilla/plugins/summernote/summernote-bs4.min.css">

        <link rel="stylesheet" href="../plantilla/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="../plantilla/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="../plantilla/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    </head>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

            <!-- Preloader -->
            <!--         <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="https://muebleslagos.cl/wp-content/uploads/2018/02/cropped-logo-Horizontal-32x32.png" alt="muebles" height="60" width="60">
        </div>
 -->
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="?param=inicio" class="nav-link">Inicio</a>
                    </li>
                </ul>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <!-- Navbar Search -->
                    <li class="nav-item">
                        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                            <i class="fas fa-search"></i>
                        </a>
                        <div class="navbar-search-block">
                            <form class="form-inline">
                                <div class="input-group input-group-sm">
                                    <input class="form-control form-control-navbar" type="search" placeholder="Buscador" aria-label="Search">
                                    <div class="input-group-append">
                                        <button class="btn btn-navbar" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                        <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>
                    <!-- Notifications Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="far fa-bell"></i>
                            <span class="badge badge-warning navbar-badge">15</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <span class="dropdown-item dropdown-header">15 Notifications</span>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-envelope mr-2"></i> 4 new messages
                                <span class="float-right text-muted text-sm">3 mins</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-users mr-2"></i> 8 friend requests
                                <span class="float-right text-muted text-sm">12 hours</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-file mr-2"></i> 3 new reports
                                <span class="float-right text-muted text-sm">2 days</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                            <i class="fas fa-expand-arrows-alt"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../../../models/logout.php" class="nav-link">
                            <i class="fas fa-sign-out-alt"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->

            <?php

            //nav de administrador
            if ($_SESSION['user']['rol'] == 3) {
            ?>
                <!-- Main Sidebar Container -->
                <aside class="main-sidebar sidebar-dark-primary elevation-4">
                    <!-- Brand Logo -->
                    <a href="?param=inicio" class="brand-link">
                        <img src="../plantilla/dist/img/AdminLTELogo2.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                        <span class="brand-text font-weight-light">Muebles Transernaga</span>
                    </a>

                    <!-- Sidebar -->
                    <div class="sidebar">

                        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                            <div class="image">
                                <img src="../plantilla/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                            </div>
                            <div class="info">
                                <a href="#" class="d-block"><?php print($_SESSION['user']['nombre']) ?></a>
                            </div>
                        </div>

                        <nav class="mt-2">
                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                                <li class="nav-item ">
                                    <a href="?param=inicio" class="nav-link">
                                        <i class="nav-icon fas fa-house-user"></i>
                                        <p>inicio</p>
                                    </a>
                                </li>
                                <li class="nav-item has-treeview">
                                    <a href="?param=productos" class="nav-link">

                                        <i class="nav-icon fas fa-box-open"></i>
                                        <p>
                                            Productos
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview" style="display: none;">
                                        <li class="nav-item">
                                            <a href="?param=productos" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Productos</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="?param=categorias_agregar" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Categorias</p>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="?param=marcas_agregar" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Marcas</p>
                                            </a>
                                        </li>

                                    </ul>
                                </li>

                                </li> 
                                <li class="nav-item">
                                    <a href="?param=facturaciones" class="nav-link">
                                        <i class="nav-icon fas fa-chart-pie"></i>
                                        <p>
                                            Facturaciones

                                        </p>
                                    </a>

                                </li>
                                <li class="nav-item">
                                    <a href="?param=reportes" class="nav-link">
                                        <i class="nav-icon fas fa-chart-line"></i>
                                        <p>
                                            Reportes

                                        </p>
                                    </a>

                                </li>
                                <li class="nav-item">
                                    <a href="?param=atencion" class="nav-link">
                                        <i class="nav-icon fas fa-edit"></i>
                                        <p>
                                            Atencion al cliente
                                        </p>
                                    </a>

                                </li>
                                <li class="nav-item">
                                    <a href="?param=funcionarios" class="nav-link">
                                        <i class="nav-icon fas fa-users"></i>
                                        <p>
                                            Funcionarios
                                        </p>
                                    </a>

                                </li>

                            </ul>
                        </nav>
                        <!-- /.sidebar-menu -->
                    </div>
                    <!-- /.sidebar -->
                </aside>



            <?php
            }
            ?>

            <?php

            //nav de armador
            if ($_SESSION['user']['rol'] == 4) {
            ?>
                <!-- Main Sidebar Container -->
                <aside class="main-sidebar sidebar-dark-primary elevation-4">
                    <!-- Brand Logo -->
                    <a href="?param=inicio" class="brand-link">
                        <img src="../plantilla/dist/img/AdminLTELogo2.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                        <span class="brand-text font-weight-light">Muebles Transernaga</span>
                    </a>

                    <!-- Sidebar -->
                    <div class="sidebar">

                        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                            <div class="image">
                                <img src="../plantilla/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                            </div>
                            <div class="info">
                                <a href="#" class="d-block"><?php print($_SESSION['user']['nombre']) ?></a>
                            </div>
                        </div>

                        <nav class="mt-2">
                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                                <li class="nav-item ">
                                    <a href="?param=inicio" class="nav-link">
                                        <i class="nav-icon fas fa-house-user"></i>
                                        <p>inicio</p>
                                    </a>
                                </li>

                                <li class="nav-item ">
                                    <a href="?param=inicio" class="nav-link">
                                        <i class="nav-icon fas fa-house-user"></i>
                                        <p>Pedidos</p>
                                    </a>
                                </li>


                                </li> 

                                <li class="nav-item">
                                    <a href="?param=reportes" class="nav-link">
                                        <i class="nav-icon fas fa-chart-line"></i>
                                        <p>
                                            Reportes

                                        </p>
                                    </a>

                                </li>

                            </ul>
                        </nav>
                        <!-- /.sidebar-menu -->
                    </div>
                    <!-- /.sidebar -->
                </aside>



            <?php
            }
            ?>

            <?php
            /**

             * Recibe por Parametros
             * @param type $param recibe en nombre de las ventana para mostrar la vista selecionada
             * 
             * 
             *          */
            //error_reporting(0);
            switch ($_REQUEST["param"]) {
                case "funcionarios":
                    include_once '../funcionarios/funcionarios.php';
                    break;
                case "funcionarios_modificar":
                    include_once '../funcionarios/modificar.php';
                    break;
                case "inicio":
                    include_once '../panel_principal/panel.php';
                    break;
                case 'productos':
                    include_once '../productos/productos.php';
                    break;
                case 'reportes':
                    include_once '../reportes/reportes.php';
                    break;
                case 'fabricantes':
                    include_once '../fabricantes/fabricantes.php';
                    break;
                case 'productos_agregar':
                    include_once '../productos/agregar.php';
                    break;
                case 'colores_agregar':
                    include_once '../colores/agregar.php';
                    break;
                case 'marcas_agregar':
                    include_once '../marcas/marcas.php';
                    break;
                case 'categorias_agregar':
                    include_once '../categorias/categorias.php';
                    break;
                case 'tipo_armado':
                    include_once '../tipo_armado/tipo_armado.php';
                    break;
                case 'tipo_despacho':
                    include_once '../tipo_despacho/tipo_despacho.php';
                    break;
                default:
                    include_once '../panel_principal/panel.php';
                    break;
            }
            ?>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <!--    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
                All rights reserved.
                <div class="float-right d-none d-sm-inline-block">
                    <b>Version</b> 3.1.0 -->
                <!-- </div> -->
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        <script rel="text/javascript" src="../../../resources/sweetalert2/dist/sweetalert2.all.min.js"></script>

        <script src="../../../resources/js/main.js"></script>

        <script src="../../../resources/js/eliminar/eliminar.js"></script>
        <script src="../../../resources/js/modificar/modificar.js"></script>
        <!-- jQuery -->
        <script src="../plantilla/plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="../plantilla/plugins/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="../plantilla/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- daterangepicker -->
        <script src="../plantilla/plugins/moment/moment.min.js"></script>
        <script src="../plantilla/plugins/daterangepicker/daterangepicker.js"></script> -->
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="../plantilla/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

        <script src="../plantilla/dist/js/adminlte.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../plantilla/dist/js/demo.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="../plantilla/dist/js/pages/dashboard.js"></script>

        <script src="../plantilla/plugins/select2/js/select2.full.min.js"></script>
        <script src="../plantilla/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../plantilla/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="../plantilla/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="../plantilla/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="../plantilla/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="../plantilla/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="../plantilla/plugins/jszip/jszip.min.js"></script>
        <script src="../plantilla/plugins/pdfmake/pdfmake.min.js"></script>
        <script src="../plantilla/plugins/pdfmake/vfs_fonts.js"></script>
        <script src="../plantilla/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="../plantilla/plugins/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="../plantilla/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
        <script>
            $(function() {

                $("#example1").DataTable({
                    "destroy": true,
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                $('#example2').DataTable({

                    "destroy": true,
                    "paging": true,
                    "lengthChange": false,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                    "language": español,
                });

            });

            var español = {
                "processing": "Procesando...",
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "emptyTable": "Ningún dato disponible en esta tabla",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "search": "Buscar:",
                "infoThousands": ",",
                "loadingRecords": "Cargando...",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "aria": {
                    "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad",
                    "collection": "Colección",
                    "colvisRestore": "Restaurar visibilidad",
                    "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
                    "copySuccess": {
                        "1": "Copiada 1 fila al portapapeles",
                        "_": "Copiadas %d fila al portapapeles"
                    },
                    "copyTitle": "Copiar al portapapeles",
                    "csv": "CSV",
                    "excel": "Excel",
                    "pageLength": {
                        "-1": "Mostrar todas las filas",
                        "1": "Mostrar 1 fila",
                        "_": "Mostrar %d filas"
                    },
                    "pdf": "PDF",
                    "print": "Imprimir"
                },
                "autoFill": {
                    "cancel": "Cancelar",
                    "fill": "Rellene todas las celdas con <i>%d<\/i>",
                    "fillHorizontal": "Rellenar celdas horizontalmente",
                    "fillVertical": "Rellenar celdas verticalmentemente"
                },
                "decimal": ",",
                "searchBuilder": {
                    "add": "Añadir condición",
                    "button": {
                        "0": "Constructor de búsqueda",
                        "_": "Constructor de búsqueda (%d)"
                    },
                    "clearAll": "Borrar todo",
                    "condition": "Condición",
                    "conditions": {
                        "date": {
                            "after": "Despues",
                            "before": "Antes",
                            "between": "Entre",
                            "empty": "Vacío",
                            "equals": "Igual a",
                            "notBetween": "No entre",
                            "notEmpty": "No Vacio",
                            "not": "Diferente de"
                        },
                        "number": {
                            "between": "Entre",
                            "empty": "Vacio",
                            "equals": "Igual a",
                            "gt": "Mayor a",
                            "gte": "Mayor o igual a",
                            "lt": "Menor que",
                            "lte": "Menor o igual que",
                            "notBetween": "No entre",
                            "notEmpty": "No vacío",
                            "not": "Diferente de"
                        },
                        "string": {
                            "contains": "Contiene",
                            "empty": "Vacío",
                            "endsWith": "Termina en",
                            "equals": "Igual a",
                            "notEmpty": "No Vacio",
                            "startsWith": "Empieza con",
                            "not": "Diferente de"
                        },
                        "array": {
                            "not": "Diferente de",
                            "equals": "Igual",
                            "empty": "Vacío",
                            "contains": "Contiene",
                            "notEmpty": "No Vacío",
                            "without": "Sin"
                        }
                    },
                    "data": "Data",
                    "deleteTitle": "Eliminar regla de filtrado",
                    "leftTitle": "Criterios anulados",
                    "logicAnd": "Y",
                    "logicOr": "O",
                    "rightTitle": "Criterios de sangría",
                    "title": {
                        "0": "Constructor de búsqueda",
                        "_": "Constructor de búsqueda (%d)"
                    },
                    "value": "Valor"
                },
                "searchPanes": {
                    "clearMessage": "Borrar todo",
                    "collapse": {
                        "0": "Paneles de búsqueda",
                        "_": "Paneles de búsqueda (%d)"
                    },
                    "count": "{total}",
                    "countFiltered": "{shown} ({total})",
                    "emptyPanes": "Sin paneles de búsqueda",
                    "loadMessage": "Cargando paneles de búsqueda",
                    "title": "Filtros Activos - %d"
                },
                "select": {
                    "1": "%d fila seleccionada",
                    "_": "%d filas seleccionadas",
                    "cells": {
                        "1": "1 celda seleccionada",
                        "_": "$d celdas seleccionadas"
                    },
                    "columns": {
                        "1": "1 columna seleccionada",
                        "_": "%d columnas seleccionadas"
                    }
                },
                "thousands": ".",
                "datetime": {
                    "previous": "Anterior",
                    "next": "Proximo",
                    "hours": "Horas",
                    "minutes": "Minutos",
                    "seconds": "Segundos",
                    "unknown": "-",
                    "amPm": [
                        "am",
                        "pm"
                    ]
                },
                "editor": {
                    "close": "Cerrar",
                    "create": {
                        "button": "Nuevo",
                        "title": "Crear Nuevo Registro",
                        "submit": "Crear"
                    },
                    "edit": {
                        "button": "Editar",
                        "title": "Editar Registro",
                        "submit": "Actualizar"
                    },
                    "remove": {
                        "button": "Eliminar",
                        "title": "Eliminar Registro",
                        "submit": "Eliminar",
                        "confirm": {
                            "_": "¿Está seguro que desea eliminar %d filas?",
                            "1": "¿Está seguro que desea eliminar 1 fila?"
                        }
                    },
                    "error": {
                        "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">Más información&lt;\\\/a&gt;).<\/a>"
                    },
                    "multi": {
                        "title": "Múltiples Valores",
                        "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aquí, de lo contrario conservarán sus valores individuales.",
                        "restore": "Deshacer Cambios",
                        "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo."
                    }
                },
                "info": "Mostrando de _START_ a _END_ de _TOTAL_ entradas"
            }

            $(document).ready(function() {
                $('.js-example-basic-multiple').select2();
            });
        </script>
        
    </body>

    </html>

<?php
} else {

    echo "<script>";
    echo "location.href='../../../index.php';";
    echo "</script>";
}

?>