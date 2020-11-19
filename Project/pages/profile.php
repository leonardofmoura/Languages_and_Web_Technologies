<?php
include_once('../config.php');
include_once(ROOT . 'templates/drawTemplate.php');
include_once(ROOT . 'includes/database.php');
include_once(ROOT . 'database/db_users.php');
include_once(ROOT . 'database/db_houses.php');

if (!isset($_SESSION['username'])) {
  header('Location: ../pages/home.php');
  die;
}

$user = getUser($_SESSION['username']);
$id = $_GET['id'];
  if(!isset($id)){
    //header('Location: ../pages/home.php');
    //die;
    
  }

$user=getUserById($id);

renderPage(
  array('profile'),
  array(),
  function () use ($user) { ?>
  <div class="profile-content">
    <div class="profile-picture-container">
      <img src="../database/profilePictures/<?= $user['profilePicture'] ?>" alt="Profile picture">
    </div>
    <div class="user-details">
      <h1 class="name"><?= $user['firstName'] ?> <?= $user['lastName'] ?></h1>
      <p class="user-email"><?= $user['email'] ?></p>
    </div>
  </div>
  <?php if (!isLandlord($user['id'])) { ?>
    <a href="../actions/action_register_landlord.php">Register this account as landlord.</a>
  <?php } else { ?>
    <section class="landlord-houses">
      <a id="add-house-link" href="add_house.php">
        <button>Post a house</button>
      </a>

      <div class="houses-container">
        <?php
            $houses = getLandlordHouses($user['id']);
            foreach ($houses as $house) { ?>
          <div class="house-overview">
            <p><?= $house['title'] ?></p>
            <p><?= $house['pricePerNight'] ?></p>
            <p><?= $house['description'] ?></p>
          </div>
        <?php } ?>
      </div>

    </section>
<?php }
}
);
?>