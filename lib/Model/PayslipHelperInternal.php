<?php
/**
 * PayslipHelperInternal
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
 * PayslipHelperInternal Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class PayslipHelperInternal implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'PayslipHelperInternal';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'payroll_tax_municipality' => '\Swagger\Client\Model\Municipality',
        'division' => '\Swagger\Client\Model\Company',
        'holiday_allowance_rate' => 'float',
        'bank_account_or_iban' => 'string',
        'payroll_tax_percentage' => 'float',
        'delivery_method_pay_slip' => 'string',
        'is_tax_card_missing' => 'bool',
        'is_module_encrypted_pay_slip' => 'bool'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'payroll_tax_municipality' => null,
        'division' => null,
        'holiday_allowance_rate' => null,
        'bank_account_or_iban' => null,
        'payroll_tax_percentage' => null,
        'delivery_method_pay_slip' => null,
        'is_tax_card_missing' => null,
        'is_module_encrypted_pay_slip' => null
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
        'payroll_tax_municipality' => 'payrollTaxMunicipality',
        'division' => 'division',
        'holiday_allowance_rate' => 'holidayAllowanceRate',
        'bank_account_or_iban' => 'bankAccountOrIban',
        'payroll_tax_percentage' => 'payrollTaxPercentage',
        'delivery_method_pay_slip' => 'deliveryMethodPaySlip',
        'is_tax_card_missing' => 'isTaxCardMissing',
        'is_module_encrypted_pay_slip' => 'isModuleEncryptedPaySlip'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'payroll_tax_municipality' => 'setPayrollTaxMunicipality',
        'division' => 'setDivision',
        'holiday_allowance_rate' => 'setHolidayAllowanceRate',
        'bank_account_or_iban' => 'setBankAccountOrIban',
        'payroll_tax_percentage' => 'setPayrollTaxPercentage',
        'delivery_method_pay_slip' => 'setDeliveryMethodPaySlip',
        'is_tax_card_missing' => 'setIsTaxCardMissing',
        'is_module_encrypted_pay_slip' => 'setIsModuleEncryptedPaySlip'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'payroll_tax_municipality' => 'getPayrollTaxMunicipality',
        'division' => 'getDivision',
        'holiday_allowance_rate' => 'getHolidayAllowanceRate',
        'bank_account_or_iban' => 'getBankAccountOrIban',
        'payroll_tax_percentage' => 'getPayrollTaxPercentage',
        'delivery_method_pay_slip' => 'getDeliveryMethodPaySlip',
        'is_tax_card_missing' => 'getIsTaxCardMissing',
        'is_module_encrypted_pay_slip' => 'getIsModuleEncryptedPaySlip'
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

    const DELIVERY_METHOD_PAY_SLIP_MANUAL = 'MANUAL';
    const DELIVERY_METHOD_PAY_SLIP_EBOKS = 'EBOKS';
    const DELIVERY_METHOD_PAY_SLIP__PRINT = 'PRINT';
    const DELIVERY_METHOD_PAY_SLIP_EMAIL = 'EMAIL';
    const DELIVERY_METHOD_PAY_SLIP_APP = 'APP';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getDeliveryMethodPaySlipAllowableValues()
    {
        return [
            self::DELIVERY_METHOD_PAY_SLIP_MANUAL,
            self::DELIVERY_METHOD_PAY_SLIP_EBOKS,
            self::DELIVERY_METHOD_PAY_SLIP__PRINT,
            self::DELIVERY_METHOD_PAY_SLIP_EMAIL,
            self::DELIVERY_METHOD_PAY_SLIP_APP,
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
        $this->container['payroll_tax_municipality'] = isset($data['payroll_tax_municipality']) ? $data['payroll_tax_municipality'] : null;
        $this->container['division'] = isset($data['division']) ? $data['division'] : null;
        $this->container['holiday_allowance_rate'] = isset($data['holiday_allowance_rate']) ? $data['holiday_allowance_rate'] : null;
        $this->container['bank_account_or_iban'] = isset($data['bank_account_or_iban']) ? $data['bank_account_or_iban'] : null;
        $this->container['payroll_tax_percentage'] = isset($data['payroll_tax_percentage']) ? $data['payroll_tax_percentage'] : null;
        $this->container['delivery_method_pay_slip'] = isset($data['delivery_method_pay_slip']) ? $data['delivery_method_pay_slip'] : null;
        $this->container['is_tax_card_missing'] = isset($data['is_tax_card_missing']) ? $data['is_tax_card_missing'] : null;
        $this->container['is_module_encrypted_pay_slip'] = isset($data['is_module_encrypted_pay_slip']) ? $data['is_module_encrypted_pay_slip'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        $allowedValues = $this->getDeliveryMethodPaySlipAllowableValues();
        if (!is_null($this->container['delivery_method_pay_slip']) && !in_array($this->container['delivery_method_pay_slip'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'delivery_method_pay_slip', must be one of '%s'",
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
     * Gets payroll_tax_municipality
     *
     * @return \Swagger\Client\Model\Municipality
     */
    public function getPayrollTaxMunicipality()
    {
        return $this->container['payroll_tax_municipality'];
    }

    /**
     * Sets payroll_tax_municipality
     *
     * @param \Swagger\Client\Model\Municipality $payroll_tax_municipality payroll_tax_municipality
     *
     * @return $this
     */
    public function setPayrollTaxMunicipality($payroll_tax_municipality)
    {
        $this->container['payroll_tax_municipality'] = $payroll_tax_municipality;

        return $this;
    }

    /**
     * Gets division
     *
     * @return \Swagger\Client\Model\Company
     */
    public function getDivision()
    {
        return $this->container['division'];
    }

    /**
     * Sets division
     *
     * @param \Swagger\Client\Model\Company $division division
     *
     * @return $this
     */
    public function setDivision($division)
    {
        $this->container['division'] = $division;

        return $this;
    }

    /**
     * Gets holiday_allowance_rate
     *
     * @return float
     */
    public function getHolidayAllowanceRate()
    {
        return $this->container['holiday_allowance_rate'];
    }

    /**
     * Sets holiday_allowance_rate
     *
     * @param float $holiday_allowance_rate holiday_allowance_rate
     *
     * @return $this
     */
    public function setHolidayAllowanceRate($holiday_allowance_rate)
    {
        $this->container['holiday_allowance_rate'] = $holiday_allowance_rate;

        return $this;
    }

    /**
     * Gets bank_account_or_iban
     *
     * @return string
     */
    public function getBankAccountOrIban()
    {
        return $this->container['bank_account_or_iban'];
    }

    /**
     * Sets bank_account_or_iban
     *
     * @param string $bank_account_or_iban bank_account_or_iban
     *
     * @return $this
     */
    public function setBankAccountOrIban($bank_account_or_iban)
    {
        $this->container['bank_account_or_iban'] = $bank_account_or_iban;

        return $this;
    }

    /**
     * Gets payroll_tax_percentage
     *
     * @return float
     */
    public function getPayrollTaxPercentage()
    {
        return $this->container['payroll_tax_percentage'];
    }

    /**
     * Sets payroll_tax_percentage
     *
     * @param float $payroll_tax_percentage payroll_tax_percentage
     *
     * @return $this
     */
    public function setPayrollTaxPercentage($payroll_tax_percentage)
    {
        $this->container['payroll_tax_percentage'] = $payroll_tax_percentage;

        return $this;
    }

    /**
     * Gets delivery_method_pay_slip
     *
     * @return string
     */
    public function getDeliveryMethodPaySlip()
    {
        return $this->container['delivery_method_pay_slip'];
    }

    /**
     * Sets delivery_method_pay_slip
     *
     * @param string $delivery_method_pay_slip delivery_method_pay_slip
     *
     * @return $this
     */
    public function setDeliveryMethodPaySlip($delivery_method_pay_slip)
    {
        $allowedValues = $this->getDeliveryMethodPaySlipAllowableValues();
        if (!is_null($delivery_method_pay_slip) && !in_array($delivery_method_pay_slip, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'delivery_method_pay_slip', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['delivery_method_pay_slip'] = $delivery_method_pay_slip;

        return $this;
    }

    /**
     * Gets is_tax_card_missing
     *
     * @return bool
     */
    public function getIsTaxCardMissing()
    {
        return $this->container['is_tax_card_missing'];
    }

    /**
     * Sets is_tax_card_missing
     *
     * @param bool $is_tax_card_missing is_tax_card_missing
     *
     * @return $this
     */
    public function setIsTaxCardMissing($is_tax_card_missing)
    {
        $this->container['is_tax_card_missing'] = $is_tax_card_missing;

        return $this;
    }

    /**
     * Gets is_module_encrypted_pay_slip
     *
     * @return bool
     */
    public function getIsModuleEncryptedPaySlip()
    {
        return $this->container['is_module_encrypted_pay_slip'];
    }

    /**
     * Sets is_module_encrypted_pay_slip
     *
     * @param bool $is_module_encrypted_pay_slip is_module_encrypted_pay_slip
     *
     * @return $this
     */
    public function setIsModuleEncryptedPaySlip($is_module_encrypted_pay_slip)
    {
        $this->container['is_module_encrypted_pay_slip'] = $is_module_encrypted_pay_slip;

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


