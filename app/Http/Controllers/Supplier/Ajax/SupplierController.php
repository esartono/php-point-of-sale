<?php

namespace App\Http\Controllers\Supplier\Ajax;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Ajax\AjaxController;
use App\Http\Requests\Ajax\StoreSupplierRequest;

class SupplierController extends AjaxController
{
    public function builder()
    {
        return Supplier::query();
    }

    public function index()
    {
        $data = [
            'suppliers' => $this->builder->get(),
            'columns' => array_values($this->getDisplayableColumns()),
            'customColumns' => $this->setCustomColumnsNames(),
            'createColumns' => $this->setCreateColumns(),
            'displayColumns' => $this->setVisibleColumns()
        ];

        return response()->json($data);
    }

    public function store(StoreSupplierRequest $request)
    {
        $this->builder->create($request->only(['name', 'description', 'vat_pin']));

        return response()->json([
            'success' => true
        ]);
    }

    protected function setCustomColumnsNames()
    {
        return [
            'name' => 'Name',
            'description' => 'Description',
            'last_supply_date' => 'Last Supply Date',
            'total_supplied_amount' => 'Total supplied',
            'vat_pin' => 'Vat PIN'
        ];
    }

    protected function setCreateColumns()
    {
        return ['name', 'vat_pin', 'description'];
    }

    protected function setVisibleColumns()
    {
        return ['name', 'description', 'last_supply_date', 'total_supplied_amount', 'vat_pin'];
    }
}
