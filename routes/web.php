<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\Expense::class)->name('expense');
Route::get('/{expense}/details', \App\Livewire\ExpenseDetail::class)->name('expenseDetail');
