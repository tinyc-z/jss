jss
===

A js booster on php server to Compressed javascript and merged into one js file, reduce the number of HTTP requests to speed up the web loading speed

一个用于PHP服务器压缩合并多个js文件的工具，能够在第一次请求时自动合并所需js文件并缓存起来，大大减少了http请求时间和传输流量。也免去了每次发版手动压缩的烦恼

新增加了[SAE](http://sae.sina.com.cn/)支持

#Usage
-------
>Before if you want 2 inlcude hello.js and 2.js to your web page,u may inclue js file like this
    
    <script src="./hello.js"></script>    
    <script src="./2.js"></script>
    
>Now you can do just like this!

    <script src="./jss.php?files=hello.js,2.js"></script>
    
wow so easy


[@粥米鱼](http://weibo.com/bcker)
