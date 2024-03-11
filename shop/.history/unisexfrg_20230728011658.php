<?php 

try {
    global $conn;

    $womenstmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume WHERE category_name IN ('Women', 'Unisex')");
    $womenstmt->execute(); // Execute the query to fetch data

    $results = $womenstmt->fetchAll(PDO::FETCH_ASSOC);
    print_r($results); // Debug: Display the results to see what's fetched

} catch (Exception $e) {
    echo "Error Found: " . $e->getMessage();
}

?>