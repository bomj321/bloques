
<?php
    include('conexion.php');

$q = $_GET['q'];
$c = $_GET['c'];
if($c=='0'){
$sql=("SELECT * FROM cantones WHERE id_provi = '".$q."'");
$resul = mysqli_query($con,$sql);
}
else{

$sql_canton=("SELECT * FROM pre_registro  WHERE pre_registro.id_pre_registro='$c'");
$resul_canton = mysqli_query($con,$sql_canton);
$result_unico=mysqli_fetch_array($resul_canton);

$canton=$result_unico['canton'];
	
$sql=("SELECT e.* , c.* FROM pre_registro as e inner join cantones as c on(c.nom_canto='$canton') WHERE e.id_pre_registro = '$c'");
$resul = mysqli_query($con,$sql);
}
?>
            <select name="Canton" class="form-control" id="canton" onchange="distri(this.value)" required>
             <?php
        while($result=mysqli_fetch_array($resul)){ ?>
              <option value="<?php  echo  $result['nom_canto'];?>"><?php  echo  $result['nom_canto'];?></option>
              <?php } ?>
            </select>



                    

              
