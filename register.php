<?php
    require "header.php";
?>

<div>
    <form action="include/register.incl.php" method="post">
        <input type="text" name="name" placeholder="Név"></input>
        <input type="text" name="email" placeholder="E-mail cím"></input>
        <input type="password" name="pwd" placeholder="Jelszó"></input>
        <input type="password" name="pwdAgain" placeholder="Jelszó ismét"></input>
        
        <button type="submit" name="register-submit">Regisztráció</button>
    </form>
</div>
<?php
    require "footer.php";
?>