<?php

namespace App\Http\Requests\Contact;

use Illuminate\Foundation\Http\FormRequest;

use App\Rules\Search\{
    ValidConditionTypeRule,
    ValidDirectionRule
};

class SearchRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'search_criteria' => [
                'required',
                'sometimes'
            ],
            'search_criteria.filter_groups' => [
                'array',
                'required',
                'sometimes'
            ],
            'search_criteria.filter_groups.*.filters' => [
                'array',
                'required'
            ],
            'search_criteria.filter_groups.*.filters.*.field' => [
                'string',
                'required'
            ],
            'search_criteria.filter_groups.*.filters.*.value' => [
                'nullable'
            ],
            'search_criteria.filter_groups.*.filters.*.condition_type' => [
                'nullable',
                'string',
                new ValidConditionTypeRule
            ],
            'search_criteria.sort_orders' => [
                'array'
            ],
            'search_criteria.sort_orders.*.field' => [
                'string',
                'required'
            ],
            'search_criteria.sort_orders.*.direction' => [
                'string',
                'required',
                new ValidDirectionRule
            ],
            'search_criteria.relations' => [
                'array',
                'required',
                'sometimes'
            ],
            'page' => [
                'required',
                'sometimes',
                'numeric'
            ]
        ];
    }
}
