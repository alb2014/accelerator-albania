<?php
/**
 * Example Event Handler
 *
 * PHP version 5
 *
 * @category Event
 * @package  Croogo
 * @version  1.0
 * @author   Fahad Ibnay Heylaal <contact@fahad19.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
App::uses('CakeEventListener', 'Event');
App::uses('User', 'Users.Model');
App::uses('CakeEmail', 'Network/Email');

class AcceleratorEventHandler extends Object implements CakeEventListener {

/**
 * implementedEvents
 *
 * @return array
 */
	public function implementedEvents() {
		return array(
			'Controller.Users.adminLoginSuccessful' => array(
				'callable' => 'onAdminLoginSuccessful',
			),
			'Helper.Layout.beforeFilter' => array(
				'callable' => 'onLayoutBeforeFilter',
			),
			'Helper.Layout.afterFilter' => array(
				'callable' => 'onLayoutAfterFilter',
			),
			//'Accelerator.Idea.Tier_Level_Up' => '_alertUser',
			'Accelerator.Idea.Tier_Level_Up' => 'alertUser',
			'Accelerator.Idea.juryAlert' => 'juryAlert',

		);
	}




/**
 * onAdminLoginSuccessful
 *
 * @param CakeEvent $event
 * @return void
 */
	public function onAdminLoginSuccessful($event) {
		$Controller = $event->subject();
		$message = __('Welcome %s.  Have a nice day', $Controller->Auth->user('name'));
		$Controller->Session->setFlash($message);
		$Controller->redirect(array(
			'admin' => true,
			'plugin' => 'accelerator',
			'controller' => 'accelerator',
			'action' => 'index',
		));
	}

/**
 * onLayoutBeforeFilter
 *
 * @param CakeEvent $event
 * @return void
 */
	public function onLayoutBeforeFilter($event) {
		$search = 'This is the content of your block.';
		$event->data['content'] = str_replace(
			$search,
			'<p style="font-size: 16px; color: green">' . $search . '</p>',
			$event->data['content']
		);
	}

/**
 * onLayoutAfterFilter
 *
 * @param CakeEvent $event
 * @return void
 */
	public function onLayoutAfterFilter($event) {
		// if (strpos($event->data['content'], 'This is') !== false) {
		// 	$event->data['content'] .= '<blockquote>This is added by AcceleratorEventHandler::onLayoutAfterFilter()</blockquote>';
		// }
	}

	
	/**
	 * alers a users their tier has leveled up
	 */
	public function alertUser($event){

        $idea = $event->data['idea'];
        $tier_level = $event->data['tier_level'];

        $ideaUser = ClassRegistry::init('User')->find('first', array(
            'conditions' =>array('User.id' => $idea['user_id'])
            )
        );

        $ideaUser = $ideaUser['User'];

        $this->_sendEmail(
                $ideaUser['email'],
                __d('accelerator', 'Congratulations! %s has reached Tier %d',$idea['name'], $tier_level),
                'Accelerator.tier_level',
                array(
                    'user' => $ideaUser,
                    'idea' => $idea,
                    'tier_level' => $tier_level
                )
        );

    }

    /**
	 * alers a jury member an idea has been submitted
	 */
	public function juryAlert($event){

		$idea = $event->data['idea'];

        $this->log($idea);

        $ideaUser = ClassRegistry::init('User')->find('first', array(
            'conditions' =>array('User.id' => $idea['Idea']['user_id'])
            )
        );

        $ideaUser = $idea['User'];

        $email = Configure::read('Accelerator.jury_email');

        $this->log('alert!!!!!');
        $this->log($email);

        $this->_sendEmail(
                $email,
                __d('accelerator', 'A new idea, %s, has been submitted for review',$idea['Idea']['name']),
                'Accelerator.jury_alert',
                array(
                	'user' => $ideaUser,
                    'idea' => $idea
                )
        );

    }

/**
 * Convenience method to send email
 *
 * @param string $from Sender email
 * @param string $to Receiver email
 * @param string $subject Subject
 * @param string $template Template to use
 * @param string $theme Theme to use
 * @param array  $viewVars Vars to use inside template
 * @param string $emailType user activation, reset password, used in log message when failing.
 * @return boolean True if email was sent, False otherwise.
 */
    public function _sendEmail($to, $subject, $template, $viewVars = null) {
        $success = false;

        try {
            // $this->log(func_get_args()); //for debugging
            $email = new CakeEmail();
            $email->config('default');
            // $email->from($from[1], $from[0]);
            $email->to($to);
            $email->subject($subject);
            $email->emailFormat('text');
            $email->template($template);
            $email->viewVars($viewVars);

            // $this->log($email);
            $success = $email->send();
        } catch (SocketException $e) {
            $this->log(sprintf('Error sending %s notification : %s', $emailType, $e->getMessage()));
        }

        return $success;
    }

}
