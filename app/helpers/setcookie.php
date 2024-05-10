<?php
$item_exists = false;
$shipmethod_exit = false;

function item_cookie($data)
{

    global $item_exists;
    $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];

    $new_item = [
        'image' => $data['itemimage'],
        'cartorderid' => $data['itemid'],
        'itemname' => $data['itemname'],
        'brandname' => $data['brandname'],
        'brand_cook_id' => $data['brandid'],
        'price' => $data['price'],
        'oquantity' => $data['oquantity'],
    ];


    item_exist_cookie($new_item['cartorderid']);

    if (!$item_exists) {
        $cart[] = $new_item;
        setcookie("cart", json_encode($cart), time() + (3 * 24 * 60 * 60), '/mvcshop');
        return true;
    }

    return false;

}


function item_update_cookie($data)
{
    global $item_exists;
    $oldcart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];

    foreach ($oldcart as $newitem) {
        if ($newitem['cartorderid'] == $data['itemid']) {
            $index = array_search($data['itemid'], array_column($oldcart, 'cartorderid'));
            $oldcart[$index]['oquantity'] = $data['oquantity'];
            break;
        }
    }

    setcookie("cart", json_encode($oldcart), time() + (3 * 24 * 60 * 60), '/mvcshop');

}







// shipping 

function shipmethod_update_cookie($shipmethod)
{
    global $defship;

    $ship = isset($_COOKIE['ship']) ? json_decode($_COOKIE['ship'], true) : [];

    $ship = [$shipmethod];

    setcookie("ship", json_encode($ship), time() + (3 * 24 * 60 * 60), '/mvcshop');


}








function item_exist_cookie($item_id)
{
    global $item_exists;

    $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];

    foreach ($cart as $item) {
        if ($item['cartorderid'] == $item_id) {
            $item_exists = true;
            break;
        }
    }
}



?>