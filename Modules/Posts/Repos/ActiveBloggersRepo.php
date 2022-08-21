<?php

namespace Modules\Posts\Repos;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class ActiveBloggersRepo
{
    public static function getActiveUsers($postCount = 10, $days = 7)
    {
        $isRecent = self::isRecent($days);

        $user = User::query()->select('id', 'username')->with([
            'latestPost' => function ($q) {
                $q->select('posts.user_id', 'title as last_post_title');
            },
        ])->withCount([
            'posts as total_posts_count',
            'posts as recent_posts_count' => $isRecent,
        ])->whereHas('posts', $isRecent, '>', $postCount)->get();

        return $user->map(self::serializer());
    }

    private static function serializer(): \Closure
    {
        return fn($item) => [
            'username' => $item->username,
            'total_posts_count' => $item->total_posts_count,
            'recent_posts_count' => $item->recent_posts_count,
            'last_post_title' => $item->latestPost->last_post_title,
        ];
    }

    private static function isRecent($days): \Closure
    {
        return function (Builder $q) use ($days) {
            $q->whereDate('created_at', '>', now()->startOfDay()->subDays($days));
        };
    }
}
