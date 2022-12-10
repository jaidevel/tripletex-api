<?php
/**
 * LedgervatTypeApi
 * PHP version 5
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Tripletex API
 *
 * ## Usage  - **Download the spec** [swagger.json](/v2/swagger.json) file, it is a [OpenAPI Specification](https://github.com/OAI/OpenAPI-Specification).  - **Generating a client** can easily be done using tools like [swagger-codegen](https://github.com/swagger-api/swagger-codegen) or other that accepts [OpenAPI Specification](https://github.com/OAI/OpenAPI-Specification) specs.     - For swagger codegen it is recommended to use the flag: **--removeOperationIdPrefix**.        Unique operation ids are about to be introduced to the spec, and this ensures forward compatibility - and results in less verbose generated code.   ## Overview  - Partial resource updating is done using the `PUT` method with optional fields instead of the `PATCH` method.  - **Actions** or **commands** are represented in our RESTful path with a prefixed `:`. Example: `/v2/hours/123/:approve`.  - **Summaries** or **aggregated** results are represented in our RESTful path with a prefixed `>`. Example: `/v2/hours/>thisWeeksBillables`.  - **Request ID** is a key found in all responses in the header with the name `x-tlx-request-id`. For validation and error responses it is also in the response body. If additional log information is absolutely necessary, our support division can locate the key value.  - **version** This is a revision number found on all persisted resources. If included, it will prevent your PUT/POST from overriding any updates to the resource since your GET.  - **Date** follows the **[ISO 8601](https://en.wikipedia.org/wiki/ISO_8601)** standard, meaning the format `YYYY-MM-DD`.  - **DateTime** follows the **[ISO 8601](https://en.wikipedia.org/wiki/ISO_8601)** standard, meaning the format `YYYY-MM-DDThh:mm:ss`.  - **Searching** is done by entering values in the optional fields for each API call. The values fall into the following categories: range, in, exact and like.  - **Missing fields** or even **no response data** can occur because result objects and fields are filtered on authorization.  - **See [GitHub](https://github.com/Tripletex/tripletex-api2) for more documentation, examples, changelog and more.**  - **See [FAQ](https://tripletex.no/execute/docViewer?articleId=906&language=0) for additional information.**   ## Authentication  - **Tokens:** The Tripletex API uses 3 different tokens    - **consumerToken** is a token provided to the consumer by Tripletex after the API 2.0 registration is completed.    - **employeeToken** is a token created by an administrator in your Tripletex account via the user settings and the tab \"API access\". Each employee token must be given a set of entitlements. [Read more here.](https://tripletex.no/execute/docViewer?articleId=1505&languageId=0)    - **sessionToken** is the token from `/token/session/:create` which requires a consumerToken and an employeeToken created with the same consumer token, but not an authentication header.  - **Authentication** is done via [Basic access authentication](https://en.wikipedia.org/wiki/Basic_access_authentication)    - **username** is used to specify what company to access.      - `0` or blank means the company of the employee.      - Any other value means accountant clients. Use `/company/>withLoginAccess` to get a list of those.    - **password** is the **sessionToken**.    - If you need to create the header yourself use `Authorization: Basic <encoded token>` where `encoded token` is the string `<target company id or 0>:<your session token>` Base64 encoded.   ## Tags  - `[BETA]` This is a beta endpoint and can be subject to change. - `[DEPRECATED]` Deprecated means that we intend to remove/change this feature or capability in a future \"major\" API release. We therefore discourage all use of this feature/capability.   ## Fields  Use the `fields` parameter to specify which fields should be returned. This also supports fields from sub elements, done via `<field>(<subResourceFields>)`. `*` means all fields for that resource. Example values: - `project,activity,hours`  returns `{project:..., activity:...., hours:...}`. - just `project` returns `\"project\" : { \"id\": 12345, \"url\": \"tripletex.no/v2/projects/12345\"  }`. - `project(*)` returns `\"project\" : { \"id\": 12345 \"name\":\"ProjectName\" \"number.....startDate\": \"2013-01-07\" }`. - `project(name)` returns `\"project\" : { \"name\":\"ProjectName\" }`. - All resources and some subResources :  `*,activity(name),employee(*)`.   ## Sorting  Use the `sorting` parameter to specify sorting. It takes a comma separated list, where a `-` prefix denotes descending. You can sort by sub object with the following format: `<field>.<subObjectField>`. Example values: - `date` - `project.name` - `project.name, -date`   ## Changes  To get the changes for a resource, `changes` have to be explicitly specified as part of the `fields` parameter, e.g. `*,changes`. There are currently two types of change available:  - `CREATE` for when the resource was created - `UPDATE` for when the resource was updated  **NOTE** > For objects created prior to October 24th 2018 the list may be incomplete, but will always contain the CREATE and the last change (if the object has been changed after creation).   ## Rate limiting  Rate limiting is performed on the API calls for an employee for each API consumer. Status regarding the rate limit is returned as headers: - `X-Rate-Limit-Limit` - The number of allowed requests in the current period. - `X-Rate-Limit-Remaining` - The number of remaining requests. - `X-Rate-Limit-Reset` - The number of seconds left in the current period.  Once the rate limit is hit, all requests will return HTTP status code `429` for the remainder of the current period.   ## Response envelope  #### Multiple values  ```json {   \"fullResultSize\": ###, // {number} [DEPRECATED]   \"from\": ###, // {number} Paging starting from   \"count\": ###, // {number} Paging count   \"versionDigest\": \"###\", // {string} Hash of full result, null if no result   \"values\": [...{...object...},{...object...},{...object...}...] } ```  #### Single value  ```json {   \"value\": {...single object...} } ```   ## WebHook envelope  ```json {   \"subscriptionId\": ###, // Subscription id   \"event\": \"object.verb\", // As listed from /v2/event/   \"id\": ###, // Id of object this event is for   \"value\": {... single object, null if object.deleted ...} } ```   ## Error/warning envelope  ```json {   \"status\": ###, // {number} HTTP status code   \"code\": #####, // {number} internal status code of event   \"message\": \"###\", // {string} Basic feedback message in your language   \"link\": \"###\", // {string} Link to doc   \"developerMessage\": \"###\", // {string} More technical message   \"validationMessages\": [ // {array} List of validation messages, can be null     {       \"field\": \"###\", // {string} Name of field       \"message\": \"###\" // {string} Validation message for field     }   ],   \"requestId\": \"###\" // {string} Same as x-tlx-request-id  } ```   ## Status codes / Error codes  - **200 OK** - **201 Created** - From POSTs that create something new. - **204 No Content** - When there is no answer, ex: \"/:anAction\" or DELETE. - **400 Bad request** -   -  **4000** Bad Request Exception   - **11000** Illegal Filter Exception   - **12000** Path Param Exception   - **24000** Cryptography Exception - **401 Unauthorized** - When authentication is required and has failed or has not yet been provided   -  **3000** Authentication Exception - **403 Forbidden** - When AuthorisationManager says no.   -  **9000** Security Exception - **404 Not Found** - For resources that does not exist.   -  **6000** Not Found Exception - **409 Conflict** - Such as an edit conflict between multiple simultaneous updates   -  **7000** Object Exists Exception   -  **8000** Revision Exception   - **10000** Locked Exception   - **14000** Duplicate entry - **422 Bad Request** - For Required fields or things like malformed payload.   - **15000** Value Validation Exception   - **16000** Mapping Exception   - **17000** Sorting Exception   - **18000** Validation Exception   - **21000** Param Exception   - **22000** Invalid JSON Exception   - **23000** Result Set Too Large Exception - **429 Too Many Requests** - Request rate limit hit - **500 Internal Error** - Unexpected condition was encountered and no more specific message is suitable   - **1000** Exception
 *
 * OpenAPI spec version: 2.70.5
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 2.4.29
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Swagger\Client\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Swagger\Client\ApiException;
use Swagger\Client\Configuration;
use Swagger\Client\HeaderSelector;
use Swagger\Client\ObjectSerializer;

/**
 * LedgervatTypeApi Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class LedgervatTypeApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation ledgerVatTypeCreateRelativeVatTypeCreateRelativeVatType
     *
     * Create a new relative VAT Type. These are used if the company has 'forholdsmessig fradrag for inngående MVA'.
     *
     * @param  string $name VAT type name, max 8 characters. (required)
     * @param  int $vat_type_id VAT type ID. The relative VAT type will behave like this VAT type, except for the basis for calculating the VAT deduction, which is decided by the basis percentage. (required)
     * @param  float $percentage Basis percentage. This percentage will be multiplied with the transaction amount to find the amount that will be the basis for calculating the deduction amount. (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ResponseWrapperVatType
     */
    public function ledgerVatTypeCreateRelativeVatTypeCreateRelativeVatType($name, $vat_type_id, $percentage)
    {
        list($response) = $this->ledgerVatTypeCreateRelativeVatTypeCreateRelativeVatTypeWithHttpInfo($name, $vat_type_id, $percentage);
        return $response;
    }

    /**
     * Operation ledgerVatTypeCreateRelativeVatTypeCreateRelativeVatTypeWithHttpInfo
     *
     * Create a new relative VAT Type. These are used if the company has 'forholdsmessig fradrag for inngående MVA'.
     *
     * @param  string $name VAT type name, max 8 characters. (required)
     * @param  int $vat_type_id VAT type ID. The relative VAT type will behave like this VAT type, except for the basis for calculating the VAT deduction, which is decided by the basis percentage. (required)
     * @param  float $percentage Basis percentage. This percentage will be multiplied with the transaction amount to find the amount that will be the basis for calculating the deduction amount. (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ResponseWrapperVatType, HTTP status code, HTTP response headers (array of strings)
     */
    public function ledgerVatTypeCreateRelativeVatTypeCreateRelativeVatTypeWithHttpInfo($name, $vat_type_id, $percentage)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperVatType';
        $request = $this->ledgerVatTypeCreateRelativeVatTypeCreateRelativeVatTypeRequest($name, $vat_type_id, $percentage);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\ResponseWrapperVatType',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation ledgerVatTypeCreateRelativeVatTypeCreateRelativeVatTypeAsync
     *
     * Create a new relative VAT Type. These are used if the company has 'forholdsmessig fradrag for inngående MVA'.
     *
     * @param  string $name VAT type name, max 8 characters. (required)
     * @param  int $vat_type_id VAT type ID. The relative VAT type will behave like this VAT type, except for the basis for calculating the VAT deduction, which is decided by the basis percentage. (required)
     * @param  float $percentage Basis percentage. This percentage will be multiplied with the transaction amount to find the amount that will be the basis for calculating the deduction amount. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function ledgerVatTypeCreateRelativeVatTypeCreateRelativeVatTypeAsync($name, $vat_type_id, $percentage)
    {
        return $this->ledgerVatTypeCreateRelativeVatTypeCreateRelativeVatTypeAsyncWithHttpInfo($name, $vat_type_id, $percentage)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation ledgerVatTypeCreateRelativeVatTypeCreateRelativeVatTypeAsyncWithHttpInfo
     *
     * Create a new relative VAT Type. These are used if the company has 'forholdsmessig fradrag for inngående MVA'.
     *
     * @param  string $name VAT type name, max 8 characters. (required)
     * @param  int $vat_type_id VAT type ID. The relative VAT type will behave like this VAT type, except for the basis for calculating the VAT deduction, which is decided by the basis percentage. (required)
     * @param  float $percentage Basis percentage. This percentage will be multiplied with the transaction amount to find the amount that will be the basis for calculating the deduction amount. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function ledgerVatTypeCreateRelativeVatTypeCreateRelativeVatTypeAsyncWithHttpInfo($name, $vat_type_id, $percentage)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperVatType';
        $request = $this->ledgerVatTypeCreateRelativeVatTypeCreateRelativeVatTypeRequest($name, $vat_type_id, $percentage);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'ledgerVatTypeCreateRelativeVatTypeCreateRelativeVatType'
     *
     * @param  string $name VAT type name, max 8 characters. (required)
     * @param  int $vat_type_id VAT type ID. The relative VAT type will behave like this VAT type, except for the basis for calculating the VAT deduction, which is decided by the basis percentage. (required)
     * @param  float $percentage Basis percentage. This percentage will be multiplied with the transaction amount to find the amount that will be the basis for calculating the deduction amount. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function ledgerVatTypeCreateRelativeVatTypeCreateRelativeVatTypeRequest($name, $vat_type_id, $percentage)
    {
        // verify the required parameter 'name' is set
        if ($name === null || (is_array($name) && count($name) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $name when calling ledgerVatTypeCreateRelativeVatTypeCreateRelativeVatType'
            );
        }
        // verify the required parameter 'vat_type_id' is set
        if ($vat_type_id === null || (is_array($vat_type_id) && count($vat_type_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $vat_type_id when calling ledgerVatTypeCreateRelativeVatTypeCreateRelativeVatType'
            );
        }
        // verify the required parameter 'percentage' is set
        if ($percentage === null || (is_array($percentage) && count($percentage) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $percentage when calling ledgerVatTypeCreateRelativeVatTypeCreateRelativeVatType'
            );
        }

        $resourcePath = '/ledger/vatType/createRelativeVatType';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($name !== null) {
            $queryParams['name'] = ObjectSerializer::toQueryValue($name);
        }
        // query params
        if ($vat_type_id !== null) {
            $queryParams['vatTypeId'] = ObjectSerializer::toQueryValue($vat_type_id);
        }
        // query params
        if ($percentage !== null) {
            $queryParams['percentage'] = ObjectSerializer::toQueryValue($percentage);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                []
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                [],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            
            if($headers['Content-Type'] === 'application/json') {
                // \stdClass has no __toString(), so we should encode it manually
                if ($httpBody instanceof \stdClass) {
                    $httpBody = \GuzzleHttp\json_encode($httpBody);
                }
                // array has no __toString(), so we should encode it manually
                if(is_array($httpBody)) {
                    $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($httpBody));
                }
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }

        // this endpoint requires HTTP basic authentication
        if ($this->config->getUsername() !== null || $this->config->getPassword() !== null) {
            $headers['Authorization'] = 'Basic ' . base64_encode($this->config->getUsername() . ":" . $this->config->getPassword());
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'PUT',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation ledgerVatTypeGet
     *
     * Get vat type by ID.
     *
     * @param  int $id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ResponseWrapperVatType
     */
    public function ledgerVatTypeGet($id, $fields = null)
    {
        list($response) = $this->ledgerVatTypeGetWithHttpInfo($id, $fields);
        return $response;
    }

    /**
     * Operation ledgerVatTypeGetWithHttpInfo
     *
     * Get vat type by ID.
     *
     * @param  int $id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ResponseWrapperVatType, HTTP status code, HTTP response headers (array of strings)
     */
    public function ledgerVatTypeGetWithHttpInfo($id, $fields = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperVatType';
        $request = $this->ledgerVatTypeGetRequest($id, $fields);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\ResponseWrapperVatType',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation ledgerVatTypeGetAsync
     *
     * Get vat type by ID.
     *
     * @param  int $id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function ledgerVatTypeGetAsync($id, $fields = null)
    {
        return $this->ledgerVatTypeGetAsyncWithHttpInfo($id, $fields)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation ledgerVatTypeGetAsyncWithHttpInfo
     *
     * Get vat type by ID.
     *
     * @param  int $id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function ledgerVatTypeGetAsyncWithHttpInfo($id, $fields = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperVatType';
        $request = $this->ledgerVatTypeGetRequest($id, $fields);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'ledgerVatTypeGet'
     *
     * @param  int $id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function ledgerVatTypeGetRequest($id, $fields = null)
    {
        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling ledgerVatTypeGet'
            );
        }

        $resourcePath = '/ledger/vatType/{id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($fields !== null) {
            $queryParams['fields'] = ObjectSerializer::toQueryValue($fields);
        }

        // path params
        if ($id !== null) {
            $resourcePath = str_replace(
                '{' . 'id' . '}',
                ObjectSerializer::toPathValue($id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                []
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                [],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            
            if($headers['Content-Type'] === 'application/json') {
                // \stdClass has no __toString(), so we should encode it manually
                if ($httpBody instanceof \stdClass) {
                    $httpBody = \GuzzleHttp\json_encode($httpBody);
                }
                // array has no __toString(), so we should encode it manually
                if(is_array($httpBody)) {
                    $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($httpBody));
                }
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }

        // this endpoint requires HTTP basic authentication
        if ($this->config->getUsername() !== null || $this->config->getPassword() !== null) {
            $headers['Authorization'] = 'Basic ' . base64_encode($this->config->getUsername() . ":" . $this->config->getPassword());
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation ledgerVatTypeSearch
     *
     * Find vat types corresponding with sent data.
     *
     * @param  string $id List of IDs (optional)
     * @param  string $number List of IDs (optional)
     * @param  string $type_of_vat Type of VAT (optional)
     * @param  string $vat_date yyyy-MM-dd. Defaults to today. Note that this is only used in combination with typeOfVat-parameter. Only valid vatTypes on the given date are returned. (optional)
     * @param  bool $should_include_specification_types Equals (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  int $count Number of elements to return (optional, default to 1000)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ListResponseVatType
     */
    public function ledgerVatTypeSearch($id = null, $number = null, $type_of_vat = null, $vat_date = null, $should_include_specification_types = null, $from = '0', $count = '1000', $sorting = null, $fields = null)
    {
        list($response) = $this->ledgerVatTypeSearchWithHttpInfo($id, $number, $type_of_vat, $vat_date, $should_include_specification_types, $from, $count, $sorting, $fields);
        return $response;
    }

    /**
     * Operation ledgerVatTypeSearchWithHttpInfo
     *
     * Find vat types corresponding with sent data.
     *
     * @param  string $id List of IDs (optional)
     * @param  string $number List of IDs (optional)
     * @param  string $type_of_vat Type of VAT (optional)
     * @param  string $vat_date yyyy-MM-dd. Defaults to today. Note that this is only used in combination with typeOfVat-parameter. Only valid vatTypes on the given date are returned. (optional)
     * @param  bool $should_include_specification_types Equals (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  int $count Number of elements to return (optional, default to 1000)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ListResponseVatType, HTTP status code, HTTP response headers (array of strings)
     */
    public function ledgerVatTypeSearchWithHttpInfo($id = null, $number = null, $type_of_vat = null, $vat_date = null, $should_include_specification_types = null, $from = '0', $count = '1000', $sorting = null, $fields = null)
    {
        $returnType = '\Swagger\Client\Model\ListResponseVatType';
        $request = $this->ledgerVatTypeSearchRequest($id, $number, $type_of_vat, $vat_date, $should_include_specification_types, $from, $count, $sorting, $fields);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\ListResponseVatType',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation ledgerVatTypeSearchAsync
     *
     * Find vat types corresponding with sent data.
     *
     * @param  string $id List of IDs (optional)
     * @param  string $number List of IDs (optional)
     * @param  string $type_of_vat Type of VAT (optional)
     * @param  string $vat_date yyyy-MM-dd. Defaults to today. Note that this is only used in combination with typeOfVat-parameter. Only valid vatTypes on the given date are returned. (optional)
     * @param  bool $should_include_specification_types Equals (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  int $count Number of elements to return (optional, default to 1000)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function ledgerVatTypeSearchAsync($id = null, $number = null, $type_of_vat = null, $vat_date = null, $should_include_specification_types = null, $from = '0', $count = '1000', $sorting = null, $fields = null)
    {
        return $this->ledgerVatTypeSearchAsyncWithHttpInfo($id, $number, $type_of_vat, $vat_date, $should_include_specification_types, $from, $count, $sorting, $fields)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation ledgerVatTypeSearchAsyncWithHttpInfo
     *
     * Find vat types corresponding with sent data.
     *
     * @param  string $id List of IDs (optional)
     * @param  string $number List of IDs (optional)
     * @param  string $type_of_vat Type of VAT (optional)
     * @param  string $vat_date yyyy-MM-dd. Defaults to today. Note that this is only used in combination with typeOfVat-parameter. Only valid vatTypes on the given date are returned. (optional)
     * @param  bool $should_include_specification_types Equals (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  int $count Number of elements to return (optional, default to 1000)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function ledgerVatTypeSearchAsyncWithHttpInfo($id = null, $number = null, $type_of_vat = null, $vat_date = null, $should_include_specification_types = null, $from = '0', $count = '1000', $sorting = null, $fields = null)
    {
        $returnType = '\Swagger\Client\Model\ListResponseVatType';
        $request = $this->ledgerVatTypeSearchRequest($id, $number, $type_of_vat, $vat_date, $should_include_specification_types, $from, $count, $sorting, $fields);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'ledgerVatTypeSearch'
     *
     * @param  string $id List of IDs (optional)
     * @param  string $number List of IDs (optional)
     * @param  string $type_of_vat Type of VAT (optional)
     * @param  string $vat_date yyyy-MM-dd. Defaults to today. Note that this is only used in combination with typeOfVat-parameter. Only valid vatTypes on the given date are returned. (optional)
     * @param  bool $should_include_specification_types Equals (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  int $count Number of elements to return (optional, default to 1000)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function ledgerVatTypeSearchRequest($id = null, $number = null, $type_of_vat = null, $vat_date = null, $should_include_specification_types = null, $from = '0', $count = '1000', $sorting = null, $fields = null)
    {

        $resourcePath = '/ledger/vatType';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($id !== null) {
            $queryParams['id'] = ObjectSerializer::toQueryValue($id);
        }
        // query params
        if ($number !== null) {
            $queryParams['number'] = ObjectSerializer::toQueryValue($number);
        }
        // query params
        if ($type_of_vat !== null) {
            $queryParams['typeOfVat'] = ObjectSerializer::toQueryValue($type_of_vat);
        }
        // query params
        if ($vat_date !== null) {
            $queryParams['vatDate'] = ObjectSerializer::toQueryValue($vat_date);
        }
        // query params
        if ($should_include_specification_types !== null) {
            $queryParams['shouldIncludeSpecificationTypes'] = ObjectSerializer::toQueryValue($should_include_specification_types);
        }
        // query params
        if ($from !== null) {
            $queryParams['from'] = ObjectSerializer::toQueryValue($from);
        }
        // query params
        if ($count !== null) {
            $queryParams['count'] = ObjectSerializer::toQueryValue($count);
        }
        // query params
        if ($sorting !== null) {
            $queryParams['sorting'] = ObjectSerializer::toQueryValue($sorting);
        }
        // query params
        if ($fields !== null) {
            $queryParams['fields'] = ObjectSerializer::toQueryValue($fields);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                []
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                [],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            
            if($headers['Content-Type'] === 'application/json') {
                // \stdClass has no __toString(), so we should encode it manually
                if ($httpBody instanceof \stdClass) {
                    $httpBody = \GuzzleHttp\json_encode($httpBody);
                }
                // array has no __toString(), so we should encode it manually
                if(is_array($httpBody)) {
                    $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($httpBody));
                }
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
        }

        // this endpoint requires HTTP basic authentication
        if ($this->config->getUsername() !== null || $this->config->getPassword() !== null) {
            $headers['Authorization'] = 'Basic ' . base64_encode($this->config->getUsername() . ":" . $this->config->getPassword());
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
