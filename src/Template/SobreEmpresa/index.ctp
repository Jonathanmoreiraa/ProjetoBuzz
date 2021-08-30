<main role="main">
      <div class="jumbotron sobre-empresa">
        <div class="container">
          <h2 class="display-4 text-center sob-emp-titulo">Sobre a Empresa</h2><br>
          <?php
            $cont = 1;
            foreach ($empSobs as $empSob){
              if($cont == 1){
                $text = 'order-md-2';
                $imagem = 'order-md-1';
                $cont = 2;
              }else{
                $text = '';
                $imagem = '';
                $cont = 2;
              }
          ?>
            <div class="row featurette">
              <div class="col-md-7 <?=$text?>">
                <h2 class="featurette-heading"><?= $empSob->tittle ?></h2>
                <p class="lead"><?= $empSob->description ?></p>
              </div>
              <div class="col-md-5 <?= $imagem?>">
                <?php echo $this->Html->image('../files/empresassob/'.$empSob->id.'/'.$empSob->image,['class'=>'featurette-image img-fluid mx-auto', 'alt'=>'Sobre empresa '.$empSob->ordem]);?>
              </div>
            </div>
            <hr class="featurette-divider">
          <?php 
            }
          ?>
        </div>
      </div>
    </main>
