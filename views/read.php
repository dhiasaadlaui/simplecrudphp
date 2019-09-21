<?php
    include "../controllers/clubController.php";

    $club = null;
    $id = null;
    if (!empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

    if (null === $id) {
        header('Location: index.php');
    } else {
        $controller = new ClubController;
        $club = $controller->findById($id);
    }
    if (null === $club) {
        header('Location: index.php');
    }

    require '../configuration/header.php';
?>

<div class="container">
    <div class="row">
        <h3>Details d'un club</h3>
    </div>

    <div class="row">
        <div class="form-horizontal">
            <div class="form-group">
                <label class="col-sm-2 control-label">Nom</label>
                <p class="checkbox col-sm-6">
                    <?php echo $club->getNom();?>
                </p>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Description</label>
                <p class="checkbox col-sm-6">
                    <?php echo $club->getDescription();?>
                </p>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Adresse</label>
                <p class="checkbox col-sm-6">
                    <?php echo $club->getAdresse();?>
                </p>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Domaine</label>
                <p class="checkbox col-sm-6">
                    <?php echo $club->getDomaine();?>
                </p>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <a class="btn btn-default" href="index.php">Retour</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require '../configuration/footer.php'; ?>