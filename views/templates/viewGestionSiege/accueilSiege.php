<?php session_start();?>
<?php include('../../../models/AgenceControle.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Liste des Agences</title> 

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head> 

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="accueilSiege.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3"> <?php 
                    echo $_SESSION['agence'] ;?></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="accueilSiege.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Administrateur</span></a>
                     
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                        <a class="nav-link" href="nouveauAgence.php">
                            <i class="fas fa-fw fa-table"></i>
                            <span>Nouveau Agence</span></a>
                    </li>
                </a>
            </li>
            <li class="nav-item">
                        <a class="nav-link" href="listerAgent.php">
                            <i class="fas fa-fw fa-table"></i>
                            <span>Liste Agents</span></a>
                    </li>
                </a>
            </li>
            <li class="nav-item">
                        <a class="nav-link" href="listerClient.php">
                            <i class="fas fa-fw fa-table"></i>
                            <span>Liste Clients</span></a>
                    </li>
                </a>
            </li>
            <li class="nav-item">
                        <a class="nav-link" href="listerOperationAgent.php">
                            <i class="fas fa-fw fa-table"></i>
                            <span>Listes Operattions</span></a>
                    </li>
                </a>
            </li>
            

            
            

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


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                 <?php echo $_SESSION['prenomAuth'] . $_SESSION['nomAuth'] ?>       
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
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3" >
                            
                            <span class="h2 m-0 font-weight-bold text-primary text-center">
                            Listes des Agences
                             </span>
                             
                            <span class="offset-5" >
                            </a>
                                <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#AjoutAgenceModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Creer Agence
                                </a>
                        </span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Admin</th>
                                            <th>Nom_agence</th> 
                                            <th>Adresse</th>
                                            <th>Date_creation</th>
                                            <th>Actions</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                           <th>Admin</th>
                                            <th>Nom_agence</th>
                                            <th>Adresse</th>
                                            <th>Date_creation</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <!--- on va recuperer les donn??es par l' appel de la methode getClients
                                     et on l'intancifie premierment -->
                                    <?php  $agenceControle = new AgenceControle(); ?>
                                    <?php if($agenceControle->getAgence()) : ?>
                                    <?php foreach ($agenceControle->getAgence() as $agence) : ?>
                                        <tr>
                                            <td><?= $agence['prenom']?> <?= $agence['nom']?> </td>
                                            <td><?= $agence['nomagence']?></td>
                                            <td><?= $agence['adresse']?></td>
                                            <td><?= $agence['datecreation']?></td>
                                            
                                            <th> 
                                            <a href="../../../controllers/AddAgenceController.php?action=modify&idagence=<?=$agence['idagence']; ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit "></i>
                                            </a>
                                            <a href="../../../controllers/AddAgenceController.php?action=suprimer&idagence=<?=$agence['idagence']; ?>"   class="btn btn-danger btn-sm">
                                            
                                            <i class="fa fa-trash "></i>
                                            </a>
                                            </th>
                                        </tr>
                                        <?php endforeach;?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
    
                <!-- --->
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; AskanBii Banque</span>
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
    <div class="modal fade" id="profilModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Mes informations ! </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
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
                        <span aria-hidden="true">??</span>
                    </button>
                </div>
                <div class="modal-body">Etes vous sure de vouloir vouloir suprimer</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Retour</button>
                    <a class="btn btn-primary" href="../../../logout.php">Deconnexion</a>
                </div>
            </div>
        </div>
    </div>
    <!-- suprimer modal-->

    <!-- formulaire ajouter Agence --->
    <div class="modal fade" id="AjoutAgenceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"s
        aria-hidden="true">
        <div class="modal-dialog" style="max-width: 75%;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">AjouterAgence!</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
                    </button>
                </div>
                <div class="modal-body ">
                     <div class="container">
                        <div class="card w-100 text-center shadowBlue">
                          <div class="card-body bg-dark text-white">
                              <table class="table">
                                    <tbody>
                                           <tr>
                                              <form action="../../../controllers/AddAgenceController.php" method="POST">
                                        
                                              <th>Nom de l'agence</th>
                                              <td><input type="text" name="nomagence" class="form-control input-sm" required></td>
                                            </tr>
                                            <tr>
                                                
                                                <th>Adresse</th>
                                                <td><input type="text" name="adresse" class="form-control input-sm" required></td>
                                            </tr>
                                            <tr>
                                                      
                                                <th>Date de creation</th>
                                                <td><input type="date" name="datecreation" class="form-control input-sm" required></td>
                                            </tr>

                                            
                                                <td colspan="4">
                                                    <button type="submit" name="add" class="btn btn-primary btn-sm">Valider</button>
                                                    <button type="Reset" class="btn btn-secondary btn-sm">Reset</button></form>
                                                </td>
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                        <div class="card-footer text-muted">
                    </div>
                </div>
             </div>
        </div>
    </div>
</div>

                               <!-- <a class="btn btn-primary btn-user btn-block" href="#" data-toggle="modal" data-target="#AjoutCompteModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Valier et Continuer
                                   </a>
                                   --->
                            </form>
    
                           </div>
                         </div>
                        </div>
                     </div>
                    </div>
                  </div>
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

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

</body>

</html>
