# Swagger\Client\SalarytypeApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**salaryTypeGet**](SalarytypeApi.md#salaryTypeGet) | **GET** /salary/type/{id} | Find salary type by ID.
[**salaryTypeSearch**](SalarytypeApi.md#salaryTypeSearch) | **GET** /salary/type | Find salary type corresponding with sent data.


# **salaryTypeGet**
> \Swagger\Client\Model\ResponseWrapperSalaryType salaryTypeGet($id, $fields)

Find salary type by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\SalarytypeApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->salaryTypeGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SalarytypeApi->salaryTypeGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperSalaryType**](../Model/ResponseWrapperSalaryType.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **salaryTypeSearch**
> \Swagger\Client\Model\ListResponseSalaryType salaryTypeSearch($id, $number, $name, $description, $show_in_timesheet, $is_inactive, $employee_ids, $from, $count, $sorting, $fields)

Find salary type corresponding with sent data.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\SalarytypeApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = "id_example"; // string | List of IDs
$number = "number_example"; // string | Containing
$name = "name_example"; // string | Containing
$description = "description_example"; // string | Containing
$show_in_timesheet = true; // bool | Equals
$is_inactive = true; // bool | Equals
$employee_ids = "employee_ids_example"; // string | Equals
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->salaryTypeSearch($id, $number, $name, $description, $show_in_timesheet, $is_inactive, $employee_ids, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SalarytypeApi->salaryTypeSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| List of IDs | [optional]
 **number** | **string**| Containing | [optional]
 **name** | **string**| Containing | [optional]
 **description** | **string**| Containing | [optional]
 **show_in_timesheet** | **bool**| Equals | [optional]
 **is_inactive** | **bool**| Equals | [optional]
 **employee_ids** | **string**| Equals | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseSalaryType**](../Model/ListResponseSalaryType.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

