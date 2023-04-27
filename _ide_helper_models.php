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
 * App\Models\Binding
 *
 * @method static create(string[] $array)
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Review|null $review
 * @method static \Illuminate\Database\Eloquent\Builder|Binding newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Binding newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Binding onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Binding query()
 * @method static \Illuminate\Database\Eloquent\Builder|Binding whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Binding whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Binding whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Binding whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Binding whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Binding withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Binding withoutTrashed()
 */
	class Binding extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Book
 *
 * @property int $id
 * @property string $name
 * @property string $summary
 * @property float $number
 * @property string $isbn_10
 * @property string $isbn_13
 * @property int $page_count
 * @property string $release_date
 * @property int $series_type_id
 * @property int $publisher_id
 * @property int $language_id
 * @property int $binding_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Binding|null $binding
 * @property-read \App\Models\Language|null $language
 * @property-read \App\Models\Media|null $media
 * @property-read \App\Models\Publisher|null $publisher
 * @property-read \App\Models\Review|null $review
 * @property-read \App\Models\SeriesType|null $series_type
 * @method static \Database\Factories\BookFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Book newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Book newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Book onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Book query()
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereBindingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereIsbn10($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereIsbn13($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book wherePageCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book wherePublisherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereReleaseDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereSeriesTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereSummary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Book withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Book withoutTrashed()
 */
	class Book extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ItemType
 *
 * @method static create(string[] $array)
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Review|null $review
 * @method static \Database\Factories\ItemTypeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ItemType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemType onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemType query()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ItemType withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ItemType withoutTrashed()
 */
	class ItemType extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Language
 *
 * @method static create(string[] $array)
 * @property int $id
 * @property string $name
 * @property string $iso_639_1
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Review|null $review
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SeriesName> $series_names
 * @method static \Illuminate\Database\Eloquent\Builder|Language newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Language newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Language onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Language query()
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereIso6391($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Language withoutTrashed()
 */
	class Language extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Media
 *
 * @property int $id
 * @property string $url
 * @property string $meta
 * @property int|null $item_id
 * @property string|null $item_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $item
 * @method static \Database\Factories\MediaFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Media newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Media newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Media onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Media query()
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereItemType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Media withoutTrashed()
 */
	class Media extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PasswordReset
 *
 * @property int $id
 * @property string $email
 * @property string $token
 * @property string|null $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset query()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset whereToken($value)
 */
	class PasswordReset extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Publisher
 *
 * @property int $id
 * @property string $name
 * @property string $url
 * @property string|null $about
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Media|null $media
 * @property-read \App\Models\Review|null $review
 * @method static \Database\Factories\PublisherFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Publisher newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Publisher newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Publisher onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Publisher query()
 * @method static \Illuminate\Database\Eloquent\Builder|Publisher whereAbout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Publisher whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Publisher whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Publisher whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Publisher whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Publisher whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Publisher whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Publisher withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Publisher withoutTrashed()
 */
	class Publisher extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Review
 *
 * @property int $id
 * @property int $submitter_id
 * @property int|null $reviewer_id
 * @property int $item_id
 * @property string $item_type
 * @property int|null $replace_id
 * @property string|null $replace_type
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ReviewComment> $comments
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $item
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $replace_item
 * @property-read \App\Models\User|null $reviewer
 * @property-read \App\Models\User|null $submitter
 * @method static \Illuminate\Database\Eloquent\Builder|Review newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Review newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Review onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Review query()
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereItemType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereReplaceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereReplaceType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereReviewerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereSubmitterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Review withoutTrashed()
 */
	class Review extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ReviewComment
 *
 * @property int $id
 * @property int $user_id
 * @property int $review_id
 * @property string $message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Review|null $review
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|ReviewComment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReviewComment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReviewComment onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ReviewComment query()
 * @method static \Illuminate\Database\Eloquent\Builder|ReviewComment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReviewComment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReviewComment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReviewComment whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReviewComment whereReviewId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReviewComment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReviewComment whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReviewComment withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ReviewComment withoutTrashed()
 */
	class ReviewComment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Series
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Media|null $media
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SeriesName> $names
 * @property-read \App\Models\Review|null $review
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SeriesType> $types
 * @method static \Database\Factories\SeriesFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Series newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Series newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Series onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Series query()
 * @method static \Illuminate\Database\Eloquent\Builder|Series whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Series whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Series whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Series whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Series withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Series withoutTrashed()
 */
	class Series extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SeriesName
 *
 * @property int $id
 * @property string $name
 * @property int $language_id
 * @property int $series_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Language|null $language
 * @property-read \App\Models\Series|null $series
 * @method static \Database\Factories\SeriesNameFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|SeriesName newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SeriesName newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SeriesName onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SeriesName query()
 * @method static \Illuminate\Database\Eloquent\Builder|SeriesName whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SeriesName whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SeriesName whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SeriesName whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SeriesName whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SeriesName whereSeriesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SeriesName whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SeriesName withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SeriesName withoutTrashed()
 */
	class SeriesName extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SeriesType
 *
 * @property int $id
 * @property int $series_id
 * @property int $item_type_id
 * @property int $status_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Review|null $review
 * @property-read \App\Models\Series|null $series
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Staff> $staff
 * @property-read \App\Models\Status|null $status
 * @property-read \App\Models\ItemType|null $type
 * @method static \Database\Factories\SeriesTypeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|SeriesType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SeriesType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SeriesType onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SeriesType query()
 * @method static \Illuminate\Database\Eloquent\Builder|SeriesType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SeriesType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SeriesType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SeriesType whereItemTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SeriesType whereSeriesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SeriesType whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SeriesType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SeriesType withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|SeriesType withoutTrashed()
 */
	class SeriesType extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Staff
 *
 * @property int $id
 * @property string $name
 * @property string|null $native_name
 * @property string|null $about
 * @property int|null $age
 * @property string|null $gender
 * @property string|null $origin
 * @property string|null $started_on
 * @property string|null $stopped_on
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Media|null $media
 * @property-read \App\Models\Review|null $review
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SeriesType> $series_types
 * @method static \Database\Factories\StaffFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Staff newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Staff newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Staff onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Staff query()
 * @method static \Illuminate\Database\Eloquent\Builder|Staff whereAbout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Staff whereAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Staff whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Staff whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Staff whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Staff whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Staff whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Staff whereNativeName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Staff whereOrigin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Staff whereStartedOn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Staff whereStoppedOn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Staff whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Staff withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Staff withoutTrashed()
 */
	class Staff extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Status
 *
 * @method static create(string[] $array)
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Review|null $review
 * @method static \Illuminate\Database\Eloquent\Builder|Status newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Status newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Status onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Status query()
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Status withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Status withoutTrashed()
 */
	class Status extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property int $editor
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEditor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

