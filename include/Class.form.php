<?php
Class Form {
	private $action = "#";
	private $method = "POST";
	private $form_name = "placeholder";
	private $form_id = "placeholder";
	private $form_class = "placeholder";
	private $input_name = "placeholder";
	private $input_id = "placeholder";
	private $input_class = "placeholder";
	private $type = "text";
	private $size = "11";
	private $value = "placeholder";
	private $chk;
	
	public function __construct(){
		$this->chk = rand();
		$_SESSION['chk'] = $this->chk;
	}
	public function open(array $attr){
		if (isset($attr) && !empty($attr)){
			if (isset($attr['action']) && !empty($attr['action']))
				$action = ' action="'.$attr['action'].'" ';
			else
				$action = 'action ="'.$this->action.'" ';
			if (isset($attr['method']) && !empty($attr['method']))
				$method = ' method="'.$attr['method'].'" ';
			else
				$method = 'method ="'.$this->method.'" ';
			if (isset($attr['name']) && !empty($attr['name']))
				$name = ' name="'.$attr['name'].'" ';
			else
				$name = '';
			if (isset($attr['id']) && !empty($attr['id']))
				$id = ' id="'.$attr['id'].'" ';
			else
				$id = '';
			if (isset($attr['class']) && !empty($attr['class']))
				$class = ' class="'.$attr['class'].'" ';
			else
				$class = '';
		} else {
				$action = 'action="'.$this->action.'" ';
				$method = 'method="'.$this->method.'" ';
				$name = '';
				$id = '';
				$class = '';
		}
		echo '<form '.$action,$method,$name,$id,$class.'>'.PHP_EOL;
		
	}
	
	public function close(){
		echo "</form>".PHP_EOL;
	}
	
	public function input(array $attr){
		if (isset($attr) && !empty($attr)){
			if (isset($attr['name']) && !empty($attr['name']))
				$name = ' name="'.$attr['name'].'"';
			else
				$name = '';
			if (isset($attr['id']) && !empty($attr['id']))
				$id = ' id="'.$attr['id'].'"';
			else
				$id = '';
			if (isset($attr['class']) && !empty($attr['class']))
				$class = ' class="'.$attr['class'].'"';
			else
				$class = '';
			if (isset($attr['type']) && !empty($attr['type']))
				$type = ' type="'.$attr['type'].'"';
			else
				$type = ' type="'.$this->type.'"';
			if (isset($attr['placeholder']) && !empty($attr['placeholder']))
				$placeholder = ' placeholder="'.$attr['placeholder'].'"';
			else
				$placeholder = '';
			if (isset($attr['required']) && !empty($attr['required']))
				$required = ' required="'.$attr['required'].'"';
			else
				$required = '';
			if (isset($attr['size']) && !empty($attr['size']))
				$size = ' size="'.$attr['size'].'"';
			else
				$size = 'size="'.$this->size.'" ';
			if (isset($attr['value']) && !empty($attr['value']))
				$value = ' value="'.$attr['value'].'"';
			else
				$value = '';
		} else {
			$name = '';
			$id = '';
			$class = '';
			$type = ' type="'.$this->type.'"';
			$size = ' size="'.$this->size.'"';
			$value = '';
			$required = '';
			$placeholder = '';
		}
		echo '<input'.$type,$name,$id,$class,$placeholder,$required,$size,$value.' />'.PHP_EOL;		
	}
	
	public function submit($attr){
		if (isset($attr) && !empty($attr)){
			if (isset($attr['id']) && !empty($attr['id']))
					$id = ' id="'.$attr['id']."";
			else
					$id = '';
			if (isset($attr['class']) && !empty($attr['class']))
				$class = ' class="'.$attr['class'].'" ';
			else
				$class = '';
			if (isset($attr['name']) && !empty($attr['name']))
				$name = ' name="'.$attr['name'].'" ';
			else
				$name = '';
			if (isset($attr['value']) && !empty($attr['value']))
					$value = ' value="'.$attr['value'].'" ';
			else
					$value = '';
		} else {
			$id = '';
			$class = '';
			$name = '';
			$value = '';
		}
		$h_val = ' value="'.$this->chk.'"';
		echo '</br><input type="hidden" name="chk"'.$h_val.' />'.PHP_EOL;
		echo '</br><input type="submit"'.$name,$id,$class,$value.' />'.PHP_EOL;
	}
}
?>