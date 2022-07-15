<?php include('header.php'); ?>
<h3 class="text-center">Tambah Telur</h3>

<form method="POST" action="">
    <div class="mb-3">
        <label class="form-label">Nama Telur</label>
        <input type="text" class="form-control" aria-describedby="emailHelp" name="nama_telur">
    </div>
    <div class="mb-3">
        <label class="form-label">Harga Beli</label>
        <input type="text" class="form-control" name="harga_beli">
    </div>
    <div class="mb-3">
        <label class="form-label">Harga Jual</label>
        <input type="text" class="form-control" name="harga_jual">
    </div>
    <div class="mb-3">
        <label class="form-label">Stok</label>
        <input type="text" class="form-control" name="stok">
    </div>
    <button type="submit" class="btn btn-primary" name="submit_tambah_telur">Submit</button>
</form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>

<?php

if (isset($_POST['submit_tambah_telur'])) {
    $proses = new Proses();
    $proses->tambah_telur($_POST['nama_telur'], $_POST['harga_beli'], $_POST['harga_jual'], $_POST['stok']);
}
?>