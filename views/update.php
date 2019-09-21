<?php
    include '../controllers/clubController.php';

    $id = null;
    $club = null;
    if (!empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

    if (null === $id) {
        header('Location: index.php');
    }

    if (!empty($_POST)) {
        $nomError = null;
        $descriptionError = null;
        $adresseError = null;
        $domaineError = null;

        $nom = $_POST['nom'];
        $description = $_POST['description'];
        $adresse = $_POST['adresse'];
        $domaine = $_POST['domaine'];

        $valid = true;

        if (empty($nom)) {
            $nomError = 'Veuillez saisir le nom';
            $valid = false;
        }

        if (empty($description)) {
            $descriptionError = 'Veuillez saisir la description';
            $valid = false;
        }

        if (empty($adresse)) {
            $adresseError = 'Veuillez saisir une adresse ';
            $valid = false;
        }

        if (empty($domaine)) {
            $domaineError = 'Veuillez saisir le domaine';
            $valid = false;
        }

        if ($valid) {
            $club = new Club($id,$nom,$description,$adresse,$domaine);
            $controller = new ClubController;
            $club = $controller->update($club);
            header('Location: index.php');
        }
    } else {
        $controller = new ClubController;
        $club = $controller->findById($id);
        $nom = $club->getNom();
        $description = $club->getDescription();
        $adresse = $club->getAdresse();
        $domaine = $club->getDomaine();
    }

    require '../configuration/header.php';
?>

<div class="container">
    <div class="row">
        <h3>Mis à jour d'un club</h3>
    </div>

    <div class="row">
        <form class="form-horizontal" action="update.php?id=<?php echo $id; ?>" method="post">
            <div class="form-group <?php echo !empty($nomError) ? 'has-error' : ''; ?>">
                <label class="col-sm-2 control-label">Nom</label>
                <div class="controls col-sm-6">
                    <input class="form-control" name="nom" type="text" placeholder="Nom" value="<?php echo !empty($nom) ? $nom : ''; ?>">
                    <?php if (!empty($nomError)): ?>
                        <span class="help-inline"><?php echo $nomError;?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-group <?php echo !empty($descriptionError) ? 'has-error' : ''; ?>">
                <label class="col-sm-2 control-label">Description</label>
                <div class="controls col-sm-6">
                    <input class="form-control" name="description" type="text" placeholder="Description" value="<?php echo !empty($description) ? $description : ''; ?>">
                    <?php if (!empty($descriptionError)): ?>
                        <span class="help-inline"><?php echo $descriptionError;?></span>
                    <?php endif;?>
                </div>
            </div>
            <div class="form-group <?php echo !empty($adresseError) ? 'has-error' : ''; ?>">
                <label class="col-sm-2 control-label">Adresse</label>
                <div class="controls col-sm-6">
                    <input class="form-control" name="adresse" type="text" placeholder="Adresse" value="<?php echo !empty($adresse) ? $adresse : ''; ?>">
                    <?php if (!empty($adresseError)): ?>
                        <span class="help-inline"><?php echo $adresseError;?></span>
                    <?php endif;?>
                </div>
            </div>

            <div class="form-group <?php echo !empty($domaineError) ? 'has-error' : ''; ?>">
                <label class="col-sm-2 control-label">Domaine</label>
                <div class="controls col-sm-6">
                    <input class="form-control" name="domaine" type="text" placeholder="Domaine" value="<?php echo !empty($domaine) ? $domaine : ''; ?>">
                    <?php if (!empty($domaineError)): ?>
                        <span class="help-inline"><?php echo $domaineError;?></span>
                    <?php endif;?>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Enregistrer</button>
                    <a class="btn btn-default" href="index.php">Annuler</a>
                </div>
            </div>
        </form>
    </div>
</div>

<?php require '../configuration/footer.php'; ?>