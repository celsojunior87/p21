<?php

namespace Application\Controller;

use Application\Form\CartorioFilter;
use Application\Form\CartorioForm;
use Zend\Form\View\Helper\Form;
use Zend\Mvc\Controller\AbstractActionController;
use Base\Controller\AbstractController;
use Zend\View\Model\ViewModel;
use Application\Entity\Cartorio;
use Application\Service\CartorioService;


/**
 * Class IndexController
 *
 * @package Application\Controller
 */


class IndexController extends AbstractActionController
{
    protected $em;

    public function indexAction()
    {
        $entity = new Cartorio();
        $form = new CartorioForm();
        $view = new ViewModel();
        $view->setVariable('form', $form);
        //$service = new CartorioService();
        $request = $this->getRequest();
        if($request->isPost()) {
            $entityManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
            $files = $request->getFiles()->toArray();
          //  $service->tratarXml($files);
            $uploaddir = './public/uploads/';
            $uploadfile = $uploaddir . basename($_FILES['nome']['name']);
            if (move_uploaded_file($_FILES['nome']['tmp_name'], $uploadfile)) {
                //echo "Arquivo válido e enviado com sucesso.\n";
            } else {
//                echo "Possível ataque de upload de arquivo!\n";
            }
            $fileXml = './public/uploads/file.xml';

//            $xml = simplexml_load_file($fileXml);

            $content = utf8_encode(file_get_contents('./public/uploads/file.xml'));
            $xml = simplexml_load_string($content);
            foreach ($xml as $x) {
                $x = (array)$x;
                $entity->setNome($x['nome']);
                $entity->setRazaoSocial($x['razao']);
                $entity->setTipoDocumento($x['tipo_documento']);
                $entity->setCep($x['cep']);
                $entity->setEndereco($x['endereco']);
                $entity->setBairro($x['bairro']);
                $entity->setCidade($x['cidade']);
                $entity->setUf($x['uf']);
                $entity->setNomeTabeliao($x['tabeliao']);
                $entity->setFlgSituacao($x['ativo']);
                $entityManager->persist($entity);
                $entityManager->flush();

            }

            $cartorios = $this->entityManager->getAll();
            var_dump($cartorios);die;


         //  var_dump($xml->cartorio->nome); die;


            $objDOM = new \DOMDocument();

//Load xml file into DOMDocument variable
            $objDOM->load( './public/uploads/file.xml');

//Find Tag element "config" and return the element to variable $node
            $node = $objDOM->getElementsByTagName("cartorios");


            var_dump($node); die;

//            $post = array_merge_recursive(
//                $request->getPost()->toArray(),
//                $request->getFiles()->toArray()
//            );
//            $filter = new CartorioFilter();
//            $form->setInputFilter($filter);
//            $filter->setData($post);
//
//
//            //$form->setData($post);
//            if ($filter->isValid()) {
//                $data = $form->getData();
//            }

            /*$file = $files['nome']['tmp_name'];
            var_dump(file_get_contents($file)); die;
            $xml = simplexml_load_string(file_get_contents($file));
            var_dump($xml); die;
            echo"<pre>";var_dump(file_get_contents($file)); die;*/
        }
        return $view;
    }
}
