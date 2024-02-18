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
        $tanggal = $row['tgl_pengembalian'];

    }

    if(isset($_POST['sub'])){
        $tgl_baru = $_POST['tanggal'];

    if($id != ""){
        $sql ="update peminjaman set tgl_pengembalian='$tgl_baru' where id='$id'";
    }   
    $q1= mysqli_query($con,$sql);
    
    header("location:lapor_pinjam.php");
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
        <div class="container">
        <a href="buku.php"><< kembali</a>
        <form action="" method="post">
        <label for="inputPassword5" class="form-label">status</label>
        <input type="date" name="tanggal" value="<?php echo $tanggal;?>" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
        <button class="btn btn-primary btn-sm mb-3" type="submit" name="sub" >Submit</button>
        </form>
        </div>
    </body>
    </html>

    <?php
    include'footer.php';
    ?>