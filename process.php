<?php
include('connection.php');

class Proses
{
    public function login($email, $password)
    {
        global $conn;
        $sql = "SELECT * FROM user WHERE email = '" . $email . "' AND password = '" . $password . "'";
        $result = $conn->query($sql);
        if (mysqli_num_rows($result) > 0) {
            while ($hasil = $result->fetch_assoc()) {
                $_SESSION['username'] = $email;
                $_SESSION['nama'] = $hasil['nama'];
                echo '<script language="javascript">';
                echo 'alert("Selamat datang, ' . $hasil['nama'] . '");';
                echo 'window.location.href = "home.php";';
                echo '</script>';
            }
        } else {
            echo '<script language="javascript">';
            echo 'alert("Periksa kembali email dan password Anda.");';
            echo 'window.location.href = "index.php";';
            echo '</script>';
        }
    }

    public function tambah_telur($nama_telur, $harga_beli, $harga_jual, $stok)
    {
        global $conn;
        $sql = "INSERT INTO data_telur VALUES(null, '$nama_telur', '$harga_beli', '$harga_jual', '$stok')";
        $result = $conn->query($sql);
        if ($result) {
            echo '<script language="javascript">';
            echo 'alert("Tambah Telur berhasil.");';
            echo 'window.location.href = "home.php";';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Tambah Telur gagal..");';
            echo 'window.location.href = "tambah_telur.php";';
            echo '</script>';
        }
    }

    public function edit_telur($id, $nama_telur, $harga_beli, $harga_jual, $stok)
    {
        global $conn;
        $sql = "UPDATE data_telur 
            SET nama_telur = '$nama_telur', harga_beli = '$harga_beli', harga_jual = '$harga_jual', stok = '$stok' 
            WHERE id = '$id'";
        $result = $conn->query($sql);
        if ($result) {
            echo '<script language="javascript">';
            echo 'alert("Edit Telur berhasil.");';
            echo 'window.location.href = "home.php";';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Edit Telur gagal..");';
            echo 'window.location.href = "edit_telur.php?id=$id";';
            echo '</script>';
        }
    }

    public function hapus_telur($id)
    {
        global $conn;
        $sql = "DELETE FROM data_telur 
            WHERE id = '$id'";
        $result = $conn->query($sql);
        if ($result) {
            echo '<script language="javascript">';
            echo 'alert("Hapus Telur berhasil.");';
            echo 'window.location.href = "home.php";';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Hapus Telur gagal..");';
            echo 'window.location.href = "home.php";';
            echo '</script>';
        }
    }

    public function penjualan_telur($id, $jumlah_pembelian)
    {
        global $conn;

        $sql = "SELECT * FROM data_telur WHERE id = '" . $id . "'";
        $result = $conn->query($sql);
        while ($hasil = $result->fetch_assoc()) {
            $sql2 = "INSERT INTO penjualan VALUES(null, 
            '" . date('Y-m-d') . "', 
            '" . $hasil['nama_telur'] . "', 
            '" . $hasil['harga_jual'] . "', 
            '" . $hasil['harga_beli'] . "', 
            '" . $jumlah_pembelian . "')";
            $result2 = $conn->query($sql2);
            if ($result2) {
                $sql = "UPDATE data_telur 
                    SET stok = stok - " . $jumlah_pembelian . " 
                    WHERE id = '$id'";
                $result = $conn->query($sql);
                echo '<script language="javascript">';
                echo 'alert("Transaksi Penjualan berhasil diinputkan.");';
                echo 'window.location.href = "laporan_penjualan.php";';
                echo '</script>';
            } else {
                echo '<script language="javascript">';
                echo 'alert("Transaksi Penjualan gagal diinputkan.");';
                echo 'window.location.href = "penjualan.php";';
                echo '</script>';
            }
        }
    }
}
