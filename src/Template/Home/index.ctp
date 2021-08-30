<main role="main">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php

use App\Model\Entity\Carousel;

$cont_marc = 0;
                    foreach ($carousels as $carousel) {
                        if($cont_marc == 0){
                            echo '<li data-target="#myCarousel" data-slide-to="'.$cont_marc.'" class="active"></li>';
                        }else{
                        echo '<li data-target="#myCarousel" data-slide-to="'.$cont_marc.'"></li>';
                    }
                    $cont_marc++;
                }
                ?>

            </ol>
            <div class="carousel-inner">
                <?php 
                $cont_slide = 0;
                foreach ($carousels as $carousel) {
                    if($cont_slide == 0){ //se o slide for o primeiro
                        echo '<div class="carousel-item active">';
                    }else{
                        echo '<div class="carousel-item">';
                    }
                    echo $this->Html->image('../files/carousel/'.$carousel->id.'/'.$carousel->image, ['class'=>'first-slide img-fluid slides', 'alt'=>'First slide']);
                    echo '<div class="container">';
                    echo '<div class="carousel-caption '.$carousel->position->position.'">';
                    if($carousel->tittle != ""){
                        echo '<h1 class="d-none d-md-block">'.$carousel->tittle.'</h1>';
                    }
                    if($carousel->description != ""){
                        echo '<n class="d-none d-md-block">'.$carousel->description . "</n><br><br>";
                    }
                    if($carousel->tittle_button != ""){
                        echo '<p><a class="btn btn-sm btn-'.$carousel->color->color.'" href="'.$carousel->link.'" role="button">'.$carousel->tittle_button.'</a></p>';
                    }        
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    $cont_slide++; //incrementa mais um ao cont_slide
                    
                } 
                ?>
                
            </div>

            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Próxima</span>
            </a>
        </div>
        <div class="jumbotron servicos">
            <div class="container">
                <h2 class="display-4 text-center titulo-servicos"><?= $services->tittle_ser?></h2>
                <div class="card-group">
                    <div class="card text-center">
                        <div class="tamanho-icon">
                            <i class="<?= $services->icon_one?>"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?= $services->tittle_one?></h5>
                            <p class="card-text">
                                <?= $services->description_one?>
                            </p>
                        </div>
                    </div>
                    <div class="card text-center">
                        <div class="tamanho-icon">
                            <i class="<?= $services->icon_two?>"></i>
                        </div>
                        <div class="card-body">
                        <h5 class="card-title"><?= $services->tittle_two?></h5>
                            <p class="card-text">
                                <?= $services->description_two?>
                            </p>
                        </div>
                    </div>
                    <div class="card text-center">
                        <div class="tamanho-icon">
                            <i class="<?= $services->icon_three?>"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?= $services->tittle_three?></h5>
                            <p class="card-text">
                                <?= $services->description_three?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="jumbotron depoimento">
            <div class="container">
                <h2 class="display-4 text-center titulo-depoimento"><?= $depositions->name_dep ?></h2>
                <p class="lead text-center desc-depoimento"><?= $depositions->description_dep ?></p>
                <div class="card-deck">
                    <div class="card text-center dep-left">
                        <div class="embed-responsive embed-responsive-16by9">
                            <?= $depositions->video_one ?>
                        </div>
                    </div>
                    <div class="card text-center">
                        <div class="embed-responsive embed-responsive-16by9">
                            <?= $depositions->video_two ?>
                        </div>
                    </div>
                    <div class="card text-center">
                        <div class="embed-responsive embed-responsive-16by9">
                            <?= $depositions->video_three ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="jumbotron ult-art">
            <div class="container">
                <h2 class="display-4 text-center tit-ult-art">Últimos Artigos</h2>
                <div class="card-group">
                <?php foreach ($articles as $article) { ?>               
                    <div class="card">
                        <a>
                            <?php 
                                $imagem = $this->Html->image('../files/articles/'.$article->id.'/'.$article->image,['class'=>'card-img-top', 'alt'=>$article->tittle]);
                                echo $this->Html->link(__($imagem),['controller'=>'Artigo', 'action'=>'view',$article->slug], ['escape'=>false]) ?>
                        </a>
                        <div class="card-body">
                            <h5 class="card-title title-post-home"><?=$this->Html->link(__($article->tittle),['controller'=>'Artigo', 'action'=>'view',$article->slug]) ?></h2>

                            <p class="card-text"><?php echo $article->description_article?></p>
                            <p class="title-post-home"><?=$this->Html->link(__(' ...Leia mais'),['controller'=>'Artigo', 'action'=>'view',$article->slug]) ?></a></p>
                        </div>

                        <div class="card-footer">
                            <small class="text-muted">
                                <?php 
                                    $date1 = strtotime($article->modified);
                                    $date2 = strtotime(date('d-m-Y H:i:s'));
                                    
                                    $segundos = abs($date2-$date1);
                                    if ($segundos < 60){
                                        echo "Atualizado há ".intval($segundos)." segundos.";
                                    }else{
                                        $minutos = $segundos/60;
                                        if ($minutos<60){
                                            if ($minutos == 1){
                                                echo "Atualizado há ".intval($minutos)." minuto.";}
                                            else{
                                                echo "Atualizado há ".intval($minutos)." minutos.";}
                                        }else{
                                            $horas = $minutos/60;
                                            if ($horas<24){
                                                if (intval($horas) == 1){
                                                    echo "Atualizado há ".intval($horas)." hora.";
                                                }else{
                                                    echo "Atualizado há ".intval($horas)." horas.";}
                                            }else{
                                                $dias = $horas/24;   
                                                echo "Atualizado há ".intval($dias)." dias.";}
                                            }
                                        }
                                       
                                ?>
                            </small>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </main><br>