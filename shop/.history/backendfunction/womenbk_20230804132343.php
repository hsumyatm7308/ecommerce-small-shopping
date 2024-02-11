<!-- Sorting  -->
<?php
require_once "database.php";
require_once "pagination.php";

ini_set('display_errors', 1);


$sortOption = "price ASC";

if (isset($_POST['asc'])) {
    $sortOption = "price ASC";
} elseif (isset($_POST['dec'])) {
    $sortOption = "price DESC";
}


?>


<?php

require_once "database.php";

try {
    global $conn;

    if (isset($_GET['startprice']) && isset($_GET['endprice'])) {
        $startprice = $_GET['startprice'];
        $endprice = $_GET['endprice'];


        $pricestmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume WHERE price BETWEEN :startprice AND :endprice AND category_name IN ('Women','Unisex') ORDER BY $sortOption");
        $pricestmt->bindParam(':startprice', $startprice, PDO::PARAM_INT);
        $pricestmt->bindParam(':endprice', $endprice, PDO::PARAM_INT);
        $pricestmt->execute();

        // echo "sdlfjsa;";
    } else {


        $womenstmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume WHERE category_name IN ('Women','Unisex') ORDER BY $sortOption");
        $womenstmt->execute();


        if (isset($_GET['type']) && $_GET['type'] === 'on') {

            $womenstmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume WHERE category_name = 'Unisex' ORDER BY $sortOption");
            $womenstmt->execute();
            // echo "Category: Unisex
        }


        if (isset($_GET['type']) && $_GET['type'] === 'fon') {

            $womenstmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume WHERE category_name = 'Women' ORDER BY $sortOption");
            $womenstmt->execute();
            // echo "Category: Unisex
        }
    }

} catch (Exception $e) {
    echo "Error Found: " . $e->getMessage();
}





