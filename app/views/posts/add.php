<?php require APPROOT . '/views/inc/header.php' ; ?>

        <a href="<?= URLROOT ."/posts" ?>" class="btn btn-ligh"><i class="fa fa-backward"></i>Back</a>
            <div class="card card-body bg-light mt-5">

                <h2>Add Post</h2>
                <p>create a post with this form</p>
                <form method="post" action="<?= URLROOT ."/posts/add" ?>" >
                <div class="form-group">
                    <label for="title">Title: <sup>*</sup></label>
                    <input type="text" class="form-control form-control-lg <?php echo (!empty($data['title_err'])?'is-invalid':"");?> " name="title" placeholder=""
                    value="<?= $data['title'] ?>" required >
                    <span class="invalid-feedback" style="display:block"><?=  !empty($data['title_err'])?$data['title_err']:"" ; ?></span>
                </div>
                <div class="form-group">
                    <label for="body">Body: <sup>*</sup></label>
                    <textarea type="text" class="form-control form-control-lg <?php echo (!empty($data['body'])?'is-invalid':"");?> " name="body" placeholder=""
                    required > <?= $data['body'] ?></textarea> 
                    <span class="invalid-feedback"><?= !empty($data['body_err'])?$data['body_err']:"" ; ?></span>
                </div>

                    <input type="submit" class="btn btn-success mt-3" value="Submit">
                </form>
            </div>


<?php require APPROOT . '/views/inc/footer.php' ; ?>