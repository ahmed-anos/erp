<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ExpenseNotification extends Notification
{
    protected $expense;

    public function __construct($expense)
    {
        $this->expense = $expense;
    }

    public function via($notifiable)
    {
        return ['database']; // يمكن إضافة طرق أخرى مثل البريد الإلكتروني
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => 'تم إضافة مصروف جديد بقيمة ' . $this->expense->expense_price . ' وتحت وصف: ' ,
            'id' => $this->expense->id,
            'expense_price' => $this->expense->expense_price,
        ];
    }
}
