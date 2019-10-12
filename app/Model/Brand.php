<?php
namespace App\Model;

class Brand{

    private $bid;

    private $brand_name;

    private $status;

    /**
     * Get the value of bid
     */ 
    public function getBid(): int
    {
        return $this->bid;
    }

    /**
     * Set the value of bid
     *
     * @return  self
     */ 
    public function setBid($bid): self
    {
        $this->bid = $bid;

        return $this;
    }

    /**
     * Get the value of brand_name
     */ 
    public function getBrand_name(): string
    {
        return $this->brand_name;
    }

    /**
     * Set the value of brand_name
     *
     * @return  self
     */ 
    public function setBrand_name($brand_name): self
    {
        $this->brand_name = $brand_name;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus(): bool
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status): self
    {
        $this->status = $status;

        return $this;
    }
}