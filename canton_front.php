
<?php
    include('conexion.php');

$valor = $_GET['valor'];
$sql=("SELECT * FROM cantones WHERE id_provi = '".$valor."'");
$resul = mysqli_query($con,$sql);


?>
           
            <div class="multi-horizontal" data-for="canton">
                   <div class="form-group">
                      <label class="form-control-label mbr-fonts-style display-7" for="canton">Cant&oacute;n</label>
                       <select  required name="canton" class="form-control" id="select_form" for="canton" onchange="dis(this.value)">
                        <option selected value="">Seleccione su Cant&oacute;n</option>
                         <?php
                             while($result=mysqli_fetch_array($resul)){ ?>
                                <option value="<?php  echo  $result['nom_canto'];?>"><?php  echo  $result['nom_canto'];?></option>
                                <?php } ?>
                    </select>
                  </div>
            </div>
                   