<?php declare(strict_types=1);

namespace Lfn\Oat\QuestionApi\Test\DataObject;

use Lfn\Oat\QuestionApi\DataObject\Choice;
use PHPUnit\Framework\TestCase;

/**
 * Class ChoiceTest
 *
 * @package Lfn\Oat\QuestionApi\Test\DataObject
 */
class ChoiceTest extends TestCase
{
    /**
     * @test
     */
    public function shouldCreateChoiceProperly(): void
    {
        $choice = new Choice('text');

        $this->assertSame('text', $choice->getText());
    }
}