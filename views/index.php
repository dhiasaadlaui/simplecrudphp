

<?php 
require '../configuration/header.php';
include "../controllers/clubController.php";
?>

<div class="container">
<div class="page-header">
  <h1>Gestion des clubs <small>Espr<label style="color:brown">it</label></small></h1>
</div>
    <div class="row">
        <p><a href="create.php" class="btn btn-success">Ajouter</a></p>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th>Identifiant</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Adresse</th>
                    <th>Domaine</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    

                    $controller = new ClubController;
                    $list = $controller->findAll();
                    


                    if(sizeof($list) > 0) {

                        
                        foreach ($list as &$value) {
                      
                            echo '<tr>';
                            echo '<td>'. $value->getId() . '</td>' . PHP_EOL;
                            echo '<td>'. $value->getNom() . '</td>' . PHP_EOL;
                            echo '<td>'. $value->getDescription() . '</td>' . PHP_EOL;
                            echo '<td>'. $value->getAdresse() . '</td>' . PHP_EOL;
                            echo '<td>'. $value->getDomaine() . '</td>' . PHP_EOL;
                            echo '<td>' . PHP_EOL;
                            echo '<a class="btn btn-primary" href="read.php?id='.$value->getId().'">Details</a>' . PHP_EOL;
                            echo '<a class="btn btn-success" href="update.php?id='.$value->getId().'">Mise à jour</a>' . PHP_EOL;
                            echo '<a class="btn btn-danger" href="delete.php?id='.$value->getId().'">Supprimer</a>' . PHP_EOL;
                            echo '</td>' . PHP_EOL;
                            echo '</tr>' . PHP_EOL;
                        }
                    } else {
                        echo '<tr>';
                        echo '<td>Nothing here...</td>' . PHP_EOL;
                        echo '<td>Nothing here...</td>' . PHP_EOL;
                        echo '<td>Nothing here...</td>' . PHP_EOL;
                        echo '<td>Nothing here...</td>' . PHP_EOL;
                        echo '<td>Nothing here...</td>' . PHP_EOL;
                        echo '</tr>';
                    }

                 
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php require '../configuration/footer.php'; ?>