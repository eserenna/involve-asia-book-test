<?php include __DIR__ . '/../layouts/header.php'; ?>
<div class="row list justify-content-center">
    <div class="column column-6">
        <div class="row">
            <div class="column column-4 button-row">
                <a type="button" class="button button-small button-light" href="/">Back</a>
            </div>
            <div class="column column-4 button-row">
                <a class="button button-small button-primary" href="/update?id=<?php echo $data->id; ?>">Update</a>
            </div>
            <div class="column column-4 button-row">
                <a class="button button-small button-danger" href="/delete?id=<?php echo $data->id; ?>">Delete</a>
            </div>
        </div>

        <div class="row">
            <div class="column column-3 text-title">
                Title
            </div>
            <div class="column column-9">
                <?php echo $data->title ?>
            </div>
        </div>

        <div class="row">
            <div class="column column-3 text-title">
                Year Published
            </div>
            <div class="column column-9">
                <?php echo $data->year_published ?>
            </div>
        </div>

        <div class="row">
            <div class="column column-3 text-title">
                Author Name
            </div>
            <div class="column column-9">
                <?php echo $data->author_name ?>
            </div>
        </div>

        <div class="row">
            <div class="column column-12 text-title">
                <hr />
                Reviews
            </div>
        </div>

        <form action="review/add" method="post">
            <div class="row">
                <div class="column column-5">
                    <input name="review" type="text" placeholder="Review" required>
                </div>
                <div class="column column-4">
                    <input name="posted_by" type="text" placeholder="Posted By" required>
                </div>
                <div class="column column-3 text-end button-row">
                    <input name="id" type="hidden" value="<?php echo $data->id ?>">
                    <input class="button button-small button-primary" type="submit" name="submit" value="Add Review">
                </div>
            </div>
        </form>

        <?php if (count($data->reviews) > 0) { ?>
            <div class="row">
                <?php foreach ($data->reviews as $review) { ?>
                    <div class="column column-12">
                        <div class="row table">
                            <div class="column column-11">
                                <p>
                                    <?php echo $review->review; ?>
                                </p>

                                <small>
                                    Posted By:
                                    <?php echo $review->posted_by; ?>
                                </small>
                            </div>
                            <div class="column column-1 flex align-items-center">
                                <a class="button button-small button-danger" href="/review/delete?id=<?php echo $review->id; ?>">Delete</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } else { ?>
            <div class="row">
                <div class="column column-12">
                    <h3 class="text-center">No data found</h3>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?php include __DIR__ . '/../layouts/footer.php'; ?>