<?php
/**
 * This file is part of PHP CS Fixer.
 *
 * (c) kcloze <pei.greet@qq.com>
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Coroutine\Queue;

/**
 * Interface JobInterface
 *
 * 
 */
interface JobInterface
{
    /**
     * @param Queue $queue which pushed and is handling the job
     */
    public function execute($queue);
}