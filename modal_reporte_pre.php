<div class="modal fade" id="reporte_pre">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Descargar Reporte</h4>
              </div>
        <div class="modal-body"> 
          <style type="text/css">
            .mensaje_alerta_pre{
              font-size: 2em;              
            }
          </style>
                   <div id="mensaje_imprimir"></div>        
                    <form class="form-horizontal" enctype="multipart/form-data" onsubmit="reportepre(); return false" id="reporte_pre" >
                            

                             <div class="form-group col-md-12 col-sm-12 col-xs-12">
		                              <label class="control-label">Ingrese Clave</label>
		                                <input class="form-control" type="text" placeholder="Clave" id="reporte_pre_clave" required="true" name="reporte_pre">

                             </div>
							
							<div class="form-group col-md-12 col-sm-12 col-xs-12">
                             <button type="submit" class="btn btn-lg btn-primary">Descargar</button> 
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