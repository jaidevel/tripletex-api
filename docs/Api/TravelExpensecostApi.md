# Swagger\Client\TravelExpensecostApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**travelExpenseCostDelete**](TravelExpensecostApi.md#travelExpenseCostDelete) | **DELETE** /travelExpense/cost/{id} | Delete cost.
[**travelExpenseCostGet**](TravelExpensecostApi.md#travelExpenseCostGet) | **GET** /travelExpense/cost/{id} | Get cost by ID.
[**travelExpenseCostPost**](TravelExpensecostApi.md#travelExpenseCostPost) | **POST** /travelExpense/cost | Create cost.
[**travelExpenseCostPut**](TravelExpensecostApi.md#travelExpenseCostPut) | **PUT** /travelExpense/cost/{id} | Update cost.
[**travelExpenseCostSearch**](TravelExpensecostApi.md#travelExpenseCostSearch) | **GET** /travelExpense/cost | Find costs corresponding with sent data.


# **travelExpenseCostDelete**
> travelExpenseCostDelete($id)

Delete cost.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpensecostApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID

try {
    $apiInstance->travelExpenseCostDelete($id);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpensecostApi->travelExpenseCostDelete: ', $e->getMessage(), PHP_EOL;
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

# **travelExpenseCostGet**
> \Swagger\Client\Model\ResponseWrapperCost travelExpenseCostGet($id, $fields)

Get cost by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpensecostApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->travelExpenseCostGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpensecostApi->travelExpenseCostGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperCost**](../Model/ResponseWrapperCost.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **travelExpenseCostPost**
> \Swagger\Client\Model\ResponseWrapperCost travelExpenseCostPost($body)

Create cost.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpensecostApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\Cost(); // \Swagger\Client\Model\Cost | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->travelExpenseCostPost($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpensecostApi->travelExpenseCostPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\Cost**](../Model/Cost.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperCost**](../Model/ResponseWrapperCost.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **travelExpenseCostPut**
> \Swagger\Client\Model\ResponseWrapperCost travelExpenseCostPut($id, $body)

Update cost.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpensecostApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$body = new \Swagger\Client\Model\Cost(); // \Swagger\Client\Model\Cost | Partial object describing what should be updated

try {
    $result = $apiInstance->travelExpenseCostPut($id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpensecostApi->travelExpenseCostPut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **body** | [**\Swagger\Client\Model\Cost**](../Model/Cost.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperCost**](../Model/ResponseWrapperCost.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **travelExpenseCostSearch**
> \Swagger\Client\Model\ListResponseCost travelExpenseCostSearch($travel_expense_id, $vat_type_id, $currency_id, $rate_from, $rate_to, $count_from, $count_to, $amount_from, $amount_to, $location, $address, $from, $count, $sorting, $fields)

Find costs corresponding with sent data.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpensecostApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$travel_expense_id = "travel_expense_id_example"; // string | Equals
$vat_type_id = "vat_type_id_example"; // string | Equals
$currency_id = "currency_id_example"; // string | Equals
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
    $result = $apiInstance->travelExpenseCostSearch($travel_expense_id, $vat_type_id, $currency_id, $rate_from, $rate_to, $count_from, $count_to, $amount_from, $amount_to, $location, $address, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpensecostApi->travelExpenseCostSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **travel_expense_id** | **string**| Equals | [optional]
 **vat_type_id** | **string**| Equals | [optional]
 **currency_id** | **string**| Equals | [optional]
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

[**\Swagger\Client\Model\ListResponseCost**](../Model/ListResponseCost.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

