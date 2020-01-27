<div class="container-fluid">
    <h1 class="h1 text-center mt-5">
        Edit Post
    </h1>
    <form action="/post/update" method="POST" accept-charset="utf-8">
        <input type="hidden" name="id" value="<?= $this->viewContent->posts->id; ?>">
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Post Title</span>
            </div>
            <input type="text" name="title" class="form-control" id="exampleInputTitle" aria-describedby="titleHelp" placeholder="Enter the post title" value="<?= $this->viewContent->posts->title; ?>">
        </div>
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Content</span>
            </div>
            <textarea class="form-control" rows="4" name="content" aria-label="content"><?= $this->viewContent->posts->content; ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="/posts" class="btn btn-secondary">Cancel</a>
    </form>
</div>