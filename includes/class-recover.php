<?php
class recoverWidgets{
	/**
	 * Get and Fix serialized text widgets
	 * Author : Raj, Abhi
	 * @params : none
	 * @return : none
	 **/ 
	public static function processRecovery(){
		//Fetch text widgets
		global $wpdb;
		$result = $wpdb->get_row( "SELECT * FROM ".$wpdb->prefix."options WHERE option_name = 'widget_text'" );
		$error_serialized_data = $result->option_value;
		$fixedData = recoverWidgets::fixSerializedData($error_serialized_data);
		$wpdb->query(
						"
						UPDATE ". $wpdb->prefix."options
						SET option_value = '".$fixedData."'
						WHERE option_name = 'widget_text' 
						"
					);
		$success_message = 'Your Widgets have been successfully recovered. Click <a target="_blank" href="'.admin_url( 'widgets.php' ).'">here</a> to view widgets.';
		echo $success_message;
		die;
	} 
	
	/**
	 * Load js files to page
	 * Author : Raj, Abhi
	 * @params : string $error_serialized_data
	 * @return : string $fixed_serialized_data
	 **/ 
	public static function fixSerializedData($error_serialized_data){
		$fixed_serialized_data = preg_replace_callback ( '!s:(\d+):"(.*?)";!',function($match) {
			return ($match[1] == strlen($match[2])) ? $match[0] : 's:' . strlen($match[2]) . ':"' . $match[2] . '";';
		},$error_serialized_data );
		
		return $fixed_serialized_data;
	}

}
?>
