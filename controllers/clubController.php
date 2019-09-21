<?php
include "../models/club.php";
include '../configuration/config.php';
class ClubController
{
    function __construct()
    {
    }
  
    function insert(Club $club){
        $pdo = Config::getConnexion();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'INSERT INTO club  (nom, description, adresse, domaine) values(?, ?, ?, ?)';
        $q = $pdo->prepare($sql);
        $q->execute(array($club->getNom(), $club->getDescription(), $club->getAdresse(), $club->getDomaine()));
    }

    function delete($id){
        $pdo = Config::getConnexion();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $q = $pdo->prepare('DELETE FROM club WHERE id = ?');
        $q->execute(array($id));

    }


    function update(Club $club){

        $pdo = Config::getConnexion();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $q = $pdo->prepare('UPDATE club set nom = ?, description = ?, adresse = ?, domaine = ? WHERE id = ?');
        $q->execute(array($club->getNom(), $club->getDescription(), $club->getAdresse(), $club->getDomaine(), $club->getId()));
     
    }
   
    function findById($id){
        $pdo = Config::getConnexion();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $q = $pdo->prepare('SELECT * FROM club where id = ?');
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $club =new Club($data["id"], $data["nom"], $data["description"], $data["adresse"], $data["domaine"]);
        return $club;

    }

    function findAll(){
        $list = array();
        $pdo = Config::getConnexion();
        $getClubs = $pdo->prepare('SELECT * FROM club ORDER BY id DESC');
        $getClubs->execute();

        if($getClubs->rowCount() > 0) {
            while ($row = $getClubs->fetch()) {
                $club = new Club($row["id"], $row["nom"], $row["description"], $row["adresse"], $row["domaine"]);
          
                array_push($list, $club);
            }
        }
        return $list;
    
        

    }

}

?>