<?php
namespace Base\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Helper\ViewModel;
use Zend\Paginator\Paginator;
use Zend\Paginator\Adapter\ArrayAdapter;


abstract class AbstractController extends AbstractActionController
{
    protected $em;
    protected $entity;
    protected $route;
    protected $service;
    protected $form;

    abstract function __construct();

    /**
     * Listar Resultados
     * @return array|void
     */
    public function indexAction()
    {
       $list = $this->getEm()->getRepository($this->entity)->findAll();
       $page = $this->params()->fromRoute('page');
       $paginator = new Paginator(new ArrayAdapter($list));
       $paginator->setCurrentPageNumber($page)
           ->setDefaultItemCountPerPage(10);

        return new ViewModel(array('arrdata' => $paginator, 'page' =>$page));
    }

    public function inserirAction()
    {
        if (is_string($this->form))
            $form = new $this->form;
        else
            $form = $this->form;
        $request = $this->getRequest();

        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $service = $this->getServiceLocator()->get($this->service);
                if ($service->save($request->getPost()->toArray())) {
                    $this->flashMessenger()->addSuccessMessage('Cadastrado Com Sucesso');
                } else {
                    $this->flashMessenger()->addErrorMessage('Não Foi Possivel Cadastrar');
                }
                return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
            }
        }
        if ($this->flashMessenger()->hasSuccessMessages()) {
            return new ViewModel(array(
                'form' => $form, 'sucess' =>
                    $this->flashMessenger()->getSuccessMessages()));
        }
        if ($this->flashMessenger()->hasErrorMessages()) {
            return new ViewModel(array(
                'form' => $form,
                'error' => $this->flashMessenger()->getSuccessMessages()));
        }
        $this->flashMessenger()->clearMessages();

        return new ViewModel(array('form' => $form));
    }

    /**
     * Editar Registro
     */
    public function editarAction()
    {
        if (is_string($this->form))
            $form = new $this->form;
        else
            $form = $this->form;

        $request = $this->getRequest();
        $param = $this->params()->fromRoute('id', 0);
        $repository = $this->getEm()->getRepository($this->entity)->find($param);

        if ($repository) {

            $array = array();
            foreach ($repository->toArray() as $key => $value) {
                if ($value instanceof \DateTime)
                    $array[$key] = $value->format('d/m/Y');
                else
                    $array[$key] = $value;
            }
            $form->setData($array);

            if ($request->isPost()) {

                $form->setData($request->getPost());

                if ($form->isValid()) {

                    $service = $this->getServiceLocator()->get($this->service);

                    $data = $request->getPost()->toArray();
                    $data = ['id'] = $param;

                if ($service->save($data)) {
                        $this->flashMessenger()->addSuccessMessage('Atualizado Com Sucesso');
                    } else {
                        $this->flashMessenger()->addErrorMessage('Não Foi Possivel Atualizar');
                    }

                    return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
                }

            }
        } else {
            $this->flashMessenger()->addInfoMessage('Registro Não Encontrado');
            return $this->redirect()->toRoute($this->route, array('controller' => $this->controller));
        }
        if ($this->flashMessenger()->hasSuccessMessages()) {
            return new ViewModel(array(
                'form' => $form,
                'sucess' => $this->flashMessenger()->getSuccessMessages(),
                'id' => $param

            ));
        }
        if ($this->flashMessenger()->hasErrorMessages()) {
            return new ViewModel(array(
                'form' => $form,
                'error' => $this->flashMessenger()->getSuccessMessages(),
                'id' => $param
            ));
        }
        if ($this->flashMessenger()->hasInfoMessages()) {
            return new ViewModel(array(
                'form' => $form,
                'warning' => $this->flashMessenger()->getInfoMessages(),
                'id' => $param
            ));
        }
        $this->flashMessenger()->clearMessages();

        return new ViewModel(array('form' => $form, 'id' => $param));

    }

    /**
     * Excluir Registro
     */
    public function excluirAction()
    {
        $service = $this->getServiceLocator()->get($this->service);
        $id = $this->params()->fromRoute('id',0);

        if($service->remove(array('id'=> $id)))
            $this->flashMessenger()->addSuccessMessage('Registro deletado com sucesso');
        else
            $this->flashMessenger()->addErrorMessage('Não foi possivel deletar o registro');
        return $this->redirect()->toRoute($this->route,array('controller'=> $this->controller));
    }

    /**
     * @return \Doctrine\ORM\EntityManager
     */
    public function getEm()
    {
        if($this->em == null){
            $this->em = $this->getServiceLocator()
                ->get('Doctrine\ORM\EntityManager');
        }
        return $this->em;
    }

}