<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewQuestionNotification extends Notification
{
    use Queueable;
    protected $questionData;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(array $questionData)
    {
        $this->questionData = $questionData;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','mail'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => '有新的問題提交',
            'content' => '問題標題：'. $this-> question->title,
            'link'=>route('question.show', $this->question->id)
        ];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('有新的問題提交')
                    ->view('emails.question-notification',['questionData' => $this->questionData]);

    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
