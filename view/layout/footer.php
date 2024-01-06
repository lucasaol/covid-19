<footer class="footer bg-white shadow align-self-end py-3 px-xl-5 w-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 text-center text-md-left">
                <p class="mb-2 mb-md-0"><?= APP_NAME ?> © <?= date('Y') ?></p>
            </div>
            <div class="col-md-6 text-center text-md-right">
                <p class="mb-0">
                    <span>
                        <?= VERSION ?> - Desenvolvido por
                        <a href="<?= AUTHOR_URL ?>" target="_blank" class="external text-primary">
                            Lucas Andrade
                        </a>
                    </span>
                </p>
            </div>
        </div>
    </div>
</footer>
<?= $scripts ?>
</body>
</html>