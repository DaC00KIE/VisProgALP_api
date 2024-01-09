<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\PostCollection;
use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Bookmark;
use App\Models\Ingredient;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    public function index(){
        return new PostCollection(Post::with('user')->paginate());
    }

    public function show(Post $post)
    {
        return new PostResource($post);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'image' => 'required | image',
            'caption' => 'nullable',
        ]);

        return new PostResource(Post::create($validatedData));
    }

        /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $post = Post::where('id', $request->id)->first();
        if (!empty($post)) {
            try {
                $post->title = $request->username;
                $post->image = $request->email;
                $post->caption = $request->caption;
                $post->save();

                return [
                    'status' => Response::HTTP_OK,
                    'message' => 'Post Updated',
                    'data' => $post
                ];
            } catch (Exception $e) {
                return [
                    'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
                    'message' => $e->getMessage(),
                    'data' => []
                ];
            }
        }

        return [
            'status' => Response::HTTP_NOT_FOUND,
            'message' => 'Post not Found',
            'data' => []
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        if (!empty($request->id)) {
            $post = Post::where('id', $request->id)->first();
        }

        if (!empty($post)) {
            $post->delete();
            return [
                'status' => Response::HTTP_OK,
                'message' => 'Post Deleted',
                'data' => []
            ];
        }

        return [
            'status' => Response::HTTP_NOT_FOUND,
            'message' => 'Post not Found',
            'data' => []
        ];
    }
}


