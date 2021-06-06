<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vutsal - Reservasi dan Cari Lawan Sparingmu!</title>
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/templatemo-style.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#">Vutsal</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Reservasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Cari Team</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tentang Kami</a>
                </li>
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown link
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li> -->
            </ul>
        </div>
    </nav>
    <?= $this->renderSection('content'); ?>
    <!-- Copyright -->
    <footer>
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
            <a href="#">Vutsal.com</a>
        </div>
    </footer>
</body>

</html>