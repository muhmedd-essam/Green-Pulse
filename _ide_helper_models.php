<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\ItemSerach
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ItemSerach newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemSerach newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemSerach query()
 */
	class ItemSerach extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $about
 * @property string $birthdate
 * @property string $email
 * @property string|null $image
 * @property mixed $intersts
 * @property string $career
 * @property string $in_government
 * @property string $country
 * @property string|null $phone
 * @property int|null $age
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ask> $ask
 * @property-read int|null $ask_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\friendship> $friend
 * @property-read int|null $friend_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\friendship> $friendshipsAsFriend
 * @property-read int|null $friendships_as_friend_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\post> $post
 * @property-read int|null $post_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\report> $report
 * @property-read int|null $report_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\story> $story
 * @property-read int|null $story_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAbout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBirthdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCareer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereInGovernment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIntersts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent implements \Tymon\JWTAuth\Contracts\JWTSubject {}
}

namespace App\Models{
/**
 * App\Models\ask
 *
 * @property int $id
 * @property string $description
 * @property string|null $image
 * @property int $user_id
 * @property int $ups
 * @property string $who_will_answer
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\comment_asks> $comment
 * @property-read int|null $comment_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|ask newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ask newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ask query()
 * @method static \Illuminate\Database\Eloquent\Builder|ask whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ask whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ask whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ask whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ask whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ask whereUps($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ask whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ask whereWhoWillAnswer($value)
 */
	class ask extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\chat
 *
 * @property string $from
 * @property string $description
 * @property string $to
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|chat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|chat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|chat query()
 * @method static \Illuminate\Database\Eloquent\Builder|chat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|chat whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|chat whereFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|chat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|chat whereTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|chat whereUpdatedAt($value)
 */
	class chat extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\comment
 *
 * @property int $id
 * @property string $from
 * @property string|null $image_from
 * @property string $description
 * @property string $to
 * @property string|null $image_to
 * @property int $post_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\post $post
 * @method static \Illuminate\Database\Eloquent\Builder|comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|comment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|comment query()
 * @method static \Illuminate\Database\Eloquent\Builder|comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|comment whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|comment whereFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|comment whereImageFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|comment whereImageTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|comment wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|comment whereTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|comment whereUpdatedAt($value)
 */
	class comment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\comment_asks
 *
 * @property int $id
 * @property string $from
 * @property string|null $image_from
 * @property string $description
 * @property string $to
 * @property mixed|null $image_to
 * @property int $ask_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ask $ask
 * @method static \Illuminate\Database\Eloquent\Builder|comment_asks newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|comment_asks newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|comment_asks query()
 * @method static \Illuminate\Database\Eloquent\Builder|comment_asks whereAskId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|comment_asks whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|comment_asks whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|comment_asks whereFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|comment_asks whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|comment_asks whereImageFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|comment_asks whereImageTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|comment_asks whereTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|comment_asks whereUpdatedAt($value)
 */
	class comment_asks extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\comment_report
 *
 * @property int $id
 * @property string $from
 * @property string|null $image_from
 * @property string $description
 * @property string $to
 * @property string|null $image_to
 * @property int $report_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\report $report
 * @method static \Illuminate\Database\Eloquent\Builder|comment_report newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|comment_report newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|comment_report query()
 * @method static \Illuminate\Database\Eloquent\Builder|comment_report whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|comment_report whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|comment_report whereFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|comment_report whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|comment_report whereImageFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|comment_report whereImageTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|comment_report whereReportId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|comment_report whereTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|comment_report whereUpdatedAt($value)
 */
	class comment_report extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\friendship
 *
 * @property int $id
 * @property int $user_id
 * @property int $friend_user_id
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $friendUser
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|friendship newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|friendship newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|friendship query()
 * @method static \Illuminate\Database\Eloquent\Builder|friendship whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|friendship whereFriendUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|friendship whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|friendship whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|friendship whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|friendship whereUserId($value)
 */
	class friendship extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\map
 *
 * @property int $id
 * @property string|null $year
 * @property string|null $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|map newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|map newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|map query()
 * @method static \Illuminate\Database\Eloquent\Builder|map whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|map whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|map whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|map whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|map whereYear($value)
 */
	class map extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\post
 *
 * @property int $id
 * @property string $description
 * @property string|null $image
 * @property int $user_id
 * @property int $ups
 * @property string $which
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\comment> $comment
 * @property-read int|null $comment_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|post query()
 * @method static \Illuminate\Database\Eloquent\Builder|post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|post whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|post whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|post whereUps($value)
 * @method static \Illuminate\Database\Eloquent\Builder|post whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|post whereWhich($value)
 */
	class post extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\report
 *
 * @property int $id
 * @property string $description
 * @property string|null $image
 * @property int $user_id
 * @property int $ups
 * @property string $country
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\comment_report> $comment
 * @property-read int|null $comment_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|report newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|report newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|report query()
 * @method static \Illuminate\Database\Eloquent\Builder|report whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|report whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|report whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|report whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|report whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|report whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|report whereUps($value)
 * @method static \Illuminate\Database\Eloquent\Builder|report whereUserId($value)
 */
	class report extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\story
 *
 * @property int $id
 * @property string|null $image
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|story newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|story newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|story query()
 * @method static \Illuminate\Database\Eloquent\Builder|story whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|story whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|story whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|story whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|story whereUserId($value)
 */
	class story extends \Eloquent {}
}

