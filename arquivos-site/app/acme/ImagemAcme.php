<?php

namespace app\acme;
use Intervention\Image\ImageManagerStatic as Image;

class ImagemAcme{

	private $extensoesAceitas = [];
	private $image;
	private $file;

    //public function setFile( $file ){
        //$this->file = $file;
    //}

	public function __construct($file){
		$this->file = $file;
	}

	public function setExtensoesAceitas($extensoesAceitas) {
        $this->extensoesAceitas = $extensoesAceitas;
    }

    public function renomearFoto(){
    	return md5(uniqid());
    }

    public function excluirFoto($caminhoFotoBanco){
    	@unlink(base_path('public/' . $caminhoFotoBanco));
    }

    private function redimensionarFoto($largura,$altura){
    	$this->image = Image::make($this->file)->resize($largura,$altura);
    }

    public function salvarFoto($caminhoSalvarFoto, Array $dimensoes){
    	$this->redimensionarFoto($dimensoes['largura'],$dimensoes['altura']);
    	$this->image->save($caminhoSalvarFoto);
    }

    public function extensaoPermitida(){
    	if(!in_array($this->file->getClientOriginalExtension(),$this->extensoesAceitas)){
    		return false;
    	}
		return true;

    }

}