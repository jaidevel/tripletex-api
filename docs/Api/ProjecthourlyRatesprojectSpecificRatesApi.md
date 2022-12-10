# Swagger\Client\ProjecthourlyRatesprojectSpecificRatesApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**projectHourlyRatesProjectSpecificRatesDelete**](ProjecthourlyRatesprojectSpecificRatesApi.md#projectHourlyRatesProjectSpecificRatesDelete) | **DELETE** /project/hourlyRates/projectSpecificRates/{id} | Delete project specific rate
[**projectHourlyRatesProjectSpecificRatesGet**](ProjecthourlyRatesprojectSpecificRatesApi.md#projectHourlyRatesProjectSpecificRatesGet) | **GET** /project/hourlyRates/projectSpecificRates/{id} | Find project specific rate by ID.
[**projectHourlyRatesProjectSpecificRatesListDeleteByIds**](ProjecthourlyRatesprojectSpecificRatesApi.md#projectHourlyRatesProjectSpecificRatesListDeleteByIds) | **DELETE** /project/hourlyRates/projectSpecificRates/list | Delete project specific rates.
[**projectHourlyRatesProjectSpecificRatesListPostList**](ProjecthourlyRatesprojectSpecificRatesApi.md#projectHourlyRatesProjectSpecificRatesListPostList) | **POST** /project/hourlyRates/projectSpecificRates/list | Create multiple new project specific rates.
[**projectHourlyRatesProjectSpecificRatesListPutList**](ProjecthourlyRatesprojectSpecificRatesApi.md#projectHourlyRatesProjectSpecificRatesListPutList) | **PUT** /project/hourlyRates/projectSpecificRates/list | Update multiple project specific rates.
[**projectHourlyRatesProjectSpecificRatesPost**](ProjecthourlyRatesprojectSpecificRatesApi.md#projectHourlyRatesProjectSpecificRatesPost) | **POST** /project/hourlyRates/projectSpecificRates | Create new project specific rate.
[**projectHourlyRatesProjectSpecificRatesPut**](ProjecthourlyRatesprojectSpecificRatesApi.md#projectHourlyRatesProjectSpecificRatesPut) | **PUT** /project/hourlyRates/projectSpecificRates/{id} | Update a project specific rate.
[**projectHourlyRatesProjectSpecificRatesSearch**](ProjecthourlyRatesprojectSpecificRatesApi.md#projectHourlyRatesProjectSpecificRatesSearch) | **GET** /project/hourlyRates/projectSpecificRates | Find project specific rates corresponding with sent data.


# **projectHourlyRatesProjectSpecificRatesDelete**
> projectHourlyRatesProjectSpecificRatesDelete($id)

Delete project specific rate



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProjecthourlyRatesprojectSpecificRatesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID

try {
    $apiInstance->projectHourlyRatesProjectSpecificRatesDelete($id);
} catch (Exception $e) {
    echo 'Exception when calling ProjecthourlyRatesprojectSpecificRatesApi->projectHourlyRatesProjectSpecificRatesDelete: ', $e->getMessage(), PHP_EOL;
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

# **projectHourlyRatesProjectSpecificRatesGet**
> \Swagger\Client\Model\ResponseWrapperProjectSpecificRate projectHourlyRatesProjectSpecificRatesGet($id, $fields)

Find project specific rate by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProjecthourlyRatesprojectSpecificRatesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->projectHourlyRatesProjectSpecificRatesGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjecthourlyRatesprojectSpecificRatesApi->projectHourlyRatesProjectSpecificRatesGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperProjectSpecificRate**](../Model/ResponseWrapperProjectSpecificRate.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **projectHourlyRatesProjectSpecificRatesListDeleteByIds**
> projectHourlyRatesProjectSpecificRatesListDeleteByIds($ids)

Delete project specific rates.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProjecthourlyRatesprojectSpecificRatesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ids = "ids_example"; // string | ID of the elements

try {
    $apiInstance->projectHourlyRatesProjectSpecificRatesListDeleteByIds($ids);
} catch (Exception $e) {
    echo 'Exception when calling ProjecthourlyRatesprojectSpecificRatesApi->projectHourlyRatesProjectSpecificRatesListDeleteByIds: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **ids** | **string**| ID of the elements |

### Return type

void (empty response body)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **projectHourlyRatesProjectSpecificRatesListPostList**
> \Swagger\Client\Model\ListResponseProjectSpecificRate projectHourlyRatesProjectSpecificRatesListPostList($body)

Create multiple new project specific rates.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProjecthourlyRatesprojectSpecificRatesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\ProjectSpecificRate()); // \Swagger\Client\Model\ProjectSpecificRate[] | JSON representing a list of new objects to be created. Should not have ID and version set.

try {
    $result = $apiInstance->projectHourlyRatesProjectSpecificRatesListPostList($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjecthourlyRatesprojectSpecificRatesApi->projectHourlyRatesProjectSpecificRatesListPostList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\ProjectSpecificRate[]**](../Model/ProjectSpecificRate.md)| JSON representing a list of new objects to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseProjectSpecificRate**](../Model/ListResponseProjectSpecificRate.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **projectHourlyRatesProjectSpecificRatesListPutList**
> \Swagger\Client\Model\ListResponseProjectSpecificRate projectHourlyRatesProjectSpecificRatesListPutList($body)

Update multiple project specific rates.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProjecthourlyRatesprojectSpecificRatesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\ProjectSpecificRate()); // \Swagger\Client\Model\ProjectSpecificRate[] | JSON representing updates to objects. Should have ID and version set.

try {
    $result = $apiInstance->projectHourlyRatesProjectSpecificRatesListPutList($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjecthourlyRatesprojectSpecificRatesApi->projectHourlyRatesProjectSpecificRatesListPutList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\ProjectSpecificRate[]**](../Model/ProjectSpecificRate.md)| JSON representing updates to objects. Should have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseProjectSpecificRate**](../Model/ListResponseProjectSpecificRate.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **projectHourlyRatesProjectSpecificRatesPost**
> \Swagger\Client\Model\ResponseWrapperProjectSpecificRate projectHourlyRatesProjectSpecificRatesPost($body)

Create new project specific rate.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProjecthourlyRatesprojectSpecificRatesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\ProjectSpecificRate(); // \Swagger\Client\Model\ProjectSpecificRate | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->projectHourlyRatesProjectSpecificRatesPost($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjecthourlyRatesprojectSpecificRatesApi->projectHourlyRatesProjectSpecificRatesPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\ProjectSpecificRate**](../Model/ProjectSpecificRate.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperProjectSpecificRate**](../Model/ResponseWrapperProjectSpecificRate.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **projectHourlyRatesProjectSpecificRatesPut**
> \Swagger\Client\Model\ResponseWrapperProjectSpecificRate projectHourlyRatesProjectSpecificRatesPut($id, $body)

Update a project specific rate.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProjecthourlyRatesprojectSpecificRatesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$body = new \Swagger\Client\Model\ProjectSpecificRate(); // \Swagger\Client\Model\ProjectSpecificRate | Partial object describing what should be updated

try {
    $result = $apiInstance->projectHourlyRatesProjectSpecificRatesPut($id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjecthourlyRatesprojectSpecificRatesApi->projectHourlyRatesProjectSpecificRatesPut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **body** | [**\Swagger\Client\Model\ProjectSpecificRate**](../Model/ProjectSpecificRate.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperProjectSpecificRate**](../Model/ResponseWrapperProjectSpecificRate.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **projectHourlyRatesProjectSpecificRatesSearch**
> \Swagger\Client\Model\ListResponseProjectSpecificRate projectHourlyRatesProjectSpecificRatesSearch($id, $project_hourly_rate_id, $employee_id, $activity_id, $from, $count, $sorting, $fields)

Find project specific rates corresponding with sent data.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProjecthourlyRatesprojectSpecificRatesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = "id_example"; // string | List of IDs
$project_hourly_rate_id = "project_hourly_rate_id_example"; // string | List of IDs
$employee_id = "employee_id_example"; // string | List of IDs
$activity_id = "activity_id_example"; // string | List of IDs
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->projectHourlyRatesProjectSpecificRatesSearch($id, $project_hourly_rate_id, $employee_id, $activity_id, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjecthourlyRatesprojectSpecificRatesApi->projectHourlyRatesProjectSpecificRatesSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| List of IDs | [optional]
 **project_hourly_rate_id** | **string**| List of IDs | [optional]
 **employee_id** | **string**| List of IDs | [optional]
 **activity_id** | **string**| List of IDs | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseProjectSpecificRate**](../Model/ListResponseProjectSpecificRate.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

