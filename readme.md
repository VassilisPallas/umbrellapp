## Umbreallpp

**Installation**



**Documentation**

**Search City By Name**
----
  Returns json data about a given city name

* **URL**

  /searchCityName/:name

* **Method:**

  `GET`
  
*  **URL Params**

   **Required:**
 
   `name=[string]`

* **Data Params**

  None

* **Success Response:**

  * **Code:** 200 <br />
    **Content:**
      ```json
        
        [ 
           { 
              "id": 264371, 
              "name": "Athens", 
              "country": "GR", 
              "lat": "23.71622", 
              "lon": "37.97945" 
           } 
        ]
    
      ```
 
* **Error Response:**

  * **Code:** 404 NOT FOUND <br />
    **Content:** 
      ```json
        { "status": "city not found" }
      ```

     OR
   
  * **Code:** 422 UNPROCESSABLE ENTITY <br />
    **Content:** 
      ```json
        { "status": "name is missing" }
      ``` 
      
**Search City By Coordinates**
----
  Returns json data about a city by given coordinates

* **URL**

  /searchCityByCoords/:lat/:lng

* **Method:**

  `GET`
  
*  **URL Params**

   **Required:**
 
   `lat=[float]`
   
   `lng=[float]`

* **Data Params**

  None

* **Success Response:**

  * **Code:** 200 <br />
    **Content:**
      ```json
      
        [ 
           { 
              "id": 264371, 
              "name": "Athens", 
              "country": "GR", 
              "lat": "23.71622", 
              "lon": "37.97945" 
           }
        ]
    
      ```
 
* **Error Response:**

  * **Code:** 404 NOT FOUND <br />
    **Content:** 
      ```json
        { "status": "city not found" }
      ```
  
     OR
   
  * **Code:** 422 UNPROCESSABLE ENTITY <br />
    **Content:** 
      ```json
        { "status": "data are missing" }
      ```   
      
**Save Favourite City**
----
  Save favourite city by id

* **URL**

  /saveFavouriteCity

* **Method:**

  `POST`
  
*  **URL Params**
 
   None

* **Data Params**

  **Payload:**

  ```json
   { 
     "id": [integer] 
   }
  ```
  
  **Example:**
  
    ```json
     { 
       "id": 264371
     }
    ```

* **Success Response:**

  * **Code:** 200 <br />
    **Content:**
      ```json
        { 
              "status": "favourite city inserted"
        }
      ```
 
* **Error Response:**

  * **Code:** 409 CONFLICT <br />
    **Content:** 
      ```json
       { "status": "city is already in favourite list" }
      ```
  
     OR
   
  * **Code:** 422 UNPROCESSABLE ENTITY <br />
    **Content:** 
      ```json
        { "id": ["id is missing"] }
      ``` 
     
**Show Favourite Cities**
----
  Returns json data about favourite cities

* **URL**

  /showFavouriteCities

* **Method:**

  `GET`
  
*  **URL Params**
 
   None

* **Data Params**

  None

* **Success Response:**

  * **Code:** 200 <br />
    **Content:**
      ```json
      
        [ 
          { 
            "id": 264371, 
            "name": "Athens", 
            "country": "GR", 
            "lat": "23.71622", 
            "lon": "37.97945",
            "country_name": "Greece"
          }
        ]
    
      ```
 
* **Error Response:**

  * **Code:** 500 INTERNAL SERVER ERROR <br />
    **Content:** 
      ```json
       { "status": "an error occurred while retrieving favourite cities" }
      ```
      
**Delete Favourite City**
----
  Delete favourite city by id

* **URL**

  /deleteFavouriteCity

* **Method:**

  `DELETE`
  
*  **URL Params**
 
   **Required:**
    
   `id=[integer]`

* **Data Params**

  None

* **Success Response:**

  * **Code:** 200 <br />
    **Content:**
      ```json
        { "status": "favourite city deleted" }
      ```
 
* **Error Response:**

  * **Code:** 404 NOT FOUND <br />
    **Content:** 
      ```json
       { "status": "city not found" }
      ```
 
     OR
   
  * **Code:** 422 UNPROCESSABLE ENTITY <br />
    **Content:** 
      ```json
        { "status": "id is missing" }
      ```  
      
**Get City Forecast**
----
  Returns json data about a city forecast

* **URL**

  /getForecast/:id/:date

* **Method:**

  `GET`
  
*  **URL Params**
 
   **Required:**
    
   `id=[integer]`
   
   `date=[timestamp]]`

* **Data Params**

  None

* **Success Response:**

  * **Code:** 200 <br />
    **Content:**
      ```json
      
        { 
           "id": 2225, 
           "time": "2014-03-15 06:26:10", 
           "temperatures": 
           [ 
             { "id": 36162, 
             "dt": "2014-03-15 10:00:00", 
             "temperature": 
               { 
                "id": 36162, 
                "min": 276.15, 
                "max": 289.15 
               } 
             }
           ], 
           "weathers": 
           [ 
             {
               "id": 36162, 
               "dt": "2014-03-15 10:00:00", 
               "weather": 
                 { 
                   "id": 800, 
                   "main": "Clear", 
                   "description": "sky is clear", 
                   "icon": "01d" 
                 } 
                }
           ],
           "city": 
             { 
               "id": 735563, 
               "name": "Kozani", 
               "country": "GR", 
               "lat": "21.78639", 
               "lon": "40.30111" 
             }
        }
    
      ```
 
* **Error Response:**

  * **Code:** 404 NOT FOUND <br />
    **Content:** 
      ```json
       { "status": "forecast not found" }
      ```
      
     OR
   
  * **Code:** 422 UNPROCESSABLE ENTITY <br />
    **Content:** 
      ```json
        { "status": "data are missing" }
      ``` 