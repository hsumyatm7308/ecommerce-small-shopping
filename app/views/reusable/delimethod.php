<div class="mt-5 deli_read text-md">
    <div class="mt-3">
        <ul class="space-y-2">
            <li>
                <?php
                $shipping_method = $data['shipmethod']['method'];
                echo ($shipping_method == 0) ? "Free Shipping" : (($shipping_method == 1) ? "Standard Shipping" : "Fastest Shipping");

                ?>
            </li>
            <?php

            $cur_time = time();

            $shipdate = [
                0 => date(' M d', strtotime('+10 day', $cur_time)),
                1 => date(' M d', strtotime('+7 day', $cur_time)),
                2 => date(' M d', strtotime('+3 day', $cur_time))
            ];

            $costs = [
                0 => "0.00",
                1 => "12.00",
                2 => "25.00"
            ];
            ?>
            <li>
                Estimated Arrival : <span> <?php echo date('M d', $cur_time) ?> -
                    <?php echo $shipdate[$shipping_method] ?> </span>
            </li>

            <li>
                Ship rate : $ <?php echo $costs[$shipping_method]; ?>
            </li>

        </ul>


    </div>
</div>