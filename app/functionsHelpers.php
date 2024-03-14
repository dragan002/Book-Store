<?php

function isPostRequest() {
    return $_SERVER['REQUEST_METHOD'] == "POST";
}

function isGetRequest() {
    return $_SERVER['REQUEST_METHOD'] == "GET";
}

function displayCategoryName( $categoryId ) {
    if($categoryId == 1) {
        return "Fiction";
    } elseif($categoryId == 2) {
        return "Non-Fiction";
    } elseif($categoryId == 3) {
        return "Mystery";
    } elseif($categoryId == 4) {
        return "Science Fiction";
    }
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
