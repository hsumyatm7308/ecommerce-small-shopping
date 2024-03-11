<?php 
require_once "database.php";

if(isset($_GET['items'])){
    $id = $_GET['items'];
    try{

        $stmt = $conn->prepare("SELECT * FROM reviewtable WHERE id = :id");
        $stmt->bindParam(':id',$id);
        
        $stmt->execute();
    
    }catch(Exception $e){
        echo "Error Found : ".$e->getMessage();
    }
    
}
?>



<div class="p-3 mb-3">
            <div class="flex justify-start items-center">
              <div>
                <img src="../assets/img/users/user1.jpg" alt="" class=" rounded-full" width="40px">
              </div>
              <div class="ml-3">
                <h1 class="font-semibold">Jammy Volody</h1>
                <span class="text-xs">8:03 PM 5 Aug 2023 </span>
              </div>

            </div>

            <div class="flex mt-3">
              <span>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ad ipsam tempore laboriosam pariatur
                aspernatur a voluptatem rerum doloribus veritatis inventore similique sequi, accusantium eos nisi! Odio
                et ipsum velit distinctio?
              </span>
              <div class="flex">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="w-6 h-6 rotate-90">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                </svg>

              </div>
            </div>

          </div>