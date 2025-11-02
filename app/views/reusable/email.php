<div
    class="col-span-3 w-full   mb-8 flex justify-center items-start flex-col  guestinfo_read <?php echo $_SESSION['guest_email'] ? '' : 'hidden' ?>">

    <div class="w-full  flex justify-center items-center space-x-2">

        <div class="w-full mb-8">
            <label for="">Email</label>
            <input type="email" name=""
                class="w-full border border-[#4c5372]  <?php echo $_SESSION['guest_email'] ? 'border-green-500' : 'border-[#4c5372]' ?> rounded bg-transparent focus:outline-none mt-2 p-2 "
                placeholder="Your email" value="<?php echo $_SESSION['guest_email'] ?>">
        </div>


    </div>
</div>