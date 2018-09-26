<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Tambah Belanjaan - TA4 (Belanjaan)</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <a href="index.php?logout=exit"><button id="logout">Logout</button></a> <a href="view_belanja.php"><button id="button">Checkout</button></a>
        <div class="belanja">
            <div id="title">
                <h3>Input Belanjaan</h3>
            </div>
            <form method="post">
                Barang Belanjaan
                <p>
                    <input type="checkbox" name="barang[]" value="ROG">ROG
                    <input type="checkbox" name="barang[]" value="MSI">MSI 
                    <input type="checkbox" name="barang[]" value="Alienware">Alienware
                    <input type="checkbox" name="barang[]" value="Omen">Omen 
                    <input type="checkbox" name="barang[]" value="Gigabyte">Gigabyte 
                </p>
                <hr>
                Jenis Pengiriman
                <p>
                    <input type="radio" name="jenis_pengiriman" value="Express"> Express
                    <input type="radio" name="jenis_pengiriman" value="Oke"> Oke
                    <input type="radio" name="jenis_pengiriman" value="Reguler"> Reguler
                    <input type="radio" name="jenis_pengiriman" value="Kilat"> Kilat
                </p>
                <hr>
                Alamat 
                <input type="text" name="alamat" placeholder="Masukkan Alamat..">

                <input type="submit" value="Tambah"> <input type="reset" value="Reset">
            </form>
        </div>
    </body>
</html>
<?php
    if (isset($_POST['barang'])) {
// ======================================================================
        $baris = count($_SESSION['cart']);
        $_SESSION['cart'][$baris] = array(
                        "Barang"  => $_POST['barang'],
                        "Jenis" => $_POST['jenis_pengiriman'],
                        "Alamat"   => $_POST['alamat']
                    );
        ?>
        <script>
            alert("Data telah tertambah..!!");
            location = "view_belanja.php";
        </script>
        <?php
// ======================================================================
    }
?>