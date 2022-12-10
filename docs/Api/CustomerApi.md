# Swagger\Client\CustomerApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**customerDelete**](CustomerApi.md#customerDelete) | **DELETE** /customer/{id} | [BETA] Delete customer by ID
[**customerGet**](CustomerApi.md#customerGet) | **GET** /customer/{id} | Get customer by ID.
[**customerListPostList**](CustomerApi.md#customerListPostList) | **POST** /customer/list | [BETA] Create multiple customers. Related supplier addresses may also be created.
[**customerListPutList**](CustomerApi.md#customerListPutList) | **PUT** /customer/list | [BETA] Update multiple customers. Addresses can also be updated.
[**customerPost**](CustomerApi.md#customerPost) | **POST** /customer | Create customer. Related customer addresses may also be created.
[**customerPut**](CustomerApi.md#customerPut) | **PUT** /customer/{id} | Update customer.
[**customerSearch**](CustomerApi.md#customerSearch) | **GET** /customer | Find customers corresponding with sent data.


# **customerDelete**
> customerDelete($id)

[BETA] Delete customer by ID



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\CustomerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID

try {
    $apiInstance->customerDelete($id);
} catch (Exception $e) {
    echo 'Exception when calling CustomerApi->customerDelete: ', $e->getMessage(), PHP_EOL;
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

# **customerGet**
> \Swagger\Client\Model\ResponseWrapperCustomer customerGet($id, $fields)

Get customer by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\CustomerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->customerGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomerApi->customerGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperCustomer**](../Model/ResponseWrapperCustomer.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **customerListPostList**
> \Swagger\Client\Model\ListResponseCustomer customerListPostList($body)

[BETA] Create multiple customers. Related supplier addresses may also be created.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\CustomerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\Customer()); // \Swagger\Client\Model\Customer[] | JSON representing a list of new objects to be created. Should not have ID and version set.

try {
    $result = $apiInstance->customerListPostList($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomerApi->customerListPostList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\Customer[]**](../Model/Customer.md)| JSON representing a list of new objects to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseCustomer**](../Model/ListResponseCustomer.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **customerListPutList**
> \Swagger\Client\Model\ListResponseCustomer customerListPutList($body)

[BETA] Update multiple customers. Addresses can also be updated.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\CustomerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\Customer()); // \Swagger\Client\Model\Customer[] | JSON representing updates to objects. Should have ID and version set.

try {
    $result = $apiInstance->customerListPutList($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomerApi->customerListPutList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\Customer[]**](../Model/Customer.md)| JSON representing updates to objects. Should have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseCustomer**](../Model/ListResponseCustomer.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **customerPost**
> \Swagger\Client\Model\ResponseWrapperCustomer customerPost($body)

Create customer. Related customer addresses may also be created.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\CustomerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\Customer(); // \Swagger\Client\Model\Customer | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->customerPost($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomerApi->customerPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\Customer**](../Model/Customer.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperCustomer**](../Model/ResponseWrapperCustomer.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **customerPut**
> \Swagger\Client\Model\ResponseWrapperCustomer customerPut($id, $body)

Update customer.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\CustomerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$body = new \Swagger\Client\Model\Customer(); // \Swagger\Client\Model\Customer | Partial object describing what should be updated

try {
    $result = $apiInstance->customerPut($id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomerApi->customerPut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **body** | [**\Swagger\Client\Model\Customer**](../Model/Customer.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperCustomer**](../Model/ResponseWrapperCustomer.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **customerSearch**
> \Swagger\Client\Model\ListResponseCustomer customerSearch($id, $customer_account_number, $organization_number, $email, $invoice_email, $is_inactive, $account_manager_id, $changed_since, $from, $count, $sorting, $fields)

Find customers corresponding with sent data.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\CustomerApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = "id_example"; // string | List of IDs
$customer_account_number = "customer_account_number_example"; // string | List of IDs
$organization_number = "organization_number_example"; // string | Equals
$email = "email_example"; // string | Equals
$invoice_email = "invoice_email_example"; // string | Equals
$is_inactive = false; // bool | Equals
$account_manager_id = "account_manager_id_example"; // string | List of IDs
$changed_since = "changed_since_example"; // string | Only return elements that have changed since this date and time
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->customerSearch($id, $customer_account_number, $organization_number, $email, $invoice_email, $is_inactive, $account_manager_id, $changed_since, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CustomerApi->customerSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| List of IDs | [optional]
 **customer_account_number** | **string**| List of IDs | [optional]
 **organization_number** | **string**| Equals | [optional]
 **email** | **string**| Equals | [optional]
 **invoice_email** | **string**| Equals | [optional]
 **is_inactive** | **bool**| Equals | [optional] [default to false]
 **account_manager_id** | **string**| List of IDs | [optional]
 **changed_since** | **string**| Only return elements that have changed since this date and time | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseCustomer**](../Model/ListResponseCustomer.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

