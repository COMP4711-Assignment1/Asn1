<?php

/**
 * core/MY_Controller.php
 *
 * Default application controller
 *
 * @author		JLP
 * @copyright           2010-2013, James L. Parry
 * ------------------------------------------------------------------------
 */
class Application extends CI_Controller {

	protected $data = array();	  // parameters for view components
	protected $id;				  // identifier for our content

	/**
	 * Constructor.
	 * Establish view parameters & load common helpers
	 */

	function __construct() {
            parent::__construct();
	}
        
        function index() {
            $this->data['pageTitle'] = 'welcome';   // our default page
        }

	/**
	 * Render this page
	 */
	function render() {
            $menu = array('menudata' => $this->makeMenu());
            $this->data['title'] = 'Stock Ticker';	// our default title
            $this->data['menubar'] = $this->parser->parse('_menubar', $menu, true); //menubar items
            $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true); //page content
            
            $xml = $this->website->readXML();
            $this->data['table'] = $xml; //server status
            
            if($this->game->getRound() != $this->website->getRound()) { //if a new round has started
                $this->db->query('UPDATE game SET round = '.$this->website->getRound()); //update the round
                $this->users->reset(); //clear stocks and set cash to 5000
            }

            // finally, build the browser page!
            $this->data['data'] = &$this->data;
            $this->parser->parse('_template', $this->data);
	}
        
        function makeMenu() {
            $menu = array();
            $menu[] = array('name' => "Home", 'link' => '/');
            $menu[] = array('name' => "Status", 'link' => '#myModal', "data" => 'modal');
            
            if(!ISSET($this->session->userdata['userRole'])) { //if not logged in
                $menu[] = array('name' => 'Login', 'link' => '/Authentication');
                $menu[] = array('name' => "Sign up", 'link' => '/Authentication/signup');
            }
            else {
                $role = $this->session->userdata['userRole'];
                $menu[] = array('name' => 'Portfolio', 'link' => '/portfolio/'.$this->session->userdata['userName']);
                $menu[] = array('name' => 'Logout', 'link' => '/Authentication/logout');
                if(strcmp($role, "admin") == 0) {
                    array_push($menu, array('name' => 'Admin', 'link' => '/Admin'));
                }
            }
            
            return $menu;
        }
        
        function restrict($roleNeeded = null) {
            $userRole = $this->session->userdata('userRole');
            if ($roleNeeded != null) {
                if (is_array($roleNeeded)) {
                    if (!in_array($userRole, $roleNeeded)) {
                        redirect("/");
                        return;
                    }
                }
                else if ($userRole != $roleNeeded) {
                    redirect("/");
                    return;
                }
            }
        }

}

/* End of file MY_Controller.php */
/* Location: application/core/MY_Controller.php */