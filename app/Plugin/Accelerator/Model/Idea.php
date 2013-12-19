<?php
/**
 * Accelerator App Model
 *
 * PHP version 5
 *
 * @category Model
 * @package  Accelerator Plugin for  Croogo
 * @version  1.0
 * @author   Nathaniel Smith <nathanieltsmith@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
App::uses('AcceleratorAppModel', 'Accelerator.Model');

class  Idea extends AcceleratorAppModel {
	public $hasMany = array(
        'Vote' => array(
            'className' => 'Vote',
            'foreignKey' => 'idea_id',
           // 'conditions' => array('Comment.status' => '1'),
            //'order' => 'Comment.created DESC',
            //'limit' => '5',
            'dependent' => true
        )
    );
	public $belongsTo = array(
        'User' => array(
            'className' => 'Users.User',
            'foreignKey' => 'user_id'
        )
    );
    public function getIdeaTypes(){
    return array('Agriculture' => __d('accelerator','Agriculture'),
           'CommunicationsAndMedia' => __d('accelerator', 'Communications and Media'),
           'EducationAndTraining' => __d('accelerator', 'Education and Training'),
           'Energy' => __d('accelerator', 'Energy'),
           'Environment' => __d('accelerator', 'Environment'),
           'FashionAndLifestyle' => __d('accelerator', 'Fashion and Lifestyle'),
           'Health' => __d('accelerator', 'Health'),
           'Tourism' => __d('accelerator', 'Tourism'),
           'MobilityAndTransport' => __d('accelerator', 'Mobility and Transport'),
           'HousingAndConstruction' => __d('accelerator', 'Housing and Construction'),
           'FinancialServices' => __d('accelerator', 'Financial Services'),
           'Technology' => __d('accelerator', 'Technology'),
           'Gastronomy' => __d('accelerator', 'Gastronomy'),
           'PersonalCareAndServices' => __d('accelerator', 'Personal Care and Services'),
           'Entertainment' => __d('accelerator', 'Entertainment'),
           'Other' => __d('accelerator', 'Other'));
    }

}
