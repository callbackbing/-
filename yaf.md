yaf开发日志

如何在nginx下配置路由为http://www.domain.com/module/controller/action

nginx配置如下
server {
	listen 80;
	root /xxx/yafProject/public;
	index index.php;
	server_name www.domain.com;

	location / {
		include snippets/fastcgi-php.conf;
    	fastcgi_param  SCRIPT_FILENAME $document_root$fastcgi_script_name;
		fastcgi_pass 127.0.0.1:9000;	
	}

	if (!-e $request_filename){
		rewrite ^/(.*)  /index.php/$1 last;
	}

	location ~ /\.ht {
		deny all;
	}
}

config/application.ini文件中修改
application.baseUri = '/'
application.dispatcher.defaultModule=Index
application.dispatcher.defaultController=Index
application.dispatcher.defaultAction=index
application.modules = Index,Foo

项目目录结构
application
|--modules
    |--Foo
        |--controllers
            |--Foo.php

Foo.php文件中
<?php
use Yaf\Controller_Abstract;

class FooController extends Controller_Abstract
{
	public function barAction()
	{
        echo 'Foo/bar';
		exit;
	}
}

访问链接：http://www.domain.com/foo/foo/bar