<?php
namespace AA\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class AmeaAdmin extends MemberAdmin
{
    protected function configureShowField(ShowMapper $showMapper)
    {
        parent::configureShowField($showMapper);
        $showMapper
            ->add('birthday')
            ->add('representativename')
            ->add('representativesurname')
            ->add('sports')
            ->add('medication')
            ->add('disability')
            ->add('otherpeculiarities')
            ->add('payments')
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        parent::configureFormFields($formMapper);
        $formMapper
            ->add('birthday', 'genemu_jquerydate', array('widget' => 'single_text'))
            ->add('representativename', null, array('required' => false))
            ->add('representativesurname', null, array('required' => false))
            ->add('sports', null, array('required' => false))
            ->add('medication', null, array('required' => false))
            ->add('disability', null, array('required' => false))
            ->add('otherpeculiarities', null, array('required' => false, 'help' => 'otherpeculiarities_help'))
            ->add('payments', 'sonata_type_collection', array(
                    'required' => false,
                ), array(
                    'edit' => 'inline',
                    'inline' => 'table',
                 ))
        ;
    }

    protected function configureListFields(ListMapper $listMapper, $params = array())
    {
        parent::configureListFields($listMapper, $params);
        $listMapper
            ->add('birthday')
            ->add('representativename')
            ->add('representativesurname')
            ->add('sports')
            ->add('medication')
            ->add('disability')
            ->add('otherpeculiarities')
            //->add('payments')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        parent::configureDatagridFilters($datagridMapper);
        $datagridMapper
            ->add('birthday', 'doctrine_orm_datetime_range', array(), null, array('widget' => 'single_text', 'required' => false, 'attr' => array('class' => 'datepicker')))
            ->add('representativename')
            ->add('representativesurname')
            ->add('sports')
            ->add('medication')
            ->add('disability')
            ->add('otherpeculiarities', null, array(), null, array('attr' => array('placeholder' => 'otherpeculiarities_help')))
            ->add('payments.year', null, array(), null, array('attr' => array('placeholder' => 'Year')))
        ;
    }

    public function prePersist($amea)
    {
        return $this->preUpdate($amea);
    }

    public function preUpdate($amea)
    {
        foreach($amea->getPayments() as $payment) {
            $payment->setAmea($amea);
        }
    }

}