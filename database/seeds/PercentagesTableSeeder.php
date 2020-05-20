<?php

use Illuminate\Database\Seeder;
use App\Models\Type;
use App\Models\Task;
use App\Models\YearUnion;
class PercentagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //TODO Javi No Tocar

        $types = Type::where('model', Task::class)->get();
        $yearUnions = YearUnion::all();
        foreach ($yearUnions as $yearUnion) {
            foreach($types as $type){
                DB::table('percentages')->insert([
                'year_union_id' => $yearUnion->id,
                'type_id' => $type->id,
                'percentage' => 0,
                'min_grade_task' => 0,
                'average_grade_task' => 0,
                'min_average_grade_task' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            }
            
        }

       
    }
}
