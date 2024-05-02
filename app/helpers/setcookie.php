<?php
$item_exists = false;

function item_cookie($data)
{

    global $item_exists;
    $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
    // echo (count($cart));


    $new_item = [
        'image' => $data['itemimage'],
        'id' => $data['itemid'],
        'itemname' => $data['itemname'],
        'brandname' => $data['brandname'],
        'brand_cook_id' => $data['brandid'],
        'price' => $data['price'],
        'oquantity' => $data['oquantity'],
    ];


    item_exist_cookie($data['itemid']);

    if (!$item_exists) {
        $cart[] = $new_item;
        setcookie("cart", json_encode($cart), time() + (3 * 24 * 60 * 60), '/mvcshop');
        return true;
    }

    return false;

}


function item_exist_cookie($item_id)
{
    global $item_exists;

    $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];

    foreach ($cart as $item) {
        if ($item['id'] == $item_id) {
            $item_exists = true;
            break;
        }
    }
}


?>