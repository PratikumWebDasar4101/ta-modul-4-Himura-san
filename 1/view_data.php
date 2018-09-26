<?php
    session_start();
    $data = $_SESSION['data'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>View Data - TA4 (Data)</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <a href="index.php?logout=exit"><button id="logout">Logout</button></a> <a href="form_data.php"><button id="button">Tambah Data</button></a>
        <table border="1" id="tb-data">
            <tr>
                <th width="3%">No</th>
                <th width="10%">Genre Film</th>
                <th width="12%">Wisata Travelling</t>
                <th width="15%">Hobi</th>
                <th>Foto</th>
            </tr>
            <?php
                for ( $i = 0; $i < count($data); $i++) {
                    ?>
                    <tr>
                        <td><?php echo $i+1; ?></td>
                        <td>
                            <?php
                                for ($j = 0; $j < count($data[$i]['Genre']); $j++) { 
                                    echo $data[$i]['Genre'][$j]."<br>";
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                for ($j = 0; $j < count($data[$i]['Wisata']); $j++) { 
                                    echo $data[$i]['Wisata'][$j]."<br>";
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                for ($j = 0; $j < count($data[$i]['Hobi']); $j++) { 
                                    echo $data[$i]['Hobi'][$j]."<br>";
                                }
                            ?>
                        </td>
                        <td><img src="<?php echo $data[$i]['Foto']; ?>"></td>
                    </tr>
                    <?php
                }
            ?>
        </table>
    </body>
</html>