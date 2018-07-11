<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employees extends Model
{
    /**
     * Fillable fields for an Employee
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'position',
        'start_day',
        'parent_id',
        'salary',
        'lb',
        'rb',
    ];
    
    /**
     * Additional fields to treat as Carbon instances.
     *
     * @var array
     */
    protected $dates = ['start_day'];
    public $timestamps = false;
    protected $guarded = ['id',];

    /**
     * Set the position attribute.
     *
     * @param $value
     */
    public function setPositionAttribute($value) {
        $this->attributes['position'] = strtolower($value);
    }

    /**
     * Scope queries to employees that have been displayed.
     *
     * @param $query
     */
    public function scopeChild($query,$pid) {
        $query->where('parent_id', '=', $pid);
    }

    /**
     * Accessor for display full name + (position)
     *
     */
    // public function getFullNameAttribute () {
    //     return $this->first_name.' '.$this->last_name;
    // }

    public static function saveOnTree($input) {

        DB::transaction(function() use ($input)
        {
            $new_lb = DB::select( DB::raw("SELECT rb FROM employees WHERE id = :parent"), [
                'parent' => $input['parent_id'],
            ]);

            $new_lb = $new_lb['0']->rb;

            DB::table('employees')->where('rb','>=',$new_lb)->update([
                'rb' => DB::raw('rb + 2'),
            ]);

            DB::table('employees')->where('lb','>',$new_lb)->update([
                'lb' => DB::raw('lb + 2'),
            ]);

            DB::insert('insert into employees (
                    lb, rb, parent_id, name, position, start_day, salary, photo, depth
                    ) values (?, ?, ?, ?, ?, ?, ?, ?, ?)', [
                    $new_lb, ($new_lb+1), $input['parent_id'], $input['name'],
                    $input['position'], $input['start_day'], $input['salary'],'default.jpg',$new_lb
            ]);
        });
    }

    public static function deleteFromTree($id) {

        DB::transaction(function() use ($id)
        {
            $parameters = DB::select(
                DB::raw("SELECT lb, rb, (rb - lb), (rb - lb + 1), parent_id FROM employees WHERE id = :node_id"), [
                'node_id' => $id,
            ]);

            $new_lb = $parameters[0]->lb;
            $new_rb = $parameters[0]->rb;
            $has_leafs = $new_rb - $new_lb;
            $width = $new_rb - $new_lb + 1;
            $superior_parent = $parameters[0]->parent_id;

            DB::table('employees')->where('id', '=', $id)->delete();

            if ($has_leafs = 1) {
                DB::table('employees')
                    ->whereBetween('lb', [$new_lb, $new_rb])
                    ->delete();
                DB::table('employees')->where('rb','>',$new_rb)
                    ->update(['rb' => DB::raw('rb - '.$width),]);
                DB::table('employees')->where('lb','>',$new_rb)
                    ->update(['lb' => DB::raw('lb - '.$width),]);
            } else {
                DB::table('employees')->where('lb', '=', $new_lb)->delete();
                DB::table('employees')->whereBetween('lb', [$new_lb, $new_rb])
                    ->update([
                    'rb' => DB::raw('rb - 1'),
                    'lb' => DB::raw('lb - 1'),
                    'parent_id' => $superior_parent,
                ]);
                DB::table('employees')->where('rb','>',$new_rb)
                    ->update(['rb' => DB::raw('rb - 2'),]);
                DB::table('employees')->where('lb','>',$new_rb)
                    ->update(['rb' => DB::raw('lb - 2'),]);
            }
        //    dd($new_lb,$new_rb,$has_leafs,$with);
        });
    }
}
