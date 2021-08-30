<?php
namespace App\Model\Behavior;

use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use Cake\ORM\Behavior;
use Cake\ORM\Table;
use phpDocumentor\Reflection\PseudoTypes\True_;

/**
 * DeleteArq behavior
 */
class DeleteArqBehavior extends Behavior
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];
    public function deleteArq($destino)
    {
        //deletando a pasta e arquivos do usuário deletado
        $diretorio = new Folder($destino);
        $diretorio->delete($destino);
        if ($diretorio->delete($destino)) {
            return true;
        }else {
            return false;
        }
    }
    public function deleteFile($destino, $arqAntigo, $arqNovo)
    {
        if(($arqAntigo !== null) AND ($arqAntigo !== $arqNovo)){
            $file = new File($destino . $arqAntigo); //busca o destino e junta ao aquivo antigo
            $file->delete($destino . $arqAntigo);
        }
    }
}