try {




    if (isset($_GET['price']) && isset($_GET['price'])) {
        $startprice = $_GET['startprice'];
        $endprice = $_GET['endprice'];

        $recperpage = 12;

        $pricePage = isset($_GET['price']) ? (int) $_GET['price'] : 1;
        $startfromprice = max(0, ($pricePage - 1) * 12);

        $pricestmt_total = $conn->prepare("SELECT COUNT(*) as total FROM perfume WHERE price BETWEEN :startprice AND :endprice AND category_name IN ('Women','Unisex') ORDER BY $sortOption");
        $pricestmt_total->bindParam(':startprice', $startprice, PDO::PARAM_INT);
        $pricestmt_total->bindParam(':endprice', $endprice, PDO::PARAM_INT);
        $pricestmt_total->execute();
        $totalrec = $pricestmt_total->fetchColumn();
        $totalpages = ceil($totalrec / $recperpage);

        $pricestmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume WHERE price BETWEEN :startprice AND :endprice AND category_name IN ('Women','Unisex') ORDER BY $sortOption LIMIT $startfromprice, $recperpage");
        $pricestmt->bindParam(':startprice', $startprice, PDO::PARAM_INT);
        $pricestmt->bindParam(':endprice', $endprice, PDO::PARAM_INT);
        $pricestmt->execute();

        // echo "totalpages" . $startfromprice;



    } else {


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

        $womenstmt = $conn->prepare("SELECT * FROM perfume WHERE category_name IN ('Women','Unisex') ORDER BY $sortOption LIMIT $startfrom, $recperpage");
        $womenstmt->execute(); // Execute the query to fetch data


        if (isset($_GET['type']) && $_GET['type'] === 'on') {

            if (isset($_GET['unipage']) && isset($_GET['unipage']) != "") {
                $unipage = $_GET['unipage'];
            } else {
                $unipage = 1;
            }

            $startfrom = ($unipage - 1) * 12;


            $womenstmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume WHERE category_name = 'Unisex' ORDER BY $sortOption LIMIT $startfrom, $recperpage");
            $womenstmt->execute();






        }
        if (isset($_GET['type']) && $_GET['type'] === 'fon') {

            if (isset($_GET['unipage']) && isset($_GET['unipage']) != "") {
                $unipage = $_GET['unipage'];
            } else {
                $unipage = 1;
            }

            $startfrom = ($unipage - 1) * 12;


            $womenstmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume WHERE category_name = 'Women' ORDER BY $sortOption LIMIT $startfrom, $recperpage");
            $womenstmt->execute();
            // echo "Category: Unisex
        }

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
    <?php
    if (isset($_GET['startprice']) && isset($_GET['endprice'])) {
        // echo "hie";
    
        while ($row = $pricestmt->fetch()) {
            echo '<div class="w-[95%] bg-gray-100 p-3 m-3 flex justify-center items-center flex-col">';
            $binary_data = $row['imgurl'];
            $base64_image = base64_encode($binary_data);
            echo '<img src="data:image/jpeg;base64,' . $base64_image . '" alt="Image" style="max-width: 200px;" >';
            echo '<a href="" class="w-64 self-start">' . $row['perfume_name'] . ' by ' . $row['brand_name'] . ' EDT 3.3 OZ ' . $row['mili'] . ' spray for ' . $row['category_name'] . '</a>';
            echo '<span class="self-start mt-2">$' . $row['price'] . '</span>';
            echo '</div>';
        }

    } else {
        while ($row = $womenstmt->fetch()) {
            echo '<div class="w-[95%] bg-gray-100 p-3 m-3 flex justify-center items-center flex-col">';
            $binary_data = $row['imgurl'];
            $base64_image = base64_encode($binary_data);
            echo '<img src="data:image/jpeg;base64,' . $base64_image . '" alt="Image" style="max-width: 200px;" >';
            echo '<a href="" class="w-64 self-start">' . $row['perfume_name'] . ' by ' . $row['brand_name'] . ' EDT 3.3 OZ ' . $row['mili'] . ' spray for ' . $row['category_name'] . '</a>';
            echo '<span class="self-start mt-2">$' . $row['price'] . '</span>';
            echo '</div>';
        }
    }
    ?>
</div>



<div class="flex justify-center items-center mt-10 p-10">
    <?php

    if (isset($_GET['startprice']) && isset($_GET['endprice'])) {

        $currentPricePage = isset($_GET['price']) ? (int) $_GET['price'] : 1;

        if ($currentPricePage > 1) {
            $prevPricePage = $currentPricePage - 1;
            echo '<a href="?startprice=' . $startprice . '&endprice=' . $endprice . '&price=' . $prevPricePage . '" class="text-red-500 border px-2 py-1 mr-10">Prev</a>';
        }

        for ($x = 1; $x <= $totalpages; $x++) {
            echo '<a href="?startprice=' . $startprice . '&endprice=' . $endprice . '&price=' . $x . '"  class="border px-2 py-1 m-1 flex justify-center items-center';
            if (isset($_GET['price']) && $_GET['price'] == $x) {
                echo ' bg-gray-500 text-white'; 
            } else {
                echo ' text-black-500'; 
            }
            echo '">' . $x . '</a>';
        }

        if ($currentPricePage < $totalpages) {
            $nextPricePage = $currentPricePage + 1;
            echo '<a href="?startprice=' . $startprice . '&endprice=' . $endprice . '&price=' . $nextPricePage . '" class="text-red-500 border px-2 py-1 ml-10">Next</a>';
        }
    } else {
        if (isset($_GET['type']) && $_GET['type'] === 'on') {
            if (isset($_GET['unisexquery']) && $_GET['unisexquery'] > 1) {
                $prevUnisexPage = $_GET['unisexquery'] - 1;
                echo '<a href="?type=on&unisexquery=' . $prevUnisexPage . '" class="text-red-500 border px-2 py-1 mr-10">Prev</a>';
            }

            for ($x = 1; $x <= $totalpages; $x++) {
                echo '<a href="?type=on&unisexquery=' . $x . '"  class="border px-2 py-1 m-1 flex justify-center items-center';
                if (isset($_GET['unisexquery']) && $_GET['unisexquery'] == $x) {
                    echo ' bg-gray-500 text-white';
                } else {
                    echo ' text-black-500';
                }
                echo '">' . $x . '</a>';
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
                echo '<a href="?type=fon&womenquery=' . $x . '" class="border px-2 py-1 m-1 flex justify-center items-center';
                if (isset($_GET['womenquery']) && $_GET['womenquery'] == $x) {
                    echo ' bg-gray-500 text-white';
                } else {
                    echo ' text-black-500';
                }
                echo '">' . $x . '</a>';
            }
            if (isset($_GET['womenquery'])) {
                if ($_GET['womenquery'] >= $totalpages) {
                } else {
                    $nextPage = $_GET['womenquery'] + 1;
                    echo '<a href="?type=fon&womenquery=' . $nextPage . '" class="text-red-500 border px-2 py-1 ml-10">Next</a>';
                }
            } else {
                echo '<a href="?type=fon&womenpage=1" class="text-blue-500 border px-2 py-1 ml-10">Next</a>';
            }
        } elseif (isset($_GET['letters'])) {
            //nothing
        } else {
            if (isset($_GET['womenpage']) && $_GET['womenpage'] > 1) {
                $prevMenPage = $_GET['womenpage'] - 1;
                echo '<a href="?womenpage=' . $prevMenPage . '" class="text-red-500 border px-2 py-1 mr-10">Prev</a>';
            }

            for ($x = 1; $x <= $totalpages; $x++) {
                echo '<a href="?womenpage=' . $x . '" class="border px-2 py-1 m-1 flex justify-center items-center';
                if (isset($_GET['womenpage']) && $_GET['womenpage'] == $x) {
                    echo ' bg-gray-500 text-white';
                } else {
                    echo ' text-black-500';
                }
                echo '">' . $x . '</a>';
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
    }
    ?>
</div>
