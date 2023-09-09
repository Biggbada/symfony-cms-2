<?php

namespace App\Controller\Admin;

use App\Entity\Provider;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\DomCrawler\Field\FileFormField;

class ProviderCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Provider::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('Name');
        yield TextField::new('adress1');
        yield TextField::new('adress2');
        yield NumberField::new('zipcode')->setColumns(4);
        yield TextField::new('city')->setColumns(4);
        yield TextField::new('country')->setColumns(4);
        yield TextField::new('phone')->setColumns(6);
        yield TextField::new('email')->setColumns(6);
        yield TextField::new('contactFirstName')->setColumns(6);
        yield TextField::new('contactLastName')->setColumns(6);
        yield TextField::new('contactPhone')->setColumns(6);
        yield TextField::new('contactEmail')->setColumns(6);
        yield TextareaField::new('notes');
        yield BooleanField::new('active');
        yield ImageField::new('catalog')->setUploadDir('/public/uploads/catalogs');
        yield DateTimeField::new('createdAt')
            ->hideOnForm();
        yield DateTimeField::new('updatedAt')
            ->hideOnForm();


    }


}
