<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'gallery';
    protected $fillable = ['id', 'gallery', 'image', 'caption']; // Adjust this based on your actual fields

    // Define relationships with other tables if necessary
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Function to retrieve all projects
    public static function getAllGalleries()
    {
        return self::all();
    }

    // Function to retrieve a specific project by ID
    public static function getGalleryById($id)
    {
        return self::find($id);
    }

    // Function to edit a project
    public static function editGallery($id, $data)
    {
        $event = self::find($id);
        if (!$event) {
            return null; // or throw an exception if desired
        }
        $event->update($data);
        return $event;
    }

    // Function to delete a project
    public static function deleteGallery($id)
    {
        $event = self::find($id);
        if (!$event) {
            return false; // or throw an exception if desired
        }
        $event->delete();
        return true;
    }
}
