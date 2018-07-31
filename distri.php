
<?php
    include('conexion.php');

$q = $_GET['q'];
$c = $_GET['c'];
if($c=='0'){
$sql=("SELECT * FROM distrito WHERE canton_id = '".$q."'");
$resul = mysqli_query($con,$sql);
}
else{

$sql=("SELECT e.* , c.* FROM empleados as e inner join distrito as c on(c.nom_distrito=e.distrito) WHERE e.id = '$c'");
$resul = mysqli_query($con,$sql);

}
?>
            <select name="Distrito" class="form-control" required>
             <?php
        while($result=mysqli_fetch_array($resul)){ ?>
              <option value="<?php  echo  $result['nom_distrito'];?>"><?php  echo  $result['nom_distrito'];?></option>
              <?php } ?>
            </select>



                    

              
