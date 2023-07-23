
<?php 
// require_once("server.php");
// $id = $_GET["id"]; 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>PATHLOSS MODEL SOFTWARE</title>
    <?php
        include('./include/header.html');
    ?>
    
    <style>
        /* CSS for the card content */
.card-content {
    font-size: 16px;
    color: #444;
    max-height: 50px; /* Set the maximum height you want to show initially */
    overflow: hidden;
}

.show-more-btn {
    display: none;
  }

  .show-less-btn {
    display: none;
  }
    </style>
</head>
 

<body>

    <?php
        include('./include/sidebar.html');
    ?>

    <div class="main">
        <?php
            include('./include/navbar.html');
            include('./include/loading.html');
        ?>
        
        <div id="quickAccesses">
            <div class="widthMaintainer access-cards">

                <!-- <a href="index.php" class="access-card d-flex a-center j-center">
                    <h3 class="access-header text-green fw-bold text-center">E-Learning</h3>
                </a> -->

                <!-- <a href="okumura.php" class="d-flex a-center j-center"> -->
                    <!-- <div class="card a-center j-center"> -->
                    <div class="card">
                        <img class="card-img" src="./assets/img/hataokumura.png" alt="Card Image">
                        <div class="card-title access-header text-green fw-bold">Okumura-Hata</div>
                        <div class="card-content">
                            The Hata Model for Urban Areas (also known as the Okumura-Hata model), is a widely used propagation model for predicting path loss in urban areas. This model takes into account the effects of diffraction, reflection and scattering caused by city structures.                    
                        </div>
                        <button class="show-more-btn mt-,1" style="border-radius:20px; padding:3px; background-color:red;">Read More</button>
                        <button class="show-less-btn">Show Less</button>
                        <a href="okumura.php" class="d-flex a-center j-center">
                            <button class="card-button">RUN MODEL</button>
                        </a>
                    </div>
                

                
                    <div class="card">
                        <img class="card-img" src="./assets/img/freespace.png" alt="Card Image">
                        <div class="card-title access-header text-green fw-bold">Free-Space Model</div>
                        <div class="card-content">
                        The free space propagation model is used to predict received signal strength when the transmitter and receiver have a clear, unobstructed line-of-sight path between them. Satellite communication systems and microwave line-of-sight radio links typically undergo free space propagation.
                        </div>
                        <button class="show-more-btn mt-,1" style="border-radius:20px; padding:3px; background-color:red;">Read More</button>
                        <button class="show-less-btn">Show Less</button>
                        <a href="freespace.php" class="d-flex a-center j-center">
                            <button class="card-button">RUN MODEL</button>
                        </a>
                    </div>
                

                
                    <div class="card">
                        <img class="card-img" src="./assets/img/logdistance.png" alt="Card Image">
                        <div class="card-title access-header text-green fw-bold">Log-Distance</div>
                        <div class="card-content">
                        The log-distance path loss model is a radio propagation model that predicts the path loss a signal encounters inside a building or densely populated areas over distance.                    
                        </div>
                        <button class="show-more-btn mt-,1" style="border-radius:20px; padding:3px; background-color:red;">Read More</button>
                        <button class="show-less-btn">Show Less</button>
                        <a href="log-distance.php" class="d-flex a-center j-center">
                            <button class="card-button">RUN MODEL</button>
                        </a>
                    </div>
                

                
                    <div class="card">
                        <img class="card-img" src="./assets/img/cost231.png" alt="Card Image">
                        <div class="card-title access-header text-green fw-bold">Cost 231 Hata</div>
                        <div class="card-content">
                            The COST Hata model is a radio propagation model (i.e. path loss) that extends the urban Hata model (which in turn is based on the Okumura model) to cover a more elaborated range of frequencies (up to 2 GHz).    
                        </div>
                        <button class="show-more-btn mt-,1" style="border-radius:20px; padding:3px; background-color:red;">Read More</button>
                        <button class="show-less-btn">Show Less</button>
                        <a href="cost231.php" class="d-flex a-center j-center">
                            <button class="card-button">RUN MODEL</button>
                        </a>
                    </div>
                
                 
                
                    <div class="card">
                        <img class="card-img" src="./assets/img/cost231walf.png" alt="Card Image">
                        <div class="card-title access-header text-green fw-bold">COST 231 Walfisch-Ikegami</div>
                        <div class="card-content">
                            COST 231 Walfisch-Ikegami Model. This is an empirical model as described in COST 231 (extended Walfisch-Ikegami-model) which takes into account several parameters out of the vertical building profile for the path loss prediction.
                        </div>
                        <button class="show-more-btn mt-,1" style="border-radius:20px; padding:3px; background-color:red;">Read More</button>
                        <button class="show-less-btn">Show Less</button>
                        <a href="walfisch.php" class="d-flex a-center j-center">
                            <button class="card-button">RUN MODEL</button>
                        </a>
                    </div>
                

                
                    <div class="card">
                        <img class="card-img" src="./assets/img/sui1.jfif" alt="Card Image">
                        <h3 class="card-title access-header text-green fw-bold">SUI-1 Model</h3>
                        <div class="card-content">
                            The SUI model is designed for predicting path loss in urban, suburban, and rural environments. It takes into account a wide range of parameters, including frequency, distance, and various environmental conditions.                    
                        </div>
                        <button class="show-more-btn mt-,1" style="border-radius:20px; padding:3px; background-color:red;">Read More</button>
                        <button class="show-less-btn">Show Less</button>
                        <a href="sui-1.php" class="d-flex a-center j-center">
                            <button class="card-button">RUN MODEL</button>
                        </a>
                    </div>
                
               
                
            </div>
            <?php
                include('./include/footer.html');
            ?>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const cardContent = document.querySelector('.card-content');
        const showMoreBtn = document.querySelector('.show-more-btn');
        const showLessBtn = document.querySelector('.show-less-btn');

        // Show the "Read More" button if the content exceeds the max-height
        if (cardContent.scrollHeight > cardContent.clientHeight) {
        showMoreBtn.style.display = 'block';
        }

        // Toggle the content visibility when clicking "Read More" or "Show Less" buttons
        showMoreBtn.addEventListener('click', function() {
        cardContent.style.maxHeight = 'none';
        showMoreBtn.style.display = 'none';
        showLessBtn.style.display = 'block';
        });

        showLessBtn.addEventListener('click', function() {
        cardContent.style.maxHeight = '50px'; // Set the max height back to the initial value
        showMoreBtn.style.display = 'block';
        showLessBtn.style.display = 'none';
        });
    });
    </script>
    
  <!-- Inclusion of JavaScript Code -->
  <?php
    include('./include/js.html');
  ?>
</body>
</html>