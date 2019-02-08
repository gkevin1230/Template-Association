<?php
class LastPostsWidget extends \Elementor\Widget_Base{

    public function get_name(){
        return 'lastposts';
    }

    public function get_title(){
        return 'Derniers posts';
    }

    public function get_icon(){
        return 'social-icons';
    }

    public function _register_controls(){
        $this->start_controls_section(
			'section_nb_posts',
			[
                'label' => 'Configuration',
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT
			]
        );
        
		$this->add_control(
			'nb_posts',
			[
				'label' => 'Nombre d’articles à afficher :',
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => 'Nombre de posts à afficher'
			]
		);

        $this->end_controls_section();
    
    }

    public function render(){

        $settings = $this->get_settings();

        recent_posts($settings['nb_posts']);
    }
}

?>