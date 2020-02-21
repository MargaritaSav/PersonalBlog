<?php 
require_once 'Model/Model.php';

class Admin extends Model{
	public function getAdmin($login){
		$sql = 'SELECT id AS id, password AS pswd FROM admin_login WHERE login=?';
		$result = $this->executeRequest($sql, array($this->sanitize($login)));
		return $result->fetch();

	}
}