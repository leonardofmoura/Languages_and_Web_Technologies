<?php
include_once(ROOT . 'database/db_houses.php');

function draw_house_cards() {
  $houses = getHouseInfo();

  foreach ($houses as $house) {
    draw_house_card($house);
  }
} 
?>


<?php function draw_house_card($house) { ?>
    <div class="house-card">
      <div class="card-thumbnail"></div>
      <div class="card-info">
        <h3>House <?= $house['houseID'] ?></h3>
        <p><?= $house['description'] ?></p>
      </div>
  </div>
<?php } ?>