<?php 



try {
    global $conn;

    $womenstmt = $conn->prepare("SELECT id, perfume_name, brand_name, category_name, price, imgurl, mili FROM perfume WHERE category_name ='Unisex' ");
    $womenstmt->execute(); // Execute the query to fetch data

    $results = $womenstmt->fetchAll(PDO::FETCH_ASSOC);
    print_r($results); // Debug: Display the results to see what's fetched

} catch (Exception $e) {
    echo "Error Found: " . $e->getMessage();
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