# Swagger\Client\VoucherStatusApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**voucherStatusGet**](VoucherStatusApi.md#voucherStatusGet) | **GET** /voucherStatus/{id} | Get voucherStatus by ID.
[**voucherStatusPost**](VoucherStatusApi.md#voucherStatusPost) | **POST** /voucherStatus | Post new voucherStatus.
[**voucherStatusSearch**](VoucherStatusApi.md#voucherStatusSearch) | **GET** /voucherStatus | Find voucherStatus corresponding with sent data. The voucherStatus is used to coordinate integration processes. Requires setup done by Tripletex, currently supports debt collection.


# **voucherStatusGet**
> \Swagger\Client\Model\ResponseWrapperVoucherStatus voucherStatusGet($id, $fields)

Get voucherStatus by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\VoucherStatusApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->voucherStatusGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VoucherStatusApi->voucherStatusGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperVoucherStatus**](../Model/ResponseWrapperVoucherStatus.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **voucherStatusPost**
> \Swagger\Client\Model\ResponseWrapperVoucherStatus voucherStatusPost($body)

Post new voucherStatus.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\VoucherStatusApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\VoucherStatus(); // \Swagger\Client\Model\VoucherStatus | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->voucherStatusPost($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VoucherStatusApi->voucherStatusPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\VoucherStatus**](../Model/VoucherStatus.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperVoucherStatus**](../Model/ResponseWrapperVoucherStatus.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **voucherStatusSearch**
> \Swagger\Client\Model\ListResponseVoucherStatus voucherStatusSearch($ids, $voucher_ids, $status, $type, $from, $count, $sorting, $fields)

Find voucherStatus corresponding with sent data. The voucherStatus is used to coordinate integration processes. Requires setup done by Tripletex, currently supports debt collection.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\VoucherStatusApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ids = "ids_example"; // string | List of IDs
$voucher_ids = "voucher_ids_example"; // string | List of IDs
$status = "status_example"; // string | Equals
$type = "type_example"; // string | Equals
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->voucherStatusSearch($ids, $voucher_ids, $status, $type, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VoucherStatusApi->voucherStatusSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **ids** | **string**| List of IDs | [optional]
 **voucher_ids** | **string**| List of IDs | [optional]
 **status** | **string**| Equals | [optional]
 **type** | **string**| Equals | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseVoucherStatus**](../Model/ListResponseVoucherStatus.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

