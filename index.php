<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NBot</title>
    <meta name="description" content="Binggung Cari Bot? Ya Disini Aja. NBot Hadir Untuk Membantu Anda">
    <link href='asset/img/apple-touch-icon.png' rel='apple-touch-icon' type='image/png'>
    <link href='asset/img/apple-touch-icon.png' rel='apple-touch-startup-image'>
    <link rel="shortcut icon" href="asset/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="asset/css/bulmasss.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="asset/css/stylees.css">
    <link rel="stylesheet" href="asset/css/stylingsse.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Gaegu:wght@300;400;700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Caveat&family=Comfortaa:wght@300&family=Cookie&family=Gloria+Hallelujah&family=Macondo&family=Pacifico&family=Patrick+Hand&family=Sacramento&display=swap');

        @font-face {
            font-family: rici;
            src: url(asset/font/rici-regularss1.ttf);
        }

        @font-face {
            font-family: amal;
            src: url(asset/font/amal-regularss3.ttf);
        }


        * {
            font-family: 'gaegu', cursive;
        }

        .is-sticky-top {
            top: 0;
            position: sticky;
        }

        .hidden {
            display: none !important;
        }

        .h-full-mid {
            height: 92vh !important;
        }

        .my-auto-mid {
            margin-top: 25vh !important;
            margin-bottom: 50vh !important;
        }
    </style>
</head>

<body>
    <div class="d-none">
        <!-- Start Navbar -->
        <nav class="navbar is-sticky-top is-link notranslate" role="navigation" aria-label="main navigation">
            <div class="container">
                <div class="navbar-brand">
                    <a class="navbar-item has-text-weight-bold is-size-4" href="index.php">
                        NBot
                    </a>
                    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                    </a>
                </div>
                <div id="navbarBasicExample" class="navbar-menu">
                    <div class="navbar-start">
                        <a class="navbar-item" href="?page=beranda">
                            Beranda
                        </a>
                        <a class="navbar-item" href="?page=bot tulis">
                            Bot Tulis
                        </a>
                        <a class="navbar-item" href="?page=bot fotoketeks">
                            Bot FotoKeTeks
                        </a>
                        <a class="navbar-item" href="?page=bot translate">
                            Bot Translate
                        </a>
                    </div>

                    <div class="navbar-end">
                        <div class="navbar-item">
                            <div class="buttons">
                                <a class="button is-link has-text-white has-text-weight-bold" href="https://wa.me/?text=*Link NBot :*%0A<?= "https://" . $_SERVER['HTTP_HOST']  . $_SERVER['PHP_SELF']; ?>" title="Berbagi">
                                    <i class="fas fa-share mr-2"></i>Share
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->

        <?php
        switch (@$_GET["page"]) {
            case 'beranda':
                include_once 'beranda.php';
                break;
            case 'bot tulis':
                include_once 'bot1.php';
                break;
            case 'bot fotoketeks':
                include_once 'bot2.php';
                break;
            case 'bot translate':
                include_once 'bot3.php';
                break;

            default:
                include_once 'beranda.php';
                break;
        }
        ?>
    </div>
    <div class="d-block">
        <section class="hero is-link h-full">
            <div class="my-auto">
                <div class="column is-6 mx-auto has-text-centered">
                    <h1 class="title" style="font-size:4rem;padding:0 5rem;">
                        Buka Dari Laptop Atau Pc Anda
                    </h1>
                </div>
            </div>
        </section>
    </div>
    <script src="asset/js/main.js"></script>
    <script src="asset/js/bulma.js"></script>
</body>


</html>