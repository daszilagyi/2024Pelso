<?php require APPROOT . '/views/inc/header.php' ; ?>
<div class="row mb-3">
    <div class="col-md-6">
        <h1>Posts</h1>
    </div>
    <div class="col-md-6" style="padding-top:10px">

        <a href="<?= URLROOT; ?>/posts/add" class="btn btn-primary float-end">
            <i class="fa-solid fa-pencil"></i> Add Post 
        </a>
    </div>
</div>

<?php foreach($data['posts'] as $post) : ?>
                <div class="card card-body mb-3">
                            <h4 class="card-title">
                                <?php echo $post->title; ?>
                                <div class="bg-light p-2 mb-3 mt-3">
                                    written by <?= $post->name; ?> on <?= $post->post_created; ?>
                                </div>
                                <p class="card-text"> <?= $post->body; ?></p>
                                <a href="<?= URLROOT . "/posts/show" .$post->postid ; ?>" class="btn btn-dark">More</a>
                            </h4>
                </div>        
<?php endforeach; ?>
<?php require APPROOT . '/views/inc/footer.php' ; ?>