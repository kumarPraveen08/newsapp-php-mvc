<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="errorpage" content="true" />
    <meta name="errortype" content="404 - Not Found" />
    <title>Not Found</title>

    <link rel="stylesheet preload" href="<?=URLROOT?>/css/vendor/bootstrap.min.css" as="style">
    <link rel="stylesheet preload" href="<?=URLROOT?>/css/style.css" as="style">
    <link rel="stylesheet preload" href="<?=URLROOT?>/css/extra-styles.css" as="style">
</head>
<body class="echo-404-page">
    <section class="echo-404-area">
        <div class="echo-container">
            <div class="echo-error-content">
                <div class="echo-error">
                    <div class="echo-error-heading">
                        <h1>404</h1>
                    </div>
                    <div class="echo-error-sub-heading">
                        <h3>page not found</h3>
                    </div>
                    <div class="echo-error-pera">
                        <p>Sorry, the page you seems looking for,<br> has been moved, redirected or moved permanently.</p>
                    </div>
                    <div class="error-btn">
                        <a href="<?=URLROOT?>" class="text-capitalize">go back home</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>