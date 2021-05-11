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
 * App\Models\Artist
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string|null $description
 * @property string|null $photo
 * @property string|null $website
 * @property string|null $facebook
 * @property string|null $instagram
 * @property string|null $mail
 * @property string|null $spotifyId
 * @property string|null $youtubeId
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Song[] $songs
 * @property-read int|null $songs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Database\Factories\ArtistFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Artist newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Artist newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Artist query()
 * @method static \Illuminate\Database\Eloquent\Builder|Artist whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artist whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artist whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artist whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artist whereInstagram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artist whereMail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artist whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artist wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artist whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artist whereSpotifyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artist whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artist whereWebsite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Artist whereYoutubeId($value)
 */
	class Artist extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ConnectedAccount
 *
 * @property int $id
 * @property int $user_id
 * @property string $provider
 * @property string $provider_id
 * @property string|null $name
 * @property string|null $nickname
 * @property string|null $email
 * @property string|null $telephone
 * @property string|null $avatar_path
 * @property string $token
 * @property string|null $secret
 * @property string|null $refresh_token
 * @property string|null $expires_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|ConnectedAccount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ConnectedAccount newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ConnectedAccount query()
 * @method static \Illuminate\Database\Eloquent\Builder|ConnectedAccount whereAvatarPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConnectedAccount whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConnectedAccount whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConnectedAccount whereExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConnectedAccount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConnectedAccount whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConnectedAccount whereNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConnectedAccount whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConnectedAccount whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConnectedAccount whereRefreshToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConnectedAccount whereSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConnectedAccount whereTelephone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConnectedAccount whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConnectedAccount whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ConnectedAccount whereUserId($value)
 */
	class ConnectedAccount extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Like
 *
 * @property int $id
 * @property int $user_id
 * @property int $song_id
 * @property int $liked
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Like newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Like newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Like query()
 * @method static \Illuminate\Database\Eloquent\Builder|Like whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Like whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Like whereLiked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Like whereSongId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Like whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Like whereUserId($value)
 */
	class Like extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Playlist
 *
 * @method static \Database\Factories\PlaylistFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Playlist newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Playlist newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Playlist query()
 */
	class Playlist extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Song
 *
 * @property int $id
 * @property int|null $idSong
 * @property string $slug
 * @property string $title
 * @property string $text
 * @property string|null $spotifyId
 * @property string|null $deezerId
 * @property string|null $youtubeId
 * @property string|null $soundcloudId
 * @property int $isVerified
 * @property int $isOutOfDate
 * @property string $key
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $artist_id
 * @property-read \App\Models\Artist|null $artist
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Like[] $likes
 * @property-read int|null $likes_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tag[] $tags
 * @property-read int|null $tags_count
 * @method static \Database\Factories\SongFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Song newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Song newQuery()
 * @method static \Illuminate\Database\Query\Builder|Song onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Song query()
 * @method static \Illuminate\Database\Eloquent\Builder|Song whereArtistId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Song whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Song whereDeezerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Song whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Song whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Song whereIdSong($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Song whereIsOutOfDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Song whereIsVerified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Song whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Song whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Song whereSoundcloudId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Song whereSpotifyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Song whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Song whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Song whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Song whereYoutubeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Song withLikes()
 * @method static \Illuminate\Database\Query\Builder|Song withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Song withoutTrashed()
 */
	class Song extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Tag
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Song[] $songs
 * @property-read int|null $songs_count
 * @method static \Database\Factories\TagFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereUpdatedAt($value)
 */
	class Tag extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $remember_token
 * @property string|null $profile_photo_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $isModerator
 * @property string $preferred_playback
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Artist[] $artist
 * @property-read int|null $artist_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ConnectedAccount[] $connectedAccounts
 * @property-read int|null $connected_accounts_count
 * @property-read \App\Models\ConnectedAccount $currentConnectedAccount
 * @property-read string $profile_photo_url
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Like[] $likes
 * @property-read int|null $likes_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Song[] $songs
 * @property-read int|null $songs_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsModerator($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePreferredPlayback($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfilePhotoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

