# Swagger\Client\ProductunitmasterApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**productUnitMasterGet**](ProductunitmasterApi.md#productUnitMasterGet) | **GET** /product/unit/master/{id} | [BETA] Get product unit master by ID.
[**productUnitMasterSearch**](ProductunitmasterApi.md#productUnitMasterSearch) | **GET** /product/unit/master | [BETA] Find product units master corresponding with sent data.


# **productUnitMasterGet**
> \Swagger\Client\Model\ResponseWrapperProductUnitMaster productUnitMasterGet($id, $fields)

[BETA] Get product unit master by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProductunitmasterApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->productUnitMasterGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductunitmasterApi->productUnitMasterGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperProductUnitMaster**](../Model/ResponseWrapperProductUnitMaster.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **productUnitMasterSearch**
> \Swagger\Client\Model\ListResponseProductUnitMaster productUnitMasterSearch($id, $name, $name_short, $common_code, $peppol_name, $peppol_symbol, $is_inactive, $count, $from, $sorting, $fields)

[BETA] Find product units master corresponding with sent data.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProductunitmasterApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = "id_example"; // string | List of IDs
$name = "name_example"; // string | Names
$name_short = "name_short_example"; // string | Short names
$common_code = "common_code_example"; // string | Common codes
$peppol_name = "peppol_name_example"; // string | Peppol names
$peppol_symbol = "peppol_symbol_example"; // string | Peppol symbols
$is_inactive = true; // bool | Inactive units
$count = 2100; // int | Number of elements to return
$from = 0; // int | From index
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->productUnitMasterSearch($id, $name, $name_short, $common_code, $peppol_name, $peppol_symbol, $is_inactive, $count, $from, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductunitmasterApi->productUnitMasterSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| List of IDs | [optional]
 **name** | **string**| Names | [optional]
 **name_short** | **string**| Short names | [optional]
 **common_code** | **string**| Common codes | [optional]
 **peppol_name** | **string**| Peppol names | [optional]
 **peppol_symbol** | **string**| Peppol symbols | [optional]
 **is_inactive** | **bool**| Inactive units | [optional]
 **count** | **int**| Number of elements to return | [optional] [default to 2100]
 **from** | **int**| From index | [optional] [default to 0]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseProductUnitMaster**](../Model/ListResponseProductUnitMaster.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

