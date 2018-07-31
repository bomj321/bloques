<div class="modal fade" id="imprimir">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Seleccione el Bloque</h4>
              </div>


                   <div class="modal-body">         
                      <form action="reportes/rpt.php" method="post">

                            <div class="form-group">
                                  <label class="control-label">Bloque</label>
                                    <select class="form-control" name="Bloque" class="form-control">
                                        <option value="1">Bloque1</option>
                                        <option value="2">Bloque2</option>
                                        <option value="3">Bloque3</option>
                                        <option value="4">Bloque4</option>
                                        <option value="Pendiente">Pendiente</option>
                                        <option value="Cancelado">Cancelado</option>
                                    </select>
                                </div>
                              <input class="btn btn-sm btn-primary" type="submit" name="add" value="IMPRIMIR">
                       </form>
                  </div>            
              <br>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->