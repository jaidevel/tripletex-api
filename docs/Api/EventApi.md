# Swagger\Client\EventApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**eventExample**](EventApi.md#eventExample) | **GET** /event/{eventType} | [BETA] Get example webhook payload
[**eventGet**](EventApi.md#eventGet) | **GET** /event | [BETA] Get all (WebHook) event keys.


# **eventExample**
> \Swagger\Client\Model\ResponseWrapperEventInfoDTO eventExample($event_type, $fields)

[BETA] Get example webhook payload



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\EventApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$event_type = "event_type_example"; // string | Event type, from /event endpoint
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->eventExample($event_type, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EventApi->eventExample: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **event_type** | **string**| Event type, from /event endpoint |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperEventInfoDTO**](../Model/ResponseWrapperEventInfoDTO.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **eventGet**
> \Swagger\Client\Model\ResponseWrapperMapStringEventInfoDescription eventGet($fields)

[BETA] Get all (WebHook) event keys.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\EventApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->eventGet($fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EventApi->eventGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperMapStringEventInfoDescription**](../Model/ResponseWrapperMapStringEventInfoDescription.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

