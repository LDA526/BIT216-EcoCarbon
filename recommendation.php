<?php
require_once 'includes/config_session.inc.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>My Dashboard</title>
        <link rel="icon" type="image/png" href="assets/logo.png" />
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
        crossorigin="anonymous"
        />
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        />
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        />
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"/>
        <link rel="stylesheet" href= "style.css" />
        
    </head>

    <?php
    include 'includes/headers/header_merchant.inc.php';
    ?>

    <body>
    <div class="container-fluid pb-5">
        <div class="row">
            <nav class="col-md-2 d-md-block side-menu p-5" style="text-align:center">
                <h5 class="text-center"><?php echo $_SESSION["user_username"] ?>'s Dashboard</h5>
                <hr class="my-3">
                <a>Add Activity</a>
                <a>Profile</a>
                <a>History</a>
                <a>Friends</a>
                <a href = "Recomendation.php">Recommendation</a>
                <a href = "Educationcontent.php">Education content</a>
                    <!-- Add more links as needed -->
            </nav>

            <div class="col-md-8 pt-5">
                <!-- <div class="h3 pb-4 pt-3"> My Products</div> -->
                    <!-- <table class="table">
                        <thead>
                        <tr>
                            <th style='text-align: center; font-weight: 600;'>Product Image</th>
                            <th style='text-align: center; font-weight: 600;'>Product Name</th>
                            <th style='text-align: center; font-weight: 600;'>Category</th>
                            <th style='text-align: center; font-weight: 600;'>Location</th>
                            <th style='text-align: center; font-weight: 600;'>Price</th>
                            <th style='text-align: center; font-weight: 600;'>Description</th>
                            <th style='text-align: center; font-weight: 600;'>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            include 'includes/merchantDash/merchantDash.inc.php';
                            ?>
                        </tbody>
                    </table>
                    <a href="addProducts.php" class="btn btn-primary">Add New Product</a> -->

                    
                <h1>Recommendation</h1>
                <div class="everyblock">
                    <div class="image">
                    <img class="picture" src="assets/Recommendation-assets/EnergyConservation.png">
                    </div>
                    <div class="Recommendation">
                    <p class="title">Energy savings: </p>
                    <p class="tips">Use LED lighting because it is more energy efficient than traditional incandescent lamps.</p>
                    <p class="tips">Turn off appliances that are not in use to avoid standby power consumption. </p>
                    <p class="tips">Clean air conditioning and heating systems regularly to ensure efficient operation.</p>
                    </div>
                </div>

                <div class="everyblock">
                    <div class="image">
                    <img class="picture" src="assets/Recommendation-assets/Sustainablemobility.png">
                    </div>
                    <div class="Recommendation">
                    <p class="title">Sustainable mobility:</p>
                    <p class="tips">Encourage walking, cycling or using public transport and reduce personal car use. </p>
                    <p class="tips">Consider buying an electric car or using a shared electric car service. </p>
                    <p class="tips">Combine multiple travel destinations to reduce miles driven. </p>
                    </div>
                </div>

                <div class="everyblock">
                    <div class="image">
                    <img class="picture" src="assets/Recommendation-assets/WasteManagement.jpg">
                    </div>
                    <div class="Recommendation">
                    <p class="title">Waste management:</p>
                    <p class="tips">promotes recycling, sorting and sending recyclables to recycling stations. </p>
                    <p class="tips">Reduce your use of disposable items and choose products that are biodegradable or recyclable. </p>
                    <p class="tips">Participate in community clean-up activities to raise environmental awareness. </p>
                    </div>
                </div>

                <div class="everyblock">
                    <div class="image">
                    <img class="picture" src="assets/Recommendation-assets/Lowcarbdiet.jpg">
                    </div>
                    <div class="Recommendation">
                    <p class="title">Low-carb diets: </p>
                    <p class="tips">Reduce your meat consumption and try adopting a vegetarian or flexitarian diet. </p>
                    <p class="tips">Buy local and seasonal food to reduce the carbon emissions associated with shipping.</p>
                    <p class="tips">Reduce food waste and plan your food purchases and use wisely. </p>
                    </div>
                </div>
                
                <div class="everyblock">
                    <div class="image">
                    <img class="picture" src="assets/Recommendation-assets/Waterrsourcesmanagement.jpg">
                    </div>
                    <div class="Recommendation">
                    <p class="title">Water management:</p>
                    <p class="tips">Repair faucet and pipe leaks and improve water efficiency. </p>
                    <p class="tips">Use water-saving devices such as low-flow shower heads and dual-flush toilets.</p>
                    <p class="tips">Avoid wasting water. Collect and reuse rainwater as much as possible. </p>
                    </div>
                </div>

                <div class="everyblock">
                    <div class="image">
                    <img class="picture" src="assets/Recommendation-assets/Greenshopping.jpg">
                    </div>
                    <div class="Recommendation">
                    <p class="title">Green shopping: </p>
                    <p class="tips">Choose environmentally friendly products and pay attention to the packaging and production process of the products. </p>
                    <p class="tips">Consider buying used goods to reduce the resources and energy required to manufacture new products.</p>
                    <p class="tips">Support local production and community businesses.</p>
                    </div>
                </div>

            </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"
    >
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="script.js"></script>
    </body>


</html>