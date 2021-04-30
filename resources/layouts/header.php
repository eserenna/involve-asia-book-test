<!DOCTYPE html>
<html>

<head>
    <title><?php echo env('APP_NAME') ?></title>
    <link rel="stylesheet" href="resources/css/app.css">
</head>

<body>
    <div id="app">
        <?php if ($this->message) { ?>
            <div class="message">
                <?php echo $this->message; ?>
            </div>
        <?php } ?>

        <div class="container">