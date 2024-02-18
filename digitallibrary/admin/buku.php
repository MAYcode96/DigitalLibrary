<?php
include('header.php');
include('navbar.php');
?>


<?php

if(isset($_GET['delete'])){
$delete = $_GET['delete'];
}else {
  $delete = "";
}

if($delete!=""){
  $id = $_GET['id'];
  $sql= mysqli_query($con,"delete from ulasanbuku where id_buku='$id'");
  $sql= mysqli_query($con,"delete from koleksipribadi where id_buku='$id'");
  $sql= mysqli_query($con,"delete from kategoribuku_relasi where id_buku='$id'");
  $sql= mysqli_query($con,"delete from peminjaman where id_buku='$id'");
  $sql= mysqli_query($con,"delete from buku where id='$id'");
}

?>
 <div class="content mt-3">
    <div class="card">
        <div class="card-body">
            <a href="update_tambah_buku.php" class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="Tambahdata">Tambah Data</a>
            <table class="table">
                <tr>
                    <th>No</th>
                    <th>cover</th>
                    <th>judul</th>
                    <th>kategori</th>
                    <th>Stok</th>
                    <th>aksi</th>
                </tr>
                <?php
                    $query = mysqli_query($con, "SELECT buku.id, buku.img, buku.judul, buku.penulis, buku.penerbit, buku.tahun_terbit, buku.stok,
                     kategoribuku.nama_kategori FROM buku inner join kategoribuku_relasi on buku.id = kategoribuku_relasi.id_buku inner join
                      kategoribuku on kategoribuku.id_kategori = kategoribuku_relasi.id_kategori ORDER BY buku.id desc;");
                   while($row = mysqli_fetch_array($query)){;
                ?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><img src="../item/<?php echo $row['img'];?>" style="width: 100px;" class="rounded"></td>
                    <td><?php echo $row['judul'];?></td>
                    <td><?php echo $row['nama_kategori']?></td>
                    <td><?php echo $row['stok'];?></td>
                    <td>
                        <a href="update_tambah_buku.php?id=<?php echo $row['id'];?>" class="btn btn-warning btn-sm mb-3" data-toggle="modal" data-target="#examplemodal">Edit</a>
                        <a href="buku.php?delete=delete&id=<?php echo $row['id'];?>" class="btn btn-danger btn-sm mb-3" data-toggle="modal" data-target="#examplemodal">Hapus</a>
                    </td>
                </tr>
                <?php
                   }
                   ?>
            </table>
        </div>
    </div>
 </div>
 <!-- Modal -->
<div class="modal fade" id="tambahdata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<?php
include('footer.php')
?>