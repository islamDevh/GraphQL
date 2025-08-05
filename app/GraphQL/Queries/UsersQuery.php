<?php

namespace App\GraphQL\Queries;

use App\Models\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class UsersQuery extends Query
{
    protected $attributes = [
        'name' => 'users',
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('User'));
    }

    public function args(): array
    {
        return [
            'count' => [
                'name' => 'count',
                'type' => Type::int(),
                'description' => 'How many users to return',
                'defaultValue' => 10,
            ],
            'page' => [
                'name' => 'page',
                'type' => Type::int(),
                'description' => 'The page number',
                'defaultValue' => 1,
            ],
        ];
    }

    public function resolve($root, $args)
    {
        if (isset($args['id'])) {
            return User::whereId($args['id'])->get();
        }
        if (isset($args['name'])) {
            return User::whereName($args['name'])->get();
        }
        if (isset($args['email'])) {
            return User::whereEmail($args['email'])->get();
        }

        return User::all();
    }
}
