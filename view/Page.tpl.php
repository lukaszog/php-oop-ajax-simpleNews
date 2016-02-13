

    <!DOCTYPE html>
    <html>
    <head>

        <title><?php echo $page->title; ?></title>

        <meta charset="UTF-8"/>
        <meta name="description" content="Projekt zaliczeniowy na zajęcia PAI 2016"/>
        <meta name="keywords" content="PAI"/>
        <script src="js/jquery-2.2.0.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
        <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
    </head>
    <body>
    <?
    if($_GET['action'] != 'showComment') {
    ?>
    <div class="container">
        <div class="row" style="margin-bottom: 2%;">
            <div class="col-xs-12">
                <div class="dropdown">
                    <a href="index.php">
                        <button class="btn btn-primary dropdown-toggle" type="button">Lista artykułów</button>
                    </a>

                </div>
            </div>
        </div>
        <?
        }

         foreach ($views as $view) echo $view; ?>
    </div>
    </body>
    </html>

