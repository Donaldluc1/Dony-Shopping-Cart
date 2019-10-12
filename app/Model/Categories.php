<?php
namespace App\Model;

class Categories{

    private $cid;

    private $parent_cat;

    private $category_name;

    private $status;
    

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
     * Get the value of parent_cat
     */ 
    public function getParent_cat(): int
    {
        return $this->parent_cat;
    }

    /**
     * Set the value of parent_cat
     *
     * @return  self
     */ 
    public function setParent_cat($parent_cat): self
    {
        $this->parent_cat = $parent_cat;

        return $this;
    }

    /**
     * Get the value of category_name
     */ 
    public function getCategory_name(): string
    {
        return $this->category_name;
    }

    /**
     * Set the value of category_name
     *
     * @return  self
     */ 
    public function setCategory_name($category_name): self
    {
        $this->category_name = $category_name;

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