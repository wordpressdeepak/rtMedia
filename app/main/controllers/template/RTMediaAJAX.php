<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RTMediaAJAX
 *
 * @author udit
 */
class RTMediaAJAX {

	public function __construct() {
		add_action('wp_ajax_rtmedia_backbone_template',array($this,'backbone_template'));
		add_action('wp_ajax_rtmedia_create_album',array($this,'create_album'));
	}

	function backbone_template() {
		include RTMEDIA_PATH.'templates/media/media-gallery-item.php';
	}

        function create_album(){
            if ( isset($_POST['name']) && $_POST['name'] ) {
                $album = new RTMediaAlbum();
                $rtmedia_id = $album->add($_POST['name'], get_current_user_id(), true, false);

                if ( $rtmedia_id )
                    echo $rtmedia_id;
                else
                    echo false;

            } else {
                echo false;
            }
            wp_die();
        }
}

?>
