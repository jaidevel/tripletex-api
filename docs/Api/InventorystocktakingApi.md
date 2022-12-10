# Swagger\Client\InventorystocktakingApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**inventoryStocktakingDelete**](InventorystocktakingApi.md#inventoryStocktakingDelete) | **DELETE** /inventory/stocktaking/{id} | [BETA] Delete stocktaking.
[**inventoryStocktakingGet**](InventorystocktakingApi.md#inventoryStocktakingGet) | **GET** /inventory/stocktaking/{id} | [BETA] Get stocktaking by ID.
[**inventoryStocktakingPost**](InventorystocktakingApi.md#inventoryStocktakingPost) | **POST** /inventory/stocktaking | [BETA] Create new stocktaking.
[**inventoryStocktakingPut**](InventorystocktakingApi.md#inventoryStocktakingPut) | **PUT** /inventory/stocktaking/{id} | [BETA] Update stocktaking.
[**inventoryStocktakingSearch**](InventorystocktakingApi.md#inventoryStocktakingSearch) | **GET** /inventory/stocktaking | [BETA] Find stocktaking corresponding with sent data.


# **inventoryStocktakingDelete**
> inventoryStocktakingDelete($id)

[BETA] Delete stocktaking.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\InventorystocktakingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID

try {
    $apiInstance->inventoryStocktakingDelete($id);
} catch (Exception $e) {
    echo 'Exception when calling InventorystocktakingApi->inventoryStocktakingDelete: ', $e->getMessage(), PHP_EOL;
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

# **inventoryStocktakingGet**
> \Swagger\Client\Model\ResponseWrapperStocktaking inventoryStocktakingGet($id, $fields)

[BETA] Get stocktaking by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\InventorystocktakingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->inventoryStocktakingGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InventorystocktakingApi->inventoryStocktakingGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperStocktaking**](../Model/ResponseWrapperStocktaking.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **inventoryStocktakingPost**
> \Swagger\Client\Model\ResponseWrapperStocktaking inventoryStocktakingPost($type_of_stocktaking, $body)

[BETA] Create new stocktaking.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\InventorystocktakingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$type_of_stocktaking = "type_of_stocktaking_example"; // string | [DEPRECATED]
$body = new \Swagger\Client\Model\Stocktaking(); // \Swagger\Client\Model\Stocktaking | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->inventoryStocktakingPost($type_of_stocktaking, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InventorystocktakingApi->inventoryStocktakingPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **type_of_stocktaking** | **string**| [DEPRECATED] | [optional]
 **body** | [**\Swagger\Client\Model\Stocktaking**](../Model/Stocktaking.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperStocktaking**](../Model/ResponseWrapperStocktaking.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **inventoryStocktakingPut**
> \Swagger\Client\Model\ResponseWrapperStocktaking inventoryStocktakingPut($id, $body)

[BETA] Update stocktaking.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\InventorystocktakingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$body = new \Swagger\Client\Model\Stocktaking(); // \Swagger\Client\Model\Stocktaking | Partial object describing what should be updated

try {
    $result = $apiInstance->inventoryStocktakingPut($id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InventorystocktakingApi->inventoryStocktakingPut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **body** | [**\Swagger\Client\Model\Stocktaking**](../Model/Stocktaking.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperStocktaking**](../Model/ResponseWrapperStocktaking.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **inventoryStocktakingSearch**
> \Swagger\Client\Model\ListResponseStocktaking inventoryStocktakingSearch($id, $is_completed, $inventory_id, $from, $count, $sorting, $fields)

[BETA] Find stocktaking corresponding with sent data.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\InventorystocktakingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = "id_example"; // string | List of IDs
$is_completed = true; // bool | Equals
$inventory_id = 56; // int | Equals
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->inventoryStocktakingSearch($id, $is_completed, $inventory_id, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling InventorystocktakingApi->inventoryStocktakingSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| List of IDs | [optional]
 **is_completed** | **bool**| Equals | [optional]
 **inventory_id** | **int**| Equals | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseStocktaking**](../Model/ListResponseStocktaking.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

