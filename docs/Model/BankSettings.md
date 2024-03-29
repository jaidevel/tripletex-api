# BankSettings

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** |  | [optional] 
**version** | **int** |  | [optional] 
**changes** | [**\Swagger\Client\Model\Change[]**](Change.md) |  | [optional] 
**url** | **string** |  | [optional] 
**tax_bank_agreement** | [**\Swagger\Client\Model\AutopayBankAgreement**](AutopayBankAgreement.md) |  | [optional] 
**remit_number_of_acceptors** | **int** | The remit number of acceptors. | [optional] 
**show_advice_currency_mismatch** | **bool** | The showAdviceCurrencyMismatch property. | [optional] 
**payment_with_unknown_kid_parse_option** | **string** | Setting for whether incoming AutoPay payments without KID should be automatically posted, sent to voucher reception or ignored. | [optional] 
**sign_auto_pay_with_bank_id** | **bool** | Setting for whether the user should have the option to sign payments and agreements with Bank ID in addition to 2FA. | [optional] 
**batch_booking_of_payments** | **bool** | Setting for the user to use or not the batch booking for payments. | [optional] 
**parse_entries_as_sum_posts** | **bool** | Setting for the user to choose if account statements entries should be parsed as sum posts or not. | [optional] 
**employees_with_direct_remit_access** | [**\Swagger\Client\Model\Employee[]**](Employee.md) | Employees with payment access | [optional] 
**days_before_payment_outdated** | **int** | Number of days before a payment is set as outdated | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


