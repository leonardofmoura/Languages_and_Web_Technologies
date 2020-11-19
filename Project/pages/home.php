<?php
include_once('../config.php');
include_once(ROOT . 'templates/drawTemplate.php');
include_once(ROOT . 'templates/common/header.php');
include_once(ROOT . 'templates/common/footer.php');
include_once(ROOT . 'templates/common/house_card.php');
include_once(ROOT . 'templates/common/loginForm.php');
?>


<!DOCTYPE html>
<html>

<head>
  <title>Villat</title>
  <meta charset="utf-8" />

  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../stylesheets/palette.css">
  <link rel="stylesheet" href="../stylesheets/common.css">
  <link rel="stylesheet" href="../stylesheets/topbar.css">
  <link rel="stylesheet" href="../stylesheets/forms.css">
  <link rel="stylesheet" href="../stylesheets/login.css">
  <link rel="stylesheet" href="../stylesheets/footer.css">
  <link rel="stylesheet" href="../stylesheets/button.css">
  <script src="../javascript/login.js" defer></script>

  <link rel="stylesheet" href="../stylesheets/index.css">
</head>

<body>

  <?php draw_header(); ?>
  <main class="main-content">

    <section class="filter-renderer">
      <div class="search-form-container">
        <form class="filter-form" action="#" method="GET">
          <div class="search-field-container">
            <input class="search-field" type="text" id="search" placeholder="Search">
          </div>
          <input class="submit-button" type="button" value="Search">
        </form>
      </div>
    </section>

    <section class="houses-display">
      <?php draw_house_cards(); ?>
    </section>

  </main>
  <?php draw_footer(); ?>

  <?php draw_login_form(); ?>

</body>

</html>