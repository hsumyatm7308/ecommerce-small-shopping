<!-- Sorting  -->
<?php
require_once "database.php";
require_once "pagination.php";

ini_set('display_errors', 1);


$sortOption = "price";

// if (isset($_POST['asc'])) {
//     $sortOption = "price ASC";
// } elseif (isset($_POST['dec'])) {
//     $sortOption = "price DESC";
// } elseif (isset($_POST['rev'])) {


//           $show = $conn->prepare("SELECT * FROM reviewtable");
//           $show->execute();

//           echo $show->rowCount();




// }

if (isset($_POST['asc'])) {
    $sortOption = "price ASC";
} elseif (isset($_POST['dec'])) {
    $sortOption = "price DESC";
} elseif (isset($_POST['rev'])) {
    // Sort by review count in descending order
    $sortbyrev = $conn->prepare('SELECT 
    perfume_id, 
    COUNT(userreview) AS review_count
FROM 
    reviewtable
GROUP BY 
    perfume_id
ORDER BY 
    review_count DESC;
');

$sortOption = $sortbyrev;
}



echo $sortOption;
?>



<?php


try {
    global $conn;


    if (isset($_GET['search'])) {
        $searchTerm = $_GET['search'];

        $searchstmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume WHERE (perfume_name LIKE :searchTerm OR brand_name LIKE :searchTerm) AND category_name IN ('Men', 'Unisex', 'Women') ORDER BY $sortOption");

        $searchstmt->bindValue(':searchTerm', "%$searchTerm%", PDO::PARAM_STR);

        $searchstmt->execute();
    } elseif (isset($_GET['startprice']) && isset($_GET['endprice'])) {
        $startprice = $_GET['startprice'];
        $endprice = $_GET['endprice'];

        $pricestmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume WHERE price BETWEEN :startprice AND :endprice ORDER BY $sortOption");
        $pricestmt->bindParam(':startprice', $startprice, PDO::PARAM_INT);
        $pricestmt->bindParam(':endprice', $endprice, PDO::PARAM_INT);
        $pricestmt->execute();

    } else {


        $sortOption = 'price'; // Default sorting option

        if (isset($_POST['dec'])) {
            $sortOption = 'price DESC';
        } elseif (isset($_POST['asc'])) {
            $sortOption = 'price ASC';
        } elseif (isset($_POST['rev'])) {
            // Sort by review count
        
        }
        
        

        $stmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl,mili FROM perfume WHERE category_name IN ('Men','Unisex','Women') ORDER BY $sortOption");
 
        $stmt->execute();
 
      





        if (isset($_GET['type']) && $_GET['type'] === 'on') {

            $stmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume WHERE category_name = 'Unisex' ORDER BY $sortOption");
            $stmt->execute();
        }

        if (isset($_GET['type']) && $_GET['type'] === 'mon') {

            $menstmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume WHERE category_name = 'Men' ORDER BY $sortOption");
            $menstmt->execute();
        }

        if (isset($_GET['type']) && $_GET['type'] === 'fon') {

            $menstmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume WHERE category_name = 'Women' ORDER BY $sortOption");
            $menstmt->execute();
        }




    }



} catch (Exception $e) {
    echo "Error Found: " . $e->getMessage();
}





try {
    global $conn;

    if (isset($_GET['price']) && isset($_GET['price'])) {
        $startprice = $_GET['startprice'];
        $endprice = $_GET['endprice'];

        $recperpage = 12;

        $pricePage = isset($_GET['price']) ? (int) $_GET['price'] : 1;
        $startfromprice = max(0, ($pricePage - 1) * 12);

        $pricestmt_total = $conn->prepare("SELECT COUNT(*) as total FROM perfume WHERE price BETWEEN :startprice AND :endprice");
        $pricestmt_total->bindParam(':startprice', $startprice, PDO::PARAM_INT);
        $pricestmt_total->bindParam(':endprice', $endprice, PDO::PARAM_INT);
        $pricestmt_total->execute();
        $totalrec = $pricestmt_total->fetchColumn();
        $totalpages = ceil($totalrec / $recperpage);


        $pricestmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume WHERE price BETWEEN :startprice AND :endprice ORDER BY $sortOption LIMIT $startfromprice, $recperpage");
        $pricestmt->bindParam(':startprice', $startprice, PDO::PARAM_INT);
        $pricestmt->bindParam(':endprice', $endprice, PDO::PARAM_INT);
        $pricestmt->execute();


    } else {


        $recperpage = 12;
        $totalrec = $stmt->rowCount();
        $totalpages = ceil($totalrec / $recperpage);

        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $startfrom = max(0, ($page - 1) * 12);
        // $startfrom = ($page - 1) * 12;
        // echo $startfrom;

        $stmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume ORDER BY $sortOption LIMIT $startfrom, $recperpage");





        $stmt->execute();


        if (isset($_GET['type']) && $_GET['type'] === 'on') {

            if (isset($_GET['unipage']) && isset($_GET['unipage']) != "") {
                $unipage = $_GET['unipage'];
            } else {
                $unipage = 1;
            }

            $startfrom = ($unipage - 1) * 12;

            $stmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume WHERE category_name = 'Unisex' ORDER BY $sortOption LIMIT $startfrom, $recperpage");
            $stmt->execute();
        }
        if (isset($_GET['type']) && $_GET['type'] === 'mon') {

            if (isset($_GET['unipage']) && isset($_GET['unipage']) != "") {
                $unipage = $_GET['unipage'];
            } else {
                $unipage = 1;
            }

            $startfrom = ($unipage - 1) * 12;


            $stmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume WHERE category_name = 'Men' ORDER BY $sortOption LIMIT $startfrom, $recperpage");
            $stmt->execute();
        }

        if (isset($_GET['type']) && $_GET['type'] === 'fon') {

            if (isset($_GET['unipage']) && isset($_GET['unipage']) != "") {
                $unipage = $_GET['unipage'];
            } else {
                $unipage = 1;
            }

            $startfrom = ($unipage - 1) * 12;


            $stmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume WHERE category_name = 'Women' ORDER BY $sortOption LIMIT $startfrom, $recperpage");
            $stmt->execute();
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

        $stmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume WHERE fsletter = :letter  ORDER BY fsletter ASC, $sortOption");
        $stmt->bindParam(":letter", $letter);
        $stmt->execute();



    } catch (Exception $e) {
        echo "Error Found: " . $e->getMessage();
    }
}

?>


<!-- search  -->




<div class="grid grid-cols-3">
    <?php

    if (isset($_GET['search'])) {

        while ($row = $searchstmt->fetch()) {
            echo '<div class="w-[95%] bg-gray-100 p-3 m-2 rounded flex justify-center items-center flex-col hover:opacity-80">';
            $binary_data = $row['imgurl'];
            $base64_image = base64_encode($binary_data);
            echo '<img src="data:image/jpeg;base64,' . $base64_image . '" alt="Image" style="max-width: 200px;" >';
            echo '<a href="./itemspage.php?items=' . $row["id"] . '"class="w-64 self-start">' . $row['perfume_name'] . ' by ' . $row['brand_name'] . ' EDT 3.3 OZ ' . $row['mili'] . ' spray for ' . $row['category_name'] . '</a>';
            echo '<span class="self-start mt-2">$' . $row['price'] . '</span>';
            echo '</div>';
        }

    } elseif (isset($_GET['startprice']) && isset($_GET['endprice'])) {

        while ($row = $pricestmt->fetch()) {
            echo '<div class="w-[95%]  bg-gray-100  p-3 m-2 rounded flex justify-center items-center flex-col hover:opacity-80">';
            $binary_data = $row['imgurl'];
            $base64_image = base64_encode($binary_data);
            echo '<img src="data:image/jpeg;base64,' . $base64_image . '" alt="Image" style="max-width: 200px;" >';
            echo '<a href="./itemspage.php?items=' . $row["id"] . ' "class="w-64 self-start">' . $row['perfume_name'] . ' by ' . $row['brand_name'] . ' EDT 3.3 OZ ' . $row['mili'] . ' spray for ' . $row['category_name'] . '</a>';
            echo '<span class="self-start mt-2 bg-gray-200 hover:opacity-80 border border-gray-300 rounded-bl-full rounded-tr-full cursor-pointer px-2">$' . $row['price'] . '</span>';
            echo '</div>';
        }

    } else {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            echo '<div class="w-[95%]  bg-gray-100 p-3 m-2 rounded flex justify-center items-center flex-col hover:opacity-80">';
            $binary_data = $row['imgurl'];
            $base64_image = base64_encode($binary_data);
            echo '<img src="data:image/jpeg;base64,' . $base64_image . '" alt="Image" style="max-width: 200px;" >';
            echo '<a href="./itemspage.php?items=' . $row["id"] . '" class="w-64 self-start">' . $row['perfume_name'] . ' by ' . $row['brand_name'] . ' EDT 3.3 OZ ' . $row['mili'] . ' spray for ' . $row['category_name'] . '</a>';
            echo '<a href="" class="self-start mt-2 bg-gray-200 hover:opacity-80 border border-gray-300 rounded-bl-full rounded-tr-full cursor-pointer px-2">$' . $row['price'] . '</a>';
            echo '</div>';

        }



    }
    ?>
</div>



<div class="flex justify-center items-center mt-10 p-10">
    <?php

    if (isset($_GET['search'])) {
        //nothing
    } elseif (isset($_GET['startprice']) && isset($_GET['endprice'])) {

        // if (isset($_GET['price']) && $_GET['price'] > 1) {
        //     $prevMenPage = $_GET['price'] - 1;
        //     echo '<a href="?startprice='.$startprice.'&endprice='.$endprice.`&price=` . $prevMenPage . '" class="text-red-500 border px-2 py-1 mr-10">Prev</a>';
        // }
    
        // for ($x = 1; $x <= $totalpages; $x++) {
        //     echo '<a href="?startprice='.$startprice.'&endprice='.$endprice.'&price=' . $x . '" class="w-6 h-7 border p-1 m-1 flex justify-center items-center active">' . $x . '</a>';
        // }
    
        // if (isset($_GET['price'])) {
        //     if ($_GET['price'] >= $totalpages) {
        //         // echo '<a class="text-blue-500 border px-2 py-1 ml-10">Next</a>';
        //     } else {
        //         // $nextPage = $_GET['page'] + 1;
    
        //         if (isset($_GET['price']) && is_numeric($_GET['price'])) {
        //             $nextPage = (int) $_GET['price'] + 1;
        //             echo '<a href="?startprice='.$startprice.'&endprice='.$endprice.'&price=' . $nextPage . '" class="text-red-500 border px-2 py-1 ml-10">Next</a>';
        //         }
        //     }
        // } else {
        //     echo '<a href="?startprice='.$startprice.'&endprice='.$endprice.'&price=1 class="text-blue-500 border px-2 py-1 ml-10">Next</a>';
        // }
    

        $currentPricePage = isset($_GET['price']) ? (int) $_GET['price'] : 1;

        if ($currentPricePage > 1) {
            $prevPricePage = $currentPricePage - 1;
            echo '<a href="?page=1&startprice=' . $startprice . '&endprice=' . $endprice . '&price=' . $prevPricePage . '" class="text-red-500 border px-2 py-1 mr-10">Prev</a>';
        }

        for ($x = 1; $x <= $totalpages; $x++) {
            echo '<a href="?page=1&startprice=' . $startprice . '&endprice=' . $endprice . '&price=' . $x . '"  class="border px-2 py-1 m-1 flex justify-center items-center';
            if (isset($_GET['price']) && $_GET['price'] == $x) {
                echo ' bg-gray-500 text-white';
            } else {
                echo ' text-black-500';
            }
            echo '">' . $x . '</a>';
        }

        if ($currentPricePage < $totalpages) {
            $nextPricePage = $currentPricePage + 1;
            echo '<a href="?page=1&startprice=' . $startprice . '&endprice=' . $endprice . '&price=' . $nextPricePage . '" class="text-red-500 border px-2 py-1 ml-10">Next</a>';
        }
    } else {

        if (isset($_GET['type']) && $_GET['type'] === 'on') {
            if (isset($_GET['unisexquery']) && $_GET['unisexquery'] > 1) {
                $prevUnisexPage = $_GET['unisexquery'] - 1;
                echo '<a href="?page=1&type=on&unisexquery=' . $prevUnisexPage . '" class="text-red-500 border px-2 py-1 mr-10">Prev</a>';
            }

            for ($x = 1; $x <= $totalpages; $x++) {
                echo '<a href="?page=1&type=on&unisexquery=' . $x . '"  class="border px-2 py-1 m-1 flex justify-center items-center';
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
                    echo '<a href="?page=1&type=on&unisexquery=' . $nextPage . '" class="text-red-500 border px-2 py-1 ml-10">Next</a>';
                }
            } else {
                echo '<a href="?page=1&type=on&unisexquery=1" class="text-blue-500 border px-2 py-1 ml-10">Next</a>';
            }
        } elseif (isset($_GET['type']) && $_GET['type'] === 'mon') {
            if (isset($_GET['menquery']) && $_GET['menquery'] > 1) {
                $prevMenPage = $_GET['menquery'] - 1;
                echo '<a href="?page=1&type=mon&menquery=' . $prevMenPage . '" class="text-red-500 border px-2 py-1 mr-10">Prev</a>';
            }

            for ($x = 1; $x <= $totalpages; $x++) {
                echo '<a href="?page=1&type=mon&menquery=' . $x . '"  class="border px-2 py-1 m-1 flex justify-center items-center';
                if (isset($_GET['menquery']) && $_GET['menquery'] == $x) {
                    echo ' bg-gray-500 text-white';
                } else {
                    echo ' text-black-500';
                }
                echo '">' . $x . '</a>';
            }

            if (isset($_GET['menquery'])) {
                if ($_GET['menquery'] >= $totalpages) {
                } else {
                    $nextPage = $_GET['menquery'] + 1;
                    echo '<a href="?page=1&type=mon&menquery=' . $nextPage . '" class="text-red-500 border px-2 py-1 ml-10">Next</a>';
                }
            } else {
                echo '<a href="?page=1&type=mon&menquery=1" class="text-blue-500 border px-2 py-1 ml-10">Next</a>';
            }
        } elseif (isset($_GET['type']) && $_GET['type'] === 'fon') {
            if (isset($_GET['womenquery']) && $_GET['womenquery'] > 1) {
                $prevMenPage = $_GET['womenquery'] - 1;
                echo '<a href="?page=1&type=fon&womenquery=' . $prevMenPage . '" class="text-red-500 border px-2 py-1 mr-10">Prev</a>';
            }

            for ($x = 1; $x <= $totalpages; $x++) {
                echo '<a href="?page=1&type=fon&womenquery=' . $x . '" class="border px-2 py-1 m-1 flex justify-center items-center';
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
                    echo '<a href="?page=1&type=fon&womenquery=' . $nextPage . '" class="text-red-500 border px-2 py-1 ml-10">Next</a>';
                }
            } else {
                echo '<a href="?page=1&type=mon&menquery=1" class="text-blue-500 border px-2 py-1 ml-10">Next</a>';
            }
        } elseif (isset($_GET['letters'])) {
            //nothing
        } else {
            if (isset($_GET['page']) && $_GET['page'] > 1) {
                $prevMenPage = $_GET['page'] - 1;
                echo '<a href="?page=' . $prevMenPage . '" class="text-red-500 border px-2 py-1 mr-10">Prev</a>';
            }

            for ($x = 1; $x <= $totalpages; $x++) {
                echo '<a href="?page=' . $x . '" class="border px-2 py-1 m-1 flex justify-center items-center';
                if (isset($_GET['page']) && $_GET['page'] == $x) {
                    echo ' bg-gray-500 text-white';
                } else {
                    echo ' text-black-500 ';
                }
                echo '">' . $x . '</a>';
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