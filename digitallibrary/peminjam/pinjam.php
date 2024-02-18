<?php
include('header.php');
include('navbar.php');
?>
<div class="container">
    <h1 align="center">pinjam</h1>
<div class="row row-cols-1 row-cols-md-5 g-8">
<?php
 $user= $_SESSION['username'];
 $ambil_id = mysqli_query($con, "select * from user where username='$user'");
 $row_ambil = mysqli_fetch_array($ambil_id);
 $id_user = $row_ambil['id'];
 $status = "dipinjam";
 $query = mysqli_query($con, "SELECT * from peminjaman peminjaman join buku buku on peminjaman.id_buku = buku.id where peminjaman.id_user='$id_user' and peminjaman.status_peminjaman='$status'");
 while($row=mysqli_fetch_array($query)){
?>
<div class="col">
<div class="card m-1" style="width: 12rem;">
    <a href="buku.php?id=<?php echo$row['id']?>" class="text-decoration-none">
  <img src="../item/<?php echo $row['img'] ?>" style="height: 250px;" class="card-img-top" alt="...">
  <div class="card-body">
    <p class="text-black fw-semibold" align="center"><?php echo substr($row['judul'],0,17);?></p>
</div>
  </div>
</a>
</div>
<?php
}
?>
</div>
</div>
<?php
include 'footer.php';
?>
