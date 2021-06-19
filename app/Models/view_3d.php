<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class view_3d extends Model
{
    public $timestamps = true;
    protected $table = 'view_3d';
    protected $fillable = [
        'date',
        'playerid',
        'agentid',
        'currency',
        'bet',
        'win',
        'rake',
        'tournament',
        'net',
        'fin',
        'aams_ticket',
        'aams_table',
    ];
}
