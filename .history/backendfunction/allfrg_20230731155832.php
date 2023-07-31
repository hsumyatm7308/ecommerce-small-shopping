<?php
include_once "database.php";
require_once "pagination.php";


try {
    global $conn;


    if (isset($_GET['startprice']) && isset($_GET['endprice'])) {
        $startprice = $_GET['startprice'];
        $endprice = $_GET['endprice'];

        // $pricePage = isset($_GET['price']) ? (int)$_GET['price'] : 1;


        $pricestmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume WHERE price BETWEEN :startprice AND :endprice");
        $pricestmt->bindParam(':startprice', $startprice, PDO::PARAM_INT);
        $pricestmt->bindParam(':endprice', $endprice, PDO::PARAM_INT);
        $pricestmt->execute();

        // echo "sdlfjsa;";
    } else {

        $stmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl,mili FROM perfume WHERE category_name IN ('Men','Unisex','Women')");
        $stmt->execute();

        if (isset($_GET['type']) && $_GET['type'] === 'on') {

            $stmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume WHERE category_name = 'Unisex'");
            $stmt->execute();
            // echo "Category: Unisex
        }

        if (isset($_GET['type']) && $_GET['type'] === 'mon') {

            $menstmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume WHERE category_name = 'Men'");
            $menstmt->execute();
            // echo "Category: Unisex
        }

        if (isset($_GET['type']) && $_GET['type'] === 'fon') {

            $menstmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume WHERE category_name = 'Women'");
            $menstmt->execute();
            // echo "Category: Unisex
        }



    }



} catch (Exception $e) {
    echo "Error Found: " . $e->getMessage();
}





try {
    global $conn;

    $startfromprice = 0;

    if (isset($_GET['price']) && isset($_GET['price'])) {
        $startprice = $_GET['startprice'];
        $endprice = $_GET['endprice'];


        
        $recperpage = 12;
        
        $pricePage = isset($_GET['price']) ? (int)$_GET['price'] : 1;
        $startfromprice = max(0, ($pricePage - 1) * 12);
        
        $pricestmt_total = $conn->prepare("SELECT COUNT(*) as total FROM perfume WHERE price BETWEEN :startprice AND :endprice");
        $pricestmt_total->bindParam(':startprice', $startprice, PDO::PARAM_INT);
        $pricestmt_total->bindParam(':endprice', $endprice, PDO::PARAM_INT);
        $pricestmt_total->execute();
        $totalrec = $pricestmt_total->fetchColumn();
        $totalpages = ceil($totalrec / $recperpage);
        
        $pricestmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume WHERE price BETWEEN :startprice AND :endprice LIMIT $startfromprice, $recperpage");
        $pricestmt->bindParam(':startprice', $startprice, PDO::PARAM_INT);
        $pricestmt->bindParam(':endprice', $endprice, PDO::PARAM_INT);
        $pricestmt->execute();
        
        echo "totalpages" . $startfromprice;
        


    } else {


        $recperpage = 12;
        $totalrec = $stmt->rowCount();
        $totalpages = ceil($totalrec / $recperpage);

        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $startfrom = max(0, ($page - 1) * 12);
        // $startfrom = ($page - 1) * 12;
        // echo $startfrom;

        echo $page . "apge";

        $stmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume LIMIT $startfrom, $recperpage");
        $stmt->execute();


        if (isset($_GET['type']) && $_GET['type'] === 'on') {

            if (isset($_GET['unipage']) && isset($_GET['unipage']) != "") {
                $unipage = $_GET['unipage'];
            } else {
                $unipage = 1;
            }

            $startfrom = ($unipage - 1) * 12;

            $stmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume WHERE category_name = 'Unisex' LIMIT $startfrom, $recperpage");
            $stmt->execute();
        }
        if (isset($_GET['type']) && $_GET['type'] === 'mon') {

            if (isset($_GET['unipage']) && isset($_GET['unipage']) != "") {
                $unipage = $_GET['unipage'];
            } else {
                $unipage = 1;
            }

            $startfrom = ($unipage - 1) * 12;


            $stmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume WHERE category_name = 'Men' LIMIT $startfrom, $recperpage");
            $stmt->execute();
            // echo "Category: Unisex
        }

        if (isset($_GET['type']) && $_GET['type'] === 'fon') {

            if (isset($_GET['unipage']) && isset($_GET['unipage']) != "") {
                $unipage = $_GET['unipage'];
            } else {
                $unipage = 1;
            }

            $startfrom = ($unipage - 1) * 12;


            $stmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume WHERE category_name = 'Women' LIMIT $startfrom, $recperpage");
            $stmt->execute();
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

        $stmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume WHERE fsletter = :letter ORDER BY fsletter ASC");
        $stmt->bindParam(":letter", $letter);
        $stmt->execute();



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
            echo '<div class="w-full m-5 flex justify-center items-center flex-col">';
            $binary_data = $row['imgurl'];
            $base64_image = base64_encode($binary_data);
            echo '<img src="data:image/jpeg;base64,' . $base64_image . '" alt="Image" style="max-width: 200px;" >';
            echo '<a href="" class="w-64 self-start">' . $row['perfume_name'] . ' by ' . $row['brand_name'] . ' EDT 3.3 OZ ' . $row['mili'] . ' spray for ' . $row['category_name'] . '</a>';
            echo '<span class="self-start mt-2">$' . $row['price'] . '</span>';
            echo '</div>';
        }

    } else {
        while ($row = $stmt->fetch()) {
            echo '<div class="w-full m-5 flex justify-center items-center flex-col">';
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
            echo '<a href="?startprice=' . $startprice . '&endprice=' . $endprice . '&price=' . $x . '" class="w-6 h-7 border p-1 m-1 flex justify-center items-center';
            if ($x === $currentPricePage) {
                echo ' active';
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
            if (isset($_GET['page']) && $_GET['page'] > 1) {
                $prevMenPage = $_GET['page'] - 1;
                echo '<a href="?page=' . $prevMenPage . '" class="text-red-500 border px-2 py-1 mr-10">Prev</a>';
            }

            for ($x = 1; $x <= $totalpages; $x++) {
                echo '<a href="?page=' . $x . '" class="w-6 h-7 border p-1 m-1 flex justify-center items-center active">' . $x . '</a>';
            }

            if (isset($_GET['page'])) {
                if ($_GET['page'] >= $totalpages) {
                    // echo '<a class="text-blue-500 border px-2 py-1 ml-10">Next</a>';
                } else {
                    // $nextPage = $_GET['page'] + 1;
    
                    if (isset($_GET['page']) && is_numeric($_GET['page'])) {
                        $nextPage = (int) $_GET['page'] + 1;
                        echo '<a href="?page=' . $nextPage . '" class="text-red-500 border px-2 py-1 ml-10">Next</a>';
                    }
                }
            } else {
                echo '<a href="?page=1" class="text-blue-500 border px-2 py-1 ml-10">Next</a>';
            }
        }


    }





    ?>
</div>