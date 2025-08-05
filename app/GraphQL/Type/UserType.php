<?php

namespace App\GraphQL\Type;

use App\Models\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class UserType extends GraphQLType
{
    protected $attributes = [
        'name' => 'User',
        'description' => 'A user',
        'model' => User::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
            ],
            'name' => [
                'type' => Type::string(),
            ],
            'email' => [
                'type' => Type::string(),
            ],
            // Add this to include user's posts
            'posts' => [
                'type' => Type::listOf(GraphQL::type('Post')),
                'description' => 'Posts by the user',
                'resolve' => function ($user, $args) {
                    return $user->posts; // assuming User has `posts()` relationship
                },
            ],
        ];
    }
}
