# Array Funcitons

## array_merge

```php
<?php

$array1 = array("color" => "red", 2, 4);
$array2 = array("a", "b", "color" => "green", "shape" => "trapezoid", 4);
$array3 = array(0, 1, 2, 3, 4);
$array4 = array(5, 6, 7, 8, 9);

// $ret1 = array_merge($array1, $array2);
// print_r($ret1);

// $ret11 = $array1 + $array2;
// print_r($ret11);
// $ret2 = array_merge($array1, array("color" => null));
// print_r($ret2);
// $ret3 = array_merge($array3, $array4);

// print_r($ret3);

// $ret4 = array_merge($array3, $array4);
// print_r($ret4);

// $ret5 = $array3 + $array4;
// print_r($ret5);

$ret6 = array() + $array3  ;
print_r($ret6);

// $ret7 = array_merge($array3, array());
// print_r($ret7);
```



array_merge当key值为整形时，array不合并，显示如下

```
//ret4的结果
Array
(
    [0] => 0
    [1] => 1
    [2] => 2
    [3] => 3
    [4] => 4
    [5] => 5
    [6] => 6
    [7] => 7
    [8] => 8
    [9] => 9
)
```

当为 `+` 号时，ret5显示结果（取前值，后值被覆盖）

```
(
    [0] => 0
    [1] => 1
    [2] => 2
    [3] => 3
    [4] => 4
)
```

array_merge当下标为数字时，不合并下标相同的值，

`+`:关联数组和索引数组都是前值覆盖后值，即取前值

`array_merge`:索引数组不合并，关联数组后值覆盖前值，即取后值



`array_merge`或者`+`合并数组时，不能与null进行合并，因为会warning

```
PHP Warning:  array_merge(): Expected parameter 2 to be an array, null given in /Users/onefiter/code/Notes/PHP/codes/array_merge.php on line 31
```

