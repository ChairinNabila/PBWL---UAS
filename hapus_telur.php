<?php
include('process.php');

$proses = new Proses();
$proses->hapus_telur($_GET['id']);
