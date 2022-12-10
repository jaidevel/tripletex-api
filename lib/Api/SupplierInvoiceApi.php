<?php
/**
 * SupplierInvoiceApi
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
 * SupplierInvoiceApi Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class SupplierInvoiceApi
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
     * Operation supplierInvoiceAddPaymentAddPayment
     *
     * Register payment, paymentType == 0 finds the last paymentType for this vendor
     *
     * @param  int $invoice_id Invoice ID. (required)
     * @param  int $payment_type payment_type (required)
     * @param  string $amount amount (optional)
     * @param  string $kid_or_receiver_reference kid_or_receiver_reference (optional)
     * @param  string $bban bban (optional)
     * @param  string $payment_date payment_date (optional)
     * @param  bool $use_default_payment_type Set paymentType to last type for vendor, autopay, nets or first available other type (optional, default to false)
     * @param  bool $partial_payment Set to true to allow multiple payments registered. (optional, default to false)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ResponseWrapperSupplierInvoice
     */
    public function supplierInvoiceAddPaymentAddPayment($invoice_id, $payment_type, $amount = null, $kid_or_receiver_reference = null, $bban = null, $payment_date = null, $use_default_payment_type = 'false', $partial_payment = 'false')
    {
        list($response) = $this->supplierInvoiceAddPaymentAddPaymentWithHttpInfo($invoice_id, $payment_type, $amount, $kid_or_receiver_reference, $bban, $payment_date, $use_default_payment_type, $partial_payment);
        return $response;
    }

    /**
     * Operation supplierInvoiceAddPaymentAddPaymentWithHttpInfo
     *
     * Register payment, paymentType == 0 finds the last paymentType for this vendor
     *
     * @param  int $invoice_id Invoice ID. (required)
     * @param  int $payment_type (required)
     * @param  string $amount (optional)
     * @param  string $kid_or_receiver_reference (optional)
     * @param  string $bban (optional)
     * @param  string $payment_date (optional)
     * @param  bool $use_default_payment_type Set paymentType to last type for vendor, autopay, nets or first available other type (optional, default to false)
     * @param  bool $partial_payment Set to true to allow multiple payments registered. (optional, default to false)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ResponseWrapperSupplierInvoice, HTTP status code, HTTP response headers (array of strings)
     */
    public function supplierInvoiceAddPaymentAddPaymentWithHttpInfo($invoice_id, $payment_type, $amount = null, $kid_or_receiver_reference = null, $bban = null, $payment_date = null, $use_default_payment_type = 'false', $partial_payment = 'false')
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperSupplierInvoice';
        $request = $this->supplierInvoiceAddPaymentAddPaymentRequest($invoice_id, $payment_type, $amount, $kid_or_receiver_reference, $bban, $payment_date, $use_default_payment_type, $partial_payment);

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
                        '\Swagger\Client\Model\ResponseWrapperSupplierInvoice',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation supplierInvoiceAddPaymentAddPaymentAsync
     *
     * Register payment, paymentType == 0 finds the last paymentType for this vendor
     *
     * @param  int $invoice_id Invoice ID. (required)
     * @param  int $payment_type (required)
     * @param  string $amount (optional)
     * @param  string $kid_or_receiver_reference (optional)
     * @param  string $bban (optional)
     * @param  string $payment_date (optional)
     * @param  bool $use_default_payment_type Set paymentType to last type for vendor, autopay, nets or first available other type (optional, default to false)
     * @param  bool $partial_payment Set to true to allow multiple payments registered. (optional, default to false)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function supplierInvoiceAddPaymentAddPaymentAsync($invoice_id, $payment_type, $amount = null, $kid_or_receiver_reference = null, $bban = null, $payment_date = null, $use_default_payment_type = 'false', $partial_payment = 'false')
    {
        return $this->supplierInvoiceAddPaymentAddPaymentAsyncWithHttpInfo($invoice_id, $payment_type, $amount, $kid_or_receiver_reference, $bban, $payment_date, $use_default_payment_type, $partial_payment)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation supplierInvoiceAddPaymentAddPaymentAsyncWithHttpInfo
     *
     * Register payment, paymentType == 0 finds the last paymentType for this vendor
     *
     * @param  int $invoice_id Invoice ID. (required)
     * @param  int $payment_type (required)
     * @param  string $amount (optional)
     * @param  string $kid_or_receiver_reference (optional)
     * @param  string $bban (optional)
     * @param  string $payment_date (optional)
     * @param  bool $use_default_payment_type Set paymentType to last type for vendor, autopay, nets or first available other type (optional, default to false)
     * @param  bool $partial_payment Set to true to allow multiple payments registered. (optional, default to false)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function supplierInvoiceAddPaymentAddPaymentAsyncWithHttpInfo($invoice_id, $payment_type, $amount = null, $kid_or_receiver_reference = null, $bban = null, $payment_date = null, $use_default_payment_type = 'false', $partial_payment = 'false')
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperSupplierInvoice';
        $request = $this->supplierInvoiceAddPaymentAddPaymentRequest($invoice_id, $payment_type, $amount, $kid_or_receiver_reference, $bban, $payment_date, $use_default_payment_type, $partial_payment);

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
     * Create request for operation 'supplierInvoiceAddPaymentAddPayment'
     *
     * @param  int $invoice_id Invoice ID. (required)
     * @param  int $payment_type (required)
     * @param  string $amount (optional)
     * @param  string $kid_or_receiver_reference (optional)
     * @param  string $bban (optional)
     * @param  string $payment_date (optional)
     * @param  bool $use_default_payment_type Set paymentType to last type for vendor, autopay, nets or first available other type (optional, default to false)
     * @param  bool $partial_payment Set to true to allow multiple payments registered. (optional, default to false)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function supplierInvoiceAddPaymentAddPaymentRequest($invoice_id, $payment_type, $amount = null, $kid_or_receiver_reference = null, $bban = null, $payment_date = null, $use_default_payment_type = 'false', $partial_payment = 'false')
    {
        // verify the required parameter 'invoice_id' is set
        if ($invoice_id === null || (is_array($invoice_id) && count($invoice_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $invoice_id when calling supplierInvoiceAddPaymentAddPayment'
            );
        }
        // verify the required parameter 'payment_type' is set
        if ($payment_type === null || (is_array($payment_type) && count($payment_type) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $payment_type when calling supplierInvoiceAddPaymentAddPayment'
            );
        }

        $resourcePath = '/supplierInvoice/{invoiceId}/:addPayment';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($payment_type !== null) {
            $queryParams['paymentType'] = ObjectSerializer::toQueryValue($payment_type);
        }
        // query params
        if ($amount !== null) {
            $queryParams['amount'] = ObjectSerializer::toQueryValue($amount);
        }
        // query params
        if ($kid_or_receiver_reference !== null) {
            $queryParams['kidOrReceiverReference'] = ObjectSerializer::toQueryValue($kid_or_receiver_reference);
        }
        // query params
        if ($bban !== null) {
            $queryParams['bban'] = ObjectSerializer::toQueryValue($bban);
        }
        // query params
        if ($payment_date !== null) {
            $queryParams['paymentDate'] = ObjectSerializer::toQueryValue($payment_date);
        }
        // query params
        if ($use_default_payment_type !== null) {
            $queryParams['useDefaultPaymentType'] = ObjectSerializer::toQueryValue($use_default_payment_type);
        }
        // query params
        if ($partial_payment !== null) {
            $queryParams['partialPayment'] = ObjectSerializer::toQueryValue($partial_payment);
        }

        // path params
        if ($invoice_id !== null) {
            $resourcePath = str_replace(
                '{' . 'invoiceId' . '}',
                ObjectSerializer::toPathValue($invoice_id),
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
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation supplierInvoiceAddRecipientAddRecipient
     *
     * Add recipient to supplier invoices.
     *
     * @param  int $invoice_id Invoice ID. (required)
     * @param  int $employee_id ID of the elements (required)
     * @param  string $comment comment (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ResponseWrapperSupplierInvoice
     */
    public function supplierInvoiceAddRecipientAddRecipient($invoice_id, $employee_id, $comment = null)
    {
        list($response) = $this->supplierInvoiceAddRecipientAddRecipientWithHttpInfo($invoice_id, $employee_id, $comment);
        return $response;
    }

    /**
     * Operation supplierInvoiceAddRecipientAddRecipientWithHttpInfo
     *
     * Add recipient to supplier invoices.
     *
     * @param  int $invoice_id Invoice ID. (required)
     * @param  int $employee_id ID of the elements (required)
     * @param  string $comment comment (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ResponseWrapperSupplierInvoice, HTTP status code, HTTP response headers (array of strings)
     */
    public function supplierInvoiceAddRecipientAddRecipientWithHttpInfo($invoice_id, $employee_id, $comment = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperSupplierInvoice';
        $request = $this->supplierInvoiceAddRecipientAddRecipientRequest($invoice_id, $employee_id, $comment);

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
                        '\Swagger\Client\Model\ResponseWrapperSupplierInvoice',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation supplierInvoiceAddRecipientAddRecipientAsync
     *
     * Add recipient to supplier invoices.
     *
     * @param  int $invoice_id Invoice ID. (required)
     * @param  int $employee_id ID of the elements (required)
     * @param  string $comment comment (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function supplierInvoiceAddRecipientAddRecipientAsync($invoice_id, $employee_id, $comment = null)
    {
        return $this->supplierInvoiceAddRecipientAddRecipientAsyncWithHttpInfo($invoice_id, $employee_id, $comment)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation supplierInvoiceAddRecipientAddRecipientAsyncWithHttpInfo
     *
     * Add recipient to supplier invoices.
     *
     * @param  int $invoice_id Invoice ID. (required)
     * @param  int $employee_id ID of the elements (required)
     * @param  string $comment comment (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function supplierInvoiceAddRecipientAddRecipientAsyncWithHttpInfo($invoice_id, $employee_id, $comment = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperSupplierInvoice';
        $request = $this->supplierInvoiceAddRecipientAddRecipientRequest($invoice_id, $employee_id, $comment);

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
     * Create request for operation 'supplierInvoiceAddRecipientAddRecipient'
     *
     * @param  int $invoice_id Invoice ID. (required)
     * @param  int $employee_id ID of the elements (required)
     * @param  string $comment comment (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function supplierInvoiceAddRecipientAddRecipientRequest($invoice_id, $employee_id, $comment = null)
    {
        // verify the required parameter 'invoice_id' is set
        if ($invoice_id === null || (is_array($invoice_id) && count($invoice_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $invoice_id when calling supplierInvoiceAddRecipientAddRecipient'
            );
        }
        // verify the required parameter 'employee_id' is set
        if ($employee_id === null || (is_array($employee_id) && count($employee_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $employee_id when calling supplierInvoiceAddRecipientAddRecipient'
            );
        }

        $resourcePath = '/supplierInvoice/{invoiceId}/:addRecipient';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($employee_id !== null) {
            $queryParams['employeeId'] = ObjectSerializer::toQueryValue($employee_id);
        }
        // query params
        if ($comment !== null) {
            $queryParams['comment'] = ObjectSerializer::toQueryValue($comment);
        }

        // path params
        if ($invoice_id !== null) {
            $resourcePath = str_replace(
                '{' . 'invoiceId' . '}',
                ObjectSerializer::toPathValue($invoice_id),
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
     * Operation supplierInvoiceAddRecipientAddRecipientToMany
     *
     * Add recipient.
     *
     * @param  int $employee_id Element ID (required)
     * @param  string $invoice_ids ID of the elements (optional)
     * @param  string $comment comment (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ListResponseSupplierInvoice
     */
    public function supplierInvoiceAddRecipientAddRecipientToMany($employee_id, $invoice_ids = null, $comment = null)
    {
        list($response) = $this->supplierInvoiceAddRecipientAddRecipientToManyWithHttpInfo($employee_id, $invoice_ids, $comment);
        return $response;
    }

    /**
     * Operation supplierInvoiceAddRecipientAddRecipientToManyWithHttpInfo
     *
     * Add recipient.
     *
     * @param  int $employee_id Element ID (required)
     * @param  string $invoice_ids ID of the elements (optional)
     * @param  string $comment comment (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ListResponseSupplierInvoice, HTTP status code, HTTP response headers (array of strings)
     */
    public function supplierInvoiceAddRecipientAddRecipientToManyWithHttpInfo($employee_id, $invoice_ids = null, $comment = null)
    {
        $returnType = '\Swagger\Client\Model\ListResponseSupplierInvoice';
        $request = $this->supplierInvoiceAddRecipientAddRecipientToManyRequest($employee_id, $invoice_ids, $comment);

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
                        '\Swagger\Client\Model\ListResponseSupplierInvoice',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation supplierInvoiceAddRecipientAddRecipientToManyAsync
     *
     * Add recipient.
     *
     * @param  int $employee_id Element ID (required)
     * @param  string $invoice_ids ID of the elements (optional)
     * @param  string $comment comment (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function supplierInvoiceAddRecipientAddRecipientToManyAsync($employee_id, $invoice_ids = null, $comment = null)
    {
        return $this->supplierInvoiceAddRecipientAddRecipientToManyAsyncWithHttpInfo($employee_id, $invoice_ids, $comment)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation supplierInvoiceAddRecipientAddRecipientToManyAsyncWithHttpInfo
     *
     * Add recipient.
     *
     * @param  int $employee_id Element ID (required)
     * @param  string $invoice_ids ID of the elements (optional)
     * @param  string $comment comment (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function supplierInvoiceAddRecipientAddRecipientToManyAsyncWithHttpInfo($employee_id, $invoice_ids = null, $comment = null)
    {
        $returnType = '\Swagger\Client\Model\ListResponseSupplierInvoice';
        $request = $this->supplierInvoiceAddRecipientAddRecipientToManyRequest($employee_id, $invoice_ids, $comment);

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
     * Create request for operation 'supplierInvoiceAddRecipientAddRecipientToMany'
     *
     * @param  int $employee_id Element ID (required)
     * @param  string $invoice_ids ID of the elements (optional)
     * @param  string $comment comment (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function supplierInvoiceAddRecipientAddRecipientToManyRequest($employee_id, $invoice_ids = null, $comment = null)
    {
        // verify the required parameter 'employee_id' is set
        if ($employee_id === null || (is_array($employee_id) && count($employee_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $employee_id when calling supplierInvoiceAddRecipientAddRecipientToMany'
            );
        }

        $resourcePath = '/supplierInvoice/:addRecipient';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($employee_id !== null) {
            $queryParams['employeeId'] = ObjectSerializer::toQueryValue($employee_id);
        }
        // query params
        if ($invoice_ids !== null) {
            $queryParams['invoiceIds'] = ObjectSerializer::toQueryValue($invoice_ids);
        }
        // query params
        if ($comment !== null) {
            $queryParams['comment'] = ObjectSerializer::toQueryValue($comment);
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
     * Operation supplierInvoiceApproveApprove
     *
     * Approve supplier invoice.
     *
     * @param  int $invoice_id ID of the elements (required)
     * @param  string $comment comment (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ResponseWrapperSupplierInvoice
     */
    public function supplierInvoiceApproveApprove($invoice_id, $comment = null)
    {
        list($response) = $this->supplierInvoiceApproveApproveWithHttpInfo($invoice_id, $comment);
        return $response;
    }

    /**
     * Operation supplierInvoiceApproveApproveWithHttpInfo
     *
     * Approve supplier invoice.
     *
     * @param  int $invoice_id ID of the elements (required)
     * @param  string $comment comment (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ResponseWrapperSupplierInvoice, HTTP status code, HTTP response headers (array of strings)
     */
    public function supplierInvoiceApproveApproveWithHttpInfo($invoice_id, $comment = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperSupplierInvoice';
        $request = $this->supplierInvoiceApproveApproveRequest($invoice_id, $comment);

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
                        '\Swagger\Client\Model\ResponseWrapperSupplierInvoice',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation supplierInvoiceApproveApproveAsync
     *
     * Approve supplier invoice.
     *
     * @param  int $invoice_id ID of the elements (required)
     * @param  string $comment comment (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function supplierInvoiceApproveApproveAsync($invoice_id, $comment = null)
    {
        return $this->supplierInvoiceApproveApproveAsyncWithHttpInfo($invoice_id, $comment)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation supplierInvoiceApproveApproveAsyncWithHttpInfo
     *
     * Approve supplier invoice.
     *
     * @param  int $invoice_id ID of the elements (required)
     * @param  string $comment comment (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function supplierInvoiceApproveApproveAsyncWithHttpInfo($invoice_id, $comment = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperSupplierInvoice';
        $request = $this->supplierInvoiceApproveApproveRequest($invoice_id, $comment);

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
     * Create request for operation 'supplierInvoiceApproveApprove'
     *
     * @param  int $invoice_id ID of the elements (required)
     * @param  string $comment comment (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function supplierInvoiceApproveApproveRequest($invoice_id, $comment = null)
    {
        // verify the required parameter 'invoice_id' is set
        if ($invoice_id === null || (is_array($invoice_id) && count($invoice_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $invoice_id when calling supplierInvoiceApproveApprove'
            );
        }

        $resourcePath = '/supplierInvoice/{invoiceId}/:approve';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($comment !== null) {
            $queryParams['comment'] = ObjectSerializer::toQueryValue($comment);
        }

        // path params
        if ($invoice_id !== null) {
            $resourcePath = str_replace(
                '{' . 'invoiceId' . '}',
                ObjectSerializer::toPathValue($invoice_id),
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
     * Operation supplierInvoiceApproveApproveMany
     *
     * Approve supplier invoices.
     *
     * @param  string $invoice_ids ID of the elements (optional)
     * @param  string $comment comment (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ListResponseSupplierInvoice
     */
    public function supplierInvoiceApproveApproveMany($invoice_ids = null, $comment = null)
    {
        list($response) = $this->supplierInvoiceApproveApproveManyWithHttpInfo($invoice_ids, $comment);
        return $response;
    }

    /**
     * Operation supplierInvoiceApproveApproveManyWithHttpInfo
     *
     * Approve supplier invoices.
     *
     * @param  string $invoice_ids ID of the elements (optional)
     * @param  string $comment comment (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ListResponseSupplierInvoice, HTTP status code, HTTP response headers (array of strings)
     */
    public function supplierInvoiceApproveApproveManyWithHttpInfo($invoice_ids = null, $comment = null)
    {
        $returnType = '\Swagger\Client\Model\ListResponseSupplierInvoice';
        $request = $this->supplierInvoiceApproveApproveManyRequest($invoice_ids, $comment);

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
                        '\Swagger\Client\Model\ListResponseSupplierInvoice',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation supplierInvoiceApproveApproveManyAsync
     *
     * Approve supplier invoices.
     *
     * @param  string $invoice_ids ID of the elements (optional)
     * @param  string $comment comment (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function supplierInvoiceApproveApproveManyAsync($invoice_ids = null, $comment = null)
    {
        return $this->supplierInvoiceApproveApproveManyAsyncWithHttpInfo($invoice_ids, $comment)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation supplierInvoiceApproveApproveManyAsyncWithHttpInfo
     *
     * Approve supplier invoices.
     *
     * @param  string $invoice_ids ID of the elements (optional)
     * @param  string $comment comment (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function supplierInvoiceApproveApproveManyAsyncWithHttpInfo($invoice_ids = null, $comment = null)
    {
        $returnType = '\Swagger\Client\Model\ListResponseSupplierInvoice';
        $request = $this->supplierInvoiceApproveApproveManyRequest($invoice_ids, $comment);

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
     * Create request for operation 'supplierInvoiceApproveApproveMany'
     *
     * @param  string $invoice_ids ID of the elements (optional)
     * @param  string $comment comment (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function supplierInvoiceApproveApproveManyRequest($invoice_ids = null, $comment = null)
    {

        $resourcePath = '/supplierInvoice/:approve';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($invoice_ids !== null) {
            $queryParams['invoiceIds'] = ObjectSerializer::toQueryValue($invoice_ids);
        }
        // query params
        if ($comment !== null) {
            $queryParams['comment'] = ObjectSerializer::toQueryValue($comment);
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
     * Operation supplierInvoiceChangeDimensionChangeDimensionMany
     *
     * Change dimension on a supplier invoice.
     *
     * @param  int $invoice_id Invoice ID. (required)
     * @param  string $dimension Dimension (required)
     * @param  int $dimension_id DimensionID (required)
     * @param  string $debit_posting_ids ID of the elements (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ResponseWrapperSupplierInvoice
     */
    public function supplierInvoiceChangeDimensionChangeDimensionMany($invoice_id, $dimension, $dimension_id, $debit_posting_ids = null)
    {
        list($response) = $this->supplierInvoiceChangeDimensionChangeDimensionManyWithHttpInfo($invoice_id, $dimension, $dimension_id, $debit_posting_ids);
        return $response;
    }

    /**
     * Operation supplierInvoiceChangeDimensionChangeDimensionManyWithHttpInfo
     *
     * Change dimension on a supplier invoice.
     *
     * @param  int $invoice_id Invoice ID. (required)
     * @param  string $dimension Dimension (required)
     * @param  int $dimension_id DimensionID (required)
     * @param  string $debit_posting_ids ID of the elements (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ResponseWrapperSupplierInvoice, HTTP status code, HTTP response headers (array of strings)
     */
    public function supplierInvoiceChangeDimensionChangeDimensionManyWithHttpInfo($invoice_id, $dimension, $dimension_id, $debit_posting_ids = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperSupplierInvoice';
        $request = $this->supplierInvoiceChangeDimensionChangeDimensionManyRequest($invoice_id, $dimension, $dimension_id, $debit_posting_ids);

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
                        '\Swagger\Client\Model\ResponseWrapperSupplierInvoice',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation supplierInvoiceChangeDimensionChangeDimensionManyAsync
     *
     * Change dimension on a supplier invoice.
     *
     * @param  int $invoice_id Invoice ID. (required)
     * @param  string $dimension Dimension (required)
     * @param  int $dimension_id DimensionID (required)
     * @param  string $debit_posting_ids ID of the elements (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function supplierInvoiceChangeDimensionChangeDimensionManyAsync($invoice_id, $dimension, $dimension_id, $debit_posting_ids = null)
    {
        return $this->supplierInvoiceChangeDimensionChangeDimensionManyAsyncWithHttpInfo($invoice_id, $dimension, $dimension_id, $debit_posting_ids)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation supplierInvoiceChangeDimensionChangeDimensionManyAsyncWithHttpInfo
     *
     * Change dimension on a supplier invoice.
     *
     * @param  int $invoice_id Invoice ID. (required)
     * @param  string $dimension Dimension (required)
     * @param  int $dimension_id DimensionID (required)
     * @param  string $debit_posting_ids ID of the elements (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function supplierInvoiceChangeDimensionChangeDimensionManyAsyncWithHttpInfo($invoice_id, $dimension, $dimension_id, $debit_posting_ids = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperSupplierInvoice';
        $request = $this->supplierInvoiceChangeDimensionChangeDimensionManyRequest($invoice_id, $dimension, $dimension_id, $debit_posting_ids);

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
     * Create request for operation 'supplierInvoiceChangeDimensionChangeDimensionMany'
     *
     * @param  int $invoice_id Invoice ID. (required)
     * @param  string $dimension Dimension (required)
     * @param  int $dimension_id DimensionID (required)
     * @param  string $debit_posting_ids ID of the elements (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function supplierInvoiceChangeDimensionChangeDimensionManyRequest($invoice_id, $dimension, $dimension_id, $debit_posting_ids = null)
    {
        // verify the required parameter 'invoice_id' is set
        if ($invoice_id === null || (is_array($invoice_id) && count($invoice_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $invoice_id when calling supplierInvoiceChangeDimensionChangeDimensionMany'
            );
        }
        // verify the required parameter 'dimension' is set
        if ($dimension === null || (is_array($dimension) && count($dimension) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $dimension when calling supplierInvoiceChangeDimensionChangeDimensionMany'
            );
        }
        // verify the required parameter 'dimension_id' is set
        if ($dimension_id === null || (is_array($dimension_id) && count($dimension_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $dimension_id when calling supplierInvoiceChangeDimensionChangeDimensionMany'
            );
        }

        $resourcePath = '/supplierInvoice/{invoiceId}/:changeDimension';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($debit_posting_ids !== null) {
            $queryParams['debitPostingIds'] = ObjectSerializer::toQueryValue($debit_posting_ids);
        }
        // query params
        if ($dimension !== null) {
            $queryParams['dimension'] = ObjectSerializer::toQueryValue($dimension);
        }
        // query params
        if ($dimension_id !== null) {
            $queryParams['dimensionId'] = ObjectSerializer::toQueryValue($dimension_id);
        }

        // path params
        if ($invoice_id !== null) {
            $resourcePath = str_replace(
                '{' . 'invoiceId' . '}',
                ObjectSerializer::toPathValue($invoice_id),
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
     * Operation supplierInvoiceForApprovalGetApprovalInvoices
     *
     * Get supplierInvoices for approval
     *
     * @param  string $search_text Search for department, employee, project and more (optional)
     * @param  bool $show_all Show all or just your own (optional, default to false)
     * @param  int $employee_id Default is logged in employee (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  int $count Number of elements to return (optional, default to 1000)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ListResponseSupplierInvoice
     */
    public function supplierInvoiceForApprovalGetApprovalInvoices($search_text = null, $show_all = 'false', $employee_id = null, $from = '0', $count = '1000', $sorting = null, $fields = null)
    {
        list($response) = $this->supplierInvoiceForApprovalGetApprovalInvoicesWithHttpInfo($search_text, $show_all, $employee_id, $from, $count, $sorting, $fields);
        return $response;
    }

    /**
     * Operation supplierInvoiceForApprovalGetApprovalInvoicesWithHttpInfo
     *
     * Get supplierInvoices for approval
     *
     * @param  string $search_text Search for department, employee, project and more (optional)
     * @param  bool $show_all Show all or just your own (optional, default to false)
     * @param  int $employee_id Default is logged in employee (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  int $count Number of elements to return (optional, default to 1000)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ListResponseSupplierInvoice, HTTP status code, HTTP response headers (array of strings)
     */
    public function supplierInvoiceForApprovalGetApprovalInvoicesWithHttpInfo($search_text = null, $show_all = 'false', $employee_id = null, $from = '0', $count = '1000', $sorting = null, $fields = null)
    {
        $returnType = '\Swagger\Client\Model\ListResponseSupplierInvoice';
        $request = $this->supplierInvoiceForApprovalGetApprovalInvoicesRequest($search_text, $show_all, $employee_id, $from, $count, $sorting, $fields);

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
                        '\Swagger\Client\Model\ListResponseSupplierInvoice',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation supplierInvoiceForApprovalGetApprovalInvoicesAsync
     *
     * Get supplierInvoices for approval
     *
     * @param  string $search_text Search for department, employee, project and more (optional)
     * @param  bool $show_all Show all or just your own (optional, default to false)
     * @param  int $employee_id Default is logged in employee (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  int $count Number of elements to return (optional, default to 1000)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function supplierInvoiceForApprovalGetApprovalInvoicesAsync($search_text = null, $show_all = 'false', $employee_id = null, $from = '0', $count = '1000', $sorting = null, $fields = null)
    {
        return $this->supplierInvoiceForApprovalGetApprovalInvoicesAsyncWithHttpInfo($search_text, $show_all, $employee_id, $from, $count, $sorting, $fields)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation supplierInvoiceForApprovalGetApprovalInvoicesAsyncWithHttpInfo
     *
     * Get supplierInvoices for approval
     *
     * @param  string $search_text Search for department, employee, project and more (optional)
     * @param  bool $show_all Show all or just your own (optional, default to false)
     * @param  int $employee_id Default is logged in employee (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  int $count Number of elements to return (optional, default to 1000)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function supplierInvoiceForApprovalGetApprovalInvoicesAsyncWithHttpInfo($search_text = null, $show_all = 'false', $employee_id = null, $from = '0', $count = '1000', $sorting = null, $fields = null)
    {
        $returnType = '\Swagger\Client\Model\ListResponseSupplierInvoice';
        $request = $this->supplierInvoiceForApprovalGetApprovalInvoicesRequest($search_text, $show_all, $employee_id, $from, $count, $sorting, $fields);

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
     * Create request for operation 'supplierInvoiceForApprovalGetApprovalInvoices'
     *
     * @param  string $search_text Search for department, employee, project and more (optional)
     * @param  bool $show_all Show all or just your own (optional, default to false)
     * @param  int $employee_id Default is logged in employee (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  int $count Number of elements to return (optional, default to 1000)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function supplierInvoiceForApprovalGetApprovalInvoicesRequest($search_text = null, $show_all = 'false', $employee_id = null, $from = '0', $count = '1000', $sorting = null, $fields = null)
    {

        $resourcePath = '/supplierInvoice/forApproval';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($search_text !== null) {
            $queryParams['searchText'] = ObjectSerializer::toQueryValue($search_text);
        }
        // query params
        if ($show_all !== null) {
            $queryParams['showAll'] = ObjectSerializer::toQueryValue($show_all);
        }
        // query params
        if ($employee_id !== null) {
            $queryParams['employeeId'] = ObjectSerializer::toQueryValue($employee_id);
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
     * Operation supplierInvoiceGet
     *
     * Get supplierInvoice by ID.
     *
     * @param  int $id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ResponseWrapperSupplierInvoice
     */
    public function supplierInvoiceGet($id, $fields = null)
    {
        list($response) = $this->supplierInvoiceGetWithHttpInfo($id, $fields);
        return $response;
    }

    /**
     * Operation supplierInvoiceGetWithHttpInfo
     *
     * Get supplierInvoice by ID.
     *
     * @param  int $id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ResponseWrapperSupplierInvoice, HTTP status code, HTTP response headers (array of strings)
     */
    public function supplierInvoiceGetWithHttpInfo($id, $fields = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperSupplierInvoice';
        $request = $this->supplierInvoiceGetRequest($id, $fields);

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
                        '\Swagger\Client\Model\ResponseWrapperSupplierInvoice',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation supplierInvoiceGetAsync
     *
     * Get supplierInvoice by ID.
     *
     * @param  int $id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function supplierInvoiceGetAsync($id, $fields = null)
    {
        return $this->supplierInvoiceGetAsyncWithHttpInfo($id, $fields)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation supplierInvoiceGetAsyncWithHttpInfo
     *
     * Get supplierInvoice by ID.
     *
     * @param  int $id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function supplierInvoiceGetAsyncWithHttpInfo($id, $fields = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperSupplierInvoice';
        $request = $this->supplierInvoiceGetRequest($id, $fields);

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
     * Create request for operation 'supplierInvoiceGet'
     *
     * @param  int $id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function supplierInvoiceGetRequest($id, $fields = null)
    {
        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling supplierInvoiceGet'
            );
        }

        $resourcePath = '/supplierInvoice/{id}';
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
     * Operation supplierInvoicePdfDownloadPdf
     *
     * Get supplierInvoice document by invoice ID.
     *
     * @param  int $invoice_id Invoice ID from which document is downloaded. (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return string
     */
    public function supplierInvoicePdfDownloadPdf($invoice_id)
    {
        list($response) = $this->supplierInvoicePdfDownloadPdfWithHttpInfo($invoice_id);
        return $response;
    }

    /**
     * Operation supplierInvoicePdfDownloadPdfWithHttpInfo
     *
     * Get supplierInvoice document by invoice ID.
     *
     * @param  int $invoice_id Invoice ID from which document is downloaded. (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of string, HTTP status code, HTTP response headers (array of strings)
     */
    public function supplierInvoicePdfDownloadPdfWithHttpInfo($invoice_id)
    {
        $returnType = 'string';
        $request = $this->supplierInvoicePdfDownloadPdfRequest($invoice_id);

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
                        'string',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation supplierInvoicePdfDownloadPdfAsync
     *
     * Get supplierInvoice document by invoice ID.
     *
     * @param  int $invoice_id Invoice ID from which document is downloaded. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function supplierInvoicePdfDownloadPdfAsync($invoice_id)
    {
        return $this->supplierInvoicePdfDownloadPdfAsyncWithHttpInfo($invoice_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation supplierInvoicePdfDownloadPdfAsyncWithHttpInfo
     *
     * Get supplierInvoice document by invoice ID.
     *
     * @param  int $invoice_id Invoice ID from which document is downloaded. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function supplierInvoicePdfDownloadPdfAsyncWithHttpInfo($invoice_id)
    {
        $returnType = 'string';
        $request = $this->supplierInvoicePdfDownloadPdfRequest($invoice_id);

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
     * Create request for operation 'supplierInvoicePdfDownloadPdf'
     *
     * @param  int $invoice_id Invoice ID from which document is downloaded. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function supplierInvoicePdfDownloadPdfRequest($invoice_id)
    {
        // verify the required parameter 'invoice_id' is set
        if ($invoice_id === null || (is_array($invoice_id) && count($invoice_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $invoice_id when calling supplierInvoicePdfDownloadPdf'
            );
        }

        $resourcePath = '/supplierInvoice/{invoiceId}/pdf';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($invoice_id !== null) {
            $resourcePath = str_replace(
                '{' . 'invoiceId' . '}',
                ObjectSerializer::toPathValue($invoice_id),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/octet-stream']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/octet-stream'],
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
     * Operation supplierInvoiceRejectReject
     *
     * reject supplier invoice.
     *
     * @param  int $invoice_id Invoice ID. (required)
     * @param  string $comment comment (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ResponseWrapperSupplierInvoice
     */
    public function supplierInvoiceRejectReject($invoice_id, $comment)
    {
        list($response) = $this->supplierInvoiceRejectRejectWithHttpInfo($invoice_id, $comment);
        return $response;
    }

    /**
     * Operation supplierInvoiceRejectRejectWithHttpInfo
     *
     * reject supplier invoice.
     *
     * @param  int $invoice_id Invoice ID. (required)
     * @param  string $comment (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ResponseWrapperSupplierInvoice, HTTP status code, HTTP response headers (array of strings)
     */
    public function supplierInvoiceRejectRejectWithHttpInfo($invoice_id, $comment)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperSupplierInvoice';
        $request = $this->supplierInvoiceRejectRejectRequest($invoice_id, $comment);

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
                        '\Swagger\Client\Model\ResponseWrapperSupplierInvoice',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation supplierInvoiceRejectRejectAsync
     *
     * reject supplier invoice.
     *
     * @param  int $invoice_id Invoice ID. (required)
     * @param  string $comment (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function supplierInvoiceRejectRejectAsync($invoice_id, $comment)
    {
        return $this->supplierInvoiceRejectRejectAsyncWithHttpInfo($invoice_id, $comment)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation supplierInvoiceRejectRejectAsyncWithHttpInfo
     *
     * reject supplier invoice.
     *
     * @param  int $invoice_id Invoice ID. (required)
     * @param  string $comment (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function supplierInvoiceRejectRejectAsyncWithHttpInfo($invoice_id, $comment)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperSupplierInvoice';
        $request = $this->supplierInvoiceRejectRejectRequest($invoice_id, $comment);

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
     * Create request for operation 'supplierInvoiceRejectReject'
     *
     * @param  int $invoice_id Invoice ID. (required)
     * @param  string $comment (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function supplierInvoiceRejectRejectRequest($invoice_id, $comment)
    {
        // verify the required parameter 'invoice_id' is set
        if ($invoice_id === null || (is_array($invoice_id) && count($invoice_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $invoice_id when calling supplierInvoiceRejectReject'
            );
        }
        // verify the required parameter 'comment' is set
        if ($comment === null || (is_array($comment) && count($comment) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $comment when calling supplierInvoiceRejectReject'
            );
        }

        $resourcePath = '/supplierInvoice/{invoiceId}/:reject';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($comment !== null) {
            $queryParams['comment'] = ObjectSerializer::toQueryValue($comment);
        }

        // path params
        if ($invoice_id !== null) {
            $resourcePath = str_replace(
                '{' . 'invoiceId' . '}',
                ObjectSerializer::toPathValue($invoice_id),
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
     * Operation supplierInvoiceRejectRejectMany
     *
     * reject supplier invoices.
     *
     * @param  string $comment comment (required)
     * @param  string $invoice_ids ID of the elements (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ListResponseSupplierInvoice
     */
    public function supplierInvoiceRejectRejectMany($comment, $invoice_ids = null)
    {
        list($response) = $this->supplierInvoiceRejectRejectManyWithHttpInfo($comment, $invoice_ids);
        return $response;
    }

    /**
     * Operation supplierInvoiceRejectRejectManyWithHttpInfo
     *
     * reject supplier invoices.
     *
     * @param  string $comment (required)
     * @param  string $invoice_ids ID of the elements (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ListResponseSupplierInvoice, HTTP status code, HTTP response headers (array of strings)
     */
    public function supplierInvoiceRejectRejectManyWithHttpInfo($comment, $invoice_ids = null)
    {
        $returnType = '\Swagger\Client\Model\ListResponseSupplierInvoice';
        $request = $this->supplierInvoiceRejectRejectManyRequest($comment, $invoice_ids);

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
                        '\Swagger\Client\Model\ListResponseSupplierInvoice',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation supplierInvoiceRejectRejectManyAsync
     *
     * reject supplier invoices.
     *
     * @param  string $comment (required)
     * @param  string $invoice_ids ID of the elements (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function supplierInvoiceRejectRejectManyAsync($comment, $invoice_ids = null)
    {
        return $this->supplierInvoiceRejectRejectManyAsyncWithHttpInfo($comment, $invoice_ids)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation supplierInvoiceRejectRejectManyAsyncWithHttpInfo
     *
     * reject supplier invoices.
     *
     * @param  string $comment (required)
     * @param  string $invoice_ids ID of the elements (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function supplierInvoiceRejectRejectManyAsyncWithHttpInfo($comment, $invoice_ids = null)
    {
        $returnType = '\Swagger\Client\Model\ListResponseSupplierInvoice';
        $request = $this->supplierInvoiceRejectRejectManyRequest($comment, $invoice_ids);

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
     * Create request for operation 'supplierInvoiceRejectRejectMany'
     *
     * @param  string $comment (required)
     * @param  string $invoice_ids ID of the elements (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function supplierInvoiceRejectRejectManyRequest($comment, $invoice_ids = null)
    {
        // verify the required parameter 'comment' is set
        if ($comment === null || (is_array($comment) && count($comment) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $comment when calling supplierInvoiceRejectRejectMany'
            );
        }

        $resourcePath = '/supplierInvoice/:reject';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($comment !== null) {
            $queryParams['comment'] = ObjectSerializer::toQueryValue($comment);
        }
        // query params
        if ($invoice_ids !== null) {
            $queryParams['invoiceIds'] = ObjectSerializer::toQueryValue($invoice_ids);
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
     * Operation supplierInvoiceSearch
     *
     * Find supplierInvoices corresponding with sent data.
     *
     * @param  string $invoice_date_from From and including (required)
     * @param  string $invoice_date_to To and excluding (required)
     * @param  string $id List of IDs (optional)
     * @param  string $invoice_number Equals (optional)
     * @param  string $kid Equals (optional)
     * @param  string $voucher_id Equals (optional)
     * @param  string $supplier_id Equals (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  int $count Number of elements to return (optional, default to 1000)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ListResponseSupplierInvoice
     */
    public function supplierInvoiceSearch($invoice_date_from, $invoice_date_to, $id = null, $invoice_number = null, $kid = null, $voucher_id = null, $supplier_id = null, $from = '0', $count = '1000', $sorting = null, $fields = null)
    {
        list($response) = $this->supplierInvoiceSearchWithHttpInfo($invoice_date_from, $invoice_date_to, $id, $invoice_number, $kid, $voucher_id, $supplier_id, $from, $count, $sorting, $fields);
        return $response;
    }

    /**
     * Operation supplierInvoiceSearchWithHttpInfo
     *
     * Find supplierInvoices corresponding with sent data.
     *
     * @param  string $invoice_date_from From and including (required)
     * @param  string $invoice_date_to To and excluding (required)
     * @param  string $id List of IDs (optional)
     * @param  string $invoice_number Equals (optional)
     * @param  string $kid Equals (optional)
     * @param  string $voucher_id Equals (optional)
     * @param  string $supplier_id Equals (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  int $count Number of elements to return (optional, default to 1000)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ListResponseSupplierInvoice, HTTP status code, HTTP response headers (array of strings)
     */
    public function supplierInvoiceSearchWithHttpInfo($invoice_date_from, $invoice_date_to, $id = null, $invoice_number = null, $kid = null, $voucher_id = null, $supplier_id = null, $from = '0', $count = '1000', $sorting = null, $fields = null)
    {
        $returnType = '\Swagger\Client\Model\ListResponseSupplierInvoice';
        $request = $this->supplierInvoiceSearchRequest($invoice_date_from, $invoice_date_to, $id, $invoice_number, $kid, $voucher_id, $supplier_id, $from, $count, $sorting, $fields);

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
                        '\Swagger\Client\Model\ListResponseSupplierInvoice',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation supplierInvoiceSearchAsync
     *
     * Find supplierInvoices corresponding with sent data.
     *
     * @param  string $invoice_date_from From and including (required)
     * @param  string $invoice_date_to To and excluding (required)
     * @param  string $id List of IDs (optional)
     * @param  string $invoice_number Equals (optional)
     * @param  string $kid Equals (optional)
     * @param  string $voucher_id Equals (optional)
     * @param  string $supplier_id Equals (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  int $count Number of elements to return (optional, default to 1000)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function supplierInvoiceSearchAsync($invoice_date_from, $invoice_date_to, $id = null, $invoice_number = null, $kid = null, $voucher_id = null, $supplier_id = null, $from = '0', $count = '1000', $sorting = null, $fields = null)
    {
        return $this->supplierInvoiceSearchAsyncWithHttpInfo($invoice_date_from, $invoice_date_to, $id, $invoice_number, $kid, $voucher_id, $supplier_id, $from, $count, $sorting, $fields)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation supplierInvoiceSearchAsyncWithHttpInfo
     *
     * Find supplierInvoices corresponding with sent data.
     *
     * @param  string $invoice_date_from From and including (required)
     * @param  string $invoice_date_to To and excluding (required)
     * @param  string $id List of IDs (optional)
     * @param  string $invoice_number Equals (optional)
     * @param  string $kid Equals (optional)
     * @param  string $voucher_id Equals (optional)
     * @param  string $supplier_id Equals (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  int $count Number of elements to return (optional, default to 1000)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function supplierInvoiceSearchAsyncWithHttpInfo($invoice_date_from, $invoice_date_to, $id = null, $invoice_number = null, $kid = null, $voucher_id = null, $supplier_id = null, $from = '0', $count = '1000', $sorting = null, $fields = null)
    {
        $returnType = '\Swagger\Client\Model\ListResponseSupplierInvoice';
        $request = $this->supplierInvoiceSearchRequest($invoice_date_from, $invoice_date_to, $id, $invoice_number, $kid, $voucher_id, $supplier_id, $from, $count, $sorting, $fields);

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
     * Create request for operation 'supplierInvoiceSearch'
     *
     * @param  string $invoice_date_from From and including (required)
     * @param  string $invoice_date_to To and excluding (required)
     * @param  string $id List of IDs (optional)
     * @param  string $invoice_number Equals (optional)
     * @param  string $kid Equals (optional)
     * @param  string $voucher_id Equals (optional)
     * @param  string $supplier_id Equals (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  int $count Number of elements to return (optional, default to 1000)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function supplierInvoiceSearchRequest($invoice_date_from, $invoice_date_to, $id = null, $invoice_number = null, $kid = null, $voucher_id = null, $supplier_id = null, $from = '0', $count = '1000', $sorting = null, $fields = null)
    {
        // verify the required parameter 'invoice_date_from' is set
        if ($invoice_date_from === null || (is_array($invoice_date_from) && count($invoice_date_from) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $invoice_date_from when calling supplierInvoiceSearch'
            );
        }
        // verify the required parameter 'invoice_date_to' is set
        if ($invoice_date_to === null || (is_array($invoice_date_to) && count($invoice_date_to) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $invoice_date_to when calling supplierInvoiceSearch'
            );
        }

        $resourcePath = '/supplierInvoice';
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
        if ($invoice_date_from !== null) {
            $queryParams['invoiceDateFrom'] = ObjectSerializer::toQueryValue($invoice_date_from);
        }
        // query params
        if ($invoice_date_to !== null) {
            $queryParams['invoiceDateTo'] = ObjectSerializer::toQueryValue($invoice_date_to);
        }
        // query params
        if ($invoice_number !== null) {
            $queryParams['invoiceNumber'] = ObjectSerializer::toQueryValue($invoice_number);
        }
        // query params
        if ($kid !== null) {
            $queryParams['kid'] = ObjectSerializer::toQueryValue($kid);
        }
        // query params
        if ($voucher_id !== null) {
            $queryParams['voucherId'] = ObjectSerializer::toQueryValue($voucher_id);
        }
        // query params
        if ($supplier_id !== null) {
            $queryParams['supplierId'] = ObjectSerializer::toQueryValue($supplier_id);
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
     * Operation supplierInvoiceVoucherPostingsPutPostings
     *
     * [BETA] Put debit postings.
     *
     * @param  int $id Voucher id (required)
     * @param  \Swagger\Client\Model\OrderLinePostingDTO[] $body Postings (optional)
     * @param  bool $send_to_ledger Equals (optional, default to false)
     * @param  string $voucher_date If set, the date of the voucher and the supplier invoice will be changed to this date. If empty, date will not be changed (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ResponseWrapperSupplierInvoice
     */
    public function supplierInvoiceVoucherPostingsPutPostings($id, $body = null, $send_to_ledger = 'false', $voucher_date = null)
    {
        list($response) = $this->supplierInvoiceVoucherPostingsPutPostingsWithHttpInfo($id, $body, $send_to_ledger, $voucher_date);
        return $response;
    }

    /**
     * Operation supplierInvoiceVoucherPostingsPutPostingsWithHttpInfo
     *
     * [BETA] Put debit postings.
     *
     * @param  int $id Voucher id (required)
     * @param  \Swagger\Client\Model\OrderLinePostingDTO[] $body Postings (optional)
     * @param  bool $send_to_ledger Equals (optional, default to false)
     * @param  string $voucher_date If set, the date of the voucher and the supplier invoice will be changed to this date. If empty, date will not be changed (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ResponseWrapperSupplierInvoice, HTTP status code, HTTP response headers (array of strings)
     */
    public function supplierInvoiceVoucherPostingsPutPostingsWithHttpInfo($id, $body = null, $send_to_ledger = 'false', $voucher_date = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperSupplierInvoice';
        $request = $this->supplierInvoiceVoucherPostingsPutPostingsRequest($id, $body, $send_to_ledger, $voucher_date);

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
                        '\Swagger\Client\Model\ResponseWrapperSupplierInvoice',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation supplierInvoiceVoucherPostingsPutPostingsAsync
     *
     * [BETA] Put debit postings.
     *
     * @param  int $id Voucher id (required)
     * @param  \Swagger\Client\Model\OrderLinePostingDTO[] $body Postings (optional)
     * @param  bool $send_to_ledger Equals (optional, default to false)
     * @param  string $voucher_date If set, the date of the voucher and the supplier invoice will be changed to this date. If empty, date will not be changed (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function supplierInvoiceVoucherPostingsPutPostingsAsync($id, $body = null, $send_to_ledger = 'false', $voucher_date = null)
    {
        return $this->supplierInvoiceVoucherPostingsPutPostingsAsyncWithHttpInfo($id, $body, $send_to_ledger, $voucher_date)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation supplierInvoiceVoucherPostingsPutPostingsAsyncWithHttpInfo
     *
     * [BETA] Put debit postings.
     *
     * @param  int $id Voucher id (required)
     * @param  \Swagger\Client\Model\OrderLinePostingDTO[] $body Postings (optional)
     * @param  bool $send_to_ledger Equals (optional, default to false)
     * @param  string $voucher_date If set, the date of the voucher and the supplier invoice will be changed to this date. If empty, date will not be changed (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function supplierInvoiceVoucherPostingsPutPostingsAsyncWithHttpInfo($id, $body = null, $send_to_ledger = 'false', $voucher_date = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperSupplierInvoice';
        $request = $this->supplierInvoiceVoucherPostingsPutPostingsRequest($id, $body, $send_to_ledger, $voucher_date);

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
     * Create request for operation 'supplierInvoiceVoucherPostingsPutPostings'
     *
     * @param  int $id Voucher id (required)
     * @param  \Swagger\Client\Model\OrderLinePostingDTO[] $body Postings (optional)
     * @param  bool $send_to_ledger Equals (optional, default to false)
     * @param  string $voucher_date If set, the date of the voucher and the supplier invoice will be changed to this date. If empty, date will not be changed (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function supplierInvoiceVoucherPostingsPutPostingsRequest($id, $body = null, $send_to_ledger = 'false', $voucher_date = null)
    {
        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling supplierInvoiceVoucherPostingsPutPostings'
            );
        }

        $resourcePath = '/supplierInvoice/voucher/{id}/postings';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($send_to_ledger !== null) {
            $queryParams['sendToLedger'] = ObjectSerializer::toQueryValue($send_to_ledger);
        }
        // query params
        if ($voucher_date !== null) {
            $queryParams['voucherDate'] = ObjectSerializer::toQueryValue($voucher_date);
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
