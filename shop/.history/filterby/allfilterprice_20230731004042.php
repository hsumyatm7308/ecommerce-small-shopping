<?php

require_once "database.php";

if (isset($_GET['startprice']) && isset($_GET['endprice'])) {
    $startprice = (int)$_GET['startprice'];
    $endprice = (int)$_GET['endprice'];
    try {
        $stmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume WHERE price BETWEEN :startprice AND :endprice AND category_name IN ('Men','Unisex','Women')");
        $stmt->bindParam(':startprice', $startprice, PDO::PARAM_INT);
        $stmt->bindParam(':endprice', $endprice, PDO::PARAM_INT);
        $stmt->execute();

        $recperpage = 12;
        $totalrec = $stmt->rowCount();
        $totalpages = ceil($totalrec / $recperpage);
        echo $totalpages;

        if (isset($_GET['price']) && $_GET['price'] != "") {
            $page = (int)$_GET['price'];
        } else {
            $page = 1;
        }

        $startfrom = ($page - 1) * 12;

        // Rest of the code to bind parameters and execute the query goes here...
    } catch (Exception $e) {
        echo "Error Found: " . $e->getMessage();
    }
}





try {


    $recperpage = 12;
    $totalrec = $stmt->rowCount();

    // echo $totalrec . "heljwf";
    $totalpages = ceil($totalrec / $recperpage);
    echo $totalpages;


    if (isset($_GET['price']) && isset($_GET['price']) != "") {
        $page = $_GET['price'];
    } else {
        $page = 1;
    }

    $startfrom = ($page - 1) * 12;



    $startprice = (int) $_GET['startprice']; // Convert to integer to prevent SQL injection
    $endprice = (int) $_GET['endprice']; // Convert to integer to prevent SQL injection

    $stmt = $conn->prepare("SELECT * FROM perfume WHERE price BETWEEN :startprice AND :endprice LIMIT :startfrom, :recperpage");
    $stmt->bindParam(':startprice', $startprice, PDO::PARAM_INT);
    $stmt->bindParam(':endprice', $endprice, PDO::PARAM_INT);

    // Assuming $startfrom and $recperpage are integers, use the following to bind them:
    $startfrom = (int) $startfrom;
    $recperpage = (int) $recperpage;
    $stmt->bindParam(':startfrom', $startfrom, PDO::PARAM_INT);
    $stmt->bindParam(':recperpage', $recperpage, PDO::PARAM_INT);

    $stmt->execute(); // Execute the query to fetch data

} catch (Exception $e) {
    echo "Error Found: " . $e->getMessage();
}


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