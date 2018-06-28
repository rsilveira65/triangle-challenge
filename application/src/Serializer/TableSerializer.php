<?php

namespace  src\Serializer;

use src\Triangle\Triangle;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Helper\TableCell;

/**
 * Class TableSerializer
 * @package src\Serializer
 */
class TableSerializer implements SerializerInterface
{
    /**
     * @var Table
     */
    private $table;

    /**
     * @var Triangle $triangle
     */
    private $triangle;

    /**
     * TableSerializer constructor.
     *
     * @param Triangle $triangle
     * @param Table $table
     */
    public function __construct(Triangle $triangle, Table $table)
    {
        $this->table = $table;
        $this->triangle = $triangle;
    }

    public function serialize()
    {
        $this->setHeaders();
        $this->setBody();
        $this->table->render();
    }

    private function setHeaders()
    {
        $this->table
            ->setHeaders(
                [
                    [
                        new TableCell('Triangle', ['colspan' => 1])
                    ],
                    [
                        'Side A',
                        'Side B',
                        'Side C',
                        'Type'
                    ]
                ]
            );
    }

    private function setBody()
    {
        $triangleSides = $this->triangle->getSides();

        $this->table->addRow(
            [
                $triangleSides[0]->getLength(),
                $triangleSides[1]->getLength(),
                $triangleSides[2]->getLength(),
                $this->triangle->getType()
            ]
        );
    }
}