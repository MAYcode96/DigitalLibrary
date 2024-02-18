
<nav class="navbar bg-body-tertiary">
        <div class="container-fluid p-2">
            <a href="index.php" class="link-offset-2 link-underline link-underline-opacity-0 text-dark">
                <div class="ms-4 d-flex align-items-center">
                    <img src="../img/book.svg" alt="" width="40px">
                    <h5 class="m-0 ms-2">MAYlibrary</h5>
                </div>
            </a>
            <div class="d-flex gap-3  me-4">
                <a href="koleksi.php?" class="text-black">
                  <ion-icon name="bookmarks-outline" style="font-size: 30px;"></ion-icon>
                </a>
                <a href="pinjam.php" class="text-black">
                  <ion-icon name="library-outline" style="font-size: 30px;"></ion-icon>
                </a>
                <div class="btn-group ms-3 d-flex align-items-center">
                    <a type="button" class="dropdown-toggle link-offset-2 link-underline link-underline-opacity-0 text-dark" data-bs-toggle="dropdown" aria-expanded="false">
                        @<?= $_SESSION['username'] ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a href="../logout.php" class="dropdown-item" type="button">Sign Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>