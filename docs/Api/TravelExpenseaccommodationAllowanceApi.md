# Swagger\Client\TravelExpenseaccommodationAllowanceApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**travelExpenseAccommodationAllowanceDelete**](TravelExpenseaccommodationAllowanceApi.md#travelExpenseAccommodationAllowanceDelete) | **DELETE** /travelExpense/accommodationAllowance/{id} | Delete accommodation allowance.
[**travelExpenseAccommodationAllowanceGet**](TravelExpenseaccommodationAllowanceApi.md#travelExpenseAccommodationAllowanceGet) | **GET** /travelExpense/accommodationAllowance/{id} | Get travel accommodation allowance by ID.
[**travelExpenseAccommodationAllowancePost**](TravelExpenseaccommodationAllowanceApi.md#travelExpenseAccommodationAllowancePost) | **POST** /travelExpense/accommodationAllowance | Create accommodation allowance.
[**travelExpenseAccommodationAllowancePut**](TravelExpenseaccommodationAllowanceApi.md#travelExpenseAccommodationAllowancePut) | **PUT** /travelExpense/accommodationAllowance/{id} | Update accommodation allowance.
[**travelExpenseAccommodationAllowanceSearch**](TravelExpenseaccommodationAllowanceApi.md#travelExpenseAccommodationAllowanceSearch) | **GET** /travelExpense/accommodationAllowance | Find accommodation allowances corresponding with sent data.


# **travelExpenseAccommodationAllowanceDelete**
> travelExpenseAccommodationAllowanceDelete($id)

Delete accommodation allowance.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpenseaccommodationAllowanceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID

try {
    $apiInstance->travelExpenseAccommodationAllowanceDelete($id);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpenseaccommodationAllowanceApi->travelExpenseAccommodationAllowanceDelete: ', $e->getMessage(), PHP_EOL;
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

# **travelExpenseAccommodationAllowanceGet**
> \Swagger\Client\Model\ResponseWrapperAccommodationAllowance travelExpenseAccommodationAllowanceGet($id, $fields)

Get travel accommodation allowance by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpenseaccommodationAllowanceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->travelExpenseAccommodationAllowanceGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpenseaccommodationAllowanceApi->travelExpenseAccommodationAllowanceGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperAccommodationAllowance**](../Model/ResponseWrapperAccommodationAllowance.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **travelExpenseAccommodationAllowancePost**
> \Swagger\Client\Model\ResponseWrapperAccommodationAllowance travelExpenseAccommodationAllowancePost($body)

Create accommodation allowance.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpenseaccommodationAllowanceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\AccommodationAllowance(); // \Swagger\Client\Model\AccommodationAllowance | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->travelExpenseAccommodationAllowancePost($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpenseaccommodationAllowanceApi->travelExpenseAccommodationAllowancePost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\AccommodationAllowance**](../Model/AccommodationAllowance.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperAccommodationAllowance**](../Model/ResponseWrapperAccommodationAllowance.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **travelExpenseAccommodationAllowancePut**
> \Swagger\Client\Model\ResponseWrapperAccommodationAllowance travelExpenseAccommodationAllowancePut($id, $body)

Update accommodation allowance.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpenseaccommodationAllowanceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$body = new \Swagger\Client\Model\AccommodationAllowance(); // \Swagger\Client\Model\AccommodationAllowance | Partial object describing what should be updated

try {
    $result = $apiInstance->travelExpenseAccommodationAllowancePut($id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpenseaccommodationAllowanceApi->travelExpenseAccommodationAllowancePut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **body** | [**\Swagger\Client\Model\AccommodationAllowance**](../Model/AccommodationAllowance.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperAccommodationAllowance**](../Model/ResponseWrapperAccommodationAllowance.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **travelExpenseAccommodationAllowanceSearch**
> \Swagger\Client\Model\ListResponseAccommodationAllowance travelExpenseAccommodationAllowanceSearch($travel_expense_id, $rate_type_id, $rate_category_id, $rate_from, $rate_to, $count_from, $count_to, $amount_from, $amount_to, $location, $address, $from, $count, $sorting, $fields)

Find accommodation allowances corresponding with sent data.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpenseaccommodationAllowanceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$travel_expense_id = "travel_expense_id_example"; // string | Equals
$rate_type_id = "rate_type_id_example"; // string | Equals
$rate_category_id = "rate_category_id_example"; // string | Equals
$rate_from = "rate_from_example"; // string | From and including
$rate_to = "rate_to_example"; // string | To and excluding
$count_from = 56; // int | From and including
$count_to = 56; // int | To and excluding
$amount_from = "amount_from_example"; // string | From and including
$amount_to = "amount_to_example"; // string | To and excluding
$location = "location_example"; // string | Containing
$address = "address_example"; // string | Containing
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->travelExpenseAccommodationAllowanceSearch($travel_expense_id, $rate_type_id, $rate_category_id, $rate_from, $rate_to, $count_from, $count_to, $amount_from, $amount_to, $location, $address, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpenseaccommodationAllowanceApi->travelExpenseAccommodationAllowanceSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **travel_expense_id** | **string**| Equals | [optional]
 **rate_type_id** | **string**| Equals | [optional]
 **rate_category_id** | **string**| Equals | [optional]
 **rate_from** | **string**| From and including | [optional]
 **rate_to** | **string**| To and excluding | [optional]
 **count_from** | **int**| From and including | [optional]
 **count_to** | **int**| To and excluding | [optional]
 **amount_from** | **string**| From and including | [optional]
 **amount_to** | **string**| To and excluding | [optional]
 **location** | **string**| Containing | [optional]
 **address** | **string**| Containing | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseAccommodationAllowance**](../Model/ListResponseAccommodationAllowance.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

