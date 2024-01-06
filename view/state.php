<main class="main px-xl-5">
    <div class="container-fluid py-5">
        <?php if (isset($flash_message)) { ?>
            <div class="row mb-4">
                <div class="col-12">
                    <?php
                    echo $flash_message;
                    \App\Factory::getInstance('FlashMessage')->clear();
                    ?>
                </div>
            </div>
            <?php
        }

        if (isset($state)) {
            ?>
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card mb-5 mb-lg-0">
                        <div class="card-header">
                            <h1 class="h6 mb-0 text-uppercase"><?= $state->getName(); ?></h1>
                        </div>
                        <div class="card-body">
                            <p class= mb-5">
                                <strong>
                                    Última Atualização - <?= $state->getUpdatedAt()->format('d/m/Y \- H:i:s'); ?>
                                    <br/>
                                    Verificado Em - <?= $dashboard->getVerifiedAt()->format('d/m/Y \- H:i:s'); ?>     
                                </strong>
                            </p>

                            <div class="row mb-4">
                                <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
                                    <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                                        <div class="flex-grow-1 d-flex align-items-center">
                                            <div class="dot mr-3 bg-blue"></div>
                                            <div class="text">
                                                <h3 class="mb-0"><?= number_format($state->getConfirmed(), 0, '', '.'); ?></h3>
                                                <span class="text-gray">Casos Confirmados</span>
                                            </div>
                                        </div>
                                        <div class="icon icon-lg text-white bg-blue">
                                            <i class="fas fa-user-md fa-2x"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
                                    <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                                        <div class="flex-grow-1 d-flex align-items-center">
                                            <div class="dot mr-3 bg-violet"></div>
                                            <div class="text">
                                                <h3 class="mb-0"><?= number_format($state->getDeaths(), 0, '', '.'); ?></h3>
                                                <span class="text-gray">Óbitos</span>
                                            </div>
                                        </div>
                                        <div class="icon icon-lg text-white bg-violet">
                                            <i class="fas fa-cross fa-2x"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
                                    <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                                        <div class="flex-grow-1 d-flex align-items-center">
                                            <div class="dot mr-3 bg-red"></div>
                                            <div class="text">
                                                <h3 class="mb-0"><?= number_format($state->getLethality(), 1, ',', '.'); ?>%</h3>
                                                <span class="text-gray">Letalidade</span>
                                            </div>
                                        </div>
                                        <div class="icon icon-lg text-white bg-red">
                                            <i class="fa fa-percentage fa-2x"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
                                    <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                                        <div class="flex-grow-1 d-flex align-items-center">
                                            <div class="dot mr-3 bg-green"></div>
                                            <div class="text">
                                                <h3 class="mb-0"><?= number_format($state->getIncidence(), 0, '', '.'); ?></h3>
                                                <span class="text-gray">Incidência</span>
                                            </div>
                                        </div>
                                        <div class="icon icon-lg text-white bg-green">
                                            <i class="fa fa-chart-area fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
</main>