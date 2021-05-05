<?php

include_once 'head.php';

$conn = mysqli_connect("localhost","root","","souqstock");
$sql= "SELECT * FROM produit  WHERE quantite_en_stock < quantite_minimale";

              $result = $conn-> query($sql);

              if($result-> num_rows > 0){
                  while ($row = $result-> fetch_assoc()){
                      ?>
            <body style="background-image:url('stck.jpg');background-repeat:no-repeat;background-size:cover;">
            <div class="container">   
            <h1 style="text-align: center;font-weight: bold;">Les produit en rupture de stock</h1><br><br>       
            <div class="table-wrapper" style="background-color:white; padding: 10px;border-radius:10px;">
            <table class="table table-striped table-hover" id="myTable">
                <thead>
                    <tr>
                       
                        <th>Référence</th>
                        <th>libellé</th>
                        <th>quantite_minimale</th>
                        <th>quantite_en_stock</th>
                        </tr>
                </thead>
            <td ><?php echo $row["réference"] ?></td>
              <td ><?php echo $row["libelle"] ?></td>
              <td ><?php echo $row["quantite_minimale"] ?></td>
              <td ><?php echo $row["quantite_en_stock"] ?></td>
              <td>
              </tr>
              </table>
            </div>
            </div>
            </body>
              <?php
}
              }
              
              
              ?>