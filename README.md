
# Marav PHP Framework
**Marav PHP Framework** description goes here


# Files

Describe **Marav PHP Framework** file structure

# Setup

Instructions how to get started description goes here

## Step 1 - .htaccess

in *root* path, locate the **.htaccess** file and set the ***RewriteBase***  to your custom path
```text
RewriteBase /mypath/
```
**Example:**
```text
RewriteEngine On
RewriteBase /mypath/
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-l
    
RewriteRule ^([a-zA-z0-9/]+)$ index.php?resource=$1 [QSA,L]
    
RedirectMatch 404 /Marav/.+/.*$
ErrorDocument 404 /404.html
```

## Step 2 - Composer
To install **[Composer](https://getcomposer.org/)** please got to:

 - Marav/Libraries/

### Install Composer
From terminal
 ```bash  
> composer init
```
**Note:** Install your desired packages

### Set Autoload psr-4 to Marav Framework
At the end for the ***composer.json*** file generated the following
```json
"autoload": {
    "psr-4": {
        "Marav\\": "Marav"
    }
}
```

The file ***composer.json*** should look like the following:
```json
{
    "name": "vendor/name",
    "description": "description",
    "require": {
        "monolog/monolog": "^1.24"
    },
    "autoload": {
        "psr-4": {
            "Marav\\": "Marav"
        }
    }
}
```

# MVC

**Marav PHP Framework** works using the ***MVC*** paradigm.

Controllers are named with the following format
***[Page]Controller.php*** 

Models are named with the following format
***[Page]Model.php*** 

Viewss are named with the following format
***[Page]View.php*** 


## PageController.php

Controller have the following code:

```php
namespace Marav\Controller;

class Home extends Controller
{
    protected $header;

    public function __construct()
    {
        $this->getHeader(int Code);
        or
        $this->getView([required] string ViewName, [optional] string HeaderName, [optional] string FooterName);
    }
}
```
### Web View -- $this->getView()
This method is inherited from Controller and has the following syntax depending on the action needed.

It means that an HTML format is required. It has three ***required*** parameters:

 1. View: A page with content
    - ***string***
    - lowercase
    - just the name of the View (without the word View)
    - example:
        - ```'home'```
2. Header: A custom HTML Header
    - ***string***
    - lowercase
    - just the name of the Header (without the word Header)
    - example:
    ```php
        'home'
    ``` 
    - if no header needed, leave empty
    - example:
    ```php
        ''
    ``` 
3. Footer: Custom Footer
    - ***string***
    - lowercase
    - just the name of the Footer(without the word Footer)
    - example:
    ```php
        'home'
    ``` 
    - if no footer needed, leave empty
    - example:
    ```php
        ''
    ``` 

The syntax is as following:

```php
$this->getView('home', 'header', 'footer');
```

By naming your own Header and Footer, helps you define different headers or footers and have different styles, depending if it's a access controlled session you may need a different header, etc.

#### HTTP View -- $this->getHeader()
This method is inherited from Controller and is an *Object* which invokes the ***Headers*** Class.

To get an HTTP Header using this method do:

- Getting Header By Status Code
Just needs to call the ***getHeaderByStatusCode*** method
```php
$this->getHeader()->getHeaderByStatusCode([int] StatusCode)
```
It means that an HTML format is **not** required. It has **1** ***required*** parameter:

 1. Status Code: A status code number
    - ***int***
    - just the number of the Status Code Header
    - example:
    ~~~
    200
    ~~~

The syntax is as following:

```php
$this->getHeader()->getHeaderByStatusCode(200);
```

The other method that can be called is the Not Found and Redirect, which was created for 404 Error Pages using HTML 

Just needs to call the ***getHeaderNotFoundAndRedirect*** method
```php
$this->getHeader()->getHeaderNotFoundAndRedirect()
```






# Usage