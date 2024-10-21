<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="node_modules/simplebar/dist/simplebar.css">
    <link rel="stylesheet" href="/public/scss/vendors/simplebar.scss">
    <link rel="manifest" href="/public/assets/favicon/manifest.json">
    <!-- Main styles for this application-->
    <link href="/public/scss/style.scss" rel="stylesheet">
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link href="/public/scss/examples.scss" rel="stylesheet">
    <script src="/public/js/config.js"></script>
    <script src="/public/js/color-modes.js"></script>
    <title><?= $title ?></title>
</head>

<body>
    <div class="shadow">
        <header class="d-flex justify-content-center py-3">
            <ul class="nav nav-pills">
                <li class="nav-item"><a href="/" class="nav-link    " aria-current="page">Home</a></li>
                <li class="nav-item"><a href="/artikel" class="nav-link">Blog</a></li>
                <li class="nav-item"><a href="#" class="nav-link">About</a></li>
                <?php $session = session(); ?>
                <?php if (session()->has('logged_in') == true) : ?>

                    <a class="nav-link dropdown-toggle me-4" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="img/undraw_profile.svg" class="rounded-circle" width="40px" height="40px">
                        <?php echo $session->get('nama') ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <form action="/logout" method="GET">
                                <button type="submit" class="dropdown-item">
                                    Logout
                                </button>
                            </form>
                        </li>
                        <?php if (!session()->has('role') == '1') : ?>
                            <li>
                                <a href="/admin.dashboard" class="dropdown-item">Dashboard</a>
                            </li>
                        <?php else : ?>
                            <li>
                                <a href="/profile" class="dropdown-item">Profile</a>
                            </li>
                        <?php endif; ?>
                    </ul>

                <?php else : ?>

                    <li class="nav-item" style="width: 120px;">
                        <a class="nav-link text-primary" href="/sign-in">Login</a>
                    </li>

                <?php endif; ?>

            </ul>
        </header>
    </div>
    <?= $this->rendersection('content'); ?>
    <div class="container-fluid">
        <footer class="py-3 my-4">
            <p class=" text-muted text-center ">
                Copyright © created by ruang cerita
            </p>
        </footer>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="node_modules/@coreui/coreui/dist/js/coreui.bundle.min.js"></script>
    <script src="node_modules/simplebar/dist/simplebar.min.js"></script>
    <script>
        const header = document.querySelector('header.header');

        document.addEventListener('scroll', () => {
            if (header) {
                header.classList.toggle('shadow-sm', document.documentElement.scrollTop > 0);
            }
        });
    </script>
    <script>
        $(function() {
            var url = window.location;
            // aktif single sidebar menu
            $('.nav-link').filter(function() {
                return this.href == url;
            }).addClass('active');
        });
    </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>