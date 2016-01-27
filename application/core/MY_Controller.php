<?php

/**
 * core/MY_Controller.php
 * 
 * Default application controller
 */
class Application extends CI_Controller {
    protected $data = array();  // parameters for view components
    protected $id;
    protected $choices = array(
        'Home' => '/',
        'Gallery' => '/gallery', 
        'About' => '/about'
    ); //menu navbar
    
    /**
     * Constructor 
     * Establish view parameters 
     */
    
    function __construct() {
        parent::__construct();
        $this->data = array();
        $this->data['pagetitle'] = 'Sample Image Gallery';
    }
    
    /**
     * Render this page
     * 
     */
    function render() {
        $this->data['menubar'] = build_menu_bar($this->choices);
        $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
        $this->data['data'] = &$this->data;
        $this->parser->parse('_template', $this->data);
    }
}
/* End of MY_Controller.php */
/* Location: application/core/MY_Controller.php */