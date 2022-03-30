<?php

namespace App\Controller\Admin;

use App\Entity\Gite;
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

class GiteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Gite::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        
        yield IdField::new('id')->onlyOnIndex();
        yield 'titre';
        yield 'description';
        yield 'image';
        yield 'animaux';
        yield 'animauxPrix';
        yield 'tarifHauteSaison';
        yield 'tarifBasseSaison';
        yield 'emplacement';
        yield 'surface';
        yield 'nombreDeCouchages';
        yield 'nombreDeChambres';
    }
    
}