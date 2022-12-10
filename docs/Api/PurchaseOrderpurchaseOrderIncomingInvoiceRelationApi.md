# Swagger\Client\PurchaseOrderpurchaseOrderIncomingInvoiceRelationApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**purchaseOrderPurchaseOrderIncomingInvoiceRelationDelete**](PurchaseOrderpurchaseOrderIncomingInvoiceRelationApi.md#purchaseOrderPurchaseOrderIncomingInvoiceRelationDelete) | **DELETE** /purchaseOrder/purchaseOrderIncomingInvoiceRelation/{id} | [BETA] Delete purchase order voucher relation. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
[**purchaseOrderPurchaseOrderIncomingInvoiceRelationGet**](PurchaseOrderpurchaseOrderIncomingInvoiceRelationApi.md#purchaseOrderPurchaseOrderIncomingInvoiceRelationGet) | **GET** /purchaseOrder/purchaseOrderIncomingInvoiceRelation/{id} | [BETA] Find purchase order relation to voucher by ID. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
[**purchaseOrderPurchaseOrderIncomingInvoiceRelationListDeleteByIds**](PurchaseOrderpurchaseOrderIncomingInvoiceRelationApi.md#purchaseOrderPurchaseOrderIncomingInvoiceRelationListDeleteByIds) | **DELETE** /purchaseOrder/purchaseOrderIncomingInvoiceRelation/list | [BETA] Delete multiple purchase order voucher relations. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
[**purchaseOrderPurchaseOrderIncomingInvoiceRelationListPostList**](PurchaseOrderpurchaseOrderIncomingInvoiceRelationApi.md#purchaseOrderPurchaseOrderIncomingInvoiceRelationListPostList) | **POST** /purchaseOrder/purchaseOrderIncomingInvoiceRelation/list | [BETA] Create a new list of relations between purchase order and voucher. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
[**purchaseOrderPurchaseOrderIncomingInvoiceRelationPost**](PurchaseOrderpurchaseOrderIncomingInvoiceRelationApi.md#purchaseOrderPurchaseOrderIncomingInvoiceRelationPost) | **POST** /purchaseOrder/purchaseOrderIncomingInvoiceRelation | [BETA] Create new relation between purchase order and a voucher. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
[**purchaseOrderPurchaseOrderIncomingInvoiceRelationSearch**](PurchaseOrderpurchaseOrderIncomingInvoiceRelationApi.md#purchaseOrderPurchaseOrderIncomingInvoiceRelationSearch) | **GET** /purchaseOrder/purchaseOrderIncomingInvoiceRelation | [BETA] Find purchase order relation to voucher with sent data. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;


# **purchaseOrderPurchaseOrderIncomingInvoiceRelationDelete**
> purchaseOrderPurchaseOrderIncomingInvoiceRelationDelete($id)

[BETA] Delete purchase order voucher relation. Only available for users that have activated the Logistics Plus Beta-program in 'Our customer account'



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\PurchaseOrderpurchaseOrderIncomingInvoiceRelationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID

try {
    $apiInstance->purchaseOrderPurchaseOrderIncomingInvoiceRelationDelete($id);
} catch (Exception $e) {
    echo 'Exception when calling PurchaseOrderpurchaseOrderIncomingInvoiceRelationApi->purchaseOrderPurchaseOrderIncomingInvoiceRelationDelete: ', $e->getMessage(), PHP_EOL;
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

# **purchaseOrderPurchaseOrderIncomingInvoiceRelationGet**
> \Swagger\Client\Model\ResponseWrapperPurchaseOrderIncomingInvoiceRelation purchaseOrderPurchaseOrderIncomingInvoiceRelationGet($id, $fields)

[BETA] Find purchase order relation to voucher by ID. Only available for users that have activated the Logistics Plus Beta-program in 'Our customer account'



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\PurchaseOrderpurchaseOrderIncomingInvoiceRelationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->purchaseOrderPurchaseOrderIncomingInvoiceRelationGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PurchaseOrderpurchaseOrderIncomingInvoiceRelationApi->purchaseOrderPurchaseOrderIncomingInvoiceRelationGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperPurchaseOrderIncomingInvoiceRelation**](../Model/ResponseWrapperPurchaseOrderIncomingInvoiceRelation.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **purchaseOrderPurchaseOrderIncomingInvoiceRelationListDeleteByIds**
> purchaseOrderPurchaseOrderIncomingInvoiceRelationListDeleteByIds($ids)

[BETA] Delete multiple purchase order voucher relations. Only available for users that have activated the Logistics Plus Beta-program in 'Our customer account'



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\PurchaseOrderpurchaseOrderIncomingInvoiceRelationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ids = "ids_example"; // string | ID of the elements

try {
    $apiInstance->purchaseOrderPurchaseOrderIncomingInvoiceRelationListDeleteByIds($ids);
} catch (Exception $e) {
    echo 'Exception when calling PurchaseOrderpurchaseOrderIncomingInvoiceRelationApi->purchaseOrderPurchaseOrderIncomingInvoiceRelationListDeleteByIds: ', $e->getMessage(), PHP_EOL;
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

# **purchaseOrderPurchaseOrderIncomingInvoiceRelationListPostList**
> \Swagger\Client\Model\ListResponsePurchaseOrderIncomingInvoiceRelation purchaseOrderPurchaseOrderIncomingInvoiceRelationListPostList($body)

[BETA] Create a new list of relations between purchase order and voucher. Only available for users that have activated the Logistics Plus Beta-program in 'Our customer account'



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\PurchaseOrderpurchaseOrderIncomingInvoiceRelationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\PurchaseOrderIncomingInvoiceRelation()); // \Swagger\Client\Model\PurchaseOrderIncomingInvoiceRelation[] | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->purchaseOrderPurchaseOrderIncomingInvoiceRelationListPostList($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PurchaseOrderpurchaseOrderIncomingInvoiceRelationApi->purchaseOrderPurchaseOrderIncomingInvoiceRelationListPostList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\PurchaseOrderIncomingInvoiceRelation[]**](../Model/PurchaseOrderIncomingInvoiceRelation.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ListResponsePurchaseOrderIncomingInvoiceRelation**](../Model/ListResponsePurchaseOrderIncomingInvoiceRelation.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **purchaseOrderPurchaseOrderIncomingInvoiceRelationPost**
> \Swagger\Client\Model\ResponseWrapperPurchaseOrderIncomingInvoiceRelation purchaseOrderPurchaseOrderIncomingInvoiceRelationPost($body)

[BETA] Create new relation between purchase order and a voucher. Only available for users that have activated the Logistics Plus Beta-program in 'Our customer account'



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\PurchaseOrderpurchaseOrderIncomingInvoiceRelationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\PurchaseOrderIncomingInvoiceRelation(); // \Swagger\Client\Model\PurchaseOrderIncomingInvoiceRelation | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->purchaseOrderPurchaseOrderIncomingInvoiceRelationPost($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PurchaseOrderpurchaseOrderIncomingInvoiceRelationApi->purchaseOrderPurchaseOrderIncomingInvoiceRelationPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\PurchaseOrderIncomingInvoiceRelation**](../Model/PurchaseOrderIncomingInvoiceRelation.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperPurchaseOrderIncomingInvoiceRelation**](../Model/ResponseWrapperPurchaseOrderIncomingInvoiceRelation.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **purchaseOrderPurchaseOrderIncomingInvoiceRelationSearch**
> \Swagger\Client\Model\ListResponsePurchaseOrderIncomingInvoiceRelation purchaseOrderPurchaseOrderIncomingInvoiceRelationSearch($id, $order_out_id, $voucher_id, $from, $count, $sorting, $fields)

[BETA] Find purchase order relation to voucher with sent data. Only available for users that have activated the Logistics Plus Beta-program in 'Our customer account'



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\PurchaseOrderpurchaseOrderIncomingInvoiceRelationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = "id_example"; // string | List of IDs
$order_out_id = "order_out_id_example"; // string | List of IDs
$voucher_id = "voucher_id_example"; // string | List of IDs
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->purchaseOrderPurchaseOrderIncomingInvoiceRelationSearch($id, $order_out_id, $voucher_id, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PurchaseOrderpurchaseOrderIncomingInvoiceRelationApi->purchaseOrderPurchaseOrderIncomingInvoiceRelationSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| List of IDs | [optional]
 **order_out_id** | **string**| List of IDs | [optional]
 **voucher_id** | **string**| List of IDs | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponsePurchaseOrderIncomingInvoiceRelation**](../Model/ListResponsePurchaseOrderIncomingInvoiceRelation.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

