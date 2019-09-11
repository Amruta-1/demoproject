<?php 

return [ 
    'client_id' => env('PAYPAL_CLIENT_ID','AeXVuXRYT6Ez6ODzCRsPWdMQXo684kSgatHKe7hORm3dNZwZpVdYBkK8eDPyC7swgP1AaPsdLiiEn7VV'),
    'secret' => env('PAYPAL_SECRET','ECJ_PxEQyCIzzdyw8rfwAYrfFJQ320X1GHftgwJJZrbgaR4nfcJFEDYwxzbBGv7fNIG_4RUMIoMx2n7x'),
    'settings' => array(
        'mode' => env('PAYPAL_MODE','sandbox'),
        'http.ConnectionTimeOut' => 30,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'ERROR'
    ),
];