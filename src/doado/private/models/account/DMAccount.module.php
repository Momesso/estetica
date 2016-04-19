<?php
	/**
	* created by ARMModuleMaker ( automated system )
	* Please, change this file
	* don't change ARMBaseDMAccountModuleAbstract class
	*
	* ARMBaseDMAccountModuleAbstract
	* @date 29/03/2016 11:03:06
	*/

class DMAccountModule extends ARMBaseDMAccountModuleAbstract {
	/**
	 * Encapsulando o processo de registro, primeiro passo
	 *
	 * @param $login
	 * @param $password
	 * @return ARMReturnResultVO
	 */
	public function register( $login, $password ){
		$entity = DMAccountModelGateway::getInstance()->getEntity();
		$vo = $entity->getVO() ;
		$vo->login = $login;
		$vo->password = $password ;
		$entity->fetchObject($vo);
		return $entity->commit();
	}
}