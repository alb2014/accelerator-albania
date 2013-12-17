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


}
