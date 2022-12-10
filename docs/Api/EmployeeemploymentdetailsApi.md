# Swagger\Client\EmployeeemploymentdetailsApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**employeeEmploymentDetailsGet**](EmployeeemploymentdetailsApi.md#employeeEmploymentDetailsGet) | **GET** /employee/employment/details/{id} | Find employment details by ID.
[**employeeEmploymentDetailsPost**](EmployeeemploymentdetailsApi.md#employeeEmploymentDetailsPost) | **POST** /employee/employment/details | Create employment details.
[**employeeEmploymentDetailsPut**](EmployeeemploymentdetailsApi.md#employeeEmploymentDetailsPut) | **PUT** /employee/employment/details/{id} | Update employment details.
[**employeeEmploymentDetailsSearch**](EmployeeemploymentdetailsApi.md#employeeEmploymentDetailsSearch) | **GET** /employee/employment/details | Find all employmentdetails for employment.


# **employeeEmploymentDetailsGet**
> \Swagger\Client\Model\ResponseWrapperEmploymentDetails employeeEmploymentDetailsGet($id, $fields)

Find employment details by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\EmployeeemploymentdetailsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->employeeEmploymentDetailsGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmployeeemploymentdetailsApi->employeeEmploymentDetailsGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperEmploymentDetails**](../Model/ResponseWrapperEmploymentDetails.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **employeeEmploymentDetailsPost**
> \Swagger\Client\Model\ResponseWrapperEmploymentDetails employeeEmploymentDetailsPost($body)

Create employment details.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\EmployeeemploymentdetailsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\EmploymentDetails(); // \Swagger\Client\Model\EmploymentDetails | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->employeeEmploymentDetailsPost($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmployeeemploymentdetailsApi->employeeEmploymentDetailsPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\EmploymentDetails**](../Model/EmploymentDetails.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperEmploymentDetails**](../Model/ResponseWrapperEmploymentDetails.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **employeeEmploymentDetailsPut**
> \Swagger\Client\Model\ResponseWrapperEmploymentDetails employeeEmploymentDetailsPut($id, $body)

Update employment details.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\EmployeeemploymentdetailsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$body = new \Swagger\Client\Model\EmploymentDetails(); // \Swagger\Client\Model\EmploymentDetails | Partial object describing what should be updated

try {
    $result = $apiInstance->employeeEmploymentDetailsPut($id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmployeeemploymentdetailsApi->employeeEmploymentDetailsPut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **body** | [**\Swagger\Client\Model\EmploymentDetails**](../Model/EmploymentDetails.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperEmploymentDetails**](../Model/ResponseWrapperEmploymentDetails.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **employeeEmploymentDetailsSearch**
> \Swagger\Client\Model\ListResponseEmploymentDetails employeeEmploymentDetailsSearch($employment_id, $from, $count, $sorting, $fields)

Find all employmentdetails for employment.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\EmployeeemploymentdetailsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employment_id = "employment_id_example"; // string | List of IDs
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->employeeEmploymentDetailsSearch($employment_id, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmployeeemploymentdetailsApi->employeeEmploymentDetailsSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **employment_id** | **string**| List of IDs | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseEmploymentDetails**](../Model/ListResponseEmploymentDetails.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

