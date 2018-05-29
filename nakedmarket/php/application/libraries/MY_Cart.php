<?PHP
class MY_Cart extends CI_Cart {

	public function __construct(){
		parent::__construct();
		$this->update_ship();
	}

	protected $ship_arr= array("常溫"=>150,"低溫"=>220);
	public $ship = 0;
	public $ship_type = "";

	function update_ship(){
		foreach ($this->contents() as $item) {
			if ($item["options"]->ship_type == "低溫") {
				$this->ship_type = "低溫";
				break;
			}
		}
		if($this->ship_type==""){
			$this->ship_type = "常溫";
		}
		//免運金額
		if($this->total() >=1800){
			$this->ship = 0;
			$this->ship_type = "免運";
		}
		else{
			$this->ship = $this->ship_arr[$this->ship_type];
		}
	}
	
	public function my_update($items = array())
	{
		$this->update($items);
		$this->update_ship();
	}

}