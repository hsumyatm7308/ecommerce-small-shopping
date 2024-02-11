<?php
require_once "eachitemspage/bkfunction.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>shopping</title>
  <link rel="stylesheet" href="./css/style.css">
  <script src="https://cdn.tailwindcss.com"></script>

</head>

<style>
  #modal {
    display: none;
  }
</style>

<body class="w-srceen overflow-x-hidden">

  <!-- Start Header  -->
  <?php
  require_once "./headersection.php";
  ?>



  <section class="mt-7">

    <div class="grid grid-cols-2">
      <div class="flex justify-center items-center">
        <div class="w-[500px] h-[550px] border flex justify-center items-center">
          <img src="../assets/img/perfume/men/men1.jpg" alt="" width="500px">
        </div>
      </div>
      <div>

        <?php while ($row = $showsingle->fetch()): ?>

        <?php endwhile; ?>

        <div>
          <h1 class="text-3xl">Memoire 01 by Cacharel EDT 3.3 OZ 100ML spray for Unisex</h1>
          <p class="mt-5 mb-3">Avaliable <span>(In stock)</span></p>
          <span class="text-green-600 font-semibold text-3xl">$34.98</span>

          <div class="flex items-center mt-5">
            <span class="bg-gray-100 shadow px-2 py-1 m-1">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
              </svg>

            </span>

            <span class="w-8 h-8 bg-gray-100 text-[#000] font-semibold  shadow  flex justify-center items-center">
              1
            </span>

            <span class="bg-gray-100 shadow px-2 py-1  m-1">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
              </svg>

            </span>
          </div>

          <div class="mt-5">
            <h3 class="font-semibold">Description</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error cumque labore quam numquam, iure
              aspernatur aliquam pariatur tenetur. Repudiandae accusantium accusamus quisquam ducimus non vel a labore,
              nemo itaque natus?</p>
          </div>

          <!-- Rating  -->
          <div class="mt-5">
            <div class="flex items-center">
              <h3 class="font-semibold ">Rating</h3>
              <span id="writereview" class="m-3 cursor-pointer" onclick="writereview()">Write review <span>(3
                  Reviews)</span></span>
            </div>
            <div class="mb-3">
              <div>
                <span class="text-xl text-yellow-500 font-semibold">3.3/5.0</span>
              </div>
              <div class="flex  items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="yellow" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="w-4 h-4 text-yellow-500">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="w-4 h-4 text-yellow-500">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="w-4 h-4 text-yellow-500">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="w-4 h-4 text-yellow-500">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="w-4 h-4 text-yellow-500">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                </svg>

              </div>
            </div>

            <ul class="">
              <li class="flex items-center">
                <span>1</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="yellow" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="w-4 h-4 text-yellow-500">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                </svg>
                <div class=" w-48 h-3 bg-stone-100 border ml-2 rounded progress-container">
                  <div class="w-12 h-3 bg-yellow-500 rounded-tl rounded-bl progress"></div>
                </div>
              </li>
              <li class="flex items-center">
                <span>2</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="yellow" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="w-4 h-4 text-yellow-500">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                </svg>
                <div class=" w-48 h-3 bg-stone-100 border ml-2 rounded progress-container">
                  <div class="w-12 h-3 bg-yellow-500 rounded-tl rounded-bl progress"></div>
                </div>
              </li>
              <li class="flex items-center">
                <span>3</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="yellow" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="w-4 h-4 text-yellow-500">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                </svg>
                <div class=" w-48 h-3 bg-stone-100 border ml-2 rounded progress-container">
                  <div class="w-[30%] h-3 bg-yellow-500 rounded-tl rounded-bl progress"></div>
                </div>
              </li>
              <li class="flex items-center">
                <span>4</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="yellow" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="w-4 h-4 text-yellow-500">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                </svg>
                <div class=" w-48 h-3 bg-stone-100 border ml-2 rounded progress-container">
                  <div class="w-[50%] h-3 bg-yellow-500 rounded-tl rounded-bl progress"></div>
                </div>
              </li>
              <li class="flex items-center">
                <span>5</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="yellow" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="w-4 h-4 text-yellow-500">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                </svg>
                <div class=" w-48 h-3 bg-stone-100 border ml-2 rounded progress-container">
                  <div class="w-[10%] h-3 bg-yellow-500 rounded-tl rounded-bl progress"></div>
                </div>
              </li>
            </ul>
          </div>
        </div>


      </div>
    </div>

    <div class="w-full flex justify-center items-center mt-5">
      <div class="w-[80%]">
        <h3 class="text-xl flex items-center p-1 mb-5">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9h16.5m-16.5 6.75h16.5" />
          </svg>

          Reviews
        </h3>

        <div>
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





        </div>
      </div>
    </div>

  </section>


  <section class="w-full h-screen bg-white"></section>


  <!-- modal  -->
  <section id="modal" class="w-full h-screen fixed top-0 left-0">
    <div id="modaldialog"
      class="w-full h-full bg-[linear-gradient(rgba(0,0,0,.5),rgba(0,0,0,.5))] flex justify-center items-center  absolute inset-0 modalcontainer">
      <div class="w-[500px] h-[300px] bg-stone-200 modal">
        <div class="w-full flex justify-end items-center" onclick="crossx()">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="w-6 h-6 text-gray-600 mr-5 mt-3">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>

        </div>
        <div class="w-full modal-body">
          <div class="w-full">
            <form action="" class="w-full">
              <div class="w-full h-10 flex justify-center items-center mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="yellow" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="w-6 h-6 text-yellow-500">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" fill="yellow" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="w-6 h-6 text-yellow-500">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                </svg>

                <svg xmlns="http://www.w3.org/2000/svg" fill="yellow" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="w-6 h-6 text-yellow-500">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                </svg>

                <svg xmlns="http://www.w3.org/2000/svg" fill="yellow" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="w-6 h-6 text-yellow-500">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                </svg>

                <svg xmlns="http://www.w3.org/2000/svg" fill="yellow" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="w-6 h-6 text-yellow-500">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                </svg>
              </div>

              <div class="w-full flex justify-center items-center flex-col ">
                <input type="text" class="w-[90%] mb-3 p-3" placeholder="Enter your name">
                <textarea name="" id="" class="w-[90%] p-2" cols="30" rows="" placeholder="Type review here"></textarea>
              </div>

              <div class="w-full flex justify-center items-center mt-3">
                <button type="submit" class="w-[90%] bg-gray-400 p-2">Submit</button>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </section>




  <script type="text/javascript">
    const modal = document.getElementById('modal');
    const review = document.getElementById('writereview');




    function writereview() {
      modal.style.display = "block";

    }

    function crossx() {
      modal.style.display = "none";
    }
  </script>
</body>

</html>