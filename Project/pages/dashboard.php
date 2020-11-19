<?php 
include_once('../config.php');
include_once(ROOT . 'includes/session.php');
include_once(ROOT . 'templates/drawTemplate.php');
include_once(ROOT . 'database/db_houses.php');
include_once(ROOT . 'database/db_users.php');

if (!isset($_SESSION['username'])) {
    header('Location: home.php');
    die;
}

$user = getUser($_SESSION['username']);
$houses = getLandlordHouses($user['id']);

renderPage(array('dashboard'), array(), function() use($houses) { ?>
    <h1>Dashboard</h1>
    <a href="../pages/add_house.php">
        <button>
            Post a house
        </button>
    </a>
    <section class="dashboard-houses">
    <?php 
    foreach ($houses as $house) {
    ?>
        <a href="house_reservations.php?id=<?= $house['houseID'] ?>">
            <div class="dashboard-card">
                <h2 class="dashboard-card-title"><?=$house['title'] ?></h2>
                <div class="dashboard-card-main-info">
                    <p class="dashboard-card-rating"><?=$house['avgRating'] ?> &star;</p>
                    <p class="dashboard-card-price"><?=$house['pricePerNight']?>$/night. </p>
                </div>
                <p class="dashboard-card-address"><?=$house['address'] ?></p>
                <p class="dashboard-card-description"><?=$house['description'] ?></p>
            </div>
        </a>
    <?php } ?>
    </section>
<?php }); ?>