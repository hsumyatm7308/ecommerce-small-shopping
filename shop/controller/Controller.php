<?php


// class Controller
// {
//     public function display($display)
//     {
//         // check model file exists or not 
//         $modelFilePath = '../view/displays/' . $display . '.php';
//         if (file_exists($modelFilePath)) {
//             // require model file 
//             require_once $modelFilePath;
//             return new $display();
//         } else {
//             die("Model file doesn't exist");
//         }
//     }
// }

require_once "../view/displays/Alldisplay.php";

?>