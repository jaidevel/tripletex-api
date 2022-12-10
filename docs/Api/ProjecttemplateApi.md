# Swagger\Client\ProjecttemplateApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**projectTemplateGet**](ProjecttemplateApi.md#projectTemplateGet) | **GET** /project/template/{id} | Get project template by ID.


# **projectTemplateGet**
> \Swagger\Client\Model\ResponseWrapperProjectTemplate projectTemplateGet($id, $fields)

Get project template by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProjecttemplateApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "*"; // string | Fields filter pattern

try {
    $result = $apiInstance->projectTemplateGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjecttemplateApi->projectTemplateGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional] [default to *]

### Return type

[**\Swagger\Client\Model\ResponseWrapperProjectTemplate**](../Model/ResponseWrapperProjectTemplate.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

