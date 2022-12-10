# Swagger\Client\OrderorderGroupApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**orderOrderGroupDelete**](OrderorderGroupApi.md#orderOrderGroupDelete) | **DELETE** /order/orderGroup/{id} | [Beta] Delete orderGroup by ID.
[**orderOrderGroupGet**](OrderorderGroupApi.md#orderOrderGroupGet) | **GET** /order/orderGroup/{id} | [Beta] Get orderGroup by ID. A orderGroup is a way to group orderLines, and add comments and subtotals
[**orderOrderGroupPost**](OrderorderGroupApi.md#orderOrderGroupPost) | **POST** /order/orderGroup | [Beta] Post orderGroup.
[**orderOrderGroupPut**](OrderorderGroupApi.md#orderOrderGroupPut) | **PUT** /order/orderGroup | [Beta] Put orderGroup.
[**orderOrderGroupSearch**](OrderorderGroupApi.md#orderOrderGroupSearch) | **GET** /order/orderGroup | [BETA] Find orderGroups corresponding with sent data.


# **orderOrderGroupDelete**
> orderOrderGroupDelete($id)

[Beta] Delete orderGroup by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\OrderorderGroupApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID

try {
    $apiInstance->orderOrderGroupDelete($id);
} catch (Exception $e) {
    echo 'Exception when calling OrderorderGroupApi->orderOrderGroupDelete: ', $e->getMessage(), PHP_EOL;
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

# **orderOrderGroupGet**
> \Swagger\Client\Model\ResponseWrapperOrderGroup orderOrderGroupGet($id, $fields)

[Beta] Get orderGroup by ID. A orderGroup is a way to group orderLines, and add comments and subtotals



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\OrderorderGroupApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->orderOrderGroupGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OrderorderGroupApi->orderOrderGroupGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperOrderGroup**](../Model/ResponseWrapperOrderGroup.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **orderOrderGroupPost**
> \Swagger\Client\Model\ResponseWrapperOrderGroup orderOrderGroupPost($body, $order_line_ids)

[Beta] Post orderGroup.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\OrderorderGroupApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\OrderGroup(); // \Swagger\Client\Model\OrderGroup | JSON representing the new object to be created. Should not have ID and version set.
$order_line_ids = "order_line_ids_example"; // string | List of IDs

try {
    $result = $apiInstance->orderOrderGroupPost($body, $order_line_ids);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OrderorderGroupApi->orderOrderGroupPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\OrderGroup**](../Model/OrderGroup.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]
 **order_line_ids** | **string**| List of IDs | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperOrderGroup**](../Model/ResponseWrapperOrderGroup.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **orderOrderGroupPut**
> \Swagger\Client\Model\ResponseWrapperOrderGroup orderOrderGroupPut($body, $order_line_ids, $remove_existing_order_lines)

[Beta] Put orderGroup.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\OrderorderGroupApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\OrderGroup(); // \Swagger\Client\Model\OrderGroup | JSON representing the new object to be created. Should not have ID and version set.
$order_line_ids = "order_line_ids_example"; // string | List of IDs
$remove_existing_order_lines = false; // bool | Should existing orderLines be removed from this orderGroup

try {
    $result = $apiInstance->orderOrderGroupPut($body, $order_line_ids, $remove_existing_order_lines);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OrderorderGroupApi->orderOrderGroupPut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\OrderGroup**](../Model/OrderGroup.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]
 **order_line_ids** | **string**| List of IDs | [optional]
 **remove_existing_order_lines** | **bool**| Should existing orderLines be removed from this orderGroup | [optional] [default to false]

### Return type

[**\Swagger\Client\Model\ResponseWrapperOrderGroup**](../Model/ResponseWrapperOrderGroup.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **orderOrderGroupSearch**
> \Swagger\Client\Model\ListResponseOrderGroup orderOrderGroupSearch($ids, $order_ids, $from, $count, $sorting, $fields)

[BETA] Find orderGroups corresponding with sent data.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\OrderorderGroupApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ids = "ids_example"; // string | List of IDs
$order_ids = "order_ids_example"; // string | List of IDs
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->orderOrderGroupSearch($ids, $order_ids, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OrderorderGroupApi->orderOrderGroupSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **ids** | **string**| List of IDs | [optional]
 **order_ids** | **string**| List of IDs | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseOrderGroup**](../Model/ListResponseOrderGroup.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

