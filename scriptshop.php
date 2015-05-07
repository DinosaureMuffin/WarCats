<?php
    require_once('include/connect.php');
    require_once('include/data_user.php');
    $id_a_chat = $_POST['id'];
    $nom_du_stuff = $_POST['nom'];
    $croquettes = $_POST['prix'];
    if($argent >= $croquettes){
      //Requete qui change le stuff de l'utilisateur
      $sql_a_chat = "UPDATE
                      `personnages`
                     SET
                       `plastron`='".$id_a_chat."'
                     WHERE
                        `pseudo`='".$pseudo."'        
                       ;";
      if ($result_a_chat = $db->query($sql_a_chat)){
        $argent -= $croquettes;
      //Requete qui change l'argent de l'utilisateur
        $sql_soustraction = "UPDATE
                              `personnages`
                             SET
                               `gold`='".$argent."'
                             WHERE
                                `pseudo`='".$pseudo."'     
                               ;";
        if (!($result = $db->query($sql_soustraction))){
            die('erreur sql_soustraction');
        }
      } else {
        die ('Erreur de Requete SQL (sql achat)');
      }
    }  header('Location: shop.php');
