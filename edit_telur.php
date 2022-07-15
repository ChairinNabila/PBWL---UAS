<?php include('header.php'); ?>
<h3 class="text-center">Edit Telur</h3>

<?php
$sql = "SELECT * FROM data_telur WHERE id = '" . $_GET['id'] . "'";
$result = $conn->query($sql);
while ($hasil = $result->fetch_assoc()) {
?>

    <form method="POST" action="">
        <div class="mb-3">
            <label class="form-label">Nama Telur</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" name="nama_telur" value="<?= $hasil['nama_telur'] ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Harga Beli</label>
            <input type="text" class="form-control" name="harga_beli" value="<?= $hasil['harga_beli'] ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Harga Jual</label>
            <input type="text" class="form-control" name="harga_jual" value="<?= $hasil['harga_jual'] ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Stok</label>
            <input type="text" class="form-control" name="stok" value="<?= $hasil['stok'] ?>">
        </div>
        <button type="submit" class="btn btn-primary" name="submit_tambah_telur">Submit</button>
    </form>

<?php } ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>

<?php

if (isset($_POST['submit_tambah_telur'])) {
    $proses = new Proses();
    $proses->edit_telur($_GET['id'], $_POST['nama_telur'], $_POST['harga_beli'], $_POST['harga_jual'], $_POST['stok']);
}
?>