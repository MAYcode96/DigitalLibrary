<?php
include('header.php');
include('navbar.php');
?>

<?php



if(isset($_GET['id'])){
  $id= $_GET['id'];
  $id_buku=$_GET['id_buku'];
  $status= $_POST['status'];
  $sql= mysqli_query($con,"update peminjaman set status_peminjaman='$status' where id='$id'");
  $cek = mysqli_query($con, "select * from buku where id='$id_buku'");
  $row=mysqli_fetch_array($cek);
  $stok = $row['stok'];
  $jumlah = "1";
  if($status!="dipinjam"){
    $sisa = $stok+$jumlah;
    $update = mysqli_query($con, "update buku set stok='$sisa' where id='$id_buku'");
  }else{
    $sisa = $stok-$jumlah;
  $update = mysqli_query($con, "update buku set stok='$sisa' where id='$id_buku'");
  }
}
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
            <table class="table">
                <tr>
                    <th>No</th>
                    <th>user</th>
                    <th>buku</th>
                    <th>Status</th>
                    <th>aksi</th>
                </tr>
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
                    <td>
                      <form action="pinjam.php?id=<?php echo $row['id']?>&id_buku=<?php echo $row['id_buku']?>" method="post">
                        <select class="form-select w-50" name="status"  onChange="if(this.value != 0) {this.form.submit()};">
                          <?php 
                          if($row['status_peminjaman']=='dipinjam'){
                           echo" <option value='dipinjam'>dipinjam</option>
                            <option value='dikembalikan'>dikembalikan</option>";
                          }else{
                           echo" <option value='dikembalikan'>dikembalikan</option>
                            <option value='dipinjam'>dipinjam</option>";
                          }
                          ?>
                        </select>
                    </td>
                    <td>
                       </form>
                        <a href="pinjam.php?delete=delete&id=<?php echo $row['id'];?>" class="btn btn-danger btn-sm mb-3" data-toggle="modal" data-target="#examplemodal">Hapus</a>
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