<?php

require_once "eachitemspage/bkfunction.php";

?>



<?php

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>shopping</title>
  <link rel="stylesheet" href="./css/style.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>

</head>

<style>
  #modal {
    display: none;
  }
</style>

<body class="w-srceen overflow-x-hidden">

  <!-- Start Header  -->
  <?php
  require_once "./headersection.php";
  ?>



  <section class="mt-7">

    <div class="grid grid-cols-2">
      <div class="flex justify-center items-center">
        <div class="w-[500px] h-[590px] border flex justify-center items-center">
          <img src="./assets/img/perfume/men/men1.jpg" alt="" width="500px">
        </div>
      </div>
      <div>


        <div class="mr-10">
          <?php
          if (isset($_GET['items'])) {
            $itemId = intval($_GET['items']);




            if ($itemId === $row['id']) {

              $perfumename = $row["perfume_name"];
              $brandname = $row['brand_name'];
              $mili = $row['mili'];
              $categoryname = $row['category_name'];
              $price = $row['price'];

              echo <<<HTML
              <!-- <form action="" method="post"> -->
              <h1 class="text-3xl">{$perfumename} by {$brandname} EDT 3.3 OZ {$mili} spray for {$categoryname}</h1>
              <p class="mt-3 mb-3 text-sm">Available <span>(In stock)</span></p>
              <span class="text-green-600 font-semibold text-3xl">$ {$price}</span>
              
        
              <div class="flex items-center mt-3">
                  <span id="decrease" class="bg-gray-100 border px-2 py-1 m-1">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                      </svg>
                  </span>
          
                  <span class="w-8 h-8 bg-gray-100 text-[#000] font-semibold shadow drop-shadow-md flex justify-center items-center">
                      <input type="text" name="quantity" id="valueInput" class="w-8 bg-gray-100 focus:outline-none" value=" 1" style="text-align:center;">
                  </span>
          
                  <span id="increase" class="bg-gray-100 border px-2 py-1 m-1">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                      </svg>
                  </span>
              </div>

              <input type="hidden" name="id" value="{$row['id']}">
               <input type="hidden" name="name" value="{$row['perfume_name']}">
               <input type="hidden" name="brandname" value="{$row['brand_name']}">
               <input type="hidden" name="categoryname" value="{$row['category_name']}">
               <input type="hidden" name="price" value="{$row['price']}">


    

               <div class="  flex  items-center mt-3">
                
                   <button type="button" name="addtocart" class="w-32 text-gray-100 bg-gray-500 flex justify-center items-center drop-shadow-lg p-1 hover:drop-shadow-[0_7px_7px_#d4d4d8] hover:opacity-90" id="addtocart" >Add to cart</button>
              </div>

              <div id="alertcart" class="w-96  bg-green-100 flex justify-between items-center mt-3 p-2">
              <!-- <span class="flex justify-start items-center p-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ml-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                </svg>
                <span>Item added to the cart</span>
            </span>
            <a href="shopcartpage.php" class="text-indigo-500 mr-4 hover:text-indigo-700">
                View cart 
            </a>-->
              </div>
          
              <div class="mt-3">
                  <h3 class="font-semibold">Description</h3>
                  <p>{$row['description']}</p>
              </div>
            <!-- </form> -->
          HTML;

            }
          }
          ?>





          <!-- Rating  -->
          <div class="mt-2">
            <div class="flex items-center">
              <h3 class="font-semibold ">Rating</h3>
              <span id="writereview" class="m-3 cursor-pointer" onclick="writereviewfun()">Write review <span>(
                  <?php
                  require_once "database.php";
                  if (isset($_GET['items'])) {
                    $id = $_GET['items'];
                    try {
                      $stmt = $conn->prepare("SELECT * FROM reviewtable WHERE perfume_id = :id");
                      $stmt->bindParam(':id', $id);
                      $stmt->execute();

                      echo $stmt->rowCount();

                    } catch (Exception $e) {
                      echo "Error Found : " . $e->getMessage();
                    }
                  }

                  ?>
                  Review)
                </span></span>
            </div>
            <div class="mb-3">
              <div>
                <span class="text-xl text-yellow-500 font-semibold"><span id="averagerating">
                    <?php
                    require_once "database.php";
                    if (isset($_GET['items'])) {
                      $id = $_GET['items'];
                      try {
                        $stmt = $conn->prepare("SELECT * FROM reviewtable WHERE perfume_id = :id");
                        $stmt->bindParam(':id', $id);
                        $stmt->execute();

                        $totalRowCount = $stmt->rowCount();
                        $totalRatingSum = 0;

                        while ($row = $stmt->fetch()) {
                          $totalRatingSum += $row['userrating'];
                        }

                        // Calculate the average rating
                        $averageRating = ($totalRowCount > 0) ? $totalRatingSum / $totalRowCount : 0;

                        echo ceil($averageRating);

                      } catch (Exception $e) {
                        echo "Error Found : " . $e->getMessage();
                      }
                    }
                    ?>


                  </span>/5.0</span>
              </div>
              <div class="flex  items-center">
                <?php
                require_once "database.php";
                if (isset($_GET['items'])) {
                  $id = $_GET['items'];
                  try {
                    $stmt = $conn->prepare("SELECT * FROM reviewtable WHERE perfume_id = :id");
                    $stmt->bindParam(':id', $id);
                    $stmt->execute();

                    $totalRowCount = $stmt->rowCount();
                    $totalRatingSum = 0;

                    while ($row = $stmt->fetch()) {
                      $totalRatingSum += $row['userrating'];
                    }

                    // Calculate the average rating
                    $averageRating = ($totalRowCount > 0) ? $totalRatingSum / $totalRowCount : 0;
                    $averageStarRatingPercentage = ($averageRating > 0) ? ($averageRating / 5) * 100 : 0;


                    for ($i = 1; $i <= 5; $i++) {
                      echo '<div class="flex  items-center ">
                          <svg xmlns="http://www.w3.org/2000/svg" fill=" ' . (($i <= $averageRating) ? 'yellow' : 'gray') . '" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-4 h-4  mainstar" style="color: ' . (($i <= $averageRating) ? 'rgb(234 179 8)' : 'gray') . '">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                </svg>
                             </div>
                                
                                ';
                    }

                  } catch (Exception $e) {
                    echo "Error Found : " . $e->getMessage();
                  }
                }
                ?>
              </div>
            </div>

            <ul class="">
              <li class="flex items-center">
                <span> 1 </span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="yellow" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="w-4 h-4 text-yellow-500">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                </svg>


                <div class=" w-48 h-3 bg-stone-100 border ml-2 rounded progress-container">
                  <!-- <div class="w-12 h-3 bg-yellow-500 rounded-tl rounded-bl progress" id="one-star-progresss"></div> -->
                  <?php
                  require_once "database.php";
                  if (isset($_GET['items'])) {
                    $id = $_GET['items'];
                    $ratingValue = 1;

                    try {
                      $stmt = $conn->prepare("SELECT * FROM reviewtable WHERE perfume_id = :id");
                      $stmt->bindParam(':id', $id);

                      $ratingStmt = $conn->prepare("SELECT * FROM reviewtable WHERE perfume_id = :id AND userrating = :rating");
                      $ratingStmt->bindParam(':id', $id);
                      $ratingStmt->bindParam(':rating', $ratingValue);
                      $ratingStmt->execute();

                      $stmt->execute();

                      $totalRowCount = $stmt->rowCount();
                      $fiveStarCount = $ratingStmt->rowCount();
                      $percentageWidth = ($totalRowCount > 0) ? ($fiveStarCount / $totalRowCount) * 100 : 0;

                      // echo $percentageWidth;
                  
                      echo '<div class="w-[' . $percentageWidth . '%] h-3 bg-yellow-500 rounded-tl rounded-bl progress" id="five-star-progresss"></div>';

                    } catch (Exception $e) {
                      echo "Error Found : " . $e->getMessage();
                    }
                  }
                  ?>
                </div>
                <div class="progress-label-right">(<span id="total_one_star_review">
                    <?php
                    require_once "database.php";
                    if (isset($_GET['items'])) {
                      $id = $_GET['items'];
                      $rating = 1;
                      try {
                        $stmt = $conn->prepare("SELECT * FROM reviewtable WHERE perfume_id = :id AND userrating = :rating");
                        $stmt->bindParam(':id', $id);
                        $stmt->bindParam(':rating', $rating);
                        $stmt->execute();

                        echo $stmt->rowCount();

                      } catch (Exception $e) {
                        echo "Error Found : " . $e->getMessage();
                      }
                    }

                    ?>
                  </span>)</div>

              </li>

              <li class="flex items-center">
                <span>2</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="yellow" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="w-4 h-4 text-yellow-500">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                </svg>
                <div class=" w-48 h-3 bg-stone-100 border ml-2 rounded progress-container">
                  <!-- <div class="w-12 h-3 bg-yellow-500 rounded-tl rounded-bl progress" id="two-star-progresss"></div> -->
                  <?php
                  require_once "database.php";
                  if (isset($_GET['items'])) {
                    $id = $_GET['items'];
                    $ratingValue = 2;

                    try {
                      $stmt = $conn->prepare("SELECT * FROM reviewtable WHERE perfume_id = :id");
                      $stmt->bindParam(':id', $id);

                      $ratingStmt = $conn->prepare("SELECT * FROM reviewtable WHERE perfume_id = :id AND userrating = :rating");
                      $ratingStmt->bindParam(':id', $id);
                      $ratingStmt->bindParam(':rating', $ratingValue);
                      $ratingStmt->execute();

                      $stmt->execute();

                      $totalRowCount = $stmt->rowCount();
                      $fiveStarCount = $ratingStmt->rowCount();
                      $percentageWidth = ($totalRowCount > 0) ? ($fiveStarCount / $totalRowCount) * 100 : 0;

                      // echo $percentageWidth;
                  
                      echo '<div class="w-[' . $percentageWidth . '%] h-3 bg-yellow-500 rounded-tl rounded-bl progress" id="five-star-progresss"></div>';

                    } catch (Exception $e) {
                      echo "Error Found : " . $e->getMessage();
                    }
                  }
                  ?>
                </div>
                <div class="progress-label-right">(<span id="total_two_star_review">
                    <?php
                    require_once "database.php";
                    if (isset($_GET['items'])) {
                      $id = $_GET['items'];
                      $rating = 2;
                      try {
                        $stmt = $conn->prepare("SELECT * FROM reviewtable WHERE perfume_id = :id AND userrating = :rating");
                        $stmt->bindParam(':id', $id);
                        $stmt->bindParam(':rating', $rating);
                        $stmt->execute();

                        echo $stmt->rowCount();

                      } catch (Exception $e) {
                        echo "Error Found : " . $e->getMessage();
                      }
                    }

                    ?>
                  </span>)</div>

              </li>

              <li class="flex items-center">
                <span>3</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="yellow" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="w-4 h-4 text-yellow-500">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                </svg>
                <div class=" w-48 h-3 bg-stone-100 border ml-2 rounded progress-container">
                  <!-- <div class="w-[30%] h-3 bg-yellow-500 rounded-tl rounded-bl progress" id="three-star-progresss"></div> -->
                  <?php
                  require_once "database.php";
                  if (isset($_GET['items'])) {
                    $id = $_GET['items'];
                    $ratingValue = 3;

                    try {
                      $stmt = $conn->prepare("SELECT * FROM reviewtable WHERE perfume_id = :id");
                      $stmt->bindParam(':id', $id);

                      $ratingStmt = $conn->prepare("SELECT * FROM reviewtable WHERE perfume_id = :id AND userrating = :rating");
                      $ratingStmt->bindParam(':id', $id);
                      $ratingStmt->bindParam(':rating', $ratingValue);
                      $ratingStmt->execute();

                      $stmt->execute();

                      $totalRowCount = $stmt->rowCount();
                      $fiveStarCount = $ratingStmt->rowCount();
                      $percentageWidth = ($totalRowCount > 0) ? ($fiveStarCount / $totalRowCount) * 100 : 0;

                      // echo $percentageWidth;
                  
                      echo '<div class="w-[' . $percentageWidth . '%] h-3 bg-yellow-500 rounded-tl rounded-bl progress" id="five-star-progresss"></div>';

                    } catch (Exception $e) {
                      echo "Error Found : " . $e->getMessage();
                    }
                  }
                  ?>
                </div>
                <div class="progress-label-right">(<span id="total_three_star_review">
                    <?php
                    require_once "database.php";
                    if (isset($_GET['items'])) {
                      $id = $_GET['items'];
                      $rating = 3;
                      try {
                        $stmt = $conn->prepare("SELECT * FROM reviewtable WHERE perfume_id = :id AND userrating = :rating");
                        $stmt->bindParam(':id', $id);
                        $stmt->bindParam(':rating', $rating);
                        $stmt->execute();

                        echo $stmt->rowCount();

                      } catch (Exception $e) {
                        echo "Error Found : " . $e->getMessage();
                      }
                    }

                    ?>
                  </span>)</div>

              </li>

              <li class="flex items-center">
                <span>4</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="yellow" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="w-4 h-4 text-yellow-500">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                </svg>
                <div class=" w-48 h-3 bg-stone-100 border ml-2 rounded progress-container">
                  <!-- <div class="w-[50%] h-3 bg-yellow-500 rounded-tl rounded-bl progress" id="four-star-progresss"></div> -->
                  <?php
                  require_once "database.php";
                  if (isset($_GET['items'])) {
                    $id = $_GET['items'];
                    $ratingValue = 4;

                    try {
                      $stmt = $conn->prepare("SELECT * FROM reviewtable WHERE perfume_id = :id");
                      $stmt->bindParam(':id', $id);

                      $ratingStmt = $conn->prepare("SELECT * FROM reviewtable WHERE perfume_id = :id AND userrating = :rating");
                      $ratingStmt->bindParam(':id', $id);
                      $ratingStmt->bindParam(':rating', $ratingValue);
                      $ratingStmt->execute();

                      $stmt->execute();

                      $totalRowCount = $stmt->rowCount();
                      $fiveStarCount = $ratingStmt->rowCount();
                      $percentageWidth = ($totalRowCount > 0) ? ($fiveStarCount / $totalRowCount) * 100 : 0;

                      // echo $percentageWidth;
                  
                      echo '<div class="w-[' . $percentageWidth . '%] h-3 bg-yellow-500 rounded-tl rounded-bl progress" id="five-star-progresss"></div>';

                    } catch (Exception $e) {
                      echo "Error Found : " . $e->getMessage();
                    }
                  }
                  ?>
                </div>
                <div class="progress-label-right">(<span id="total_four_star_review">
                    <?php
                    require_once "database.php";
                    if (isset($_GET['items'])) {
                      $id = $_GET['items'];
                      $rating = 4;
                      try {
                        $stmt = $conn->prepare("SELECT * FROM reviewtable WHERE perfume_id = :id AND userrating = :rating");
                        $stmt->bindParam(':id', $id);
                        $stmt->bindParam(':rating', $rating);
                        $stmt->execute();

                        echo $stmt->rowCount();

                      } catch (Exception $e) {
                        echo "Error Found : " . $e->getMessage();
                      }
                    }

                    ?>
                  </span>)</div>
              </li>

              <li class="flex items-center">
                <span>5</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="yellow" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="w-4 h-4 text-yellow-500">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                </svg>
                <div class=" w-48 h-3 bg-stone-100 border ml-2 rounded progress-container">
                  <!-- <div class="w-[10%] h-3 bg-yellow-500 rounded-tl rounded-bl progress" id="five-star-progresss"></div> -->

                  <?php
                  require_once "database.php";
                  if (isset($_GET['items'])) {
                    $id = $_GET['items'];
                    $ratingValue = 5;

                    try {
                      $stmt = $conn->prepare("SELECT * FROM reviewtable WHERE perfume_id = :id");
                      $stmt->bindParam(':id', $id);

                      $ratingStmt = $conn->prepare("SELECT * FROM reviewtable WHERE perfume_id = :id AND userrating = :rating");
                      $ratingStmt->bindParam(':id', $id);
                      $ratingStmt->bindParam(':rating', $ratingValue);
                      $ratingStmt->execute();

                      $stmt->execute();

                      $totalRowCount = $stmt->rowCount();
                      $fiveStarCount = $ratingStmt->rowCount();
                      $percentageWidth = ($totalRowCount > 0) ? ($fiveStarCount / $totalRowCount) * 100 : 0;

                      // echo $percentageWidth;
                  
                      echo '<div class="w-[' . $percentageWidth . '%] h-3 bg-yellow-500 rounded-tl rounded-bl progress" id="five-star-progresss"></div>';

                    } catch (Exception $e) {
                      echo "Error Found : " . $e->getMessage();
                    }
                  }
                  ?>



                </div>
                <div class="progress-label-right">(<span id="total_five_star_review">
                    <?php
                    require_once "database.php";
                    if (isset($_GET['items'])) {
                      $id = $_GET['items'];
                      $rating = 5;
                      try {
                        $stmt = $conn->prepare("SELECT * FROM reviewtable WHERE perfume_id = :id AND userrating = :rating");
                        $stmt->bindParam(':id', $id);
                        $stmt->bindParam(':rating', $rating);
                        $stmt->execute();

                        echo $stmt->rowCount();

                      } catch (Exception $e) {
                        echo "Error Found : " . $e->getMessage();
                      }
                    }

                    ?>
                  </span>)</div>

              </li>

            </ul>
          </div>
        </div>





      </div>
    </div>

    <div class="w-full flex justify-center items-center mt-5">
      <div class="w-[80%]">
        <h3 class="text-xl flex items-center p-1 mb-5">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9h16.5m-16.5 6.75h16.5" />
          </svg>

          Reviews
        </h3>

        <div id="review_content">



          <?php require_once "eachitemspage/showreview.php" ?>





        </div>
      </div>
    </div>

  </section>


  <section class="w-full h-screen bg-white"></section>


  <!-- modal  -->
  <section id="modal" class="w-full h-screen fixed top-0 left-0">
    <div id="modaldialog"
      class="w-full h-full bg-[linear-gradient(rgba(0,0,0,.5),rgba(0,0,0,.5))] flex justify-center items-center  absolute inset-0 modalcontainer">
      <div class="w-[500px] h-[300px] bg-stone-200 modal">
        <div id="crossx" onclick="crossx()" class="w-full flex justify-end items-center">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="w-6 h-6 text-gray-600 mr-5 mt-3">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>

        </div>
        <div class="w-full modal-body">
          <div class="w-full">
            <!-- <form action="" method="post" class="w-full"> -->
            <div class="w-full h-10 flex justify-center items-center mb-3">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6 text-yellow-500 submit-star" id="submit-star-1" value="1"
                data-rating="1">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
              </svg>
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6 text-yellow-500 submit-star" id="submit-star-2" value="2"
                data-rating="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
              </svg>

              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6 text-yellow-500 submit-star" id="submit-star-3" value="3"
                data-rating="3">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
              </svg>

              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6 text-yellow-500 submit-star" id="submit-star-4" value="4"
                data-rating="4">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
              </svg>

              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6 text-yellow-500 submit-star" id="submit-star-5" value="5"
                data-rating="5">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
              </svg>
            </div>

            <div class="w-full flex justify-center items-center flex-col ">
              <input type="text" name="username" id="username" class="w-[90%] mb-3 p-3" placeholder="Enter your name">
              <textarea name="userreview" id="userreview" class="w-[90%] p-2" cols="30" rows=""
                placeholder="Type review here"></textarea>
            </div>

            <div class="w-full flex justify-center items-center mt-3">
              <button type="button" name="submit" class="w-[90%] bg-gray-400 p-2" id="submitreview">Submit</button>
            </div>
            <!-- </form> -->
          </div>
        </div>

      </div>
    </div>
  </section>


  <script type="text/javascript">

    function writereviewfun() {
      document.getElementById('modal').style.display = "block";
    }

    function crossx() {
      document.getElementById('modal').style.display = "none";

    }

    $(document).ready(function () {
      var rating_data = 0;

      $(document).on('click', '.submit-star', function () {
        rating_data = $(this).data('rating');

        resetBackground();

        for (var i = 0; i <= rating_data; i++) {
          $('#submit-star-' + i).attr('fill', 'yellow');
        }
      });

      function resetBackground() {
        for (var i = 0; i <= 5; i++) {
          $('#submit-star-' + i).attr('fill', 'none');
        }
      }

      $("#submitreview").click(function () {
        var username = $('#username').val();
        var userreview = $('#userreview').val();
        var items = <?php echo $_GET['items']; ?>;



        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        if (!username || !userreview) {
          alert("fill your info");
        } else {
          $.ajax({
            url: "eachitemspage/submitrating.php?items=" + items,
            method: "POST",
            data: {
              username: username,
              userreview: userreview,
              rating_data: rating_data,
              _token: csrfToken
            },
            success: function (data) {
              console.log('Data sent successfully:', data);
            },

            error: function (xhr, status, error) {
              console.error('Error:', error);
            }
          });
          $('#modal').css("display", 'none');


        }
      });

    });

  </script>


  <script class="text/javascript">
    $(document).ready(function () {
      const valueInput = $('#valueInput');
      const decreaseButton = $('#decrease');
      const increaseButton = $('#increase');
      const addtocartbtn = $('#addtocartbtn');

      decreaseButton.click(function () {
        let currentValue = parseInt(valueInput.val());
        if (!isNaN(currentValue)) {
          valueInput.val(Math.max(currentValue - 1, 0));
        }
      });

      increaseButton.click(function () {
        let currentValue = parseInt(valueInput.val());
        if (!isNaN(currentValue)) {
          valueInput.val(currentValue + 1);
        }
      });



      $("#addtocart").click(function () {

        var quantity = valueInput.val();
        var items = <?php echo $_GET['items']; ?>;

        var perfumename = "<?php echo $perfumename ?>";
        var mili = "<?php echo $mili ?>";
        var brandname = "<?php echo $brandname ?>";
        var categoryname = "<?php echo $categoryname ?>";
        var price = "<?php echo $price ?>";

        console.log(perfumename, mili, brandname, categoryname);

        $.ajax({
          url: "cart.php",
          method: "POST",
          data: {
            id: items,
            perfumename: perfumename,
            brandname: brandname,
            mili: mili,
            categoryname: categoryname,
            quantity: quantity,
            price: price,
            action: "data"
          },
          success: function (data) {
            console.log('Data sent successfully:', data);

            // location.reload();

          },
        });



        <?php
        require_once "database.php";
        $alert = $conn->prepare("SELECT id FROM addtocart WHERE perfume_id = :id");
        $alert->bindParam(':id', $_GET['items']);
        $alert->execute();

        if ($alert->rowCount() > 0) {
          echo '
        $("#alertcart").html(`
            <span class="flex justify-start items-center p-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ml-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                </svg>
                <span class="ml-2">Item already added</span>
            </span>
            <a href="shopcartpage.php" class="text-indigo-500 mr-4 hover:text-indigo-700">
                View cart 
            </a>
        `);
       ';
        } else {
          echo '
          $("#alertcart").html(`
              <span class="flex justify-start items-center p-1">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ml-4">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                  </svg>
                  <span class="ml-2">Item added to the cart</span>
              </span>
              <a href="shopcartpage.php" class="text-indigo-500 mr-4 hover:text-indigo-700">
                  View cart 
              </a>
          `);
        ';
        }
        ?>



        <?php



        ?>

      });







    });















  </script>


  <?php
  if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['action']) && $_POST['action'] === "count") {
      echo "Hkelo";
    }
  }
  ?>


</body>

</html>