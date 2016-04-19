<?php
/**
 *
 * @author: Renato Miawaki - reytuty@gmail.com
 * Date: 01/12/15
 *
 * @version 1.0
 */

class ARMImageModule extends ARMBaseModuleAbstract{
	/**
	 * @var string da o strash
	 */
	const MODE_TYPE_EXACT 			= 'exact';
	/**
	 * @var string RETRATO
	 */
	const MODE_TYPE_PORTRAIT		= 'portrait';
	/**
	 * @var string paisagem
	 */
	const MODE_TYPE_LANDSCAPE		= 'landscape';
	/**
	 * @var string calculo automático respeitando o máximo possível
	 */
	const MODE_TYPE_AUTO			= 'auto';
	/**
	 * @var string cropa
	 */
	const MODE_TYPE_CROP			= 'crop';
	/**
	 *
	 * @param null $alias
	 * @param bool $useDefaultIfNotFound
	 * @return ARMImageModule
	 */
	public static function getInstance ( $alias = NULL , $useDefaultIfNotFound = FALSE  ){
		return parent::getInstance($alias, $useDefaultIfNotFound) ;
	}
	protected function getUseCache(){
		return ARMDataHandler::getValueByStdObjectIndex( $this->_config, "use_cache" );
	}
	protected function getPathToSave( $relativePath = "" ){
		return ARMDataHandler::removeLastBar( ARMDataHandler::removeDoubleBars( $this->replacePaths( ARMDataHandler::getValueByStdObjectIndex( $this->_config, "original_image_folder" ), "", $relativePath ) ) ) ;
	}
	public function getResizedImageFolder( $original_path = "", $relative_path = ""){
		return $this->replacePaths( ARMDataHandler::getValueByStdObjectIndex( $this->_config, "resized_image_folder" ) , $original_path , $relative_path ) ;
	}

	/**
	 * Faz uma troca básica de parametros possíveis no config
	 * @param $string
	 * @param string $original_path
	 * @return mixed
	 */
	protected function replacePaths( $string , $original_path = "", $relative_path = ""){
		return str_replace(
			array(
				"{temp}",
				"{original_path}",
				"{relative_path}"
			)
			,
			array(
				ARMConfig::getInstance()->getTempFolder(),
				$original_path,
				$relative_path
			),
			$string
		) ;
	}

	/**
	 * Salva a imagem enviada
	 *
	 * @param $image send array of image info: $_FILE["photo"]
	 * @param string $folderAndPath
	 * @return ARMReturnResultVO
	 */
	public function saveImage( $image , $folderAndPath = "" ){
		$retorno 	= new ARMReturnResultVO() ;
		$path 		= $this->getPathToSave( $folderAndPath ) ;
		$folder 	= ARMDataHandler::returnFoldernameOfFilepath( $path ) ;
		if($folder){
			ARMDataHandler::createRecursiveFoldersIfNotExists( $folder ) ;
			$folder = $folder."/" ;
		}

		$pathImage = ARMDataHandler::removeDoubleBars( $folder.$folderAndPath ) ;
		$defaultName = ARMDataHandler::getValueByStdObjectIndex($this->_config, "forced_saved_file_name") ;
		if( $defaultName ){
			//forçando o nome padrao
			$pathImage = ARMDataHandler::removeDoubleBars( $folder."/".$defaultName ) ;
		}

		$retorno->success = move_uploaded_file( $image["tmp_name"] , $pathImage ) ;
		$retorno->result = $pathImage ;
		return $retorno ;
	}

	/**
	 *
	 * Envie onde está a imagem original e receba de volta a imagem redimensionada
	 *
	 * @param $original_image_path
	 * @param int $new_width
	 * @param int $new_height
	 * @param null $mode
	 * @param int $quality
	 * @return mixed
	 */
	public function getImage( $original_image_path, $new_width = 100, $new_height = 100, $mode = NULL, $quality = 100 ){

		$newName = ARMImageHandler::getImageRenamedByConfig( $original_image_path, $new_width , $new_height , $mode , $quality ) ;
		$originalFolder = ARMDataHandler::returnFoldernameOfFilepath( $original_image_path ) ;

		$folder = $this->getResizedImageFolder( $originalFolder );
		$targetTemp = ARMDataHandler::removeDoubleBars( $folder."/".$newName ) ;
		if( file_exists($targetTemp) ){
			if($this->getUseCache()){
				return $targetTemp ;
			}
			//não está usando cache, apaga o arquivo para criar de novo
			unlink(  $targetTemp ) ;
		}
		ARMImageHandler::generateImage( $original_image_path, $targetTemp, $new_width , $new_height , $mode , $quality ) ;
		return $targetTemp ;
	}
}