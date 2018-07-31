
<?php
    include('conexion.php');

$valor = $_GET['valor'];
$sql=("SELECT * FROM distrito WHERE canton_id = '".$valor."'");
$resul = mysqli_query($con,$sql);


?>
           
            <div class="multi-horizontal" data-for="distrito">
                   <div class="form-group">
                      <label class="form-control-label mbr-fonts-style display-7" for="distrito">Cant&oacute;n</label>
                       <select  required name="distrito" class="form-control" id="select_form" for="distrito">
                        <option selected value="">Seleccione su Distrito</option>
                         <?php
                             while($result=mysqli_fetch_array($resul)){ ?>
                                <option value="<?php  echo  $result['nom_distrito'];?>"><?php  echo  $result['nom_distrito'];?></option>
                                <?php } ?>
                    </select>
                  </div>
            </div>
                   