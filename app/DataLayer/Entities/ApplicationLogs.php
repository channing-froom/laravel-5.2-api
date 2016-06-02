<?php

namespace DataLayer\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * ApplicationLogs
 *
 * @ORM\Table(name="application_logs", indexes={@ORM\Index(name="fk_application_logs_user_id", columns={"user_id"}), @ORM\Index(name="fk_application_logs_application_type_id", columns={"application_type_id"}), @ORM\Index(name="fk_application_logs_application_log_id", columns={"application_log_id"})})
 * @ORM\Entity
 */
class ApplicationLogs
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
     * @ORM\Column(name="log", type="text", length=65535, nullable=false)
     */
    private $log;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt = 'CURRENT_TIMESTAMP';

    /**
     * @var \DataLayer\Entities\ApplicationLogTypes
     *
     * @ORM\ManyToOne(targetEntity="DataLayer\Entities\ApplicationLogTypes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="application_log_id", referencedColumnName="id")
     * })
     */
    private $applicationLog;

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
     * Set log
     *
     * @param string $log
     *
     * @return ApplicationLogs
     */
    public function setLog($log)
    {
        $this->log = $log;

        return $this;
    }

    /**
     * Get log
     *
     * @return string
     */
    public function getLog()
    {
        return $this->log;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return ApplicationLogs
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
     * Set applicationLog
     *
     * @param \DataLayer\Entities\ApplicationLogTypes $applicationLog
     *
     * @return ApplicationLogs
     */
    public function setApplicationLog(\DataLayer\Entities\ApplicationLogTypes $applicationLog = null)
    {
        $this->applicationLog = $applicationLog;

        return $this;
    }

    /**
     * Get applicationLog
     *
     * @return \DataLayer\Entities\ApplicationLogTypes
     */
    public function getApplicationLog()
    {
        return $this->applicationLog;
    }

    /**
     * Set applicationType
     *
     * @param \DataLayer\Entities\ApplicationTypes $applicationType
     *
     * @return ApplicationLogs
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
     * @return ApplicationLogs
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

