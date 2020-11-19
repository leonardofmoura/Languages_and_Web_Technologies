<?php
include_once(ROOT . 'templates/common/header.php');
include_once(ROOT . 'templates/common/footer.php');
include_once(ROOT . 'templates/common/loginForm.php');
include_once(ROOT . 'includes/session.php');

function renderPage($stylesheets = array(), $scripts = array(), $rendererFunc)
{ ?>
  <!DOCTYPE html>
  <html>

  <head>
    <title>Villat</title>
    <meta charset="utf-8" />

    <link rel="stylesheet" href="../stylesheets/palette.css">
    <link rel="stylesheet" href="../stylesheets/common.css">
    <link rel="stylesheet" href="../stylesheets/topbar.css">
    <link rel="stylesheet" href="../stylesheets/login.css">
    <link rel="stylesheet" href="../stylesheets/footer.css">
    <link rel="stylesheet" href="../stylesheets/forms.css">
    <link rel="stylesheet" href="../stylesheets/elements/button.css">

    <?php if (!isset($_SESSION['username'])) { ?>
      <script src="../javascript/login.js" defer></script>
    <?php } ?>

    <?php foreach ($stylesheets as $stylesheet) { ?>
      <link rel="stylesheet" href="../stylesheets/<?= $stylesheet ?>.css">
    <?php } ?>

    <?php foreach ($scripts as $script) { ?>
      <script src="../javascript/<?= $script ?>.js" defer></script>
    <?php } ?>
  </head>

  <body>

    <?php draw_header(); ?>
    <main class="main-content">
      
      <?php $rendererFunc(); ?>
      
    </main>
    <?php draw_footer(); ?>

    <?php if (!isset($_SESSION['username'])) {
        draw_login_form();
      } ?>

  </body>

  </html>
<?php } ?>