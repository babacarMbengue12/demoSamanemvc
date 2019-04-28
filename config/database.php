<?php
/*==================================================
    MODELE MVC DEVELOPPE PAR Ngor SECK
    ngorsecka@gmail.com
    (+221) 77 - 433 - 97 - 16
    PERFECTIONNEZ CE MODELE ET FAITES MOI UN RETOUR
    POUR TOUTE MODIFICATION VISANT A AMELIORER
    CE DERNIER (GIT).
    VOUS ETES LIBRE DE TOUTE UTILISATION.
  ===================================================*/
    /**
     * PDO ou ORM
     */
    $choix = "ORM";
    /** 
     * metter à on pour demarrer la base
     */
    $etat = 'on'; //on oubien off

    $pdo = array(
                    'host' => '127.0.0.1',
                    'user' => 'root',
                    'password' => 'babacar',
                    'database_name' => 'samane_test',//change le nom de la base
      );
    
    $orm = array(
                  'dbname' => 'samane_test',//change le nom de la base
                  'user'     => 'root',
                  'password' => 'babacar',
                  'host' => '127.0.0.1',
                  'driver' => 'pdo_mysql',
    );
?>