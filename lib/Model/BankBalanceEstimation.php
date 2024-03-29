<?php
/**
 * BankBalanceEstimation
 *
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

namespace Swagger\Client\Model;

use \ArrayAccess;
use \Swagger\Client\ObjectSerializer;

/**
 * BankBalanceEstimation Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class BankBalanceEstimation implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'BankBalanceEstimation';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'id' => 'int',
        'version' => 'int',
        'changes' => '\Swagger\Client\Model\Change[]',
        'url' => 'string',
        'date' => 'string',
        'description' => 'string',
        'voucher_id' => 'int',
        'invoice_id' => 'int',
        'invoice_number' => 'string',
        'invoice_amount' => 'float',
        'is_incoming_invoice' => 'bool',
        'recurrence' => 'string',
        'category' => 'string',
        'vendor_or_customer_name' => 'string',
        'is_manually_added' => 'bool',
        'batch_id' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'id' => 'int32',
        'version' => 'int32',
        'changes' => null,
        'url' => null,
        'date' => null,
        'description' => null,
        'voucher_id' => 'int32',
        'invoice_id' => 'int32',
        'invoice_number' => null,
        'invoice_amount' => null,
        'is_incoming_invoice' => null,
        'recurrence' => null,
        'category' => null,
        'vendor_or_customer_name' => null,
        'is_manually_added' => null,
        'batch_id' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'id' => 'id',
        'version' => 'version',
        'changes' => 'changes',
        'url' => 'url',
        'date' => 'date',
        'description' => 'description',
        'voucher_id' => 'voucherId',
        'invoice_id' => 'invoiceId',
        'invoice_number' => 'invoiceNumber',
        'invoice_amount' => 'invoiceAmount',
        'is_incoming_invoice' => 'isIncomingInvoice',
        'recurrence' => 'recurrence',
        'category' => 'category',
        'vendor_or_customer_name' => 'vendorOrCustomerName',
        'is_manually_added' => 'isManuallyAdded',
        'batch_id' => 'batchId'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'version' => 'setVersion',
        'changes' => 'setChanges',
        'url' => 'setUrl',
        'date' => 'setDate',
        'description' => 'setDescription',
        'voucher_id' => 'setVoucherId',
        'invoice_id' => 'setInvoiceId',
        'invoice_number' => 'setInvoiceNumber',
        'invoice_amount' => 'setInvoiceAmount',
        'is_incoming_invoice' => 'setIsIncomingInvoice',
        'recurrence' => 'setRecurrence',
        'category' => 'setCategory',
        'vendor_or_customer_name' => 'setVendorOrCustomerName',
        'is_manually_added' => 'setIsManuallyAdded',
        'batch_id' => 'setBatchId'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'version' => 'getVersion',
        'changes' => 'getChanges',
        'url' => 'getUrl',
        'date' => 'getDate',
        'description' => 'getDescription',
        'voucher_id' => 'getVoucherId',
        'invoice_id' => 'getInvoiceId',
        'invoice_number' => 'getInvoiceNumber',
        'invoice_amount' => 'getInvoiceAmount',
        'is_incoming_invoice' => 'getIsIncomingInvoice',
        'recurrence' => 'getRecurrence',
        'category' => 'getCategory',
        'vendor_or_customer_name' => 'getVendorOrCustomerName',
        'is_manually_added' => 'getIsManuallyAdded',
        'batch_id' => 'getBatchId'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }

    const RECURRENCE_NONE = 'NONE';
    const RECURRENCE_DAILY = 'DAILY';
    const RECURRENCE_WEEKLY = 'WEEKLY';
    const RECURRENCE_MONTHLY = 'MONTHLY';
    const CATEGORY_DUPLICATE = 'DUPLICATE';
    const CATEGORY_STARTING_BALANCE = 'STARTING_BALANCE';
    const CATEGORY_NONE = 'NONE';
    const CATEGORY_SALARY = 'SALARY';
    const CATEGORY_ENI = 'ENI';
    const CATEGORY_TAX = 'TAX';
    const CATEGORY_VAT_RETURNS = 'VAT_RETURNS';
    const CATEGORY_VACATION_ALLOWANCE = 'VACATION_ALLOWANCE';
    const CATEGORY_TRAVEL_AND_EXPENSES = 'TRAVEL_AND_EXPENSES';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getRecurrenceAllowableValues()
    {
        return [
            self::RECURRENCE_NONE,
            self::RECURRENCE_DAILY,
            self::RECURRENCE_WEEKLY,
            self::RECURRENCE_MONTHLY,
        ];
    }
    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getCategoryAllowableValues()
    {
        return [
            self::CATEGORY_DUPLICATE,
            self::CATEGORY_STARTING_BALANCE,
            self::CATEGORY_NONE,
            self::CATEGORY_SALARY,
            self::CATEGORY_ENI,
            self::CATEGORY_TAX,
            self::CATEGORY_VAT_RETURNS,
            self::CATEGORY_VACATION_ALLOWANCE,
            self::CATEGORY_TRAVEL_AND_EXPENSES,
        ];
    }
    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['version'] = isset($data['version']) ? $data['version'] : null;
        $this->container['changes'] = isset($data['changes']) ? $data['changes'] : null;
        $this->container['url'] = isset($data['url']) ? $data['url'] : null;
        $this->container['date'] = isset($data['date']) ? $data['date'] : null;
        $this->container['description'] = isset($data['description']) ? $data['description'] : null;
        $this->container['voucher_id'] = isset($data['voucher_id']) ? $data['voucher_id'] : null;
        $this->container['invoice_id'] = isset($data['invoice_id']) ? $data['invoice_id'] : null;
        $this->container['invoice_number'] = isset($data['invoice_number']) ? $data['invoice_number'] : null;
        $this->container['invoice_amount'] = isset($data['invoice_amount']) ? $data['invoice_amount'] : null;
        $this->container['is_incoming_invoice'] = isset($data['is_incoming_invoice']) ? $data['is_incoming_invoice'] : null;
        $this->container['recurrence'] = isset($data['recurrence']) ? $data['recurrence'] : null;
        $this->container['category'] = isset($data['category']) ? $data['category'] : null;
        $this->container['vendor_or_customer_name'] = isset($data['vendor_or_customer_name']) ? $data['vendor_or_customer_name'] : null;
        $this->container['is_manually_added'] = isset($data['is_manually_added']) ? $data['is_manually_added'] : null;
        $this->container['batch_id'] = isset($data['batch_id']) ? $data['batch_id'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['description'] === null) {
            $invalidProperties[] = "'description' can't be null";
        }
        if ((mb_strlen($this->container['description']) > 255)) {
            $invalidProperties[] = "invalid value for 'description', the character length must be smaller than or equal to 255.";
        }

        if ($this->container['recurrence'] === null) {
            $invalidProperties[] = "'recurrence' can't be null";
        }
        $allowedValues = $this->getRecurrenceAllowableValues();
        if (!is_null($this->container['recurrence']) && !in_array($this->container['recurrence'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'recurrence', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['category'] === null) {
            $invalidProperties[] = "'category' can't be null";
        }
        $allowedValues = $this->getCategoryAllowableValues();
        if (!is_null($this->container['category']) && !in_array($this->container['category'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'category', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        if (!is_null($this->container['batch_id']) && (mb_strlen($this->container['batch_id']) > 255)) {
            $invalidProperties[] = "invalid value for 'batch_id', the character length must be smaller than or equal to 255.";
        }

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets id
     *
     * @return int
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param int $id id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets version
     *
     * @return int
     */
    public function getVersion()
    {
        return $this->container['version'];
    }

    /**
     * Sets version
     *
     * @param int $version version
     *
     * @return $this
     */
    public function setVersion($version)
    {
        $this->container['version'] = $version;

        return $this;
    }

    /**
     * Gets changes
     *
     * @return \Swagger\Client\Model\Change[]
     */
    public function getChanges()
    {
        return $this->container['changes'];
    }

    /**
     * Sets changes
     *
     * @param \Swagger\Client\Model\Change[] $changes changes
     *
     * @return $this
     */
    public function setChanges($changes)
    {
        $this->container['changes'] = $changes;

        return $this;
    }

    /**
     * Gets url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->container['url'];
    }

    /**
     * Sets url
     *
     * @param string $url url
     *
     * @return $this
     */
    public function setUrl($url)
    {
        $this->container['url'] = $url;

        return $this;
    }

    /**
     * Gets date
     *
     * @return string
     */
    public function getDate()
    {
        return $this->container['date'];
    }

    /**
     * Sets date
     *
     * @param string $date date
     *
     * @return $this
     */
    public function setDate($date)
    {
        $this->container['date'] = $date;

        return $this;
    }

    /**
     * Gets description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->container['description'];
    }

    /**
     * Sets description
     *
     * @param string $description java.lang.String
     *
     * @return $this
     */
    public function setDescription($description)
    {
        if ((mb_strlen($description) > 255)) {
            throw new \InvalidArgumentException('invalid length for $description when calling BankBalanceEstimation., must be smaller than or equal to 255.');
        }

        $this->container['description'] = $description;

        return $this;
    }

    /**
     * Gets voucher_id
     *
     * @return int
     */
    public function getVoucherId()
    {
        return $this->container['voucher_id'];
    }

    /**
     * Sets voucher_id
     *
     * @param int $voucher_id voucher_id
     *
     * @return $this
     */
    public function setVoucherId($voucher_id)
    {
        $this->container['voucher_id'] = $voucher_id;

        return $this;
    }

    /**
     * Gets invoice_id
     *
     * @return int
     */
    public function getInvoiceId()
    {
        return $this->container['invoice_id'];
    }

    /**
     * Sets invoice_id
     *
     * @param int $invoice_id invoice_id
     *
     * @return $this
     */
    public function setInvoiceId($invoice_id)
    {
        $this->container['invoice_id'] = $invoice_id;

        return $this;
    }

    /**
     * Gets invoice_number
     *
     * @return string
     */
    public function getInvoiceNumber()
    {
        return $this->container['invoice_number'];
    }

    /**
     * Sets invoice_number
     *
     * @param string $invoice_number invoice_number
     *
     * @return $this
     */
    public function setInvoiceNumber($invoice_number)
    {
        $this->container['invoice_number'] = $invoice_number;

        return $this;
    }

    /**
     * Gets invoice_amount
     *
     * @return float
     */
    public function getInvoiceAmount()
    {
        return $this->container['invoice_amount'];
    }

    /**
     * Sets invoice_amount
     *
     * @param float $invoice_amount java.math.BigDecimal
     *
     * @return $this
     */
    public function setInvoiceAmount($invoice_amount)
    {
        $this->container['invoice_amount'] = $invoice_amount;

        return $this;
    }

    /**
     * Gets is_incoming_invoice
     *
     * @return bool
     */
    public function getIsIncomingInvoice()
    {
        return $this->container['is_incoming_invoice'];
    }

    /**
     * Sets is_incoming_invoice
     *
     * @param bool $is_incoming_invoice boolean
     *
     * @return $this
     */
    public function setIsIncomingInvoice($is_incoming_invoice)
    {
        $this->container['is_incoming_invoice'] = $is_incoming_invoice;

        return $this;
    }

    /**
     * Gets recurrence
     *
     * @return string
     */
    public function getRecurrence()
    {
        return $this->container['recurrence'];
    }

    /**
     * Sets recurrence
     *
     * @param string $recurrence Recurrence type
     *
     * @return $this
     */
    public function setRecurrence($recurrence)
    {
        $allowedValues = $this->getRecurrenceAllowableValues();
        if (!in_array($recurrence, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'recurrence', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['recurrence'] = $recurrence;

        return $this;
    }

    /**
     * Gets category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->container['category'];
    }

    /**
     * Sets category
     *
     * @param string $category Category
     *
     * @return $this
     */
    public function setCategory($category)
    {
        $allowedValues = $this->getCategoryAllowableValues();
        if (!in_array($category, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'category', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['category'] = $category;

        return $this;
    }

    /**
     * Gets vendor_or_customer_name
     *
     * @return string
     */
    public function getVendorOrCustomerName()
    {
        return $this->container['vendor_or_customer_name'];
    }

    /**
     * Sets vendor_or_customer_name
     *
     * @param string $vendor_or_customer_name vendor_or_customer_name
     *
     * @return $this
     */
    public function setVendorOrCustomerName($vendor_or_customer_name)
    {
        $this->container['vendor_or_customer_name'] = $vendor_or_customer_name;

        return $this;
    }

    /**
     * Gets is_manually_added
     *
     * @return bool
     */
    public function getIsManuallyAdded()
    {
        return $this->container['is_manually_added'];
    }

    /**
     * Sets is_manually_added
     *
     * @param bool $is_manually_added boolean
     *
     * @return $this
     */
    public function setIsManuallyAdded($is_manually_added)
    {
        $this->container['is_manually_added'] = $is_manually_added;

        return $this;
    }

    /**
     * Gets batch_id
     *
     * @return string
     */
    public function getBatchId()
    {
        return $this->container['batch_id'];
    }

    /**
     * Sets batch_id
     *
     * @param string $batch_id batch_id
     *
     * @return $this
     */
    public function setBatchId($batch_id)
    {
        if (!is_null($batch_id) && (mb_strlen($batch_id) > 255)) {
            throw new \InvalidArgumentException('invalid length for $batch_id when calling BankBalanceEstimation., must be smaller than or equal to 255.');
        }

        $this->container['batch_id'] = $batch_id;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    #[\ReturnTypeWillChange]
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


