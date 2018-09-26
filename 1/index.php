<?php
    session_start();

    $akun = array(
            array("zahid", "zahid"),
            array("petrus","petrus")
    );

    if(isset($_SESSION['sukses']))
        header("Location: form_data.php");

    if(isset($_GET['logout'])){
        session_destroy();
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login - TA4 (Data)</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="login">
            <div id="title">
                <h3>Login - TA4 (Data)</h3>
            </div>
            <form method="post">
                Username <input type="text" name="username">
                Password <input type="password" name="password">
                <input type="submit" value="Login"> <input type="reset" value="Reset">
            </form>
        </div>
    </body>
</html>
<?php
    if(isset($_POST['username'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $cek = 0;
        for ( $i = 0; $i < count($akun) ; $i++) { 
            if( $akun[$i][0] == $username && $akun[$i][1] == $password ){
                $_SESSION['sukses'] = "sukses";
                header("Location: form_data.php");
                $cek++;
            }
        }

        if( $cek == 0 ){
            ?>
            <script>
                alert("Username atau Password salah..!!");
            </script>
            <?php
        }
    }
?>