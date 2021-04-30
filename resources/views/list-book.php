<?php include __DIR__ . '/../layouts/header.php'; ?>
<div class="row list">
    <div class="column column-12">
        <div class="row justify-content-end">
            <div class="column column-1 text-end button-row">
                <a type="button" class="button button-small button-primary" href="/add">Add Book</a>
            </div>
        </div>

        <?php if (count($data) > 0) { ?>
            <div class="row table">
                <div class="column column-4 text-title">Title</div>
                <div class="column column-2 text-title">Year Published</div>
                <div class="column column-4 text-title">Author Name</div>
                <div class="column column-2"></div>
            </div>

            <?php foreach ($data as $list) { ?>
                <div class="row table">
                    <div class="column column-4">
                        <?php echo $list->title ?>
                    </div>
                    <div class="column column-2">
                        <?php echo $list->year_published ?>
                    </div>
                    <div class="column column-4">
                        <?php echo $list->author_name ?>
                    </div>
                    <div class="column column-2 button-row text-end flex align-items-center">
                        <a class="button button-small button-primary" href="/info?id=<?php echo $list->id; ?>">Info</a>
                        <a class="button button-small button-primary" href="/update?id=<?php echo $list->id; ?>">Update</a>
                        <a class="button button-small button-danger" href="/delete?id=<?php echo $list->id; ?>">Delete</a>
                    </div>
                </div>
            <?php } ?>
        <?php  } else { ?>
            <div class="row">
                <div class="column column-12">
                    <h3 class="text-center">No data found</h3>
                </div>
            </div>
        <?php } ?>
    </div>
    <?php include __DIR__ . '/../layouts/footer.php'; ?>