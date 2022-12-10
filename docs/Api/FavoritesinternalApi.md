# Swagger\Client\FavoritesinternalApi

All URIs are relative to *https://api.tripletex.io/v2*

Method | HTTP request | Description
------------- | ------------- | -------------
[**internalFavoritesDelete**](FavoritesinternalApi.md#internalFavoritesDelete) | **DELETE** /internal/favorites/{id} | Delete a favorite
[**internalFavoritesGet**](FavoritesinternalApi.md#internalFavoritesGet) | **GET** /internal/favorites | Get favorite menu
[**internalFavoritesPost**](FavoritesinternalApi.md#internalFavoritesPost) | **POST** /internal/favorites | Add new favorite
[**internalFavoritesPut**](FavoritesinternalApi.md#internalFavoritesPut) | **PUT** /internal/favorites/{id} | Update a favorite


# **internalFavoritesDelete**
> internalFavoritesDelete($id)

Delete a favorite



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\FavoritesinternalApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Equals

try {
    $apiInstance->internalFavoritesDelete($id);
} catch (Exception $e) {
    echo 'Exception when calling FavoritesinternalApi->internalFavoritesDelete: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Equals |

### Return type

void (empty response body)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **internalFavoritesGet**
> \Swagger\Client\Model\ResponseWrapperFavoriteMenu internalFavoritesGet($fields)

Get favorite menu



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\FavoritesinternalApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->internalFavoritesGet($fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FavoritesinternalApi->internalFavoritesGet: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **fields** | **string**| Fields filter pattern | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperFavoriteMenu**](../Model/ResponseWrapperFavoriteMenu.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **internalFavoritesPost**
> \Swagger\Client\Model\ResponseWrapperInteger internalFavoritesPost($page_url, $name)

Add new favorite



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\FavoritesinternalApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$page_url = "page_url_example"; // string | Equals
$name = "name_example"; // string | Equals

try {
    $result = $apiInstance->internalFavoritesPost($page_url, $name);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FavoritesinternalApi->internalFavoritesPost: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **page_url** | **string**| Equals | [optional]
 **name** | **string**| Equals | [optional]

### Return type

[**\Swagger\Client\Model\ResponseWrapperInteger**](../Model/ResponseWrapperInteger.md)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/x-www-form-urlencoded
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **internalFavoritesPut**
> internalFavoritesPut($id, $name, $rank)

Update a favorite



### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');


$apiInstance = new Swagger\Client\Api\FavoritesinternalApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 56; // int | Equals
$name = "name_example"; // string | Equals
$rank = 56; // int | Equals

try {
    $apiInstance->internalFavoritesPut($id, $name, $rank);
} catch (Exception $e) {
    echo 'Exception when calling FavoritesinternalApi->internalFavoritesPut: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| Equals |
 **name** | **string**| Equals |
 **rank** | **int**| Equals | [optional]

### Return type

void (empty response body)

### Authorization

[tokenAuthScheme](../../README.md#tokenAuthScheme)

### HTTP request headers

 - **Content-Type**: application/x-www-form-urlencoded
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

