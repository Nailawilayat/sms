<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    // Agar aap specific table ka naam dena chahein, toh is tarah likhein
    protected $table = 'homes'; // Laravel default plural table names use karta hai

    // Agar aap fillable fields define karna chahein, toh is tarah likhein
    protected $fillable = [
        'title', 
        'description', 
        'image' // Jo bhi fields aapki table mein hain
    ];
}
