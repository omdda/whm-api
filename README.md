Whm API
====

Execute WHM and Cpanel operation with  API by PHP


Installation
------------

Install the latest version with:

```bash
$ composer require  emad-mohammed/whm-api
```


Requirements
------------

* PHP 7.0 or higher is required


Supported Operations for Now 
----------------------------
* WHM
  * Accounts
    * Get all Cpanel  account
    * Create new Cpanel user
    * Delete Cpanel user
    * Get suspensions Cpanel users
    * Suspend Cpanel user
    * Unsuspend Cpanel user
  * Services
    * Restart service
    * Enable service
    * Disable service
    * Get service Status
    * Get service configuration
  * Mail
    * Get email accounts of Cpanel user
* Cpanel 
   * there is not supported operation for now

Basic usage
-----------
```php
// All API Calls made throw HTTPS 
use \EmadMohammed\WHMAPI\base\WHMClient ;
$ipOrDomain = "YOUR_IP_OR_DOMAIN"; // IP is preferred , we take care of get Domain
$user  = 'root' ; //  for example
$token = "YOUR_TOKEN" ; //
$whmClient = new WHMClient($ipOrDomain , $user , $token);

//--------- Accounts ---------//

// get All Cpanel users
var_dump($whmClient->accountsManagementInstance()->all());

// Create Cpanel users
$diskSizeInMegaBytes = 500; // Default unlimited
var_dump ($whmClient->accountsManagementInstance()->create("USER_NAME" , "PASSWORD" , $diskSizeInMegaBytes));
 
// get All suspended Cpanel users
var_dump ($whmClient->accountsManagementInstance()->suspensions());

// suspend Cpanel user
var_dump ($whmClient->accountsManagementInstance()->suspendCpanelUser("CPANEL_USER_NAME"));

// suspend Cpanel users
var_dump ($whmClient->accountsManagementInstance()->unsuspendCpanelUser("CPANEL_USER_NAME"));

// delete Cpanel users
var_dump ($whmClient->accountsManagementInstance()->delete("CPANEL_USER_NAME"));

//----------- Services -----------//

/**
*  EmadMohammed\WHMAPI\whm\services\Services class contain some service name , You can use it or pass service's Name 
 */

// restart service
var_dump ($whmClient->servicesManagementInstance()->restartService(\EmadMohammed\WHMAPI\whm\services\Services::HTTP));

// Disable Service
var_dump ($whmClient->servicesManagementInstance()->disableService(\EmadMohammed\WHMAPI\whm\services\Services::FTP));

// Enable Service
var_dump ($whmClient->servicesManagementInstance()->enableService(\EmadMohammed\WHMAPI\whm\services\Services::FTP));

// Get Service Config
var_dump ($whmClient->servicesManagementInstance()->getServiceConfig(\EmadMohammed\WHMAPI\whm\services\Services::FTP));

// Get Service Status
var_dump ($whmClient->servicesManagementInstance()->getServiceStatus(\EmadMohammed\WHMAPI\whm\services\Services::FTP));

//------- Mail --------//

// Get email accounts of Cpanel user
var_dump ($whmClient->mailManagementInstance()->getEmailAccountsOfCpanelUser("CPANEL_USER_NAME"));

```

Note
----
  If you need any non exists operation , you are welcome to order it . <br>
  Contact me on : <br>
  &nbsp;&nbsp;Email : [admin@omdda.com](mailto:admin@omdda.com) <br>
  &nbsp;&nbsp;whatsapp : [+966500444298](https://wa.me/966500444298)

License
-------
emad-mohammed/whm-api is licensed under the MIT License.
