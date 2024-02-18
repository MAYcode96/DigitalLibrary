<?php
include('header.php');
include('navbar.php');
?>
<?php
$id_buku= $_GET['id'];
$user= $_SESSION['username'];
$query = mysqli_query($con, "select * from user where username='$user'");
$row = mysqli_fetch_array($query);
$id_user =$row['id'];

$cek_koleksi = mysqli_query($con, "select * from koleksipribadi where id_buku='$id_buku' and id_user='$id_user'");
$cek = mysqli_num_rows($cek_koleksi);

if(isset($_POST['koleksi'])){
if($cek>0){
    echo"<script language='javascript'>
        alert ('Buku sudah ada!!');
        window.location='index.php'</script>";
}else{

    $query = mysqli_query($con, "insert into koleksipribadi values('','$id_user','$id_buku')");
    echo"<script language='javascript'>
    alert ('Buku sukses di tambahkan!!');
    window.location='index.php'</script>";
}
}

if(isset($_POST['pinjam'])){

        $tgl_pinjam = date("Y-m-d");
        $tgl_kembali = date("Y-m-d", strtotime("+10 days"));
        $status = "dipinjam";
        $query = mysqli_query($con, "insert into peminjaman values('','$id_user','$id_buku','$tgl_pinjam','$tgl_kembali','$status')");
        $cek = mysqli_query($con, "select * from buku where id='$id_buku'");
        $row=mysqli_fetch_array($cek);
        $stok = $row['stok'];
        $jumlah = "1";
        $sisa = $stok-$jumlah;
        $update = mysqli_query($con, "update buku set stok='$sisa' where id='$id_buku'");
        echo"<script language='javascript'>
        alert ('Buku sukses dipinjam!');
        window.location='index.php'</script>";
    }
    ?>
<?php
if(isset($_POST['ulasanRating'])){
    $ulasan = $_POST['ulasan'];
    $rating = $_POST['rating'];
    $query = mysqli_query($con, "insert into ulasanbuku values('','$id_user','$id_buku','$ulasan','$rating')");
}
?>
<div class="container">
    <div class="content">
        <?php 
        $query = mysqli_query($con, "select * from buku where id='$id_buku'");
        $row = mysqli_fetch_assoc($query);
        ?>
        <div class="isi m-3">
            <table>
            <tr width="25%" position="right">
                <td rowspan="6"><img src="../item/<?= $row['img']?>" class="me-5" width="250px" alt=""></td>
                <td><p><span>Judul :</span><?= $row['judul']?></p></td>
                <td rowspan="6"></td>
                <td rowspan="5" class="ms-2">
                <div class="mt-2">
                    <h6>Tambahkan Rating</h6>
                        <form action="" method="POST">
                            <select name="rating" style="font-family: 'FontAwesome', 'Second Font name';">
                                <option value="5">&#xf005;&#xf005;&#xf005;&#xf005;&#xf005;</option>
                                <option value="4">&#xf005;&#xf005;&#xf005;&#xf005;</option>
                                <option value="3">&#xf005;&#xf005;&#xf005;</option>
                                <option value="2">&#xf005;&#xf005;</option>
                                <option value="1">&#xf005;</option>
                            </select>
                </div>
                <div class="mt-2">
                    <h6>Tambahkan Ulasan</h6>
                    <textarea name="ulasan" cols="30" rows="5" class="form-control">
                    </textarea>
                </div>
                <div class="mt-2">
                    <button type="submit" name="ulasanRating" class="btn btn-secondary rounded-1">Kirim</button>
                </div>
                </form>
                </td>
                <td rowspan="5">
                </td>
            </tr>
            <tr>
                <td><span>Penulis :</span><?= $row['penulis']?></td>
            </tr>
            <tr>
                <td><span>Penerbit :</span><?= $row['penerbit']?></td>
            </tr>
            <tr>
                <td><span>Tahun Terbit :</span><?= $row['tahun_terbit']?></td>
            </tr>
            <tr>
                <td><span> Stok :</span> <?= $row['stok']?></td>
            </tr>
            <tr>
                <td>
                    <form action="" method="post">
                    <button type="submit" name="koleksi" class="btn"><ion-icon name="bookmarks-outline" style="font-size: 25px;"></ion-icon></button></td>
                    </form>
                        <td>
                        <form action="" method="post">
                            <?php
                            $cek_peminjaman = mysqli_query($con, "select * from peminjaman where id_buku='$id_buku' and id_user='$id_user' and status_peminjaman='dipinjam'");
                            $cek = mysqli_num_rows($cek_peminjaman);
                            if($row['stok']=='0'){
                                    echo'<button type="submit" name="pinjam" class="btn btn-outline-warning text-black rounded-1 border-2" disabled>Stok Habis</button>';
                            }else{
                                if($cek>0){
                                    echo'<button type="submit" name="pinjam" class="btn btn-outline-warning text-black rounded-1 border-2" disabled>Belum Dikembalikan</button>';
                                }else{
                                    echo'<button type="submit" name="pinjam" class="btn btn-warning rounded-1">Pinjam</button>';
                                }
                            }
                            ?>
                        </form>
                        </td>
            </tr>
            </table>
            <div class="mt-3">
            <h4>Ulasan</h4>
            <?php
            $query = mysqli_query($con, "SELECT * FROM ulasanbuku INNER JOIN user on ulasanbuku.id_user = user.id WHERE ulasanbuku.id_buku=$id_buku;");
            while($rowrat=mysqli_fetch_array($query)) {
            ?>
                <div class="card p-2 mt-2">
                            <h6 class="m-0"><?= $rowrat['nama_lengkap']?></h6>
                            <div class="d-flex">
                                <ion-icon name="star-outline" style="font-size: 20px;"></ion-icon>
                                <p class="m-0 ms-1"><?= $rowrat['rating']?></p>
                            </div>
                    <p class="m-0 mt-2"><?= $rowrat['ulasan']?></p>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>

</div>

<?php
include 'footer.php';
?>

