
<!doctype html>

<html>

<head>

<meta charset="utf-8">

<title>Untitled Document</title>

<style type="text/css">

h1 {

 padding: 10px;

 border: solid thin #EEE;

 background-color: #F5F5F5;

 font-size: 14px;

 margin-top: 0;

 border-radius: 3px;

}

input, select {

 padding: 3px;

 font-size: 11px;

}

form {

 border: solid thin #EEE;

 background-color: #F5F5F5;

 padding: 10px;

}

label {

 display: block;

}

td {

 padding: 5px 10px;

 border-bottom: solid thin #EEE;

 text-align: left;

 vertical-align: top;

}

th {

 border-bottom: solid thin #EEE;

 padding: 5px 10px;

 text-align: left;

 vertical-align: top;

}

table {

 border: solid thin #EEE;

}

#wrapper {

 width: 230px;

 height: auto;

 background-color: #FFF;

 margin-top: 0;

 margin: auto;

}

body {

 padding: 0;

 margin: 100px;

 font-family: Arial, Helvetica, sans-serif;

 font-size: 11px;

}

</style>

</head>



<body>

<div id="wrapper">

<?php if(isset($_GET['submit']) && ($_GET['submit']=="Submit")) { }else{

?>

<h1>Menghitung biaya KPR:</h1>

<form name="form1" method="get" action="">

  <label for="harga">Pinjam (Rp.)</label>

  <input type="text" name="harga" id="harga">

  <p>

    <label for="dp">Uang muka (Rp.)</label>

    <input type="text" name="dp" id="dp"></p>

  <p>

    <label for="tenor">Jangka waktu kredit (tahun)</label>

    <input type="text" name="tenor" id="tenor"></p>

  <p>

    <label for="bunga">Bunga bank (%)</label>

    <input type="text" name="bunga" id="bunga"></p>

  <p>

    <input type="submit" name="submit" id="submit" value="Submit">

    <input type="reset" name="submit2" id="submit2" value="Reset">

    <?php if(isset($_GET['submit']) && ($_GET['submit']=="Submit")) { ?>

    <a href="kpr.php" title="Hitung Ulang">Hitung Ulang</a>

    <?php } ?>

  </p>

</form>

<?php } ?>

<?php 

if(isset($_GET['submit3']) && $_GET['submit3']=="Hitung Ulang") {

 header("Location: kpr.php");

}

?>

<?php if(isset($_GET['submit']) && ($_GET['submit']=="Submit")) { ?>

<?php

// Hasil perhitungan 

 // Menghitung total bunga

 $kredit = $_GET['harga'] - $_GET['dp'];

 $bunga = $kredit * ($_GET['bunga']/100) * $_GET['tenor'];

 $bungatotal = $bunga + $kredit;

 $angsuran = $bungatotal / $_GET['tenor']/12;

 $gajiminimal = $angsuran / 0.3;

?>

<h1>Hasil perhtiungan KPR:</h1>

<table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <th width="60%" scope="col">Harga rumah</th>

    <th scope="col"><?php echo number_format($_GET['harga']); ?></th>

  </tr>

  <tr>

    <td width="60%">Uang muka</td>

    <td><?php echo number_format($_GET['dp']); ?></td>

  </tr>

  <tr>

    <td width="60%">Jangka waktu kredit</td>

    <td><?php echo $_GET['tenor']; ?> tahun</td>

  </tr>

  <tr>

    <td width="60%">Bunga bank</td>

    <td><?php echo $_GET['bunga']; ?> %/tahun</td>

  </tr>

  <tr>

    <td>Total bunga</td>

    <td><?php echo number_format($bunga); ?></td>

  </tr>

  <tr>

    <td>Total hutang</td>

    <td><?php echo number_format($bungatotal); ?></td>

  </tr>

  <tr>

    <td>Total harga rumah</td>

    <td>

    <?php

 $hargarumah = $bungatotal + $_GET['dp'];

 echo number_format($hargarumah); 

 ?>

    </td>

  </tr>

  <tr>

    <td width="60%">Angsuran perbulan</td>

    <td><?php echo number_format($angsuran); ?></td>

  </tr>

  <tr>

    <td width="60%">Gaji/Pendapatan minimal</td>

    <td><?php echo number_format($gajiminimal); ?></td>

  </tr>

</table>

<p align="right"><a href="kpr.php" title="Hitung Ulang">Hitung Ulang?</a></p>

<?php } ?>



</div>

</body>

</html>