<?php
namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class FormatTime
{
    public static function formatTime($date)
    {
        if ($date == null) {
            return 'Without date';
        }

        $start_date = $date;
        $since_start = $start_date->diff(new \DateTime(date('Y-m-d H:i:s')));

        if ($since_start->y == 0) {
            if ($since_start->m == 0) {
                if ($since_start->d == 0) {
                    if ($since_start->h == 0) {
                        if ($since_start->i == 0) {
                            return $since_start->s . ' seconds ago';
                        } else {
                            return $since_start->i . ' minutes ago';
                        }
                    } else {
                        return $since_start->h . ' hours ago';
                    }
                } else {
                    return $since_start->d . ' days ago';
                }
            } else {
                return $since_start->m . ' months ago';
            }
        } else {
            return $since_start->y . ' years ago';
        }

        return $since_start;
    }
}