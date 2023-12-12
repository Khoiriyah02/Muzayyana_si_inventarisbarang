<?php

use Master\admin;
use Master\pemilik;
use Master\Menu;
use Master\barang;

include('autoload.php');
include('Config/Database.php');

$Menu = new Menu();
$admin = new admin($dataKoneksi);
$pemilik = new pemilik($dataKoneksi);
$barang = new barang($dataKoneksi);
//$admin ->tambah()
$target = @$_GET['target'];
$act = @$_GET['act']
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Web</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a href="#" class="navbar-brand">INVENTARIS_BARANG BONDOWOSO</a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#MyMenu" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="MyMenu">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php
                        foreach ($Menu->topMenu() as $r) {
                        ?>
                            <li class="nav-item">
                                <a href="<?php echo $r['link']; ?>" class="nav-link">
                                    <?php echo $r['text']; ?>
                                </a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <br>
        <div class="content">
            <h5>Content <?php echo strtoupper($target); ?></h5>

            <?php
            if (!isset($target) or $target == "home") {
                echo "Hai, Selamat Datang di Beranda";
                //====start content admin====
            } elseif ($target == "admin") {
                if ($act == "tambah_admin") {
                    echo $admin->tambah();
                } elseif ($act == "simpan_admin") {
                    if ($admin->simpan()) {
                        echo "<script>
                        alert ('Data Tersimpan')
                        window.location.href = '?target=admin'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Tersimpan')
                        window.location.href = '?target=admin'
                        </script>";
                    }
                } elseif ($act == "edit_admin") {
                    $id = $_GET['id'];
                    echo $admin->edit($id);
                } elseif ($act == "update_admin") {
                    if ($admin->update()) {
                        echo "<script>
                        alert ('Data Diupdate')
                        window.location.href = '?target=admin'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Diupdate')
                        window.location.href = '?target=admin'
                        </script>";
                    }
                } elseif ($act == "delete_admin") {
                    $id = $_GET['id'];
                    if ($admin->delete($id)) {
                        echo "<script>
                        alert ('Data Dihapus')
                        window.location.href = '?target=admin'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Dihapus')
                        window.location.href = '?target=admin'
                        </script>";
                    }
                } else {
                    echo $admin->index();
                }
                //====And Content pemilik====

            } elseif ($target == "pemilik") {
                if ($act == "tambah_pemilik") {
                    echo $pemilik->tambah();
                } elseif ($act == "simpan_pemilik") {
                    if ($pemilik->simpan()) {
                        echo "<script>
                        alert ('Data Tersimpan')
                        window.location.href = '?target=pemilik'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Tersimpan')
                        window.location.href = '?target=pemilik'
                        </script>";
                    }
                } elseif ($act == "edit_pemilik") {
                    $id = $_GET['id'];
                    echo $pemilik->edit($id);
                } elseif ($act == "update_pemilik") {
                    if ($pemilik->update()) {
                        echo "<script>
                        alert ('Data Diupdate')
                        window.location.href = '?target=pemilik'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Diupdate')
                        window.location.href = '?target=pemilik'
                        </script>";
                    }
                } elseif ($act == "delete_pemilik") {
                    $id = $_GET['id'];
                    if ($pemilik->delete($id)) {
                        echo "<script>
                        alert ('Data Dihapus')
                        window.location.href = '?target=pemilik'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Dihapus')
                        window.location.href = '?target=pemilik'
                        </script>";
                    }
                } else {
                    echo $pemilik->index();
                }
            } elseif ($target == "bidang") {
                if ($act == "tambah_admin") {
                    echo $admin->tambah();
                } elseif ($act == "simpan_admin") {
                    if ($admin->simpan()) {
                        echo "<script>
                        alert ('Data Tersimpan')
                        window.location.href = '?target=admin'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Tersimpan')
                        window.location.href = '?target=admin'
                        </script>";
                    }
                } elseif ($act == "edit_admin") {
                    $id = $_GET['id'];
                    echo $admin->edit($id);
                } elseif ($act == "update_admin") {
                    if ($admin->update()) {
                        echo "<script>
                        alert ('Data Diupdate')
                        window.location.href = '?target=admin'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Diupdate')
                        window.location.href = '?target=admin'
                        </script>";
                    }
                } elseif ($act == "delete_admin") {
                    $id = $_GET['id'];
                    if ($admin->delete($id)) {
                        echo "<script>
                        alert ('Data Dihapus')
                        window.location.href = '?target=admin'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Dihapus')
                        window.location.href = '?target=admin'
                        </script>";
                    }
                } else {
                    echo $admin->index();
                }
                //====And Content barang====

            } elseif ($target == "barang") {
                if ($act == "tambah_barang") {
                    echo $barang->tambah();
                } elseif ($act == "simpan_barang") {
                    if ($barang->simpan()) {
                        echo "<script>
                        alert ('Data Tersimpan')
                        window.location.href = '?target=barang'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Tersimpan')
                        window.location.href = '?target=barang'
                        </script>";
                    }
                } elseif ($act == "edit_barang") {
                    $id = $_GET['id'];
                    echo $barang->edit($id);
                } elseif ($act == "update_barang") {
                    if ($barang->update()) {
                        echo "<script>
                        alert ('Data Diupdate')
                        window.location.href = '?target=barang'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Diupdate')
                        window.location.href = '?target=barang'
                        </script>";
                    }
                } elseif ($act == "delete_barang") {
                    $id = $_GET['id'];
                    if ($barang->delete($id)) {
                        echo "<script>
                        alert ('Data Dihapus')
                        window.location.href = '?target=barang'
                        </script>";
                    } else {
                        echo "<script>
                        alert ('Data Gagal Dihapus')
                        window.location.href = '?target=barang'
                        </script>";
                    }
                } else {
                    echo $barang->index();
                }
            } else {
                echo "Page 404 Not found";
            }
            ?>
        </div>
    </div>
</body>

</html>