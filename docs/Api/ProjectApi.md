# Swagger\Client\ProjectApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**projectDelete**](ProjectApi.md#projectDelete) | **DELETE** /project/{id} | [BETA] Delete project.
[**projectDeleteList**](ProjectApi.md#projectDeleteList) | **DELETE** /project | [BETA] Delete multiple projects.
[**projectForTimeSheetGetForTimeSheet**](ProjectApi.md#projectForTimeSheetGetForTimeSheet) | **GET** /project/&gt;forTimeSheet | Find projects applicable for time sheet registration on a specific day.
[**projectGet**](ProjectApi.md#projectGet) | **GET** /project/{id} | Find project by ID.
[**projectListDeleteByIds**](ProjectApi.md#projectListDeleteByIds) | **DELETE** /project/list | [BETA] Delete projects.
[**projectListPostList**](ProjectApi.md#projectListPostList) | **POST** /project/list | [BETA] Register new projects. Multiple projects for different users can be sent in the same request.
[**projectListPutList**](ProjectApi.md#projectListPutList) | **PUT** /project/list | [BETA] Update multiple projects.
[**projectPost**](ProjectApi.md#projectPost) | **POST** /project | [BETA] Add new project.
[**projectPut**](ProjectApi.md#projectPut) | **PUT** /project/{id} | [BETA] Update project.
[**projectSearch**](ProjectApi.md#projectSearch) | **GET** /project | Find projects corresponding with sent data.


# **projectDelete**
> projectDelete($id)

[BETA] Delete project.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProjectApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID

try {
    $apiInstance->projectDelete($id);
} catch (Exception $e) {
    echo 'Exception when calling ProjectApi->projectDelete: ', $e->getMessage(), PHP_EOL;
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

# **projectDeleteList**
> projectDeleteList($body)

[BETA] Delete multiple projects.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProjectApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\Project()); // \Swagger\Client\Model\Project[] | JSON representing objects to delete. Should have ID and version set.

try {
    $apiInstance->projectDeleteList($body);
} catch (Exception $e) {
    echo 'Exception when calling ProjectApi->projectDeleteList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\Project[]**](../Model/Project.md)| JSON representing objects to delete. Should have ID and version set. | [optional]

### Return type

void (empty response body)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **projectForTimeSheetGetForTimeSheet**
> \Swagger\Client\Model\ListResponseProject projectForTimeSheetGetForTimeSheet($include_project_offers, $employee_id, $date, $from, $count, $sorting, $fields)

Find projects applicable for time sheet registration on a specific day.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProjectApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$include_project_offers = false; // bool | Equals
$employee_id = 56; // int | Employee ID. Defaults to ID of token owner.
$date = "date_example"; // string | yyyy-MM-dd. Defaults to today.
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->projectForTimeSheetGetForTimeSheet($include_project_offers, $employee_id, $date, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectApi->projectForTimeSheetGetForTimeSheet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **include_project_offers** | **bool**| Equals | [optional] [default to false]
 **employee_id** | **int**| Employee ID. Defaults to ID of token owner. | [optional]
 **date** | **string**| yyyy-MM-dd. Defaults to today. | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseProject**](../Model/ListResponseProject.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **projectGet**
> \Swagger\Client\Model\ResponseWrapperProject projectGet($id, $fields)

Find project by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProjectApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->projectGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectApi->projectGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperProject**](../Model/ResponseWrapperProject.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **projectListDeleteByIds**
> projectListDeleteByIds($ids)

[BETA] Delete projects.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProjectApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ids = "ids_example"; // string | ID of the elements

try {
    $apiInstance->projectListDeleteByIds($ids);
} catch (Exception $e) {
    echo 'Exception when calling ProjectApi->projectListDeleteByIds: ', $e->getMessage(), PHP_EOL;
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

# **projectListPostList**
> \Swagger\Client\Model\ListResponseProject projectListPostList($body)

[BETA] Register new projects. Multiple projects for different users can be sent in the same request.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProjectApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\Project()); // \Swagger\Client\Model\Project[] | JSON representing a list of new objects to be created. Should not have ID and version set.

try {
    $result = $apiInstance->projectListPostList($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectApi->projectListPostList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\Project[]**](../Model/Project.md)| JSON representing a list of new objects to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseProject**](../Model/ListResponseProject.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **projectListPutList**
> \Swagger\Client\Model\ListResponseProject projectListPutList($body)

[BETA] Update multiple projects.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProjectApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\Project()); // \Swagger\Client\Model\Project[] | JSON representing updates to objects. Should have ID and version set.

try {
    $result = $apiInstance->projectListPutList($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectApi->projectListPutList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\Project[]**](../Model/Project.md)| JSON representing updates to objects. Should have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseProject**](../Model/ListResponseProject.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **projectPost**
> \Swagger\Client\Model\ResponseWrapperProject projectPost($body)

[BETA] Add new project.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProjectApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\Project(); // \Swagger\Client\Model\Project | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->projectPost($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectApi->projectPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\Project**](../Model/Project.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperProject**](../Model/ResponseWrapperProject.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **projectPut**
> \Swagger\Client\Model\ResponseWrapperProject projectPut($id, $body)

[BETA] Update project.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProjectApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$body = new \Swagger\Client\Model\Project(); // \Swagger\Client\Model\Project | Partial object describing what should be updated

try {
    $result = $apiInstance->projectPut($id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectApi->projectPut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **body** | [**\Swagger\Client\Model\Project**](../Model/Project.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperProject**](../Model/ResponseWrapperProject.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **projectSearch**
> \Swagger\Client\Model\ListResponseProject projectSearch($id, $name, $number, $is_offer, $project_manager_id, $employee_in_project_id, $department_id, $start_date_from, $start_date_to, $end_date_from, $end_date_to, $is_closed, $is_fixed_price, $customer_id, $external_accounts_number, $from, $count, $sorting, $fields)

Find projects corresponding with sent data.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProjectApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = "id_example"; // string | List of IDs
$name = "name_example"; // string | Containing
$number = "number_example"; // string | Equals
$is_offer = true; // bool | Equals
$project_manager_id = "project_manager_id_example"; // string | List of IDs
$employee_in_project_id = "employee_in_project_id_example"; // string | List of IDs
$department_id = "department_id_example"; // string | List of IDs
$start_date_from = "start_date_from_example"; // string | From and including
$start_date_to = "start_date_to_example"; // string | To and excluding
$end_date_from = "end_date_from_example"; // string | From and including
$end_date_to = "end_date_to_example"; // string | To and excluding
$is_closed = true; // bool | Equals
$is_fixed_price = true; // bool | Equals
$customer_id = "customer_id_example"; // string | Equals
$external_accounts_number = "external_accounts_number_example"; // string | Containing
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->projectSearch($id, $name, $number, $is_offer, $project_manager_id, $employee_in_project_id, $department_id, $start_date_from, $start_date_to, $end_date_from, $end_date_to, $is_closed, $is_fixed_price, $customer_id, $external_accounts_number, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectApi->projectSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| List of IDs | [optional]
 **name** | **string**| Containing | [optional]
 **number** | **string**| Equals | [optional]
 **is_offer** | **bool**| Equals | [optional]
 **project_manager_id** | **string**| List of IDs | [optional]
 **employee_in_project_id** | **string**| List of IDs | [optional]
 **department_id** | **string**| List of IDs | [optional]
 **start_date_from** | **string**| From and including | [optional]
 **start_date_to** | **string**| To and excluding | [optional]
 **end_date_from** | **string**| From and including | [optional]
 **end_date_to** | **string**| To and excluding | [optional]
 **is_closed** | **bool**| Equals | [optional]
 **is_fixed_price** | **bool**| Equals | [optional]
 **customer_id** | **string**| Equals | [optional]
 **external_accounts_number** | **string**| Containing | [optional]
 **from** | **int**| From index | [optional] [default to 0]
 **count** | **int**| Number of elements to return | [optional] [default to 1000]
 **sorting** | **string**| Sorting pattern | [optional]
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseProject**](../Model/ListResponseProject.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

