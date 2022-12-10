# Swagger\Client\SalarycompilationApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**salaryCompilationGet**](SalarycompilationApi.md#salaryCompilationGet) | **GET** /salary/compilation | Find salary compilation by employee.
[**salaryCompilationPdfDownloadPdf**](SalarycompilationApi.md#salaryCompilationPdfDownloadPdf) | **GET** /salary/compilation/pdf | Find salary compilation (PDF document) by employee.


# **salaryCompilationGet**
> \Swagger\Client\Model\ResponseWrapperSalaryCompilation salaryCompilationGet($employee_id, $year, $fields)

Find salary compilation by employee.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\SalarycompilationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 56; // int | Element ID
$year = 56; // int | Must be between 1900-2100. Defaults to previous year.
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->salaryCompilationGet($employee_id, $year, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SalarycompilationApi->salaryCompilationGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **employee_id** | **int**| Element ID |
 **year** | **int**| Must be between 1900-2100. Defaults to previous year. | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperSalaryCompilation**](../Model/ResponseWrapperSalaryCompilation.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **salaryCompilationPdfDownloadPdf**
> string salaryCompilationPdfDownloadPdf($employee_id, $year)

Find salary compilation (PDF document) by employee.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\SalarycompilationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 56; // int | Element ID
$year = 56; // int | Must be between 1900-2100. Defaults to previous year.

try {
    $result = $apiInstance->salaryCompilationPdfDownloadPdf($employee_id, $year);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SalarycompilationApi->salaryCompilationPdfDownloadPdf: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **employee_id** | **int**| Element ID |
 **year** | **int**| Must be between 1900-2100. Defaults to previous year. | [optional]

### Return type

**string**

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/octet-stream

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

