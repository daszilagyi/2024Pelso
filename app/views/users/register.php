<?php require APPROOT . '/views/inc/header.php' ; ?>
<div class="row">
    <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <h2>Create an Account</h2>
                <p>Please fill out this form to register</p>
                <form method="post" action="<?= URLROOT ."/users/register" ?>" >
                <div class="form-group">
                    <label for="name">Name: <sup>*</sup></label>
                    <input type="text" class="form-control form-control-lg <?php echo (!empty($data['name_err'])?'is-invalid':"");?> " name="name" placeholder=""
                    value="<?= $data['name'] ?>" required >
                    <span class="invalid-feedback"><?= $data['name_err']; ?></span>
                </div>

                <div class="form-group">
                    <label for="email">Email: <sup>*</sup></label>
                    <input type="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])?'is-invalid':"");?> " name="email" placeholder=""
                    value="<?= $data['email'] ?>" required >
                    <span class="invalid-feedback"><?= $data['email_err']; ?></span>
                </div>

                <div class="form-group">
                    <label for="password">Password: <sup>*</sup></label>
                    <input type="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])?'is-invalid':"");?> " name="password" placeholder=""
                    value="<?= $data['password'] ?>" required >
                    <span class="invalid-feedback"><?= $data['password_err']; ?></span>
                </div>

                <div class="form-group">
                    <label for="confirm_password">Confirm password: <sup>*</sup></label>
                    <input type="password" class="form-control form-control-lg <?php echo (!empty($data['confirm_password_err'])?'is-invalid':"");?> " name="confirm_password" placeholder=""
                    value="<?= $data['confirm_password'] ?>" required >
                    <span class="invalid-feedback"><?= $data['confirm_password_err']; ?></span>
                </div>

                <div class="row" style="margin-top:5%">
                    <div class="col">
                        <input type="submit" value="Register" class="btn btn-success btn-lg btn-block">
                    </div>
                    <div class="col">
                        <a href="<?= URLROOT . "/users/login"?>"  value="Register" class="btn btn-light btn-block">Have an account? Login!</a>
                    </div>

                </div>
                </form>
            </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php' ; ?>