
<main role="main">
  <div class="jumbotron blog">
    <div class="container">
      <div class="row">
          <div class="col-md-8 blog-main">
            <?php if($article){ ?>
            <div class="blog-post">
              <h2 class="blog-post-title"><?= $article->tittle?></h2><hr>
              <p class="blog-post-meta">
              <?php 
                //Definir data da publicação do artigo
                setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                date_default_timezone_set('America/Sao_Paulo');

                //$data = date_format($article->created, 'Y-m-d H:i:s');
                
                echo '<b>Data de publicação</b>: '.utf8_encode(strftime('%d de %B de %Y',strtotime(date_format($article->created, 'Y-m-d H:i:s'))))
              
              ?> por <?= $article->user->name ?></p>
  
              <?= $article->content ?>
            </div><!-- /.blog-post -->

            <nav class="blog-pagination text-center">
              <?php 
                if((isset($articleAnt->slug) != "") and ($articleAnt->situations_id==2)){
                  echo $this->Html->link(__('Anterior'), ['controller'=>'Artigo', 'action'=>'view', $articleAnt->slug], ['class'=>'btn btn-outline-primary']);
                }else{
                  echo $this->Html->link(__('Anterior'), ['controller'=>'Artigo', 'action'=>'view'], ['class'=>'btn btn-outline-secondary disabled']);
                }
              ?>
              <?php 
                if((isset($articleProx->slug) != "") and ($articleProx->situations_id==2)){
                  echo $this->Html->link(__('Próximo'), ['controller'=>'Artigo', 'action'=>'view', $articleProx->slug], ['class'=>'btn btn-outline-info']);
                }else{
                  echo $this->Html->link(__('Próximo'), ['controller'=>'Artigo', 'action'=>'view'], ['class'=>'btn btn-outline-secondary disabled']);
                }
              ?>
            </nav>
          <?php }else{ ?>
            <div class="alert alert-danger" role="alert">
              <h3 class="alert-heading">Artigo não encontrado!</h3><br>
              <p>Desculpe, o artigo que você está procurando não foi encontado!</p>
              <hr>
              <p class="mb-0">Acesse nosso <?= $this->Html->link(__('Blog'), ['controller'=>'Blog', 'action'=>'index'])?> para mais ver outros artigos.</p>
            </div>
          <?php } ?>
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
      <hr class="featurette-divider">
    </div>
  </div>
  
</main>