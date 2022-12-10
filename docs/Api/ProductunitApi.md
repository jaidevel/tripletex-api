# Swagger\Client\ProductunitApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**productUnitDelete**](ProductunitApi.md#productUnitDelete) | **DELETE** /product/unit/{id} | [BETA] Delete product unit by ID.
[**productUnitGet**](ProductunitApi.md#productUnitGet) | **GET** /product/unit/{id} | Get product unit by ID.
[**productUnitListPostList**](ProductunitApi.md#productUnitListPostList) | **POST** /product/unit/list | [BETA] Create multiple product units.
[**productUnitListPutList**](ProductunitApi.md#productUnitListPutList) | **PUT** /product/unit/list | [BETA] Update list of product units.
[**productUnitPost**](ProductunitApi.md#productUnitPost) | **POST** /product/unit | [BETA] Create new product unit.
[**productUnitPut**](ProductunitApi.md#productUnitPut) | **PUT** /product/unit/{id} | [BETA] Update product unit.
[**productUnitQueryQuery**](ProductunitApi.md#productUnitQueryQuery) | **GET** /product/unit/query | [BETA] Wildcard search.
[**productUnitSearch**](ProductunitApi.md#productUnitSearch) | **GET** /product/unit | Find product units corresponding with sent data.


# **productUnitDelete**
> productUnitDelete($id)

[BETA] Delete product unit by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProductunitApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID

try {
    $apiInstance->productUnitDelete($id);
} catch (Exception $e) {
    echo 'Exception when calling ProductunitApi->productUnitDelete: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |

### Return type

void (empty response body)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **productUnitGet**
> \Swagger\Client\Model\ResponseWrapperProductUnit productUnitGet($id, $fields)

Get product unit by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProductunitApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->productUnitGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductunitApi->productUnitGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperProductUnit**](../Model/ResponseWrapperProductUnit.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **productUnitListPostList**
> \Swagger\Client\Model\ListResponseProductUnit productUnitListPostList($body)

[BETA] Create multiple product units.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProductunitApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\ProductUnit()); // \Swagger\Client\Model\ProductUnit[] | JSON representing a list of new objects to be created. Should not have ID and version set.

try {
    $result = $apiInstance->productUnitListPostList($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductunitApi->productUnitListPostList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\ProductUnit[]**](../Model/ProductUnit.md)| JSON representing a list of new objects to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseProductUnit**](../Model/ListResponseProductUnit.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **productUnitListPutList**
> \Swagger\Client\Model\ListResponseProductUnit productUnitListPutList($body)

[BETA] Update list of product units.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProductunitApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\ProductUnit()); // \Swagger\Client\Model\ProductUnit[] | JSON representing updates to objects. Should have ID and version set.

try {
    $result = $apiInstance->productUnitListPutList($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductunitApi->productUnitListPutList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\ProductUnit[]**](../Model/ProductUnit.md)| JSON representing updates to objects. Should have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseProductUnit**](../Model/ListResponseProductUnit.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **productUnitPost**
> \Swagger\Client\Model\ResponseWrapperProductUnit productUnitPost($body)

[BETA] Create new product unit.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProductunitApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\ProductUnit(); // \Swagger\Client\Model\ProductUnit | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->productUnitPost($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductunitApi->productUnitPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\ProductUnit**](../Model/ProductUnit.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperProductUnit**](../Model/ResponseWrapperProductUnit.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **productUnitPut**
> \Swagger\Client\Model\ResponseWrapperProductUnit productUnitPut($id, $body)

[BETA] Update product unit.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProductunitApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$body = new \Swagger\Client\Model\ProductUnit(); // \Swagger\Client\Model\ProductUnit | Partial object describing what should be updated

try {
    $result = $apiInstance->productUnitPut($id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductunitApi->productUnitPut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **body** | [**\Swagger\Client\Model\ProductUnit**](../Model/ProductUnit.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperProductUnit**](../Model/ResponseWrapperProductUnit.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **productUnitQueryQuery**
> \Swagger\Client\Model\ListResponseProductUnit productUnitQueryQuery($query, $count, $fields, $from, $sorting)

[BETA] Wildcard search.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProductunitApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$query = "query_example"; // string | Containing
$count = 25; // int | Number of elements to return
$fields = "id, name"; // string | Fields filter pattern
$from = 0; // int | From index
$sorting = "sorting_example"; // string | Sorting pattern

try {
    $result = $apiInstance->productUnitQueryQuery($query, $count, $fields, $from, $sorting);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductunitApi->productUnitQueryQuery: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **query** | **string**| Containing | [optional]
 **count** | **int**| Number of elements to return | [optional] [default to 25]
 **fields** | **string**| Fields filter pattern | [optional] [default to id, name]
 **from** | **int**| From index | [optional] [default to 0]
 **sorting** | **string**| Sorting pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseProductUnit**](../Model/ListResponseProductUnit.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **productUnitSearch**
> \Swagger\Client\Model\ListResponseProductUnit productUnitSearch($id, $name, $name_short, $common_code, $from, $count, $sorting, $fields)

Find product units corresponding with sent data.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProductunitApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = "id_example"; // string | List of IDs
$name = "name_example"; // string | Names
$name_short = "name_short_example"; // string | Short names
$common_code = "common_code_example"; // string | Common codes
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->productUnitSearch($id, $name, $name_short, $common_code, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductunitApi->productUnitSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| List of IDs | [optional]
 **name** | **string**| Names | [optional]
 **name_short** | **string**| Short names | [optional]
 **common_code** | **string**| Common codes | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseProductUnit**](../Model/ListResponseProductUnit.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

