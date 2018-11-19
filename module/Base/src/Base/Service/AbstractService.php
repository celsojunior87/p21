<?php
namespace Base\Service;

use Doctrine\ORM\EntityManager;
use Zend\Stdlib\Hydrator\ClassMethods;

abstract class AbstractService
{
    protected $em;
    protected $entity;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function save(Array $arrData = array())
    {
        if(isset($arrData['id'])){

            $entity = $this->em->getReference($this->entity, $arrData['id']);

            $hydrator = new ClassMethods();
            $hydrator->hydrate($arrData, $entity);

        }else{
            $entity = new $this->entity($arrData);
        }

        $this->em->persist($entity);
        $this->em->flush();

        return $entity;
    }

    public function remove(Array $arrData = array())
    {
        $entity = $this->em->getRepository($this->entity)->findOneBy($arrData);

        if($entity){
            $this->em->remove($entity);
            $this->em->flush();

            return $entity;
        }
    }
}