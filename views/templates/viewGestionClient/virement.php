<?php include('../../../models/ClientControle.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Depot</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="accueilAgent.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3"><?php echo $_SESSION['agence']?> </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="accueilAgent.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Espace Agent</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Operations</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Faire une Operation:</h6>
                        <a class="collapse-item" class="dropdown-item" href="#" data-toggle="modal" data-target="#depotModal">Depot </a>
                        <a class="collapse-item" class="dropdown-item" href="#" data-toggle="modal" data-target="#retraitModal">Retrait </a>
                        <a class="collapse-item" class="dropdown-item" href="#" data-toggle="modal" data-target="#virementModal">Virement </a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
                    <li class="nav-item">
                        <a class="nav-link" href="transaction.php">
                            <i class="fas fa-fw fa-table"></i>
                            <span>Transactions</span></a>
                    </li>
                </a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="transaction.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Transactions</span></a>
            </li>
        </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            
            

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
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php 
                            echo $_SESSION['prenomAuth' ]  . "  ". $_SESSION[ 'nomAuth'] ;
                            ?></span>
                            </span>
                                <img class="img-profile rounded-circle"
                                    src="../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#"data-toggle="modal" data-target="#profilModal">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Deconnexion
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                <div class='alert alert-primary w-100 mx-auto py-4 col-md-6  m-auto ml-7'>
                <form action="../../../controllers/TransactionContoller.php" method='POST'> 
                    Numero Compte
                    <input type='text' class='form-control' value="<?php echo  $_SESSION['num_compte']; ?>" name='num_compte1' class='form-control ' readonly required>
                     Prenom et Nom
                    <input type='text' class='form-control' value="<?php echo  $_SESSION['prenom'].$_SESSION['nom']; ?>" readonly required>
                    Solde
                    <input type='text' class='form-control' value="<?php echo  $_SESSION['solde']; ?>" readonly required>
                     Prenom et nom du destinataire
                    <input type='text' class='form-control' value="<?php echo  $_SESSION['prenom1'].$_SESSION['nom1']; ?>" readonly required>
                    Numero compte du destinataire
                    <input type='text' class='form-control' value="<?php echo  $_SESSION['num_compte1']; ?>" name='num_compte2' class='form-control ' readonly required>
                     Enter le montant du virement.
                    <input type='number' name='montant' class='form-control'   required>
                    <button type='submit' name='virement' class='btn btn-primary btn-bloc btn-sm my-1'>Virement</button>
                  </form>
                </div>    
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; AskanbiiBanque</span>
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
    <!-- depot Modal --->
<!-- depot Modal --->
<div class="modal fade" id="depotModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Verifier les informations du compte! </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="card-body">
                            <form action="../../../controllers/TransactionContoller.php" method="POST">
                                <div class="alert alert-primary w-110 mx-auto">
                                    <h5>Nouveau Depot</h5>
                                    <input type="text" name="num_compte" class="form-control " placeholder="Entrer le numero de Compte" required>
                                
                                    <button type="submit" name="verification" class="btn btn-primary btn-bloc btn-sm my-1">Obtenez les Infos</button>
                                
                                 </div>
                            </form>
                        </div>
                </div>
           </div>
    </div>
</div>
<!-- Retrait modal --->
<div class="modal fade" id="retraitModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Verifier les informations du compte! </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="card-body">
                            <form  action="../../../controllers/TransactionContoller.php" method="POST">
                                <div class="alert alert-primary w-110 mx-auto">
                                    <h5>Nouveau Retait</h5>
                                    <input type="text" name="num_compte" class="form-control " placeholder="Entrer le numero de Compte" required>
                                    <a href="retrait.php">
                                    <button type="submit" name="verification1" class="btn btn-primary btn-bloc btn-sm my-1">Obtenez les Infos</button>
                                    </a>
                                 </div>
                            </form>
                        </div>
                </div>
           </div>
    </div>
</div>
<!-- Virement  modal --->
<div class="modal fade" id="virementModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Verifier les informations du compte! </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="card-body">
                            <form  action="../../../controllers/TransactionContoller.php" method="POST">
                                <div class="alert alert-primary w-110 mx-auto">
                                    <h5>Nouveau Virement</h5>
                                    <input type="text" name="num_compte" class="form-control " placeholder="Entrer le numero de Compte" >
                                    <button type="submit" name="verification2" class="btn btn-primary btn-bloc btn-sm my-1">Obtenez les Infos</button>
 
                                 </div>
                            </form>
                        </div>
                </div>
           </div>
    </div>
</div>
 <!-- Profile  modal --->
 <div class="modal fade" id="profilModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Mes informations ! </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
  <div class="card  w-200 mx-auto">
  <div class="card-body" >
    <table class="table table-striped table-dark   w-110 mx-auto">
  <thead>
    <tr>
      <td scope="col">Nom</td>
      <th scope="col"><?php echo $_SESSION['nomAuth' ]?></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Prenom</th>
      <td><?php echo $_SESSION['prenomAuth' ] ?></td>
    </tr>
    <tr>
      <th scope="row">Username</th>
      <td><?php echo $_SESSION['username'] ?></td>
    </tr>
    <tr>
      <th scope="row">Password</th>
      <td><?php echo $_SESSION['password'] ?></td>    
    </tr>
    <tr>
      <th scope="row">Editer</th>
      
    </tr>
  </tbody>
</table>
      
  </div>
  <div class="card-footer text-muted">
  <h6> 
<?php echo "askanbibanque"?>
  </div>
  

</div>
                </div>
           </div>
    </div>
</div>
     <!-- Logout Modal-->
     <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Lire ce notice?</h5>
                 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-body">Etes vous sure de vouloir fermer votre session.</div>
             <div class="modal-footer">
                 <button class="btn btn-secondary" type="button" data-dismiss="modal">Retour</button>
                 <a class="btn btn-primary" href="../login.php">Deconnexion</a>
             </div>
         </div>
     </div>
 </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>