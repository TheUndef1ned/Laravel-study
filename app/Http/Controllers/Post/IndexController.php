<?php

declare(strict_types=1);

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;

/**
 * Controller for handling post index.
 */
class IndexController extends Controller
{
    /**
     * Display the filtered list of posts.
     *
     * @param FilterRequest $request The validated filter request.
     * @return void
     */
    public function __invoke(FilterRequest $request): void
    {
        $data = $request->validated();

        $query = Category::query();

        if (isset($data['category'])) {
            $query->where('category_id', $data['category']);
        }
    }
}
