<?php
/**
 * PermanentDifferences
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
 * PermanentDifferences Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class PermanentDifferences implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'PermanentDifferences';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'year_end_report' => '\Swagger\Client\Model\YearEndReport',
        'name' => 'string',
        'grouping' => 'string',
        'negate' => 'bool',
        'read_only' => 'bool',
        'source' => 'string',
        'post_type' => 'string',
        'post_value' => 'float'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'year_end_report' => null,
        'name' => null,
        'grouping' => null,
        'negate' => null,
        'read_only' => null,
        'source' => null,
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
        'year_end_report' => 'yearEndReport',
        'name' => 'name',
        'grouping' => 'grouping',
        'negate' => 'negate',
        'read_only' => 'readOnly',
        'source' => 'source',
        'post_type' => 'postType',
        'post_value' => 'postValue'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'year_end_report' => 'setYearEndReport',
        'name' => 'setName',
        'grouping' => 'setGrouping',
        'negate' => 'setNegate',
        'read_only' => 'setReadOnly',
        'source' => 'setSource',
        'post_type' => 'setPostType',
        'post_value' => 'setPostValue'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'year_end_report' => 'getYearEndReport',
        'name' => 'getName',
        'grouping' => 'getGrouping',
        'negate' => 'getNegate',
        'read_only' => 'getReadOnly',
        'source' => 'getSource',
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

    const POST_TYPE_REGISTRATION_NUMBER = 'REGISTRATION_NUMBER';
    const POST_TYPE_DESCRIPTION = 'DESCRIPTION';
    const POST_TYPE_VEHICLE_TYPE = 'VEHICLE_TYPE';
    const POST_TYPE_YEAR_OF_INITIAL_REGISTRATION = 'YEAR_OF_INITIAL_REGISTRATION';
    const POST_TYPE_LIST_PRICE = 'LIST_PRICE';
    const POST_TYPE_DATE_FROM = 'DATE_FROM';
    const POST_TYPE_DATE_TO = 'DATE_TO';
    const POST_TYPE_LICENCE = 'LICENCE';
    const POST_TYPE_LICENCE_NUMBER = 'LICENCE_NUMBER';
    const POST_TYPE_IS_ELECTRONIC_VEHICLE_LOGBOOK_LOGGED = 'IS_ELECTRONIC_VEHICLE_LOGBOOK_LOGGED';
    const POST_TYPE_NO_OF_KILOMETRES_TOTAL = 'NO_OF_KILOMETRES_TOTAL';
    const POST_TYPE_OPERATING_EXPENSES = 'OPERATING_EXPENSES';
    const POST_TYPE_LEASING_RENT = 'LEASING_RENT';
    const POST_TYPE_IS_COMPANY_VEHICLE_USED_PRIVATE = 'IS_COMPANY_VEHICLE_USED_PRIVATE';
    const POST_TYPE_NO_OF_KILOMETRES_PRIVATE = 'NO_OF_KILOMETRES_PRIVATE';
    const POST_TYPE_DEPRECIATION_PRIVATE_USE = 'DEPRECIATION_PRIVATE_USE';
    const POST_TYPE_REVERSED_VEHICLE_EXPENSES = 'REVERSED_VEHICLE_EXPENSES';
    const POST_TYPE_NO_OF_LITER_FUEL = 'NO_OF_LITER_FUEL';
    const POST_TYPE_TAXIMETER_TYPE = 'TAXIMETER_TYPE';
    const POST_TYPE_INCOME_PERSONAL_TRANSPORT = 'INCOME_PERSONAL_TRANSPORT';
    const POST_TYPE_INCOME_GOODS_TRANSPORT = 'INCOME_GOODS_TRANSPORT';
    const POST_TYPE_DRIVING_INCOME_PAYED_IN_CASH = 'DRIVING_INCOME_PAYED_IN_CASH';
    const POST_TYPE_DRIVING_INCOME_INVOICED_PUBLIC_AGENCIES = 'DRIVING_INCOME_INVOICED_PUBLIC_AGENCIES';
    const POST_TYPE_TIP_PAYED_WITH_CARD_OR_INVOICE = 'TIP_PAYED_WITH_CARD_OR_INVOICE';
    const POST_TYPE_TIP_PAYED_IN_CASH = 'TIP_PAYED_IN_CASH';
    const POST_TYPE_NO_OF_KILOMETRES_SCHOOL_CHILDREN = 'NO_OF_KILOMETRES_SCHOOL_CHILDREN';
    const POST_TYPE_NO_OF_KILOMETRES_WITH_PASSENGER = 'NO_OF_KILOMETRES_WITH_PASSENGER';
    const POST_TYPE_FLOP_TRIP_AMOUNT = 'FLOP_TRIP_AMOUNT';
    const POST_TYPE_IS_CONNECTED_TO_CENTRAL = 'IS_CONNECTED_TO_CENTRAL';
    const POST_TYPE_ID_FOR_PROFIT_AND_LOSS_ACCOUNT = 'ID_FOR_PROFIT_AND_LOSS_ACCOUNT';
    const POST_TYPE_DESCRIPTION_PROFIT_AND_LOSS_ACCOUNT = 'DESCRIPTION_PROFIT_AND_LOSS_ACCOUNT';
    const POST_TYPE_MUNICIPALITY_NUMBER = 'MUNICIPALITY_NUMBER';
    const POST_TYPE_OPENING_BALANCE = 'OPENING_BALANCE';
    const POST_TYPE_PROFIT_SALES_WITHDRAWAL_OTHER_REALIZATIONS = 'PROFIT_SALES_WITHDRAWAL_OTHER_REALIZATIONS';
    const POST_TYPE_LOSS_SALES_WITHDRAWAL_OTHER_REALIZATIONS = 'LOSS_SALES_WITHDRAWAL_OTHER_REALIZATIONS';
    const POST_TYPE_PROFIT_REALIZATIONS_LIVESTOCK = 'PROFIT_REALIZATIONS_LIVESTOCK';
    const POST_TYPE_VALUE_ACQUIRED_PROFIT_AND_LOSS_ACCOUNT = 'VALUE_ACQUIRED_PROFIT_AND_LOSS_ACCOUNT';
    const POST_TYPE_VALUE_REALIZED_PROFIT_AND_LOSS_ACCOUNT = 'VALUE_REALIZED_PROFIT_AND_LOSS_ACCOUNT';
    const POST_TYPE_ANNUAL_INCOME_RECOGNITION_OR_DEDUCTION_BASIS = 'ANNUAL_INCOME_RECOGNITION_OR_DEDUCTION_BASIS';
    const POST_TYPE_PERCENTAGE_PROFIT_AND_LOSS_ACCOUNT = 'PERCENTAGE_PROFIT_AND_LOSS_ACCOUNT';
    const POST_TYPE_ANNUAL_INCOME_RECOGNITION = 'ANNUAL_INCOME_RECOGNITION';
    const POST_TYPE_ANNUAL_DEDUCTION = 'ANNUAL_DEDUCTION';
    const POST_TYPE_CLOSING_BALANCE = 'CLOSING_BALANCE';
    const POST_TYPE_IS_REGARDING_REALIZATION_SEPARATED_PLOT_AGRICULTURE_OR_FORESTRY = 'IS_REGARDING_REALIZATION_SEPARATED_PLOT_AGRICULTURE_OR_FORESTRY';
    const POST_TYPE_IS_REGARDING_REALIZATION_WHOLE_AGRICULTURE_OR_FORESTRY_BUSINESS = 'IS_REGARDING_REALIZATION_WHOLE_AGRICULTURE_OR_FORESTRY_BUSINESS';
    const POST_TYPE_ID_FOR_ACCOMMODATION_AND_RESTAURANT = 'ID_FOR_ACCOMMODATION_AND_RESTAURANT';
    const POST_TYPE_COVER_CHARGE_SUBJECT_TO_VAT = 'COVER_CHARGE_SUBJECT_TO_VAT';
    const POST_TYPE_COVER_CHARGE_NOT_SUBJECT_TO_VAT = 'COVER_CHARGE_NOT_SUBJECT_TO_VAT';
    const POST_TYPE_COVER_CHARGE = 'COVER_CHARGE';
    const POST_TYPE_DESCRIPTION_ACCOMMODATION_AND_RESTAURANT = 'DESCRIPTION_ACCOMMODATION_AND_RESTAURANT';
    const POST_TYPE_PRODUCT_TYPE = 'PRODUCT_TYPE';
    const POST_TYPE_OPENING_STOCK = 'OPENING_STOCK';
    const POST_TYPE_CLOSING_STOCK = 'CLOSING_STOCK';
    const POST_TYPE_PURCHASE_OF_GOODS = 'PURCHASE_OF_GOODS';
    const POST_TYPE_COST_OF_GOODS_SOLD = 'COST_OF_GOODS_SOLD';
    const POST_TYPE_SALES_REVENUE_AND_WITHDRAWALS = 'SALES_REVENUE_AND_WITHDRAWALS';
    const POST_TYPE_SALES_REVENUE_IN_CASH = 'SALES_REVENUE_IN_CASH';
    const POST_TYPE_CASH_REGISTER_SYSTEM_YEAR_OF_INITIAL_REGISTRATION = 'CASH_REGISTER_SYSTEM_YEAR_OF_INITIAL_REGISTRATION';
    const POST_TYPE_CASH_REGISTER_SYSTEM_TYPE = 'CASH_REGISTER_SYSTEM_TYPE';
    const POST_TYPE_WITHDRAWAL_OF_PRODUCTS_VALUED_AT_TURNOVER = 'WITHDRAWAL_OF_PRODUCTS_VALUED_AT_TURNOVER';
    const POST_TYPE_PRIVATE_WITHDRAWAL_ENTERED_ON_PRIVATE_ACCOUNT = 'PRIVATE_WITHDRAWAL_ENTERED_ON_PRIVATE_ACCOUNT';
    const POST_TYPE_TOTAL_WITHDRAWAL_PRODUCTS_ENTERED_AS_SALES_REVENUE = 'TOTAL_WITHDRAWAL_PRODUCTS_ENTERED_AS_SALES_REVENUE';
    const POST_TYPE_WITHDRAWAL_COST_FOR_ENTERTAINMENT = 'WITHDRAWAL_COST_FOR_ENTERTAINMENT';
    const POST_TYPE_WITHDRAWAL_VALUE_VALUED_AT_MARKET_VALUE = 'WITHDRAWAL_VALUE_VALUED_AT_MARKET_VALUE';
    const POST_TYPE_MARKUP_WITHDRAWAL_COST_FOR_ENTERTAINMENT = 'MARKUP_WITHDRAWAL_COST_FOR_ENTERTAINMENT';
    const POST_TYPE_TOTAL_WITHDRAWAL_COST_FOR_ENTERTAINMENT = 'TOTAL_WITHDRAWAL_COST_FOR_ENTERTAINMENT';
    const POST_TYPE_OPENING_BALANCE_CREDITSALES = 'OPENING_BALANCE_CREDITSALES';
    const POST_TYPE_CLOSING_BALANCE_CREDITSALES = 'CLOSING_BALANCE_CREDITSALES';
    const POST_TYPE_OPENING_BALANCE_WRITE_DOWN_NEW_COMPANY = 'OPENING_BALANCE_WRITE_DOWN_NEW_COMPANY';
    const POST_TYPE_CLOSING_BALANCE_WRITE_DOWN_NEW_COMPANY = 'CLOSING_BALANCE_WRITE_DOWN_NEW_COMPANY';
    const POST_TYPE_OPENING_BALANCE_RAW_MATERIAL_AND_SEMIFINISHED_PRODUCTS = 'OPENING_BALANCE_RAW_MATERIAL_AND_SEMIFINISHED_PRODUCTS';
    const POST_TYPE_CLOSING_BALANCE_RAW_MATERIAL_AND_SEMIFINISHED_PRODUCTS = 'CLOSING_BALANCE_RAW_MATERIAL_AND_SEMIFINISHED_PRODUCTS';
    const POST_TYPE_OPENING_BALANCE_PRODUCT_UNDER_MANUFACTURING = 'OPENING_BALANCE_PRODUCT_UNDER_MANUFACTURING';
    const POST_TYPE_CLOSING_BALANCE_PRODUCT_UNDER_MANUFACTURING = 'CLOSING_BALANCE_PRODUCT_UNDER_MANUFACTURING';
    const POST_TYPE_OPENING_BALANCE_INVENTORIES_FINISHED_ITEM = 'OPENING_BALANCE_INVENTORIES_FINISHED_ITEM';
    const POST_TYPE_CLOSING_BALANCE_INVENTORIES_FINISHED_ITEM = 'CLOSING_BALANCE_INVENTORIES_FINISHED_ITEM';
    const POST_TYPE_OPENING_BALANCE_PURCHASED_ITEM_FOR_RESALE = 'OPENING_BALANCE_PURCHASED_ITEM_FOR_RESALE';
    const POST_TYPE_CLOSING_BALANCE_PURCHASED_ITEM_FOR_RESALE = 'CLOSING_BALANCE_PURCHASED_ITEM_FOR_RESALE';
    const POST_TYPE_TANGIBLE_FIXED_ASSETS_TYPE = 'TANGIBLE_FIXED_ASSETS_TYPE';
    const POST_TYPE_OPENING_BALANCE_TANGIBLE_FIXED_ASSETS = 'OPENING_BALANCE_TANGIBLE_FIXED_ASSETS';
    const POST_TYPE_DEPRECIATION_PERCENTAGE = 'DEPRECIATION_PERCENTAGE';
    const POST_TYPE_STRAIGHT_LINE_DEPRECIATION = 'STRAIGHT_LINE_DEPRECIATION';
    const POST_TYPE_CASH_DEPOSITS = 'CASH_DEPOSITS';
    const POST_TYPE_CONTRIBUTIONS_IN_KIND = 'CONTRIBUTIONS_IN_KIND';
    const POST_TYPE_CAPITAL_REDUCTION_DISTRIBUTED_SHARED_CAPITAL_CASH = 'CAPITAL_REDUCTION_DISTRIBUTED_SHARED_CAPITAL_CASH';
    const POST_TYPE_CAPITAL_REDUCTION_DISTRIBUTED_SHARED_CAPITAL_OTHER_ASSETS = 'CAPITAL_REDUCTION_DISTRIBUTED_SHARED_CAPITAL_OTHER_ASSETS';
    const POST_TYPE_DEBT_WAVING = 'DEBT_WAVING';
    const POST_TYPE_BUYING_OWN_SHARES = 'BUYING_OWN_SHARES';
    const POST_TYPE_SELLING_OWN_SHARES = 'SELLING_OWN_SHARES';
    const POST_TYPE_DEBT_CONVERSION_TO_EQUITY = 'DEBT_CONVERSION_TO_EQUITY';
    const POST_TYPE_POSITIVE_DIFF_BETWEEN_ALLOCATED_AND_DISTRIBUTED_DIVIDEND = 'POSITIVE_DIFF_BETWEEN_ALLOCATED_AND_DISTRIBUTED_DIVIDEND';
    const POST_TYPE_NEGATIVE_DIFF_BETWEEN_ALLOCATED_AND_DISTRIBUTED_DIVIDEND = 'NEGATIVE_DIFF_BETWEEN_ALLOCATED_AND_DISTRIBUTED_DIVIDEND';
    const POST_TYPE_OTHER_POSITIVE_CHANGE_IN_EQUITY = 'OTHER_POSITIVE_CHANGE_IN_EQUITY';
    const POST_TYPE_OTHER_NEGATIVE_CHANGE_IN_EQUITY = 'OTHER_NEGATIVE_CHANGE_IN_EQUITY';
    const POST_TYPE_NONE_DEDUCTIBLE_COST = 'NONE_DEDUCTIBLE_COST';
    const POST_TYPE_POSITIVE_TAX_COST = 'POSITIVE_TAX_COST';
    const POST_TYPE_INTEREST_EXPENSE_FIXED_TAX = 'INTEREST_EXPENSE_FIXED_TAX';
    const POST_TYPE_SHARE_OF_LOSS_FROM_INVESTMENT = 'SHARE_OF_LOSS_FROM_INVESTMENT';
    const POST_TYPE_REVERSAL_OF_IMPAIRMENT = 'REVERSAL_OF_IMPAIRMENT';
    const POST_TYPE_ACCOUNTING_IMPAIRMENT = 'ACCOUNTING_IMPAIRMENT';
    const POST_TYPE_ACCOUNTING_LOSS = 'ACCOUNTING_LOSS';
    const POST_TYPE_ACCOUNTING_DEFICIT_NORWEAGIAN_SDF = 'ACCOUNTING_DEFICIT_NORWEAGIAN_SDF';
    const POST_TYPE_ACCOUNTING_DEFICIT_FOREIGN_SDF = 'ACCOUNTING_DEFICIT_FOREIGN_SDF';
    const POST_TYPE_ACCOUNTING_LOSS_NORWEAGIAN_SDF = 'ACCOUNTING_LOSS_NORWEAGIAN_SDF';
    const POST_TYPE_ACCOUNTING_LOSS_FOREIGN_SDF = 'ACCOUNTING_LOSS_FOREIGN_SDF';
    const POST_TYPE_RETURNED_DEBT_INTEREST = 'RETURNED_DEBT_INTEREST';
    const POST_TYPE_TAXABLE_PROFIT_REALIZATION_OF_FINANCIAL_INSTRUMENTS = 'TAXABLE_PROFIT_REALIZATION_OF_FINANCIAL_INSTRUMENTS';
    const POST_TYPE_TAXABLE_DIVIDEND_ON_SHARES = 'TAXABLE_DIVIDEND_ON_SHARES';
    const POST_TYPE_TAXABLE_PART_OF_DIVIDEND_AND_DISTRIBUTION = 'TAXABLE_PART_OF_DIVIDEND_AND_DISTRIBUTION';
    const POST_TYPE_SHARE_OF_TAXABLE_PROFIT_NORWEGIAN_SDF = 'SHARE_OF_TAXABLE_PROFIT_NORWEGIAN_SDF';
    const POST_TYPE_SHARE_OF_TAXABLE_PROFIT_FOREIGN_SDF = 'SHARE_OF_TAXABLE_PROFIT_FOREIGN_SDF';
    const POST_TYPE_TAXABLE_PROFIT_REALIZATION_OF_NORWEGIAN_SDF = 'TAXABLE_PROFIT_REALIZATION_OF_NORWEGIAN_SDF';
    const POST_TYPE_TAXABLE_PROFIT_REALIZATION_OF_FOREIGN_SDF = 'TAXABLE_PROFIT_REALIZATION_OF_FOREIGN_SDF';
    const POST_TYPE_ADDITION_INTEREST_COST = 'ADDITION_INTEREST_COST';
    const POST_TYPE_CORRECTION_PURPOSED_DIVIDEND = 'CORRECTION_PURPOSED_DIVIDEND';
    const POST_TYPE_TAXABLE_PROFIT_WITHDRAWAL_NORWEGIAN_TAX_AREA = 'TAXABLE_PROFIT_WITHDRAWAL_NORWEGIAN_TAX_AREA';
    const POST_TYPE_INCOME_SUPPLEMENT_FOR_CONVERSION_DIFFERENCE = 'INCOME_SUPPLEMENT_FOR_CONVERSION_DIFFERENCE';
    const POST_TYPE_OTHER_INCOME_SUPPLEMENT = 'OTHER_INCOME_SUPPLEMENT';
    const POST_TYPE_RETURN_OF_INCOME_RELATED_DIVIDENDS = 'RETURN_OF_INCOME_RELATED_DIVIDENDS';
    const POST_TYPE_PROFIT_AND_LOSS_GROUP_CONTRIBUTION = 'PROFIT_AND_LOSS_GROUP_CONTRIBUTION';
    const POST_TYPE_ACCOUNTING_PROFIT_REALIZATION_OF_FINANCIAL_INSTRUMENTS = 'ACCOUNTING_PROFIT_REALIZATION_OF_FINANCIAL_INSTRUMENTS';
    const POST_TYPE_ACCOUNTING_PROFIT_SHARE_NORWEGIAN_SDF = 'ACCOUNTING_PROFIT_SHARE_NORWEGIAN_SDF';
    const POST_TYPE_ACCOUNTING_PROFIT_SHARE_FOREIGN_SDF = 'ACCOUNTING_PROFIT_SHARE_FOREIGN_SDF';
    const POST_TYPE_ACCOUNTING_GAIN_NORWEGIAN_SDF = 'ACCOUNTING_GAIN_NORWEGIAN_SDF';
    const POST_TYPE_ACCOUNTING_GAIN_FOREIGN_SDF = 'ACCOUNTING_GAIN_FOREIGN_SDF';
    const POST_TYPE_DEDUCTIBLE_LOSS_ON_REALIZATION_OF_FINANCIAL_INSTRUMENTS = 'DEDUCTIBLE_LOSS_ON_REALIZATION_OF_FINANCIAL_INSTRUMENTS';
    const POST_TYPE_SHARE_OF_DEDUCTIBLE_DEFICIT_NORWEGIAN_SDF = 'SHARE_OF_DEDUCTIBLE_DEFICIT_NORWEGIAN_SDF';
    const POST_TYPE_SHARE_OF_DEDUCTIBLE_DEFICIT_FOREIGN_SDF = 'SHARE_OF_DEDUCTIBLE_DEFICIT_FOREIGN_SDF';
    const POST_TYPE_DEDUCTIBLE_LOSS_ON_REALIXATION_NORWEGIAN_SDF = 'DEDUCTIBLE_LOSS_ON_REALIXATION_NORWEGIAN_SDF';
    const POST_TYPE_DEDUCTIBLE_LOSS_ON_REALIXATION_FOREIGN_SDF = 'DEDUCTIBLE_LOSS_ON_REALIXATION_FOREIGN_SDF';
    const POST_TYPE_DEDUCTIBLE_LOSS_ON_WITHDRAWAL_NORWEGIAN_TAX_AREA = 'DEDUCTIBLE_LOSS_ON_WITHDRAWAL_NORWEGIAN_TAX_AREA';
    const POST_TYPE_ISSUE_AND_ESTABLISHMENT_COST = 'ISSUE_AND_ESTABLISHMENT_COST';
    const POST_TYPE_INCOME_DEDUCTION_FROM_ACCOUNTING_CURRENCY_TO_NOK = 'INCOME_DEDUCTION_FROM_ACCOUNTING_CURRENCY_TO_NOK';
    const POST_TYPE_OTHER_INCOME_DEDUCTION = 'OTHER_INCOME_DEDUCTION';
    const POST_TYPE_TEMPORARY_DIFFERENCES_TYPE = 'TEMPORARY_DIFFERENCES_TYPE';
    const POST_TYPE_OPENING_BALANCE_ACCOUNTABLE_VALUE = 'OPENING_BALANCE_ACCOUNTABLE_VALUE';
    const POST_TYPE_CLOSING_BALANCE_ACCOUNTABLE_VALUE = 'CLOSING_BALANCE_ACCOUNTABLE_VALUE';
    const POST_TYPE_OPENING_BALANCE_TAX_VALUE = 'OPENING_BALANCE_TAX_VALUE';
    const POST_TYPE_CLOSING_BALANCE_TAX_VALUE = 'CLOSING_BALANCE_TAX_VALUE';
    const POST_TYPE_OPENING_BALANCE_DIFFERENCES = 'OPENING_BALANCE_DIFFERENCES';
    const POST_TYPE_CLOSING_BALANCE_DIFFERENCES = 'CLOSING_BALANCE_DIFFERENCES';
    const POST_TYPE_SHOW_PROFIT_AND_LOSS = 'SHOW_PROFIT_AND_LOSS';
    const POST_TYPE_SHOW_ACCOMMODATION_AND_RESTAURANT = 'SHOW_ACCOMMODATION_AND_RESTAURANT';
    const POST_TYPE_IS_ACCOUNTABLE = 'IS_ACCOUNTABLE';
    const POST_TYPE_USE_ACCOUNTING_VALUES_IN_INVENTORIES = 'USE_ACCOUNTING_VALUES_IN_INVENTORIES';
    const POST_TYPE_USE_ACCOUNTING_VALUES_IN_CUSTOMER_RECEIVABLES = 'USE_ACCOUNTING_VALUES_IN_CUSTOMER_RECEIVABLES';
    const POST_TYPE_SHOW_TANGIBLE_FIXED_ASSET = 'SHOW_TANGIBLE_FIXED_ASSET';
    const POST_TYPE_SHOW_CAR = 'SHOW_CAR';
    const POST_TYPE_SHOW_INVENTORIES = 'SHOW_INVENTORIES';
    const POST_TYPE_SHOW_CUSTOMER_RECEIVABLES = 'SHOW_CUSTOMER_RECEIVABLES';
    const POST_TYPE_SHOW_CONCERN_RELATION = 'SHOW_CONCERN_RELATION';
    const POST_TYPE_OWN_BUSINESS_PROPERTIES = 'OWN_BUSINESS_PROPERTIES';
    const POST_TYPE_OWN_ASSET_PAPIR = 'OWN_ASSET_PAPIR';
    const POST_TYPE_TRANSFERED_BY = 'TRANSFERED_BY';
    const POST_TYPE_TRANSFERED_DATE = 'TRANSFERED_DATE';
    const POST_TYPE_YEAR_END_BRREG_DOC_ID = 'YEAR_END_BRREG_DOC_ID';
    const POST_TYPE_YEAR_END_BRREG_DOC_FETCHER_NAME = 'YEAR_END_BRREG_DOC_FETCHER_NAME';
    const POST_TYPE_SET_ACCOUNTANT_REVISED = 'SET_ACCOUNTANT_REVISED';
    const POST_TYPE_RECEIVER_ORG_NR = 'RECEIVER_ORG_NR';
    const POST_TYPE_RECEIVER_NAME = 'RECEIVER_NAME';
    const POST_TYPE_CONCERN_CONNECTION = 'CONCERN_CONNECTION';
    const POST_TYPE_VOTING_LIMIT = 'VOTING_LIMIT';
    const POST_TYPE_DATE_OF_ACQUISITION = 'DATE_OF_ACQUISITION';
    const POST_TYPE_RECEIVED_GROUP_CONTRIBUTIONS_WITH_TAX_AFFECTION = 'RECEIVED_GROUP_CONTRIBUTIONS_WITH_TAX_AFFECTION';
    const POST_TYPE_RECEIVED_GROUP_CONTRIBUTIONS_WITHOUT_TAX_AFFECTION = 'RECEIVED_GROUP_CONTRIBUTIONS_WITHOUT_TAX_AFFECTION';
    const POST_TYPE_SUBMITTED_GROUP_CONTRIBUTIONS_WITH_TAX_AFFECTION = 'SUBMITTED_GROUP_CONTRIBUTIONS_WITH_TAX_AFFECTION';
    const POST_TYPE_SUBMITTED_GROUP_CONTRIBUTIONS_WITHOUT_TAX_AFFECTION = 'SUBMITTED_GROUP_CONTRIBUTIONS_WITHOUT_TAX_AFFECTION';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getPostTypeAllowableValues()
    {
        return [
            self::POST_TYPE_REGISTRATION_NUMBER,
            self::POST_TYPE_DESCRIPTION,
            self::POST_TYPE_VEHICLE_TYPE,
            self::POST_TYPE_YEAR_OF_INITIAL_REGISTRATION,
            self::POST_TYPE_LIST_PRICE,
            self::POST_TYPE_DATE_FROM,
            self::POST_TYPE_DATE_TO,
            self::POST_TYPE_LICENCE,
            self::POST_TYPE_LICENCE_NUMBER,
            self::POST_TYPE_IS_ELECTRONIC_VEHICLE_LOGBOOK_LOGGED,
            self::POST_TYPE_NO_OF_KILOMETRES_TOTAL,
            self::POST_TYPE_OPERATING_EXPENSES,
            self::POST_TYPE_LEASING_RENT,
            self::POST_TYPE_IS_COMPANY_VEHICLE_USED_PRIVATE,
            self::POST_TYPE_NO_OF_KILOMETRES_PRIVATE,
            self::POST_TYPE_DEPRECIATION_PRIVATE_USE,
            self::POST_TYPE_REVERSED_VEHICLE_EXPENSES,
            self::POST_TYPE_NO_OF_LITER_FUEL,
            self::POST_TYPE_TAXIMETER_TYPE,
            self::POST_TYPE_INCOME_PERSONAL_TRANSPORT,
            self::POST_TYPE_INCOME_GOODS_TRANSPORT,
            self::POST_TYPE_DRIVING_INCOME_PAYED_IN_CASH,
            self::POST_TYPE_DRIVING_INCOME_INVOICED_PUBLIC_AGENCIES,
            self::POST_TYPE_TIP_PAYED_WITH_CARD_OR_INVOICE,
            self::POST_TYPE_TIP_PAYED_IN_CASH,
            self::POST_TYPE_NO_OF_KILOMETRES_SCHOOL_CHILDREN,
            self::POST_TYPE_NO_OF_KILOMETRES_WITH_PASSENGER,
            self::POST_TYPE_FLOP_TRIP_AMOUNT,
            self::POST_TYPE_IS_CONNECTED_TO_CENTRAL,
            self::POST_TYPE_ID_FOR_PROFIT_AND_LOSS_ACCOUNT,
            self::POST_TYPE_DESCRIPTION_PROFIT_AND_LOSS_ACCOUNT,
            self::POST_TYPE_MUNICIPALITY_NUMBER,
            self::POST_TYPE_OPENING_BALANCE,
            self::POST_TYPE_PROFIT_SALES_WITHDRAWAL_OTHER_REALIZATIONS,
            self::POST_TYPE_LOSS_SALES_WITHDRAWAL_OTHER_REALIZATIONS,
            self::POST_TYPE_PROFIT_REALIZATIONS_LIVESTOCK,
            self::POST_TYPE_VALUE_ACQUIRED_PROFIT_AND_LOSS_ACCOUNT,
            self::POST_TYPE_VALUE_REALIZED_PROFIT_AND_LOSS_ACCOUNT,
            self::POST_TYPE_ANNUAL_INCOME_RECOGNITION_OR_DEDUCTION_BASIS,
            self::POST_TYPE_PERCENTAGE_PROFIT_AND_LOSS_ACCOUNT,
            self::POST_TYPE_ANNUAL_INCOME_RECOGNITION,
            self::POST_TYPE_ANNUAL_DEDUCTION,
            self::POST_TYPE_CLOSING_BALANCE,
            self::POST_TYPE_IS_REGARDING_REALIZATION_SEPARATED_PLOT_AGRICULTURE_OR_FORESTRY,
            self::POST_TYPE_IS_REGARDING_REALIZATION_WHOLE_AGRICULTURE_OR_FORESTRY_BUSINESS,
            self::POST_TYPE_ID_FOR_ACCOMMODATION_AND_RESTAURANT,
            self::POST_TYPE_COVER_CHARGE_SUBJECT_TO_VAT,
            self::POST_TYPE_COVER_CHARGE_NOT_SUBJECT_TO_VAT,
            self::POST_TYPE_COVER_CHARGE,
            self::POST_TYPE_DESCRIPTION_ACCOMMODATION_AND_RESTAURANT,
            self::POST_TYPE_PRODUCT_TYPE,
            self::POST_TYPE_OPENING_STOCK,
            self::POST_TYPE_CLOSING_STOCK,
            self::POST_TYPE_PURCHASE_OF_GOODS,
            self::POST_TYPE_COST_OF_GOODS_SOLD,
            self::POST_TYPE_SALES_REVENUE_AND_WITHDRAWALS,
            self::POST_TYPE_SALES_REVENUE_IN_CASH,
            self::POST_TYPE_CASH_REGISTER_SYSTEM_YEAR_OF_INITIAL_REGISTRATION,
            self::POST_TYPE_CASH_REGISTER_SYSTEM_TYPE,
            self::POST_TYPE_WITHDRAWAL_OF_PRODUCTS_VALUED_AT_TURNOVER,
            self::POST_TYPE_PRIVATE_WITHDRAWAL_ENTERED_ON_PRIVATE_ACCOUNT,
            self::POST_TYPE_TOTAL_WITHDRAWAL_PRODUCTS_ENTERED_AS_SALES_REVENUE,
            self::POST_TYPE_WITHDRAWAL_COST_FOR_ENTERTAINMENT,
            self::POST_TYPE_WITHDRAWAL_VALUE_VALUED_AT_MARKET_VALUE,
            self::POST_TYPE_MARKUP_WITHDRAWAL_COST_FOR_ENTERTAINMENT,
            self::POST_TYPE_TOTAL_WITHDRAWAL_COST_FOR_ENTERTAINMENT,
            self::POST_TYPE_OPENING_BALANCE_CREDITSALES,
            self::POST_TYPE_CLOSING_BALANCE_CREDITSALES,
            self::POST_TYPE_OPENING_BALANCE_WRITE_DOWN_NEW_COMPANY,
            self::POST_TYPE_CLOSING_BALANCE_WRITE_DOWN_NEW_COMPANY,
            self::POST_TYPE_OPENING_BALANCE_RAW_MATERIAL_AND_SEMIFINISHED_PRODUCTS,
            self::POST_TYPE_CLOSING_BALANCE_RAW_MATERIAL_AND_SEMIFINISHED_PRODUCTS,
            self::POST_TYPE_OPENING_BALANCE_PRODUCT_UNDER_MANUFACTURING,
            self::POST_TYPE_CLOSING_BALANCE_PRODUCT_UNDER_MANUFACTURING,
            self::POST_TYPE_OPENING_BALANCE_INVENTORIES_FINISHED_ITEM,
            self::POST_TYPE_CLOSING_BALANCE_INVENTORIES_FINISHED_ITEM,
            self::POST_TYPE_OPENING_BALANCE_PURCHASED_ITEM_FOR_RESALE,
            self::POST_TYPE_CLOSING_BALANCE_PURCHASED_ITEM_FOR_RESALE,
            self::POST_TYPE_TANGIBLE_FIXED_ASSETS_TYPE,
            self::POST_TYPE_OPENING_BALANCE_TANGIBLE_FIXED_ASSETS,
            self::POST_TYPE_DEPRECIATION_PERCENTAGE,
            self::POST_TYPE_STRAIGHT_LINE_DEPRECIATION,
            self::POST_TYPE_CASH_DEPOSITS,
            self::POST_TYPE_CONTRIBUTIONS_IN_KIND,
            self::POST_TYPE_CAPITAL_REDUCTION_DISTRIBUTED_SHARED_CAPITAL_CASH,
            self::POST_TYPE_CAPITAL_REDUCTION_DISTRIBUTED_SHARED_CAPITAL_OTHER_ASSETS,
            self::POST_TYPE_DEBT_WAVING,
            self::POST_TYPE_BUYING_OWN_SHARES,
            self::POST_TYPE_SELLING_OWN_SHARES,
            self::POST_TYPE_DEBT_CONVERSION_TO_EQUITY,
            self::POST_TYPE_POSITIVE_DIFF_BETWEEN_ALLOCATED_AND_DISTRIBUTED_DIVIDEND,
            self::POST_TYPE_NEGATIVE_DIFF_BETWEEN_ALLOCATED_AND_DISTRIBUTED_DIVIDEND,
            self::POST_TYPE_OTHER_POSITIVE_CHANGE_IN_EQUITY,
            self::POST_TYPE_OTHER_NEGATIVE_CHANGE_IN_EQUITY,
            self::POST_TYPE_NONE_DEDUCTIBLE_COST,
            self::POST_TYPE_POSITIVE_TAX_COST,
            self::POST_TYPE_INTEREST_EXPENSE_FIXED_TAX,
            self::POST_TYPE_SHARE_OF_LOSS_FROM_INVESTMENT,
            self::POST_TYPE_REVERSAL_OF_IMPAIRMENT,
            self::POST_TYPE_ACCOUNTING_IMPAIRMENT,
            self::POST_TYPE_ACCOUNTING_LOSS,
            self::POST_TYPE_ACCOUNTING_DEFICIT_NORWEAGIAN_SDF,
            self::POST_TYPE_ACCOUNTING_DEFICIT_FOREIGN_SDF,
            self::POST_TYPE_ACCOUNTING_LOSS_NORWEAGIAN_SDF,
            self::POST_TYPE_ACCOUNTING_LOSS_FOREIGN_SDF,
            self::POST_TYPE_RETURNED_DEBT_INTEREST,
            self::POST_TYPE_TAXABLE_PROFIT_REALIZATION_OF_FINANCIAL_INSTRUMENTS,
            self::POST_TYPE_TAXABLE_DIVIDEND_ON_SHARES,
            self::POST_TYPE_TAXABLE_PART_OF_DIVIDEND_AND_DISTRIBUTION,
            self::POST_TYPE_SHARE_OF_TAXABLE_PROFIT_NORWEGIAN_SDF,
            self::POST_TYPE_SHARE_OF_TAXABLE_PROFIT_FOREIGN_SDF,
            self::POST_TYPE_TAXABLE_PROFIT_REALIZATION_OF_NORWEGIAN_SDF,
            self::POST_TYPE_TAXABLE_PROFIT_REALIZATION_OF_FOREIGN_SDF,
            self::POST_TYPE_ADDITION_INTEREST_COST,
            self::POST_TYPE_CORRECTION_PURPOSED_DIVIDEND,
            self::POST_TYPE_TAXABLE_PROFIT_WITHDRAWAL_NORWEGIAN_TAX_AREA,
            self::POST_TYPE_INCOME_SUPPLEMENT_FOR_CONVERSION_DIFFERENCE,
            self::POST_TYPE_OTHER_INCOME_SUPPLEMENT,
            self::POST_TYPE_RETURN_OF_INCOME_RELATED_DIVIDENDS,
            self::POST_TYPE_PROFIT_AND_LOSS_GROUP_CONTRIBUTION,
            self::POST_TYPE_ACCOUNTING_PROFIT_REALIZATION_OF_FINANCIAL_INSTRUMENTS,
            self::POST_TYPE_ACCOUNTING_PROFIT_SHARE_NORWEGIAN_SDF,
            self::POST_TYPE_ACCOUNTING_PROFIT_SHARE_FOREIGN_SDF,
            self::POST_TYPE_ACCOUNTING_GAIN_NORWEGIAN_SDF,
            self::POST_TYPE_ACCOUNTING_GAIN_FOREIGN_SDF,
            self::POST_TYPE_DEDUCTIBLE_LOSS_ON_REALIZATION_OF_FINANCIAL_INSTRUMENTS,
            self::POST_TYPE_SHARE_OF_DEDUCTIBLE_DEFICIT_NORWEGIAN_SDF,
            self::POST_TYPE_SHARE_OF_DEDUCTIBLE_DEFICIT_FOREIGN_SDF,
            self::POST_TYPE_DEDUCTIBLE_LOSS_ON_REALIXATION_NORWEGIAN_SDF,
            self::POST_TYPE_DEDUCTIBLE_LOSS_ON_REALIXATION_FOREIGN_SDF,
            self::POST_TYPE_DEDUCTIBLE_LOSS_ON_WITHDRAWAL_NORWEGIAN_TAX_AREA,
            self::POST_TYPE_ISSUE_AND_ESTABLISHMENT_COST,
            self::POST_TYPE_INCOME_DEDUCTION_FROM_ACCOUNTING_CURRENCY_TO_NOK,
            self::POST_TYPE_OTHER_INCOME_DEDUCTION,
            self::POST_TYPE_TEMPORARY_DIFFERENCES_TYPE,
            self::POST_TYPE_OPENING_BALANCE_ACCOUNTABLE_VALUE,
            self::POST_TYPE_CLOSING_BALANCE_ACCOUNTABLE_VALUE,
            self::POST_TYPE_OPENING_BALANCE_TAX_VALUE,
            self::POST_TYPE_CLOSING_BALANCE_TAX_VALUE,
            self::POST_TYPE_OPENING_BALANCE_DIFFERENCES,
            self::POST_TYPE_CLOSING_BALANCE_DIFFERENCES,
            self::POST_TYPE_SHOW_PROFIT_AND_LOSS,
            self::POST_TYPE_SHOW_ACCOMMODATION_AND_RESTAURANT,
            self::POST_TYPE_IS_ACCOUNTABLE,
            self::POST_TYPE_USE_ACCOUNTING_VALUES_IN_INVENTORIES,
            self::POST_TYPE_USE_ACCOUNTING_VALUES_IN_CUSTOMER_RECEIVABLES,
            self::POST_TYPE_SHOW_TANGIBLE_FIXED_ASSET,
            self::POST_TYPE_SHOW_CAR,
            self::POST_TYPE_SHOW_INVENTORIES,
            self::POST_TYPE_SHOW_CUSTOMER_RECEIVABLES,
            self::POST_TYPE_SHOW_CONCERN_RELATION,
            self::POST_TYPE_OWN_BUSINESS_PROPERTIES,
            self::POST_TYPE_OWN_ASSET_PAPIR,
            self::POST_TYPE_TRANSFERED_BY,
            self::POST_TYPE_TRANSFERED_DATE,
            self::POST_TYPE_YEAR_END_BRREG_DOC_ID,
            self::POST_TYPE_YEAR_END_BRREG_DOC_FETCHER_NAME,
            self::POST_TYPE_SET_ACCOUNTANT_REVISED,
            self::POST_TYPE_RECEIVER_ORG_NR,
            self::POST_TYPE_RECEIVER_NAME,
            self::POST_TYPE_CONCERN_CONNECTION,
            self::POST_TYPE_VOTING_LIMIT,
            self::POST_TYPE_DATE_OF_ACQUISITION,
            self::POST_TYPE_RECEIVED_GROUP_CONTRIBUTIONS_WITH_TAX_AFFECTION,
            self::POST_TYPE_RECEIVED_GROUP_CONTRIBUTIONS_WITHOUT_TAX_AFFECTION,
            self::POST_TYPE_SUBMITTED_GROUP_CONTRIBUTIONS_WITH_TAX_AFFECTION,
            self::POST_TYPE_SUBMITTED_GROUP_CONTRIBUTIONS_WITHOUT_TAX_AFFECTION,
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
        $this->container['year_end_report'] = isset($data['year_end_report']) ? $data['year_end_report'] : null;
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['grouping'] = isset($data['grouping']) ? $data['grouping'] : null;
        $this->container['negate'] = isset($data['negate']) ? $data['negate'] : null;
        $this->container['read_only'] = isset($data['read_only']) ? $data['read_only'] : null;
        $this->container['source'] = isset($data['source']) ? $data['source'] : null;
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

        $allowedValues = $this->getPostTypeAllowableValues();
        if (!is_null($this->container['post_type']) && !in_array($this->container['post_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'post_type', must be one of '%s'",
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
     * Gets name
     *
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string $name name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets grouping
     *
     * @return string
     */
    public function getGrouping()
    {
        return $this->container['grouping'];
    }

    /**
     * Sets grouping
     *
     * @param string $grouping grouping
     *
     * @return $this
     */
    public function setGrouping($grouping)
    {
        $this->container['grouping'] = $grouping;

        return $this;
    }

    /**
     * Gets negate
     *
     * @return bool
     */
    public function getNegate()
    {
        return $this->container['negate'];
    }

    /**
     * Sets negate
     *
     * @param bool $negate negate
     *
     * @return $this
     */
    public function setNegate($negate)
    {
        $this->container['negate'] = $negate;

        return $this;
    }

    /**
     * Gets read_only
     *
     * @return bool
     */
    public function getReadOnly()
    {
        return $this->container['read_only'];
    }

    /**
     * Sets read_only
     *
     * @param bool $read_only read_only
     *
     * @return $this
     */
    public function setReadOnly($read_only)
    {
        $this->container['read_only'] = $read_only;

        return $this;
    }

    /**
     * Gets source
     *
     * @return string
     */
    public function getSource()
    {
        return $this->container['source'];
    }

    /**
     * Sets source
     *
     * @param string $source source
     *
     * @return $this
     */
    public function setSource($source)
    {
        $this->container['source'] = $source;

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
        if (!is_null($post_type) && !in_array($post_type, $allowedValues, true)) {
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
     * @return float
     */
    public function getPostValue()
    {
        return $this->container['post_value'];
    }

    /**
     * Sets post_value
     *
     * @param float $post_value post_value
     *
     * @return $this
     */
    public function setPostValue($post_value)
    {
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


