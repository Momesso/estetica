<?php
/**
* created by ARMEntityMaker ( automated system )
* ! Please, don't change this file
* insted change DMAccountEntity  class
*
* ARMBaseDMAccountEntity 
* @date 29/03/2016 11:03:06
*/

abstract class ARMBaseDMAccountEntityAbstract extends ARMBaseEntityAbstract{
	
	
	protected function startVO(){
		if(!$this->VO){
			$this->VO = new DMAccountVO();
		}
	}
	/**
	 * 
	 * @param string $alias
	 * @return DMAccountDAO
	 */
	protected function getDAO( $alias = "" ){
		return DMAccountModelGateway::getInstance()->getDAO( $alias ) ;
	}
	/**
	 * @return DMAccountVO
	 */
	public function getVO(){
		return parent::getVO();
	}
}