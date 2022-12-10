<?php
/**
 * TimesheetallocatedApi
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
 * TimesheetallocatedApi Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class TimesheetallocatedApi
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
     * Operation timesheetAllocatedApproveApprove
     *
     * Only for allocated hours on the company's internal holiday/vacation activity. Mark the allocated hour entry as approved. The hours will be copied to the time sheet. A notification will be sent to the entry's employee if the entry's approval status or comment has changed.
     *
     * @param  int $id Element ID (required)
     * @param  string $manager_comment Comment to be added to the approved hour entry. (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ResponseWrapperTimesheetAllocated
     */
    public function timesheetAllocatedApproveApprove($id, $manager_comment = null)
    {
        list($response) = $this->timesheetAllocatedApproveApproveWithHttpInfo($id, $manager_comment);
        return $response;
    }

    /**
     * Operation timesheetAllocatedApproveApproveWithHttpInfo
     *
     * Only for allocated hours on the company's internal holiday/vacation activity. Mark the allocated hour entry as approved. The hours will be copied to the time sheet. A notification will be sent to the entry's employee if the entry's approval status or comment has changed.
     *
     * @param  int $id Element ID (required)
     * @param  string $manager_comment Comment to be added to the approved hour entry. (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ResponseWrapperTimesheetAllocated, HTTP status code, HTTP response headers (array of strings)
     */
    public function timesheetAllocatedApproveApproveWithHttpInfo($id, $manager_comment = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperTimesheetAllocated';
        $request = $this->timesheetAllocatedApproveApproveRequest($id, $manager_comment);

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
                        '\Swagger\Client\Model\ResponseWrapperTimesheetAllocated',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation timesheetAllocatedApproveApproveAsync
     *
     * Only for allocated hours on the company's internal holiday/vacation activity. Mark the allocated hour entry as approved. The hours will be copied to the time sheet. A notification will be sent to the entry's employee if the entry's approval status or comment has changed.
     *
     * @param  int $id Element ID (required)
     * @param  string $manager_comment Comment to be added to the approved hour entry. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function timesheetAllocatedApproveApproveAsync($id, $manager_comment = null)
    {
        return $this->timesheetAllocatedApproveApproveAsyncWithHttpInfo($id, $manager_comment)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation timesheetAllocatedApproveApproveAsyncWithHttpInfo
     *
     * Only for allocated hours on the company's internal holiday/vacation activity. Mark the allocated hour entry as approved. The hours will be copied to the time sheet. A notification will be sent to the entry's employee if the entry's approval status or comment has changed.
     *
     * @param  int $id Element ID (required)
     * @param  string $manager_comment Comment to be added to the approved hour entry. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function timesheetAllocatedApproveApproveAsyncWithHttpInfo($id, $manager_comment = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperTimesheetAllocated';
        $request = $this->timesheetAllocatedApproveApproveRequest($id, $manager_comment);

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
     * Create request for operation 'timesheetAllocatedApproveApprove'
     *
     * @param  int $id Element ID (required)
     * @param  string $manager_comment Comment to be added to the approved hour entry. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function timesheetAllocatedApproveApproveRequest($id, $manager_comment = null)
    {
        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling timesheetAllocatedApproveApprove'
            );
        }

        $resourcePath = '/timesheet/allocated/{id}/:approve';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($manager_comment !== null) {
            $queryParams['managerComment'] = ObjectSerializer::toQueryValue($manager_comment);
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
     * Operation timesheetAllocatedApproveListApproveList
     *
     * Only for allocated hours on the company's internal holiday/vacation activity. Mark the allocated hour entry/entries as approved. The hours will be copied to the time sheet. Notifications will be sent to the entries' employees if the entries' approval statuses or comments have changed. If IDs are provided, the other args are ignored.
     *
     * @param  string $ids List of allocated hour entry IDs. (optional)
     * @param  string $employee_ids List of IDs. Defaults to ID of token owner. (optional)
     * @param  string $date_from From and including (optional)
     * @param  string $date_to To and excluding (optional)
     * @param  string $manager_comment Comment to be added to all approved hour entries. (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ListResponseTimesheetAllocated
     */
    public function timesheetAllocatedApproveListApproveList($ids = null, $employee_ids = null, $date_from = null, $date_to = null, $manager_comment = null)
    {
        list($response) = $this->timesheetAllocatedApproveListApproveListWithHttpInfo($ids, $employee_ids, $date_from, $date_to, $manager_comment);
        return $response;
    }

    /**
     * Operation timesheetAllocatedApproveListApproveListWithHttpInfo
     *
     * Only for allocated hours on the company's internal holiday/vacation activity. Mark the allocated hour entry/entries as approved. The hours will be copied to the time sheet. Notifications will be sent to the entries' employees if the entries' approval statuses or comments have changed. If IDs are provided, the other args are ignored.
     *
     * @param  string $ids List of allocated hour entry IDs. (optional)
     * @param  string $employee_ids List of IDs. Defaults to ID of token owner. (optional)
     * @param  string $date_from From and including (optional)
     * @param  string $date_to To and excluding (optional)
     * @param  string $manager_comment Comment to be added to all approved hour entries. (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ListResponseTimesheetAllocated, HTTP status code, HTTP response headers (array of strings)
     */
    public function timesheetAllocatedApproveListApproveListWithHttpInfo($ids = null, $employee_ids = null, $date_from = null, $date_to = null, $manager_comment = null)
    {
        $returnType = '\Swagger\Client\Model\ListResponseTimesheetAllocated';
        $request = $this->timesheetAllocatedApproveListApproveListRequest($ids, $employee_ids, $date_from, $date_to, $manager_comment);

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
                        '\Swagger\Client\Model\ListResponseTimesheetAllocated',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation timesheetAllocatedApproveListApproveListAsync
     *
     * Only for allocated hours on the company's internal holiday/vacation activity. Mark the allocated hour entry/entries as approved. The hours will be copied to the time sheet. Notifications will be sent to the entries' employees if the entries' approval statuses or comments have changed. If IDs are provided, the other args are ignored.
     *
     * @param  string $ids List of allocated hour entry IDs. (optional)
     * @param  string $employee_ids List of IDs. Defaults to ID of token owner. (optional)
     * @param  string $date_from From and including (optional)
     * @param  string $date_to To and excluding (optional)
     * @param  string $manager_comment Comment to be added to all approved hour entries. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function timesheetAllocatedApproveListApproveListAsync($ids = null, $employee_ids = null, $date_from = null, $date_to = null, $manager_comment = null)
    {
        return $this->timesheetAllocatedApproveListApproveListAsyncWithHttpInfo($ids, $employee_ids, $date_from, $date_to, $manager_comment)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation timesheetAllocatedApproveListApproveListAsyncWithHttpInfo
     *
     * Only for allocated hours on the company's internal holiday/vacation activity. Mark the allocated hour entry/entries as approved. The hours will be copied to the time sheet. Notifications will be sent to the entries' employees if the entries' approval statuses or comments have changed. If IDs are provided, the other args are ignored.
     *
     * @param  string $ids List of allocated hour entry IDs. (optional)
     * @param  string $employee_ids List of IDs. Defaults to ID of token owner. (optional)
     * @param  string $date_from From and including (optional)
     * @param  string $date_to To and excluding (optional)
     * @param  string $manager_comment Comment to be added to all approved hour entries. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function timesheetAllocatedApproveListApproveListAsyncWithHttpInfo($ids = null, $employee_ids = null, $date_from = null, $date_to = null, $manager_comment = null)
    {
        $returnType = '\Swagger\Client\Model\ListResponseTimesheetAllocated';
        $request = $this->timesheetAllocatedApproveListApproveListRequest($ids, $employee_ids, $date_from, $date_to, $manager_comment);

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
     * Create request for operation 'timesheetAllocatedApproveListApproveList'
     *
     * @param  string $ids List of allocated hour entry IDs. (optional)
     * @param  string $employee_ids List of IDs. Defaults to ID of token owner. (optional)
     * @param  string $date_from From and including (optional)
     * @param  string $date_to To and excluding (optional)
     * @param  string $manager_comment Comment to be added to all approved hour entries. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function timesheetAllocatedApproveListApproveListRequest($ids = null, $employee_ids = null, $date_from = null, $date_to = null, $manager_comment = null)
    {

        $resourcePath = '/timesheet/allocated/:approveList';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($ids !== null) {
            $queryParams['ids'] = ObjectSerializer::toQueryValue($ids);
        }
        // query params
        if ($employee_ids !== null) {
            $queryParams['employeeIds'] = ObjectSerializer::toQueryValue($employee_ids);
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
        if ($manager_comment !== null) {
            $queryParams['managerComment'] = ObjectSerializer::toQueryValue($manager_comment);
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
     * Operation timesheetAllocatedDelete
     *
     * Delete allocated hour entry by ID.
     *
     * @param  int $id Element ID (required)
     * @param  int $version Number of current version (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function timesheetAllocatedDelete($id, $version = null)
    {
        $this->timesheetAllocatedDeleteWithHttpInfo($id, $version);
    }

    /**
     * Operation timesheetAllocatedDeleteWithHttpInfo
     *
     * Delete allocated hour entry by ID.
     *
     * @param  int $id Element ID (required)
     * @param  int $version Number of current version (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function timesheetAllocatedDeleteWithHttpInfo($id, $version = null)
    {
        $returnType = '';
        $request = $this->timesheetAllocatedDeleteRequest($id, $version);

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
     * Operation timesheetAllocatedDeleteAsync
     *
     * Delete allocated hour entry by ID.
     *
     * @param  int $id Element ID (required)
     * @param  int $version Number of current version (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function timesheetAllocatedDeleteAsync($id, $version = null)
    {
        return $this->timesheetAllocatedDeleteAsyncWithHttpInfo($id, $version)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation timesheetAllocatedDeleteAsyncWithHttpInfo
     *
     * Delete allocated hour entry by ID.
     *
     * @param  int $id Element ID (required)
     * @param  int $version Number of current version (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function timesheetAllocatedDeleteAsyncWithHttpInfo($id, $version = null)
    {
        $returnType = '';
        $request = $this->timesheetAllocatedDeleteRequest($id, $version);

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
     * Create request for operation 'timesheetAllocatedDelete'
     *
     * @param  int $id Element ID (required)
     * @param  int $version Number of current version (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function timesheetAllocatedDeleteRequest($id, $version = null)
    {
        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling timesheetAllocatedDelete'
            );
        }

        $resourcePath = '/timesheet/allocated/{id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($version !== null) {
            $queryParams['version'] = ObjectSerializer::toQueryValue($version);
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
            'DELETE',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation timesheetAllocatedGet
     *
     * Find allocated hour entry by ID.
     *
     * @param  int $id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ResponseWrapperTimesheetAllocated
     */
    public function timesheetAllocatedGet($id, $fields = null)
    {
        list($response) = $this->timesheetAllocatedGetWithHttpInfo($id, $fields);
        return $response;
    }

    /**
     * Operation timesheetAllocatedGetWithHttpInfo
     *
     * Find allocated hour entry by ID.
     *
     * @param  int $id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ResponseWrapperTimesheetAllocated, HTTP status code, HTTP response headers (array of strings)
     */
    public function timesheetAllocatedGetWithHttpInfo($id, $fields = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperTimesheetAllocated';
        $request = $this->timesheetAllocatedGetRequest($id, $fields);

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
                        '\Swagger\Client\Model\ResponseWrapperTimesheetAllocated',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation timesheetAllocatedGetAsync
     *
     * Find allocated hour entry by ID.
     *
     * @param  int $id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function timesheetAllocatedGetAsync($id, $fields = null)
    {
        return $this->timesheetAllocatedGetAsyncWithHttpInfo($id, $fields)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation timesheetAllocatedGetAsyncWithHttpInfo
     *
     * Find allocated hour entry by ID.
     *
     * @param  int $id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function timesheetAllocatedGetAsyncWithHttpInfo($id, $fields = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperTimesheetAllocated';
        $request = $this->timesheetAllocatedGetRequest($id, $fields);

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
     * Create request for operation 'timesheetAllocatedGet'
     *
     * @param  int $id Element ID (required)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function timesheetAllocatedGetRequest($id, $fields = null)
    {
        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling timesheetAllocatedGet'
            );
        }

        $resourcePath = '/timesheet/allocated/{id}';
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
     * Operation timesheetAllocatedListPostList
     *
     * Add new allocated hour entry. Multiple objects for several users can be sent in the same request. Only holiday/vacation hours can receive comments. Notifications will be sent to the entries' employees if the entries have comments.
     *
     * @param  \Swagger\Client\Model\TimesheetAllocated[] $body JSON representing a list of new objects to be created. Should not have ID and version set. (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ListResponseTimesheetAllocated
     */
    public function timesheetAllocatedListPostList($body = null)
    {
        list($response) = $this->timesheetAllocatedListPostListWithHttpInfo($body);
        return $response;
    }

    /**
     * Operation timesheetAllocatedListPostListWithHttpInfo
     *
     * Add new allocated hour entry. Multiple objects for several users can be sent in the same request. Only holiday/vacation hours can receive comments. Notifications will be sent to the entries' employees if the entries have comments.
     *
     * @param  \Swagger\Client\Model\TimesheetAllocated[] $body JSON representing a list of new objects to be created. Should not have ID and version set. (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ListResponseTimesheetAllocated, HTTP status code, HTTP response headers (array of strings)
     */
    public function timesheetAllocatedListPostListWithHttpInfo($body = null)
    {
        $returnType = '\Swagger\Client\Model\ListResponseTimesheetAllocated';
        $request = $this->timesheetAllocatedListPostListRequest($body);

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
                        '\Swagger\Client\Model\ListResponseTimesheetAllocated',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation timesheetAllocatedListPostListAsync
     *
     * Add new allocated hour entry. Multiple objects for several users can be sent in the same request. Only holiday/vacation hours can receive comments. Notifications will be sent to the entries' employees if the entries have comments.
     *
     * @param  \Swagger\Client\Model\TimesheetAllocated[] $body JSON representing a list of new objects to be created. Should not have ID and version set. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function timesheetAllocatedListPostListAsync($body = null)
    {
        return $this->timesheetAllocatedListPostListAsyncWithHttpInfo($body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation timesheetAllocatedListPostListAsyncWithHttpInfo
     *
     * Add new allocated hour entry. Multiple objects for several users can be sent in the same request. Only holiday/vacation hours can receive comments. Notifications will be sent to the entries' employees if the entries have comments.
     *
     * @param  \Swagger\Client\Model\TimesheetAllocated[] $body JSON representing a list of new objects to be created. Should not have ID and version set. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function timesheetAllocatedListPostListAsyncWithHttpInfo($body = null)
    {
        $returnType = '\Swagger\Client\Model\ListResponseTimesheetAllocated';
        $request = $this->timesheetAllocatedListPostListRequest($body);

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
     * Create request for operation 'timesheetAllocatedListPostList'
     *
     * @param  \Swagger\Client\Model\TimesheetAllocated[] $body JSON representing a list of new objects to be created. Should not have ID and version set. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function timesheetAllocatedListPostListRequest($body = null)
    {

        $resourcePath = '/timesheet/allocated/list';
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
     * Operation timesheetAllocatedListPutList
     *
     * Update allocated hour entry. Multiple objects for different users can be sent in the same request. Note: Allocated hour entry object fields which are present but not set, or set to 0, will be nulled. Only holiday/vacation hours can receive comments. Notifications will be sent to the entries' employees if the entries' comments have changed.
     *
     * @param  \Swagger\Client\Model\TimesheetAllocated[] $body List of allocated hour entry objects to update. Should have ID set. (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ListResponseTimesheetAllocated
     */
    public function timesheetAllocatedListPutList($body = null)
    {
        list($response) = $this->timesheetAllocatedListPutListWithHttpInfo($body);
        return $response;
    }

    /**
     * Operation timesheetAllocatedListPutListWithHttpInfo
     *
     * Update allocated hour entry. Multiple objects for different users can be sent in the same request. Note: Allocated hour entry object fields which are present but not set, or set to 0, will be nulled. Only holiday/vacation hours can receive comments. Notifications will be sent to the entries' employees if the entries' comments have changed.
     *
     * @param  \Swagger\Client\Model\TimesheetAllocated[] $body List of allocated hour entry objects to update. Should have ID set. (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ListResponseTimesheetAllocated, HTTP status code, HTTP response headers (array of strings)
     */
    public function timesheetAllocatedListPutListWithHttpInfo($body = null)
    {
        $returnType = '\Swagger\Client\Model\ListResponseTimesheetAllocated';
        $request = $this->timesheetAllocatedListPutListRequest($body);

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
                        '\Swagger\Client\Model\ListResponseTimesheetAllocated',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation timesheetAllocatedListPutListAsync
     *
     * Update allocated hour entry. Multiple objects for different users can be sent in the same request. Note: Allocated hour entry object fields which are present but not set, or set to 0, will be nulled. Only holiday/vacation hours can receive comments. Notifications will be sent to the entries' employees if the entries' comments have changed.
     *
     * @param  \Swagger\Client\Model\TimesheetAllocated[] $body List of allocated hour entry objects to update. Should have ID set. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function timesheetAllocatedListPutListAsync($body = null)
    {
        return $this->timesheetAllocatedListPutListAsyncWithHttpInfo($body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation timesheetAllocatedListPutListAsyncWithHttpInfo
     *
     * Update allocated hour entry. Multiple objects for different users can be sent in the same request. Note: Allocated hour entry object fields which are present but not set, or set to 0, will be nulled. Only holiday/vacation hours can receive comments. Notifications will be sent to the entries' employees if the entries' comments have changed.
     *
     * @param  \Swagger\Client\Model\TimesheetAllocated[] $body List of allocated hour entry objects to update. Should have ID set. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function timesheetAllocatedListPutListAsyncWithHttpInfo($body = null)
    {
        $returnType = '\Swagger\Client\Model\ListResponseTimesheetAllocated';
        $request = $this->timesheetAllocatedListPutListRequest($body);

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
     * Create request for operation 'timesheetAllocatedListPutList'
     *
     * @param  \Swagger\Client\Model\TimesheetAllocated[] $body List of allocated hour entry objects to update. Should have ID set. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function timesheetAllocatedListPutListRequest($body = null)
    {

        $resourcePath = '/timesheet/allocated/list';
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
            'PUT',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation timesheetAllocatedPost
     *
     * Add new allocated hour entry. Only one entry per employee/date/activity/project combination is supported. Only holiday/vacation hours can receive comments. A notification will be sent to the entry's employee if the entry has a comment.
     *
     * @param  \Swagger\Client\Model\TimesheetAllocated $body JSON representing the new object to be created. Should not have ID and version set. (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ResponseWrapperTimesheetAllocated
     */
    public function timesheetAllocatedPost($body = null)
    {
        list($response) = $this->timesheetAllocatedPostWithHttpInfo($body);
        return $response;
    }

    /**
     * Operation timesheetAllocatedPostWithHttpInfo
     *
     * Add new allocated hour entry. Only one entry per employee/date/activity/project combination is supported. Only holiday/vacation hours can receive comments. A notification will be sent to the entry's employee if the entry has a comment.
     *
     * @param  \Swagger\Client\Model\TimesheetAllocated $body JSON representing the new object to be created. Should not have ID and version set. (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ResponseWrapperTimesheetAllocated, HTTP status code, HTTP response headers (array of strings)
     */
    public function timesheetAllocatedPostWithHttpInfo($body = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperTimesheetAllocated';
        $request = $this->timesheetAllocatedPostRequest($body);

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
                        '\Swagger\Client\Model\ResponseWrapperTimesheetAllocated',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation timesheetAllocatedPostAsync
     *
     * Add new allocated hour entry. Only one entry per employee/date/activity/project combination is supported. Only holiday/vacation hours can receive comments. A notification will be sent to the entry's employee if the entry has a comment.
     *
     * @param  \Swagger\Client\Model\TimesheetAllocated $body JSON representing the new object to be created. Should not have ID and version set. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function timesheetAllocatedPostAsync($body = null)
    {
        return $this->timesheetAllocatedPostAsyncWithHttpInfo($body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation timesheetAllocatedPostAsyncWithHttpInfo
     *
     * Add new allocated hour entry. Only one entry per employee/date/activity/project combination is supported. Only holiday/vacation hours can receive comments. A notification will be sent to the entry's employee if the entry has a comment.
     *
     * @param  \Swagger\Client\Model\TimesheetAllocated $body JSON representing the new object to be created. Should not have ID and version set. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function timesheetAllocatedPostAsyncWithHttpInfo($body = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperTimesheetAllocated';
        $request = $this->timesheetAllocatedPostRequest($body);

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
     * Create request for operation 'timesheetAllocatedPost'
     *
     * @param  \Swagger\Client\Model\TimesheetAllocated $body JSON representing the new object to be created. Should not have ID and version set. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function timesheetAllocatedPostRequest($body = null)
    {

        $resourcePath = '/timesheet/allocated';
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
     * Operation timesheetAllocatedPut
     *
     * Update allocated hour entry by ID. Note: Allocated hour entry object fields which are present but not set, or set to 0, will be nulled. Only holiday/vacation hours can receive comments. A notification will be sent to the entry's employee if the entry's comment has changed.
     *
     * @param  int $id Element ID (required)
     * @param  \Swagger\Client\Model\TimesheetAllocated $body Partial object describing what should be updated (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ResponseWrapperTimesheetAllocated
     */
    public function timesheetAllocatedPut($id, $body = null)
    {
        list($response) = $this->timesheetAllocatedPutWithHttpInfo($id, $body);
        return $response;
    }

    /**
     * Operation timesheetAllocatedPutWithHttpInfo
     *
     * Update allocated hour entry by ID. Note: Allocated hour entry object fields which are present but not set, or set to 0, will be nulled. Only holiday/vacation hours can receive comments. A notification will be sent to the entry's employee if the entry's comment has changed.
     *
     * @param  int $id Element ID (required)
     * @param  \Swagger\Client\Model\TimesheetAllocated $body Partial object describing what should be updated (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ResponseWrapperTimesheetAllocated, HTTP status code, HTTP response headers (array of strings)
     */
    public function timesheetAllocatedPutWithHttpInfo($id, $body = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperTimesheetAllocated';
        $request = $this->timesheetAllocatedPutRequest($id, $body);

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
                        '\Swagger\Client\Model\ResponseWrapperTimesheetAllocated',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation timesheetAllocatedPutAsync
     *
     * Update allocated hour entry by ID. Note: Allocated hour entry object fields which are present but not set, or set to 0, will be nulled. Only holiday/vacation hours can receive comments. A notification will be sent to the entry's employee if the entry's comment has changed.
     *
     * @param  int $id Element ID (required)
     * @param  \Swagger\Client\Model\TimesheetAllocated $body Partial object describing what should be updated (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function timesheetAllocatedPutAsync($id, $body = null)
    {
        return $this->timesheetAllocatedPutAsyncWithHttpInfo($id, $body)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation timesheetAllocatedPutAsyncWithHttpInfo
     *
     * Update allocated hour entry by ID. Note: Allocated hour entry object fields which are present but not set, or set to 0, will be nulled. Only holiday/vacation hours can receive comments. A notification will be sent to the entry's employee if the entry's comment has changed.
     *
     * @param  int $id Element ID (required)
     * @param  \Swagger\Client\Model\TimesheetAllocated $body Partial object describing what should be updated (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function timesheetAllocatedPutAsyncWithHttpInfo($id, $body = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperTimesheetAllocated';
        $request = $this->timesheetAllocatedPutRequest($id, $body);

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
     * Create request for operation 'timesheetAllocatedPut'
     *
     * @param  int $id Element ID (required)
     * @param  \Swagger\Client\Model\TimesheetAllocated $body Partial object describing what should be updated (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function timesheetAllocatedPutRequest($id, $body = null)
    {
        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling timesheetAllocatedPut'
            );
        }

        $resourcePath = '/timesheet/allocated/{id}';
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
     * Operation timesheetAllocatedSearch
     *
     * Find allocated hour entries corresponding with sent data.
     *
     * @param  string $ids List of IDs (optional)
     * @param  string $employee_ids List of IDs (optional)
     * @param  string $project_ids List of IDs (optional)
     * @param  string $activity_ids List of IDs (optional)
     * @param  string $date_from From and including (optional)
     * @param  string $date_to To and excluding (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  int $count Number of elements to return (optional, default to 1000)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ListResponseTimesheetAllocated
     */
    public function timesheetAllocatedSearch($ids = null, $employee_ids = null, $project_ids = null, $activity_ids = null, $date_from = null, $date_to = null, $from = '0', $count = '1000', $sorting = null, $fields = null)
    {
        list($response) = $this->timesheetAllocatedSearchWithHttpInfo($ids, $employee_ids, $project_ids, $activity_ids, $date_from, $date_to, $from, $count, $sorting, $fields);
        return $response;
    }

    /**
     * Operation timesheetAllocatedSearchWithHttpInfo
     *
     * Find allocated hour entries corresponding with sent data.
     *
     * @param  string $ids List of IDs (optional)
     * @param  string $employee_ids List of IDs (optional)
     * @param  string $project_ids List of IDs (optional)
     * @param  string $activity_ids List of IDs (optional)
     * @param  string $date_from From and including (optional)
     * @param  string $date_to To and excluding (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  int $count Number of elements to return (optional, default to 1000)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ListResponseTimesheetAllocated, HTTP status code, HTTP response headers (array of strings)
     */
    public function timesheetAllocatedSearchWithHttpInfo($ids = null, $employee_ids = null, $project_ids = null, $activity_ids = null, $date_from = null, $date_to = null, $from = '0', $count = '1000', $sorting = null, $fields = null)
    {
        $returnType = '\Swagger\Client\Model\ListResponseTimesheetAllocated';
        $request = $this->timesheetAllocatedSearchRequest($ids, $employee_ids, $project_ids, $activity_ids, $date_from, $date_to, $from, $count, $sorting, $fields);

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
                        '\Swagger\Client\Model\ListResponseTimesheetAllocated',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation timesheetAllocatedSearchAsync
     *
     * Find allocated hour entries corresponding with sent data.
     *
     * @param  string $ids List of IDs (optional)
     * @param  string $employee_ids List of IDs (optional)
     * @param  string $project_ids List of IDs (optional)
     * @param  string $activity_ids List of IDs (optional)
     * @param  string $date_from From and including (optional)
     * @param  string $date_to To and excluding (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  int $count Number of elements to return (optional, default to 1000)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function timesheetAllocatedSearchAsync($ids = null, $employee_ids = null, $project_ids = null, $activity_ids = null, $date_from = null, $date_to = null, $from = '0', $count = '1000', $sorting = null, $fields = null)
    {
        return $this->timesheetAllocatedSearchAsyncWithHttpInfo($ids, $employee_ids, $project_ids, $activity_ids, $date_from, $date_to, $from, $count, $sorting, $fields)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation timesheetAllocatedSearchAsyncWithHttpInfo
     *
     * Find allocated hour entries corresponding with sent data.
     *
     * @param  string $ids List of IDs (optional)
     * @param  string $employee_ids List of IDs (optional)
     * @param  string $project_ids List of IDs (optional)
     * @param  string $activity_ids List of IDs (optional)
     * @param  string $date_from From and including (optional)
     * @param  string $date_to To and excluding (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  int $count Number of elements to return (optional, default to 1000)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function timesheetAllocatedSearchAsyncWithHttpInfo($ids = null, $employee_ids = null, $project_ids = null, $activity_ids = null, $date_from = null, $date_to = null, $from = '0', $count = '1000', $sorting = null, $fields = null)
    {
        $returnType = '\Swagger\Client\Model\ListResponseTimesheetAllocated';
        $request = $this->timesheetAllocatedSearchRequest($ids, $employee_ids, $project_ids, $activity_ids, $date_from, $date_to, $from, $count, $sorting, $fields);

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
     * Create request for operation 'timesheetAllocatedSearch'
     *
     * @param  string $ids List of IDs (optional)
     * @param  string $employee_ids List of IDs (optional)
     * @param  string $project_ids List of IDs (optional)
     * @param  string $activity_ids List of IDs (optional)
     * @param  string $date_from From and including (optional)
     * @param  string $date_to To and excluding (optional)
     * @param  int $from From index (optional, default to 0)
     * @param  int $count Number of elements to return (optional, default to 1000)
     * @param  string $sorting Sorting pattern (optional)
     * @param  string $fields Fields filter pattern (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function timesheetAllocatedSearchRequest($ids = null, $employee_ids = null, $project_ids = null, $activity_ids = null, $date_from = null, $date_to = null, $from = '0', $count = '1000', $sorting = null, $fields = null)
    {

        $resourcePath = '/timesheet/allocated';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($ids !== null) {
            $queryParams['ids'] = ObjectSerializer::toQueryValue($ids);
        }
        // query params
        if ($employee_ids !== null) {
            $queryParams['employeeIds'] = ObjectSerializer::toQueryValue($employee_ids);
        }
        // query params
        if ($project_ids !== null) {
            $queryParams['projectIds'] = ObjectSerializer::toQueryValue($project_ids);
        }
        // query params
        if ($activity_ids !== null) {
            $queryParams['activityIds'] = ObjectSerializer::toQueryValue($activity_ids);
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
     * Operation timesheetAllocatedUnapproveListUnapproveList
     *
     * Only for allocated hours on the company's internal holiday/vacation activity. Mark the allocated hour entry/entries as unapproved. Notifications will be sent to the entries' employees if the entries' approval statuses or comments have changed. If IDs are provided, the other args are ignored.
     *
     * @param  string $ids List of allocated hour entry IDs. (optional)
     * @param  string $employee_ids List of IDs. Defaults to ID of token owner. (optional)
     * @param  string $date_from From and including (optional)
     * @param  string $date_to To and excluding (optional)
     * @param  string $manager_comment Comment to be added to all unapproved hour entries. (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ListResponseTimesheetAllocated
     */
    public function timesheetAllocatedUnapproveListUnapproveList($ids = null, $employee_ids = null, $date_from = null, $date_to = null, $manager_comment = null)
    {
        list($response) = $this->timesheetAllocatedUnapproveListUnapproveListWithHttpInfo($ids, $employee_ids, $date_from, $date_to, $manager_comment);
        return $response;
    }

    /**
     * Operation timesheetAllocatedUnapproveListUnapproveListWithHttpInfo
     *
     * Only for allocated hours on the company's internal holiday/vacation activity. Mark the allocated hour entry/entries as unapproved. Notifications will be sent to the entries' employees if the entries' approval statuses or comments have changed. If IDs are provided, the other args are ignored.
     *
     * @param  string $ids List of allocated hour entry IDs. (optional)
     * @param  string $employee_ids List of IDs. Defaults to ID of token owner. (optional)
     * @param  string $date_from From and including (optional)
     * @param  string $date_to To and excluding (optional)
     * @param  string $manager_comment Comment to be added to all unapproved hour entries. (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ListResponseTimesheetAllocated, HTTP status code, HTTP response headers (array of strings)
     */
    public function timesheetAllocatedUnapproveListUnapproveListWithHttpInfo($ids = null, $employee_ids = null, $date_from = null, $date_to = null, $manager_comment = null)
    {
        $returnType = '\Swagger\Client\Model\ListResponseTimesheetAllocated';
        $request = $this->timesheetAllocatedUnapproveListUnapproveListRequest($ids, $employee_ids, $date_from, $date_to, $manager_comment);

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
                        '\Swagger\Client\Model\ListResponseTimesheetAllocated',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation timesheetAllocatedUnapproveListUnapproveListAsync
     *
     * Only for allocated hours on the company's internal holiday/vacation activity. Mark the allocated hour entry/entries as unapproved. Notifications will be sent to the entries' employees if the entries' approval statuses or comments have changed. If IDs are provided, the other args are ignored.
     *
     * @param  string $ids List of allocated hour entry IDs. (optional)
     * @param  string $employee_ids List of IDs. Defaults to ID of token owner. (optional)
     * @param  string $date_from From and including (optional)
     * @param  string $date_to To and excluding (optional)
     * @param  string $manager_comment Comment to be added to all unapproved hour entries. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function timesheetAllocatedUnapproveListUnapproveListAsync($ids = null, $employee_ids = null, $date_from = null, $date_to = null, $manager_comment = null)
    {
        return $this->timesheetAllocatedUnapproveListUnapproveListAsyncWithHttpInfo($ids, $employee_ids, $date_from, $date_to, $manager_comment)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation timesheetAllocatedUnapproveListUnapproveListAsyncWithHttpInfo
     *
     * Only for allocated hours on the company's internal holiday/vacation activity. Mark the allocated hour entry/entries as unapproved. Notifications will be sent to the entries' employees if the entries' approval statuses or comments have changed. If IDs are provided, the other args are ignored.
     *
     * @param  string $ids List of allocated hour entry IDs. (optional)
     * @param  string $employee_ids List of IDs. Defaults to ID of token owner. (optional)
     * @param  string $date_from From and including (optional)
     * @param  string $date_to To and excluding (optional)
     * @param  string $manager_comment Comment to be added to all unapproved hour entries. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function timesheetAllocatedUnapproveListUnapproveListAsyncWithHttpInfo($ids = null, $employee_ids = null, $date_from = null, $date_to = null, $manager_comment = null)
    {
        $returnType = '\Swagger\Client\Model\ListResponseTimesheetAllocated';
        $request = $this->timesheetAllocatedUnapproveListUnapproveListRequest($ids, $employee_ids, $date_from, $date_to, $manager_comment);

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
     * Create request for operation 'timesheetAllocatedUnapproveListUnapproveList'
     *
     * @param  string $ids List of allocated hour entry IDs. (optional)
     * @param  string $employee_ids List of IDs. Defaults to ID of token owner. (optional)
     * @param  string $date_from From and including (optional)
     * @param  string $date_to To and excluding (optional)
     * @param  string $manager_comment Comment to be added to all unapproved hour entries. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function timesheetAllocatedUnapproveListUnapproveListRequest($ids = null, $employee_ids = null, $date_from = null, $date_to = null, $manager_comment = null)
    {

        $resourcePath = '/timesheet/allocated/:unapproveList';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($ids !== null) {
            $queryParams['ids'] = ObjectSerializer::toQueryValue($ids);
        }
        // query params
        if ($employee_ids !== null) {
            $queryParams['employeeIds'] = ObjectSerializer::toQueryValue($employee_ids);
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
        if ($manager_comment !== null) {
            $queryParams['managerComment'] = ObjectSerializer::toQueryValue($manager_comment);
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
     * Operation timesheetAllocatedUnapproveUnapprove
     *
     * Only for allocated hours on the company's internal holiday/vacation activity. Mark the allocated hour entry as unapproved. A notification will be sent to the entry's employee if the entry's approval status or comment has changed.
     *
     * @param  int $id Element ID (required)
     * @param  string $manager_comment Comment to be added to the unapproved hour entry. (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Swagger\Client\Model\ResponseWrapperTimesheetAllocated
     */
    public function timesheetAllocatedUnapproveUnapprove($id, $manager_comment = null)
    {
        list($response) = $this->timesheetAllocatedUnapproveUnapproveWithHttpInfo($id, $manager_comment);
        return $response;
    }

    /**
     * Operation timesheetAllocatedUnapproveUnapproveWithHttpInfo
     *
     * Only for allocated hours on the company's internal holiday/vacation activity. Mark the allocated hour entry as unapproved. A notification will be sent to the entry's employee if the entry's approval status or comment has changed.
     *
     * @param  int $id Element ID (required)
     * @param  string $manager_comment Comment to be added to the unapproved hour entry. (optional)
     *
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Swagger\Client\Model\ResponseWrapperTimesheetAllocated, HTTP status code, HTTP response headers (array of strings)
     */
    public function timesheetAllocatedUnapproveUnapproveWithHttpInfo($id, $manager_comment = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperTimesheetAllocated';
        $request = $this->timesheetAllocatedUnapproveUnapproveRequest($id, $manager_comment);

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
                        '\Swagger\Client\Model\ResponseWrapperTimesheetAllocated',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation timesheetAllocatedUnapproveUnapproveAsync
     *
     * Only for allocated hours on the company's internal holiday/vacation activity. Mark the allocated hour entry as unapproved. A notification will be sent to the entry's employee if the entry's approval status or comment has changed.
     *
     * @param  int $id Element ID (required)
     * @param  string $manager_comment Comment to be added to the unapproved hour entry. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function timesheetAllocatedUnapproveUnapproveAsync($id, $manager_comment = null)
    {
        return $this->timesheetAllocatedUnapproveUnapproveAsyncWithHttpInfo($id, $manager_comment)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation timesheetAllocatedUnapproveUnapproveAsyncWithHttpInfo
     *
     * Only for allocated hours on the company's internal holiday/vacation activity. Mark the allocated hour entry as unapproved. A notification will be sent to the entry's employee if the entry's approval status or comment has changed.
     *
     * @param  int $id Element ID (required)
     * @param  string $manager_comment Comment to be added to the unapproved hour entry. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function timesheetAllocatedUnapproveUnapproveAsyncWithHttpInfo($id, $manager_comment = null)
    {
        $returnType = '\Swagger\Client\Model\ResponseWrapperTimesheetAllocated';
        $request = $this->timesheetAllocatedUnapproveUnapproveRequest($id, $manager_comment);

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
     * Create request for operation 'timesheetAllocatedUnapproveUnapprove'
     *
     * @param  int $id Element ID (required)
     * @param  string $manager_comment Comment to be added to the unapproved hour entry. (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function timesheetAllocatedUnapproveUnapproveRequest($id, $manager_comment = null)
    {
        // verify the required parameter 'id' is set
        if ($id === null || (is_array($id) && count($id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $id when calling timesheetAllocatedUnapproveUnapprove'
            );
        }

        $resourcePath = '/timesheet/allocated/{id}/:unapprove';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($manager_comment !== null) {
            $queryParams['managerComment'] = ObjectSerializer::toQueryValue($manager_comment);
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
