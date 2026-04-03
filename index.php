<?php include "layout/header.php"; ?>
<?php include "layout/left_menu.php"; ?>

<main>
<?php

$action = $_GET['action'] ?? 'main';

if ($action === 'about') {
    include "views/about.php";
} 

elseif ($action === 'registration') {

    $errors = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $login = $_POST['login'] ?? '';
        $password = $_POST['password'] ?? '';
        $confirm_password = $_POST['confirm_password'] ?? '';
        $email = $_POST['email'] ?? '';
        $name = $_POST['name'] ?? '';

        // LOGIN: at least 4 characters, letters (latin/cyrillic), numbers, _ -
        if (!preg_match('/^[a-zA-Zа-яА-Я0-9_-]{4,}$/u', $login)) {
            $errors[] = "Login must be at least 4 characters and contain only letters, numbers, _ or -";
        }

        // PASSWORD: min 7 chars, at least 1 uppercase, 1 lowercase, 1 digit
        if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{7,}$/', $password)) {
            $errors[] = "Password must be at least 7 characters and include uppercase, lowercase and a number";
        }

        // CONFIRM PASSWORD
        if ($password !== $confirm_password) {
            $errors[] = "Passwords do not match";
        }

        // EMAIL
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email address";
        }

        // NAME (optional)
        if (!empty($name)) {
            if (strlen($name) > 255) {
                $errors[] = "Name must not exceed 255 characters";
            }
            if (!preg_match("/^[a-zA-Zа-яА-Я'-]+$/u", $name)) {
                $errors[] = "Name can contain only letters, hyphen and apostrophe";
            }
        }

        // IF NO ERRORS → SUCCESS PAGE
        if (empty($errors)) {
            header("Location: index.php?action=registration_successful");
            exit;
        }
    }

    // SHOW ERRORS (if any)
    if (!empty($errors)) {
        echo "<ul class='errors'>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    }

    include "views/registration.php";
} elseif ($action === 'registration_successful') {
    include "views/registration_successful.php";
}

else {
    include "views/main.php";
}

?>
</main>

<?php include "layout/footer.php"; ?>