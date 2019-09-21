<?php
    include "../controllers/clubController.php";
    include '../configuration/header.php';
    $id = null;
    if (!empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

    if (null === $id) {
        header('Location: index.php');
    }

    if (!empty($_POST)) {
        $id = $_POST['id'];

        $controller = new ClubController;
        $controller->delete($id);

        header('Location: index.php');
    }

    
?>


<div class="container">
    <div class="row">
        <h3>Supprimer un club</h3>
    </div>

    <div class="row">
        <form class="form-horizontal" action="delete.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <p class="bg-danger alert">Confirmeation de supprission d'un Club !</p>
            <div class="form-group">
                <div class="col-sm-12 text-center">
                    <button type="submit" class="btn btn-danger">Confirmer</button>
                    <a class="btn btn-default" href="index.php">Annuler</a>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include '../configuration/footer.php'; ?>