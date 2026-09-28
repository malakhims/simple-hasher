
    <!-- * ₊˚ ✧ ━━━━⊱ 

     THIS IS HASHER.PHP

     It is not really an include. It is just a hasher for your config password.  
     You can delete this from your server or add a starting PHP tag to the comment below if you want to keep it
     
    ⢠⡶⢦⡀⠀⠀⠀⢀⣴⠖⣦⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⡿⢀⠀⢳⡀⠀⢀⡾⢁⢤⠘⡇⠀⠀⠀⠀⠀⠀
⠀⠀⢸⡇⡇⢣⢸⡧⠶⢼⠃⡜⢸⠀⡇⠀⠀⠀⠀⠀⠀
⠀⠀⢸⡀⢃⠞⠀⠀⠀⠀⠀⠉⠁⠀⡇⠀⠀⠀⠀⠀⠀
⠀⠀⢸⡇⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢹⣄⣀⡀⠀⠀⠀
⠀⠀⣾⠁⠀⣤⡀⠀⢀⠀⢰⣿⠀⠀⡲⣿⡖⠂⠀⠀⠀
⢒⣲⣟⠀⠀⠉⠁⠀⠈⠈⠀⠀⠀⠀⣀⡿⢁⣤⠖⢲⡆
⠀⠈⠳⣤⣄⣀⣀⠀⠀⠀⠀⠀⠰⣾⠋⠀⡜⠁⠐⢸⠃
⠀⠀⠀⠀⠀⣟⠁⠀⠀⠀⠀⠀⠀⠙⡇⠀⡇⠀⠀⡏⠀
⠀⠀⠀⠀⡴⠋⠀⠀⠀⠀⠀⠀⠀⠀⣧⠀⡇⠀⠀⡇⠀
⠀⠀⠀⡼⠁⢀⠀⠀⠀⠠⢀⠀⠀⠀⠜⣷⠇⠀⠀⡇⠀
⠀⠀⣴⠃⠀⢺⠀⠀⠀⠀⠈⠀⠀⠀⠐⠠⠂⠑⢰⠇⠀
⠀⠀⣿⠀⠀⠀⡄⠀⠀⠀⠀⡆⠀⠀⡆⠀⠃⣠⠟⠀⠀
⠀⠀⠈⢦⡀⠀⢰⠀⠀⢠⠀⡇⠀⠀⠁⠀⣿⠁⠀⠀⠀
⠀⠀⠀⠀⠈⠛⠢⢷⣤⡬⠤⢧⣠⡼⠤⠚⠁⠀⠀⠀⠀
     
     ⊰━━━━ ✧ ₊˚ * -->




<!--- 

<?php
// require_once __DIR__ . '/auth.php';
// check_login(); // This will show login form if not logged in

?>
--->

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $plain_password = isset($_POST['password']) ? $_POST['password'] : '';

    if (!empty($plain_password)) {
        $hashed_password = password_hash($plain_password, PASSWORD_BCRYPT);
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
        textarea.setSelectionRange(0, 99999);
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
