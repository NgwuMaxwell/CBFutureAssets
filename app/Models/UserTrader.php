namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTrader extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'trader_id'];
}
