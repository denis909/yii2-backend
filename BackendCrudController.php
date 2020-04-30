<?php

namespace denis909\yii\backend;

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
                'class' => IndexAction::className(),
                'modelClass' => $this->modelClass,
                'searchModelClass' => $this->searchModelClass,
                'ownerClass' => $this->ownerClass,
                'parentId' => $this->parentId,
                'dataProvider' => $this->dataProvider,
                'ownerIndex' => $this->ownerIndex
            ],
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => $this->formModelClass,
                'ownerClass' => $this->ownerClass,
                'parentId' => $this->parentId,
                'ownerIndex' => $this->ownerIndex
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => $this->formModelClass
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => $this->modelClass
            ]
        ];
    }

}