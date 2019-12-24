<?php

namespace Wissend\Bundle\CustomBundle\MassEditAction\Operation;

use Pim\Bundle\EnrichBundle\MassEditAction\Operation\AbstractMassEditOperation;

class CapitalizeValues extends AbstractMassEditOperation
{
    /**
     * {@inheritdoc}
     */
    public function getOperationAlias()
    {
        return 'capitalize-values';
    }

    /**
     * {@inheritdoc}
     */
    public function getFormType()
    {
        return 'wissend.custom_bundle.mass_edit_action.operation.capitalize_values';
    }

    /**
     * {@inheritdoc}
     */
    public function getFormOptions()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function getActions()
    {
        return [
            'field'   => 'name',
            'options' => ['locale' => null, 'scope' => null]
        ];
    }
}