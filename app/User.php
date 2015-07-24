<?php namespace App;

use DB;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

    public static $statusGood = 'good';
    public static $statusPaymentRequested = 'payment_requested';

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['username', 'email', 'password', 'publisher_id', 'status', 'confirmation_code'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

    /**
     * @param string $userConstraints
     * @return mixed
     */
    public static function usersPayments($userIds = '[]')
    {
        return DB::select(DB::raw('SELECT user_id, email, sum(views_since_payment) as total_views_since_payment, SUM(points) as total_points
                FROM
                (
                    SELECT email, posts.id, user_id, posts.content_type, views_since_payment, views_since_payment*per_view as points
                    FROM posts
                    INNER JOIN (payouts, users)
                    ON (posts.content_type = payouts.content_type AND users.id = user_id)
                    WHERE posts.status = \'posted\'
                ) AS T
                WHERE user_id IN ('. join(',',$userIds).')
                GROUP BY user_id

        '));

    }

}
