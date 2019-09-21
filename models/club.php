<?php
class Club
{
    // properties declaration
    private $id;
    function getId()
    {
        return $this->id;
    }
    function setId($id)
    {
        $this->id = $id;
    }
    private $nom;
    function getNom()
    {
        return $this->nom;
    }
    function setNom($nom)
    {
        $this->nom = $nom;
    }
    private $description;
    function getDescription()
    {
        return $this->description;
    }
    function setDescription($description)
    {
        $this->description = $description;
    }
    private $adresse;
    function getAdresse()
    {
        return $this->adresse;
    }
    function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }
    private $domaine;
    function getDomaine()
    {
        return $this->domaine;
    }
    function setDomaine($domaine)
    {
        $this->domaine = $domaine;
    }

    //consturctor
    function __construct($id, $nom, $description, $adresse, $domaine)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->adresse = $adresse;
        $this->domaine = $domaine;
    }
    function afficherClub()
    {

     
        echo     '<td>' . $this->getId() . '</td>';
        echo     '<td>' . $this->getNom() . '</td>';
        echo     '<td>' . $this->getDescription() . '</td>';
        echo     '<td>' . $this->getAdresse() . '</td>';
        echo     '<td>' . $this->getDomaine() . '</td>';
   

    }
}
?>
