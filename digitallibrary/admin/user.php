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
  $sql= mysqli_query($con,"delete from koleksipribadi where id_user='$id'");
  $sql= mysqli_query($con,"delete from ulasanbuku where id_user='$id'");
  $sql= mysqli_query($con,"delete from user where id='$id'");
}

?>

 <div class="content mt-3">
 <a href="update_tambah_user.php" class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="Tambahdata">Tambah Data</a>
    <div class="card">
        <div class="card-body">
            <table class="table">
              <thead>
              <tr>
                    <th>No</th>
                    <th>username</th>
                    <th>gmail</th>
                    <th>alamat</th>
                    <th>status</th>
                    <th>aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                   $query = mysqli_query($con, "select * from user"); 
                   while($row = mysqli_fetch_array($query)){;
                ?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['username'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['alamat'];?></td>
                    <td>
                      <?php
                        $level=$row['level'];
                        if($level=="1"){
                          echo"admin";
                        }elseif($level=="2"){
                          echo"petugas";
                        }elseif($level=="3"){
                          echo"anggota";
                        }
                       ?>
                    </td>
                    <td>
                        <a href="update_tambah_user.php?id=<?php echo $row['id'];?>" class="btn btn-warning btn-sm mb-3" data-toggle="modal" data-target="#examplemodal">Edit</a>
                        <a href="user.php?delete=delete&id=<?php echo $row['id'];?>" class="btn btn-danger btn-sm mb-3" data-toggle="modal" data-target="#examplemodal">Hapus</a>
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