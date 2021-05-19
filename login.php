<?php
    require "header.php";
?>

<div>
    <form action="include/login.incl.php" method="post">
        <input type="text" name="email" placeholder="E-mail cím"></input>
        <input type="password" name="pwd" placeholder="Jelszó"></input>
        <button type="submit" name="login-submit">Bejelentkezés</button>
    </form>
</div>
<?php
    require "footer.php";
?>