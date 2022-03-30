<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserCrudController extends AbstractCrudController implements EventSubscriberInterface
{
    /** @var UserPasswordEncoderInterface */
    private $passwordEncoder;

    public function __construct(UserPasswordHasherInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    public static function getEntityFqcn(): string
    {
        return User::class;
    }
    
    
    public function configureFields(string $pageName): iterable
    {
        $roles = ['ROLE_ADMIN', 'ROLE_PROPRIETAIRE', 'ROLE_CLIENT'];
        yield IdField::new('id')->onlyOnIndex();
        yield 'nom';
        yield 'prenom';
        yield 'email';
        yield 'telephone';
        yield TextField::new('password', 'New Password')
                                ->onlyOnForms()
                                ->setFormType(RepeatedType::class)->setColumns('col-md-6')
                                ->setFormTypeOptions([
                                'type' => PasswordType::class,
                                'first_options' => ['label' => 'New password'],
                                'second_options' => ['label' => 'Repeat Password']
                                ])->setRequired(true);
        yield ChoiceField::new('roles')
                                ->setChoices(array_combine($roles, $roles))
                                ->allowMultipleChoices()
                                ->renderExpanded();
          

    }
    
    public function configureCrud(Crud $crud): Crud
{
    return $crud
        // the visible title at the top of the page and the content of the <title> element
        // it can include these placeholders:
        //   %entity_name%, %entity_as_string%,
        //   %entity_id%, %entity_short_id%
        //   %entity_label_singular%, %entity_label_plural%
        ->setPageTitle('index', '%entity_label_plural% listing')
        
        // you can pass a PHP closure as the value of the title
        ->setPageTitle('new', 'Nouvel utilisateur')

        // in DETAIL and EDIT pages, the closure receives the current entity
        // as the first argument
        ->setPageTitle('detail', fn (User $user) => (string) $user)
        //->setPageTitle('edit', fn (Category $category) => sprintf('Editing <b>%s</b>', $category->getName()))

        // the help message displayed to end users (it can contain HTML tags)
        ->setHelp('edit', '...')
        
    ;
}
public static function getSubscribedEvents()
    {
        return [
            BeforeEntityPersistedEvent::class => 'encodePassword',
            BeforeEntityUpdatedEvent::class => 'encodePassword',
        ];
    }

    /** @internal */
    public function encodePassword($event)
    {
        $user = $event->getEntityInstance();
        if ($user instanceof User && $user->getPassword()) {
            $user->setPassword($this->passwordEncoder->hashPassword($user, $user->getPassword()));
        }
    }


}