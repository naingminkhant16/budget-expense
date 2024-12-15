<?php

namespace App\Livewire;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Livewire\Component;

class Expense extends Component
{
    public string $title;
    public string $remark;
    public float|int $amount;
    public Collection $expenses;
    public $total = 0;

    public function render(): View
    {
        return view('livewire.expense', ['expenses' => $this->expenses]);
    }

    public function mount(): void
    {
        $this->expenses = \App\Models\Expense::orderBy('created_at', 'desc')->get();
        $this->calculateTotal();
    }

    public function calculateTotal(): void
    {
        $this->expenses->each(function ($expense) {
            $this->total += $expense->amount;
        });
    }

    public function save(): void
    {
        $this->validate([
            'title' => 'required',
            'remark' => '',
            'amount' => 'required|min:0|numeric',
        ]);

        \App\Models\Expense::create([
                'title' => $this->title,
                'remark' => $this->remark,
                'amount' => $this->amount]
        );

        $this->reset();
    }
}
