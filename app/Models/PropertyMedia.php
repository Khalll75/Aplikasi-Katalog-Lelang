<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyMedia extends Model
{
    protected $table = 'property_media';
    protected $fillable = [
        'property_id',
        'media_url',
        'media_type',
        'duration',
        'format',
        'resolution',
        'is_main'
    ];

    protected $casts = [
        'is_main' => 'boolean',
        'duration' => 'integer',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    /**
     * Check if the media is an image
     */
    public function isImage(): bool
    {
        return $this->media_type === 'image';
    }

    /**
     * Check if the media is a video
     */
    public function isVideo(): bool
    {
        return $this->media_type === 'video';
    }

    /**
     * Get formatted duration for videos
     */
    public function getFormattedDuration(): string
    {
        if (!$this->duration || !$this->isVideo()) {
            return '';
        }

        $minutes = floor($this->duration / 60);
        $seconds = $this->duration % 60;

        return sprintf('%02d:%02d', $minutes, $seconds);
    }
}
