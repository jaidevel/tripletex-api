# Swagger\Client\TravelExpensemileageAllowanceApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**travelExpenseMileageAllowanceDelete**](TravelExpensemileageAllowanceApi.md#travelExpenseMileageAllowanceDelete) | **DELETE** /travelExpense/mileageAllowance/{id} | Delete mileage allowance.
[**travelExpenseMileageAllowanceGet**](TravelExpensemileageAllowanceApi.md#travelExpenseMileageAllowanceGet) | **GET** /travelExpense/mileageAllowance/{id} | Get mileage allowance by ID.
[**travelExpenseMileageAllowancePost**](TravelExpensemileageAllowanceApi.md#travelExpenseMileageAllowancePost) | **POST** /travelExpense/mileageAllowance | Create mileage allowance.
[**travelExpenseMileageAllowancePut**](TravelExpensemileageAllowanceApi.md#travelExpenseMileageAllowancePut) | **PUT** /travelExpense/mileageAllowance/{id} | Update mileage allowance.
[**travelExpenseMileageAllowanceSearch**](TravelExpensemileageAllowanceApi.md#travelExpenseMileageAllowanceSearch) | **GET** /travelExpense/mileageAllowance | Find mileage allowances corresponding with sent data.


# **travelExpenseMileageAllowanceDelete**
> travelExpenseMileageAllowanceDelete($id)

Delete mileage allowance.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpensemileageAllowanceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID

try {
    $apiInstance->travelExpenseMileageAllowanceDelete($id);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpensemileageAllowanceApi->travelExpenseMileageAllowanceDelete: ', $e->getMessage(), PHP_EOL;
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

# **travelExpenseMileageAllowanceGet**
> \Swagger\Client\Model\ResponseWrapperMileageAllowance travelExpenseMileageAllowanceGet($id, $fields)

Get mileage allowance by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpensemileageAllowanceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->travelExpenseMileageAllowanceGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpensemileageAllowanceApi->travelExpenseMileageAllowanceGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperMileageAllowance**](../Model/ResponseWrapperMileageAllowance.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **travelExpenseMileageAllowancePost**
> \Swagger\Client\Model\ResponseWrapperMileageAllowance travelExpenseMileageAllowancePost($body)

Create mileage allowance.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpensemileageAllowanceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\MileageAllowance(); // \Swagger\Client\Model\MileageAllowance | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->travelExpenseMileageAllowancePost($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpensemileageAllowanceApi->travelExpenseMileageAllowancePost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\MileageAllowance**](../Model/MileageAllowance.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperMileageAllowance**](../Model/ResponseWrapperMileageAllowance.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **travelExpenseMileageAllowancePut**
> \Swagger\Client\Model\ResponseWrapperMileageAllowance travelExpenseMileageAllowancePut($id, $body)

Update mileage allowance.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpensemileageAllowanceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$body = new \Swagger\Client\Model\MileageAllowance(); // \Swagger\Client\Model\MileageAllowance | Partial object describing what should be updated

try {
    $result = $apiInstance->travelExpenseMileageAllowancePut($id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpensemileageAllowanceApi->travelExpenseMileageAllowancePut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **body** | [**\Swagger\Client\Model\MileageAllowance**](../Model/MileageAllowance.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperMileageAllowance**](../Model/ResponseWrapperMileageAllowance.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **travelExpenseMileageAllowanceSearch**
> \Swagger\Client\Model\ListResponseMileageAllowance travelExpenseMileageAllowanceSearch($travel_expense_id, $rate_type_id, $rate_category_id, $km_from, $km_to, $rate_from, $rate_to, $amount_from, $amount_to, $departure_location, $destination, $date_from, $date_to, $is_company_car, $from, $count, $sorting, $fields)

Find mileage allowances corresponding with sent data.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\TravelExpensemileageAllowanceApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$travel_expense_id = "travel_expense_id_example"; // string | Equals
$rate_type_id = "rate_type_id_example"; // string | Equals
$rate_category_id = "rate_category_id_example"; // string | Equals
$km_from = "km_from_example"; // string | From and including
$km_to = "km_to_example"; // string | To and excluding
$rate_from = "rate_from_example"; // string | From and including
$rate_to = "rate_to_example"; // string | To and excluding
$amount_from = "amount_from_example"; // string | From and including
$amount_to = "amount_to_example"; // string | To and excluding
$departure_location = "departure_location_example"; // string | Containing
$destination = "destination_example"; // string | Containing
$date_from = "date_from_example"; // string | From and including
$date_to = "date_to_example"; // string | To and excluding
$is_company_car = true; // bool | Equals
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->travelExpenseMileageAllowanceSearch($travel_expense_id, $rate_type_id, $rate_category_id, $km_from, $km_to, $rate_from, $rate_to, $amount_from, $amount_to, $departure_location, $destination, $date_from, $date_to, $is_company_car, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TravelExpensemileageAllowanceApi->travelExpenseMileageAllowanceSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **travel_expense_id** | **string**| Equals | [optional]
 **rate_type_id** | **string**| Equals | [optional]
 **rate_category_id** | **string**| Equals | [optional]
 **km_from** | **string**| From and including | [optional]
 **km_to** | **string**| To and excluding | [optional]
 **rate_from** | **string**| From and including | [optional]
 **rate_to** | **string**| To and excluding | [optional]
 **amount_from** | **string**| From and including | [optional]
 **amount_to** | **string**| To and excluding | [optional]
 **departure_location** | **string**| Containing | [optional]
 **destination** | **string**| Containing | [optional]
 **date_from** | **string**| From and including | [optional]
 **date_to** | **string**| To and excluding | [optional]
 **is_company_car** | **bool**| Equals | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseMileageAllowance**](../Model/ListResponseMileageAllowance.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

