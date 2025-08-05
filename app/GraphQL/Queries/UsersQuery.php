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
            'id' => ['type' => Type::int()],
            'name' => ['type' => Type::string()],
            'email' => ['type' => Type::string()],
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
