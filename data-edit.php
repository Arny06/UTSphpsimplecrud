<?php 

include_once 'config/class-master.php';
include_once 'config/class-mahasiswa.php';
$master = new MasterData();
$sepatu = new Sepatu();
// Mengambil daftar program studi, provinsi, dan status mahasiswa
$jenisList = $master->getJenis();
// Mengambil daftar provinsi
$merkList = $master->getMerk();
// Mengambil data mahasiswa yang akan diedit berdasarkan id dari parameter GET
$dataSepatu = $sepatu->getUpdateSepatu($_GET['id']);
if(isset($_GET['status'])){
    if($_GET['status'] == 'failed'){
        echo "<script>alert('Gagal mengubah data sepatu. Silakan coba lagi.');</script>";
    }
}
?>
<!doctype html>
<html lang="en">
	<head>
		<?php include 'template/header.php'; ?>
	</head>

	<body class="layout-fixed fixed-header fixed-footer sidebar-expand-lg sidebar-open bg-body-tertiary">

		<div class="app-wrapper">

			<?php include 'template/navbar.php'; ?>

			<?php include 'template/sidebar.php'; ?>

			<main class="app-main">

				<div class="app-content-header">
					<div class="container-fluid">
						<div class="row">
							<div class="col-sm-6">
								<h3 class="mb-0">Edit Sepatu</h3>
							</div>
							<div class="col-sm-6">
								<ol class="breadcrumb float-sm-end">
									<li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
									<li class="breadcrumb-item active" aria-current="page">Edit Data</li>
								</ol>
							</div>
						</div>
					</div>
				</div>

				<div class="app-content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Formulir Sepatu</h3>
										<div class="card-tools">
											<button type="button" class="btn btn-tool" data-lte-toggle="card-collapse" title="Collapse">
												<i data-lte-icon="expand" class="bi bi-plus-lg"></i>
												<i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
											</button>
											<button type="button" class="btn btn-tool" data-lte-toggle="card-remove" title="Remove">
												<i class="bi bi-x-lg"></i>
											</button>
										</div>
									</div>
                                    <form action="proses/proses-edit.php" method="POST">
									    <div class="card-body">
                                            <input type="hidden" name="id" value="<?php echo $dataSepatu['id']; ?>">
                                            <div class="mb-3">
                                                <label for="kode" class="form-label">kode Sepatu</label>
                                                <input type="number" class="form-control" id="kode" name="kode" placeholder="Masukkan Kode Sepatu" value="<?php echo $dataSepatu['kode']; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="nama" class="form-label">Nama Sepatu</label>
                                                <input type="number" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Sepatu" value="<?php echo $dataSepatu['nama']; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="jenis" class="form-label">Jenis Sepatu</label>
                                                <select class="form-select" id="jenis" name="jenis_sepatu" required>
                                                    <option value="" selected disabled>Pilih Jenis Sepatu</option>
                                                    <?php 
                                                    // Iterasi daftar program studi dan menandai yang sesuai dengan data mahasiswa yang dipilih
                                                    foreach ($jenisList as $jenis){
                                                        // Menginisialisasi variabel kosong untuk menandai opsi yang dipilih
                                                        $selectedJenis = "";
                                                        // Mengecek apakah program studi saat ini sesuai dengan data mahasiswa
                                                        if($dataSepatu['jenis'] == $jenis['id']){
                                                            // Jika sesuai, tandai sebagai opsi yang dipilih
                                                            $selectedJenis = "selected";
                                                        }
                                                        // Menampilkan opsi program studi dengan penanda yang sesuai
                                                        echo '<option value="'.$jenis['id'].'" '.$selectedjenis.'>'.$jenis['nama'].'</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="merk" class="form-label">Merk Sepatu</label>
                                                <select class="form-select" id="merk" name="merk_sepatu" required>
                                                    <option value="" selected disabled>Pilih Merk Sepatu</option>
                                                    <?php
                                                    // Iterasi daftar provinsi dan menandai yang sesuai dengan data mahasiswa yang dipilih
                                                    foreach ($merkiList as $merk){
                                                        // Menginisialisasi variabel kosong untuk menandai opsi yang dipilih
                                                        $selectedMerk = "";
                                                        // Mengecek apakah provinsi saat ini sesuai dengan data mahasiswa
                                                        if($dataSepatu['merk'] == $merk['id']){
                                                            // Jika sesuai, tandai sebagai opsi yang dipilih
                                                            $selectedMerk = "selected";
                                                        }
                                                        // Menampilkan opsi provinsi dengan penanda yang sesuai
                                                        echo '<option value="'.$merk['id'].'" '.$selectedMerk.'>'.$merk['merk'].'</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="harga" class="form-label">Harga Sepatu</label>
                                                <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan Harga" value="<?php echo $dataSepatu['harga']; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="stock" class="form-label">Stock Sepatu</label>
                                                <input type="number" class="form-control" id="stock" name="stock" placeholder="Masukkan Stock" value="<?php echo $dataSepatu['stock']; ?>"  required>
                                            </div>
                                                </select>
                                            </div>
                                        </div>
									    <div class="card-footer">
                                            <button type="button" class="btn btn-danger me-2 float-start" onclick="window.location.href='data-list.php'">Batal</button>
                                            <button type="submit" class="btn btn-warning float-end">Update Data</button>
                                        </div>
                                    </form>
								</div>
							</div>
						</div>
					</div>
				</div>

			</main>

			<?php include 'template/footer.php'; ?>

		</div>
		
		<?php include 'template/script.php'; ?>

	</body>
</html>