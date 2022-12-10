# Swagger\Client\ProjecthourlyRatesApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**projectHourlyRatesDelete**](ProjecthourlyRatesApi.md#projectHourlyRatesDelete) | **DELETE** /project/hourlyRates/{id} | Delete Project Hourly Rate
[**projectHourlyRatesDeleteByProjectIdsDeleteByProjectIds**](ProjecthourlyRatesApi.md#projectHourlyRatesDeleteByProjectIdsDeleteByProjectIds) | **DELETE** /project/hourlyRates/deleteByProjectIds | Delete project hourly rates by project id.
[**projectHourlyRatesGet**](ProjecthourlyRatesApi.md#projectHourlyRatesGet) | **GET** /project/hourlyRates/{id} | Find project hourly rate by ID.
[**projectHourlyRatesListDeleteByIds**](ProjecthourlyRatesApi.md#projectHourlyRatesListDeleteByIds) | **DELETE** /project/hourlyRates/list | Delete project hourly rates.
[**projectHourlyRatesListPostList**](ProjecthourlyRatesApi.md#projectHourlyRatesListPostList) | **POST** /project/hourlyRates/list | Create multiple project hourly rates.
[**projectHourlyRatesListPutList**](ProjecthourlyRatesApi.md#projectHourlyRatesListPutList) | **PUT** /project/hourlyRates/list | Update multiple project hourly rates.
[**projectHourlyRatesPost**](ProjecthourlyRatesApi.md#projectHourlyRatesPost) | **POST** /project/hourlyRates | Create a project hourly rate.
[**projectHourlyRatesPut**](ProjecthourlyRatesApi.md#projectHourlyRatesPut) | **PUT** /project/hourlyRates/{id} | Update a project hourly rate.
[**projectHourlyRatesSearch**](ProjecthourlyRatesApi.md#projectHourlyRatesSearch) | **GET** /project/hourlyRates | Find project hourly rates corresponding with sent data.
[**projectHourlyRatesUpdateOrAddHourRatesUpdateOrAddHourRates**](ProjecthourlyRatesApi.md#projectHourlyRatesUpdateOrAddHourRatesUpdateOrAddHourRates) | **PUT** /project/hourlyRates/updateOrAddHourRates | Update or add the same project hourly rate from project overview.


# **projectHourlyRatesDelete**
> projectHourlyRatesDelete($id)

Delete Project Hourly Rate



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProjecthourlyRatesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID

try {
    $apiInstance->projectHourlyRatesDelete($id);
} catch (Exception $e) {
    echo 'Exception when calling ProjecthourlyRatesApi->projectHourlyRatesDelete: ', $e->getMessage(), PHP_EOL;
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

# **projectHourlyRatesDeleteByProjectIdsDeleteByProjectIds**
> \Swagger\Client\Model\ListResponseProject projectHourlyRatesDeleteByProjectIdsDeleteByProjectIds($ids, $date)

Delete project hourly rates by project id.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProjecthourlyRatesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ids = "ids_example"; // string | ID of the elements
$date = "date_example"; // string | yyyy-MM-dd. Defaults to today.

try {
    $result = $apiInstance->projectHourlyRatesDeleteByProjectIdsDeleteByProjectIds($ids, $date);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjecthourlyRatesApi->projectHourlyRatesDeleteByProjectIdsDeleteByProjectIds: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **ids** | **string**| ID of the elements |
 **date** | **string**| yyyy-MM-dd. Defaults to today. |

### Return type

[**\Swagger\Client\Model\ListResponseProject**](../Model/ListResponseProject.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **projectHourlyRatesGet**
> \Swagger\Client\Model\ResponseWrapperProjectHourlyRate projectHourlyRatesGet($id, $fields)

Find project hourly rate by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProjecthourlyRatesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->projectHourlyRatesGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjecthourlyRatesApi->projectHourlyRatesGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperProjectHourlyRate**](../Model/ResponseWrapperProjectHourlyRate.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **projectHourlyRatesListDeleteByIds**
> projectHourlyRatesListDeleteByIds($ids)

Delete project hourly rates.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProjecthourlyRatesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ids = "ids_example"; // string | ID of the elements

try {
    $apiInstance->projectHourlyRatesListDeleteByIds($ids);
} catch (Exception $e) {
    echo 'Exception when calling ProjecthourlyRatesApi->projectHourlyRatesListDeleteByIds: ', $e->getMessage(), PHP_EOL;
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

# **projectHourlyRatesListPostList**
> \Swagger\Client\Model\ListResponseProjectHourlyRate projectHourlyRatesListPostList($body)

Create multiple project hourly rates.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProjecthourlyRatesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\ProjectHourlyRate()); // \Swagger\Client\Model\ProjectHourlyRate[] | JSON representing a list of new objects to be created. Should not have ID and version set.

try {
    $result = $apiInstance->projectHourlyRatesListPostList($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjecthourlyRatesApi->projectHourlyRatesListPostList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\ProjectHourlyRate[]**](../Model/ProjectHourlyRate.md)| JSON representing a list of new objects to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseProjectHourlyRate**](../Model/ListResponseProjectHourlyRate.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **projectHourlyRatesListPutList**
> \Swagger\Client\Model\ListResponseProjectHourlyRate projectHourlyRatesListPutList($body)

Update multiple project hourly rates.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProjecthourlyRatesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\ProjectHourlyRate()); // \Swagger\Client\Model\ProjectHourlyRate[] | JSON representing updates to objects. Should have ID and version set.

try {
    $result = $apiInstance->projectHourlyRatesListPutList($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjecthourlyRatesApi->projectHourlyRatesListPutList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\ProjectHourlyRate[]**](../Model/ProjectHourlyRate.md)| JSON representing updates to objects. Should have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseProjectHourlyRate**](../Model/ListResponseProjectHourlyRate.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **projectHourlyRatesPost**
> \Swagger\Client\Model\ResponseWrapperProjectHourlyRate projectHourlyRatesPost($body)

Create a project hourly rate.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProjecthourlyRatesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\ProjectHourlyRate(); // \Swagger\Client\Model\ProjectHourlyRate | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->projectHourlyRatesPost($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjecthourlyRatesApi->projectHourlyRatesPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\ProjectHourlyRate**](../Model/ProjectHourlyRate.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperProjectHourlyRate**](../Model/ResponseWrapperProjectHourlyRate.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **projectHourlyRatesPut**
> \Swagger\Client\Model\ResponseWrapperProjectHourlyRate projectHourlyRatesPut($id, $body)

Update a project hourly rate.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProjecthourlyRatesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$body = new \Swagger\Client\Model\ProjectHourlyRate(); // \Swagger\Client\Model\ProjectHourlyRate | Partial object describing what should be updated

try {
    $result = $apiInstance->projectHourlyRatesPut($id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjecthourlyRatesApi->projectHourlyRatesPut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **body** | [**\Swagger\Client\Model\ProjectHourlyRate**](../Model/ProjectHourlyRate.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperProjectHourlyRate**](../Model/ResponseWrapperProjectHourlyRate.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **projectHourlyRatesSearch**
> \Swagger\Client\Model\ListResponseProjectHourlyRate projectHourlyRatesSearch($id, $project_id, $type, $start_date_from, $start_date_to, $show_in_project_order, $from, $count, $sorting, $fields)

Find project hourly rates corresponding with sent data.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProjecthourlyRatesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = "id_example"; // string | List of IDs
$project_id = "project_id_example"; // string | List of IDs
$type = "type_example"; // string | Equals
$start_date_from = "start_date_from_example"; // string | From and including
$start_date_to = "start_date_to_example"; // string | To and excluding
$show_in_project_order = true; // bool | Equals
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->projectHourlyRatesSearch($id, $project_id, $type, $start_date_from, $start_date_to, $show_in_project_order, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjecthourlyRatesApi->projectHourlyRatesSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| List of IDs | [optional]
 **project_id** | **string**| List of IDs | [optional]
 **type** | **string**| Equals | [optional]
 **start_date_from** | **string**| From and including | [optional]
 **start_date_to** | **string**| To and excluding | [optional]
 **show_in_project_order** | **bool**| Equals | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseProjectHourlyRate**](../Model/ListResponseProjectHourlyRate.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **projectHourlyRatesUpdateOrAddHourRatesUpdateOrAddHourRates**
> \Swagger\Client\Model\ListResponseProjectHourlyRate projectHourlyRatesUpdateOrAddHourRatesUpdateOrAddHourRates($ids, $body)

Update or add the same project hourly rate from project overview.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProjecthourlyRatesApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ids = "ids_example"; // string | ID of the elements
$body = new \Swagger\Client\Model\HourlyRate(); // \Swagger\Client\Model\HourlyRate | JSON representing updates to objects. Should have ID and version set.

try {
    $result = $apiInstance->projectHourlyRatesUpdateOrAddHourRatesUpdateOrAddHourRates($ids, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjecthourlyRatesApi->projectHourlyRatesUpdateOrAddHourRatesUpdateOrAddHourRates: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **ids** | **string**| ID of the elements |
 **body** | [**\Swagger\Client\Model\HourlyRate**](../Model/HourlyRate.md)| JSON representing updates to objects. Should have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseProjectHourlyRate**](../Model/ListResponseProjectHourlyRate.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

