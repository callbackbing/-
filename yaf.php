/**
* 记录yaf开发中填坑过程
*/

/**
* 如何yaf中引入composer
* 需要在入口文件index.php中引入autoload.php文件例如引入Medoo类库https://medoo.lvtao.net/index.php;
* 入口文件index.php增加(require APP_PATH . '/vendor/autoload.php');
* Bootstrap.php文件中
* + use Medoo\Medoo;
* + $option = [数据库配置];
* + Registry::set('db', new Medoo($option));
* controllers/Index.php文件中使用
* + $db = Registry::get('db');
* + $datas = $db->select('member', 'name');
*/

/**
* 如何yaf中使用library例如引入Tool类
* conf/application
* + application.library = APP_PATH "/library" 
* + applicatin.library.namespace = "Tool"
* library文件夹中新建Tool/Tool.php
* Tool.php
* + namespace Tool;
* Bootstrap.php
* + use Tool\Tool;
* + public function _initTool() {
* +     Loader::import('Tool/Tool.php');
* +     Registry::set('tool', new Tool());
* + }
* controllers/Index.php文件中使用
* + $tool = Registry::get('tool');
* + $tool->dump(array);
*/