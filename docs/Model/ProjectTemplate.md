# ProjectTemplate

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** |  | [optional] 
**start_date** | **string** |  | [optional] 
**end_date** | **string** |  | [optional] 
**is_internal** | **bool** |  | [optional] 
**number** | **string** |  | [optional] 
**display_name_format** | **string** |  | [optional] 
**project_manager** | [**\Swagger\Client\Model\Employee**](Employee.md) |  | [optional] 
**department** | [**\Swagger\Client\Model\Department**](Department.md) |  | [optional] 
**main_project** | [**\Swagger\Client\Model\Project**](Project.md) |  | [optional] 
**project_category** | [**\Swagger\Client\Model\ProjectCategory**](ProjectCategory.md) |  | [optional] 
**reference** | **string** |  | [optional] 
**external_accounts_number** | **string** |  | [optional] 
**description** | **string** |  | [optional] 
**invoice_comment** | **string** | Comment for project invoices | [optional] 
**attention** | [**\Swagger\Client\Model\Contact**](Contact.md) | Customer in attention of person | [optional] 
**contact** | [**\Swagger\Client\Model\Contact**](Contact.md) | Customer contact person. | [optional] 
**customer** | [**\Swagger\Client\Model\Customer**](Customer.md) | The project&#39;s customer | [optional] 
**delivery_address** | [**\Swagger\Client\Model\DeliveryAddress**](DeliveryAddress.md) |  | [optional] 
**vat_type** | [**\Swagger\Client\Model\VatType**](VatType.md) | The default vat type for this project. | [optional] 
**currency** | [**\Swagger\Client\Model\Currency**](Currency.md) |  | [optional] 
**mark_up_order_lines** | **float** | Set mark-up (%) for order lines. | [optional] 
**mark_up_fees_earned** | **float** | Set mark-up (%) for fees earned. | [optional] 
**is_fixed_price** | **bool** | Project is fixed price if set to true, hourly rate if set to false. | [optional] 
**fixedprice** | **float** | Fixed price amount, in the project&#39;s currency. | [optional] 
**is_price_ceiling** | **bool** | Set to true if an hourly rate project has a price ceiling. | [optional] 
**price_ceiling_amount** | **float** | Price ceiling amount, in the project&#39;s currency. | [optional] 
**general_project_activities_per_project_only** | **bool** | Set to true if a general project activity must be linked to project to allow time tracking. | [optional] 
**for_participants_only** | **bool** | Set to true if only project participants can register information on the project | [optional] 
**project_hourly_rates** | [**\Swagger\Client\Model\ProjectHourlyRateTemplate[]**](ProjectHourlyRateTemplate.md) | Project Rate Types tied to the project. | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


