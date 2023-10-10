<?php require APPROOT . '/views/inc/header.php' ; ?>
<div class="row">
    <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <?= flash("register_success"); ?>
                <h2>Create an Account</h2>
                <p>Please fill out this form to login</p>
                <form method="post" action="<?= URLROOT ."/users/login" ?>" >
                <div class="form-group">
                    <label for="email">Email: <sup>*</sup></label>
                    <input type="email" class="form-control form-control-lg <?php echo (!empty($data['email_error'])?'is-invalid':"");?> " name="email" placeholder=""
                    value="<?= $data['email'] ?>" required >
                    <span class="invalid-feedback" style="display:block"><?=  $data['email_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="password">Password: <sup>*</sup></label>
                    <input type="password" class="form-control form-control-lg <?php echo (!empty($data['password'])?'is-invalid':"");?> " name="password" placeholder=""
                    value="<?= $data['password'] ?>" required >
                    <span class="invalid-feedback"><?= $data['password_err']; ?></span>
                </div>

                <div class="row" style="margin-top:5%">
                    <div class="col">
                        <input type="submit" value="Login" class="btn btn-success btn-lg btn-block">
                    </div>
                    <div class="col">
                        <a href="<?= URLROOT . "/users/register"?>"  value="Register" class="btn btn-light btn-block">Don't have an account? Register!</a>
                    </div>

                </div>
                </form>
            </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php' ; ?>