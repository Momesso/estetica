<?php
/**
 *
 * Configuração do módulo de imagem
 *
 * @author: Renato Seiji Miwaki - reytuty@gmail.com
 * Date: 01/12/15
 *
 * @version 1.0
 */

class ARMImageConfigVO {
	/**
	 * local onde salva as imagens temporárias
	 * @var string
	 */
	public $resized_image_folder = "{temp}/{original_path}/" ;
	/**
	 * local onde salva as originais enviadas
	 * @var string
	 */
	public $original_image_folder = "image/{relative_path}/" ;
	/**
	 * Se false ele reescreve a imagem todas as vezes
	 * @var bool
	 */
	public $use_cache = TRUE ;
	/**
	 * vazio é porque vai manter o nome original ( tirando caracteres especiais )
	 * se preencher, vai usar esse nome para o novo arquivo
	 * aceita folder tb, e as variaveis {temp} para a pasta temporária
	 *
	 * @var string
	 */
	public $forced_saved_file_name = "" ;
}