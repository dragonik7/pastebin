<?php

declare(strict_types=1);

use App\Models\Code;
use App\Orchid\Screens\Code\CodeEditScreen;
use App\Orchid\Screens\Code\CodeListScreen;
use App\Orchid\Screens\PlatformScreen;
use App\Orchid\Screens\Reports\ReportListScreen;
use App\Orchid\Screens\Role\RoleEditScreen;
use App\Orchid\Screens\Role\RoleListScreen;
use App\Orchid\Screens\User\UserEditScreen;
use App\Orchid\Screens\User\UserListScreen;
use App\Orchid\Screens\User\UserProfileScreen;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the need "dashboard" middleware group. Now create something great!
|
*/

// Main

Route::screen('/main', PlatformScreen::class)
	->name('platform.main');

// Platform > Profile
Route::screen('profile', UserProfileScreen::class)
	->name('platform.profile')
	->breadcrumbs(fn(Trail $trail) => $trail
		->parent('platform.index')
		->push(__('Profile'), route('platform.profile')));

// Platform > System > Users
Route::screen('users', UserListScreen::class)
	->name('platform.systems.users')
	->breadcrumbs(fn(Trail $trail) => $trail
		->parent('platform.index')
		->push(__('Users'), route('platform.systems.users')));

// Platform > System > Users > User
Route::screen('users/{user}/edit', UserEditScreen::class)
	->name('platform.systems.users.edit')
	->breadcrumbs(fn(Trail $trail, $user) => $trail
		->parent('platform.systems.users')
		->push($user->name, route('platform.systems.users.edit', $user)));

// Platform > System > Users > Create
Route::screen('users/create', UserEditScreen::class)
	->name('platform.systems.users.create')
	->breadcrumbs(fn(Trail $trail) => $trail
		->parent('platform.systems.users')
		->push(__('Create'), route('platform.systems.users.create')));

// Platform > System > Code
Route::screen('/codes', CodeListScreen::class)
	->name('platform.systems.codes')
	->breadcrumbs(fn(Trail $trail) => $trail
		->parent('platform.index')
		->push('Codes', route('platform.systems.codes')));

// Platform > System > Code > Create
Route::screen('codes/create', CodeEditScreen::class)
	->name('platform.systems.codes.create')
	->breadcrumbs(fn(Trail $trail) => $trail
		->parent('platform.systems.codes')
		->push('Create', route('platform.systems.codes.create')));

// Platform > System > Code > Edit
Route::screen('codes/{code}/edit', CodeEditScreen::class)
	->name('platform.systems.codes.edit')
	->breadcrumbs(fn(Trail $trail, Code $code) => $trail
		->parent('platform.systems.codes')
		->push($code->id, route('platform.systems.codes.edit', $code)));

// Platform > System > Report
Route::screen('/reports', ReportListScreen::class)
	->name('platform.systems.reports')
	->breadcrumbs(fn(Trail $trail) => $trail
		->parent('platform.index')
		->push('Reports', route('platform.systems.reports')));

// Platform > System > Roles > Role
Route::screen('roles/{role}/edit', RoleEditScreen::class)
	->name('platform.systems.roles.edit')
    ->breadcrumbs(fn (Trail $trail, $role) => $trail
        ->parent('platform.systems.roles')
        ->push($role->name, route('platform.systems.roles.edit', $role)));

// Platform > System > Roles > Create
Route::screen('roles/create', RoleEditScreen::class)
    ->name('platform.systems.roles.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.systems.roles')
		->push(__('Create'), route('platform.systems.roles.create')));

// Platform > System > Roles
Route::screen('roles', RoleListScreen::class)
	->name('platform.systems.roles')
	->breadcrumbs(fn(Trail $trail) => $trail
		->parent('platform.index')
		->push(__('Roles'), route('platform.systems.roles')));

// Example...
//Route::screen('example', ExampleScreen::class)
//    ->name('platform.example')
//    ->breadcrumbs(fn (Trail $trail) => $trail
//        ->parent('platform.index')
//        ->push('Example screen'));
//
//Route::screen('example-fields', ExampleFieldsScreen::class)->name('platform.example.fields');
//Route::screen('example-layouts', ExampleLayoutsScreen::class)->name('platform.example.layouts');
//Route::screen('example-charts', ExampleChartsScreen::class)->name('platform.example.charts');
//Route::screen('example-editors', ExampleTextEditorsScreen::class)->name('platform.example.editors');
//Route::screen('example-cards', ExampleCardsScreen::class)->name('platform.example.cards');
//Route::screen('example-advanced', ExampleFieldsAdvancedScreen::class)->name('platform.example.advanced');
//
////Route::screen('idea', Idea::class, 'platform.screens.idea');
