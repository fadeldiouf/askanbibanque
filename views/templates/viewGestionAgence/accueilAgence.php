
<?php 
include('../../../models/agentControle.php'); ?>
<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Liste des agents</title>

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
                <a class="nav-link" href="accueilAgence.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Espace Agence</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading 
            <div class="sidebar-heading">
                Interface
            </div>-->
            <!-- Nav Item - Utilities Collapse Menu -->
           <!-- Nav Item - Utilities Collapse Menu 
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
            </li>-->

            <!-- Nav Item - Pages Collapse Menu -->
                    <li class="nav-item">
                        <a class="nav-link" href="transaction.php">
                            <i class="fas fa-fw fa-table"></i>
                            <span>Liste Agents</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="transaction.php">
                            <i class="fas fa-fw fa-wrench"></i>
                            <span>Liste Opérations</span></a>
                    </li>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            
            

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

                    <!-- Sidebar Toggle (Topbar)
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>
                    -->
                    <!-- Topbar Search 
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) 
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages 
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
                            </div>-->
                       <!-- </li>
                        -->
                        <!-- Nav Item - Alerts 
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>-->
                                <!-- Counter - Alerts 
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>-->
                            <!-- Dropdown - Alerts 
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>-->

                        <!-- Nav Item - Messages 
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>-->
                                <!-- Counter - Messages 
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>-->
                            <!-- Dropdown - Messages 
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="../img/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>-->

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                <?php  echo  $_SESSION['prenomAuth'] . $_SESSION['nomAuth'] ;?> 
                                </span>
                                <img class="img-profile rounded-circle"
                                    src="../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
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
                            Listes des Agents
                             </span>
                             
                            <span class="offset-5" >
                            </a>
                                <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#AjoutClientModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Ajouter Agent
                                </a>
                        </span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%"   cellspacing="0" style="font-size:10px">
                                <thead>
                                        <tr>
                                        <th>ID</th>
                                            <th>Nom</th>
                                            <th>Prenom</th>

                                            <th>login</th>
                                            <th> Password</th>
                                            <th>Adresse</th>
                                            <th>Date_Naissance</th>
                                            <th>Telephone</th>
                                            <th>Email</th>
                                            <th>Genre</th>
                                            <th>Civilité</th>
                                            
                                            <th colspan="2">Actions</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>ID</th>
                                            <th>Nom</th>
                                            <th>Prenom</th>
                                            <th>login</th>
                                            <th> Password</th>
                                            <th>Adresse</th>
                                            <th>Date_Naissance</th>
                                            <th>Telephone</th>
                                            <th>Email</th>
                                            <th>Genre</th>
                                            <th>Civilité</th>
                                           
                                            <th colspan="2">Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody> 
                                        
                                            <!--
      recuperation des données de la base par l'appél de la methode
      getUsers de la classe UserController 
        --->
       <?php $agentController = new AgentControle(); ?>
       <?php if($agentController->getagent()) : ?>
        <?php foreach($agentController->getagent() as $users) : ?>
      <tr>
      <th><?= $users['idagent'] ?></th>
        <th><?= $users['nom'] ?></th>
        <th><?= $users['prenom'] ?></th>
        <th><?= $users['username'] ?></th>
        <th><?= $users['password'] ?></th>
        <th><?= $users['adresse'] ?></th>
        <th><?= $users['datenaissance'] ?></th>
        <th><?= $users['telephone'] ?></th>
        <th><?= $users['email'] ?></th>
        <th><?= $users['genre'] ?></th>
        <th><?= $users['civilite'] ?></th>
    

          <!-- /.container-fluid 
        <th><a href="#" class="btn btn-info btn-sm"><i class="fa fa-eye"></i>
                                           </th>-->
           <th>    
           <button  style="background:#ffbf00" type="button" class="btn btn-warning btn-sm updateBtn" >  <i class="fas fa-edit" ></i>  </button>
           </th>
           <th>
            <a href="../../../controllers/AddClientController.php?action=suprimer&idclient"   class="btn btn-danger btn-sm"> <i class="fa fa-trash "></i></a>
            </th>
            </tr>
      
      <?php endforeach; ?>
        <?php endif; ?>
                                        
                                     </tbody>
                                   
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
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

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Rire ce notice?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Etes vous sure de vouloir fermer votre session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Retour</button>
                    <a class="btn btn-primary" href="../../../logout.php">Deconnexion</a>
                </div>
            </div>
        </div>
    </div>

 <!-- formulaire modifier client --->
 <div class="modal fade" id="modiClientModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"s
        aria-hidden="true">
        <div class="modal-dialog" style="max-width: 75%;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modifier Informations Agent!</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body ">
                <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-2">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block ">
                        <img src="https://www.laposterecrute.fr/sites/default/files/_50973.jpg" alt="" width="390" height="340">
                    </div>


                    <div class="col-lg-7"> 
                        <div class="p-5">
                            <form class="user" action="../../../controllers/agent/addagent.php" method="POST"
                            >  


                            <input type="hidden" name="updateId" id="updateId">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="FirstName"
                                        name="FirstName" >
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text"  class="form-control form-control-user" id="LastName"
                                           name="LastName"  >
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="login"
                                        name="login" >
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text"  class="form-control form-control-user" id="motpasse"
                                           name="motpasse"  >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="Adresse" class="form-control form-control-user" id="Adresse"
                                           >
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="DateNaissance"
                                        name="DateNaissance" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="Telephone"
                                        name="Telephone" >
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="email" class="form-control form-control-user" id="Email"
                                        name="Email" >
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        
                                        <input type="text"  class="form-control form-control-user" id="genre" name="genre">
                                       
                                        
                                        
                                    </div>
                                    <div class="col-sm-6">
                                        

                                    <input   type="text" class="form-control form-control-user" id="Civ"  name="Civ"  >
                            


                                     
                                     
                                    </div>
                                </div>
                                <hr class="sidebar-divider">
                                <br>
                                <div class="form-group">
					          <!--<button type="submit" class="btn btn-primary btn-user btn-block" name="ajouter">Enregistrer 
                             <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i></button>
