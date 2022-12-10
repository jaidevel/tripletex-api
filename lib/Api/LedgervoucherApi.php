<?php
/**
 * LedgervoucherApi
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
 * LedgervoucherApi Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class LedgervoucherApi
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
     * Operation ledgerVoucherAttachmentDeleteAttachment
     *
     * Delete attachment.
     *
     * @param  int $voucher_id ID of voucher containing the attachment to delete. (required)
     * @param  int $version Version of voucher containing the attachment to delete. (optional)
     * @param  bool $send_to_inbox Should the attachment be sent to inbox rather than deleted? (optional, default to false)
     * @param  bool $split If sendToInbox is true, should the attachment be split into one voucher per page? (optional, default to false)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function ledgerVoucherAttachmentDeleteAttachment($voucher_id, $version = null, $send_to_inbox = 'false', $split = 'false')
    {
        $this->ledgerVoucherAttachmentDeleteAttachmentWithHttpInfo($voucher_id, $version, $send_to_inbox, $split);
    }

    /**
     * Operation ledgerVoucherAttachmentDeleteAttachmentWithHttpInfo
     *
     * Delete attachment.
     *
     * @param  int $voucher_id ID of voucher containing the attachment to delete. (required)
     * @param  int $version Version of voucher containing the attachment to delete. (optional)
     * @param  bool $send_to_inbox Should the attachment be sent to inbox rather than deleted? (optional, default to false)
     * @param  bool $split If sendToInbox is true, should the attachment be split into one voucher per page? (optional, default to false)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function ledgerVoucherAttachmentDeleteAttachmentWithHttpInfo($voucher_id, $version = null, $send_to_inbox = 'false', $split = 'false')
    {
        $returnType = '';
        $request = $this->ledgerVoucherAttachmentDeleteAttachmentRequest($voucher_id, $version, $send_to_inbox, $split);

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
     * Operation ledgerVoucherAttachmentDeleteAttachmentAsync
     *
     * Delete attachment.
     *
     * @param  int $voucher_id ID of voucher containing the attachment to delete. (required)
     * @param  int $version Version of voucher containing the attachment to delete. (optional)
     * @param  bool $send_to_inbox Should the attachment be sent to inbox rather than deleted? (optional, default to false)
     * @param  bool $split If sendToInbox is true, should the attachment be split into one voucher per page? (optional, default to false)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function ledgerVoucherAttachmentDeleteAttachmentAsync($voucher_id, $version = null, $send_to_inbox = 'false', $split = 'false')
    {
        return $this->ledgerVoucherAttachmentDeleteAttachmentAsyncWithHttpInfo($voucher_id, $version, $send_to_inbox, $split)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation ledgerVoucherAttachmentDeleteAttachmentAsyncWithHttpInfo
     *
     * Delete attachment.
     *
     * @param  int $voucher_id ID of voucher containing the attachment to delete. (required)
     * @param  int $version Version of voucher containing the attachment to delete. (optional)
     * @param  bool $send_to_inbox Should the attachment be sent to inbox rather than deleted? (optional, default to false)
     * @param  bool $split If sendToInbox is true, should the attachment be split into one voucher per page? (optional, default to false)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function ledgerVoucherAttachmentDeleteAttachmentAsyncWithHttpInfo($voucher_id, $version = null, $send_to_inbox = 'false', $split = 'false')
    {
        $returnType = '';
        $request = $this->ledgerVoucherAttachmentDeleteAttachmentRequest($voucher_id, $version, $send_to_inbox, $split);

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
     * Create request for operation 'ledgerVoucherAttachmentDeleteAttachment'
     *
     * @param  int $voucher_id ID of voucher containing the attachment to delete. (required)
     * @param  int $version Version of voucher containing the attachment to delete. (optional)
     * @param  bool $send_to_inbox Should the attachment be sent to inbox rather than deleted? (optional, default to false)
     * @param  bool $split If sendToInbox is true, should the attachment be split into one voucher per page? (optional, default to false)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function ledgerVoucherAttachmentDeleteAttachmentRequest($voucher_id, $version = null, $send_to_inbox = 'false', $split = 'false')
    {
        // verify the required parameter 'voucher_id' is set
        if ($voucher_id === null || (is_array($voucher_id) && count($voucher_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $voucher_id when calling ledgerVoucherAttachmentDeleteAttachment'
            );
        }
        if ($version !== null && $version < 0) {
            throw new \InvalidArgumentException('invalid value for "$version" when calling LedgervoucherApi.ledgerVoucherAttachmentDeleteAttachment, must be bigger than or equal to 0.');
        }


        $resourcePath = '/ledger/voucher/{voucherId}/attachment';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($version !== null) {
            $queryParams['version'] = ObjectSerializer::toQueryValue($version);
        }
        // query params
        if ($send_to_inbox !== null) {
            $queryParams['sendToInbox'] = ObjectSerializer::toQueryValue($send_to_inbox);
        }
        // query params
        if ($split !== null) {
            $queryParams['split'] = ObjectSerializer::toQueryValue($split);
        }

        // path params
        if ($voucher_id !== null) {
            $resourcePath = str_replace(
                '{' . 'voucherId' . '}',
                ObjectSerializer::toPathValue($voucher_id),
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
     * Operation ledgerVoucherAttachmentUploadAttachment
     *
     * Upload attachment to voucher. If the voucher already has an attachment the content will be appended to the existing attachment as new PDF page(s). Valid document formats are PDF, PNG, JPEG and TIFF. Non PDF formats will be converted to PDF. Send as multipart form.
     *
     * @param  int $voucher_id Voucher ID to upload attachment to. (required)
     * @param  \SplFileObject $file The file (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function ledgerVoucherAttachmentUploadAttachment($voucher_id, $file)
    {
        $this->ledgerVoucherAttachmentUploadAttachmentWithHttpInfo($voucher_id, $file);
    }

    /**
     * Operation ledgerVoucherAttachmentUploadAttachmentWithHttpInfo
     *
     * Upload attachment to voucher. If the voucher already has an attachment the content will be appended to the existing attachment as new PDF page(s). Valid document formats are PDF, PNG, JPEG and TIFF. Non PDF formats will be converted to PDF. Send as multipart form.
     *
     * @param  int $voucher_id Voucher ID to upload attachment to. (required)
     * @param  \SplFileObject $file The file (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function ledgerVoucherAttachmentUploadAttachmentWithHttpInfo($voucher_id, $file)
    {
        $returnType = '';
        $request = $this->ledgerVoucherAttachmentUploadAttachmentRequest($voucher_id, $file);

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
     * Operation ledgerVoucherAttachmentUploadAttachmentAsync
     *
     * Upload attachment to voucher. If the voucher already has an attachment the content will be appended to the existing attachment as new PDF page(s). Valid document formats are PDF, PNG, JPEG and TIFF. Non PDF formats will be converted to PDF. Send as multipart form.
     *
     * @param  int $voucher_id Voucher ID to upload attachment to. (required)
     * @param  \SplFileObject $file The file (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function ledgerVoucherAttachmentUploadAttachmentAsync($voucher_id, $file)
    {
        return $this->ledgerVoucherAttachmentUploadAttachmentAsyncWithHttpInfo($voucher_id, $file)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation ledgerVoucherAttachmentUploadAttachmentAsyncWithHttpInfo
     *
     * Upload attachment to voucher. If the voucher already has an attachment the content will be appended to the existing attachment as new PDF page(s). Valid document formats are PDF, PNG, JPEG and TIFF. Non PDF formats will be converted to PDF. Send as multipart form.
     *
     * @param  int $voucher_id Voucher ID to upload attachment to. (required)
     * @param  \SplFileObject $file The file (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function ledgerVoucherAttachmentUploadAttachmentAsyncWithHttpInfo($voucher_id, $file)
    {
        $returnType = '';
        $request = $this->ledgerVoucherAttachmentUploadAttachmentRequest($voucher_id, $file);

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
     * Create request for operation 'ledgerVoucherAttachmentUploadAttachment'
     *
     * @param  int $voucher_id Voucher ID to upload attachment to. (required)
     * @param  \SplFileObject $file The file (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function ledgerVoucherAttachmentUploadAttachmentRequest($voucher_id, $file)
    {
        // verify the required parameter 'voucher_id' is set
        if ($voucher_id === null || (is_array($voucher_id) && count($voucher_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $voucher_id when calling ledgerVoucherAttachmentUploadAttachment'
            );
        }
        // verify the required parameter 'file' is set
        if ($file === null || (is_array($file) && count($file) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $file when calling ledgerVoucherAttachmentUploadAttachment'
            );
        }

        $resourcePath = '/ledger/voucher/{voucherId}/attachment';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($voucher_id !== null) {
            $resourcePath = str_replace(
                '{' . 'voucherId' . '}',
                ObjectSerializer::toPathValue($voucher_id),
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
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation ledgerVoucherDelete
     *
     * Delete voucher by ID.
     *
     * @param  int $id Element ID (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function ledgerVoucherDelete($id)
    {
        $this->ledgerVoucherDeleteWithHttpInfo($id);
    }

    /**
     * Operation ledgerVoucherDeleteWithHttpInfo
     *
     * Delete voucher by ID.
     *
     * @param  int $id Element ID (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function ledgerVoucherDeleteWithHttpInfo($id)
    {
        $returnType = '';
        $request = $this->ledgerVoucherDeleteRequest($id);

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
     * Operation ledgerVoucherDeleteAsync
     *
     * Delete voucher by ID.
     *
     * @param  int $id Element ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function ledgerVoucherDeleteAsync($id)
    {
        return $this->ledgerVoucherDeleteAsyncWithHttpInfo($id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation ledgerVoucherDeleteAsyncWithHttpInfo
     *
     * Delete voucher by ID.
     *
     * @param  int $id Element ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function ledgerVoucherDeleteAsyncWithHttpInfo($id)
    {
        $returnType = '';
        $request = $this->ledgerVoucherDeleteRequest($id);

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
     * Create request for operation 'ledgerVoucherDelete'
     *
     * @param  int $id Element ID (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function ledgerVoucherDeleteRequest($id)
    {
        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling ledgerVoucherDelete'
            );
        }

        $resourcePath = '/ledger/voucher/{id}';
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
     * Operation ledgerVoucherExternalVoucherNumberExternalVoucherNumber
     *
     * Find vouchers based on the external voucher number.
     *
     * @param  string $external_voucher_number The external voucher number, when voucher is created from import. (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  int $count Number of elements to return (optional, default to 1000)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ListResponseVoucher
     */
    public function ledgerVoucherExternalVoucherNumberExternalVoucherNumber($external_voucher_number = null, $from = '0', $count = '1000', $sorting = null, $fields = null)
    {
        list($response) = $this->ledgerVoucherExternalVoucherNumberExternalVoucherNumberWithHttpInfo($external_voucher_number, $from, $count, $sorting, $fields);
        return $response;
    }

    /**
     * Operation ledgerVoucherExternalVoucherNumberExternalVoucherNumberWithHttpInfo
     *
     * Find vouchers based on the external voucher number.
     *
     * @param  string $external_voucher_number The external voucher number, when voucher is created from import. (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  int $count Number of elements to return (optional, default to 1000)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ListResponseVoucher, HTTP status code, HTTP response headers (array of strings)
     */
    public function ledgerVoucherExternalVoucherNumberExternalVoucherNumberWithHttpInfo($external_voucher_number = null, $from = '0', $count = '1000', $sorting = null, $fields = null)
    {
        $returnType = '\Swagger\Client\Model\ListResponseVoucher';
        $request = $this->ledgerVoucherExternalVoucherNumberExternalVoucherNumberRequest($external_voucher_number, $from, $count, $sorting, $fields);

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
                        '\Swagger\Client\Model\ListResponseVoucher',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation ledgerVoucherExternalVoucherNumberExternalVoucherNumberAsync
     *
     * Find vouchers based on the external voucher number.
     *
     * @param  string $external_voucher_number The external voucher number, when voucher is created from import. (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  int $count Number of elements to return (optional, default to 1000)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function ledgerVoucherExternalVoucherNumberExternalVoucherNumberAsync($external_voucher_number = null, $from = '0', $count = '1000', $sorting = null, $fields = null)
    {
        return $this->ledgerVoucherExternalVoucherNumberExternalVoucherNumberAsyncWithHttpInfo($external_voucher_number, $from, $count, $sorting, $fields)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation ledgerVoucherExternalVoucherNumberExternalVoucherNumberAsyncWithHttpInfo
     *
     * Find vouchers based on the external voucher number.
     *
     * @param  string $external_voucher_number The external voucher number, when voucher is created from import. (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  int $count Number of elements to return (optional, default to 1000)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function ledgerVoucherExternalVoucherNumberExternalVoucherNumberAsyncWithHttpInfo($external_voucher_number = null, $from = '0', $count = '1000', $sorting = null, $fields = null)
    {
        $returnType = '\Swagger\Client\Model\ListResponseVoucher';
        $request = $this->ledgerVoucherExternalVoucherNumberExternalVoucherNumberRequest($external_voucher_number, $from, $count, $sorting, $fields);

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
     * Create request for operation 'ledgerVoucherExternalVoucherNumberExternalVoucherNumber'
     *
     * @param  string $external_voucher_number The external voucher number, when voucher is created from import. (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  int $count Number of elements to return (optional, default to 1000)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function ledgerVoucherExternalVoucherNumberExternalVoucherNumberRequest($external_voucher_number = null, $from = '0', $count = '1000', $sorting = null, $fields = null)
    {

        $resourcePath = '/ledger/voucher/>externalVoucherNumber';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($external_voucher_number !== null) {
            $queryParams['externalVoucherNumber'] = ObjectSerializer::toQueryValue($external_voucher_number);
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
     * Operation ledgerVoucherGet
     *
     * Get voucher by ID.
     *
     * @param  int $id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ResponseWrapperVoucher
     */
    public function ledgerVoucherGet($id, $fields = null)
    {
        list($response) = $this->ledgerVoucherGetWithHttpInfo($id, $fields);
        return $response;
    }

    /**
     * Operation ledgerVoucherGetWithHttpInfo
     *
     * Get voucher by ID.
     *
     * @param  int $id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ResponseWrapperVoucher, HTTP status code, HTTP response headers (array of strings)
     */
    public function ledgerVoucherGetWithHttpInfo($id, $fields = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperVoucher';
        $request = $this->ledgerVoucherGetRequest($id, $fields);

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
                        '\Swagger\Client\Model\ResponseWrapperVoucher',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation ledgerVoucherGetAsync
     *
     * Get voucher by ID.
     *
     * @param  int $id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function ledgerVoucherGetAsync($id, $fields = null)
    {
        return $this->ledgerVoucherGetAsyncWithHttpInfo($id, $fields)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation ledgerVoucherGetAsyncWithHttpInfo
     *
     * Get voucher by ID.
     *
     * @param  int $id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function ledgerVoucherGetAsyncWithHttpInfo($id, $fields = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperVoucher';
        $request = $this->ledgerVoucherGetRequest($id, $fields);

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
     * Create request for operation 'ledgerVoucherGet'
     *
     * @param  int $id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function ledgerVoucherGetRequest($id, $fields = null)
    {
        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling ledgerVoucherGet'
            );
        }

        $resourcePath = '/ledger/voucher/{id}';
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
     * Operation ledgerVoucherImportDocumentImportDocument
     *
     * Upload a document to create one or more vouchers. Valid document formats are PDF, PNG, JPEG, TIFF and EHF. Send as multipart form.
     *
     * @param  \SplFileObject $file The file (required)
     * @param  string $description Optional description to use for the voucher(s). If omitted the file name will be used. (optional)
     * @param  bool $split If the document consists of several pages, should the document be split into one voucher per page? (optional, default to false)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ListResponseVoucher
     */
    public function ledgerVoucherImportDocumentImportDocument($file, $description = null, $split = 'false')
    {
        list($response) = $this->ledgerVoucherImportDocumentImportDocumentWithHttpInfo($file, $description, $split);
        return $response;
    }

    /**
     * Operation ledgerVoucherImportDocumentImportDocumentWithHttpInfo
     *
     * Upload a document to create one or more vouchers. Valid document formats are PDF, PNG, JPEG, TIFF and EHF. Send as multipart form.
     *
     * @param  \SplFileObject $file The file (required)
     * @param  string $description Optional description to use for the voucher(s). If omitted the file name will be used. (optional)
     * @param  bool $split If the document consists of several pages, should the document be split into one voucher per page? (optional, default to false)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ListResponseVoucher, HTTP status code, HTTP response headers (array of strings)
     */
    public function ledgerVoucherImportDocumentImportDocumentWithHttpInfo($file, $description = null, $split = 'false')
    {
        $returnType = '\Swagger\Client\Model\ListResponseVoucher';
        $request = $this->ledgerVoucherImportDocumentImportDocumentRequest($file, $description, $split);

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
                        '\Swagger\Client\Model\ListResponseVoucher',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation ledgerVoucherImportDocumentImportDocumentAsync
     *
     * Upload a document to create one or more vouchers. Valid document formats are PDF, PNG, JPEG, TIFF and EHF. Send as multipart form.
     *
     * @param  \SplFileObject $file The file (required)
     * @param  string $description Optional description to use for the voucher(s). If omitted the file name will be used. (optional)
     * @param  bool $split If the document consists of several pages, should the document be split into one voucher per page? (optional, default to false)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function ledgerVoucherImportDocumentImportDocumentAsync($file, $description = null, $split = 'false')
    {
        return $this->ledgerVoucherImportDocumentImportDocumentAsyncWithHttpInfo($file, $description, $split)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation ledgerVoucherImportDocumentImportDocumentAsyncWithHttpInfo
     *
     * Upload a document to create one or more vouchers. Valid document formats are PDF, PNG, JPEG, TIFF and EHF. Send as multipart form.
     *
     * @param  \SplFileObject $file The file (required)
     * @param  string $description Optional description to use for the voucher(s). If omitted the file name will be used. (optional)
     * @param  bool $split If the document consists of several pages, should the document be split into one voucher per page? (optional, default to false)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function ledgerVoucherImportDocumentImportDocumentAsyncWithHttpInfo($file, $description = null, $split = 'false')
    {
        $returnType = '\Swagger\Client\Model\ListResponseVoucher';
        $request = $this->ledgerVoucherImportDocumentImportDocumentRequest($file, $description, $split);

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
     * Create request for operation 'ledgerVoucherImportDocumentImportDocument'
     *
     * @param  \SplFileObject $file The file (required)
     * @param  string $description Optional description to use for the voucher(s). If omitted the file name will be used. (optional)
     * @param  bool $split If the document consists of several pages, should the document be split into one voucher per page? (optional, default to false)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function ledgerVoucherImportDocumentImportDocumentRequest($file, $description = null, $split = 'false')
    {
        // verify the required parameter 'file' is set
        if ($file === null || (is_array($file) && count($file) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $file when calling ledgerVoucherImportDocumentImportDocument'
            );
        }

        $resourcePath = '/ledger/voucher/importDocument';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($split !== null) {
            $queryParams['split'] = ObjectSerializer::toQueryValue($split);
        }


        // form params
        if ($file !== null) {
            $multipart = true;
            $formParams['file'] = \GuzzleHttp\Psr7\try_fopen(ObjectSerializer::toFormValue($file), 'rb');
        }
        // form params
        if ($description !== null) {
            $formParams['description'] = ObjectSerializer::toFormValue($description);
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
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation ledgerVoucherImportGbat10ImportGbat10
     *
     * Import GBAT10. Send as multipart form.
     *
     * @param  bool $generate_vat_postings If the import should generate VAT postings (required)
     * @param  \SplFileObject $file The file (required)
     * @param  string $encoding The file encoding (optional, default to utf-8)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function ledgerVoucherImportGbat10ImportGbat10($generate_vat_postings, $file, $encoding = 'utf-8')
    {
        $this->ledgerVoucherImportGbat10ImportGbat10WithHttpInfo($generate_vat_postings, $file, $encoding);
    }

    /**
     * Operation ledgerVoucherImportGbat10ImportGbat10WithHttpInfo
     *
     * Import GBAT10. Send as multipart form.
     *
     * @param  bool $generate_vat_postings If the import should generate VAT postings (required)
     * @param  \SplFileObject $file The file (required)
     * @param  string $encoding The file encoding (optional, default to utf-8)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function ledgerVoucherImportGbat10ImportGbat10WithHttpInfo($generate_vat_postings, $file, $encoding = 'utf-8')
    {
        $returnType = '';
        $request = $this->ledgerVoucherImportGbat10ImportGbat10Request($generate_vat_postings, $file, $encoding);

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
     * Operation ledgerVoucherImportGbat10ImportGbat10Async
     *
     * Import GBAT10. Send as multipart form.
     *
     * @param  bool $generate_vat_postings If the import should generate VAT postings (required)
     * @param  \SplFileObject $file The file (required)
     * @param  string $encoding The file encoding (optional, default to utf-8)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function ledgerVoucherImportGbat10ImportGbat10Async($generate_vat_postings, $file, $encoding = 'utf-8')
    {
        return $this->ledgerVoucherImportGbat10ImportGbat10AsyncWithHttpInfo($generate_vat_postings, $file, $encoding)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation ledgerVoucherImportGbat10ImportGbat10AsyncWithHttpInfo
     *
     * Import GBAT10. Send as multipart form.
     *
     * @param  bool $generate_vat_postings If the import should generate VAT postings (required)
     * @param  \SplFileObject $file The file (required)
     * @param  string $encoding The file encoding (optional, default to utf-8)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function ledgerVoucherImportGbat10ImportGbat10AsyncWithHttpInfo($generate_vat_postings, $file, $encoding = 'utf-8')
    {
        $returnType = '';
        $request = $this->ledgerVoucherImportGbat10ImportGbat10Request($generate_vat_postings, $file, $encoding);

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
     * Create request for operation 'ledgerVoucherImportGbat10ImportGbat10'
     *
     * @param  bool $generate_vat_postings If the import should generate VAT postings (required)
     * @param  \SplFileObject $file The file (required)
     * @param  string $encoding The file encoding (optional, default to utf-8)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function ledgerVoucherImportGbat10ImportGbat10Request($generate_vat_postings, $file, $encoding = 'utf-8')
    {
        // verify the required parameter 'generate_vat_postings' is set
        if ($generate_vat_postings === null || (is_array($generate_vat_postings) && count($generate_vat_postings) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $generate_vat_postings when calling ledgerVoucherImportGbat10ImportGbat10'
            );
        }
        // verify the required parameter 'file' is set
        if ($file === null || (is_array($file) && count($file) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $file when calling ledgerVoucherImportGbat10ImportGbat10'
            );
        }

        $resourcePath = '/ledger/voucher/importGbat10';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // form params
        if ($generate_vat_postings !== null) {
            $formParams['generateVatPostings'] = ObjectSerializer::toFormValue($generate_vat_postings);
        }
        // form params
        if ($file !== null) {
            $multipart = true;
            $formParams['file'] = \GuzzleHttp\Psr7\try_fopen(ObjectSerializer::toFormValue($file), 'rb');
        }
        // form params
        if ($encoding !== null) {
            $formParams['encoding'] = ObjectSerializer::toFormValue($encoding);
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
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation ledgerVoucherListPutList
     *
     * Update multiple vouchers. Postings with guiRow==0 will be deleted and regenerated.
     *
     * @param  bool $send_to_ledger Should the voucher be sent to ledger? Requires the \&quot;Advanced Voucher\&quot; permission. (optional, default to true)
     * @param  \Swagger\Client\Model\Voucher[] $body JSON representing updates to objects. Should have ID and version set. (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ListResponseVoucher
     */
    public function ledgerVoucherListPutList($send_to_ledger = 'true', $body = null)
    {
        list($response) = $this->ledgerVoucherListPutListWithHttpInfo($send_to_ledger, $body);
        return $response;
    }

    /**
     * Operation ledgerVoucherListPutListWithHttpInfo
     *
     * Update multiple vouchers. Postings with guiRow==0 will be deleted and regenerated.
     *
     * @param  bool $send_to_ledger Should the voucher be sent to ledger? Requires the \&quot;Advanced Voucher\&quot; permission. (optional, default to true)
     * @param  \Swagger\Client\Model\Voucher[] $body JSON representing updates to objects. Should have ID and version set. (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ListResponseVoucher, HTTP status code, HTTP response headers (array of strings)
     */
    public function ledgerVoucherListPutListWithHttpInfo($send_to_ledger = 'true', $body = null)
    {
        $returnType = '\Swagger\Client\Model\ListResponseVoucher';
        $request = $this->ledgerVoucherListPutListRequest($send_to_ledger, $body);

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
                        '\Swagger\Client\Model\ListResponseVoucher',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation ledgerVoucherListPutListAsync
     *
     * Update multiple vouchers. Postings with guiRow==0 will be deleted and regenerated.
     *
     * @param  bool $send_to_ledger Should the voucher be sent to ledger? Requires the \&quot;Advanced Voucher\&quot; permission. (optional, default to true)
     * @param  \Swagger\Client\Model\Voucher[] $body JSON representing updates to objects. Should have ID and version set. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function ledgerVoucherListPutListAsync($send_to_ledger = 'true', $body = null)
    {
        return $this->ledgerVoucherListPutListAsyncWithHttpInfo($send_to_ledger, $body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation ledgerVoucherListPutListAsyncWithHttpInfo
     *
     * Update multiple vouchers. Postings with guiRow==0 will be deleted and regenerated.
     *
     * @param  bool $send_to_ledger Should the voucher be sent to ledger? Requires the \&quot;Advanced Voucher\&quot; permission. (optional, default to true)
     * @param  \Swagger\Client\Model\Voucher[] $body JSON representing updates to objects. Should have ID and version set. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function ledgerVoucherListPutListAsyncWithHttpInfo($send_to_ledger = 'true', $body = null)
    {
        $returnType = '\Swagger\Client\Model\ListResponseVoucher';
        $request = $this->ledgerVoucherListPutListRequest($send_to_ledger, $body);

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
     * Create request for operation 'ledgerVoucherListPutList'
     *
     * @param  bool $send_to_ledger Should the voucher be sent to ledger? Requires the \&quot;Advanced Voucher\&quot; permission. (optional, default to true)
     * @param  \Swagger\Client\Model\Voucher[] $body JSON representing updates to objects. Should have ID and version set. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function ledgerVoucherListPutListRequest($send_to_ledger = 'true', $body = null)
    {

        $resourcePath = '/ledger/voucher/list';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($send_to_ledger !== null) {
            $queryParams['sendToLedger'] = ObjectSerializer::toQueryValue($send_to_ledger);
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
     * Operation ledgerVoucherNonPostedNonPosted
     *
     * Find non-posted vouchers.
     *
     * @param  bool $include_non_approved Include non-approved vouchers in the result. (required)
     * @param  string $date_from From and including (optional)
     * @param  string $date_to To and excluding (optional)
     * @param  string $changed_since Only return elements that have changed since this date and time (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  int $count Number of elements to return (optional, default to 1000)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ListResponseVoucher
     */
    public function ledgerVoucherNonPostedNonPosted($include_non_approved, $date_from = null, $date_to = null, $changed_since = null, $from = '0', $count = '1000', $sorting = null, $fields = null)
    {
        list($response) = $this->ledgerVoucherNonPostedNonPostedWithHttpInfo($include_non_approved, $date_from, $date_to, $changed_since, $from, $count, $sorting, $fields);
        return $response;
    }

    /**
     * Operation ledgerVoucherNonPostedNonPostedWithHttpInfo
     *
     * Find non-posted vouchers.
     *
     * @param  bool $include_non_approved Include non-approved vouchers in the result. (required)
     * @param  string $date_from From and including (optional)
     * @param  string $date_to To and excluding (optional)
     * @param  string $changed_since Only return elements that have changed since this date and time (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  int $count Number of elements to return (optional, default to 1000)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ListResponseVoucher, HTTP status code, HTTP response headers (array of strings)
     */
    public function ledgerVoucherNonPostedNonPostedWithHttpInfo($include_non_approved, $date_from = null, $date_to = null, $changed_since = null, $from = '0', $count = '1000', $sorting = null, $fields = null)
    {
        $returnType = '\Swagger\Client\Model\ListResponseVoucher';
        $request = $this->ledgerVoucherNonPostedNonPostedRequest($include_non_approved, $date_from, $date_to, $changed_since, $from, $count, $sorting, $fields);

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
                        '\Swagger\Client\Model\ListResponseVoucher',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation ledgerVoucherNonPostedNonPostedAsync
     *
     * Find non-posted vouchers.
     *
     * @param  bool $include_non_approved Include non-approved vouchers in the result. (required)
     * @param  string $date_from From and including (optional)
     * @param  string $date_to To and excluding (optional)
     * @param  string $changed_since Only return elements that have changed since this date and time (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  int $count Number of elements to return (optional, default to 1000)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function ledgerVoucherNonPostedNonPostedAsync($include_non_approved, $date_from = null, $date_to = null, $changed_since = null, $from = '0', $count = '1000', $sorting = null, $fields = null)
    {
        return $this->ledgerVoucherNonPostedNonPostedAsyncWithHttpInfo($include_non_approved, $date_from, $date_to, $changed_since, $from, $count, $sorting, $fields)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation ledgerVoucherNonPostedNonPostedAsyncWithHttpInfo
     *
     * Find non-posted vouchers.
     *
     * @param  bool $include_non_approved Include non-approved vouchers in the result. (required)
     * @param  string $date_from From and including (optional)
     * @param  string $date_to To and excluding (optional)
     * @param  string $changed_since Only return elements that have changed since this date and time (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  int $count Number of elements to return (optional, default to 1000)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function ledgerVoucherNonPostedNonPostedAsyncWithHttpInfo($include_non_approved, $date_from = null, $date_to = null, $changed_since = null, $from = '0', $count = '1000', $sorting = null, $fields = null)
    {
        $returnType = '\Swagger\Client\Model\ListResponseVoucher';
        $request = $this->ledgerVoucherNonPostedNonPostedRequest($include_non_approved, $date_from, $date_to, $changed_since, $from, $count, $sorting, $fields);

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
     * Create request for operation 'ledgerVoucherNonPostedNonPosted'
     *
     * @param  bool $include_non_approved Include non-approved vouchers in the result. (required)
     * @param  string $date_from From and including (optional)
     * @param  string $date_to To and excluding (optional)
     * @param  string $changed_since Only return elements that have changed since this date and time (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  int $count Number of elements to return (optional, default to 1000)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function ledgerVoucherNonPostedNonPostedRequest($include_non_approved, $date_from = null, $date_to = null, $changed_since = null, $from = '0', $count = '1000', $sorting = null, $fields = null)
    {
        // verify the required parameter 'include_non_approved' is set
        if ($include_non_approved === null || (is_array($include_non_approved) && count($include_non_approved) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $include_non_approved when calling ledgerVoucherNonPostedNonPosted'
            );
        }

        $resourcePath = '/ledger/voucher/>nonPosted';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($date_from !== null) {
            $queryParams['dateFrom'] = ObjectSerializer::toQueryValue($date_from);
        }
        // query params
        if ($date_to !== null) {
            $queryParams['dateTo'] = ObjectSerializer::toQueryValue($date_to);
        }
        // query params
        if ($include_non_approved !== null) {
            $queryParams['includeNonApproved'] = ObjectSerializer::toQueryValue($include_non_approved);
        }
        // query params
        if ($changed_since !== null) {
            $queryParams['changedSince'] = ObjectSerializer::toQueryValue($changed_since);
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
     * Operation ledgerVoucherOptionsOptions
     *
     * Returns a data structure containing meta information about operations that are available for this voucher. Currently only implemented for DELETE: It is possible to check if the voucher is deletable.
     *
     * @param  int $id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ResponseWrapperVoucherOptions
     */
    public function ledgerVoucherOptionsOptions($id, $fields = null)
    {
        list($response) = $this->ledgerVoucherOptionsOptionsWithHttpInfo($id, $fields);
        return $response;
    }

    /**
     * Operation ledgerVoucherOptionsOptionsWithHttpInfo
     *
     * Returns a data structure containing meta information about operations that are available for this voucher. Currently only implemented for DELETE: It is possible to check if the voucher is deletable.
     *
     * @param  int $id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ResponseWrapperVoucherOptions, HTTP status code, HTTP response headers (array of strings)
     */
    public function ledgerVoucherOptionsOptionsWithHttpInfo($id, $fields = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperVoucherOptions';
        $request = $this->ledgerVoucherOptionsOptionsRequest($id, $fields);

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
                        '\Swagger\Client\Model\ResponseWrapperVoucherOptions',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation ledgerVoucherOptionsOptionsAsync
     *
     * Returns a data structure containing meta information about operations that are available for this voucher. Currently only implemented for DELETE: It is possible to check if the voucher is deletable.
     *
     * @param  int $id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function ledgerVoucherOptionsOptionsAsync($id, $fields = null)
    {
        return $this->ledgerVoucherOptionsOptionsAsyncWithHttpInfo($id, $fields)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation ledgerVoucherOptionsOptionsAsyncWithHttpInfo
     *
     * Returns a data structure containing meta information about operations that are available for this voucher. Currently only implemented for DELETE: It is possible to check if the voucher is deletable.
     *
     * @param  int $id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function ledgerVoucherOptionsOptionsAsyncWithHttpInfo($id, $fields = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperVoucherOptions';
        $request = $this->ledgerVoucherOptionsOptionsRequest($id, $fields);

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
     * Create request for operation 'ledgerVoucherOptionsOptions'
     *
     * @param  int $id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function ledgerVoucherOptionsOptionsRequest($id, $fields = null)
    {
        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling ledgerVoucherOptionsOptions'
            );
        }

        $resourcePath = '/ledger/voucher/{id}/options';
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
     * Operation ledgerVoucherPdfDownloadPdf
     *
     * Get PDF representation of voucher by ID.
     *
     * @param  int $voucher_id Voucher ID from which PDF is downloaded. (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return string
     */
    public function ledgerVoucherPdfDownloadPdf($voucher_id)
    {
        list($response) = $this->ledgerVoucherPdfDownloadPdfWithHttpInfo($voucher_id);
        return $response;
    }

    /**
     * Operation ledgerVoucherPdfDownloadPdfWithHttpInfo
     *
     * Get PDF representation of voucher by ID.
     *
     * @param  int $voucher_id Voucher ID from which PDF is downloaded. (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of string, HTTP status code, HTTP response headers (array of strings)
     */
    public function ledgerVoucherPdfDownloadPdfWithHttpInfo($voucher_id)
    {
        $returnType = 'string';
        $request = $this->ledgerVoucherPdfDownloadPdfRequest($voucher_id);

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
     * Operation ledgerVoucherPdfDownloadPdfAsync
     *
     * Get PDF representation of voucher by ID.
     *
     * @param  int $voucher_id Voucher ID from which PDF is downloaded. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function ledgerVoucherPdfDownloadPdfAsync($voucher_id)
    {
        return $this->ledgerVoucherPdfDownloadPdfAsyncWithHttpInfo($voucher_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation ledgerVoucherPdfDownloadPdfAsyncWithHttpInfo
     *
     * Get PDF representation of voucher by ID.
     *
     * @param  int $voucher_id Voucher ID from which PDF is downloaded. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function ledgerVoucherPdfDownloadPdfAsyncWithHttpInfo($voucher_id)
    {
        $returnType = 'string';
        $request = $this->ledgerVoucherPdfDownloadPdfRequest($voucher_id);

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
     * Create request for operation 'ledgerVoucherPdfDownloadPdf'
     *
     * @param  int $voucher_id Voucher ID from which PDF is downloaded. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function ledgerVoucherPdfDownloadPdfRequest($voucher_id)
    {
        // verify the required parameter 'voucher_id' is set
        if ($voucher_id === null || (is_array($voucher_id) && count($voucher_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $voucher_id when calling ledgerVoucherPdfDownloadPdf'
            );
        }

        $resourcePath = '/ledger/voucher/{voucherId}/pdf';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($voucher_id !== null) {
            $resourcePath = str_replace(
                '{' . 'voucherId' . '}',
                ObjectSerializer::toPathValue($voucher_id),
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
     * Operation ledgerVoucherPdfUploadPdf
     *
     * [DEPRECATED] Use POST ledger/voucher/{voucherId}/attachment instead.
     *
     * @param  int $voucher_id Voucher ID to upload PDF to. (required)
     * @param  string $file_name File name to store the pdf under. Will not be the same as the filename on the file returned. (required)
     * @param  \SplFileObject $file The file (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function ledgerVoucherPdfUploadPdf($voucher_id, $file_name, $file)
    {
        $this->ledgerVoucherPdfUploadPdfWithHttpInfo($voucher_id, $file_name, $file);
    }

    /**
     * Operation ledgerVoucherPdfUploadPdfWithHttpInfo
     *
     * [DEPRECATED] Use POST ledger/voucher/{voucherId}/attachment instead.
     *
     * @param  int $voucher_id Voucher ID to upload PDF to. (required)
     * @param  string $file_name File name to store the pdf under. Will not be the same as the filename on the file returned. (required)
     * @param  \SplFileObject $file The file (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function ledgerVoucherPdfUploadPdfWithHttpInfo($voucher_id, $file_name, $file)
    {
        $returnType = '';
        $request = $this->ledgerVoucherPdfUploadPdfRequest($voucher_id, $file_name, $file);

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
     * Operation ledgerVoucherPdfUploadPdfAsync
     *
     * [DEPRECATED] Use POST ledger/voucher/{voucherId}/attachment instead.
     *
     * @param  int $voucher_id Voucher ID to upload PDF to. (required)
     * @param  string $file_name File name to store the pdf under. Will not be the same as the filename on the file returned. (required)
     * @param  \SplFileObject $file The file (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function ledgerVoucherPdfUploadPdfAsync($voucher_id, $file_name, $file)
    {
        return $this->ledgerVoucherPdfUploadPdfAsyncWithHttpInfo($voucher_id, $file_name, $file)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation ledgerVoucherPdfUploadPdfAsyncWithHttpInfo
     *
     * [DEPRECATED] Use POST ledger/voucher/{voucherId}/attachment instead.
     *
     * @param  int $voucher_id Voucher ID to upload PDF to. (required)
     * @param  string $file_name File name to store the pdf under. Will not be the same as the filename on the file returned. (required)
     * @param  \SplFileObject $file The file (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function ledgerVoucherPdfUploadPdfAsyncWithHttpInfo($voucher_id, $file_name, $file)
    {
        $returnType = '';
        $request = $this->ledgerVoucherPdfUploadPdfRequest($voucher_id, $file_name, $file);

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
     * Create request for operation 'ledgerVoucherPdfUploadPdf'
     *
     * @param  int $voucher_id Voucher ID to upload PDF to. (required)
     * @param  string $file_name File name to store the pdf under. Will not be the same as the filename on the file returned. (required)
     * @param  \SplFileObject $file The file (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function ledgerVoucherPdfUploadPdfRequest($voucher_id, $file_name, $file)
    {
        // verify the required parameter 'voucher_id' is set
        if ($voucher_id === null || (is_array($voucher_id) && count($voucher_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $voucher_id when calling ledgerVoucherPdfUploadPdf'
            );
        }
        // verify the required parameter 'file_name' is set
        if ($file_name === null || (is_array($file_name) && count($file_name) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $file_name when calling ledgerVoucherPdfUploadPdf'
            );
        }
        // verify the required parameter 'file' is set
        if ($file === null || (is_array($file) && count($file) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $file when calling ledgerVoucherPdfUploadPdf'
            );
        }

        $resourcePath = '/ledger/voucher/{voucherId}/pdf/{fileName}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($voucher_id !== null) {
            $resourcePath = str_replace(
                '{' . 'voucherId' . '}',
                ObjectSerializer::toPathValue($voucher_id),
                $resourcePath
            );
        }
        // path params
        if ($file_name !== null) {
            $resourcePath = str_replace(
                '{' . 'fileName' . '}',
                ObjectSerializer::toPathValue($file_name),
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
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation ledgerVoucherPost
     *
     * Add new voucher. IMPORTANT: Also creates postings. Only the gross amounts will be used
     *
     * @param  bool $send_to_ledger Should the voucher be sent to ledger? Requires the \&quot;Advanced Voucher\&quot; permission. (optional, default to true)
     * @param  \Swagger\Client\Model\Voucher $body JSON representing the new object to be created. Should not have ID and version set. (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ResponseWrapperVoucher
     */
    public function ledgerVoucherPost($send_to_ledger = 'true', $body = null)
    {
        list($response) = $this->ledgerVoucherPostWithHttpInfo($send_to_ledger, $body);
        return $response;
    }

    /**
     * Operation ledgerVoucherPostWithHttpInfo
     *
     * Add new voucher. IMPORTANT: Also creates postings. Only the gross amounts will be used
     *
     * @param  bool $send_to_ledger Should the voucher be sent to ledger? Requires the \&quot;Advanced Voucher\&quot; permission. (optional, default to true)
     * @param  \Swagger\Client\Model\Voucher $body JSON representing the new object to be created. Should not have ID and version set. (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ResponseWrapperVoucher, HTTP status code, HTTP response headers (array of strings)
     */
    public function ledgerVoucherPostWithHttpInfo($send_to_ledger = 'true', $body = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperVoucher';
        $request = $this->ledgerVoucherPostRequest($send_to_ledger, $body);

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
                        '\Swagger\Client\Model\ResponseWrapperVoucher',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation ledgerVoucherPostAsync
     *
     * Add new voucher. IMPORTANT: Also creates postings. Only the gross amounts will be used
     *
     * @param  bool $send_to_ledger Should the voucher be sent to ledger? Requires the \&quot;Advanced Voucher\&quot; permission. (optional, default to true)
     * @param  \Swagger\Client\Model\Voucher $body JSON representing the new object to be created. Should not have ID and version set. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function ledgerVoucherPostAsync($send_to_ledger = 'true', $body = null)
    {
        return $this->ledgerVoucherPostAsyncWithHttpInfo($send_to_ledger, $body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation ledgerVoucherPostAsyncWithHttpInfo
     *
     * Add new voucher. IMPORTANT: Also creates postings. Only the gross amounts will be used
     *
     * @param  bool $send_to_ledger Should the voucher be sent to ledger? Requires the \&quot;Advanced Voucher\&quot; permission. (optional, default to true)
     * @param  \Swagger\Client\Model\Voucher $body JSON representing the new object to be created. Should not have ID and version set. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function ledgerVoucherPostAsyncWithHttpInfo($send_to_ledger = 'true', $body = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperVoucher';
        $request = $this->ledgerVoucherPostRequest($send_to_ledger, $body);

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
     * Create request for operation 'ledgerVoucherPost'
     *
     * @param  bool $send_to_ledger Should the voucher be sent to ledger? Requires the \&quot;Advanced Voucher\&quot; permission. (optional, default to true)
     * @param  \Swagger\Client\Model\Voucher $body JSON representing the new object to be created. Should not have ID and version set. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function ledgerVoucherPostRequest($send_to_ledger = 'true', $body = null)
    {

        $resourcePath = '/ledger/voucher';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($send_to_ledger !== null) {
            $queryParams['sendToLedger'] = ObjectSerializer::toQueryValue($send_to_ledger);
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
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation ledgerVoucherPut
     *
     * Update voucher. Postings with guiRow==0 will be deleted and regenerated.
     *
     * @param  int $id Element ID (required)
     * @param  bool $send_to_ledger Should the voucher be sent to ledger? Requires the \&quot;Advanced Voucher\&quot; permission. (optional, default to true)
     * @param  \Swagger\Client\Model\Voucher $body Partial object describing what should be updated (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ResponseWrapperVoucher
     */
    public function ledgerVoucherPut($id, $send_to_ledger = 'true', $body = null)
    {
        list($response) = $this->ledgerVoucherPutWithHttpInfo($id, $send_to_ledger, $body);
        return $response;
    }

    /**
     * Operation ledgerVoucherPutWithHttpInfo
     *
     * Update voucher. Postings with guiRow==0 will be deleted and regenerated.
     *
     * @param  int $id Element ID (required)
     * @param  bool $send_to_ledger Should the voucher be sent to ledger? Requires the \&quot;Advanced Voucher\&quot; permission. (optional, default to true)
     * @param  \Swagger\Client\Model\Voucher $body Partial object describing what should be updated (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ResponseWrapperVoucher, HTTP status code, HTTP response headers (array of strings)
     */
    public function ledgerVoucherPutWithHttpInfo($id, $send_to_ledger = 'true', $body = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperVoucher';
        $request = $this->ledgerVoucherPutRequest($id, $send_to_ledger, $body);

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
                        '\Swagger\Client\Model\ResponseWrapperVoucher',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation ledgerVoucherPutAsync
     *
     * Update voucher. Postings with guiRow==0 will be deleted and regenerated.
     *
     * @param  int $id Element ID (required)
     * @param  bool $send_to_ledger Should the voucher be sent to ledger? Requires the \&quot;Advanced Voucher\&quot; permission. (optional, default to true)
     * @param  \Swagger\Client\Model\Voucher $body Partial object describing what should be updated (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function ledgerVoucherPutAsync($id, $send_to_ledger = 'true', $body = null)
    {
        return $this->ledgerVoucherPutAsyncWithHttpInfo($id, $send_to_ledger, $body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation ledgerVoucherPutAsyncWithHttpInfo
     *
     * Update voucher. Postings with guiRow==0 will be deleted and regenerated.
     *
     * @param  int $id Element ID (required)
     * @param  bool $send_to_ledger Should the voucher be sent to ledger? Requires the \&quot;Advanced Voucher\&quot; permission. (optional, default to true)
     * @param  \Swagger\Client\Model\Voucher $body Partial object describing what should be updated (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function ledgerVoucherPutAsyncWithHttpInfo($id, $send_to_ledger = 'true', $body = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperVoucher';
        $request = $this->ledgerVoucherPutRequest($id, $send_to_ledger, $body);

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
     * Create request for operation 'ledgerVoucherPut'
     *
     * @param  int $id Element ID (required)
     * @param  bool $send_to_ledger Should the voucher be sent to ledger? Requires the \&quot;Advanced Voucher\&quot; permission. (optional, default to true)
     * @param  \Swagger\Client\Model\Voucher $body Partial object describing what should be updated (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function ledgerVoucherPutRequest($id, $send_to_ledger = 'true', $body = null)
    {
        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling ledgerVoucherPut'
            );
        }

        $resourcePath = '/ledger/voucher/{id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($send_to_ledger !== null) {
            $queryParams['sendToLedger'] = ObjectSerializer::toQueryValue($send_to_ledger);
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
     * Operation ledgerVoucherReverseReverse
     *
     * Reverses the voucher, and returns the reversed voucher. Supports reversing most voucher types, except salary transactions.
     *
     * @param  int $id ID of voucher that should be reversed. (required)
     * @param  string $date Reverse voucher date (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ResponseWrapperVoucher
     */
    public function ledgerVoucherReverseReverse($id, $date)
    {
        list($response) = $this->ledgerVoucherReverseReverseWithHttpInfo($id, $date);
        return $response;
    }

    /**
     * Operation ledgerVoucherReverseReverseWithHttpInfo
     *
     * Reverses the voucher, and returns the reversed voucher. Supports reversing most voucher types, except salary transactions.
     *
     * @param  int $id ID of voucher that should be reversed. (required)
     * @param  string $date Reverse voucher date (required)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ResponseWrapperVoucher, HTTP status code, HTTP response headers (array of strings)
     */
    public function ledgerVoucherReverseReverseWithHttpInfo($id, $date)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperVoucher';
        $request = $this->ledgerVoucherReverseReverseRequest($id, $date);

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
                        '\Swagger\Client\Model\ResponseWrapperVoucher',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation ledgerVoucherReverseReverseAsync
     *
     * Reverses the voucher, and returns the reversed voucher. Supports reversing most voucher types, except salary transactions.
     *
     * @param  int $id ID of voucher that should be reversed. (required)
     * @param  string $date Reverse voucher date (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function ledgerVoucherReverseReverseAsync($id, $date)
    {
        return $this->ledgerVoucherReverseReverseAsyncWithHttpInfo($id, $date)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation ledgerVoucherReverseReverseAsyncWithHttpInfo
     *
     * Reverses the voucher, and returns the reversed voucher. Supports reversing most voucher types, except salary transactions.
     *
     * @param  int $id ID of voucher that should be reversed. (required)
     * @param  string $date Reverse voucher date (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function ledgerVoucherReverseReverseAsyncWithHttpInfo($id, $date)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperVoucher';
        $request = $this->ledgerVoucherReverseReverseRequest($id, $date);

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
     * Create request for operation 'ledgerVoucherReverseReverse'
     *
     * @param  int $id ID of voucher that should be reversed. (required)
     * @param  string $date Reverse voucher date (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function ledgerVoucherReverseReverseRequest($id, $date)
    {
        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling ledgerVoucherReverseReverse'
            );
        }
        // verify the required parameter 'date' is set
        if ($date === null || (is_array($date) && count($date) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $date when calling ledgerVoucherReverseReverse'
            );
        }

        $resourcePath = '/ledger/voucher/{id}/:reverse';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($date !== null) {
            $queryParams['date'] = ObjectSerializer::toQueryValue($date);
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
     * Operation ledgerVoucherSearch
     *
     * Find vouchers corresponding with sent data.
     *
     * @param  string $date_from From and including (required)
     * @param  string $date_to To and excluding (required)
     * @param  string $id List of IDs (optional)
     * @param  string $number List of IDs (optional)
     * @param  int $number_from From and including (optional)
     * @param  int $number_to To and excluding (optional)
     * @param  string $type_id List of IDs (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  int $count Number of elements to return (optional, default to 1000)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\VoucherSearchResponse
     */
    public function ledgerVoucherSearch($date_from, $date_to, $id = null, $number = null, $number_from = null, $number_to = null, $type_id = null, $from = '0', $count = '1000', $sorting = null, $fields = null)
    {
        list($response) = $this->ledgerVoucherSearchWithHttpInfo($date_from, $date_to, $id, $number, $number_from, $number_to, $type_id, $from, $count, $sorting, $fields);
        return $response;
    }

    /**
     * Operation ledgerVoucherSearchWithHttpInfo
     *
     * Find vouchers corresponding with sent data.
     *
     * @param  string $date_from From and including (required)
     * @param  string $date_to To and excluding (required)
     * @param  string $id List of IDs (optional)
     * @param  string $number List of IDs (optional)
     * @param  int $number_from From and including (optional)
     * @param  int $number_to To and excluding (optional)
     * @param  string $type_id List of IDs (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  int $count Number of elements to return (optional, default to 1000)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\VoucherSearchResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function ledgerVoucherSearchWithHttpInfo($date_from, $date_to, $id = null, $number = null, $number_from = null, $number_to = null, $type_id = null, $from = '0', $count = '1000', $sorting = null, $fields = null)
    {
        $returnType = '\Swagger\Client\Model\VoucherSearchResponse';
        $request = $this->ledgerVoucherSearchRequest($date_from, $date_to, $id, $number, $number_from, $number_to, $type_id, $from, $count, $sorting, $fields);

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
                        '\Swagger\Client\Model\VoucherSearchResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation ledgerVoucherSearchAsync
     *
     * Find vouchers corresponding with sent data.
     *
     * @param  string $date_from From and including (required)
     * @param  string $date_to To and excluding (required)
     * @param  string $id List of IDs (optional)
     * @param  string $number List of IDs (optional)
     * @param  int $number_from From and including (optional)
     * @param  int $number_to To and excluding (optional)
     * @param  string $type_id List of IDs (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  int $count Number of elements to return (optional, default to 1000)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function ledgerVoucherSearchAsync($date_from, $date_to, $id = null, $number = null, $number_from = null, $number_to = null, $type_id = null, $from = '0', $count = '1000', $sorting = null, $fields = null)
    {
        return $this->ledgerVoucherSearchAsyncWithHttpInfo($date_from, $date_to, $id, $number, $number_from, $number_to, $type_id, $from, $count, $sorting, $fields)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation ledgerVoucherSearchAsyncWithHttpInfo
     *
     * Find vouchers corresponding with sent data.
     *
     * @param  string $date_from From and including (required)
     * @param  string $date_to To and excluding (required)
     * @param  string $id List of IDs (optional)
     * @param  string $number List of IDs (optional)
     * @param  int $number_from From and including (optional)
     * @param  int $number_to To and excluding (optional)
     * @param  string $type_id List of IDs (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  int $count Number of elements to return (optional, default to 1000)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function ledgerVoucherSearchAsyncWithHttpInfo($date_from, $date_to, $id = null, $number = null, $number_from = null, $number_to = null, $type_id = null, $from = '0', $count = '1000', $sorting = null, $fields = null)
    {
        $returnType = '\Swagger\Client\Model\VoucherSearchResponse';
        $request = $this->ledgerVoucherSearchRequest($date_from, $date_to, $id, $number, $number_from, $number_to, $type_id, $from, $count, $sorting, $fields);

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
     * Create request for operation 'ledgerVoucherSearch'
     *
     * @param  string $date_from From and including (required)
     * @param  string $date_to To and excluding (required)
     * @param  string $id List of IDs (optional)
     * @param  string $number List of IDs (optional)
     * @param  int $number_from From and including (optional)
     * @param  int $number_to To and excluding (optional)
     * @param  string $type_id List of IDs (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  int $count Number of elements to return (optional, default to 1000)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function ledgerVoucherSearchRequest($date_from, $date_to, $id = null, $number = null, $number_from = null, $number_to = null, $type_id = null, $from = '0', $count = '1000', $sorting = null, $fields = null)
    {
        // verify the required parameter 'date_from' is set
        if ($date_from === null || (is_array($date_from) && count($date_from) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $date_from when calling ledgerVoucherSearch'
            );
        }
        // verify the required parameter 'date_to' is set
        if ($date_to === null || (is_array($date_to) && count($date_to) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $date_to when calling ledgerVoucherSearch'
            );
        }

        $resourcePath = '/ledger/voucher';
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
        if ($number_from !== null) {
            $queryParams['numberFrom'] = ObjectSerializer::toQueryValue($number_from);
        }
        // query params
        if ($number_to !== null) {
            $queryParams['numberTo'] = ObjectSerializer::toQueryValue($number_to);
        }
        // query params
        if ($type_id !== null) {
            $queryParams['typeId'] = ObjectSerializer::toQueryValue($type_id);
        }
        // query params
        if ($date_from !== null) {
            $queryParams['dateFrom'] = ObjectSerializer::toQueryValue($date_from);
        }
        // query params
        if ($date_to !== null) {
            $queryParams['dateTo'] = ObjectSerializer::toQueryValue($date_to);
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
     * Operation ledgerVoucherSendToInboxSendToInbox
     *
     * Send voucher to inbox.
     *
     * @param  int $id ID of voucher that should be sent to inbox. (required)
     * @param  int $version Version of voucher that should be sent to inbox. (optional)
     * @param  string $comment Description of why the voucher was rejected. This parameter is only used if the approval feature is enabled. (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ResponseWrapperVoucher
     */
    public function ledgerVoucherSendToInboxSendToInbox($id, $version = null, $comment = null)
    {
        list($response) = $this->ledgerVoucherSendToInboxSendToInboxWithHttpInfo($id, $version, $comment);
        return $response;
    }

    /**
     * Operation ledgerVoucherSendToInboxSendToInboxWithHttpInfo
     *
     * Send voucher to inbox.
     *
     * @param  int $id ID of voucher that should be sent to inbox. (required)
     * @param  int $version Version of voucher that should be sent to inbox. (optional)
     * @param  string $comment Description of why the voucher was rejected. This parameter is only used if the approval feature is enabled. (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ResponseWrapperVoucher, HTTP status code, HTTP response headers (array of strings)
     */
    public function ledgerVoucherSendToInboxSendToInboxWithHttpInfo($id, $version = null, $comment = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperVoucher';
        $request = $this->ledgerVoucherSendToInboxSendToInboxRequest($id, $version, $comment);

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
                        '\Swagger\Client\Model\ResponseWrapperVoucher',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation ledgerVoucherSendToInboxSendToInboxAsync
     *
     * Send voucher to inbox.
     *
     * @param  int $id ID of voucher that should be sent to inbox. (required)
     * @param  int $version Version of voucher that should be sent to inbox. (optional)
     * @param  string $comment Description of why the voucher was rejected. This parameter is only used if the approval feature is enabled. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function ledgerVoucherSendToInboxSendToInboxAsync($id, $version = null, $comment = null)
    {
        return $this->ledgerVoucherSendToInboxSendToInboxAsyncWithHttpInfo($id, $version, $comment)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation ledgerVoucherSendToInboxSendToInboxAsyncWithHttpInfo
     *
     * Send voucher to inbox.
     *
     * @param  int $id ID of voucher that should be sent to inbox. (required)
     * @param  int $version Version of voucher that should be sent to inbox. (optional)
     * @param  string $comment Description of why the voucher was rejected. This parameter is only used if the approval feature is enabled. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function ledgerVoucherSendToInboxSendToInboxAsyncWithHttpInfo($id, $version = null, $comment = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperVoucher';
        $request = $this->ledgerVoucherSendToInboxSendToInboxRequest($id, $version, $comment);

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
     * Create request for operation 'ledgerVoucherSendToInboxSendToInbox'
     *
     * @param  int $id ID of voucher that should be sent to inbox. (required)
     * @param  int $version Version of voucher that should be sent to inbox. (optional)
     * @param  string $comment Description of why the voucher was rejected. This parameter is only used if the approval feature is enabled. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function ledgerVoucherSendToInboxSendToInboxRequest($id, $version = null, $comment = null)
    {
        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling ledgerVoucherSendToInboxSendToInbox'
            );
        }
        if ($version !== null && $version < 0) {
            throw new \InvalidArgumentException('invalid value for "$version" when calling LedgervoucherApi.ledgerVoucherSendToInboxSendToInbox, must be bigger than or equal to 0.');
        }


        $resourcePath = '/ledger/voucher/{id}/:sendToInbox';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($version !== null) {
            $queryParams['version'] = ObjectSerializer::toQueryValue($version);
        }
        // query params
        if ($comment !== null) {
            $queryParams['comment'] = ObjectSerializer::toQueryValue($comment);
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
     * Operation ledgerVoucherSendToLedgerSendToLedger
     *
     * Send voucher to ledger.
     *
     * @param  int $id ID of voucher that should be sent to ledger. (required)
     * @param  int $version Version of voucher that should be sent to ledger. (optional)
     * @param  int $number Voucher number to use. If omitted or 0 the system will assign the number. (optional, default to 0)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ResponseWrapperVoucher
     */
    public function ledgerVoucherSendToLedgerSendToLedger($id, $version = null, $number = '0')
    {
        list($response) = $this->ledgerVoucherSendToLedgerSendToLedgerWithHttpInfo($id, $version, $number);
        return $response;
    }

    /**
     * Operation ledgerVoucherSendToLedgerSendToLedgerWithHttpInfo
     *
     * Send voucher to ledger.
     *
     * @param  int $id ID of voucher that should be sent to ledger. (required)
     * @param  int $version Version of voucher that should be sent to ledger. (optional)
     * @param  int $number Voucher number to use. If omitted or 0 the system will assign the number. (optional, default to 0)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ResponseWrapperVoucher, HTTP status code, HTTP response headers (array of strings)
     */
    public function ledgerVoucherSendToLedgerSendToLedgerWithHttpInfo($id, $version = null, $number = '0')
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperVoucher';
        $request = $this->ledgerVoucherSendToLedgerSendToLedgerRequest($id, $version, $number);

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
                        '\Swagger\Client\Model\ResponseWrapperVoucher',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation ledgerVoucherSendToLedgerSendToLedgerAsync
     *
     * Send voucher to ledger.
     *
     * @param  int $id ID of voucher that should be sent to ledger. (required)
     * @param  int $version Version of voucher that should be sent to ledger. (optional)
     * @param  int $number Voucher number to use. If omitted or 0 the system will assign the number. (optional, default to 0)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function ledgerVoucherSendToLedgerSendToLedgerAsync($id, $version = null, $number = '0')
    {
        return $this->ledgerVoucherSendToLedgerSendToLedgerAsyncWithHttpInfo($id, $version, $number)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation ledgerVoucherSendToLedgerSendToLedgerAsyncWithHttpInfo
     *
     * Send voucher to ledger.
     *
     * @param  int $id ID of voucher that should be sent to ledger. (required)
     * @param  int $version Version of voucher that should be sent to ledger. (optional)
     * @param  int $number Voucher number to use. If omitted or 0 the system will assign the number. (optional, default to 0)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function ledgerVoucherSendToLedgerSendToLedgerAsyncWithHttpInfo($id, $version = null, $number = '0')
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperVoucher';
        $request = $this->ledgerVoucherSendToLedgerSendToLedgerRequest($id, $version, $number);

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
     * Create request for operation 'ledgerVoucherSendToLedgerSendToLedger'
     *
     * @param  int $id ID of voucher that should be sent to ledger. (required)
     * @param  int $version Version of voucher that should be sent to ledger. (optional)
     * @param  int $number Voucher number to use. If omitted or 0 the system will assign the number. (optional, default to 0)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function ledgerVoucherSendToLedgerSendToLedgerRequest($id, $version = null, $number = '0')
    {
        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling ledgerVoucherSendToLedgerSendToLedger'
            );
        }
        if ($version !== null && $version < 0) {
            throw new \InvalidArgumentException('invalid value for "$version" when calling LedgervoucherApi.ledgerVoucherSendToLedgerSendToLedger, must be bigger than or equal to 0.');
        }

        if ($number !== null && $number < 0) {
            throw new \InvalidArgumentException('invalid value for "$number" when calling LedgervoucherApi.ledgerVoucherSendToLedgerSendToLedger, must be bigger than or equal to 0.');
        }


        $resourcePath = '/ledger/voucher/{id}/:sendToLedger';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($version !== null) {
            $queryParams['version'] = ObjectSerializer::toQueryValue($version);
        }
        // query params
        if ($number !== null) {
            $queryParams['number'] = ObjectSerializer::toQueryValue($number);
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
     * Operation ledgerVoucherVoucherReceptionVoucherReception
     *
     * Find vouchers in voucher reception.
     *
     * @param  string $date_from From and including (optional)
     * @param  string $date_to To and excluding (optional)
     * @param  string $search_text Search (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  int $count Number of elements to return (optional, default to 1000)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ListResponseVoucher
     */
    public function ledgerVoucherVoucherReceptionVoucherReception($date_from = null, $date_to = null, $search_text = null, $from = '0', $count = '1000', $sorting = null, $fields = null)
    {
        list($response) = $this->ledgerVoucherVoucherReceptionVoucherReceptionWithHttpInfo($date_from, $date_to, $search_text, $from, $count, $sorting, $fields);
        return $response;
    }

    /**
     * Operation ledgerVoucherVoucherReceptionVoucherReceptionWithHttpInfo
     *
     * Find vouchers in voucher reception.
     *
     * @param  string $date_from From and including (optional)
     * @param  string $date_to To and excluding (optional)
     * @param  string $search_text Search (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  int $count Number of elements to return (optional, default to 1000)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ListResponseVoucher, HTTP status code, HTTP response headers (array of strings)
     */
    public function ledgerVoucherVoucherReceptionVoucherReceptionWithHttpInfo($date_from = null, $date_to = null, $search_text = null, $from = '0', $count = '1000', $sorting = null, $fields = null)
    {
        $returnType = '\Swagger\Client\Model\ListResponseVoucher';
        $request = $this->ledgerVoucherVoucherReceptionVoucherReceptionRequest($date_from, $date_to, $search_text, $from, $count, $sorting, $fields);

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
                        '\Swagger\Client\Model\ListResponseVoucher',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation ledgerVoucherVoucherReceptionVoucherReceptionAsync
     *
     * Find vouchers in voucher reception.
     *
     * @param  string $date_from From and including (optional)
     * @param  string $date_to To and excluding (optional)
     * @param  string $search_text Search (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  int $count Number of elements to return (optional, default to 1000)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function ledgerVoucherVoucherReceptionVoucherReceptionAsync($date_from = null, $date_to = null, $search_text = null, $from = '0', $count = '1000', $sorting = null, $fields = null)
    {
        return $this->ledgerVoucherVoucherReceptionVoucherReceptionAsyncWithHttpInfo($date_from, $date_to, $search_text, $from, $count, $sorting, $fields)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation ledgerVoucherVoucherReceptionVoucherReceptionAsyncWithHttpInfo
     *
     * Find vouchers in voucher reception.
     *
     * @param  string $date_from From and including (optional)
     * @param  string $date_to To and excluding (optional)
     * @param  string $search_text Search (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  int $count Number of elements to return (optional, default to 1000)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function ledgerVoucherVoucherReceptionVoucherReceptionAsyncWithHttpInfo($date_from = null, $date_to = null, $search_text = null, $from = '0', $count = '1000', $sorting = null, $fields = null)
    {
        $returnType = '\Swagger\Client\Model\ListResponseVoucher';
        $request = $this->ledgerVoucherVoucherReceptionVoucherReceptionRequest($date_from, $date_to, $search_text, $from, $count, $sorting, $fields);

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
     * Create request for operation 'ledgerVoucherVoucherReceptionVoucherReception'
     *
     * @param  string $date_from From and including (optional)
     * @param  string $date_to To and excluding (optional)
     * @param  string $search_text Search (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  int $count Number of elements to return (optional, default to 1000)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function ledgerVoucherVoucherReceptionVoucherReceptionRequest($date_from = null, $date_to = null, $search_text = null, $from = '0', $count = '1000', $sorting = null, $fields = null)
    {

        $resourcePath = '/ledger/voucher/>voucherReception';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($date_from !== null) {
            $queryParams['dateFrom'] = ObjectSerializer::toQueryValue($date_from);
        }
        // query params
        if ($date_to !== null) {
            $queryParams['dateTo'] = ObjectSerializer::toQueryValue($date_to);
        }
        // query params
        if ($search_text !== null) {
            $queryParams['searchText'] = ObjectSerializer::toQueryValue($search_text);
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
