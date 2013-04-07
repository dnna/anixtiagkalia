<?php
namespace AA\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;

use AA\SiteBundle\Entity\Friend;

class FriendAdmin extends MemberAdmin
{
    protected function configureShowField(ShowMapper $showMapper)
    {
        parent::configureShowField($showMapper);
        $showMapper
            ->add('capacityAsString', 'trans')
            ->add('sponsorpayments')
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        parent::configureFormFields($formMapper);
        $formMapper
            ->add('capacity', 'sonata_type_translatable_choice', array('choices' => Friend::getCapacities()))
            ->add('sponsorpayments', 'sonata_type_collection', array(
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
            ->add('capacityAsString', 'trans')
            ->add('sponsorpayments')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        parent::configureDatagridFilters($datagridMapper);
        $datagridMapper
            ->add('capacity', null, array(), 'choice', array('choices' => Friend::getCapacities()))
            ->add('sponsorpayments.year', null, array(), null, array('attr' => array('placeholder' => 'Year')))
            ->add('sponsorpayments.amount', null, array(), null, array('attr' => array('placeholder' => 'Ποσό')))
        ;
    }

    public function prePersist($friend)
    {
        return $this->preUpdate($friend);
    }

    public function preUpdate($friend)
    {
        foreach($friend->getSponsorpayments() as $sponsorpayment) {
            $sponsorpayment->setFriend($friend);
        }
    }
}