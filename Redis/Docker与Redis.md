# 基于Docker学习Redis
## 1 Docker安装Redis
> 安装docker之后，使用 `docker pull redis:latest`命令来拉取最新的redis,然后`docker run -itd --name myRedis -p 6379:6379 redis:latest` 

> 通过`docker logs myRedis 查看启动日志`

```shell
docker stop myRedis
docker ps -a
docker start myRedis
docker restart myRedis
# 进入myRedis
docker exec -it myRedis /bin/bash
```
## 2 Redis的基本数据类型练习
## 3 Redis基本命令练习
## 4 Redis服务端和客户端操作
## 5 Redis数据库实战
## 6 Redis数据持久化
## 7 搭建Redis集群
## 8 Redis应用场景与案例实现