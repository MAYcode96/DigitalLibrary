<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="sylesheet" href="asset/css/style.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
        body {
            background: url("asset/img/background2.jpg");
            background-size: cover;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content d-flex justify-content-center">
            <div class="card mt-5 w-25 bg-transparent">
                        <div class="card-body text-white bg-dark bg-opacity-75">
                            <h5 class="d-flex justify-content-center">LOGIN</h5>
                            <?php 
                            if(isset($_GET['pesan'])){
                                if($_GET['pesan']=="gagal"){
                                    echo "<div class='alert alert-danger'>Username dan Password tidak sesuai !</div>";
                                }
                            }
                              if(isset($_GET['pesan'])){
                                if($_GET['pesan']=="np"){
                                    echo "<div class='alert alert-danger'>Hanya untuk admin dan petugas!</div>";
                                }
                            }
                              if(isset($_GET['pesan'])){
                                if($_GET['pesan']=="npadmin"){
                                    echo "<div class='alert alert-danger'>Anda adalah admin!</div>";
                                }
                            }
                            if(isset($_GET['pesan'])){
                                if($_GET['pesan']=="info_login"){
                                    echo "<div class='alert alert-info'>anda belum login !</div>";
                                }
                            }
                            if(isset($_GET['pesan'])){
                                if($_GET['pesan']=="info_logout"){
                                    echo "<div class='alert alert-success'>anda berhasil logout !</div>";
                                }
                            }
                            if(isset($_GET['pesan'])){
                                if($_GET['pesan']=="info_daftar"){
                                    echo "<div class='alert alert-success'>anda berhasil daftar !</div>";
                                }
                            }
                            ?>
                            <form action="cek_login.php" method="post">
                                <div class="form-group mt-5">
                                    <label for="">Username</label>
                                    <input type="text" name="user" class="form-control">
                                </div>
                                <div class="form-group mt-2">
                                    <label for="">Password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-dark ps-4 pe-4">login</button>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="">belum punya akun? </label>
                                    <a href="daftar.php">Daftar</a>
                                </div>
                            </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>