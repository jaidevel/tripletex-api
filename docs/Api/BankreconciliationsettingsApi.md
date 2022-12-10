# Swagger\Client\BankreconciliationsettingsApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**bankReconciliationSettingsGet**](BankreconciliationsettingsApi.md#bankReconciliationSettingsGet) | **GET** /bank/reconciliation/settings | Get bank reconciliation settings.
[**bankReconciliationSettingsPost**](BankreconciliationsettingsApi.md#bankReconciliationSettingsPost) | **POST** /bank/reconciliation/settings | Post bank reconciliation settings.
[**bankReconciliationSettingsPut**](BankreconciliationsettingsApi.md#bankReconciliationSettingsPut) | **PUT** /bank/reconciliation/settings/{id} | Update bank reconciliation settings.


# **bankReconciliationSettingsGet**
> \Swagger\Client\Model\ResponseWrapperBankReconciliationSettings bankReconciliationSettingsGet($fields)

Get bank reconciliation settings.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\BankreconciliationsettingsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->bankReconciliationSettingsGet($fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BankreconciliationsettingsApi->bankReconciliationSettingsGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperBankReconciliationSettings**](../Model/ResponseWrapperBankReconciliationSettings.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **bankReconciliationSettingsPost**
> \Swagger\Client\Model\ResponseWrapperBankReconciliationSettings bankReconciliationSettingsPost($body)

Post bank reconciliation settings.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\BankreconciliationsettingsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\BankReconciliationSettings(); // \Swagger\Client\Model\BankReconciliationSettings | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->bankReconciliationSettingsPost($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BankreconciliationsettingsApi->bankReconciliationSettingsPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\BankReconciliationSettings**](../Model/BankReconciliationSettings.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperBankReconciliationSettings**](../Model/ResponseWrapperBankReconciliationSettings.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **bankReconciliationSettingsPut**
> \Swagger\Client\Model\ResponseWrapperBankReconciliationSettings bankReconciliationSettingsPut($id, $body)

Update bank reconciliation settings.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\BankreconciliationsettingsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$body = new \Swagger\Client\Model\BankReconciliationSettings(); // \Swagger\Client\Model\BankReconciliationSettings | Partial object describing what should be updated

try {
    $result = $apiInstance->bankReconciliationSettingsPut($id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BankreconciliationsettingsApi->bankReconciliationSettingsPut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **body** | [**\Swagger\Client\Model\BankReconciliationSettings**](../Model/BankReconciliationSettings.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperBankReconciliationSettings**](../Model/ResponseWrapperBankReconciliationSettings.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

