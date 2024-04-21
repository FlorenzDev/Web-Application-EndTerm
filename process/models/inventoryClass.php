<?php
class DeliveryData
{
    private $loadNum;
    private $delivered;
    private $supplier;
    private $driver;
    private $data_id;
    private $preStarter;
    private $starter;
    private $grower;
    private $finisher;
    private $multimin;
    private $bComplex;
    private $ADEC;
    private $handlerName;
    private $poultry;

    public function __construct($postData, $rowData)
    {
        $this->loadNum = $postData['Load'] ?? null;
        $this->delivered = $postData['Delivered'] ?? null;
        $this->supplier = $postData['Supplier'] ?? null;
        $this->driver = $postData['Driver'] ?? null;
        $this->data_id = $rowData['data_id'] ?? null;
        $this->preStarter = $postData['pre-starter'] ?? null;
        $this->starter = $postData['starter'] ?? null;
        $this->grower = $postData['grower'] ?? null;
        $this->finisher = $postData['finisher'] ?? null;
        $this->multimin = $postData['multimin'] ?? null;
        $this->bComplex = $postData['b_complex'] ?? null;
        $this->ADEC = $postData['ADEC'] ?? null;
        $this->handlerName = $postData['Handler-name'] ?? null;
        $this->poultry = $postData['Poultry'] ?? null;
    }

    public function getLoadNum()
    {
        return $this->loadNum;
    }

    public function getDelivered()
    {
        return $this->delivered;
    }

    public function getSupplier()
    {
        return $this->supplier;
    }

    public function getDriver()
    {
        return $this->driver;
    }

    public function getDataId()
    {
        return $this->data_id;
    }

    public function getPreStarter()
    {
        return $this->preStarter;
    }

    public function getStarter()
    {
        return $this->starter;
    }

    public function getGrower()
    {
        return $this->grower;
    }

    public function getFinisher()
    {
        return $this->finisher;
    }

    public function getMultimin()
    {
        return $this->multimin;
    }

    public function getBComplex()
    {
        return $this->bComplex;
    }

    public function getADEC()
    {
        return $this->ADEC;
    }

    public function getHandlerName()
    {
        return $this->handlerName;
    }

    public function getPoultry()
    {
        return $this->poultry;
    }
}
