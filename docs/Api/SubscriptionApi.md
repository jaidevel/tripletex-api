# Swagger\Client\SubscriptionApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**subscriptionAdditionalOrderLinesGetAdditionalOrderLines**](SubscriptionApi.md#subscriptionAdditionalOrderLinesGetAdditionalOrderLines) | **GET** /subscription/additionalOrderLines | Returns the additional order lines for an account.
[**subscriptionInvoiceHistoryGetInvoiceHistory**](SubscriptionApi.md#subscriptionInvoiceHistoryGetInvoiceHistory) | **GET** /subscription/invoiceHistory | Returns the invoice history for an account.
[**subscriptionPackagesGetPackages**](SubscriptionApi.md#subscriptionPackagesGetPackages) | **GET** /subscription/packages | Returns the packages that can exist for an account.
[**subscriptionServicesGetServices**](SubscriptionApi.md#subscriptionServicesGetServices) | **GET** /subscription/services | Returns the services that are available for an account.


# **subscriptionAdditionalOrderLinesGetAdditionalOrderLines**
> \Swagger\Client\Model\ResponseWrapperAdditionalServiceOrderLineDTO_ subscriptionAdditionalOrderLinesGetAdditionalOrderLines($fields)

Returns the additional order lines for an account.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\SubscriptionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->subscriptionAdditionalOrderLinesGetAdditionalOrderLines($fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubscriptionApi->subscriptionAdditionalOrderLinesGetAdditionalOrderLines: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperAdditionalServiceOrderLineDTO_**](../Model/ResponseWrapperAdditionalServiceOrderLineDTO_.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **subscriptionInvoiceHistoryGetInvoiceHistory**
> \Swagger\Client\Model\ResponseWrapperInvoiceOrderLineDTO_ subscriptionInvoiceHistoryGetInvoiceHistory($fields)

Returns the invoice history for an account.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\SubscriptionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->subscriptionInvoiceHistoryGetInvoiceHistory($fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubscriptionApi->subscriptionInvoiceHistoryGetInvoiceHistory: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperInvoiceOrderLineDTO_**](../Model/ResponseWrapperInvoiceOrderLineDTO_.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **subscriptionPackagesGetPackages**
> \Swagger\Client\Model\ResponseWrapperMySubscriptionModuleDTO_ subscriptionPackagesGetPackages($fields)

Returns the packages that can exist for an account.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\SubscriptionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->subscriptionPackagesGetPackages($fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubscriptionApi->subscriptionPackagesGetPackages: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperMySubscriptionModuleDTO_**](../Model/ResponseWrapperMySubscriptionModuleDTO_.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **subscriptionServicesGetServices**
> \Swagger\Client\Model\ResponseWrapperMySubscriptionModuleDTO_ subscriptionServicesGetServices($fields)

Returns the services that are available for an account.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\SubscriptionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->subscriptionServicesGetServices($fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SubscriptionApi->subscriptionServicesGetServices: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperMySubscriptionModuleDTO_**](../Model/ResponseWrapperMySubscriptionModuleDTO_.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

