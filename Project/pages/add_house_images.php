<?php 
include_once('../config.php');
include_once(ROOT . 'templates/drawTemplate.php');
include_once(ROOT . 'includes/session.php');

if (!isset($_SESSION['username'])) {
    header('Location: ../pages/home.php');
    die;
}

renderPage(array(), array(), function() { ?>
    <h1>Add images to your house</h1>
    <form id="house-images" action="../actions/action_addPhotos.php" method="post" enctype="multipart/form-data">
        <input type="file" name="images[]" id="images" multiple>

        <input type="submit" value="Submit">
    </form>
<?php });

?>