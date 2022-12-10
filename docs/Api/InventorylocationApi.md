# Swagger\Client\InventorylocationApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**inventoryLocationDelete**](InventorylocationApi.md#inventoryLocationDelete) | **DELETE** /inventory/location/{id} | [BETA] Delete inventory location. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
[**inventoryLocationGet**](InventorylocationApi.md#inventoryLocationGet) | **GET** /inventory/location/{id} | Get inventory location by ID. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
[**inventoryLocationListDeleteByIds**](InventorylocationApi.md#inventoryLocationListDeleteByIds) | **DELETE** /inventory/location/list | [BETA] Delete inventory location. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
[**inventoryLocationListPostList**](InventorylocationApi.md#inventoryLocationListPostList) | **POST** /inventory/location/list | [BETA] Add multiple inventory locations. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
[**inventoryLocationListPutList**](InventorylocationApi.md#inventoryLocationListPutList) | **PUT** /inventory/location/list | [BETA] Update multiple inventory locations. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
[**inventoryLocationPost**](InventorylocationApi.md#inventoryLocationPost) | **POST** /inventory/location | [BETA] Create new inventory location. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
[**inventoryLocationPut**](InventorylocationApi.md#inventoryLocationPut) | **PUT** /inventory/location/{id} | [BETA] Update inventory location. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
[**inventoryLocationSearch**](InventorylocationApi.md#inventoryLocationSearch) | **GET** /inventory/location | [BETA] Find inventory locations by inventory ID. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;


# **inventoryLocationDelete**
> inventoryLocationDelete($id)

[BETA] Delete inventory location. Only available for users that have activated the Logistics Plus Beta-program in 'Our customer account'



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\InventorylocationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID

try {
    $apiInstance->inventoryLocationDelete($id);
} catch (Exception $e) {
    echo 'Exception when calling InventorylocationApi->inventoryLocationDelete: ', $e->getMessage(), PHP_EOL;
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

# **inventoryLocationGet**
> \Swagger\Client\Model\ResponseWrapperInventoryLocation inventoryLocationGet($id, $fields)

Get inventory location by ID. Only available for users that have activated the Logistics Plus Beta-program in 'Our customer account'



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\InventorylocationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->inventoryLocationGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InventorylocationApi->inventoryLocationGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperInventoryLocation**](../Model/ResponseWrapperInventoryLocation.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **inventoryLocationListDeleteByIds**
> inventoryLocationListDeleteByIds($ids)

[BETA] Delete inventory location. Only available for users that have activated the Logistics Plus Beta-program in 'Our customer account'



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\InventorylocationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ids = "ids_example"; // string | ID of the elements

try {
    $apiInstance->inventoryLocationListDeleteByIds($ids);
} catch (Exception $e) {
    echo 'Exception when calling InventorylocationApi->inventoryLocationListDeleteByIds: ', $e->getMessage(), PHP_EOL;
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

# **inventoryLocationListPostList**
> \Swagger\Client\Model\ListResponseInventoryLocation inventoryLocationListPostList($body)

[BETA] Add multiple inventory locations. Only available for users that have activated the Logistics Plus Beta-program in 'Our customer account'



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\InventorylocationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\InventoryLocation()); // \Swagger\Client\Model\InventoryLocation[] | JSON representing a list of new objects to be created. Should not have ID and version set.

try {
    $result = $apiInstance->inventoryLocationListPostList($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InventorylocationApi->inventoryLocationListPostList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\InventoryLocation[]**](../Model/InventoryLocation.md)| JSON representing a list of new objects to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseInventoryLocation**](../Model/ListResponseInventoryLocation.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **inventoryLocationListPutList**
> \Swagger\Client\Model\ListResponseInventoryLocation inventoryLocationListPutList($body)

[BETA] Update multiple inventory locations. Only available for users that have activated the Logistics Plus Beta-program in 'Our customer account'



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\InventorylocationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\InventoryLocation()); // \Swagger\Client\Model\InventoryLocation[] | JSON representing updates to objects. Should have ID and version set.

try {
    $result = $apiInstance->inventoryLocationListPutList($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InventorylocationApi->inventoryLocationListPutList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\InventoryLocation[]**](../Model/InventoryLocation.md)| JSON representing updates to objects. Should have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseInventoryLocation**](../Model/ListResponseInventoryLocation.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **inventoryLocationPost**
> \Swagger\Client\Model\ResponseWrapperInventoryLocation inventoryLocationPost($body)

[BETA] Create new inventory location. Only available for users that have activated the Logistics Plus Beta-program in 'Our customer account'



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\InventorylocationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\InventoryLocation(); // \Swagger\Client\Model\InventoryLocation | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->inventoryLocationPost($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InventorylocationApi->inventoryLocationPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\InventoryLocation**](../Model/InventoryLocation.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperInventoryLocation**](../Model/ResponseWrapperInventoryLocation.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **inventoryLocationPut**
> \Swagger\Client\Model\ResponseWrapperInventoryLocation inventoryLocationPut($id, $body)

[BETA] Update inventory location. Only available for users that have activated the Logistics Plus Beta-program in 'Our customer account'



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\InventorylocationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$body = new \Swagger\Client\Model\InventoryLocation(); // \Swagger\Client\Model\InventoryLocation | Partial object describing what should be updated

try {
    $result = $apiInstance->inventoryLocationPut($id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InventorylocationApi->inventoryLocationPut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **body** | [**\Swagger\Client\Model\InventoryLocation**](../Model/InventoryLocation.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperInventoryLocation**](../Model/ResponseWrapperInventoryLocation.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **inventoryLocationSearch**
> \Swagger\Client\Model\ListResponseInventoryLocation inventoryLocationSearch($warehouse_id, $is_inactive, $name, $from, $count, $sorting, $fields)

[BETA] Find inventory locations by inventory ID. Only available for users that have activated the Logistics Plus Beta-program in 'Our customer account'



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\InventorylocationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$warehouse_id = "warehouse_id_example"; // string | List of IDs
$is_inactive = true; // bool | Equals
$name = "name_example"; // string | Containing
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->inventoryLocationSearch($warehouse_id, $is_inactive, $name, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InventorylocationApi->inventoryLocationSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **warehouse_id** | **string**| List of IDs | [optional]
 **is_inactive** | **bool**| Equals | [optional]
 **name** | **string**| Containing | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseInventoryLocation**](../Model/ListResponseInventoryLocation.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

