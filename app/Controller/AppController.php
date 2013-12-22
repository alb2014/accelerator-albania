<?php

App::uses('CroogoAppController', 'Croogo.Controller');

/**
 * Base Application Controller
 *
 * @package  Croogo
 * @link     http://www.croogo.org
 */
class AppController extends CroogoAppController {

	public function beforeFilter() {
		Configure::write('Config.language', 'alb');
		$this->Session->write('Config.language', 'alb');

		parent::beforeFilter();
    }
    

}
