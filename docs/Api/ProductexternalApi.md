# Swagger\Client\ProductexternalApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**productExternalGet**](ProductexternalApi.md#productExternalGet) | **GET** /product/external/{id} | [BETA] Get external product by ID.
[**productExternalSearch**](ProductexternalApi.md#productExternalSearch) | **GET** /product/external | [BETA] Find external products corresponding with sent data. The sorting-field is not in use on this endpoint.


# **productExternalGet**
> \Swagger\Client\Model\ResponseWrapperExternalProduct productExternalGet($id, $fields)

[BETA] Get external product by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProductexternalApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->productExternalGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductexternalApi->productExternalGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperExternalProduct**](../Model/ResponseWrapperExternalProduct.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **productExternalSearch**
> \Swagger\Client\Model\ListResponseExternalProduct productExternalSearch($name, $wholesaler, $organization_number, $el_number, $nrf_number, $is_inactive, $from, $count, $sorting, $fields)

[BETA] Find external products corresponding with sent data. The sorting-field is not in use on this endpoint.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProductexternalApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$name = "name_example"; // string | Containing
$wholesaler = "wholesaler_example"; // string | Wholesaler
$organization_number = "organization_number_example"; // string | Wholesaler organization number. Mandatory if Wholesaler is not selected. If Wholesaler is selected, this field is ignored.
$el_number = "el_number_example"; // string | List of valid el numbers
$nrf_number = "nrf_number_example"; // string | List of valid nrf numbers
$is_inactive = true; // bool | Equals
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->productExternalSearch($name, $wholesaler, $organization_number, $el_number, $nrf_number, $is_inactive, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductexternalApi->productExternalSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **name** | **string**| Containing | [optional]
 **wholesaler** | **string**| Wholesaler | [optional]
 **organization_number** | **string**| Wholesaler organization number. Mandatory if Wholesaler is not selected. If Wholesaler is selected, this field is ignored. | [optional]
 **el_number** | **string**| List of valid el numbers | [optional]
 **nrf_number** | **string**| List of valid nrf numbers | [optional]
 **is_inactive** | **bool**| Equals | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseExternalProduct**](../Model/ListResponseExternalProduct.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

