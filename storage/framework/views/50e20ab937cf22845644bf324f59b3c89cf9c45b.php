<div class="modal fade modal-fade-in-scale-up" id="approvemodal" aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-success">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title">Approve or Reject Cost Data Template</h4>
                        </div>
                        <div class="modal-body">
                          <p>Please Click on the Button Below To either Approve/Reject this Cost Data</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-success waves-effect" onclick="alertaction(2)">Approve</button>
                          <button type="button" class="btn btn-danger waves-effect" onclick="alertaction(1)">Reject</button>
                        </div>
                      </div>
                    </div>
                  </div>


                <div class="modal fade modal-fade-in-scale-up" id="Reason" aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-success">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title">Reason For Action</h4>
                        </div>
                        <div class="modal-body">
                          <p>Please Briefly State the reason for Action, Please Click the Finalize button only if you are sure of your decision,this process cannot be undone</p><br>
                          <textarea class="form-control" placeholder="You are Rejected because xyz" id="reasontext"></textarea>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-success  waves-effect" onclick="finalize($('#reasontext').val())">Finalize Decision</button>
                          
                        </div>
                      </div>
                    </div>
                  </div>