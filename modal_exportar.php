<div class="modal fade" id="exportar">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Exportar Archivo Excel</h4>
              </div>
        <div class="modal-body"> 
          <style type="text/css">
            .mensaje_alerta_importacion{
              font-size: 2em;              
            }
          </style>
                   <div id="mensaje_exportar"></div>        
                    <form class="form-horizontal" enctype="multipart/form-data" onsubmit="exportar(); return false" id="exportar_data" action="">
                            

                             <div class="form-group col-md-12">
		                              <label class="control-label">Ingrese Clave</label>
		                                <input class="form-control" type="text" placeholder="Clave" id="clave_exportar" required="true" name="exportar_clave">

                             </div>
							
							<div class="form-group col-md-12">
                             <button type="submit" class="btn btn-lg btn-primary">Exportar</button> 
                             </div>
                    </form>
                 </div>            
              <br>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->