<?php
    include_once("../conexao.php");
    $result_categoria_cliente = "SELECT * FROM categoria_cliente";
    $resultado_categoria_cliente = mysqli_query($conn, $result_categoria_cliente);
    $result_usuarios = "SELECT * FROM usuarios";
    $resultado_usuarios = mysqli_query($conn, $result_usuarios);
    session_start();
if(!empty($_SESSION['id'])){


}else{
    $_SESSION['msg'] = "<div class='alert alert-danger'>Área restrita!</div>";
    header("Location: ../login.php");  
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../../../mesas/index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-cart-plus"></i>
                </div>
                <div class="sidebar-brand-text mx-3">NELORE</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Panel:</h6>
                        <a class="collapse-item" href="../../../mesas/index.php">Loja</a>
                        <h6 class="collapse-header">Login Screens:</h6>
                        <?php
                            if(empty($_SESSION['id'])){?> 
                                <a class="dropdown-item" href="../login.php">Login</a>  
                        <?php } ?>
                        <?php
                          if(!empty($_SESSION['id'])){?>
                            <a class="dropdown-item" href="../sair.php">Logout</a>
                        <?php } ?>
                        <a class="collapse-item" href="../cadastrar.php">Register</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Registration Page:</h6>
                        <a class="collapse-item" href="../pedidos/pedidos.php">Pedidos</a>
                        <a class="collapse-item" href="../mesas/mesas.php">Mesas</a>
                        <a class="collapse-item" href="#">Categorias</a>
                        <a class="collapse-item" href="../itens/itens.php">Itens</a>
                        <a class="collapse-item" href="../menus/menus.php">Menus</a>
                        <a class="collapse-item" href="../estoque/estoque.php">Estoque</a>
                        <a class="collapse-item" href="../fornecedores/fornecedores.php">Fornecedores</a>
                        <a class="collapse-item" href="../compras/compras.php">Compras</a>
                    </div>
                </div>
            </li>


            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>




                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['nome']?></span>
                                <img class="img-profile rounded-circle"
                                    src="<?php 
                                        if(!empty($_SESSION['id'])){
                                            while($rows_usuarios = mysqli_fetch_assoc($resultado_usuarios)){
                                                echo $rows_usuarios['img'];
                                                }
                                            }
                                        ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                              
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="pull-right">
                        <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#myModalcad">Cadastrar</button>
                    </div><br>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Categorias</h6>
                        </div>
                    <!-- Inicio Modal -->
                    <div class="modal fade" id="myModalcad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title text-center" id="myModalLabel"><b>Cadastrar Categoria</b></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="processa_cad.php" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="recipient-categoria" class="control-label"><b>Categoria:</b></label>
                                    <input name="categoria" type="text" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="recipient-loja" class="control-label"><b>Mesa:</b></label>
                                    <select name="id_loja" class="form-control">
                                        <option>Selecione</option>
                                        <?php
                                            $result_loja = "SELECT * FROM lojas";
                                            $resultado_loja = mysqli_query($conn, $result_loja);
                                            while($row_loja = mysqli_fetch_assoc($resultado_loja)){ ?>
                                            <option value="<?php echo utf8_encode($row_loja['id_loja']); ?>"><?php echo utf8_encode($row_loja['loja']); ?></option> <?php
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Cadastrar</button>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
                    <!-- Fim Modal -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">

                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Categoria</th>
                                            <th>Mesa</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Categoria</th>
                                            <th>Mesa</th>
                                            <th>Ações</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                            <?php while($rows_categoria_cliente = mysqli_fetch_assoc($resultado_categoria_cliente)){ ?>
                                <tr>
                                    
                                    <td><?php echo $rows_categoria_cliente['id_categoria']; ?></td>
                                    <td><?php echo $rows_categoria_cliente['categoria']; ?></td>
                                    <td>
                                        <?php
                                            $id_loja = $rows_categoria_cliente['id_loja'];
                                            $result_loja = "SELECT * FROM lojas WHERE id_loja = '$id_loja'";
                                            $resultado_loja = mysqli_query($conn, $result_loja);

                                            while($rows_loja = mysqli_fetch_array($resultado_loja)) { ?>
                                                    <p><?php echo $rows_loja['loja']; ?></p>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-info btn-circle btn-sm" data-toggle="modal" data-target="#myModal<?php echo $rows_categoria_cliente['id_categoria']; ?>">
                                            <i class="fas fa-info-circle"></i>
                                        </a>
                                        <button type="button" class="btn btn-warning btn-circle btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $rows_categoria_cliente['id_categoria']; ?>" data-whatevercategoria="<?php echo $rows_categoria_cliente['categoria']; ?>"data-whateverloja="<?php echo $rows_categoria_cliente['id_loja']; ?>">
                                            <span class="fas fa-edit" aria-hidden="true"></span>
                                        </button>

                                        <a href="processa_apagar.php?id=<?php echo $rows_categoria_cliente['id_categoria']; ?>">
                                            <button type="button" class="btn btn-danger btn-circle btn-sm">
                                                <span class="fas fa-trash" aria-hidden="true"></span>
                                            </button>
                                        </a>
                                    </td>    
                    
                                </tr>
                                <!-- Inicio Modal -->
                                <div class="modal fade" id="myModal<?php echo $rows_categoria_cliente['id_categoria']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel"><b>Categorias</b></h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                    <p><b>Categoria:</b> <?php echo $rows_categoria_cliente['categoria']; ?></p>

                                                    <p><b>Mesa:</b> 
                                                    <?php
                                                        $id_loja = $rows_categoria_cliente['id_loja'];
                                                        $result_loja = "SELECT * FROM lojas WHERE id_loja = '$id_loja'";
                                                        $resultado_loja = mysqli_query($conn, $result_loja);
                                                        while($rows_loja = mysqli_fetch_array($resultado_loja)) { ?>
                                                            <?php echo utf8_encode($rows_loja['loja']); ?>
                                                    <?php } ?>
                                                    
                                                </h4>
                                            </div>
                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Fim Modal -->
                            <?php } ?>
                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel"><b>Categoria</b></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="processa.php" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="recipient-categoria" class="control-label"><b>Categoria:</b></label>
                                <input name="categoria" type="text" class="form-control" id="recipient-categoria">
                            </div>

                            <div class="form-group">
                                    <label for="recipient-loja" class="control-label"><b>Mesa:</b></label>
                                    <select name="id_loja" class="form-control" id="recipient-loja">
                                        <option>Selecione</option>
                                        <?php
                                            $result_loja = "SELECT * FROM lojas";
                                            $resultado_loja = mysqli_query($conn, $result_loja);
                                            while($row_loja = mysqli_fetch_assoc($resultado_loja)){ ?>
                                            <option value="<?php echo $row_loja['id_loja']; ?>"><?php echo utf8_encode($row_loja['loja']); ?></option> <?php
                                            }
                                        ?>
                                    </select><br><br>
                            </div>

                            <input name="id_categoria" type="hidden" id="id_categoria">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-danger">Alterar</button>
                            </div>
                        </form>
                    </div>            
                </div>
            </div>
        </div>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Eliseu S. Bueno - <a href="https://www.smarthsystem.epizy.com">www.smarthsystem.epizy.com  </a><?php echo date('Y'); ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <?php
                            if(empty($_SESSION['id'])){?> 
                            <a class="btn btn-primary" href="../login.php">Login</a>  
                            <?php } ?>
                        <?php
                            if(!empty($_SESSION['id'])){?>
                            <a class="btn btn-primary" href="../sair.php">Sair</a>
                        <?php } ?>
                </div>
            </div>
        </div>
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../js/demo/datatables-demo.js"></script>

        <script type="text/javascript">
            $('#exampleModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var recipient = button.data('whatever') // Extract info from data-* attributes
                var recipientcategoria = button.data('whatevercategoria')
                var recipientloja = button.data('whateverloja')

                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                modal.find('.modal-title').text('ID da Categoria: ' + recipient)
                modal.find('#id_categoria').val(recipient)

                modal.find('#recipient-categoria').val(recipientcategoria)
                modal.find('#recipient-loja').val(recipientloja)

            })
        </script>

</body>

</html>