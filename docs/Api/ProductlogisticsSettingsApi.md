# Swagger\Client\ProductlogisticsSettingsApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**productLogisticsSettingsGet**](ProductlogisticsSettingsApi.md#productLogisticsSettingsGet) | **GET** /product/logisticsSettings | [BETA] Get logistics settings of logged in company.
[**productLogisticsSettingsPut**](ProductlogisticsSettingsApi.md#productLogisticsSettingsPut) | **PUT** /product/logisticsSettings | [BETA] Update logistics settings of logged in company.


# **productLogisticsSettingsGet**
> \Swagger\Client\Model\ResponseWrapperLogisticsSettings productLogisticsSettingsGet($fields)

[BETA] Get logistics settings of logged in company.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProductlogisticsSettingsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->productLogisticsSettingsGet($fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductlogisticsSettingsApi->productLogisticsSettingsGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperLogisticsSettings**](../Model/ResponseWrapperLogisticsSettings.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **productLogisticsSettingsPut**
> \Swagger\Client\Model\ResponseWrapperLogisticsSettings productLogisticsSettingsPut($body)

[BETA] Update logistics settings of logged in company.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProductlogisticsSettingsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\LogisticsSettings(); // \Swagger\Client\Model\LogisticsSettings | Partial object describing what should be updated

try {
    $result = $apiInstance->productLogisticsSettingsPut($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductlogisticsSettingsApi->productLogisticsSettingsPut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\LogisticsSettings**](../Model/LogisticsSettings.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperLogisticsSettings**](../Model/ResponseWrapperLogisticsSettings.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

