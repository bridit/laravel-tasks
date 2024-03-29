<?php

namespace Bridit\Laravel\Tasks;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldQueue;

class QueueableTask implements ShouldQueue
{
  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

  /**
   * @var array $taskParams
   */
  protected $taskParams;

  /**
   * QueueableTask constructor.
   * @param mixed ...$params
   */
  public function __construct(...$params)
  {
    $this->taskParams = $params;
  }

  public function handle()
  {
    if (method_exists($this, 'execute')) {
      $this->execute(...$this->taskParams);
    }
  }

}
