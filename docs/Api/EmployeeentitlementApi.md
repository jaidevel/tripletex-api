# Swagger\Client\EmployeeentitlementApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**employeeEntitlementClientClient**](EmployeeentitlementApi.md#employeeEntitlementClientClient) | **GET** /employee/entitlement/client | [BETA] Find all entitlements at client for user.
[**employeeEntitlementGet**](EmployeeentitlementApi.md#employeeEntitlementGet) | **GET** /employee/entitlement/{id} | Get entitlement by ID.
[**employeeEntitlementGrantClientEntitlementsByTemplateGrantClientEntitlementsByTemplate**](EmployeeentitlementApi.md#employeeEntitlementGrantClientEntitlementsByTemplateGrantClientEntitlementsByTemplate) | **PUT** /employee/entitlement/:grantClientEntitlementsByTemplate | [BETA] Update employee entitlements in client account.
[**employeeEntitlementGrantEntitlementsByTemplateGrantEntitlementsByTemplate**](EmployeeentitlementApi.md#employeeEntitlementGrantEntitlementsByTemplateGrantEntitlementsByTemplate) | **PUT** /employee/entitlement/:grantEntitlementsByTemplate | [BETA] Update employee entitlements.
[**employeeEntitlementSearch**](EmployeeentitlementApi.md#employeeEntitlementSearch) | **GET** /employee/entitlement | Find all entitlements for user.


# **employeeEntitlementClientClient**
> \Swagger\Client\Model\ListResponseEntitlement employeeEntitlementClientClient($employee_id, $customer_id, $from, $count, $sorting, $fields)

[BETA] Find all entitlements at client for user.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\EmployeeentitlementApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 56; // int | Employee ID. Defaults to ID of token owner.
$customer_id = 56; // int | Client ID
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->employeeEntitlementClientClient($employee_id, $customer_id, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmployeeentitlementApi->employeeEntitlementClientClient: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **employee_id** | **int**| Employee ID. Defaults to ID of token owner. | [optional]
 **customer_id** | **int**| Client ID | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseEntitlement**](../Model/ListResponseEntitlement.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **employeeEntitlementGet**
> \Swagger\Client\Model\ResponseWrapperEntitlement employeeEntitlementGet($id, $fields)

Get entitlement by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\EmployeeentitlementApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->employeeEntitlementGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmployeeentitlementApi->employeeEntitlementGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperEntitlement**](../Model/ResponseWrapperEntitlement.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **employeeEntitlementGrantClientEntitlementsByTemplateGrantClientEntitlementsByTemplate**
> employeeEntitlementGrantClientEntitlementsByTemplateGrantClientEntitlementsByTemplate($employee_id, $customer_id, $template, $add_to_existing)

[BETA] Update employee entitlements in client account.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\EmployeeentitlementApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 56; // int | Employee ID
$customer_id = 56; // int | Client ID
$template = "template_example"; // string | Template
$add_to_existing = false; // bool | Add template to existing entitlements

try {
    $apiInstance->employeeEntitlementGrantClientEntitlementsByTemplateGrantClientEntitlementsByTemplate($employee_id, $customer_id, $template, $add_to_existing);
} catch (Exception $e) {
    echo 'Exception when calling EmployeeentitlementApi->employeeEntitlementGrantClientEntitlementsByTemplateGrantClientEntitlementsByTemplate: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **employee_id** | **int**| Employee ID |
 **customer_id** | **int**| Client ID |
 **template** | **string**| Template |
 **add_to_existing** | **bool**| Add template to existing entitlements | [optional] [default to false]

### Return type

void (empty response body)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **employeeEntitlementGrantEntitlementsByTemplateGrantEntitlementsByTemplate**
> employeeEntitlementGrantEntitlementsByTemplateGrantEntitlementsByTemplate($employee_id, $template)

[BETA] Update employee entitlements.

The user will only receive the entitlements which are possible with the registered user type

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\EmployeeentitlementApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 56; // int | Employee ID
$template = "template_example"; // string | Template

try {
    $apiInstance->employeeEntitlementGrantEntitlementsByTemplateGrantEntitlementsByTemplate($employee_id, $template);
} catch (Exception $e) {
    echo 'Exception when calling EmployeeentitlementApi->employeeEntitlementGrantEntitlementsByTemplateGrantEntitlementsByTemplate: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **employee_id** | **int**| Employee ID |
 **template** | **string**| Template |

### Return type

void (empty response body)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **employeeEntitlementSearch**
> \Swagger\Client\Model\ListResponseEntitlement employeeEntitlementSearch($employee_id, $from, $count, $sorting, $fields)

Find all entitlements for user.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\EmployeeentitlementApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$employee_id = 56; // int | Employee ID. Defaults to ID of token owner.
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->employeeEntitlementSearch($employee_id, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmployeeentitlementApi->employeeEntitlementSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **employee_id** | **int**| Employee ID. Defaults to ID of token owner. | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseEntitlement**](../Model/ListResponseEntitlement.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

