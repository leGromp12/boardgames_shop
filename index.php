<?php include "layout/header.php"; ?>
<?php include "layout/left_menu.php"; ?>

<main>
<?php

$action = $_GET['action'] ?? 'main';

if ($action === 'about') {
    include "views/about.php";
} else {
    include "views/main.php";
}

?>
</main>

<?php include "layout/footer.php"; ?>