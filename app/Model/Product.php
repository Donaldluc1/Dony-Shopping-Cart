<?php
namespace App\Model;

use DateTime;

class Product{

    private $pid;

    private $cid;

    private $bid;

    private $product_name;

    private $product_price;

    private $product_stock;

    private $added_date;

    private $product_img;

    private $p_status;

    private $product_key;

    /**
     * Get the value of pid
     */ 
    public function getPid(): int
    {
        return $this->pid;
    }

    /**
     * Set the value of pid
     *
     * @return  self
     */ 
    public function setPid($pid): self
    {
        $this->pid = $pid;

        return $this;
    }

    /**
     * Get the value of cid
     */ 
    public function getCid(): int
    {
        return $this->cid;
    }

    /**
     * Set the value of cid
     *
     * @return  self
     */ 
    public function setCid($cid): self
    {
        $this->cid = $cid;

        return $this;
    }

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
     * Get the value of product_name
     */ 
    public function getProduct_name(): string
    {
        return $this->product_name;
    }

    /**
     * Set the value of product_name
     *
     * @return  self
     */ 
    public function setProduct_name($product_name): self
    {
        $this->product_name = $product_name;

        return $this;
    }

    /**
     * Get the value of product_price
     */ 
    public function getProduct_price(): float
    {
        return $this->product_price;
    }

    /**
     * Set the value of product_price
     *
     * @return  self
     */ 
    public function setProduct_price($product_price): self
    {
        $this->product_price = $product_price;

        return $this;
    }

    /**
     * Get the value of product_stock
     */ 
    public function getProduct_stock(): int
    {
        return $this->product_stock;
    }

    /**
     * Set the value of product_stock
     *
     * @return  self
     */ 
    public function setProduct_stock($product_stock): self
    {
        $this->product_stock = $product_stock;

        return $this;
    }

    /**
     * Get the value of added_date
     */ 
    public function getAdded_date(): DateTime
    {
        return new DateTime($this->added_date);
    }

    /**
     * Set the value of added_date
     *
     * @return  self
     */ 
    public function setAdded_date(string $added_date): self
    {
        $this->added_date = $added_date;

        return $this;
    }

    /**
     * Get the value of product_img
     */ 
    public function getProduct_img(): string
    {
        return '/img/' . $this->product_img;
    }

    /**
     * Set the value of product_img
     *
     * @return  self
     */ 
    public function setProduct_img($product_img): self
    {
        $this->product_img = $product_img;

        return $this;
    }

    /**
     * Get the value of p_status
     */ 
    public function getP_status(): bool
    {
        return $this->p_status;
    }

    /**
     * Set the value of p_status
     *
     * @return  self
     */ 
    public function setP_status($p_status): self
    {
        $this->p_status = $p_status;

        return $this;
    }

    /**
     * Get the value of product_key
     */ 
    public function getProduct_key(): string
    {
        return $this->product_key;
    }

    /**
     * Set the value of product_key
     *
     * @return  self
     */ 
    public function setProduct_key($product_key): self
    {
        $this->product_key = $product_key;

        return $this;
    }
}