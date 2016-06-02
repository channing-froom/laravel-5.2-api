<?php

namespace DataLayer\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Oauth
 *
 * @ORM\Table(name="oauth", indexes={@ORM\Index(name="fk_oauth_user_id", columns={"user_id"}), @ORM\Index(name="fk_oauth_application_type_id", columns={"application_type_id"})})
 * @ORM\Entity
 */
class Oauth
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="token", type="string", length=255, nullable=false)
     */
    private $token;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean", nullable=false)
     */
    private $active = '1';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt = 'CURRENT_TIMESTAMP';

    /**
     * @var \DataLayer\Entities\ApplicationTypes
     *
     * @ORM\ManyToOne(targetEntity="DataLayer\Entities\ApplicationTypes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="application_type_id", referencedColumnName="id")
     * })
     */
    private $applicationType;

    /**
     * @var \DataLayer\Entities\Users
     *
     * @ORM\ManyToOne(targetEntity="DataLayer\Entities\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set token
     *
     * @param string $token
     *
     * @return Oauth
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Oauth
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Oauth
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set applicationType
     *
     * @param \DataLayer\Entities\ApplicationTypes $applicationType
     *
     * @return Oauth
     */
    public function setApplicationType(\DataLayer\Entities\ApplicationTypes $applicationType = null)
    {
        $this->applicationType = $applicationType;

        return $this;
    }

    /**
     * Get applicationType
     *
     * @return \DataLayer\Entities\ApplicationTypes
     */
    public function getApplicationType()
    {
        return $this->applicationType;
    }

    /**
     * Set user
     *
     * @param \DataLayer\Entities\Users $user
     *
     * @return Oauth
     */
    public function setUser(\DataLayer\Entities\Users $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \DataLayer\Entities\Users
     */
    public function getUser()
    {
        return $this->user;
    }
}

