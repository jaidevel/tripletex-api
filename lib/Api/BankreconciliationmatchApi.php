<?php
/**
 * BankreconciliationmatchApi
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
 * BankreconciliationmatchApi Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class BankreconciliationmatchApi
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
     * Operation bankReconciliationMatchCountCount
     *
     * Get the total number of matches
     *
     * @param  int $bank_reconciliation_id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ResponseWrapperInteger
     */
    public function bankReconciliationMatchCountCount($bank_reconciliation_id, $fields = null)
    {
        list($response) = $this->bankReconciliationMatchCountCountWithHttpInfo($bank_reconciliation_id, $fields);
        return $response;
    }

    /**
     * Operation bankReconciliationMatchCountCountWithHttpInfo
     *
     * Get the total number of matches
     *
     * @param  int $bank_reconciliation_id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ResponseWrapperInteger, HTTP status code, HTTP response headers (array of strings)
     */
    public function bankReconciliationMatchCountCountWithHttpInfo($bank_reconciliation_id, $fields = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperInteger';
        $request = $this->bankReconciliationMatchCountCountRequest($bank_reconciliation_id, $fields);

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
                        '\Swagger\Client\Model\ResponseWrapperInteger',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation bankReconciliationMatchCountCountAsync
     *
     * Get the total number of matches
     *
     * @param  int $bank_reconciliation_id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function bankReconciliationMatchCountCountAsync($bank_reconciliation_id, $fields = null)
    {
        return $this->bankReconciliationMatchCountCountAsyncWithHttpInfo($bank_reconciliation_id, $fields)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation bankReconciliationMatchCountCountAsyncWithHttpInfo
     *
     * Get the total number of matches
     *
     * @param  int $bank_reconciliation_id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function bankReconciliationMatchCountCountAsyncWithHttpInfo($bank_reconciliation_id, $fields = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperInteger';
        $request = $this->bankReconciliationMatchCountCountRequest($bank_reconciliation_id, $fields);

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
     * Create request for operation 'bankReconciliationMatchCountCount'
     *
     * @param  int $bank_reconciliation_id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function bankReconciliationMatchCountCountRequest($bank_reconciliation_id, $fields = null)
    {
        // verify the required parameter 'bank_reconciliation_id' is set
        if ($bank_reconciliation_id === null || (is_array($bank_reconciliation_id) && count($bank_reconciliation_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $bank_reconciliation_id when calling bankReconciliationMatchCountCount'
            );
        }

        $resourcePath = '/bank/reconciliation/match/count';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($bank_reconciliation_id !== null) {
            $queryParams['bankReconciliationId'] = ObjectSerializer::toQueryValue($bank_reconciliation_id);
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
     * Operation bankReconciliationMatchDelete
     *
     * Delete a bank reconciliation match by ID.
     *
     * @param  int $id Element ID (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function bankReconciliationMatchDelete($id)
    {
        $this->bankReconciliationMatchDeleteWithHttpInfo($id);
    }

    /**
     * Operation bankReconciliationMatchDeleteWithHttpInfo
     *
     * Delete a bank reconciliation match by ID.
     *
     * @param  int $id Element ID (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function bankReconciliationMatchDeleteWithHttpInfo($id)
    {
        $returnType = '';
        $request = $this->bankReconciliationMatchDeleteRequest($id);

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

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
            throw $e;
        }
    }

    /**
     * Operation bankReconciliationMatchDeleteAsync
     *
     * Delete a bank reconciliation match by ID.
     *
     * @param  int $id Element ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function bankReconciliationMatchDeleteAsync($id)
    {
        return $this->bankReconciliationMatchDeleteAsyncWithHttpInfo($id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation bankReconciliationMatchDeleteAsyncWithHttpInfo
     *
     * Delete a bank reconciliation match by ID.
     *
     * @param  int $id Element ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function bankReconciliationMatchDeleteAsyncWithHttpInfo($id)
    {
        $returnType = '';
        $request = $this->bankReconciliationMatchDeleteRequest($id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
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
     * Create request for operation 'bankReconciliationMatchDelete'
     *
     * @param  int $id Element ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function bankReconciliationMatchDeleteRequest($id)
    {
        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling bankReconciliationMatchDelete'
            );
        }

        $resourcePath = '/bank/reconciliation/match/{id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


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
            'DELETE',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation bankReconciliationMatchGet
     *
     * Get bank reconciliation match by ID.
     *
     * @param  int $id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ResponseWrapperBankReconciliationMatch
     */
    public function bankReconciliationMatchGet($id, $fields = null)
    {
        list($response) = $this->bankReconciliationMatchGetWithHttpInfo($id, $fields);
        return $response;
    }

    /**
     * Operation bankReconciliationMatchGetWithHttpInfo
     *
     * Get bank reconciliation match by ID.
     *
     * @param  int $id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ResponseWrapperBankReconciliationMatch, HTTP status code, HTTP response headers (array of strings)
     */
    public function bankReconciliationMatchGetWithHttpInfo($id, $fields = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperBankReconciliationMatch';
        $request = $this->bankReconciliationMatchGetRequest($id, $fields);

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
                        '\Swagger\Client\Model\ResponseWrapperBankReconciliationMatch',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation bankReconciliationMatchGetAsync
     *
     * Get bank reconciliation match by ID.
     *
     * @param  int $id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function bankReconciliationMatchGetAsync($id, $fields = null)
    {
        return $this->bankReconciliationMatchGetAsyncWithHttpInfo($id, $fields)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation bankReconciliationMatchGetAsyncWithHttpInfo
     *
     * Get bank reconciliation match by ID.
     *
     * @param  int $id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function bankReconciliationMatchGetAsyncWithHttpInfo($id, $fields = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperBankReconciliationMatch';
        $request = $this->bankReconciliationMatchGetRequest($id, $fields);

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
     * Create request for operation 'bankReconciliationMatchGet'
     *
     * @param  int $id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function bankReconciliationMatchGetRequest($id, $fields = null)
    {
        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling bankReconciliationMatchGet'
            );
        }

        $resourcePath = '/bank/reconciliation/match/{id}';
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
     * Operation bankReconciliationMatchPost
     *
     * Create a bank reconciliation match.
     *
     * @param  \Swagger\Client\Model\BankReconciliationMatch $body Partial object describing what should be updated (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ResponseWrapperBankReconciliationMatch
     */
    public function bankReconciliationMatchPost($body = null)
    {
        list($response) = $this->bankReconciliationMatchPostWithHttpInfo($body);
        return $response;
    }

    /**
     * Operation bankReconciliationMatchPostWithHttpInfo
     *
     * Create a bank reconciliation match.
     *
     * @param  \Swagger\Client\Model\BankReconciliationMatch $body Partial object describing what should be updated (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ResponseWrapperBankReconciliationMatch, HTTP status code, HTTP response headers (array of strings)
     */
    public function bankReconciliationMatchPostWithHttpInfo($body = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperBankReconciliationMatch';
        $request = $this->bankReconciliationMatchPostRequest($body);

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
                case 201:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Swagger\Client\Model\ResponseWrapperBankReconciliationMatch',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation bankReconciliationMatchPostAsync
     *
     * Create a bank reconciliation match.
     *
     * @param  \Swagger\Client\Model\BankReconciliationMatch $body Partial object describing what should be updated (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function bankReconciliationMatchPostAsync($body = null)
    {
        return $this->bankReconciliationMatchPostAsyncWithHttpInfo($body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation bankReconciliationMatchPostAsyncWithHttpInfo
     *
     * Create a bank reconciliation match.
     *
     * @param  \Swagger\Client\Model\BankReconciliationMatch $body Partial object describing what should be updated (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function bankReconciliationMatchPostAsyncWithHttpInfo($body = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperBankReconciliationMatch';
        $request = $this->bankReconciliationMatchPostRequest($body);

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
     * Create request for operation 'bankReconciliationMatchPost'
     *
     * @param  \Swagger\Client\Model\BankReconciliationMatch $body Partial object describing what should be updated (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function bankReconciliationMatchPostRequest($body = null)
    {

        $resourcePath = '/bank/reconciliation/match';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                []
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                [],
                ['application/json; charset=utf-8']
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
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation bankReconciliationMatchPut
     *
     * Update a bank reconciliation match by ID.
     *
     * @param  int $id Element ID (required)
     * @param  \Swagger\Client\Model\BankReconciliationMatch $body Partial object describing what should be updated (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ResponseWrapperBankReconciliationMatch
     */
    public function bankReconciliationMatchPut($id, $body = null)
    {
        list($response) = $this->bankReconciliationMatchPutWithHttpInfo($id, $body);
        return $response;
    }

    /**
     * Operation bankReconciliationMatchPutWithHttpInfo
     *
     * Update a bank reconciliation match by ID.
     *
     * @param  int $id Element ID (required)
     * @param  \Swagger\Client\Model\BankReconciliationMatch $body Partial object describing what should be updated (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ResponseWrapperBankReconciliationMatch, HTTP status code, HTTP response headers (array of strings)
     */
    public function bankReconciliationMatchPutWithHttpInfo($id, $body = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperBankReconciliationMatch';
        $request = $this->bankReconciliationMatchPutRequest($id, $body);

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
                        '\Swagger\Client\Model\ResponseWrapperBankReconciliationMatch',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation bankReconciliationMatchPutAsync
     *
     * Update a bank reconciliation match by ID.
     *
     * @param  int $id Element ID (required)
     * @param  \Swagger\Client\Model\BankReconciliationMatch $body Partial object describing what should be updated (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function bankReconciliationMatchPutAsync($id, $body = null)
    {
        return $this->bankReconciliationMatchPutAsyncWithHttpInfo($id, $body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation bankReconciliationMatchPutAsyncWithHttpInfo
     *
     * Update a bank reconciliation match by ID.
     *
     * @param  int $id Element ID (required)
     * @param  \Swagger\Client\Model\BankReconciliationMatch $body Partial object describing what should be updated (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function bankReconciliationMatchPutAsyncWithHttpInfo($id, $body = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperBankReconciliationMatch';
        $request = $this->bankReconciliationMatchPutRequest($id, $body);

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
     * Create request for operation 'bankReconciliationMatchPut'
     *
     * @param  int $id Element ID (required)
     * @param  \Swagger\Client\Model\BankReconciliationMatch $body Partial object describing what should be updated (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function bankReconciliationMatchPutRequest($id, $body = null)
    {
        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling bankReconciliationMatchPut'
            );
        }

        $resourcePath = '/bank/reconciliation/match/{id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


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
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                []
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                [],
                ['application/json; charset=utf-8']
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
     * Operation bankReconciliationMatchQueryQuery
     *
     * [INTERNAL] Wildcard search.
     *
     * @param  int $bank_reconciliation_id The bank reconciliation id (optional)
     * @param  bool $approved Approved or unapproved matches (optional)
     * @param  int $count Number of elements to return (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ListResponseBankReconciliationMatch
     */
    public function bankReconciliationMatchQueryQuery($bank_reconciliation_id = null, $approved = null, $count = null, $from = '0', $sorting = null, $fields = null)
    {
        list($response) = $this->bankReconciliationMatchQueryQueryWithHttpInfo($bank_reconciliation_id, $approved, $count, $from, $sorting, $fields);
        return $response;
    }

    /**
     * Operation bankReconciliationMatchQueryQueryWithHttpInfo
     *
     * [INTERNAL] Wildcard search.
     *
     * @param  int $bank_reconciliation_id The bank reconciliation id (optional)
     * @param  bool $approved Approved or unapproved matches (optional)
     * @param  int $count Number of elements to return (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ListResponseBankReconciliationMatch, HTTP status code, HTTP response headers (array of strings)
     */
    public function bankReconciliationMatchQueryQueryWithHttpInfo($bank_reconciliation_id = null, $approved = null, $count = null, $from = '0', $sorting = null, $fields = null)
    {
        $returnType = '\Swagger\Client\Model\ListResponseBankReconciliationMatch';
        $request = $this->bankReconciliationMatchQueryQueryRequest($bank_reconciliation_id, $approved, $count, $from, $sorting, $fields);

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
                        '\Swagger\Client\Model\ListResponseBankReconciliationMatch',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation bankReconciliationMatchQueryQueryAsync
     *
     * [INTERNAL] Wildcard search.
     *
     * @param  int $bank_reconciliation_id The bank reconciliation id (optional)
     * @param  bool $approved Approved or unapproved matches (optional)
     * @param  int $count Number of elements to return (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function bankReconciliationMatchQueryQueryAsync($bank_reconciliation_id = null, $approved = null, $count = null, $from = '0', $sorting = null, $fields = null)
    {
        return $this->bankReconciliationMatchQueryQueryAsyncWithHttpInfo($bank_reconciliation_id, $approved, $count, $from, $sorting, $fields)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation bankReconciliationMatchQueryQueryAsyncWithHttpInfo
     *
     * [INTERNAL] Wildcard search.
     *
     * @param  int $bank_reconciliation_id The bank reconciliation id (optional)
     * @param  bool $approved Approved or unapproved matches (optional)
     * @param  int $count Number of elements to return (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function bankReconciliationMatchQueryQueryAsyncWithHttpInfo($bank_reconciliation_id = null, $approved = null, $count = null, $from = '0', $sorting = null, $fields = null)
    {
        $returnType = '\Swagger\Client\Model\ListResponseBankReconciliationMatch';
        $request = $this->bankReconciliationMatchQueryQueryRequest($bank_reconciliation_id, $approved, $count, $from, $sorting, $fields);

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
     * Create request for operation 'bankReconciliationMatchQueryQuery'
     *
     * @param  int $bank_reconciliation_id The bank reconciliation id (optional)
     * @param  bool $approved Approved or unapproved matches (optional)
     * @param  int $count Number of elements to return (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function bankReconciliationMatchQueryQueryRequest($bank_reconciliation_id = null, $approved = null, $count = null, $from = '0', $sorting = null, $fields = null)
    {

        $resourcePath = '/bank/reconciliation/match/query';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($bank_reconciliation_id !== null) {
            $queryParams['bankReconciliationId'] = ObjectSerializer::toQueryValue($bank_reconciliation_id);
        }
        // query params
        if ($approved !== null) {
            $queryParams['approved'] = ObjectSerializer::toQueryValue($approved);
        }
        // query params
        if ($count !== null) {
            $queryParams['count'] = ObjectSerializer::toQueryValue($count);
        }
        // query params
        if ($from !== null) {
            $queryParams['from'] = ObjectSerializer::toQueryValue($from);
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
     * Operation bankReconciliationMatchSearch
     *
     * Find bank reconciliation match corresponding with sent data.
     *
     * @param  string $id List of IDs (optional)
     * @param  string $bank_reconciliation_id List of bank reconciliation IDs (optional)
     * @param  int $count Number of elements to return (optional, default to 5000)
     * @param  bool $approved Approved or unapproved matches (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ListResponseBankReconciliationMatch
     */
    public function bankReconciliationMatchSearch($id = null, $bank_reconciliation_id = null, $count = '5000', $approved = null, $from = '0', $sorting = null, $fields = null)
    {
        list($response) = $this->bankReconciliationMatchSearchWithHttpInfo($id, $bank_reconciliation_id, $count, $approved, $from, $sorting, $fields);
        return $response;
    }

    /**
     * Operation bankReconciliationMatchSearchWithHttpInfo
     *
     * Find bank reconciliation match corresponding with sent data.
     *
     * @param  string $id List of IDs (optional)
     * @param  string $bank_reconciliation_id List of bank reconciliation IDs (optional)
     * @param  int $count Number of elements to return (optional, default to 5000)
     * @param  bool $approved Approved or unapproved matches (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ListResponseBankReconciliationMatch, HTTP status code, HTTP response headers (array of strings)
     */
    public function bankReconciliationMatchSearchWithHttpInfo($id = null, $bank_reconciliation_id = null, $count = '5000', $approved = null, $from = '0', $sorting = null, $fields = null)
    {
        $returnType = '\Swagger\Client\Model\ListResponseBankReconciliationMatch';
        $request = $this->bankReconciliationMatchSearchRequest($id, $bank_reconciliation_id, $count, $approved, $from, $sorting, $fields);

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
                        '\Swagger\Client\Model\ListResponseBankReconciliationMatch',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation bankReconciliationMatchSearchAsync
     *
     * Find bank reconciliation match corresponding with sent data.
     *
     * @param  string $id List of IDs (optional)
     * @param  string $bank_reconciliation_id List of bank reconciliation IDs (optional)
     * @param  int $count Number of elements to return (optional, default to 5000)
     * @param  bool $approved Approved or unapproved matches (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function bankReconciliationMatchSearchAsync($id = null, $bank_reconciliation_id = null, $count = '5000', $approved = null, $from = '0', $sorting = null, $fields = null)
    {
        return $this->bankReconciliationMatchSearchAsyncWithHttpInfo($id, $bank_reconciliation_id, $count, $approved, $from, $sorting, $fields)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation bankReconciliationMatchSearchAsyncWithHttpInfo
     *
     * Find bank reconciliation match corresponding with sent data.
     *
     * @param  string $id List of IDs (optional)
     * @param  string $bank_reconciliation_id List of bank reconciliation IDs (optional)
     * @param  int $count Number of elements to return (optional, default to 5000)
     * @param  bool $approved Approved or unapproved matches (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function bankReconciliationMatchSearchAsyncWithHttpInfo($id = null, $bank_reconciliation_id = null, $count = '5000', $approved = null, $from = '0', $sorting = null, $fields = null)
    {
        $returnType = '\Swagger\Client\Model\ListResponseBankReconciliationMatch';
        $request = $this->bankReconciliationMatchSearchRequest($id, $bank_reconciliation_id, $count, $approved, $from, $sorting, $fields);

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
     * Create request for operation 'bankReconciliationMatchSearch'
     *
     * @param  string $id List of IDs (optional)
     * @param  string $bank_reconciliation_id List of bank reconciliation IDs (optional)
     * @param  int $count Number of elements to return (optional, default to 5000)
     * @param  bool $approved Approved or unapproved matches (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function bankReconciliationMatchSearchRequest($id = null, $bank_reconciliation_id = null, $count = '5000', $approved = null, $from = '0', $sorting = null, $fields = null)
    {

        $resourcePath = '/bank/reconciliation/match';
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
        if ($bank_reconciliation_id !== null) {
            $queryParams['bankReconciliationId'] = ObjectSerializer::toQueryValue($bank_reconciliation_id);
        }
        // query params
        if ($count !== null) {
            $queryParams['count'] = ObjectSerializer::toQueryValue($count);
        }
        // query params
        if ($approved !== null) {
            $queryParams['approved'] = ObjectSerializer::toQueryValue($approved);
        }
        // query params
        if ($from !== null) {
            $queryParams['from'] = ObjectSerializer::toQueryValue($from);
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
     * Operation bankReconciliationMatchSuggestSuggest
     *
     * Suggest matches for a bank reconciliation by ID.
     *
     * @param  int $bank_reconciliation_id Element ID (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ListResponseBankReconciliationMatch
     */
    public function bankReconciliationMatchSuggestSuggest($bank_reconciliation_id)
    {
        list($response) = $this->bankReconciliationMatchSuggestSuggestWithHttpInfo($bank_reconciliation_id);
        return $response;
    }

    /**
     * Operation bankReconciliationMatchSuggestSuggestWithHttpInfo
     *
     * Suggest matches for a bank reconciliation by ID.
     *
     * @param  int $bank_reconciliation_id Element ID (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ListResponseBankReconciliationMatch, HTTP status code, HTTP response headers (array of strings)
     */
    public function bankReconciliationMatchSuggestSuggestWithHttpInfo($bank_reconciliation_id)
    {
        $returnType = '\Swagger\Client\Model\ListResponseBankReconciliationMatch';
        $request = $this->bankReconciliationMatchSuggestSuggestRequest($bank_reconciliation_id);

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
                        '\Swagger\Client\Model\ListResponseBankReconciliationMatch',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation bankReconciliationMatchSuggestSuggestAsync
     *
     * Suggest matches for a bank reconciliation by ID.
     *
     * @param  int $bank_reconciliation_id Element ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function bankReconciliationMatchSuggestSuggestAsync($bank_reconciliation_id)
    {
        return $this->bankReconciliationMatchSuggestSuggestAsyncWithHttpInfo($bank_reconciliation_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation bankReconciliationMatchSuggestSuggestAsyncWithHttpInfo
     *
     * Suggest matches for a bank reconciliation by ID.
     *
     * @param  int $bank_reconciliation_id Element ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function bankReconciliationMatchSuggestSuggestAsyncWithHttpInfo($bank_reconciliation_id)
    {
        $returnType = '\Swagger\Client\Model\ListResponseBankReconciliationMatch';
        $request = $this->bankReconciliationMatchSuggestSuggestRequest($bank_reconciliation_id);

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
     * Create request for operation 'bankReconciliationMatchSuggestSuggest'
     *
     * @param  int $bank_reconciliation_id Element ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function bankReconciliationMatchSuggestSuggestRequest($bank_reconciliation_id)
    {
        // verify the required parameter 'bank_reconciliation_id' is set
        if ($bank_reconciliation_id === null || (is_array($bank_reconciliation_id) && count($bank_reconciliation_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $bank_reconciliation_id when calling bankReconciliationMatchSuggestSuggest'
            );
        }

        $resourcePath = '/bank/reconciliation/match/:suggest';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($bank_reconciliation_id !== null) {
            $queryParams['bankReconciliationId'] = ObjectSerializer::toQueryValue($bank_reconciliation_id);
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
     * Operation bankReconciliationMatchesCounterGet
     *
     * [BETA] Get number of matches since last page access.
     *
     * @param  int $bank_reconciliation_id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ResponseWrapperBankReconciliationMatchesCounter
     */
    public function bankReconciliationMatchesCounterGet($bank_reconciliation_id, $fields = null)
    {
        list($response) = $this->bankReconciliationMatchesCounterGetWithHttpInfo($bank_reconciliation_id, $fields);
        return $response;
    }

    /**
     * Operation bankReconciliationMatchesCounterGetWithHttpInfo
     *
     * [BETA] Get number of matches since last page access.
     *
     * @param  int $bank_reconciliation_id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ResponseWrapperBankReconciliationMatchesCounter, HTTP status code, HTTP response headers (array of strings)
     */
    public function bankReconciliationMatchesCounterGetWithHttpInfo($bank_reconciliation_id, $fields = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperBankReconciliationMatchesCounter';
        $request = $this->bankReconciliationMatchesCounterGetRequest($bank_reconciliation_id, $fields);

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
                        '\Swagger\Client\Model\ResponseWrapperBankReconciliationMatchesCounter',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation bankReconciliationMatchesCounterGetAsync
     *
     * [BETA] Get number of matches since last page access.
     *
     * @param  int $bank_reconciliation_id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function bankReconciliationMatchesCounterGetAsync($bank_reconciliation_id, $fields = null)
    {
        return $this->bankReconciliationMatchesCounterGetAsyncWithHttpInfo($bank_reconciliation_id, $fields)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation bankReconciliationMatchesCounterGetAsyncWithHttpInfo
     *
     * [BETA] Get number of matches since last page access.
     *
     * @param  int $bank_reconciliation_id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function bankReconciliationMatchesCounterGetAsyncWithHttpInfo($bank_reconciliation_id, $fields = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperBankReconciliationMatchesCounter';
        $request = $this->bankReconciliationMatchesCounterGetRequest($bank_reconciliation_id, $fields);

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
     * Create request for operation 'bankReconciliationMatchesCounterGet'
     *
     * @param  int $bank_reconciliation_id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function bankReconciliationMatchesCounterGetRequest($bank_reconciliation_id, $fields = null)
    {
        // verify the required parameter 'bank_reconciliation_id' is set
        if ($bank_reconciliation_id === null || (is_array($bank_reconciliation_id) && count($bank_reconciliation_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $bank_reconciliation_id when calling bankReconciliationMatchesCounterGet'
            );
        }

        $resourcePath = '/bank/reconciliation/matches/counter';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($bank_reconciliation_id !== null) {
            $queryParams['bankReconciliationId'] = ObjectSerializer::toQueryValue($bank_reconciliation_id);
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
     * Operation bankReconciliationMatchesCounterPost
     *
     * [BETA] Reset the number of matches after the page has been accessed.
     *
     * @param  int $bank_reconciliation_id Element ID (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function bankReconciliationMatchesCounterPost($bank_reconciliation_id)
    {
        $this->bankReconciliationMatchesCounterPostWithHttpInfo($bank_reconciliation_id);
    }

    /**
     * Operation bankReconciliationMatchesCounterPostWithHttpInfo
     *
     * [BETA] Reset the number of matches after the page has been accessed.
     *
     * @param  int $bank_reconciliation_id Element ID (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function bankReconciliationMatchesCounterPostWithHttpInfo($bank_reconciliation_id)
    {
        $returnType = '';
        $request = $this->bankReconciliationMatchesCounterPostRequest($bank_reconciliation_id);

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

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
            throw $e;
        }
    }

    /**
     * Operation bankReconciliationMatchesCounterPostAsync
     *
     * [BETA] Reset the number of matches after the page has been accessed.
     *
     * @param  int $bank_reconciliation_id Element ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function bankReconciliationMatchesCounterPostAsync($bank_reconciliation_id)
    {
        return $this->bankReconciliationMatchesCounterPostAsyncWithHttpInfo($bank_reconciliation_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation bankReconciliationMatchesCounterPostAsyncWithHttpInfo
     *
     * [BETA] Reset the number of matches after the page has been accessed.
     *
     * @param  int $bank_reconciliation_id Element ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function bankReconciliationMatchesCounterPostAsyncWithHttpInfo($bank_reconciliation_id)
    {
        $returnType = '';
        $request = $this->bankReconciliationMatchesCounterPostRequest($bank_reconciliation_id);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
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
     * Create request for operation 'bankReconciliationMatchesCounterPost'
     *
     * @param  int $bank_reconciliation_id Element ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function bankReconciliationMatchesCounterPostRequest($bank_reconciliation_id)
    {
        // verify the required parameter 'bank_reconciliation_id' is set
        if ($bank_reconciliation_id === null || (is_array($bank_reconciliation_id) && count($bank_reconciliation_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $bank_reconciliation_id when calling bankReconciliationMatchesCounterPost'
            );
        }

        $resourcePath = '/bank/reconciliation/matches/counter';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($bank_reconciliation_id !== null) {
            $queryParams['bankReconciliationId'] = ObjectSerializer::toQueryValue($bank_reconciliation_id);
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
            'POST',
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
