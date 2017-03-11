<?php

Route::get('/searchCityName/{name}', ['uses' => 'CityController@searchCityName']);

Route::get('/searchCityByCoords', ['uses' => 'CityController@searchCityByCoords']);

Route::post('/saveFavouriteCity', ['uses' => 'FavouriteCitiesController@saveFavouriteCity']);

Route::get('/showFavouriteCities', ['uses' => 'FavouriteCitiesController@showFavouriteCities']);

Route::delete('/deleteFavouriteCity/{id}', ['uses' => 'FavouriteCitiesController@deleteFavouriteCity']);

Route::get('/getForecast/{id}/{date}', ['uses' => 'ForecastController@getForecast']);