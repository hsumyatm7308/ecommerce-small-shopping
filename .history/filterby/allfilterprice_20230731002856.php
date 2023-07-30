<?php

require_once "database.php";

if (isset($_GET['startprice']) && isset($_GET['endprice'])) {
        $startprice = $_GET['startprice'];
    $endprice = $_GET['endprice'];
    try {
        $stmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume WHERE price BETWEEN :startprice AND :endprice AND category_name IN ('Men','Unisex','Women')");
        $stmt->bindParam(':startprice', $startprice, PDO::PARAM_INT);
        $stmt->bindParam(':endprice', $endprice, PDO::PARAM_INT);
        $stmt->execute();
    } catch (Exception $e) {
        echo "Error Found " . $e->getMessage();
    }

}






// try {


//     $recperpage = 12;
//     $totalrec = $stmt->rowCount();

//     // echo $totalrec . "heljwf";
//     $totalpages = ceil($totalrec / $recperpage);
//     echo $totalpages;


//     if (isset($_GET['price']) && isset($_GET['price']) != "") {
//         $page = $_GET['price'];
//     } else {
//         $page = 1;
//     }

//     // $startfrom = ($page - 1) * 12;

//     // $stmt = $conn->prepare("SELECT * FROM perfume WHERE category_name IN ('Women','Unisex') LIMIT $startfrom, $recperpage");
//     // $stmt->execute(); // Execute the query to fetch data


// } catch (Exception $e) {
//     echo "Error Found: " . $e->getMessage();
// }


?>



<div class="grid grid-cols-3">
    <?php while ($row = $stmt->fetch()): ?>
        <div class="w-full m-5 flex justify-center items-center flex-col">
            <?php
            $binary_data = $row['imgurl'];
            $base64_image = base64_encode($binary_data);
            echo '<img src="data:image/jpeg;base64,' . $base64_image . '" alt="Image" style="max-width: 200px;" >';
            ?>

            <a href="" class="w-64 self-start">
                <?php echo $row['perfume_name'] ?> by
                <? echo $row['brand_name'] ?> EDT 3.3 OZ
                <?= $row['mili'] ?> spray for
                <?= $row['category_name'] ?>
            </a>
            <span class="self-start mt-2">$
                <?php echo $row['price'] ?>
            </span>
        </div>
    <?php endwhile; ?>
</div> 