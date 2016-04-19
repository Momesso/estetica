<?php
/**
 * Created by PhpStorm.
 * User: renato
 * Date: 29/03/16
 * Time: 18:01
 */


class Account {
	/**
	 *
	 * @return ARMReturnResultVO
	 */
	public function register(){

		if(ARMNavigation::getVar("login")){
			$resultado = $this->doRegister() ;
			if($resultado->success){
				//deu certo o registro
				//redirect
				ARMNavigation::redirect( ARMNavigation::getLinkToController($this, "success"), TRUE );
			}
			return $resultado ;
		}

	}
	public function success(){
		//
	}
	public function doRegister(){
		$login 		= ARMNavigation::getVar("login") ;
		$password	= ARMNavigation::getVar("password") ;
		return DMAccountModule::getInstance()->register($login, $password) ;
	}
	public function facebookRegister(){
		//
	}
}