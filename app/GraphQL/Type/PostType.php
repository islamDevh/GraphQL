<?php

namespace App\GraphQL\Type;

use GraphQL;
use App\Models\Post;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class PostType extends GraphQLType
{
    protected $attributes = [
        'name'          => 'Post',
        'description'   => 'A type representing a blog post',
        'model'         => Post::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The ID of the post',
            ],
            'user_id' => [
                'type' => Type::int(),
                'description' => 'The ID of the user',
            ],
            'title' => [
                'type' => Type::string(),
                'description' => 'The title of the post',
            ],
            'comment' => [
                'type' => Type::string(),
                'description' => 'The comment or content',
            ],
        ];
    }
}
