<?php

declare(strict_types=1);

namespace App\Model;

use Hyperf\DbConnection\Model\Model;
use HyperfExtension\Jwt\Contracts\JwtSubjectInterface;
use Qbhy\HyperfAuth\Authenticatable;

/**
 * @property int $id 
 * @property string $uuid 
 * @property string $name 
 * @property string $real_name 
 * @property string $number 
 * @property string $phone 
 * @property string $bind_phone_time 
 * @property string $gender 
 * @property string $headimg 
 * @property string $email 
 * @property string $birthday 
 * @property string $password 
 * @property string $provice 
 * @property string $city 
 * @property string $area 
 * @property int $level 
 * @property int $vip_type 
 * @property string $vip_number 
 * @property int $vip_status 
 * @property string $vip_start_at 
 * @property string $vip_end_at 
 * @property int $is_inviter 
 * @property int $inviter_id 
 * @property int $inviter_index 
 * @property string $invited_at 
 * @property string $signature 
 * @property string $description 
 * @property string $tags 
 * @property string $last_active_at 
 * @property string $blocked_at 
 * @property int $status 
 * @property int $is_inner 
 * @property int $type 
 * @property int $is_high_value_user 
 * @property int $scheduler_id 
 * @property int $external_id 
 * @property string $wechat 
 * @property string $remark 
 * @property string $options 
 * @property int $device_id 
 * @property string $marked_at 
 * @property int $root_inviter_id 
 * @property int $indirect_inviter_id 
 * @property int $paid_real_money_total 
 * @property int $paid_money_total 
 * @property int $paid_score_total 
 * @property int $paid_points_total 
 * @property int $first_money_brokerage 
 * @property int $first_score_brokerage 
 * @property int $first_points_brokerage 
 * @property int $first_exchange_point_brokerage 
 * @property int $second_money_brokerage 
 * @property int $second_score_brokerage 
 * @property int $second_points_brokerage 
 * @property int $second_exchange_point_brokerage 
 * @property string $apple_id 
 * @property int $invite_total 
 * @property int $invite_reward_status 
 * @property int $direct_invitees_count 
 * @property int $indirect_invitees_count 
 * @property int $pending_money_brokerage 
 * @property int $pending_score_brokerage 
 * @property int $pending_points_brokerage 
 * @property int $pending_exchange_point_brokerage 
 * @property int $completed_money_brokerage 
 * @property int $completed_score_brokerage 
 * @property int $completed_points_brokerage 
 * @property int $completed_exchange_point_brokerage 
 * @property int $agent_level_index 
 * @property int $agent_status 
 * @property string $invite_node_type 
 * @property string $invite_node_uuid 
 * @property int $invite_node_id 
 * @property int $lucky_score 
 * @property string $require_delete_at 
 * @property string $invite_code 
 * @property int $profile_status 
 * @property string $reyun_ad_id 
 * @property string $reyun_ad_name 
 * @property \Carbon\Carbon $created_at 
 * @property string $app_channel 
 * @property \Carbon\Carbon $updated_at 
 * @property string $deleted_at 
 * @property string $app_channel_deleted 
 * @property string $ip 
 * @property string $ip_location 
 * @property string $user_device_id 
 * @property string $user_device_name 
 */
class UsrUser extends Model implements Authenticatable
{
    /**
     * The table associated with the model.
     */
    protected ?string $table = 'usr_users';

    /**
     * The attributes that are mass assignable.
     */
    protected array $fillable = [];

    /**
     * The attributes that should be cast to native types.
     */
    protected array $casts = ['id' => 'integer', 'level' => 'integer', 'vip_type' => 'integer', 'vip_status' => 'integer', 'is_inviter' => 'integer', 'inviter_id' => 'integer', 'inviter_index' => 'integer', 'status' => 'integer', 'is_inner' => 'integer', 'type' => 'integer', 'is_high_value_user' => 'integer', 'scheduler_id' => 'integer', 'external_id' => 'integer', 'device_id' => 'integer', 'root_inviter_id' => 'integer', 'indirect_inviter_id' => 'integer', 'paid_real_money_total' => 'integer', 'paid_money_total' => 'integer', 'paid_score_total' => 'integer', 'paid_points_total' => 'integer', 'first_money_brokerage' => 'integer', 'first_score_brokerage' => 'integer', 'first_points_brokerage' => 'integer', 'first_exchange_point_brokerage' => 'integer', 'second_money_brokerage' => 'integer', 'second_score_brokerage' => 'integer', 'second_points_brokerage' => 'integer', 'second_exchange_point_brokerage' => 'integer', 'invite_total' => 'integer', 'invite_reward_status' => 'integer', 'direct_invitees_count' => 'integer', 'indirect_invitees_count' => 'integer', 'pending_money_brokerage' => 'integer', 'pending_score_brokerage' => 'integer', 'pending_points_brokerage' => 'integer', 'pending_exchange_point_brokerage' => 'integer', 'completed_money_brokerage' => 'integer', 'completed_score_brokerage' => 'integer', 'completed_points_brokerage' => 'integer', 'completed_exchange_point_brokerage' => 'integer', 'agent_level_index' => 'integer', 'agent_status' => 'integer', 'invite_node_id' => 'integer', 'lucky_score' => 'integer', 'profile_status' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];


    public function getId()
    {
        return $this->id;
    }

    public static function retrieveById($key): ?Authenticatable
    {
        return UsrUser::find($key);
    }
}
