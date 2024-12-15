<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class ExpenseDetail extends Component
{
    public \App\Models\Expense $expense;
    public bool $showEditForm = false;
    public string $title;
    public string $remark;
    public float|int $amount;
    public bool $showConfirmDeleteModal = false;

    public function mount(\App\Models\Expense $expense): void
    {
        $this->expense = $expense;
        $this->title = $this->expense->title;
        $this->remark = $this->expense->remark;
        $this->amount = $this->expense->amount;
    }

    public function render(): View
    {
        return view('livewire.expense-detail', ['expense' => $this->expense]);
    }

    public function toggleEditForm(): void
    {
        $this->showEditForm = !$this->showEditForm;
    }

    public function update(): void
    {
        $this->validate([
            'title' => 'required',
            'remark' => '',
            'amount' => 'required|min:0|numeric',
        ]);

        $this->expense->update([
                'title' => $this->title,
                'remark' => $this->remark,
                'amount' => $this->amount]
        );
    }

    public function toggleConfirmDelete(): void
    {
        $this->showConfirmDeleteModal = !$this->showConfirmDeleteModal;
    }

    public function deleteConfirmed(): void
    {
        $this->expense->delete();
        $this->redirectRoute('expense');
    }
}
