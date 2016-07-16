<?php

namespace Msenl;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Faq
 * @package Msenl
 */
class Faq extends Model
{
    protected $table = 'faqs';
    
    protected $fillable = ['question', 'answer', 'order'];
}
