# Swagger\Client\PurchaseOrderorderlineApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**purchaseOrderOrderlineDelete**](PurchaseOrderorderlineApi.md#purchaseOrderOrderlineDelete) | **DELETE** /purchaseOrder/orderline/{id} | [BETA] Delete purchase order line.
[**purchaseOrderOrderlineGet**](PurchaseOrderorderlineApi.md#purchaseOrderOrderlineGet) | **GET** /purchaseOrder/orderline/{id} | [BETA] Find purchase order line by ID.
[**purchaseOrderOrderlineListDeleteList**](PurchaseOrderorderlineApi.md#purchaseOrderOrderlineListDeleteList) | **DELETE** /purchaseOrder/orderline/list | [BETA] Delete purchase order lines by ID.
[**purchaseOrderOrderlineListPostList**](PurchaseOrderorderlineApi.md#purchaseOrderOrderlineListPostList) | **POST** /purchaseOrder/orderline/list | Create list of new purchase order lines.
[**purchaseOrderOrderlineListPutList**](PurchaseOrderorderlineApi.md#purchaseOrderOrderlineListPutList) | **PUT** /purchaseOrder/orderline/list | [BETA] Update a list of purchase order lines.
[**purchaseOrderOrderlinePost**](PurchaseOrderorderlineApi.md#purchaseOrderOrderlinePost) | **POST** /purchaseOrder/orderline | [BETA] Creates purchase order line.
[**purchaseOrderOrderlinePut**](PurchaseOrderorderlineApi.md#purchaseOrderOrderlinePut) | **PUT** /purchaseOrder/orderline/{id} | [BETA] Updates purchase order line


# **purchaseOrderOrderlineDelete**
> purchaseOrderOrderlineDelete($id)

[BETA] Delete purchase order line.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\PurchaseOrderorderlineApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID

try {
    $apiInstance->purchaseOrderOrderlineDelete($id);
} catch (Exception $e) {
    echo 'Exception when calling PurchaseOrderorderlineApi->purchaseOrderOrderlineDelete: ', $e->getMessage(), PHP_EOL;
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

# **purchaseOrderOrderlineGet**
> \Swagger\Client\Model\ResponseWrapperPurchaseOrderline purchaseOrderOrderlineGet($id, $fields)

[BETA] Find purchase order line by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\PurchaseOrderorderlineApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->purchaseOrderOrderlineGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PurchaseOrderorderlineApi->purchaseOrderOrderlineGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperPurchaseOrderline**](../Model/ResponseWrapperPurchaseOrderline.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **purchaseOrderOrderlineListDeleteList**
> purchaseOrderOrderlineListDeleteList($body)

[BETA] Delete purchase order lines by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\PurchaseOrderorderlineApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\PurchaseOrderline()); // \Swagger\Client\Model\PurchaseOrderline[] | JSON representing objects to delete. Should have ID and version set.

try {
    $apiInstance->purchaseOrderOrderlineListDeleteList($body);
} catch (Exception $e) {
    echo 'Exception when calling PurchaseOrderorderlineApi->purchaseOrderOrderlineListDeleteList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\PurchaseOrderline[]**](../Model/PurchaseOrderline.md)| JSON representing objects to delete. Should have ID and version set. | [optional]

### Return type

void (empty response body)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **purchaseOrderOrderlineListPostList**
> \Swagger\Client\Model\ListResponsePurchaseOrderline purchaseOrderOrderlineListPostList($body)

Create list of new purchase order lines.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\PurchaseOrderorderlineApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\PurchaseOrderline()); // \Swagger\Client\Model\PurchaseOrderline[] | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->purchaseOrderOrderlineListPostList($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PurchaseOrderorderlineApi->purchaseOrderOrderlineListPostList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\PurchaseOrderline[]**](../Model/PurchaseOrderline.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ListResponsePurchaseOrderline**](../Model/ListResponsePurchaseOrderline.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **purchaseOrderOrderlineListPutList**
> \Swagger\Client\Model\ListResponsePurchaseOrderline purchaseOrderOrderlineListPutList($body)

[BETA] Update a list of purchase order lines.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\PurchaseOrderorderlineApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\PurchaseOrderline()); // \Swagger\Client\Model\PurchaseOrderline[] | JSON representing updates to objects. Should have ID and version set.

try {
    $result = $apiInstance->purchaseOrderOrderlineListPutList($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PurchaseOrderorderlineApi->purchaseOrderOrderlineListPutList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\PurchaseOrderline[]**](../Model/PurchaseOrderline.md)| JSON representing updates to objects. Should have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ListResponsePurchaseOrderline**](../Model/ListResponsePurchaseOrderline.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **purchaseOrderOrderlinePost**
> \Swagger\Client\Model\ResponseWrapperPurchaseOrderline purchaseOrderOrderlinePost($body)

[BETA] Creates purchase order line.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\PurchaseOrderorderlineApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\PurchaseOrderline(); // \Swagger\Client\Model\PurchaseOrderline | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->purchaseOrderOrderlinePost($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PurchaseOrderorderlineApi->purchaseOrderOrderlinePost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\PurchaseOrderline**](../Model/PurchaseOrderline.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperPurchaseOrderline**](../Model/ResponseWrapperPurchaseOrderline.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **purchaseOrderOrderlinePut**
> \Swagger\Client\Model\ResponseWrapperPurchaseOrderline purchaseOrderOrderlinePut($id, $body)

[BETA] Updates purchase order line



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\PurchaseOrderorderlineApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$body = new \Swagger\Client\Model\PurchaseOrderline(); // \Swagger\Client\Model\PurchaseOrderline | Partial object describing what should be updated

try {
    $result = $apiInstance->purchaseOrderOrderlinePut($id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PurchaseOrderorderlineApi->purchaseOrderOrderlinePut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **body** | [**\Swagger\Client\Model\PurchaseOrderline**](../Model/PurchaseOrderline.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperPurchaseOrderline**](../Model/ResponseWrapperPurchaseOrderline.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

