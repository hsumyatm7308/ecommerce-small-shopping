<?php

require_once "database.php";

if (isset($_GET['startprice']) && isset($_GET['endprice'])) {
        $startprice = $_GET['startprice'];
    $endprice = $_GET['endprice'];
    try {
        $pric = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume WHERE price BETWEEN :startprice AND :endprice AND category_name IN ('Men','Unisex','Women')");
        $stmt->bindParam(':startprice', $startprice, PDO::PARAM_INT);
        $stmt->bindParam(':endprice', $endprice, PDO::PARAM_INT);
        $stmt->execute();
    } catch (Exception $e) {
        echo "Error Found " . $e->getMessage();
    }

}






try {


    $recperpage = 12;
    $totalrec = $womenstmt->rowCount();

    // echo $totalrec . "heljwf";
    $totalpages = ceil($totalrec / $recperpage);

    if (isset($_GET['womenpage']) && isset($_GET['womenpage']) != "") {
        $page = $_GET['womenpage'];
    } else {
        $page = 1;
    }

    $startfrom = ($page - 1) * 12;

    $womenstmt = $conn->prepare("SELECT * FROM perfume WHERE category_name IN ('Women','Unisex') LIMIT $startfrom, $recperpage");
    $womenstmt->execute(); // Execute the query to fetch data


    if (isset($_GET['type']) && $_GET['type'] === 'on') {

        if (isset($_GET['unipage']) && isset($_GET['unipage']) != "") {
            $unipage = $_GET['unipage'];
        } else {
            $unipage = 1;
        }

        $startfrom = ($unipage - 1) * 12;


        $womenstmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume WHERE category_name = 'Unisex' LIMIT $startfrom, $recperpage");
        $womenstmt->execute();






    }
    if (isset($_GET['type']) && $_GET['type'] === 'fon') {

        if (isset($_GET['unipage']) && isset($_GET['unipage']) != "") {
            $unipage = $_GET['unipage'];
        } else {
            $unipage = 1;
        }

        $startfrom = ($unipage - 1) * 12;


        $womenstmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume WHERE category_name = 'Women' LIMIT $startfrom, $recperpage");
        $womenstmt->execute();
        // echo "Category: Unisex
    }

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