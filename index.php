<?php


// AJOUTER UN NOUVEAU PRODUIT

$conn = mysqli_connect("localhost","root","","souqstock");

//if the form's sbmit button is clicked, we need to process the form

if(isset($_POST['submit'])) {
    //get variable from the form
    $libelle = $_POST['libelle'];
    $quantite_minimale = $_POST['quantite_minimale'];
    $quantite_en_stock = $_POST['quantite_en_stock'];

    //write sql query

    $sql ="INSERT INTO `produit`(`libelle`, `quantite_minimale`, `quantite_en_stock`) VALUES ('$libelle','$quantite_minimale','$quantite_en_stock')";

    //execute the query

    $result =$conn->query($sql);

    if ($result == TRUE){
        echo "<script>alert(\"New product added successfuly\")</script>";
    }

    $conn->close();

}

if(isset($_POST['filter'])){
    header('location: filter.php');
}
?>



<!DOCTYPE html>
<html lang="en">
<?php include "head.php";
?>
<body id="body" style="background-image:url('stck.jpg');background-repeat:no-repeat;background-size:cover;">
    <div class="container">
        <div >
    
            <form style="width: 40%;background-color:white;border-radius: 10px;padding: 20PX;" class="container" action="" method="post">
  <div class="form-group">
    <label for="formGroupExampleInput">libelle</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="libelle" name="libelle">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Qt_minimale</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Qt_minimale" name="quantite_minimale">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Qt_en_stock</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Qt_en_stock" name="quantite_en_stock">
  </div>
  <input type="submit" class="btn btn-info"name="submit" value="submit">
  <input type="submit" class="btn btn-danger"name="filter"  value="Produit en Rupture de Stock">
</form>
        </div>
        <div class="row">
                    <div class="col-sm-6">
                        <h2>Gestion de  <b>stock</b></h2><br>
                    </div>
                    <!-- <div align="center">  
                        <input type="text" name="search" id="search" class="form-control" />  
                   </div><br>  -->
                </div>
        
        <div class="table-wrapper" style="background-color:white;border-radius: 10px;padding:10px;">
            <div class="table-title">
                
            </div>
            <table class="table table-striped table-hover" id="myTable">
                <thead style="background-color:white;">
                    <tr>
                       
                        <th>Référence</th>
                        <th>libellé</th>
                        <th>quantite_minimale</th>
                        <th>quantite_en_stock</th>
                        <th>Actions</th>
                        </tr>
                </thead>
                <?php

$conn = mysqli_connect("localhost","root","","souqstock");
              
              $sql = "SELECT * FROM produit";
              $result = $conn-> query($sql);

              if($result-> num_rows > 0){
                  while ($row = $result-> fetch_assoc()){
                      ?>
            <td ><?php echo $row["réference"] ?></td>
              <td ><?php echo $row["libelle"] ?></td>
              <td ><?php echo $row["quantite_minimale"] ?></td>
              <td ><?php echo $row["quantite_en_stock"] ?></td>
              <td>
              <a href='update.php?id=<?php echo$row["réference"]?>' class="edit" ><i class="material-icons" title="Edit">&#xE254;</i></a>

              <a href='delete.php?id=<?php echo$row["réference"]?>' class="delete" name="réference"><i class="material-icons" title="Delete" id="delete">&#xE872;</i></a></td>
              </tr>
              <?php
}
              }
              
              
              ?>


            </table>
            <div class="clearfix">
        </div>
    </div>
    </body>
</html>