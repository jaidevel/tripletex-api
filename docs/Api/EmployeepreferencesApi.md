# Swagger\Client\EmployeepreferencesApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**employeePreferencesLoggedInEmployeePreferencesLoggedInEmployeePreferences**](EmployeepreferencesApi.md#employeePreferencesLoggedInEmployeePreferencesLoggedInEmployeePreferences) | **GET** /employee/preferences/&gt;loggedInEmployeePreferences | Get employee preferences for current user
[**employeePreferencesSearch**](EmployeepreferencesApi.md#employeePreferencesSearch) | **GET** /employee/preferences | Find employee category corresponding with sent data.


# **employeePreferencesLoggedInEmployeePreferencesLoggedInEmployeePreferences**
> \Swagger\Client\Model\ResponseWrapperEmployeePreferences employeePreferencesLoggedInEmployeePreferencesLoggedInEmployeePreferences($fields)

Get employee preferences for current user



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\EmployeepreferencesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->employeePreferencesLoggedInEmployeePreferencesLoggedInEmployeePreferences($fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmployeepreferencesApi->employeePreferencesLoggedInEmployeePreferencesLoggedInEmployeePreferences: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperEmployeePreferences**](../Model/ResponseWrapperEmployeePreferences.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **employeePreferencesSearch**
> \Swagger\Client\Model\ResponseWrapperEmployeePreferences employeePreferencesSearch($id, $employee_id, $fields)

Find employee category corresponding with sent data.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\EmployeepreferencesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = "id_example"; // string | Equals
$employee_id = 56; // int | Equals
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->employeePreferencesSearch($id, $employee_id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EmployeepreferencesApi->employeePreferencesSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| Equals | [optional]
 **employee_id** | **int**| Equals | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperEmployeePreferences**](../Model/ResponseWrapperEmployeePreferences.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

