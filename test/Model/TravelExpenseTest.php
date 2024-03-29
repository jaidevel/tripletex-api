<?php
/**
 * TravelExpenseTest
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
 * Please update the test case below to test the model.
 */

namespace Swagger\Client;

/**
 * TravelExpenseTest Class Doc Comment
 *
 * @category    Class
 * @description TravelExpense
 * @package     Swagger\Client
 * @author      Swagger Codegen team
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class TravelExpenseTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Setup before running any test case
     */
    public static function setUpBeforeClass()
    {
    }

    /**
     * Setup before running each test case
     */
    public function setUp()
    {
    }

    /**
     * Clean up after running each test case
     */
    public function tearDown()
    {
    }

    /**
     * Clean up after running all test cases
     */
    public static function tearDownAfterClass()
    {
    }

    /**
     * Test "TravelExpense"
     */
    public function testTravelExpense()
    {
    }

    /**
     * Test attribute "id"
     */
    public function testPropertyId()
    {
    }

    /**
     * Test attribute "version"
     */
    public function testPropertyVersion()
    {
    }

    /**
     * Test attribute "changes"
     */
    public function testPropertyChanges()
    {
    }

    /**
     * Test attribute "url"
     */
    public function testPropertyUrl()
    {
    }

    /**
     * Test attribute "project"
     */
    public function testPropertyProject()
    {
    }

    /**
     * Test attribute "employee"
     */
    public function testPropertyEmployee()
    {
    }

    /**
     * Test attribute "approved_by"
     */
    public function testPropertyApprovedBy()
    {
    }

    /**
     * Test attribute "completed_by"
     */
    public function testPropertyCompletedBy()
    {
    }

    /**
     * Test attribute "rejected_by"
     */
    public function testPropertyRejectedBy()
    {
    }

    /**
     * Test attribute "department"
     */
    public function testPropertyDepartment()
    {
    }

    /**
     * Test attribute "payslip"
     */
    public function testPropertyPayslip()
    {
    }

    /**
     * Test attribute "vat_type"
     */
    public function testPropertyVatType()
    {
    }

    /**
     * Test attribute "payment_currency"
     */
    public function testPropertyPaymentCurrency()
    {
    }

    /**
     * Test attribute "travel_details"
     */
    public function testPropertyTravelDetails()
    {
    }

    /**
     * Test attribute "voucher"
     */
    public function testPropertyVoucher()
    {
    }

    /**
     * Test attribute "attachment"
     */
    public function testPropertyAttachment()
    {
    }

    /**
     * Test attribute "is_completed"
     */
    public function testPropertyIsCompleted()
    {
    }

    /**
     * Test attribute "is_approved"
     */
    public function testPropertyIsApproved()
    {
    }

    /**
     * Test attribute "rejected_comment"
     */
    public function testPropertyRejectedComment()
    {
    }

    /**
     * Test attribute "is_chargeable"
     */
    public function testPropertyIsChargeable()
    {
    }

    /**
     * Test attribute "is_fixed_invoiced_amount"
     */
    public function testPropertyIsFixedInvoicedAmount()
    {
    }

    /**
     * Test attribute "is_include_attached_receipts_when_reinvoicing"
     */
    public function testPropertyIsIncludeAttachedReceiptsWhenReinvoicing()
    {
    }

    /**
     * Test attribute "completed_date"
     */
    public function testPropertyCompletedDate()
    {
    }

    /**
     * Test attribute "approved_date"
     */
    public function testPropertyApprovedDate()
    {
    }

    /**
     * Test attribute "date"
     */
    public function testPropertyDate()
    {
    }

    /**
     * Test attribute "travel_advance"
     */
    public function testPropertyTravelAdvance()
    {
    }

    /**
     * Test attribute "fixed_invoiced_amount"
     */
    public function testPropertyFixedInvoicedAmount()
    {
    }

    /**
     * Test attribute "amount"
     */
    public function testPropertyAmount()
    {
    }

    /**
     * Test attribute "payment_amount"
     */
    public function testPropertyPaymentAmount()
    {
    }

    /**
     * Test attribute "chargeable_amount"
     */
    public function testPropertyChargeableAmount()
    {
    }

    /**
     * Test attribute "low_rate_vat"
     */
    public function testPropertyLowRateVat()
    {
    }

    /**
     * Test attribute "medium_rate_vat"
     */
    public function testPropertyMediumRateVat()
    {
    }

    /**
     * Test attribute "high_rate_vat"
     */
    public function testPropertyHighRateVat()
    {
    }

    /**
     * Test attribute "payment_amount_currency"
     */
    public function testPropertyPaymentAmountCurrency()
    {
    }

    /**
     * Test attribute "number"
     */
    public function testPropertyNumber()
    {
    }

    /**
     * Test attribute "invoice"
     */
    public function testPropertyInvoice()
    {
    }

    /**
     * Test attribute "title"
     */
    public function testPropertyTitle()
    {
    }

    /**
     * Test attribute "per_diem_compensations"
     */
    public function testPropertyPerDiemCompensations()
    {
    }

    /**
     * Test attribute "mileage_allowances"
     */
    public function testPropertyMileageAllowances()
    {
    }

    /**
     * Test attribute "accommodation_allowances"
     */
    public function testPropertyAccommodationAllowances()
    {
    }

    /**
     * Test attribute "costs"
     */
    public function testPropertyCosts()
    {
    }

    /**
     * Test attribute "attachment_count"
     */
    public function testPropertyAttachmentCount()
    {
    }

    /**
     * Test attribute "state"
     */
    public function testPropertyState()
    {
    }

    /**
     * Test attribute "actions"
     */
    public function testPropertyActions()
    {
    }

    /**
     * Test attribute "is_salary_admin"
     */
    public function testPropertyIsSalaryAdmin()
    {
    }

    /**
     * Test attribute "show_payslip"
     */
    public function testPropertyShowPayslip()
    {
    }

    /**
     * Test attribute "accounting_period_closed"
     */
    public function testPropertyAccountingPeriodClosed()
    {
    }

    /**
     * Test attribute "accounting_period_vat_closed"
     */
    public function testPropertyAccountingPeriodVatClosed()
    {
    }
}
