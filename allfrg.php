<?php
require_once "database.php";
require_once "pagination.php";


try {
    global $conn;

    

    $recperpage = 12;
    $totalrec = $stmt->rowCount();
    $totalpages = ceil($totalrec / $recperpage);


    if (isset($_GET['page']) && isset($_GET['page']) != "") {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }

    $startfrom = ($page - 1) * 12;
    // echo $startfrom;


    $stmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume LIMIT $startfrom, $recperpage");
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

<div class="flex justify-center items-center mt-10">



    <?php
    for ($x = 1; $x <= $totalpages; $x++) {
        echo '<a href="index.php?page=' . $x . '" class="w-6 h-7 bg-stone-100 border p-1 m-1 flex justify-center items-center">' . $x . '</a>';
    }
    ?>



</div>