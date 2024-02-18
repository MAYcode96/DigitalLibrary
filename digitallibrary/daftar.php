<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            <div class="card mt-5 mb-5 w-50 bg-dark bg-opacity-50 text-white">
                <div class="row">
                    <div class="col-sm-35">
                        <div class="card-body">
                            <h2 align="center">Daftar</h2>
                            <form action="proses-daftar.php" method="post">
                                <div class="form-group mt-2">
                                    <label for="">username</label>
                                    <input type="text" name="user" class="form-control">
                                </div>
                                <div class="form-group mt-1">
                                    <label for="">password</label>
                                    <input type="text" name="password" class="form-control">
                                </div>
                                <div class="form-group mt-1">
                                    <label for="">email</label>
                                    <input type="text" name="mail" class="form-control">
                                </div>
                                <div class="form-group mt-1">
                                    <label for="">nama lengkap</label>
                                    <input type="text" name="nama_lengkap" class="form-control">
                                </div>
                                <div class="form-group mt-1">
                                    <label for="">alamat</label>
                                    <input type="text" name="alamat" class="form-control">
                                </div>
                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-dark">daftar</button>
                                </div>
                                <div class="form-group mt-3 d-flex justify-content-center">
                                    <label for="">sudah punya akun? </label>
                                    <a href="index.php">login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>