# RPC的基本概念
1.RPC (Remote Procedure Call)远程过程调用，简单的理解是一个节点请求另一个节点提供的服

2.对应RPC的是本地过程调用，函数调用时最常见的本地过程调用。

3.将本地过程调变成远程过程调用会面临各种问题。

## 远程过程调用面临的问题
1.原本的本地函数放到另一个服务器上去运行。但是引入了很多新的问题。

2.Call的id映射

3.序列化和反序列化

4.网络传输

## RPC开发的四大要素
客户端、客户端存根、服务端、服务端存根

