<?php include('header.php'); ?>
<h3 class="text-center">Data Telur</h3>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Telur</th>
            <th scope="col">Harga Beli</th>
            <th scope="col">Harga Jual</th>
            <th scope="col">Stok</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM data_telur";
        $result = $conn->query($sql);
        $no = 0;
        while ($hasil = $result->fetch_assoc()) {
            $no = $no + 1;
        ?>
            <tr>
                <td scope="row"><?= $no ?></td>
                <td><?= $hasil['nama_telur'] ?></td>
                <td><?= $hasil['harga_beli'] ?></td>
                <td><?= $hasil['harga_jual'] ?></td>
                <td><?= $hasil['stok'] ?></td>
                <td>
                    <a href="edit_telur.php?id=<?= $hasil['id'] ?>" class="btn btn-success">Edit</a>
                    <a href="hapus_telur.php?id=<?= $hasil['id'] ?>" class="btn btn-danger">hapus</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>