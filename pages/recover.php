<?php
class RA_form{

	public function __construct(){
		require_once( './admin.php' );
		$this->loadScripts();
		$this->loadStyle();
		$this->showFormHTML();
	}

	/**
	 * Load js files to page
	 * Author : Raj, Abhi
	 * @params : none
	 * @return : none
	 **/ 
	public function loadScripts(){
		wp_enqueue_script( 'main', plugins_url() . '/recover-text-widgets/js/main.js', array(), '1.0.0', false );
		// Send data to client
		wp_localize_script('main', 'Data', array(
		  'url' => admin_url( 'admin-ajax.php' )
		));
	}

	/**
	 * Load css files to page
	 * Author : Raj, Abhi
	 * @params : none
	 * @return : none
	 **/ 
	public function loadStyle(){
		/* Register our stylesheet. */
       wp_register_style( 'main-style', plugins_url().'/recover-text-widgets/css/style.css');
	   wp_enqueue_style( 'main-style' );
	}

	/**
	 * Display recovery form html
	 * Author : Raj, Abhi
	 * @params : none
	 * @return : none
	 **/ 
	public function showFormHTML(){
		$form = '<div class="rcvr-pg">';
		$form.= '<div class="heading">';
		$form.='<h1>Recover Lost/ Removed Widgets</h1>';
		$form.= '</div>';
		$form.= '<div class="top">';
		$form.= '<a href="" style="float:left">';
		$form.= '<img src="'.plugins_url().'/recover-text-widgets/images/royal_experts.jpg'.'"></img>';
		$form.= '</a>';
		$form.= '<p>';
		$form.= 'Recover your lost text widgets during moving site or database changes.Click Recover now and you will find your lost widgets at its place. Nothing will happen to your previous widgets if already working fine. <span class="ra-alert">Please take backup of your data before click on recover button.</span>';
		$form .='<i style="display:block;">If you find any difficulty or you have any suggestions for us, feel free to reach us at:
				<a href="mailto:rajr.royal@gmail.com,cc=abhi.sogga144@gmail.com" target="_blank">Contact us</a></i>';
		$form.= '</p>';
		$form.= '</div>';
		$form.= '<div class="bottom">';
		$form.= '<form name="" action="">';
		$form.= '<input type="button" name="recover-btn" value="Recover Now"/>';
		$form.= '<p class="RA-ajax-response"></p>';
		$form.= '</form>';
		$form.= '</div>';
		$form.= '</div>'; 
		echo $form;
	}
}
$RA_form = new RA_form;
?>
