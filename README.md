# laravel-pro
做自己的网站--------从现在开始
composer镜像 composer config -g repo.packagist composer https://packagist.phpcomposer.com  
composer install  
nodejs 版本v4.6.1(如果自行安装npm包,版本不要超过v6)  
npm config set proxy false  
npm cache clean  

npm install -ddd  --registry=http://registry.npm.taobao.org  
or 如果用的公用依赖包 npm link gulp  
npm install gulp -g  -ddd  --registry=http://registry.npm.taobao.org (windows用户需要多执行一步)  
php artisan key:generate  
gulp  
gulp watch  
mkdir -p  ./storage/framework/cache  ./storage/framework/sessions ./storage/framework/views  
自动加载 composer dump-autoload -o 
