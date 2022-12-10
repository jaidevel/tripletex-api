<?php
/**
 * SalaryTransactionInternal
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
 * SalaryTransactionInternal Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class SalaryTransactionInternal implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'SalaryTransactionInternal';

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
        'year' => 'int',
        'month' => 'int',
        'period_as_string' => 'string',
        'is_historical' => 'bool',
        'payroll_tax_calc_method' => 'string',
        'voucher_comment' => 'string',
        'payslip_general_comment' => 'string',
        'completed' => 'bool',
        'pay_slips_available_date' => 'string',
        'is_filtered_on_regular_salary' => 'bool',
        'is_filtered_on_open_posts' => 'bool',
        'is_filtered_on_travel_expenses' => 'bool',
        'is_filtered_on_expenses' => 'bool',
        'is_nets_module_remit' => 'bool',
        'is_autopay_module_remit' => 'bool',
        'payment_date' => 'string',
        'not_deletable_message' => 'string',
        'has_bank_transfers' => 'bool',
        'payslips' => '\Swagger\Client\Model\PayslipInternal[]',
        'voucher' => '\Swagger\Client\Model\SalaryVoucherInternal',
        'allow_delete_payments' => 'bool',
        'payroll_tax_basis_amount' => 'float',
        'any_external_changes_on_this_transaction' => 'bool'
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
        'year' => 'int32',
        'month' => 'int32',
        'period_as_string' => null,
        'is_historical' => null,
        'payroll_tax_calc_method' => null,
        'voucher_comment' => null,
        'payslip_general_comment' => null,
        'completed' => null,
        'pay_slips_available_date' => null,
        'is_filtered_on_regular_salary' => null,
        'is_filtered_on_open_posts' => null,
        'is_filtered_on_travel_expenses' => null,
        'is_filtered_on_expenses' => null,
        'is_nets_module_remit' => null,
        'is_autopay_module_remit' => null,
        'payment_date' => null,
        'not_deletable_message' => null,
        'has_bank_transfers' => null,
        'payslips' => null,
        'voucher' => null,
        'allow_delete_payments' => null,
        'payroll_tax_basis_amount' => null,
        'any_external_changes_on_this_transaction' => null
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
        'year' => 'year',
        'month' => 'month',
        'period_as_string' => 'periodAsString',
        'is_historical' => 'isHistorical',
        'payroll_tax_calc_method' => 'payrollTaxCalcMethod',
        'voucher_comment' => 'voucherComment',
        'payslip_general_comment' => 'payslipGeneralComment',
        'completed' => 'completed',
        'pay_slips_available_date' => 'paySlipsAvailableDate',
        'is_filtered_on_regular_salary' => 'isFilteredOnRegularSalary',
        'is_filtered_on_open_posts' => 'isFilteredOnOpenPosts',
        'is_filtered_on_travel_expenses' => 'isFilteredOnTravelExpenses',
        'is_filtered_on_expenses' => 'isFilteredOnExpenses',
        'is_nets_module_remit' => 'isNetsModuleRemit',
        'is_autopay_module_remit' => 'isAutopayModuleRemit',
        'payment_date' => 'paymentDate',
        'not_deletable_message' => 'notDeletableMessage',
        'has_bank_transfers' => 'hasBankTransfers',
        'payslips' => 'payslips',
        'voucher' => 'voucher',
        'allow_delete_payments' => 'allowDeletePayments',
        'payroll_tax_basis_amount' => 'payrollTaxBasisAmount',
        'any_external_changes_on_this_transaction' => 'anyExternalChangesOnThisTransaction'
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
        'year' => 'setYear',
        'month' => 'setMonth',
        'period_as_string' => 'setPeriodAsString',
        'is_historical' => 'setIsHistorical',
        'payroll_tax_calc_method' => 'setPayrollTaxCalcMethod',
        'voucher_comment' => 'setVoucherComment',
        'payslip_general_comment' => 'setPayslipGeneralComment',
        'completed' => 'setCompleted',
        'pay_slips_available_date' => 'setPaySlipsAvailableDate',
        'is_filtered_on_regular_salary' => 'setIsFilteredOnRegularSalary',
        'is_filtered_on_open_posts' => 'setIsFilteredOnOpenPosts',
        'is_filtered_on_travel_expenses' => 'setIsFilteredOnTravelExpenses',
        'is_filtered_on_expenses' => 'setIsFilteredOnExpenses',
        'is_nets_module_remit' => 'setIsNetsModuleRemit',
        'is_autopay_module_remit' => 'setIsAutopayModuleRemit',
        'payment_date' => 'setPaymentDate',
        'not_deletable_message' => 'setNotDeletableMessage',
        'has_bank_transfers' => 'setHasBankTransfers',
        'payslips' => 'setPayslips',
        'voucher' => 'setVoucher',
        'allow_delete_payments' => 'setAllowDeletePayments',
        'payroll_tax_basis_amount' => 'setPayrollTaxBasisAmount',
        'any_external_changes_on_this_transaction' => 'setAnyExternalChangesOnThisTransaction'
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
        'year' => 'getYear',
        'month' => 'getMonth',
        'period_as_string' => 'getPeriodAsString',
        'is_historical' => 'getIsHistorical',
        'payroll_tax_calc_method' => 'getPayrollTaxCalcMethod',
        'voucher_comment' => 'getVoucherComment',
        'payslip_general_comment' => 'getPayslipGeneralComment',
        'completed' => 'getCompleted',
        'pay_slips_available_date' => 'getPaySlipsAvailableDate',
        'is_filtered_on_regular_salary' => 'getIsFilteredOnRegularSalary',
        'is_filtered_on_open_posts' => 'getIsFilteredOnOpenPosts',
        'is_filtered_on_travel_expenses' => 'getIsFilteredOnTravelExpenses',
        'is_filtered_on_expenses' => 'getIsFilteredOnExpenses',
        'is_nets_module_remit' => 'getIsNetsModuleRemit',
        'is_autopay_module_remit' => 'getIsAutopayModuleRemit',
        'payment_date' => 'getPaymentDate',
        'not_deletable_message' => 'getNotDeletableMessage',
        'has_bank_transfers' => 'getHasBankTransfers',
        'payslips' => 'getPayslips',
        'voucher' => 'getVoucher',
        'allow_delete_payments' => 'getAllowDeletePayments',
        'payroll_tax_basis_amount' => 'getPayrollTaxBasisAmount',
        'any_external_changes_on_this_transaction' => 'getAnyExternalChangesOnThisTransaction'
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
        $this->container['year'] = isset($data['year']) ? $data['year'] : null;
        $this->container['month'] = isset($data['month']) ? $data['month'] : null;
        $this->container['period_as_string'] = isset($data['period_as_string']) ? $data['period_as_string'] : null;
        $this->container['is_historical'] = isset($data['is_historical']) ? $data['is_historical'] : null;
        $this->container['payroll_tax_calc_method'] = isset($data['payroll_tax_calc_method']) ? $data['payroll_tax_calc_method'] : null;
        $this->container['voucher_comment'] = isset($data['voucher_comment']) ? $data['voucher_comment'] : null;
        $this->container['payslip_general_comment'] = isset($data['payslip_general_comment']) ? $data['payslip_general_comment'] : null;
        $this->container['completed'] = isset($data['completed']) ? $data['completed'] : null;
        $this->container['pay_slips_available_date'] = isset($data['pay_slips_available_date']) ? $data['pay_slips_available_date'] : null;
        $this->container['is_filtered_on_regular_salary'] = isset($data['is_filtered_on_regular_salary']) ? $data['is_filtered_on_regular_salary'] : null;
        $this->container['is_filtered_on_open_posts'] = isset($data['is_filtered_on_open_posts']) ? $data['is_filtered_on_open_posts'] : null;
        $this->container['is_filtered_on_travel_expenses'] = isset($data['is_filtered_on_travel_expenses']) ? $data['is_filtered_on_travel_expenses'] : null;
        $this->container['is_filtered_on_expenses'] = isset($data['is_filtered_on_expenses']) ? $data['is_filtered_on_expenses'] : null;
        $this->container['is_nets_module_remit'] = isset($data['is_nets_module_remit']) ? $data['is_nets_module_remit'] : null;
        $this->container['is_autopay_module_remit'] = isset($data['is_autopay_module_remit']) ? $data['is_autopay_module_remit'] : null;
        $this->container['payment_date'] = isset($data['payment_date']) ? $data['payment_date'] : null;
        $this->container['not_deletable_message'] = isset($data['not_deletable_message']) ? $data['not_deletable_message'] : null;
        $this->container['has_bank_transfers'] = isset($data['has_bank_transfers']) ? $data['has_bank_transfers'] : null;
        $this->container['payslips'] = isset($data['payslips']) ? $data['payslips'] : null;
        $this->container['voucher'] = isset($data['voucher']) ? $data['voucher'] : null;
        $this->container['allow_delete_payments'] = isset($data['allow_delete_payments']) ? $data['allow_delete_payments'] : null;
        $this->container['payroll_tax_basis_amount'] = isset($data['payroll_tax_basis_amount']) ? $data['payroll_tax_basis_amount'] : null;
        $this->container['any_external_changes_on_this_transaction'] = isset($data['any_external_changes_on_this_transaction']) ? $data['any_external_changes_on_this_transaction'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['year'] === null) {
            $invalidProperties[] = "'year' can't be null";
        }
        if ($this->container['month'] === null) {
            $invalidProperties[] = "'month' can't be null";
        }
        if (!is_null($this->container['payroll_tax_calc_method']) && (mb_strlen($this->container['payroll_tax_calc_method']) > 2)) {
            $invalidProperties[] = "invalid value for 'payroll_tax_calc_method', the character length must be smaller than or equal to 2.";
        }

        if ($this->container['payslips'] === null) {
            $invalidProperties[] = "'payslips' can't be null";
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
     * @param string $date Voucher date.
     *
     * @return $this
     */
    public function setDate($date)
    {
        $this->container['date'] = $date;

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
     * Gets period_as_string
     *
     * @return string
     */
    public function getPeriodAsString()
    {
        return $this->container['period_as_string'];
    }

    /**
     * Sets period_as_string
     *
     * @param string $period_as_string period_as_string
     *
     * @return $this
     */
    public function setPeriodAsString($period_as_string)
    {
        $this->container['period_as_string'] = $period_as_string;

        return $this;
    }

    /**
     * Gets is_historical
     *
     * @return bool
     */
    public function getIsHistorical()
    {
        return $this->container['is_historical'];
    }

    /**
     * Sets is_historical
     *
     * @param bool $is_historical With historical wage vouchers you can update the wage system with information dated before the opening balance.
     *
     * @return $this
     */
    public function setIsHistorical($is_historical)
    {
        $this->container['is_historical'] = $is_historical;

        return $this;
    }

    /**
     * Gets payroll_tax_calc_method
     *
     * @return string
     */
    public function getPayrollTaxCalcMethod()
    {
        return $this->container['payroll_tax_calc_method'];
    }

    /**
     * Sets payroll_tax_calc_method
     *
     * @param string $payroll_tax_calc_method Employee National Insurance calculation method
     *
     * @return $this
     */
    public function setPayrollTaxCalcMethod($payroll_tax_calc_method)
    {
        if (!is_null($payroll_tax_calc_method) && (mb_strlen($payroll_tax_calc_method) > 2)) {
            throw new \InvalidArgumentException('invalid length for $payroll_tax_calc_method when calling SalaryTransactionInternal., must be smaller than or equal to 2.');
        }

        $this->container['payroll_tax_calc_method'] = $payroll_tax_calc_method;

        return $this;
    }

    /**
     * Gets voucher_comment
     *
     * @return string
     */
    public function getVoucherComment()
    {
        return $this->container['voucher_comment'];
    }

    /**
     * Sets voucher_comment
     *
     * @param string $voucher_comment Comment on voucher
     *
     * @return $this
     */
    public function setVoucherComment($voucher_comment)
    {
        $this->container['voucher_comment'] = $voucher_comment;

        return $this;
    }

    /**
     * Gets payslip_general_comment
     *
     * @return string
     */
    public function getPayslipGeneralComment()
    {
        return $this->container['payslip_general_comment'];
    }

    /**
     * Sets payslip_general_comment
     *
     * @param string $payslip_general_comment Comment to be shown on all payslips
     *
     * @return $this
     */
    public function setPayslipGeneralComment($payslip_general_comment)
    {
        $this->container['payslip_general_comment'] = $payslip_general_comment;

        return $this;
    }

    /**
     * Gets completed
     *
     * @return bool
     */
    public function getCompleted()
    {
        return $this->container['completed'];
    }

    /**
     * Sets completed
     *
     * @param bool $completed completed
     *
     * @return $this
     */
    public function setCompleted($completed)
    {
        $this->container['completed'] = $completed;

        return $this;
    }

    /**
     * Gets pay_slips_available_date
     *
     * @return string
     */
    public function getPaySlipsAvailableDate()
    {
        return $this->container['pay_slips_available_date'];
    }

    /**
     * Sets pay_slips_available_date
     *
     * @param string $pay_slips_available_date The date payslips are made available to the employee. Defaults to voucherDate.
     *
     * @return $this
     */
    public function setPaySlipsAvailableDate($pay_slips_available_date)
    {
        $this->container['pay_slips_available_date'] = $pay_slips_available_date;

        return $this;
    }

    /**
     * Gets is_filtered_on_regular_salary
     *
     * @return bool
     */
    public function getIsFilteredOnRegularSalary()
    {
        return $this->container['is_filtered_on_regular_salary'];
    }

    /**
     * Sets is_filtered_on_regular_salary
     *
     * @param bool $is_filtered_on_regular_salary is_filtered_on_regular_salary
     *
     * @return $this
     */
    public function setIsFilteredOnRegularSalary($is_filtered_on_regular_salary)
    {
        $this->container['is_filtered_on_regular_salary'] = $is_filtered_on_regular_salary;

        return $this;
    }

    /**
     * Gets is_filtered_on_open_posts
     *
     * @return bool
     */
    public function getIsFilteredOnOpenPosts()
    {
        return $this->container['is_filtered_on_open_posts'];
    }

    /**
     * Sets is_filtered_on_open_posts
     *
     * @param bool $is_filtered_on_open_posts is_filtered_on_open_posts
     *
     * @return $this
     */
    public function setIsFilteredOnOpenPosts($is_filtered_on_open_posts)
    {
        $this->container['is_filtered_on_open_posts'] = $is_filtered_on_open_posts;

        return $this;
    }

    /**
     * Gets is_filtered_on_travel_expenses
     *
     * @return bool
     */
    public function getIsFilteredOnTravelExpenses()
    {
        return $this->container['is_filtered_on_travel_expenses'];
    }

    /**
     * Sets is_filtered_on_travel_expenses
     *
     * @param bool $is_filtered_on_travel_expenses is_filtered_on_travel_expenses
     *
     * @return $this
     */
    public function setIsFilteredOnTravelExpenses($is_filtered_on_travel_expenses)
    {
        $this->container['is_filtered_on_travel_expenses'] = $is_filtered_on_travel_expenses;

        return $this;
    }

    /**
     * Gets is_filtered_on_expenses
     *
     * @return bool
     */
    public function getIsFilteredOnExpenses()
    {
        return $this->container['is_filtered_on_expenses'];
    }

    /**
     * Sets is_filtered_on_expenses
     *
     * @param bool $is_filtered_on_expenses is_filtered_on_expenses
     *
     * @return $this
     */
    public function setIsFilteredOnExpenses($is_filtered_on_expenses)
    {
        $this->container['is_filtered_on_expenses'] = $is_filtered_on_expenses;

        return $this;
    }

    /**
     * Gets is_nets_module_remit
     *
     * @return bool
     */
    public function getIsNetsModuleRemit()
    {
        return $this->container['is_nets_module_remit'];
    }

    /**
     * Sets is_nets_module_remit
     *
     * @param bool $is_nets_module_remit is_nets_module_remit
     *
     * @return $this
     */
    public function setIsNetsModuleRemit($is_nets_module_remit)
    {
        $this->container['is_nets_module_remit'] = $is_nets_module_remit;

        return $this;
    }

    /**
     * Gets is_autopay_module_remit
     *
     * @return bool
     */
    public function getIsAutopayModuleRemit()
    {
        return $this->container['is_autopay_module_remit'];
    }

    /**
     * Sets is_autopay_module_remit
     *
     * @param bool $is_autopay_module_remit is_autopay_module_remit
     *
     * @return $this
     */
    public function setIsAutopayModuleRemit($is_autopay_module_remit)
    {
        $this->container['is_autopay_module_remit'] = $is_autopay_module_remit;

        return $this;
    }

    /**
     * Gets payment_date
     *
     * @return string
     */
    public function getPaymentDate()
    {
        return $this->container['payment_date'];
    }

    /**
     * Sets payment_date
     *
     * @param string $payment_date The date payslips are paid
     *
     * @return $this
     */
    public function setPaymentDate($payment_date)
    {
        $this->container['payment_date'] = $payment_date;

        return $this;
    }

    /**
     * Gets not_deletable_message
     *
     * @return string
     */
    public function getNotDeletableMessage()
    {
        return $this->container['not_deletable_message'];
    }

    /**
     * Sets not_deletable_message
     *
     * @param string $not_deletable_message not_deletable_message
     *
     * @return $this
     */
    public function setNotDeletableMessage($not_deletable_message)
    {
        $this->container['not_deletable_message'] = $not_deletable_message;

        return $this;
    }

    /**
     * Gets has_bank_transfers
     *
     * @return bool
     */
    public function getHasBankTransfers()
    {
        return $this->container['has_bank_transfers'];
    }

    /**
     * Sets has_bank_transfers
     *
     * @param bool $has_bank_transfers has_bank_transfers
     *
     * @return $this
     */
    public function setHasBankTransfers($has_bank_transfers)
    {
        $this->container['has_bank_transfers'] = $has_bank_transfers;

        return $this;
    }

    /**
     * Gets payslips
     *
     * @return \Swagger\Client\Model\PayslipInternal[]
     */
    public function getPayslips()
    {
        return $this->container['payslips'];
    }

    /**
     * Sets payslips
     *
     * @param \Swagger\Client\Model\PayslipInternal[] $payslips Link to individual payslip objects.
     *
     * @return $this
     */
    public function setPayslips($payslips)
    {
        $this->container['payslips'] = $payslips;

        return $this;
    }

    /**
     * Gets voucher
     *
     * @return \Swagger\Client\Model\SalaryVoucherInternal
     */
    public function getVoucher()
    {
        return $this->container['voucher'];
    }

    /**
     * Sets voucher
     *
     * @param \Swagger\Client\Model\SalaryVoucherInternal $voucher Link to the voucher object
     *
     * @return $this
     */
    public function setVoucher($voucher)
    {
        $this->container['voucher'] = $voucher;

        return $this;
    }

    /**
     * Gets allow_delete_payments
     *
     * @return bool
     */
    public function getAllowDeletePayments()
    {
        return $this->container['allow_delete_payments'];
    }

    /**
     * Sets allow_delete_payments
     *
     * @param bool $allow_delete_payments Link to the voucher object
     *
     * @return $this
     */
    public function setAllowDeletePayments($allow_delete_payments)
    {
        $this->container['allow_delete_payments'] = $allow_delete_payments;

        return $this;
    }

    /**
     * Gets payroll_tax_basis_amount
     *
     * @return float
     */
    public function getPayrollTaxBasisAmount()
    {
        return $this->container['payroll_tax_basis_amount'];
    }

    /**
     * Sets payroll_tax_basis_amount
     *
     * @param float $payroll_tax_basis_amount payroll_tax_basis_amount
     *
     * @return $this
     */
    public function setPayrollTaxBasisAmount($payroll_tax_basis_amount)
    {
        $this->container['payroll_tax_basis_amount'] = $payroll_tax_basis_amount;

        return $this;
    }

    /**
     * Gets any_external_changes_on_this_transaction
     *
     * @return bool
     */
    public function getAnyExternalChangesOnThisTransaction()
    {
        return $this->container['any_external_changes_on_this_transaction'];
    }

    /**
     * Sets any_external_changes_on_this_transaction
     *
     * @param bool $any_external_changes_on_this_transaction any_external_changes_on_this_transaction
     *
     * @return $this
     */
    public function setAnyExternalChangesOnThisTransaction($any_external_changes_on_this_transaction)
    {
        $this->container['any_external_changes_on_this_transaction'] = $any_external_changes_on_this_transaction;

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


