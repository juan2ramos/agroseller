<?php

namespace Agrosellers\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\DocBlock\Type\Collection;

class RoutePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    private $acl;
    private $route;

    public function __construct($route)
    {
        $this->route = $route;
        $this->acl();
    }
    /**
     *
    1	Super Administrador
    2	Administrador
    3	Proveedor
    4	Cliente
    5	Agente
    6	Analista
     *
     * @return void
     */
    private function acl()
    {

        $this->acl = [
            '1' =>
                [
                    'admin', 'users', 'providers', 'category', 'farmIndex', 'products', 'questions', 'clients', 'category',
                    'bills', 'orders', 'reports', 'subcategoriesQuery','featuresQuery', 'showUser', 'validateProvider', 'newProduct',

                    'agentsGet', 'editProduct', 'deleteProduct', 'updateProduct','newUserAdmin','user',
                    'budgetShow', 'indexProfile', 'userUpdate', 'productAgentPreview', 'productDetailPreview','validateProduct',
                    'payPlan', 'searchUser', 'category', 'products', 'products', 'adminEditProduct', 'farmCategories.create', 'farms.create',
                    'viewProduct'

                ],
            '2' =>
                [
                    'admin', 'users', 'providers', 'category', 'farmIndex', 'clients', 'bills',
                    'orders', 'subcategoriesQuery','featuresQuery','agentsGet','newUserAdmin','user', 'indexProfile',
                    'userUpdate', 'payPlan','searchUser',
                    'viewProduct'
                ],
            '3' =>
                [
                    'admin', 'products', 'questions', 'orders', 'registerProvider', 'isValidateProviders', 'questions',
                    'subcategoriesQuery','featuresQuery', 'newProduct', 'insertProvider', 'questionDetail', 'questionNew',
                    'editProduct', 'deleteProduct', 'updateProduct', 'indexProfile','orderShowProvider','updateStateOrder',
                    'productDetailPreview','payPlan', 'productDetailPreview','pay','historyPay', 'inactivePlan', 'callProducts',
                    'newProductProvider', 'updateProductProvider', 'providerUpdate',
                    'viewProduct'
                ],

            '4' =>
                [
                    'admin', 'bills', 'orders', 'reports', 'questions', 'questionDetail', 'questionNew',
                    'clientInformationIndex', 'clientInformationStore', 'indexProfile', 'userUpdate','budgetShow','downloadBudget',
                    'orderShow', 'payPlan'

                ],
            '5' =>
                [
                    'admin', 'providers', 'clients', 'reports', 'showUser', 'validateProvider', 'indexProfile', 'userUpdate',
                    'productAgentPreview', 'productDetailPreview' , 'validateProduct', 'NotifyIsActive','NotifyAll', 'payPlan',
                    'viewProduct'
                ],
            '6' =>
                [
                    'admin', 'reports', 'indexProfile', 'userUpdate', 'payPlan'
                ],
        ];
    }

    function routeValidate()
    {
        $role = Auth::user()['role_id'];
        return !in_array($this->route, $this->acl[$role]);
    }
}
