<?php
include "db_conn.php";
$id_mahasiswa = $_GET["id"];

if (isset($_POST["submit"])) {
  $nama = $_POST['nama'];
  $nim = $_POST['nim'];
  $jurusan = isset($_POST['jurusan']) ? $_POST['jurusan'] : '';
  $tahun_masuk = isset($_POST['tahun_masuk']) ? $_POST['tahun_masuk'] : '';

  $sql = "UPDATE `mahasiswa` SET `nama`='$nama',`nim`='$nim',`jurusan`='$jurusan',`tahun_masuk`='$tahun_masuk' WHERE id_mahasiswa = $id_mahasiswa";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: index.php?msg=Data updated successfully");
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>PHP CRUD Application</title>
</head>

<body>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
    PHP Complete CRUD Application
  </nav>

  <div class="container">
    <div class="text-center mb-4">
      <h3>Edit User Information</h3>
      <p class="text-muted">Click update after changing any information</p>
    </div>

    <?php
    $sql = "SELECT * FROM `mahasiswa` WHERE id_mahasiswa = $id_mahasiswa LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">
        <div class="row mb-3">
          <div class="col">
            <label class="form-label">Nama:</label>
            <input type="text" class="form-control" name="nama" value="<?php echo $row['nama'] ?>">
          </div>

          <div class="col">
            <label class="form-label">NIM:</label>
            <input type="text" class="form-control" name="nim" value="<?php echo $row['nim'] ?>">
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">Jurusan:</label>
          <input type="text" class="form-control" name="jurusan" value="<?php echo $row['jurusan'] ?>">
        </div>

        <div class="mb-3">
          <label class="form-label">Tahun Masuk:</label>
          <input type="date" class="form-control" name="tahun_masuk" value="<?php echo $row['tahun_masuk'] ?>">
        </div>

        <div>
          <button type="submit" class="btn btn-success" name="submit">Update</button>
          <a href="index.php" class="btn btn-danger">Cancel</a>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>