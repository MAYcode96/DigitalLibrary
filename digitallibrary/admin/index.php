<?php
include('header.php');
include('navbar.php');
?>
<div id="carouselExampleDark" class="carousel carousel-white slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="../asset/img/1.jpg" height="200px" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Welcome to MAY Digital Library</h5>
        <p>Website perpustakaan dengan koleksi buku terlengakap.</p>
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="../asset/img/2.jpg" height="200px" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Seri buku lengkap</h5>
        <p>Website perpustakaan Dengan seri buku terlengkap.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="../asset/img/3.jpg" height="200px" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Akses yang mudah</h5>
        <p>Anda tidak perlu ke perpustaan lagi untuk membaca.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
            <div class="card">
                <div class="card-body">
                        <p>Halo <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai<b>
                        <?php 
                            $kondisi=$_SESSION['level'];
                            if($kondisi=="1"){
                                echo"admin";
                            } if($kondisi=="2"){
                                echo"petugas";
                            } if($kondisi=="3"){
                                echo"peminjam";
                            }
                        ?>.</b>
                        </p> 
                    </div>
                <h1 class="text-center">Data</h1>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <h3>data buku<b></b></h3>
                                <h5>
                                <?php
                                    $sql=mysqli_query($con,'select * from buku');
                                    $num=mysqli_num_rows($sql);
                                    echo $num;
                                    ?>
                                </h5>
                                <a href="buku.php" class="btn btn-outline-secondary btn-sn">lihat data</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <h3>kategori buku</h3>
                                <h5>
                                    <?php
                                    $sql=mysqli_query($con,'select * from kategoribuku');
                                    $num=mysqli_num_rows($sql);
                                    echo $num;
                                    ?>
                                </h5>
                                <a href="kategori.php" class="btn btn-outline-secondary btn-sn">lihat data</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <h3>users<b></b></h3>
                                <h5>  <?php
                                    $sql=mysqli_query($con,'select * from user');
                                    $num=mysqli_num_rows($sql);
                                    echo $num;
                                    ?></h5>
                                <a href="user.php" class="btn btn-outline-secondary btn-sn">lihat data</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <h3>peminjam<b></b></h3>
                                <h5>
                                <?php
                                    $sql=mysqli_query($con,'select * from peminjaman');
                                    $num=mysqli_num_rows($sql);
                                    echo $num;
                                    ?>
                                </h5>
                                <a href="pinjam.php" class="btn btn-outline-secondary btn-sn">lihat data</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
include('footer.php')
?>

