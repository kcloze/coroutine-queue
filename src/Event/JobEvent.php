<?php
/**
 * This file is part of PHP CS Fixer.
 *
 * (c) kcloze <pei.greet@qq.com>
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Coroutine\Queue\Event;

use Swoft\Event\Event;

class JobEvent extends Event
{
    
    /**
     * @var Queue
     * @inheritdoc
     */
    public $sender;
    /**
     * @var string|null unique id of a job
     */
    public $id;
    /**
     * @var JobInterface
     */
    public $job;
    /**
     * @var int time to reserve in seconds of the job
     */
    public $ttr;



}