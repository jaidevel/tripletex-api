# Swagger\Client\InventorystocktakingproductlineApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**inventoryStocktakingProductlineDelete**](InventorystocktakingproductlineApi.md#inventoryStocktakingProductlineDelete) | **DELETE** /inventory/stocktaking/productline/{id} | [BETA] Delete product line.
[**inventoryStocktakingProductlineGet**](InventorystocktakingproductlineApi.md#inventoryStocktakingProductlineGet) | **GET** /inventory/stocktaking/productline/{id} | [BETA] Get product line by ID.
[**inventoryStocktakingProductlinePost**](InventorystocktakingproductlineApi.md#inventoryStocktakingProductlinePost) | **POST** /inventory/stocktaking/productline | [BETA] Create product line. When creating several product lines, use /list for better performance.
[**inventoryStocktakingProductlinePut**](InventorystocktakingproductlineApi.md#inventoryStocktakingProductlinePut) | **PUT** /inventory/stocktaking/productline/{id} | [BETA] Update product line.
[**inventoryStocktakingProductlineSearch**](InventorystocktakingproductlineApi.md#inventoryStocktakingProductlineSearch) | **GET** /inventory/stocktaking/productline | [BETA] Find all product lines by stocktaking ID.


# **inventoryStocktakingProductlineDelete**
> inventoryStocktakingProductlineDelete($id)

[BETA] Delete product line.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\InventorystocktakingproductlineApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID

try {
    $apiInstance->inventoryStocktakingProductlineDelete($id);
} catch (Exception $e) {
    echo 'Exception when calling InventorystocktakingproductlineApi->inventoryStocktakingProductlineDelete: ', $e->getMessage(), PHP_EOL;
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

# **inventoryStocktakingProductlineGet**
> \Swagger\Client\Model\ResponseWrapperProductLine inventoryStocktakingProductlineGet($id, $fields)

[BETA] Get product line by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\InventorystocktakingproductlineApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->inventoryStocktakingProductlineGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InventorystocktakingproductlineApi->inventoryStocktakingProductlineGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperProductLine**](../Model/ResponseWrapperProductLine.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **inventoryStocktakingProductlinePost**
> \Swagger\Client\Model\ResponseWrapperProductLine inventoryStocktakingProductlinePost($body)

[BETA] Create product line. When creating several product lines, use /list for better performance.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\InventorystocktakingproductlineApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\ProductLine(); // \Swagger\Client\Model\ProductLine | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->inventoryStocktakingProductlinePost($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InventorystocktakingproductlineApi->inventoryStocktakingProductlinePost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\ProductLine**](../Model/ProductLine.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperProductLine**](../Model/ResponseWrapperProductLine.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **inventoryStocktakingProductlinePut**
> \Swagger\Client\Model\ResponseWrapperProductLine inventoryStocktakingProductlinePut($id, $body)

[BETA] Update product line.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\InventorystocktakingproductlineApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$body = new \Swagger\Client\Model\ProductLine(); // \Swagger\Client\Model\ProductLine | Partial object describing what should be updated

try {
    $result = $apiInstance->inventoryStocktakingProductlinePut($id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InventorystocktakingproductlineApi->inventoryStocktakingProductlinePut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **body** | [**\Swagger\Client\Model\ProductLine**](../Model/ProductLine.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperProductLine**](../Model/ResponseWrapperProductLine.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **inventoryStocktakingProductlineSearch**
> \Swagger\Client\Model\ListResponseProductLine inventoryStocktakingProductlineSearch($stocktaking_id, $query, $product_group_ids, $product_line_status, $count, $from, $sorting, $fields)

[BETA] Find all product lines by stocktaking ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\InventorystocktakingproductlineApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$stocktaking_id = 56; // int | Equals
$query = "query_example"; // string | Containing
$product_group_ids = "product_group_ids_example"; // string | List of IDs
$product_line_status = "ALL_PRODUCTS"; // string | Productline status
$count = 10000; // int | Number of elements to return
$from = 0; // int | From index
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->inventoryStocktakingProductlineSearch($stocktaking_id, $query, $product_group_ids, $product_line_status, $count, $from, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InventorystocktakingproductlineApi->inventoryStocktakingProductlineSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **stocktaking_id** | **int**| Equals |
 **query** | **string**| Containing | [optional]
 **product_group_ids** | **string**| List of IDs | [optional]
 **product_line_status** | **string**| Productline status | [optional] [default to ALL_PRODUCTS]
 **count** | **int**| Number of elements to return | [optional] [default to 10000]
 **from** | **int**| From index | [optional] [default to 0]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseProductLine**](../Model/ListResponseProductLine.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

