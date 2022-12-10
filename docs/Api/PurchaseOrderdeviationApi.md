# Swagger\Client\PurchaseOrderdeviationApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**purchaseOrderDeviationApproveApprove**](PurchaseOrderdeviationApi.md#purchaseOrderDeviationApproveApprove) | **PUT** /purchaseOrder/deviation/{id}/:approve | [BETA] Approve deviations. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
[**purchaseOrderDeviationDelete**](PurchaseOrderdeviationApi.md#purchaseOrderDeviationDelete) | **DELETE** /purchaseOrder/deviation/{id} | [BETA] Delete goods receipt by purchase order ID. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
[**purchaseOrderDeviationDeliverDeliver**](PurchaseOrderdeviationApi.md#purchaseOrderDeviationDeliverDeliver) | **PUT** /purchaseOrder/deviation/{id}/:deliver | [BETA] Send deviations to approval. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
[**purchaseOrderDeviationGet**](PurchaseOrderdeviationApi.md#purchaseOrderDeviationGet) | **GET** /purchaseOrder/deviation/{id} | [BETA] Get deviation by order line ID. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
[**purchaseOrderDeviationListPostList**](PurchaseOrderdeviationApi.md#purchaseOrderDeviationListPostList) | **POST** /purchaseOrder/deviation/list | [BETA] Register multiple deviations. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
[**purchaseOrderDeviationListPutList**](PurchaseOrderdeviationApi.md#purchaseOrderDeviationListPutList) | **PUT** /purchaseOrder/deviation/list | [BETA] Update multiple deviations. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
[**purchaseOrderDeviationPost**](PurchaseOrderdeviationApi.md#purchaseOrderDeviationPost) | **POST** /purchaseOrder/deviation | [BETA] Register deviation on goods receipt. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
[**purchaseOrderDeviationPut**](PurchaseOrderdeviationApi.md#purchaseOrderDeviationPut) | **PUT** /purchaseOrder/deviation/{id} | Update deviation. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
[**purchaseOrderDeviationSearch**](PurchaseOrderdeviationApi.md#purchaseOrderDeviationSearch) | **GET** /purchaseOrder/deviation | [BETA] Find handled deviations for purchase order. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
[**purchaseOrderDeviationUndeliverUndeliver**](PurchaseOrderdeviationApi.md#purchaseOrderDeviationUndeliverUndeliver) | **PUT** /purchaseOrder/deviation/{id}/:undeliver | [BETA] Undeliver the deviations. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;


# **purchaseOrderDeviationApproveApprove**
> \Swagger\Client\Model\ResponseWrapperPurchaseOrder purchaseOrderDeviationApproveApprove($id)

[BETA] Approve deviations. Only available for users that have activated the Logistics Plus Beta-program in 'Our customer account'



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\PurchaseOrderdeviationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Purchase Order ID.

try {
    $result = $apiInstance->purchaseOrderDeviationApproveApprove($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PurchaseOrderdeviationApi->purchaseOrderDeviationApproveApprove: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Purchase Order ID. |

### Return type

[**\Swagger\Client\Model\ResponseWrapperPurchaseOrder**](../Model/ResponseWrapperPurchaseOrder.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **purchaseOrderDeviationDelete**
> purchaseOrderDeviationDelete($id)

[BETA] Delete goods receipt by purchase order ID. Only available for users that have activated the Logistics Plus Beta-program in 'Our customer account'



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\PurchaseOrderdeviationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID

try {
    $apiInstance->purchaseOrderDeviationDelete($id);
} catch (Exception $e) {
    echo 'Exception when calling PurchaseOrderdeviationApi->purchaseOrderDeviationDelete: ', $e->getMessage(), PHP_EOL;
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

# **purchaseOrderDeviationDeliverDeliver**
> \Swagger\Client\Model\ResponseWrapperPurchaseOrder purchaseOrderDeviationDeliverDeliver($id)

[BETA] Send deviations to approval. Only available for users that have activated the Logistics Plus Beta-program in 'Our customer account'



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\PurchaseOrderdeviationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Purchase Order ID.

try {
    $result = $apiInstance->purchaseOrderDeviationDeliverDeliver($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PurchaseOrderdeviationApi->purchaseOrderDeviationDeliverDeliver: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Purchase Order ID. |

### Return type

[**\Swagger\Client\Model\ResponseWrapperPurchaseOrder**](../Model/ResponseWrapperPurchaseOrder.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **purchaseOrderDeviationGet**
> \Swagger\Client\Model\ResponseWrapperDeviation purchaseOrderDeviationGet($id, $fields)

[BETA] Get deviation by order line ID. Only available for users that have activated the Logistics Plus Beta-program in 'Our customer account'



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\PurchaseOrderdeviationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->purchaseOrderDeviationGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PurchaseOrderdeviationApi->purchaseOrderDeviationGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperDeviation**](../Model/ResponseWrapperDeviation.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **purchaseOrderDeviationListPostList**
> \Swagger\Client\Model\ListResponseDeviation purchaseOrderDeviationListPostList($body)

[BETA] Register multiple deviations. Only available for users that have activated the Logistics Plus Beta-program in 'Our customer account'



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\PurchaseOrderdeviationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\Deviation()); // \Swagger\Client\Model\Deviation[] | JSON representing a list of new objects to be created. Should not have ID and version set.

try {
    $result = $apiInstance->purchaseOrderDeviationListPostList($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PurchaseOrderdeviationApi->purchaseOrderDeviationListPostList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\Deviation[]**](../Model/Deviation.md)| JSON representing a list of new objects to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseDeviation**](../Model/ListResponseDeviation.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **purchaseOrderDeviationListPutList**
> \Swagger\Client\Model\ListResponseDeviation purchaseOrderDeviationListPutList($body)

[BETA] Update multiple deviations. Only available for users that have activated the Logistics Plus Beta-program in 'Our customer account'



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\PurchaseOrderdeviationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\Deviation()); // \Swagger\Client\Model\Deviation[] | JSON representing updates to objects. Should have ID and version set.

try {
    $result = $apiInstance->purchaseOrderDeviationListPutList($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PurchaseOrderdeviationApi->purchaseOrderDeviationListPutList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\Deviation[]**](../Model/Deviation.md)| JSON representing updates to objects. Should have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseDeviation**](../Model/ListResponseDeviation.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **purchaseOrderDeviationPost**
> \Swagger\Client\Model\ResponseWrapperDeviation purchaseOrderDeviationPost($body)

[BETA] Register deviation on goods receipt. Only available for users that have activated the Logistics Plus Beta-program in 'Our customer account'



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\PurchaseOrderdeviationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\Deviation(); // \Swagger\Client\Model\Deviation | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->purchaseOrderDeviationPost($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PurchaseOrderdeviationApi->purchaseOrderDeviationPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\Deviation**](../Model/Deviation.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperDeviation**](../Model/ResponseWrapperDeviation.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **purchaseOrderDeviationPut**
> \Swagger\Client\Model\ResponseWrapperDeviation purchaseOrderDeviationPut($id, $body)

Update deviation. Only available for users that have activated the Logistics Plus Beta-program in 'Our customer account'



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\PurchaseOrderdeviationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$body = new \Swagger\Client\Model\Deviation(); // \Swagger\Client\Model\Deviation | Partial object describing what should be updated

try {
    $result = $apiInstance->purchaseOrderDeviationPut($id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PurchaseOrderdeviationApi->purchaseOrderDeviationPut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **body** | [**\Swagger\Client\Model\Deviation**](../Model/Deviation.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperDeviation**](../Model/ResponseWrapperDeviation.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **purchaseOrderDeviationSearch**
> \Swagger\Client\Model\ListResponseDeviation purchaseOrderDeviationSearch($purchase_order_id, $from, $count, $sorting, $fields)

[BETA] Find handled deviations for purchase order. Only available for users that have activated the Logistics Plus Beta-program in 'Our customer account'



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\PurchaseOrderdeviationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$purchase_order_id = 56; // int | Equals
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->purchaseOrderDeviationSearch($purchase_order_id, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PurchaseOrderdeviationApi->purchaseOrderDeviationSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **purchase_order_id** | **int**| Equals |
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseDeviation**](../Model/ListResponseDeviation.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **purchaseOrderDeviationUndeliverUndeliver**
> \Swagger\Client\Model\ResponseWrapperPurchaseOrder purchaseOrderDeviationUndeliverUndeliver($id)

[BETA] Undeliver the deviations. Only available for users that have activated the Logistics Plus Beta-program in 'Our customer account'



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\PurchaseOrderdeviationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Purchase Order ID.

try {
    $result = $apiInstance->purchaseOrderDeviationUndeliverUndeliver($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PurchaseOrderdeviationApi->purchaseOrderDeviationUndeliverUndeliver: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Purchase Order ID. |

### Return type

[**\Swagger\Client\Model\ResponseWrapperPurchaseOrder**](../Model/ResponseWrapperPurchaseOrder.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

