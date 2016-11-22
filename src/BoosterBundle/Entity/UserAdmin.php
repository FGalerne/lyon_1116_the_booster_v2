<?php
/**
 * Created by PhpStorm.
 * User: LaurieGandon
 * Date: 22/11/2016
 * Time: 5:22 PM
 */

namespace BoosterBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;


/**
 * Class UserAdmin
 * @package BoosterBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="user_admin")
 */
class UserAdmin extends BaseUser
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
    }
}