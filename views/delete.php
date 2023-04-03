<?php
$id = strpos(@$_REQUEST["url"], "/") ? str_split(@$_REQUEST["url"], strpos(@$_REQUEST["url"], "/") + 1)[1] : @$_REQUEST['url'];
$sql = "DELETE FROM data_barang WHERE id_barang = '{$id}'";
$result = mysqli_query($conn, $sql);
header('Location: ../home');
