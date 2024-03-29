<?php
/**
 * ZtlConsent
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
 * ZtlConsent Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class ZtlConsent implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'ZtlConsent';

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
        'consent_url' => 'string',
        'valid' => 'bool',
        'status' => 'string',
        'expiration_date' => 'string',
        'bank' => '\Swagger\Client\Model\Bank',
        'consent_reference' => 'string',
        'ztl_accounts' => '\Swagger\Client\Model\ZtlAccount[]',
        'user_id_or_ssn' => 'string',
        'called_from_onboarding' => 'bool'
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
        'consent_url' => null,
        'valid' => null,
        'status' => null,
        'expiration_date' => null,
        'bank' => null,
        'consent_reference' => null,
        'ztl_accounts' => null,
        'user_id_or_ssn' => null,
        'called_from_onboarding' => null
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
        'consent_url' => 'consentUrl',
        'valid' => 'valid',
        'status' => 'status',
        'expiration_date' => 'expirationDate',
        'bank' => 'bank',
        'consent_reference' => 'consentReference',
        'ztl_accounts' => 'ztlAccounts',
        'user_id_or_ssn' => 'userIdOrSsn',
        'called_from_onboarding' => 'calledFromOnboarding'
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
        'consent_url' => 'setConsentUrl',
        'valid' => 'setValid',
        'status' => 'setStatus',
        'expiration_date' => 'setExpirationDate',
        'bank' => 'setBank',
        'consent_reference' => 'setConsentReference',
        'ztl_accounts' => 'setZtlAccounts',
        'user_id_or_ssn' => 'setUserIdOrSsn',
        'called_from_onboarding' => 'setCalledFromOnboarding'
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
        'consent_url' => 'getConsentUrl',
        'valid' => 'getValid',
        'status' => 'getStatus',
        'expiration_date' => 'getExpirationDate',
        'bank' => 'getBank',
        'consent_reference' => 'getConsentReference',
        'ztl_accounts' => 'getZtlAccounts',
        'user_id_or_ssn' => 'getUserIdOrSsn',
        'called_from_onboarding' => 'getCalledFromOnboarding'
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

    const STATUS_UNKNOWN = 'UNKNOWN';
    const STATUS_ACCEPTED = 'ACCEPTED';
    const STATUS_REJECTED = 'REJECTED';
    const STATUS_AUTHORIZATION_REQUIRED = 'AUTHORIZATION_REQUIRED';
    const STATUS_REVOKED_BY_USER = 'REVOKED_BY_USER';
    const STATUS_REVOKED_BY_REMOVING_ACCESS = 'REVOKED_BY_REMOVING_ACCESS';
    const STATUS_REVOKED_BY_CREATING_NEW_CONSENT = 'REVOKED_BY_CREATING_NEW_CONSENT';
    const STATUS_SCHEDULED_FOR_REVOKING = 'SCHEDULED_FOR_REVOKING';
    const STATUS_EXPIRED = 'EXPIRED';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStatusAllowableValues()
    {
        return [
            self::STATUS_UNKNOWN,
            self::STATUS_ACCEPTED,
            self::STATUS_REJECTED,
            self::STATUS_AUTHORIZATION_REQUIRED,
            self::STATUS_REVOKED_BY_USER,
            self::STATUS_REVOKED_BY_REMOVING_ACCESS,
            self::STATUS_REVOKED_BY_CREATING_NEW_CONSENT,
            self::STATUS_SCHEDULED_FOR_REVOKING,
            self::STATUS_EXPIRED,
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
        $this->container['consent_url'] = isset($data['consent_url']) ? $data['consent_url'] : null;
        $this->container['valid'] = isset($data['valid']) ? $data['valid'] : null;
        $this->container['status'] = isset($data['status']) ? $data['status'] : null;
        $this->container['expiration_date'] = isset($data['expiration_date']) ? $data['expiration_date'] : null;
        $this->container['bank'] = isset($data['bank']) ? $data['bank'] : null;
        $this->container['consent_reference'] = isset($data['consent_reference']) ? $data['consent_reference'] : null;
        $this->container['ztl_accounts'] = isset($data['ztl_accounts']) ? $data['ztl_accounts'] : null;
        $this->container['user_id_or_ssn'] = isset($data['user_id_or_ssn']) ? $data['user_id_or_ssn'] : null;
        $this->container['called_from_onboarding'] = isset($data['called_from_onboarding']) ? $data['called_from_onboarding'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        $allowedValues = $this->getStatusAllowableValues();
        if (!is_null($this->container['status']) && !in_array($this->container['status'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'status', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['bank'] === null) {
            $invalidProperties[] = "'bank' can't be null";
        }
        if (!is_null($this->container['consent_reference']) && (mb_strlen($this->container['consent_reference']) > 255)) {
            $invalidProperties[] = "invalid value for 'consent_reference', the character length must be smaller than or equal to 255.";
        }

        if (!is_null($this->container['user_id_or_ssn']) && (mb_strlen($this->container['user_id_or_ssn']) > 100)) {
            $invalidProperties[] = "invalid value for 'user_id_or_ssn', the character length must be smaller than or equal to 100.";
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
     * Gets consent_url
     *
     * @return string
     */
    public function getConsentUrl()
    {
        return $this->container['consent_url'];
    }

    /**
     * Sets consent_url
     *
     * @param string $consent_url consent_url
     *
     * @return $this
     */
    public function setConsentUrl($consent_url)
    {
        $this->container['consent_url'] = $consent_url;

        return $this;
    }

    /**
     * Gets valid
     *
     * @return bool
     */
    public function getValid()
    {
        return $this->container['valid'];
    }

    /**
     * Sets valid
     *
     * @param bool $valid valid
     *
     * @return $this
     */
    public function setValid($valid)
    {
        $this->container['valid'] = $valid;

        return $this;
    }

    /**
     * Gets status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param string $status status
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $allowedValues = $this->getStatusAllowableValues();
        if (!is_null($status) && !in_array($status, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'status', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets expiration_date
     *
     * @return string
     */
    public function getExpirationDate()
    {
        return $this->container['expiration_date'];
    }

    /**
     * Sets expiration_date
     *
     * @param string $expiration_date expiration_date
     *
     * @return $this
     */
    public function setExpirationDate($expiration_date)
    {
        $this->container['expiration_date'] = $expiration_date;

        return $this;
    }

    /**
     * Gets bank
     *
     * @return \Swagger\Client\Model\Bank
     */
    public function getBank()
    {
        return $this->container['bank'];
    }

    /**
     * Sets bank
     *
     * @param \Swagger\Client\Model\Bank $bank bank
     *
     * @return $this
     */
    public function setBank($bank)
    {
        $this->container['bank'] = $bank;

        return $this;
    }

    /**
     * Gets consent_reference
     *
     * @return string
     */
    public function getConsentReference()
    {
        return $this->container['consent_reference'];
    }

    /**
     * Sets consent_reference
     *
     * @param string $consent_reference consent_reference
     *
     * @return $this
     */
    public function setConsentReference($consent_reference)
    {
        if (!is_null($consent_reference) && (mb_strlen($consent_reference) > 255)) {
            throw new \InvalidArgumentException('invalid length for $consent_reference when calling ZtlConsent., must be smaller than or equal to 255.');
        }

        $this->container['consent_reference'] = $consent_reference;

        return $this;
    }

    /**
     * Gets ztl_accounts
     *
     * @return \Swagger\Client\Model\ZtlAccount[]
     */
    public function getZtlAccounts()
    {
        return $this->container['ztl_accounts'];
    }

    /**
     * Sets ztl_accounts
     *
     * @param \Swagger\Client\Model\ZtlAccount[] $ztl_accounts Link to accounts this consent belongs to
     *
     * @return $this
     */
    public function setZtlAccounts($ztl_accounts)
    {
        $this->container['ztl_accounts'] = $ztl_accounts;

        return $this;
    }

    /**
     * Gets user_id_or_ssn
     *
     * @return string
     */
    public function getUserIdOrSsn()
    {
        return $this->container['user_id_or_ssn'];
    }

    /**
     * Sets user_id_or_ssn
     *
     * @param string $user_id_or_ssn userId for DNB, socialSecurityNumber for other banks
     *
     * @return $this
     */
    public function setUserIdOrSsn($user_id_or_ssn)
    {
        if (!is_null($user_id_or_ssn) && (mb_strlen($user_id_or_ssn) > 100)) {
            throw new \InvalidArgumentException('invalid length for $user_id_or_ssn when calling ZtlConsent., must be smaller than or equal to 100.');
        }

        $this->container['user_id_or_ssn'] = $user_id_or_ssn;

        return $this;
    }

    /**
     * Gets called_from_onboarding
     *
     * @return bool
     */
    public function getCalledFromOnboarding()
    {
        return $this->container['called_from_onboarding'];
    }

    /**
     * Sets called_from_onboarding
     *
     * @param bool $called_from_onboarding Specify if this is called from the onboarding process
     *
     * @return $this
     */
    public function setCalledFromOnboarding($called_from_onboarding)
    {
        $this->container['called_from_onboarding'] = $called_from_onboarding;

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


