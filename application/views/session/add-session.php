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
                                <span class="text-muted font-weight-bold">Add Session </span>
                            </div>
                            <div class="float-right px-2">
                                <a href="<?= base_url('welcome/session/select')?>">
                                    <button class="btn btn-info px-2 my-1" type="button"> <i class="fa fa-check"></i> Session </button>
                                </a>
                            </div>
                         </div>
                    </div>
                    <form method="post" action="" class="">
                       <div class="row border pt-2">
                         <div class="col-md-12 m-auto">
                            <div class="form-group">
                                <label for="">Session name <span class="text-danger">*</span></label>
                                <input type="text" name="session_name" class="form-control" value="<?= set_value('session_name')?>" placeholder="Enter session name">
                                <?= form_error("session_name")?>
                            </div>
                            <div class="form-group">
                                <label for="">Session Start Date <span class="text-danger">*</span></label>
                                <input type="date" name="start_session" class="form-control" value="<?= $startSession; ?>">
                                <?= form_error("start_session")?>
                            </div>
                            <div class="form-group">
                                <label for="">Session End Date <span class="text-danger">*</span></label>
                                <input type="date" name="end_session" class="form-control" value="<?= $endSession; ?>">
                                <?= form_error("end_session")?>
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

    </div>
</div>