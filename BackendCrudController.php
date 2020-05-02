<?php

namespace denis909\yii\backend;

use denis909\yii\IndexAction;
use denis909\yii\CreateAction;
use denis909\yii\UpdateAction;
use denis909\yii\DeleteAction;

abstract class BackendCrudController extends BackendController
{

    public $defaultAction = 'index';

    public $modelClass;

    public $searchModelClass;

    public $formModelClass;

    public $ownerClass;

    public $ownerIndex = 'ownerId';

    public $parentId;

    public $postActions = ['delete'];

    public $dataProvider = []; 

    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::class,
                'modelClass' => $this->modelClass,
                'searchModelClass' => $this->searchModelClass,
                'ownerClass' => $this->ownerClass,
                'parentId' => $this->parentId,
                'dataProvider' => $this->dataProvider,
                'ownerIndex' => $this->ownerIndex
            ],
            'create' => [
                'class' => CreateAction::class,
                'modelClass' => $this->formModelClass,
                'ownerClass' => $this->ownerClass,
                'parentId' => $this->parentId,
                'ownerIndex' => $this->ownerIndex
            ],
            'update' => [
                'class' => UpdateAction::class,
                'modelClass' => $this->formModelClass
            ],
            'delete' => [
                'class' => DeleteAction::class,
                'modelClass' => $this->modelClass
            ]
        ];
    }

}