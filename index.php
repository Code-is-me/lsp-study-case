<!DOCTYPE html>
<html>

<head>
  <title>Data Product</title>
  <style>
    h4 {
      color: red;
      font-size: 25px;
      font-family: Arial;
    }

    body {
      background-image: url(2.png);
    }

    td {
      font-size: 25px;
      font-family: Times New Roman;
    }
  </style>
</head>

<body>

  <center>
    <h4> Pilih Data Proudk </h4>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
      <table>
        <tr>
          <td>Pilih Proudk</td>
          <td>:</td>
          <td>
            <select name="id">
              <?php
              include "koneksi.php";
              $sql = "select id,namabarang  from tbl_barang";
              $hasil = mysqli_query($kon, $sql);

              while ($data = mysqli_fetch_array($hasil)) {
                $ket = "";
                if (isset($_GET['id'])) {
                  $id = trim($_GET['id']);

                  if ($id == $data['id']) {
                    $ket = "selected";
                  }
                }
              ?>
                <option <?php echo $ket; ?> value="<?php echo $data['id'] ?>"> <?php echo $data['id']; ?>
                  - <?php echo $data['namabarang']; ?>
                </option>
              <?php
              }
              ?>
            </select>
          </td>
          <td>
            <input type="submit" name="submit" value="Pilih">
          </td>
        </tr>
      </table>
    </form>

    <?php
    if (isset($_GET['id'])) {
      $id = $_GET['id'];

      $sql = "select * from tbl_barang where id=$id";

      $hasil = mysqli_query($kon, $sql);
      $data = mysqli_fetch_assoc($hasil);
    }
    ?>
    <h2>Detail Data Proudk</h2>
    <table>
      <tr>
        <td> ID </td>
        <td>:</td>
        <td><input type="text" name="id" value="<?php echo $data['id'] ?>"></td>
      </tr>
      <tr>
        <td> Nama Proudk </td>
        <td>:</td>
        <td><input type="text" name="namabarang" value="<?php echo $data['namabarang'] ?>"></td>
      </tr>
      <tr>
        <td> Harga </td>
        <td>:</td>
        <td><input type="text" name="harga" value="<?php echo $data['harga'] ?>"></td>
      </tr>
      <tr>
        <td> Catgory </td>
        <td>:</td>
        <td><input type="text" name="Category" value="<?php echo $data['category'] ?>"></td>
      </tr>




      <a type="button" href="" </table>
  </center>
</body>

</html>