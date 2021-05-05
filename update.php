<!-- --------------Update------------ -->

<?php
$conn = mysqli_connect("localhost","root","","souqstock");

$id =$_GET['id'];

$quantite_en_Stock = "";

$result = mysqli_query($conn, "SELECT * FROM produit WHERE réference =$id");
while($row=mysqli_fetch_array($result)){


    $quantite_en_Stock=$row["quantite_en_stock"];
    
}


?>
<body style="background-image:url('stck.jpg');background-repeat:no-repeat;background-size:cover;">
<form style="width: 50%;" class="container" action="" method="post">
<?php include "head.php";
?>
  <h1 style="font-weight: bold;text-align:center;">Changer la quantité en stock</h1><br><br>
  <div class="form-group"style="background-color:white; padding: 10px;border-radius:10px;">
    <label for="formGroupExampleInput2">Qt_en_stock</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Qt_en_stock" name="quantite_en_stock" value="<?php echo  $quantite_en_Stock?>">
    <br>
    <input type="submit" class="btn btn-info" name="update" value="update">
  </div>
  
</form>
</body>

<?php
                    if(isset($_POST["update"])){
                        mysqli_query($conn,"UPDATE produit SET  quantite_en_stock='$_POST[quantite_en_stock]' WHERE réference=$id");
                      ?>  
                      <script type="text/javascript">
                window.location="index.php";
                </script>
                  <?php
    
                      }
?>

                   

