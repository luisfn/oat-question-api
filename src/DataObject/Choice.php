<?php declare(strict_types=1);

namespace Lfn\Oat\QuestionApi\DataObject;

use JsonSerializable;

/**
 * Class Choice
 *
 * @package Lfn\Oat\QuestionApi\Test\DataObject
 */
class Choice implements JsonSerializable
{
    /** @var string */
    private $text;

    /**
     * Choice constructor.
     *
     * @param string $text
     */
    public function __construct(string $text)
    {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
