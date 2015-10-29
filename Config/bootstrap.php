<?php
// Include the vendor files
App::import(
    'Vendor',
    'CakeRollbar.Rollbar',
    array('file' => 'rollbar.php')
);
App::uses('Rollbar', 'CakeRollbar.Vendor');

/**
 * Configuration array loaded from ini config
 */
App::uses( 'IniReader', 'Configure' );
Configure::config(
    'CakeRollbar', 
    new IniReader(CakePlugin::path('CakeRollbar').DS.'Config'.DS.'rollbar')
);
Configure::load('', 'CakeRollbar');
$config = Configure::read('Rollbar');

/**
 * Configures the user detection for the system
 * @return type
 */
function rollbar_get_current_user() {
    App::uses('AuthComponent', 'Controller/Component');
    if (!is_null(AuthComponent::user())) {
        $user = AuthComponent::user();
        return array(
            'id' => $user['id'], // required - value is a string
            'username' => $user['username'], // optional - value is a string
            'email' => $user['email'] // optional - value is a string
        );
    }
    return null;
}
$config['person_fn'] = 'rollbar_get_current_user';

$config['root'] = WWW_ROOT;

Rollbar::init($config);

App::uses('RollbarErrorHandler', 'CakeRollbar.Lib');

Configure::write('Error', array(
        'handler' => 'RollbarErrorHandler::handleError',
        'level' => E_ALL & ~E_DEPRECATED,
        'trace' => true
));

Configure::write('Exception', array(
        'handler' => 'RollbarErrorHandler::handleException',
        'renderer' => 'ExceptionRenderer',
        'log' => true
));