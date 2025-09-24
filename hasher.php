
<!--- 
If you want to keep the hasher on your server, comment this out.
// <?php
// require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/auth.php';
// check_login(); // This will show login form if not logged in

?>
--->

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $plain_password = $_POST['password'] ?? '';

    if (!empty($plain_password)) {
        $hashed_password = password_hash($plain_password, PASSWORD_DEFAULT);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Password Hasher</title>
    <script>
    function copyHash() {
        const textarea = document.getElementById("hashOutput");
        textarea.select();
        textarea.setSelectionRange(0, 99999); // For mobile
        document.execCommand("copy");
        alert("Hash copied to clipboard!");
    }
    </script>
</head>
<body>
    <h2>Password Hasher</h2>
    <form method="post" action="">
        <label for="password">Enter password:</label>
        <input type="text" name="password" id="password" required>
        <button type="submit">Generate Hash</button>
    </form>

    <?php if (!empty($hashed_password)): ?>
        <h3>Your secure hash:</h3>
        <textarea id="hashOutput" rows="2" cols="80" readonly><?php echo htmlspecialchars($hashed_password); ?></textarea><br>
        <button onclick="copyHash()">Copy Hash</button>
    <?php endif; ?>
</body>
</html>
