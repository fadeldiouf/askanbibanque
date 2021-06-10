// Insert the content of connection.php file
<?php
    include('connection.php');

    // Update data into the database
    if(ISSET($_POST['updateData']))
    {   
        $id = $_POST['updateId'];
        $firstname = $_POST['FirstName'];
        $lastname = $_POST['LastName'];
        $address = $_POST['Adresse'];
        $DateNaissance = $_POST['DateNaissance'];
        $Telephone = $_POST['Telephone'];
        $Email = $_POST['Email'];
        $genre = $_POST['genre'];
        $Civ = $_POST['Civ'];

        $sql = "UPDATE agent SET nom='$firstname',
                                        prenom='$lastname', 
                                        adresse='$address',
                                        dateNaissance='$DateNaissance',
                                        telephone = '$Telephone',
                                        email = '$Email',
                                        genre = '$genre',
                                        civilite = '$Civ'
                                        WHERE idagent='$id'";

        $result = mysqli_query($conn, $sql);

        if($result)
        {
            echo '<script> alert("Data Updated Successfully."); </script>';
            header("Location:../../views/templates/viewGestionAgence/accueilAgence.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>