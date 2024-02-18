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
  $sql= mysqli_query($con,"delete from kategoribuku_relasi where id_kategori='$id'");
$sql= mysqli_query($con,"delete from kategoribuku where id_kategori='$id'");
}

?>

 <div class="content mt-3">
    <div class="card">
        <div class="card-body">
            <a href="update_tambah_kategori.php" class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="Tambahdata">Tambah Data</a>
            <table class="table">
              <thead>
                <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php
                   $query = mysqli_query($con, "select * from kategoribuku"); 
                   while($row = mysqli_fetch_array($query)){;
                ?>
                <tr>
                    <td><?php echo $row['id_kategori'];?></td>
                    <td><?php echo $row['nama_kategori'];?></td>
                    <td>
                        <a href="update_tambah_kategori.php?id=<?php echo $row['id_kategori'];?>" class="btn btn-warning btn-sm mb-3" data-toggle="modal" data-target="#examplemodal">Edit</a>
                        <a href="kategori.php?delete=delete&id=<?php echo $row['id_kategori'];?>" class="btn btn-danger btn-sm mb-3" data-toggle="modal" data-target="#examplemodal">Hapus</a>
                    </td>
                </tr>
                <?php
                   }
                   ?>
              </tbody>
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