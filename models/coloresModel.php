<?php 
/**
 * 
 */
class Colores{
	protected $DB = null;
	function __construct(){
		$this->DB = Database::StartUp();
	}

	public function getColores(){
		try {
			$st = $this->DB->prepare("SELECT * FROM colores_tbl");
			$st->execute();
			return $st->fetchAll(PDO::FETCH_ASSOC);
		} catch (Exception $e) {
			//return json_encode($e);
			return null;
		} catch (PDOException $e) {
			//return json_encode($e);
			return null;
		}
	}
	
	public function getConteoColores(){
		try {
			$st = $this->DB->prepare("SELECT * FROM colores_tbl ORDER BY color ASC");
			$st->execute();
			$colores = $st->fetchAll(PDO::FETCH_ASSOC);
			$data = [];
			foreach ($colores as $key => $value) {
				$st = $this->DB->prepare("SELECT COUNT(color) AS total FROM users_tbl WHERE color=?");
				$st->execute(array($value['id_color']));
				$st = $st->fetchObject();
				array_push($data, array('label'=>$value['color'],'backgroundColor'=>$value['color_en'],'borderColor'=>$value['color_en'],'data'=>[intval($st->total)]));
			}
			return $data;
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