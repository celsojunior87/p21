<?php

namespace Application\Controller;

use Application\Form\CartorioFilter;
use Application\Form\CartorioForm;
use Zend\Form\View\Helper\Form;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\Cartorio;


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
        if ($request->isPost()) {
            $entityManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
            $files = $request->getFiles()->toArray();
            //  $service->tratarXml($files);
            $uploaddir = './public/uploads/';
            $uploadfile = $uploaddir . basename($files['nome']['name']);
            try {
                move_uploaded_file($_FILES['nome']['tmp_name'], $uploadfile);
            } catch (\Exception $e) {
                var_dump($e->getMessage());
                die;
            }
            $ponteiro = opendir('./public/uploads'); //

            while ($nome_itens = readdir($ponteiro)) { // monta o vetor com os itens da pasta
                $itens[] = $nome_itens;
            }
            sort($itens);
            foreach ($itens as $listar) {
                if ($listar != "." && $listar != "..") {
                    if (!is_dir($listar)) {
                        $arquivos[] = $listar;
                    }
                }
            }
            foreach ($arquivos as $arquivo) {
                $content = utf8_encode(file_get_contents('./public/uploads/' . $arquivo));
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
            }
            $queryBuilder = $entityManager->createQueryBuilder();
            $queryBuilder->select('c')
                ->from('Application\Entity\Cartorio', 'c');

            $filename = "cartorio.xls";
            header("Content-Type: application/vnd.ms-excel");
            header("Content-Disposition: attachment; filename=\"$filename\"");

            $results = $queryBuilder->getQuery()
                ->getResult(\Doctrine\ORM\AbstractQuery::HYDRATE_ARRAY);

            $heading = false;
            if (!empty($results))
                foreach ($results as $row) {
                    if (!$heading) {
                        // display field/column names as a first row
                        echo implode("\t", array_keys($row)) . "\n";
                        $heading = true;
                    }
                    echo implode("\t", array_values($row)) . "\n";
                }
            exit;

        }
        return $view;
    }
}