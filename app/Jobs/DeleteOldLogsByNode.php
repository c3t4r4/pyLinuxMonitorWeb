<?php

namespace App\Jobs;

use App\Models\Node;
use App\Services\ServiceDeleteOldRecords;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class DeleteOldLogsByNode implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private Node $node;
    public function __construct(Node $node)
    {
        $this->node = $node;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        ServiceDeleteOldRecords::RemoveByNode($this->node);
    }
}
