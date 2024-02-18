<?php
    include'header.php';
    include'navbar.php';
    ?>
    <?php
   $id_user = "";
   $id_buku = "";
   $tgl_pinjam = "";
   $tgl_kembali = "";
   $status = "";
    
    if(isset($_GET['id'])){
    $id = $_GET['id'];
    }else{
        $id="";
    }

    if($id !=""){ 
        $sql = mysqli_query($con, "select * from peminjaman where id='$id'");
        $row = mysqli_fetch_array($sql);
        $status = $row['status_peminjaman'];

    }

    if(isset($_POST['sub'])){
        $status = $_POST['status'];

    if($id != ""){
        $sql ="update peminjaman set status_peminjaman='$status' where id='$id'";
    }   
    $q1= mysqli_query($con,$sql);
    
    header("location:pinjam.php");
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <form action="" method="post">
        <label for="inputPassword5" class="form-label">status</label>
        <input type="text" name="status" value="<?php echo $status;?>" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
        <button class="btn btn-primary btn-sm mb-3" type="submit" name="sub" >Submit</button>
        </form>
    </body>
    </html>

    <?php
    include'footer.php';
    ?>