-->
                             <button type="submit" class="btn btn-primary" name="updateData">Save Changes</button>
				               </div>
                                   
                                
                                
                                <!--
                                <a class="btn btn-primary btn-user btn-block" href="#" data-toggle="modal" data-target="#AjoutCompteModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Valier et Continuer
                                </a> 
-->


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
    <!-- formulaire modifieragent --->










    <!-- formulaire ajouter client --->
    <div class="modal fade" id="AjoutClientModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"s
        aria-hidden="true">
        <div class="modal-dialog" style="max-width: 75%;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modifier Agent!</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body ">
                <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-2">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block ">
                        <img src="https://www.laposterecrute.fr/sites/default/files/_50973.jpg" alt="" width="390" height="340">
                    </div>


                    <div class="col-lg-7"> 
                        <div class="card-body bg-dark text-white">
                            <form class="user" action="../../../controllers/agent/addagent.php" method="POST"
                            >  
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                        name="prenom" placeholder="Prenom">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text"  class="form-control form-control-user" id="exampleLastName"
                                           name="nom"  placeholder="Nom">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="examplelogin"
                                        name="login" placeholder="login">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text"  class="form-control form-control-user" id="examplemotpasse"
                                           name="motpasse"  placeholder="mot de passe">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="Adresse" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Adresse">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="date" class="form-control form-control-user" id="exampleLastName"
                                        name="DateNaissance" placeholder="dateNaissance">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                        name="Telephone" placeholder="Telephone">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                        name="Email" placeholder="Adresse Email">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        
                                        <select name="genre" class="form-control"  required >
                                        <option value="0" selected> Genre </option>
                                        <option value="masculin" >Masculin</option>
                                                    <option value="feminine">Feminine</option>


                                       
                                        
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        

                                        <select name="Civ" class="form-control" id="exampleFormControlSelect1" required >
                                        <option value="0" selected>Situation matrimoniale</option>
                                        <option value="Marié">Marié</option>
                                        <option value="Célibataire">Célibataire</option>


                                        </select>
                                     
                                    </div>
                                </div>
                                <hr class="sidebar-divider">
                                <br>
                                <div class="form-group">
					         <button type="submit" class="btn btn-primary btn-user btn-block" name="ajouter">Enregistrer 
                             <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i></button>
				               </div>
                                   
                                
                                
                                <!--
                                <a class="btn btn-primary btn-user btn-block" href="#" data-toggle="modal" data-target="#AjoutCompteModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Valier et Continuer
                                </a> 
-->


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
    <!-- formulaire compte client --->
    <div class="modal fade" id="AjoutCompteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"s
        aria-hidden="true">
        <div class="modal-dialog" style="max-width: 75%;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Creer Compte Client!</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body ">
                <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-2">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block">
                               <img src="https://www.laposterecrute.fr/sites/default/files/_50973.jpg" alt="" width="390" height="350">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-4">
                                    
                                    <form class="user">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Numero Compte">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="solde">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Type Compte">
                                        </div>
                                        <div class="form-group">
                                            <input type="date" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Date Creation">
                                        </div>
                                        <hr class="sidebar-divider">
                                        <a href="accueilAgent.php" class="btn btn-primary btn-user btn-block">
                                            Valider
                                        </a>
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
    




  <script src="http://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
    integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>
  <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>

  <script>
    $(document).ready(function () {
      $('.updateBtn').on('click', function(){

        $('#modiClientModal').modal('show');

        // Get the table row data.
        $tr = $(this).closest('tr');

        var data = $tr.children("th").map(function() {
            return $(this).text();
        }).get();

        console.log(data);

        $('#updateId').val(data[0]);
        $('#FirstName').val(data[1]);
       
        $('#LastName').val(data[2]);
        $('#login').val(data[3]);
        $('#motpasse').val(data[4]);
        $('#Adresse').val(data[5]);
        $('#DateNaissance').val(data[6]);
        $('#Telephone').val(data[7]);
        $('#Email').val(data[8]); 
        $('#genre').val(data[9]);
        $('#Civ').val(data[10]);      

        });
        
    });
  </script>


</body>

</html>