<?php

// require_once "../database.php";


try {
    global $conn;

    $menstmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl,mili FROM perfume WHERE category_name IN ('Men','Unisex')");
    $menstmt->execute();

    if (isset($_GET['type']) && $_GET['type'] === 'on') {

        $menstmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume WHERE category_name = 'Unisex'");
        $menstmt->execute();
        // echo "Category: Unisex
    }

    if (isset($_GET['type']) && $_GET['type'] === 'mon') {

        $menstmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume WHERE category_name = 'Men'");
        $menstmt->execute();
        // echo "Category: Unisex
    }

} catch (Exception $e) {
    echo "Error Found: " . $e->getMessage();
}

try {

    global $conn;

    $recperpage = 12;
    $totalrec = $menstmt->rowCount();
    $totalpages = ceil($totalrec / $recperpage);

    if (isset($_GET['menpage']) && isset($_GET['menpage']) != "") {
        $page = $_GET['menpage'];
    } else {
        $page = 1;
    }

    $startfrom = ($page - 1) * 12;

    $menstmt = $conn->prepare("SELECT * FROM perfume WHERE category_name IN ('Men','Unisex') LIMIT $startfrom, $recperpage");
    $menstmt->execute();

    if (isset($_GET['type']) && $_GET['type'] === 'on') {

        if (isset($_GET['unipage']) && isset($_GET['unipage']) != "") {
            $unipage = $_GET['unipage'];
        } else {
            $unipage = 1;
        }

        $startfrom = ($unipage - 1) * 12;

        $menstmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume WHERE category_name = 'Unisex' LIMIT $startfrom, $recperpage");
        $menstmt->execute();
    }
    if (isset($_GET['type']) && $_GET['type'] === 'mon') {

        if (isset($_GET['unipage']) && isset($_GET['unipage']) != "") {
            $unipage = $_GET['unipage'];
        } else {
            $unipage = 1;
        }

        $startfrom = ($unipage - 1) * 12;


        $menstmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume WHERE category_name = 'Men' LIMIT $startfrom, $recperpage");
        $menstmt->execute();
        // echo "Category: Unisex
    }

} catch (Exception $e) {
    echo "Error Found: " . $e->getMessage();
}

?>


<!-- Brand Name -->
<?php
// Start output buffering
ob_start();

// Check if the 'letters' parameter is present in the URL
if (isset($_GET['letters'])) {
    $letter = $_GET['letters'];
    setcookie('letters', $letter, time() + (86400 * 30), '/');

    // Perform your other actions (e.g., database queries)
    try {
        global $conn;

        $menstmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume  WHERE category_name IN ('Men','Unisex') AND fsletter = :letter ORDER BY fsletter ASC");
        $menstmt->bindParam(":letter", $letter);
        $menstmt->execute();

    } catch (Exception $e) {
        echo "Error Found: " . $e->getMessage();
    }
}

// End output buffering and send the captured output to the browser
ob_end_flush();



?>



<div class="grid grid-cols-3">
    <?php while ($row = $menstmt->fetch()): ?>
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
    if (isset($_GET['type']) && $_GET['type'] === 'on') {
        if (isset($_GET['unisexquery']) && $_GET['unisexquery'] > 1) {
            $prevUnisexPage = $_GET['unisexquery'] - 1;
            echo '<a href="?type=on&unisexquery=' . $prevUnisexPage . '" class="text-red-500 border px-2 py-1 mr-10">Prev</a>';
        }

        for ($x = 1; $x <= $totalpages; $x++) {
            echo '<a href="?type=on&unisexquery=' . $x . '" class="w-6 h-7 border p-1 m-1 flex justify-center items-center active">' . $x . '</a>';
        }

        
        if (isset($_GET['unisexquery'])) {
            if ($_GET['unisexquery'] >= $totalpages) {
            } else {
                $nextPage = $_GET['unisexquery'] + 1;
                echo '<a href="?type=on&unisexquery=' . $nextPage . '" class="text-red-500 border px-2 py-1 ml-10">Next</a>';
            }
        } else {
            echo '<a href="?type=on&unisexquery=1" class="text-blue-500 border px-2 py-1 ml-10">Next</a>';
        }
    } elseif (isset($_GET['type']) && $_GET['type'] === 'mon') {
        if (isset($_GET['menquery']) && $_GET['menquery'] > 1) {
            $prevMenPage = $_GET['menquery'] - 1;
            echo '<a href="?type=mon&menquery=' . $prevMenPage . '" class="text-red-500 border px-2 py-1 mr-10">Prev</a>';
        }

        for ($x = 1; $x <= $totalpages; $x++) {
            echo '<a href="?type=mon&menquery=' . $x . '" class="w-6 h-7 border p-1 m-1 flex justify-center items-center active">' . $x . '</a>';
        }

        if (isset($_GET['menquery'])) {
            if ($_GET['menquery'] >= $totalpages) {
            } else {
                $nextPage = $_GET['menquery'] + 1;
                echo '<a href="?type=mon&menquery=' . $nextPage . '" class="text-red-500 border px-2 py-1 ml-10">Next</a>';
            }
        } else {
            echo '<a href="?type=mon&menquery=1" class="text-blue-500 border px-2 py-1 ml-10">Next</a>';
        }
    } else {
        if (isset($_GET['menpage']) && $_GET['menpage'] > 1) {
            $prevMenPage = $_GET['menpage'] - 1;
            echo '<a href="?menpage=' . $prevMenPage . '" class="text-red-500 border px-2 py-1 mr-10">Prev</a>';
        }

        for ($x = 1; $x <= $totalpages; $x++) {
            echo '<a href="?menpage=' . $x . '" class="w-6 h-7 border p-1 m-1 flex justify-center items-center active">' . $x . '</a>';
        }

        if (isset($_GET['menpage'])) {
            if ($_GET['menpage'] >= $totalpages) {
                // echo '<a class="text-blue-500 border px-2 py-1 ml-10">Next</a>';
            } else {
                $nextPage = $_GET['menpage'] + 1;
                echo '<a href="?menpage=' . $nextPage . '" class="text-red-500 border px-2 py-1 ml-10">Next</a>';
            }
        } else {
            echo '<a href="?menpage=1" class="text-blue-500 border px-2 py-1 ml-10">Next</a>';
        }
    }
    ?>
</div>
