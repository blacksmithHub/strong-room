<?php

namespace Tests\Feature\Contact;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Contact;

class SearchTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A searching feature test.
     */
    public function test_searching(): void
    {
        $this->seed();

        $contact = Contact::first();

        $payload = [
            'search_criteria' => [
                'filter_groups' => [
                    [
                        'filters' => [
                            [
                                'field' => 'contacts.name',
                                'value' => '%' . $contact->name . '%',
                                'condition_type' => 'like'
                            ]
                        ]
                    ],
                    [
                        'filters' => [
                            [
                                'field' => 'contacts.email_address',
                                'value' => '%' . $contact->email_address . '%',
                                'condition_type' => 'like'
                            ]
                        ]
                    ]
                ]
            ]
        ];

        $this->post('/api/contacts/search', $payload)
            ->assertStatus(200);
    }

    /**
     * A sorting feature test.
     */
    public function test_sorting(): void
    {
        $this->seed();

        $payload = [
            'search_criteria' => [
                'sort_orders' => [
                    [
                        'field' => 'logins.username',
                        'direction' => 'asc'
                    ]
                ]
            ]
        ];

        $this->post('/api/contacts/search', $payload)
            ->assertStatus(200);
    }

    /**
     * A filtering feature test.
     */
    public function test_filtering(): void
    {
        $this->seed();

        $payload = [
            'search_criteria' => [
                'filter_groups' => [
                    [
                        'filters' => [
                            [
                                'field' => 'contacts.email_address',
                                'value' => '%@example%',
                                'condition_type' => 'like'
                            ]
                        ]
                    ]
                ]
            ]
        ];

        $this->post('/api/contacts/search', $payload)
            ->assertStatus(200);
    }
}
