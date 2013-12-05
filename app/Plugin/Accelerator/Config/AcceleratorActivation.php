<?php
/**
 * Example Activation
 *
 * Activation class for Example plugin.
 * This is optional, and is required only if you want to perform tasks when your plugin is activated/deactivated.
 *
 * @package  Croogo
 * @author   Fahad Ibnay Heylaal <contact@fahad19.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class AcceleratorActivation {

/**
 * onActivate will be called if this returns true
 *
 * @param  object $controller Controller
 * @return boolean
 */
	public function beforeActivation(&$controller) {
		return true;
	}

/**
 * Called after activating the plugin in ExtensionsPluginsController::admin_toggle()
 *
 * @param object $controller Controller
 * @return void
 */
	public function onActivation(&$controller) {
		// ACL: set ACOs with permissions
		$controller->Croogo->addAco('Accelerator'); // ExampleController
		$controller->Croogo->addAco('Accelerator/admin_index'); // ExampleController::admin_index()
		$controller->Croogo->addAco('Accelerator/index', array('registered', 'public')); // ExampleController::index()
		$controller->Croogo->addAco('Accelerator/ideas/index', array('registered')); 
		$controller->Croogo->addAco('Accelerator/ideas/add', array('registered')); 
		$controller->Croogo->addAco('Accelerator/ideas/edit', array('registered')); 
		$controller->Croogo->addAco('Accelerator/ideas/vote', array('registered'));
		// Main menu: add an Example link
		$mainMenu = $controller->Link->Menu->findByAlias('main');
		$controller->Link->Behaviors->attach('Tree', array(
			'scope' => array(
				'Link.menu_id' => $mainMenu['Menu']['id'],
			),
		));
		$controller->Link->save(array(
			'menu_id' => $mainMenu['Menu']['id'],
			'title' => 'Accelerator',
			'link' => 'plugin:accelerator/controller:accelerator/action:index',
			'status' => 1,
			'class' => 'accelerator',
		));
	}

/**
 * onDeactivate will be called if this returns true
 *
 * @param  object $controller Controller
 * @return boolean
 */
	public function beforeDeactivation(&$controller) {
		return true;
	}

/**
 * Called after deactivating the plugin in ExtensionsPluginsController::admin_toggle()
 *
 * @param object $controller Controller
 * @return void
 */
	public function onDeactivation(&$controller) {
		// ACL: remove ACOs with permissions
		$controller->Croogo->removeAco('Accelerator'); // AcceleratorController ACO and it's actions will be removed

		// Main menu: delete Example link
		$link = $controller->Link->find('first', array(
			'conditions' => array(
				'Menu.alias' => 'main',
				'Link.link' => 'plugin:accelerator/controller:accelerator/action:index',
			),
		));
		$controller->Link->Behaviors->attach('Tree', array(
			'scope' => array(
				'Link.menu_id' => $link['Link']['menu_id'],
			),
		));
		if (isset($link['Link']['id'])) {
			$controller->Link->delete($link['Link']['id']);
		}
	}
}
