<?php

require_once "database.php";

try {
    global $conn;

    $womenstmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume WHERE category_name IN ('Women','Unisex') ");
    $womenstmt->execute();


    if (isset($_GET['type']) && $_GET['type'] === 'on') {

        $womenstmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume WHERE category_name = 'Unisex'");
        $womenstmt->execute();
        // echo "Category: Unisex
    }


    if (isset($_GET['type']) && $_GET['type'] === 'fon') {

        $womenstmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume WHERE category_name = 'Women'");
        $womenstmt->execute();
        // echo "Category: Unisex
    }
} catch (Exception $e) {
    echo "Error Found: " . $e->getMessage();
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


<!-- Brand Name -->
<?php
if (isset($_GET['letters'])) {
    $letter = $_GET['letters'];
    try {
        global $conn;

        $womenstmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume  WHERE category_name IN ('Women','Unisex') AND fsletter = :letter ORDER BY fsletter ASC");
        $womenstmt->bindParam(":letter", $letter);
        $womenstmt->execute();



    } catch (Exception $e) {
        echo "Error Found: " . $e->getMessage();
    }
}


?>



<div class="grid grid-cols-3">
    <?php while ($row = $womenstmt->fetch()): ?>
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
    } elseif (isset($_GET['type']) && $_GET['type'] === 'fon') {
        if (isset($_GET['womenquery']) && $_GET['womenquery'] > 1) {
            $prevMenPage = $_GET['womenquery'] - 1;
            echo '<a href="?type=fon&womenquery=' . $prevMenPage . '" class="text-red-500 border px-2 py-1 mr-10">Prev</a>';
        }

        for ($x = 1; $x <= $totalpages; $x++) {
            echo '<a href="?type=fon&womenquery=' . $x . '" class="w-6 h-7 border p-1 m-1 flex justify-center items-center active">' . $x . '</a>';
        }

        if (isset($_GET['womenquery'])) {
            if ($_GET['womenquery'] >= $totalpages) {
            } else {
                $nextPage = $_GET['womenquery'] + 1;
                echo '<a href="?type=fon&womenquery=' . $nextPage . '" class="text-red-500 border px-2 py-1 ml-10">Next</a>';
            }
        } else {
            echo '<a href="?type=mon&menquery=1" class="text-blue-500 border px-2 py-1 ml-10">Next</a>';
        }
    } else {
        if (isset($_GET['womenpage']) && $_GET['womenpage'] > 1) {
            $prevMenPage = $_GET['womenpage'] - 1;
            echo '<a href="?womenpage=' . $prevMenPage . '" class="text-red-500 border px-2 py-1 mr-10">Prev</a>';
        }

        for ($x = 1; $x <= $totalpages; $x++) {
            echo '<a href="?womenpage=' . $x . '" class="w-6 h-7 border p-1 m-1 flex justify-center items-center active">' . $x . '</a>';
        }

        if (isset($_GET['womenpage'])) {
            if ($_GET['womenpage'] >= $totalpages) {
                // echo '<a class="text-blue-500 border px-2 py-1 ml-10">Next</a>';
            } else {
                $nextPage = $_GET['womenpage'] + 1;
                echo '<a href="?womenpage=' . $nextPage . '" class="text-red-500 border px-2 py-1 ml-10">Next</a>';
            }
        } else {
            echo '<a href="?womenpage=1" class="text-blue-500 border px-2 py-1 ml-10">Next</a>';
        }
    }
    ?>
</div>