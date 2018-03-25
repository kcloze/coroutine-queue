<?php
/**
 * This file is part of PHP CS Fixer.
 *
 * (c) kcloze <pei.greet@qq.com>
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Coroutine\Queue\Driver;


use Coroutine\Queue\Queue as BaseQueue;


abstract class Queue extends BaseQueue 
{
    /**
     * @event WorkerEvent
     * 
     */
    const EVENT_WORKER_START = 'workerStart';
    /**
     * @event WorkerEvent
     * 
     */
    const EVENT_WORKER_STOP = 'workerStop';


    // /**
    //  * @var string command class name
    //  */
    // public $commandClass = Command::class;
    // /**
    //  * @var array of additional options of command
    //  */
    // public $commandOptions = [];
    // /**
    //  * @var callable|null
    //  * @internal for worker command only
    //  */
    
    public $messageHandler;

    /**
     * @var int current process ID of a worker.
     * 
     */
    private $_workerPid;




    /**
     * Gets process ID of a worker.
     *
     * @inheritdoc
     * @return int
     * 
     */
    public function getWorkerPid()
    {
        return $this->_workerPid;
    }

    /**
     * @inheritdoc
     */
    protected function handleMessage($id, $message, $ttr, $attempt)
    {
        if ($this->messageHandler) {
            return call_user_func($this->messageHandler, $id, $message, $ttr, $attempt);
        }

        return parent::handleMessage($id, $message, $ttr, $attempt);
    }

    /**
     * @param string $id of a message
     * @param string $message
     * @param int $ttr time to reserve
     * @param int $attempt number
     * @param int $workerPid of worker process
     * @return bool
     * @internal for worker command only
     */
    public function execute($id, $message, $ttr, $attempt, $workerPid)
    {
        $this->_workerPid = $workerPid;
        return parent::handleMessage($id, $message, $ttr, $attempt);
    }
}
