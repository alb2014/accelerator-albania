<?php

/**
 * Example Controller
 *
 * PHP version 5
 *
 * @category Controller
 * @package  Croogo
 * @version  1.0
 * @author   Fahad Ibnay Heylaal <contact@fahad19.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class AcceleratorController extends AcceleratorAppController {

/**
 * Controller name
 *
 * @var string
 * @access public
 */
	public $name = 'Accelerator';

/**
 * Models used by the Controller
 *
 * @var array
 * @access public
 */
	public $uses = array('Setting');

/**
 * admin_index
 *
 * @return void
 */
	public function admin_index() {
		$this->set('title_for_layout', __('Accelerator'));
	}

/**
 * index
 *
 * @return void
 */
	public function index() {


		$this->set('nodes', ClassRegistry::init('Node')->find('all', array(
		'conditions' => array('Node.type' => 'blog'),
		'limit' => 5,
		'order' => array(
			'Node.created' => 'desc')
	  	)
	));
		$this->set('ideas', ClassRegistry::init('Idea')->find('all', array(
			'limit' => 5,
			'order' => array(
				'total_votes' => 'desc',
				'up_votes' => 'desc') 
			)
		));
		$this->set('title_for_layout', __('Accelerator'));
	}

}
