<?php
include('header.php');
include('navbar.php');
$row ="";
$id_buku="";
?>
<div class="container">
  <div class="content m-4 d-flex justify-content-between">
  <div class="col-auto me-5">
    <form method="get" id="form_id">
      <div class="d-flex">
      <select name="kategori" class="form-select" onChange="this.form.submit();">
      <option value="">Kategori</option>
        <?php
        $sql = mysqli_query($con, "select * from kategoribuku");
        while($row=mysqli_fetch_array($sql)){?>
        <option value="<?php echo $row['id_kategori']?>"><?php echo $row['nama_kategori']?></option>
        <?php
        }
        ?>
    </select>
      <button type="submit" name="kategori" value="" class="btn btn-secondary ms-2 rounded-1"><ion-icon name="sync-outline"  style="font-size: 20px;"></ion-icon></button>
      </div>

    </div>
    <div class="d-flex">
    <div class="col-auto me-2">
        <input type="text" class="form-control bg-transparent" placeholder="Ketik yang anda ingin cari" name="cari"/>
      </div>
      <div class="col-auto">
        <button type="submit" class="btn btn-secondary rounded-1"><ion-icon name="search-outline" style="m-0" style="font-size: 25px;"></ion-icon></button>
      </div>
    </div>
    </form>
  </div>
    <div class="container">
    <div class="row row-cols-1 row-cols-md-5 g-8">
  <?php
$query = mysqli_query($con, "select * from buku");
if(isset($_GET['cari'])){
  $cari = $_GET['cari'];
  $query = mysqli_query($con, "select * from buku where judul like '%".$cari."%' or penulis like '%".$cari."%' or penerbit like '%".$cari."%'");
}
if(isset($_GET['kategori'])){
  if($_GET['kategori']!=""){
    $cari_kategori = $_GET['kategori'];
    $query = mysqli_query($con, "SELECT * from kategoribuku_relasi join buku on kategoribuku_relasi.id_buku = buku.id  where
     kategoribuku_relasi.id_kategori=$cari_kategori");
  }
}
while($row =mysqli_fetch_array($query)){
?>
<div class="col">
<div class="card m-1" style="width: 12rem;">
    <a href="buku.php?id=<?php echo$row['id']?>" class="text-decoration-none">
  <img src="../item/<?php echo $row['img'] ?>" style="height: 250px;" class="card-img-top" alt="...">
  <div class="card-body">
    <p class="card-title text-black fw-semibold"align="center"><?php echo substr($row['judul'],0,17);?></p>
</div>
  </div>
</a>
</div>
<?php
}
?>
</div>
    </div>  
</div>

<?php
include'footer.php';
?>