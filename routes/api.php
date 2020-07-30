<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//user  authentication
Route::post('auth/signup', 'AuthController@register');
Route::post('auth/login', 'AuthController@login');
Route::post('auth/logout', 'AuthController@logout');
Route::post('auth/refresh/token', 'AuthController@refresh');


/*****************User Routes ******************/
// register User
Route::post('create', 'UserController@register');
Route::post('login', 'UserController@login');
Route::post('follow', 'UserController@followUser');
Route::post('unfollow', 'UserController@unFollowUser');
Route::get('users', 'UserController@getAllUsers');


/*****************Tip Routes ******************/
// List tips
Route::get('tips', 'TipController@getTips');

// List single tip
Route::get('tip/{id}', 'TipController@showTip');

// Create new tip
Route::post('tip', 'TipController@postTip');

// Update tip
Route::put('tip', 'TipController@putTip');

// Delete tip
Route::delete('tip/{id}', 'TipController@deleteTip');


/*****************Story Routes ******************/
// List stories
Route::get('stories', 'StoryController@getStories');

// List single story
Route::get('story/{id}', 'StoryController@showStory');

// Create new story
Route::post('story', 'StoryController@postStory');

// Update story
Route::put('story', 'StoryController@putStory');

// Delete story
Route::delete('story/{id}', 'StoryController@deleteStory');


/*****************Products Routes ******************/
// List products
Route::get('products', 'ProductController@getProducts');

// List single product
Route::get('product/{id}', 'ProductController@showProduct');

// Create new product
Route::post('product', 'ProductController@postProduct');

// Update product
Route::put('product', 'ProductController@putProduct');

// Delete product
Route::delete('product/{id}', 'ProductController@deleteProduct');


/*****************Jobs Routes ******************/
// List jobs
Route::get('jobs', 'JobController@getJobs');

// List single job
Route::get('job/{id}', 'JobController@showJob');

// Create new job
Route::post('job', 'JobController@postJob');

// Update job
Route::put('job', 'JobController@putJob');

// Delete job
Route::delete('job/{id}', 'JobController@deleteJob');



/*****************Adverts Routes ******************/
// List adverts
Route::get('adverts', 'AdvertController@getAdverts');

// List single advert
Route::get('advert/{id}', 'AdvertController@showAdvert');

// Create new advert
Route::post('advert', 'AdvertController@postAdvert');

// Update advert
Route::put('advert', 'AdvertController@putAdvert');

// Delete advert
Route::delete('advert/{id}', 'AdvertController@deleteAdvert');


/*****************Companies Routes ******************/
// List companies
Route::get('companies', 'CompanyController@getCompanies');

// List single company
Route::get('company/{id}', 'CompanyController@showCompany');

// Create new company
Route::post('company', 'CompanyController@postCompany');

// Update company
Route::put('company', 'CompanyController@putCompany');

// Delete company
Route::delete('company/{id}', 'CompanyController@deleteCompany');



/*****************Qualifications Routes ******************/
// List qualifications
Route::get('qualifications', 'QualificationController@getQualifications');

// List single qualification
Route::get('qualification/{id}', 'QualificationController@showQualification');

// Create new qualification
Route::post('qualification', 'QualificationController@postQualification');

// Update qualification
Route::put('qualification', 'QualificationController@putQualification');

// Delete qualification
Route::delete('qualification/{id}', 'QualificationController@deleteQualification');


/*****************Descriptions Routes ******************/
// List descriptions
Route::get('descriptions', 'DescriptionController@getDescriptions');

// List single description
Route::get('description/{id}', 'DescriptionController@showDescription');

// Create new description
Route::post('description', 'DescriptionController@postDescription');

// Update description
Route::put('description', 'DescriptionController@putDescription');

// Delete description
Route::delete('description/{id}', 'DescriptionController@deleteDescription');


Route::post('paragraph/tip/{id}', 'ParagraphController@postTipParagraph');
Route::post('paragraph/story/{id}', 'ParagraphController@postStoryParagraph');



/*****************Profile Routes ******************/
// Profile
Route::post('editProfile/{profileId}', 'ProfileController@putProfile');
Route::get('profile/{profileId}', 'ProfileController@viewProfie');
Route::get('userProfile/{userId}', 'ProfileController@getProfile');
/*****************Pofessions Routes ******************/
// Professions
Route::get('import', 'ProfessionController@import');
Route::get('professions', 'ProfessionController@getAllProfessions');


/*****************Education Routes ******************/
// Education
Route::get('educations', 'EducationController@getAllEducation');


/*****************Districts Routes ******************/
// Education
Route::get('districts', 'DistrictController@getAllDistricts');
