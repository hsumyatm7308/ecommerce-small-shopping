<div class="mb-20">
                        <div class="flex justify-between items-center">
                            <div class="text-2xl font-medium">
                                Delivery Method
                            </div>
                            <div class="deli_method_edit">
                                Edit
                            </div>
                        </div>

                      <?php 

                        require_once ('/opt/lampp/htdocs/mvcshop/app/views/reusable/delimethod.php');
                       ?>

                        <div class="mt-5  deli_method hidden">
                            <form id="ship-edit-form" action="<?php echo URLROOT; ?>/checkouts/insertshipcost"
                                method="GET" class="">


                                <div class="grid grid-cols-4">

                                    <div class="col-span-3">
                                        <div class=" flex justify-between py-1 ships-radio">
                                            <div class="">
                                                <input type="radio" name="shipcost" value="0" id="shipcost_free"
                                                    class="mycheckbox" <?php echo $data['shipmethod']['method'] == 0 ? 'checked' : '' ?>>
                                                <label for="shipcost_free">
                                                    <span class="text-md font-normal"> Fast shipping </span>
                                                </label>
                                            </div>
                                            <div class="flex justify-center items-center ml-24">
                                                <span class="font-medium text-lg">Free</span>
                                            </div>
                                        </div>

                                        <div class=" flex justify-between py-1 ships-radio">
                                            <div class="">
                                                <input type="radio" name="shipcost" value="1" id="shipcost_fast" <?php echo $data['shipmethod']['method'] == 1 ? 'checked' : '' ?>>
                                                <label for="shipcost_fast">
                                                    <span class="font-normal"> Standard shipping </span>
                                                </label>
                                            </div>
                                            <div class="flex justify-center items-center ml-24">
                                                <span class="font-medium">$ 12.00</span>
                                            </div>
                                        </div>

                                        <div class=" flex justify-between py-1 ships-radio">
                                            <div class="">
                                                <input type="radio" name="shipcost" value="2" id="shipcost_fastest"
                                                    <?php echo $data['shipmethod']['method'] == 2 ? 'checked' : '' ?>>
                                                <label for="shipcost_fastest">
                                                    <span class="font-normal"> Fastest shipping</span>
                                                </label>
                                            </div>
                                            <div class="flex justify-center items-center ml-24">
                                                <span class="font-medium">$ 25.00</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                            </form>
                        </div>

                    </div>

<script type="text/javascript">


    // delivary 

    const shippingbtn = document.querySelectorAll('.ships-radio')
    const shipform = document.getElementById('ship-edit-form');
    for (let i = 0; i < shippingbtn.length; i++) {
        shippingbtn[i].addEventListener('change', function () {
            shipform.submit()
        })
    }


      // deli method 

      const deli_method_edit = document.querySelector('.deli_method_edit');
    const deli_method = document.querySelector('.deli_method');
    const deli_read = document.querySelector('.deli_read');

    deli_method_edit.addEventListener('click', () => {
        deli_method.classList.toggle('hidden');
        deli_read.classList.toggle('hidden')
    })

</script>