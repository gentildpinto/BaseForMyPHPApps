<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1 class="h1">
                <?php $this->getPageTitle(); ?>
            </h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 text-center text-justify">
            <!-- <h1 class="h2">
                <?= $this->viewContent->posts->title; ?>
            </h1> -->
            <p>
                <?= $this->viewContent->posts->content; ?>
            </p>
        </div>
    </div>
</div>