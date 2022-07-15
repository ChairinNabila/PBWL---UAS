<?php include('header.php'); ?>
<h3 class="text-center">Penjualan Telur</h3>

<form method="POST" action="">
    <div class="mb-3">
        <label class="form-label">Nama Telur</label>
        <select class="form-select" aria-label="Default select example" name="nama_telur">
            <?php
            $sql = "SELECT * FROM data_telur";
            $result = $conn->query($sql);
            $no = 0;
            while ($hasil = $result->fetch_assoc()) {
            ?>
                <option value="<?= $hasil['id'] ?>"><?= $hasil['nama_telur'] ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Jumlah Pembelian</label>
        <input type="text" class="form-control" name="jumlah_pembelian">
    </div>
    <button type="submit" class="btn btn-primary" name="penjualan_telur">Submit</button>
</form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>

<?php

if (isset($_POST['penjualan_telur'])) {
    $proses = new Proses();
    $proses->penjualan_telur($_POST['nama_telur'], $_POST['jumlah_pembelian']);
}
?>