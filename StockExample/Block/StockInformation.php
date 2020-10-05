<?php

namespace Magenest\StockExample\Block;

use Magento\Catalog\Model\ProductFactory;
use Magento\Catalog\Model\ProductRepository;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\CatalogInventory\Model\Stock\StockItemRepository;
use Magento\Framework\View\Element\Template;

/**
 * Class StockInformation
 *
 * @package Magenest\StockExample\Block
 */
class StockInformation extends Template
{
    protected $_template = "Magenest_StockExample::stock_information.phtml";
    /**
     * @var StockItemRepository
     */
    private $stockItemRepository;
    /**
     * @var ProductFactory
     */
    private $product;
    /**
     * @var ProductRepository
     */
    private $productRepository;
    /**
     * @var CollectionFactory
     */
    private $productCollection;

    /**
     * StockInformation constructor.
     *
     * @param StockItemRepository $stockItemRepository
     * @param Template\Context $context
     * @param ProductFactory $product
     * @param ProductRepository $productRepository
     * @param array $data
     */
    public function __construct(
        StockItemRepository $stockItemRepository,
        Template\Context $context,
        ProductFactory $product,
        ProductRepository $productRepository,
        CollectionFactory $collectionFactory,
        array $data = []
    ) {
        $this->stockItemRepository = $stockItemRepository;
        $this->product = $product;
        $this->productRepository = $productRepository;
        $this->productCollection = $collectionFactory;
        parent::__construct($context, $data);
    }

    /**
     * @param $productId
     * @return \Magento\CatalogInventory\Api\Data\StockItemInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getStockItemRepository($productId)
    {
        return $this->stockItemRepository->get($productId);
    }

    /**
     * @return ProductRepository
     */
    public function getProductRepository()
    {
        return $this->productRepository;
    }

    /**
     * @return mixed
     */
    public function getProductCollectionFactory()
    {
        return $this->productCollection;
    }
}
