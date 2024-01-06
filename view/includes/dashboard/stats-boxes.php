<div class="col-12 col-sm-6 col-md-12 col-lg-12">
    <div class="card mb-3">
        <div class="card-body">
            <div class="row align-items-center flex-row">
                <div class="col-12">
                    <h4 class="mb-0 text-center">
                        <span>Última Verificação</span><br>
                        <span><?= $updates->getVerifiedAt()->format('d/m/Y \- H:i:s'); ?></span>
                    </h4>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-12 col-sm-6 col-md-12 col-lg-12">
    <div class="card mb-3">
        <div class="card-body">
            <div class="row align-items-center flex-row">
                <div class="col-7">
                    <h2 class="mb-0 d-flex align-items-center">
                        <span><?= $info['confirmed']; ?></span>
                    </h2>
                    <span class="text-muted text-uppercase small">Casos</span>
                </div>
                <div class="col-lg-5 col-3">
                    <div class="icon big text-white bg-blue">
                        <i class="fas fa-user-md fa-3x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-12 col-sm-6 col-md-12 col-lg-12">
    <div class="card mb-3">
        <div class="card-body">
            <div class="row align-items-center flex-row">
                <div class="col-7">
                    <h2 class="mb-0 d-flex align-items-center">
                        <span><?= $info['deaths']; ?></span>
                    </h2>
                    <span class="text-muted text-uppercase small">Óbitos</span>
                </div>
                <div class="col-lg-5 col-3">
                    <div class="icon big text-white bg-violet">
                        <i class="fas fa-cross fa-3x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-12 col-sm-6 col-md-12 col-lg-12">
    <div class="card mb-3">
        <div class="card-body">
            <div class="row align-items-center flex-row">
                <div class="col-7">
                    <h2 class="mb-0 d-flex align-items-center">
                        <span><?= $info['lethality'] ?>%</span>
                    </h2>
                    <span class="text-muted text-uppercase small">Letalidade</span>
                </div>
                <div class="col-lg-5 col-3">
                    <div class="icon big text-white bg-red">
                        <i class="fa fa-percentage fa-3x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>