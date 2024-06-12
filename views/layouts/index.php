<?php
/** @var string $Title */
/** @var string $Content */

use core\Core;
use models\Users;

if(empty($Title))
    $Title = '';
if(empty($Content))
    $Content = '';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $Title ?></title>
    <style>
        .container{
            font-family: "Comic Sans MS";
        }
        .avatar {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            font-size: 12px;
            color: white;
            font-weight: bold;
            font-family: "Arial";
        }
        .dropdown-toggle::after {
            margin-top: 15px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <header class="p-3 mb-3 border-bottom">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="/" class="nav-link px-2 link-secondary">Головна</a></li>
                    <li><a href="/news/index" class="nav-link px-2 link-body-emphasis">Новини</a></li>
                    <?php if(!Users::IsUserLogged()) : ?>
                    <li><a href="/users/login" class="nav-link px-2 link-body-emphasis">Увійти</a></li>
                    <li><a href="/users/register" class="nav-link px-2 link-body-emphasis">Реєстрація</a></li>
                    <?php endif?>
                </ul>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                    <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
                </form>
                <?php if(Users::IsUserLogged()) :
                    $user = Core::get()->session->get('user');
                    $userInitials = Users::getInitials($user);
                    ?>

                <div class="dropdown text-end">
                    <a href="#" class="d-flex link-body-emphasis text-decoration-none dropdown-toggle"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        <div id="avatar-container"></div>
                    </a>
                    <ul class="dropdown-menu text-small">
                        <?php if($user['role'] === 'admin' || $user['role'] === 'moder') :?>
                        <li><a class="dropdown-item" href="#">Додати новину</a></li>
                        <li><a class="dropdown-item" href="#">Перевірити чергу новин</a></li>
                        <?php endif;
                        if($user['role'] === 'admin'):?>
                        <li><a class="dropdown-item" href="#">Переглянути модерацію</a></li>
                        <?php endif; ?>
                        <li><a class="dropdown-item" href="#">Видалити акаунт</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="/users/logout">Logout</a></li>
                    </ul>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </header>
    <div>
        <h1><?=$Title?></h1>
        <?= $Content ?>
    </div>
    <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Features</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Pricing</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">About</a></li>
        </ul>
        <p class="text-center text-body-secondary">© 2024 Company, Inc</p>
    </footer>
</div>
</body>
<script>
    const userInitials = "<?php echo $userInitials; ?>";

    function getRandomColor() {
        const letters = '0123456789ABCDEF';
        let color = '#';
        for (let i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }

    function createAvatar(initials) {
        const avatar = document.getElementById('avatar-container');
        avatar.className = 'avatar';
        avatar.style.backgroundColor = getRandomColor();
        avatar.textContent = initials;
    }

    createAvatar(userInitials);
</script>
</html>