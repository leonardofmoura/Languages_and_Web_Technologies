<?php 
include_once('../config.php');
include_once(ROOT . 'templates/drawTemplate.php');

renderPage(array(), array(), function() { ?>
    <form id="house-form" action="../actions/action_addHouse.php" method="post">
        <label class="block-label" for="title">House Title</label>
        <input class="text-input" type="text" name="title" id="title" required>

        <label class="block-label" for="pricePerNight">Price per night</label>
        <input class="text-input" type="number" name="pricePerNight" id="price" required>

        <label class="block-label" for="area">Area of the house</label>
        <input class="text-input" type="number" name="area" id="area" required>

        <label class="block-label" for="address">Address</label>
        <input class="text-input" type="text" name="address" id="address" required>

        <label class="block-label" for="capacity">Number of people</label>
        <input class="text-input" type="number" name="capacity" id="capacity" required>

        <label class="block-label" for="description">Description</label>
        <textarea class="text-input" name="description" id="description" cols="50" rows="10"></textarea>

        <input type="submit" value="Submit">
    </form>
<?php });

?>