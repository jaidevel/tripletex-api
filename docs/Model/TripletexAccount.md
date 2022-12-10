# TripletexAccount

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**company** | [**\Swagger\Client\Model\Company**](Company.md) | Information about the company to create. Supply as much info as you have, but at least name, type and address. | 
**administrator** | [**\Swagger\Client\Model\Employee**](Employee.md) | Employee to create. Department on this object will also be created if supplied. If null a dummy user and department will be created instead | [optional] 
**account_type** | **string** | Is this a test account or a paying account? | 
**modules** | [**\Swagger\Client\Model\Modules**](Modules.md) | Modules (functionality in the application) to activate for the newly created account. Some modules have extra costs. | 
**administrator_password** | **string** | Password for the administrator user to create. Not a part of the administrator employee object since this is a value that never can be read (it is salted and hashed before storing) | 
**send_emails** | **bool** | Should the regular creation emails be sent to the company created and its users? If false you probably want to set autoValidateUserLogin to true | [optional] 
**auto_validate_user_login** | **bool** | If true, the users created will be allowed to log in without validating their email address. ONLY USE THIS IF YOU ALREADY HAVE VALIDATED THE USER EMAILS. | [optional] 
**create_administrator_api_token** | **bool** | Create an API token for the administrator user for the consumer token used during this call. The token will be returned in the response. | [optional] 
**create_company_owned_api_token** | **bool** | Create an API token for the company to use to call their clients, only possible for accounting and auditor accounts. The token will be returned in the response. | [optional] 
**may_create_tripletex_accounts** | **bool** | Should the company we are creating be able to create new Tripletex accounts? | [optional] 
**number_of_vouchers** | **string** | Used to calculate prices. | 
**chart_of_accounts_type** | **string** | The chart of accounts to use for the new company | [optional] 
**auditor** | **bool** |  | [optional] 
**reseller** | **bool** |  | [optional] 
**accounting_office** | **bool** |  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


