# SwaggerClient-php
## Usage  - **Download the spec** [swagger.json](/v2/swagger.json) file, it is a [OpenAPI Specification](https://github.com/OAI/OpenAPI-Specification).  - **Generating a client** can easily be done using tools like [swagger-codegen](https://github.com/swagger-api/swagger-codegen) or other that accepts [OpenAPI Specification](https://github.com/OAI/OpenAPI-Specification) specs.     - For swagger codegen it is recommended to use the flag: **--removeOperationIdPrefix**.        Unique operation ids are about to be introduced to the spec, and this ensures forward compatibility - and results in less verbose generated code.   ## Overview  - Partial resource updating is done using the `PUT` method with optional fields instead of the `PATCH` method.  - **Actions** or **commands** are represented in our RESTful path with a prefixed `:`. Example: `/v2/hours/123/:approve`.  - **Summaries** or **aggregated** results are represented in our RESTful path with a prefixed `>`. Example: `/v2/hours/>thisWeeksBillables`.  - **Request ID** is a key found in all responses in the header with the name `x-tlx-request-id`. For validation and error responses it is also in the response body. If additional log information is absolutely necessary, our support division can locate the key value.  - **version** This is a revision number found on all persisted resources. If included, it will prevent your PUT/POST from overriding any updates to the resource since your GET.  - **Date** follows the **[ISO 8601](https://en.wikipedia.org/wiki/ISO_8601)** standard, meaning the format `YYYY-MM-DD`.  - **DateTime** follows the **[ISO 8601](https://en.wikipedia.org/wiki/ISO_8601)** standard, meaning the format `YYYY-MM-DDThh:mm:ss`.  - **Searching** is done by entering values in the optional fields for each API call. The values fall into the following categories: range, in, exact and like.  - **Missing fields** or even **no response data** can occur because result objects and fields are filtered on authorization.  - **See [GitHub](https://github.com/Tripletex/tripletex-api2) for more documentation, examples, changelog and more.**  - **See [FAQ](https://tripletex.no/execute/docViewer?articleId=906&language=0) for additional information.**   ## Authentication  - **Tokens:** The Tripletex API uses 3 different tokens    - **consumerToken** is a token provided to the consumer by Tripletex after the API 2.0 registration is completed.    - **employeeToken** is a token created by an administrator in your Tripletex account via the user settings and the tab \"API access\". Each employee token must be given a set of entitlements. [Read more here.](https://tripletex.no/execute/docViewer?articleId=1505&languageId=0)    - **sessionToken** is the token from `/token/session/:create` which requires a consumerToken and an employeeToken created with the same consumer token, but not an authentication header.  - **Authentication** is done via [Basic access authentication](https://en.wikipedia.org/wiki/Basic_access_authentication)    - **username** is used to specify what company to access.      - `0` or blank means the company of the employee.      - Any other value means accountant clients. Use `/company/>withLoginAccess` to get a list of those.    - **password** is the **sessionToken**.    - If you need to create the header yourself use `Authorization: Basic <encoded token>` where `encoded token` is the string `<target company id or 0>:<your session token>` Base64 encoded.   ## Tags  - `[BETA]` This is a beta endpoint and can be subject to change. - `[DEPRECATED]` Deprecated means that we intend to remove/change this feature or capability in a future \"major\" API release. We therefore discourage all use of this feature/capability.   ## Fields  Use the `fields` parameter to specify which fields should be returned. This also supports fields from sub elements, done via `<field>(<subResourceFields>)`. `*` means all fields for that resource. Example values: - `project,activity,hours`  returns `{project:..., activity:...., hours:...}`. - just `project` returns `\"project\" : { \"id\": 12345, \"url\": \"tripletex.no/v2/projects/12345\"  }`. - `project(*)` returns `\"project\" : { \"id\": 12345 \"name\":\"ProjectName\" \"number.....startDate\": \"2013-01-07\" }`. - `project(name)` returns `\"project\" : { \"name\":\"ProjectName\" }`. - All resources and some subResources :  `*,activity(name),employee(*)`.   ## Sorting  Use the `sorting` parameter to specify sorting. It takes a comma separated list, where a `-` prefix denotes descending. You can sort by sub object with the following format: `<field>.<subObjectField>`. Example values: - `date` - `project.name` - `project.name, -date`   ## Changes  To get the changes for a resource, `changes` have to be explicitly specified as part of the `fields` parameter, e.g. `*,changes`. There are currently two types of change available:  - `CREATE` for when the resource was created - `UPDATE` for when the resource was updated  **NOTE** > For objects created prior to October 24th 2018 the list may be incomplete, but will always contain the CREATE and the last change (if the object has been changed after creation).   ## Rate limiting  Rate limiting is performed on the API calls for an employee for each API consumer. Status regarding the rate limit is returned as headers: - `X-Rate-Limit-Limit` - The number of allowed requests in the current period. - `X-Rate-Limit-Remaining` - The number of remaining requests. - `X-Rate-Limit-Reset` - The number of seconds left in the current period.  Once the rate limit is hit, all requests will return HTTP status code `429` for the remainder of the current period.   ## Response envelope  #### Multiple values  ```json {   \"fullResultSize\": ###, // {number} [DEPRECATED]   \"from\": ###, // {number} Paging starting from   \"count\": ###, // {number} Paging count   \"versionDigest\": \"###\", // {string} Hash of full result, null if no result   \"values\": [...{...object...},{...object...},{...object...}...] } ```  #### Single value  ```json {   \"value\": {...single object...} } ```   ## WebHook envelope  ```json {   \"subscriptionId\": ###, // Subscription id   \"event\": \"object.verb\", // As listed from /v2/event/   \"id\": ###, // Id of object this event is for   \"value\": {... single object, null if object.deleted ...} } ```   ## Error/warning envelope  ```json {   \"status\": ###, // {number} HTTP status code   \"code\": #####, // {number} internal status code of event   \"message\": \"###\", // {string} Basic feedback message in your language   \"link\": \"###\", // {string} Link to doc   \"developerMessage\": \"###\", // {string} More technical message   \"validationMessages\": [ // {array} List of validation messages, can be null     {       \"field\": \"###\", // {string} Name of field       \"message\": \"###\" // {string} Validation message for field     }   ],   \"requestId\": \"###\" // {string} Same as x-tlx-request-id  } ```   ## Status codes / Error codes  - **200 OK** - **201 Created** - From POSTs that create something new. - **204 No Content** - When there is no answer, ex: \"/:anAction\" or DELETE. - **400 Bad request** -   -  **4000** Bad Request Exception   - **11000** Illegal Filter Exception   - **12000** Path Param Exception   - **24000** Cryptography Exception - **401 Unauthorized** - When authentication is required and has failed or has not yet been provided   -  **3000** Authentication Exception - **403 Forbidden** - When AuthorisationManager says no.   -  **9000** Security Exception - **404 Not Found** - For resources that does not exist.   -  **6000** Not Found Exception - **409 Conflict** - Such as an edit conflict between multiple simultaneous updates   -  **7000** Object Exists Exception   -  **8000** Revision Exception   - **10000** Locked Exception   - **14000** Duplicate entry - **422 Bad Request** - For Required fields or things like malformed payload.   - **15000** Value Validation Exception   - **16000** Mapping Exception   - **17000** Sorting Exception   - **18000** Validation Exception   - **21000** Param Exception   - **22000** Invalid JSON Exception   - **23000** Result Set Too Large Exception - **429 Too Many Requests** - Request rate limit hit - **500 Internal Error** - Unexpected condition was encountered and no more specific message is suitable   - **1000** Exception

