<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <base href="<?= URL ?>">
        <title><?= $title ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <meta name="author" content="Lucas Andrade">

        <link href="view/images/favicon.png" rel="icon" type="image/png">


        <?= $styles ?>
    </head>
    <body class="body">
        <header class="header">
            <nav class="navbar navbar-expand-lg bg-white shadow">
                <a href="<?= URL ?>" class="navbar-brand font-weight-bold text-uppercase text-base">
                    <img src="view/images/logo.svg" class="logo" alt="Logo - <?= APP_NAME ?>">
                    <?= APP_NAME ?>
                </a>
            </nav>
        </header>