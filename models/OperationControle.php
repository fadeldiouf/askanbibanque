
$idagent=$_SESSION['idAuth'];
                $sql="SELECT nom,prenom, num_compte ,o.idagent,idtype,o.idcompte,dateoperation,credit,debite,envoie,recue 
                 from client l, operation o,compte c where  l.idclient=c.idclient 
                and o.idcompte=c.idcompte and o.idagent=:idagent  order by dateoperation desc";
                $stmt=$con->connect()->prepare($sql);
                $stmt->bindValue(':idagent',$idagent,PDO::PARAM_STR);
                 while($resultat = $stmt->fetchAll()){