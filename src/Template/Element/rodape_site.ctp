<footer class="container-fluid rodape">
    <div class="container">
        <div class="row ">
            <div class="col-1">
                <?= $this->Html->image(
                  'favicon.png',
                  ['class'=>'rodImg', 'width'=>'80px'],
                )?>
            </div>
            <?php foreach ($mediasSocials as $mediasSocial) {
                if ($mediasSocial->situations_id != 2){
                    $varEmpty = 0;
                }
                else{
                    $varEmpty = 1;
                }
            } ?>
            <?php if($varEmpty != 0){ ?>
                <div class="col-3 col-md-3 col-xl-2 rodlogo">
                    <h5>Buzz</h5>
                    <ul class="list-unstyled text-small">
                        <li><?= $this->Html->link(__('Home'), ['controller'=>'Home', 'action'=>'index'], ['class'=>'link-rodape'])?></li>
                        <li><?= $this->Html->link(__('Blog'), ['controller'=>'Blog', 'action'=>'index'], ['class'=>'link-rodape'])?></li>
                        <li><?= $this->Html->link(__('Sobre Empresa'), ['controller'=>'SobreEmpresa', 'action'=>'index'], ['class'=>'link-rodape'])?></li>
                        <li><?= $this->Html->link(__('Contato'), ['controller'=>'Contato', 'action'=>'index'], ['class'=>'link-rodape'])?></li>
                    </ul>
                </div>
            <?php }else{ ?>
                <div class="col-4 rodlogo">
                    <h5>Buzz</h5>
                    <ul class="list-unstyled text-small">
                        <li><?= $this->Html->link(__('Home'), ['controller'=>'Home', 'action'=>'index'], ['class'=>'link-rodape'])?></li>
                        <li><?= $this->Html->link(__('Blog'), ['controller'=>'Blog', 'action'=>'index'], ['class'=>'link-rodape'])?></li>
                        <li><?= $this->Html->link(__('Sobre Empresa'), ['controller'=>'SobreEmpresa', 'action'=>'index'], ['class'=>'link-rodape'])?></li>
                        <li><?= $this->Html->link(__('Contato'), ['controller'=>'Contato', 'action'=>'index'], ['class'=>'link-rodape'])?></li>
                    </ul>
                </div>
            <?php } ?>
            
            <?php if($varEmpty != 0){ ?>
                <div class="col-4 col-md-3">
                    <h5>Contato</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="link-rodape" href="tel:XXXXXXXXXXX">(XX) XXXX-XXXX</a></li>
                        <li><a class="link-rodape" href="https://goo.gl/maps/UqXngAgYG9raKBBw9" target="_blank">Av. Alegria dos Montes</a></li>
                        <li>CNPJ: XX.XXX.XXX/XXXX-XX</li>
                    </ul>
                </div>
            <?php }else{ ?>
                <div class="col-4">
                    <h5>Contato</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="link-rodape" href="tel:XXXXXXXXXXX">(XX) XXXX-XXXX</a></li>
                        <li><a class="link-rodape" href="https://goo.gl/maps/UqXngAgYG9raKBBw9" target="_blank">Av. Alegria dos Montes</a></li>
                        <li>CNPJ: XX.XXX.XXX/XXXX-XX</li>
                    </ul>
                </div>
            <?php } ?>
            <?php if($varEmpty != 0){ ?>
                <div class="col-2 col-md-3">
                    <h5>Redes Sociais</h5>
                    <ul class="list-unstyled text-small">
                        <?php foreach ($mediasSocials as $mediasSocial) { ?>
                            <?php if(($mediasSocial) and ($mediasSocial->situations_id == 2)){?>
                                <li><a class="link-rodape" href="<?=$mediasSocial->link?>" target="_blank"><?= $mediasSocial->icon?> <?=$mediasSocial->tittle?></a></li>
                            <?php } ?>           
                        <?php }?>
                    </ul>
                </div>
            <?php } ?>              
        </div>
    </div>
</footer>