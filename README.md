> 一个php技术栈后端猿的知识总结

## 前言
迈出第一步就是成功的一半，万事具备，总会欠东风。等是不可能，没必要的！

## PHP基础学习

[字符串](./PHP/string.md)

## PHP面试
[基本概念](./PHP/interview/concept.md)

CGI、FastCGI、PHP-CGI、PHP-FPM的关系
CGI：Common Gateway Interface（通用网管协议）
FastCGI：基于CGI的增强版本的协议
PHP-CGI：PHP实现的CGI进程管理器
PHP-FPM：PHP实现的FastCGI Process Manager(FastCGI进程管理器），用于替换PHP FastCGI的大部分附加功能，适用于高负载网站。

## PHP配置相关
> 查找`php.ini`文件,执行`php -ini`或`php -i | grep "Loaded Configuration File"`命令，推荐后者


xdebug报错,函数嵌套层级>50
```shell
PHP Fatal error:  Uncaught Error: Maximum function nesting level of '50' reached, aborting!
```

需要注释 `;xdebug.max_nesting_level=50`
