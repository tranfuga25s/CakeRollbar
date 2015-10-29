<?php
App::uses('ErrorHandler', 'Lib');

/**
 * Class to send all errors to the Rollbar handling
 * It's just a wrapper arround the Error Handler of CakePHP
 * @author Esteban Zeller <esteban.zeller@gmail.com>
 */
class RollbarErrorHandler extends ErrorHandler {
    
    /**
     * 
     * 
     * @param int $code Code of error
     * @param string $description Error description
     * @param string $file File on which error occurred
     * @param int $line Line that triggered the error
     * @param array $context Context
     * @return bool true if error was handled
     */
    public static function handleError($code, $description, $file = null, $line = null, $context = null) {
        Rollbar::report_message( $description, 'error', compact( 'code', 'file', 'line', 'context'));
        return parent::handleError($code, $description, $file, $line, $context);
    }

    /**
     * 
     * @param Exception $exception
     * @return type
     */
    public static function handleException(Exception $exception) {
        Rollbar::report_exception($exception);
        return parent::handleException($exception);
    }
    
    /**
     * 
     * @param int $code Code of error
     * @param string $description Error description
     * @param string $file File on which error occurred
     * @param int $line Line that triggered the error
     * @return bool
     */
    public static function handleFatalError($code, $description, $file, $line) {
        Rollbar::report_php_error($code, $description, $file, $line);
        return parent::handleFatalError($code, $description, $file, $line);
    }
    
}