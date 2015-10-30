CakeRollbar
===========

Cake plugin to integrate with Rollbar service. []

Instalation
-----------

Include the plugin inside the  your project.

Load the plugin from the bootstrap.php file.
```php
CakePlugin::load('CakeRollbar', array('bootstrap' => true));
```

Configuration
-------------

Modify the file Config/rollbar.ini with all the possible values for the configuration neede. The bootstrap file  will load all the elemnets inside the configuration for the initialization asi is described in the documentation.
Only is neede to setup the token key and review the function:
```php
rollbar_get_current_user() 
```
to handle th ser session to have the elment sneede to identify the current user.
