<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewAnswerNotification extends Mailable
{
    use Queueable, SerializesModels;

    protected $question;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($question)
    {
        $this->question = $question;
    }
    public function via($notifiable)
    {
        return ['mail'];
    }
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('您的問題已獲得回覆')
            ->greeting('親愛的會員')
            ->line('您的問題已獲得回覆。')
            ->line('問題標題：' . $this->question->title)
            ->line('回覆內容：' . $this->question->answers->first()->answer)
            ->action('查看回覆', route('question.show', $this->question->id))
            ->line('感謝您的支持！');
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $greeting = '親愛的會員';
        return $this->subject('您的問題已獲得回覆')
                    ->with(['greeting' => $greeting, 'question' => $this->question])
                    ->view('emails.adminReply-notification');
    }
}
