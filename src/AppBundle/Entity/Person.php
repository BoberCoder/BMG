<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Person
 *
 * @ORM\Table(name="person")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PersonRepository")
 */
class Person
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;


    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Article", mappedBy="author")
     */
    private $articles;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Tattoo", mappedBy="author")
     */
    private $tattoos;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Person
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->articles = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tattoos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add article
     *
     * @param \AppBundle\Entity\Article $article
     *
     * @return Person
     */
    public function addArticle(\AppBundle\Entity\Article $article)
    {
        $this->articles[] = $article;

        return $this;
    }

    /**
     * Remove article
     *
     * @param \AppBundle\Entity\Article $article
     */
    public function removeArticle(\AppBundle\Entity\Article $article)
    {
        $this->articles->removeElement($article);
    }

    /**
     * Get articles
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArticles()
    {
        return $this->articles;
    }

    /**
     * Add done tattoo
     *
     * @param \AppBundle\Entity\Tattoo $tattoo
     *
     * @return Person
     */
    public function addTattoo(\AppBundle\Entity\Tattoo $tattoo)
    {
        $this->tattoos[] = $tattoo;

        return $this;
    }

    /**
     * Remove tattoo
     *
     * @param \AppBundle\Entity\Tattoo $tattoo
     */
    public function removeTattoo(\AppBundle\Entity\Tattoo $tattoo)
    {
        $this->tattoos->removeElement($tattoo);
    }

    /**
     * Get tattoos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTattoos()
    {
        return $this->tattoos;
    }

    public function __toString() {
        return $this->name;
    }
}
