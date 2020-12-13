<?php
    namespace App\Models;
    
    use Illuminate\Database\Eloquent\Model;

    class UserJob extends Model{
        protected $table = 'tbluserjob'; //table name
        protected $fillable = [ //table column
            'jobid', 'jobname'
        ];
        public $timestamps = false; // will not require the the field to create_at and update_at in lumen
        protected $primaryKey = 'jobid'; // will customized the primary key field name, default in lumen is id
}