
<?php
    include('conexion.php');

$q = $_GET['q'];
$c = $_GET['c'];
if($c=='0'){
$sql=("SELECT * FROM cantones WHERE id_provi = '".$q."'");
$resul = mysqli_query($con,$sql);
}
else{

$sql=("SELECT e.* , c.* FROM empleados as e inner join cantones as c on(c.nom_canto=e.Canton) WHERE e.id = '$c'");
$resul = mysqli_query($con,$sql);

}
?>
            <select name="Canton" class="form-control">
             <?php
        while($result=mysqli_fetch_array($resul)){ ?>
              <option value="<?php  echo  $result['nom_canto'];?>"><?php  echo  $result['nom_canto'];?></option>
              <?php } ?>
            </select>



                    

              
