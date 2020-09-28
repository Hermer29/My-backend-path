<?php if(session_status() == 0)
        {
        session_start();
        }
    ?>
<!doctype html>
<html>
    <head>
        <title>Some title</title>
        <style src="css/style.css"></style>
    </head>
    <body>
        <?php if(empty($_SESSION["logged"]) or $_SESSION["logged"]===false):?>
            <form method="post" action="action.php">
                Login:<br><input name="login"><br>
                Password:<br><input name="password" type="password"><br>
                <button type="submit">login</button>
                <?php if (!empty($_SESSION["wrong-pass"]))
                    echo "<strong class=\"wrong-pass\">неправильно введен логин или пароль!</strong>";
                    $_SESSION["wrong-pass"] = false;
                ?>
            </form>
        <?php else:?>
            Добро пожаловать, пользователь
        <?php endif?>

        <?php 
            
        ?>
    </body>
        
</html>