<?php

$treat = $_POST['treat'];

if ($treat === 'van') {
    $vanilla = array(
        'description' => 'Smooth, creamy frosting on white cake',
        'price' => '2.97',
        'image' => 'vanilla.jpg'
    );

    echo json_encode($vanilla);
}

else if ($treat === 'choc') {

    $chocolate = array(
        'description' => 'Rich, chocolate frosting on chocolate cake',
        'price' => '2.99',
        'image' => 'chocolate.jpg'
    );

    echo json_encode($chocolate);
}

else if ($treat === 'red') {

    $redVelvet = array(
        'description' => 'Delicious cream cheese frosting on red velvet cake',
        'price' => '2.98',
        'image' => 'velvet.jpg'
    );

    echo json_encode($redVelvet);

}
else if ($treat === 'reeses') {
    $reeses = array(
        'description' => 'Peanut butter flavored candy, covered in a festive candy coating',
        'price' => '1.00',
        'image' => 'reeses.jpg'
    );

    echo json_encode($reeses);
}

else if ($treat === 'mm') {
    $mms = array(
        'description' => 'Candy coated, melt in your mouth (not your hand) chocolate pieces',
        'price' => '1.50',
        'image' => 'mms.jpg'
    );

    echo json_encode($mms);
}
else if ($treat === 'skittles') {
    $skittles = array(
        'description' => 'Fruit flavored, chewy candies, perfect for all ages',
        'price' => '1.25',
        'image' => 'skittles.jpg'
    );

    echo json_encode($skittles);
}
else{
    echo "php error";
}

?>