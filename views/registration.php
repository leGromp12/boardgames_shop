<h2>Реєстрація</h2>

<form method="post" action="index.php?action=registration">
    
    <label for="login">Login:</label><br>
    <input type="text" name="login" id="login" value="<?= htmlspecialchars($_POST['login'] ?? '') ?>"><br><br>

    <label for="password">Password:</label><br>
    <input type="password" name="password" id="password"><br><br>

    <label for="confirm_password">Repeat the password:</label><br>
    <input type="password" name="confirm_password" id="confirm_password"><br><br>

    <label for="email">Email:</label><br>
    <input type="text" name="email" id="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"><br><br>

    <label for="name">Name:</label><br>
    <input type="text" name="name" id="name" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>"><br><br>

    <button type="submit">Register</button>
</form>