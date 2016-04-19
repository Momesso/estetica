<?php
/**
 * created by ARMModelVoMaker ( automated system )
 * 
 * @date 29/03/2016 11:03:06
 * @from_table account 
 */ 
class DMAccountVO extends ARMAutoParseAbstract{
	
	 
	
	/**
	 * @type : int(10) unsigned			
	 */
	public $id;
	
	/**
	 * @type : int(1)			
	 */
	public $active;
	
	/**
	 * @type : varchar(255)			
	 */
	public $login;
	
	/**
	 * @type : varchar(255)			
	 */
	public $password;
	
	/**
	 * @type : varchar(255)			
	 */
	public $facebook_id;
}
	