<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
    'as'=>'listeSujets',
    'uses'=>'lesControllers@listeSujets'
]);

Route::get('listeSujets', [
    'as'=>'listeSujets',
    'uses'=>'lesControllers@listeSujets'
]);

Route::get('ajouterSujet', [
    'as'=>'ajouterSujet',
    'uses'=>'lesControllers@ajouterSujet'
]);

Route::get('deleteSujet/{id}', [
    'as'=>'deleteSujet',
    'uses'=>'lesControllers@deleteSujet'
]);

Route::get('deleteComment/{id}', [
    'as'=>'deleteComment',
    'uses'=>'lesControllers@deleteComment'
]);

Route::get('commentaires/{sid}', [
    'as'=>'commentaires',
    'uses'=>'lesControllers@commentaires'
]);

Route::post('validerSujet', [
    'as'=>'validerSujet',
    'uses'=>'lesControllers@validerSujet'
]);

Route::post('validerCommentaire', [
    'as'=>'validerCommentaire',
    'uses'=>'lesControllers@validerCommentaire'
]);
