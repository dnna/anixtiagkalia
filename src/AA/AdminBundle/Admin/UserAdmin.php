<?php
namespace AA\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use AA\UserBundle\Entity\User;

class UserAdmin extends Admin
{
    protected $baseRoutePattern = 'users';
    protected $datagridValues = array(
        '_sort_order' => 'DESC', // Descendant ordering (default = 'ASC')
        '_sort_by' => 'createdAt' // name of the ordered field (default = the model id
        );

    public function getNewInstance()
    {
        $instance = parent::getNewInstance();
        $instance->setEnabled(true);

        return $instance;
    }

    /**
     * @param \Sonata\AdminBundle\Show\ShowMapper $showMapper
     *
     * @return void
     */
    protected function configureShowField(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('username')
            ->add('email')
            ->add('name')
            ->add('surname')
            ->add('capacityAsString', 'trans')
            ->add('locked')
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
            ->add('username')
            ->add('email', 'email')
            ->add('plainPassword', 'password', array('required' => false))
            ->add('name')
            ->add('surname')
            ->add('capacity', 'sonata_type_translatable_choice', array('choices' => User::getCapacities()))
            ->add('locked', null, array('required' => false))
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
            ->addIdentifier('username')
            ->add('email')
            ->add('name')
            ->add('surname')
            ->add('capacityAsString', 'trans')
            ->add('locked')
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
            ->add('username')
            ->add('email')
            ->add('locked')
        ;
    }

    public function prePersist($user) {
        $this->preUpdate($user);
    }

    public function preUpdate($user)
    {
        $this->getUserManager()->updateCanonicalFields($user);
        $this->getUserManager()->updatePassword($user);
    }

    public function setUserManager(\FOS\UserBundle\Doctrine\UserManager $userManager)
    {
        $this->userManager = $userManager;
    }

    /**
     * @return UserManagerInterface
     */
    public function getUserManager()
    {
        return $this->userManager;
    }
}