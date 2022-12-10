# Swagger\Client\ProjectparticipantApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**projectParticipantGet**](ProjectparticipantApi.md#projectParticipantGet) | **GET** /project/participant/{id} | [BETA] Find project participant by ID.
[**projectParticipantListDeleteByIds**](ProjectparticipantApi.md#projectParticipantListDeleteByIds) | **DELETE** /project/participant/list | [BETA] Delete project participants.
[**projectParticipantListPostList**](ProjectparticipantApi.md#projectParticipantListPostList) | **POST** /project/participant/list | [BETA] Add new project participant. Multiple project participants can be sent in the same request.
[**projectParticipantPost**](ProjectparticipantApi.md#projectParticipantPost) | **POST** /project/participant | [BETA] Add new project participant.
[**projectParticipantPut**](ProjectparticipantApi.md#projectParticipantPut) | **PUT** /project/participant/{id} | [BETA] Update project participant.


# **projectParticipantGet**
> \Swagger\Client\Model\ResponseWrapperProjectParticipant projectParticipantGet($id, $fields)

[BETA] Find project participant by ID.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProjectparticipantApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->projectParticipantGet($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectparticipantApi->projectParticipantGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperProjectParticipant**](../Model/ResponseWrapperProjectParticipant.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **projectParticipantListDeleteByIds**
> projectParticipantListDeleteByIds($ids)

[BETA] Delete project participants.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProjectparticipantApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$ids = "ids_example"; // string | ID of the elements

try {
    $apiInstance->projectParticipantListDeleteByIds($ids);
} catch (Exception $e) {
    echo 'Exception when calling ProjectparticipantApi->projectParticipantListDeleteByIds: ', $e->getMessage(), PHP_EOL;
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

# **projectParticipantListPostList**
> \Swagger\Client\Model\ListResponseProjectParticipant projectParticipantListPostList($body)

[BETA] Add new project participant. Multiple project participants can be sent in the same request.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProjectparticipantApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = array(new \Swagger\Client\Model\ProjectParticipant()); // \Swagger\Client\Model\ProjectParticipant[] | JSON representing a list of new objects to be created. Should not have ID and version set.

try {
    $result = $apiInstance->projectParticipantListPostList($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectparticipantApi->projectParticipantListPostList: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\ProjectParticipant[]**](../Model/ProjectParticipant.md)| JSON representing a list of new objects to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ListResponseProjectParticipant**](../Model/ListResponseProjectParticipant.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **projectParticipantPost**
> \Swagger\Client\Model\ResponseWrapperProjectParticipant projectParticipantPost($body)

[BETA] Add new project participant.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProjectparticipantApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \Swagger\Client\Model\ProjectParticipant(); // \Swagger\Client\Model\ProjectParticipant | JSON representing the new object to be created. Should not have ID and version set.

try {
    $result = $apiInstance->projectParticipantPost($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectparticipantApi->projectParticipantPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Swagger\Client\Model\ProjectParticipant**](../Model/ProjectParticipant.md)| JSON representing the new object to be created. Should not have ID and version set. | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperProjectParticipant**](../Model/ResponseWrapperProjectParticipant.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **projectParticipantPut**
> \Swagger\Client\Model\ResponseWrapperProjectParticipant projectParticipantPut($id, $body)

[BETA] Update project participant.



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\ProjectparticipantApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Element ID
$body = new \Swagger\Client\Model\ProjectParticipant(); // \Swagger\Client\Model\ProjectParticipant | Partial object describing what should be updated

try {
    $result = $apiInstance->projectParticipantPut($id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectparticipantApi->projectParticipantPut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Element ID |
 **body** | [**\Swagger\Client\Model\ProjectParticipant**](../Model/ProjectParticipant.md)| Partial object describing what should be updated | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperProjectParticipant**](../Model/ResponseWrapperProjectParticipant.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/json; charset=utf-8
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

