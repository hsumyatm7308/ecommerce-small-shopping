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

<div class="flex justify-center items-center mt-10 p-10">


    <?php
    if (isset($_GET['page']) && $_GET['page'] > 1) {
        ?> <a href="?page=<?php echo $_GET['page'] - 1 ?>" class="text-red-500 border px-2 py-1 mr-10">Prev</a>
        <?php
    } else {
      
    }
    ?>

    <?php
    for ($x = 1; $x <= $totalpages; $x++) {

        echo '<a href="index.php?page=' . $x . '" class="w-6 h-7 border p-1 m-1 flex justify-center items-center active">' . $x . '</a>';


    }
    ?>

    <?php
    if (isset($_GET['page'])) {
        if ($_GET['page'] >= $totalpages) {
            // echo '<a class="text-blue-500 border px-2 py-1 ml-10">Next</a>';
        } else {
            $nextPage = $_GET['page'] + 1;
            echo '<a href="?page=' . $nextPage . '" class="text-red-500 border px-2 py-1 ml-10">Next</a>';
        }
    } else {
        // This block is for the first page (page 1)
        echo '<a href="?page=1" class="text-blue-500 border px-2 py-1 ml-10">Next</a>';
    }
    ?>


<?php 

if(isset($_GET['unisexidx'])){


    try {
        global $conn;
    
    
        $stmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume WHERE category_name = 'Unisex'");
        $stmt->execute(); // Execute the query to fetch data
    
    
    
    } catch (Exception $e) {
        echo "Error Found: " . $e->getMessage();
    }

}

?>


</div>