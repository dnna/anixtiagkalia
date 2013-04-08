<?php
namespace AA\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class AppointmentAdmin extends Admin
{
    protected $datagridValues = array(
        '_sort_order' => 'DESC', // Descendant ordering (default = 'ASC')
        '_sort_by' => 'date' // name of the ordered field (default = the model id
    );

    /**
     * @param \Sonata\AdminBundle\Show\ShowMapper $showMapper
     *
     * @return void
     */
    protected function configureShowField(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('amea')
            ->add('date')
            ->add('specialty')
            ->add('doctorname')
            ->add('doctorsurname')
            ->add('comments')
        ;
    }

    /**
     * @param \Sonata\AdminBundle\Form\FormMapper $formMapper
     *
     * @return void
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('amea', 'genemu_jqueryselect2_entity', array(
                'class' => 'AA\SiteBundle\Entity\Amea',
                'property' => 'fullname',
            ))
            ->add('date', 'genemu_jquerydate', array('widget' => 'single_text'))
            ->add('specialty')
            ->add('doctorname', null, array('required' => false))
            ->add('doctorsurname', null, array('required' => false))
            ->add('comments')
        ;
    }

    /**
     * @param \Sonata\AdminBundle\Datagrid\ListMapper $listMapper
     *
     * @return void
     */
    protected function configureListFields(ListMapper $listMapper, $params = array())
    {
        $actions = array(
            'view' => array(),
            'edit' => array(),
        );
        $listMapper
            ->add('_action', 'actions', array(
                'actions' => $actions
            ));
        $listMapper->addIdentifier('id')
            ->add('amea')
            ->add('date')
            ->add('specialty')
            ->add('doctorname')
            ->add('doctorsurname')
            ->add('comments')
        ;
    }

    /**
     * @param \Sonata\AdminBundle\Datagrid\DatagridMapper $datagridMapper
     *
     * @return void
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('amea')
            ->add('date', null, array(), 'genemu_jquerydate', array('widget' => 'single_text'))
            ->add('specialty')
            ->add('doctorname')
            ->add('doctorsurname')
            ->add('comments')
        ;
    }
}