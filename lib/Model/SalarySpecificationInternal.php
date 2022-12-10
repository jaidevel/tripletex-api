<?php
/**
 * SalarySpecificationInternal
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
 * SalarySpecificationInternal Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class SalarySpecificationInternal implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'SalarySpecificationInternal';

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
        'specification_type' => 'string',
        'rate' => 'float',
        'count' => 'float',
        'project' => '\Swagger\Client\Model\Project',
        'department' => '\Swagger\Client\Model\Department',
        'salary_type' => '\Swagger\Client\Model\SalaryTypeInternal',
        'payslip' => '\Swagger\Client\Model\PayslipInternal',
        'employee' => '\Swagger\Client\Model\SalaryEmployeeInternal',
        'travel_expense' => '\Swagger\Client\Model\SalaryTravelExpense',
        'description' => 'string',
        'year' => 'int',
        'month' => 'int',
        'amount' => 'float',
        'payment_amount' => 'float',
        'supplement' => '\Swagger\Client\Model\SalarySpecSupplementInternal',
        'external_changes_since_last_time' => 'bool',
        'cost_carrier_editable' => 'bool',
        'count_and_rate_editable' => 'bool',
        'salary_type_editable' => 'bool'
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
        'specification_type' => null,
        'rate' => null,
        'count' => null,
        'project' => null,
        'department' => null,
        'salary_type' => null,
        'payslip' => null,
        'employee' => null,
        'travel_expense' => null,
        'description' => null,
        'year' => 'int32',
        'month' => 'int32',
        'amount' => null,
        'payment_amount' => null,
        'supplement' => null,
        'external_changes_since_last_time' => null,
        'cost_carrier_editable' => null,
        'count_and_rate_editable' => null,
        'salary_type_editable' => null
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
        'specification_type' => 'specificationType',
        'rate' => 'rate',
        'count' => 'count',
        'project' => 'project',
        'department' => 'department',
        'salary_type' => 'salaryType',
        'payslip' => 'payslip',
        'employee' => 'employee',
        'travel_expense' => 'travelExpense',
        'description' => 'description',
        'year' => 'year',
        'month' => 'month',
        'amount' => 'amount',
        'payment_amount' => 'paymentAmount',
        'supplement' => 'supplement',
        'external_changes_since_last_time' => 'externalChangesSinceLastTime',
        'cost_carrier_editable' => 'costCarrierEditable',
        'count_and_rate_editable' => 'countAndRateEditable',
        'salary_type_editable' => 'salaryTypeEditable'
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
        'specification_type' => 'setSpecificationType',
        'rate' => 'setRate',
        'count' => 'setCount',
        'project' => 'setProject',
        'department' => 'setDepartment',
        'salary_type' => 'setSalaryType',
        'payslip' => 'setPayslip',
        'employee' => 'setEmployee',
        'travel_expense' => 'setTravelExpense',
        'description' => 'setDescription',
        'year' => 'setYear',
        'month' => 'setMonth',
        'amount' => 'setAmount',
        'payment_amount' => 'setPaymentAmount',
        'supplement' => 'setSupplement',
        'external_changes_since_last_time' => 'setExternalChangesSinceLastTime',
        'cost_carrier_editable' => 'setCostCarrierEditable',
        'count_and_rate_editable' => 'setCountAndRateEditable',
        'salary_type_editable' => 'setSalaryTypeEditable'
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
        'specification_type' => 'getSpecificationType',
        'rate' => 'getRate',
        'count' => 'getCount',
        'project' => 'getProject',
        'department' => 'getDepartment',
        'salary_type' => 'getSalaryType',
        'payslip' => 'getPayslip',
        'employee' => 'getEmployee',
        'travel_expense' => 'getTravelExpense',
        'description' => 'getDescription',
        'year' => 'getYear',
        'month' => 'getMonth',
        'amount' => 'getAmount',
        'payment_amount' => 'getPaymentAmount',
        'supplement' => 'getSupplement',
        'external_changes_since_last_time' => 'getExternalChangesSinceLastTime',
        'cost_carrier_editable' => 'getCostCarrierEditable',
        'count_and_rate_editable' => 'getCountAndRateEditable',
        'salary_type_editable' => 'getSalaryTypeEditable'
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

    const SPECIFICATION_TYPE_MONTHLY_PAY = 'TYPE_MONTHLY_PAY';
    const SPECIFICATION_TYPE_HOURLIST = 'TYPE_HOURLIST';
    const SPECIFICATION_TYPE_HOURS = 'TYPE_HOURS';
    const SPECIFICATION_TYPE_TRAVEL_REPORT = 'TYPE_TRAVEL_REPORT';
    const SPECIFICATION_TYPE_TAX = 'TYPE_TAX';
    const SPECIFICATION_TYPE_MANUAL = 'TYPE_MANUAL';
    const SPECIFICATION_TYPE_VACATION_ALLOWANCE = 'TYPE_VACATION_ALLOWANCE';
    const SPECIFICATION_TYPE_VACATION_ALLOWANCE_EXTRA = 'TYPE_VACATION_ALLOWANCE_EXTRA';
    const SPECIFICATION_TYPE_VACATION_CORRECTION = 'TYPE_VACATION_CORRECTION';
    const SPECIFICATION_TYPE_VACATION_FULL_MONTH_DEDUCTION = 'TYPE_VACATION_FULL_MONTH_DEDUCTION';
    const SPECIFICATION_TYPE_LEDGER = 'TYPE_LEDGER';
    const SPECIFICATION_TYPE_FLEXI_ADJUSTMENT = 'TYPE_FLEXI_ADJUSTMENT';
    const SPECIFICATION_TYPE_VACATION_ADJUSTMENT = 'TYPE_VACATION_ADJUSTMENT';
    const SPECIFICATION_TYPE_MESAN_BONUS = 'TYPE_MESAN_BONUS';
    const SPECIFICATION_TYPE_REGULAR = 'TYPE_REGULAR';
    const SPECIFICATION_TYPE_ABSENCE = 'TYPE_ABSENCE';
    const SPECIFICATION_TYPE_READJUSTMENT = 'TYPE_READJUSTMENT';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getSpecificationTypeAllowableValues()
    {
        return [
            self::SPECIFICATION_TYPE_MONTHLY_PAY,
            self::SPECIFICATION_TYPE_HOURLIST,
            self::SPECIFICATION_TYPE_HOURS,
            self::SPECIFICATION_TYPE_TRAVEL_REPORT,
            self::SPECIFICATION_TYPE_TAX,
            self::SPECIFICATION_TYPE_MANUAL,
            self::SPECIFICATION_TYPE_VACATION_ALLOWANCE,
            self::SPECIFICATION_TYPE_VACATION_ALLOWANCE_EXTRA,
            self::SPECIFICATION_TYPE_VACATION_CORRECTION,
            self::SPECIFICATION_TYPE_VACATION_FULL_MONTH_DEDUCTION,
            self::SPECIFICATION_TYPE_LEDGER,
            self::SPECIFICATION_TYPE_FLEXI_ADJUSTMENT,
            self::SPECIFICATION_TYPE_VACATION_ADJUSTMENT,
            self::SPECIFICATION_TYPE_MESAN_BONUS,
            self::SPECIFICATION_TYPE_REGULAR,
            self::SPECIFICATION_TYPE_ABSENCE,
            self::SPECIFICATION_TYPE_READJUSTMENT,
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
        $this->container['specification_type'] = isset($data['specification_type']) ? $data['specification_type'] : null;
        $this->container['rate'] = isset($data['rate']) ? $data['rate'] : null;
        $this->container['count'] = isset($data['count']) ? $data['count'] : null;
        $this->container['project'] = isset($data['project']) ? $data['project'] : null;
        $this->container['department'] = isset($data['department']) ? $data['department'] : null;
        $this->container['salary_type'] = isset($data['salary_type']) ? $data['salary_type'] : null;
        $this->container['payslip'] = isset($data['payslip']) ? $data['payslip'] : null;
        $this->container['employee'] = isset($data['employee']) ? $data['employee'] : null;
        $this->container['travel_expense'] = isset($data['travel_expense']) ? $data['travel_expense'] : null;
        $this->container['description'] = isset($data['description']) ? $data['description'] : null;
        $this->container['year'] = isset($data['year']) ? $data['year'] : null;
        $this->container['month'] = isset($data['month']) ? $data['month'] : null;
        $this->container['amount'] = isset($data['amount']) ? $data['amount'] : null;
        $this->container['payment_amount'] = isset($data['payment_amount']) ? $data['payment_amount'] : null;
        $this->container['supplement'] = isset($data['supplement']) ? $data['supplement'] : null;
        $this->container['external_changes_since_last_time'] = isset($data['external_changes_since_last_time']) ? $data['external_changes_since_last_time'] : null;
        $this->container['cost_carrier_editable'] = isset($data['cost_carrier_editable']) ? $data['cost_carrier_editable'] : null;
        $this->container['count_and_rate_editable'] = isset($data['count_and_rate_editable']) ? $data['count_and_rate_editable'] : null;
        $this->container['salary_type_editable'] = isset($data['salary_type_editable']) ? $data['salary_type_editable'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        $allowedValues = $this->getSpecificationTypeAllowableValues();
        if (!is_null($this->container['specification_type']) && !in_array($this->container['specification_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'specification_type', must be one of '%s'",
                implode("', '", $allowedValues)
            );
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
     * Gets specification_type
     *
     * @return string
     */
    public function getSpecificationType()
    {
        return $this->container['specification_type'];
    }

    /**
     * Sets specification_type
     *
     * @param string $specification_type Type of specification; only TYPE_MANUAL are user create- and editable
     *
     * @return $this
     */
    public function setSpecificationType($specification_type)
    {
        $allowedValues = $this->getSpecificationTypeAllowableValues();
        if (!is_null($specification_type) && !in_array($specification_type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'specification_type', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['specification_type'] = $specification_type;

        return $this;
    }

    /**
     * Gets rate
     *
     * @return float
     */
    public function getRate()
    {
        return $this->container['rate'];
    }

    /**
     * Sets rate
     *
     * @param float $rate rate
     *
     * @return $this
     */
    public function setRate($rate)
    {
        $this->container['rate'] = $rate;

        return $this;
    }

    /**
     * Gets count
     *
     * @return float
     */
    public function getCount()
    {
        return $this->container['count'];
    }

    /**
     * Sets count
     *
     * @param float $count count
     *
     * @return $this
     */
    public function setCount($count)
    {
        $this->container['count'] = $count;

        return $this;
    }

    /**
     * Gets project
     *
     * @return \Swagger\Client\Model\Project
     */
    public function getProject()
    {
        return $this->container['project'];
    }

    /**
     * Sets project
     *
     * @param \Swagger\Client\Model\Project $project project
     *
     * @return $this
     */
    public function setProject($project)
    {
        $this->container['project'] = $project;

        return $this;
    }

    /**
     * Gets department
     *
     * @return \Swagger\Client\Model\Department
     */
    public function getDepartment()
    {
        return $this->container['department'];
    }

    /**
     * Sets department
     *
     * @param \Swagger\Client\Model\Department $department department
     *
     * @return $this
     */
    public function setDepartment($department)
    {
        $this->container['department'] = $department;

        return $this;
    }

    /**
     * Gets salary_type
     *
     * @return \Swagger\Client\Model\SalaryTypeInternal
     */
    public function getSalaryType()
    {
        return $this->container['salary_type'];
    }

    /**
     * Sets salary_type
     *
     * @param \Swagger\Client\Model\SalaryTypeInternal $salary_type salary_type
     *
     * @return $this
     */
    public function setSalaryType($salary_type)
    {
        $this->container['salary_type'] = $salary_type;

        return $this;
    }

    /**
     * Gets payslip
     *
     * @return \Swagger\Client\Model\PayslipInternal
     */
    public function getPayslip()
    {
        return $this->container['payslip'];
    }

    /**
     * Sets payslip
     *
     * @param \Swagger\Client\Model\PayslipInternal $payslip payslip
     *
     * @return $this
     */
    public function setPayslip($payslip)
    {
        $this->container['payslip'] = $payslip;

        return $this;
    }

    /**
     * Gets employee
     *
     * @return \Swagger\Client\Model\SalaryEmployeeInternal
     */
    public function getEmployee()
    {
        return $this->container['employee'];
    }

    /**
     * Sets employee
     *
     * @param \Swagger\Client\Model\SalaryEmployeeInternal $employee employee
     *
     * @return $this
     */
    public function setEmployee($employee)
    {
        $this->container['employee'] = $employee;

        return $this;
    }

    /**
     * Gets travel_expense
     *
     * @return \Swagger\Client\Model\SalaryTravelExpense
     */
    public function getTravelExpense()
    {
        return $this->container['travel_expense'];
    }

    /**
     * Sets travel_expense
     *
     * @param \Swagger\Client\Model\SalaryTravelExpense $travel_expense travel_expense
     *
     * @return $this
     */
    public function setTravelExpense($travel_expense)
    {
        $this->container['travel_expense'] = $travel_expense;

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
     * @param string $description description
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->container['description'] = $description;

        return $this;
    }

    /**
     * Gets year
     *
     * @return int
     */
    public function getYear()
    {
        return $this->container['year'];
    }

    /**
     * Sets year
     *
     * @param int $year year
     *
     * @return $this
     */
    public function setYear($year)
    {
        $this->container['year'] = $year;

        return $this;
    }

    /**
     * Gets month
     *
     * @return int
     */
    public function getMonth()
    {
        return $this->container['month'];
    }

    /**
     * Sets month
     *
     * @param int $month month
     *
     * @return $this
     */
    public function setMonth($month)
    {
        $this->container['month'] = $month;

        return $this;
    }

    /**
     * Gets amount
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->container['amount'];
    }

    /**
     * Sets amount
     *
     * @param float $amount amount
     *
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->container['amount'] = $amount;

        return $this;
    }

    /**
     * Gets payment_amount
     *
     * @return float
     */
    public function getPaymentAmount()
    {
        return $this->container['payment_amount'];
    }

    /**
     * Sets payment_amount
     *
     * @param float $payment_amount payment_amount
     *
     * @return $this
     */
    public function setPaymentAmount($payment_amount)
    {
        $this->container['payment_amount'] = $payment_amount;

        return $this;
    }

    /**
     * Gets supplement
     *
     * @return \Swagger\Client\Model\SalarySpecSupplementInternal
     */
    public function getSupplement()
    {
        return $this->container['supplement'];
    }

    /**
     * Sets supplement
     *
     * @param \Swagger\Client\Model\SalarySpecSupplementInternal $supplement Salary specification supplement. Required if the salaryType requires supplementary information.
     *
     * @return $this
     */
    public function setSupplement($supplement)
    {
        $this->container['supplement'] = $supplement;

        return $this;
    }

    /**
     * Gets external_changes_since_last_time
     *
     * @return bool
     */
    public function getExternalChangesSinceLastTime()
    {
        return $this->container['external_changes_since_last_time'];
    }

    /**
     * Sets external_changes_since_last_time
     *
     * @param bool $external_changes_since_last_time external_changes_since_last_time
     *
     * @return $this
     */
    public function setExternalChangesSinceLastTime($external_changes_since_last_time)
    {
        $this->container['external_changes_since_last_time'] = $external_changes_since_last_time;

        return $this;
    }

    /**
     * Gets cost_carrier_editable
     *
     * @return bool
     */
    public function getCostCarrierEditable()
    {
        return $this->container['cost_carrier_editable'];
    }

    /**
     * Sets cost_carrier_editable
     *
     * @param bool $cost_carrier_editable cost_carrier_editable
     *
     * @return $this
     */
    public function setCostCarrierEditable($cost_carrier_editable)
    {
        $this->container['cost_carrier_editable'] = $cost_carrier_editable;

        return $this;
    }

    /**
     * Gets count_and_rate_editable
     *
     * @return bool
     */
    public function getCountAndRateEditable()
    {
        return $this->container['count_and_rate_editable'];
    }

    /**
     * Sets count_and_rate_editable
     *
     * @param bool $count_and_rate_editable count_and_rate_editable
     *
     * @return $this
     */
    public function setCountAndRateEditable($count_and_rate_editable)
    {
        $this->container['count_and_rate_editable'] = $count_and_rate_editable;

        return $this;
    }

    /**
     * Gets salary_type_editable
     *
     * @return bool
     */
    public function getSalaryTypeEditable()
    {
        return $this->container['salary_type_editable'];
    }

    /**
     * Sets salary_type_editable
     *
     * @param bool $salary_type_editable salary_type_editable
     *
     * @return $this
     */
    public function setSalaryTypeEditable($salary_type_editable)
    {
        $this->container['salary_type_editable'] = $salary_type_editable;

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


