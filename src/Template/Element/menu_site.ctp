<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: rgb(83, 91, 139);">
        <?= $this->Html->image('favicon.png', [
            'alt' => "Logo",
            'url' => ['controller' => 'Home', 'action' => 'index'],
            'width'=>'35',
            'height'=>'35',
        ]); ?>
        <div style="margin-left: 20px !important;">
            <?= $this->Html->link(__('Buzz'), ['controller'=>'Home', 'action'=>'index'], ['class'=>'navbar-brand'])?>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ml-auto text-right">
                <li class="nav-item menu">
                    <?= $this->Html->link(__('Home'), ['controller'=>'Home', 'action'=>'index'], ['class'=>'nav-link'])?>
                </li>
                <li class="nav-item menu">
                    <?= $this->Html->link(__('Blog'), ['controller'=>'Blog', 'action'=>'index'], ['class'=>'nav-link'])?>
                </li>
                <li class="nav-item menu">
                    <?= $this->Html->link(__('Sobre Empresa'), ['controller'=>'SobreEmpresa', 'action'=>'index'], ['class'=>'nav-link'])?>
                </li>
                <li class="nav-item menu">
                    <?= $this->Html->link(__('Contato'), ['controller'=>'Contato', 'action'=>'index'], ['class'=>'nav-link'])?>
                </li>
            </ul>
        </div>
    </nav>
</header>