This PHP package is automatically generated by the [Swagger Codegen](https://github.com/swagger-api/swagger-codegen) project:

- API version: 2.70.5
- Build package: io.swagger.codegen.languages.PhpClientCodegen
For more information, please visit [https://github.com/Tripletex/tripletex-api2](https://github.com/Tripletex/tripletex-api2)

## Requirements

PHP 5.5 and later

## Installation & Usage
### Composer

To install the bindings via [Composer](http://getcomposer.org/), add the following to `composer.json`:

```
{
  "repositories": [
    {
      "type": "git",
      "url": "https://github.com//.git"
    }
  ],
  "require": {
    "/": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
    require_once('/path/to/SwaggerClient-php/vendor/autoload.php');
```

## Tests

To run the unit tests:

```
composer install
./vendor/bin/phpunit
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure HTTP basic authorization: tokenAuthScheme
$config = Swagger\Client\Configuration::getDefaultConfiguration()
    ->setUsername('YOUR_USERNAME')
    ->setPassword('YOUR_PASSWORD');

$apiInstance = new Swagger\Client\Api\ActivityApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$project_id = 56; // int | Project ID
$employee_id = 56; // int | Employee ID. Defaults to ID of token owner.
$date = "date_example"; // string | yyyy-MM-dd. Defaults to today.
$from = 0; // int | From index
$count = 1000; // int | Number of elements to return
$sorting = "sorting_example"; // string | Sorting pattern
$fields = "fields_example"; // string | Fields filter pattern

try {
    $result = $apiInstance->activityForTimeSheetGetForTimeSheet($project_id, $employee_id, $date, $from, $count, $sorting, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ActivityApi->activityForTimeSheetGetForTimeSheet: ', $e->getMessage(), PHP_EOL;
}

?>
```

## Documentation for API Endpoints

All URIs are relative to *https://api.tripletex.io/v2*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*ActivityApi* | [**activityForTimeSheetGetForTimeSheet**](docs/Api/ActivityApi.md#activityfortimesheetgetfortimesheet) | **GET** /activity/&gt;forTimeSheet | Find applicable time sheet activities for an employee on a specific day.
*ActivityApi* | [**activityGet**](docs/Api/ActivityApi.md#activityget) | **GET** /activity/{id} | Find activity by ID.
*ActivityApi* | [**activityListPostList**](docs/Api/ActivityApi.md#activitylistpostlist) | **POST** /activity/list | Add multiple activities.
*ActivityApi* | [**activityPost**](docs/Api/ActivityApi.md#activitypost) | **POST** /activity | Add activity.
*ActivityApi* | [**activitySearch**](docs/Api/ActivityApi.md#activitysearch) | **GET** /activity | Find activities corresponding with sent data.
*AssetApi* | [**assetCanDeleteCanDelete**](docs/Api/AssetApi.md#assetcandeletecandelete) | **GET** /asset/canDelete/{id} | Validate delete asset
*AssetApi* | [**assetDelete**](docs/Api/AssetApi.md#assetdelete) | **DELETE** /asset/{id} | Delete asset.
*AssetApi* | [**assetDuplicatePostDuplicate**](docs/Api/AssetApi.md#assetduplicatepostduplicate) | **POST** /asset/duplicate/{id} | Create copy of one asset
*AssetApi* | [**assetGet**](docs/Api/AssetApi.md#assetget) | **GET** /asset/{id} | Get asset by ID.
*AssetApi* | [**assetListPostList**](docs/Api/AssetApi.md#assetlistpostlist) | **POST** /asset/list | Create several assets.
*AssetApi* | [**assetPost**](docs/Api/AssetApi.md#assetpost) | **POST** /asset | Create one asset.
*AssetApi* | [**assetPut**](docs/Api/AssetApi.md#assetput) | **PUT** /asset/{id} | Update asset.
*AssetApi* | [**assetSearch**](docs/Api/AssetApi.md#assetsearch) | **GET** /asset | Find assets corresponding with sent data.
*AuthinternalApi* | [**internalAuthConfigGetConfig**](docs/Api/AuthinternalApi.md#internalauthconfiggetconfig) | **GET** /internal/auth/config | Get auth config
*BalanceSheetApi* | [**balanceSheetSearch**](docs/Api/BalanceSheetApi.md#balancesheetsearch) | **GET** /balanceSheet | Get balance sheet (saldobalanse).
*BankApi* | [**bankGet**](docs/Api/BankApi.md#bankget) | **GET** /bank/{id} | Get bank.
*BankApi* | [**bankSearch**](docs/Api/BankApi.md#banksearch) | **GET** /bank | Find bank corresponding with sent data.
*BankreconciliationApi* | [**bankReconciliationAdjustmentAdjustment**](docs/Api/BankreconciliationApi.md#bankreconciliationadjustmentadjustment) | **PUT** /bank/reconciliation/{id}/:adjustment | Add an adjustment to reconciliation by ID.
*BankreconciliationApi* | [**bankReconciliationClosedWithUnmatchedTransactionsClosedWithUnmatchedTransactions**](docs/Api/BankreconciliationApi.md#bankreconciliationclosedwithunmatchedtransactionsclosedwithunmatchedtransactions) | **GET** /bank/reconciliation/closedWithUnmatchedTransactions | Get the last closed reconciliation with unmached transactions by account ID.
*BankreconciliationApi* | [**bankReconciliationDelete**](docs/Api/BankreconciliationApi.md#bankreconciliationdelete) | **DELETE** /bank/reconciliation/{id} | Delete bank reconciliation by ID.
*BankreconciliationApi* | [**bankReconciliationGet**](docs/Api/BankreconciliationApi.md#bankreconciliationget) | **GET** /bank/reconciliation/{id} | Get bank reconciliation.
*BankreconciliationApi* | [**bankReconciliationLastClosedLastClosed**](docs/Api/BankreconciliationApi.md#bankreconciliationlastclosedlastclosed) | **GET** /bank/reconciliation/&gt;lastClosed | Get last closed reconciliation by account ID.
*BankreconciliationApi* | [**bankReconciliationLastLast**](docs/Api/BankreconciliationApi.md#bankreconciliationlastlast) | **GET** /bank/reconciliation/&gt;last | Get the last created reconciliation by account ID.
*BankreconciliationApi* | [**bankReconciliationPost**](docs/Api/BankreconciliationApi.md#bankreconciliationpost) | **POST** /bank/reconciliation | Post a bank reconciliation.
*BankreconciliationApi* | [**bankReconciliationPut**](docs/Api/BankreconciliationApi.md#bankreconciliationput) | **PUT** /bank/reconciliation/{id} | Update a bank reconciliation.
*BankreconciliationApi* | [**bankReconciliationSearch**](docs/Api/BankreconciliationApi.md#bankreconciliationsearch) | **GET** /bank/reconciliation | Find bank reconciliation corresponding with sent data.
*BankreconciliationmatchApi* | [**bankReconciliationMatchCountCount**](docs/Api/BankreconciliationmatchApi.md#bankreconciliationmatchcountcount) | **GET** /bank/reconciliation/match/count | Get the total number of matches
*BankreconciliationmatchApi* | [**bankReconciliationMatchDelete**](docs/Api/BankreconciliationmatchApi.md#bankreconciliationmatchdelete) | **DELETE** /bank/reconciliation/match/{id} | Delete a bank reconciliation match by ID.
*BankreconciliationmatchApi* | [**bankReconciliationMatchGet**](docs/Api/BankreconciliationmatchApi.md#bankreconciliationmatchget) | **GET** /bank/reconciliation/match/{id} | Get bank reconciliation match by ID.
*BankreconciliationmatchApi* | [**bankReconciliationMatchPost**](docs/Api/BankreconciliationmatchApi.md#bankreconciliationmatchpost) | **POST** /bank/reconciliation/match | Create a bank reconciliation match.
*BankreconciliationmatchApi* | [**bankReconciliationMatchPut**](docs/Api/BankreconciliationmatchApi.md#bankreconciliationmatchput) | **PUT** /bank/reconciliation/match/{id} | Update a bank reconciliation match by ID.
*BankreconciliationmatchApi* | [**bankReconciliationMatchQueryQuery**](docs/Api/BankreconciliationmatchApi.md#bankreconciliationmatchqueryquery) | **GET** /bank/reconciliation/match/query | [INTERNAL] Wildcard search.
*BankreconciliationmatchApi* | [**bankReconciliationMatchSearch**](docs/Api/BankreconciliationmatchApi.md#bankreconciliationmatchsearch) | **GET** /bank/reconciliation/match | Find bank reconciliation match corresponding with sent data.
*BankreconciliationmatchApi* | [**bankReconciliationMatchSuggestSuggest**](docs/Api/BankreconciliationmatchApi.md#bankreconciliationmatchsuggestsuggest) | **PUT** /bank/reconciliation/match/:suggest | Suggest matches for a bank reconciliation by ID.
*BankreconciliationmatchApi* | [**bankReconciliationMatchesCounterGet**](docs/Api/BankreconciliationmatchApi.md#bankreconciliationmatchescounterget) | **GET** /bank/reconciliation/matches/counter | [BETA] Get number of matches since last page access.
*BankreconciliationmatchApi* | [**bankReconciliationMatchesCounterPost**](docs/Api/BankreconciliationmatchApi.md#bankreconciliationmatchescounterpost) | **POST** /bank/reconciliation/matches/counter | [BETA] Reset the number of matches after the page has been accessed.
*BankreconciliationpaymentTypeApi* | [**bankReconciliationPaymentTypeGet**](docs/Api/BankreconciliationpaymentTypeApi.md#bankreconciliationpaymenttypeget) | **GET** /bank/reconciliation/paymentType/{id} | Get payment type by ID.
*BankreconciliationpaymentTypeApi* | [**bankReconciliationPaymentTypeSearch**](docs/Api/BankreconciliationpaymentTypeApi.md#bankreconciliationpaymenttypesearch) | **GET** /bank/reconciliation/paymentType | Find payment type corresponding with sent data.
*BankreconciliationsettingsApi* | [**bankReconciliationSettingsGet**](docs/Api/BankreconciliationsettingsApi.md#bankreconciliationsettingsget) | **GET** /bank/reconciliation/settings | Get bank reconciliation settings.
*BankreconciliationsettingsApi* | [**bankReconciliationSettingsPost**](docs/Api/BankreconciliationsettingsApi.md#bankreconciliationsettingspost) | **POST** /bank/reconciliation/settings | Post bank reconciliation settings.
*BankreconciliationsettingsApi* | [**bankReconciliationSettingsPut**](docs/Api/BankreconciliationsettingsApi.md#bankreconciliationsettingsput) | **PUT** /bank/reconciliation/settings/{id} | Update bank reconciliation settings.
*BankstatementApi* | [**bankStatementDelete**](docs/Api/BankstatementApi.md#bankstatementdelete) | **DELETE** /bank/statement/{id} | Delete bank statement by ID.
*BankstatementApi* | [**bankStatementGet**](docs/Api/BankstatementApi.md#bankstatementget) | **GET** /bank/statement/{id} | Get bank statement.
*BankstatementApi* | [**bankStatementImportImportBankStatement**](docs/Api/BankstatementApi.md#bankstatementimportimportbankstatement) | **POST** /bank/statement/import | Upload bank statement file.
*BankstatementApi* | [**bankStatementSearch**](docs/Api/BankstatementApi.md#bankstatementsearch) | **GET** /bank/statement | Find bank statement corresponding with sent data.
*BankstatementtransactionApi* | [**bankStatementTransactionDetailsGetDetails**](docs/Api/BankstatementtransactionApi.md#bankstatementtransactiondetailsgetdetails) | **GET** /bank/statement/transaction/{id}/details | Get additional details about transaction by ID.
*BankstatementtransactionApi* | [**bankStatementTransactionGet**](docs/Api/BankstatementtransactionApi.md#bankstatementtransactionget) | **GET** /bank/statement/transaction/{id} | Get bank transaction by ID.
*BankstatementtransactionApi* | [**bankStatementTransactionSearch**](docs/Api/BankstatementtransactionApi.md#bankstatementtransactionsearch) | **GET** /bank/statement/transaction | Find bank transaction corresponding with sent data.
*CompanyApi* | [**companyDivisionsGetDivisions**](docs/Api/CompanyApi.md#companydivisionsgetdivisions) | **GET** /company/divisions | [DEPRECATED] Find divisions.
*CompanyApi* | [**companyGet**](docs/Api/CompanyApi.md#companyget) | **GET** /company/{id} | Find company by ID.
*CompanyApi* | [**companyPut**](docs/Api/CompanyApi.md#companyput) | **PUT** /company | Update company information.
*CompanyApi* | [**companyWithLoginAccessGetWithLoginAccess**](docs/Api/CompanyApi.md#companywithloginaccessgetwithloginaccess) | **GET** /company/&gt;withLoginAccess | Returns client customers (with accountant/auditor relation) where the current user has login access (proxy login).
*CompanyaltinnApi* | [**companySettingsAltinnPut**](docs/Api/CompanyaltinnApi.md#companysettingsaltinnput) | **PUT** /company/settings/altinn | Update AltInn id and password.
*CompanyaltinnApi* | [**companySettingsAltinnSearch**](docs/Api/CompanyaltinnApi.md#companysettingsaltinnsearch) | **GET** /company/settings/altinn | Find Altinn id for login in company.
*CompanysalesmodulesApi* | [**companySalesmodulesGet**](docs/Api/CompanysalesmodulesApi.md#companysalesmodulesget) | **GET** /company/salesmodules | [BETA] Get active sales modules.
*CompanysalesmodulesApi* | [**companySalesmodulesPost**](docs/Api/CompanysalesmodulesApi.md#companysalesmodulespost) | **POST** /company/salesmodules | [BETA] Add (activate) a new sales module.
*ContactApi* | [**contactGet**](docs/Api/ContactApi.md#contactget) | **GET** /contact/{id} | Get contact by ID.
*ContactApi* | [**contactListDeleteByIds**](docs/Api/ContactApi.md#contactlistdeletebyids) | **DELETE** /contact/list | [BETA] Delete multiple contacts.
*ContactApi* | [**contactPost**](docs/Api/ContactApi.md#contactpost) | **POST** /contact | Create contact.
*ContactApi* | [**contactPut**](docs/Api/ContactApi.md#contactput) | **PUT** /contact/{id} | Update contact.
*ContactApi* | [**contactSearch**](docs/Api/ContactApi.md#contactsearch) | **GET** /contact | Find contacts corresponding with sent data.
*CountryApi* | [**countryGet**](docs/Api/CountryApi.md#countryget) | **GET** /country/{id} | Get country by ID.
*CountryApi* | [**countrySearch**](docs/Api/CountryApi.md#countrysearch) | **GET** /country | Find countries corresponding with sent data.
*CrmprospectApi* | [**crmProspectGet**](docs/Api/CrmprospectApi.md#crmprospectget) | **GET** /crm/prospect/{id} | Get prospect by ID.
*CrmprospectApi* | [**crmProspectSearch**](docs/Api/CrmprospectApi.md#crmprospectsearch) | **GET** /crm/prospect | Find prospects corresponding with sent data.
*CurrencyApi* | [**currencyGet**](docs/Api/CurrencyApi.md#currencyget) | **GET** /currency/{id} | Get currency by ID.
*CurrencyApi* | [**currencyRateGetRate**](docs/Api/CurrencyApi.md#currencyrategetrate) | **GET** /currency/{id}/rate | Find currency exchange rate corresponding with sent data.
*CurrencyApi* | [**currencySearch**](docs/Api/CurrencyApi.md#currencysearch) | **GET** /currency | Find currencies corresponding with sent data.
*CustomerApi* | [**customerDelete**](docs/Api/CustomerApi.md#customerdelete) | **DELETE** /customer/{id} | [BETA] Delete customer by ID
*CustomerApi* | [**customerGet**](docs/Api/CustomerApi.md#customerget) | **GET** /customer/{id} | Get customer by ID.
*CustomerApi* | [**customerListPostList**](docs/Api/CustomerApi.md#customerlistpostlist) | **POST** /customer/list | [BETA] Create multiple customers. Related supplier addresses may also be created.
*CustomerApi* | [**customerListPutList**](docs/Api/CustomerApi.md#customerlistputlist) | **PUT** /customer/list | [BETA] Update multiple customers. Addresses can also be updated.
*CustomerApi* | [**customerPost**](docs/Api/CustomerApi.md#customerpost) | **POST** /customer | Create customer. Related customer addresses may also be created.
*CustomerApi* | [**customerPut**](docs/Api/CustomerApi.md#customerput) | **PUT** /customer/{id} | Update customer.
*CustomerApi* | [**customerSearch**](docs/Api/CustomerApi.md#customersearch) | **GET** /customer | Find customers corresponding with sent data.
*CustomercategoryApi* | [**customerCategoryGet**](docs/Api/CustomercategoryApi.md#customercategoryget) | **GET** /customer/category/{id} | Find customer/supplier category by ID.
*CustomercategoryApi* | [**customerCategoryPost**](docs/Api/CustomercategoryApi.md#customercategorypost) | **POST** /customer/category | Add new customer/supplier category.
*CustomercategoryApi* | [**customerCategoryPut**](docs/Api/CustomercategoryApi.md#customercategoryput) | **PUT** /customer/category/{id} | Update customer/supplier category.
*CustomercategoryApi* | [**customerCategorySearch**](docs/Api/CustomercategoryApi.md#customercategorysearch) | **GET** /customer/category | Find customer/supplier categories corresponding with sent data.
*DeliveryAddressApi* | [**deliveryAddressGet**](docs/Api/DeliveryAddressApi.md#deliveryaddressget) | **GET** /deliveryAddress/{id} | Get address by ID.
*DeliveryAddressApi* | [**deliveryAddressPut**](docs/Api/DeliveryAddressApi.md#deliveryaddressput) | **PUT** /deliveryAddress/{id} | Update address.
*DeliveryAddressApi* | [**deliveryAddressSearch**](docs/Api/DeliveryAddressApi.md#deliveryaddresssearch) | **GET** /deliveryAddress | Find addresses corresponding with sent data.
*DepartmentApi* | [**departmentDelete**](docs/Api/DepartmentApi.md#departmentdelete) | **DELETE** /department/{id} | Delete department by ID
*DepartmentApi* | [**departmentGet**](docs/Api/DepartmentApi.md#departmentget) | **GET** /department/{id} | Get department by ID.
*DepartmentApi* | [**departmentListPostList**](docs/Api/DepartmentApi.md#departmentlistpostlist) | **POST** /department/list | Register new departments.
*DepartmentApi* | [**departmentListPutList**](docs/Api/DepartmentApi.md#departmentlistputlist) | **PUT** /department/list | Update multiple departments.
*DepartmentApi* | [**departmentPost**](docs/Api/DepartmentApi.md#departmentpost) | **POST** /department | Add new department.
*DepartmentApi* | [**departmentPut**](docs/Api/DepartmentApi.md#departmentput) | **PUT** /department/{id} | Update department.
*DepartmentApi* | [**departmentQueryQuery**](docs/Api/DepartmentApi.md#departmentqueryquery) | **GET** /department/query | Wildcard search.
*DepartmentApi* | [**departmentSearch**](docs/Api/DepartmentApi.md#departmentsearch) | **GET** /department | Find department corresponding with sent data.
*DivisionApi* | [**divisionListPostList**](docs/Api/DivisionApi.md#divisionlistpostlist) | **POST** /division/list | Create divisions.
*DivisionApi* | [**divisionListPutList**](docs/Api/DivisionApi.md#divisionlistputlist) | **PUT** /division/list | Update multiple divisions.
*DivisionApi* | [**divisionPost**](docs/Api/DivisionApi.md#divisionpost) | **POST** /division | Create division.
*DivisionApi* | [**divisionPut**](docs/Api/DivisionApi.md#divisionput) | **PUT** /division/{id} | Update division information.
*DivisionApi* | [**divisionSearch**](docs/Api/DivisionApi.md#divisionsearch) | **GET** /division | Get divisions.
*DocumentApi* | [**documentContentDownloadContent**](docs/Api/DocumentApi.md#documentcontentdownloadcontent) | **GET** /document/{id}/content | [BETA] Get content of document given by ID.
*DocumentApi* | [**documentGet**](docs/Api/DocumentApi.md#documentget) | **GET** /document/{id} | [BETA] Get document by ID.
*DocumentArchiveApi* | [**documentArchiveAccountAccountPost**](docs/Api/DocumentArchiveApi.md#documentarchiveaccountaccountpost) | **POST** /documentArchive/account/{id} | [BETA] Upload file to Account Document Archive.
*DocumentArchiveApi* | [**documentArchiveAccountGetAccount**](docs/Api/DocumentArchiveApi.md#documentarchiveaccountgetaccount) | **GET** /documentArchive/account/{id} | [BETA] Find documents archived associated with account object type.
*DocumentArchiveApi* | [**documentArchiveCustomerCustomerPost**](docs/Api/DocumentArchiveApi.md#documentarchivecustomercustomerpost) | **POST** /documentArchive/customer/{id} | [BETA] Upload file to Customer Document Archive.
*DocumentArchiveApi* | [**documentArchiveCustomerGetCustomer**](docs/Api/DocumentArchiveApi.md#documentarchivecustomergetcustomer) | **GET** /documentArchive/customer/{id} | [BETA] Find documents archived associated with customer object type.
*DocumentArchiveApi* | [**documentArchiveDelete**](docs/Api/DocumentArchiveApi.md#documentarchivedelete) | **DELETE** /documentArchive/{id} | [BETA] Delete document archive.
*DocumentArchiveApi* | [**documentArchiveEmployeeEmployeePost**](docs/Api/DocumentArchiveApi.md#documentarchiveemployeeemployeepost) | **POST** /documentArchive/employee/{id} | [BETA] Upload file to Employee Document Archive.
*DocumentArchiveApi* | [**documentArchiveEmployeeGetEmployee**](docs/Api/DocumentArchiveApi.md#documentarchiveemployeegetemployee) | **GET** /documentArchive/employee/{id} | [BETA] Find documents archived associated with employee object type.
*DocumentArchiveApi* | [**documentArchiveProductGetProduct**](docs/Api/DocumentArchiveApi.md#documentarchiveproductgetproduct) | **GET** /documentArchive/product/{id} | [BETA] Find documents archived associated with product object type.
*DocumentArchiveApi* | [**documentArchiveProductProductPost**](docs/Api/DocumentArchiveApi.md#documentarchiveproductproductpost) | **POST** /documentArchive/product/{id} | [BETA] Upload file to Product Document Archive.
*DocumentArchiveApi* | [**documentArchiveProjectGetProject**](docs/Api/DocumentArchiveApi.md#documentarchiveprojectgetproject) | **GET** /documentArchive/project/{id} | [BETA] Find documents archived associated with project object type.
*DocumentArchiveApi* | [**documentArchiveProjectProjectPost**](docs/Api/DocumentArchiveApi.md#documentarchiveprojectprojectpost) | **POST** /documentArchive/project/{id} | [BETA] Upload file to Project Document Archive.
*DocumentArchiveApi* | [**documentArchiveProspectGetProspect**](docs/Api/DocumentArchiveApi.md#documentarchiveprospectgetprospect) | **GET** /documentArchive/prospect/{id} | [BETA] Find documents archived associated with prospect object type.
*DocumentArchiveApi* | [**documentArchiveProspectProspectPost**](docs/Api/DocumentArchiveApi.md#documentarchiveprospectprospectpost) | **POST** /documentArchive/prospect/{id} | [BETA] Upload file to Prospect Document Archive.
*DocumentArchiveApi* | [**documentArchivePut**](docs/Api/DocumentArchiveApi.md#documentarchiveput) | **PUT** /documentArchive/{id} | [BETA] Update document archive.
*DocumentArchiveApi* | [**documentArchiveReceptionReceptionPost**](docs/Api/DocumentArchiveApi.md#documentarchivereceptionreceptionpost) | **POST** /documentArchive/reception | [BETA] Upload a file to the document archive reception. Send as multipart form.
*DocumentArchiveApi* | [**documentArchiveSupplierGetSupplier**](docs/Api/DocumentArchiveApi.md#documentarchivesuppliergetsupplier) | **GET** /documentArchive/supplier/{id} | [BETA] Find documents archived associated with supplier object type.
*DocumentArchiveApi* | [**documentArchiveSupplierSupplierPost**](docs/Api/DocumentArchiveApi.md#documentarchivesuppliersupplierpost) | **POST** /documentArchive/supplier/{id} | [BETA] Upload file to Supplier Document Archive.
*EmployeeApi* | [**employeeGet**](docs/Api/EmployeeApi.md#employeeget) | **GET** /employee/{id} | Get employee by ID.
*EmployeeApi* | [**employeeListPostList**](docs/Api/EmployeeApi.md#employeelistpostlist) | **POST** /employee/list | Create several employees.
*EmployeeApi* | [**employeePost**](docs/Api/EmployeeApi.md#employeepost) | **POST** /employee | Create one employee.
*EmployeeApi* | [**employeePut**](docs/Api/EmployeeApi.md#employeeput) | **PUT** /employee/{id} | Update employee.
*EmployeeApi* | [**employeeSearch**](docs/Api/EmployeeApi.md#employeesearch) | **GET** /employee | Find employees corresponding with sent data.
*EmployeecategoryApi* | [**employeeCategoryDelete**](docs/Api/EmployeecategoryApi.md#employeecategorydelete) | **DELETE** /employee/category/{id} | Delete employee category by ID
*EmployeecategoryApi* | [**employeeCategoryGet**](docs/Api/EmployeecategoryApi.md#employeecategoryget) | **GET** /employee/category/{id} | Get employee category by ID.
*EmployeecategoryApi* | [**employeeCategoryListDeleteByIds**](docs/Api/EmployeecategoryApi.md#employeecategorylistdeletebyids) | **DELETE** /employee/category/list | Delete multiple employee categories
*EmployeecategoryApi* | [**employeeCategoryListPostList**](docs/Api/EmployeecategoryApi.md#employeecategorylistpostlist) | **POST** /employee/category/list | Create new employee categories.
*EmployeecategoryApi* | [**employeeCategoryListPutList**](docs/Api/EmployeecategoryApi.md#employeecategorylistputlist) | **PUT** /employee/category/list | Update multiple employee categories.
*EmployeecategoryApi* | [**employeeCategoryPost**](docs/Api/EmployeecategoryApi.md#employeecategorypost) | **POST** /employee/category | Create a new employee category.
*EmployeecategoryApi* | [**employeeCategoryPut**](docs/Api/EmployeecategoryApi.md#employeecategoryput) | **PUT** /employee/category/{id} | Update employee category information.
*EmployeecategoryApi* | [**employeeCategorySearch**](docs/Api/EmployeecategoryApi.md#employeecategorysearch) | **GET** /employee/category | Find employee category corresponding with sent data.
*EmployeeemploymentApi* | [**employeeEmploymentGet**](docs/Api/EmployeeemploymentApi.md#employeeemploymentget) | **GET** /employee/employment/{id} | Find employment by ID.
*EmployeeemploymentApi* | [**employeeEmploymentPost**](docs/Api/EmployeeemploymentApi.md#employeeemploymentpost) | **POST** /employee/employment | Create employment.
*EmployeeemploymentApi* | [**employeeEmploymentPut**](docs/Api/EmployeeemploymentApi.md#employeeemploymentput) | **PUT** /employee/employment/{id} | Update employemnt.
*EmployeeemploymentApi* | [**employeeEmploymentSearch**](docs/Api/EmployeeemploymentApi.md#employeeemploymentsearch) | **GET** /employee/employment | Find all employments for employee.
*EmployeeemploymentdetailsApi* | [**employeeEmploymentDetailsGet**](docs/Api/EmployeeemploymentdetailsApi.md#employeeemploymentdetailsget) | **GET** /employee/employment/details/{id} | Find employment details by ID.
*EmployeeemploymentdetailsApi* | [**employeeEmploymentDetailsPost**](docs/Api/EmployeeemploymentdetailsApi.md#employeeemploymentdetailspost) | **POST** /employee/employment/details | Create employment details.
*EmployeeemploymentdetailsApi* | [**employeeEmploymentDetailsPut**](docs/Api/EmployeeemploymentdetailsApi.md#employeeemploymentdetailsput) | **PUT** /employee/employment/details/{id} | Update employment details.
*EmployeeemploymentdetailsApi* | [**employeeEmploymentDetailsSearch**](docs/Api/EmployeeemploymentdetailsApi.md#employeeemploymentdetailssearch) | **GET** /employee/employment/details | Find all employmentdetails for employment.
*EmployeeemploymentemploymentTypeApi* | [**employeeEmploymentEmploymentTypeEmploymentEndReasonTypeGetEmploymentEndReasonType**](docs/Api/EmployeeemploymentemploymentTypeApi.md#employeeemploymentemploymenttypeemploymentendreasontypegetemploymentendreasontype) | **GET** /employee/employment/employmentType/employmentEndReasonType | Find all employment end reason type IDs.
*EmployeeemploymentemploymentTypeApi* | [**employeeEmploymentEmploymentTypeEmploymentFormTypeGetEmploymentFormType**](docs/Api/EmployeeemploymentemploymentTypeApi.md#employeeemploymentemploymenttypeemploymentformtypegetemploymentformtype) | **GET** /employee/employment/employmentType/employmentFormType | Find all employment form type IDs.
*EmployeeemploymentemploymentTypeApi* | [**employeeEmploymentEmploymentTypeMaritimeEmploymentTypeGetMaritimeEmploymentType**](docs/Api/EmployeeemploymentemploymentTypeApi.md#employeeemploymentemploymenttypemaritimeemploymenttypegetmaritimeemploymenttype) | **GET** /employee/employment/employmentType/maritimeEmploymentType | Find all maritime employment type IDs.
*EmployeeemploymentemploymentTypeApi* | [**employeeEmploymentEmploymentTypeSalaryTypeGetSalaryType**](docs/Api/EmployeeemploymentemploymentTypeApi.md#employeeemploymentemploymenttypesalarytypegetsalarytype) | **GET** /employee/employment/employmentType/salaryType | Find all salary type IDs.
*EmployeeemploymentemploymentTypeApi* | [**employeeEmploymentEmploymentTypeScheduleTypeGetScheduleType**](docs/Api/EmployeeemploymentemploymentTypeApi.md#employeeemploymentemploymenttypescheduletypegetscheduletype) | **GET** /employee/employment/employmentType/scheduleType | Find all schedule type IDs.
*EmployeeemploymentemploymentTypeApi* | [**employeeEmploymentEmploymentTypeSearch**](docs/Api/EmployeeemploymentemploymentTypeApi.md#employeeemploymentemploymenttypesearch) | **GET** /employee/employment/employmentType | Find all employment type IDs.
*EmployeeemploymentleaveOfAbsenceApi* | [**employeeEmploymentLeaveOfAbsenceGet**](docs/Api/EmployeeemploymentleaveOfAbsenceApi.md#employeeemploymentleaveofabsenceget) | **GET** /employee/employment/leaveOfAbsence/{id} | Find leave of absence by ID.
*EmployeeemploymentleaveOfAbsenceApi* | [**employeeEmploymentLeaveOfAbsenceListPostList**](docs/Api/EmployeeemploymentleaveOfAbsenceApi.md#employeeemploymentleaveofabsencelistpostlist) | **POST** /employee/employment/leaveOfAbsence/list | Create multiple leave of absences.
*EmployeeemploymentleaveOfAbsenceApi* | [**employeeEmploymentLeaveOfAbsencePost**](docs/Api/EmployeeemploymentleaveOfAbsenceApi.md#employeeemploymentleaveofabsencepost) | **POST** /employee/employment/leaveOfAbsence | Create leave of absence.
*EmployeeemploymentleaveOfAbsenceApi* | [**employeeEmploymentLeaveOfAbsencePut**](docs/Api/EmployeeemploymentleaveOfAbsenceApi.md#employeeemploymentleaveofabsenceput) | **PUT** /employee/employment/leaveOfAbsence/{id} | Update leave of absence.
*EmployeeemploymentleaveOfAbsenceApi* | [**employeeEmploymentLeaveOfAbsenceSearch**](docs/Api/EmployeeemploymentleaveOfAbsenceApi.md#employeeemploymentleaveofabsencesearch) | **GET** /employee/employment/leaveOfAbsence | Find all leave of absence corresponding with the sent data.
*EmployeeemploymentleaveOfAbsenceTypeApi* | [**employeeEmploymentLeaveOfAbsenceTypeSearch**](docs/Api/EmployeeemploymentleaveOfAbsenceTypeApi.md#employeeemploymentleaveofabsencetypesearch) | **GET** /employee/employment/leaveOfAbsenceType | Find all leave of absence type IDs.
*EmployeeemploymentoccupationCodeApi* | [**employeeEmploymentOccupationCodeSearch**](docs/Api/EmployeeemploymentoccupationCodeApi.md#employeeemploymentoccupationcodesearch) | **GET** /employee/employment/occupationCode | Find all profession codes.
*EmployeeemploymentremunerationTypeApi* | [**employeeEmploymentRemunerationTypeSearch**](docs/Api/EmployeeemploymentremunerationTypeApi.md#employeeemploymentremunerationtypesearch) | **GET** /employee/employment/remunerationType | Find all remuneration type IDs.
*EmployeeemploymentworkingHoursSchemeApi* | [**employeeEmploymentWorkingHoursSchemeSearch**](docs/Api/EmployeeemploymentworkingHoursSchemeApi.md#employeeemploymentworkinghoursschemesearch) | **GET** /employee/employment/workingHoursScheme | Find working hours scheme ID.
*EmployeeentitlementApi* | [**employeeEntitlementClientClient**](docs/Api/EmployeeentitlementApi.md#employeeentitlementclientclient) | **GET** /employee/entitlement/client | [BETA] Find all entitlements at client for user.
*EmployeeentitlementApi* | [**employeeEntitlementGet**](docs/Api/EmployeeentitlementApi.md#employeeentitlementget) | **GET** /employee/entitlement/{id} | Get entitlement by ID.
*EmployeeentitlementApi* | [**employeeEntitlementGrantClientEntitlementsByTemplateGrantClientEntitlementsByTemplate**](docs/Api/EmployeeentitlementApi.md#employeeentitlementgrantcliententitlementsbytemplategrantcliententitlementsbytemplate) | **PUT** /employee/entitlement/:grantClientEntitlementsByTemplate | [BETA] Update employee entitlements in client account.
*EmployeeentitlementApi* | [**employeeEntitlementGrantEntitlementsByTemplateGrantEntitlementsByTemplate**](docs/Api/EmployeeentitlementApi.md#employeeentitlementgrantentitlementsbytemplategrantentitlementsbytemplate) | **PUT** /employee/entitlement/:grantEntitlementsByTemplate | [BETA] Update employee entitlements.
*EmployeeentitlementApi* | [**employeeEntitlementSearch**](docs/Api/EmployeeentitlementApi.md#employeeentitlementsearch) | **GET** /employee/entitlement | Find all entitlements for user.
*EmployeehourlyCostAndRateApi* | [**employeeHourlyCostAndRateGet**](docs/Api/EmployeehourlyCostAndRateApi.md#employeehourlycostandrateget) | **GET** /employee/hourlyCostAndRate/{id} | Find hourly cost and rate by ID.
*EmployeehourlyCostAndRateApi* | [**employeeHourlyCostAndRatePost**](docs/Api/EmployeehourlyCostAndRateApi.md#employeehourlycostandratepost) | **POST** /employee/hourlyCostAndRate | Create hourly cost and rate.
*EmployeehourlyCostAndRateApi* | [**employeeHourlyCostAndRatePut**](docs/Api/EmployeehourlyCostAndRateApi.md#employeehourlycostandrateput) | **PUT** /employee/hourlyCostAndRate/{id} | Update hourly cost and rate.
*EmployeehourlyCostAndRateApi* | [**employeeHourlyCostAndRateSearch**](docs/Api/EmployeehourlyCostAndRateApi.md#employeehourlycostandratesearch) | **GET** /employee/hourlyCostAndRate | Find all hourly cost and rates for employee.
*EmployeelogininfoApi* | [**employeeLogininfoGet**](docs/Api/EmployeelogininfoApi.md#employeelogininfoget) | **GET** /employee/logininfo/{id} | [BETA] Get employee login info.
*EmployeenextOfKinApi* | [**employeeNextOfKinGet**](docs/Api/EmployeenextOfKinApi.md#employeenextofkinget) | **GET** /employee/nextOfKin/{id} | Find next of kin by ID.
*EmployeenextOfKinApi* | [**employeeNextOfKinPost**](docs/Api/EmployeenextOfKinApi.md#employeenextofkinpost) | **POST** /employee/nextOfKin | Create next of kin.
*EmployeenextOfKinApi* | [**employeeNextOfKinPut**](docs/Api/EmployeenextOfKinApi.md#employeenextofkinput) | **PUT** /employee/nextOfKin/{id} | Update next of kin.
*EmployeenextOfKinApi* | [**employeeNextOfKinSearch**](docs/Api/EmployeenextOfKinApi.md#employeenextofkinsearch) | **GET** /employee/nextOfKin | Find all next of kin for employee.
*EmployeepreferencesApi* | [**employeePreferencesLoggedInEmployeePreferencesLoggedInEmployeePreferences**](docs/Api/EmployeepreferencesApi.md#employeepreferencesloggedinemployeepreferencesloggedinemployeepreferences) | **GET** /employee/preferences/&gt;loggedInEmployeePreferences | Get employee preferences for current user
*EmployeepreferencesApi* | [**employeePreferencesSearch**](docs/Api/EmployeepreferencesApi.md#employeepreferencessearch) | **GET** /employee/preferences | Find employee category corresponding with sent data.
*EmployeestandardTimeApi* | [**employeeStandardTimeByDateGetByDate**](docs/Api/EmployeestandardTimeApi.md#employeestandardtimebydategetbydate) | **GET** /employee/standardTime/byDate | Find standard time for employee by date.
*EmployeestandardTimeApi* | [**employeeStandardTimeGet**](docs/Api/EmployeestandardTimeApi.md#employeestandardtimeget) | **GET** /employee/standardTime/{id} | Find standard time by ID.
*EmployeestandardTimeApi* | [**employeeStandardTimePost**](docs/Api/EmployeestandardTimeApi.md#employeestandardtimepost) | **POST** /employee/standardTime | Create standard time.
*EmployeestandardTimeApi* | [**employeeStandardTimePut**](docs/Api/EmployeestandardTimeApi.md#employeestandardtimeput) | **PUT** /employee/standardTime/{id} | Update standard time.
*EmployeestandardTimeApi* | [**employeeStandardTimeSearch**](docs/Api/EmployeestandardTimeApi.md#employeestandardtimesearch) | **GET** /employee/standardTime | Find all standard times for employee.
*EventApi* | [**eventExample**](docs/Api/EventApi.md#eventexample) | **GET** /event/{eventType} | [BETA] Get example webhook payload
*EventApi* | [**eventGet**](docs/Api/EventApi.md#eventget) | **GET** /event | [BETA] Get all (WebHook) event keys.
*EventsubscriptionApi* | [**eventSubscriptionDelete**](docs/Api/EventsubscriptionApi.md#eventsubscriptiondelete) | **DELETE** /event/subscription/{id} | [BETA] Delete the given subscription.
*EventsubscriptionApi* | [**eventSubscriptionGet**](docs/Api/EventsubscriptionApi.md#eventsubscriptionget) | **GET** /event/subscription/{id} | [BETA] Get subscription by ID.
*EventsubscriptionApi* | [**eventSubscriptionListDeleteByIds**](docs/Api/EventsubscriptionApi.md#eventsubscriptionlistdeletebyids) | **DELETE** /event/subscription/list | [BETA] Delete multiple subscriptions.
*EventsubscriptionApi* | [**eventSubscriptionListPostList**](docs/Api/EventsubscriptionApi.md#eventsubscriptionlistpostlist) | **POST** /event/subscription/list | [BETA] Create multiple subscriptions for current EmployeeToken.
*EventsubscriptionApi* | [**eventSubscriptionListPutList**](docs/Api/EventsubscriptionApi.md#eventsubscriptionlistputlist) | **PUT** /event/subscription/list | [BETA] Update multiple subscription.
*EventsubscriptionApi* | [**eventSubscriptionPost**](docs/Api/EventsubscriptionApi.md#eventsubscriptionpost) | **POST** /event/subscription | [BETA] Create a new subscription for current EmployeeToken.
*EventsubscriptionApi* | [**eventSubscriptionPut**](docs/Api/EventsubscriptionApi.md#eventsubscriptionput) | **PUT** /event/subscription/{id} | [BETA] Change a current subscription, based on id.
*EventsubscriptionApi* | [**eventSubscriptionSearch**](docs/Api/EventsubscriptionApi.md#eventsubscriptionsearch) | **GET** /event/subscription | [BETA] Find all ongoing subscriptions.
*FavoritesinternalApi* | [**internalFavoritesDelete**](docs/Api/FavoritesinternalApi.md#internalfavoritesdelete) | **DELETE** /internal/favorites/{id} | Delete a favorite
*FavoritesinternalApi* | [**internalFavoritesGet**](docs/Api/FavoritesinternalApi.md#internalfavoritesget) | **GET** /internal/favorites | Get favorite menu
*FavoritesinternalApi* | [**internalFavoritesPost**](docs/Api/FavoritesinternalApi.md#internalfavoritespost) | **POST** /internal/favorites | Add new favorite
*FavoritesinternalApi* | [**internalFavoritesPut**](docs/Api/FavoritesinternalApi.md#internalfavoritesput) | **PUT** /internal/favorites/{id} | Update a favorite
*InventoryApi* | [**inventoryDelete**](docs/Api/InventoryApi.md#inventorydelete) | **DELETE** /inventory/{id} | [BETA] Delete inventory.
*InventoryApi* | [**inventoryGet**](docs/Api/InventoryApi.md#inventoryget) | **GET** /inventory/{id} | Get inventory by ID.
*InventoryApi* | [**inventoryPost**](docs/Api/InventoryApi.md#inventorypost) | **POST** /inventory | Create new inventory.
*InventoryApi* | [**inventoryPut**](docs/Api/InventoryApi.md#inventoryput) | **PUT** /inventory/{id} | Update inventory.
*InventoryApi* | [**inventorySearch**](docs/Api/InventoryApi.md#inventorysearch) | **GET** /inventory | Find inventory corresponding with sent data.
*InventoryinventoriesApi* | [**inventoryInventoriesSearch**](docs/Api/InventoryinventoriesApi.md#inventoryinventoriessearch) | **GET** /inventory/inventories | [BETA] Find inventories corresponding with sent data.
*InventorylocationApi* | [**inventoryLocationDelete**](docs/Api/InventorylocationApi.md#inventorylocationdelete) | **DELETE** /inventory/location/{id} | [BETA] Delete inventory location. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
*InventorylocationApi* | [**inventoryLocationGet**](docs/Api/InventorylocationApi.md#inventorylocationget) | **GET** /inventory/location/{id} | Get inventory location by ID. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
*InventorylocationApi* | [**inventoryLocationListDeleteByIds**](docs/Api/InventorylocationApi.md#inventorylocationlistdeletebyids) | **DELETE** /inventory/location/list | [BETA] Delete inventory location. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
*InventorylocationApi* | [**inventoryLocationListPostList**](docs/Api/InventorylocationApi.md#inventorylocationlistpostlist) | **POST** /inventory/location/list | [BETA] Add multiple inventory locations. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
*InventorylocationApi* | [**inventoryLocationListPutList**](docs/Api/InventorylocationApi.md#inventorylocationlistputlist) | **PUT** /inventory/location/list | [BETA] Update multiple inventory locations. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
*InventorylocationApi* | [**inventoryLocationPost**](docs/Api/InventorylocationApi.md#inventorylocationpost) | **POST** /inventory/location | [BETA] Create new inventory location. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
*InventorylocationApi* | [**inventoryLocationPut**](docs/Api/InventorylocationApi.md#inventorylocationput) | **PUT** /inventory/location/{id} | [BETA] Update inventory location. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
*InventorylocationApi* | [**inventoryLocationSearch**](docs/Api/InventorylocationApi.md#inventorylocationsearch) | **GET** /inventory/location | [BETA] Find inventory locations by inventory ID. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
*InventorystocktakingApi* | [**inventoryStocktakingDelete**](docs/Api/InventorystocktakingApi.md#inventorystocktakingdelete) | **DELETE** /inventory/stocktaking/{id} | [BETA] Delete stocktaking.
*InventorystocktakingApi* | [**inventoryStocktakingGet**](docs/Api/InventorystocktakingApi.md#inventorystocktakingget) | **GET** /inventory/stocktaking/{id} | [BETA] Get stocktaking by ID.
*InventorystocktakingApi* | [**inventoryStocktakingPost**](docs/Api/InventorystocktakingApi.md#inventorystocktakingpost) | **POST** /inventory/stocktaking | [BETA] Create new stocktaking.
*InventorystocktakingApi* | [**inventoryStocktakingPut**](docs/Api/InventorystocktakingApi.md#inventorystocktakingput) | **PUT** /inventory/stocktaking/{id} | [BETA] Update stocktaking.
*InventorystocktakingApi* | [**inventoryStocktakingSearch**](docs/Api/InventorystocktakingApi.md#inventorystocktakingsearch) | **GET** /inventory/stocktaking | [BETA] Find stocktaking corresponding with sent data.
*InventorystocktakingproductlineApi* | [**inventoryStocktakingProductlineDelete**](docs/Api/InventorystocktakingproductlineApi.md#inventorystocktakingproductlinedelete) | **DELETE** /inventory/stocktaking/productline/{id} | [BETA] Delete product line.
*InventorystocktakingproductlineApi* | [**inventoryStocktakingProductlineGet**](docs/Api/InventorystocktakingproductlineApi.md#inventorystocktakingproductlineget) | **GET** /inventory/stocktaking/productline/{id} | [BETA] Get product line by ID.
*InventorystocktakingproductlineApi* | [**inventoryStocktakingProductlinePost**](docs/Api/InventorystocktakingproductlineApi.md#inventorystocktakingproductlinepost) | **POST** /inventory/stocktaking/productline | [BETA] Create product line. When creating several product lines, use /list for better performance.
*InventorystocktakingproductlineApi* | [**inventoryStocktakingProductlinePut**](docs/Api/InventorystocktakingproductlineApi.md#inventorystocktakingproductlineput) | **PUT** /inventory/stocktaking/productline/{id} | [BETA] Update product line.
*InventorystocktakingproductlineApi* | [**inventoryStocktakingProductlineSearch**](docs/Api/InventorystocktakingproductlineApi.md#inventorystocktakingproductlinesearch) | **GET** /inventory/stocktaking/productline | [BETA] Find all product lines by stocktaking ID.
*InvoiceApi* | [**invoiceCreateCreditNoteCreateCreditNote**](docs/Api/InvoiceApi.md#invoicecreatecreditnotecreatecreditnote) | **PUT** /invoice/{id}/:createCreditNote | Creates a new Invoice representing a credit memo that nullifies the given invoice. Updates this invoice and any pre-existing inverse invoice.
*InvoiceApi* | [**invoiceCreateReminderCreateReminder**](docs/Api/InvoiceApi.md#invoicecreateremindercreatereminder) | **PUT** /invoice/{id}/:createReminder | Create invoice reminder and sends it by the given dispatch type. Supports the reminder types SOFT_REMINDER, REMINDER and NOTICE_OF_DEBT_COLLECTION. DispatchType NETS_PRINT must have type NOTICE_OF_DEBT_COLLECTION. SMS and NETS_PRINT must be activated prior to usage in the API.
*InvoiceApi* | [**invoiceGet**](docs/Api/InvoiceApi.md#invoiceget) | **GET** /invoice/{id} | Get invoice by ID.
*InvoiceApi* | [**invoiceListPostList**](docs/Api/InvoiceApi.md#invoicelistpostlist) | **POST** /invoice/list | [BETA] Create multiple invoices. Max 100 at a time.
*InvoiceApi* | [**invoicePaymentPayment**](docs/Api/InvoiceApi.md#invoicepaymentpayment) | **PUT** /invoice/{id}/:payment | Update invoice. The invoice is updated with payment information. The amount is in the invoice’s currency.
*InvoiceApi* | [**invoicePdfDownloadPdf**](docs/Api/InvoiceApi.md#invoicepdfdownloadpdf) | **GET** /invoice/{invoiceId}/pdf | Get invoice document by invoice ID.
*InvoiceApi* | [**invoicePost**](docs/Api/InvoiceApi.md#invoicepost) | **POST** /invoice | Create invoice. Related Order and OrderLines can be created first, or included as new objects inside the Invoice.
*InvoiceApi* | [**invoiceSearch**](docs/Api/InvoiceApi.md#invoicesearch) | **GET** /invoice | Find invoices corresponding with sent data. Includes charged outgoing invoices only.
*InvoiceApi* | [**invoiceSendSend**](docs/Api/InvoiceApi.md#invoicesendsend) | **PUT** /invoice/{id}/:send | Send invoice by ID and sendType. Optionally override email recipient.
*InvoicedetailsApi* | [**invoiceDetailsGet**](docs/Api/InvoicedetailsApi.md#invoicedetailsget) | **GET** /invoice/details/{id} | Get ProjectInvoiceDetails by ID.
*InvoicedetailsApi* | [**invoiceDetailsSearch**](docs/Api/InvoicedetailsApi.md#invoicedetailssearch) | **GET** /invoice/details | Find ProjectInvoiceDetails corresponding with sent data.
*InvoicepaymentTypeApi* | [**invoicePaymentTypeGet**](docs/Api/InvoicepaymentTypeApi.md#invoicepaymenttypeget) | **GET** /invoice/paymentType/{id} | Get payment type by ID.
*InvoicepaymentTypeApi* | [**invoicePaymentTypeSearch**](docs/Api/InvoicepaymentTypeApi.md#invoicepaymenttypesearch) | **GET** /invoice/paymentType | Find payment type corresponding with sent data.
*LedgerApi* | [**ledgerOpenPostOpenPost**](docs/Api/LedgerApi.md#ledgeropenpostopenpost) | **GET** /ledger/openPost | Find open posts corresponding with sent data.
*LedgerApi* | [**ledgerSearch**](docs/Api/LedgerApi.md#ledgersearch) | **GET** /ledger | Get ledger (hovedbok).
*LedgeraccountApi* | [**ledgerAccountDelete**](docs/Api/LedgeraccountApi.md#ledgeraccountdelete) | **DELETE** /ledger/account/{id} | Delete account.
*LedgeraccountApi* | [**ledgerAccountGet**](docs/Api/LedgeraccountApi.md#ledgeraccountget) | **GET** /ledger/account/{id} | Get account by ID.
*LedgeraccountApi* | [**ledgerAccountListDeleteByIds**](docs/Api/LedgeraccountApi.md#ledgeraccountlistdeletebyids) | **DELETE** /ledger/account/list | Delete multiple accounts.
*LedgeraccountApi* | [**ledgerAccountListPostList**](docs/Api/LedgeraccountApi.md#ledgeraccountlistpostlist) | **POST** /ledger/account/list | Create several accounts.
*LedgeraccountApi* | [**ledgerAccountListPutList**](docs/Api/LedgeraccountApi.md#ledgeraccountlistputlist) | **PUT** /ledger/account/list | Update multiple accounts.
*LedgeraccountApi* | [**ledgerAccountPost**](docs/Api/LedgeraccountApi.md#ledgeraccountpost) | **POST** /ledger/account | Create a new account.
*LedgeraccountApi* | [**ledgerAccountPut**](docs/Api/LedgeraccountApi.md#ledgeraccountput) | **PUT** /ledger/account/{id} | Update account.
*LedgeraccountApi* | [**ledgerAccountSearch**](docs/Api/LedgeraccountApi.md#ledgeraccountsearch) | **GET** /ledger/account | Find accounts corresponding with sent data.
*LedgeraccountingPeriodApi* | [**ledgerAccountingPeriodGet**](docs/Api/LedgeraccountingPeriodApi.md#ledgeraccountingperiodget) | **GET** /ledger/accountingPeriod/{id} | Get accounting period by ID.
*LedgeraccountingPeriodApi* | [**ledgerAccountingPeriodSearch**](docs/Api/LedgeraccountingPeriodApi.md#ledgeraccountingperiodsearch) | **GET** /ledger/accountingPeriod | Find accounting periods corresponding with sent data.
*LedgerannualAccountApi* | [**ledgerAnnualAccountGet**](docs/Api/LedgerannualAccountApi.md#ledgerannualaccountget) | **GET** /ledger/annualAccount/{id} | Get annual account by ID.
*LedgerannualAccountApi* | [**ledgerAnnualAccountSearch**](docs/Api/LedgerannualAccountApi.md#ledgerannualaccountsearch) | **GET** /ledger/annualAccount | Find annual accounts corresponding with sent data.
*LedgercloseGroupApi* | [**ledgerCloseGroupGet**](docs/Api/LedgercloseGroupApi.md#ledgerclosegroupget) | **GET** /ledger/closeGroup/{id} | Get close group by ID.
*LedgercloseGroupApi* | [**ledgerCloseGroupSearch**](docs/Api/LedgercloseGroupApi.md#ledgerclosegroupsearch) | **GET** /ledger/closeGroup | Find close groups corresponding with sent data.
*LedgerpaymentTypeOutApi* | [**ledgerPaymentTypeOutDelete**](docs/Api/LedgerpaymentTypeOutApi.md#ledgerpaymenttypeoutdelete) | **DELETE** /ledger/paymentTypeOut/{id} | [BETA] Delete payment type for outgoing payments by ID.
*LedgerpaymentTypeOutApi* | [**ledgerPaymentTypeOutGet**](docs/Api/LedgerpaymentTypeOutApi.md#ledgerpaymenttypeoutget) | **GET** /ledger/paymentTypeOut/{id} | [BETA] Get payment type for outgoing payments by ID.
*LedgerpaymentTypeOutApi* | [**ledgerPaymentTypeOutListPostList**](docs/Api/LedgerpaymentTypeOutApi.md#ledgerpaymenttypeoutlistpostlist) | **POST** /ledger/paymentTypeOut/list | [BETA] Create multiple payment types for outgoing payments at once
*LedgerpaymentTypeOutApi* | [**ledgerPaymentTypeOutListPutList**](docs/Api/LedgerpaymentTypeOutApi.md#ledgerpaymenttypeoutlistputlist) | **PUT** /ledger/paymentTypeOut/list | [BETA] Update multiple payment types for outgoing payments at once
*LedgerpaymentTypeOutApi* | [**ledgerPaymentTypeOutPost**](docs/Api/LedgerpaymentTypeOutApi.md#ledgerpaymenttypeoutpost) | **POST** /ledger/paymentTypeOut | [BETA] Create new payment type for outgoing payments
*LedgerpaymentTypeOutApi* | [**ledgerPaymentTypeOutPut**](docs/Api/LedgerpaymentTypeOutApi.md#ledgerpaymenttypeoutput) | **PUT** /ledger/paymentTypeOut/{id} | [BETA] Update existing payment type for outgoing payments
*LedgerpaymentTypeOutApi* | [**ledgerPaymentTypeOutSearch**](docs/Api/LedgerpaymentTypeOutApi.md#ledgerpaymenttypeoutsearch) | **GET** /ledger/paymentTypeOut | [BETA] Gets payment types for outgoing payments
*LedgerpostingApi* | [**ledgerPostingGet**](docs/Api/LedgerpostingApi.md#ledgerpostingget) | **GET** /ledger/posting/{id} | Find postings by ID.
*LedgerpostingApi* | [**ledgerPostingOpenPostOpenPost**](docs/Api/LedgerpostingApi.md#ledgerpostingopenpostopenpost) | **GET** /ledger/posting/openPost | Find open posts corresponding with sent data.
*LedgerpostingApi* | [**ledgerPostingSearch**](docs/Api/LedgerpostingApi.md#ledgerpostingsearch) | **GET** /ledger/posting | Find postings corresponding with sent data.
*LedgervatTypeApi* | [**ledgerVatTypeCreateRelativeVatTypeCreateRelativeVatType**](docs/Api/LedgervatTypeApi.md#ledgervattypecreaterelativevattypecreaterelativevattype) | **PUT** /ledger/vatType/createRelativeVatType | Create a new relative VAT Type. These are used if the company has &#39;forholdsmessig fradrag for inngående MVA&#39;.
*LedgervatTypeApi* | [**ledgerVatTypeGet**](docs/Api/LedgervatTypeApi.md#ledgervattypeget) | **GET** /ledger/vatType/{id} | Get vat type by ID.
*LedgervatTypeApi* | [**ledgerVatTypeSearch**](docs/Api/LedgervatTypeApi.md#ledgervattypesearch) | **GET** /ledger/vatType | Find vat types corresponding with sent data.
*LedgervoucherApi* | [**ledgerVoucherAttachmentDeleteAttachment**](docs/Api/LedgervoucherApi.md#ledgervoucherattachmentdeleteattachment) | **DELETE** /ledger/voucher/{voucherId}/attachment | Delete attachment.
*LedgervoucherApi* | [**ledgerVoucherAttachmentUploadAttachment**](docs/Api/LedgervoucherApi.md#ledgervoucherattachmentuploadattachment) | **POST** /ledger/voucher/{voucherId}/attachment | Upload attachment to voucher. If the voucher already has an attachment the content will be appended to the existing attachment as new PDF page(s). Valid document formats are PDF, PNG, JPEG and TIFF. Non PDF formats will be converted to PDF. Send as multipart form.
*LedgervoucherApi* | [**ledgerVoucherDelete**](docs/Api/LedgervoucherApi.md#ledgervoucherdelete) | **DELETE** /ledger/voucher/{id} | Delete voucher by ID.
*LedgervoucherApi* | [**ledgerVoucherExternalVoucherNumberExternalVoucherNumber**](docs/Api/LedgervoucherApi.md#ledgervoucherexternalvouchernumberexternalvouchernumber) | **GET** /ledger/voucher/&gt;externalVoucherNumber | Find vouchers based on the external voucher number.
*LedgervoucherApi* | [**ledgerVoucherGet**](docs/Api/LedgervoucherApi.md#ledgervoucherget) | **GET** /ledger/voucher/{id} | Get voucher by ID.
*LedgervoucherApi* | [**ledgerVoucherImportDocumentImportDocument**](docs/Api/LedgervoucherApi.md#ledgervoucherimportdocumentimportdocument) | **POST** /ledger/voucher/importDocument | Upload a document to create one or more vouchers. Valid document formats are PDF, PNG, JPEG, TIFF and EHF. Send as multipart form.
*LedgervoucherApi* | [**ledgerVoucherImportGbat10ImportGbat10**](docs/Api/LedgervoucherApi.md#ledgervoucherimportgbat10importgbat10) | **POST** /ledger/voucher/importGbat10 | Import GBAT10. Send as multipart form.
*LedgervoucherApi* | [**ledgerVoucherListPutList**](docs/Api/LedgervoucherApi.md#ledgervoucherlistputlist) | **PUT** /ledger/voucher/list | Update multiple vouchers. Postings with guiRow&#x3D;&#x3D;0 will be deleted and regenerated.
*LedgervoucherApi* | [**ledgerVoucherNonPostedNonPosted**](docs/Api/LedgervoucherApi.md#ledgervouchernonpostednonposted) | **GET** /ledger/voucher/&gt;nonPosted | Find non-posted vouchers.
*LedgervoucherApi* | [**ledgerVoucherOptionsOptions**](docs/Api/LedgervoucherApi.md#ledgervoucheroptionsoptions) | **GET** /ledger/voucher/{id}/options | Returns a data structure containing meta information about operations that are available for this voucher. Currently only implemented for DELETE: It is possible to check if the voucher is deletable.
*LedgervoucherApi* | [**ledgerVoucherPdfDownloadPdf**](docs/Api/LedgervoucherApi.md#ledgervoucherpdfdownloadpdf) | **GET** /ledger/voucher/{voucherId}/pdf | Get PDF representation of voucher by ID.
*LedgervoucherApi* | [**ledgerVoucherPdfUploadPdf**](docs/Api/LedgervoucherApi.md#ledgervoucherpdfuploadpdf) | **POST** /ledger/voucher/{voucherId}/pdf/{fileName} | [DEPRECATED] Use POST ledger/voucher/{voucherId}/attachment instead.
*LedgervoucherApi* | [**ledgerVoucherPost**](docs/Api/LedgervoucherApi.md#ledgervoucherpost) | **POST** /ledger/voucher | Add new voucher. IMPORTANT: Also creates postings. Only the gross amounts will be used
*LedgervoucherApi* | [**ledgerVoucherPut**](docs/Api/LedgervoucherApi.md#ledgervoucherput) | **PUT** /ledger/voucher/{id} | Update voucher. Postings with guiRow&#x3D;&#x3D;0 will be deleted and regenerated.
*LedgervoucherApi* | [**ledgerVoucherReverseReverse**](docs/Api/LedgervoucherApi.md#ledgervoucherreversereverse) | **PUT** /ledger/voucher/{id}/:reverse | Reverses the voucher, and returns the reversed voucher. Supports reversing most voucher types, except salary transactions.
*LedgervoucherApi* | [**ledgerVoucherSearch**](docs/Api/LedgervoucherApi.md#ledgervouchersearch) | **GET** /ledger/voucher | Find vouchers corresponding with sent data.
*LedgervoucherApi* | [**ledgerVoucherSendToInboxSendToInbox**](docs/Api/LedgervoucherApi.md#ledgervouchersendtoinboxsendtoinbox) | **PUT** /ledger/voucher/{id}/:sendToInbox | Send voucher to inbox.
*LedgervoucherApi* | [**ledgerVoucherSendToLedgerSendToLedger**](docs/Api/LedgervoucherApi.md#ledgervouchersendtoledgersendtoledger) | **PUT** /ledger/voucher/{id}/:sendToLedger | Send voucher to ledger.
*LedgervoucherApi* | [**ledgerVoucherVoucherReceptionVoucherReception**](docs/Api/LedgervoucherApi.md#ledgervouchervoucherreceptionvoucherreception) | **GET** /ledger/voucher/&gt;voucherReception | Find vouchers in voucher reception.
*LedgervoucherTypeApi* | [**ledgerVoucherTypeGet**](docs/Api/LedgervoucherTypeApi.md#ledgervouchertypeget) | **GET** /ledger/voucherType/{id} | Get voucher type by ID.
*LedgervoucherTypeApi* | [**ledgerVoucherTypeSearch**](docs/Api/LedgervoucherTypeApi.md#ledgervouchertypesearch) | **GET** /ledger/voucherType | Find voucher types corresponding with sent data.
*LedgervoucherhistoricalApi* | [**ledgerVoucherHistoricalAttachmentUploadAttachment**](docs/Api/LedgervoucherhistoricalApi.md#ledgervoucherhistoricalattachmentuploadattachment) | **POST** /ledger/voucher/historical/{voucherId}/attachment | Upload attachment to voucher. If the voucher already has an attachment the content will be appended to the existing attachment as new PDF page(s). Valid document formats are PDF, PNG, JPEG and TIFF. Non PDF formats will be converted to PDF. Send as multipart form.
*LedgervoucherhistoricalApi* | [**ledgerVoucherHistoricalClosePostingsClosePostings**](docs/Api/LedgervoucherhistoricalApi.md#ledgervoucherhistoricalclosepostingsclosepostings) | **PUT** /ledger/voucher/historical/:closePostings | [BETA] Close postings.
*LedgervoucherhistoricalApi* | [**ledgerVoucherHistoricalEmployeePostEmployee**](docs/Api/LedgervoucherhistoricalApi.md#ledgervoucherhistoricalemployeepostemployee) | **POST** /ledger/voucher/historical/employee | [BETA] Create one employee, based on import from external system. Validation is less strict, ie. employee department isn&#39;t required.
*LedgervoucherhistoricalApi* | [**ledgerVoucherHistoricalHistoricalPostHistorical**](docs/Api/LedgervoucherhistoricalApi.md#ledgervoucherhistoricalhistoricalposthistorical) | **POST** /ledger/voucher/historical/historical | API endpoint for creating historical vouchers. These are vouchers created outside Tripletex, and should be from closed accounting years. The intended usage is to get access to historical transcations in Tripletex. Also creates postings. All amount fields in postings will be used. VAT postings must be included, these are not generated automatically like they are for normal vouchers in Tripletex. Requires the \\\&quot;All vouchers\\\&quot; and \\\&quot;Advanced Voucher\\\&quot; permissions.
*LedgervoucherhistoricalApi* | [**ledgerVoucherHistoricalReverseHistoricalVouchersReverseHistoricalVouchers**](docs/Api/LedgervoucherhistoricalApi.md#ledgervoucherhistoricalreversehistoricalvouchersreversehistoricalvouchers) | **PUT** /ledger/voucher/historical/:reverseHistoricalVouchers | [BETA] Deletes all historical vouchers. Requires the \&quot;All vouchers\&quot; and \&quot;Advanced Voucher\&quot; permissions.
*LedgervoucheropeningBalanceApi* | [**ledgerVoucherOpeningBalanceCorrectionVoucherCorrectionVoucher**](docs/Api/LedgervoucheropeningBalanceApi.md#ledgervoucheropeningbalancecorrectionvouchercorrectionvoucher) | **GET** /ledger/voucher/openingBalance/&gt;correctionVoucher | [BETA] Get the correction voucher for the opening balance.
*LedgervoucheropeningBalanceApi* | [**ledgerVoucherOpeningBalanceDelete**](docs/Api/LedgervoucheropeningBalanceApi.md#ledgervoucheropeningbalancedelete) | **DELETE** /ledger/voucher/openingBalance | [BETA] Delete the opening balance. The correction voucher will also be deleted
*LedgervoucheropeningBalanceApi* | [**ledgerVoucherOpeningBalanceGet**](docs/Api/LedgervoucheropeningBalanceApi.md#ledgervoucheropeningbalanceget) | **GET** /ledger/voucher/openingBalance | [BETA] Get the voucher for the opening balance.
*LedgervoucheropeningBalanceApi* | [**ledgerVoucherOpeningBalancePost**](docs/Api/LedgervoucheropeningBalanceApi.md#ledgervoucheropeningbalancepost) | **POST** /ledger/voucher/openingBalance | [BETA] Add an opening balance on the given date.  All movements before this date will be &#39;zeroed out&#39; in a separate correction voucher. The opening balance must have the first day of a month as the date, and it&#39;s also recommended to have the first day of the year as the date. If the postings provided don&#39;t balance the voucher, the difference will automatically be posted to a help account
*MunicipalityApi* | [**municipalitySearch**](docs/Api/MunicipalityApi.md#municipalitysearch) | **GET** /municipality | Get municipalities.
*OrderApi* | [**orderApproveSubscriptionInvoiceApproveSubscriptionInvoice**](docs/Api/OrderApi.md#orderapprovesubscriptioninvoiceapprovesubscriptioninvoice) | **PUT** /order/{id}/:approveSubscriptionInvoice | To create a subscription invoice, first create a order with the subscription enabled, then approve it with this method. This approves the order for subscription invoicing.
*OrderApi* | [**orderAttachAttach**](docs/Api/OrderApi.md#orderattachattach) | **PUT** /order/{id}/:attach | Attach document to specified order ID.
*OrderApi* | [**orderGet**](docs/Api/OrderApi.md#orderget) | **GET** /order/{id} | Get order by ID.
*OrderApi* | [**orderInvoiceInvoice**](docs/Api/OrderApi.md#orderinvoiceinvoice) | **PUT** /order/{id}/:invoice | Create new invoice from order.
*OrderApi* | [**orderInvoiceMultipleOrdersInvoiceMultipleOrders**](docs/Api/OrderApi.md#orderinvoicemultipleordersinvoicemultipleorders) | **PUT** /order/:invoiceMultipleOrders | [BETA] Charges a single customer invoice from multiple orders. The orders must be to the same customer, currency, due date, receiver email, attn. and smsNotificationNumber
*OrderApi* | [**orderListPostList**](docs/Api/OrderApi.md#orderlistpostlist) | **POST** /order/list | [BETA] Create multiple Orders with OrderLines. Max 100 at a time.
*OrderApi* | [**orderPost**](docs/Api/OrderApi.md#orderpost) | **POST** /order | Create order.
*OrderApi* | [**orderPut**](docs/Api/OrderApi.md#orderput) | **PUT** /order/{id} | Update order.
*OrderApi* | [**orderSearch**](docs/Api/OrderApi.md#ordersearch) | **GET** /order | Find orders corresponding with sent data.
*OrderApi* | [**orderUnApproveSubscriptionInvoiceUnApproveSubscriptionInvoice**](docs/Api/OrderApi.md#orderunapprovesubscriptioninvoiceunapprovesubscriptioninvoice) | **PUT** /order/{id}/:unApproveSubscriptionInvoice | Unapproves the order for subscription invoicing.
*OrderorderGroupApi* | [**orderOrderGroupDelete**](docs/Api/OrderorderGroupApi.md#orderordergroupdelete) | **DELETE** /order/orderGroup/{id} | [Beta] Delete orderGroup by ID.
*OrderorderGroupApi* | [**orderOrderGroupGet**](docs/Api/OrderorderGroupApi.md#orderordergroupget) | **GET** /order/orderGroup/{id} | [Beta] Get orderGroup by ID. A orderGroup is a way to group orderLines, and add comments and subtotals
*OrderorderGroupApi* | [**orderOrderGroupPost**](docs/Api/OrderorderGroupApi.md#orderordergrouppost) | **POST** /order/orderGroup | [Beta] Post orderGroup.
*OrderorderGroupApi* | [**orderOrderGroupPut**](docs/Api/OrderorderGroupApi.md#orderordergroupput) | **PUT** /order/orderGroup | [Beta] Put orderGroup.
*OrderorderGroupApi* | [**orderOrderGroupSearch**](docs/Api/OrderorderGroupApi.md#orderordergroupsearch) | **GET** /order/orderGroup | [BETA] Find orderGroups corresponding with sent data.
*OrderorderlineApi* | [**orderOrderlineDelete**](docs/Api/OrderorderlineApi.md#orderorderlinedelete) | **DELETE** /order/orderline/{id} | [BETA] Delete order line by ID.
*OrderorderlineApi* | [**orderOrderlineGet**](docs/Api/OrderorderlineApi.md#orderorderlineget) | **GET** /order/orderline/{id} | Get order line by ID.
*OrderorderlineApi* | [**orderOrderlineListPostList**](docs/Api/OrderorderlineApi.md#orderorderlinelistpostlist) | **POST** /order/orderline/list | Create multiple order lines.
*OrderorderlineApi* | [**orderOrderlinePost**](docs/Api/OrderorderlineApi.md#orderorderlinepost) | **POST** /order/orderline | Create order line. When creating several order lines, use /list for better performance.
*OrderorderlineApi* | [**orderOrderlinePut**](docs/Api/OrderorderlineApi.md#orderorderlineput) | **PUT** /order/orderline/{id} | [BETA] Put order line
*PickupPointApi* | [**pickupPointGet**](docs/Api/PickupPointApi.md#pickuppointget) | **GET** /pickupPoint/{id} | [BETA] Find pickup point by ID.
*PickupPointApi* | [**pickupPointSearch**](docs/Api/PickupPointApi.md#pickuppointsearch) | **GET** /pickupPoint | [BETA] Search pickup points.
*ProductApi* | [**productDelete**](docs/Api/ProductApi.md#productdelete) | **DELETE** /product/{id} | [BETA] Delete product.
*ProductApi* | [**productGet**](docs/Api/ProductApi.md#productget) | **GET** /product/{id} | Get product by ID.
*ProductApi* | [**productImageDeleteImage**](docs/Api/ProductApi.md#productimagedeleteimage) | **DELETE** /product/{id}/image | [BETA] Delete image.
*ProductApi* | [**productImageUploadImage**](docs/Api/ProductApi.md#productimageuploadimage) | **POST** /product/{id}/image | [BETA] Upload image to Product. Existing image on product will be replaced if exists
*ProductApi* | [**productListPostList**](docs/Api/ProductApi.md#productlistpostlist) | **POST** /product/list | [BETA] Add multiple products.
*ProductApi* | [**productListPutList**](docs/Api/ProductApi.md#productlistputlist) | **PUT** /product/list | [BETA] Update a list of products.
*ProductApi* | [**productPost**](docs/Api/ProductApi.md#productpost) | **POST** /product | Create new product.
*ProductApi* | [**productPut**](docs/Api/ProductApi.md#productput) | **PUT** /product/{id} | Update product.
*ProductApi* | [**productSearch**](docs/Api/ProductApi.md#productsearch) | **GET** /product | Find products corresponding with sent data.
*ProductdiscountGroupApi* | [**productDiscountGroupGet**](docs/Api/ProductdiscountGroupApi.md#productdiscountgroupget) | **GET** /product/discountGroup/{id} | Get discount group by ID.
*ProductdiscountGroupApi* | [**productDiscountGroupSearch**](docs/Api/ProductdiscountGroupApi.md#productdiscountgroupsearch) | **GET** /product/discountGroup | Find discount groups corresponding with sent data.
*ProductexternalApi* | [**productExternalGet**](docs/Api/ProductexternalApi.md#productexternalget) | **GET** /product/external/{id} | [BETA] Get external product by ID.
*ProductexternalApi* | [**productExternalSearch**](docs/Api/ProductexternalApi.md#productexternalsearch) | **GET** /product/external | [BETA] Find external products corresponding with sent data. The sorting-field is not in use on this endpoint.
*ProductgroupApi* | [**productGroupDelete**](docs/Api/ProductgroupApi.md#productgroupdelete) | **DELETE** /product/group/{id} | [BETA] Delete product group.
*ProductgroupApi* | [**productGroupGet**](docs/Api/ProductgroupApi.md#productgroupget) | **GET** /product/group/{id} | [BETA] Find product group by ID.
*ProductgroupApi* | [**productGroupListDeleteByIds**](docs/Api/ProductgroupApi.md#productgrouplistdeletebyids) | **DELETE** /product/group/list | [BETA] Delete multiple product groups.
*ProductgroupApi* | [**productGroupListPostList**](docs/Api/ProductgroupApi.md#productgrouplistpostlist) | **POST** /product/group/list | [BETA] Add multiple products groups.
*ProductgroupApi* | [**productGroupListPutList**](docs/Api/ProductgroupApi.md#productgrouplistputlist) | **PUT** /product/group/list | [BETA] Update a list of product groups.
*ProductgroupApi* | [**productGroupPost**](docs/Api/ProductgroupApi.md#productgrouppost) | **POST** /product/group | [BETA] Create new product group.
*ProductgroupApi* | [**productGroupPut**](docs/Api/ProductgroupApi.md#productgroupput) | **PUT** /product/group/{id} | [BETA] Update product group.
*ProductgroupApi* | [**productGroupQueryQuery**](docs/Api/ProductgroupApi.md#productgroupqueryquery) | **GET** /product/group/query | [BETA] Wildcard search.
*ProductgroupApi* | [**productGroupSearch**](docs/Api/ProductgroupApi.md#productgroupsearch) | **GET** /product/group | [BETA] Find product group with sent data
*ProductgroupRelationApi* | [**productGroupRelationDelete**](docs/Api/ProductgroupRelationApi.md#productgrouprelationdelete) | **DELETE** /product/groupRelation/{id} | [BETA] Delete product group relation.
*ProductgroupRelationApi* | [**productGroupRelationGet**](docs/Api/ProductgroupRelationApi.md#productgrouprelationget) | **GET** /product/groupRelation/{id} | [BETA] Find product group relation by ID.
*ProductgroupRelationApi* | [**productGroupRelationListDeleteByIds**](docs/Api/ProductgroupRelationApi.md#productgrouprelationlistdeletebyids) | **DELETE** /product/groupRelation/list | [BETA] Delete multiple product group relations.
*ProductgroupRelationApi* | [**productGroupRelationListPostList**](docs/Api/ProductgroupRelationApi.md#productgrouprelationlistpostlist) | **POST** /product/groupRelation/list | [BETA] Add multiple products group relations.
*ProductgroupRelationApi* | [**productGroupRelationPost**](docs/Api/ProductgroupRelationApi.md#productgrouprelationpost) | **POST** /product/groupRelation | [BETA] Create new product group relation.
*ProductgroupRelationApi* | [**productGroupRelationSearch**](docs/Api/ProductgroupRelationApi.md#productgrouprelationsearch) | **GET** /product/groupRelation | [BETA] Find product group relation with sent data.
*ProductinventoryLocationApi* | [**productInventoryLocationDelete**](docs/Api/ProductinventoryLocationApi.md#productinventorylocationdelete) | **DELETE** /product/inventoryLocation/{id} | [BETA] Delete product inventory location. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
*ProductinventoryLocationApi* | [**productInventoryLocationGet**](docs/Api/ProductinventoryLocationApi.md#productinventorylocationget) | **GET** /product/inventoryLocation/{id} | Get inventory location by ID. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
*ProductinventoryLocationApi* | [**productInventoryLocationListPostList**](docs/Api/ProductinventoryLocationApi.md#productinventorylocationlistpostlist) | **POST** /product/inventoryLocation/list | [BETA] Add multiple product inventory locations. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
*ProductinventoryLocationApi* | [**productInventoryLocationListPutList**](docs/Api/ProductinventoryLocationApi.md#productinventorylocationlistputlist) | **PUT** /product/inventoryLocation/list | [BETA] Update multiple product inventory locations. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
*ProductinventoryLocationApi* | [**productInventoryLocationPost**](docs/Api/ProductinventoryLocationApi.md#productinventorylocationpost) | **POST** /product/inventoryLocation | [BETA] Create new product inventory location. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
*ProductinventoryLocationApi* | [**productInventoryLocationPut**](docs/Api/ProductinventoryLocationApi.md#productinventorylocationput) | **PUT** /product/inventoryLocation/{id} | [BETA] Update product inventory location. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
*ProductinventoryLocationApi* | [**productInventoryLocationSearch**](docs/Api/ProductinventoryLocationApi.md#productinventorylocationsearch) | **GET** /product/inventoryLocation | [BETA] Find inventory locations by product ID. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
*ProductlogisticsSettingsApi* | [**productLogisticsSettingsGet**](docs/Api/ProductlogisticsSettingsApi.md#productlogisticssettingsget) | **GET** /product/logisticsSettings | [BETA] Get logistics settings of logged in company.
*ProductlogisticsSettingsApi* | [**productLogisticsSettingsPut**](docs/Api/ProductlogisticsSettingsApi.md#productlogisticssettingsput) | **PUT** /product/logisticsSettings | [BETA] Update logistics settings of logged in company.
*ProductproductPriceApi* | [**productProductPriceSearch**](docs/Api/ProductproductPriceApi.md#productproductpricesearch) | **GET** /product/productPrice | [BETA] Find prices for a product. Only available for users that have activated the Logistics/Logistics Plus Beta-program in &#39;Our customer account&#39;.
*ProductsupplierProductApi* | [**productSupplierProductDelete**](docs/Api/ProductsupplierProductApi.md#productsupplierproductdelete) | **DELETE** /product/supplierProduct/{id} | [BETA] Delete supplierProduct.
*ProductsupplierProductApi* | [**productSupplierProductGet**](docs/Api/ProductsupplierProductApi.md#productsupplierproductget) | **GET** /product/supplierProduct/{id} | Get supplierProduct by ID.
*ProductsupplierProductApi* | [**productSupplierProductListPostList**](docs/Api/ProductsupplierProductApi.md#productsupplierproductlistpostlist) | **POST** /product/supplierProduct/list | Create list of new supplierProduct.
*ProductsupplierProductApi* | [**productSupplierProductListPutList**](docs/Api/ProductsupplierProductApi.md#productsupplierproductlistputlist) | **PUT** /product/supplierProduct/list | [BETA] Update a list of supplierProduct.
*ProductsupplierProductApi* | [**productSupplierProductPost**](docs/Api/ProductsupplierProductApi.md#productsupplierproductpost) | **POST** /product/supplierProduct | Create new supplierProduct.
*ProductsupplierProductApi* | [**productSupplierProductPut**](docs/Api/ProductsupplierProductApi.md#productsupplierproductput) | **PUT** /product/supplierProduct/{id} | Update supplierProduct.
*ProductsupplierProductApi* | [**productSupplierProductSearch**](docs/Api/ProductsupplierProductApi.md#productsupplierproductsearch) | **GET** /product/supplierProduct | Find products corresponding with sent data.
*ProductunitApi* | [**productUnitDelete**](docs/Api/ProductunitApi.md#productunitdelete) | **DELETE** /product/unit/{id} | [BETA] Delete product unit by ID.
*ProductunitApi* | [**productUnitGet**](docs/Api/ProductunitApi.md#productunitget) | **GET** /product/unit/{id} | Get product unit by ID.
*ProductunitApi* | [**productUnitListPostList**](docs/Api/ProductunitApi.md#productunitlistpostlist) | **POST** /product/unit/list | [BETA] Create multiple product units.
*ProductunitApi* | [**productUnitListPutList**](docs/Api/ProductunitApi.md#productunitlistputlist) | **PUT** /product/unit/list | [BETA] Update list of product units.
*ProductunitApi* | [**productUnitPost**](docs/Api/ProductunitApi.md#productunitpost) | **POST** /product/unit | [BETA] Create new product unit.
*ProductunitApi* | [**productUnitPut**](docs/Api/ProductunitApi.md#productunitput) | **PUT** /product/unit/{id} | [BETA] Update product unit.
*ProductunitApi* | [**productUnitQueryQuery**](docs/Api/ProductunitApi.md#productunitqueryquery) | **GET** /product/unit/query | [BETA] Wildcard search.
*ProductunitApi* | [**productUnitSearch**](docs/Api/ProductunitApi.md#productunitsearch) | **GET** /product/unit | Find product units corresponding with sent data.
*ProductunitmasterApi* | [**productUnitMasterGet**](docs/Api/ProductunitmasterApi.md#productunitmasterget) | **GET** /product/unit/master/{id} | [BETA] Get product unit master by ID.
*ProductunitmasterApi* | [**productUnitMasterSearch**](docs/Api/ProductunitmasterApi.md#productunitmastersearch) | **GET** /product/unit/master | [BETA] Find product units master corresponding with sent data.
*ProjectApi* | [**projectDelete**](docs/Api/ProjectApi.md#projectdelete) | **DELETE** /project/{id} | [BETA] Delete project.
*ProjectApi* | [**projectDeleteList**](docs/Api/ProjectApi.md#projectdeletelist) | **DELETE** /project | [BETA] Delete multiple projects.
*ProjectApi* | [**projectForTimeSheetGetForTimeSheet**](docs/Api/ProjectApi.md#projectfortimesheetgetfortimesheet) | **GET** /project/&gt;forTimeSheet | Find projects applicable for time sheet registration on a specific day.
*ProjectApi* | [**projectGet**](docs/Api/ProjectApi.md#projectget) | **GET** /project/{id} | Find project by ID.
*ProjectApi* | [**projectListDeleteByIds**](docs/Api/ProjectApi.md#projectlistdeletebyids) | **DELETE** /project/list | [BETA] Delete projects.
*ProjectApi* | [**projectListPostList**](docs/Api/ProjectApi.md#projectlistpostlist) | **POST** /project/list | [BETA] Register new projects. Multiple projects for different users can be sent in the same request.
*ProjectApi* | [**projectListPutList**](docs/Api/ProjectApi.md#projectlistputlist) | **PUT** /project/list | [BETA] Update multiple projects.
*ProjectApi* | [**projectPost**](docs/Api/ProjectApi.md#projectpost) | **POST** /project | [BETA] Add new project.
*ProjectApi* | [**projectPut**](docs/Api/ProjectApi.md#projectput) | **PUT** /project/{id} | [BETA] Update project.
*ProjectApi* | [**projectSearch**](docs/Api/ProjectApi.md#projectsearch) | **GET** /project | Find projects corresponding with sent data.
*ProjectcategoryApi* | [**projectCategoryGet**](docs/Api/ProjectcategoryApi.md#projectcategoryget) | **GET** /project/category/{id} | Find project category by ID.
*ProjectcategoryApi* | [**projectCategoryPost**](docs/Api/ProjectcategoryApi.md#projectcategorypost) | **POST** /project/category | Add new project category.
*ProjectcategoryApi* | [**projectCategoryPut**](docs/Api/ProjectcategoryApi.md#projectcategoryput) | **PUT** /project/category/{id} | Update project category.
*ProjectcategoryApi* | [**projectCategorySearch**](docs/Api/ProjectcategoryApi.md#projectcategorysearch) | **GET** /project/category | Find project categories corresponding with sent data.
*ProjectcontrolFormApi* | [**projectControlFormGet**](docs/Api/ProjectcontrolFormApi.md#projectcontrolformget) | **GET** /project/controlForm/{id} | [BETA] Get project control form by ID.
*ProjectcontrolFormApi* | [**projectControlFormSearch**](docs/Api/ProjectcontrolFormApi.md#projectcontrolformsearch) | **GET** /project/controlForm | [BETA] Get project control forms by project ID.
*ProjectcontrolFormTypeApi* | [**projectControlFormTypeGet**](docs/Api/ProjectcontrolFormTypeApi.md#projectcontrolformtypeget) | **GET** /project/controlFormType/{id} | [BETA] Get project control form type by ID.
*ProjectcontrolFormTypeApi* | [**projectControlFormTypeSearch**](docs/Api/ProjectcontrolFormTypeApi.md#projectcontrolformtypesearch) | **GET** /project/controlFormType | [BETA] Get project control form types
*ProjecthourlyRatesApi* | [**projectHourlyRatesDelete**](docs/Api/ProjecthourlyRatesApi.md#projecthourlyratesdelete) | **DELETE** /project/hourlyRates/{id} | Delete Project Hourly Rate
*ProjecthourlyRatesApi* | [**projectHourlyRatesDeleteByProjectIdsDeleteByProjectIds**](docs/Api/ProjecthourlyRatesApi.md#projecthourlyratesdeletebyprojectidsdeletebyprojectids) | **DELETE** /project/hourlyRates/deleteByProjectIds | Delete project hourly rates by project id.
*ProjecthourlyRatesApi* | [**projectHourlyRatesGet**](docs/Api/ProjecthourlyRatesApi.md#projecthourlyratesget) | **GET** /project/hourlyRates/{id} | Find project hourly rate by ID.
*ProjecthourlyRatesApi* | [**projectHourlyRatesListDeleteByIds**](docs/Api/ProjecthourlyRatesApi.md#projecthourlyrateslistdeletebyids) | **DELETE** /project/hourlyRates/list | Delete project hourly rates.
*ProjecthourlyRatesApi* | [**projectHourlyRatesListPostList**](docs/Api/ProjecthourlyRatesApi.md#projecthourlyrateslistpostlist) | **POST** /project/hourlyRates/list | Create multiple project hourly rates.
*ProjecthourlyRatesApi* | [**projectHourlyRatesListPutList**](docs/Api/ProjecthourlyRatesApi.md#projecthourlyrateslistputlist) | **PUT** /project/hourlyRates/list | Update multiple project hourly rates.
*ProjecthourlyRatesApi* | [**projectHourlyRatesPost**](docs/Api/ProjecthourlyRatesApi.md#projecthourlyratespost) | **POST** /project/hourlyRates | Create a project hourly rate.
*ProjecthourlyRatesApi* | [**projectHourlyRatesPut**](docs/Api/ProjecthourlyRatesApi.md#projecthourlyratesput) | **PUT** /project/hourlyRates/{id} | Update a project hourly rate.
*ProjecthourlyRatesApi* | [**projectHourlyRatesSearch**](docs/Api/ProjecthourlyRatesApi.md#projecthourlyratessearch) | **GET** /project/hourlyRates | Find project hourly rates corresponding with sent data.
*ProjecthourlyRatesApi* | [**projectHourlyRatesUpdateOrAddHourRatesUpdateOrAddHourRates**](docs/Api/ProjecthourlyRatesApi.md#projecthourlyratesupdateoraddhourratesupdateoraddhourrates) | **PUT** /project/hourlyRates/updateOrAddHourRates | Update or add the same project hourly rate from project overview.
*ProjecthourlyRatesprojectSpecificRatesApi* | [**projectHourlyRatesProjectSpecificRatesDelete**](docs/Api/ProjecthourlyRatesprojectSpecificRatesApi.md#projecthourlyratesprojectspecificratesdelete) | **DELETE** /project/hourlyRates/projectSpecificRates/{id} | Delete project specific rate
*ProjecthourlyRatesprojectSpecificRatesApi* | [**projectHourlyRatesProjectSpecificRatesGet**](docs/Api/ProjecthourlyRatesprojectSpecificRatesApi.md#projecthourlyratesprojectspecificratesget) | **GET** /project/hourlyRates/projectSpecificRates/{id} | Find project specific rate by ID.
*ProjecthourlyRatesprojectSpecificRatesApi* | [**projectHourlyRatesProjectSpecificRatesListDeleteByIds**](docs/Api/ProjecthourlyRatesprojectSpecificRatesApi.md#projecthourlyratesprojectspecificrateslistdeletebyids) | **DELETE** /project/hourlyRates/projectSpecificRates/list | Delete project specific rates.
*ProjecthourlyRatesprojectSpecificRatesApi* | [**projectHourlyRatesProjectSpecificRatesListPostList**](docs/Api/ProjecthourlyRatesprojectSpecificRatesApi.md#projecthourlyratesprojectspecificrateslistpostlist) | **POST** /project/hourlyRates/projectSpecificRates/list | Create multiple new project specific rates.
*ProjecthourlyRatesprojectSpecificRatesApi* | [**projectHourlyRatesProjectSpecificRatesListPutList**](docs/Api/ProjecthourlyRatesprojectSpecificRatesApi.md#projecthourlyratesprojectspecificrateslistputlist) | **PUT** /project/hourlyRates/projectSpecificRates/list | Update multiple project specific rates.
*ProjecthourlyRatesprojectSpecificRatesApi* | [**projectHourlyRatesProjectSpecificRatesPost**](docs/Api/ProjecthourlyRatesprojectSpecificRatesApi.md#projecthourlyratesprojectspecificratespost) | **POST** /project/hourlyRates/projectSpecificRates | Create new project specific rate.
*ProjecthourlyRatesprojectSpecificRatesApi* | [**projectHourlyRatesProjectSpecificRatesPut**](docs/Api/ProjecthourlyRatesprojectSpecificRatesApi.md#projecthourlyratesprojectspecificratesput) | **PUT** /project/hourlyRates/projectSpecificRates/{id} | Update a project specific rate.
*ProjecthourlyRatesprojectSpecificRatesApi* | [**projectHourlyRatesProjectSpecificRatesSearch**](docs/Api/ProjecthourlyRatesprojectSpecificRatesApi.md#projecthourlyratesprojectspecificratessearch) | **GET** /project/hourlyRates/projectSpecificRates | Find project specific rates corresponding with sent data.
*ProjectimportApi* | [**projectImportImportProjectStatement**](docs/Api/ProjectimportApi.md#projectimportimportprojectstatement) | **POST** /project/import | Upload project import file.
*ProjectorderlineApi* | [**projectOrderlineDelete**](docs/Api/ProjectorderlineApi.md#projectorderlinedelete) | **DELETE** /project/orderline/{id} | Delete order line by ID.
*ProjectorderlineApi* | [**projectOrderlineGet**](docs/Api/ProjectorderlineApi.md#projectorderlineget) | **GET** /project/orderline/{id} | [BETA] Get order line by ID.
*ProjectorderlineApi* | [**projectOrderlineListPostList**](docs/Api/ProjectorderlineApi.md#projectorderlinelistpostlist) | **POST** /project/orderline/list | [BETA] Create multiple order lines.
*ProjectorderlineApi* | [**projectOrderlinePost**](docs/Api/ProjectorderlineApi.md#projectorderlinepost) | **POST** /project/orderline | [BETA] Create order line. When creating several order lines, use /list for better performance.
*ProjectorderlineApi* | [**projectOrderlinePut**](docs/Api/ProjectorderlineApi.md#projectorderlineput) | **PUT** /project/orderline/{id} | [BETA] Update project orderline.
*ProjectorderlineApi* | [**projectOrderlineSearch**](docs/Api/ProjectorderlineApi.md#projectorderlinesearch) | **GET** /project/orderline | [BETA] Find all order lines for project.
*ProjectparticipantApi* | [**projectParticipantGet**](docs/Api/ProjectparticipantApi.md#projectparticipantget) | **GET** /project/participant/{id} | [BETA] Find project participant by ID.
*ProjectparticipantApi* | [**projectParticipantListDeleteByIds**](docs/Api/ProjectparticipantApi.md#projectparticipantlistdeletebyids) | **DELETE** /project/participant/list | [BETA] Delete project participants.
*ProjectparticipantApi* | [**projectParticipantListPostList**](docs/Api/ProjectparticipantApi.md#projectparticipantlistpostlist) | **POST** /project/participant/list | [BETA] Add new project participant. Multiple project participants can be sent in the same request.
*ProjectparticipantApi* | [**projectParticipantPost**](docs/Api/ProjectparticipantApi.md#projectparticipantpost) | **POST** /project/participant | [BETA] Add new project participant.
*ProjectparticipantApi* | [**projectParticipantPut**](docs/Api/ProjectparticipantApi.md#projectparticipantput) | **PUT** /project/participant/{id} | [BETA] Update project participant.
*ProjectperiodApi* | [**projectPeriodBudgetStatusGetBudgetStatus**](docs/Api/ProjectperiodApi.md#projectperiodbudgetstatusgetbudgetstatus) | **GET** /project/{id}/period/budgetStatus | Get the budget status for the project period
*ProjectperiodApi* | [**projectPeriodHourlistReportHourlistReport**](docs/Api/ProjectperiodApi.md#projectperiodhourlistreporthourlistreport) | **GET** /project/{id}/period/hourlistReport | Find hourlist report by project period.
*ProjectperiodApi* | [**projectPeriodInvoicedInvoiced**](docs/Api/ProjectperiodApi.md#projectperiodinvoicedinvoiced) | **GET** /project/{id}/period/invoiced | Find invoiced info by project period.
*ProjectperiodApi* | [**projectPeriodInvoicingReserveInvoicingReserve**](docs/Api/ProjectperiodApi.md#projectperiodinvoicingreserveinvoicingreserve) | **GET** /project/{id}/period/invoicingReserve | Find invoicing reserve by project period.
*ProjectperiodApi* | [**projectPeriodMonthlyStatusMonthlyStatus**](docs/Api/ProjectperiodApi.md#projectperiodmonthlystatusmonthlystatus) | **GET** /project/{id}/period/monthlyStatus | Find overall status by project period.
*ProjectperiodApi* | [**projectPeriodOverallStatusOverallStatus**](docs/Api/ProjectperiodApi.md#projectperiodoverallstatusoverallstatus) | **GET** /project/{id}/period/overallStatus | Find overall status by project period.
*ProjectprojectActivityApi* | [**projectProjectActivityDelete**](docs/Api/ProjectprojectActivityApi.md#projectprojectactivitydelete) | **DELETE** /project/projectActivity/{id} | Delete project activity
*ProjectprojectActivityApi* | [**projectProjectActivityGet**](docs/Api/ProjectprojectActivityApi.md#projectprojectactivityget) | **GET** /project/projectActivity/{id} | Find project activity by id
*ProjectprojectActivityApi* | [**projectProjectActivityListDeleteByIds**](docs/Api/ProjectprojectActivityApi.md#projectprojectactivitylistdeletebyids) | **DELETE** /project/projectActivity/list | Delete project activities
*ProjectprojectActivityApi* | [**projectProjectActivityPost**](docs/Api/ProjectprojectActivityApi.md#projectprojectactivitypost) | **POST** /project/projectActivity | Add project activity.
*ProjectresourceplanApi* | [**projectResourcePlanBudgetGet**](docs/Api/ProjectresourceplanApi.md#projectresourceplanbudgetget) | **GET** /project/resourcePlanBudget | Get resource plan entries in the specified period.
*ProjectsettingsApi* | [**projectSettingsGet**](docs/Api/ProjectsettingsApi.md#projectsettingsget) | **GET** /project/settings | Get project settings of logged in company.
*ProjectsettingsApi* | [**projectSettingsPut**](docs/Api/ProjectsettingsApi.md#projectsettingsput) | **PUT** /project/settings | Update project settings for company
*ProjecttaskApi* | [**projectTaskSearch**](docs/Api/ProjecttaskApi.md#projecttasksearch) | **GET** /project/task | Find all tasks for project.
*ProjecttemplateApi* | [**projectTemplateGet**](docs/Api/ProjecttemplateApi.md#projecttemplateget) | **GET** /project/template/{id} | Get project template by ID.
*PurchaseOrderApi* | [**purchaseOrderAttachmentDeleteAttachment**](docs/Api/PurchaseOrderApi.md#purchaseorderattachmentdeleteattachment) | **DELETE** /purchaseOrder/{id}/attachment | [BETA] Delete attachment.
*PurchaseOrderApi* | [**purchaseOrderAttachmentListUploadAttachments**](docs/Api/PurchaseOrderApi.md#purchaseorderattachmentlistuploadattachments) | **POST** /purchaseOrder/{id}/attachment/list | Upload multiple attachments to Purchase Order.
*PurchaseOrderApi* | [**purchaseOrderAttachmentUploadAttachment**](docs/Api/PurchaseOrderApi.md#purchaseorderattachmentuploadattachment) | **POST** /purchaseOrder/{id}/attachment | [BETA] Upload attachment to Purchase Order.
*PurchaseOrderApi* | [**purchaseOrderDelete**](docs/Api/PurchaseOrderApi.md#purchaseorderdelete) | **DELETE** /purchaseOrder/{id} | [BETA] Delete purchase order.
*PurchaseOrderApi* | [**purchaseOrderGet**](docs/Api/PurchaseOrderApi.md#purchaseorderget) | **GET** /purchaseOrder/{id} | [BETA] Find purchase order by ID.
*PurchaseOrderApi* | [**purchaseOrderPost**](docs/Api/PurchaseOrderApi.md#purchaseorderpost) | **POST** /purchaseOrder | [BETA] Creates a new purchase order
*PurchaseOrderApi* | [**purchaseOrderPut**](docs/Api/PurchaseOrderApi.md#purchaseorderput) | **PUT** /purchaseOrder/{id} | [BETA] Update purchase order.
*PurchaseOrderApi* | [**purchaseOrderSearch**](docs/Api/PurchaseOrderApi.md#purchaseordersearch) | **GET** /purchaseOrder | [BETA] Find purchase orders with send data
*PurchaseOrderApi* | [**purchaseOrderSendByEmailSendByEmail**](docs/Api/PurchaseOrderApi.md#purchaseordersendbyemailsendbyemail) | **PUT** /purchaseOrder/{id}/:sendByEmail | [BETA] Send purchase order by customisable email.
*PurchaseOrderApi* | [**purchaseOrderSendSend**](docs/Api/PurchaseOrderApi.md#purchaseordersendsend) | **PUT** /purchaseOrder/{id}/:send | [BETA] Send purchase order by id and sendType.
*PurchaseOrderdeviationApi* | [**purchaseOrderDeviationApproveApprove**](docs/Api/PurchaseOrderdeviationApi.md#purchaseorderdeviationapproveapprove) | **PUT** /purchaseOrder/deviation/{id}/:approve | [BETA] Approve deviations. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
*PurchaseOrderdeviationApi* | [**purchaseOrderDeviationDelete**](docs/Api/PurchaseOrderdeviationApi.md#purchaseorderdeviationdelete) | **DELETE** /purchaseOrder/deviation/{id} | [BETA] Delete goods receipt by purchase order ID. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
*PurchaseOrderdeviationApi* | [**purchaseOrderDeviationDeliverDeliver**](docs/Api/PurchaseOrderdeviationApi.md#purchaseorderdeviationdeliverdeliver) | **PUT** /purchaseOrder/deviation/{id}/:deliver | [BETA] Send deviations to approval. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
*PurchaseOrderdeviationApi* | [**purchaseOrderDeviationGet**](docs/Api/PurchaseOrderdeviationApi.md#purchaseorderdeviationget) | **GET** /purchaseOrder/deviation/{id} | [BETA] Get deviation by order line ID. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
*PurchaseOrderdeviationApi* | [**purchaseOrderDeviationListPostList**](docs/Api/PurchaseOrderdeviationApi.md#purchaseorderdeviationlistpostlist) | **POST** /purchaseOrder/deviation/list | [BETA] Register multiple deviations. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
*PurchaseOrderdeviationApi* | [**purchaseOrderDeviationListPutList**](docs/Api/PurchaseOrderdeviationApi.md#purchaseorderdeviationlistputlist) | **PUT** /purchaseOrder/deviation/list | [BETA] Update multiple deviations. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
*PurchaseOrderdeviationApi* | [**purchaseOrderDeviationPost**](docs/Api/PurchaseOrderdeviationApi.md#purchaseorderdeviationpost) | **POST** /purchaseOrder/deviation | [BETA] Register deviation on goods receipt. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
*PurchaseOrderdeviationApi* | [**purchaseOrderDeviationPut**](docs/Api/PurchaseOrderdeviationApi.md#purchaseorderdeviationput) | **PUT** /purchaseOrder/deviation/{id} | Update deviation. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
*PurchaseOrderdeviationApi* | [**purchaseOrderDeviationSearch**](docs/Api/PurchaseOrderdeviationApi.md#purchaseorderdeviationsearch) | **GET** /purchaseOrder/deviation | [BETA] Find handled deviations for purchase order. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
*PurchaseOrderdeviationApi* | [**purchaseOrderDeviationUndeliverUndeliver**](docs/Api/PurchaseOrderdeviationApi.md#purchaseorderdeviationundeliverundeliver) | **PUT** /purchaseOrder/deviation/{id}/:undeliver | [BETA] Undeliver the deviations. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
*PurchaseOrdergoodsReceiptApi* | [**purchaseOrderGoodsReceiptConfirmConfirm**](docs/Api/PurchaseOrdergoodsReceiptApi.md#purchaseordergoodsreceiptconfirmconfirm) | **PUT** /purchaseOrder/goodsReceipt/{id}/:confirm | [BETA] Confirm goods receipt. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
*PurchaseOrdergoodsReceiptApi* | [**purchaseOrderGoodsReceiptDelete**](docs/Api/PurchaseOrdergoodsReceiptApi.md#purchaseordergoodsreceiptdelete) | **DELETE** /purchaseOrder/goodsReceipt/{id} | [BETA] Delete goods receipt by ID. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
*PurchaseOrdergoodsReceiptApi* | [**purchaseOrderGoodsReceiptGet**](docs/Api/PurchaseOrdergoodsReceiptApi.md#purchaseordergoodsreceiptget) | **GET** /purchaseOrder/goodsReceipt/{id} | [BETA] Get goods receipt by purchase order ID. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
*PurchaseOrdergoodsReceiptApi* | [**purchaseOrderGoodsReceiptListDeleteByIds**](docs/Api/PurchaseOrdergoodsReceiptApi.md#purchaseordergoodsreceiptlistdeletebyids) | **DELETE** /purchaseOrder/goodsReceipt/list | [BETA] Delete multiple goods receipt by ID. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
*PurchaseOrdergoodsReceiptApi* | [**purchaseOrderGoodsReceiptListPostList**](docs/Api/PurchaseOrdergoodsReceiptApi.md#purchaseordergoodsreceiptlistpostlist) | **POST** /purchaseOrder/goodsReceipt/list | [BETA] Register multiple goods receipt without an existing purchase order. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
*PurchaseOrdergoodsReceiptApi* | [**purchaseOrderGoodsReceiptPost**](docs/Api/PurchaseOrdergoodsReceiptApi.md#purchaseordergoodsreceiptpost) | **POST** /purchaseOrder/goodsReceipt | [BETA] Register goods receipt without an existing purchase order. When registration of several goods receipt, use /list for better performance. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
*PurchaseOrdergoodsReceiptApi* | [**purchaseOrderGoodsReceiptPut**](docs/Api/PurchaseOrdergoodsReceiptApi.md#purchaseordergoodsreceiptput) | **PUT** /purchaseOrder/goodsReceipt/{id} | [BETA] Update goods receipt. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
*PurchaseOrdergoodsReceiptApi* | [**purchaseOrderGoodsReceiptReceiveAndConfirmReceiveAndConfirm**](docs/Api/PurchaseOrdergoodsReceiptApi.md#purchaseordergoodsreceiptreceiveandconfirmreceiveandconfirm) | **PUT** /purchaseOrder/goodsReceipt/{id}/:receiveAndConfirm | [BETA]  Receive all ordered products and approve goods receipt. Only available for users that have activated the Logistics/Logistics Plus Beta-program in &#39;Our customer account&#39;
*PurchaseOrdergoodsReceiptApi* | [**purchaseOrderGoodsReceiptRegisterGoodsReceiptRegisterGoodsReceipt**](docs/Api/PurchaseOrdergoodsReceiptApi.md#purchaseordergoodsreceiptregistergoodsreceiptregistergoodsreceipt) | **PUT** /purchaseOrder/goodsReceipt/{id}/:registerGoodsReceipt | [BETA] Register goods receipt. Quantity received on the products is set to the same as quantity ordered. To update the quantity received, use PUT /purchaseOrder/goodsReceiptLine/{id}. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
*PurchaseOrdergoodsReceiptApi* | [**purchaseOrderGoodsReceiptSearch**](docs/Api/PurchaseOrdergoodsReceiptApi.md#purchaseordergoodsreceiptsearch) | **GET** /purchaseOrder/goodsReceipt | [BETA] Get goods receipt. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
*PurchaseOrdergoodsReceiptLineApi* | [**purchaseOrderGoodsReceiptLineDelete**](docs/Api/PurchaseOrdergoodsReceiptLineApi.md#purchaseordergoodsreceiptlinedelete) | **DELETE** /purchaseOrder/goodsReceiptLine/{id} | [BETA] Delete goods receipt line by ID. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
*PurchaseOrdergoodsReceiptLineApi* | [**purchaseOrderGoodsReceiptLineGet**](docs/Api/PurchaseOrdergoodsReceiptLineApi.md#purchaseordergoodsreceiptlineget) | **GET** /purchaseOrder/goodsReceiptLine/{id} | [BETA] Get goods receipt line by purchase order line ID. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
*PurchaseOrdergoodsReceiptLineApi* | [**purchaseOrderGoodsReceiptLineListDeleteList**](docs/Api/PurchaseOrdergoodsReceiptLineApi.md#purchaseordergoodsreceiptlinelistdeletelist) | **DELETE** /purchaseOrder/goodsReceiptLine/list | [BETA] Delete goods receipt lines by ID. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
*PurchaseOrdergoodsReceiptLineApi* | [**purchaseOrderGoodsReceiptLineListPostList**](docs/Api/PurchaseOrdergoodsReceiptLineApi.md#purchaseordergoodsreceiptlinelistpostlist) | **POST** /purchaseOrder/goodsReceiptLine/list | [BETA] Register multiple new goods receipt on an existing purchase order. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
*PurchaseOrdergoodsReceiptLineApi* | [**purchaseOrderGoodsReceiptLineListPutList**](docs/Api/PurchaseOrdergoodsReceiptLineApi.md#purchaseordergoodsreceiptlinelistputlist) | **PUT** /purchaseOrder/goodsReceiptLine/list | [BETA] Update goods receipt lines on a goods receipt. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
*PurchaseOrdergoodsReceiptLineApi* | [**purchaseOrderGoodsReceiptLinePost**](docs/Api/PurchaseOrdergoodsReceiptLineApi.md#purchaseordergoodsreceiptlinepost) | **POST** /purchaseOrder/goodsReceiptLine | [BETA] Register new goods receipt; new product on an existing purchase order. When registration of several goods receipt, use /list for better performance. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
*PurchaseOrdergoodsReceiptLineApi* | [**purchaseOrderGoodsReceiptLinePut**](docs/Api/PurchaseOrdergoodsReceiptLineApi.md#purchaseordergoodsreceiptlineput) | **PUT** /purchaseOrder/goodsReceiptLine/{id} | [BETA] Update a goods receipt line on a goods receipt. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
*PurchaseOrdergoodsReceiptLineApi* | [**purchaseOrderGoodsReceiptLineSearch**](docs/Api/PurchaseOrdergoodsReceiptLineApi.md#purchaseordergoodsreceiptlinesearch) | **GET** /purchaseOrder/goodsReceiptLine | [BETA] Find goods receipt lines for purchase order. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
*PurchaseOrderorderlineApi* | [**purchaseOrderOrderlineDelete**](docs/Api/PurchaseOrderorderlineApi.md#purchaseorderorderlinedelete) | **DELETE** /purchaseOrder/orderline/{id} | [BETA] Delete purchase order line.
*PurchaseOrderorderlineApi* | [**purchaseOrderOrderlineGet**](docs/Api/PurchaseOrderorderlineApi.md#purchaseorderorderlineget) | **GET** /purchaseOrder/orderline/{id} | [BETA] Find purchase order line by ID.
*PurchaseOrderorderlineApi* | [**purchaseOrderOrderlineListDeleteList**](docs/Api/PurchaseOrderorderlineApi.md#purchaseorderorderlinelistdeletelist) | **DELETE** /purchaseOrder/orderline/list | [BETA] Delete purchase order lines by ID.
*PurchaseOrderorderlineApi* | [**purchaseOrderOrderlineListPostList**](docs/Api/PurchaseOrderorderlineApi.md#purchaseorderorderlinelistpostlist) | **POST** /purchaseOrder/orderline/list | Create list of new purchase order lines.
*PurchaseOrderorderlineApi* | [**purchaseOrderOrderlineListPutList**](docs/Api/PurchaseOrderorderlineApi.md#purchaseorderorderlinelistputlist) | **PUT** /purchaseOrder/orderline/list | [BETA] Update a list of purchase order lines.
*PurchaseOrderorderlineApi* | [**purchaseOrderOrderlinePost**](docs/Api/PurchaseOrderorderlineApi.md#purchaseorderorderlinepost) | **POST** /purchaseOrder/orderline | [BETA] Creates purchase order line.
*PurchaseOrderorderlineApi* | [**purchaseOrderOrderlinePut**](docs/Api/PurchaseOrderorderlineApi.md#purchaseorderorderlineput) | **PUT** /purchaseOrder/orderline/{id} | [BETA] Updates purchase order line
*PurchaseOrderpurchaseOrderIncomingInvoiceRelationApi* | [**purchaseOrderPurchaseOrderIncomingInvoiceRelationDelete**](docs/Api/PurchaseOrderpurchaseOrderIncomingInvoiceRelationApi.md#purchaseorderpurchaseorderincominginvoicerelationdelete) | **DELETE** /purchaseOrder/purchaseOrderIncomingInvoiceRelation/{id} | [BETA] Delete purchase order voucher relation. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
*PurchaseOrderpurchaseOrderIncomingInvoiceRelationApi* | [**purchaseOrderPurchaseOrderIncomingInvoiceRelationGet**](docs/Api/PurchaseOrderpurchaseOrderIncomingInvoiceRelationApi.md#purchaseorderpurchaseorderincominginvoicerelationget) | **GET** /purchaseOrder/purchaseOrderIncomingInvoiceRelation/{id} | [BETA] Find purchase order relation to voucher by ID. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
*PurchaseOrderpurchaseOrderIncomingInvoiceRelationApi* | [**purchaseOrderPurchaseOrderIncomingInvoiceRelationListDeleteByIds**](docs/Api/PurchaseOrderpurchaseOrderIncomingInvoiceRelationApi.md#purchaseorderpurchaseorderincominginvoicerelationlistdeletebyids) | **DELETE** /purchaseOrder/purchaseOrderIncomingInvoiceRelation/list | [BETA] Delete multiple purchase order voucher relations. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
*PurchaseOrderpurchaseOrderIncomingInvoiceRelationApi* | [**purchaseOrderPurchaseOrderIncomingInvoiceRelationListPostList**](docs/Api/PurchaseOrderpurchaseOrderIncomingInvoiceRelationApi.md#purchaseorderpurchaseorderincominginvoicerelationlistpostlist) | **POST** /purchaseOrder/purchaseOrderIncomingInvoiceRelation/list | [BETA] Create a new list of relations between purchase order and voucher. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
*PurchaseOrderpurchaseOrderIncomingInvoiceRelationApi* | [**purchaseOrderPurchaseOrderIncomingInvoiceRelationPost**](docs/Api/PurchaseOrderpurchaseOrderIncomingInvoiceRelationApi.md#purchaseorderpurchaseorderincominginvoicerelationpost) | **POST** /purchaseOrder/purchaseOrderIncomingInvoiceRelation | [BETA] Create new relation between purchase order and a voucher. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
*PurchaseOrderpurchaseOrderIncomingInvoiceRelationApi* | [**purchaseOrderPurchaseOrderIncomingInvoiceRelationSearch**](docs/Api/PurchaseOrderpurchaseOrderIncomingInvoiceRelationApi.md#purchaseorderpurchaseorderincominginvoicerelationsearch) | **GET** /purchaseOrder/purchaseOrderIncomingInvoiceRelation | [BETA] Find purchase order relation to voucher with sent data. Only available for users that have activated the Logistics Plus Beta-program in &#39;Our customer account&#39;
*ReminderApi* | [**reminderGet**](docs/Api/ReminderApi.md#reminderget) | **GET** /reminder/{id} | Get reminder by ID.
*ReminderApi* | [**reminderPdfDownloadPdf**](docs/Api/ReminderApi.md#reminderpdfdownloadpdf) | **GET** /reminder/{reminderId}/pdf | Get reminder document by reminder ID.
*ReminderApi* | [**reminderSearch**](docs/Api/ReminderApi.md#remindersearch) | **GET** /reminder | Find reminders corresponding with sent data.
*ResultbudgetApi* | [**resultbudgetCompanyGetCompanyResultBudget**](docs/Api/ResultbudgetApi.md#resultbudgetcompanygetcompanyresultbudget) | **GET** /resultbudget/company | Get result budget for company
*ResultbudgetApi* | [**resultbudgetDepartmentGetDepartmentResultBudget**](docs/Api/ResultbudgetApi.md#resultbudgetdepartmentgetdepartmentresultbudget) | **GET** /resultbudget/department/{id} | Get result budget associated with a departmentId
*ResultbudgetApi* | [**resultbudgetEmployeeGetEmployeeResultBudget**](docs/Api/ResultbudgetApi.md#resultbudgetemployeegetemployeeresultbudget) | **GET** /resultbudget/employee/{id} | Get result budget associated with an employeeId
*ResultbudgetApi* | [**resultbudgetProductGetProductResultBudget**](docs/Api/ResultbudgetApi.md#resultbudgetproductgetproductresultbudget) | **GET** /resultbudget/product/{id} | Get result budget associated with a productId
*ResultbudgetApi* | [**resultbudgetProjectGetProjectResultBudget**](docs/Api/ResultbudgetApi.md#resultbudgetprojectgetprojectresultbudget) | **GET** /resultbudget/project/{id} | Get result budget associated with a projectId
*SaftApi* | [**saftExportSAFTExportSAFT**](docs/Api/SaftApi.md#saftexportsaftexportsaft) | **GET** /saft/exportSAFT | [BETA] Create SAF-T export for the Tripletex account.
*SaftApi* | [**saftImportSAFTImportSAFT**](docs/Api/SaftApi.md#saftimportsaftimportsaft) | **POST** /saft/importSAFT | [BETA] Import SAF-T. Send XML file as multipart form.
*SalarycompilationApi* | [**salaryCompilationGet**](docs/Api/SalarycompilationApi.md#salarycompilationget) | **GET** /salary/compilation | Find salary compilation by employee.
*SalarycompilationApi* | [**salaryCompilationPdfDownloadPdf**](docs/Api/SalarycompilationApi.md#salarycompilationpdfdownloadpdf) | **GET** /salary/compilation/pdf | Find salary compilation (PDF document) by employee.
*SalarypayslipApi* | [**salaryPayslipGet**](docs/Api/SalarypayslipApi.md#salarypayslipget) | **GET** /salary/payslip/{id} | Find payslip by ID.
*SalarypayslipApi* | [**salaryPayslipPdfDownloadPdf**](docs/Api/SalarypayslipApi.md#salarypayslippdfdownloadpdf) | **GET** /salary/payslip/{id}/pdf | Find payslip (PDF document) by ID.
*SalarypayslipApi* | [**salaryPayslipSearch**](docs/Api/SalarypayslipApi.md#salarypayslipsearch) | **GET** /salary/payslip | Find payslips corresponding with sent data.
*SalarysettingsApi* | [**salarySettingsGet**](docs/Api/SalarysettingsApi.md#salarysettingsget) | **GET** /salary/settings | Get salary settings of logged in company.
*SalarysettingsApi* | [**salarySettingsPut**](docs/Api/SalarysettingsApi.md#salarysettingsput) | **PUT** /salary/settings | Update settings of logged in company.
*SalarysettingsholidayApi* | [**salarySettingsHolidayListDeleteByIds**](docs/Api/SalarysettingsholidayApi.md#salarysettingsholidaylistdeletebyids) | **DELETE** /salary/settings/holiday/list | Delete multiple holiday settings of current logged in company.
*SalarysettingsholidayApi* | [**salarySettingsHolidayListPostList**](docs/Api/SalarysettingsholidayApi.md#salarysettingsholidaylistpostlist) | **POST** /salary/settings/holiday/list | Create multiple holiday settings of current logged in company.
*SalarysettingsholidayApi* | [**salarySettingsHolidayListPutList**](docs/Api/SalarysettingsholidayApi.md#salarysettingsholidaylistputlist) | **PUT** /salary/settings/holiday/list | Update multiple holiday settings of current logged in company.
*SalarysettingsholidayApi* | [**salarySettingsHolidayPost**](docs/Api/SalarysettingsholidayApi.md#salarysettingsholidaypost) | **POST** /salary/settings/holiday | Create a holiday setting of current logged in company.
*SalarysettingsholidayApi* | [**salarySettingsHolidayPut**](docs/Api/SalarysettingsholidayApi.md#salarysettingsholidayput) | **PUT** /salary/settings/holiday/{id} | Update a holiday setting of current logged in company.
*SalarysettingsholidayApi* | [**salarySettingsHolidaySearch**](docs/Api/SalarysettingsholidayApi.md#salarysettingsholidaysearch) | **GET** /salary/settings/holiday | Find holiday settings of current logged in company.
*SalarysettingspensionSchemeApi* | [**salarySettingsPensionSchemeDelete**](docs/Api/SalarysettingspensionSchemeApi.md#salarysettingspensionschemedelete) | **DELETE** /salary/settings/pensionScheme/{id} | Delete a Pension Scheme
*SalarysettingspensionSchemeApi* | [**salarySettingsPensionSchemeGet**](docs/Api/SalarysettingspensionSchemeApi.md#salarysettingspensionschemeget) | **GET** /salary/settings/pensionScheme/{id} | Get Pension Scheme for a specific ID
*SalarysettingspensionSchemeApi* | [**salarySettingsPensionSchemeListDeleteByIds**](docs/Api/SalarysettingspensionSchemeApi.md#salarysettingspensionschemelistdeletebyids) | **DELETE** /salary/settings/pensionScheme/list | Delete multiple Pension Schemes.
*SalarysettingspensionSchemeApi* | [**salarySettingsPensionSchemeListPostList**](docs/Api/SalarysettingspensionSchemeApi.md#salarysettingspensionschemelistpostlist) | **POST** /salary/settings/pensionScheme/list | Create multiple Pension Schemes.
*SalarysettingspensionSchemeApi* | [**salarySettingsPensionSchemeListPutList**](docs/Api/SalarysettingspensionSchemeApi.md#salarysettingspensionschemelistputlist) | **PUT** /salary/settings/pensionScheme/list | Update multiple Pension Schemes.
*SalarysettingspensionSchemeApi* | [**salarySettingsPensionSchemePost**](docs/Api/SalarysettingspensionSchemeApi.md#salarysettingspensionschemepost) | **POST** /salary/settings/pensionScheme | Create a Pension Scheme.
*SalarysettingspensionSchemeApi* | [**salarySettingsPensionSchemePut**](docs/Api/SalarysettingspensionSchemeApi.md#salarysettingspensionschemeput) | **PUT** /salary/settings/pensionScheme/{id} | Update a Pension Scheme
*SalarysettingspensionSchemeApi* | [**salarySettingsPensionSchemeSearch**](docs/Api/SalarysettingspensionSchemeApi.md#salarysettingspensionschemesearch) | **GET** /salary/settings/pensionScheme | Find pension schemes.
*SalarysettingsstandardTimeApi* | [**salarySettingsStandardTimeByDateGetByDate**](docs/Api/SalarysettingsstandardTimeApi.md#salarysettingsstandardtimebydategetbydate) | **GET** /salary/settings/standardTime/byDate | Find standard time by date
*SalarysettingsstandardTimeApi* | [**salarySettingsStandardTimeGet**](docs/Api/SalarysettingsstandardTimeApi.md#salarysettingsstandardtimeget) | **GET** /salary/settings/standardTime/{id} | Find standard time by ID.
*SalarysettingsstandardTimeApi* | [**salarySettingsStandardTimePost**](docs/Api/SalarysettingsstandardTimeApi.md#salarysettingsstandardtimepost) | **POST** /salary/settings/standardTime | Create standard time.
*SalarysettingsstandardTimeApi* | [**salarySettingsStandardTimePut**](docs/Api/SalarysettingsstandardTimeApi.md#salarysettingsstandardtimeput) | **PUT** /salary/settings/standardTime/{id} | Update standard time.
*SalarysettingsstandardTimeApi* | [**salarySettingsStandardTimeSearch**](docs/Api/SalarysettingsstandardTimeApi.md#salarysettingsstandardtimesearch) | **GET** /salary/settings/standardTime | Get all standard times.
*SalarytransactionApi* | [**salaryTransactionDelete**](docs/Api/SalarytransactionApi.md#salarytransactiondelete) | **DELETE** /salary/transaction/{id} | Delete salary transaction by ID.
*SalarytransactionApi* | [**salaryTransactionGet**](docs/Api/SalarytransactionApi.md#salarytransactionget) | **GET** /salary/transaction/{id} | Find salary transaction by ID.
*SalarytransactionApi* | [**salaryTransactionPost**](docs/Api/SalarytransactionApi.md#salarytransactionpost) | **POST** /salary/transaction | Create a new salary transaction.
*SalarytypeApi* | [**salaryTypeGet**](docs/Api/SalarytypeApi.md#salarytypeget) | **GET** /salary/type/{id} | Find salary type by ID.
*SalarytypeApi* | [**salaryTypeSearch**](docs/Api/SalarytypeApi.md#salarytypesearch) | **GET** /salary/type | Find salary type corresponding with sent data.
*SegmentationinternalApi* | [**internalSegmentationGet**](docs/Api/SegmentationinternalApi.md#internalsegmentationget) | **GET** /internal/segmentation | Get segmentation data
*SubscriptionApi* | [**subscriptionAdditionalOrderLinesGetAdditionalOrderLines**](docs/Api/SubscriptionApi.md#subscriptionadditionalorderlinesgetadditionalorderlines) | **GET** /subscription/additionalOrderLines | Returns the additional order lines for an account.
*SubscriptionApi* | [**subscriptionInvoiceHistoryGetInvoiceHistory**](docs/Api/SubscriptionApi.md#subscriptioninvoicehistorygetinvoicehistory) | **GET** /subscription/invoiceHistory | Returns the invoice history for an account.
*SubscriptionApi* | [**subscriptionPackagesGetPackages**](docs/Api/SubscriptionApi.md#subscriptionpackagesgetpackages) | **GET** /subscription/packages | Returns the packages that can exist for an account.
*SubscriptionApi* | [**subscriptionServicesGetServices**](docs/Api/SubscriptionApi.md#subscriptionservicesgetservices) | **GET** /subscription/services | Returns the services that are available for an account.
*SupplierApi* | [**supplierDelete**](docs/Api/SupplierApi.md#supplierdelete) | **DELETE** /supplier/{id} | [BETA] Delete supplier by ID
*SupplierApi* | [**supplierGet**](docs/Api/SupplierApi.md#supplierget) | **GET** /supplier/{id} | Get supplier by ID.
*SupplierApi* | [**supplierListPostList**](docs/Api/SupplierApi.md#supplierlistpostlist) | **POST** /supplier/list | [BETA] Create multiple suppliers. Related supplier addresses may also be created.
*SupplierApi* | [**supplierListPutList**](docs/Api/SupplierApi.md#supplierlistputlist) | **PUT** /supplier/list | [BETA] Update multiple suppliers. Addresses can also be updated.
*SupplierApi* | [**supplierPost**](docs/Api/SupplierApi.md#supplierpost) | **POST** /supplier | Create supplier. Related supplier addresses may also be created.
*SupplierApi* | [**supplierPut**](docs/Api/SupplierApi.md#supplierput) | **PUT** /supplier/{id} | Update supplier.
*SupplierApi* | [**supplierSearch**](docs/Api/SupplierApi.md#suppliersearch) | **GET** /supplier | Find suppliers corresponding with sent data.
*SupplierInvoiceApi* | [**supplierInvoiceAddPaymentAddPayment**](docs/Api/SupplierInvoiceApi.md#supplierinvoiceaddpaymentaddpayment) | **POST** /supplierInvoice/{invoiceId}/:addPayment | Register payment, paymentType &#x3D;&#x3D; 0 finds the last paymentType for this vendor
*SupplierInvoiceApi* | [**supplierInvoiceAddRecipientAddRecipient**](docs/Api/SupplierInvoiceApi.md#supplierinvoiceaddrecipientaddrecipient) | **PUT** /supplierInvoice/{invoiceId}/:addRecipient | Add recipient to supplier invoices.
*SupplierInvoiceApi* | [**supplierInvoiceAddRecipientAddRecipientToMany**](docs/Api/SupplierInvoiceApi.md#supplierinvoiceaddrecipientaddrecipienttomany) | **PUT** /supplierInvoice/:addRecipient | Add recipient.
*SupplierInvoiceApi* | [**supplierInvoiceApproveApprove**](docs/Api/SupplierInvoiceApi.md#supplierinvoiceapproveapprove) | **PUT** /supplierInvoice/{invoiceId}/:approve | Approve supplier invoice.
*SupplierInvoiceApi* | [**supplierInvoiceApproveApproveMany**](docs/Api/SupplierInvoiceApi.md#supplierinvoiceapproveapprovemany) | **PUT** /supplierInvoice/:approve | Approve supplier invoices.
*SupplierInvoiceApi* | [**supplierInvoiceChangeDimensionChangeDimensionMany**](docs/Api/SupplierInvoiceApi.md#supplierinvoicechangedimensionchangedimensionmany) | **PUT** /supplierInvoice/{invoiceId}/:changeDimension | Change dimension on a supplier invoice.
*SupplierInvoiceApi* | [**supplierInvoiceForApprovalGetApprovalInvoices**](docs/Api/SupplierInvoiceApi.md#supplierinvoiceforapprovalgetapprovalinvoices) | **GET** /supplierInvoice/forApproval | Get supplierInvoices for approval
*SupplierInvoiceApi* | [**supplierInvoiceGet**](docs/Api/SupplierInvoiceApi.md#supplierinvoiceget) | **GET** /supplierInvoice/{id} | Get supplierInvoice by ID.
*SupplierInvoiceApi* | [**supplierInvoicePdfDownloadPdf**](docs/Api/SupplierInvoiceApi.md#supplierinvoicepdfdownloadpdf) | **GET** /supplierInvoice/{invoiceId}/pdf | Get supplierInvoice document by invoice ID.
*SupplierInvoiceApi* | [**supplierInvoiceRejectReject**](docs/Api/SupplierInvoiceApi.md#supplierinvoicerejectreject) | **PUT** /supplierInvoice/{invoiceId}/:reject | reject supplier invoice.
*SupplierInvoiceApi* | [**supplierInvoiceRejectRejectMany**](docs/Api/SupplierInvoiceApi.md#supplierinvoicerejectrejectmany) | **PUT** /supplierInvoice/:reject | reject supplier invoices.
*SupplierInvoiceApi* | [**supplierInvoiceSearch**](docs/Api/SupplierInvoiceApi.md#supplierinvoicesearch) | **GET** /supplierInvoice | Find supplierInvoices corresponding with sent data.
*SupplierInvoiceApi* | [**supplierInvoiceVoucherPostingsPutPostings**](docs/Api/SupplierInvoiceApi.md#supplierinvoicevoucherpostingsputpostings) | **PUT** /supplierInvoice/voucher/{id}/postings | [BETA] Put debit postings.
*TimesheetallocatedApi* | [**timesheetAllocatedApproveApprove**](docs/Api/TimesheetallocatedApi.md#timesheetallocatedapproveapprove) | **PUT** /timesheet/allocated/{id}/:approve | Only for allocated hours on the company&#39;s internal holiday/vacation activity. Mark the allocated hour entry as approved. The hours will be copied to the time sheet. A notification will be sent to the entry&#39;s employee if the entry&#39;s approval status or comment has changed.
*TimesheetallocatedApi* | [**timesheetAllocatedApproveListApproveList**](docs/Api/TimesheetallocatedApi.md#timesheetallocatedapprovelistapprovelist) | **PUT** /timesheet/allocated/:approveList | Only for allocated hours on the company&#39;s internal holiday/vacation activity. Mark the allocated hour entry/entries as approved. The hours will be copied to the time sheet. Notifications will be sent to the entries&#39; employees if the entries&#39; approval statuses or comments have changed. If IDs are provided, the other args are ignored.
*TimesheetallocatedApi* | [**timesheetAllocatedDelete**](docs/Api/TimesheetallocatedApi.md#timesheetallocateddelete) | **DELETE** /timesheet/allocated/{id} | Delete allocated hour entry by ID.
*TimesheetallocatedApi* | [**timesheetAllocatedGet**](docs/Api/TimesheetallocatedApi.md#timesheetallocatedget) | **GET** /timesheet/allocated/{id} | Find allocated hour entry by ID.
*TimesheetallocatedApi* | [**timesheetAllocatedListPostList**](docs/Api/TimesheetallocatedApi.md#timesheetallocatedlistpostlist) | **POST** /timesheet/allocated/list | Add new allocated hour entry. Multiple objects for several users can be sent in the same request. Only holiday/vacation hours can receive comments. Notifications will be sent to the entries&#39; employees if the entries have comments.
*TimesheetallocatedApi* | [**timesheetAllocatedListPutList**](docs/Api/TimesheetallocatedApi.md#timesheetallocatedlistputlist) | **PUT** /timesheet/allocated/list | Update allocated hour entry. Multiple objects for different users can be sent in the same request. Note: Allocated hour entry object fields which are present but not set, or set to 0, will be nulled. Only holiday/vacation hours can receive comments. Notifications will be sent to the entries&#39; employees if the entries&#39; comments have changed.
*TimesheetallocatedApi* | [**timesheetAllocatedPost**](docs/Api/TimesheetallocatedApi.md#timesheetallocatedpost) | **POST** /timesheet/allocated | Add new allocated hour entry. Only one entry per employee/date/activity/project combination is supported. Only holiday/vacation hours can receive comments. A notification will be sent to the entry&#39;s employee if the entry has a comment.
*TimesheetallocatedApi* | [**timesheetAllocatedPut**](docs/Api/TimesheetallocatedApi.md#timesheetallocatedput) | **PUT** /timesheet/allocated/{id} | Update allocated hour entry by ID. Note: Allocated hour entry object fields which are present but not set, or set to 0, will be nulled. Only holiday/vacation hours can receive comments. A notification will be sent to the entry&#39;s employee if the entry&#39;s comment has changed.
*TimesheetallocatedApi* | [**timesheetAllocatedSearch**](docs/Api/TimesheetallocatedApi.md#timesheetallocatedsearch) | **GET** /timesheet/allocated | Find allocated hour entries corresponding with sent data.
*TimesheetallocatedApi* | [**timesheetAllocatedUnapproveListUnapproveList**](docs/Api/TimesheetallocatedApi.md#timesheetallocatedunapprovelistunapprovelist) | **PUT** /timesheet/allocated/:unapproveList | Only for allocated hours on the company&#39;s internal holiday/vacation activity. Mark the allocated hour entry/entries as unapproved. Notifications will be sent to the entries&#39; employees if the entries&#39; approval statuses or comments have changed. If IDs are provided, the other args are ignored.
*TimesheetallocatedApi* | [**timesheetAllocatedUnapproveUnapprove**](docs/Api/TimesheetallocatedApi.md#timesheetallocatedunapproveunapprove) | **PUT** /timesheet/allocated/{id}/:unapprove | Only for allocated hours on the company&#39;s internal holiday/vacation activity. Mark the allocated hour entry as unapproved. A notification will be sent to the entry&#39;s employee if the entry&#39;s approval status or comment has changed.
*TimesheetcompanyHolidayApi* | [**timesheetCompanyHolidayDelete**](docs/Api/TimesheetcompanyHolidayApi.md#timesheetcompanyholidaydelete) | **DELETE** /timesheet/companyHoliday/{id} | [BETA] Delete a company holiday
*TimesheetcompanyHolidayApi* | [**timesheetCompanyHolidayGet**](docs/Api/TimesheetcompanyHolidayApi.md#timesheetcompanyholidayget) | **GET** /timesheet/companyHoliday/{id} | [BETA] Get company holiday by its ID
*TimesheetcompanyHolidayApi* | [**timesheetCompanyHolidayPost**](docs/Api/TimesheetcompanyHolidayApi.md#timesheetcompanyholidaypost) | **POST** /timesheet/companyHoliday | [BETA] Create a company holiday
*TimesheetcompanyHolidayApi* | [**timesheetCompanyHolidayPut**](docs/Api/TimesheetcompanyHolidayApi.md#timesheetcompanyholidayput) | **PUT** /timesheet/companyHoliday/{id} | [BETA] Update a company holiday
*TimesheetcompanyHolidayApi* | [**timesheetCompanyHolidaySearch**](docs/Api/TimesheetcompanyHolidayApi.md#timesheetcompanyholidaysearch) | **GET** /timesheet/companyHoliday | [BETA] Search for company holidays by id or year.
*TimesheetentryApi* | [**timesheetEntryDelete**](docs/Api/TimesheetentryApi.md#timesheetentrydelete) | **DELETE** /timesheet/entry/{id} | Delete timesheet entry by ID.
*TimesheetentryApi* | [**timesheetEntryGet**](docs/Api/TimesheetentryApi.md#timesheetentryget) | **GET** /timesheet/entry/{id} | Find timesheet entry by ID.
*TimesheetentryApi* | [**timesheetEntryListPostList**](docs/Api/TimesheetentryApi.md#timesheetentrylistpostlist) | **POST** /timesheet/entry/list | Add new timesheet entry. Multiple objects for several users can be sent in the same request.
*TimesheetentryApi* | [**timesheetEntryListPutList**](docs/Api/TimesheetentryApi.md#timesheetentrylistputlist) | **PUT** /timesheet/entry/list | Update timesheet entry. Multiple objects for different users can be sent in the same request.
*TimesheetentryApi* | [**timesheetEntryPost**](docs/Api/TimesheetentryApi.md#timesheetentrypost) | **POST** /timesheet/entry | Add new timesheet entry. Only one entry per employee/date/activity/project combination is supported.
*TimesheetentryApi* | [**timesheetEntryPut**](docs/Api/TimesheetentryApi.md#timesheetentryput) | **PUT** /timesheet/entry/{id} | Update timesheet entry by ID. Note: Timesheet entry object fields which are present but not set, or set to 0, will be nulled.
*TimesheetentryApi* | [**timesheetEntryRecentActivitiesGetRecentActivities**](docs/Api/TimesheetentryApi.md#timesheetentryrecentactivitiesgetrecentactivities) | **GET** /timesheet/entry/&gt;recentActivities | Find recently used timesheet activities.
*TimesheetentryApi* | [**timesheetEntryRecentProjectsGetRecentProjects**](docs/Api/TimesheetentryApi.md#timesheetentryrecentprojectsgetrecentprojects) | **GET** /timesheet/entry/&gt;recentProjects | Find projects with recent activities (timesheet entry registered).
*TimesheetentryApi* | [**timesheetEntrySearch**](docs/Api/TimesheetentryApi.md#timesheetentrysearch) | **GET** /timesheet/entry | Find timesheet entry corresponding with sent data.
*TimesheetentryApi* | [**timesheetEntryTotalHoursGetTotalHours**](docs/Api/TimesheetentryApi.md#timesheetentrytotalhoursgettotalhours) | **GET** /timesheet/entry/&gt;totalHours | Find total hours registered on an employee in a specific period.
*TimesheetmonthApi* | [**timesheetMonthApproveApprove**](docs/Api/TimesheetmonthApi.md#timesheetmonthapproveapprove) | **PUT** /timesheet/month/:approve | approve month(s).  If id is provided the other args are ignored
*TimesheetmonthApi* | [**timesheetMonthByMonthNumberGetByMonthNumber**](docs/Api/TimesheetmonthApi.md#timesheetmonthbymonthnumbergetbymonthnumber) | **GET** /timesheet/month/byMonthNumber | Find monthly status for given month.
*TimesheetmonthApi* | [**timesheetMonthCompleteComplete**](docs/Api/TimesheetmonthApi.md#timesheetmonthcompletecomplete) | **PUT** /timesheet/month/:complete | complete month(s).  If id is provided the other args are ignored
*TimesheetmonthApi* | [**timesheetMonthGet**](docs/Api/TimesheetmonthApi.md#timesheetmonthget) | **GET** /timesheet/month/{id} | Find monthly status entry by ID.
*TimesheetmonthApi* | [**timesheetMonthReopenReopen**](docs/Api/TimesheetmonthApi.md#timesheetmonthreopenreopen) | **PUT** /timesheet/month/:reopen | reopen month(s).  If id is provided the other args are ignored
*TimesheetmonthApi* | [**timesheetMonthUnapproveUnapprove**](docs/Api/TimesheetmonthApi.md#timesheetmonthunapproveunapprove) | **PUT** /timesheet/month/:unapprove | unapprove month(s).  If id is provided the other args are ignored
*TimesheetsalaryProjectTypeSpecificationApi* | [**timesheetSalaryProjectTypeSpecificationDelete**](docs/Api/TimesheetsalaryProjectTypeSpecificationApi.md#timesheetsalaryprojecttypespecificationdelete) | **DELETE** /timesheet/salaryProjectTypeSpecification/{id} | [BETA] Delete a timesheet SalaryType Specification (PILOT USERS ONLY)
*TimesheetsalaryProjectTypeSpecificationApi* | [**timesheetSalaryProjectTypeSpecificationGet**](docs/Api/TimesheetsalaryProjectTypeSpecificationApi.md#timesheetsalaryprojecttypespecificationget) | **GET** /timesheet/salaryProjectTypeSpecification/{id} | [BETA] Get timesheet ProjectSalaryType Specification for a specific ID (PILOT USERS ONLY)
*TimesheetsalaryProjectTypeSpecificationApi* | [**timesheetSalaryProjectTypeSpecificationPost**](docs/Api/TimesheetsalaryProjectTypeSpecificationApi.md#timesheetsalaryprojecttypespecificationpost) | **POST** /timesheet/salaryProjectTypeSpecification | [BETA] Create a timesheet ProjectSalaryType Specification. (PILOT USERS ONLY)
*TimesheetsalaryProjectTypeSpecificationApi* | [**timesheetSalaryProjectTypeSpecificationPut**](docs/Api/TimesheetsalaryProjectTypeSpecificationApi.md#timesheetsalaryprojecttypespecificationput) | **PUT** /timesheet/salaryProjectTypeSpecification/{id} | [BETA] Update a timesheet ProjectSalaryType Specification (PILOT USERS ONLY)
*TimesheetsalaryProjectTypeSpecificationApi* | [**timesheetSalaryProjectTypeSpecificationSearch**](docs/Api/TimesheetsalaryProjectTypeSpecificationApi.md#timesheetsalaryprojecttypespecificationsearch) | **GET** /timesheet/salaryProjectTypeSpecification | [BETA] Get list of timesheet ProjectSalaryType Specifications (PILOT USERS ONLY)
*TimesheetsalaryTypeSpecificationApi* | [**timesheetSalaryTypeSpecificationDelete**](docs/Api/TimesheetsalaryTypeSpecificationApi.md#timesheetsalarytypespecificationdelete) | **DELETE** /timesheet/salaryTypeSpecification/{id} | [BETA] Delete a timesheet SalaryType Specification
*TimesheetsalaryTypeSpecificationApi* | [**timesheetSalaryTypeSpecificationGet**](docs/Api/TimesheetsalaryTypeSpecificationApi.md#timesheetsalarytypespecificationget) | **GET** /timesheet/salaryTypeSpecification/{id} | [BETA] Get timesheet SalaryType Specification for a specific ID
*TimesheetsalaryTypeSpecificationApi* | [**timesheetSalaryTypeSpecificationPost**](docs/Api/TimesheetsalaryTypeSpecificationApi.md#timesheetsalarytypespecificationpost) | **POST** /timesheet/salaryTypeSpecification | [BETA] Create a timesheet SalaryType Specification. Only one entry per employee/date/SalaryType
*TimesheetsalaryTypeSpecificationApi* | [**timesheetSalaryTypeSpecificationPut**](docs/Api/TimesheetsalaryTypeSpecificationApi.md#timesheetsalarytypespecificationput) | **PUT** /timesheet/salaryTypeSpecification/{id} | [BETA] Update a timesheet SalaryType Specification
*TimesheetsalaryTypeSpecificationApi* | [**timesheetSalaryTypeSpecificationSearch**](docs/Api/TimesheetsalaryTypeSpecificationApi.md#timesheetsalarytypespecificationsearch) | **GET** /timesheet/salaryTypeSpecification | [BETA] Get list of timesheet SalaryType Specifications
*TimesheetsettingsApi* | [**timesheetSettingsGet**](docs/Api/TimesheetsettingsApi.md#timesheetsettingsget) | **GET** /timesheet/settings | [BETA] Get timesheet settings of logged in company.
*TimesheettimeClockApi* | [**timesheetTimeClockGet**](docs/Api/TimesheettimeClockApi.md#timesheettimeclockget) | **GET** /timesheet/timeClock/{id} | Find time clock entry by ID.
*TimesheettimeClockApi* | [**timesheetTimeClockPresentGetPresent**](docs/Api/TimesheettimeClockApi.md#timesheettimeclockpresentgetpresent) | **GET** /timesheet/timeClock/present | Find a user’s present running time clock.
*TimesheettimeClockApi* | [**timesheetTimeClockPut**](docs/Api/TimesheettimeClockApi.md#timesheettimeclockput) | **PUT** /timesheet/timeClock/{id} | Update time clock by ID.
*TimesheettimeClockApi* | [**timesheetTimeClockSearch**](docs/Api/TimesheettimeClockApi.md#timesheettimeclocksearch) | **GET** /timesheet/timeClock | Find time clock entries corresponding with sent data.
*TimesheettimeClockApi* | [**timesheetTimeClockStartStart**](docs/Api/TimesheettimeClockApi.md#timesheettimeclockstartstart) | **PUT** /timesheet/timeClock/:start | Start time clock.
*TimesheettimeClockApi* | [**timesheetTimeClockStopStop**](docs/Api/TimesheettimeClockApi.md#timesheettimeclockstopstop) | **PUT** /timesheet/timeClock/{id}/:stop | Stop time clock.
*TimesheetweekApi* | [**timesheetWeekApproveApprove**](docs/Api/TimesheetweekApi.md#timesheetweekapproveapprove) | **PUT** /timesheet/week/:approve | Approve week. By ID or (ISO-8601 week and employeeId combination).
*TimesheetweekApi* | [**timesheetWeekCompleteComplete**](docs/Api/TimesheetweekApi.md#timesheetweekcompletecomplete) | **PUT** /timesheet/week/:complete | Complete week. By ID or (ISO-8601 week and employeeId combination).
*TimesheetweekApi* | [**timesheetWeekReopenReopen**](docs/Api/TimesheetweekApi.md#timesheetweekreopenreopen) | **PUT** /timesheet/week/:reopen | Reopen week. By ID or (ISO-8601 week and employeeId combination).
*TimesheetweekApi* | [**timesheetWeekSearch**](docs/Api/TimesheetweekApi.md#timesheetweeksearch) | **GET** /timesheet/week | Find weekly status By ID, week/year combination, employeeId. or an approver
*TimesheetweekApi* | [**timesheetWeekUnapproveUnapprove**](docs/Api/TimesheetweekApi.md#timesheetweekunapproveunapprove) | **PUT** /timesheet/week/:unapprove | Unapprove week. By ID or (ISO-8601 week and employeeId combination).
*TokenconsumerApi* | [**tokenConsumerByTokenGetByToken**](docs/Api/TokenconsumerApi.md#tokenconsumerbytokengetbytoken) | **GET** /token/consumer/byToken | Get consumer token by token string.
*TokenemployeeApi* | [**tokenEmployeeCreateCreate**](docs/Api/TokenemployeeApi.md#tokenemployeecreatecreate) | **PUT** /token/employee/:create | Create an employee token. Only selected consumers are allowed
*TokensessionApi* | [**tokenSessionCreateCreate**](docs/Api/TokensessionApi.md#tokensessioncreatecreate) | **PUT** /token/session/:create | Create session token.
*TokensessionApi* | [**tokenSessionDelete**](docs/Api/TokensessionApi.md#tokensessiondelete) | **DELETE** /token/session/{token} | Delete session token.
*TokensessionApi* | [**tokenSessionWhoAmIWhoAmI**](docs/Api/TokensessionApi.md#tokensessionwhoamiwhoami) | **GET** /token/session/&gt;whoAmI | Find information about the current user.
*TransportTypeApi* | [**transportTypeGet**](docs/Api/TransportTypeApi.md#transporttypeget) | **GET** /transportType/{id} | [BETA] Find transport type by ID.
*TransportTypeApi* | [**transportTypeSearch**](docs/Api/TransportTypeApi.md#transporttypesearch) | **GET** /transportType | [BETA] Search transport type.
*TravelExpenseApi* | [**travelExpenseApproveApprove**](docs/Api/TravelExpenseApi.md#travelexpenseapproveapprove) | **PUT** /travelExpense/:approve | Approve travel expenses.
*TravelExpenseApi* | [**travelExpenseAttachmentDeleteAttachment**](docs/Api/TravelExpenseApi.md#travelexpenseattachmentdeleteattachment) | **DELETE** /travelExpense/{travelExpenseId}/attachment | Delete attachment.
*TravelExpenseApi* | [**travelExpenseAttachmentDownloadAttachment**](docs/Api/TravelExpenseApi.md#travelexpenseattachmentdownloadattachment) | **GET** /travelExpense/{travelExpenseId}/attachment | Get attachment by travel expense ID.
*TravelExpenseApi* | [**travelExpenseAttachmentListUploadAttachments**](docs/Api/TravelExpenseApi.md#travelexpenseattachmentlistuploadattachments) | **POST** /travelExpense/{travelExpenseId}/attachment/list | Upload multiple attachments to travel expense.
*TravelExpenseApi* | [**travelExpenseAttachmentUploadAttachment**](docs/Api/TravelExpenseApi.md#travelexpenseattachmentuploadattachment) | **POST** /travelExpense/{travelExpenseId}/attachment | Upload attachment to travel expense.
*TravelExpenseApi* | [**travelExpenseCopyCopy**](docs/Api/TravelExpenseApi.md#travelexpensecopycopy) | **PUT** /travelExpense/:copy | Copy travel expense.
*TravelExpenseApi* | [**travelExpenseCreateVouchersCreateVouchers**](docs/Api/TravelExpenseApi.md#travelexpensecreatevoucherscreatevouchers) | **PUT** /travelExpense/:createVouchers | Create vouchers
*TravelExpenseApi* | [**travelExpenseDelete**](docs/Api/TravelExpenseApi.md#travelexpensedelete) | **DELETE** /travelExpense/{id} | Delete travel expense.
*TravelExpenseApi* | [**travelExpenseDeliverDeliver**](docs/Api/TravelExpenseApi.md#travelexpensedeliverdeliver) | **PUT** /travelExpense/:deliver | Deliver travel expenses.
*TravelExpenseApi* | [**travelExpenseGet**](docs/Api/TravelExpenseApi.md#travelexpenseget) | **GET** /travelExpense/{id} | Get travel expense by ID.
*TravelExpenseApi* | [**travelExpensePost**](docs/Api/TravelExpenseApi.md#travelexpensepost) | **POST** /travelExpense | Create travel expense.
*TravelExpenseApi* | [**travelExpensePut**](docs/Api/TravelExpenseApi.md#travelexpenseput) | **PUT** /travelExpense/{id} | Update travel expense.
*TravelExpenseApi* | [**travelExpenseSearch**](docs/Api/TravelExpenseApi.md#travelexpensesearch) | **GET** /travelExpense | Find travel expenses corresponding with sent data.
*TravelExpenseApi* | [**travelExpenseUnapproveUnapprove**](docs/Api/TravelExpenseApi.md#travelexpenseunapproveunapprove) | **PUT** /travelExpense/:unapprove | Unapprove travel expenses.
*TravelExpenseApi* | [**travelExpenseUndeliverUndeliver**](docs/Api/TravelExpenseApi.md#travelexpenseundeliverundeliver) | **PUT** /travelExpense/:undeliver | Undeliver travel expenses.
*TravelExpenseaccommodationAllowanceApi* | [**travelExpenseAccommodationAllowanceDelete**](docs/Api/TravelExpenseaccommodationAllowanceApi.md#travelexpenseaccommodationallowancedelete) | **DELETE** /travelExpense/accommodationAllowance/{id} | Delete accommodation allowance.
*TravelExpenseaccommodationAllowanceApi* | [**travelExpenseAccommodationAllowanceGet**](docs/Api/TravelExpenseaccommodationAllowanceApi.md#travelexpenseaccommodationallowanceget) | **GET** /travelExpense/accommodationAllowance/{id} | Get travel accommodation allowance by ID.
*TravelExpenseaccommodationAllowanceApi* | [**travelExpenseAccommodationAllowancePost**](docs/Api/TravelExpenseaccommodationAllowanceApi.md#travelexpenseaccommodationallowancepost) | **POST** /travelExpense/accommodationAllowance | Create accommodation allowance.
*TravelExpenseaccommodationAllowanceApi* | [**travelExpenseAccommodationAllowancePut**](docs/Api/TravelExpenseaccommodationAllowanceApi.md#travelexpenseaccommodationallowanceput) | **PUT** /travelExpense/accommodationAllowance/{id} | Update accommodation allowance.
*TravelExpenseaccommodationAllowanceApi* | [**travelExpenseAccommodationAllowanceSearch**](docs/Api/TravelExpenseaccommodationAllowanceApi.md#travelexpenseaccommodationallowancesearch) | **GET** /travelExpense/accommodationAllowance | Find accommodation allowances corresponding with sent data.
*TravelExpensecostApi* | [**travelExpenseCostDelete**](docs/Api/TravelExpensecostApi.md#travelexpensecostdelete) | **DELETE** /travelExpense/cost/{id} | Delete cost.
*TravelExpensecostApi* | [**travelExpenseCostGet**](docs/Api/TravelExpensecostApi.md#travelexpensecostget) | **GET** /travelExpense/cost/{id} | Get cost by ID.
*TravelExpensecostApi* | [**travelExpenseCostPost**](docs/Api/TravelExpensecostApi.md#travelexpensecostpost) | **POST** /travelExpense/cost | Create cost.
*TravelExpensecostApi* | [**travelExpenseCostPut**](docs/Api/TravelExpensecostApi.md#travelexpensecostput) | **PUT** /travelExpense/cost/{id} | Update cost.
*TravelExpensecostApi* | [**travelExpenseCostSearch**](docs/Api/TravelExpensecostApi.md#travelexpensecostsearch) | **GET** /travelExpense/cost | Find costs corresponding with sent data.
*TravelExpensecostCategoryApi* | [**travelExpenseCostCategoryGet**](docs/Api/TravelExpensecostCategoryApi.md#travelexpensecostcategoryget) | **GET** /travelExpense/costCategory/{id} | Get cost category by ID.
*TravelExpensecostCategoryApi* | [**travelExpenseCostCategorySearch**](docs/Api/TravelExpensecostCategoryApi.md#travelexpensecostcategorysearch) | **GET** /travelExpense/costCategory | Find cost category corresponding with sent data.
*TravelExpensedrivingStopApi* | [**travelExpenseDrivingStopDelete**](docs/Api/TravelExpensedrivingStopApi.md#travelexpensedrivingstopdelete) | **DELETE** /travelExpense/drivingStop/{id} | Delete mileage allowance stops.
*TravelExpensedrivingStopApi* | [**travelExpenseDrivingStopGet**](docs/Api/TravelExpensedrivingStopApi.md#travelexpensedrivingstopget) | **GET** /travelExpense/drivingStop/{id} | Get driving stop by ID.
*TravelExpensedrivingStopApi* | [**travelExpenseDrivingStopPost**](docs/Api/TravelExpensedrivingStopApi.md#travelexpensedrivingstoppost) | **POST** /travelExpense/drivingStop | Create mileage allowance driving stop.
*TravelExpensemileageAllowanceApi* | [**travelExpenseMileageAllowanceDelete**](docs/Api/TravelExpensemileageAllowanceApi.md#travelexpensemileageallowancedelete) | **DELETE** /travelExpense/mileageAllowance/{id} | Delete mileage allowance.
*TravelExpensemileageAllowanceApi* | [**travelExpenseMileageAllowanceGet**](docs/Api/TravelExpensemileageAllowanceApi.md#travelexpensemileageallowanceget) | **GET** /travelExpense/mileageAllowance/{id} | Get mileage allowance by ID.
*TravelExpensemileageAllowanceApi* | [**travelExpenseMileageAllowancePost**](docs/Api/TravelExpensemileageAllowanceApi.md#travelexpensemileageallowancepost) | **POST** /travelExpense/mileageAllowance | Create mileage allowance.
*TravelExpensemileageAllowanceApi* | [**travelExpenseMileageAllowancePut**](docs/Api/TravelExpensemileageAllowanceApi.md#travelexpensemileageallowanceput) | **PUT** /travelExpense/mileageAllowance/{id} | Update mileage allowance.
*TravelExpensemileageAllowanceApi* | [**travelExpenseMileageAllowanceSearch**](docs/Api/TravelExpensemileageAllowanceApi.md#travelexpensemileageallowancesearch) | **GET** /travelExpense/mileageAllowance | Find mileage allowances corresponding with sent data.
*TravelExpensepassengerApi* | [**travelExpensePassengerDelete**](docs/Api/TravelExpensepassengerApi.md#travelexpensepassengerdelete) | **DELETE** /travelExpense/passenger/{id} | Delete passenger.
*TravelExpensepassengerApi* | [**travelExpensePassengerGet**](docs/Api/TravelExpensepassengerApi.md#travelexpensepassengerget) | **GET** /travelExpense/passenger/{id} | Get passenger by ID.
*TravelExpensepassengerApi* | [**travelExpensePassengerPost**](docs/Api/TravelExpensepassengerApi.md#travelexpensepassengerpost) | **POST** /travelExpense/passenger | Create passenger.
*TravelExpensepassengerApi* | [**travelExpensePassengerPut**](docs/Api/TravelExpensepassengerApi.md#travelexpensepassengerput) | **PUT** /travelExpense/passenger/{id} | Update passenger.
*TravelExpensepassengerApi* | [**travelExpensePassengerSearch**](docs/Api/TravelExpensepassengerApi.md#travelexpensepassengersearch) | **GET** /travelExpense/passenger | Find passengers corresponding with sent data.
*TravelExpensepaymentTypeApi* | [**travelExpensePaymentTypeGet**](docs/Api/TravelExpensepaymentTypeApi.md#travelexpensepaymenttypeget) | **GET** /travelExpense/paymentType/{id} | Get payment type by ID.
*TravelExpensepaymentTypeApi* | [**travelExpensePaymentTypeSearch**](docs/Api/TravelExpensepaymentTypeApi.md#travelexpensepaymenttypesearch) | **GET** /travelExpense/paymentType | Find payment type corresponding with sent data.
*TravelExpenseperDiemCompensationApi* | [**travelExpensePerDiemCompensationDelete**](docs/Api/TravelExpenseperDiemCompensationApi.md#travelexpenseperdiemcompensationdelete) | **DELETE** /travelExpense/perDiemCompensation/{id} | Delete per diem compensation.
*TravelExpenseperDiemCompensationApi* | [**travelExpensePerDiemCompensationGet**](docs/Api/TravelExpenseperDiemCompensationApi.md#travelexpenseperdiemcompensationget) | **GET** /travelExpense/perDiemCompensation/{id} | Get per diem compensation by ID.
*TravelExpenseperDiemCompensationApi* | [**travelExpensePerDiemCompensationPost**](docs/Api/TravelExpenseperDiemCompensationApi.md#travelexpenseperdiemcompensationpost) | **POST** /travelExpense/perDiemCompensation | Create per diem compensation.
*TravelExpenseperDiemCompensationApi* | [**travelExpensePerDiemCompensationPut**](docs/Api/TravelExpenseperDiemCompensationApi.md#travelexpenseperdiemcompensationput) | **PUT** /travelExpense/perDiemCompensation/{id} | Update per diem compensation.
*TravelExpenseperDiemCompensationApi* | [**travelExpensePerDiemCompensationSearch**](docs/Api/TravelExpenseperDiemCompensationApi.md#travelexpenseperdiemcompensationsearch) | **GET** /travelExpense/perDiemCompensation | Find per diem compensations corresponding with sent data.
*TravelExpenserateApi* | [**travelExpenseRateGet**](docs/Api/TravelExpenserateApi.md#travelexpenserateget) | **GET** /travelExpense/rate/{id} | Get travel expense rate by ID.
*TravelExpenserateApi* | [**travelExpenseRateSearch**](docs/Api/TravelExpenserateApi.md#travelexpenseratesearch) | **GET** /travelExpense/rate | Find rates corresponding with sent data.
*TravelExpenserateCategoryApi* | [**travelExpenseRateCategoryGet**](docs/Api/TravelExpenserateCategoryApi.md#travelexpenseratecategoryget) | **GET** /travelExpense/rateCategory/{id} | Get travel expense rate category by ID.
*TravelExpenserateCategoryApi* | [**travelExpenseRateCategorySearch**](docs/Api/TravelExpenserateCategoryApi.md#travelexpenseratecategorysearch) | **GET** /travelExpense/rateCategory | Find rate categories corresponding with sent data.
*TravelExpenserateCategoryGroupApi* | [**travelExpenseRateCategoryGroupGet**](docs/Api/TravelExpenserateCategoryGroupApi.md#travelexpenseratecategorygroupget) | **GET** /travelExpense/rateCategoryGroup/{id} | Get travel report rate category group by ID.
*TravelExpenserateCategoryGroupApi* | [**travelExpenseRateCategoryGroupSearch**](docs/Api/TravelExpenserateCategoryGroupApi.md#travelexpenseratecategorygroupsearch) | **GET** /travelExpense/rateCategoryGroup | Find rate categoriy groups corresponding with sent data.
*TravelExpensesettingsApi* | [**travelExpenseSettingsGet**](docs/Api/TravelExpensesettingsApi.md#travelexpensesettingsget) | **GET** /travelExpense/settings | Get travel expense settings of logged in company.
*TravelExpensezoneApi* | [**travelExpenseZoneGet**](docs/Api/TravelExpensezoneApi.md#travelexpensezoneget) | **GET** /travelExpense/zone/{id} | Get travel expense zone by ID.
*TravelExpensezoneApi* | [**travelExpenseZoneSearch**](docs/Api/TravelExpensezoneApi.md#travelexpensezonesearch) | **GET** /travelExpense/zone | Find travel expense zones corresponding with sent data.
*VatReturnscommentApi* | [**vatReturnsCommentAllAll**](docs/Api/VatReturnscommentApi.md#vatreturnscommentallall) | **GET** /vatReturns/comment/&gt;all | [BETA] - Get all structured comments available
*VatReturnscommentApi* | [**vatReturnsCommentQuery**](docs/Api/VatReturnscommentApi.md#vatreturnscommentquery) | **GET** /vatReturns/comment | [BETA] - Get all structured comments related to a given vatCode
*VoucherApprovalListElementApi* | [**voucherApprovalListElementGet**](docs/Api/VoucherApprovalListElementApi.md#voucherapprovallistelementget) | **GET** /voucherApprovalListElement/{id} | Get by ID.
*VoucherMessageApi* | [**voucherMessagePost**](docs/Api/VoucherMessageApi.md#vouchermessagepost) | **POST** /voucherMessage | [BETA] Post new voucherMessage.
*VoucherMessageApi* | [**voucherMessageSearch**](docs/Api/VoucherMessageApi.md#vouchermessagesearch) | **GET** /voucherMessage | [BETA] Find voucherMessage (or a comment) put on a voucher by inputting voucher ids
*VoucherStatusApi* | [**voucherStatusGet**](docs/Api/VoucherStatusApi.md#voucherstatusget) | **GET** /voucherStatus/{id} | Get voucherStatus by ID.
*VoucherStatusApi* | [**voucherStatusPost**](docs/Api/VoucherStatusApi.md#voucherstatuspost) | **POST** /voucherStatus | Post new voucherStatus.
*VoucherStatusApi* | [**voucherStatusSearch**](docs/Api/VoucherStatusApi.md#voucherstatussearch) | **GET** /voucherStatus | Find voucherStatus corresponding with sent data. The voucherStatus is used to coordinate integration processes. Requires setup done by Tripletex, currently supports debt collection.


## Documentation For Models

 - [AccommodationAllowance](docs/Model/AccommodationAllowance.md)
 - [AccommodationAndRestaurant](docs/Model/AccommodationAndRestaurant.md)
 - [Account](docs/Model/Account.md)
 - [AccountClosureFeedback](docs/Model/AccountClosureFeedback.md)
 - [AccountClosureInfoDTO](docs/Model/AccountClosureInfoDTO.md)
 - [AccountSpecification](docs/Model/AccountSpecification.md)
 - [AccountingPeriod](docs/Model/AccountingPeriod.md)
 - [Activity](docs/Model/Activity.md)
 - [AddSpecificationsCommand](docs/Model/AddSpecificationsCommand.md)
 - [AdditionalServiceOrderLineDTO](docs/Model/AdditionalServiceOrderLineDTO.md)
 - [Addon](docs/Model/Addon.md)
 - [AddonLogoDTO](docs/Model/AddonLogoDTO.md)
 - [Address](docs/Model/Address.md)
 - [AdvancedPaymentWidget](docs/Model/AdvancedPaymentWidget.md)
 - [AgroToTripletexDTO](docs/Model/AgroToTripletexDTO.md)
 - [AltinnCompanyModule](docs/Model/AltinnCompanyModule.md)
 - [AltinnInstance](docs/Model/AltinnInstance.md)
 - [AnnualAccount](docs/Model/AnnualAccount.md)
 - [ApiConsumer](docs/Model/ApiConsumer.md)
 - [ApiError](docs/Model/ApiError.md)
 - [ApiValidationMessage](docs/Model/ApiValidationMessage.md)
 - [ApproveResponseDTO](docs/Model/ApproveResponseDTO.md)
 - [Article](docs/Model/Article.md)
 - [Asset](docs/Model/Asset.md)
 - [AssetDetails](docs/Model/AssetDetails.md)
 - [AssetGroup](docs/Model/AssetGroup.md)
 - [AssetOverview](docs/Model/AssetOverview.md)
 - [AuthConfigDTO](docs/Model/AuthConfigDTO.md)
 - [AuthorizationManager](docs/Model/AuthorizationManager.md)
 - [AutoLogin](docs/Model/AutoLogin.md)
 - [AutoLoginPayloadDTO](docs/Model/AutoLoginPayloadDTO.md)
 - [AutoPayMessageDTO](docs/Model/AutoPayMessageDTO.md)
 - [AutomationRuleDetails](docs/Model/AutomationRuleDetails.md)
 - [AutomationSettingsDTO](docs/Model/AutomationSettingsDTO.md)
 - [AutopayBankAgreement](docs/Model/AutopayBankAgreement.md)
 - [BalanceGroup](docs/Model/BalanceGroup.md)
 - [BalanceSheet](docs/Model/BalanceSheet.md)
 - [BalanceSheetAccount](docs/Model/BalanceSheetAccount.md)
 - [BalanceSheetRow](docs/Model/BalanceSheetRow.md)
 - [BalanceSheetSettingsDTO](docs/Model/BalanceSheetSettingsDTO.md)
 - [Bank](docs/Model/Bank.md)
 - [BankAgreementCreationDTO](docs/Model/BankAgreementCreationDTO.md)
 - [BankAgreementDTO](docs/Model/BankAgreementDTO.md)
 - [BankBalanceEstimation](docs/Model/BankBalanceEstimation.md)
 - [BankOnboardingAccessRequestDTO](docs/Model/BankOnboardingAccessRequestDTO.md)
 - [BankOnboardingDTO](docs/Model/BankOnboardingDTO.md)
 - [BankOnboardingStepDTO](docs/Model/BankOnboardingStepDTO.md)
 - [BankReconciliation](docs/Model/BankReconciliation.md)
 - [BankReconciliationAdjustment](docs/Model/BankReconciliationAdjustment.md)
 - [BankReconciliationMatch](docs/Model/BankReconciliationMatch.md)
 - [BankReconciliationMatchesCounter](docs/Model/BankReconciliationMatchesCounter.md)
 - [BankReconciliationPaymentType](docs/Model/BankReconciliationPaymentType.md)
 - [BankReconciliationSettings](docs/Model/BankReconciliationSettings.md)
 - [BankSettings](docs/Model/BankSettings.md)
 - [BankStatement](docs/Model/BankStatement.md)
 - [BankStatementBalance](docs/Model/BankStatementBalance.md)
 - [BankTransaction](docs/Model/BankTransaction.md)
 - [BankTransactionAggregatesDTO](docs/Model/BankTransactionAggregatesDTO.md)
 - [BankTransactionPosting](docs/Model/BankTransactionPosting.md)
 - [Banner](docs/Model/Banner.md)
 - [BasicData](docs/Model/BasicData.md)
 - [BodyPart](docs/Model/BodyPart.md)
 - [CalloutDTO](docs/Model/CalloutDTO.md)
 - [CashRegisterSystem](docs/Model/CashRegisterSystem.md)
 - [CellBlueprintV1](docs/Model/CellBlueprintV1.md)
 - [Change](docs/Model/Change.md)
 - [ChangeOfEquity](docs/Model/ChangeOfEquity.md)
 - [Checklist](docs/Model/Checklist.md)
 - [ChecklistProperty](docs/Model/ChecklistProperty.md)
 - [Checkout](docs/Model/Checkout.md)
 - [Choice](docs/Model/Choice.md)
 - [Client](docs/Model/Client.md)
 - [ClientForApproval](docs/Model/ClientForApproval.md)
 - [ClientForRemit](docs/Model/ClientForRemit.md)
 - [ClientForReview](docs/Model/ClientForReview.md)
 - [ClientInbox](docs/Model/ClientInbox.md)
 - [CloseGroup](docs/Model/CloseGroup.md)
 - [ColorField](docs/Model/ColorField.md)
 - [Comment](docs/Model/Comment.md)
 - [CommentCreation](docs/Model/CommentCreation.md)
 - [CommentField](docs/Model/CommentField.md)
 - [CommentInput](docs/Model/CommentInput.md)
 - [CommentValue](docs/Model/CommentValue.md)
 - [CommercialVehicle](docs/Model/CommercialVehicle.md)
 - [Company](docs/Model/Company.md)
 - [CompanyAuthorityDTO](docs/Model/CompanyAuthorityDTO.md)
 - [CompanyAutoCompleteDTO](docs/Model/CompanyAutoCompleteDTO.md)
 - [CompanyBankAccountPresentation](docs/Model/CompanyBankAccountPresentation.md)
 - [CompanyChooserDTO](docs/Model/CompanyChooserDTO.md)
 - [CompanyDTO](docs/Model/CompanyDTO.md)
 - [CompanyHoliday](docs/Model/CompanyHoliday.md)
 - [CompanyHolidays](docs/Model/CompanyHolidays.md)
 - [CompanyRepresentativeDTO](docs/Model/CompanyRepresentativeDTO.md)
 - [CompanyStandardTime](docs/Model/CompanyStandardTime.md)
 - [CompanyTransactionAggregatesDTO](docs/Model/CompanyTransactionAggregatesDTO.md)
 - [ConsumerToken](docs/Model/ConsumerToken.md)
 - [Contact](docs/Model/Contact.md)
 - [ContentDisposition](docs/Model/ContentDisposition.md)
 - [Coordinate](docs/Model/Coordinate.md)
 - [Cost](docs/Model/Cost.md)
 - [Country](docs/Model/Country.md)
 - [Credentials](docs/Model/Credentials.md)
 - [Currency](docs/Model/Currency.md)
 - [CurrencyExchangeRate](docs/Model/CurrencyExchangeRate.md)
 - [Customer](docs/Model/Customer.md)
 - [CustomerCategory](docs/Model/CustomerCategory.md)
 - [CustomerReceivable](docs/Model/CustomerReceivable.md)
 - [CustomerTripletexAccount](docs/Model/CustomerTripletexAccount.md)
 - [CustomerTripletexAccount2](docs/Model/CustomerTripletexAccount2.md)
 - [CustomizedChecklistProperty](docs/Model/CustomizedChecklistProperty.md)
 - [DashboardDTO](docs/Model/DashboardDTO.md)
 - [Day](docs/Model/Day.md)
 - [Delete](docs/Model/Delete.md)
 - [DeliveryAddress](docs/Model/DeliveryAddress.md)
 - [Department](docs/Model/Department.md)
 - [DepreciationRate](docs/Model/DepreciationRate.md)
 - [Deviation](docs/Model/Deviation.md)
 - [DifferencesOverview](docs/Model/DifferencesOverview.md)
 - [DiscountGroup](docs/Model/DiscountGroup.md)
 - [DistributionKey](docs/Model/DistributionKey.md)
 - [DistributionKeyBit](docs/Model/DistributionKeyBit.md)
 - [DistributionKeyBlade](docs/Model/DistributionKeyBlade.md)
 - [Division](docs/Model/Division.md)
 - [Document](docs/Model/Document.md)
 - [DocumentArchive](docs/Model/DocumentArchive.md)
 - [DownloadedBrreg](docs/Model/DownloadedBrreg.md)
 - [DrivingStop](docs/Model/DrivingStop.md)
 - [ElectronicSupportDTO](docs/Model/ElectronicSupportDTO.md)
 - [Employee](docs/Model/Employee.md)
 - [EmployeeCategory](docs/Model/EmployeeCategory.md)
 - [EmployeeCompanyDTO](docs/Model/EmployeeCompanyDTO.md)
 - [EmployeeEmail](docs/Model/EmployeeEmail.md)
 - [EmployeeLoginInfo](docs/Model/EmployeeLoginInfo.md)
 - [EmployeePreferences](docs/Model/EmployeePreferences.md)
 - [EmployeeRoleDTO](docs/Model/EmployeeRoleDTO.md)
 - [EmployeeToken](docs/Model/EmployeeToken.md)
 - [EmployeeTokenBundle](docs/Model/EmployeeTokenBundle.md)
 - [Employment](docs/Model/Employment.md)
 - [EmploymentDetails](docs/Model/EmploymentDetails.md)
 - [EmploymentType](docs/Model/EmploymentType.md)
 - [EnhetsregisteretDTO](docs/Model/EnhetsregisteretDTO.md)
 - [EnterpriseDTO](docs/Model/EnterpriseDTO.md)
 - [Entitlement](docs/Model/Entitlement.md)
 - [EnumType](docs/Model/EnumType.md)
 - [EventInfoDTO](docs/Model/EventInfoDTO.md)
 - [EventInfoDescription](docs/Model/EventInfoDescription.md)
 - [ExternalProduct](docs/Model/ExternalProduct.md)
 - [Favorite](docs/Model/Favorite.md)
 - [FavoriteMenu](docs/Model/FavoriteMenu.md)
 - [FileIdForIncomingPaymentsDTO](docs/Model/FileIdForIncomingPaymentsDTO.md)
 - [FlexSummary](docs/Model/FlexSummary.md)
 - [FormDataBodyPart](docs/Model/FormDataBodyPart.md)
 - [FormDataContentDisposition](docs/Model/FormDataContentDisposition.md)
 - [FormDataMultiPart](docs/Model/FormDataMultiPart.md)
 - [FundingPartnerApplication](docs/Model/FundingPartnerApplication.md)
 - [FundingPartnerQualify](docs/Model/FundingPartnerQualify.md)
 - [GenericData](docs/Model/GenericData.md)
 - [GenericDataOverview](docs/Model/GenericDataOverview.md)
 - [GenericDataRate](docs/Model/GenericDataRate.md)
 - [GoodsReceipt](docs/Model/GoodsReceipt.md)
 - [GoodsReceiptLine](docs/Model/GoodsReceiptLine.md)
 - [GroupContributions](docs/Model/GroupContributions.md)
 - [HeaderBlueprintV1](docs/Model/HeaderBlueprintV1.md)
 - [HelpCenterArticles](docs/Model/HelpCenterArticles.md)
 - [HistoricalPosting](docs/Model/HistoricalPosting.md)
 - [HistoricalVoucher](docs/Model/HistoricalVoucher.md)
 - [HolidayAllowanceEarned](docs/Model/HolidayAllowanceEarned.md)
 - [HourSummary](docs/Model/HourSummary.md)
 - [HourlyCostAndRate](docs/Model/HourlyCostAndRate.md)
 - [HourlyRate](docs/Model/HourlyRate.md)
 - [Hours](docs/Model/Hours.md)
 - [IdPortenLogin](docs/Model/IdPortenLogin.md)
 - [IdPortenLoginRequest](docs/Model/IdPortenLoginRequest.md)
 - [IdPortenLoginStatus](docs/Model/IdPortenLoginStatus.md)
 - [ImageField](docs/Model/ImageField.md)
 - [ImageValue](docs/Model/ImageValue.md)
 - [InboxData](docs/Model/InboxData.md)
 - [InboxSummaryDTO](docs/Model/InboxSummaryDTO.md)
 - [IncomeStatement](docs/Model/IncomeStatement.md)
 - [IncomingInvoicePaymentHistory](docs/Model/IncomingInvoicePaymentHistory.md)
 - [IncomingInvoicePaymentHistoryTransaction](docs/Model/IncomingInvoicePaymentHistoryTransaction.md)
 - [IntegrationData](docs/Model/IntegrationData.md)
 - [InternationalId](docs/Model/InternationalId.md)
 - [Inventories](docs/Model/Inventories.md)
 - [InventoriesDetails](docs/Model/InventoriesDetails.md)
 - [InventoriesOverview](docs/Model/InventoriesOverview.md)
 - [Inventory](docs/Model/Inventory.md)
 - [InventoryLocation](docs/Model/InventoryLocation.md)
 - [Invoice](docs/Model/Invoice.md)
 - [InvoiceAndOrderSummaryDTO](docs/Model/InvoiceAndOrderSummaryDTO.md)
 - [InvoiceAndOrdersData](docs/Model/InvoiceAndOrdersData.md)
 - [InvoiceField](docs/Model/InvoiceField.md)
 - [InvoiceOrderLineDTO](docs/Model/InvoiceOrderLineDTO.md)
 - [InvoiceSendTypeDTO](docs/Model/InvoiceSendTypeDTO.md)
 - [InvoiceSettings](docs/Model/InvoiceSettings.md)
 - [InvoiceSummaryDTO](docs/Model/InvoiceSummaryDTO.md)
 - [InvoiceTemplateRenderer](docs/Model/InvoiceTemplateRenderer.md)
 - [Job](docs/Model/Job.md)
 - [JobDetailDTO](docs/Model/JobDetailDTO.md)
 - [LeaveOfAbsence](docs/Model/LeaveOfAbsence.md)
 - [LeaveOfAbsenceType](docs/Model/LeaveOfAbsenceType.md)
 - [LedgerAccount](docs/Model/LedgerAccount.md)
 - [LegacyAddress](docs/Model/LegacyAddress.md)
 - [LegacyProfileDTO](docs/Model/LegacyProfileDTO.md)
 - [Link](docs/Model/Link.md)
 - [LinkMobilityReportDTO](docs/Model/LinkMobilityReportDTO.md)
 - [ListResponse](docs/Model/ListResponse.md)
 - [ListResponseAccommodationAllowance](docs/Model/ListResponseAccommodationAllowance.md)
 - [ListResponseAccount](docs/Model/ListResponseAccount.md)
 - [ListResponseAccountingPeriod](docs/Model/ListResponseAccountingPeriod.md)
 - [ListResponseActivity](docs/Model/ListResponseActivity.md)
 - [ListResponseAddon](docs/Model/ListResponseAddon.md)
 - [ListResponseAnnualAccount](docs/Model/ListResponseAnnualAccount.md)
 - [ListResponseApiConsumer](docs/Model/ListResponseApiConsumer.md)
 - [ListResponseAsset](docs/Model/ListResponseAsset.md)
 - [ListResponseAutopayBankAgreement](docs/Model/ListResponseAutopayBankAgreement.md)
 - [ListResponseBalanceSheetAccount](docs/Model/ListResponseBalanceSheetAccount.md)
 - [ListResponseBank](docs/Model/ListResponseBank.md)
 - [ListResponseBankAgreementDTO](docs/Model/ListResponseBankAgreementDTO.md)
 - [ListResponseBankBalanceEstimation](docs/Model/ListResponseBankBalanceEstimation.md)
 - [ListResponseBankReconciliation](docs/Model/ListResponseBankReconciliation.md)
 - [ListResponseBankReconciliationAdjustment](docs/Model/ListResponseBankReconciliationAdjustment.md)
 - [ListResponseBankReconciliationMatch](docs/Model/ListResponseBankReconciliationMatch.md)
 - [ListResponseBankReconciliationPaymentType](docs/Model/ListResponseBankReconciliationPaymentType.md)
 - [ListResponseBankStatement](docs/Model/ListResponseBankStatement.md)
 - [ListResponseBankTransaction](docs/Model/ListResponseBankTransaction.md)
 - [ListResponseBanner](docs/Model/ListResponseBanner.md)
 - [ListResponseCalloutDTO](docs/Model/ListResponseCalloutDTO.md)
 - [ListResponseChecklist](docs/Model/ListResponseChecklist.md)
 - [ListResponseChecklistProperty](docs/Model/ListResponseChecklistProperty.md)
 - [ListResponseClient](docs/Model/ListResponseClient.md)
 - [ListResponseCloseGroup](docs/Model/ListResponseCloseGroup.md)
 - [ListResponseComment](docs/Model/ListResponseComment.md)
 - [ListResponseCompany](docs/Model/ListResponseCompany.md)
 - [ListResponseCompanyAutoCompleteDTO](docs/Model/ListResponseCompanyAutoCompleteDTO.md)
 - [ListResponseCompanyHoliday](docs/Model/ListResponseCompanyHoliday.md)
 - [ListResponseCompanyHolidays](docs/Model/ListResponseCompanyHolidays.md)
 - [ListResponseCompanyStandardTime](docs/Model/ListResponseCompanyStandardTime.md)
 - [ListResponseContact](docs/Model/ListResponseContact.md)
 - [ListResponseCost](docs/Model/ListResponseCost.md)
 - [ListResponseCountry](docs/Model/ListResponseCountry.md)
 - [ListResponseCurrency](docs/Model/ListResponseCurrency.md)
 - [ListResponseCustomer](docs/Model/ListResponseCustomer.md)
 - [ListResponseCustomerCategory](docs/Model/ListResponseCustomerCategory.md)
 - [ListResponseCustomizedChecklistProperty](docs/Model/ListResponseCustomizedChecklistProperty.md)
 - [ListResponseDeliveryAddress](docs/Model/ListResponseDeliveryAddress.md)
 - [ListResponseDepartment](docs/Model/ListResponseDepartment.md)
 - [ListResponseDepreciationRate](docs/Model/ListResponseDepreciationRate.md)
 - [ListResponseDeviation](docs/Model/ListResponseDeviation.md)
 - [ListResponseDiscountGroup](docs/Model/ListResponseDiscountGroup.md)
 - [ListResponseDistributionKey](docs/Model/ListResponseDistributionKey.md)
 - [ListResponseDivision](docs/Model/ListResponseDivision.md)
 - [ListResponseDocument](docs/Model/ListResponseDocument.md)
 - [ListResponseDocumentArchive](docs/Model/ListResponseDocumentArchive.md)
 - [ListResponseEmployee](docs/Model/ListResponseEmployee.md)
 - [ListResponseEmployeeCategory](docs/Model/ListResponseEmployeeCategory.md)
 - [ListResponseEmployeeCompanyDTO](docs/Model/ListResponseEmployeeCompanyDTO.md)
 - [ListResponseEmployment](docs/Model/ListResponseEmployment.md)
 - [ListResponseEmploymentDetails](docs/Model/ListResponseEmploymentDetails.md)
 - [ListResponseEmploymentType](docs/Model/ListResponseEmploymentType.md)
 - [ListResponseEnhetsregisteretDTO](docs/Model/ListResponseEnhetsregisteretDTO.md)
 - [ListResponseEntitlement](docs/Model/ListResponseEntitlement.md)
 - [ListResponseEnumType](docs/Model/ListResponseEnumType.md)
 - [ListResponseExternalProduct](docs/Model/ListResponseExternalProduct.md)
 - [ListResponseGenericDataRate](docs/Model/ListResponseGenericDataRate.md)
 - [ListResponseGoodsReceipt](docs/Model/ListResponseGoodsReceipt.md)
 - [ListResponseGoodsReceiptLine](docs/Model/ListResponseGoodsReceiptLine.md)
 - [ListResponseHistoricalVoucher](docs/Model/ListResponseHistoricalVoucher.md)
 - [ListResponseHourlyCostAndRate](docs/Model/ListResponseHourlyCostAndRate.md)
 - [ListResponseInventories](docs/Model/ListResponseInventories.md)
 - [ListResponseInventory](docs/Model/ListResponseInventory.md)
 - [ListResponseInventoryLocation](docs/Model/ListResponseInventoryLocation.md)
 - [ListResponseInvoice](docs/Model/ListResponseInvoice.md)
 - [ListResponseInvoiceSendTypeDTO](docs/Model/ListResponseInvoiceSendTypeDTO.md)
 - [ListResponseLeaveOfAbsence](docs/Model/ListResponseLeaveOfAbsence.md)
 - [ListResponseLeaveOfAbsenceType](docs/Model/ListResponseLeaveOfAbsenceType.md)
 - [ListResponseLedgerAccount](docs/Model/ListResponseLedgerAccount.md)
 - [ListResponseLegacyAddress](docs/Model/ListResponseLegacyAddress.md)
 - [ListResponseMapping](docs/Model/ListResponseMapping.md)
 - [ListResponseMileageAllowance](docs/Model/ListResponseMileageAllowance.md)
 - [ListResponseMonthlyStatus](docs/Model/ListResponseMonthlyStatus.md)
 - [ListResponseMunicipality](docs/Model/ListResponseMunicipality.md)
 - [ListResponseNews](docs/Model/ListResponseNews.md)
 - [ListResponseNextOfKin](docs/Model/ListResponseNextOfKin.md)
 - [ListResponseNotification](docs/Model/ListResponseNotification.md)
 - [ListResponseOccupationCode](docs/Model/ListResponseOccupationCode.md)
 - [ListResponseOrder](docs/Model/ListResponseOrder.md)
 - [ListResponseOrderGroup](docs/Model/ListResponseOrderGroup.md)
 - [ListResponseOrderLine](docs/Model/ListResponseOrderLine.md)
 - [ListResponseOrderOffer](docs/Model/ListResponseOrderOffer.md)
 - [ListResponsePassenger](docs/Model/ListResponsePassenger.md)
 - [ListResponsePaymentDTO](docs/Model/ListResponsePaymentDTO.md)
 - [ListResponsePaymentType](docs/Model/ListResponsePaymentType.md)
 - [ListResponsePaymentTypeOut](docs/Model/ListResponsePaymentTypeOut.md)
 - [ListResponsePayslip](docs/Model/ListResponsePayslip.md)
 - [ListResponsePayslipInternal](docs/Model/ListResponsePayslipInternal.md)
 - [ListResponsePensionScheme](docs/Model/ListResponsePensionScheme.md)
 - [ListResponsePerDiemCompensation](docs/Model/ListResponsePerDiemCompensation.md)
 - [ListResponsePerDiemCompensationTransientDTO](docs/Model/ListResponsePerDiemCompensationTransientDTO.md)
 - [ListResponsePersonAutoCompleteDTO](docs/Model/ListResponsePersonAutoCompleteDTO.md)
 - [ListResponsePersonalIncomeOverview](docs/Model/ListResponsePersonalIncomeOverview.md)
 - [ListResponsePhonePrefixCountryInternal](docs/Model/ListResponsePhonePrefixCountryInternal.md)
 - [ListResponsePickupPoint](docs/Model/ListResponsePickupPoint.md)
 - [ListResponsePosting](docs/Model/ListResponsePosting.md)
 - [ListResponseProduct](docs/Model/ListResponseProduct.md)
 - [ListResponseProductGroup](docs/Model/ListResponseProductGroup.md)
 - [ListResponseProductGroupRelation](docs/Model/ListResponseProductGroupRelation.md)
 - [ListResponseProductImportHeader](docs/Model/ListResponseProductImportHeader.md)
 - [ListResponseProductImportHeaderFieldsRelation](docs/Model/ListResponseProductImportHeaderFieldsRelation.md)
 - [ListResponseProductInventoryLocation](docs/Model/ListResponseProductInventoryLocation.md)
 - [ListResponseProductLine](docs/Model/ListResponseProductLine.md)
 - [ListResponseProductPrice](docs/Model/ListResponseProductPrice.md)
 - [ListResponseProductUnit](docs/Model/ListResponseProductUnit.md)
 - [ListResponseProductUnitMaster](docs/Model/ListResponseProductUnitMaster.md)
 - [ListResponseProject](docs/Model/ListResponseProject.md)
 - [ListResponseProjectCategory](docs/Model/ListResponseProjectCategory.md)
 - [ListResponseProjectControlForm](docs/Model/ListResponseProjectControlForm.md)
 - [ListResponseProjectControlFormType](docs/Model/ListResponseProjectControlFormType.md)
 - [ListResponseProjectHourlyRate](docs/Model/ListResponseProjectHourlyRate.md)
 - [ListResponseProjectInvoiceDetails](docs/Model/ListResponseProjectInvoiceDetails.md)
 - [ListResponseProjectOrderLine](docs/Model/ListResponseProjectOrderLine.md)
 - [ListResponseProjectOverviewAggregate](docs/Model/ListResponseProjectOverviewAggregate.md)
 - [ListResponseProjectParticipant](docs/Model/ListResponseProjectParticipant.md)
 - [ListResponseProjectPeriodMonthlyStatus](docs/Model/ListResponseProjectPeriodMonthlyStatus.md)
 - [ListResponseProjectSpecificRate](docs/Model/ListResponseProjectSpecificRate.md)
 - [ListResponseProspect](docs/Model/ListResponseProspect.md)
 - [ListResponsePurchaseOrder](docs/Model/ListResponsePurchaseOrder.md)
 - [ListResponsePurchaseOrderAddress](docs/Model/ListResponsePurchaseOrderAddress.md)
 - [ListResponsePurchaseOrderIncomingInvoiceRelation](docs/Model/ListResponsePurchaseOrderIncomingInvoiceRelation.md)
 - [ListResponsePurchaseOrderline](docs/Model/ListResponsePurchaseOrderline.md)
 - [ListResponseRP2EmployeeAvailableTime](docs/Model/ListResponseRP2EmployeeAvailableTime.md)
 - [ListResponseRP2EmployeeBookedTime](docs/Model/ListResponseRP2EmployeeBookedTime.md)
 - [ListResponseRP2EmployeeJob](docs/Model/ListResponseRP2EmployeeJob.md)
 - [ListResponseRP2ProjectBookedTime](docs/Model/ListResponseRP2ProjectBookedTime.md)
 - [ListResponseRP2ProjectJobs](docs/Model/ListResponseRP2ProjectJobs.md)
 - [ListResponseRP2TotalTime](docs/Model/ListResponseRP2TotalTime.md)
 - [ListResponseRPJob](docs/Model/ListResponseRPJob.md)
 - [ListResponseReelDomainDTO](docs/Model/ListResponseReelDomainDTO.md)
 - [ListResponseReelFunctionDTO](docs/Model/ListResponseReelFunctionDTO.md)
 - [ListResponseReminder](docs/Model/ListResponseReminder.md)
 - [ListResponseRemunerationType](docs/Model/ListResponseRemunerationType.md)
 - [ListResponseReport](docs/Model/ListResponseReport.md)
 - [ListResponseReportAccess](docs/Model/ListResponseReportAccess.md)
 - [ListResponseReportAuthorization](docs/Model/ListResponseReportAuthorization.md)
 - [ListResponseReportClientAccess](docs/Model/ListResponseReportClientAccess.md)
 - [ListResponseReportingCompanyInternal](docs/Model/ListResponseReportingCompanyInternal.md)
 - [ListResponseResultBudget](docs/Model/ListResponseResultBudget.md)
 - [ListResponseRiskFreeInterestRate](docs/Model/ListResponseRiskFreeInterestRate.md)
 - [ListResponseSalarySpecification](docs/Model/ListResponseSalarySpecification.md)
 - [ListResponseSalarySpecificationInternal](docs/Model/ListResponseSalarySpecificationInternal.md)
 - [ListResponseSalaryTransaction](docs/Model/ListResponseSalaryTransaction.md)
 - [ListResponseSalaryTransactionInternal](docs/Model/ListResponseSalaryTransactionInternal.md)
 - [ListResponseSalaryType](docs/Model/ListResponseSalaryType.md)
 - [ListResponseSalaryTypeInternal](docs/Model/ListResponseSalaryTypeInternal.md)
 - [ListResponseSalesForceAccountInfo](docs/Model/ListResponseSalesForceAccountInfo.md)
 - [ListResponseSalesForceEmployee](docs/Model/ListResponseSalesForceEmployee.md)
 - [ListResponseSalesModuleDTO](docs/Model/ListResponseSalesModuleDTO.md)
 - [ListResponseSearchCompletionDTO](docs/Model/ListResponseSearchCompletionDTO.md)
 - [ListResponseSignatureCombinationDTO](docs/Model/ListResponseSignatureCombinationDTO.md)
 - [ListResponseStandardTime](docs/Model/ListResponseStandardTime.md)
 - [ListResponseStocktaking](docs/Model/ListResponseStocktaking.md)
 - [ListResponseSubscription](docs/Model/ListResponseSubscription.md)
 - [ListResponseSupplier](docs/Model/ListResponseSupplier.md)
 - [ListResponseSupplierAutomation](docs/Model/ListResponseSupplierAutomation.md)
 - [ListResponseSupplierBalance](docs/Model/ListResponseSupplierBalance.md)
 - [ListResponseSupplierInvoice](docs/Model/ListResponseSupplierInvoice.md)
 - [ListResponseSupplierProduct](docs/Model/ListResponseSupplierProduct.md)
 - [ListResponseSystemReportCategoryDTO](docs/Model/ListResponseSystemReportCategoryDTO.md)
 - [ListResponseTask](docs/Model/ListResponseTask.md)
 - [ListResponseTaxcardContactInternal](docs/Model/ListResponseTaxcardContactInternal.md)
 - [ListResponseTaxcardEmployeeInternal](docs/Model/ListResponseTaxcardEmployeeInternal.md)
 - [ListResponseTemplate](docs/Model/ListResponseTemplate.md)
 - [ListResponseTimeClock](docs/Model/ListResponseTimeClock.md)
 - [ListResponseTimesheetAllocated](docs/Model/ListResponseTimesheetAllocated.md)
 - [ListResponseTimesheetEntry](docs/Model/ListResponseTimesheetEntry.md)
 - [ListResponseTimesheetProjectSalaryTypeSpecification](docs/Model/ListResponseTimesheetProjectSalaryTypeSpecification.md)
 - [ListResponseTimesheetSalaryTypeSpecification](docs/Model/ListResponseTimesheetSalaryTypeSpecification.md)
 - [ListResponseTransportType](docs/Model/ListResponseTransportType.md)
 - [ListResponseTravelCostCategory](docs/Model/ListResponseTravelCostCategory.md)
 - [ListResponseTravelExpense](docs/Model/ListResponseTravelExpense.md)
 - [ListResponseTravelExpenseRate](docs/Model/ListResponseTravelExpenseRate.md)
 - [ListResponseTravelExpenseRateCategory](docs/Model/ListResponseTravelExpenseRateCategory.md)
 - [ListResponseTravelExpenseRateCategoryGroup](docs/Model/ListResponseTravelExpenseRateCategoryGroup.md)
 - [ListResponseTravelExpenseZone](docs/Model/ListResponseTravelExpenseZone.md)
 - [ListResponseTravelPaymentType](docs/Model/ListResponseTravelPaymentType.md)
 - [ListResponseTripletexCompanyModules](docs/Model/ListResponseTripletexCompanyModules.md)
 - [ListResponseUpsaleMetric](docs/Model/ListResponseUpsaleMetric.md)
 - [ListResponseUserTemplate](docs/Model/ListResponseUserTemplate.md)
 - [ListResponseVFFactoringInvoiceOffer](docs/Model/ListResponseVFFactoringInvoiceOffer.md)
 - [ListResponseVatReturnsComment](docs/Model/ListResponseVatReturnsComment.md)
 - [ListResponseVatReturnsVatCodeComment](docs/Model/ListResponseVatReturnsVatCodeComment.md)
 - [ListResponseVatTermPeriod](docs/Model/ListResponseVatTermPeriod.md)
 - [ListResponseVatType](docs/Model/ListResponseVatType.md)
 - [ListResponseVoucher](docs/Model/ListResponseVoucher.md)
 - [ListResponseVoucherInboxItem](docs/Model/ListResponseVoucherInboxItem.md)
 - [ListResponseVoucherInternal](docs/Model/ListResponseVoucherInternal.md)
 - [ListResponseVoucherMessage](docs/Model/ListResponseVoucherMessage.md)
 - [ListResponseVoucherStatus](docs/Model/ListResponseVoucherStatus.md)
 - [ListResponseVoucherType](docs/Model/ListResponseVoucherType.md)
 - [ListResponseWeek](docs/Model/ListResponseWeek.md)
 - [ListResponseWorkingHoursScheme](docs/Model/ListResponseWorkingHoursScheme.md)
 - [ListResponseZendeskSearchResultDTO](docs/Model/ListResponseZendeskSearchResultDTO.md)
 - [ListResponseZtlAccount](docs/Model/ListResponseZtlAccount.md)
 - [ListResponseZtlConsent](docs/Model/ListResponseZtlConsent.md)
 - [ListResponseZtlOnboarding](docs/Model/ListResponseZtlOnboarding.md)
 - [LoggedInUserInfoDTO](docs/Model/LoggedInUserInfoDTO.md)
 - [LogisticsSettings](docs/Model/LogisticsSettings.md)
 - [Mapping](docs/Model/Mapping.md)
 - [MaritimeEmployment](docs/Model/MaritimeEmployment.md)
 - [MaventaEventDataDTO](docs/Model/MaventaEventDataDTO.md)
 - [MaventaStatusDTO](docs/Model/MaventaStatusDTO.md)
 - [MediaType](docs/Model/MediaType.md)
 - [Menu](docs/Model/Menu.md)
 - [MenuItem](docs/Model/MenuItem.md)
 - [MessageBodyWorkers](docs/Model/MessageBodyWorkers.md)
 - [MileageAllowance](docs/Model/MileageAllowance.md)
 - [MobileAppLogin](docs/Model/MobileAppLogin.md)
 - [MobileAppSpecificRightsInfo](docs/Model/MobileAppSpecificRightsInfo.md)
 - [Modules](docs/Model/Modules.md)
 - [MonthlyStatus](docs/Model/MonthlyStatus.md)
 - [MultiPart](docs/Model/MultiPart.md)
 - [Municipality](docs/Model/Municipality.md)
 - [MySubscriptionAccountInfoDTO](docs/Model/MySubscriptionAccountInfoDTO.md)
 - [MySubscriptionModuleDTO](docs/Model/MySubscriptionModuleDTO.md)
 - [News](docs/Model/News.md)
 - [NextOfKin](docs/Model/NextOfKin.md)
 - [Notification](docs/Model/Notification.md)
 - [OccupationCode](docs/Model/OccupationCode.md)
 - [OnboardAccountDTO](docs/Model/OnboardAccountDTO.md)
 - [OpeningBalance](docs/Model/OpeningBalance.md)
 - [OpeningBalanceBalancePosting](docs/Model/OpeningBalanceBalancePosting.md)
 - [OpeningBalanceCustomerPosting](docs/Model/OpeningBalanceCustomerPosting.md)
 - [OpeningBalanceEmployeePosting](docs/Model/OpeningBalanceEmployeePosting.md)
 - [OpeningBalanceSupplierPosting](docs/Model/OpeningBalanceSupplierPosting.md)
 - [Order](docs/Model/Order.md)
 - [OrderGroup](docs/Model/OrderGroup.md)
 - [OrderLine](docs/Model/OrderLine.md)
 - [OrderLinePostingDTO](docs/Model/OrderLinePostingDTO.md)
 - [OrderOffer](docs/Model/OrderOffer.md)
 - [PG2CallbackDTO](docs/Model/PG2CallbackDTO.md)
 - [PageOptions](docs/Model/PageOptions.md)
 - [ParameterizedHeader](docs/Model/ParameterizedHeader.md)
 - [Passenger](docs/Model/Passenger.md)
 - [PaymentDTO](docs/Model/PaymentDTO.md)
 - [PaymentType](docs/Model/PaymentType.md)
 - [PaymentTypeOut](docs/Model/PaymentTypeOut.md)
 - [PaymentWidgetPaymentType](docs/Model/PaymentWidgetPaymentType.md)
 - [Payslip](docs/Model/Payslip.md)
 - [PayslipHelperInternal](docs/Model/PayslipHelperInternal.md)
 - [PayslipInternal](docs/Model/PayslipInternal.md)
 - [PensionScheme](docs/Model/PensionScheme.md)
 - [PerDiemCompensation](docs/Model/PerDiemCompensation.md)
 - [PerDiemCompensationTransientDTO](docs/Model/PerDiemCompensationTransientDTO.md)
 - [PermanentDifferences](docs/Model/PermanentDifferences.md)
 - [PersonAutoCompleteDTO](docs/Model/PersonAutoCompleteDTO.md)
 - [PersonalIncome](docs/Model/PersonalIncome.md)
 - [PersonalIncomeOverview](docs/Model/PersonalIncomeOverview.md)
 - [PhonePrefixCountryInternal](docs/Model/PhonePrefixCountryInternal.md)
 - [PickupPoint](docs/Model/PickupPoint.md)
 - [Posting](docs/Model/Posting.md)
 - [Prediction](docs/Model/Prediction.md)
 - [Price](docs/Model/Price.md)
 - [Product](docs/Model/Product.md)
 - [ProductGroup](docs/Model/ProductGroup.md)
 - [ProductGroupRelation](docs/Model/ProductGroupRelation.md)
 - [ProductImport](docs/Model/ProductImport.md)
 - [ProductImportFieldDTO](docs/Model/ProductImportFieldDTO.md)
 - [ProductImportHeader](docs/Model/ProductImportHeader.md)
 - [ProductImportHeaderFieldsRelation](docs/Model/ProductImportHeaderFieldsRelation.md)
 - [ProductInventoryLocation](docs/Model/ProductInventoryLocation.md)
 - [ProductLine](docs/Model/ProductLine.md)
 - [ProductPrice](docs/Model/ProductPrice.md)
 - [ProductSettings](docs/Model/ProductSettings.md)
 - [ProductUnit](docs/Model/ProductUnit.md)
 - [ProductUnitMaster](docs/Model/ProductUnitMaster.md)
 - [ProfileDTO](docs/Model/ProfileDTO.md)
 - [ProfileLoginCompany](docs/Model/ProfileLoginCompany.md)
 - [ProfitAndLoss](docs/Model/ProfitAndLoss.md)
 - [Project](docs/Model/Project.md)
 - [ProjectAccess](docs/Model/ProjectAccess.md)
 - [ProjectActivity](docs/Model/ProjectActivity.md)
 - [ProjectBudgetStatus](docs/Model/ProjectBudgetStatus.md)
 - [ProjectCategory](docs/Model/ProjectCategory.md)
 - [ProjectControlForm](docs/Model/ProjectControlForm.md)
 - [ProjectControlFormType](docs/Model/ProjectControlFormType.md)
 - [ProjectHourlyRate](docs/Model/ProjectHourlyRate.md)
 - [ProjectHourlyRateTemplate](docs/Model/ProjectHourlyRateTemplate.md)
 - [ProjectInvoiceDetails](docs/Model/ProjectInvoiceDetails.md)
 - [ProjectOnboardingSummaryDTO](docs/Model/ProjectOnboardingSummaryDTO.md)
 - [ProjectOrderLine](docs/Model/ProjectOrderLine.md)
 - [ProjectOverviewAggregate](docs/Model/ProjectOverviewAggregate.md)
 - [ProjectParticipant](docs/Model/ProjectParticipant.md)
 - [ProjectPeriodHourlyReport](docs/Model/ProjectPeriodHourlyReport.md)
 - [ProjectPeriodInvoiced](docs/Model/ProjectPeriodInvoiced.md)
 - [ProjectPeriodInvoicingReserve](docs/Model/ProjectPeriodInvoicingReserve.md)
 - [ProjectPeriodMonthlyStatus](docs/Model/ProjectPeriodMonthlyStatus.md)
 - [ProjectPeriodOverallStatus](docs/Model/ProjectPeriodOverallStatus.md)
 - [ProjectSettings](docs/Model/ProjectSettings.md)
 - [ProjectSpecificRate](docs/Model/ProjectSpecificRate.md)
 - [ProjectSpecificRateTemplate](docs/Model/ProjectSpecificRateTemplate.md)
 - [ProjectTemplate](docs/Model/ProjectTemplate.md)
 - [Prospect](docs/Model/Prospect.md)
 - [Providers](docs/Model/Providers.md)
 - [PurchaseOrder](docs/Model/PurchaseOrder.md)
 - [PurchaseOrderAddress](docs/Model/PurchaseOrderAddress.md)
 - [PurchaseOrderIncomingInvoiceRelation](docs/Model/PurchaseOrderIncomingInvoiceRelation.md)
 - [PurchaseOrderline](docs/Model/PurchaseOrderline.md)
 - [RP2EmployeeAvailableTime](docs/Model/RP2EmployeeAvailableTime.md)
 - [RP2EmployeeBookedTime](docs/Model/RP2EmployeeBookedTime.md)
 - [RP2EmployeeJob](docs/Model/RP2EmployeeJob.md)
 - [RP2Job](docs/Model/RP2Job.md)
 - [RP2ProjectBookedTime](docs/Model/RP2ProjectBookedTime.md)
 - [RP2ProjectJobs](docs/Model/RP2ProjectJobs.md)
 - [RP2TotalTime](docs/Model/RP2TotalTime.md)
 - [RPJob](docs/Model/RPJob.md)
 - [RPViewDTO](docs/Model/RPViewDTO.md)
 - [ReconciliationOfEquityOverview](docs/Model/ReconciliationOfEquityOverview.md)
 - [ReelDocumentationDTO](docs/Model/ReelDocumentationDTO.md)
 - [ReelDomainDTO](docs/Model/ReelDomainDTO.md)
 - [ReelFunctionDTO](docs/Model/ReelFunctionDTO.md)
 - [RegulatoryReportingCode](docs/Model/RegulatoryReportingCode.md)
 - [Reminder](docs/Model/Reminder.md)
 - [ReminderDTO](docs/Model/ReminderDTO.md)
 - [ReminderWidget](docs/Model/ReminderWidget.md)
 - [ReminderWidgetData](docs/Model/ReminderWidgetData.md)
 - [RemunerationType](docs/Model/RemunerationType.md)
 - [Report](docs/Model/Report.md)
 - [ReportAccess](docs/Model/ReportAccess.md)
 - [ReportAuthorization](docs/Model/ReportAuthorization.md)
 - [ReportBlueprintV1](docs/Model/ReportBlueprintV1.md)
 - [ReportClientAccess](docs/Model/ReportClientAccess.md)
 - [ReportFilterAccount](docs/Model/ReportFilterAccount.md)
 - [ReportFilterActivity](docs/Model/ReportFilterActivity.md)
 - [ReportFilterCustomer](docs/Model/ReportFilterCustomer.md)
 - [ReportFilterDepartment](docs/Model/ReportFilterDepartment.md)
 - [ReportFilterEmployee](docs/Model/ReportFilterEmployee.md)
 - [ReportFilterGeneral](docs/Model/ReportFilterGeneral.md)
 - [ReportFilterPeriod](docs/Model/ReportFilterPeriod.md)
 - [ReportFilterPeriodDatum](docs/Model/ReportFilterPeriodDatum.md)
 - [ReportFilterProduct](docs/Model/ReportFilterProduct.md)
 - [ReportFilterProject](docs/Model/ReportFilterProject.md)
 - [ReportFilterRange](docs/Model/ReportFilterRange.md)
 - [ReportFilterSingular](docs/Model/ReportFilterSingular.md)
 - [ReportFilterSupplier](docs/Model/ReportFilterSupplier.md)
 - [ReportGroupAutoGroup](docs/Model/ReportGroupAutoGroup.md)
 - [ReportGroupAutoGroupOrderBy](docs/Model/ReportGroupAutoGroupOrderBy.md)
 - [ReportGroupFilter](docs/Model/ReportGroupFilter.md)
 - [ReportResult](docs/Model/ReportResult.md)
 - [ReportResultCell](docs/Model/ReportResultCell.md)
 - [ReportResultCellValue](docs/Model/ReportResultCellValue.md)
 - [ReportResultColumnHeader](docs/Model/ReportResultColumnHeader.md)
 - [ReportResultEnvelope](docs/Model/ReportResultEnvelope.md)
 - [ReportResultRowHeader](docs/Model/ReportResultRowHeader.md)
 - [ReportSettings](docs/Model/ReportSettings.md)
 - [ReportSettingsFilters](docs/Model/ReportSettingsFilters.md)
 - [ReportingCompanyInternal](docs/Model/ReportingCompanyInternal.md)
 - [RequestlogModel](docs/Model/RequestlogModel.md)
 - [ResourcePlanActivity](docs/Model/ResourcePlanActivity.md)
 - [ResourcePlanBudget](docs/Model/ResourcePlanBudget.md)
 - [ResourcePlanEmployee](docs/Model/ResourcePlanEmployee.md)
 - [ResourcePlanHours](docs/Model/ResourcePlanHours.md)
 - [ResponseWrapper](docs/Model/ResponseWrapper.md)
 - [ResponseWrapperAccommodationAllowance](docs/Model/ResponseWrapperAccommodationAllowance.md)
 - [ResponseWrapperAccommodationAndRestaurant](docs/Model/ResponseWrapperAccommodationAndRestaurant.md)
 - [ResponseWrapperAccount](docs/Model/ResponseWrapperAccount.md)
 - [ResponseWrapperAccountClosureFeedback](docs/Model/ResponseWrapperAccountClosureFeedback.md)
 - [ResponseWrapperAccountSpecification](docs/Model/ResponseWrapperAccountSpecification.md)
 - [ResponseWrapperAccountingPeriod](docs/Model/ResponseWrapperAccountingPeriod.md)
 - [ResponseWrapperActivity](docs/Model/ResponseWrapperActivity.md)
 - [ResponseWrapperAdditionalServiceOrderLineDTO_](docs/Model/ResponseWrapperAdditionalServiceOrderLineDTO_.md)
 - [ResponseWrapperAddon](docs/Model/ResponseWrapperAddon.md)
 - [ResponseWrapperAddonStatusType](docs/Model/ResponseWrapperAddonStatusType.md)
 - [ResponseWrapperAdvancedPaymentWidget](docs/Model/ResponseWrapperAdvancedPaymentWidget.md)
 - [ResponseWrapperAltinnCompanyModule](docs/Model/ResponseWrapperAltinnCompanyModule.md)
 - [ResponseWrapperAltinnInstance](docs/Model/ResponseWrapperAltinnInstance.md)
 - [ResponseWrapperAnnualAccount](docs/Model/ResponseWrapperAnnualAccount.md)
 - [ResponseWrapperApiConsumer](docs/Model/ResponseWrapperApiConsumer.md)
 - [ResponseWrapperApproveResponseDTO](docs/Model/ResponseWrapperApproveResponseDTO.md)
 - [ResponseWrapperAsset](docs/Model/ResponseWrapperAsset.md)
 - [ResponseWrapperAssetOverview](docs/Model/ResponseWrapperAssetOverview.md)
 - [ResponseWrapperAuthConfigDTO](docs/Model/ResponseWrapperAuthConfigDTO.md)
 - [ResponseWrapperAutoLogin](docs/Model/ResponseWrapperAutoLogin.md)
 - [ResponseWrapperAutomationSettingsDTO](docs/Model/ResponseWrapperAutomationSettingsDTO.md)
 - [ResponseWrapperBalanceSheet](docs/Model/ResponseWrapperBalanceSheet.md)
 - [ResponseWrapperBalanceSheetSettingsDTO](docs/Model/ResponseWrapperBalanceSheetSettingsDTO.md)
 - [ResponseWrapperBank](docs/Model/ResponseWrapperBank.md)
 - [ResponseWrapperBankAgreementDTO](docs/Model/ResponseWrapperBankAgreementDTO.md)
 - [ResponseWrapperBankBalanceEstimation](docs/Model/ResponseWrapperBankBalanceEstimation.md)
 - [ResponseWrapperBankOnboardingDTO](docs/Model/ResponseWrapperBankOnboardingDTO.md)
 - [ResponseWrapperBankReconciliation](docs/Model/ResponseWrapperBankReconciliation.md)
 - [ResponseWrapperBankReconciliationMatch](docs/Model/ResponseWrapperBankReconciliationMatch.md)
 - [ResponseWrapperBankReconciliationMatchesCounter](docs/Model/ResponseWrapperBankReconciliationMatchesCounter.md)
 - [ResponseWrapperBankReconciliationPaymentType](docs/Model/ResponseWrapperBankReconciliationPaymentType.md)
 - [ResponseWrapperBankReconciliationSettings](docs/Model/ResponseWrapperBankReconciliationSettings.md)
 - [ResponseWrapperBankSettings](docs/Model/ResponseWrapperBankSettings.md)
 - [ResponseWrapperBankStatement](docs/Model/ResponseWrapperBankStatement.md)
 - [ResponseWrapperBankStatementBalance](docs/Model/ResponseWrapperBankStatementBalance.md)
 - [ResponseWrapperBankTransaction](docs/Model/ResponseWrapperBankTransaction.md)
 - [ResponseWrapperBankTransactionAggregatesDTO](docs/Model/ResponseWrapperBankTransactionAggregatesDTO.md)
 - [ResponseWrapperBanner](docs/Model/ResponseWrapperBanner.md)
 - [ResponseWrapperBasicData](docs/Model/ResponseWrapperBasicData.md)
 - [ResponseWrapperBigDecimal](docs/Model/ResponseWrapperBigDecimal.md)
 - [ResponseWrapperBoolean](docs/Model/ResponseWrapperBoolean.md)
 - [ResponseWrapperChecklist](docs/Model/ResponseWrapperChecklist.md)
 - [ResponseWrapperCheckout](docs/Model/ResponseWrapperCheckout.md)
 - [ResponseWrapperCloseGroup](docs/Model/ResponseWrapperCloseGroup.md)
 - [ResponseWrapperComment](docs/Model/ResponseWrapperComment.md)
 - [ResponseWrapperCommercialVehicle](docs/Model/ResponseWrapperCommercialVehicle.md)
 - [ResponseWrapperCompany](docs/Model/ResponseWrapperCompany.md)
 - [ResponseWrapperCompanyAuthorityDTO](docs/Model/ResponseWrapperCompanyAuthorityDTO.md)
 - [ResponseWrapperCompanyChooserDTO](docs/Model/ResponseWrapperCompanyChooserDTO.md)
 - [ResponseWrapperCompanyHoliday](docs/Model/ResponseWrapperCompanyHoliday.md)
 - [ResponseWrapperCompanyHolidays](docs/Model/ResponseWrapperCompanyHolidays.md)
 - [ResponseWrapperCompanyStandardTime](docs/Model/ResponseWrapperCompanyStandardTime.md)
 - [ResponseWrapperConsumerToken](docs/Model/ResponseWrapperConsumerToken.md)
 - [ResponseWrapperContact](docs/Model/ResponseWrapperContact.md)
 - [ResponseWrapperCost](docs/Model/ResponseWrapperCost.md)
 - [ResponseWrapperCountry](docs/Model/ResponseWrapperCountry.md)
 - [ResponseWrapperCurrency](docs/Model/ResponseWrapperCurrency.md)
 - [ResponseWrapperCurrencyExchangeRate](docs/Model/ResponseWrapperCurrencyExchangeRate.md)
 - [ResponseWrapperCustomer](docs/Model/ResponseWrapperCustomer.md)
 - [ResponseWrapperCustomerCategory](docs/Model/ResponseWrapperCustomerCategory.md)
 - [ResponseWrapperCustomerReceivable](docs/Model/ResponseWrapperCustomerReceivable.md)
 - [ResponseWrapperCustomizedChecklistProperty](docs/Model/ResponseWrapperCustomizedChecklistProperty.md)
 - [ResponseWrapperDashboardDTO](docs/Model/ResponseWrapperDashboardDTO.md)
 - [ResponseWrapperDate](docs/Model/ResponseWrapperDate.md)
 - [ResponseWrapperDeliveryAddress](docs/Model/ResponseWrapperDeliveryAddress.md)
 - [ResponseWrapperDepartment](docs/Model/ResponseWrapperDepartment.md)
 - [ResponseWrapperDeviation](docs/Model/ResponseWrapperDeviation.md)
 - [ResponseWrapperDifferencesOverview](docs/Model/ResponseWrapperDifferencesOverview.md)
 - [ResponseWrapperDiscountGroup](docs/Model/ResponseWrapperDiscountGroup.md)
 - [ResponseWrapperDistributionKey](docs/Model/ResponseWrapperDistributionKey.md)
 - [ResponseWrapperDivision](docs/Model/ResponseWrapperDivision.md)
 - [ResponseWrapperDocument](docs/Model/ResponseWrapperDocument.md)
 - [ResponseWrapperDocumentArchive](docs/Model/ResponseWrapperDocumentArchive.md)
 - [ResponseWrapperDownloadedBrreg](docs/Model/ResponseWrapperDownloadedBrreg.md)
 - [ResponseWrapperDrivingStop](docs/Model/ResponseWrapperDrivingStop.md)
 - [ResponseWrapperElectronicSupportDTO](docs/Model/ResponseWrapperElectronicSupportDTO.md)
 - [ResponseWrapperEmployee](docs/Model/ResponseWrapperEmployee.md)
 - [ResponseWrapperEmployeeCategory](docs/Model/ResponseWrapperEmployeeCategory.md)
 - [ResponseWrapperEmployeeLoginInfo](docs/Model/ResponseWrapperEmployeeLoginInfo.md)
 - [ResponseWrapperEmployeePreferences](docs/Model/ResponseWrapperEmployeePreferences.md)
 - [ResponseWrapperEmployeeToken](docs/Model/ResponseWrapperEmployeeToken.md)
 - [ResponseWrapperEmployeeTokenBundle](docs/Model/ResponseWrapperEmployeeTokenBundle.md)
 - [ResponseWrapperEmployment](docs/Model/ResponseWrapperEmployment.md)
 - [ResponseWrapperEmploymentDetails](docs/Model/ResponseWrapperEmploymentDetails.md)
 - [ResponseWrapperEntitlement](docs/Model/ResponseWrapperEntitlement.md)
 - [ResponseWrapperEventInfoDTO](docs/Model/ResponseWrapperEventInfoDTO.md)
 - [ResponseWrapperExternalProduct](docs/Model/ResponseWrapperExternalProduct.md)
 - [ResponseWrapperFavoriteMenu](docs/Model/ResponseWrapperFavoriteMenu.md)
 - [ResponseWrapperFundingPartnerApplication](docs/Model/ResponseWrapperFundingPartnerApplication.md)
 - [ResponseWrapperFundingPartnerQualify](docs/Model/ResponseWrapperFundingPartnerQualify.md)
 - [ResponseWrapperGenericDataOverview](docs/Model/ResponseWrapperGenericDataOverview.md)
 - [ResponseWrapperGoodsReceipt](docs/Model/ResponseWrapperGoodsReceipt.md)
 - [ResponseWrapperGoodsReceiptLine](docs/Model/ResponseWrapperGoodsReceiptLine.md)
 - [ResponseWrapperGroupContributions](docs/Model/ResponseWrapperGroupContributions.md)
 - [ResponseWrapperHelpCenterArticles](docs/Model/ResponseWrapperHelpCenterArticles.md)
 - [ResponseWrapperHistoricalPosting](docs/Model/ResponseWrapperHistoricalPosting.md)
 - [ResponseWrapperHourlyCostAndRate](docs/Model/ResponseWrapperHourlyCostAndRate.md)
 - [ResponseWrapperIdPortenLogin](docs/Model/ResponseWrapperIdPortenLogin.md)
 - [ResponseWrapperIdPortenLoginStatus](docs/Model/ResponseWrapperIdPortenLoginStatus.md)
 - [ResponseWrapperInboxData](docs/Model/ResponseWrapperInboxData.md)
 - [ResponseWrapperInboxSummaryDTO](docs/Model/ResponseWrapperInboxSummaryDTO.md)
 - [ResponseWrapperIncomeStatement](docs/Model/ResponseWrapperIncomeStatement.md)
 - [ResponseWrapperIncomingInvoicePaymentHistory](docs/Model/ResponseWrapperIncomingInvoicePaymentHistory.md)
 - [ResponseWrapperInteger](docs/Model/ResponseWrapperInteger.md)
 - [ResponseWrapperIntegrationData](docs/Model/ResponseWrapperIntegrationData.md)
 - [ResponseWrapperInventoriesOverview](docs/Model/ResponseWrapperInventoriesOverview.md)
 - [ResponseWrapperInventory](docs/Model/ResponseWrapperInventory.md)
 - [ResponseWrapperInventoryLocation](docs/Model/ResponseWrapperInventoryLocation.md)
 - [ResponseWrapperInvoice](docs/Model/ResponseWrapperInvoice.md)
 - [ResponseWrapperInvoiceAndOrderSummaryDTO](docs/Model/ResponseWrapperInvoiceAndOrderSummaryDTO.md)
 - [ResponseWrapperInvoiceAndOrdersData](docs/Model/ResponseWrapperInvoiceAndOrdersData.md)
 - [ResponseWrapperInvoiceOrderLineDTO_](docs/Model/ResponseWrapperInvoiceOrderLineDTO_.md)
 - [ResponseWrapperInvoiceSendTypeDTO](docs/Model/ResponseWrapperInvoiceSendTypeDTO.md)
 - [ResponseWrapperInvoiceSettings](docs/Model/ResponseWrapperInvoiceSettings.md)
 - [ResponseWrapperInvoiceSummaryDTO](docs/Model/ResponseWrapperInvoiceSummaryDTO.md)
 - [ResponseWrapperInvoiceTemplateRenderer](docs/Model/ResponseWrapperInvoiceTemplateRenderer.md)
 - [ResponseWrapperLeaveOfAbsence](docs/Model/ResponseWrapperLeaveOfAbsence.md)
 - [ResponseWrapperLegacyAddress](docs/Model/ResponseWrapperLegacyAddress.md)
 - [ResponseWrapperLegacyProfileDTO](docs/Model/ResponseWrapperLegacyProfileDTO.md)
 - [ResponseWrapperListBankBalanceEstimation](docs/Model/ResponseWrapperListBankBalanceEstimation.md)
 - [ResponseWrapperListClientForApproval](docs/Model/ResponseWrapperListClientForApproval.md)
 - [ResponseWrapperListClientForRemit](docs/Model/ResponseWrapperListClientForRemit.md)
 - [ResponseWrapperListClientForReview](docs/Model/ResponseWrapperListClientForReview.md)
 - [ResponseWrapperListClientInbox](docs/Model/ResponseWrapperListClientInbox.md)
 - [ResponseWrapperListCompanyDTO](docs/Model/ResponseWrapperListCompanyDTO.md)
 - [ResponseWrapperListElectronicSupportDTO](docs/Model/ResponseWrapperListElectronicSupportDTO.md)
 - [ResponseWrapperListEmployment](docs/Model/ResponseWrapperListEmployment.md)
 - [ResponseWrapperListFileIdForIncomingPaymentsDTO](docs/Model/ResponseWrapperListFileIdForIncomingPaymentsDTO.md)
 - [ResponseWrapperListInteger](docs/Model/ResponseWrapperListInteger.md)
 - [ResponseWrapperListJob](docs/Model/ResponseWrapperListJob.md)
 - [ResponseWrapperListProductImportFieldDTO](docs/Model/ResponseWrapperListProductImportFieldDTO.md)
 - [ResponseWrapperListRegulatoryReportingCode](docs/Model/ResponseWrapperListRegulatoryReportingCode.md)
 - [ResponseWrapperListRoleContainerDTO](docs/Model/ResponseWrapperListRoleContainerDTO.md)
 - [ResponseWrapperListSalaryEmployeeInternal](docs/Model/ResponseWrapperListSalaryEmployeeInternal.md)
 - [ResponseWrapperListSalaryV2EmployeeToEmploymentsRelationship](docs/Model/ResponseWrapperListSalaryV2EmployeeToEmploymentsRelationship.md)
 - [ResponseWrapperListSalaryV2PaymentType](docs/Model/ResponseWrapperListSalaryV2PaymentType.md)
 - [ResponseWrapperListString](docs/Model/ResponseWrapperListString.md)
 - [ResponseWrapperListTodoListAmelding](docs/Model/ResponseWrapperListTodoListAmelding.md)
 - [ResponseWrapperListTodoListAnnualAccounts](docs/Model/ResponseWrapperListTodoListAnnualAccounts.md)
 - [ResponseWrapperListTodoListHarmonization](docs/Model/ResponseWrapperListTodoListHarmonization.md)
 - [ResponseWrapperListTodoListPeriodOverview](docs/Model/ResponseWrapperListTodoListPeriodOverview.md)
 - [ResponseWrapperListTodoListVat](docs/Model/ResponseWrapperListTodoListVat.md)
 - [ResponseWrapperListTodoListWageTransaction](docs/Model/ResponseWrapperListTodoListWageTransaction.md)
 - [ResponseWrapperListWageCodeSummary](docs/Model/ResponseWrapperListWageCodeSummary.md)
 - [ResponseWrapperLoggedInUserInfoDTO](docs/Model/ResponseWrapperLoggedInUserInfoDTO.md)
 - [ResponseWrapperLogisticsSettings](docs/Model/ResponseWrapperLogisticsSettings.md)
 - [ResponseWrapperLong](docs/Model/ResponseWrapperLong.md)
 - [ResponseWrapperMapFeatureBoolean](docs/Model/ResponseWrapperMapFeatureBoolean.md)
 - [ResponseWrapperMapIntegerTlxNumber](docs/Model/ResponseWrapperMapIntegerTlxNumber.md)
 - [ResponseWrapperMapPilotFeatureBoolean](docs/Model/ResponseWrapperMapPilotFeatureBoolean.md)
 - [ResponseWrapperMapStringBoolean](docs/Model/ResponseWrapperMapStringBoolean.md)
 - [ResponseWrapperMapStringEventInfoDescription](docs/Model/ResponseWrapperMapStringEventInfoDescription.md)
 - [ResponseWrapperMenu](docs/Model/ResponseWrapperMenu.md)
 - [ResponseWrapperMileageAllowance](docs/Model/ResponseWrapperMileageAllowance.md)
 - [ResponseWrapperMobileAppSpecificRightsInfo](docs/Model/ResponseWrapperMobileAppSpecificRightsInfo.md)
 - [ResponseWrapperModules](docs/Model/ResponseWrapperModules.md)
 - [ResponseWrapperMonthlyStatus](docs/Model/ResponseWrapperMonthlyStatus.md)
 - [ResponseWrapperMySubscriptionAccountInfoDTO](docs/Model/ResponseWrapperMySubscriptionAccountInfoDTO.md)
 - [ResponseWrapperMySubscriptionModuleDTO_](docs/Model/ResponseWrapperMySubscriptionModuleDTO_.md)
 - [ResponseWrapperNextOfKin](docs/Model/ResponseWrapperNextOfKin.md)
 - [ResponseWrapperNotification](docs/Model/ResponseWrapperNotification.md)
 - [ResponseWrapperObject](docs/Model/ResponseWrapperObject.md)
 - [ResponseWrapperOrder](docs/Model/ResponseWrapperOrder.md)
 - [ResponseWrapperOrderGroup](docs/Model/ResponseWrapperOrderGroup.md)
 - [ResponseWrapperOrderLine](docs/Model/ResponseWrapperOrderLine.md)
 - [ResponseWrapperOrderOffer](docs/Model/ResponseWrapperOrderOffer.md)
 - [ResponseWrapperPageOptions](docs/Model/ResponseWrapperPageOptions.md)
 - [ResponseWrapperPassenger](docs/Model/ResponseWrapperPassenger.md)
 - [ResponseWrapperPaymentDTO](docs/Model/ResponseWrapperPaymentDTO.md)
 - [ResponseWrapperPaymentType](docs/Model/ResponseWrapperPaymentType.md)
 - [ResponseWrapperPaymentTypeOut](docs/Model/ResponseWrapperPaymentTypeOut.md)
 - [ResponseWrapperPayslip](docs/Model/ResponseWrapperPayslip.md)
 - [ResponseWrapperPayslipInternal](docs/Model/ResponseWrapperPayslipInternal.md)
 - [ResponseWrapperPensionScheme](docs/Model/ResponseWrapperPensionScheme.md)
 - [ResponseWrapperPerDiemCompensation](docs/Model/ResponseWrapperPerDiemCompensation.md)
 - [ResponseWrapperPersonalIncomeOverview](docs/Model/ResponseWrapperPersonalIncomeOverview.md)
 - [ResponseWrapperPhonePrefixCountryInternal](docs/Model/ResponseWrapperPhonePrefixCountryInternal.md)
 - [ResponseWrapperPickupPoint](docs/Model/ResponseWrapperPickupPoint.md)
 - [ResponseWrapperPosting](docs/Model/ResponseWrapperPosting.md)
 - [ResponseWrapperProduct](docs/Model/ResponseWrapperProduct.md)
 - [ResponseWrapperProductGroup](docs/Model/ResponseWrapperProductGroup.md)
 - [ResponseWrapperProductGroupRelation](docs/Model/ResponseWrapperProductGroupRelation.md)
 - [ResponseWrapperProductImport](docs/Model/ResponseWrapperProductImport.md)
 - [ResponseWrapperProductInventoryLocation](docs/Model/ResponseWrapperProductInventoryLocation.md)
 - [ResponseWrapperProductLine](docs/Model/ResponseWrapperProductLine.md)
 - [ResponseWrapperProductSettings](docs/Model/ResponseWrapperProductSettings.md)
 - [ResponseWrapperProductUnit](docs/Model/ResponseWrapperProductUnit.md)
 - [ResponseWrapperProductUnitMaster](docs/Model/ResponseWrapperProductUnitMaster.md)
 - [ResponseWrapperProfileDTO](docs/Model/ResponseWrapperProfileDTO.md)
 - [ResponseWrapperProfitAndLoss](docs/Model/ResponseWrapperProfitAndLoss.md)
 - [ResponseWrapperProject](docs/Model/ResponseWrapperProject.md)
 - [ResponseWrapperProjectAccess](docs/Model/ResponseWrapperProjectAccess.md)
 - [ResponseWrapperProjectActivity](docs/Model/ResponseWrapperProjectActivity.md)
 - [ResponseWrapperProjectBudgetStatus](docs/Model/ResponseWrapperProjectBudgetStatus.md)
 - [ResponseWrapperProjectCategory](docs/Model/ResponseWrapperProjectCategory.md)
 - [ResponseWrapperProjectControlForm](docs/Model/ResponseWrapperProjectControlForm.md)
 - [ResponseWrapperProjectControlFormType](docs/Model/ResponseWrapperProjectControlFormType.md)
 - [ResponseWrapperProjectHourlyRate](docs/Model/ResponseWrapperProjectHourlyRate.md)
 - [ResponseWrapperProjectInvoiceDetails](docs/Model/ResponseWrapperProjectInvoiceDetails.md)
 - [ResponseWrapperProjectOnboardingSummaryDTO](docs/Model/ResponseWrapperProjectOnboardingSummaryDTO.md)
 - [ResponseWrapperProjectOrderLine](docs/Model/ResponseWrapperProjectOrderLine.md)
 - [ResponseWrapperProjectParticipant](docs/Model/ResponseWrapperProjectParticipant.md)
 - [ResponseWrapperProjectPeriodHourlyReport](docs/Model/ResponseWrapperProjectPeriodHourlyReport.md)
 - [ResponseWrapperProjectPeriodInvoiced](docs/Model/ResponseWrapperProjectPeriodInvoiced.md)
 - [ResponseWrapperProjectPeriodInvoicingReserve](docs/Model/ResponseWrapperProjectPeriodInvoicingReserve.md)
 - [ResponseWrapperProjectPeriodOverallStatus](docs/Model/ResponseWrapperProjectPeriodOverallStatus.md)
 - [ResponseWrapperProjectSettings](docs/Model/ResponseWrapperProjectSettings.md)
 - [ResponseWrapperProjectSpecificRate](docs/Model/ResponseWrapperProjectSpecificRate.md)
 - [ResponseWrapperProjectTemplate](docs/Model/ResponseWrapperProjectTemplate.md)
 - [ResponseWrapperProspect](docs/Model/ResponseWrapperProspect.md)
 - [ResponseWrapperPurchaseOrder](docs/Model/ResponseWrapperPurchaseOrder.md)
 - [ResponseWrapperPurchaseOrderAddress](docs/Model/ResponseWrapperPurchaseOrderAddress.md)
 - [ResponseWrapperPurchaseOrderIncomingInvoiceRelation](docs/Model/ResponseWrapperPurchaseOrderIncomingInvoiceRelation.md)
 - [ResponseWrapperPurchaseOrderline](docs/Model/ResponseWrapperPurchaseOrderline.md)
 - [ResponseWrapperRPJob](docs/Model/ResponseWrapperRPJob.md)
 - [ResponseWrapperRPViewDTO](docs/Model/ResponseWrapperRPViewDTO.md)
 - [ResponseWrapperReconciliationOfEquityOverview](docs/Model/ResponseWrapperReconciliationOfEquityOverview.md)
 - [ResponseWrapperReelDomainDTO](docs/Model/ResponseWrapperReelDomainDTO.md)
 - [ResponseWrapperReminder](docs/Model/ResponseWrapperReminder.md)
 - [ResponseWrapperReminderDTO](docs/Model/ResponseWrapperReminderDTO.md)
 - [ResponseWrapperReminderWidgetData](docs/Model/ResponseWrapperReminderWidgetData.md)
 - [ResponseWrapperReport](docs/Model/ResponseWrapperReport.md)
 - [ResponseWrapperReportAuthorization](docs/Model/ResponseWrapperReportAuthorization.md)
 - [ResponseWrapperReportResultEnvelope](docs/Model/ResponseWrapperReportResultEnvelope.md)
 - [ResponseWrapperResourcePlanBudget](docs/Model/ResponseWrapperResourcePlanBudget.md)
 - [ResponseWrapperResultBudget](docs/Model/ResponseWrapperResultBudget.md)
 - [ResponseWrapperSalaryCompilation](docs/Model/ResponseWrapperSalaryCompilation.md)
 - [ResponseWrapperSalaryEmployeeInternal](docs/Model/ResponseWrapperSalaryEmployeeInternal.md)
 - [ResponseWrapperSalarySettings](docs/Model/ResponseWrapperSalarySettings.md)
 - [ResponseWrapperSalarySettingsInternal](docs/Model/ResponseWrapperSalarySettingsInternal.md)
 - [ResponseWrapperSalarySpecSupplementInternal](docs/Model/ResponseWrapperSalarySpecSupplementInternal.md)
 - [ResponseWrapperSalarySpecification](docs/Model/ResponseWrapperSalarySpecification.md)
 - [ResponseWrapperSalarySpecificationInternal](docs/Model/ResponseWrapperSalarySpecificationInternal.md)
 - [ResponseWrapperSalaryTaxcardInternal](docs/Model/ResponseWrapperSalaryTaxcardInternal.md)
 - [ResponseWrapperSalaryTransaction](docs/Model/ResponseWrapperSalaryTransaction.md)
 - [ResponseWrapperSalaryTransactionInternal](docs/Model/ResponseWrapperSalaryTransactionInternal.md)
 - [ResponseWrapperSalaryTravelExpense](docs/Model/ResponseWrapperSalaryTravelExpense.md)
 - [ResponseWrapperSalaryType](docs/Model/ResponseWrapperSalaryType.md)
 - [ResponseWrapperSalaryTypeInternal](docs/Model/ResponseWrapperSalaryTypeInternal.md)
 - [ResponseWrapperSalaryV2Modules](docs/Model/ResponseWrapperSalaryV2Modules.md)
 - [ResponseWrapperSalaryV2Overview](docs/Model/ResponseWrapperSalaryV2Overview.md)
 - [ResponseWrapperSalaryV2Payment](docs/Model/ResponseWrapperSalaryV2Payment.md)
 - [ResponseWrapperSalaryV2Specification](docs/Model/ResponseWrapperSalaryV2Specification.md)
 - [ResponseWrapperSalaryV2Supplement](docs/Model/ResponseWrapperSalaryV2Supplement.md)
 - [ResponseWrapperSalaryV2Transaction](docs/Model/ResponseWrapperSalaryV2Transaction.md)
 - [ResponseWrapperSalaryV2TravelExpense](docs/Model/ResponseWrapperSalaryV2TravelExpense.md)
 - [ResponseWrapperSalaryVoucherInternal](docs/Model/ResponseWrapperSalaryVoucherInternal.md)
 - [ResponseWrapperSalesForceAccountInfo](docs/Model/ResponseWrapperSalesForceAccountInfo.md)
 - [ResponseWrapperSalesForceCustomerStats](docs/Model/ResponseWrapperSalesForceCustomerStats.md)
 - [ResponseWrapperSalesForceEmployee](docs/Model/ResponseWrapperSalesForceEmployee.md)
 - [ResponseWrapperSalesForceEmployeeRole](docs/Model/ResponseWrapperSalesForceEmployeeRole.md)
 - [ResponseWrapperSalesForceTripletexSalesModulePurchase](docs/Model/ResponseWrapperSalesForceTripletexSalesModulePurchase.md)
 - [ResponseWrapperSalesForceUserOverview](docs/Model/ResponseWrapperSalesForceUserOverview.md)
 - [ResponseWrapperSalesModuleDTO](docs/Model/ResponseWrapperSalesModuleDTO.md)
 - [ResponseWrapperSegmentationData](docs/Model/ResponseWrapperSegmentationData.md)
 - [ResponseWrapperServiceActivationResponseDTO](docs/Model/ResponseWrapperServiceActivationResponseDTO.md)
 - [ResponseWrapperSessionToken](docs/Model/ResponseWrapperSessionToken.md)
 - [ResponseWrapperSimplePaymentWidget](docs/Model/ResponseWrapperSimplePaymentWidget.md)
 - [ResponseWrapperSnowplowContextSnowplowGlobalCompany](docs/Model/ResponseWrapperSnowplowContextSnowplowGlobalCompany.md)
 - [ResponseWrapperSnowplowContextSnowplowGlobalEmployee](docs/Model/ResponseWrapperSnowplowContextSnowplowGlobalEmployee.md)
 - [ResponseWrapperSpacesuitNotificationMeta](docs/Model/ResponseWrapperSpacesuitNotificationMeta.md)
 - [ResponseWrapperStandardTime](docs/Model/ResponseWrapperStandardTime.md)
 - [ResponseWrapperStocktaking](docs/Model/ResponseWrapperStocktaking.md)
 - [ResponseWrapperStorebrandPensionOnboarding](docs/Model/ResponseWrapperStorebrandPensionOnboarding.md)
 - [ResponseWrapperStorebrandPensionOnboardingQualify](docs/Model/ResponseWrapperStorebrandPensionOnboardingQualify.md)
 - [ResponseWrapperString](docs/Model/ResponseWrapperString.md)
 - [ResponseWrapperSubscription](docs/Model/ResponseWrapperSubscription.md)
 - [ResponseWrapperSupplier](docs/Model/ResponseWrapperSupplier.md)
 - [ResponseWrapperSupplierInvoice](docs/Model/ResponseWrapperSupplierInvoice.md)
 - [ResponseWrapperSupplierProduct](docs/Model/ResponseWrapperSupplierProduct.md)
 - [ResponseWrapperSystemMessage](docs/Model/ResponseWrapperSystemMessage.md)
 - [ResponseWrapperTaskDTO](docs/Model/ResponseWrapperTaskDTO.md)
 - [ResponseWrapperTasksWidgetData](docs/Model/ResponseWrapperTasksWidgetData.md)
 - [ResponseWrapperTaxcardContactInternal](docs/Model/ResponseWrapperTaxcardContactInternal.md)
 - [ResponseWrapperTemplate](docs/Model/ResponseWrapperTemplate.md)
 - [ResponseWrapperTimeClock](docs/Model/ResponseWrapperTimeClock.md)
 - [ResponseWrapperTimesheetAllocated](docs/Model/ResponseWrapperTimesheetAllocated.md)
 - [ResponseWrapperTimesheetEntry](docs/Model/ResponseWrapperTimesheetEntry.md)
 - [ResponseWrapperTimesheetProjectSalaryTypeSpecification](docs/Model/ResponseWrapperTimesheetProjectSalaryTypeSpecification.md)
 - [ResponseWrapperTimesheetSalaryTypeSpecification](docs/Model/ResponseWrapperTimesheetSalaryTypeSpecification.md)
 - [ResponseWrapperTimesheetSettings](docs/Model/ResponseWrapperTimesheetSettings.md)
 - [ResponseWrapperTransportType](docs/Model/ResponseWrapperTransportType.md)
 - [ResponseWrapperTravelCostCategory](docs/Model/ResponseWrapperTravelCostCategory.md)
 - [ResponseWrapperTravelExpense](docs/Model/ResponseWrapperTravelExpense.md)
 - [ResponseWrapperTravelExpenseRate](docs/Model/ResponseWrapperTravelExpenseRate.md)
 - [ResponseWrapperTravelExpenseRateCategory](docs/Model/ResponseWrapperTravelExpenseRateCategory.md)
 - [ResponseWrapperTravelExpenseRateCategoryGroup](docs/Model/ResponseWrapperTravelExpenseRateCategoryGroup.md)
 - [ResponseWrapperTravelExpenseSettings](docs/Model/ResponseWrapperTravelExpenseSettings.md)
 - [ResponseWrapperTravelExpenseZone](docs/Model/ResponseWrapperTravelExpenseZone.md)
 - [ResponseWrapperTravelPaymentType](docs/Model/ResponseWrapperTravelPaymentType.md)
 - [ResponseWrapperTrialDTO](docs/Model/ResponseWrapperTrialDTO.md)
 - [ResponseWrapperTrialInfoAutomationDTO](docs/Model/ResponseWrapperTrialInfoAutomationDTO.md)
 - [ResponseWrapperTripDTO](docs/Model/ResponseWrapperTripDTO.md)
 - [ResponseWrapperTripSearchResponseDTO](docs/Model/ResponseWrapperTripSearchResponseDTO.md)
 - [ResponseWrapperTripletexAccountPricesReturnDTO](docs/Model/ResponseWrapperTripletexAccountPricesReturnDTO.md)
 - [ResponseWrapperTripletexAccountReturn](docs/Model/ResponseWrapperTripletexAccountReturn.md)
 - [ResponseWrapperTripletexCompanyModules](docs/Model/ResponseWrapperTripletexCompanyModules.md)
 - [ResponseWrapperUnreadCountDTO](docs/Model/ResponseWrapperUnreadCountDTO.md)
 - [ResponseWrapperUserTemplate](docs/Model/ResponseWrapperUserTemplate.md)
 - [ResponseWrapperUserTemplateDefaultDTO](docs/Model/ResponseWrapperUserTemplateDefaultDTO.md)
 - [ResponseWrapperVFCustomerResponseDTO](docs/Model/ResponseWrapperVFCustomerResponseDTO.md)
 - [ResponseWrapperVatReturns2022](docs/Model/ResponseWrapperVatReturns2022.md)
 - [ResponseWrapperVatReturns2022ValidateCreate](docs/Model/ResponseWrapperVatReturns2022ValidateCreate.md)
 - [ResponseWrapperVatReturnsPaymentInfo](docs/Model/ResponseWrapperVatReturnsPaymentInfo.md)
 - [ResponseWrapperVatReturnsValidationResult](docs/Model/ResponseWrapperVatReturnsValidationResult.md)
 - [ResponseWrapperVatSpecificationLine](docs/Model/ResponseWrapperVatSpecificationLine.md)
 - [ResponseWrapperVatType](docs/Model/ResponseWrapperVatType.md)
 - [ResponseWrapperVismaConnectLogin](docs/Model/ResponseWrapperVismaConnectLogin.md)
 - [ResponseWrapperVoucher](docs/Model/ResponseWrapperVoucher.md)
 - [ResponseWrapperVoucherApprovalListElement](docs/Model/ResponseWrapperVoucherApprovalListElement.md)
 - [ResponseWrapperVoucherInboxContext](docs/Model/ResponseWrapperVoucherInboxContext.md)
 - [ResponseWrapperVoucherInboxItem](docs/Model/ResponseWrapperVoucherInboxItem.md)
 - [ResponseWrapperVoucherMessage](docs/Model/ResponseWrapperVoucherMessage.md)
 - [ResponseWrapperVoucherOptions](docs/Model/ResponseWrapperVoucherOptions.md)
 - [ResponseWrapperVoucherStatus](docs/Model/ResponseWrapperVoucherStatus.md)
 - [ResponseWrapperVoucherType](docs/Model/ResponseWrapperVoucherType.md)
 - [ResponseWrapperWeek](docs/Model/ResponseWrapperWeek.md)
 - [ResponseWrapperYearEndReport](docs/Model/ResponseWrapperYearEndReport.md)
 - [ResponseWrapperZendeskChatMetaDTO](docs/Model/ResponseWrapperZendeskChatMetaDTO.md)
 - [ResponseWrapperZtlAccount](docs/Model/ResponseWrapperZtlAccount.md)
 - [ResponseWrapperZtlConsent](docs/Model/ResponseWrapperZtlConsent.md)
 - [ResponseWrapperZtlOnboarding](docs/Model/ResponseWrapperZtlOnboarding.md)
 - [ResponseWrapperZtlSettings](docs/Model/ResponseWrapperZtlSettings.md)
 - [RestrictedEntitlementChange](docs/Model/RestrictedEntitlementChange.md)
 - [Result](docs/Model/Result.md)
 - [ResultBudget](docs/Model/ResultBudget.md)
 - [RiskFreeInterestRate](docs/Model/RiskFreeInterestRate.md)
 - [RoleContainerDTO](docs/Model/RoleContainerDTO.md)
 - [RushHoursToll](docs/Model/RushHoursToll.md)
 - [SalaryAdvanceTaxcardInternal](docs/Model/SalaryAdvanceTaxcardInternal.md)
 - [SalaryCompilation](docs/Model/SalaryCompilation.md)
 - [SalaryCompilationLine](docs/Model/SalaryCompilationLine.md)
 - [SalaryEmployeeInternal](docs/Model/SalaryEmployeeInternal.md)
 - [SalaryPreWarningsAndValidations](docs/Model/SalaryPreWarningsAndValidations.md)
 - [SalarySettings](docs/Model/SalarySettings.md)
 - [SalarySettingsInternal](docs/Model/SalarySettingsInternal.md)
 - [SalarySpecSupplementInternal](docs/Model/SalarySpecSupplementInternal.md)
 - [SalarySpecification](docs/Model/SalarySpecification.md)
 - [SalarySpecificationInternal](docs/Model/SalarySpecificationInternal.md)
 - [SalaryTaxcardInternal](docs/Model/SalaryTaxcardInternal.md)
 - [SalaryTransaction](docs/Model/SalaryTransaction.md)
 - [SalaryTransactionInternal](docs/Model/SalaryTransactionInternal.md)
 - [SalaryTravelExpense](docs/Model/SalaryTravelExpense.md)
 - [SalaryType](docs/Model/SalaryType.md)
 - [SalaryTypeInternal](docs/Model/SalaryTypeInternal.md)
 - [SalaryV2EmployeeToEmploymentsRelationship](docs/Model/SalaryV2EmployeeToEmploymentsRelationship.md)
 - [SalaryV2Modules](docs/Model/SalaryV2Modules.md)
 - [SalaryV2Overview](docs/Model/SalaryV2Overview.md)
 - [SalaryV2OverviewRow](docs/Model/SalaryV2OverviewRow.md)
 - [SalaryV2Payment](docs/Model/SalaryV2Payment.md)
 - [SalaryV2PaymentType](docs/Model/SalaryV2PaymentType.md)
 - [SalaryV2PaymentValidationResult](docs/Model/SalaryV2PaymentValidationResult.md)
 - [SalaryV2Specification](docs/Model/SalaryV2Specification.md)
 - [SalaryV2Supplement](docs/Model/SalaryV2Supplement.md)
 - [SalaryV2Transaction](docs/Model/SalaryV2Transaction.md)
 - [SalaryV2TravelExpense](docs/Model/SalaryV2TravelExpense.md)
 - [SalaryVoucherInternal](docs/Model/SalaryVoucherInternal.md)
 - [SalesForceAccountInfo](docs/Model/SalesForceAccountInfo.md)
 - [SalesForceAddress](docs/Model/SalesForceAddress.md)
 - [SalesForceCountry](docs/Model/SalesForceCountry.md)
 - [SalesForceCustomerStats](docs/Model/SalesForceCustomerStats.md)
 - [SalesForceEmployee](docs/Model/SalesForceEmployee.md)
 - [SalesForceEmployeeRole](docs/Model/SalesForceEmployeeRole.md)
 - [SalesForceOpportunity](docs/Model/SalesForceOpportunity.md)
 - [SalesForceTripletexSalesModulePurchase](docs/Model/SalesForceTripletexSalesModulePurchase.md)
 - [SalesForceUserOverview](docs/Model/SalesForceUserOverview.md)
 - [SalesModuleDTO](docs/Model/SalesModuleDTO.md)
 - [SearchCompletionDTO](docs/Model/SearchCompletionDTO.md)
 - [SegmentationData](docs/Model/SegmentationData.md)
 - [SegmentationModules](docs/Model/SegmentationModules.md)
 - [SegmentationRoles](docs/Model/SegmentationRoles.md)
 - [ServiceActivationResponseDTO](docs/Model/ServiceActivationResponseDTO.md)
 - [SessionToken](docs/Model/SessionToken.md)
 - [SignatureCombinationDTO](docs/Model/SignatureCombinationDTO.md)
 - [SimplePaymentWidget](docs/Model/SimplePaymentWidget.md)
 - [SnowplowContext](docs/Model/SnowplowContext.md)
 - [SnowplowContextSnowplowGlobalCompany](docs/Model/SnowplowContextSnowplowGlobalCompany.md)
 - [SnowplowContextSnowplowGlobalEmployee](docs/Model/SnowplowContextSnowplowGlobalEmployee.md)
 - [SnowplowGlobalCompany](docs/Model/SnowplowGlobalCompany.md)
 - [SnowplowGlobalEmployee](docs/Model/SnowplowGlobalEmployee.md)
 - [SpacesuitNotificationMeta](docs/Model/SpacesuitNotificationMeta.md)
 - [StandardTime](docs/Model/StandardTime.md)
 - [Stock](docs/Model/Stock.md)
 - [Stocktaking](docs/Model/Stocktaking.md)
 - [StorebrandPensionOnboarding](docs/Model/StorebrandPensionOnboarding.md)
 - [StorebrandPensionOnboardingQualify](docs/Model/StorebrandPensionOnboardingQualify.md)
 - [Subscription](docs/Model/Subscription.md)
 - [Supplier](docs/Model/Supplier.md)
 - [SupplierAutomation](docs/Model/SupplierAutomation.md)
 - [SupplierBalance](docs/Model/SupplierBalance.md)
 - [SupplierInvoice](docs/Model/SupplierInvoice.md)
 - [SupplierProduct](docs/Model/SupplierProduct.md)
 - [SystemMessage](docs/Model/SystemMessage.md)
 - [SystemReportCategoryDTO](docs/Model/SystemReportCategoryDTO.md)
 - [SystemReportDTO](docs/Model/SystemReportDTO.md)
 - [TangibleFixedAsset](docs/Model/TangibleFixedAsset.md)
 - [Task](docs/Model/Task.md)
 - [TaskDTO](docs/Model/TaskDTO.md)
 - [TasksWidget](docs/Model/TasksWidget.md)
 - [TasksWidgetData](docs/Model/TasksWidgetData.md)
 - [TaxcardContactInternal](docs/Model/TaxcardContactInternal.md)
 - [TaxcardEmployeeInternal](docs/Model/TaxcardEmployeeInternal.md)
 - [Template](docs/Model/Template.md)
 - [TemporaryDifferences](docs/Model/TemporaryDifferences.md)
 - [TimeClock](docs/Model/TimeClock.md)
 - [TimesheetAllocated](docs/Model/TimesheetAllocated.md)
 - [TimesheetEntry](docs/Model/TimesheetEntry.md)
 - [TimesheetEntrySearchResponse](docs/Model/TimesheetEntrySearchResponse.md)
 - [TimesheetProjectSalaryTypeSpecification](docs/Model/TimesheetProjectSalaryTypeSpecification.md)
 - [TimesheetSalaryTypeSpecification](docs/Model/TimesheetSalaryTypeSpecification.md)
 - [TimesheetSettings](docs/Model/TimesheetSettings.md)
 - [TlxNumber](docs/Model/TlxNumber.md)
 - [TodoListAmelding](docs/Model/TodoListAmelding.md)
 - [TodoListAnnualAccounts](docs/Model/TodoListAnnualAccounts.md)
 - [TodoListExpandedDetail](docs/Model/TodoListExpandedDetail.md)
 - [TodoListHarmonization](docs/Model/TodoListHarmonization.md)
 - [TodoListItemStatus](docs/Model/TodoListItemStatus.md)
 - [TodoListPeriodOverview](docs/Model/TodoListPeriodOverview.md)
 - [TodoListSingleChanges](docs/Model/TodoListSingleChanges.md)
 - [TodoListVat](docs/Model/TodoListVat.md)
 - [TodoListWageTransaction](docs/Model/TodoListWageTransaction.md)
 - [TollStationV2](docs/Model/TollStationV2.md)
 - [TotalToll](docs/Model/TotalToll.md)
 - [TransportType](docs/Model/TransportType.md)
 - [TravelCostCategory](docs/Model/TravelCostCategory.md)
 - [TravelDetails](docs/Model/TravelDetails.md)
 - [TravelExpense](docs/Model/TravelExpense.md)
 - [TravelExpenseRate](docs/Model/TravelExpenseRate.md)
 - [TravelExpenseRateCategory](docs/Model/TravelExpenseRateCategory.md)
 - [TravelExpenseRateCategoryGroup](docs/Model/TravelExpenseRateCategoryGroup.md)
 - [TravelExpenseSettings](docs/Model/TravelExpenseSettings.md)
 - [TravelExpenseZone](docs/Model/TravelExpenseZone.md)
 - [TravelPaymentType](docs/Model/TravelPaymentType.md)
 - [TrialDTO](docs/Model/TrialDTO.md)
 - [TrialInfoAutomationDTO](docs/Model/TrialInfoAutomationDTO.md)
 - [TriggerDTO](docs/Model/TriggerDTO.md)
 - [TripDTO](docs/Model/TripDTO.md)
 - [TripSearchDTO](docs/Model/TripSearchDTO.md)
 - [TripSearchResponseDTO](docs/Model/TripSearchResponseDTO.md)
 - [TripletexAccount](docs/Model/TripletexAccount.md)
 - [TripletexAccount2](docs/Model/TripletexAccount2.md)
 - [TripletexAccountPricesReturnDTO](docs/Model/TripletexAccountPricesReturnDTO.md)
 - [TripletexAccountReturn](docs/Model/TripletexAccountReturn.md)
 - [TripletexCompanyModules](docs/Model/TripletexCompanyModules.md)
 - [TypeOfGoods](docs/Model/TypeOfGoods.md)
 - [UnreadCountDTO](docs/Model/UnreadCountDTO.md)
 - [UpsaleMetric](docs/Model/UpsaleMetric.md)
 - [UserPilotFeatureDTO](docs/Model/UserPilotFeatureDTO.md)
 - [UserTemplate](docs/Model/UserTemplate.md)
 - [UserTemplateDefaultDTO](docs/Model/UserTemplateDefaultDTO.md)
 - [VFCustomerResponseDTO](docs/Model/VFCustomerResponseDTO.md)
 - [VFFactoringInvoiceOffer](docs/Model/VFFactoringInvoiceOffer.md)
 - [VFProductOnboardingStatusDTO](docs/Model/VFProductOnboardingStatusDTO.md)
 - [VacationSummary](docs/Model/VacationSummary.md)
 - [ValidationError](docs/Model/ValidationError.md)
 - [ValidationReasonDTO](docs/Model/ValidationReasonDTO.md)
 - [VatReturns2022](docs/Model/VatReturns2022.md)
 - [VatReturns2022Creation](docs/Model/VatReturns2022Creation.md)
 - [VatReturns2022ValidateCreate](docs/Model/VatReturns2022ValidateCreate.md)
 - [VatReturnsComment](docs/Model/VatReturnsComment.md)
 - [VatReturnsPaymentInfo](docs/Model/VatReturnsPaymentInfo.md)
 - [VatReturnsValidationResult](docs/Model/VatReturnsValidationResult.md)
 - [VatReturnsVatCodeComment](docs/Model/VatReturnsVatCodeComment.md)
 - [VatSpecificationGroup](docs/Model/VatSpecificationGroup.md)
 - [VatSpecificationLine](docs/Model/VatSpecificationLine.md)
 - [VatTermPeriod](docs/Model/VatTermPeriod.md)
 - [VatType](docs/Model/VatType.md)
 - [VfFactoringOffer](docs/Model/VfFactoringOffer.md)
 - [Video](docs/Model/Video.md)
 - [VismaConnectLogin](docs/Model/VismaConnectLogin.md)
 - [VismaConnectMobileAppLogin](docs/Model/VismaConnectMobileAppLogin.md)
 - [VismaConnectMobileAppTokens](docs/Model/VismaConnectMobileAppTokens.md)
 - [Voucher](docs/Model/Voucher.md)
 - [VoucherApprovalListElement](docs/Model/VoucherApprovalListElement.md)
 - [VoucherInboxContext](docs/Model/VoucherInboxContext.md)
 - [VoucherInboxItem](docs/Model/VoucherInboxItem.md)
 - [VoucherInternal](docs/Model/VoucherInternal.md)
 - [VoucherMessage](docs/Model/VoucherMessage.md)
 - [VoucherOptions](docs/Model/VoucherOptions.md)
 - [VoucherSearchResponse](docs/Model/VoucherSearchResponse.md)
 - [VoucherStatus](docs/Model/VoucherStatus.md)
 - [VoucherType](docs/Model/VoucherType.md)
 - [WageCodeSummary](docs/Model/WageCodeSummary.md)
 - [WebHookWrapper](docs/Model/WebHookWrapper.md)
 - [Week](docs/Model/Week.md)
 - [Widgets](docs/Model/Widgets.md)
 - [WorkingHoursScheme](docs/Model/WorkingHoursScheme.md)
 - [YearEndReport](docs/Model/YearEndReport.md)
 - [YearEndReportPost](docs/Model/YearEndReportPost.md)
 - [YearEndReportType](docs/Model/YearEndReportType.md)
 - [YearEndSubmissionResult](docs/Model/YearEndSubmissionResult.md)
 - [YearEndValidationDeviation](docs/Model/YearEndValidationDeviation.md)
 - [YearEndValidationGuidance](docs/Model/YearEndValidationGuidance.md)
 - [YearEndValidationResult](docs/Model/YearEndValidationResult.md)
 - [ZendeskChatMetaDTO](docs/Model/ZendeskChatMetaDTO.md)
 - [ZendeskSearchResultDTO](docs/Model/ZendeskSearchResultDTO.md)
 - [ZtlAccount](docs/Model/ZtlAccount.md)
 - [ZtlConsent](docs/Model/ZtlConsent.md)
 - [ZtlEmployee](docs/Model/ZtlEmployee.md)
 - [ZtlOnboarding](docs/Model/ZtlOnboarding.md)
 - [ZtlSettings](docs/Model/ZtlSettings.md)
 - [ZtlSettingsData](docs/Model/ZtlSettingsData.md)


## Documentation For Authorization


## tokenAuthScheme

- **Type**: HTTP basic authentication


## Author




