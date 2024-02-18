    <?php
    include'header.php';
    include'navbar.php';
    ?>
    <?php
    $nama_kategori ="";
    
    if(isset($_GET['id'])){
    $id = $_GET['id'];
    }else{
        $id="";
    }

    if($id !=""){ 
        $sql = mysqli_query($con, "select * from kategoribuku where id_kategori='$id'");
        $row = mysqli_fetch_array($sql);
        $nama_kategori = $row['nama_kategori'];
    }

    if(isset($_POST['sub'])){
        $nama_kategori=$_POST['nama_kategori'];

    if($id != ""){
        $sql ="update kategoribuku set nama_kategori='$nama_kategori' where id_kategori='$id'";
    }else{
        $sql ="insert into kategoribuku values('','$nama_kategori')";
    }
        
    $q1= mysqli_query($con,$sql);
    
    header("location:kategori.php");
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
        <label for="inputPassword5" class="form-label">Nama Kategori</label>
        <input type="text" name="nama_kategori" value="<?php echo $nama_kategori;?>" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
        <button class="btn btn-primary btn-sm mb-3" type="submit" name="sub" >Submit</button>
        </form>
        </div>
    </body>
    </html>

    <?php
    include'footer.php';
    ?>