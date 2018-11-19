<?php

namespace Application\Form;

use Zend\Form\Element\Button;
use Zend\Form\Element\File;
use Zend\Form\Form;
use Application\Form\CartorioFilter;

class CartorioForm extends Form
{

    public function __construct()
    {
        parent::__construct(null);
        $this->setAttribute('method','Post');
        $this->setAttribute('action', '/');

//        $this->setInputFilter(new CartorioFilter());

        $arquivo = new File('nome');
        $arquivo->setLabel('Nome')
            ->setAttributes(array(
                'maxlength' =>45,
                'class' => 'form-control'
            ));
        $this->add($arquivo);

        /**
         * Botão Submit
         */
        $button = new Button("Importar");
        $button->setLabel('Importar')
            ->setAttributes(array(
                'type'=>'submit',
                'class'=>'btn'
            ));
        $this->add($button);
    }

}