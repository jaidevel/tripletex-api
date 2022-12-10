# Swagger\Client\SalarytransactionApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**salaryTransactionDelete**](SalarytransactionApi.md#salaryTransactionDelete) | **DELETE** /salary/transaction/{id} | Delete salary transaction by ID.
[**salaryTransactionGet**](SalarytransactionApi.md#salaryTransactionGet) | **GET** /salary/transaction/{id} | Find salary transaction by ID.
[**salaryTransactionPost**](SalarytransactionApi.md#salaryTransactionPost) | **POST** /salary/transaction | Create a new salary transaction.


# **salaryTransactionDelete**
> salaryTransactionDelete($id)

Delete salary transaction by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\SalarytransactionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID

try {
    $apiInstance->salaryTransactionDelete($id);
} catch (Exception $e) {
    echo 'Exception when calling SalarytransactionApi->salaryTransactionDelete: ', $e->getMessage(), PHP_EOL;
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

# **salaryTransactionGet**
> \Swagger\Client\Model\ResponseWrapperSalaryTransaction salaryTransactionGet($id, $fields)

Find salary transaction by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\SalarytransactionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->salaryTransactionGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SalarytransactionApi->salaryTransactionGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperSalaryTransaction**](../Model/ResponseWrapperSalaryTransaction.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **salaryTransactionPost**
> \Swagger\Client\Model\ResponseWrapperSalaryTransaction salaryTransactionPost($body, $generate_tax_deduction)

Create a new salary transaction.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\SalarytransactionApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\SalaryTransaction(); // \Swagger\Client\Model\SalaryTransaction | JSON representing the new object to be created. Should not have ID and version set.
$generate_tax_deduction = false; // bool | Generate tax deduction

try {
    $result = $apiInstance->salaryTransactionPost($body, $generate_tax_deduction);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SalarytransactionApi->salaryTransactionPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\SalaryTransaction**](../Model/SalaryTransaction.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]
 **generate_tax_deduction** | **bool**| Generate tax deduction | [optional] [default to false]

### Return type

[**\Swagger\Client\Model\ResponseWrapperSalaryTransaction**](../Model/ResponseWrapperSalaryTransaction.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

