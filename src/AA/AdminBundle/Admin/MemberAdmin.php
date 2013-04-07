<?php
namespace AA\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class MemberAdmin extends Admin
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
            ->add('am')
            ->add('name')
            ->add('surname')
            ->add('address')
            ->add('tel')
            ->add('email')
            ->add('regdate')
            ->add('removaldate')
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
            ->add('am', null, array('required' => false))
            ->add('name')
            ->add('surname')
            ->add('address')
            ->add('tel')
            ->add('email')
            ->add('regdate', 'genemu_jquerydate', array('widget' => 'single_text'))
            ->add('removaldate', 'genemu_jquerydate', array('required' => false, 'widget' => 'single_text'))
            ->add('comments', null, array('required' => false))
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
            ->add('am')
            ->add('name')
            ->add('surname')
            ->add('address')
            ->add('tel')
            ->add('email')
            ->add('regdate')
            ->add('removaldate')
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
            ->add('am')
            ->add('name')
            ->add('surname')
            ->add('email')
            ->add('regdate', 'doctrine_orm_datetime_range', array(), null, array('widget' => 'single_text', 'required' => false, 'attr' => array('class' => 'datepicker')))
            ->add('removaldate', 'doctrine_orm_datetime_range', array(), null, array('widget' => 'single_text', 'required' => false, 'attr' => array('class' => 'datepicker')))
        ;
    }
}