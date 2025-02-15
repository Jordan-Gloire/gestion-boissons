<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;

// class Vente extends Model
// {
//     //
// }
// // app/Models/Vente.php

// namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vente extends Model
{
    use HasFactory;

    // Déclaration des attributs assignables (fillable)
    protected $fillable = ['user_id', 'boisson_id', 'quantite', 'total'];

    /**
     * Relation avec l'employé (User)
     * Une vente appartient à un employé (user)
     */
    public function user()
    {
        return $this->belongsTo(User::class); // La vente appartient à un utilisateur (employé)
    }

    /**
     * Relation avec la boisson
     * Une vente appartient à une boisson
     */
    public function boisson()
    {
        return $this->belongsTo(Boisson::class); // La vente appartient à une boisson
    }
}
