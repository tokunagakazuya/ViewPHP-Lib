<?php
//定数等の基本設定。
//http://odiak.net/blog/post/527
require_once dirname(__FILE__) . '/Config.php';
require_once dirname(__FILE__) . '/../Config/config.php';
Config::set('DOCUMENT_ROOT', substr( $_SERVER["SCRIPT_FILENAME"], 0, - strlen( $_SERVER["SCRIPT_NAME"] ) ));
Config::set('PAGE_URL', (empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);

//各種クラス
require_once dirname(__FILE__) . '/View.php';
require_once dirname(__FILE__) . '/Helper.php';

class Bootstrap {
    public function __construct() {
        //TODO これでええんか。
        //http://koseki.hatenablog.com/entry/20120210/phpuri
        $arrs = parse_url(Config::get('PAGE_URL'));
        $urlPath = Config::get('DOCUMENT_ROOT') . '/app/View' . $arrs['path'] . (substr($arrs['path'], -1) === '/' ? 'index' : '') . '.php';

        if(file_exists($urlPath)) {
            include_once $urlPath;
        } else {
            header("HTTP/1.0 404 Not Found");
            include_once Config::get('DOCUMENT_ROOT') . '/app/View/Errors/error404.php';
        }
    }
}
new Bootstrap();