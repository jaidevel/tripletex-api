# Swagger\Client\PurchaseOrdergoodsReceiptApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**purchaseOrderGoodsReceiptConfirmConfirm**](PurchaseOrdergoodsReceiptApi.md#purchaseOrderGoodsReceiptConfirmConfirm) | **PUT** /purchaseOrder/goodsReceipt/{id}/:confirm | [BETA] Confirm goods receipt. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
[**purchaseOrderGoodsReceiptDelete**](PurchaseOrdergoodsReceiptApi.md#purchaseOrderGoodsReceiptDelete) | **DELETE** /purchaseOrder/goodsReceipt/{id} | [BETA] Delete goods receipt by ID. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
[**purchaseOrderGoodsReceiptGet**](PurchaseOrdergoodsReceiptApi.md#purchaseOrderGoodsReceiptGet) | **GET** /purchaseOrder/goodsReceipt/{id} | [BETA] Get goods receipt by purchase order ID. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
[**purchaseOrderGoodsReceiptListDeleteByIds**](PurchaseOrdergoodsReceiptApi.md#purchaseOrderGoodsReceiptListDeleteByIds) | **DELETE** /purchaseOrder/goodsReceipt/list | [BETA] Delete multiple goods receipt by ID. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
[**purchaseOrderGoodsReceiptListPostList**](PurchaseOrdergoodsReceiptApi.md#purchaseOrderGoodsReceiptListPostList) | **POST** /purchaseOrder/goodsReceipt/list | [BETA] Register multiple goods receipt without an existing purchase order. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
[**purchaseOrderGoodsReceiptPost**](PurchaseOrdergoodsReceiptApi.md#purchaseOrderGoodsReceiptPost) | **POST** /purchaseOrder/goodsReceipt | [BETA] Register goods receipt without an existing purchase order. When registration of several goods receipt, use /list for better performance. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
[**purchaseOrderGoodsReceiptPut**](PurchaseOrdergoodsReceiptApi.md#purchaseOrderGoodsReceiptPut) | **PUT** /purchaseOrder/goodsReceipt/{id} | [BETA] Update goods receipt. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
[**purchaseOrderGoodsReceiptReceiveAndConfirmReceiveAndConfirm**](PurchaseOrdergoodsReceiptApi.md#purchaseOrderGoodsReceiptReceiveAndConfirmReceiveAndConfirm) | **PUT** /purchaseOrder/goodsReceipt/{id}/:receiveAndConfirm | [BETA]  Receive all ordered products and approve goods receipt. Only available for users that have activated the Logistics/Logistics Plus Beta-program in &#39;Our customer account&#39;
[**purchaseOrderGoodsReceiptRegisterGoodsReceiptRegisterGoodsReceipt**](PurchaseOrdergoodsReceiptApi.md#purchaseOrderGoodsReceiptRegisterGoodsReceiptRegisterGoodsReceipt) | **PUT** /purchaseOrder/goodsReceipt/{id}/:registerGoodsReceipt | [BETA] Register goods receipt. Quantity received on the products is set to the same as quantity ordered. To update the quantity received, use PUT /purchaseOrder/goodsReceiptLine/{id}. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
[**purchaseOrderGoodsReceiptSearch**](PurchaseOrdergoodsReceiptApi.md#purchaseOrderGoodsReceiptSearch) | **GET** /purchaseOrder/goodsReceipt | [BETA] Get goods receipt. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;


# **purchaseOrderGoodsReceiptConfirmConfirm**
> \Swagger\Client\Model\ResponseWrapperPurchaseOrder purchaseOrderGoodsReceiptConfirmConfirm($id, $create_rest_order, $fields)

[BETA] Confirm goods receipt. Only available for users that have activated the Logistics Plus Beta-program in 'Our customer account'



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\PurchaseOrdergoodsReceiptApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Purchase Order ID.
$create_rest_order = false; // bool | Create restorder if quantity received is less than ordered
$fields = "*"; // string | Fields filter pattern

try {
    $result = $apiInstance->purchaseOrderGoodsReceiptConfirmConfirm($id, $create_rest_order, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PurchaseOrdergoodsReceiptApi->purchaseOrderGoodsReceiptConfirmConfirm: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Purchase Order ID. |
 **create_rest_order** | **bool**| Create restorder if quantity received is less than ordered | [optional] [default to false]
 **fields** | **string**| Fields filter pattern | [optional] [default to *]

### Return type

[**\Swagger\Client\Model\ResponseWrapperPurchaseOrder**](../Model/ResponseWrapperPurchaseOrder.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **purchaseOrderGoodsReceiptDelete**
> purchaseOrderGoodsReceiptDelete($id)

[BETA] Delete goods receipt by ID. Only available for users that have activated the Logistics Plus Beta-program in 'Our customer account'



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\PurchaseOrdergoodsReceiptApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID

try {
    $apiInstance->purchaseOrderGoodsReceiptDelete($id);
} catch (Exception $e) {
    echo 'Exception when calling PurchaseOrdergoodsReceiptApi->purchaseOrderGoodsReceiptDelete: ', $e->getMessage(), PHP_EOL;
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

# **purchaseOrderGoodsReceiptGet**
> \Swagger\Client\Model\ResponseWrapperGoodsReceipt purchaseOrderGoodsReceiptGet($id, $fields)

[BETA] Get goods receipt by purchase order ID. Only available for users that have activated the Logistics Plus Beta-program in 'Our customer account'



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\PurchaseOrdergoodsReceiptApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->purchaseOrderGoodsReceiptGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PurchaseOrdergoodsReceiptApi->purchaseOrderGoodsReceiptGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperGoodsReceipt**](../Model/ResponseWrapperGoodsReceipt.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **purchaseOrderGoodsReceiptListDeleteByIds**
> purchaseOrderGoodsReceiptListDeleteByIds($ids)

[BETA] Delete multiple goods receipt by ID. Only available for users that have activated the Logistics Plus Beta-program in 'Our customer account'



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\PurchaseOrdergoodsReceiptApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ids = "ids_example"; // string | ID of the elements

try {
    $apiInstance->purchaseOrderGoodsReceiptListDeleteByIds($ids);
} catch (Exception $e) {
    echo 'Exception when calling PurchaseOrdergoodsReceiptApi->purchaseOrderGoodsReceiptListDeleteByIds: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **ids** | **string**| ID of the elements |

### Return type

void (empty response body)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **purchaseOrderGoodsReceiptListPostList**
> \Swagger\Client\Model\ListResponseGoodsReceipt purchaseOrderGoodsReceiptListPostList($body, $fields)

[BETA] Register multiple goods receipt without an existing purchase order. Only available for users that have activated the Logistics Plus Beta-program in 'Our customer account'



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\PurchaseOrdergoodsReceiptApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\GoodsReceipt()); // \Swagger\Client\Model\GoodsReceipt[] | JSON representing a list of new objects to be created. Should not have ID and version set.
$fields = "*"; // string | Fields filter pattern

try {
    $result = $apiInstance->purchaseOrderGoodsReceiptListPostList($body, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PurchaseOrdergoodsReceiptApi->purchaseOrderGoodsReceiptListPostList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\GoodsReceipt[]**](../Model/GoodsReceipt.md)| JSON representing a list of new objects to be created. Should not have ID and version set. | [optional]
 **fields** | **string**| Fields filter pattern | [optional] [default to *]

### Return type

[**\Swagger\Client\Model\ListResponseGoodsReceipt**](../Model/ListResponseGoodsReceipt.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **purchaseOrderGoodsReceiptPost**
> \Swagger\Client\Model\ResponseWrapperGoodsReceipt purchaseOrderGoodsReceiptPost($body, $fields)

[BETA] Register goods receipt without an existing purchase order. When registration of several goods receipt, use /list for better performance. Only available for users that have activated the Logistics Plus Beta-program in 'Our customer account'



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\PurchaseOrdergoodsReceiptApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\GoodsReceipt(); // \Swagger\Client\Model\GoodsReceipt | JSON representing the new object to be created. Should not have ID and version set.
$fields = "*"; // string | Fields filter pattern

try {
    $result = $apiInstance->purchaseOrderGoodsReceiptPost($body, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PurchaseOrdergoodsReceiptApi->purchaseOrderGoodsReceiptPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\GoodsReceipt**](../Model/GoodsReceipt.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]
 **fields** | **string**| Fields filter pattern | [optional] [default to *]

### Return type

[**\Swagger\Client\Model\ResponseWrapperGoodsReceipt**](../Model/ResponseWrapperGoodsReceipt.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **purchaseOrderGoodsReceiptPut**
> \Swagger\Client\Model\ResponseWrapperGoodsReceipt purchaseOrderGoodsReceiptPut($id, $body, $fields)

[BETA] Update goods receipt. Only available for users that have activated the Logistics Plus Beta-program in 'Our customer account'



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\PurchaseOrdergoodsReceiptApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Goods Receipt ID.
$body = new \Swagger\Client\Model\GoodsReceipt(); // \Swagger\Client\Model\GoodsReceipt | Partial object describing what should be updated
$fields = "*"; // string | Fields filter pattern

try {
    $result = $apiInstance->purchaseOrderGoodsReceiptPut($id, $body, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PurchaseOrdergoodsReceiptApi->purchaseOrderGoodsReceiptPut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Goods Receipt ID. |
 **body** | [**\Swagger\Client\Model\GoodsReceipt**](../Model/GoodsReceipt.md)| Partial object describing what should be updated | [optional]
 **fields** | **string**| Fields filter pattern | [optional] [default to *]

### Return type

[**\Swagger\Client\Model\ResponseWrapperGoodsReceipt**](../Model/ResponseWrapperGoodsReceipt.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **purchaseOrderGoodsReceiptReceiveAndConfirmReceiveAndConfirm**
> \Swagger\Client\Model\ResponseWrapperPurchaseOrder purchaseOrderGoodsReceiptReceiveAndConfirmReceiveAndConfirm($id, $received_date, $inventory_id, $fields)

[BETA]  Receive all ordered products and approve goods receipt. Only available for users that have activated the Logistics/Logistics Plus Beta-program in 'Our customer account'



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\PurchaseOrdergoodsReceiptApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Purchase Order ID.
$received_date = "received_date_example"; // string | The approval date for the subscription.
$inventory_id = 56; // int | ID of inventory. Main inventory is set as default
$fields = "*"; // string | Fields filter pattern

try {
    $result = $apiInstance->purchaseOrderGoodsReceiptReceiveAndConfirmReceiveAndConfirm($id, $received_date, $inventory_id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PurchaseOrdergoodsReceiptApi->purchaseOrderGoodsReceiptReceiveAndConfirmReceiveAndConfirm: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Purchase Order ID. |
 **received_date** | **string**| The approval date for the subscription. |
 **inventory_id** | **int**| ID of inventory. Main inventory is set as default | [optional]
 **fields** | **string**| Fields filter pattern | [optional] [default to *]

### Return type

[**\Swagger\Client\Model\ResponseWrapperPurchaseOrder**](../Model/ResponseWrapperPurchaseOrder.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **purchaseOrderGoodsReceiptRegisterGoodsReceiptRegisterGoodsReceipt**
> \Swagger\Client\Model\ResponseWrapperGoodsReceipt purchaseOrderGoodsReceiptRegisterGoodsReceiptRegisterGoodsReceipt($id, $registration_date, $inventory_id, $comment, $fields)

[BETA] Register goods receipt. Quantity received on the products is set to the same as quantity ordered. To update the quantity received, use PUT /purchaseOrder/goodsReceiptLine/{id}. Only available for users that have activated the Logistics Plus Beta-program in 'Our customer account'



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\PurchaseOrdergoodsReceiptApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Purchase Order ID.
$registration_date = "registration_date_example"; // string | yyyy-MM-dd. Defaults to today.
$inventory_id = 56; // int | ID of inventory. Main inventory is set as default
$comment = "comment_example"; // string | Containing
$fields = "*"; // string | Fields filter pattern

try {
    $result = $apiInstance->purchaseOrderGoodsReceiptRegisterGoodsReceiptRegisterGoodsReceipt($id, $registration_date, $inventory_id, $comment, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PurchaseOrdergoodsReceiptApi->purchaseOrderGoodsReceiptRegisterGoodsReceiptRegisterGoodsReceipt: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Purchase Order ID. |
 **registration_date** | **string**| yyyy-MM-dd. Defaults to today. |
 **inventory_id** | **int**| ID of inventory. Main inventory is set as default | [optional]
 **comment** | **string**| Containing | [optional]
 **fields** | **string**| Fields filter pattern | [optional] [default to *]

### Return type

[**\Swagger\Client\Model\ResponseWrapperGoodsReceipt**](../Model/ResponseWrapperGoodsReceipt.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **purchaseOrderGoodsReceiptSearch**
> \Swagger\Client\Model\ListResponseGoodsReceipt purchaseOrderGoodsReceiptSearch($received_date_from, $received_date_to, $status, $without_purchase, $from, $count, $sorting, $fields)

[BETA] Get goods receipt. Only available for users that have activated the Logistics Plus Beta-program in 'Our customer account'



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\PurchaseOrdergoodsReceiptApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$received_date_from = "received_date_from_example"; // string | Format is yyyy-MM-dd (from and incl.).
$received_date_to = "received_date_to_example"; // string | Format is yyyy-MM-dd (to and incl.).
$status = "status_example"; // string | Equals
$without_purchase = false; // bool | Equals
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->purchaseOrderGoodsReceiptSearch($received_date_from, $received_date_to, $status, $without_purchase, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PurchaseOrdergoodsReceiptApi->purchaseOrderGoodsReceiptSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **received_date_from** | **string**| Format is yyyy-MM-dd (from and incl.). | [optional]
 **received_date_to** | **string**| Format is yyyy-MM-dd (to and incl.). | [optional]
 **status** | **string**| Equals | [optional]
 **without_purchase** | **bool**| Equals | [optional] [default to false]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseGoodsReceipt**](../Model/ListResponseGoodsReceipt.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

