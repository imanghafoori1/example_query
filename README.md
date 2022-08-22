You can run the test by `./vendor/bin/phpunit`

Tests use an SQLite database in memory.



User model:

-- id (BigInt)

-- username (VarChar 31, Unique)

-- created_at (dateTime)

-- updated_at (dateTime)

Post model:

-- id (BigInt)

-- title (VarChar 255)

-- user_id (reference to user ID)

-- created_at (dateTime)

-- updated_at (dateTime)


We have more than 10,000 users that create new posts every day.

We need to know which users created more than 10 posts in the last 7 days, with the use of eager loading and with no n+1 problem.

```php
[
    [
        'username' => 'user1',
        'total_posts_count' => 26,
        'recent_posts_count' => 20,
        'last_post_title' => 'My Rolex watch today'
    ],
    [
        'username' => 'user3',
        'total_posts_count' => 17,
        'recent_posts_count' => 10,
        'last_post_title' => 'My Omega watch yesterday'
    ],
    .......................
    .......................
];
```
