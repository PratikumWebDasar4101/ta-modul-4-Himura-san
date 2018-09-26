<?php
    session_start();
    $cart = $_SESSION['cart'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>View Data - TA4 (Belanjaan)</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <a href="index.php?logout=exit"><button id="logout">Logout</button></a> <a href="form_belanja.php"><button id="button">Tambah Belanjaan</button></a>
        <table border="1" id="tb-data">
            <tr>
                <th width="3%">No</th>
                <th width="15%">Barang Belanjaan</th>
                <th width="10%">Jenis Pengiriman</th>
                <th width="15%">Tanggal Pembelian</th>
                <th>Alamat</th>
                <th width="10%">Total Biaya</th>
            </tr>
            <?php
                for ( $i = 0; $i < count($cart); $i++) {
                    $total_harga_barang = 0;
                    $total_biaya = 0;
                    $tgl_pembelian = date('d-M-Y');
                    ?>
                    <tr>
                        <td><?php echo $i+1; ?></td>
                        <td>
                            <?php
                                for ($j = 0; $j < count($cart[$i]['Barang']); $j++) {
                                    $barang = $cart[$i]['Barang'];
                                    $total_barang = count($cart[$i]['Barang']);
                                    if ($barang[$j] == "ROG") {
                                        $harga_barang = 14790000;
                                    } elseif($barang[$j] == "MSI") {
                                        $harga_barang = 11550000;
                                    } elseif($barang[$j] == "Alienware") {
                                        $harga_barang = 17000000;
                                    } elseif($barang[$j] == "Omen") {
                                        $harga_barang = 20000000;
                                    } else {
                                        $harga_barang = 14000000;
                                    }
                                    $total_harga_barang = $total_harga_barang + $harga_barang;
                                    echo $barang[$j]." : Rp.".number_format($harga_barang)."<br>";
                                }
                            ?>
                        </td>
                        <td>
                            <?php 
                                $jenis = $cart[$i]['Jenis'];
                                if($jenis == "Express"){
                                    $harga_pengiriman = 11000;
                                } elseif($jenis == "Oke") {
                                    $harga_pengiriman = 10000;
                                }  elseif($jenis == "Reguler") {
                                    $harga_pengiriman = 12000;
                                }  else {
                                    $harga_pengiriman = 13000;
                                }
                                echo $jenis." : Rp.".number_format($harga_pengiriman);
                            ?>
                        </td>
                        <td><?php echo $tgl_pembelian;?></td>
                        <td><?php echo $cart[$i]['Alamat']; ?></td>
                        <td>
                            <?php 
                                $total_biaya = $harga_pengiriman + $total_harga_barang;
                                echo "Rp.".number_format($total_biaya);
                            ?>
                        </td>
                    </tr>
                    <?php
                }
            ?>
        </table>
    </body>
</html>