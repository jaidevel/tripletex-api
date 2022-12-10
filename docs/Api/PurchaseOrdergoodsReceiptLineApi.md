# Swagger\Client\PurchaseOrdergoodsReceiptLineApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**purchaseOrderGoodsReceiptLineDelete**](PurchaseOrdergoodsReceiptLineApi.md#purchaseOrderGoodsReceiptLineDelete) | **DELETE** /purchaseOrder/goodsReceiptLine/{id} | [BETA] Delete goods receipt line by ID. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
[**purchaseOrderGoodsReceiptLineGet**](PurchaseOrdergoodsReceiptLineApi.md#purchaseOrderGoodsReceiptLineGet) | **GET** /purchaseOrder/goodsReceiptLine/{id} | [BETA] Get goods receipt line by purchase order line ID. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
[**purchaseOrderGoodsReceiptLineListDeleteList**](PurchaseOrdergoodsReceiptLineApi.md#purchaseOrderGoodsReceiptLineListDeleteList) | **DELETE** /purchaseOrder/goodsReceiptLine/list | [BETA] Delete goods receipt lines by ID. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
[**purchaseOrderGoodsReceiptLineListPostList**](PurchaseOrdergoodsReceiptLineApi.md#purchaseOrderGoodsReceiptLineListPostList) | **POST** /purchaseOrder/goodsReceiptLine/list | [BETA] Register multiple new goods receipt on an existing purchase order. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
[**purchaseOrderGoodsReceiptLineListPutList**](PurchaseOrdergoodsReceiptLineApi.md#purchaseOrderGoodsReceiptLineListPutList) | **PUT** /purchaseOrder/goodsReceiptLine/list | [BETA] Update goods receipt lines on a goods receipt. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
[**purchaseOrderGoodsReceiptLinePost**](PurchaseOrdergoodsReceiptLineApi.md#purchaseOrderGoodsReceiptLinePost) | **POST** /purchaseOrder/goodsReceiptLine | [BETA] Register new goods receipt; new product on an existing purchase order. When registration of several goods receipt, use /list for better performance. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
[**purchaseOrderGoodsReceiptLinePut**](PurchaseOrdergoodsReceiptLineApi.md#purchaseOrderGoodsReceiptLinePut) | **PUT** /purchaseOrder/goodsReceiptLine/{id} | [BETA] Update a goods receipt line on a goods receipt. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
[**purchaseOrderGoodsReceiptLineSearch**](PurchaseOrdergoodsReceiptLineApi.md#purchaseOrderGoodsReceiptLineSearch) | **GET** /purchaseOrder/goodsReceiptLine | [BETA] Find goods receipt lines for purchase order. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;


# **purchaseOrderGoodsReceiptLineDelete**
> purchaseOrderGoodsReceiptLineDelete($id)

[BETA] Delete goods receipt line by ID. Only available for users that have activated the Logistics Plus Beta-program in 'Our customer account'



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\PurchaseOrdergoodsReceiptLineApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID

try {
    $apiInstance->purchaseOrderGoodsReceiptLineDelete($id);
} catch (Exception $e) {
    echo 'Exception when calling PurchaseOrdergoodsReceiptLineApi->purchaseOrderGoodsReceiptLineDelete: ', $e->getMessage(), PHP_EOL;
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

# **purchaseOrderGoodsReceiptLineGet**
> \Swagger\Client\Model\ResponseWrapperGoodsReceiptLine purchaseOrderGoodsReceiptLineGet($id, $fields)

[BETA] Get goods receipt line by purchase order line ID. Only available for users that have activated the Logistics Plus Beta-program in 'Our customer account'



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\PurchaseOrdergoodsReceiptLineApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->purchaseOrderGoodsReceiptLineGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PurchaseOrdergoodsReceiptLineApi->purchaseOrderGoodsReceiptLineGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperGoodsReceiptLine**](../Model/ResponseWrapperGoodsReceiptLine.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **purchaseOrderGoodsReceiptLineListDeleteList**
> purchaseOrderGoodsReceiptLineListDeleteList($body)

[BETA] Delete goods receipt lines by ID. Only available for users that have activated the Logistics Plus Beta-program in 'Our customer account'



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\PurchaseOrdergoodsReceiptLineApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\GoodsReceiptLine()); // \Swagger\Client\Model\GoodsReceiptLine[] | JSON representing objects to delete. Should have ID and version set.

try {
    $apiInstance->purchaseOrderGoodsReceiptLineListDeleteList($body);
} catch (Exception $e) {
    echo 'Exception when calling PurchaseOrdergoodsReceiptLineApi->purchaseOrderGoodsReceiptLineListDeleteList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\GoodsReceiptLine[]**](../Model/GoodsReceiptLine.md)| JSON representing objects to delete. Should have ID and version set. | [optional]

### Return type

void (empty response body)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **purchaseOrderGoodsReceiptLineListPostList**
> \Swagger\Client\Model\ListResponseGoodsReceiptLine purchaseOrderGoodsReceiptLineListPostList($body)

[BETA] Register multiple new goods receipt on an existing purchase order. Only available for users that have activated the Logistics Plus Beta-program in 'Our customer account'



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\PurchaseOrdergoodsReceiptLineApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\GoodsReceiptLine()); // \Swagger\Client\Model\GoodsReceiptLine[] | JSON representing a list of new objects to be created. Should not have ID and version set.

try {
    $result = $apiInstance->purchaseOrderGoodsReceiptLineListPostList($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PurchaseOrdergoodsReceiptLineApi->purchaseOrderGoodsReceiptLineListPostList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\GoodsReceiptLine[]**](../Model/GoodsReceiptLine.md)| JSON representing a list of new objects to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseGoodsReceiptLine**](../Model/ListResponseGoodsReceiptLine.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **purchaseOrderGoodsReceiptLineListPutList**
> \Swagger\Client\Model\ListResponseGoodsReceiptLine purchaseOrderGoodsReceiptLineListPutList($body)

[BETA] Update goods receipt lines on a goods receipt. Only available for users that have activated the Logistics Plus Beta-program in 'Our customer account'



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\PurchaseOrdergoodsReceiptLineApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\GoodsReceiptLine()); // \Swagger\Client\Model\GoodsReceiptLine[] | JSON representing updates to objects. Should have ID and version set.

try {
    $result = $apiInstance->purchaseOrderGoodsReceiptLineListPutList($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PurchaseOrdergoodsReceiptLineApi->purchaseOrderGoodsReceiptLineListPutList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\GoodsReceiptLine[]**](../Model/GoodsReceiptLine.md)| JSON representing updates to objects. Should have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseGoodsReceiptLine**](../Model/ListResponseGoodsReceiptLine.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **purchaseOrderGoodsReceiptLinePost**
> \Swagger\Client\Model\ResponseWrapperGoodsReceiptLine purchaseOrderGoodsReceiptLinePost($body)

[BETA] Register new goods receipt; new product on an existing purchase order. When registration of several goods receipt, use /list for better performance. Only available for users that have activated the Logistics Plus Beta-program in 'Our customer account'



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\PurchaseOrdergoodsReceiptLineApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\GoodsReceiptLine(); // \Swagger\Client\Model\GoodsReceiptLine | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->purchaseOrderGoodsReceiptLinePost($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PurchaseOrdergoodsReceiptLineApi->purchaseOrderGoodsReceiptLinePost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\GoodsReceiptLine**](../Model/GoodsReceiptLine.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperGoodsReceiptLine**](../Model/ResponseWrapperGoodsReceiptLine.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **purchaseOrderGoodsReceiptLinePut**
> \Swagger\Client\Model\ResponseWrapperGoodsReceiptLine purchaseOrderGoodsReceiptLinePut($id, $body)

[BETA] Update a goods receipt line on a goods receipt. Only available for users that have activated the Logistics Plus Beta-program in 'Our customer account'



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\PurchaseOrdergoodsReceiptLineApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Goods receipt Line ID
$body = new \Swagger\Client\Model\GoodsReceiptLine(); // \Swagger\Client\Model\GoodsReceiptLine | Partial object describing what should be updated

try {
    $result = $apiInstance->purchaseOrderGoodsReceiptLinePut($id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PurchaseOrdergoodsReceiptLineApi->purchaseOrderGoodsReceiptLinePut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Goods receipt Line ID |
 **body** | [**\Swagger\Client\Model\GoodsReceiptLine**](../Model/GoodsReceiptLine.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperGoodsReceiptLine**](../Model/ResponseWrapperGoodsReceiptLine.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **purchaseOrderGoodsReceiptLineSearch**
> \Swagger\Client\Model\ListResponseGoodsReceiptLine purchaseOrderGoodsReceiptLineSearch($purchase_order_id, $from, $count, $sorting, $fields)

[BETA] Find goods receipt lines for purchase order. Only available for users that have activated the Logistics Plus Beta-program in 'Our customer account'



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\PurchaseOrdergoodsReceiptLineApi(
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
    $result = $apiInstance->purchaseOrderGoodsReceiptLineSearch($purchase_order_id, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PurchaseOrdergoodsReceiptLineApi->purchaseOrderGoodsReceiptLineSearch: ', $e->getMessage(), PHP_EOL;
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

[**\Swagger\Client\Model\ListResponseGoodsReceiptLine**](../Model/ListResponseGoodsReceiptLine.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

