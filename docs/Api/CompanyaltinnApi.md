# Swagger\Client\CompanyaltinnApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**companySettingsAltinnPut**](CompanyaltinnApi.md#companySettingsAltinnPut) | **PUT** /company/settings/altinn | Update AltInn id and password.
[**companySettingsAltinnSearch**](CompanyaltinnApi.md#companySettingsAltinnSearch) | **GET** /company/settings/altinn | Find Altinn id for login in company.


# **companySettingsAltinnPut**
> \Swagger\Client\Model\ResponseWrapperAltinnCompanyModule companySettingsAltinnPut($body)

Update AltInn id and password.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\CompanyaltinnApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\AltinnCompanyModule(); // \Swagger\Client\Model\AltinnCompanyModule | Partial object describing what should be updated

try {
    $result = $apiInstance->companySettingsAltinnPut($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompanyaltinnApi->companySettingsAltinnPut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\AltinnCompanyModule**](../Model/AltinnCompanyModule.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperAltinnCompanyModule**](../Model/ResponseWrapperAltinnCompanyModule.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **companySettingsAltinnSearch**
> \Swagger\Client\Model\ResponseWrapperAltinnCompanyModule companySettingsAltinnSearch($fields)

Find Altinn id for login in company.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\CompanyaltinnApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->companySettingsAltinnSearch($fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CompanyaltinnApi->companySettingsAltinnSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperAltinnCompanyModule**](../Model/ResponseWrapperAltinnCompanyModule.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

