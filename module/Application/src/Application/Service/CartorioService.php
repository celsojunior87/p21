<?php

namespace Application\Service;


use Application\Entity\Cartorio;
use Doctrine\ORM\EntityManager;

class CartorioService
{

    protected $em;

    public function tratarXml($entityManager, $files, $entity)
    {
//        $entity = new Cartorio();
//        $uploaddir = './public/uploads/';
//        $uploadfile = $uploaddir . basename($files['nome']['name']);
//        if (move_uploaded_file($files['nome']['tmp_name'], $uploadfile)) {
//            //echo "Arquivo válido e enviado com sucesso.\n";
//        } else {
////                echo "Possível ataque de upload de arquivo!\n";
//        }
//        $fileXml = './public/uploads/file.xml';
//
////            $xml = simplexml_load_file($fileXml);
//        $content = utf8_encode(file_get_contents('./public/uploads/file.xml'));
//        $xml = simplexml_load_string($content);
//        foreach ($xml as $x) {
//            $x = (array)$x;
//            $entity->setNome($x['nome']);
//            $entity->setRazaoSocial($x['razao']);
//            $entity->setTipoDocumento($x['tipo_documento']);
//            $entity->setCep($x['cep']);
//            $entity->setEndereco($x['endereco']);
//            $entity->setBairro($x['bairro']);
//            $entity->setCidade($x['cidade']);
//            $entity->setUf($x['uf']);
//            $entity->setNomeTabeliao($x['tabeliao']);
//            $entity->setFlgSituacao($x['ativo']);
//            $entityManager->persist($entity);
//            $entityManager->flush();
//
//        }

    }

//    public function save(Array $arrData = array())
//    {
//        if(isset($arrData['id'])){
//
//            $entity = $this->em->getReference($this->entity, $arrData['id']);
//
//            $hydrator = new ClassMethods();
//            $hydrator->hydrate($arrData, $entity);
//
//        }else{
//            $entity = new $this->entity($arrData);
//        }
//
//        $this->em->persist($entity);
//        $this->em->flush();
//
//        return $entity;
//    }
}
