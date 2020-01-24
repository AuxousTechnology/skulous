    <div class="container login-container mt-5">
        <div class="row my-5 p-4">
            <div class="col-md-4 m-auto p-4 shadow rounded">
                <?= $this->session->flashdata("success"); ?>
                <form action="<?= base_url('auth/index')?>" method="post">
                    <div class="">
                        <img src="<?= base_url('assets/images/logo.png')?>" class="img img-responsive img-fluid" alt="">
                        <div class="form-group mt-">
                            <label for="userId" class="font-weight-bold"> User Name </label>
                            <input type="text" name="user_name" class="form-control" value="<?= set_value('user_name')?>" autocomplete="off">
                            <?= form_error('user_name')?>
                        </div>
                        <div class="form-group" >
                            <label for="user_password" class="font-weight-bold"> Password </label>
                            <input type="password" name="user_password" class="form-control" value="<?= set_value('user_password')?>">
                            <?= form_error('user_password')?>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-info"> Log In</button>
                        </div>
                    </div>
                </form>
                <div class="text-right">
                    <a href="" class="text-primary">Forget Password?</a>
                </div>
            </div>
            
        </div>
    </div>