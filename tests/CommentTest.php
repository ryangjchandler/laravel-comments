<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Orchestra\Testbench\Factories\UserFactory;
use RyanChandler\Comments\Concerns\HasComments;

use function Pest\Laravel\assertDatabaseHas;

class Post extends Model
{
    use HasComments;

    public static function booted()
    {
        Schema::dropIfExists('posts');
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }
}

it('can be created', function () {
    $post = Post::create();
    $comment = $post->comment('Hello, world!');

    assertDatabaseHas('comments', [
        'id' => $comment->getKey(),
        'content' => 'Hello, world!',
    ]);
});

it('can belong to a user', function () {
    login();

    $post = Post::create();
    $comment = $post->comment('Hello, world!');

    assertDatabaseHas('comments', [
        'id' => $comment->getKey(),
        'content' => 'Hello, world!',
        'user_id' => Auth::id(),
    ]);
});

it('can belong to another comment', function () {
    $post = Post::create();
    $parent = $post->comment('Hello, world!');
    $child = $post->comment('Thanks!', parent: $parent);

    assertDatabaseHas('comments', [
        'id' => $child->getKey(),
        'content' => 'Thanks!',
        'parent_id' => $parent->getKey(),
    ]);
});
