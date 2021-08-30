<main role="main">
    <div class="jumbotron blog">
        <div class="container">
            <h2 class="display-4 text-center blog-titulo">Blog</h2><br>
            <div class="row">
                <div class="col-md-8 blog-main">
                    <hr class="featurette-divider">
                    <?php foreach ($articles as $article) {?>
                        <?php if(($article) and ($article->situations_id == 2)){?>
                            <div class="row featurette">
                                <div class="col-md-7 order-md-2">
                                    <h2 class="featurette-heading blog-post-title"><?=$this->Html->link(__($article->tittle),['controller'=>'Artigo', 'action'=>'view',$article->slug]) ?></h2>
                                    <p class="lead">
                                        <?= $article->description_article?>
                                        <?=$this->Html->link(__(' ...Leia mais'),['controller'=>'Artigo', 'action'=>'view',$article->slug]) ?>
                                    </p>
                                </div>
                                <div class="col-md-5 order-md-1">
                                    <a>
                                        <?php 
                                            $imagem = $this->Html->image('../files/articles/'.$article->id.'/'.$article->image,['class'=>'featurette-image img-fluid mx-auto', 'alt'=>$article->tittle]);
                                            echo $this->Html->link(__($imagem),['controller'=>'Artigo', 'action'=>'view',$article->slug], ['escape'=>false]) ?>
                                    </a>
                                </div>
                            </div>
                            <hr class="featurette-divider">
                        <?php } ?>
                    <?php } ?>

                    <?= $this->element('pagination_site')?>
                </div><!-- /.blog-main -->

                <aside class="col-md-4 blog-sidebar">
                    <?php if(($autorsSob) AND ($autorsSob->situations_id == 2)) {?>
                        <div class="p-3 mb-3 bg-light rounded">
                                <h4 class="font-italic"><?= $autorsSob->tittle ?></h4>
                                <p class="mb-0"><?=$autorsSob->description ?></p>
                        </div>
                    <?php } ?>
                    <div class="p-3">
                        <h4 class="font-italic">Destaques</h4>
                        <ol class="list-unstyled">
                            <?php foreach ($articleDestaq as $articleDest) { ?>
                                <?php if(($articleDest) and ($articleDest->situations_id == 2)){?>
                                    <li><?= $this->Html->link(__($articleDest->tittle), ['controller'=>'Artigo', 'action'=>'view', $articleDest->slug]) ?></li>
                                <?php } ?>  
                            <?php } ?>
                        </ol>
                    </div>
                    <div class="p-3">
                        <h4 class="font-italic">Recentes</h4>
                        <ol class="list-unstyled mb-0">
                        <?php foreach ($articleUlts as $articleUlt) { ?>
                            <?php if(($articleUlt) and ($articleUlt->situations_id == 2)){?>
                                <li><?= $this->Html->link(__($articleUlt->tittle), ['controller'=>'Artigo', 'action'=>'view', $articleUlt->slug]) ?></li>
                            <?php } ?>          
                        <?php } ?>            
                    </ol>
                    </div>
                    <div class="p-3">
                        <h4 class="font-italic">Redes Sociais</h4>
                        <ol class="list-unstyled mb-0">
                            <?php foreach ($mediasSocials as $mediasSocial) { ?>
                                <?php if(($mediasSocial) and ($mediasSocial->situations_id == 2)){?>
                                    <li><a href="<?=$mediasSocial->link?>" target="_blank"><?= $mediasSocial->icon?> <?=$mediasSocial->tittle?></a></li>
                                <?php } ?>           
                            <?php }?>
                        </ol>
                    </div>
                    </aside><!-- /.blog-sidebar -->

            </div><!-- /.row -->
        </div>
        <hr class="featurette-divider">
    </div>
</main>