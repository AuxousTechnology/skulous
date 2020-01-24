<?php 
    $startSession = date("Y-m-d");
    $date = getdate(strtotime($startSession));
    $endSession = (int)$date["year"] + 1 ."-". sprintf("%02d", $date["mon"]). "-" . sprintf("%02d", (int)$date["mday"]-1);
?>
<div class="container-fluid">
    <div class="row p-0">
        <div class="col-md-6 m-auto">
            <div class="page-header">
               <div class="inner-content">
                   <!-- Session Details --> 
                   <div class="row">
                        <div class="col-md-12 p-0 m-0">
                            <?= $this->session->flashdata("success")?>
                        </div>
                        <div class="col-md-12 p-0 m-0 border">
                            <div class="float-left px-2 py-2">
                                <span class="text-muted font-weight-bold">Session Setup</span>
                            </div>
                            <div class="float-right px-2">
                                <button class="btn btn-info px-2 my-1" type="button" data-toggle="modal" data-target="#addSession"> <i class="fa fa-plus"></i> Session </button>
                            </div>
                         </div>
                    </div>
                    <form method="post" action="" class="">
                       <div class="row border">
                         <div class="col-md-12 m-auto">
                            <div class="form-group">
                              <label class="py-1 text-muted">Select Session <span class="text-danger">*</span></label>
                              <select name="session" id="" class="form-control">
                                <option value="">--Select--</option>
                              </select> 
                             </div> 
                             <div class="form-group">
                                <input type="submit" name="sbmt" class="btn btn-info">
                                <input type="reset" name="reset" class="btn btn-danger">
                             </div>
                          </div> 
                        </div>   
                    </form>  
               </div>     
        </div>

        <!--Add session form---->
        <div class="modal fade" id="addSession" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="addSessionlabel">Add Session</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('welcome/session/add')?>" method="post" id="sessionForm">
                        <div class="form-group">
                            <label for="">Session Name <span class="text-danger">*</span></label>
                            <input type="text" name="session_name" class="form-control" placeholder="Enter session name">
                            
                        </div>
                        <div class="form-group">
                            <label for="">Start Session <span class="text-danger">*</span></label>
                            <input type="date" name="start_session" class="form-control" value="<?= $startSession; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">End Session <span class="text-danger">*</span></label>
                            <input type="date" name="end_session" class="form-control" value="<?= $endSession; ?>">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info" form="sessionForm">Add</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>



    </div>
</div>