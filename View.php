<?
/**
 * Class View
 * テンプレートで利用したりする。
 */
class View {
//エレメントを読み込み
    public static function elements($e) {
        include Config::get('DOCUMENT_ROOT').'/app/View/Elements/'.$e.'.php';
    }

//metaタグを出力。defaultが入っていなければ値が空の時は非表示
    public static function meta($property, $name, $defaultContent = false) {
        if(Config::get($name) || $defaultContent) {
            $meta = '    <meta '.$property.'="'.$name.'" content="'.(Config::get($name) ? Config::get($name) : $defaultContent).'">'."\n";
        } else {
            $meta = '';
        }
        return $meta;
    }

}