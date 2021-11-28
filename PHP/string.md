# String
## `strlen` 和 `mb_strlen`
> mb_strlen

PHPStorm中的属性展示
`https://blog.csdn.net/qq_42444778/article/details/109336051`
> `#[Pure]` 
```php
/**
 * Get string length
 * @link https://php.net/manual/en/function.mb-strlen.php
 * @param string $string <p>
 * The string being checked for length.
 * </p>
 * @param string|null $encoding [optional]
 * @return int|false the number of characters in
 * string str having character encoding
 * encoding. A multi-byte character is
 * counted as 1.
 */
#[Pure]
#[LanguageLevelTypeAware(['8.0' => 'int'], default: 'int|false')]
function mb_strlen(string $string, #[LanguageLevelTypeAware(['8.0' => 'string|null'], default: 'string')] $encoding) {}
```
