<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBobotView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE VIEW bobot AS (
SELECT idhp,
(
 CASE
    WHEN harga >= 5000000 THEN 1
    WHEN harga >= 4000000 && harga < 5000000 THEN 2
    WHEN harga >= 3000000 && harga < 4000000 THEN 3
    WHEN harga >= 1000000 && harga < 3000000 THEN 4
    WHEN harga < 1000000 THEN 5
END
) AS bobot_harga,

(
CASE 
   WHEN ram <= 1 THEN 1
   WHEN ram <= 2 THEN 2
   WHEN ram <= 3 THEN 3
   WHEN ram <= 4 THEN 4
   WHEN ram > 4 THEN 5
END
) AS bobot_ram,

(
CASE
    WHEN memory <= 4 THEN 1
    WHEN memory <= 8 THEN 2
    WHEN memory <= 16 THEN 3
    WHEN memory < 32 THEN 4
    WHEN memory >= 32 THEN 5
END
) AS bobot_memory,
processor as bobot_processor
,
(
CASE
	WHEN camera > 13 THEN 5
    WHEN camera >= 8 && camera <= 13 THEN 3
    WHEN camera <= 5 THEN 1

   
END
) AS bobot_camera
FROM `normal` WHERE 
)
        ");
        }

    /**
     * Reverse the migrations.
     *s
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS bobot');
    }
}
