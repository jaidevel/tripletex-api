# Swagger\Client\TimesheetsettingsApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**timesheetSettingsGet**](TimesheetsettingsApi.md#timesheetSettingsGet) | **GET** /timesheet/settings | [BETA] Get timesheet settings of logged in company.


# **timesheetSettingsGet**
> \Swagger\Client\Model\ResponseWrapperTimesheetSettings timesheetSettingsGet($fields)

[BETA] Get timesheet settings of logged in company.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheetsettingsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->timesheetSettingsGet($fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimesheetsettingsApi->timesheetSettingsGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperTimesheetSettings**](../Model/ResponseWrapperTimesheetSettings.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

