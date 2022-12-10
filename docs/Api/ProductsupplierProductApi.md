# Swagger\Client\ProductsupplierProductApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**productSupplierProductDelete**](ProductsupplierProductApi.md#productSupplierProductDelete) | **DELETE** /product/supplierProduct/{id} | [BETA] Delete supplierProduct.
[**productSupplierProductGet**](ProductsupplierProductApi.md#productSupplierProductGet) | **GET** /product/supplierProduct/{id} | Get supplierProduct by ID.
[**productSupplierProductListPostList**](ProductsupplierProductApi.md#productSupplierProductListPostList) | **POST** /product/supplierProduct/list | Create list of new supplierProduct.
[**productSupplierProductListPutList**](ProductsupplierProductApi.md#productSupplierProductListPutList) | **PUT** /product/supplierProduct/list | [BETA] Update a list of supplierProduct.
[**productSupplierProductPost**](ProductsupplierProductApi.md#productSupplierProductPost) | **POST** /product/supplierProduct | Create new supplierProduct.
[**productSupplierProductPut**](ProductsupplierProductApi.md#productSupplierProductPut) | **PUT** /product/supplierProduct/{id} | Update supplierProduct.
[**productSupplierProductSearch**](ProductsupplierProductApi.md#productSupplierProductSearch) | **GET** /product/supplierProduct | Find products corresponding with sent data.


# **productSupplierProductDelete**
> productSupplierProductDelete($id)

[BETA] Delete supplierProduct.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProductsupplierProductApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID

try {
    $apiInstance->productSupplierProductDelete($id);
} catch (Exception $e) {
    echo 'Exception when calling ProductsupplierProductApi->productSupplierProductDelete: ', $e->getMessage(), PHP_EOL;
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

# **productSupplierProductGet**
> \Swagger\Client\Model\ResponseWrapperSupplierProduct productSupplierProductGet($id, $fields)

Get supplierProduct by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProductsupplierProductApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->productSupplierProductGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductsupplierProductApi->productSupplierProductGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperSupplierProduct**](../Model/ResponseWrapperSupplierProduct.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **productSupplierProductListPostList**
> \Swagger\Client\Model\ListResponseSupplierProduct productSupplierProductListPostList($body)

Create list of new supplierProduct.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProductsupplierProductApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\SupplierProduct()); // \Swagger\Client\Model\SupplierProduct[] | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->productSupplierProductListPostList($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductsupplierProductApi->productSupplierProductListPostList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\SupplierProduct[]**](../Model/SupplierProduct.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseSupplierProduct**](../Model/ListResponseSupplierProduct.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **productSupplierProductListPutList**
> \Swagger\Client\Model\ListResponseSupplierProduct productSupplierProductListPutList($body)

[BETA] Update a list of supplierProduct.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProductsupplierProductApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\SupplierProduct()); // \Swagger\Client\Model\SupplierProduct[] | JSON representing updates to objects. Should have ID and version set.

try {
    $result = $apiInstance->productSupplierProductListPutList($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductsupplierProductApi->productSupplierProductListPutList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\SupplierProduct[]**](../Model/SupplierProduct.md)| JSON representing updates to objects. Should have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseSupplierProduct**](../Model/ListResponseSupplierProduct.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **productSupplierProductPost**
> \Swagger\Client\Model\ResponseWrapperSupplierProduct productSupplierProductPost($body)

Create new supplierProduct.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProductsupplierProductApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\SupplierProduct(); // \Swagger\Client\Model\SupplierProduct | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->productSupplierProductPost($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductsupplierProductApi->productSupplierProductPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\SupplierProduct**](../Model/SupplierProduct.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperSupplierProduct**](../Model/ResponseWrapperSupplierProduct.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **productSupplierProductPut**
> \Swagger\Client\Model\ResponseWrapperSupplierProduct productSupplierProductPut($id, $body)

Update supplierProduct.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProductsupplierProductApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$body = new \Swagger\Client\Model\SupplierProduct(); // \Swagger\Client\Model\SupplierProduct | Partial object describing what should be updated

try {
    $result = $apiInstance->productSupplierProductPut($id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductsupplierProductApi->productSupplierProductPut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **body** | [**\Swagger\Client\Model\SupplierProduct**](../Model/SupplierProduct.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperSupplierProduct**](../Model/ResponseWrapperSupplierProduct.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **productSupplierProductSearch**
> \Swagger\Client\Model\ListResponseSupplierProduct productSupplierProductSearch($product_id, $vendor_id, $query, $is_inactive, $count, $fields, $from, $sorting)

Find products corresponding with sent data.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProductsupplierProductApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$product_id = 56; // int | Id of product to find supplier products for.
$vendor_id = 56; // int | Id of vendor to find supplier products for.
$query = "query_example"; // string | Containing
$is_inactive = true; // bool | Equals
$count = 56; // int | Number of elements to return
$fields = "id, name, number"; // string | Fields filter pattern
$from = 0; // int | From index
$sorting = "sorting_example"; // string | Sorting pattern

try {
    $result = $apiInstance->productSupplierProductSearch($product_id, $vendor_id, $query, $is_inactive, $count, $fields, $from, $sorting);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductsupplierProductApi->productSupplierProductSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **product_id** | **int**| Id of product to find supplier products for. | [optional]
 **vendor_id** | **int**| Id of vendor to find supplier products for. | [optional]
 **query** | **string**| Containing | [optional]
 **is_inactive** | **bool**| Equals | [optional]
 **count** | **int**| Number of elements to return | [optional]
 **fields** | **string**| Fields filter pattern | [optional] [default to id, name, number]
 **from** | **int**| From index | [optional] [default to 0]
 **sorting** | **string**| Sorting pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseSupplierProduct**](../Model/ListResponseSupplierProduct.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

