# MileageAllowance

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **int** |  | [optional] 
**version** | **int** |  | [optional] 
**changes** | [**\Swagger\Client\Model\Change[]**](Change.md) |  | [optional] 
**url** | **string** |  | [optional] 
**travel_expense** | [**\Swagger\Client\Model\TravelExpense**](TravelExpense.md) |  | [optional] 
**rate_type** | [**\Swagger\Client\Model\TravelExpenseRate**](TravelExpenseRate.md) |  | [optional] 
**rate_category** | [**\Swagger\Client\Model\TravelExpenseRateCategory**](TravelExpenseRateCategory.md) |  | [optional] 
**date** | **string** |  | 
**departure_location** | **string** |  | 
**destination** | **string** |  | 
**km** | **float** |  | [optional] 
**rate** | **float** |  | [optional] 
**amount** | **float** |  | [optional] 
**is_company_car** | **bool** |  | [optional] 
**vehicle_type** | **int** | The corresponded number for the vehicleType. Default value &#x3D; 0. | [optional] 
**passengers** | [**\Swagger\Client\Model\Passenger[]**](Passenger.md) | Link to individual passengers. | [optional] 
**passenger_supplement** | [**\Swagger\Client\Model\MileageAllowance**](MileageAllowance.md) | Passenger mileage allowance associated with this mileage allowance. | [optional] 
**trailer_supplement** | [**\Swagger\Client\Model\MileageAllowance**](MileageAllowance.md) | Trailer mileage allowance supplement associated with this mileage allowance. | [optional] 
**toll_cost** | [**\Swagger\Client\Model\Cost**](Cost.md) | Toll cost associated with this mileage allowance. | [optional] 
**driving_stops** | [**\Swagger\Client\Model\DrivingStop[]**](DrivingStop.md) | Link to individual mileage stops. | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


