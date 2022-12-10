# Swagger\Client\TravelExpensedrivingStopApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**travelExpenseDrivingStopDelete**](TravelExpensedrivingStopApi.md#travelExpenseDrivingStopDelete) | **DELETE** /travelExpense/drivingStop/{id} | Delete mileage allowance stops.
[**travelExpenseDrivingStopGet**](TravelExpensedrivingStopApi.md#travelExpenseDrivingStopGet) | **GET** /travelExpense/drivingStop/{id} | Get driving stop by ID.
[**travelExpenseDrivingStopPost**](TravelExpensedrivingStopApi.md#travelExpenseDrivingStopPost) | **POST** /travelExpense/drivingStop | Create mileage allowance driving stop.


# **travelExpenseDrivingStopDelete**
> travelExpenseDrivingStopDelete($id)

Delete mileage allowance stops.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpensedrivingStopApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID

try {
    $apiInstance->travelExpenseDrivingStopDelete($id);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpensedrivingStopApi->travelExpenseDrivingStopDelete: ', $e->getMessage(), PHP_EOL;
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

# **travelExpenseDrivingStopGet**
> \Swagger\Client\Model\ResponseWrapperDrivingStop travelExpenseDrivingStopGet($id, $fields)

Get driving stop by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpensedrivingStopApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->travelExpenseDrivingStopGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpensedrivingStopApi->travelExpenseDrivingStopGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperDrivingStop**](../Model/ResponseWrapperDrivingStop.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **travelExpenseDrivingStopPost**
> \Swagger\Client\Model\ResponseWrapperDrivingStop travelExpenseDrivingStopPost($body)

Create mileage allowance driving stop.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpensedrivingStopApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\DrivingStop(); // \Swagger\Client\Model\DrivingStop | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->travelExpenseDrivingStopPost($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpensedrivingStopApi->travelExpenseDrivingStopPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\DrivingStop**](../Model/DrivingStop.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperDrivingStop**](../Model/ResponseWrapperDrivingStop.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

