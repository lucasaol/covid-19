<main class="main px-xl-5">
    <div class="container">
        <div class="row align-items-center py-5">
            <div class="col-12 col-md-5 col-lg-5">
                <div class="pr-lg-5">
                    <img src="view/images/<?= $error['banner']; ?>" class="img-fluid">
                </div>
            </div>
            <div class="col-12 col-md-7 col-lg-7">
                <h1 class="mb-4"><?= $title ?></h1>
                <p class="text-muted text-justify">
                    <?= $error['description']; ?>
                </p>
                
                <?= $flash_message ?? ''; ?>

                <a href="<?= URL ?>" class="btn btn-primary shadow px-5">Início</a>
            </div>
        </div>
    </div>
</main>