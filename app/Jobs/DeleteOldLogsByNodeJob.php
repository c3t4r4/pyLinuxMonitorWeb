<?php

namespace App\Jobs;

use App\Models\Node;
use App\Services\ServiceDeleteOldRecords;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class DeleteOldLogsByNodeJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private Node $node;
    public function __construct(String $node_id)
    {
        $this->node = Node::find($node_id)->first();
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if(!empty($this->node)){
            ServiceDeleteOldRecords::RemoveByNode($this->node);
        }
    }
}
