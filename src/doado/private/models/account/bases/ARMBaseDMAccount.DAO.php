<?php
	/**
	 * created by ARMDaoMaker ( automated system )
	 * ! Please, don't change this file
	 * insted change ARMDMAccountDAO class
	 * DMAccount
	 * @date 29/03/2016 11:03:06 
	 */ 
	abstract class ARMBaseDMAccountDAOAbstract extends  ARMBaseDAOAbstract {
		
		protected $TABLE_NAME = 'account';
		
		
		/**
		* type : int(10) unsigned
		*/
		const FIELD_id = 'id';
		/**
		* type : int(1)
		*/
		const FIELD_active = 'active';
		/**
		* type : varchar(255)
		*/
		const FIELD_login = 'login';
		/**
		* type : varchar(255)
		*/
		const FIELD_password = 'password';
		/**
		* type : varchar(255)
		*/
		const FIELD_facebook_id = 'facebook_id';
		
		/**
		* @return DMAccountDAO 
		*/
		public static function getInstance( $alias = ""){
			return parent::getInstance( $alias  ) ;
		}
		/**
		 *  @return DMAccountDAO 
		 */
		public static function getInstaceByConfigVO( $configVO , $alias = self::DEFAULT_INSTANCE_NAME ){
			return parent::getInstaceByConfigVO( $configVO , $alias ) ;
		}
		/**
		 * @return DMAccountDAO
		 */
		public static function getDefaultInstance() {
		 	return parent::getDefaultInstance() ;
		}
	}