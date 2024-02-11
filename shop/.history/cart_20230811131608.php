<?php
// error_reporting(E_ALL);
// ini_set('display_errors', '1');

// require_once "database.php";

$cartstmt = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["quantity"])) {
        $quantity = $_POST["quantity"];
        $id = $_GET['items'];
        // $perfumename = $_POST["perfumeName"];
        // $brandname = $_POST["brandName"];

        // echo $quantity, $id,$perfumename,$brandname;

        try {
            $conn = new PDO("mysql:host=localhost;dbname=perumdej", "root", "");

            $cartstmt = $conn->prepare("SELECT * FROM perfume WHERE id = :id");

            $cartstmt->bindParam(':id', $id);
            $cartstmt->execute();



        } catch (PDOException $e) {
            echo "PDOException: " . $e->getMessage();
        }

    } else {
        echo "Quantity parameter is missing in the request.";
    }
}
?>


<?php while ($row = $cartstmt->fetch()): ?>

    <?= $row['perfume_name'] ?>
    <div class=" grid grid-cols-6 justify-center items-center border-b mb-4">
        <div class="col-span-2 flex justify-center items-center">
            <img src="./assets/img/perfume/men/men1.jpg" alt="" class="" width="100px">
            <span class="ml-10">

            </span>
        </div>

        <div class="flex justify-center items-center">
            <p>$30</p>
        </div>

        <div class=" flex justify-center items-center">

            <div class="  flex justify-center items-center p-1">

                <div class="item flex justify-center items-center p-1">
                    <div class="flex items-center">
                        <span id="decrease" class="bg-gray-100 border px-2 py-1 m-1 decrease">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                            </svg>
                        </span>

                        <span
                            class="w-8 h-8 bg-gray-100 text-[#000] font-semibold shadow drop-shadow-md flex justify-center items-center">
                            <input type="text" class="w-8 bg-gray-100 focus:outline-none valueInput" value=" 1"
                                style="text-align:center;">
                        </span>

                        <span id="increase" class="bg-gray-100 border px-2 py-1 m-1 increase">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                            </svg>
                        </span>
                    </div>
                </div>

            </div>

        </div>

        <div class="flex justify-center items-center">
            <p>$30</p>
        </div>

        <div class="flex justify-center items-center">
            <button class="px-3 py-1 bg-gray-100">Remove</button>
        </div>

    </div>
<?php endwhile; ?>