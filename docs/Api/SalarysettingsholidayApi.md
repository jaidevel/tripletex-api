# Swagger\Client\SalarysettingsholidayApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**salarySettingsHolidayListDeleteByIds**](SalarysettingsholidayApi.md#salarySettingsHolidayListDeleteByIds) | **DELETE** /salary/settings/holiday/list | Delete multiple holiday settings of current logged in company.
[**salarySettingsHolidayListPostList**](SalarysettingsholidayApi.md#salarySettingsHolidayListPostList) | **POST** /salary/settings/holiday/list | Create multiple holiday settings of current logged in company.
[**salarySettingsHolidayListPutList**](SalarysettingsholidayApi.md#salarySettingsHolidayListPutList) | **PUT** /salary/settings/holiday/list | Update multiple holiday settings of current logged in company.
[**salarySettingsHolidayPost**](SalarysettingsholidayApi.md#salarySettingsHolidayPost) | **POST** /salary/settings/holiday | Create a holiday setting of current logged in company.
[**salarySettingsHolidayPut**](SalarysettingsholidayApi.md#salarySettingsHolidayPut) | **PUT** /salary/settings/holiday/{id} | Update a holiday setting of current logged in company.
[**salarySettingsHolidaySearch**](SalarysettingsholidayApi.md#salarySettingsHolidaySearch) | **GET** /salary/settings/holiday | Find holiday settings of current logged in company.


# **salarySettingsHolidayListDeleteByIds**
> salarySettingsHolidayListDeleteByIds($ids)

Delete multiple holiday settings of current logged in company.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\SalarysettingsholidayApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ids = "ids_example"; // string | ID of the elements

try {
    $apiInstance->salarySettingsHolidayListDeleteByIds($ids);
} catch (Exception $e) {
    echo 'Exception when calling SalarysettingsholidayApi->salarySettingsHolidayListDeleteByIds: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **ids** | **string**| ID of the elements |

### Return type

void (empty response body)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **salarySettingsHolidayListPostList**
> \Swagger\Client\Model\ListResponseCompanyHoliday salarySettingsHolidayListPostList($body)

Create multiple holiday settings of current logged in company.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\SalarysettingsholidayApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\CompanyHoliday()); // \Swagger\Client\Model\CompanyHoliday[] | JSON representing a list of new objects to be created. Should not have ID and version set.

try {
    $result = $apiInstance->salarySettingsHolidayListPostList($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SalarysettingsholidayApi->salarySettingsHolidayListPostList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\CompanyHoliday[]**](../Model/CompanyHoliday.md)| JSON representing a list of new objects to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseCompanyHoliday**](../Model/ListResponseCompanyHoliday.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **salarySettingsHolidayListPutList**
> \Swagger\Client\Model\ListResponseCompanyHoliday salarySettingsHolidayListPutList($body)

Update multiple holiday settings of current logged in company.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\SalarysettingsholidayApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\CompanyHoliday()); // \Swagger\Client\Model\CompanyHoliday[] | JSON representing updates to objects. Should have ID and version set.

try {
    $result = $apiInstance->salarySettingsHolidayListPutList($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SalarysettingsholidayApi->salarySettingsHolidayListPutList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\CompanyHoliday[]**](../Model/CompanyHoliday.md)| JSON representing updates to objects. Should have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseCompanyHoliday**](../Model/ListResponseCompanyHoliday.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **salarySettingsHolidayPost**
> \Swagger\Client\Model\ResponseWrapperCompanyHoliday salarySettingsHolidayPost($body)

Create a holiday setting of current logged in company.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\SalarysettingsholidayApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\CompanyHoliday(); // \Swagger\Client\Model\CompanyHoliday | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->salarySettingsHolidayPost($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SalarysettingsholidayApi->salarySettingsHolidayPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\CompanyHoliday**](../Model/CompanyHoliday.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperCompanyHoliday**](../Model/ResponseWrapperCompanyHoliday.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **salarySettingsHolidayPut**
> \Swagger\Client\Model\ResponseWrapperCompanyHoliday salarySettingsHolidayPut($id, $body)

Update a holiday setting of current logged in company.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\SalarysettingsholidayApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$body = new \Swagger\Client\Model\CompanyHoliday(); // \Swagger\Client\Model\CompanyHoliday | Partial object describing what should be updated

try {
    $result = $apiInstance->salarySettingsHolidayPut($id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SalarysettingsholidayApi->salarySettingsHolidayPut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **body** | [**\Swagger\Client\Model\CompanyHoliday**](../Model/CompanyHoliday.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperCompanyHoliday**](../Model/ResponseWrapperCompanyHoliday.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **salarySettingsHolidaySearch**
> \Swagger\Client\Model\ListResponseCompanyHoliday salarySettingsHolidaySearch($from, $count, $sorting, $fields)

Find holiday settings of current logged in company.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\SalarysettingsholidayApi(
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
    $result = $apiInstance->salarySettingsHolidaySearch($from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SalarysettingsholidayApi->salarySettingsHolidaySearch: ', $e->getMessage(), PHP_EOL;
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

[**\Swagger\Client\Model\ListResponseCompanyHoliday**](../Model/ListResponseCompanyHoliday.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

