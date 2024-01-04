# Content Delivery Framework
*A small and simple PHP MVC framework for content delivery.*

## Installation
To install, navigate to the latest release and download it from there. Composer is **off the table** as of _April 14, 2023_ but should future versions need it, it will be implemented.

## Routing
CDF has support for separate HTTP requests *(GET, POST, PUT, DELETE, etc.)* as long as the request type is *explicitly included* in the route.
### Route Format
There are two types of route formats for CDF:

 1. Route to Controller/Model
>     "{URI}" => ["{filepath to controller/route/view}", [
>         "{HTTP Request Type (GET, POST, etc.)}" => "{Function name in Class}",
>     ], "{Class name (include namespace if present)}", {boolean value but cdf only accepts if this value is true}],
 2. Route to View
>     "{URI}" => ["{filepath to controller/route/view}", ["{HTTP Request Type (GET)}"]],

## Database Support
CDF (as of release Dev-03) does not yet have support for other databases except for MySQL. 

## Controllers and Models
When creating a new controller or model manually, make sure to include their respective namespaces. (e.g. _cdf\Controllers_ or _cdf\Models_)
Until a command line interface has been created, this will have to be taken note of in case something does not work.

## Development Server
To start the PHP's development server, you can type in _php cdf serve_ in your terminal in the correct directory.