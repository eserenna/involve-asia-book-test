<?php include __DIR__ . '/../layouts/header.php'; ?>
<div class="row min-height-100 justify-content-center">
    <div class="column column-12">
        <div class="row justify-content-center">
            <div class="column column-6">
                <h3>Add Book</h3>
                <form action="add" method="post">
                    <div class="margin-bottom">
                        <label class="form-label" for="title">Title</label>
                        <input name="title" type="text" placeholder="Title" required>
                    </div>

                    <div class="margin-bottom">
                        <label class="form-label" for="year_published">Year Published</label>
                        <input name="year_published" type="tel" placeholder="Year Published" pattern="[1-9]{1}[0-9]{3}" required>
                    </div>

                    <div class="margin-bottom">
                        <label class="form-label" for="author_name">Author Name</label>
                        <input name="author_name" type="text" placeholder="Author Name" required>
                    </div>

                    <div class="button-row">
                        <a class="button button-light" href="/">Back</a>
                        <input class="button button-primary" type="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<?php include __DIR__ . '/../layouts/footer.php'; ?>