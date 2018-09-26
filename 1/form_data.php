<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Tambah Data - TA4 (Data)</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <a href="index.php?logout=exit"><button id="logout">Logout</button></a> <a href="view_data.php"><button id="button">Lihat Data</button></a>
        <div class="data">
            <div id="title">
                <h3>Input Data</h3>
            </div>
            <form method="post" enctype="multipart/form-data">
                Genre Film :
                <p>
                    <input type="checkbox" name="genre[]" value="Horror">Horror
                    <input type="checkbox" name="genre[]" value="Action">Action 
                    <input type="checkbox" name="genre[]" value="Anime">Anime
                    <input type="checkbox" name="genre[]" value="Thriller">Thriller 
                    <input type="checkbox" name="genre[]" value="Animasi">Animasi 
                </p>
                <hr>
                Wisata Tujuan Travelling : 
                <p>
                    <input type="checkbox" name="wisata[]" value="Bali">Bali
                    <input type="checkbox" name="wisata[]" value="Raja Ampat">Raja Ampat 
                    <input type="checkbox" name="wisata[]" value="Pulau Derawan">Pulau Derawan
                    <input type="checkbox" name="wisata[]" value="Bangka Belitung">Bangka Belitung 
                    <input type="checkbox" name="wisata[]" value="Labuan Bajo">Labuan Bajo 
                </p>
                <hr>
                Hobi : 
                <p>
                    <input type="checkbox" name="hobi[]" value="Football">Football
                    <input type="checkbox" name="hobi[]" value="Basket">Basket 
                    <input type="checkbox" name="hobi[]" value="Main Games">Main Games
                    <input type="checkbox" name="hobi[]" value="Hikikomori">Hikikomori 
                </p>
                <hr>
                Upload Foto : <br>
                <input type="file" name="foto"> <br><br>

                <input type="submit" value="Tambah"> <input type="reset" value="Reset">
            </form>
        </div>
    </body>
</html>
<?php
    if (isset($_POST['genre'])) {
// ======================================================================
        $nama_foto = $_FILES['foto']['name'];
        $tmp_foto = $_FILES['foto']['tmp_name'];
        $dir_foto = "photos/";
        $target_foto = $dir_foto . $nama_foto;

        if (!move_uploaded_file($tmp_foto, $target_foto))
            die("Foto gagal di upload..!!");
// ======================================================================
        $baris = count($_SESSION['data']);
        $_SESSION['data'][$baris] = array(
                        "Genre"  => $_POST['genre'],
                        "Wisata" => $_POST['wisata'],
                        "Hobi"   => $_POST['hobi'],
                        "Foto"   => $target_foto
        );
        ?>
        <script>
            alert("Data telah tertambah..!!");
            location = "view_data.php";
        </script>
        <?php
// ======================================================================
    }
?>