# Swagger\Client\EmployeeemploymentleaveOfAbsenceTypeApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**employeeEmploymentLeaveOfAbsenceTypeSearch**](EmployeeemploymentleaveOfAbsenceTypeApi.md#employeeEmploymentLeaveOfAbsenceTypeSearch) | **GET** /employee/employment/leaveOfAbsenceType | Find all leave of absence type IDs.


# **employeeEmploymentLeaveOfAbsenceTypeSearch**
> \Swagger\Client\Model\ListResponseLeaveOfAbsenceType employeeEmploymentLeaveOfAbsenceTypeSearch($from, $count, $sorting, $fields)

Find all leave of absence type IDs.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\EmployeeemploymentleaveOfAbsenceTypeApi(
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
    $result = $apiInstance->employeeEmploymentLeaveOfAbsenceTypeSearch($from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmployeeemploymentleaveOfAbsenceTypeApi->employeeEmploymentLeaveOfAbsenceTypeSearch: ', $e->getMessage(), PHP_EOL;
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

[**\Swagger\Client\Model\ListResponseLeaveOfAbsenceType**](../Model/ListResponseLeaveOfAbsenceType.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

