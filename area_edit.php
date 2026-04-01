<?php
include 'koneksi.php';

$id     = $_GET['id'];
$query  = "SELECT * FROM tb_area_parkir WHERE id_area = '$id'";
$result = mysqli_query($conn, $query);
$data   = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {

    $nama = $_POST['nama_area'];

    $update = "UPDATE tb_area_parkir SET
               nama_area = '$nama'
               WHERE id_area = '$id'";

    mysqli_query($conn, $update);

    header("Location: area.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Area</title>
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">
    <h3>Edit Area Parkir</h3>

    <form method="POST">

        <div class="form-group">
            <label>Nama Area</label>
            <input type="text"
                   name="nama_area"
                   value="<?= $data['nama_area']; ?>"
                   class="form-control">
        </div>

        <button type="submit"
                name="update"
                class="btn btn-success">
            Update
        </button>

    </form>
</div>

</body>
</html>