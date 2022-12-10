<?php
/**
 * PersonalIncome
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
 * PersonalIncome Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class PersonalIncome implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'PersonalIncome';

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
        'year_end_report' => '\Swagger\Client\Model\YearEndReport',
        'income_group_id' => 'int',
        'business_activity_type' => 'string',
        'post_type' => 'string',
        'post_value' => 'string'
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
        'year_end_report' => null,
        'income_group_id' => 'int32',
        'business_activity_type' => null,
        'post_type' => null,
        'post_value' => null
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
        'year_end_report' => 'yearEndReport',
        'income_group_id' => 'incomeGroupId',
        'business_activity_type' => 'businessActivityType',
        'post_type' => 'postType',
        'post_value' => 'postValue'
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
        'year_end_report' => 'setYearEndReport',
        'income_group_id' => 'setIncomeGroupId',
        'business_activity_type' => 'setBusinessActivityType',
        'post_type' => 'setPostType',
        'post_value' => 'setPostValue'
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
        'year_end_report' => 'getYearEndReport',
        'income_group_id' => 'getIncomeGroupId',
        'business_activity_type' => 'getBusinessActivityType',
        'post_type' => 'getPostType',
        'post_value' => 'getPostValue'
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

    const BUSINESS_ACTIVITY_TYPE_OTHER_COMMERCIAL_ACTIVITIES = 'OTHER_COMMERCIAL_ACTIVITIES';
    const BUSINESS_ACTIVITY_TYPE_AGRICULTURE_HORTICULTURE_FUR_FARMING = 'AGRICULTURE_HORTICULTURE_FUR_FARMING';
    const BUSINESS_ACTIVITY_TYPE_FISHING_AND_HUNTING_AT_SEA = 'FISHING_AND_HUNTING_AT_SEA';
    const BUSINESS_ACTIVITY_TYPE_REINDEER_HUSBANDRY = 'REINDEER_HUSBANDRY';
    const BUSINESS_ACTIVITY_TYPE_FAMILY_DAY_CARE_CENTRE_IN_OWN_HOME = 'FAMILY_DAY_CARE_CENTRE_IN_OWN_HOME';
    const BUSINESS_ACTIVITY_TYPE_SLATE_QUARRYING = 'SLATE_QUARRYING';
    const BUSINESS_ACTIVITY_TYPE_FORESTRY = 'FORESTRY';
    const POST_TYPE_INTEREST_ON_ENTERPRISE_DEBT = 'INTEREST_ON_ENTERPRISE_DEBT';
    const POST_TYPE_CAPITAL_INCOME = 'CAPITAL_INCOME';
    const POST_TYPE_CAPITAL_EXPENSES = 'CAPITAL_EXPENSES';
    const POST_TYPE_REDUCTION_AMOUNT_FOR_RENTED_PROPERTY = 'REDUCTION_AMOUNT_FOR_RENTED_PROPERTY';
    const POST_TYPE_GAINS_FROM_REALISATION_AGRICULTURE_OR_FORESTRY = 'GAINS_FROM_REALISATION_AGRICULTURE_OR_FORESTRY';
    const POST_TYPE_NUMBER_OF_MONTHS_WITH_OPERATIONS = 'NUMBER_OF_MONTHS_WITH_OPERATIONS';
    const POST_TYPE_RISK_FREE_INTEREST_RATE = 'RISK_FREE_INTEREST_RATE';
    const POST_TYPE_ENTERPRISE_DEBT_OB = 'ENTERPRISE_DEBT_OB';
    const POST_TYPE_ENTERPRISE_DEBT_CB = 'ENTERPRISE_DEBT_CB';
    const POST_TYPE_PROFIT_SHARE_SPOUSE = 'PROFIT_SHARE_SPOUSE';
    const POST_TYPE_NEGATIVE_PERSONAL_INCOME_PREVIOUS_YEAR = 'NEGATIVE_PERSONAL_INCOME_PREVIOUS_YEAR';
    const POST_TYPE_COORDINATION_ENK = 'COORDINATION_ENK';
    const POST_TYPE_COORDINATION_ANS_DA = 'COORDINATION_ANS_DA';
    const POST_TYPE_COORDINATION_LOTT = 'COORDINATION_LOTT';
    const POST_TYPE_NEGATIVE_PERSONAL_INCOME_CARRIED_FORWARD_NEXT_YEAR = 'NEGATIVE_PERSONAL_INCOME_CARRIED_FORWARD_NEXT_YEAR';
    const POST_TYPE_BUSINESS_TYPE_DESCRIPTION = 'BUSINESS_TYPE_DESCRIPTION';
    const POST_TYPE_DISTRIBUTE_INCOME = 'DISTRIBUTE_INCOME';
    const POST_TYPE_NEGATIVE_PERSONAL_INCOME_PREVIOUS_YEAR_SPOUSE = 'NEGATIVE_PERSONAL_INCOME_PREVIOUS_YEAR_SPOUSE';
    const POST_TYPE_COORDINATION_ENK_SPOUSE = 'COORDINATION_ENK_SPOUSE';
    const POST_TYPE_COORDINATION_ANS_DA_SPOUSE = 'COORDINATION_ANS_DA_SPOUSE';
    const POST_TYPE_COORDINATION_LOTT_SPOUSE = 'COORDINATION_LOTT_SPOUSE';
    const POST_TYPE_NEGATIVE_PERSONAL_INCOME_CARRIED_FORWARD_NEXT_YEAR_SPOUSE = 'NEGATIVE_PERSONAL_INCOME_CARRIED_FORWARD_NEXT_YEAR_SPOUSE';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getBusinessActivityTypeAllowableValues()
    {
        return [
            self::BUSINESS_ACTIVITY_TYPE_OTHER_COMMERCIAL_ACTIVITIES,
            self::BUSINESS_ACTIVITY_TYPE_AGRICULTURE_HORTICULTURE_FUR_FARMING,
            self::BUSINESS_ACTIVITY_TYPE_FISHING_AND_HUNTING_AT_SEA,
            self::BUSINESS_ACTIVITY_TYPE_REINDEER_HUSBANDRY,
            self::BUSINESS_ACTIVITY_TYPE_FAMILY_DAY_CARE_CENTRE_IN_OWN_HOME,
            self::BUSINESS_ACTIVITY_TYPE_SLATE_QUARRYING,
            self::BUSINESS_ACTIVITY_TYPE_FORESTRY,
        ];
    }
    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getPostTypeAllowableValues()
    {
        return [
            self::POST_TYPE_INTEREST_ON_ENTERPRISE_DEBT,
            self::POST_TYPE_CAPITAL_INCOME,
            self::POST_TYPE_CAPITAL_EXPENSES,
            self::POST_TYPE_REDUCTION_AMOUNT_FOR_RENTED_PROPERTY,
            self::POST_TYPE_GAINS_FROM_REALISATION_AGRICULTURE_OR_FORESTRY,
            self::POST_TYPE_NUMBER_OF_MONTHS_WITH_OPERATIONS,
            self::POST_TYPE_RISK_FREE_INTEREST_RATE,
            self::POST_TYPE_ENTERPRISE_DEBT_OB,
            self::POST_TYPE_ENTERPRISE_DEBT_CB,
            self::POST_TYPE_PROFIT_SHARE_SPOUSE,
            self::POST_TYPE_NEGATIVE_PERSONAL_INCOME_PREVIOUS_YEAR,
            self::POST_TYPE_COORDINATION_ENK,
            self::POST_TYPE_COORDINATION_ANS_DA,
            self::POST_TYPE_COORDINATION_LOTT,
            self::POST_TYPE_NEGATIVE_PERSONAL_INCOME_CARRIED_FORWARD_NEXT_YEAR,
            self::POST_TYPE_BUSINESS_TYPE_DESCRIPTION,
            self::POST_TYPE_DISTRIBUTE_INCOME,
            self::POST_TYPE_NEGATIVE_PERSONAL_INCOME_PREVIOUS_YEAR_SPOUSE,
            self::POST_TYPE_COORDINATION_ENK_SPOUSE,
            self::POST_TYPE_COORDINATION_ANS_DA_SPOUSE,
            self::POST_TYPE_COORDINATION_LOTT_SPOUSE,
            self::POST_TYPE_NEGATIVE_PERSONAL_INCOME_CARRIED_FORWARD_NEXT_YEAR_SPOUSE,
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
        $this->container['year_end_report'] = isset($data['year_end_report']) ? $data['year_end_report'] : null;
        $this->container['income_group_id'] = isset($data['income_group_id']) ? $data['income_group_id'] : null;
        $this->container['business_activity_type'] = isset($data['business_activity_type']) ? $data['business_activity_type'] : null;
        $this->container['post_type'] = isset($data['post_type']) ? $data['post_type'] : null;
        $this->container['post_value'] = isset($data['post_value']) ? $data['post_value'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['income_group_id'] === null) {
            $invalidProperties[] = "'income_group_id' can't be null";
        }
        $allowedValues = $this->getBusinessActivityTypeAllowableValues();
        if (!is_null($this->container['business_activity_type']) && !in_array($this->container['business_activity_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'business_activity_type', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['post_type'] === null) {
            $invalidProperties[] = "'post_type' can't be null";
        }
        $allowedValues = $this->getPostTypeAllowableValues();
        if (!is_null($this->container['post_type']) && !in_array($this->container['post_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'post_type', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['post_value'] === null) {
            $invalidProperties[] = "'post_value' can't be null";
        }
        if ((mb_strlen($this->container['post_value']) > 255)) {
            $invalidProperties[] = "invalid value for 'post_value', the character length must be smaller than or equal to 255.";
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
     * Gets year_end_report
     *
     * @return \Swagger\Client\Model\YearEndReport
     */
    public function getYearEndReport()
    {
        return $this->container['year_end_report'];
    }

    /**
     * Sets year_end_report
     *
     * @param \Swagger\Client\Model\YearEndReport $year_end_report year_end_report
     *
     * @return $this
     */
    public function setYearEndReport($year_end_report)
    {
        $this->container['year_end_report'] = $year_end_report;

        return $this;
    }

    /**
     * Gets income_group_id
     *
     * @return int
     */
    public function getIncomeGroupId()
    {
        return $this->container['income_group_id'];
    }

    /**
     * Sets income_group_id
     *
     * @param int $income_group_id income_group_id
     *
     * @return $this
     */
    public function setIncomeGroupId($income_group_id)
    {
        $this->container['income_group_id'] = $income_group_id;

        return $this;
    }

    /**
     * Gets business_activity_type
     *
     * @return string
     */
    public function getBusinessActivityType()
    {
        return $this->container['business_activity_type'];
    }

    /**
     * Sets business_activity_type
     *
     * @param string $business_activity_type business_activity_type
     *
     * @return $this
     */
    public function setBusinessActivityType($business_activity_type)
    {
        $allowedValues = $this->getBusinessActivityTypeAllowableValues();
        if (!is_null($business_activity_type) && !in_array($business_activity_type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'business_activity_type', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['business_activity_type'] = $business_activity_type;

        return $this;
    }

    /**
     * Gets post_type
     *
     * @return string
     */
    public function getPostType()
    {
        return $this->container['post_type'];
    }

    /**
     * Sets post_type
     *
     * @param string $post_type post_type
     *
     * @return $this
     */
    public function setPostType($post_type)
    {
        $allowedValues = $this->getPostTypeAllowableValues();
        if (!in_array($post_type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'post_type', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['post_type'] = $post_type;

        return $this;
    }

    /**
     * Gets post_value
     *
     * @return string
     */
    public function getPostValue()
    {
        return $this->container['post_value'];
    }

    /**
     * Sets post_value
     *
     * @param string $post_value post_value
     *
     * @return $this
     */
    public function setPostValue($post_value)
    {
        if ((mb_strlen($post_value) > 255)) {
            throw new \InvalidArgumentException('invalid length for $post_value when calling PersonalIncome., must be smaller than or equal to 255.');
        }

        $this->container['post_value'] = $post_value;

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

