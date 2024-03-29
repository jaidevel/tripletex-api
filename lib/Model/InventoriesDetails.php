<?php
/**
 * InventoriesDetails
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
 * InventoriesDetails Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class InventoriesDetails implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'InventoriesDetails';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'year_end_report' => '\Swagger\Client\Model\YearEndReport',
        'name' => 'string',
        'grouping' => 'string',
        'opening_balance' => 'float',
        'closing_balance' => 'float',
        'opening_balance_tax_value' => 'float',
        'closing_balance_tax_value' => 'float',
        'opening_balance_post_type' => 'string',
        'closing_balance_post_type' => 'string'
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
        'opening_balance' => null,
        'closing_balance' => null,
        'opening_balance_tax_value' => null,
        'closing_balance_tax_value' => null,
        'opening_balance_post_type' => null,
        'closing_balance_post_type' => null
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
        'opening_balance' => 'openingBalance',
        'closing_balance' => 'closingBalance',
        'opening_balance_tax_value' => 'openingBalanceTaxValue',
        'closing_balance_tax_value' => 'closingBalanceTaxValue',
        'opening_balance_post_type' => 'openingBalancePostType',
        'closing_balance_post_type' => 'closingBalancePostType'
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
        'opening_balance' => 'setOpeningBalance',
        'closing_balance' => 'setClosingBalance',
        'opening_balance_tax_value' => 'setOpeningBalanceTaxValue',
        'closing_balance_tax_value' => 'setClosingBalanceTaxValue',
        'opening_balance_post_type' => 'setOpeningBalancePostType',
        'closing_balance_post_type' => 'setClosingBalancePostType'
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
        'opening_balance' => 'getOpeningBalance',
        'closing_balance' => 'getClosingBalance',
        'opening_balance_tax_value' => 'getOpeningBalanceTaxValue',
        'closing_balance_tax_value' => 'getClosingBalanceTaxValue',
        'opening_balance_post_type' => 'getOpeningBalancePostType',
        'closing_balance_post_type' => 'getClosingBalancePostType'
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

    const OPENING_BALANCE_POST_TYPE_REGISTRATION_NUMBER = 'REGISTRATION_NUMBER';
    const OPENING_BALANCE_POST_TYPE_DESCRIPTION = 'DESCRIPTION';
    const OPENING_BALANCE_POST_TYPE_VEHICLE_TYPE = 'VEHICLE_TYPE';
    const OPENING_BALANCE_POST_TYPE_YEAR_OF_INITIAL_REGISTRATION = 'YEAR_OF_INITIAL_REGISTRATION';
    const OPENING_BALANCE_POST_TYPE_LIST_PRICE = 'LIST_PRICE';
    const OPENING_BALANCE_POST_TYPE_DATE_FROM = 'DATE_FROM';
    const OPENING_BALANCE_POST_TYPE_DATE_TO = 'DATE_TO';
    const OPENING_BALANCE_POST_TYPE_LICENCE = 'LICENCE';
    const OPENING_BALANCE_POST_TYPE_LICENCE_NUMBER = 'LICENCE_NUMBER';
    const OPENING_BALANCE_POST_TYPE_IS_ELECTRONIC_VEHICLE_LOGBOOK_LOGGED = 'IS_ELECTRONIC_VEHICLE_LOGBOOK_LOGGED';
    const OPENING_BALANCE_POST_TYPE_NO_OF_KILOMETRES_TOTAL = 'NO_OF_KILOMETRES_TOTAL';
    const OPENING_BALANCE_POST_TYPE_OPERATING_EXPENSES = 'OPERATING_EXPENSES';
    const OPENING_BALANCE_POST_TYPE_LEASING_RENT = 'LEASING_RENT';
    const OPENING_BALANCE_POST_TYPE_IS_COMPANY_VEHICLE_USED_PRIVATE = 'IS_COMPANY_VEHICLE_USED_PRIVATE';
    const OPENING_BALANCE_POST_TYPE_NO_OF_KILOMETRES_PRIVATE = 'NO_OF_KILOMETRES_PRIVATE';
    const OPENING_BALANCE_POST_TYPE_DEPRECIATION_PRIVATE_USE = 'DEPRECIATION_PRIVATE_USE';
    const OPENING_BALANCE_POST_TYPE_REVERSED_VEHICLE_EXPENSES = 'REVERSED_VEHICLE_EXPENSES';
    const OPENING_BALANCE_POST_TYPE_NO_OF_LITER_FUEL = 'NO_OF_LITER_FUEL';
    const OPENING_BALANCE_POST_TYPE_TAXIMETER_TYPE = 'TAXIMETER_TYPE';
    const OPENING_BALANCE_POST_TYPE_INCOME_PERSONAL_TRANSPORT = 'INCOME_PERSONAL_TRANSPORT';
    const OPENING_BALANCE_POST_TYPE_INCOME_GOODS_TRANSPORT = 'INCOME_GOODS_TRANSPORT';
    const OPENING_BALANCE_POST_TYPE_DRIVING_INCOME_PAYED_IN_CASH = 'DRIVING_INCOME_PAYED_IN_CASH';
    const OPENING_BALANCE_POST_TYPE_DRIVING_INCOME_INVOICED_PUBLIC_AGENCIES = 'DRIVING_INCOME_INVOICED_PUBLIC_AGENCIES';
    const OPENING_BALANCE_POST_TYPE_TIP_PAYED_WITH_CARD_OR_INVOICE = 'TIP_PAYED_WITH_CARD_OR_INVOICE';
    const OPENING_BALANCE_POST_TYPE_TIP_PAYED_IN_CASH = 'TIP_PAYED_IN_CASH';
    const OPENING_BALANCE_POST_TYPE_NO_OF_KILOMETRES_SCHOOL_CHILDREN = 'NO_OF_KILOMETRES_SCHOOL_CHILDREN';
    const OPENING_BALANCE_POST_TYPE_NO_OF_KILOMETRES_WITH_PASSENGER = 'NO_OF_KILOMETRES_WITH_PASSENGER';
    const OPENING_BALANCE_POST_TYPE_FLOP_TRIP_AMOUNT = 'FLOP_TRIP_AMOUNT';
    const OPENING_BALANCE_POST_TYPE_IS_CONNECTED_TO_CENTRAL = 'IS_CONNECTED_TO_CENTRAL';
    const OPENING_BALANCE_POST_TYPE_ID_FOR_PROFIT_AND_LOSS_ACCOUNT = 'ID_FOR_PROFIT_AND_LOSS_ACCOUNT';
    const OPENING_BALANCE_POST_TYPE_DESCRIPTION_PROFIT_AND_LOSS_ACCOUNT = 'DESCRIPTION_PROFIT_AND_LOSS_ACCOUNT';
    const OPENING_BALANCE_POST_TYPE_MUNICIPALITY_NUMBER = 'MUNICIPALITY_NUMBER';
    const OPENING_BALANCE_POST_TYPE_OPENING_BALANCE = 'OPENING_BALANCE';
    const OPENING_BALANCE_POST_TYPE_PROFIT_SALES_WITHDRAWAL_OTHER_REALIZATIONS = 'PROFIT_SALES_WITHDRAWAL_OTHER_REALIZATIONS';
    const OPENING_BALANCE_POST_TYPE_LOSS_SALES_WITHDRAWAL_OTHER_REALIZATIONS = 'LOSS_SALES_WITHDRAWAL_OTHER_REALIZATIONS';
    const OPENING_BALANCE_POST_TYPE_PROFIT_REALIZATIONS_LIVESTOCK = 'PROFIT_REALIZATIONS_LIVESTOCK';
    const OPENING_BALANCE_POST_TYPE_VALUE_ACQUIRED_PROFIT_AND_LOSS_ACCOUNT = 'VALUE_ACQUIRED_PROFIT_AND_LOSS_ACCOUNT';
    const OPENING_BALANCE_POST_TYPE_VALUE_REALIZED_PROFIT_AND_LOSS_ACCOUNT = 'VALUE_REALIZED_PROFIT_AND_LOSS_ACCOUNT';
    const OPENING_BALANCE_POST_TYPE_ANNUAL_INCOME_RECOGNITION_OR_DEDUCTION_BASIS = 'ANNUAL_INCOME_RECOGNITION_OR_DEDUCTION_BASIS';
    const OPENING_BALANCE_POST_TYPE_PERCENTAGE_PROFIT_AND_LOSS_ACCOUNT = 'PERCENTAGE_PROFIT_AND_LOSS_ACCOUNT';
    const OPENING_BALANCE_POST_TYPE_ANNUAL_INCOME_RECOGNITION = 'ANNUAL_INCOME_RECOGNITION';
    const OPENING_BALANCE_POST_TYPE_ANNUAL_DEDUCTION = 'ANNUAL_DEDUCTION';
    const OPENING_BALANCE_POST_TYPE_CLOSING_BALANCE = 'CLOSING_BALANCE';
    const OPENING_BALANCE_POST_TYPE_IS_REGARDING_REALIZATION_SEPARATED_PLOT_AGRICULTURE_OR_FORESTRY = 'IS_REGARDING_REALIZATION_SEPARATED_PLOT_AGRICULTURE_OR_FORESTRY';
    const OPENING_BALANCE_POST_TYPE_IS_REGARDING_REALIZATION_WHOLE_AGRICULTURE_OR_FORESTRY_BUSINESS = 'IS_REGARDING_REALIZATION_WHOLE_AGRICULTURE_OR_FORESTRY_BUSINESS';
    const OPENING_BALANCE_POST_TYPE_ID_FOR_ACCOMMODATION_AND_RESTAURANT = 'ID_FOR_ACCOMMODATION_AND_RESTAURANT';
    const OPENING_BALANCE_POST_TYPE_COVER_CHARGE_SUBJECT_TO_VAT = 'COVER_CHARGE_SUBJECT_TO_VAT';
    const OPENING_BALANCE_POST_TYPE_COVER_CHARGE_NOT_SUBJECT_TO_VAT = 'COVER_CHARGE_NOT_SUBJECT_TO_VAT';
    const OPENING_BALANCE_POST_TYPE_COVER_CHARGE = 'COVER_CHARGE';
    const OPENING_BALANCE_POST_TYPE_DESCRIPTION_ACCOMMODATION_AND_RESTAURANT = 'DESCRIPTION_ACCOMMODATION_AND_RESTAURANT';
    const OPENING_BALANCE_POST_TYPE_PRODUCT_TYPE = 'PRODUCT_TYPE';
    const OPENING_BALANCE_POST_TYPE_OPENING_STOCK = 'OPENING_STOCK';
    const OPENING_BALANCE_POST_TYPE_CLOSING_STOCK = 'CLOSING_STOCK';
    const OPENING_BALANCE_POST_TYPE_PURCHASE_OF_GOODS = 'PURCHASE_OF_GOODS';
    const OPENING_BALANCE_POST_TYPE_COST_OF_GOODS_SOLD = 'COST_OF_GOODS_SOLD';
    const OPENING_BALANCE_POST_TYPE_SALES_REVENUE_AND_WITHDRAWALS = 'SALES_REVENUE_AND_WITHDRAWALS';
    const OPENING_BALANCE_POST_TYPE_SALES_REVENUE_IN_CASH = 'SALES_REVENUE_IN_CASH';
    const OPENING_BALANCE_POST_TYPE_CASH_REGISTER_SYSTEM_YEAR_OF_INITIAL_REGISTRATION = 'CASH_REGISTER_SYSTEM_YEAR_OF_INITIAL_REGISTRATION';
    const OPENING_BALANCE_POST_TYPE_CASH_REGISTER_SYSTEM_TYPE = 'CASH_REGISTER_SYSTEM_TYPE';
    const OPENING_BALANCE_POST_TYPE_WITHDRAWAL_OF_PRODUCTS_VALUED_AT_TURNOVER = 'WITHDRAWAL_OF_PRODUCTS_VALUED_AT_TURNOVER';
    const OPENING_BALANCE_POST_TYPE_PRIVATE_WITHDRAWAL_ENTERED_ON_PRIVATE_ACCOUNT = 'PRIVATE_WITHDRAWAL_ENTERED_ON_PRIVATE_ACCOUNT';
    const OPENING_BALANCE_POST_TYPE_TOTAL_WITHDRAWAL_PRODUCTS_ENTERED_AS_SALES_REVENUE = 'TOTAL_WITHDRAWAL_PRODUCTS_ENTERED_AS_SALES_REVENUE';
    const OPENING_BALANCE_POST_TYPE_WITHDRAWAL_COST_FOR_ENTERTAINMENT = 'WITHDRAWAL_COST_FOR_ENTERTAINMENT';
    const OPENING_BALANCE_POST_TYPE_WITHDRAWAL_VALUE_VALUED_AT_MARKET_VALUE = 'WITHDRAWAL_VALUE_VALUED_AT_MARKET_VALUE';
    const OPENING_BALANCE_POST_TYPE_MARKUP_WITHDRAWAL_COST_FOR_ENTERTAINMENT = 'MARKUP_WITHDRAWAL_COST_FOR_ENTERTAINMENT';
    const OPENING_BALANCE_POST_TYPE_TOTAL_WITHDRAWAL_COST_FOR_ENTERTAINMENT = 'TOTAL_WITHDRAWAL_COST_FOR_ENTERTAINMENT';
    const OPENING_BALANCE_POST_TYPE_OPENING_BALANCE_CREDITSALES = 'OPENING_BALANCE_CREDITSALES';
    const OPENING_BALANCE_POST_TYPE_CLOSING_BALANCE_CREDITSALES = 'CLOSING_BALANCE_CREDITSALES';
    const OPENING_BALANCE_POST_TYPE_OPENING_BALANCE_WRITE_DOWN_NEW_COMPANY = 'OPENING_BALANCE_WRITE_DOWN_NEW_COMPANY';
    const OPENING_BALANCE_POST_TYPE_CLOSING_BALANCE_WRITE_DOWN_NEW_COMPANY = 'CLOSING_BALANCE_WRITE_DOWN_NEW_COMPANY';
    const OPENING_BALANCE_POST_TYPE_OPENING_BALANCE_RAW_MATERIAL_AND_SEMIFINISHED_PRODUCTS = 'OPENING_BALANCE_RAW_MATERIAL_AND_SEMIFINISHED_PRODUCTS';
    const OPENING_BALANCE_POST_TYPE_CLOSING_BALANCE_RAW_MATERIAL_AND_SEMIFINISHED_PRODUCTS = 'CLOSING_BALANCE_RAW_MATERIAL_AND_SEMIFINISHED_PRODUCTS';
    const OPENING_BALANCE_POST_TYPE_OPENING_BALANCE_PRODUCT_UNDER_MANUFACTURING = 'OPENING_BALANCE_PRODUCT_UNDER_MANUFACTURING';
    const OPENING_BALANCE_POST_TYPE_CLOSING_BALANCE_PRODUCT_UNDER_MANUFACTURING = 'CLOSING_BALANCE_PRODUCT_UNDER_MANUFACTURING';
    const OPENING_BALANCE_POST_TYPE_OPENING_BALANCE_INVENTORIES_FINISHED_ITEM = 'OPENING_BALANCE_INVENTORIES_FINISHED_ITEM';
    const OPENING_BALANCE_POST_TYPE_CLOSING_BALANCE_INVENTORIES_FINISHED_ITEM = 'CLOSING_BALANCE_INVENTORIES_FINISHED_ITEM';
    const OPENING_BALANCE_POST_TYPE_OPENING_BALANCE_PURCHASED_ITEM_FOR_RESALE = 'OPENING_BALANCE_PURCHASED_ITEM_FOR_RESALE';
    const OPENING_BALANCE_POST_TYPE_CLOSING_BALANCE_PURCHASED_ITEM_FOR_RESALE = 'CLOSING_BALANCE_PURCHASED_ITEM_FOR_RESALE';
    const OPENING_BALANCE_POST_TYPE_TANGIBLE_FIXED_ASSETS_TYPE = 'TANGIBLE_FIXED_ASSETS_TYPE';
    const OPENING_BALANCE_POST_TYPE_OPENING_BALANCE_TANGIBLE_FIXED_ASSETS = 'OPENING_BALANCE_TANGIBLE_FIXED_ASSETS';
    const OPENING_BALANCE_POST_TYPE_DEPRECIATION_PERCENTAGE = 'DEPRECIATION_PERCENTAGE';
    const OPENING_BALANCE_POST_TYPE_STRAIGHT_LINE_DEPRECIATION = 'STRAIGHT_LINE_DEPRECIATION';
    const OPENING_BALANCE_POST_TYPE_CASH_DEPOSITS = 'CASH_DEPOSITS';
    const OPENING_BALANCE_POST_TYPE_CONTRIBUTIONS_IN_KIND = 'CONTRIBUTIONS_IN_KIND';
    const OPENING_BALANCE_POST_TYPE_CAPITAL_REDUCTION_DISTRIBUTED_SHARED_CAPITAL_CASH = 'CAPITAL_REDUCTION_DISTRIBUTED_SHARED_CAPITAL_CASH';
    const OPENING_BALANCE_POST_TYPE_CAPITAL_REDUCTION_DISTRIBUTED_SHARED_CAPITAL_OTHER_ASSETS = 'CAPITAL_REDUCTION_DISTRIBUTED_SHARED_CAPITAL_OTHER_ASSETS';
    const OPENING_BALANCE_POST_TYPE_DEBT_WAVING = 'DEBT_WAVING';
    const OPENING_BALANCE_POST_TYPE_BUYING_OWN_SHARES = 'BUYING_OWN_SHARES';
    const OPENING_BALANCE_POST_TYPE_SELLING_OWN_SHARES = 'SELLING_OWN_SHARES';
    const OPENING_BALANCE_POST_TYPE_DEBT_CONVERSION_TO_EQUITY = 'DEBT_CONVERSION_TO_EQUITY';
    const OPENING_BALANCE_POST_TYPE_POSITIVE_DIFF_BETWEEN_ALLOCATED_AND_DISTRIBUTED_DIVIDEND = 'POSITIVE_DIFF_BETWEEN_ALLOCATED_AND_DISTRIBUTED_DIVIDEND';
    const OPENING_BALANCE_POST_TYPE_NEGATIVE_DIFF_BETWEEN_ALLOCATED_AND_DISTRIBUTED_DIVIDEND = 'NEGATIVE_DIFF_BETWEEN_ALLOCATED_AND_DISTRIBUTED_DIVIDEND';
    const OPENING_BALANCE_POST_TYPE_OTHER_POSITIVE_CHANGE_IN_EQUITY = 'OTHER_POSITIVE_CHANGE_IN_EQUITY';
    const OPENING_BALANCE_POST_TYPE_OTHER_NEGATIVE_CHANGE_IN_EQUITY = 'OTHER_NEGATIVE_CHANGE_IN_EQUITY';
    const OPENING_BALANCE_POST_TYPE_NONE_DEDUCTIBLE_COST = 'NONE_DEDUCTIBLE_COST';
    const OPENING_BALANCE_POST_TYPE_POSITIVE_TAX_COST = 'POSITIVE_TAX_COST';
    const OPENING_BALANCE_POST_TYPE_INTEREST_EXPENSE_FIXED_TAX = 'INTEREST_EXPENSE_FIXED_TAX';
    const OPENING_BALANCE_POST_TYPE_SHARE_OF_LOSS_FROM_INVESTMENT = 'SHARE_OF_LOSS_FROM_INVESTMENT';
    const OPENING_BALANCE_POST_TYPE_REVERSAL_OF_IMPAIRMENT = 'REVERSAL_OF_IMPAIRMENT';
    const OPENING_BALANCE_POST_TYPE_ACCOUNTING_IMPAIRMENT = 'ACCOUNTING_IMPAIRMENT';
    const OPENING_BALANCE_POST_TYPE_ACCOUNTING_LOSS = 'ACCOUNTING_LOSS';
    const OPENING_BALANCE_POST_TYPE_ACCOUNTING_DEFICIT_NORWEAGIAN_SDF = 'ACCOUNTING_DEFICIT_NORWEAGIAN_SDF';
    const OPENING_BALANCE_POST_TYPE_ACCOUNTING_DEFICIT_FOREIGN_SDF = 'ACCOUNTING_DEFICIT_FOREIGN_SDF';
    const OPENING_BALANCE_POST_TYPE_ACCOUNTING_LOSS_NORWEAGIAN_SDF = 'ACCOUNTING_LOSS_NORWEAGIAN_SDF';
    const OPENING_BALANCE_POST_TYPE_ACCOUNTING_LOSS_FOREIGN_SDF = 'ACCOUNTING_LOSS_FOREIGN_SDF';
    const OPENING_BALANCE_POST_TYPE_RETURNED_DEBT_INTEREST = 'RETURNED_DEBT_INTEREST';
    const OPENING_BALANCE_POST_TYPE_TAXABLE_PROFIT_REALIZATION_OF_FINANCIAL_INSTRUMENTS = 'TAXABLE_PROFIT_REALIZATION_OF_FINANCIAL_INSTRUMENTS';
    const OPENING_BALANCE_POST_TYPE_TAXABLE_DIVIDEND_ON_SHARES = 'TAXABLE_DIVIDEND_ON_SHARES';
    const OPENING_BALANCE_POST_TYPE_TAXABLE_PART_OF_DIVIDEND_AND_DISTRIBUTION = 'TAXABLE_PART_OF_DIVIDEND_AND_DISTRIBUTION';
    const OPENING_BALANCE_POST_TYPE_SHARE_OF_TAXABLE_PROFIT_NORWEGIAN_SDF = 'SHARE_OF_TAXABLE_PROFIT_NORWEGIAN_SDF';
    const OPENING_BALANCE_POST_TYPE_SHARE_OF_TAXABLE_PROFIT_FOREIGN_SDF = 'SHARE_OF_TAXABLE_PROFIT_FOREIGN_SDF';
    const OPENING_BALANCE_POST_TYPE_TAXABLE_PROFIT_REALIZATION_OF_NORWEGIAN_SDF = 'TAXABLE_PROFIT_REALIZATION_OF_NORWEGIAN_SDF';
    const OPENING_BALANCE_POST_TYPE_TAXABLE_PROFIT_REALIZATION_OF_FOREIGN_SDF = 'TAXABLE_PROFIT_REALIZATION_OF_FOREIGN_SDF';
    const OPENING_BALANCE_POST_TYPE_ADDITION_INTEREST_COST = 'ADDITION_INTEREST_COST';
    const OPENING_BALANCE_POST_TYPE_CORRECTION_PURPOSED_DIVIDEND = 'CORRECTION_PURPOSED_DIVIDEND';
    const OPENING_BALANCE_POST_TYPE_TAXABLE_PROFIT_WITHDRAWAL_NORWEGIAN_TAX_AREA = 'TAXABLE_PROFIT_WITHDRAWAL_NORWEGIAN_TAX_AREA';
    const OPENING_BALANCE_POST_TYPE_INCOME_SUPPLEMENT_FOR_CONVERSION_DIFFERENCE = 'INCOME_SUPPLEMENT_FOR_CONVERSION_DIFFERENCE';
    const OPENING_BALANCE_POST_TYPE_OTHER_INCOME_SUPPLEMENT = 'OTHER_INCOME_SUPPLEMENT';
    const OPENING_BALANCE_POST_TYPE_RETURN_OF_INCOME_RELATED_DIVIDENDS = 'RETURN_OF_INCOME_RELATED_DIVIDENDS';
    const OPENING_BALANCE_POST_TYPE_PROFIT_AND_LOSS_GROUP_CONTRIBUTION = 'PROFIT_AND_LOSS_GROUP_CONTRIBUTION';
    const OPENING_BALANCE_POST_TYPE_ACCOUNTING_PROFIT_REALIZATION_OF_FINANCIAL_INSTRUMENTS = 'ACCOUNTING_PROFIT_REALIZATION_OF_FINANCIAL_INSTRUMENTS';
    const OPENING_BALANCE_POST_TYPE_ACCOUNTING_PROFIT_SHARE_NORWEGIAN_SDF = 'ACCOUNTING_PROFIT_SHARE_NORWEGIAN_SDF';
    const OPENING_BALANCE_POST_TYPE_ACCOUNTING_PROFIT_SHARE_FOREIGN_SDF = 'ACCOUNTING_PROFIT_SHARE_FOREIGN_SDF';
    const OPENING_BALANCE_POST_TYPE_ACCOUNTING_GAIN_NORWEGIAN_SDF = 'ACCOUNTING_GAIN_NORWEGIAN_SDF';
    const OPENING_BALANCE_POST_TYPE_ACCOUNTING_GAIN_FOREIGN_SDF = 'ACCOUNTING_GAIN_FOREIGN_SDF';
    const OPENING_BALANCE_POST_TYPE_DEDUCTIBLE_LOSS_ON_REALIZATION_OF_FINANCIAL_INSTRUMENTS = 'DEDUCTIBLE_LOSS_ON_REALIZATION_OF_FINANCIAL_INSTRUMENTS';
    const OPENING_BALANCE_POST_TYPE_SHARE_OF_DEDUCTIBLE_DEFICIT_NORWEGIAN_SDF = 'SHARE_OF_DEDUCTIBLE_DEFICIT_NORWEGIAN_SDF';
    const OPENING_BALANCE_POST_TYPE_SHARE_OF_DEDUCTIBLE_DEFICIT_FOREIGN_SDF = 'SHARE_OF_DEDUCTIBLE_DEFICIT_FOREIGN_SDF';
    const OPENING_BALANCE_POST_TYPE_DEDUCTIBLE_LOSS_ON_REALIXATION_NORWEGIAN_SDF = 'DEDUCTIBLE_LOSS_ON_REALIXATION_NORWEGIAN_SDF';
    const OPENING_BALANCE_POST_TYPE_DEDUCTIBLE_LOSS_ON_REALIXATION_FOREIGN_SDF = 'DEDUCTIBLE_LOSS_ON_REALIXATION_FOREIGN_SDF';
    const OPENING_BALANCE_POST_TYPE_DEDUCTIBLE_LOSS_ON_WITHDRAWAL_NORWEGIAN_TAX_AREA = 'DEDUCTIBLE_LOSS_ON_WITHDRAWAL_NORWEGIAN_TAX_AREA';
    const OPENING_BALANCE_POST_TYPE_ISSUE_AND_ESTABLISHMENT_COST = 'ISSUE_AND_ESTABLISHMENT_COST';
    const OPENING_BALANCE_POST_TYPE_INCOME_DEDUCTION_FROM_ACCOUNTING_CURRENCY_TO_NOK = 'INCOME_DEDUCTION_FROM_ACCOUNTING_CURRENCY_TO_NOK';
    const OPENING_BALANCE_POST_TYPE_OTHER_INCOME_DEDUCTION = 'OTHER_INCOME_DEDUCTION';
    const OPENING_BALANCE_POST_TYPE_TEMPORARY_DIFFERENCES_TYPE = 'TEMPORARY_DIFFERENCES_TYPE';
    const OPENING_BALANCE_POST_TYPE_OPENING_BALANCE_ACCOUNTABLE_VALUE = 'OPENING_BALANCE_ACCOUNTABLE_VALUE';
    const OPENING_BALANCE_POST_TYPE_CLOSING_BALANCE_ACCOUNTABLE_VALUE = 'CLOSING_BALANCE_ACCOUNTABLE_VALUE';
    const OPENING_BALANCE_POST_TYPE_OPENING_BALANCE_TAX_VALUE = 'OPENING_BALANCE_TAX_VALUE';
    const OPENING_BALANCE_POST_TYPE_CLOSING_BALANCE_TAX_VALUE = 'CLOSING_BALANCE_TAX_VALUE';
    const OPENING_BALANCE_POST_TYPE_OPENING_BALANCE_DIFFERENCES = 'OPENING_BALANCE_DIFFERENCES';
    const OPENING_BALANCE_POST_TYPE_CLOSING_BALANCE_DIFFERENCES = 'CLOSING_BALANCE_DIFFERENCES';
    const OPENING_BALANCE_POST_TYPE_SHOW_PROFIT_AND_LOSS = 'SHOW_PROFIT_AND_LOSS';
    const OPENING_BALANCE_POST_TYPE_SHOW_ACCOMMODATION_AND_RESTAURANT = 'SHOW_ACCOMMODATION_AND_RESTAURANT';
    const OPENING_BALANCE_POST_TYPE_IS_ACCOUNTABLE = 'IS_ACCOUNTABLE';
    const OPENING_BALANCE_POST_TYPE_USE_ACCOUNTING_VALUES_IN_INVENTORIES = 'USE_ACCOUNTING_VALUES_IN_INVENTORIES';
    const OPENING_BALANCE_POST_TYPE_USE_ACCOUNTING_VALUES_IN_CUSTOMER_RECEIVABLES = 'USE_ACCOUNTING_VALUES_IN_CUSTOMER_RECEIVABLES';
    const OPENING_BALANCE_POST_TYPE_SHOW_TANGIBLE_FIXED_ASSET = 'SHOW_TANGIBLE_FIXED_ASSET';
    const OPENING_BALANCE_POST_TYPE_SHOW_CAR = 'SHOW_CAR';
    const OPENING_BALANCE_POST_TYPE_SHOW_INVENTORIES = 'SHOW_INVENTORIES';
    const OPENING_BALANCE_POST_TYPE_SHOW_CUSTOMER_RECEIVABLES = 'SHOW_CUSTOMER_RECEIVABLES';
    const OPENING_BALANCE_POST_TYPE_SHOW_CONCERN_RELATION = 'SHOW_CONCERN_RELATION';
    const OPENING_BALANCE_POST_TYPE_OWN_BUSINESS_PROPERTIES = 'OWN_BUSINESS_PROPERTIES';
    const OPENING_BALANCE_POST_TYPE_OWN_ASSET_PAPIR = 'OWN_ASSET_PAPIR';
    const OPENING_BALANCE_POST_TYPE_TRANSFERED_BY = 'TRANSFERED_BY';
    const OPENING_BALANCE_POST_TYPE_TRANSFERED_DATE = 'TRANSFERED_DATE';
    const OPENING_BALANCE_POST_TYPE_YEAR_END_BRREG_DOC_ID = 'YEAR_END_BRREG_DOC_ID';
    const OPENING_BALANCE_POST_TYPE_YEAR_END_BRREG_DOC_FETCHER_NAME = 'YEAR_END_BRREG_DOC_FETCHER_NAME';
    const OPENING_BALANCE_POST_TYPE_SET_ACCOUNTANT_REVISED = 'SET_ACCOUNTANT_REVISED';
    const OPENING_BALANCE_POST_TYPE_RECEIVER_ORG_NR = 'RECEIVER_ORG_NR';
    const OPENING_BALANCE_POST_TYPE_RECEIVER_NAME = 'RECEIVER_NAME';
    const OPENING_BALANCE_POST_TYPE_CONCERN_CONNECTION = 'CONCERN_CONNECTION';
    const OPENING_BALANCE_POST_TYPE_VOTING_LIMIT = 'VOTING_LIMIT';
    const OPENING_BALANCE_POST_TYPE_DATE_OF_ACQUISITION = 'DATE_OF_ACQUISITION';
    const OPENING_BALANCE_POST_TYPE_RECEIVED_GROUP_CONTRIBUTIONS_WITH_TAX_AFFECTION = 'RECEIVED_GROUP_CONTRIBUTIONS_WITH_TAX_AFFECTION';
    const OPENING_BALANCE_POST_TYPE_RECEIVED_GROUP_CONTRIBUTIONS_WITHOUT_TAX_AFFECTION = 'RECEIVED_GROUP_CONTRIBUTIONS_WITHOUT_TAX_AFFECTION';
    const OPENING_BALANCE_POST_TYPE_SUBMITTED_GROUP_CONTRIBUTIONS_WITH_TAX_AFFECTION = 'SUBMITTED_GROUP_CONTRIBUTIONS_WITH_TAX_AFFECTION';
    const OPENING_BALANCE_POST_TYPE_SUBMITTED_GROUP_CONTRIBUTIONS_WITHOUT_TAX_AFFECTION = 'SUBMITTED_GROUP_CONTRIBUTIONS_WITHOUT_TAX_AFFECTION';
    const CLOSING_BALANCE_POST_TYPE_REGISTRATION_NUMBER = 'REGISTRATION_NUMBER';
    const CLOSING_BALANCE_POST_TYPE_DESCRIPTION = 'DESCRIPTION';
    const CLOSING_BALANCE_POST_TYPE_VEHICLE_TYPE = 'VEHICLE_TYPE';
    const CLOSING_BALANCE_POST_TYPE_YEAR_OF_INITIAL_REGISTRATION = 'YEAR_OF_INITIAL_REGISTRATION';
    const CLOSING_BALANCE_POST_TYPE_LIST_PRICE = 'LIST_PRICE';
    const CLOSING_BALANCE_POST_TYPE_DATE_FROM = 'DATE_FROM';
    const CLOSING_BALANCE_POST_TYPE_DATE_TO = 'DATE_TO';
    const CLOSING_BALANCE_POST_TYPE_LICENCE = 'LICENCE';
    const CLOSING_BALANCE_POST_TYPE_LICENCE_NUMBER = 'LICENCE_NUMBER';
    const CLOSING_BALANCE_POST_TYPE_IS_ELECTRONIC_VEHICLE_LOGBOOK_LOGGED = 'IS_ELECTRONIC_VEHICLE_LOGBOOK_LOGGED';
    const CLOSING_BALANCE_POST_TYPE_NO_OF_KILOMETRES_TOTAL = 'NO_OF_KILOMETRES_TOTAL';
    const CLOSING_BALANCE_POST_TYPE_OPERATING_EXPENSES = 'OPERATING_EXPENSES';
    const CLOSING_BALANCE_POST_TYPE_LEASING_RENT = 'LEASING_RENT';
    const CLOSING_BALANCE_POST_TYPE_IS_COMPANY_VEHICLE_USED_PRIVATE = 'IS_COMPANY_VEHICLE_USED_PRIVATE';
    const CLOSING_BALANCE_POST_TYPE_NO_OF_KILOMETRES_PRIVATE = 'NO_OF_KILOMETRES_PRIVATE';
    const CLOSING_BALANCE_POST_TYPE_DEPRECIATION_PRIVATE_USE = 'DEPRECIATION_PRIVATE_USE';
    const CLOSING_BALANCE_POST_TYPE_REVERSED_VEHICLE_EXPENSES = 'REVERSED_VEHICLE_EXPENSES';
    const CLOSING_BALANCE_POST_TYPE_NO_OF_LITER_FUEL = 'NO_OF_LITER_FUEL';
    const CLOSING_BALANCE_POST_TYPE_TAXIMETER_TYPE = 'TAXIMETER_TYPE';
    const CLOSING_BALANCE_POST_TYPE_INCOME_PERSONAL_TRANSPORT = 'INCOME_PERSONAL_TRANSPORT';
    const CLOSING_BALANCE_POST_TYPE_INCOME_GOODS_TRANSPORT = 'INCOME_GOODS_TRANSPORT';
    const CLOSING_BALANCE_POST_TYPE_DRIVING_INCOME_PAYED_IN_CASH = 'DRIVING_INCOME_PAYED_IN_CASH';
    const CLOSING_BALANCE_POST_TYPE_DRIVING_INCOME_INVOICED_PUBLIC_AGENCIES = 'DRIVING_INCOME_INVOICED_PUBLIC_AGENCIES';
    const CLOSING_BALANCE_POST_TYPE_TIP_PAYED_WITH_CARD_OR_INVOICE = 'TIP_PAYED_WITH_CARD_OR_INVOICE';
    const CLOSING_BALANCE_POST_TYPE_TIP_PAYED_IN_CASH = 'TIP_PAYED_IN_CASH';
    const CLOSING_BALANCE_POST_TYPE_NO_OF_KILOMETRES_SCHOOL_CHILDREN = 'NO_OF_KILOMETRES_SCHOOL_CHILDREN';
    const CLOSING_BALANCE_POST_TYPE_NO_OF_KILOMETRES_WITH_PASSENGER = 'NO_OF_KILOMETRES_WITH_PASSENGER';
    const CLOSING_BALANCE_POST_TYPE_FLOP_TRIP_AMOUNT = 'FLOP_TRIP_AMOUNT';
    const CLOSING_BALANCE_POST_TYPE_IS_CONNECTED_TO_CENTRAL = 'IS_CONNECTED_TO_CENTRAL';
    const CLOSING_BALANCE_POST_TYPE_ID_FOR_PROFIT_AND_LOSS_ACCOUNT = 'ID_FOR_PROFIT_AND_LOSS_ACCOUNT';
    const CLOSING_BALANCE_POST_TYPE_DESCRIPTION_PROFIT_AND_LOSS_ACCOUNT = 'DESCRIPTION_PROFIT_AND_LOSS_ACCOUNT';
    const CLOSING_BALANCE_POST_TYPE_MUNICIPALITY_NUMBER = 'MUNICIPALITY_NUMBER';
    const CLOSING_BALANCE_POST_TYPE_OPENING_BALANCE = 'OPENING_BALANCE';
    const CLOSING_BALANCE_POST_TYPE_PROFIT_SALES_WITHDRAWAL_OTHER_REALIZATIONS = 'PROFIT_SALES_WITHDRAWAL_OTHER_REALIZATIONS';
    const CLOSING_BALANCE_POST_TYPE_LOSS_SALES_WITHDRAWAL_OTHER_REALIZATIONS = 'LOSS_SALES_WITHDRAWAL_OTHER_REALIZATIONS';
    const CLOSING_BALANCE_POST_TYPE_PROFIT_REALIZATIONS_LIVESTOCK = 'PROFIT_REALIZATIONS_LIVESTOCK';
    const CLOSING_BALANCE_POST_TYPE_VALUE_ACQUIRED_PROFIT_AND_LOSS_ACCOUNT = 'VALUE_ACQUIRED_PROFIT_AND_LOSS_ACCOUNT';
    const CLOSING_BALANCE_POST_TYPE_VALUE_REALIZED_PROFIT_AND_LOSS_ACCOUNT = 'VALUE_REALIZED_PROFIT_AND_LOSS_ACCOUNT';
    const CLOSING_BALANCE_POST_TYPE_ANNUAL_INCOME_RECOGNITION_OR_DEDUCTION_BASIS = 'ANNUAL_INCOME_RECOGNITION_OR_DEDUCTION_BASIS';
    const CLOSING_BALANCE_POST_TYPE_PERCENTAGE_PROFIT_AND_LOSS_ACCOUNT = 'PERCENTAGE_PROFIT_AND_LOSS_ACCOUNT';
    const CLOSING_BALANCE_POST_TYPE_ANNUAL_INCOME_RECOGNITION = 'ANNUAL_INCOME_RECOGNITION';
    const CLOSING_BALANCE_POST_TYPE_ANNUAL_DEDUCTION = 'ANNUAL_DEDUCTION';
    const CLOSING_BALANCE_POST_TYPE_CLOSING_BALANCE = 'CLOSING_BALANCE';
    const CLOSING_BALANCE_POST_TYPE_IS_REGARDING_REALIZATION_SEPARATED_PLOT_AGRICULTURE_OR_FORESTRY = 'IS_REGARDING_REALIZATION_SEPARATED_PLOT_AGRICULTURE_OR_FORESTRY';
    const CLOSING_BALANCE_POST_TYPE_IS_REGARDING_REALIZATION_WHOLE_AGRICULTURE_OR_FORESTRY_BUSINESS = 'IS_REGARDING_REALIZATION_WHOLE_AGRICULTURE_OR_FORESTRY_BUSINESS';
    const CLOSING_BALANCE_POST_TYPE_ID_FOR_ACCOMMODATION_AND_RESTAURANT = 'ID_FOR_ACCOMMODATION_AND_RESTAURANT';
    const CLOSING_BALANCE_POST_TYPE_COVER_CHARGE_SUBJECT_TO_VAT = 'COVER_CHARGE_SUBJECT_TO_VAT';
    const CLOSING_BALANCE_POST_TYPE_COVER_CHARGE_NOT_SUBJECT_TO_VAT = 'COVER_CHARGE_NOT_SUBJECT_TO_VAT';
    const CLOSING_BALANCE_POST_TYPE_COVER_CHARGE = 'COVER_CHARGE';
    const CLOSING_BALANCE_POST_TYPE_DESCRIPTION_ACCOMMODATION_AND_RESTAURANT = 'DESCRIPTION_ACCOMMODATION_AND_RESTAURANT';
    const CLOSING_BALANCE_POST_TYPE_PRODUCT_TYPE = 'PRODUCT_TYPE';
    const CLOSING_BALANCE_POST_TYPE_OPENING_STOCK = 'OPENING_STOCK';
    const CLOSING_BALANCE_POST_TYPE_CLOSING_STOCK = 'CLOSING_STOCK';
    const CLOSING_BALANCE_POST_TYPE_PURCHASE_OF_GOODS = 'PURCHASE_OF_GOODS';
    const CLOSING_BALANCE_POST_TYPE_COST_OF_GOODS_SOLD = 'COST_OF_GOODS_SOLD';
    const CLOSING_BALANCE_POST_TYPE_SALES_REVENUE_AND_WITHDRAWALS = 'SALES_REVENUE_AND_WITHDRAWALS';
    const CLOSING_BALANCE_POST_TYPE_SALES_REVENUE_IN_CASH = 'SALES_REVENUE_IN_CASH';
    const CLOSING_BALANCE_POST_TYPE_CASH_REGISTER_SYSTEM_YEAR_OF_INITIAL_REGISTRATION = 'CASH_REGISTER_SYSTEM_YEAR_OF_INITIAL_REGISTRATION';
    const CLOSING_BALANCE_POST_TYPE_CASH_REGISTER_SYSTEM_TYPE = 'CASH_REGISTER_SYSTEM_TYPE';
    const CLOSING_BALANCE_POST_TYPE_WITHDRAWAL_OF_PRODUCTS_VALUED_AT_TURNOVER = 'WITHDRAWAL_OF_PRODUCTS_VALUED_AT_TURNOVER';
    const CLOSING_BALANCE_POST_TYPE_PRIVATE_WITHDRAWAL_ENTERED_ON_PRIVATE_ACCOUNT = 'PRIVATE_WITHDRAWAL_ENTERED_ON_PRIVATE_ACCOUNT';
    const CLOSING_BALANCE_POST_TYPE_TOTAL_WITHDRAWAL_PRODUCTS_ENTERED_AS_SALES_REVENUE = 'TOTAL_WITHDRAWAL_PRODUCTS_ENTERED_AS_SALES_REVENUE';
    const CLOSING_BALANCE_POST_TYPE_WITHDRAWAL_COST_FOR_ENTERTAINMENT = 'WITHDRAWAL_COST_FOR_ENTERTAINMENT';
    const CLOSING_BALANCE_POST_TYPE_WITHDRAWAL_VALUE_VALUED_AT_MARKET_VALUE = 'WITHDRAWAL_VALUE_VALUED_AT_MARKET_VALUE';
    const CLOSING_BALANCE_POST_TYPE_MARKUP_WITHDRAWAL_COST_FOR_ENTERTAINMENT = 'MARKUP_WITHDRAWAL_COST_FOR_ENTERTAINMENT';
    const CLOSING_BALANCE_POST_TYPE_TOTAL_WITHDRAWAL_COST_FOR_ENTERTAINMENT = 'TOTAL_WITHDRAWAL_COST_FOR_ENTERTAINMENT';
    const CLOSING_BALANCE_POST_TYPE_OPENING_BALANCE_CREDITSALES = 'OPENING_BALANCE_CREDITSALES';
    const CLOSING_BALANCE_POST_TYPE_CLOSING_BALANCE_CREDITSALES = 'CLOSING_BALANCE_CREDITSALES';
    const CLOSING_BALANCE_POST_TYPE_OPENING_BALANCE_WRITE_DOWN_NEW_COMPANY = 'OPENING_BALANCE_WRITE_DOWN_NEW_COMPANY';
    const CLOSING_BALANCE_POST_TYPE_CLOSING_BALANCE_WRITE_DOWN_NEW_COMPANY = 'CLOSING_BALANCE_WRITE_DOWN_NEW_COMPANY';
    const CLOSING_BALANCE_POST_TYPE_OPENING_BALANCE_RAW_MATERIAL_AND_SEMIFINISHED_PRODUCTS = 'OPENING_BALANCE_RAW_MATERIAL_AND_SEMIFINISHED_PRODUCTS';
    const CLOSING_BALANCE_POST_TYPE_CLOSING_BALANCE_RAW_MATERIAL_AND_SEMIFINISHED_PRODUCTS = 'CLOSING_BALANCE_RAW_MATERIAL_AND_SEMIFINISHED_PRODUCTS';
    const CLOSING_BALANCE_POST_TYPE_OPENING_BALANCE_PRODUCT_UNDER_MANUFACTURING = 'OPENING_BALANCE_PRODUCT_UNDER_MANUFACTURING';
    const CLOSING_BALANCE_POST_TYPE_CLOSING_BALANCE_PRODUCT_UNDER_MANUFACTURING = 'CLOSING_BALANCE_PRODUCT_UNDER_MANUFACTURING';
    const CLOSING_BALANCE_POST_TYPE_OPENING_BALANCE_INVENTORIES_FINISHED_ITEM = 'OPENING_BALANCE_INVENTORIES_FINISHED_ITEM';
    const CLOSING_BALANCE_POST_TYPE_CLOSING_BALANCE_INVENTORIES_FINISHED_ITEM = 'CLOSING_BALANCE_INVENTORIES_FINISHED_ITEM';
    const CLOSING_BALANCE_POST_TYPE_OPENING_BALANCE_PURCHASED_ITEM_FOR_RESALE = 'OPENING_BALANCE_PURCHASED_ITEM_FOR_RESALE';
    const CLOSING_BALANCE_POST_TYPE_CLOSING_BALANCE_PURCHASED_ITEM_FOR_RESALE = 'CLOSING_BALANCE_PURCHASED_ITEM_FOR_RESALE';
    const CLOSING_BALANCE_POST_TYPE_TANGIBLE_FIXED_ASSETS_TYPE = 'TANGIBLE_FIXED_ASSETS_TYPE';
    const CLOSING_BALANCE_POST_TYPE_OPENING_BALANCE_TANGIBLE_FIXED_ASSETS = 'OPENING_BALANCE_TANGIBLE_FIXED_ASSETS';
    const CLOSING_BALANCE_POST_TYPE_DEPRECIATION_PERCENTAGE = 'DEPRECIATION_PERCENTAGE';
    const CLOSING_BALANCE_POST_TYPE_STRAIGHT_LINE_DEPRECIATION = 'STRAIGHT_LINE_DEPRECIATION';
    const CLOSING_BALANCE_POST_TYPE_CASH_DEPOSITS = 'CASH_DEPOSITS';
    const CLOSING_BALANCE_POST_TYPE_CONTRIBUTIONS_IN_KIND = 'CONTRIBUTIONS_IN_KIND';
    const CLOSING_BALANCE_POST_TYPE_CAPITAL_REDUCTION_DISTRIBUTED_SHARED_CAPITAL_CASH = 'CAPITAL_REDUCTION_DISTRIBUTED_SHARED_CAPITAL_CASH';
    const CLOSING_BALANCE_POST_TYPE_CAPITAL_REDUCTION_DISTRIBUTED_SHARED_CAPITAL_OTHER_ASSETS = 'CAPITAL_REDUCTION_DISTRIBUTED_SHARED_CAPITAL_OTHER_ASSETS';
    const CLOSING_BALANCE_POST_TYPE_DEBT_WAVING = 'DEBT_WAVING';
    const CLOSING_BALANCE_POST_TYPE_BUYING_OWN_SHARES = 'BUYING_OWN_SHARES';
    const CLOSING_BALANCE_POST_TYPE_SELLING_OWN_SHARES = 'SELLING_OWN_SHARES';
    const CLOSING_BALANCE_POST_TYPE_DEBT_CONVERSION_TO_EQUITY = 'DEBT_CONVERSION_TO_EQUITY';
    const CLOSING_BALANCE_POST_TYPE_POSITIVE_DIFF_BETWEEN_ALLOCATED_AND_DISTRIBUTED_DIVIDEND = 'POSITIVE_DIFF_BETWEEN_ALLOCATED_AND_DISTRIBUTED_DIVIDEND';
    const CLOSING_BALANCE_POST_TYPE_NEGATIVE_DIFF_BETWEEN_ALLOCATED_AND_DISTRIBUTED_DIVIDEND = 'NEGATIVE_DIFF_BETWEEN_ALLOCATED_AND_DISTRIBUTED_DIVIDEND';
    const CLOSING_BALANCE_POST_TYPE_OTHER_POSITIVE_CHANGE_IN_EQUITY = 'OTHER_POSITIVE_CHANGE_IN_EQUITY';
    const CLOSING_BALANCE_POST_TYPE_OTHER_NEGATIVE_CHANGE_IN_EQUITY = 'OTHER_NEGATIVE_CHANGE_IN_EQUITY';
    const CLOSING_BALANCE_POST_TYPE_NONE_DEDUCTIBLE_COST = 'NONE_DEDUCTIBLE_COST';
    const CLOSING_BALANCE_POST_TYPE_POSITIVE_TAX_COST = 'POSITIVE_TAX_COST';
    const CLOSING_BALANCE_POST_TYPE_INTEREST_EXPENSE_FIXED_TAX = 'INTEREST_EXPENSE_FIXED_TAX';
    const CLOSING_BALANCE_POST_TYPE_SHARE_OF_LOSS_FROM_INVESTMENT = 'SHARE_OF_LOSS_FROM_INVESTMENT';
    const CLOSING_BALANCE_POST_TYPE_REVERSAL_OF_IMPAIRMENT = 'REVERSAL_OF_IMPAIRMENT';
    const CLOSING_BALANCE_POST_TYPE_ACCOUNTING_IMPAIRMENT = 'ACCOUNTING_IMPAIRMENT';
    const CLOSING_BALANCE_POST_TYPE_ACCOUNTING_LOSS = 'ACCOUNTING_LOSS';
    const CLOSING_BALANCE_POST_TYPE_ACCOUNTING_DEFICIT_NORWEAGIAN_SDF = 'ACCOUNTING_DEFICIT_NORWEAGIAN_SDF';
    const CLOSING_BALANCE_POST_TYPE_ACCOUNTING_DEFICIT_FOREIGN_SDF = 'ACCOUNTING_DEFICIT_FOREIGN_SDF';
    const CLOSING_BALANCE_POST_TYPE_ACCOUNTING_LOSS_NORWEAGIAN_SDF = 'ACCOUNTING_LOSS_NORWEAGIAN_SDF';
    const CLOSING_BALANCE_POST_TYPE_ACCOUNTING_LOSS_FOREIGN_SDF = 'ACCOUNTING_LOSS_FOREIGN_SDF';
    const CLOSING_BALANCE_POST_TYPE_RETURNED_DEBT_INTEREST = 'RETURNED_DEBT_INTEREST';
    const CLOSING_BALANCE_POST_TYPE_TAXABLE_PROFIT_REALIZATION_OF_FINANCIAL_INSTRUMENTS = 'TAXABLE_PROFIT_REALIZATION_OF_FINANCIAL_INSTRUMENTS';
    const CLOSING_BALANCE_POST_TYPE_TAXABLE_DIVIDEND_ON_SHARES = 'TAXABLE_DIVIDEND_ON_SHARES';
    const CLOSING_BALANCE_POST_TYPE_TAXABLE_PART_OF_DIVIDEND_AND_DISTRIBUTION = 'TAXABLE_PART_OF_DIVIDEND_AND_DISTRIBUTION';
    const CLOSING_BALANCE_POST_TYPE_SHARE_OF_TAXABLE_PROFIT_NORWEGIAN_SDF = 'SHARE_OF_TAXABLE_PROFIT_NORWEGIAN_SDF';
    const CLOSING_BALANCE_POST_TYPE_SHARE_OF_TAXABLE_PROFIT_FOREIGN_SDF = 'SHARE_OF_TAXABLE_PROFIT_FOREIGN_SDF';
    const CLOSING_BALANCE_POST_TYPE_TAXABLE_PROFIT_REALIZATION_OF_NORWEGIAN_SDF = 'TAXABLE_PROFIT_REALIZATION_OF_NORWEGIAN_SDF';
    const CLOSING_BALANCE_POST_TYPE_TAXABLE_PROFIT_REALIZATION_OF_FOREIGN_SDF = 'TAXABLE_PROFIT_REALIZATION_OF_FOREIGN_SDF';
    const CLOSING_BALANCE_POST_TYPE_ADDITION_INTEREST_COST = 'ADDITION_INTEREST_COST';
    const CLOSING_BALANCE_POST_TYPE_CORRECTION_PURPOSED_DIVIDEND = 'CORRECTION_PURPOSED_DIVIDEND';
    const CLOSING_BALANCE_POST_TYPE_TAXABLE_PROFIT_WITHDRAWAL_NORWEGIAN_TAX_AREA = 'TAXABLE_PROFIT_WITHDRAWAL_NORWEGIAN_TAX_AREA';
    const CLOSING_BALANCE_POST_TYPE_INCOME_SUPPLEMENT_FOR_CONVERSION_DIFFERENCE = 'INCOME_SUPPLEMENT_FOR_CONVERSION_DIFFERENCE';
    const CLOSING_BALANCE_POST_TYPE_OTHER_INCOME_SUPPLEMENT = 'OTHER_INCOME_SUPPLEMENT';
    const CLOSING_BALANCE_POST_TYPE_RETURN_OF_INCOME_RELATED_DIVIDENDS = 'RETURN_OF_INCOME_RELATED_DIVIDENDS';
    const CLOSING_BALANCE_POST_TYPE_PROFIT_AND_LOSS_GROUP_CONTRIBUTION = 'PROFIT_AND_LOSS_GROUP_CONTRIBUTION';
    const CLOSING_BALANCE_POST_TYPE_ACCOUNTING_PROFIT_REALIZATION_OF_FINANCIAL_INSTRUMENTS = 'ACCOUNTING_PROFIT_REALIZATION_OF_FINANCIAL_INSTRUMENTS';
    const CLOSING_BALANCE_POST_TYPE_ACCOUNTING_PROFIT_SHARE_NORWEGIAN_SDF = 'ACCOUNTING_PROFIT_SHARE_NORWEGIAN_SDF';
    const CLOSING_BALANCE_POST_TYPE_ACCOUNTING_PROFIT_SHARE_FOREIGN_SDF = 'ACCOUNTING_PROFIT_SHARE_FOREIGN_SDF';
    const CLOSING_BALANCE_POST_TYPE_ACCOUNTING_GAIN_NORWEGIAN_SDF = 'ACCOUNTING_GAIN_NORWEGIAN_SDF';
    const CLOSING_BALANCE_POST_TYPE_ACCOUNTING_GAIN_FOREIGN_SDF = 'ACCOUNTING_GAIN_FOREIGN_SDF';
    const CLOSING_BALANCE_POST_TYPE_DEDUCTIBLE_LOSS_ON_REALIZATION_OF_FINANCIAL_INSTRUMENTS = 'DEDUCTIBLE_LOSS_ON_REALIZATION_OF_FINANCIAL_INSTRUMENTS';
    const CLOSING_BALANCE_POST_TYPE_SHARE_OF_DEDUCTIBLE_DEFICIT_NORWEGIAN_SDF = 'SHARE_OF_DEDUCTIBLE_DEFICIT_NORWEGIAN_SDF';
    const CLOSING_BALANCE_POST_TYPE_SHARE_OF_DEDUCTIBLE_DEFICIT_FOREIGN_SDF = 'SHARE_OF_DEDUCTIBLE_DEFICIT_FOREIGN_SDF';
    const CLOSING_BALANCE_POST_TYPE_DEDUCTIBLE_LOSS_ON_REALIXATION_NORWEGIAN_SDF = 'DEDUCTIBLE_LOSS_ON_REALIXATION_NORWEGIAN_SDF';
    const CLOSING_BALANCE_POST_TYPE_DEDUCTIBLE_LOSS_ON_REALIXATION_FOREIGN_SDF = 'DEDUCTIBLE_LOSS_ON_REALIXATION_FOREIGN_SDF';
    const CLOSING_BALANCE_POST_TYPE_DEDUCTIBLE_LOSS_ON_WITHDRAWAL_NORWEGIAN_TAX_AREA = 'DEDUCTIBLE_LOSS_ON_WITHDRAWAL_NORWEGIAN_TAX_AREA';
    const CLOSING_BALANCE_POST_TYPE_ISSUE_AND_ESTABLISHMENT_COST = 'ISSUE_AND_ESTABLISHMENT_COST';
    const CLOSING_BALANCE_POST_TYPE_INCOME_DEDUCTION_FROM_ACCOUNTING_CURRENCY_TO_NOK = 'INCOME_DEDUCTION_FROM_ACCOUNTING_CURRENCY_TO_NOK';
    const CLOSING_BALANCE_POST_TYPE_OTHER_INCOME_DEDUCTION = 'OTHER_INCOME_DEDUCTION';
    const CLOSING_BALANCE_POST_TYPE_TEMPORARY_DIFFERENCES_TYPE = 'TEMPORARY_DIFFERENCES_TYPE';
    const CLOSING_BALANCE_POST_TYPE_OPENING_BALANCE_ACCOUNTABLE_VALUE = 'OPENING_BALANCE_ACCOUNTABLE_VALUE';
    const CLOSING_BALANCE_POST_TYPE_CLOSING_BALANCE_ACCOUNTABLE_VALUE = 'CLOSING_BALANCE_ACCOUNTABLE_VALUE';
    const CLOSING_BALANCE_POST_TYPE_OPENING_BALANCE_TAX_VALUE = 'OPENING_BALANCE_TAX_VALUE';
    const CLOSING_BALANCE_POST_TYPE_CLOSING_BALANCE_TAX_VALUE = 'CLOSING_BALANCE_TAX_VALUE';
    const CLOSING_BALANCE_POST_TYPE_OPENING_BALANCE_DIFFERENCES = 'OPENING_BALANCE_DIFFERENCES';
    const CLOSING_BALANCE_POST_TYPE_CLOSING_BALANCE_DIFFERENCES = 'CLOSING_BALANCE_DIFFERENCES';
    const CLOSING_BALANCE_POST_TYPE_SHOW_PROFIT_AND_LOSS = 'SHOW_PROFIT_AND_LOSS';
    const CLOSING_BALANCE_POST_TYPE_SHOW_ACCOMMODATION_AND_RESTAURANT = 'SHOW_ACCOMMODATION_AND_RESTAURANT';
    const CLOSING_BALANCE_POST_TYPE_IS_ACCOUNTABLE = 'IS_ACCOUNTABLE';
    const CLOSING_BALANCE_POST_TYPE_USE_ACCOUNTING_VALUES_IN_INVENTORIES = 'USE_ACCOUNTING_VALUES_IN_INVENTORIES';
    const CLOSING_BALANCE_POST_TYPE_USE_ACCOUNTING_VALUES_IN_CUSTOMER_RECEIVABLES = 'USE_ACCOUNTING_VALUES_IN_CUSTOMER_RECEIVABLES';
    const CLOSING_BALANCE_POST_TYPE_SHOW_TANGIBLE_FIXED_ASSET = 'SHOW_TANGIBLE_FIXED_ASSET';
    const CLOSING_BALANCE_POST_TYPE_SHOW_CAR = 'SHOW_CAR';
    const CLOSING_BALANCE_POST_TYPE_SHOW_INVENTORIES = 'SHOW_INVENTORIES';
    const CLOSING_BALANCE_POST_TYPE_SHOW_CUSTOMER_RECEIVABLES = 'SHOW_CUSTOMER_RECEIVABLES';
    const CLOSING_BALANCE_POST_TYPE_SHOW_CONCERN_RELATION = 'SHOW_CONCERN_RELATION';
    const CLOSING_BALANCE_POST_TYPE_OWN_BUSINESS_PROPERTIES = 'OWN_BUSINESS_PROPERTIES';
    const CLOSING_BALANCE_POST_TYPE_OWN_ASSET_PAPIR = 'OWN_ASSET_PAPIR';
    const CLOSING_BALANCE_POST_TYPE_TRANSFERED_BY = 'TRANSFERED_BY';
    const CLOSING_BALANCE_POST_TYPE_TRANSFERED_DATE = 'TRANSFERED_DATE';
    const CLOSING_BALANCE_POST_TYPE_YEAR_END_BRREG_DOC_ID = 'YEAR_END_BRREG_DOC_ID';
    const CLOSING_BALANCE_POST_TYPE_YEAR_END_BRREG_DOC_FETCHER_NAME = 'YEAR_END_BRREG_DOC_FETCHER_NAME';
    const CLOSING_BALANCE_POST_TYPE_SET_ACCOUNTANT_REVISED = 'SET_ACCOUNTANT_REVISED';
    const CLOSING_BALANCE_POST_TYPE_RECEIVER_ORG_NR = 'RECEIVER_ORG_NR';
    const CLOSING_BALANCE_POST_TYPE_RECEIVER_NAME = 'RECEIVER_NAME';
    const CLOSING_BALANCE_POST_TYPE_CONCERN_CONNECTION = 'CONCERN_CONNECTION';
    const CLOSING_BALANCE_POST_TYPE_VOTING_LIMIT = 'VOTING_LIMIT';
    const CLOSING_BALANCE_POST_TYPE_DATE_OF_ACQUISITION = 'DATE_OF_ACQUISITION';
    const CLOSING_BALANCE_POST_TYPE_RECEIVED_GROUP_CONTRIBUTIONS_WITH_TAX_AFFECTION = 'RECEIVED_GROUP_CONTRIBUTIONS_WITH_TAX_AFFECTION';
    const CLOSING_BALANCE_POST_TYPE_RECEIVED_GROUP_CONTRIBUTIONS_WITHOUT_TAX_AFFECTION = 'RECEIVED_GROUP_CONTRIBUTIONS_WITHOUT_TAX_AFFECTION';
    const CLOSING_BALANCE_POST_TYPE_SUBMITTED_GROUP_CONTRIBUTIONS_WITH_TAX_AFFECTION = 'SUBMITTED_GROUP_CONTRIBUTIONS_WITH_TAX_AFFECTION';
    const CLOSING_BALANCE_POST_TYPE_SUBMITTED_GROUP_CONTRIBUTIONS_WITHOUT_TAX_AFFECTION = 'SUBMITTED_GROUP_CONTRIBUTIONS_WITHOUT_TAX_AFFECTION';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getOpeningBalancePostTypeAllowableValues()
    {
        return [
            self::OPENING_BALANCE_POST_TYPE_REGISTRATION_NUMBER,
            self::OPENING_BALANCE_POST_TYPE_DESCRIPTION,
            self::OPENING_BALANCE_POST_TYPE_VEHICLE_TYPE,
            self::OPENING_BALANCE_POST_TYPE_YEAR_OF_INITIAL_REGISTRATION,
            self::OPENING_BALANCE_POST_TYPE_LIST_PRICE,
            self::OPENING_BALANCE_POST_TYPE_DATE_FROM,
            self::OPENING_BALANCE_POST_TYPE_DATE_TO,
            self::OPENING_BALANCE_POST_TYPE_LICENCE,
            self::OPENING_BALANCE_POST_TYPE_LICENCE_NUMBER,
            self::OPENING_BALANCE_POST_TYPE_IS_ELECTRONIC_VEHICLE_LOGBOOK_LOGGED,
            self::OPENING_BALANCE_POST_TYPE_NO_OF_KILOMETRES_TOTAL,
            self::OPENING_BALANCE_POST_TYPE_OPERATING_EXPENSES,
            self::OPENING_BALANCE_POST_TYPE_LEASING_RENT,
            self::OPENING_BALANCE_POST_TYPE_IS_COMPANY_VEHICLE_USED_PRIVATE,
            self::OPENING_BALANCE_POST_TYPE_NO_OF_KILOMETRES_PRIVATE,
            self::OPENING_BALANCE_POST_TYPE_DEPRECIATION_PRIVATE_USE,
            self::OPENING_BALANCE_POST_TYPE_REVERSED_VEHICLE_EXPENSES,
            self::OPENING_BALANCE_POST_TYPE_NO_OF_LITER_FUEL,
            self::OPENING_BALANCE_POST_TYPE_TAXIMETER_TYPE,
            self::OPENING_BALANCE_POST_TYPE_INCOME_PERSONAL_TRANSPORT,
            self::OPENING_BALANCE_POST_TYPE_INCOME_GOODS_TRANSPORT,
            self::OPENING_BALANCE_POST_TYPE_DRIVING_INCOME_PAYED_IN_CASH,
            self::OPENING_BALANCE_POST_TYPE_DRIVING_INCOME_INVOICED_PUBLIC_AGENCIES,
            self::OPENING_BALANCE_POST_TYPE_TIP_PAYED_WITH_CARD_OR_INVOICE,
            self::OPENING_BALANCE_POST_TYPE_TIP_PAYED_IN_CASH,
            self::OPENING_BALANCE_POST_TYPE_NO_OF_KILOMETRES_SCHOOL_CHILDREN,
            self::OPENING_BALANCE_POST_TYPE_NO_OF_KILOMETRES_WITH_PASSENGER,
            self::OPENING_BALANCE_POST_TYPE_FLOP_TRIP_AMOUNT,
            self::OPENING_BALANCE_POST_TYPE_IS_CONNECTED_TO_CENTRAL,
            self::OPENING_BALANCE_POST_TYPE_ID_FOR_PROFIT_AND_LOSS_ACCOUNT,
            self::OPENING_BALANCE_POST_TYPE_DESCRIPTION_PROFIT_AND_LOSS_ACCOUNT,
            self::OPENING_BALANCE_POST_TYPE_MUNICIPALITY_NUMBER,
            self::OPENING_BALANCE_POST_TYPE_OPENING_BALANCE,
            self::OPENING_BALANCE_POST_TYPE_PROFIT_SALES_WITHDRAWAL_OTHER_REALIZATIONS,
            self::OPENING_BALANCE_POST_TYPE_LOSS_SALES_WITHDRAWAL_OTHER_REALIZATIONS,
            self::OPENING_BALANCE_POST_TYPE_PROFIT_REALIZATIONS_LIVESTOCK,
            self::OPENING_BALANCE_POST_TYPE_VALUE_ACQUIRED_PROFIT_AND_LOSS_ACCOUNT,
            self::OPENING_BALANCE_POST_TYPE_VALUE_REALIZED_PROFIT_AND_LOSS_ACCOUNT,
            self::OPENING_BALANCE_POST_TYPE_ANNUAL_INCOME_RECOGNITION_OR_DEDUCTION_BASIS,
            self::OPENING_BALANCE_POST_TYPE_PERCENTAGE_PROFIT_AND_LOSS_ACCOUNT,
            self::OPENING_BALANCE_POST_TYPE_ANNUAL_INCOME_RECOGNITION,
            self::OPENING_BALANCE_POST_TYPE_ANNUAL_DEDUCTION,
            self::OPENING_BALANCE_POST_TYPE_CLOSING_BALANCE,
            self::OPENING_BALANCE_POST_TYPE_IS_REGARDING_REALIZATION_SEPARATED_PLOT_AGRICULTURE_OR_FORESTRY,
            self::OPENING_BALANCE_POST_TYPE_IS_REGARDING_REALIZATION_WHOLE_AGRICULTURE_OR_FORESTRY_BUSINESS,
            self::OPENING_BALANCE_POST_TYPE_ID_FOR_ACCOMMODATION_AND_RESTAURANT,
            self::OPENING_BALANCE_POST_TYPE_COVER_CHARGE_SUBJECT_TO_VAT,
            self::OPENING_BALANCE_POST_TYPE_COVER_CHARGE_NOT_SUBJECT_TO_VAT,
            self::OPENING_BALANCE_POST_TYPE_COVER_CHARGE,
            self::OPENING_BALANCE_POST_TYPE_DESCRIPTION_ACCOMMODATION_AND_RESTAURANT,
            self::OPENING_BALANCE_POST_TYPE_PRODUCT_TYPE,
            self::OPENING_BALANCE_POST_TYPE_OPENING_STOCK,
            self::OPENING_BALANCE_POST_TYPE_CLOSING_STOCK,
            self::OPENING_BALANCE_POST_TYPE_PURCHASE_OF_GOODS,
            self::OPENING_BALANCE_POST_TYPE_COST_OF_GOODS_SOLD,
            self::OPENING_BALANCE_POST_TYPE_SALES_REVENUE_AND_WITHDRAWALS,
            self::OPENING_BALANCE_POST_TYPE_SALES_REVENUE_IN_CASH,
            self::OPENING_BALANCE_POST_TYPE_CASH_REGISTER_SYSTEM_YEAR_OF_INITIAL_REGISTRATION,
            self::OPENING_BALANCE_POST_TYPE_CASH_REGISTER_SYSTEM_TYPE,
            self::OPENING_BALANCE_POST_TYPE_WITHDRAWAL_OF_PRODUCTS_VALUED_AT_TURNOVER,
            self::OPENING_BALANCE_POST_TYPE_PRIVATE_WITHDRAWAL_ENTERED_ON_PRIVATE_ACCOUNT,
            self::OPENING_BALANCE_POST_TYPE_TOTAL_WITHDRAWAL_PRODUCTS_ENTERED_AS_SALES_REVENUE,
            self::OPENING_BALANCE_POST_TYPE_WITHDRAWAL_COST_FOR_ENTERTAINMENT,
            self::OPENING_BALANCE_POST_TYPE_WITHDRAWAL_VALUE_VALUED_AT_MARKET_VALUE,
            self::OPENING_BALANCE_POST_TYPE_MARKUP_WITHDRAWAL_COST_FOR_ENTERTAINMENT,
            self::OPENING_BALANCE_POST_TYPE_TOTAL_WITHDRAWAL_COST_FOR_ENTERTAINMENT,
            self::OPENING_BALANCE_POST_TYPE_OPENING_BALANCE_CREDITSALES,
            self::OPENING_BALANCE_POST_TYPE_CLOSING_BALANCE_CREDITSALES,
            self::OPENING_BALANCE_POST_TYPE_OPENING_BALANCE_WRITE_DOWN_NEW_COMPANY,
            self::OPENING_BALANCE_POST_TYPE_CLOSING_BALANCE_WRITE_DOWN_NEW_COMPANY,
            self::OPENING_BALANCE_POST_TYPE_OPENING_BALANCE_RAW_MATERIAL_AND_SEMIFINISHED_PRODUCTS,
            self::OPENING_BALANCE_POST_TYPE_CLOSING_BALANCE_RAW_MATERIAL_AND_SEMIFINISHED_PRODUCTS,
            self::OPENING_BALANCE_POST_TYPE_OPENING_BALANCE_PRODUCT_UNDER_MANUFACTURING,
            self::OPENING_BALANCE_POST_TYPE_CLOSING_BALANCE_PRODUCT_UNDER_MANUFACTURING,
            self::OPENING_BALANCE_POST_TYPE_OPENING_BALANCE_INVENTORIES_FINISHED_ITEM,
            self::OPENING_BALANCE_POST_TYPE_CLOSING_BALANCE_INVENTORIES_FINISHED_ITEM,
            self::OPENING_BALANCE_POST_TYPE_OPENING_BALANCE_PURCHASED_ITEM_FOR_RESALE,
            self::OPENING_BALANCE_POST_TYPE_CLOSING_BALANCE_PURCHASED_ITEM_FOR_RESALE,
            self::OPENING_BALANCE_POST_TYPE_TANGIBLE_FIXED_ASSETS_TYPE,
            self::OPENING_BALANCE_POST_TYPE_OPENING_BALANCE_TANGIBLE_FIXED_ASSETS,
            self::OPENING_BALANCE_POST_TYPE_DEPRECIATION_PERCENTAGE,
            self::OPENING_BALANCE_POST_TYPE_STRAIGHT_LINE_DEPRECIATION,
            self::OPENING_BALANCE_POST_TYPE_CASH_DEPOSITS,
            self::OPENING_BALANCE_POST_TYPE_CONTRIBUTIONS_IN_KIND,
            self::OPENING_BALANCE_POST_TYPE_CAPITAL_REDUCTION_DISTRIBUTED_SHARED_CAPITAL_CASH,
            self::OPENING_BALANCE_POST_TYPE_CAPITAL_REDUCTION_DISTRIBUTED_SHARED_CAPITAL_OTHER_ASSETS,
            self::OPENING_BALANCE_POST_TYPE_DEBT_WAVING,
            self::OPENING_BALANCE_POST_TYPE_BUYING_OWN_SHARES,
            self::OPENING_BALANCE_POST_TYPE_SELLING_OWN_SHARES,
            self::OPENING_BALANCE_POST_TYPE_DEBT_CONVERSION_TO_EQUITY,
            self::OPENING_BALANCE_POST_TYPE_POSITIVE_DIFF_BETWEEN_ALLOCATED_AND_DISTRIBUTED_DIVIDEND,
            self::OPENING_BALANCE_POST_TYPE_NEGATIVE_DIFF_BETWEEN_ALLOCATED_AND_DISTRIBUTED_DIVIDEND,
            self::OPENING_BALANCE_POST_TYPE_OTHER_POSITIVE_CHANGE_IN_EQUITY,
            self::OPENING_BALANCE_POST_TYPE_OTHER_NEGATIVE_CHANGE_IN_EQUITY,
            self::OPENING_BALANCE_POST_TYPE_NONE_DEDUCTIBLE_COST,
            self::OPENING_BALANCE_POST_TYPE_POSITIVE_TAX_COST,
            self::OPENING_BALANCE_POST_TYPE_INTEREST_EXPENSE_FIXED_TAX,
            self::OPENING_BALANCE_POST_TYPE_SHARE_OF_LOSS_FROM_INVESTMENT,
            self::OPENING_BALANCE_POST_TYPE_REVERSAL_OF_IMPAIRMENT,
            self::OPENING_BALANCE_POST_TYPE_ACCOUNTING_IMPAIRMENT,
            self::OPENING_BALANCE_POST_TYPE_ACCOUNTING_LOSS,
            self::OPENING_BALANCE_POST_TYPE_ACCOUNTING_DEFICIT_NORWEAGIAN_SDF,
            self::OPENING_BALANCE_POST_TYPE_ACCOUNTING_DEFICIT_FOREIGN_SDF,
            self::OPENING_BALANCE_POST_TYPE_ACCOUNTING_LOSS_NORWEAGIAN_SDF,
            self::OPENING_BALANCE_POST_TYPE_ACCOUNTING_LOSS_FOREIGN_SDF,
            self::OPENING_BALANCE_POST_TYPE_RETURNED_DEBT_INTEREST,
            self::OPENING_BALANCE_POST_TYPE_TAXABLE_PROFIT_REALIZATION_OF_FINANCIAL_INSTRUMENTS,
            self::OPENING_BALANCE_POST_TYPE_TAXABLE_DIVIDEND_ON_SHARES,
            self::OPENING_BALANCE_POST_TYPE_TAXABLE_PART_OF_DIVIDEND_AND_DISTRIBUTION,
            self::OPENING_BALANCE_POST_TYPE_SHARE_OF_TAXABLE_PROFIT_NORWEGIAN_SDF,
            self::OPENING_BALANCE_POST_TYPE_SHARE_OF_TAXABLE_PROFIT_FOREIGN_SDF,
            self::OPENING_BALANCE_POST_TYPE_TAXABLE_PROFIT_REALIZATION_OF_NORWEGIAN_SDF,
            self::OPENING_BALANCE_POST_TYPE_TAXABLE_PROFIT_REALIZATION_OF_FOREIGN_SDF,
            self::OPENING_BALANCE_POST_TYPE_ADDITION_INTEREST_COST,
            self::OPENING_BALANCE_POST_TYPE_CORRECTION_PURPOSED_DIVIDEND,
            self::OPENING_BALANCE_POST_TYPE_TAXABLE_PROFIT_WITHDRAWAL_NORWEGIAN_TAX_AREA,
            self::OPENING_BALANCE_POST_TYPE_INCOME_SUPPLEMENT_FOR_CONVERSION_DIFFERENCE,
            self::OPENING_BALANCE_POST_TYPE_OTHER_INCOME_SUPPLEMENT,
            self::OPENING_BALANCE_POST_TYPE_RETURN_OF_INCOME_RELATED_DIVIDENDS,
            self::OPENING_BALANCE_POST_TYPE_PROFIT_AND_LOSS_GROUP_CONTRIBUTION,
            self::OPENING_BALANCE_POST_TYPE_ACCOUNTING_PROFIT_REALIZATION_OF_FINANCIAL_INSTRUMENTS,
            self::OPENING_BALANCE_POST_TYPE_ACCOUNTING_PROFIT_SHARE_NORWEGIAN_SDF,
            self::OPENING_BALANCE_POST_TYPE_ACCOUNTING_PROFIT_SHARE_FOREIGN_SDF,
            self::OPENING_BALANCE_POST_TYPE_ACCOUNTING_GAIN_NORWEGIAN_SDF,
            self::OPENING_BALANCE_POST_TYPE_ACCOUNTING_GAIN_FOREIGN_SDF,
            self::OPENING_BALANCE_POST_TYPE_DEDUCTIBLE_LOSS_ON_REALIZATION_OF_FINANCIAL_INSTRUMENTS,
            self::OPENING_BALANCE_POST_TYPE_SHARE_OF_DEDUCTIBLE_DEFICIT_NORWEGIAN_SDF,
            self::OPENING_BALANCE_POST_TYPE_SHARE_OF_DEDUCTIBLE_DEFICIT_FOREIGN_SDF,
            self::OPENING_BALANCE_POST_TYPE_DEDUCTIBLE_LOSS_ON_REALIXATION_NORWEGIAN_SDF,
            self::OPENING_BALANCE_POST_TYPE_DEDUCTIBLE_LOSS_ON_REALIXATION_FOREIGN_SDF,
            self::OPENING_BALANCE_POST_TYPE_DEDUCTIBLE_LOSS_ON_WITHDRAWAL_NORWEGIAN_TAX_AREA,
            self::OPENING_BALANCE_POST_TYPE_ISSUE_AND_ESTABLISHMENT_COST,
            self::OPENING_BALANCE_POST_TYPE_INCOME_DEDUCTION_FROM_ACCOUNTING_CURRENCY_TO_NOK,
            self::OPENING_BALANCE_POST_TYPE_OTHER_INCOME_DEDUCTION,
            self::OPENING_BALANCE_POST_TYPE_TEMPORARY_DIFFERENCES_TYPE,
            self::OPENING_BALANCE_POST_TYPE_OPENING_BALANCE_ACCOUNTABLE_VALUE,
            self::OPENING_BALANCE_POST_TYPE_CLOSING_BALANCE_ACCOUNTABLE_VALUE,
            self::OPENING_BALANCE_POST_TYPE_OPENING_BALANCE_TAX_VALUE,
            self::OPENING_BALANCE_POST_TYPE_CLOSING_BALANCE_TAX_VALUE,
            self::OPENING_BALANCE_POST_TYPE_OPENING_BALANCE_DIFFERENCES,
            self::OPENING_BALANCE_POST_TYPE_CLOSING_BALANCE_DIFFERENCES,
            self::OPENING_BALANCE_POST_TYPE_SHOW_PROFIT_AND_LOSS,
            self::OPENING_BALANCE_POST_TYPE_SHOW_ACCOMMODATION_AND_RESTAURANT,
            self::OPENING_BALANCE_POST_TYPE_IS_ACCOUNTABLE,
            self::OPENING_BALANCE_POST_TYPE_USE_ACCOUNTING_VALUES_IN_INVENTORIES,
            self::OPENING_BALANCE_POST_TYPE_USE_ACCOUNTING_VALUES_IN_CUSTOMER_RECEIVABLES,
            self::OPENING_BALANCE_POST_TYPE_SHOW_TANGIBLE_FIXED_ASSET,
            self::OPENING_BALANCE_POST_TYPE_SHOW_CAR,
            self::OPENING_BALANCE_POST_TYPE_SHOW_INVENTORIES,
            self::OPENING_BALANCE_POST_TYPE_SHOW_CUSTOMER_RECEIVABLES,
            self::OPENING_BALANCE_POST_TYPE_SHOW_CONCERN_RELATION,
            self::OPENING_BALANCE_POST_TYPE_OWN_BUSINESS_PROPERTIES,
            self::OPENING_BALANCE_POST_TYPE_OWN_ASSET_PAPIR,
            self::OPENING_BALANCE_POST_TYPE_TRANSFERED_BY,
            self::OPENING_BALANCE_POST_TYPE_TRANSFERED_DATE,
            self::OPENING_BALANCE_POST_TYPE_YEAR_END_BRREG_DOC_ID,
            self::OPENING_BALANCE_POST_TYPE_YEAR_END_BRREG_DOC_FETCHER_NAME,
            self::OPENING_BALANCE_POST_TYPE_SET_ACCOUNTANT_REVISED,
            self::OPENING_BALANCE_POST_TYPE_RECEIVER_ORG_NR,
            self::OPENING_BALANCE_POST_TYPE_RECEIVER_NAME,
            self::OPENING_BALANCE_POST_TYPE_CONCERN_CONNECTION,
            self::OPENING_BALANCE_POST_TYPE_VOTING_LIMIT,
            self::OPENING_BALANCE_POST_TYPE_DATE_OF_ACQUISITION,
            self::OPENING_BALANCE_POST_TYPE_RECEIVED_GROUP_CONTRIBUTIONS_WITH_TAX_AFFECTION,
            self::OPENING_BALANCE_POST_TYPE_RECEIVED_GROUP_CONTRIBUTIONS_WITHOUT_TAX_AFFECTION,
            self::OPENING_BALANCE_POST_TYPE_SUBMITTED_GROUP_CONTRIBUTIONS_WITH_TAX_AFFECTION,
            self::OPENING_BALANCE_POST_TYPE_SUBMITTED_GROUP_CONTRIBUTIONS_WITHOUT_TAX_AFFECTION,
        ];
    }
    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getClosingBalancePostTypeAllowableValues()
    {
        return [
            self::CLOSING_BALANCE_POST_TYPE_REGISTRATION_NUMBER,
            self::CLOSING_BALANCE_POST_TYPE_DESCRIPTION,
            self::CLOSING_BALANCE_POST_TYPE_VEHICLE_TYPE,
            self::CLOSING_BALANCE_POST_TYPE_YEAR_OF_INITIAL_REGISTRATION,
            self::CLOSING_BALANCE_POST_TYPE_LIST_PRICE,
            self::CLOSING_BALANCE_POST_TYPE_DATE_FROM,
            self::CLOSING_BALANCE_POST_TYPE_DATE_TO,
            self::CLOSING_BALANCE_POST_TYPE_LICENCE,
            self::CLOSING_BALANCE_POST_TYPE_LICENCE_NUMBER,
            self::CLOSING_BALANCE_POST_TYPE_IS_ELECTRONIC_VEHICLE_LOGBOOK_LOGGED,
            self::CLOSING_BALANCE_POST_TYPE_NO_OF_KILOMETRES_TOTAL,
            self::CLOSING_BALANCE_POST_TYPE_OPERATING_EXPENSES,
            self::CLOSING_BALANCE_POST_TYPE_LEASING_RENT,
            self::CLOSING_BALANCE_POST_TYPE_IS_COMPANY_VEHICLE_USED_PRIVATE,
            self::CLOSING_BALANCE_POST_TYPE_NO_OF_KILOMETRES_PRIVATE,
            self::CLOSING_BALANCE_POST_TYPE_DEPRECIATION_PRIVATE_USE,
            self::CLOSING_BALANCE_POST_TYPE_REVERSED_VEHICLE_EXPENSES,
            self::CLOSING_BALANCE_POST_TYPE_NO_OF_LITER_FUEL,
            self::CLOSING_BALANCE_POST_TYPE_TAXIMETER_TYPE,
            self::CLOSING_BALANCE_POST_TYPE_INCOME_PERSONAL_TRANSPORT,
            self::CLOSING_BALANCE_POST_TYPE_INCOME_GOODS_TRANSPORT,
            self::CLOSING_BALANCE_POST_TYPE_DRIVING_INCOME_PAYED_IN_CASH,
            self::CLOSING_BALANCE_POST_TYPE_DRIVING_INCOME_INVOICED_PUBLIC_AGENCIES,
            self::CLOSING_BALANCE_POST_TYPE_TIP_PAYED_WITH_CARD_OR_INVOICE,
            self::CLOSING_BALANCE_POST_TYPE_TIP_PAYED_IN_CASH,
            self::CLOSING_BALANCE_POST_TYPE_NO_OF_KILOMETRES_SCHOOL_CHILDREN,
            self::CLOSING_BALANCE_POST_TYPE_NO_OF_KILOMETRES_WITH_PASSENGER,
            self::CLOSING_BALANCE_POST_TYPE_FLOP_TRIP_AMOUNT,
            self::CLOSING_BALANCE_POST_TYPE_IS_CONNECTED_TO_CENTRAL,
            self::CLOSING_BALANCE_POST_TYPE_ID_FOR_PROFIT_AND_LOSS_ACCOUNT,
            self::CLOSING_BALANCE_POST_TYPE_DESCRIPTION_PROFIT_AND_LOSS_ACCOUNT,
            self::CLOSING_BALANCE_POST_TYPE_MUNICIPALITY_NUMBER,
            self::CLOSING_BALANCE_POST_TYPE_OPENING_BALANCE,
            self::CLOSING_BALANCE_POST_TYPE_PROFIT_SALES_WITHDRAWAL_OTHER_REALIZATIONS,
            self::CLOSING_BALANCE_POST_TYPE_LOSS_SALES_WITHDRAWAL_OTHER_REALIZATIONS,
            self::CLOSING_BALANCE_POST_TYPE_PROFIT_REALIZATIONS_LIVESTOCK,
            self::CLOSING_BALANCE_POST_TYPE_VALUE_ACQUIRED_PROFIT_AND_LOSS_ACCOUNT,
            self::CLOSING_BALANCE_POST_TYPE_VALUE_REALIZED_PROFIT_AND_LOSS_ACCOUNT,
            self::CLOSING_BALANCE_POST_TYPE_ANNUAL_INCOME_RECOGNITION_OR_DEDUCTION_BASIS,
            self::CLOSING_BALANCE_POST_TYPE_PERCENTAGE_PROFIT_AND_LOSS_ACCOUNT,
            self::CLOSING_BALANCE_POST_TYPE_ANNUAL_INCOME_RECOGNITION,
            self::CLOSING_BALANCE_POST_TYPE_ANNUAL_DEDUCTION,
            self::CLOSING_BALANCE_POST_TYPE_CLOSING_BALANCE,
            self::CLOSING_BALANCE_POST_TYPE_IS_REGARDING_REALIZATION_SEPARATED_PLOT_AGRICULTURE_OR_FORESTRY,
            self::CLOSING_BALANCE_POST_TYPE_IS_REGARDING_REALIZATION_WHOLE_AGRICULTURE_OR_FORESTRY_BUSINESS,
            self::CLOSING_BALANCE_POST_TYPE_ID_FOR_ACCOMMODATION_AND_RESTAURANT,
            self::CLOSING_BALANCE_POST_TYPE_COVER_CHARGE_SUBJECT_TO_VAT,
            self::CLOSING_BALANCE_POST_TYPE_COVER_CHARGE_NOT_SUBJECT_TO_VAT,
            self::CLOSING_BALANCE_POST_TYPE_COVER_CHARGE,
            self::CLOSING_BALANCE_POST_TYPE_DESCRIPTION_ACCOMMODATION_AND_RESTAURANT,
            self::CLOSING_BALANCE_POST_TYPE_PRODUCT_TYPE,
            self::CLOSING_BALANCE_POST_TYPE_OPENING_STOCK,
            self::CLOSING_BALANCE_POST_TYPE_CLOSING_STOCK,
            self::CLOSING_BALANCE_POST_TYPE_PURCHASE_OF_GOODS,
            self::CLOSING_BALANCE_POST_TYPE_COST_OF_GOODS_SOLD,
            self::CLOSING_BALANCE_POST_TYPE_SALES_REVENUE_AND_WITHDRAWALS,
            self::CLOSING_BALANCE_POST_TYPE_SALES_REVENUE_IN_CASH,
            self::CLOSING_BALANCE_POST_TYPE_CASH_REGISTER_SYSTEM_YEAR_OF_INITIAL_REGISTRATION,
            self::CLOSING_BALANCE_POST_TYPE_CASH_REGISTER_SYSTEM_TYPE,
            self::CLOSING_BALANCE_POST_TYPE_WITHDRAWAL_OF_PRODUCTS_VALUED_AT_TURNOVER,
            self::CLOSING_BALANCE_POST_TYPE_PRIVATE_WITHDRAWAL_ENTERED_ON_PRIVATE_ACCOUNT,
            self::CLOSING_BALANCE_POST_TYPE_TOTAL_WITHDRAWAL_PRODUCTS_ENTERED_AS_SALES_REVENUE,
            self::CLOSING_BALANCE_POST_TYPE_WITHDRAWAL_COST_FOR_ENTERTAINMENT,
            self::CLOSING_BALANCE_POST_TYPE_WITHDRAWAL_VALUE_VALUED_AT_MARKET_VALUE,
            self::CLOSING_BALANCE_POST_TYPE_MARKUP_WITHDRAWAL_COST_FOR_ENTERTAINMENT,
            self::CLOSING_BALANCE_POST_TYPE_TOTAL_WITHDRAWAL_COST_FOR_ENTERTAINMENT,
            self::CLOSING_BALANCE_POST_TYPE_OPENING_BALANCE_CREDITSALES,
            self::CLOSING_BALANCE_POST_TYPE_CLOSING_BALANCE_CREDITSALES,
            self::CLOSING_BALANCE_POST_TYPE_OPENING_BALANCE_WRITE_DOWN_NEW_COMPANY,
            self::CLOSING_BALANCE_POST_TYPE_CLOSING_BALANCE_WRITE_DOWN_NEW_COMPANY,
            self::CLOSING_BALANCE_POST_TYPE_OPENING_BALANCE_RAW_MATERIAL_AND_SEMIFINISHED_PRODUCTS,
            self::CLOSING_BALANCE_POST_TYPE_CLOSING_BALANCE_RAW_MATERIAL_AND_SEMIFINISHED_PRODUCTS,
            self::CLOSING_BALANCE_POST_TYPE_OPENING_BALANCE_PRODUCT_UNDER_MANUFACTURING,
            self::CLOSING_BALANCE_POST_TYPE_CLOSING_BALANCE_PRODUCT_UNDER_MANUFACTURING,
            self::CLOSING_BALANCE_POST_TYPE_OPENING_BALANCE_INVENTORIES_FINISHED_ITEM,
            self::CLOSING_BALANCE_POST_TYPE_CLOSING_BALANCE_INVENTORIES_FINISHED_ITEM,
            self::CLOSING_BALANCE_POST_TYPE_OPENING_BALANCE_PURCHASED_ITEM_FOR_RESALE,
            self::CLOSING_BALANCE_POST_TYPE_CLOSING_BALANCE_PURCHASED_ITEM_FOR_RESALE,
            self::CLOSING_BALANCE_POST_TYPE_TANGIBLE_FIXED_ASSETS_TYPE,
            self::CLOSING_BALANCE_POST_TYPE_OPENING_BALANCE_TANGIBLE_FIXED_ASSETS,
            self::CLOSING_BALANCE_POST_TYPE_DEPRECIATION_PERCENTAGE,
            self::CLOSING_BALANCE_POST_TYPE_STRAIGHT_LINE_DEPRECIATION,
            self::CLOSING_BALANCE_POST_TYPE_CASH_DEPOSITS,
            self::CLOSING_BALANCE_POST_TYPE_CONTRIBUTIONS_IN_KIND,
            self::CLOSING_BALANCE_POST_TYPE_CAPITAL_REDUCTION_DISTRIBUTED_SHARED_CAPITAL_CASH,
            self::CLOSING_BALANCE_POST_TYPE_CAPITAL_REDUCTION_DISTRIBUTED_SHARED_CAPITAL_OTHER_ASSETS,
            self::CLOSING_BALANCE_POST_TYPE_DEBT_WAVING,
            self::CLOSING_BALANCE_POST_TYPE_BUYING_OWN_SHARES,
            self::CLOSING_BALANCE_POST_TYPE_SELLING_OWN_SHARES,
            self::CLOSING_BALANCE_POST_TYPE_DEBT_CONVERSION_TO_EQUITY,
            self::CLOSING_BALANCE_POST_TYPE_POSITIVE_DIFF_BETWEEN_ALLOCATED_AND_DISTRIBUTED_DIVIDEND,
            self::CLOSING_BALANCE_POST_TYPE_NEGATIVE_DIFF_BETWEEN_ALLOCATED_AND_DISTRIBUTED_DIVIDEND,
            self::CLOSING_BALANCE_POST_TYPE_OTHER_POSITIVE_CHANGE_IN_EQUITY,
            self::CLOSING_BALANCE_POST_TYPE_OTHER_NEGATIVE_CHANGE_IN_EQUITY,
            self::CLOSING_BALANCE_POST_TYPE_NONE_DEDUCTIBLE_COST,
            self::CLOSING_BALANCE_POST_TYPE_POSITIVE_TAX_COST,
            self::CLOSING_BALANCE_POST_TYPE_INTEREST_EXPENSE_FIXED_TAX,
            self::CLOSING_BALANCE_POST_TYPE_SHARE_OF_LOSS_FROM_INVESTMENT,
            self::CLOSING_BALANCE_POST_TYPE_REVERSAL_OF_IMPAIRMENT,
            self::CLOSING_BALANCE_POST_TYPE_ACCOUNTING_IMPAIRMENT,
            self::CLOSING_BALANCE_POST_TYPE_ACCOUNTING_LOSS,
            self::CLOSING_BALANCE_POST_TYPE_ACCOUNTING_DEFICIT_NORWEAGIAN_SDF,
            self::CLOSING_BALANCE_POST_TYPE_ACCOUNTING_DEFICIT_FOREIGN_SDF,
            self::CLOSING_BALANCE_POST_TYPE_ACCOUNTING_LOSS_NORWEAGIAN_SDF,
            self::CLOSING_BALANCE_POST_TYPE_ACCOUNTING_LOSS_FOREIGN_SDF,
            self::CLOSING_BALANCE_POST_TYPE_RETURNED_DEBT_INTEREST,
            self::CLOSING_BALANCE_POST_TYPE_TAXABLE_PROFIT_REALIZATION_OF_FINANCIAL_INSTRUMENTS,
            self::CLOSING_BALANCE_POST_TYPE_TAXABLE_DIVIDEND_ON_SHARES,
            self::CLOSING_BALANCE_POST_TYPE_TAXABLE_PART_OF_DIVIDEND_AND_DISTRIBUTION,
            self::CLOSING_BALANCE_POST_TYPE_SHARE_OF_TAXABLE_PROFIT_NORWEGIAN_SDF,
            self::CLOSING_BALANCE_POST_TYPE_SHARE_OF_TAXABLE_PROFIT_FOREIGN_SDF,
            self::CLOSING_BALANCE_POST_TYPE_TAXABLE_PROFIT_REALIZATION_OF_NORWEGIAN_SDF,
            self::CLOSING_BALANCE_POST_TYPE_TAXABLE_PROFIT_REALIZATION_OF_FOREIGN_SDF,
            self::CLOSING_BALANCE_POST_TYPE_ADDITION_INTEREST_COST,
            self::CLOSING_BALANCE_POST_TYPE_CORRECTION_PURPOSED_DIVIDEND,
            self::CLOSING_BALANCE_POST_TYPE_TAXABLE_PROFIT_WITHDRAWAL_NORWEGIAN_TAX_AREA,
            self::CLOSING_BALANCE_POST_TYPE_INCOME_SUPPLEMENT_FOR_CONVERSION_DIFFERENCE,
            self::CLOSING_BALANCE_POST_TYPE_OTHER_INCOME_SUPPLEMENT,
            self::CLOSING_BALANCE_POST_TYPE_RETURN_OF_INCOME_RELATED_DIVIDENDS,
            self::CLOSING_BALANCE_POST_TYPE_PROFIT_AND_LOSS_GROUP_CONTRIBUTION,
            self::CLOSING_BALANCE_POST_TYPE_ACCOUNTING_PROFIT_REALIZATION_OF_FINANCIAL_INSTRUMENTS,
            self::CLOSING_BALANCE_POST_TYPE_ACCOUNTING_PROFIT_SHARE_NORWEGIAN_SDF,
            self::CLOSING_BALANCE_POST_TYPE_ACCOUNTING_PROFIT_SHARE_FOREIGN_SDF,
            self::CLOSING_BALANCE_POST_TYPE_ACCOUNTING_GAIN_NORWEGIAN_SDF,
            self::CLOSING_BALANCE_POST_TYPE_ACCOUNTING_GAIN_FOREIGN_SDF,
            self::CLOSING_BALANCE_POST_TYPE_DEDUCTIBLE_LOSS_ON_REALIZATION_OF_FINANCIAL_INSTRUMENTS,
            self::CLOSING_BALANCE_POST_TYPE_SHARE_OF_DEDUCTIBLE_DEFICIT_NORWEGIAN_SDF,
            self::CLOSING_BALANCE_POST_TYPE_SHARE_OF_DEDUCTIBLE_DEFICIT_FOREIGN_SDF,
            self::CLOSING_BALANCE_POST_TYPE_DEDUCTIBLE_LOSS_ON_REALIXATION_NORWEGIAN_SDF,
            self::CLOSING_BALANCE_POST_TYPE_DEDUCTIBLE_LOSS_ON_REALIXATION_FOREIGN_SDF,
            self::CLOSING_BALANCE_POST_TYPE_DEDUCTIBLE_LOSS_ON_WITHDRAWAL_NORWEGIAN_TAX_AREA,
            self::CLOSING_BALANCE_POST_TYPE_ISSUE_AND_ESTABLISHMENT_COST,
            self::CLOSING_BALANCE_POST_TYPE_INCOME_DEDUCTION_FROM_ACCOUNTING_CURRENCY_TO_NOK,
            self::CLOSING_BALANCE_POST_TYPE_OTHER_INCOME_DEDUCTION,
            self::CLOSING_BALANCE_POST_TYPE_TEMPORARY_DIFFERENCES_TYPE,
            self::CLOSING_BALANCE_POST_TYPE_OPENING_BALANCE_ACCOUNTABLE_VALUE,
            self::CLOSING_BALANCE_POST_TYPE_CLOSING_BALANCE_ACCOUNTABLE_VALUE,
            self::CLOSING_BALANCE_POST_TYPE_OPENING_BALANCE_TAX_VALUE,
            self::CLOSING_BALANCE_POST_TYPE_CLOSING_BALANCE_TAX_VALUE,
            self::CLOSING_BALANCE_POST_TYPE_OPENING_BALANCE_DIFFERENCES,
            self::CLOSING_BALANCE_POST_TYPE_CLOSING_BALANCE_DIFFERENCES,
            self::CLOSING_BALANCE_POST_TYPE_SHOW_PROFIT_AND_LOSS,
            self::CLOSING_BALANCE_POST_TYPE_SHOW_ACCOMMODATION_AND_RESTAURANT,
            self::CLOSING_BALANCE_POST_TYPE_IS_ACCOUNTABLE,
            self::CLOSING_BALANCE_POST_TYPE_USE_ACCOUNTING_VALUES_IN_INVENTORIES,
            self::CLOSING_BALANCE_POST_TYPE_USE_ACCOUNTING_VALUES_IN_CUSTOMER_RECEIVABLES,
            self::CLOSING_BALANCE_POST_TYPE_SHOW_TANGIBLE_FIXED_ASSET,
            self::CLOSING_BALANCE_POST_TYPE_SHOW_CAR,
            self::CLOSING_BALANCE_POST_TYPE_SHOW_INVENTORIES,
            self::CLOSING_BALANCE_POST_TYPE_SHOW_CUSTOMER_RECEIVABLES,
            self::CLOSING_BALANCE_POST_TYPE_SHOW_CONCERN_RELATION,
            self::CLOSING_BALANCE_POST_TYPE_OWN_BUSINESS_PROPERTIES,
            self::CLOSING_BALANCE_POST_TYPE_OWN_ASSET_PAPIR,
            self::CLOSING_BALANCE_POST_TYPE_TRANSFERED_BY,
            self::CLOSING_BALANCE_POST_TYPE_TRANSFERED_DATE,
            self::CLOSING_BALANCE_POST_TYPE_YEAR_END_BRREG_DOC_ID,
            self::CLOSING_BALANCE_POST_TYPE_YEAR_END_BRREG_DOC_FETCHER_NAME,
            self::CLOSING_BALANCE_POST_TYPE_SET_ACCOUNTANT_REVISED,
            self::CLOSING_BALANCE_POST_TYPE_RECEIVER_ORG_NR,
            self::CLOSING_BALANCE_POST_TYPE_RECEIVER_NAME,
            self::CLOSING_BALANCE_POST_TYPE_CONCERN_CONNECTION,
            self::CLOSING_BALANCE_POST_TYPE_VOTING_LIMIT,
            self::CLOSING_BALANCE_POST_TYPE_DATE_OF_ACQUISITION,
            self::CLOSING_BALANCE_POST_TYPE_RECEIVED_GROUP_CONTRIBUTIONS_WITH_TAX_AFFECTION,
            self::CLOSING_BALANCE_POST_TYPE_RECEIVED_GROUP_CONTRIBUTIONS_WITHOUT_TAX_AFFECTION,
            self::CLOSING_BALANCE_POST_TYPE_SUBMITTED_GROUP_CONTRIBUTIONS_WITH_TAX_AFFECTION,
            self::CLOSING_BALANCE_POST_TYPE_SUBMITTED_GROUP_CONTRIBUTIONS_WITHOUT_TAX_AFFECTION,
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
        $this->container['opening_balance'] = isset($data['opening_balance']) ? $data['opening_balance'] : null;
        $this->container['closing_balance'] = isset($data['closing_balance']) ? $data['closing_balance'] : null;
        $this->container['opening_balance_tax_value'] = isset($data['opening_balance_tax_value']) ? $data['opening_balance_tax_value'] : null;
        $this->container['closing_balance_tax_value'] = isset($data['closing_balance_tax_value']) ? $data['closing_balance_tax_value'] : null;
        $this->container['opening_balance_post_type'] = isset($data['opening_balance_post_type']) ? $data['opening_balance_post_type'] : null;
        $this->container['closing_balance_post_type'] = isset($data['closing_balance_post_type']) ? $data['closing_balance_post_type'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        $allowedValues = $this->getOpeningBalancePostTypeAllowableValues();
        if (!is_null($this->container['opening_balance_post_type']) && !in_array($this->container['opening_balance_post_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'opening_balance_post_type', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getClosingBalancePostTypeAllowableValues();
        if (!is_null($this->container['closing_balance_post_type']) && !in_array($this->container['closing_balance_post_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'closing_balance_post_type', must be one of '%s'",
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
     * Gets opening_balance
     *
     * @return float
     */
    public function getOpeningBalance()
    {
        return $this->container['opening_balance'];
    }

    /**
     * Sets opening_balance
     *
     * @param float $opening_balance opening_balance
     *
     * @return $this
     */
    public function setOpeningBalance($opening_balance)
    {
        $this->container['opening_balance'] = $opening_balance;

        return $this;
    }

    /**
     * Gets closing_balance
     *
     * @return float
     */
    public function getClosingBalance()
    {
        return $this->container['closing_balance'];
    }

    /**
     * Sets closing_balance
     *
     * @param float $closing_balance closing_balance
     *
     * @return $this
     */
    public function setClosingBalance($closing_balance)
    {
        $this->container['closing_balance'] = $closing_balance;

        return $this;
    }

    /**
     * Gets opening_balance_tax_value
     *
     * @return float
     */
    public function getOpeningBalanceTaxValue()
    {
        return $this->container['opening_balance_tax_value'];
    }

    /**
     * Sets opening_balance_tax_value
     *
     * @param float $opening_balance_tax_value opening_balance_tax_value
     *
     * @return $this
     */
    public function setOpeningBalanceTaxValue($opening_balance_tax_value)
    {
        $this->container['opening_balance_tax_value'] = $opening_balance_tax_value;

        return $this;
    }

    /**
     * Gets closing_balance_tax_value
     *
     * @return float
     */
    public function getClosingBalanceTaxValue()
    {
        return $this->container['closing_balance_tax_value'];
    }

    /**
     * Sets closing_balance_tax_value
     *
     * @param float $closing_balance_tax_value closing_balance_tax_value
     *
     * @return $this
     */
    public function setClosingBalanceTaxValue($closing_balance_tax_value)
    {
        $this->container['closing_balance_tax_value'] = $closing_balance_tax_value;

        return $this;
    }

    /**
     * Gets opening_balance_post_type
     *
     * @return string
     */
    public function getOpeningBalancePostType()
    {
        return $this->container['opening_balance_post_type'];
    }

    /**
     * Sets opening_balance_post_type
     *
     * @param string $opening_balance_post_type opening_balance_post_type
     *
     * @return $this
     */
    public function setOpeningBalancePostType($opening_balance_post_type)
    {
        $allowedValues = $this->getOpeningBalancePostTypeAllowableValues();
        if (!is_null($opening_balance_post_type) && !in_array($opening_balance_post_type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'opening_balance_post_type', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['opening_balance_post_type'] = $opening_balance_post_type;

        return $this;
    }

    /**
     * Gets closing_balance_post_type
     *
     * @return string
     */
    public function getClosingBalancePostType()
    {
        return $this->container['closing_balance_post_type'];
    }

    /**
     * Sets closing_balance_post_type
     *
     * @param string $closing_balance_post_type closing_balance_post_type
     *
     * @return $this
     */
    public function setClosingBalancePostType($closing_balance_post_type)
    {
        $allowedValues = $this->getClosingBalancePostTypeAllowableValues();
        if (!is_null($closing_balance_post_type) && !in_array($closing_balance_post_type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'closing_balance_post_type', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['closing_balance_post_type'] = $closing_balance_post_type;

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


