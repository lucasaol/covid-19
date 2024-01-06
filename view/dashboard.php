<main class="main px-xl-5">
    <div class="container-fluid py-5">
        <h2 class="mb-4"><?= $title ?></h2>

        <div class="row mb-4">
            <section class="col-12 col-md-8 col-lg-8 mb-4 mb-lg-0">
                <div>
                    <div class="card">
                        <div class="card-header">
                            <h2 class="h6 text-uppercase mb-0">Brasil</h2>
                        </div>
                        <div class="card-body">
                            <div class="chart-holder text-center">
                                <?php include WWW_ROOT . 'view/includes/dashboard/brazil-map.php'; ?>
                            </div>
                            <p class="text-gray">Clique no estado desejado para ver mais detalhes.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="col-12 col-md-4 col-lg-4 mb-4 mb-lg-0 pl-lg-0">
                <div>
                    <div class="row">
                        <?php include WWW_ROOT . 'view/includes/dashboard/stats-boxes.php'; ?>
                    </div>
                </div>
            </section>
        </div>
    </div>
</main>