<?php
namespace App\Model;

class Cart{

    private $id;
    private $p_id;
    private $ip_add;
    private $user_id;
    private $product_title;
    private $product_image;
    private $qty;
    private $price;
    private $total_amt;

    /**
     * Get the value of id
     */ 
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of p_id
     */ 
    public function getP_id(): int
    {
        return $this->p_id;
    }

    /**
     * Set the value of p_id
     *
     * @return  self
     */ 
    public function setPid($p_id): self
    {
        $this->p_id = $p_id;

        return $this;
    }

    /**
     * Get the value of ip_add
     */ 
    public function getIp_add(): string
    {
        return $this->ip_add;
    }

    /**
     * Set the value of ip_add
     *
     * @return  self
     */ 
    public function setIpadd($ip_add): self
    {
        $this->ip_add = $ip_add;

        return $this;
    }

    /**
     * Get the value of user_id
     */ 
    public function getUser_id(): int
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     *
     * @return  self
     */ 
    public function setUserid($user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Get the value of product_title
     */ 
    public function getProduct_title(): string
    {
        return $this->product_title;
    }

    /**
     * Set the value of product_title
     *
     * @return  self
     */ 
    public function setProductTitle($product_title): self
    {
        $this->product_title = $product_title;

        return $this;
    }

    /**
     * Get the value of product_image
     */ 
    public function getProduct_image(): string
    {
        return $this->product_image;
    }

    /**
     * Set the value of product_image
     *
     * @return  self
     */ 
    public function setProductimage($product_image): self
    {
        $this->product_image = '/img/' . $product_image;

        return $this;
    }

    /**
     * Get the value of qty
     */ 
    public function getQty(): int
    {
        return $this->qty;
    }

    /**
     * Set the value of qty
     *
     * @return  self
     */ 
    public function setQty($qty): self
    {
        $this->qty = $qty;

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of total_amt
     */ 
    public function getTotal_amt(): int
    {
        return $this->total_amt;
    }

    /**
     * Set the value of total_amt
     *
     * @return  self
     */ 
    public function setTotalamt($total_amt): self
    {
        $this->total_amt = $total_amt;

        return $this;
    }
}