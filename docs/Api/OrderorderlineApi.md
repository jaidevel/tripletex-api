# Swagger\Client\OrderorderlineApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**orderOrderlineDelete**](OrderorderlineApi.md#orderOrderlineDelete) | **DELETE** /order/orderline/{id} | [BETA] Delete order line by ID.
[**orderOrderlineGet**](OrderorderlineApi.md#orderOrderlineGet) | **GET** /order/orderline/{id} | Get order line by ID.
[**orderOrderlineListPostList**](OrderorderlineApi.md#orderOrderlineListPostList) | **POST** /order/orderline/list | Create multiple order lines.
[**orderOrderlinePost**](OrderorderlineApi.md#orderOrderlinePost) | **POST** /order/orderline | Create order line. When creating several order lines, use /list for better performance.
[**orderOrderlinePut**](OrderorderlineApi.md#orderOrderlinePut) | **PUT** /order/orderline/{id} | [BETA] Put order line


# **orderOrderlineDelete**
> orderOrderlineDelete($id)

[BETA] Delete order line by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\OrderorderlineApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID

try {
    $apiInstance->orderOrderlineDelete($id);
} catch (Exception $e) {
    echo 'Exception when calling OrderorderlineApi->orderOrderlineDelete: ', $e->getMessage(), PHP_EOL;
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

# **orderOrderlineGet**
> \Swagger\Client\Model\ResponseWrapperOrderLine orderOrderlineGet($id, $fields)

Get order line by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\OrderorderlineApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->orderOrderlineGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OrderorderlineApi->orderOrderlineGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperOrderLine**](../Model/ResponseWrapperOrderLine.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **orderOrderlineListPostList**
> \Swagger\Client\Model\ListResponseOrderLine orderOrderlineListPostList($body)

Create multiple order lines.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\OrderorderlineApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\OrderLine()); // \Swagger\Client\Model\OrderLine[] | JSON representing a list of new objects to be created. Should not have ID and version set.

try {
    $result = $apiInstance->orderOrderlineListPostList($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OrderorderlineApi->orderOrderlineListPostList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\OrderLine[]**](../Model/OrderLine.md)| JSON representing a list of new objects to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseOrderLine**](../Model/ListResponseOrderLine.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **orderOrderlinePost**
> \Swagger\Client\Model\ResponseWrapperOrderLine orderOrderlinePost($body)

Create order line. When creating several order lines, use /list for better performance.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\OrderorderlineApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\OrderLine(); // \Swagger\Client\Model\OrderLine | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->orderOrderlinePost($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OrderorderlineApi->orderOrderlinePost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\OrderLine**](../Model/OrderLine.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperOrderLine**](../Model/ResponseWrapperOrderLine.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **orderOrderlinePut**
> \Swagger\Client\Model\ResponseWrapperOrderLine orderOrderlinePut($id, $body)

[BETA] Put order line



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\OrderorderlineApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$body = new \Swagger\Client\Model\OrderLine(); // \Swagger\Client\Model\OrderLine | Partial object describing what should be updated

try {
    $result = $apiInstance->orderOrderlinePut($id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OrderorderlineApi->orderOrderlinePut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **body** | [**\Swagger\Client\Model\OrderLine**](../Model/OrderLine.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperOrderLine**](../Model/ResponseWrapperOrderLine.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

