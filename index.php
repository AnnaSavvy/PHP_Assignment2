<?php
session_start();
require './inc/header.php';
?>

    <main class="hero">
        <section>
            <h2>A new decorative bushes has arrived!</h2>
            <p>Join our community of passionate gardening enthusiasts!<br>
                We exchange seedlings and seeds. You can upload your plants<br>
                for sale and exchange here after registration. Moreover, we provide consultations<br>
                 and useful information on caring for your garden.
            <p><a class="button" href="#features">Click for more information</a></p>
        </section>
        <figure><img src="img/garden.jpg" alt="Garden" width="400">
        </figure>
    </main>

    <div id="features" class="box">
        <?php
        $itemArray = array(array("https://en.wikipedia.org/wiki/Gardening", "gardening", "Gardening secrets", "We will share our many years of experience in successfully growing
                 ornamental and exotic plants in the difficult climate conditions of Canada."),array("https://en.wikipedia.org/wiki/Cottage_garden", "plant", "Discount on seedlings", "We provide our subscribers with a discount on seeds and seedlings of rare plants."),array("https://en.wikipedia.org/wiki/Ornamental_plant", "plant-delivery", "Delivery to your home", "We will deliver your chosen plants and seeds straight to your doorstep."),array("https://en.wikipedia.org/wiki/History_of_gardening", "watering", "Tips for growing", "We will provide detailed growing instructions for each plant you choose,
                     ensuring you get consistently excellent results."));
        for ($i = 0; $i < sizeof($itemArray); $i++) {
            echo '<div class="item item'.$i . '">';
            echo '<a href="'.$itemArray[$i][0].'">';
            echo '<img class=utility_pic src="img/'.$itemArray[$i][1].'.png" alt="plant pot" width="100">';
            echo '<h3>'.$itemArray[$i][2].'</h3><p>'.$itemArray[$i][3].'</p>';
            echo '</a></div>';
        }
        ?>
    </div>
<?php
require './inc/footer.php';
?>