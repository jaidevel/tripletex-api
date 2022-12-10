# Reminder

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** |  | [optional] 
**version** | **int** |  | [optional] 
**changes** | [**\Swagger\Client\Model\Change[]**](Change.md) |  | [optional] 
**url** | **string** |  | [optional] 
**reminder_date** | **string** | Creation date of the invoice reminder. | [optional] 
**charge** | **float** | The fee part of the reminder, in the company&#39;s currency. | [optional] 
**charge_currency** | **float** | The fee part of the reminder, in the invoice currency. | [optional] 
**total_charge** | **float** | The total fee part of all reminders, in the company&#39;s currency. | [optional] 
**total_charge_currency** | **float** | The total fee part of all reminders, in the invoice currency. | [optional] 
**total_amount_currency** | **float** | The total amount to pay in reminder&#39;s currency. | [optional] 
**interests** | **float** | The interests part of the reminder. | [optional] 
**interest_rate** | **float** | The reminder interest rate. | [optional] 
**term_of_payment** | **string** | The reminder term of payment date. | 
**currency** | [**\Swagger\Client\Model\Currency**](Currency.md) | The reminder currency. | [optional] 
**type** | **string** |  | 
**comment** | **string** |  | [optional] 
**kid** | **string** | KID - Kundeidentifikasjonsnummer. | [optional] 
**bank_account_number** | **string** |  | [optional] 
**bank_account_iban** | **string** |  | [optional] 
**bank_account_swift** | **string** |  | [optional] 
**bank** | **string** |  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


