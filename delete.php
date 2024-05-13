<?php
include "db_conn.php";
$id_mahasiswa = $_GET["id"];
$sql = "DELETE FROM `mahasiswa` WHERE id_mahasiswa = $id_mahasiswa";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: index.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}
