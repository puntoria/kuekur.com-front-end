<?php 

namespace App\Helpers;

class JavascriptHelper{

	private static $data = ['test'=>'cool'];

	public static function setData( $key , $value ){
		JavascriptHelper::$data[ $key ] = $value;
	}

	public static function outputData(){
		?>
		<script type="text/javascript">
			var data = <?php echo json_encode(JavascriptHelper::$data); ?>
		</script>
		<?php
	}

}

?>