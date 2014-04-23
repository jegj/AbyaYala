<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */


class AppController extends Controller {
	public $components = array('DebugKit.Toolbar');
	public $theme = 'Cakestrap';
  var $uses = array('News','Content');

  public function checkLogin()
  {
    return $this->Session->check('Admin');
  }

	public function canAccess(){
		if(!$this->Session->check('Admin')){
      $this->Session->setFlash('<strong>Ups!</strong> Debe Autenticarse como Administrador para acceder a esta Página', 'default', array(), 'error');
    	return $this->redirect(
      	array('action'=>'login',
      		'controller' => 'admins'
      	)
    	);
    }else
    	return true;
  }

  public function onlyGlobalAdmin()
  {
    $adminType = $this->Session->read('Admin')['Admin']['type'];

    if(!$adminType)
      return true;
    else{
       $this->Session->setFlash('<strong>Ups!</strong> Debe ser Administrador Global para acceder a esta Sección', 'default', array(), 'error');
      return $this->redirect(
        array('action'=>'index',
          'controller' => 'admins'
        )
      );
    }
  }

  public function randomContent($newid = null)
  {
    $newsOptions = array(
      'conditions' => array('News.new_id <>' => $newid),
      'order' => 'rand()',
      'limit' => 2
    );

    $imagesOptions = array(
      'conditions' => array('Content.type =' => 'imagen'),
      'order' => 'rand()',
      'limit' => 5
    );

    $news =  $this->News->find('all', $newsOptions);
    $images = $this->Content->find('all', $imagesOptions);

    return compact('news', 'images');
  }
}
