<?php
namespace App\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Table;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;


/**
 * UploadRed behavior
 */
class UploadRedBehavior extends Behavior
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function uploadImgRed(array $file, $destino, $largura, $altura)//é preciso passar as informações pelo UsersController.
    {
        $this->criarDiretorioImgRed($destino);
        $this->verExtensaoImg($file, $destino, $largura, $altura);
        //return $this->upload($file, $destino);    
        return True;	
    }
    public function criarDiretorioImgRed($destino){
        $diretorio = new Folder($destino); //só é possível usar o folder depois de incluir o use acima
    
        if(is_null($diretorio->path)){
            $diretorio->create($destino); //cria uma pasta com o diretóri
        }
    }
    //para não ser acessado fora do upload
    public function upload($file, $destino)
    {
    	extract($file);//transformando $file em uma string
        //$name = $this->slug($name);
        $name = $file['image']['name'];
    	if(move_uploaded_file($file['image']['tmp_name'], $destino . $name)){ //nome do arquivo e destino para movê-lo
    		return $name; //upload feito com sucesso
    	}else{
    		return false; //não feito com sucesso
    	}
    }
    //retirar os caracteres especiais
    public function slugUploadImgRed($name)
    {
        $formato['a'] = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]/?;:,\\\'<>°ºª';
        $formato['b'] = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr                                ';
        $name = strtr(utf8_decode($name), utf8_decode($formato['a']), $formato['b']);
        $name = str_replace(' ', '-', $name);//substituindo o espaço em branco por um traço

        $name = str_replace(['-----', '----', '---', '--'], '-', $name);

        $name = strtolower($name); //quando tiver mais de um traço, o programa vai substituir por um traco só, na variavel name.

        return $name;
    }
    public function verExtensaoImg($file, $destino, $largura, $altura){
        extract($file);

        switch ($file['type']) {
            
            case 'image/jpeg';
                list($largura_original, $altura_original) = getimagesize($tmp_name);
                $image_p = imagecreatetruecolor($largura, $altura); //cria uma imagem preta do tamanho requerido
                $imagem = imagecreatefromjpeg($tmp_name);
                imagecopyresampled($image_p, $imagem, 0,0,0,0, $largura, $altura, $largura_original, $altura_original);
                imagejpeg($image_p, $destino.$name);
                echo "Imagem JPEG";
                break;
            case 'image/pjpeg';
                list($largura_original, $altura_original) = getimagesize($tmp_name);
                $image_p = imagecreatetruecolor($largura, $altura); //cria uma imagem preta do tamanho requerido
                $imagem = imagecreatefromjpeg($tmp_name);
                imagecopyresampled($image_p, $imagem, 0,0,0,0, $largura, $altura, $largura_original, $altura_original);
                imagejpeg($image_p, $destino.$name);
                echo "Imagem JPEG";
                break;
            case 'image/png';
                list($largura_original, $altura_original) = getimagesize($tmp_name);
                $image_p = imagecreatetruecolor($largura, $altura); //cria uma imagem preta do tamanho requerido
                $imagem = imagecreatefrompng($tmp_name);
                imagecopyresampled($image_p, $imagem, 0,0,0,0, $largura, $altura, $largura_original, $altura_original);
                imagepng($image_p, $destino.$name);
                echo "Imagem PNG";
                break;
            case 'image/x-png';
                list($largura_original, $altura_original) = getimagesize($tmp_name);
                $image_p = imagecreatetruecolor($largura, $altura); //cria uma imagem preta do tamanho requerido
                $imagem = imagecreatefrompng($tmp_name);
                imagecopyresampled($image_p, $imagem, 0,0,0,0, $largura, $altura, $largura_original, $altura_original);
                imagepng($image_p, $destino.$name);
                echo "Imagem PNG";
                break;
        }

    }
}
