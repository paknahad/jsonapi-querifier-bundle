<?php

namespace Paknahad\JsonApiQuerifierBundle\Finder;

use Doctrine\ORM\QueryBuilder;
use Paknahad\JsonApiBundle\Helper\FieldManager;
use Paknahad\JsonApiBundle\Helper\Filter\FinderInterface;
use Paknahad\Querifier\Filter;
use Psr\Http\Message\ServerRequestInterface;
use Symfony\Bridge\PsrHttpMessage\Factory\PsrHttpFactory;
use Symfony\Component\HttpFoundation\Request;

class Querifier implements FinderInterface
{
    private $psrFactory;

    /**
     * @var ServerRequestInterface
     */
    protected $request;

    /**
     * @var QueryBuilder
     */
    protected $query;

    public function __construct(PsrHttpFactory $psrFactory)
    {
        $this->psrFactory = $psrFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function setRequest(Request $request): void
    {
        $this->request = $this->psrFactory->createRequest($request);
    }

    /**
     * {@inheritdoc}
     */
    public function setQuery(QueryBuilder $query): void
    {
        $this->query = $query;
    }

    /**
     * {@inheritdoc}
     */
    public function setFieldManager(FieldManager $fieldManager): void
    {
    }

    /**
     * {@inheritdoc}
     */
    public function filterQuery(): void
    {
        $filter = new Filter($this->request);

        $filter->applyFilter($this->query);
    }

    /**
     * Sort the query based on the registered Finders.
     */
    public function sortQuery(): void
    {
    }
}
