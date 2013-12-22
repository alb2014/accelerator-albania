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

		$lang = getenv('TRANSLATION_LANG');

		if (!empty($lang)){
			
			parent::beforeFilter();
			
			Configure::write('Config.language', $lang);
			$this->Session->write('Config.language', $lang);

    	} else {
    		parent::beforeFilter();
    		Configure::write('Config.language', 'en');
			$this->Session->write('Config.language', 'en');
    	}
	}
}
