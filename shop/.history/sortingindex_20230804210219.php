<div>
                <ul class="flex justify-center items-center">
                    <li class="font-bold mr-5">Sort by : </li>
                    <form action="" method="post" class="flex justify-center items-center">
                        <?php


                        if (isset($_POST['asc']) ) {
                        

                            echo '<li class="mr-5">
                                <button type="submit" name="asc" class="text-gray-500 p-1">Ascending price</button>
                            </li>';
                        } else {
                            echo '<li class="mr-5">
                            <button type="submit" name="asc" class="">Ascending price</button>
                        </li>';
                        }
                        if (isset($_POST['dec'])) {
                            echo '<li class="mr-5">
                                <button type="submit" name="dec" class="text-gray-500">Descending price</button>
                            </li>';
                        } else {
                            echo '<li class="mr-5">
                                <button type="submit" name="dec" class="text--500">Descending price</button>
                            </li>';
                        }
                        
                        if (isset($_POST['rev'])) {
                            echo '<li class="mr-5">
                                <button type="submit" name="rev" class="text-gray-500">Review </button>
                            </li>';
                        } else {
                            echo '<li class="mr-5">
                                <button type="submit" name="rev" class="text--500">Review </button>
                            </li>';
                        }
                        

                        ?>
                    </form>
                </ul>
            </div>