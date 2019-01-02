<?php

namespace Paknahad\JsonApiQuerifierBundle\Finder;

use Doctrine\ORM\QueryBuilder;
use Paknahad\JsonApiBundle\Helper\FieldManager;
use Paknahad\JsonApiBundle\Helper\Filter\FinderInterface;
use Paknahad\Querifier\Filter;
use Psr\Http\Message\ServerRequestInterface;
use Symfony\Bridge\PsrHttpMessage\Factory\DiactorosFactory;
use Symfony\Component\HttpFoundation\Request;

class Querifier implements FinderInterface
{
    /**
     * @var ServerRequestInterface
     */
    protected $request;

    /**
     * @var QueryBuilder $query
     */
    protected $query;

    /**
     * {@inheritdoc}
     */
    public function setRequest(Request $request): void
    {
        $psrFactory = new DiactorosFactory();

        $this->request = $psrFactory->createRequest($request);
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
    public function filterQuery(): void {
        $filter = new Filter($this->request);

        $filter->applyFilter($this->query);
    }
}
