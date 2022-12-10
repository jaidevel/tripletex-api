<?php
/**
 * OrderApi
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
 * OrderApi Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class OrderApi
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
     * Operation orderApproveSubscriptionInvoiceApproveSubscriptionInvoice
     *
     * To create a subscription invoice, first create a order with the subscription enabled, then approve it with this method. This approves the order for subscription invoicing.
     *
     * @param  int $id ID of order to approve for subscription invoicing. (required)
     * @param  string $invoice_date The approval date for the subscription. (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ResponseWrapperInvoice
     */
    public function orderApproveSubscriptionInvoiceApproveSubscriptionInvoice($id, $invoice_date)
    {
        list($response) = $this->orderApproveSubscriptionInvoiceApproveSubscriptionInvoiceWithHttpInfo($id, $invoice_date);
        return $response;
    }

    /**
     * Operation orderApproveSubscriptionInvoiceApproveSubscriptionInvoiceWithHttpInfo
     *
     * To create a subscription invoice, first create a order with the subscription enabled, then approve it with this method. This approves the order for subscription invoicing.
     *
     * @param  int $id ID of order to approve for subscription invoicing. (required)
     * @param  string $invoice_date The approval date for the subscription. (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ResponseWrapperInvoice, HTTP status code, HTTP response headers (array of strings)
     */
    public function orderApproveSubscriptionInvoiceApproveSubscriptionInvoiceWithHttpInfo($id, $invoice_date)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperInvoice';
        $request = $this->orderApproveSubscriptionInvoiceApproveSubscriptionInvoiceRequest($id, $invoice_date);

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
                        '\Swagger\Client\Model\ResponseWrapperInvoice',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation orderApproveSubscriptionInvoiceApproveSubscriptionInvoiceAsync
     *
     * To create a subscription invoice, first create a order with the subscription enabled, then approve it with this method. This approves the order for subscription invoicing.
     *
     * @param  int $id ID of order to approve for subscription invoicing. (required)
     * @param  string $invoice_date The approval date for the subscription. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function orderApproveSubscriptionInvoiceApproveSubscriptionInvoiceAsync($id, $invoice_date)
    {
        return $this->orderApproveSubscriptionInvoiceApproveSubscriptionInvoiceAsyncWithHttpInfo($id, $invoice_date)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation orderApproveSubscriptionInvoiceApproveSubscriptionInvoiceAsyncWithHttpInfo
     *
     * To create a subscription invoice, first create a order with the subscription enabled, then approve it with this method. This approves the order for subscription invoicing.
     *
     * @param  int $id ID of order to approve for subscription invoicing. (required)
     * @param  string $invoice_date The approval date for the subscription. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function orderApproveSubscriptionInvoiceApproveSubscriptionInvoiceAsyncWithHttpInfo($id, $invoice_date)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperInvoice';
        $request = $this->orderApproveSubscriptionInvoiceApproveSubscriptionInvoiceRequest($id, $invoice_date);

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
     * Create request for operation 'orderApproveSubscriptionInvoiceApproveSubscriptionInvoice'
     *
     * @param  int $id ID of order to approve for subscription invoicing. (required)
     * @param  string $invoice_date The approval date for the subscription. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function orderApproveSubscriptionInvoiceApproveSubscriptionInvoiceRequest($id, $invoice_date)
    {
        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling orderApproveSubscriptionInvoiceApproveSubscriptionInvoice'
            );
        }
        // verify the required parameter 'invoice_date' is set
        if ($invoice_date === null || (is_array($invoice_date) && count($invoice_date) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $invoice_date when calling orderApproveSubscriptionInvoiceApproveSubscriptionInvoice'
            );
        }

        $resourcePath = '/order/{id}/:approveSubscriptionInvoice';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($invoice_date !== null) {
            $queryParams['invoiceDate'] = ObjectSerializer::toQueryValue($invoice_date);
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
            'PUT',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation orderAttachAttach
     *
     * Attach document to specified order ID.
     *
     * @param  \SplFileObject $file The file (required)
     * @param  int $id Element ID (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ResponseWrapperDocumentArchive
     */
    public function orderAttachAttach($file, $id)
    {
        list($response) = $this->orderAttachAttachWithHttpInfo($file, $id);
        return $response;
    }

    /**
     * Operation orderAttachAttachWithHttpInfo
     *
     * Attach document to specified order ID.
     *
     * @param  \SplFileObject $file The file (required)
     * @param  int $id Element ID (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ResponseWrapperDocumentArchive, HTTP status code, HTTP response headers (array of strings)
     */
    public function orderAttachAttachWithHttpInfo($file, $id)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperDocumentArchive';
        $request = $this->orderAttachAttachRequest($file, $id);

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
                        '\Swagger\Client\Model\ResponseWrapperDocumentArchive',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation orderAttachAttachAsync
     *
     * Attach document to specified order ID.
     *
     * @param  \SplFileObject $file The file (required)
     * @param  int $id Element ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function orderAttachAttachAsync($file, $id)
    {
        return $this->orderAttachAttachAsyncWithHttpInfo($file, $id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation orderAttachAttachAsyncWithHttpInfo
     *
     * Attach document to specified order ID.
     *
     * @param  \SplFileObject $file The file (required)
     * @param  int $id Element ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function orderAttachAttachAsyncWithHttpInfo($file, $id)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperDocumentArchive';
        $request = $this->orderAttachAttachRequest($file, $id);

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
     * Create request for operation 'orderAttachAttach'
     *
     * @param  \SplFileObject $file The file (required)
     * @param  int $id Element ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function orderAttachAttachRequest($file, $id)
    {
        // verify the required parameter 'file' is set
        if ($file === null || (is_array($file) && count($file) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $file when calling orderAttachAttach'
            );
        }
        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling orderAttachAttach'
            );
        }

        $resourcePath = '/order/{id}/:attach';
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

        // form params
        if ($file !== null) {
            $multipart = true;
            $formParams['file'] = \GuzzleHttp\Psr7\try_fopen(ObjectSerializer::toFormValue($file), 'rb');
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
                ['multipart/form-data']
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
     * Operation orderGet
     *
     * Get order by ID.
     *
     * @param  int $id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ResponseWrapperOrder
     */
    public function orderGet($id, $fields = null)
    {
        list($response) = $this->orderGetWithHttpInfo($id, $fields);
        return $response;
    }

    /**
     * Operation orderGetWithHttpInfo
     *
     * Get order by ID.
     *
     * @param  int $id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ResponseWrapperOrder, HTTP status code, HTTP response headers (array of strings)
     */
    public function orderGetWithHttpInfo($id, $fields = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperOrder';
        $request = $this->orderGetRequest($id, $fields);

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
                        '\Swagger\Client\Model\ResponseWrapperOrder',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation orderGetAsync
     *
     * Get order by ID.
     *
     * @param  int $id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function orderGetAsync($id, $fields = null)
    {
        return $this->orderGetAsyncWithHttpInfo($id, $fields)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation orderGetAsyncWithHttpInfo
     *
     * Get order by ID.
     *
     * @param  int $id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function orderGetAsyncWithHttpInfo($id, $fields = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperOrder';
        $request = $this->orderGetRequest($id, $fields);

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
     * Create request for operation 'orderGet'
     *
     * @param  int $id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function orderGetRequest($id, $fields = null)
    {
        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling orderGet'
            );
        }

        $resourcePath = '/order/{id}';
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
     * Operation orderInvoiceInvoice
     *
     * Create new invoice from order.
     *
     * @param  int $id ID of order to invoice. (required)
     * @param  string $invoice_date The invoice date (required)
     * @param  bool $send_to_customer Send invoice to customer (optional, default to true)
     * @param  string $send_type Send type used for sending the invoice (optional)
     * @param  int $payment_type_id Payment type to register prepayment of the invoice. paymentTypeId and paidAmount are optional, but both must be provided if the invoice has already been paid. The payment type must be related to an account with the same currency as the invoice. (optional)
     * @param  float $paid_amount Paid amount to register prepayment of the invoice, in invoice currency. paymentTypeId and paidAmount are optional, but both must be provided if the invoice has already been paid. This amount is in the invoice currency. (optional)
     * @param  float $paid_amount_account_currency Amount paid in payment type currency (optional)
     * @param  int $payment_type_id_rest_amount Payment type of rest amount. It is possible to have two prepaid payments when invoicing. If paymentTypeIdRestAmount &gt; 0, this second payment will be calculated as invoice amount - paidAmount (optional)
     * @param  float $paid_amount_account_currency_rest Amount rest in payment type currency (optional)
     * @param  string $create_on_account Create on account(a konto) (optional)
     * @param  float $amount_on_account Amount on account (optional, default to 0.0)
     * @param  string $on_account_comment On account comment (optional)
     * @param  bool $create_backorder Create a backorder for this order, available only for pilot users (optional, default to false)
     * @param  int $invoice_id_if_is_credit_note Id of the invoice a credit note refers to (optional, default to 0)
     * @param  string $override_email_address Will override email address if sendType &#x3D; EMAIL (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ResponseWrapperInvoice
     */
    public function orderInvoiceInvoice($id, $invoice_date, $send_to_customer = 'true', $send_type = null, $payment_type_id = null, $paid_amount = null, $paid_amount_account_currency = null, $payment_type_id_rest_amount = null, $paid_amount_account_currency_rest = null, $create_on_account = null, $amount_on_account = '0.0', $on_account_comment = null, $create_backorder = 'false', $invoice_id_if_is_credit_note = '0', $override_email_address = null)
    {
        list($response) = $this->orderInvoiceInvoiceWithHttpInfo($id, $invoice_date, $send_to_customer, $send_type, $payment_type_id, $paid_amount, $paid_amount_account_currency, $payment_type_id_rest_amount, $paid_amount_account_currency_rest, $create_on_account, $amount_on_account, $on_account_comment, $create_backorder, $invoice_id_if_is_credit_note, $override_email_address);
        return $response;
    }

    /**
     * Operation orderInvoiceInvoiceWithHttpInfo
     *
     * Create new invoice from order.
     *
     * @param  int $id ID of order to invoice. (required)
     * @param  string $invoice_date The invoice date (required)
     * @param  bool $send_to_customer Send invoice to customer (optional, default to true)
     * @param  string $send_type Send type used for sending the invoice (optional)
     * @param  int $payment_type_id Payment type to register prepayment of the invoice. paymentTypeId and paidAmount are optional, but both must be provided if the invoice has already been paid. The payment type must be related to an account with the same currency as the invoice. (optional)
     * @param  float $paid_amount Paid amount to register prepayment of the invoice, in invoice currency. paymentTypeId and paidAmount are optional, but both must be provided if the invoice has already been paid. This amount is in the invoice currency. (optional)
     * @param  float $paid_amount_account_currency Amount paid in payment type currency (optional)
     * @param  int $payment_type_id_rest_amount Payment type of rest amount. It is possible to have two prepaid payments when invoicing. If paymentTypeIdRestAmount &gt; 0, this second payment will be calculated as invoice amount - paidAmount (optional)
     * @param  float $paid_amount_account_currency_rest Amount rest in payment type currency (optional)
     * @param  string $create_on_account Create on account(a konto) (optional)
     * @param  float $amount_on_account Amount on account (optional, default to 0.0)
     * @param  string $on_account_comment On account comment (optional)
     * @param  bool $create_backorder Create a backorder for this order, available only for pilot users (optional, default to false)
     * @param  int $invoice_id_if_is_credit_note Id of the invoice a credit note refers to (optional, default to 0)
     * @param  string $override_email_address Will override email address if sendType &#x3D; EMAIL (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ResponseWrapperInvoice, HTTP status code, HTTP response headers (array of strings)
     */
    public function orderInvoiceInvoiceWithHttpInfo($id, $invoice_date, $send_to_customer = 'true', $send_type = null, $payment_type_id = null, $paid_amount = null, $paid_amount_account_currency = null, $payment_type_id_rest_amount = null, $paid_amount_account_currency_rest = null, $create_on_account = null, $amount_on_account = '0.0', $on_account_comment = null, $create_backorder = 'false', $invoice_id_if_is_credit_note = '0', $override_email_address = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperInvoice';
        $request = $this->orderInvoiceInvoiceRequest($id, $invoice_date, $send_to_customer, $send_type, $payment_type_id, $paid_amount, $paid_amount_account_currency, $payment_type_id_rest_amount, $paid_amount_account_currency_rest, $create_on_account, $amount_on_account, $on_account_comment, $create_backorder, $invoice_id_if_is_credit_note, $override_email_address);

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
                        '\Swagger\Client\Model\ResponseWrapperInvoice',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation orderInvoiceInvoiceAsync
     *
     * Create new invoice from order.
     *
     * @param  int $id ID of order to invoice. (required)
     * @param  string $invoice_date The invoice date (required)
     * @param  bool $send_to_customer Send invoice to customer (optional, default to true)
     * @param  string $send_type Send type used for sending the invoice (optional)
     * @param  int $payment_type_id Payment type to register prepayment of the invoice. paymentTypeId and paidAmount are optional, but both must be provided if the invoice has already been paid. The payment type must be related to an account with the same currency as the invoice. (optional)
     * @param  float $paid_amount Paid amount to register prepayment of the invoice, in invoice currency. paymentTypeId and paidAmount are optional, but both must be provided if the invoice has already been paid. This amount is in the invoice currency. (optional)
     * @param  float $paid_amount_account_currency Amount paid in payment type currency (optional)
     * @param  int $payment_type_id_rest_amount Payment type of rest amount. It is possible to have two prepaid payments when invoicing. If paymentTypeIdRestAmount &gt; 0, this second payment will be calculated as invoice amount - paidAmount (optional)
     * @param  float $paid_amount_account_currency_rest Amount rest in payment type currency (optional)
     * @param  string $create_on_account Create on account(a konto) (optional)
     * @param  float $amount_on_account Amount on account (optional, default to 0.0)
     * @param  string $on_account_comment On account comment (optional)
     * @param  bool $create_backorder Create a backorder for this order, available only for pilot users (optional, default to false)
     * @param  int $invoice_id_if_is_credit_note Id of the invoice a credit note refers to (optional, default to 0)
     * @param  string $override_email_address Will override email address if sendType &#x3D; EMAIL (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function orderInvoiceInvoiceAsync($id, $invoice_date, $send_to_customer = 'true', $send_type = null, $payment_type_id = null, $paid_amount = null, $paid_amount_account_currency = null, $payment_type_id_rest_amount = null, $paid_amount_account_currency_rest = null, $create_on_account = null, $amount_on_account = '0.0', $on_account_comment = null, $create_backorder = 'false', $invoice_id_if_is_credit_note = '0', $override_email_address = null)
    {
        return $this->orderInvoiceInvoiceAsyncWithHttpInfo($id, $invoice_date, $send_to_customer, $send_type, $payment_type_id, $paid_amount, $paid_amount_account_currency, $payment_type_id_rest_amount, $paid_amount_account_currency_rest, $create_on_account, $amount_on_account, $on_account_comment, $create_backorder, $invoice_id_if_is_credit_note, $override_email_address)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation orderInvoiceInvoiceAsyncWithHttpInfo
     *
     * Create new invoice from order.
     *
     * @param  int $id ID of order to invoice. (required)
     * @param  string $invoice_date The invoice date (required)
     * @param  bool $send_to_customer Send invoice to customer (optional, default to true)
     * @param  string $send_type Send type used for sending the invoice (optional)
     * @param  int $payment_type_id Payment type to register prepayment of the invoice. paymentTypeId and paidAmount are optional, but both must be provided if the invoice has already been paid. The payment type must be related to an account with the same currency as the invoice. (optional)
     * @param  float $paid_amount Paid amount to register prepayment of the invoice, in invoice currency. paymentTypeId and paidAmount are optional, but both must be provided if the invoice has already been paid. This amount is in the invoice currency. (optional)
     * @param  float $paid_amount_account_currency Amount paid in payment type currency (optional)
     * @param  int $payment_type_id_rest_amount Payment type of rest amount. It is possible to have two prepaid payments when invoicing. If paymentTypeIdRestAmount &gt; 0, this second payment will be calculated as invoice amount - paidAmount (optional)
     * @param  float $paid_amount_account_currency_rest Amount rest in payment type currency (optional)
     * @param  string $create_on_account Create on account(a konto) (optional)
     * @param  float $amount_on_account Amount on account (optional, default to 0.0)
     * @param  string $on_account_comment On account comment (optional)
     * @param  bool $create_backorder Create a backorder for this order, available only for pilot users (optional, default to false)
     * @param  int $invoice_id_if_is_credit_note Id of the invoice a credit note refers to (optional, default to 0)
     * @param  string $override_email_address Will override email address if sendType &#x3D; EMAIL (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function orderInvoiceInvoiceAsyncWithHttpInfo($id, $invoice_date, $send_to_customer = 'true', $send_type = null, $payment_type_id = null, $paid_amount = null, $paid_amount_account_currency = null, $payment_type_id_rest_amount = null, $paid_amount_account_currency_rest = null, $create_on_account = null, $amount_on_account = '0.0', $on_account_comment = null, $create_backorder = 'false', $invoice_id_if_is_credit_note = '0', $override_email_address = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperInvoice';
        $request = $this->orderInvoiceInvoiceRequest($id, $invoice_date, $send_to_customer, $send_type, $payment_type_id, $paid_amount, $paid_amount_account_currency, $payment_type_id_rest_amount, $paid_amount_account_currency_rest, $create_on_account, $amount_on_account, $on_account_comment, $create_backorder, $invoice_id_if_is_credit_note, $override_email_address);

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
     * Create request for operation 'orderInvoiceInvoice'
     *
     * @param  int $id ID of order to invoice. (required)
     * @param  string $invoice_date The invoice date (required)
     * @param  bool $send_to_customer Send invoice to customer (optional, default to true)
     * @param  string $send_type Send type used for sending the invoice (optional)
     * @param  int $payment_type_id Payment type to register prepayment of the invoice. paymentTypeId and paidAmount are optional, but both must be provided if the invoice has already been paid. The payment type must be related to an account with the same currency as the invoice. (optional)
     * @param  float $paid_amount Paid amount to register prepayment of the invoice, in invoice currency. paymentTypeId and paidAmount are optional, but both must be provided if the invoice has already been paid. This amount is in the invoice currency. (optional)
     * @param  float $paid_amount_account_currency Amount paid in payment type currency (optional)
     * @param  int $payment_type_id_rest_amount Payment type of rest amount. It is possible to have two prepaid payments when invoicing. If paymentTypeIdRestAmount &gt; 0, this second payment will be calculated as invoice amount - paidAmount (optional)
     * @param  float $paid_amount_account_currency_rest Amount rest in payment type currency (optional)
     * @param  string $create_on_account Create on account(a konto) (optional)
     * @param  float $amount_on_account Amount on account (optional, default to 0.0)
     * @param  string $on_account_comment On account comment (optional)
     * @param  bool $create_backorder Create a backorder for this order, available only for pilot users (optional, default to false)
     * @param  int $invoice_id_if_is_credit_note Id of the invoice a credit note refers to (optional, default to 0)
     * @param  string $override_email_address Will override email address if sendType &#x3D; EMAIL (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function orderInvoiceInvoiceRequest($id, $invoice_date, $send_to_customer = 'true', $send_type = null, $payment_type_id = null, $paid_amount = null, $paid_amount_account_currency = null, $payment_type_id_rest_amount = null, $paid_amount_account_currency_rest = null, $create_on_account = null, $amount_on_account = '0.0', $on_account_comment = null, $create_backorder = 'false', $invoice_id_if_is_credit_note = '0', $override_email_address = null)
    {
        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling orderInvoiceInvoice'
            );
        }
        // verify the required parameter 'invoice_date' is set
        if ($invoice_date === null || (is_array($invoice_date) && count($invoice_date) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $invoice_date when calling orderInvoiceInvoice'
            );
        }

        $resourcePath = '/order/{id}/:invoice';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($invoice_date !== null) {
            $queryParams['invoiceDate'] = ObjectSerializer::toQueryValue($invoice_date);
        }
        // query params
        if ($send_to_customer !== null) {
            $queryParams['sendToCustomer'] = ObjectSerializer::toQueryValue($send_to_customer);
        }
        // query params
        if ($send_type !== null) {
            $queryParams['sendType'] = ObjectSerializer::toQueryValue($send_type);
        }
        // query params
        if ($payment_type_id !== null) {
            $queryParams['paymentTypeId'] = ObjectSerializer::toQueryValue($payment_type_id);
        }
        // query params
        if ($paid_amount !== null) {
            $queryParams['paidAmount'] = ObjectSerializer::toQueryValue($paid_amount);
        }
        // query params
        if ($paid_amount_account_currency !== null) {
            $queryParams['paidAmountAccountCurrency'] = ObjectSerializer::toQueryValue($paid_amount_account_currency);
        }
        // query params
        if ($payment_type_id_rest_amount !== null) {
            $queryParams['paymentTypeIdRestAmount'] = ObjectSerializer::toQueryValue($payment_type_id_rest_amount);
        }
        // query params
        if ($paid_amount_account_currency_rest !== null) {
            $queryParams['paidAmountAccountCurrencyRest'] = ObjectSerializer::toQueryValue($paid_amount_account_currency_rest);
        }
        // query params
        if ($create_on_account !== null) {
            $queryParams['createOnAccount'] = ObjectSerializer::toQueryValue($create_on_account);
        }
        // query params
        if ($amount_on_account !== null) {
            $queryParams['amountOnAccount'] = ObjectSerializer::toQueryValue($amount_on_account);
        }
        // query params
        if ($on_account_comment !== null) {
            $queryParams['onAccountComment'] = ObjectSerializer::toQueryValue($on_account_comment);
        }
        // query params
        if ($create_backorder !== null) {
            $queryParams['createBackorder'] = ObjectSerializer::toQueryValue($create_backorder);
        }
        // query params
        if ($invoice_id_if_is_credit_note !== null) {
            $queryParams['invoiceIdIfIsCreditNote'] = ObjectSerializer::toQueryValue($invoice_id_if_is_credit_note);
        }
        // query params
        if ($override_email_address !== null) {
            $queryParams['overrideEmailAddress'] = ObjectSerializer::toQueryValue($override_email_address);
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
            'PUT',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation orderInvoiceMultipleOrdersInvoiceMultipleOrders
     *
     * [BETA] Charges a single customer invoice from multiple orders. The orders must be to the same customer, currency, due date, receiver email, attn. and smsNotificationNumber
     *
     * @param  string $id List of Order IDs - to the same customer, separated by comma. (required)
     * @param  string $invoice_date The invoice date (required)
     * @param  bool $send_to_customer Send invoice to customer (optional, default to true)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ResponseWrapperInvoice
     */
    public function orderInvoiceMultipleOrdersInvoiceMultipleOrders($id, $invoice_date, $send_to_customer = 'true')
    {
        list($response) = $this->orderInvoiceMultipleOrdersInvoiceMultipleOrdersWithHttpInfo($id, $invoice_date, $send_to_customer);
        return $response;
    }

    /**
     * Operation orderInvoiceMultipleOrdersInvoiceMultipleOrdersWithHttpInfo
     *
     * [BETA] Charges a single customer invoice from multiple orders. The orders must be to the same customer, currency, due date, receiver email, attn. and smsNotificationNumber
     *
     * @param  string $id List of Order IDs - to the same customer, separated by comma. (required)
     * @param  string $invoice_date The invoice date (required)
     * @param  bool $send_to_customer Send invoice to customer (optional, default to true)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ResponseWrapperInvoice, HTTP status code, HTTP response headers (array of strings)
     */
    public function orderInvoiceMultipleOrdersInvoiceMultipleOrdersWithHttpInfo($id, $invoice_date, $send_to_customer = 'true')
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperInvoice';
        $request = $this->orderInvoiceMultipleOrdersInvoiceMultipleOrdersRequest($id, $invoice_date, $send_to_customer);

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
                        '\Swagger\Client\Model\ResponseWrapperInvoice',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation orderInvoiceMultipleOrdersInvoiceMultipleOrdersAsync
     *
     * [BETA] Charges a single customer invoice from multiple orders. The orders must be to the same customer, currency, due date, receiver email, attn. and smsNotificationNumber
     *
     * @param  string $id List of Order IDs - to the same customer, separated by comma. (required)
     * @param  string $invoice_date The invoice date (required)
     * @param  bool $send_to_customer Send invoice to customer (optional, default to true)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function orderInvoiceMultipleOrdersInvoiceMultipleOrdersAsync($id, $invoice_date, $send_to_customer = 'true')
    {
        return $this->orderInvoiceMultipleOrdersInvoiceMultipleOrdersAsyncWithHttpInfo($id, $invoice_date, $send_to_customer)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation orderInvoiceMultipleOrdersInvoiceMultipleOrdersAsyncWithHttpInfo
     *
     * [BETA] Charges a single customer invoice from multiple orders. The orders must be to the same customer, currency, due date, receiver email, attn. and smsNotificationNumber
     *
     * @param  string $id List of Order IDs - to the same customer, separated by comma. (required)
     * @param  string $invoice_date The invoice date (required)
     * @param  bool $send_to_customer Send invoice to customer (optional, default to true)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function orderInvoiceMultipleOrdersInvoiceMultipleOrdersAsyncWithHttpInfo($id, $invoice_date, $send_to_customer = 'true')
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperInvoice';
        $request = $this->orderInvoiceMultipleOrdersInvoiceMultipleOrdersRequest($id, $invoice_date, $send_to_customer);

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
     * Create request for operation 'orderInvoiceMultipleOrdersInvoiceMultipleOrders'
     *
     * @param  string $id List of Order IDs - to the same customer, separated by comma. (required)
     * @param  string $invoice_date The invoice date (required)
     * @param  bool $send_to_customer Send invoice to customer (optional, default to true)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function orderInvoiceMultipleOrdersInvoiceMultipleOrdersRequest($id, $invoice_date, $send_to_customer = 'true')
    {
        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling orderInvoiceMultipleOrdersInvoiceMultipleOrders'
            );
        }
        // verify the required parameter 'invoice_date' is set
        if ($invoice_date === null || (is_array($invoice_date) && count($invoice_date) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $invoice_date when calling orderInvoiceMultipleOrdersInvoiceMultipleOrders'
            );
        }

        $resourcePath = '/order/:invoiceMultipleOrders';
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
        if ($invoice_date !== null) {
            $queryParams['invoiceDate'] = ObjectSerializer::toQueryValue($invoice_date);
        }
        // query params
        if ($send_to_customer !== null) {
            $queryParams['sendToCustomer'] = ObjectSerializer::toQueryValue($send_to_customer);
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
     * Operation orderListPostList
     *
     * [BETA] Create multiple Orders with OrderLines. Max 100 at a time.
     *
     * @param  \Swagger\Client\Model\Order[] $body JSON representing a list of new objects to be created. Should not have ID and version set. (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ListResponseOrder
     */
    public function orderListPostList($body = null)
    {
        list($response) = $this->orderListPostListWithHttpInfo($body);
        return $response;
    }

    /**
     * Operation orderListPostListWithHttpInfo
     *
     * [BETA] Create multiple Orders with OrderLines. Max 100 at a time.
     *
     * @param  \Swagger\Client\Model\Order[] $body JSON representing a list of new objects to be created. Should not have ID and version set. (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ListResponseOrder, HTTP status code, HTTP response headers (array of strings)
     */
    public function orderListPostListWithHttpInfo($body = null)
    {
        $returnType = '\Swagger\Client\Model\ListResponseOrder';
        $request = $this->orderListPostListRequest($body);

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
                        '\Swagger\Client\Model\ListResponseOrder',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation orderListPostListAsync
     *
     * [BETA] Create multiple Orders with OrderLines. Max 100 at a time.
     *
     * @param  \Swagger\Client\Model\Order[] $body JSON representing a list of new objects to be created. Should not have ID and version set. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function orderListPostListAsync($body = null)
    {
        return $this->orderListPostListAsyncWithHttpInfo($body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation orderListPostListAsyncWithHttpInfo
     *
     * [BETA] Create multiple Orders with OrderLines. Max 100 at a time.
     *
     * @param  \Swagger\Client\Model\Order[] $body JSON representing a list of new objects to be created. Should not have ID and version set. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function orderListPostListAsyncWithHttpInfo($body = null)
    {
        $returnType = '\Swagger\Client\Model\ListResponseOrder';
        $request = $this->orderListPostListRequest($body);

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
     * Create request for operation 'orderListPostList'
     *
     * @param  \Swagger\Client\Model\Order[] $body JSON representing a list of new objects to be created. Should not have ID and version set. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function orderListPostListRequest($body = null)
    {

        $resourcePath = '/order/list';
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
     * Operation orderPost
     *
     * Create order.
     *
     * @param  \Swagger\Client\Model\Order $body JSON representing the new object to be created. Should not have ID and version set. (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ResponseWrapperOrder
     */
    public function orderPost($body = null)
    {
        list($response) = $this->orderPostWithHttpInfo($body);
        return $response;
    }

    /**
     * Operation orderPostWithHttpInfo
     *
     * Create order.
     *
     * @param  \Swagger\Client\Model\Order $body JSON representing the new object to be created. Should not have ID and version set. (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ResponseWrapperOrder, HTTP status code, HTTP response headers (array of strings)
     */
    public function orderPostWithHttpInfo($body = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperOrder';
        $request = $this->orderPostRequest($body);

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
                        '\Swagger\Client\Model\ResponseWrapperOrder',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation orderPostAsync
     *
     * Create order.
     *
     * @param  \Swagger\Client\Model\Order $body JSON representing the new object to be created. Should not have ID and version set. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function orderPostAsync($body = null)
    {
        return $this->orderPostAsyncWithHttpInfo($body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation orderPostAsyncWithHttpInfo
     *
     * Create order.
     *
     * @param  \Swagger\Client\Model\Order $body JSON representing the new object to be created. Should not have ID and version set. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function orderPostAsyncWithHttpInfo($body = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperOrder';
        $request = $this->orderPostRequest($body);

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
     * Create request for operation 'orderPost'
     *
     * @param  \Swagger\Client\Model\Order $body JSON representing the new object to be created. Should not have ID and version set. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function orderPostRequest($body = null)
    {

        $resourcePath = '/order';
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
     * Operation orderPut
     *
     * Update order.
     *
     * @param  int $id Element ID (required)
     * @param  \Swagger\Client\Model\Order $body Partial object describing what should be updated (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ResponseWrapperOrder
     */
    public function orderPut($id, $body = null)
    {
        list($response) = $this->orderPutWithHttpInfo($id, $body);
        return $response;
    }

    /**
     * Operation orderPutWithHttpInfo
     *
     * Update order.
     *
     * @param  int $id Element ID (required)
     * @param  \Swagger\Client\Model\Order $body Partial object describing what should be updated (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ResponseWrapperOrder, HTTP status code, HTTP response headers (array of strings)
     */
    public function orderPutWithHttpInfo($id, $body = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperOrder';
        $request = $this->orderPutRequest($id, $body);

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
                        '\Swagger\Client\Model\ResponseWrapperOrder',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation orderPutAsync
     *
     * Update order.
     *
     * @param  int $id Element ID (required)
     * @param  \Swagger\Client\Model\Order $body Partial object describing what should be updated (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function orderPutAsync($id, $body = null)
    {
        return $this->orderPutAsyncWithHttpInfo($id, $body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation orderPutAsyncWithHttpInfo
     *
     * Update order.
     *
     * @param  int $id Element ID (required)
     * @param  \Swagger\Client\Model\Order $body Partial object describing what should be updated (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function orderPutAsyncWithHttpInfo($id, $body = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperOrder';
        $request = $this->orderPutRequest($id, $body);

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
     * Create request for operation 'orderPut'
     *
     * @param  int $id Element ID (required)
     * @param  \Swagger\Client\Model\Order $body Partial object describing what should be updated (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function orderPutRequest($id, $body = null)
    {
        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling orderPut'
            );
        }

        $resourcePath = '/order/{id}';
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
     * Operation orderSearch
     *
     * Find orders corresponding with sent data.
     *
     * @param  string $order_date_from From and including (required)
     * @param  string $order_date_to To and excluding (required)
     * @param  string $id List of IDs (optional)
     * @param  string $number Equals (optional)
     * @param  string $customer_id List of IDs (optional)
     * @param  bool $is_closed Equals (optional)
     * @param  bool $is_subscription Equals (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  int $count Number of elements to return (optional, default to 1000)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ListResponseOrder
     */
    public function orderSearch($order_date_from, $order_date_to, $id = null, $number = null, $customer_id = null, $is_closed = null, $is_subscription = null, $from = '0', $count = '1000', $sorting = null, $fields = null)
    {
        list($response) = $this->orderSearchWithHttpInfo($order_date_from, $order_date_to, $id, $number, $customer_id, $is_closed, $is_subscription, $from, $count, $sorting, $fields);
        return $response;
    }

    /**
     * Operation orderSearchWithHttpInfo
     *
     * Find orders corresponding with sent data.
     *
     * @param  string $order_date_from From and including (required)
     * @param  string $order_date_to To and excluding (required)
     * @param  string $id List of IDs (optional)
     * @param  string $number Equals (optional)
     * @param  string $customer_id List of IDs (optional)
     * @param  bool $is_closed Equals (optional)
     * @param  bool $is_subscription Equals (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  int $count Number of elements to return (optional, default to 1000)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ListResponseOrder, HTTP status code, HTTP response headers (array of strings)
     */
    public function orderSearchWithHttpInfo($order_date_from, $order_date_to, $id = null, $number = null, $customer_id = null, $is_closed = null, $is_subscription = null, $from = '0', $count = '1000', $sorting = null, $fields = null)
    {
        $returnType = '\Swagger\Client\Model\ListResponseOrder';
        $request = $this->orderSearchRequest($order_date_from, $order_date_to, $id, $number, $customer_id, $is_closed, $is_subscription, $from, $count, $sorting, $fields);

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
                        '\Swagger\Client\Model\ListResponseOrder',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation orderSearchAsync
     *
     * Find orders corresponding with sent data.
     *
     * @param  string $order_date_from From and including (required)
     * @param  string $order_date_to To and excluding (required)
     * @param  string $id List of IDs (optional)
     * @param  string $number Equals (optional)
     * @param  string $customer_id List of IDs (optional)
     * @param  bool $is_closed Equals (optional)
     * @param  bool $is_subscription Equals (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  int $count Number of elements to return (optional, default to 1000)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function orderSearchAsync($order_date_from, $order_date_to, $id = null, $number = null, $customer_id = null, $is_closed = null, $is_subscription = null, $from = '0', $count = '1000', $sorting = null, $fields = null)
    {
        return $this->orderSearchAsyncWithHttpInfo($order_date_from, $order_date_to, $id, $number, $customer_id, $is_closed, $is_subscription, $from, $count, $sorting, $fields)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation orderSearchAsyncWithHttpInfo
     *
     * Find orders corresponding with sent data.
     *
     * @param  string $order_date_from From and including (required)
     * @param  string $order_date_to To and excluding (required)
     * @param  string $id List of IDs (optional)
     * @param  string $number Equals (optional)
     * @param  string $customer_id List of IDs (optional)
     * @param  bool $is_closed Equals (optional)
     * @param  bool $is_subscription Equals (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  int $count Number of elements to return (optional, default to 1000)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function orderSearchAsyncWithHttpInfo($order_date_from, $order_date_to, $id = null, $number = null, $customer_id = null, $is_closed = null, $is_subscription = null, $from = '0', $count = '1000', $sorting = null, $fields = null)
    {
        $returnType = '\Swagger\Client\Model\ListResponseOrder';
        $request = $this->orderSearchRequest($order_date_from, $order_date_to, $id, $number, $customer_id, $is_closed, $is_subscription, $from, $count, $sorting, $fields);

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
     * Create request for operation 'orderSearch'
     *
     * @param  string $order_date_from From and including (required)
     * @param  string $order_date_to To and excluding (required)
     * @param  string $id List of IDs (optional)
     * @param  string $number Equals (optional)
     * @param  string $customer_id List of IDs (optional)
     * @param  bool $is_closed Equals (optional)
     * @param  bool $is_subscription Equals (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  int $count Number of elements to return (optional, default to 1000)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function orderSearchRequest($order_date_from, $order_date_to, $id = null, $number = null, $customer_id = null, $is_closed = null, $is_subscription = null, $from = '0', $count = '1000', $sorting = null, $fields = null)
    {
        // verify the required parameter 'order_date_from' is set
        if ($order_date_from === null || (is_array($order_date_from) && count($order_date_from) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $order_date_from when calling orderSearch'
            );
        }
        // verify the required parameter 'order_date_to' is set
        if ($order_date_to === null || (is_array($order_date_to) && count($order_date_to) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $order_date_to when calling orderSearch'
            );
        }

        $resourcePath = '/order';
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
        if ($customer_id !== null) {
            $queryParams['customerId'] = ObjectSerializer::toQueryValue($customer_id);
        }
        // query params
        if ($order_date_from !== null) {
            $queryParams['orderDateFrom'] = ObjectSerializer::toQueryValue($order_date_from);
        }
        // query params
        if ($order_date_to !== null) {
            $queryParams['orderDateTo'] = ObjectSerializer::toQueryValue($order_date_to);
        }
        // query params
        if ($is_closed !== null) {
            $queryParams['isClosed'] = ObjectSerializer::toQueryValue($is_closed);
        }
        // query params
        if ($is_subscription !== null) {
            $queryParams['isSubscription'] = ObjectSerializer::toQueryValue($is_subscription);
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
     * Operation orderUnApproveSubscriptionInvoiceUnApproveSubscriptionInvoice
     *
     * Unapproves the order for subscription invoicing.
     *
     * @param  int $id ID of order to unapprove for subscription invoicing. (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function orderUnApproveSubscriptionInvoiceUnApproveSubscriptionInvoice($id)
    {
        $this->orderUnApproveSubscriptionInvoiceUnApproveSubscriptionInvoiceWithHttpInfo($id);
    }

    /**
     * Operation orderUnApproveSubscriptionInvoiceUnApproveSubscriptionInvoiceWithHttpInfo
     *
     * Unapproves the order for subscription invoicing.
     *
     * @param  int $id ID of order to unapprove for subscription invoicing. (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function orderUnApproveSubscriptionInvoiceUnApproveSubscriptionInvoiceWithHttpInfo($id)
    {
        $returnType = '';
        $request = $this->orderUnApproveSubscriptionInvoiceUnApproveSubscriptionInvoiceRequest($id);

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
     * Operation orderUnApproveSubscriptionInvoiceUnApproveSubscriptionInvoiceAsync
     *
     * Unapproves the order for subscription invoicing.
     *
     * @param  int $id ID of order to unapprove for subscription invoicing. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function orderUnApproveSubscriptionInvoiceUnApproveSubscriptionInvoiceAsync($id)
    {
        return $this->orderUnApproveSubscriptionInvoiceUnApproveSubscriptionInvoiceAsyncWithHttpInfo($id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation orderUnApproveSubscriptionInvoiceUnApproveSubscriptionInvoiceAsyncWithHttpInfo
     *
     * Unapproves the order for subscription invoicing.
     *
     * @param  int $id ID of order to unapprove for subscription invoicing. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function orderUnApproveSubscriptionInvoiceUnApproveSubscriptionInvoiceAsyncWithHttpInfo($id)
    {
        $returnType = '';
        $request = $this->orderUnApproveSubscriptionInvoiceUnApproveSubscriptionInvoiceRequest($id);

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
     * Create request for operation 'orderUnApproveSubscriptionInvoiceUnApproveSubscriptionInvoice'
     *
     * @param  int $id ID of order to unapprove for subscription invoicing. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function orderUnApproveSubscriptionInvoiceUnApproveSubscriptionInvoiceRequest($id)
    {
        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling orderUnApproveSubscriptionInvoiceUnApproveSubscriptionInvoice'
            );
        }

        $resourcePath = '/order/{id}/:unApproveSubscriptionInvoice';
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
            'PUT',
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
