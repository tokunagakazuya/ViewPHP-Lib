<?
/**
 * Class Config
 * getとかsetとかをやるコアな関数
 */
class Config {
    private static $instance = null;
    private $data;

    private function __construct() {
        $data = array();
    }

    private static function getInstance() {
        if (!isset(self::$instance)) {
            $instance = new Config();
            self::$instance = array($instance);
        }
        return self::$instance[0];
    }

    public static function set($key, $value) {
        $instance = self::getInstance();
        $instance->data[$key] = $value;
    }

    public static function get($key) {
        $instance = self::getInstance();
        if (isset($instance->data[$key])) {
            return $instance->data[$key];
        } else {
            return null;
        }
    }
}