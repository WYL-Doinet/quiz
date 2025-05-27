<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class QuizAssignedCompletedEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(protected User $user)
    {
        //
    }

    public function broadcastOn(): array
    {
        return [
            new Channel('quiz-assigned-completed'),
        ];
    }

    public function broadcastAs(): string
    {
        return 'assign.finished'; 
    }

    public function broadcastWith()
    {
        return [
            'message' =>  $this->user->name. ' have completed the quiz'
        ];
    }
}
