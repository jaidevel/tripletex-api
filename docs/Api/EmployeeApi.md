# Swagger\Client\EmployeeApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**employeeGet**](EmployeeApi.md#employeeGet) | **GET** /employee/{id} | Get employee by ID.
[**employeeListPostList**](EmployeeApi.md#employeeListPostList) | **POST** /employee/list | Create several employees.
[**employeePost**](EmployeeApi.md#employeePost) | **POST** /employee | Create one employee.
[**employeePut**](EmployeeApi.md#employeePut) | **PUT** /employee/{id} | Update employee.
[**employeeSearch**](EmployeeApi.md#employeeSearch) | **GET** /employee | Find employees corresponding with sent data.


# **employeeGet**
> \Swagger\Client\Model\ResponseWrapperEmployee employeeGet($id, $fields)

Get employee by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\EmployeeApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->employeeGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmployeeApi->employeeGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperEmployee**](../Model/ResponseWrapperEmployee.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **employeeListPostList**
> \Swagger\Client\Model\ListResponseEmployee employeeListPostList($body)

Create several employees.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\EmployeeApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\Employee()); // \Swagger\Client\Model\Employee[] | JSON representing a list of new objects to be created. Should not have ID and version set.

try {
    $result = $apiInstance->employeeListPostList($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmployeeApi->employeeListPostList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\Employee[]**](../Model/Employee.md)| JSON representing a list of new objects to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseEmployee**](../Model/ListResponseEmployee.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **employeePost**
> \Swagger\Client\Model\ResponseWrapperEmployee employeePost($body)

Create one employee.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\EmployeeApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\Employee(); // \Swagger\Client\Model\Employee | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->employeePost($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmployeeApi->employeePost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\Employee**](../Model/Employee.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperEmployee**](../Model/ResponseWrapperEmployee.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **employeePut**
> \Swagger\Client\Model\ResponseWrapperEmployee employeePut($id, $body)

Update employee.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\EmployeeApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$body = new \Swagger\Client\Model\Employee(); // \Swagger\Client\Model\Employee | Partial object describing what should be updated

try {
    $result = $apiInstance->employeePut($id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmployeeApi->employeePut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **body** | [**\Swagger\Client\Model\Employee**](../Model/Employee.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperEmployee**](../Model/ResponseWrapperEmployee.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **employeeSearch**
> \Swagger\Client\Model\ListResponseEmployee employeeSearch($id, $first_name, $last_name, $employee_number, $email, $allow_information_registration, $include_contacts, $department_id, $only_project_managers, $only_contacts, $assignable_project_managers, $period_start, $period_end, $has_system_access, $from, $count, $sorting, $fields)

Find employees corresponding with sent data.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\EmployeeApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = "id_example"; // string | List of IDs
$first_name = "first_name_example"; // string | Containing
$last_name = "last_name_example"; // string | Containing
$employee_number = "employee_number_example"; // string | Containing
$email = "email_example"; // string | Containing
$allow_information_registration = true; // bool | Equals
$include_contacts = false; // bool | Equals
$department_id = "department_id_example"; // string | List of IDs
$only_project_managers = true; // bool | Equals
$only_contacts = false; // bool | Equals
$assignable_project_managers = true; // bool | Equals
$period_start = "period_start_example"; // string | Equals
$period_end = "period_end_example"; // string | Equals
$has_system_access = true; // bool | Equals
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->employeeSearch($id, $first_name, $last_name, $employee_number, $email, $allow_information_registration, $include_contacts, $department_id, $only_project_managers, $only_contacts, $assignable_project_managers, $period_start, $period_end, $has_system_access, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmployeeApi->employeeSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| List of IDs | [optional]
 **first_name** | **string**| Containing | [optional]
 **last_name** | **string**| Containing | [optional]
 **employee_number** | **string**| Containing | [optional]
 **email** | **string**| Containing | [optional]
 **allow_information_registration** | **bool**| Equals | [optional]
 **include_contacts** | **bool**| Equals | [optional] [default to false]
 **department_id** | **string**| List of IDs | [optional]
 **only_project_managers** | **bool**| Equals | [optional]
 **only_contacts** | **bool**| Equals | [optional] [default to false]
 **assignable_project_managers** | **bool**| Equals | [optional]
 **period_start** | **string**| Equals | [optional]
 **period_end** | **string**| Equals | [optional]
 **has_system_access** | **bool**| Equals | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseEmployee**](../Model/ListResponseEmployee.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

