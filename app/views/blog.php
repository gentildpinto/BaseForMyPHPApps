<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mt-5">
            <h1 class="h1">
                <?php $this->GetPageTitle(); ?>

                <a href="/post/create" class="float-right btn btn-primary">
                    <i class="fa fa-plus-circle bg-transparent"></i> New Post
                </a>
            </h1>
        </div>
    </div>

    <?php foreach($this->viewContent->posts as $post ): ?>
        <h3 class="h3 text-center">
            <a class="page-link" href="/post/<?= $post->id; ?>/show"><?= $post->title; ?></a>

            <a href="/post/<?= $post->id; ?>/edit" class="float-right btn btn-primary">
                <i class="fa fa-edit bg-transparent"></i> Edit Post
            </a>

            <a href="/post/<?= $post->id; ?>/delete" class="float-right btn btn-danger">
                <i class="fa fa-trash bg-transparent"></i> Delete Post
            </a>
        </h3>
        <p class="text-justify">
            <?= $post->content; ?>
        </p>
        <hr class="border-dark">
    <?php endforeach; ?>
</div>