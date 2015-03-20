<?php
defined( 'ABSPATH' ) OR exit;
/**
 * Plugin Name: Recover Text Widgets
 * Description: This plugin helps you to restore/recover text widgets that lost accidentally during website migration or any change
   to text widget in the database.
 * Author: Raj & Abhi
 * Version:     1.0
 * Author URL:  mailto:rajr.royal@gmail.com, mailto:abhi.sogga144@gmail.com
 * Plugin URL:  http://wordpress.com/recover-text-widgets
 */

class RA_Setup{

	public function __construct(){
		require_once  'includes/class-recover.php';
		
		//Register Hooks
		register_activation_hook( __FILE__, array( $this, 'RA_Activate' ) );
		register_deactivation_hook( __FILE__, array( $this, 'RA_Deactivate' ) );
		register_uninstall_hook(  __FILE__, array( $this, 'RA_Uninstall' ) );
		
		add_action( 'admin_menu', array( $this, 'RA_menu_page' ));
		add_action( 'wp_ajax_process_recovery', array($this, 'processRecoverWidgets'));
	}

	public function RA_Activate(){
		
	}

	public function RA_Deactivate(){
		
	}

	public function RA_Uninstall(){

	}

	/**
	 * Add menu to left navigation bar
	 * Author : Raj, Abhi
	 * @params : none
	 * @return : none
	 **/
	public function RA_menu_page(){
		add_menu_page( 'custom menu title', 'Recover Text Widgets', 'manage_options', 'recover-text-widgets/pages/recover.php', '', plugins_url( 'recover-text-widgets/images/royal-experts-18x20.png' ), 81 );
	}

	/**
	 * Ajax function to call for recovery process
	 * Author : Raj, Abhi
	 * @params : none
	 * @return : none
	 **/
	public function processRecoverWidgets(){
		recoverWidgets::processRecovery();
	}
}

$ra_setup = new RA_Setup;
?>