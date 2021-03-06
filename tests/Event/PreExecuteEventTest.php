<?php
/**
 * This file is part of Bldr.io
 *
 * (c) Aaron Scherer <aequasi@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE
 */

namespace Bldr\Test\Event;

use Bldr\Event\PreExecuteEvent;

/**
 * @author Mauricio Walters <nvitius@gmail.com>
 */
class PreExecuteEventTest extends \PHPUnit_Framework_TestCase
{
    public static function createPreExecuteEvent()
    {
        $task    = \Mockery::mock('Bldr\Task\TaskInterface');
        $process = \Mockery::mock('Symfony\Component\Process\Process');
        $process->shouldReceive('stop');

        return new PreExecuteEvent($task, $process, false);
    }

    /**
     * Tests the __construct($task, $builder) method
     *
     * @throws \PHPUnit_Framework_Exception
     * @return PreExecuteEvent
     */
    public function testFactory()
    {
        $postExecuteEvent = self::createPreExecuteEvent();

        $this->assertInstanceOf(
            'Bldr\Event\PreExecuteEvent',
            $postExecuteEvent
        );

        $this->assertInstanceOf(
            'Bldr\Event\AbstractEvent',
            $postExecuteEvent
        );

        return $postExecuteEvent;
    }

    public function testGetTask()
    {
        $postExecuteEvent = self::createPreExecuteEvent();

        $this->assertInstanceOf(
            'Bldr\Task\TaskInterface',
            $postExecuteEvent->getTask()
        );
    }

    public function testGetProcess()
    {
        $postExecuteEvent = self::createPreExecuteEvent();

        $this->assertInstanceOf(
            'Symfony\Component\Process\Process',
            $postExecuteEvent->getProcess()
        );
    }
}
