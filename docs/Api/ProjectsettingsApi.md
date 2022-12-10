# Swagger\Client\ProjectsettingsApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**projectSettingsGet**](ProjectsettingsApi.md#projectSettingsGet) | **GET** /project/settings | Get project settings of logged in company.
[**projectSettingsPut**](ProjectsettingsApi.md#projectSettingsPut) | **PUT** /project/settings | Update project settings for company


# **projectSettingsGet**
> \Swagger\Client\Model\ResponseWrapperProjectSettings projectSettingsGet($use_nkode, $fields)

Get project settings of logged in company.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProjectsettingsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$use_nkode = false; // bool | Equals
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->projectSettingsGet($use_nkode, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsettingsApi->projectSettingsGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **use_nkode** | **bool**| Equals | [optional] [default to false]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperProjectSettings**](../Model/ResponseWrapperProjectSettings.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **projectSettingsPut**
> \Swagger\Client\Model\ResponseWrapperProjectSettings projectSettingsPut($body)

Update project settings for company



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProjectsettingsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\ProjectSettings(); // \Swagger\Client\Model\ProjectSettings | Partial object describing what should be updated

try {
    $result = $apiInstance->projectSettingsPut($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsettingsApi->projectSettingsPut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\ProjectSettings**](../Model/ProjectSettings.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperProjectSettings**](../Model/ResponseWrapperProjectSettings.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

