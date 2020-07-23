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
Route::post('auth/register', 'AuthController@register');
Route::post('auth/login', 'AuthController@login');
Route::post('auth/logout', 'AuthController@logout');
Route::post('auth/refresh/token', 'AuthController@refresh');


//Post End Points
Route::post('posts', ['uses' => 'PostController@getPosts']);
Route::post('myPosts', ['uses' => 'PostController@getMyPosts']);
Route::post('post', ['uses' => 'PostController@postPost']);
Route::get('post/{postId}', ['uses' => 'PostController@getPost']);
Route::put('post/{postId}', ['uses' => 'PostController@putPost']);
Route::delete('post/{posttId}', ['uses' => 'PostController@deletePost']);
Route::post('posts/tourism', ['uses' => 'PostController@getPostsTourism']);
Route::get('post/img/{posttId}', ['uses' => 'PostController@viewFile']);


//Category End Points
Route::get('categories', ['uses' => 'CategoryController@getCategories']);
Route::post('category', ['uses' => 'CategoryController@postCategory']);
Route::get('category/{categoryId}', ['uses' => 'CategoryController@getCategory']);
Route::put('category/{categoryId}', ['uses' => 'CategoryController@putCategory']);
Route::delete('category/{categorytId}', ['uses' => 'CategoryController@deleteCategory']);



//Routes of profile
Route::get('profiles', ['uses' => 'ProfileController@getProfiles']);
Route::post('profile/{userId}', ['uses' => 'ProfileController@postProfile']);
Route::get('profile/{profileId}', ['uses' => 'ProfileController@getProfile']);
Route::post('editProfile/{profileId}', ['uses' => 'ProfileController@putProfile']);
Route::delete('profile/{profileId}', ['uses' => 'ProfileController@deleteProfile']);
Route::get('profile/avatar/{profileId}', ['uses' => 'ProfileController@viewProfileImage']);


//Routes of Roles
Route::get('roles', ['uses' => 'RoleController@getRoles']);


//Like end-points
Route::post('like', ['uses' => 'LikeController@postLike']);
Route::get('like/{postId}', ['uses' => 'LikeController@getUsersWhoLikedPost']);
Route::get('like/{postId}/{userId}', ['uses' => 'LikeController@isLikedByMe']);


//Comment End Points
Route::get('comments', ['uses' => 'CommentController@getComments']);
Route::post('comment', ['uses' => 'CommentController@postComment']);
Route::get('comment/{commentId}', ['uses' => 'CommentController@getComment']);
Route::put('comment/{commentId}', ['uses' => 'CommentController@putComment']);
Route::delete('comment/{commenttId}', ['uses' => 'CommentController@deleteComment']);
