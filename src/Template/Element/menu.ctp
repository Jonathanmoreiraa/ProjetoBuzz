<nav class="sidebar bg-dark">
    
    <div class="logo">
        <h3><?= $this->Html->image('favicon.png', [
            'alt' => "Logo",
            'url' => ['controller' => 'Welcome', 'action' => 'index'],
            'class'=>'img-logo'
            ]); ?>
        </h3>
    </div>
    <ul class="list-unstyled">
        <li><?= $this->Html->link('<i class="fas fa-tachometer-alt"></i><n class="icon"> Dashboard</n>',
        [
            'controller'=>'welcome', //vai para tela welcoe
            'action' => 'index'
        ],
        [
            'escape'=>false, //ignora o HTML
        ]
        );?>
        </li>
        <li><?= $this->Html->link('<i class="fas fa-users"></i> <n class="icon">Usuários</n>',
        [
            'controller'=>'users', //vai para tela welcoe
            'action' => 'index' //
        ],
        [
            'escape'=>false, //ignora o HTML
        ]
        );?>
        </li>
        <li><?= $this->Html->link('<i class="fas fa-sliders-h"></i> <n class="icon">Carousel</n>',
        [
            'controller'=>'Carousels', //vai para tela welcoe
            'action' => 'index' //
        ],
        [
            'escape'=>false, //ignora o HTML
        ]
        );?>
        </li>
        <li><?= $this->Html->link('<i class="fas fa-pencil-ruler"></i> <n class="icon">Serviços</n>',
            [
                'controller'=>'Services', //vai para tela serivços
                'action' => 'view',
                '1' //redireciona para o a view 1
            ],
            [
                'escape'=>false, //ignora o HTML
            ]
            );?>
        </li>
        <li><?= $this->Html->link('<i class="fas fa-play-circle"></i> <n class="icon">Depoimentos</n>',
            [
                'controller'=>'Depositions', //vai para tela depoimentos
                'action' => 'view',
                '1' //redireciona para o a view 1
            ],
            [
                'escape'=>false, //ignora o HTML
            ]
            );?>
        </li>
        <li><?= $this->Html->link('<i class="fas fa-building"></i> <n class="icon">Sobre a empresa</n>',
            [
                'controller'=>'EmpresasSobs', //vai para tela sobre empresa
                'action' => 'index'
            ],
            [
                'escape'=>false, //ignora o HTML
            ]
            );?>
        </li>
        <li><?= $this->Html->link('<i class="fas fa-envelope"></i> <n class="icon">Mensagens</n>',
            [
                'controller'=>'ContactMessages', //vai para tela sobre empresa
                'action' => 'index'
            ],
            [
                'escape'=>false, //ignora o HTML
            ]
            );?>
        </li>
        <li><?= $this->Html->link('<i class="fas fa-newspaper"></i> <n class="icon">Artigos</n>',
            [
                'controller'=>'Articles', //vai para tela artigos
                'action' => 'index'
            ],
            [
                'escape'=>false, //ignora o HTML
            ]
            );?>
        </li>
        <li><?= $this->Html->link('<i class="fas fa-user"></i> <n class="icon">Sobre Autor</n>',
            [
                'controller'=>'AutorsSobs', //vai para tela artigos
                'action' => 'edit',
                1
            ],
            [
                'escape'=>false, //ignora o HTML
            ]
            );?>
        </li>
        <li><?= $this->Html->link('<i class="fas fa-share-alt"></i> <n class="icon">Redes Sociais</n>',
            [
                'controller'=>'MediasSocials', //vai para tela de redes sociais
                'action' => 'index'
            ],
            [
                'escape'=>false, //ignora o HTML
            ]
            );?>
        </li>
        <li><?= $this->Html->link('<i class="fas fa-sign-in-alt"></i> <n class="icon">Sair</n>',
            [
                'controller'=>'users', //vai para tela welcoe
                'action' => 'logout' //usa a ação logout que está em usersController
            ],
            [
                'escape'=>false, //ignora o HTML
            ]
            );?>
        </li>
        
    </ul>
</nav>
