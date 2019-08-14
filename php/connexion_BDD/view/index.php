<?php
if (file_exists('header.php') && file_exists('footer.php')) {
    include 'header.php';
    include 'footer.php';
} else {
    header('Location: error.php');
}
?>


