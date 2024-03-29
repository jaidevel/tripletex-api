# Swagger\Client\EmployeeemploymentleaveOfAbsenceApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**employeeEmploymentLeaveOfAbsenceGet**](EmployeeemploymentleaveOfAbsenceApi.md#employeeEmploymentLeaveOfAbsenceGet) | **GET** /employee/employment/leaveOfAbsence/{id} | Find leave of absence by ID.
[**employeeEmploymentLeaveOfAbsenceListPostList**](EmployeeemploymentleaveOfAbsenceApi.md#employeeEmploymentLeaveOfAbsenceListPostList) | **POST** /employee/employment/leaveOfAbsence/list | Create multiple leave of absences.
[**employeeEmploymentLeaveOfAbsencePost**](EmployeeemploymentleaveOfAbsenceApi.md#employeeEmploymentLeaveOfAbsencePost) | **POST** /employee/employment/leaveOfAbsence | Create leave of absence.
[**employeeEmploymentLeaveOfAbsencePut**](EmployeeemploymentleaveOfAbsenceApi.md#employeeEmploymentLeaveOfAbsencePut) | **PUT** /employee/employment/leaveOfAbsence/{id} | Update leave of absence.
[**employeeEmploymentLeaveOfAbsenceSearch**](EmployeeemploymentleaveOfAbsenceApi.md#employeeEmploymentLeaveOfAbsenceSearch) | **GET** /employee/employment/leaveOfAbsence | Find all leave of absence corresponding with the sent data.


# **employeeEmploymentLeaveOfAbsenceGet**
> \Swagger\Client\Model\ResponseWrapperLeaveOfAbsence employeeEmploymentLeaveOfAbsenceGet($id, $fields)

Find leave of absence by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\EmployeeemploymentleaveOfAbsenceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->employeeEmploymentLeaveOfAbsenceGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmployeeemploymentleaveOfAbsenceApi->employeeEmploymentLeaveOfAbsenceGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperLeaveOfAbsence**](../Model/ResponseWrapperLeaveOfAbsence.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **employeeEmploymentLeaveOfAbsenceListPostList**
> \Swagger\Client\Model\ListResponseLeaveOfAbsence employeeEmploymentLeaveOfAbsenceListPostList($body)

Create multiple leave of absences.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\EmployeeemploymentleaveOfAbsenceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\LeaveOfAbsence()); // \Swagger\Client\Model\LeaveOfAbsence[] | JSON representing a list of new objects to be created. Should not have ID and version set.

try {
    $result = $apiInstance->employeeEmploymentLeaveOfAbsenceListPostList($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmployeeemploymentleaveOfAbsenceApi->employeeEmploymentLeaveOfAbsenceListPostList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\LeaveOfAbsence[]**](../Model/LeaveOfAbsence.md)| JSON representing a list of new objects to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseLeaveOfAbsence**](../Model/ListResponseLeaveOfAbsence.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **employeeEmploymentLeaveOfAbsencePost**
> \Swagger\Client\Model\ResponseWrapperLeaveOfAbsence employeeEmploymentLeaveOfAbsencePost($body)

Create leave of absence.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\EmployeeemploymentleaveOfAbsenceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\LeaveOfAbsence(); // \Swagger\Client\Model\LeaveOfAbsence | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->employeeEmploymentLeaveOfAbsencePost($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmployeeemploymentleaveOfAbsenceApi->employeeEmploymentLeaveOfAbsencePost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\LeaveOfAbsence**](../Model/LeaveOfAbsence.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperLeaveOfAbsence**](../Model/ResponseWrapperLeaveOfAbsence.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **employeeEmploymentLeaveOfAbsencePut**
> \Swagger\Client\Model\ResponseWrapperLeaveOfAbsence employeeEmploymentLeaveOfAbsencePut($id, $body)

Update leave of absence.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\EmployeeemploymentleaveOfAbsenceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$body = new \Swagger\Client\Model\LeaveOfAbsence(); // \Swagger\Client\Model\LeaveOfAbsence | Partial object describing what should be updated

try {
    $result = $apiInstance->employeeEmploymentLeaveOfAbsencePut($id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmployeeemploymentleaveOfAbsenceApi->employeeEmploymentLeaveOfAbsencePut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **body** | [**\Swagger\Client\Model\LeaveOfAbsence**](../Model/LeaveOfAbsence.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperLeaveOfAbsence**](../Model/ResponseWrapperLeaveOfAbsence.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **employeeEmploymentLeaveOfAbsenceSearch**
> \Swagger\Client\Model\ListResponseLeaveOfAbsence employeeEmploymentLeaveOfAbsenceSearch($employment_ids, $date, $min_percentage, $max_percentage, $from, $count, $sorting, $fields)

Find all leave of absence corresponding with the sent data.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\EmployeeemploymentleaveOfAbsenceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employment_ids = "employment_ids_example"; // string | List of IDs
$date = "date_example"; // string | yyyy-MM-dd. Defaults to today.
$min_percentage = 0; // int | Must be between 0-100.
$max_percentage = 100; // int | Must be between 0-100.
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->employeeEmploymentLeaveOfAbsenceSearch($employment_ids, $date, $min_percentage, $max_percentage, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmployeeemploymentleaveOfAbsenceApi->employeeEmploymentLeaveOfAbsenceSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **employment_ids** | **string**| List of IDs | [optional]
 **date** | **string**| yyyy-MM-dd. Defaults to today. | [optional]
 **min_percentage** | **int**| Must be between 0-100. | [optional] [default to 0]
 **max_percentage** | **int**| Must be between 0-100. | [optional] [default to 100]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseLeaveOfAbsence**](../Model/ListResponseLeaveOfAbsence.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

