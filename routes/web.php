<?php

Route::get('/', 'PagesController@home')->name('home');
Route::get('/contact', 'PagesController@contact')->name('contact');

// guest routes
Route::middleware('guest')->group(function() {
	Route::get('auth/login', 'Auth\LoginController@loginForm')->name('auth.login');
	Route::post('auth/login', 'Auth\LoginController@login')->name('auth.login');

	Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
	Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
	Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
	Route::post('password/reset', 'Auth\ResetPasswordController@reset');
});

// auth routes
Route::middleware('auth')->group(function() {
	Route::get('auth/logout', 'Auth\LoginController@logout')->name('auth.logout');

	Route::get('settings/personal', 'Settings\PersonalSettingsController@personalSettings')->name('settings.personal');
	Route::post('settings/personal/profile', 'Settings\PersonalSettingsController@updateProfileSettings')->name('settings.personal.profile');
	Route::post('settings/personal/password', 'Settings\PersonalSettingsController@updatePasswordSettings')->name('settings.personal.password');

	Route::get('reports/income', 'Reports\IncomeReportController@index')->name('reports.income');
	Route::get('reports/income/download', 'Reports\IncomeReportController@download')->name('reports.income.download');
	Route::get('reports/expense', 'Reports\ExpenseReportController@index')->name('reports.expense');
	Route::get('reports/expense/download', 'Reports\ExpenseReportController@download')->name('reports.expense.download');

	Route::get('expenses', 'ExpenseController@index')->name('expenses');
	Route::get('expenses/add', 'ExpenseController@add')->name('expenses.add');
	Route::post('expenses/add', 'ExpenseController@store')->name('expenses.add');
	Route::get('expenses/{id}/edit', 'ExpenseController@edit')->name('expenses.edit');
	Route::post('expenses/{id}/edit', 'ExpenseController@update')->name('expenses.edit');
	Route::get('expenses/{id}/delete', 'ExpenseController@delete')->name('expenses.delete');

	Route::get('dashboard', 'DashboardController@index')->name('dashboard');

	Route::get('bookings/add', 'BookingController@add')->name('bookings.add');
	Route::post('bookings/add', 'BookingController@saveInSession')->name('bookings.add');
	Route::get('bookings/review', 'BookingController@review')->name('bookings.review');
	Route::get('bookings/save', 'BookingController@store')->name('bookings.save');
	Route::get('bookings/cancel', 'BookingController@cancel')->name('bookings.cancel');
	Route::get('bookings/{id}', 'BookingController@view')->name('bookings.view');
	Route::get('bookings/{id}/delete', 'BookingController@delete')->name('bookings.delete');
	Route::get('bookings/{id}/edit', 'BookingController@edit')->name('bookings.edit');
	Route::post('bookings/{id}/edit', 'BookingController@update')->name('bookings.edit');
	Route::get('bookings/{id}/payments', 'PaymentController@index')->name('bookings.payments');
	Route::get('bookings/{id}/payments/add', 'PaymentController@add')->name('bookings.payments.add');
	Route::post('bookings/{id}/payments/add', 'PaymentController@store')->name('bookings.payments.add');
	Route::get('bookings/{id}/payments/{paymentId}', 'PaymentController@edit')->name('bookings.payments.edit');
	Route::post('bookings/{id}/payments/{paymentId}', 'PaymentController@update')->name('bookings.payments.edit');
	Route::get('bookings/{id}/payments/{paymentId}/delete', 'PaymentController@delete')->name('bookings.payments.delete');

	Route::get('clients', 'ClientsController@index')->name('clients');

	// only admin routes
	Route::middleware('admin')->group(function() {
		Route::get('settings/global', 'Settings\GlobalSettingsController@globalSettings')->name('settings.global');
		Route::post('settings/global', 'Settings\GlobalSettingsController@updateGlobalSettings')->name('settings.global');

		Route::get('users', 'UsersController@index')->name('users');
		Route::get('users/add', 'UsersController@add')->name('users.add');
		Route::post('users/add', 'UsersController@store')->name('users.add');

		Route::get('users/{id}/edit', 'UsersController@edit')->name('users.edit');
		Route::post('users/{id}/edit', 'UsersController@update')->name('users.edit');
		Route::get('users/{id}/delete', 'UsersController@delete')->name('users.delete');

		Route::get('expense-categories', 'ExpenseCategoriesController@index')->name('expenseCategories');
		Route::get('expense-categories/add', 'ExpenseCategoriesController@add')->name('expenseCategories.add');
		Route::post('expense-categories/add', 'ExpenseCategoriesController@store')->name('expenseCategories.add');

		Route::get('expense-categories/select', 'ExpenseCategoriesController@select')->name('expenseCategories.select');
		Route::post('expense-categories/select', 'ExpenseCategoriesController@saveSelected')->name('expenseCategories.select');

		Route::get('event-types', 'EventTypesController@index')->name('eventTypes');
		Route::get('event-types/add', 'EventTypesController@add')->name('eventTypes.add');
		Route::post('event-types/add', 'EventTypesController@store')->name('eventTypes.add');

		Route::get('event-types/select', 'EventTypesController@select')->name('eventTypes.select');
		Route::post('event-types/select', 'EventTypesController@saveSelected')->name('eventTypes.select');
	});

	// only manager routes
	Route::middleware('manager')->group(function() {
		// nothing yet
	});
});
