# gRPC与protobuf
> `gRPC`基于`HTTP/2`协议，`HTTP/2`采用<font color='red'>二进制流</font>，流式传输，多路复用，安全性提升

## 1. 配置protobuf

主要优点：
- 1. 高效的数据传输
- 2. 语言无关的领域模型定义

1. 下载

>下载[protobufc](https://github.com/protocolbuffers/protobuf/releases),这里选择的是`protoc-3.19.1-win64.zip`，请根据电脑的配置选择相应的包

2. 配置环境变量 
>win10的环境变量，将环境变量指定到`../bin`下


然后安装[https://github.com/grpc-ecosystem/grpc-gateway](https://github.com/grpc-ecosystem/grpc-gateway),本案例使用的是

```shell
go  get  github.com/grpc-ecosystem/grpc-gateway/v2/protoc-gen-grpc-gateway  github.com/grpc-ecosystem/grpc-gateway/v2/protoc-gen-openapiv2 google.golang.org/protobuf/cmd/protoc-gen-go  google.golang.org/grpc/cmd/protoc-gen-go-grpc
```
编写`proto`文件,在vscode中可以装proto3的插件
```proto3
syntax = "proto3";
package coolcar;
option go_package="coolcar/proto/gen/go;trippb";

message Location {
    double latitude = 1;
    double longitude = 2;
}

enum TripStatus {
    TS_NOT_SPECIFIED = 0;
    NOT_STARTED = 1;
    IN_PROGRESS = 2;
    FINISHED = 3;
    PAID = 4;
}

message Trip {
    string start = 1;
    Location start_pos = 5;
    Location end_pos = 6;
    repeated Location path_locations = 7;
    string end = 2;
    int64 duration_sec = 3;
    int64 fee_cent = 4;
    TripStatus status = 8;
    bool isPromotionTrip = 9;
    bool isFromGuestUser = 10;

}
```
cd 到proto编写的文件的文件夹，执行命令
` protoc -I . --go_out=paths=source_relative:gen/go trip.proto`

简单测试`proto` 

```go
package main

import (
	trippb "coolcar/proto/gen/go"
	"encoding/json"
	"fmt"

	"google.golang.org/protobuf/proto"
)

func main() {

	trip := trippb.Trip{
		Start:       "abc",
		End:         "def",
		DurationSec: 3600,
		FeeCent:     10000,
		StartPos: &trippb.Location{
			Latitude:  30,
			Longitude: 120,
		},
		EndPos: &trippb.Location{
			Latitude:  35,
			Longitude: 115,
		},
		PathLocations: []*trippb.Location{
			{
				Latitude:  31,
				Longitude: 119,
			},
			{
				Latitude:  32,
				Longitude: 118,
			},
		},
		Status: trippb.TripStatus_IN_PROGRESS,
	}
	fmt.Println(&trip)
	b, err := proto.Marshal(&trip)
	if err != nil {
		panic(err)
	}

	fmt.Printf("%X\n", b)

	var trip2 trippb.Trip
	err = proto.Unmarshal(b, &trip2)

	if err != nil {
		panic(err)
	}

	fmt.Println(&trip2)

	b, err = json.Marshal(&trip2)

	if err != nil {
		panic(err)
	}
	fmt.Printf("%s\n", b)
}
```

> 生成`gateway`
```shell
protoc -I . --grpc-gateway_out=paths=source_relative,grpc_api_configuration=trip.yaml:gen/go trip.proto
```

