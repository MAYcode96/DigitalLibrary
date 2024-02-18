<?php
include('header.php');
include('navbar.php');
?>

<?php
if(isset($_POST['koleksi'])){
  $id_user = $_GET['id_user'];
  $id_buku = $_GET['id_buku'];
  $delete = mysqli_query($con, "delete from koleksipribadi where id_user='$id_user' and id_buku='$id_buku'");
}
?>
<div class="container">
    <h1 align="center">Koleksi</h1>
<div class="row row-cols-1 row-cols-md-5 g-8">
<?php
        $user= $_SESSION['username'];
        $ambil_id = mysqli_query($con, "select * from user where username='$user'");
        $row_ambil = mysqli_fetch_array($ambil_id);
        $id_user = $row_ambil['id'];
        $query = mysqli_query($con, "SELECT * from koleksipribadi koleksipribadi join buku buku on koleksipribadi.id_buku = buku.id where koleksipribadi.id_user='$id_user'");
        while ( $row= mysqli_fetch_array($query)){
        ?>
<div class="col">
<div class="card m-1" style="width: 12rem;">
    <a href="buku.php?id=<?php echo$row['id']?>" class="text-decoration-none">
  <img src="../item/<?php echo $row['img'] ?>" style="height: 250px;" class="card-img-top" alt="...">
  <div class="card-body">
    </a>
  <p class="text-black fw-semibold" align="center"><?php echo substr($row['judul'],0,17);?></p>
  <form action="koleksi.php?id_user=<?php echo $row['id_user']?>&id_buku=<?php echo $row['id_buku']?>" method="post">
      <button type="submit" name="koleksi" class="btn btn-warning"><ion-icon name="trash-outline"></ion-icon></button>
    </form>
</div>
  </div>
</div>
<?php
}
?>
</div>
</div>
<?php
include 'footer.php'
?>