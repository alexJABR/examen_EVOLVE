<?php 
/**
 * 
 */
class Users{
	protected $DB = null;
	function __construct(){
		$this->DB = Database::StartUp();
	}

	public function login($data){
		try {
			$st = $this->DB->prepare("SELECT user_id,email,color FROM users_tbl WHERE email=? AND password=AES_ENCRYPT(?, GET_SECRET_WORD())");
			$st->execute(array($data['email'], $data['password']));
			if ($st->rowCount() >= 1) {
				return $st->fetchObject();
			}else{
				return null;
			}
		} catch (Exception $e) {
			//return json_encode($e);
			return null;
		} catch (PDOException $e) {
			//return json_encode($e);
			return null;
		}
	}

	public function signin($data){
		try {
			$st = $this->DB->prepare("INSERT INTO users_tbl (email,password,color) VALUES(?, AES_ENCRYPT(?,GET_SECRET_WORD()), ?)");
			$st->execute(array($data['email'], $data['password'], $data['color']));
			return true;
		} catch (Exception $e) {
			//return json_encode($e);
			return false;
		} catch (PDOException $e) {
			//return json_encode($e);
			return false;
		}
	}
	
	public function getUsers(){
		try {
			$st = $this->DB->prepare("SELECT U.email,C.color,C.color_en FROM users_tbl AS U INNER JOIN colores_tbl AS C ON C.id_color=U.color");
			$st->execute();
			return $st->fetchAll(PDO::FETCH_ASSOC);
		} catch (Exception $e) {
			//return json_encode($e);
			return false;
		} catch (PDOException $e) {
			//return json_encode($e);
			return false;
		}
	}
}
?>