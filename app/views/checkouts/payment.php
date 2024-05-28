<div class="mb-10">
    <div class="flex justify-between items-center">
        <div class="text-2xl font-medium">
            Payment
        </div>
        <div>
            Edit
        </div>
    </div>

    <div class="mt-10">
        <form id="payment_form" action="" class=" justify-between items-center" method="POST">
            <div class="flex items-center space-x-10">

                <div class="payment-radio">

                    <input type="radio" name="payment" id="cod" value="0" <?php echo $data['payment'] == 0 ? 'checked' : ''; ?>>
                    <label for="cod">Cash On Delivery</label>

                </div>


                <div class="payment-radio">

                    <input type="radio" name="payment" id="credit" value="1" <?php echo $data['payment'] == 1 ? 'checked' : ''; ?>>
                    <label for="credit">Credit Card</label>

                </div>

            </div>

            <!-- credit  -->
            <div class="mt-10">
                <h1 class="text-lg font-medium">Credit Card</h1>
                <div class="grid grid-cols-4 mt-5 rounded  mb-5">


                    <div class="col-span-3 w-full   mb-8 flex justify-center items-center flex-col  guestinfo">


                        <div class="w-full mb-8">
                            <label for="">Name On Card</label>
                            <input type="text" name="credit_name" id="credit_name"
                                class="w-full border border-[#4c5372] rounded bg-transparent focus:outline-none mt-2 p-2 "
                                placeholder="">
                        </div>





                        <div class="w-full mb-8">
                            <label for="">Credit Card Number</label>
                            <input type="number" name="creditnumber"
                                class="w-full border border-[#4c5372]  rounded bg-transparent focus:outline-none mt-2 p-2 "
                                placeholder="xxxx xxxx xxxx xxxx">
                        </div>





                        <div class="w-full grid grid-cols-2">



                            <div class="w-full mb-8">
                                <label for="">Expired Date</label>
                                <input type="date" name="expireddate"
                                    class="w-full border border-[#4c5372]  rounded  bg-transparent focus:outline-none mt-2 p-2 val"
                                    placeholder="">
                            </div>



                            <div class="w inputval mb-2 ml-5">
                                <label for="">Security Code</label>
                                <input type="number" name="address"
                                    class="w-full border border-[#4c5372]  rounded  bg-transparent focus:outline-none mt-2 p-2 val"
                                    placeholder="">
                            </div>



                        </div>
                    </div>


                </div>


                <!-- payment  -->
                <div class="grid grid-cols-4 rounded  mb-10">
                    <div class="col-span-3 w-full   mb-8 flex justify-center items-center flex-col  guestinfo ">

                        <button type="" id="payment_btn" name="payment_btn"
                            class="text-xl w-full h-14 bg-[#4c5372] text-white flex justify-center items-center border hover:border-2 rounded-md mb-10">Save
                            & Continue</button>


                        <!-- <div class="w-full border-t border-t-[#415a77] pt-5 ">
                            <button type="" id="shipping_ctn" name="shipping_ctn"
                                class="text-xl w-full h-14 bg-yellow-500 text-white flex justify-center items-center border hover:border-2 rounded-md mb-5">
                                <i class="fa-brands fa-paypal"></i>
                                <span class="ml-3">Paypal</span></button>

                            <button type="" id="shipping_ctn" name="shipping_ctn"
                                class="text-xl w-full h-14 bg-blue-500 text-white flex justify-center items-center border hover:border-2 rounded-md">
                                <img src="<?php echo URLROOT; ?>/public/assets/kbz/kbz1.png" alt="" width="30px">
                                <span class="ml-3">KBZPay</span></button>
                        </div> -->






                    </div>
                </div>

            </div>
        </form>
    </div>

</div>

<script type="text/javascript">
    const paymentradio = document.querySelectorAll('.payment-radio')
    const payment_form = document.getElementById('payment_form');
    for (let i = 0; i < paymentradio.length; i++) {
        paymentradio[i].addEventListener('change', function () {
            payment_form.submit()
        })
    }

</script>