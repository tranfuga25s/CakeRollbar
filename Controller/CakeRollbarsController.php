<?php
App::uses('CakeRollbarAppController', 'CakeRollbar.Controller');

/**
 * CakePHP CakeRollbarController
 * @property HttpSocket $http
 * @author Esteban Zeller <esteban.zeller@gmail.com>
 */
class CakeRollbarsController extends CakeRollbarAppController {
    
    public function isAuthorized($user) {
        return true;
    }
    
    /**
     * 
     * @return type
     */
    public function administracion_index() {
        $this->set('config', Configure::read('Rollbar'));
    }
    
    /**
     * 
     */
    public function administracion_save() {
        if ($this->request->is('post')) {
            
        }
    }
    
    /**
     * 
     */
    public function administracion_setupDeploy() {
        if ($this->request->is('post')) {
            
            $data = array(
                'access_token' => Configure::read('Rollbar.access_token'),
                'environment' => Configure::read('Rollbar.environment'),
                'revision' => Configure::read('version')
            );
            if (array_key_exists('local_username', $this->request->data)) {
                $data['local_username'] = $this->request->data['local_username'];
            }
            if (array_key_exists('rollbar_username', $this->request->data)) {
                $data['rollbar_username'] = $this->request->data['rollbar_username'];
            }
            if (array_key_exists('comment', $this->request->data)) {
                $data['comment'] = $this->request->data['comment'];
            }
            App::uses('HttpSocket', 'Network/Http');
            $this->http = new HttpSocket();
            $response = $this->http->post(
                "https://api.rollbar.com/api/1/deploy/",
                $data
            );
            if ($response !== false) {
                $this->Session->setFlash(__("Deploy sent correctly"), 'default', array('class' => 'alert alert-success'));
            } else {
                $this->Session->setFlash(__("There was an error when triying to deploy. See errorlog."), 'default', array('class' => 'alert alert-success'));
            }
        }
    }

}
