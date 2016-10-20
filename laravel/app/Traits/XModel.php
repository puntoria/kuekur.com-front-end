<?php  

	namespace App\Traits;

	trait XModel{

		protected static function lists( $allowNull=false, $label='name', $value='id' ){
			$class = get_called_class();
			$list = $class::all()->lists($label,$value);

			if( $allowNull == true ){
				$list->prepend('','');
			}
			
			return $list;
		}

	}

?>