<?php declare(strict_types=1);

namespace Lfn\Oat\QuestionApi\DataObject;

use DateTime;
use JsonSerializable;
use Lfn\Oat\QuestionApi\Collection\ChoiceCollection;

/**
 * Class Question
 *
 * @package Lfn\Oat\QuestionApi\Test\DataObject
 */
class Question implements JsonSerializable
{
    /** @var string */
    private $text;

    /** @var DateTime */
    private $createdAt;

    /** @var ChoiceCollection */
    private $choices;

    /**
     * Question constructor.
     *
     * @param string   $text
     * @param DateTime $createdAt
     */
    public function __construct(string $text, DateTime $createdAt)
    {
        $this->text      = $text;
        $this->createdAt = $createdAt;
        $this->choices   = new ChoiceCollection();
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
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param DateTime $createdAt
     */
    public function setCreatedAt(DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return ChoiceCollection
     */
    public function getChoices(): ChoiceCollection
    {
        return $this->choices;
    }

    /**
     * @param ChoiceCollection $choices
     */
    public function setChoices(ChoiceCollection $choices): void
    {
        $this->choices = $choices;
    }

    /**
     * @param Choice $choice
     */
    public function addChoice(Choice $choice): void
    {
        $this->choices->add($choice);
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
