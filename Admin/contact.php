<!DOCTYPE html>
<html>
<?php include("Partials/head.php");?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<?php include("Partials/header.php");?>
<?php include("Partials/sidebar.php");?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
        <!-- Main row -->
        <div class="row">
       <?php
       include("../partials/connect.php");
       $sql = "Select * from contact";
       $sorgu=mysqli_query($conn, $sql);
        
       
    echo "<table class='table'>";
   echo"<thead>";
 
     echo "<tr>";
     echo "<th scope='col'>#</th>";
     echo "<th scope='col'>Adı Soyadı</th>";
     echo  "<th scope='col'>E Posta Adresi</th>";
     echo "<th scope='col'>Telefon Numarası</th>";
     echo "<th scope='col'>Mesaj</th>";
     echo "<th scope='col'>Tarih</th>";
    echo "</tr>";
   echo "</thead>";
  echo "<tbody>";
      while ( $d=mysqli_fetch_assoc($sorgu)) {
      echo "<tr>";
      echo "<td scope='col'>{$d['ID']}</td>";
      echo "<td scope='col'>{$d['Name']}</td>";
      echo "<td scope='col'>{$d['Email']}</td>";
      echo "<td scope='col'>{$d['TelNumber']}</td>";
      echo "<td scope='col'>{$d['Message']}</td>";
      echo "<td scope='col'>{$d['Date']}</td>";
      echo "</tr>";
   }
 echo " </tbody>";
echo"</table>"
?>
         </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php include ("Partials/script.php");?>
</body>
</html>
