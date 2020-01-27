<div class="container-fluid">
    <h1 class="h1 text-center mt-5">
        Create Post
    </h1>
    <form action="/post/store" method="POST" accept-charset="utf-8">
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Post Title</span>
            </div>
            <input type="text" name="title" class="form-control" id="exampleInputTitle" aria-describedby="titleHelp" placeholder="Enter the post title">
        </div>
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Content</span>
            </div>
            <textarea class="form-control" rows="4" name="content" aria-label="content" placeholder="Type the post content here"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="/posts" class="btn btn-secondary">Cancel</a>
    </form>
</div>