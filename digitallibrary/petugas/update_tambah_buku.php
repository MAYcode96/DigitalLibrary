<?php
    include'header.php';
    include'navbar.php';
    ?>
    <?php
   $judul = "";
   $penulis = "";
   $penerbit = "";
   $thn_terbit = "";
    
    if(isset($_GET['id'])){
    $id = $_GET['id'];
    }else{
        $id="";
    }

    if($id !=""){ 
        $sql = mysqli_query($con, "select * from buku where id='$id'");
        $row = mysqli_fetch_array($sql);
        $judul = $row['judul'];
        $penulis = $row['penulis'];
        $penerbit = $row['penerbit'];
        $thn_terbit = $row['tahun_terbit'];
    }

    if(isset($_POST['sub'])){
        $judul=$_POST['judul'];
        $penulis = $_POST['penulis'];
        $penerbit = $_POST['penerbit'];
        $thn_terbit = $_POST['thn_terbit'];
        $id_kategori = $_POST['kategori'];
        if($_FILES['foto']['name']){
            $foto_name = $_FILES['foto']['name'];
            $foto_file = $_FILES['foto']['tmp_name'];
            $detail_file = pathinfo($foto_name);
            $foto_ekstensi = $detail_file['extension'];
            $ekstensi_yang_diperbolehkan = array("jpg","jpeg","png","gif");
            if(!in_array($foto_ekstensi,$ekstensi_yang_diperbolehkan)){
                $error = "Ekstensi yang diperbolehkan adalah jpg, jpeg, png dan gif";
            }
    
        }
    
        if (empty($error)) {
            if($foto_name){
                $direktori = "../item";
                $foto_name = 'cover'.time().'_'.$foto_name;
                move_uploaded_file($foto_file,$direktori."/".$foto_name);
    
            }else{
                $foto_name = $foto; //memasukkan data dari data yang sebelumnya ada
            }
        }

    if($id != ""){
        $sql ="update buku set judul='$judul',img='$foto_name', penulis='$penulis', penerbit='$penerbit', tahun_terbit='$thn_terbit' where id='$id'";
    }else{
        $sql ="insert into buku (id,img,judul,penulis,penerbit,tahun_terbit) values('','$foto_name','$judul','$penulis','$penerbit','$thn_terbit')";
    }

    $q1= mysqli_query($con,$sql);

    if($id!=""){ 
        $relasi = "UPDATE kategoribuku_relasi SET id_kategori='$id_kategori' WHERE id_buku='$id'";
    }else{

        $getid = mysqli_query($con, "SELECT id FROM buku ORDER BY id DESC LIMIT 1;");
        $rowget = mysqli_fetch_array($getid);
        $id_buku = $rowget['id'];  

        $relasi = "insert into kategoribuku_relasi values('','$id_buku','$id_kategori')";

    }

    $mysql=mysqli_query($con, $relasi);
            

    
    header("location:buku.php");
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
        <div class="container mt-5">
        <a href="buku.php"><< kembali</a>
        <form action="" method="post" enctype="multipart/form-data">
        <label for="inputPassword5" class="form-label">judul</label>
        <input type="text" name="judul" value="<?php echo $judul;?>" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
        <label for="inputPassword5" class="form-label">penerbit</label>
        <input type="file" name="foto" id="formFile" class="form-control" aria-describedby="passwordHelpBlock">
        <label for="inputPassword5" class="form-label">Penulis</label>
        <input type="text" name="penulis" value="<?php echo $penulis;?>" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
        <label for="inputPassword5" class="form-label">penerbit</label>
        <input type="text" name="penerbit" value="<?php echo $penerbit;?>" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
        <label for="inputPassword5" class="form-label">kategori</label>
        <select name="kategori" id="" class="form-select">
                        <?php
                        $query = mysqli_query($con, "SELECT * FROM kategoribuku;");
                        while($row=mysqli_fetch_array($query)){;?>
                            <option value="<?php echo $row['id_kategori'] ?>"><?php echo $row['nama_kategori'] ?></option>
                        <?php } ?>
                    </select>
        <label for="inputPassword5" class="form-label">Tahun Terbit</label>
        <input type="text" name="thn_terbit" value="<?php echo $thn_terbit;?>" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
        <button class="btn btn-primary btn-sm mb-3" type="submit" name="sub" >Submit</button>
        </form>
        </div>
    </body>
    </html>

    <?php
    include'footer.php';
    ?>