<?php
    include'header.php';
    include'navbar.php';
    ?>
    <?php
   $user = "";
   $level = "";
    
    if(isset($_GET['id'])){
    $id = $_GET['id'];
    }else{
        $id="";
    }

    if($id !=""){ 
        $sql = mysqli_query($con, "select * from user where id='$id'");
        $row = mysqli_fetch_array($sql);
        $user = $row['username'];
        $level = $row['level'];
        $mail = $row['email'];
        $nameL = $row['nama_lengkap'];
        $alamat = $row['alamat'];
    }

    if(isset($_POST['sub'])){
        $user = $_POST['user'];
        $pass =md5($_POST['pass']);
        $mail = $_POST['mail'];
        $nameL = $_POST['nameL'];
        $alamat = $_POST['alamat'];
        $level = $_POST['level'];

    if($id != ""){
        $sql ="update user set username='$user', password='$pass', email='$mail', nama_lengkap='$nameL', alamat='$alamat', level='$level' where id='$id'";
    } else{
        $sql = "insert into user values('','$user','$pass','$mail','$nameL','$alamat','$level')";
    }  
    $q1= mysqli_query($con,$sql);
    
    header("location:user.php");
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
        <label for="inputPassword5" class="form-label">user</label>
        <input type="text" name="user" value="<?php echo $user;?>" class="form-control" aria-describedby="passwordHelpBlock">
        <label for="inputPassword5" class="form-label">Password</label>
        <input type="text" name="pass" class="form-control" aria-describedby="passwordHelpBlock" >
        <label for="inputPassword5" class="form-label">Gmail</label>
        <input type="text" name="mail" value="<?php echo $mail;?>" class="form-control" aria-describedby="passwordHelpBlock" >
        <label for="inputPassword5" class="form-label">Nama Lengksp</label>
        <input type="text" name="nameL" value="<?php echo $nameL?>" class="form-control" aria-describedby="passwordHelpBlock" >
        <label for="inputPassword5" class="form-label">Alamat</label>
        <input type="text" name="alamat" value="<?php echo $alamat;?>" class="form-control" aria-describedby="passwordHelpBlock" >
        <label for="inputPassword5" class="form-label">level</label>
        <select name="level" class="form-select w-50">
        <option value="<?php if($row['level']=="1"){?>">
            <?php
            echo"admin";
        }elseif($level=="2"){
            echo"petugas";
        }elseif($level=="3"){
            echo"peminjam";
        }
        ?>"
        </option>
        <option value="1">admin</option>
        <option value="2">petugas</option>
        <option value="3">anggota</option>
        </select>
        <button class="btn btn-primary btn-sm mt-4 mb-3" type="submit" name="sub" >Submit</button>
        </form>
        </div>
    </body>
    </html>

    <?php
    include'footer.php';
    ?>