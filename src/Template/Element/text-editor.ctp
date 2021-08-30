<?= $this->Html->script('https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js', ['block'=>'script'])//o block vai garantir que o script só seja carregado quando precisar ?>
<?= $this->Html->scriptBlock("
    ClassicEditor
    .create( document.querySelector( '#editor-um' ) )
    .catch( error => {
        console.error( error );
    } );
", ['block'=>'script']) ?>
<?= $this->Html->scriptBlock("
    ClassicEditor
    .create( document.querySelector( '#editor-dois' ) )
    .catch( error => {
        console.error( error );
    } );
", ['block'=>'script']) ?>
<?= $this->Html->scriptBlock("
    ClassicEditor
    .create( document.querySelector( '#editor-tres' ) )
    .catch( error => {
        console.error( error );
    } );
", ['block'=>'script']) ?>
<?= $this->Html->scriptBlock("
    ClassicEditor
    .create( document.querySelector( '#editor-sobre' ) )
    .catch( error => {
        console.error( error );
    } );
", ['block'=>'script']) ?>