<?php
namespace App\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Table;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

/**
 * Upload behavior
 */
class UploadBehavior extends Behavior
{
    /**
     * Default configuration.
     *
     * @var array
     */
    //protected $_defaultConfig = [];
    protected $_defaultConfig = [];

    public function singleUpload(array $file, $destino)
    {
        $this->criarDiretorio($destino);
    	return $this->upload($file, $destino);    	
    }
    public function criarDiretorio($destino){
        $diretorio = new Folder($destino); //só é possível usar o folder depois de incluir o use acima
    
        if(is_null($diretorio->path)){
            $diretorio->create($destino); //cria uma pasta com o diretóri
        }
    }
    //para não ser acessado fora do upload
    protected function upload($file, $destino)
    {
    	extract($file);//transformando $file em uma string
        //$name = $this->slug($name);
    	if(move_uploaded_file($tmp_name, $destino . $name)){ //nome do arquivo e destino para movê-lo
    		return $name; //upload feito com sucesso
    	}else{
    		return false; //não feito com sucesso
    	}
    }
    //retirar os caracteres especiais
    public function slugSingleUpload($name)
    {
        $formato['a'] = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]/?;:,\\\'<>°ºª';
        $formato['b'] = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr                                ';
        $name = strtr(utf8_decode($name), utf8_decode($formato['a']), $formato['b']);
        $name = str_replace(' ', '-', $name);//substituindo o espaço em branco por um traço

        $name = str_replace(['-----', '----', '---', '--'], '-', $name);

        $name = strtolower($name); //quando tiver mais de um traço, o programa vai substituir por um traco só, na variavel name.

        return $name;
    }

    
}
