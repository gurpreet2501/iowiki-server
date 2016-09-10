<? $this->load->view('manual/partials/header') ?>
<div class="container" id="markdown">

<?=htmlentities($title)?>

=====


## Manage Product Categories

###Adding a new Category

- Go To `Categories` from left side menu.
- Press `Add Categories` button
- Add `Category Name` and press save.

###Edit Category

- Go To `Categories` from left side menu.
- Choose from the list of `Categories` and press edit in front of it.
- Edit `Category Name` and press  `Update changes`.


###Delete Category

- Go To `Categories` from left side menu.
- Choose from the list of Categories and press `Delete` in front of it.

**Note: A deleted category is deleted forever and cannot be restored.**
**Note: If some products are using deleted category, they will be displayed as uncategorised in reports and website.**


##Manage Products
###Adding a new Product

- Go To `Products` from left side menu.
- Press `Add Products` button.
- Enter the required product details.

####Detailed explanation of each input is described below.

SKU: Stock Keeping Unit.

Product name: Title of the product. It will be displayed as it is in reports and website.

Price: Price of product. All the `discounts and taxes` will be calculated based on this price.

Discounts: A product can have multiple discounts. For example you can have Festival Discount, Bulk Buy
Discount and Rebate. Please follow the guide below to Manage discounts.

##Manage Product Discounts

###Discount Types

First step is to create discount types. Decide on what different discount types a product can have e.g. Festival Discount, Credit Discount, Bulk Purchase. Next add all these discounts in system.

####Adding a new Discount Type
- Go To `Discount Types` from left side menu.
- Press `Add Discount` button.
- Enter the title for Discount. This will be displayed as on reports and website.

####Edit Discount Type
- Go To `Discount Types` from left side menu.
- Choose the Discount type you want to edit and press `Edit` button.
- Updated the title for discount and press `Update changes`.

####Delete Discount Type
- Go To `Discount Types` from left side menu.
- Choose the Discount type you want to delete and press `Delete` button.

**Note: A deleted discount cannot be restored.**
**Note: If any product is using that discount it will deleted from there as well.**
**Note: If an order is placed with discount before it was deleted. The discount will still be considered while calculating final price. However any new orders will not be able to use that discount.**

##Adding new Product Discount

- Press `Manage Discounts`
- A new Popup window should appear. Press `Add Discounts`.
- Enter 

Minimum Quantity: Set the minimum Quantity of purchase when the discount is applied. For example if you set this value to 100. The discount will not be applied untill user purchases 100 unit of the product.











### Sending Data and Files

Unless specified otherwise

- Send text data to API using `HTTP POST` method with `key:value pairs`.
- Send files using `Content-Type multipart/form-data`.

### Single API requests

- Every API is first built as single API.
- Every API has a unique name and fixed set of variables it accepts.

A typical API request should look like this

    SEND POST : http://api.fixtrepair.com/v1/r

    POST DATA : {
                  api       : login,
                  email     : dev@fixtpro.com,
                  password  : mypassword
                }

### Single API response
Single API will have a fixed structure for response. If you find API is not returning this fixed structure it should be reported as bug.

A typical API response look like this.

    {
      "STATUS": "SUCCESS",
      "RESPONSE": {
        "id": "109",
        "token": "$2y$10$3eU5QGOKTnRkVLlvCOWLKOGcQJ86CaQypK1T6OXhAYDc1Kfp8r0Mi",
      },
      "REQUEST": {
        "email": "example@gmail.com",
        "password": "pass12345",
        "api": "login"
      },
      "ERRORS": null,
      "NOTICES": null
    }

Always check for `STATUS` key to determine the success and failure of request. It returns `SUCCESS|FAILED`. `REQUEST` key always holds the request data it received. It will help you debug.

### Authenticated Requests

There is a simple token system for authenticated requests. Its a two step process.

**Step 1:** Get a token from login API and save it under some local storage.

    SEND POST : http://api.fixtrepair.com/v1/r

    POST DATA : {
                  api       : login,
                  email     : dev@fixtpro.com,
                  password  : mypassword
                }
                
                
**Step 2:** Call an Authenticated API by passing the token with it

    SEND POST : http://api.fixtrepair.com/v1/r

    POST DATA : {
                  api       : update,
                  object    : users,
                  token     : [saved token],
                  first_name: CorrectName,
                }
               
### Batch Requests

With Batch Requests you can do more than one requests with a single HTTP fetch. This will help reduce the waiting times for users. It will also some code lines as well.


##### Authenticated Batch Requests
You can set a token globally for batch requests it will be applied to all the APIs under it.

A typical Batch request and response looks like this.

    SEND POST : http://api.fixtrepair.com/v1/b

    POST DATA : {
                  token      : [token],
                  request1   : {
                    api: update,
                    object: users,
                    first_name: Mike
                  },
                  request2   : {
                    api: read,
                    object: users,
                    where: {
                      first_name: Mike
                    },
                  },
                }
                
    --------            
    RESPONSE
    --------   
    
    {
      "request1": {
        "STATUS": "SUCCESS",
        "RESPONSE": {
          "id": "108",
          "email": "test1@gmail.com",
          "first_name": "Mike",
        },
        "REQUEST": {
          "api": "update",
          "object": "users",
          "first_name": "Mike"
        },
        "ERRORS": null,
        "NOTICES": null
      },
      "request2": {
        "STATUS": "SUCCESS",
        "RESPONSE": [
          {
            "first_name": "Mike"
          }
        ],
        "REQUEST": {
          "api": "read",
          "object": "users",
          "where": {
            "first_name": "Mike"
          },
          "select": "first_name"
        },
        "ERRORS": null,
        "NOTICES": null
      }
    }
    
### Help and Support

Postman Client's export file is regularly updated.

    http://api.fixtrepair.com/fixt.postman_collection

For any questions/help post at `hipchat` or email `arshdeep79@gmail.com`

</div>
<? $this->load->view('manual/partials/footer') ?>