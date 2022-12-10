# Swagger\Client\TokenconsumerApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**tokenConsumerByTokenGetByToken**](TokenconsumerApi.md#tokenConsumerByTokenGetByToken) | **GET** /token/consumer/byToken | Get consumer token by token string.


# **tokenConsumerByTokenGetByToken**
> \Swagger\Client\Model\ResponseWrapperConsumerToken tokenConsumerByTokenGetByToken($token, $fields)

Get consumer token by token string.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TokenconsumerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$token = "token_example"; // string | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->tokenConsumerByTokenGetByToken($token, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TokenconsumerApi->tokenConsumerByTokenGetByToken: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **token** | **string**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperConsumerToken**](../Model/ResponseWrapperConsumerToken.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

