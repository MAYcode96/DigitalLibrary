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
  $sql= mysqli_query($con,"delete from peminjaman where id='$id'");
}

?>
 <div class="content mt-3">
    <div class="card">
        <div class="card-body">
            <table id="example" class="table">
              <thead>
                <tr>
                    <th>No</th>
                    <th>user</th>
                    <th>buku</th>
                    <th>Tanggal peminjaman</th>
                    <th>Tangal pengembalian</th>
                    <th>Status</th>
                </tr>
              </thead>
              <tbody>
              <?php
                   $query = mysqli_query($con, "select * from peminjaman"); 
                   while($row = mysqli_fetch_array($query)){;
                ?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td>
                    <?php 
                    $username=$row['id_user'];
                    if($username!=""){
                      $sql=mysqli_query($con, "select * from user where id='$username'");
                      $r=mysqli_fetch_array($sql);
                      echo $r['username'];
                    }
                    ?>
                    </td>
                    <td>
                    <?php 
                    $judul=$row['id_buku'];
                    if($username!=""){
                      $sql=mysqli_query($con, "select * from buku where id='$judul'");
                      $r=mysqli_fetch_array($sql);
                      echo $r['judul'];
                    }
                    ?>
                    <td><?php echo $row['tgl_peminjaman'];?></td>
                    <td><?php echo $row['tgl_pengembalian'];?></td>
                    <td><?php echo $row['status_peminjaman'];?></td>
                </tr>
              </tbody>
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