# Swagger\Client\LedgerpaymentTypeOutApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**ledgerPaymentTypeOutDelete**](LedgerpaymentTypeOutApi.md#ledgerPaymentTypeOutDelete) | **DELETE** /ledger/paymentTypeOut/{id} | [BETA] Delete payment type for outgoing payments by ID.
[**ledgerPaymentTypeOutGet**](LedgerpaymentTypeOutApi.md#ledgerPaymentTypeOutGet) | **GET** /ledger/paymentTypeOut/{id} | [BETA] Get payment type for outgoing payments by ID.
[**ledgerPaymentTypeOutListPostList**](LedgerpaymentTypeOutApi.md#ledgerPaymentTypeOutListPostList) | **POST** /ledger/paymentTypeOut/list | [BETA] Create multiple payment types for outgoing payments at once
[**ledgerPaymentTypeOutListPutList**](LedgerpaymentTypeOutApi.md#ledgerPaymentTypeOutListPutList) | **PUT** /ledger/paymentTypeOut/list | [BETA] Update multiple payment types for outgoing payments at once
[**ledgerPaymentTypeOutPost**](LedgerpaymentTypeOutApi.md#ledgerPaymentTypeOutPost) | **POST** /ledger/paymentTypeOut | [BETA] Create new payment type for outgoing payments
[**ledgerPaymentTypeOutPut**](LedgerpaymentTypeOutApi.md#ledgerPaymentTypeOutPut) | **PUT** /ledger/paymentTypeOut/{id} | [BETA] Update existing payment type for outgoing payments
[**ledgerPaymentTypeOutSearch**](LedgerpaymentTypeOutApi.md#ledgerPaymentTypeOutSearch) | **GET** /ledger/paymentTypeOut | [BETA] Gets payment types for outgoing payments


# **ledgerPaymentTypeOutDelete**
> ledgerPaymentTypeOutDelete($id)

[BETA] Delete payment type for outgoing payments by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgerpaymentTypeOutApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID

try {
    $apiInstance->ledgerPaymentTypeOutDelete($id);
} catch (Exception $e) {
    echo 'Exception when calling LedgerpaymentTypeOutApi->ledgerPaymentTypeOutDelete: ', $e->getMessage(), PHP_EOL;
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

# **ledgerPaymentTypeOutGet**
> \Swagger\Client\Model\ResponseWrapperPaymentTypeOut ledgerPaymentTypeOutGet($id, $fields)

[BETA] Get payment type for outgoing payments by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgerpaymentTypeOutApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->ledgerPaymentTypeOutGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LedgerpaymentTypeOutApi->ledgerPaymentTypeOutGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperPaymentTypeOut**](../Model/ResponseWrapperPaymentTypeOut.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **ledgerPaymentTypeOutListPostList**
> \Swagger\Client\Model\ListResponsePaymentTypeOut ledgerPaymentTypeOutListPostList($body)

[BETA] Create multiple payment types for outgoing payments at once



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgerpaymentTypeOutApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\PaymentTypeOut()); // \Swagger\Client\Model\PaymentTypeOut[] | JSON representing a list of new objects to be created. Should not have ID and version set.

try {
    $result = $apiInstance->ledgerPaymentTypeOutListPostList($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LedgerpaymentTypeOutApi->ledgerPaymentTypeOutListPostList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\PaymentTypeOut[]**](../Model/PaymentTypeOut.md)| JSON representing a list of new objects to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ListResponsePaymentTypeOut**](../Model/ListResponsePaymentTypeOut.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **ledgerPaymentTypeOutListPutList**
> \Swagger\Client\Model\ListResponsePaymentTypeOut ledgerPaymentTypeOutListPutList($body)

[BETA] Update multiple payment types for outgoing payments at once



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgerpaymentTypeOutApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\PaymentTypeOut()); // \Swagger\Client\Model\PaymentTypeOut[] | JSON representing updates to objects. Should have ID and version set.

try {
    $result = $apiInstance->ledgerPaymentTypeOutListPutList($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LedgerpaymentTypeOutApi->ledgerPaymentTypeOutListPutList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\PaymentTypeOut[]**](../Model/PaymentTypeOut.md)| JSON representing updates to objects. Should have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ListResponsePaymentTypeOut**](../Model/ListResponsePaymentTypeOut.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **ledgerPaymentTypeOutPost**
> \Swagger\Client\Model\ResponseWrapperPaymentTypeOut ledgerPaymentTypeOutPost($body)

[BETA] Create new payment type for outgoing payments



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgerpaymentTypeOutApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\PaymentTypeOut(); // \Swagger\Client\Model\PaymentTypeOut | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->ledgerPaymentTypeOutPost($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LedgerpaymentTypeOutApi->ledgerPaymentTypeOutPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\PaymentTypeOut**](../Model/PaymentTypeOut.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperPaymentTypeOut**](../Model/ResponseWrapperPaymentTypeOut.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **ledgerPaymentTypeOutPut**
> \Swagger\Client\Model\ResponseWrapperPaymentTypeOut ledgerPaymentTypeOutPut($id, $body)

[BETA] Update existing payment type for outgoing payments



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgerpaymentTypeOutApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$body = new \Swagger\Client\Model\PaymentTypeOut(); // \Swagger\Client\Model\PaymentTypeOut | Partial object describing what should be updated

try {
    $result = $apiInstance->ledgerPaymentTypeOutPut($id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LedgerpaymentTypeOutApi->ledgerPaymentTypeOutPut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **body** | [**\Swagger\Client\Model\PaymentTypeOut**](../Model/PaymentTypeOut.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperPaymentTypeOut**](../Model/ResponseWrapperPaymentTypeOut.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **ledgerPaymentTypeOutSearch**
> \Swagger\Client\Model\ListResponsePaymentTypeOut ledgerPaymentTypeOutSearch($id, $description, $is_inactive, $from, $count, $sorting, $fields)

[BETA] Gets payment types for outgoing payments

This is an API endpoint for getting payment types for outgoing payments. This is equivalent to the section 'Outgoing Payments' under Accounts Settings in Tripletex. These are the payment types listed in supplier invoices, vat returns, salary payments and Tax/ENI

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\LedgerpaymentTypeOutApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = "id_example"; // string | List of IDs
$description = "description_example"; // string | Containing
$is_inactive = true; // bool | Equals
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->ledgerPaymentTypeOutSearch($id, $description, $is_inactive, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LedgerpaymentTypeOutApi->ledgerPaymentTypeOutSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| List of IDs | [optional]
 **description** | **string**| Containing | [optional]
 **is_inactive** | **bool**| Equals | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponsePaymentTypeOut**](../Model/ListResponsePaymentTypeOut.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

