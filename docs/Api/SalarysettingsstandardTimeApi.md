# Swagger\Client\SalarysettingsstandardTimeApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**salarySettingsStandardTimeByDateGetByDate**](SalarysettingsstandardTimeApi.md#salarySettingsStandardTimeByDateGetByDate) | **GET** /salary/settings/standardTime/byDate | Find standard time by date
[**salarySettingsStandardTimeGet**](SalarysettingsstandardTimeApi.md#salarySettingsStandardTimeGet) | **GET** /salary/settings/standardTime/{id} | Find standard time by ID.
[**salarySettingsStandardTimePost**](SalarysettingsstandardTimeApi.md#salarySettingsStandardTimePost) | **POST** /salary/settings/standardTime | Create standard time.
[**salarySettingsStandardTimePut**](SalarysettingsstandardTimeApi.md#salarySettingsStandardTimePut) | **PUT** /salary/settings/standardTime/{id} | Update standard time.
[**salarySettingsStandardTimeSearch**](SalarysettingsstandardTimeApi.md#salarySettingsStandardTimeSearch) | **GET** /salary/settings/standardTime | Get all standard times.


# **salarySettingsStandardTimeByDateGetByDate**
> \Swagger\Client\Model\ResponseWrapperCompanyStandardTime salarySettingsStandardTimeByDateGetByDate($date, $fields)

Find standard time by date



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\SalarysettingsstandardTimeApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$date = "date_example"; // string | yyyy-MM-dd. Defaults to today.
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->salarySettingsStandardTimeByDateGetByDate($date, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SalarysettingsstandardTimeApi->salarySettingsStandardTimeByDateGetByDate: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **date** | **string**| yyyy-MM-dd. Defaults to today. | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperCompanyStandardTime**](../Model/ResponseWrapperCompanyStandardTime.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **salarySettingsStandardTimeGet**
> \Swagger\Client\Model\ResponseWrapperCompanyStandardTime salarySettingsStandardTimeGet($id, $fields)

Find standard time by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\SalarysettingsstandardTimeApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->salarySettingsStandardTimeGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SalarysettingsstandardTimeApi->salarySettingsStandardTimeGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperCompanyStandardTime**](../Model/ResponseWrapperCompanyStandardTime.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **salarySettingsStandardTimePost**
> \Swagger\Client\Model\ResponseWrapperCompanyStandardTime salarySettingsStandardTimePost($body)

Create standard time.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\SalarysettingsstandardTimeApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\CompanyStandardTime(); // \Swagger\Client\Model\CompanyStandardTime | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->salarySettingsStandardTimePost($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SalarysettingsstandardTimeApi->salarySettingsStandardTimePost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\CompanyStandardTime**](../Model/CompanyStandardTime.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperCompanyStandardTime**](../Model/ResponseWrapperCompanyStandardTime.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **salarySettingsStandardTimePut**
> \Swagger\Client\Model\ResponseWrapperCompanyStandardTime salarySettingsStandardTimePut($id, $body)

Update standard time.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\SalarysettingsstandardTimeApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$body = new \Swagger\Client\Model\CompanyStandardTime(); // \Swagger\Client\Model\CompanyStandardTime | Partial object describing what should be updated

try {
    $result = $apiInstance->salarySettingsStandardTimePut($id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SalarysettingsstandardTimeApi->salarySettingsStandardTimePut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **body** | [**\Swagger\Client\Model\CompanyStandardTime**](../Model/CompanyStandardTime.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperCompanyStandardTime**](../Model/ResponseWrapperCompanyStandardTime.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **salarySettingsStandardTimeSearch**
> \Swagger\Client\Model\ListResponseCompanyStandardTime salarySettingsStandardTimeSearch($from, $count, $sorting, $fields)

Get all standard times.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\SalarysettingsstandardTimeApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->salarySettingsStandardTimeSearch($from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SalarysettingsstandardTimeApi->salarySettingsStandardTimeSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseCompanyStandardTime**](../Model/ListResponseCompanyStandardTime.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

