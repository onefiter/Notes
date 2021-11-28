# 基于Docker学习Redis
## 1 Docker安装Redis
> 安装docker之后，使用 `docker pull redis:latest`命令来拉取最新的redis,然后`docker run -itd --name myRedis -p 6379:6379 redis:latest`，后续可以根据`docker-compose`的方式进行定制运行环境


> 通过`docker logs myRedis 查看启动日志`

```shell
docker stop myRedis
docker ps -a
docker start myRedis 
# 会挂载容器所有关联文件系统，而restart不会，如果修改配置文件，需要先进行`stop`
docker restart myRedis
# 进入myRedis
docker exec -it myRedis /bin/bash
# 进入myRedis之后
redis-cli 
#然后进行redis命令的操作

```
### set 命令
```
set key value [EX seconds|PX milliseconds|EXAT timestamp|PXAT milliseconds-timestamp|KEEPTTL] [NX|XX] [GET]
```
## 2 Redis的基本数据类型练习
## 3 Redis基本命令练习
## 4 Redis服务端和客户端操作
## 5 Redis数据库实战
## 6 Redis数据持久化
> Redis是基于内存的`NoSQL`数据库，内存掉电数据会丢失，而在一些场景里需要长久地保存数据，所以需要将内存中Redis数据持久化地保存在硬盘里。

Redis持久化的两种方式
1. AOF(Append Only File)：文件追加方式
2. RDB(Redis DataBase)：基于Redis数据库，快照方式
    比较适合数据备份和灾备场景，但RDB无法实现的即时备份，触发RDB方式`通过save和bgsave等命令手动触发`；第二种使Redis服务器会根据`redis.conf`里的配置设置方式定期把内存数据写入快照

### 6.1 AOF 
开启`appendonly yes`后，设置c参数`appendfsync`的一种`always、everysec、no`



以配置文件启动redis

```shell
docker run --name redis-server -v E:\workspace\redis:/redisConfig:rw -p 6379:6379 -itd  redis:latest redis-server /redisConfig/redis.conf
```
通过手动触发 `bgrewirteaof`命令手动触发AOF文件的重写动作，一般情况下会通过`auto-aof-rewrite-percentage和auto-aof-rewrite-min-size`这两个参数来定义触发重写AOF文件的条件

Redis持久化机制就是把内存中的数据存为硬盘文件

写命令-->AOF缓冲区-->AOF日主文件

### 6.2 数据的恢复
1. 停止之前的docker的redis服务器,删除，重新制定配置进行重启
```shell
docker run --name redis-server -v E:\workspace\redis:/redisConfig:rw -p 6379:6379 -itd  redis:latest redis-server /redisConfig/redis.conf
```
若需要修复损坏的AOF文件可以使用`redis-check-aof --fix /path/to/reidsData **.aof`
## 8 Redis应用场景与案例实现