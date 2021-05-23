<?php
namespace App\Api;
use Slim\Views\Twig as View;
class RunVideo 
{
   protected $views;
   protected $pdo;
   public function __construct(View $views)
   {
    	$this->views = $views;
   }
   public function run($request, $response)
   {
   		// exec('start C:\Users\aungz\Desktop\workspace\git\Famikomyu\src\app\vlc_player\VLC\vlc C:\Users\aungz\Desktop\workspace\Karaoke\SakuraKaraoke\v4.1\release\Thot_karaoke.mkv --fullscreen');
   		exec('C:\Users\aungz\Desktop\workspace\git\Famikomyu\src\app\batch\vlc.bat');
   		// exec('start C:\Users\aungz\Desktop\workspace\git\Famikomyu\src\app\vlc_player\VLC\vlc C:\Users\aungz\Desktop\workspace\Karaoke\SakuraKaraoke\v4.1\release\Thot_karaoke.mkv --fullscreen');
   		return 'open';
   }
   public function close($request, $response)
   {
   		$str = exec('start /B C:\Users\aungz\Desktop\workspace\git\Famikomyu\src\app\batch\vlc_close.bat');
   		// exec('C:\Users\aungz\Desktop\workspace\git\Famikomyu\src\app\batch\vlc_close.bat');
   }
}
?>