<?php include __DIR__ . '/../layouts/header.php'; ?>
<div class="row min-height-100 justify-content-center">
    <div class="column column-12">
        <div class="row justify-content-center">
            <div class="column column-6">
                <h3>Update <?php echo $data->title ?></h3>
                <form action="update" method="post">
                    <div class="margin-bottom">
                        <label class="form-label" for="title">Title</label>
                        <input name="title" type="text" placeholder="Title" value="<?php echo $data->title ?>" required>
                    </div>

                    <div class="margin-bottom">
                        <label class="form-label" for="year_published">Year Published</label>
                        <input name="year_published" type="tel" placeholder="Year Published" pattern="[1-9]{1}[0-9]{3}" value="<?php echo $data->year_published ?>" required>
                    </div>

                    <div class="margin-bottom">
                        <label class="form-label" for="author_name">Author Name</label>
                        <input name="author_name" type="text" placeholder="Author Name" value="<?php echo $data->author_name ?>" required>
                    </div>

                    <div class="button-row">
                        <input name="id" type="hidden" value="<?php echo $data->id ?>">
                        <a class="button button-light" href="/">Back</a>
                        <input class="button button-primary" type="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include __DIR__ . '/../layouts/footer.php'; ?>