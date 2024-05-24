<div class="mb-20">
    <div class="flex justify-between items-center">
        <div class="text-2xl font-medium">
            Shipping Address
        </div>
        <div class="deli_method_edit">
            Edit
        </div>
    </div>




    <div class="<?php echo $_SESSION['guest_email'] || $_SESSION['user_email'] ? '' : 'hidden' ?>">
        <form action="" method="POST" class="<?php echo $_SESSION['shipaddress']['id'] ? 'hidden' : '' ?>">
            <!-- address  -->
            <div class="grid grid-cols-4 mt-10 rounded  mb-5 ">


                <div class="col-span-3 w-full   mb-8 flex justify-center items-center flex-col  guestinfo">

                    <div class="w-full grid grid-cols-2 mb-5">

                        <div class="w-full ">
                            <label for="">First Name</label>
                            <input type="text" name="firstname"
                                class="w-full border border-[#4c5372] <?php echo !empty($data['firstnameerr']) ? 'border-red-500' : '' ?> rounded bg-transparent focus:outline-none mt-2 p-2 mb-2"
                                placeholder="" value="<?php echo $data['firstname'] ?>">
                            <span class="text-sm text-red-500" <?php echo !empty($data['firstnameerr']) ? '' : 'hidden' ?>><?php echo $data['firstnameerr']; ?></span>
                        </div>


                        <div class="w inputval mb-2 ml-5">
                            <label for="">Last Name *</label>

                            <input type="text" name="lastname"
                                class="w-full border border-[#4c5372] <?php echo !empty($data['lastnameerr']) ? 'border-red-500' : '' ?> rounded bg-transparent focus:outline-none mt-2 p-2 val mb-2"
                                placeholder="" value="<?php echo $data['lastname'] ?>">
                            <span class="text-sm text-red-500" <?php echo !empty($data['lastnameerr']) ? '' : 'hidden' ?>><?php echo $data['lastnameerr']; ?></span>
                        </div>

                    </div>


                    <div class="w-full mb-5">
                        <label for="">Company</label>
                        <input type="text" name="company"
                            class="w-full border border-[#4c5372]  rounded bg-transparent focus:outline-none mt-2 p-2 mb-2"
                            placeholder="option" value="<?php echo $data['company'] ?>">
                    </div>




                    <div class="w-full inputval mb-5">
                        <label for="">Address *</label>
                        <input type="text" name="address"
                            class="w-full border border-[#4c5372] <?php echo !empty($data['addresserr']) ? 'border-red-500' : '' ?> rounded  bg-transparent focus:outline-none mt-2 p-2 val mb-2"
                            placeholder="" value="<?php echo $data['address'] ?>">
                        <span class="text-sm text-red-500" <?php echo !empty($data['addresserr']) ? '' : 'hidden' ?>><?php echo $data['addresserr']; ?></span>

                    </div>




                    <div class="w-full grid grid-cols-2 mb-5">

                        <div class="w-full">
                            <label for="">Phone</label>
                            <input type="text" name="phone"
                                class="w-full border border-[#4c5372]  rounded bg-transparent focus:outline-none mt-2 p-2 mb-2"
                                placeholder="option" value="<?php $data['address'] ?>">
                        </div>


                        <div class="inputval mb-2 ml-5">
                            <label for="">Zip *</label>

                            <input type="text" name="zip"
                                class="w-full border border-[#4c5372] <?php echo !empty($data['ziperr']) ? 'border-red-500' : '' ?> rounded bg-transparent focus:outline-none mt-2 p-2 mb-2 val "
                                placeholder="" value="<?php echo $data['zip'] ?>">
                            <span class="text-sm text-red-500" <?php echo !empty($data['ziperr']) ? '' : 'hidden' ?>><?php echo $data['ziperr']; ?></span>

                        </div>

                    </div>





                    <div class="w-full grid grid-cols-2 mb-5">

                        <div class="w-full h-14 ">
                            <label for="">City</label>
                            <input type="text" name="city"
                                class="w-full border border-[#4c5372] <?php echo !empty($data['cityerr']) ? 'border-red-500' : '' ?>  rounded bg-transparent focus:outline-none mt-2 p-2 mb-2"
                                placeholder="option" value="<?php echo $data['city'] ?>">
                            <span class="text-sm text-red-500" <?php echo !empty($data['cityerr']) ? '' : 'hidden' ?>>
                                <?php echo $data['cityerr']; ?></span>

                        </div>






                        <div class=" inputval relative  ml-5 mb-5">

                            <label for="">State *</label>

                            <select name="state_id"
                                class="w-full border border-[#4c5372]  rounded  bg-transparent focus:outline-none mt-2 p-2 val select-box">
                                <option>Choose State..</option>
                                <option value="1" <?php echo $data['state_id'] == 1 ? 'selected' : '' ?>>
                                    Auslia
                                </option>
                                <option value="2" <?php echo $data['state_id'] == 2 ? 'selected' : '' ?>>
                                    Myanmar</option>

                            </select>

                            <div class="arrow">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                </svg>

                            </div>


                        </div>


                    </div>



                    <div class="w-full inputval relative mb-5 custom-select">

                        <label for="">Country *</label>

                        <select name="country_id"
                            class="w-full border border-[#4c5372]  rounded  bg-transparent focus:outline-none mt-2 p-2 val select-box">
                            <option value="">Auslia</option>
                            <option value="">Myanmar</option>

                        </select>

                        <div class="arrow">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>

                        </div>
                    </div>




                </div>


            </div>




            <!-- billing address  -->
            <div class="">
                <h1 class="text-lg font-medium">Billing Address</h1>
                <div class="mt-5">
                    <input type="checkbox" name="billaddresscheck" checked>
                    <label for="">Use this address for billing</label>
                </div>
            </div>



            <div class="grid grid-cols-4 mt-10 rounded  mb-10">
                <div class="col-span-3 w-full   mb-8 flex justify-center items-center flex-col  guestinfo">
                    <button type="" id="shipping_ctn" name="shipping_address_btn"
                        class="text-xl w-full h-14 bg-[#4c5372] text-white flex justify-center items-center border hover:border-2 rounded-md">Save
                        & Continue</button>
                </div>
            </div>


        </form>



        <div class="mt-5">

            <div class="space-y-2">

                <p>
                    <span><?php echo $_SESSION['shipaddress']['firstname']; ?></span>

                    <span><?php echo $_SESSION['shipaddress']['lastname'] ?></span>
                </p>
                <p><?php echo $_SESSION['shipaddress']['address'] ?></p>
                <p><?php echo $_SESSION['shipaddress']['city'] ?></p>
            </div>


        </div>
    </div>
</div>

<script type="text/javascript">

    // shipping 

    const shippingbtn = document.querySelectorAll('.ships-radio')
    const shipform = document.getElementById('ship-edit-form');
    for (let i = 0; i < shippingbtn.length; i++) {
        shippingbtn[i].addEventListener('change', function () {
            shipform.submit()
        })
    }

</script>