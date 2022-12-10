# Swagger\Client\TimesheetsalaryProjectTypeSpecificationApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**timesheetSalaryProjectTypeSpecificationDelete**](TimesheetsalaryProjectTypeSpecificationApi.md#timesheetSalaryProjectTypeSpecificationDelete) | **DELETE** /timesheet/salaryProjectTypeSpecification/{id} | [BETA] Delete a timesheet SalaryType Specification (PILOT USERS ONLY)
[**timesheetSalaryProjectTypeSpecificationGet**](TimesheetsalaryProjectTypeSpecificationApi.md#timesheetSalaryProjectTypeSpecificationGet) | **GET** /timesheet/salaryProjectTypeSpecification/{id} | [BETA] Get timesheet ProjectSalaryType Specification for a specific ID (PILOT USERS ONLY)
[**timesheetSalaryProjectTypeSpecificationPost**](TimesheetsalaryProjectTypeSpecificationApi.md#timesheetSalaryProjectTypeSpecificationPost) | **POST** /timesheet/salaryProjectTypeSpecification | [BETA] Create a timesheet ProjectSalaryType Specification. (PILOT USERS ONLY)
[**timesheetSalaryProjectTypeSpecificationPut**](TimesheetsalaryProjectTypeSpecificationApi.md#timesheetSalaryProjectTypeSpecificationPut) | **PUT** /timesheet/salaryProjectTypeSpecification/{id} | [BETA] Update a timesheet ProjectSalaryType Specification (PILOT USERS ONLY)
[**timesheetSalaryProjectTypeSpecificationSearch**](TimesheetsalaryProjectTypeSpecificationApi.md#timesheetSalaryProjectTypeSpecificationSearch) | **GET** /timesheet/salaryProjectTypeSpecification | [BETA] Get list of timesheet ProjectSalaryType Specifications (PILOT USERS ONLY)


# **timesheetSalaryProjectTypeSpecificationDelete**
> timesheetSalaryProjectTypeSpecificationDelete($id)

[BETA] Delete a timesheet SalaryType Specification (PILOT USERS ONLY)



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheetsalaryProjectTypeSpecificationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID

try {
    $apiInstance->timesheetSalaryProjectTypeSpecificationDelete($id);
} catch (Exception $e) {
    echo 'Exception when calling TimesheetsalaryProjectTypeSpecificationApi->timesheetSalaryProjectTypeSpecificationDelete: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |

### Return type

void (empty response body)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **timesheetSalaryProjectTypeSpecificationGet**
> \Swagger\Client\Model\ResponseWrapperTimesheetProjectSalaryTypeSpecification timesheetSalaryProjectTypeSpecificationGet($id, $fields)

[BETA] Get timesheet ProjectSalaryType Specification for a specific ID (PILOT USERS ONLY)



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheetsalaryProjectTypeSpecificationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->timesheetSalaryProjectTypeSpecificationGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimesheetsalaryProjectTypeSpecificationApi->timesheetSalaryProjectTypeSpecificationGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperTimesheetProjectSalaryTypeSpecification**](../Model/ResponseWrapperTimesheetProjectSalaryTypeSpecification.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **timesheetSalaryProjectTypeSpecificationPost**
> \Swagger\Client\Model\ResponseWrapperTimesheetProjectSalaryTypeSpecification timesheetSalaryProjectTypeSpecificationPost($body)

[BETA] Create a timesheet ProjectSalaryType Specification. (PILOT USERS ONLY)



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheetsalaryProjectTypeSpecificationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\TimesheetProjectSalaryTypeSpecification(); // \Swagger\Client\Model\TimesheetProjectSalaryTypeSpecification | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->timesheetSalaryProjectTypeSpecificationPost($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimesheetsalaryProjectTypeSpecificationApi->timesheetSalaryProjectTypeSpecificationPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\TimesheetProjectSalaryTypeSpecification**](../Model/TimesheetProjectSalaryTypeSpecification.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperTimesheetProjectSalaryTypeSpecification**](../Model/ResponseWrapperTimesheetProjectSalaryTypeSpecification.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **timesheetSalaryProjectTypeSpecificationPut**
> \Swagger\Client\Model\ResponseWrapperTimesheetProjectSalaryTypeSpecification timesheetSalaryProjectTypeSpecificationPut($id, $body)

[BETA] Update a timesheet ProjectSalaryType Specification (PILOT USERS ONLY)



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheetsalaryProjectTypeSpecificationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$body = new \Swagger\Client\Model\TimesheetProjectSalaryTypeSpecification(); // \Swagger\Client\Model\TimesheetProjectSalaryTypeSpecification | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->timesheetSalaryProjectTypeSpecificationPut($id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimesheetsalaryProjectTypeSpecificationApi->timesheetSalaryProjectTypeSpecificationPut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **body** | [**\Swagger\Client\Model\TimesheetProjectSalaryTypeSpecification**](../Model/TimesheetProjectSalaryTypeSpecification.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperTimesheetProjectSalaryTypeSpecification**](../Model/ResponseWrapperTimesheetProjectSalaryTypeSpecification.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **timesheetSalaryProjectTypeSpecificationSearch**
> \Swagger\Client\Model\ListResponseTimesheetProjectSalaryTypeSpecification timesheetSalaryProjectTypeSpecificationSearch($date_from, $date_to, $employee_id, $project_id, $from, $count, $sorting, $fields)

[BETA] Get list of timesheet ProjectSalaryType Specifications (PILOT USERS ONLY)



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TimesheetsalaryProjectTypeSpecificationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$date_from = "date_from_example"; // string | From and including
$date_to = "date_to_example"; // string | To and excluding
$employee_id = 56; // int | Equals
$project_id = 56; // int | Equals
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->timesheetSalaryProjectTypeSpecificationSearch($date_from, $date_to, $employee_id, $project_id, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TimesheetsalaryProjectTypeSpecificationApi->timesheetSalaryProjectTypeSpecificationSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **date_from** | **string**| From and including | [optional]
 **date_to** | **string**| To and excluding | [optional]
 **employee_id** | **int**| Equals | [optional]
 **project_id** | **int**| Equals | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseTimesheetProjectSalaryTypeSpecification**](../Model/ListResponseTimesheetProjectSalaryTypeSpecification.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

