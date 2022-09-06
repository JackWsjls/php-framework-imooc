# htaccess

```xml
<IfModule mod_rewrite.c>
  <!-- 项目根下的Apache配置文件 单入口设置 -->
  RewriteEngine on
  <!-- 从根目录开始,这个我不需要 -->
  RewriteBase /
  <!-- 对文件有效 -->
  RewriteCond %{REQUEST_FILENAME} !-f
  RewriteCond %{REQUEST_FILENAME} !-d
  <!-- 重写路由规则，不论以什么开头以什么结尾，都请求index.php   ^(.*)$==$1 -->
  RewriteRule ^(.*)$ index.php/$1 [QSA,PT,L]
</IfModule>
```

PHP .htaccess文件详细介绍  <http://www.viiis.cn/news/show_34387.html>  
