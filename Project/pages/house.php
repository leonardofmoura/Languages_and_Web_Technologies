<?php 
include_once('../config.php');
include_once(ROOT . 'templates/common/header.php');
include_once(ROOT.'templates/common/footer.php');
include_once(ROOT.'templates/common/loginForm.php');
include_once(ROOT . 'templates/drawTemplate.php');
include_once(ROOT . 'database/db_users.php');
include_once(ROOT . 'database/db_houses.php');

if (!isset($_SESSION['username'])) {
  header('Location: ../pages/home.php');
  die;
}

$user = getUser($_SESSION['username']);

renderPage(array('house'),array(),function() use ($user) {
  $houses = getLandlordHouses($user['id']);
  $houseIndex = 0; //will be incremented to cyvle trough houses
  ?>
  <div class="house-carousel">
    <div class="image-changer">
      <p>&larr;</p>
    </div>
    <div class="image-wrapper">
      <img class="house-image" src="../house.jpg" alt="House image">
    </div>
    <div class="image-changer">
      <p>&rarr;</p>
    </div>
  </div>
  <div class="house-content-wrapper">
    <div class="house-information">
      <h1>House <?= $houses[$houseIndex]['houseID'] ?></h1>
      <p>Rating</p>
      <p><?= $houses[$houseIndex]['pricePerNight'] ?>€ per night</p>
    </div>
  
    <ul class="content-tabs" >
      <li class="selected-tab" id="description-tab">Description</li>
      <li id="reviews-tab">Reviews</li>
    </ul>
  
    <!-- only description for now -->
    <section class="tabbed-content" > 
      <div>
        <p><?= $houses[$houseIndex]['description'] ?></p>
      </div>
    </section>
  </div>
<?php } ); ?>

