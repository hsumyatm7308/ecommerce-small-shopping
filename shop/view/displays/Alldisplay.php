<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../../database/Database.php';

class Alldisplay
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();

    }

    public function getperfume()
    {
        $this->db->dbquery("SELECT * FROM perfume");
        return $this->db->dbmultifetchall();
    }
}


$alldisplay = new Alldisplay();

$perfumeData = $alldisplay->getperfume();







?>

<div class="w-full grid grid-cols-3 ">

    <?php foreach ($perfumeData as $perfume): ?>
        <div class=" border border-gray-100 p-5 m-2 ">

            <a href="./itemspage.php?items=" class="w-64 self-start hover:opacity-80 mt-3 ">
                <img src="../../assets/img/perfume/men/men1.jpg" alt="Image" style="max-height: 300px;">
            </a>

            <div class="flex justify-between items-center border-t border-t-gray-300 pt-5 mt-5 ">
                <div>
                    <p>
                        <?php echo $perfume['perfume_name'] ?>
                    </p>
                </div>
                <div class="">
                    <button class="px-3 py-2 bg-green-400 hover:bg-green-500">Add</button>
                </div>
            </div>
        </div>

    <?php endforeach; ?>





</div>