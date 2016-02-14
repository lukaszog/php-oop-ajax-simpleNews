

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

                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                         <div class="navbar-header">

                            <a class="navbar-brand" href="#">Moja strona</a>
                        </div>

                         <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li><a href="index.php">Lista artykułów</a></li>
                                <?if($_SESSION['login'] != "yes") { ?>
                                    <li><a href="index.php?action=register">
                                       Zarejestruj
                                    </a></li>
                                    <li><a href="index.php?action=login">
                                        Zaloguj
                                    </a></li>

                                <? } ?>

                                </li>
                            </ul>

                            <ul class="nav navbar-nav navbar-right">
                                <? if($_SESSION['login'] == "yes") {
                                echo "Zalogowany jako: $_SESSION[user]";

                                ?>
                                <a href="index.php?action=logout">
                                    <button class="btn btn-primary dropdown-toggle" type="button">Wyloguj</button>
                                </a>
                                <?
                                }
                                ?>

                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>



            </div>
        </div>
        <?
        }

         foreach ($views as $view) echo $view; ?>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="text-muted">Stopka</p>
        </div>
    </footer>
    </body>


    </html>

