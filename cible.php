<?php
define("NAMEDB",     "mysql:host=localhost;dbname=forum");
define("IDENTIFIANTDB",     "root");
define("MDPDB",     "");

try
{
    $bdd = new PDO(NAMEDB, IDENTIFIANTDB, MDPDB);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}


include("enregistrement_utilisateur.php");
include("enregistrement_post_topic.php");
include("modification_donee.php");
include("suppression.php");