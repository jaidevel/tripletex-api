# Swagger\Client\ProductinventoryLocationApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**productInventoryLocationDelete**](ProductinventoryLocationApi.md#productInventoryLocationDelete) | **DELETE** /product/inventoryLocation/{id} | [BETA] Delete product inventory location. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
[**productInventoryLocationGet**](ProductinventoryLocationApi.md#productInventoryLocationGet) | **GET** /product/inventoryLocation/{id} | Get inventory location by ID. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
[**productInventoryLocationListPostList**](ProductinventoryLocationApi.md#productInventoryLocationListPostList) | **POST** /product/inventoryLocation/list | [BETA] Add multiple product inventory locations. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
[**productInventoryLocationListPutList**](ProductinventoryLocationApi.md#productInventoryLocationListPutList) | **PUT** /product/inventoryLocation/list | [BETA] Update multiple product inventory locations. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
[**productInventoryLocationPost**](ProductinventoryLocationApi.md#productInventoryLocationPost) | **POST** /product/inventoryLocation | [BETA] Create new product inventory location. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
[**productInventoryLocationPut**](ProductinventoryLocationApi.md#productInventoryLocationPut) | **PUT** /product/inventoryLocation/{id} | [BETA] Update product inventory location. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
[**productInventoryLocationSearch**](ProductinventoryLocationApi.md#productInventoryLocationSearch) | **GET** /product/inventoryLocation | [BETA] Find inventory locations by product ID. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;


# **productInventoryLocationDelete**
> productInventoryLocationDelete($id)

[BETA] Delete product inventory location. Only available for users that have activated the Logistics Plus Beta-program in 'Our customer account'



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProductinventoryLocationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID

try {
    $apiInstance->productInventoryLocationDelete($id);
} catch (Exception $e) {
    echo 'Exception when calling ProductinventoryLocationApi->productInventoryLocationDelete: ', $e->getMessage(), PHP_EOL;
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

# **productInventoryLocationGet**
> \Swagger\Client\Model\ResponseWrapperProductInventoryLocation productInventoryLocationGet($id, $fields)

Get inventory location by ID. Only available for users that have activated the Logistics Plus Beta-program in 'Our customer account'



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProductinventoryLocationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->productInventoryLocationGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductinventoryLocationApi->productInventoryLocationGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperProductInventoryLocation**](../Model/ResponseWrapperProductInventoryLocation.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **productInventoryLocationListPostList**
> \Swagger\Client\Model\ListResponseProductInventoryLocation productInventoryLocationListPostList($body)

[BETA] Add multiple product inventory locations. Only available for users that have activated the Logistics Plus Beta-program in 'Our customer account'



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProductinventoryLocationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\ProductInventoryLocation()); // \Swagger\Client\Model\ProductInventoryLocation[] | JSON representing a list of new objects to be created. Should not have ID and version set.

try {
    $result = $apiInstance->productInventoryLocationListPostList($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductinventoryLocationApi->productInventoryLocationListPostList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\ProductInventoryLocation[]**](../Model/ProductInventoryLocation.md)| JSON representing a list of new objects to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseProductInventoryLocation**](../Model/ListResponseProductInventoryLocation.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **productInventoryLocationListPutList**
> \Swagger\Client\Model\ListResponseProductInventoryLocation productInventoryLocationListPutList($body)

[BETA] Update multiple product inventory locations. Only available for users that have activated the Logistics Plus Beta-program in 'Our customer account'



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProductinventoryLocationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\ProductInventoryLocation()); // \Swagger\Client\Model\ProductInventoryLocation[] | JSON representing updates to objects. Should have ID and version set.

try {
    $result = $apiInstance->productInventoryLocationListPutList($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductinventoryLocationApi->productInventoryLocationListPutList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\ProductInventoryLocation[]**](../Model/ProductInventoryLocation.md)| JSON representing updates to objects. Should have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseProductInventoryLocation**](../Model/ListResponseProductInventoryLocation.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **productInventoryLocationPost**
> \Swagger\Client\Model\ResponseWrapperProductInventoryLocation productInventoryLocationPost($body)

[BETA] Create new product inventory location. Only available for users that have activated the Logistics Plus Beta-program in 'Our customer account'



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProductinventoryLocationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\ProductInventoryLocation(); // \Swagger\Client\Model\ProductInventoryLocation | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->productInventoryLocationPost($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductinventoryLocationApi->productInventoryLocationPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\ProductInventoryLocation**](../Model/ProductInventoryLocation.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperProductInventoryLocation**](../Model/ResponseWrapperProductInventoryLocation.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **productInventoryLocationPut**
> \Swagger\Client\Model\ResponseWrapperProductInventoryLocation productInventoryLocationPut($id, $body)

[BETA] Update product inventory location. Only available for users that have activated the Logistics Plus Beta-program in 'Our customer account'



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProductinventoryLocationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$body = new \Swagger\Client\Model\ProductInventoryLocation(); // \Swagger\Client\Model\ProductInventoryLocation | Partial object describing what should be updated

try {
    $result = $apiInstance->productInventoryLocationPut($id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductinventoryLocationApi->productInventoryLocationPut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **body** | [**\Swagger\Client\Model\ProductInventoryLocation**](../Model/ProductInventoryLocation.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperProductInventoryLocation**](../Model/ResponseWrapperProductInventoryLocation.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **productInventoryLocationSearch**
> \Swagger\Client\Model\ListResponseProductInventoryLocation productInventoryLocationSearch($product_id, $inventory_id, $is_main_location, $from, $count, $sorting, $fields)

[BETA] Find inventory locations by product ID. Only available for users that have activated the Logistics Plus Beta-program in 'Our customer account'



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProductinventoryLocationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$product_id = "product_id_example"; // string | List of IDs
$inventory_id = "inventory_id_example"; // string | List of IDs
$is_main_location = true; // bool | Equals
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->productInventoryLocationSearch($product_id, $inventory_id, $is_main_location, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductinventoryLocationApi->productInventoryLocationSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **product_id** | **string**| List of IDs | [optional]
 **inventory_id** | **string**| List of IDs | [optional]
 **is_main_location** | **bool**| Equals | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseProductInventoryLocation**](../Model/ListResponseProductInventoryLocation.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

