<?php

function isPostRequest() {
    return $_SERVER['REQUEST_METHOD'] == "POST";
}

function isGetRequest() {
    return $_SERVER['REQUEST_METHOD'] == "GET";
}

function displayCategoryName( $categoryId ) {

    $categories = [
        1 => "Fiction",
        2 => "Non-Fiction",
        3 => "Mystery",
        4 => "Science Fiction"
    ];
    
    if(!array_key_exists($categoryId, $categories)) {
        throw new Error("Invalid category");
    }
    return $categories[$categoryId];
}



function cartMessage() {
    if (isset($_SESSION['alert_message']['success'])) { ?>
        <div class="alert alert-success" role="alert">
            <?php echo $_SESSION['alert_message']['success']; ?>
        </div>
        <?php unset($_SESSION['alert_message']['success']); ?>
    <?php } elseif (isset($_SESSION['alert_message']['error'])) { ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $_SESSION['alert_message']['error']; ?>
        </div>
        <?php unset($_SESSION['alert_message']['error']); ?>
    <?php }
}
?>
